<?php
/* DF_2: forms/f__1st1b.php
f__1st1.php's ajax back
c: 25.12.2005
m: 14.11.2015 */

include( "../forms/f__1st_.php" );

if ( $devs<$devs_onmnem1 ) $devs_onpage=$devs-1; else $devs_onpage=$devs_onmnem1-1;
$dev_last=$dev_1st+$devs_onpage;

//request for normalization checking
$c_dev=CookieGet( "r_mult" )*1;
if ( $c_dev>0 ) {
	CookieSet( "r_mult", "" );
	mysql_query( "UPDATE $parlor SET
	 r_mult='-1'
	 WHERE bd_num*1=$c_dev" );
}
$c_dev=CookieGet( "r_mults" )*1;
if ( $c_dev>0 ) {
	CookieSet( "r_mults", "" );
	for ( $c_dev=$dev_1st; $c_dev<=$dev_last; $c_dev++ ) {
		mysql_query( "UPDATE $parlor SET
		 r_mult='-1'
		 WHERE bd_num*1=$c_dev" );
	}
}

$_RESULT="
<table cellspacing='0' class='st'>
<tr $cjust style='background-color:#cccccc; height:30px'>
	<td $ljust colspan='12' title='$powermode_title'>&nbsp;".$powermode."</td>
	<td $rjust colspan='3' width='171px'>".$php_mm["_00_transact_cap"].":".$trans."&nbsp;&nbsp;".$php_mm["_00_devs_cap"].":".$devs_ok."/".$devs."&nbsp;</td>
</tr>
<tr $cjust class='st_title2' style='height:21px'>
	<td width='1px' style='background-color:#cccccc'></td>
	<td width='21px'>&nbsp;".$php_mm["_00_devnum_column_cap"]."</td>
	<td width='20px'>";
if ( $userCoo==2 ) $_RESULT=$_RESULT."<input type='checkbox' onclick='CookieSet( \"r_mults\", \"1\" )'>";
$_RESULT=$_RESULT."
	</td>
	<td>&nbsp;".$php_mm["_00_devstat_column_cap"]."</td>
	<td width='45px'>&nbsp;".$_00_R."</td>
	<td width='85px'>&nbsp;".$_00_R_mult."</td>
	<td width='85px'>&nbsp;".$_00_R_res."</td>
	<td width='1px' style='background-color:#cccccc'></td>
	<td width='21px'>&nbsp;".$php_mm["_00_devnum_column_cap"]."</td>
	<td width='20px'>";
if ( $userCoo==2 ) $_RESULT=$_RESULT."<input type='checkbox' onclick='CookieSet( \"r_mults\", \"1\" )'>";
$_RESULT=$_RESULT."
	</td>
	<td>&nbsp;".$php_mm["_00_devstat_column_cap"]."&nbsp;</td>
	<td width='45px'>&nbsp;".$_00_R."&nbsp;</td>
	<td width='85px'>&nbsp;".$_00_R_mult."&nbsp;</td>
	<td width='85px'>&nbsp;".$_00_R_res."&nbsp;</td>
	<td width='1px' style='background-color:#cccccc'></td>
</tr>";

$a_cnt=0;
$res=mysql_query( "SELECT
 bd_num, dev_status,
 id_date, id_time, rep_date, rep_time,
 cow_num, rfid_num, nick,
 milk_kg, milk_time,
 manual,
 retries,
 stopped,
 exhaust,
 mast, mast_4, tr, ov,
 modif_date, modif_time,
 dev_status_, r, r_mult
 FROM $parlor
 WHERE bd_num*1>=$dev_1st AND
 bd_num*1<=$dev_last" );
while ( $row=mysql_fetch_row( $res )) {
	$a_cnt++;
	$connected='';
	$bd_num=$row[0]*1;
	$bd_state=trim( $row[1] );
	$dev_status_=trim( $row[21] );
	$dev_status=$dev_status_;//device's last useful status, not current
	include( "../httpmon/devstats.php" );
	$bk_color='#0';
	if ( $bd_state==$php_m[772] )//version
		$dev_color='#f09000';
	elseif ( $bd_state==$php_m[771] )//RFID updating
		$dev_color='#9a5050';
	elseif ( $bd_state==$php_m[770] )//RFID
		$dev_color='#caca09';
	elseif ( $bd_state==$php_m[769] )//cow number
		$dev_color='#caca09';
	elseif ( $bd_state==$php_m[768] )//report done
		$dev_color='#00a000';
	elseif ( $bd_state==$php_m[767] )//connection
		$dev_color='#ea0000';
	elseif ( $bd_state==$php_m[766] )//intDB overflow
		$dev_color='#ea0000';
	elseif ( $bd_state==$php_m[765] )//error
		$dev_color='#ea0000';
	elseif ( $bd_state==$php_m[764] )//report ready
		$dev_color='#00a000';
	elseif ( $bd_state==$php_m[763] )//milking
		$dev_color='#b000b0';
	elseif ( $bd_state==$php_m[762] )//device ready (waiting)
		$dev_color='#00af00';//'#1f1f1f';
	elseif ( $bd_state==$php_m[761] )//device washing
		$dev_color='#00aaff';
	else//?
		$dev_color='#aa0000';
	$dev_style='color:'.$dev_color;
	if ( $bk_color!='#0' ) $dev_style='background:'.$bk_color.'; '.$dev_style;
	if ( $dev_status_=='a' )
		$connected=$id_date.",&nbsp;".$id_time;
	elseif ( $dev_status_=='x' )
		$connected=$id_date.",&nbsp;".$id_time;
	elseif ( $dev_status_=='i' )
		$connected=$id_date.",&nbsp;".$id_time;
	elseif ( $dev_status_=='r' )
		$connected=$rep_date.",&nbsp;".$rep_time;
	else
		$connected=$rep_date.",&nbsp;".$rep_time;
	$connected=$dev_status."&nbsp;<br>".$row[19]."&nbsp;".$rep_time;
	if ( $row[14]=='+' ) $m_color='#ff0000'; else $m_color='#000000';
	$r_result=$row[22]*$row[23];
	if ( $userCoo==2 ) if ( $row[23]*1<0 ) $checked="checked"; else $checked="";
	else $checked="";
	$a[$a_cnt]="
	<td $cjust style='height:21px'>$bd_num</td>
	<td>";
	if ( $userCoo==2 ) {
		$tmp=$a[$a_cnt];
		$a[$a_cnt]=$tmp."<input type='checkbox' $checked onclick='CookieSet( \"r_mult\", \"$bd_num\" )'>";
	}
	$tmp=$a[$a_cnt];
	$a[$a_cnt]=$tmp."</td>
	<td style='$dev_style'>$bd_state</td>
	<td>&nbsp;".$row[22]."&nbsp;</td>
	<td>&nbsp;".$row[23]."&nbsp;</td>
	<td>&nbsp;".$r_result."&nbsp;</td>";
}

for ( $a_i=1; $a_i<=$a_cnt/2; $a_i++ ) {
	$_RESULT=$_RESULT."
<tr $cjust bgcolor='".GrTrCol( $rownum )."'><td width='1px' style='background-color:#cccccc'></td>".$a[$a_i]."<td style='background-color:#cccccc'></td>".$a[$a_i+$a_cnt/2]."<td width='1px' style='background-color:#cccccc'></td>
</tr>";
}

$_RESULT=$_RESULT."
<td colspan='15' height='3px'></td>
</table>";

Dbase_disconnect();
?>
