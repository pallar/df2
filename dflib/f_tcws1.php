<?php
/* DF_2: dflib/f_tcws1.php
report: simple cows list
c: 10.12.2005
m: 29.09.2015 */

if ( strlen( $cows_order_ )<=0 ) $cows_order_="$cows.cow_num*1";

$j=0;

echo "
<table cellspacing='0' class='st2'>
<tr class='st_title2' style='height:28px'>
	<td $cjust width='55px'><b>".$ged['Number']."</b></td>
	<td $cjust width='100px'><b>".$ged['Nick']."</b></td>
	<td $cjust width='30px'><b>".$ged['Group']."</b></td>
</tr>";

$res=mysql_query( "SELECT
 $cows.id, $cows.cow_num, $cows.nick,
 $groups.nick
 FROM $cows, $groups
 WHERE $cows.gr_id=$groups.id AND $cows.z_dates=''
 ORDER BY $cows_order_", $db );
while ( $row=mysql_fetch_row( $res )) {
	RepTr();
	$cownick=$row[2]; $cownick_sh=StrCutLen( $cownick, 13 );
	if ( $cownick>$cownick_sh ) $cownick_title=" title='\"$cownick\"'";
	else $cownick_title=" ";
	$grnick=$row[3]; $grnick_sh=StrCutLen( $grnick, 7 );
	if ( $grnick>$grnick_sh ) $grnick_title=" title='\"$grnick\"'";
	else $grnick_title=" ";
	if ( $cow_id*1==$row[0]*1 ) $hilight="style='background-color:#ffff00'"; else $hilight="";
	echo "
	<td $rjust $hilight onmouseover='style.cursor=\"pointer\"'>
		<b><a href='../".$hFrm['0520']."?cow_id=".$row[0]."&ret0=05'>".$cownum_div.$row[1].$cownum_div1."</b>
	</td>
	<td $hilight".$cownick_title.">$cownick_sh&nbsp;</td>
	<td $hilight".$grnick_title.">$grnick_sh&nbsp;</td>
</tr>";
	$j++;
}

mysql_free_result( $res );

echo "
<tr class='st_title2' style='height:28px'>
	<td $cjust><b>".$ged["TOTAL"].":&nbsp;</b></td>
	<td $rjust><b>$j&nbsp;</b></td>
	<td $rjust><b>&nbsp;</b></td>
</tr>
</table>";
?>
