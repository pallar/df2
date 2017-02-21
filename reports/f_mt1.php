<?php
/*
DF_2: reports/f_mt1.php
report: extracting by table, total for 8 last days
created: 25.12.2005
modified: 05.09.2014
*/

function OutputRes_ByIdAndDate( $r, $sess ) {
	global $rjust, $mf, $mf_days, $df, $mrowt, $mrowaq;
	$mcz=Int2StrZ( $mf, 2 ); $dcz=Int2StrZ( $df, 2 ); $idx="$mcz-$dcz"; $dc_idx=1;
	while ( $dc_idx<9 ) {
		$tstyle=$rjust;
		if ( $mrowaq[$r][$idx.$sess]>0 ) {
			$tstyle=$tstyle." style='color:#ff0000'";
		}
		echo "
	<td $tstyle>".$mrowt[$r][$idx.$sess]."&nbsp;</td>";
		if ( $dcz*1<$mf_days )
			$dcz=Int2StrZ( $dcz*1+1, 2 );
		else {
			$mcz=$mcz*1+1; if ( $mcz>12 ) $mcz=1;
			$mcz=Int2StrZ( $mcz, 2 ); $dcz="01";
		}
		$idx="$mcz-$dcz"; $dc_idx++;
	}
}

$graph=$_GET[graph]*1;
$title_=$_GET[title];

include( "f_mt1c.php" );
include( "fhead.php" );

if ( $graph==0 ) {
	echo "
<table class='st2'>
<tr $cjust class='st_title2' style='height:28px'>
	<td rowspan='2' width='7%'><b>".$ged["Number"]."</b></td>";
	if ( $outsele_*1==-1 ) echo "
	<td rowspan='2'><b>".$ged["Nick"]."&nbsp;/&nbsp".$ged["Group"]."</b></td>";
	else echo "
	<td rowspan='2'><b>".$ged["Name"]."</b></td>";
	echo "
	<td colspan='11'><b>".$ged["Milk"].",".$ged["kg"]."</b></td>
	<td colspan='3'><b>".$ged["Start/Stop"]."</b></td>
	<td rowspan='2' width='7%'><b>".$ged["Duration"]."</b></td>
</tr>
<tr $cjust class='st_title2'>
	<td width='7%'><b>".$ged["total_"]."</b></td>
	<td width='7%'><b>".$ged["average"]."</b></td>
	<td width='7%'><b>".$ged["mastit"]."</b></td>";
	$mcz=Int2StrZ( $mf, 2 ); $dcz=Int2StrZ( $df, 2 );
	for ( $i=1; $i<=8; $i++ ) {
		echo "
	<td width='4%'><b>".$dcz."</b></td>";
		if ( $dcz*1<$mf_days ) $dcz=Int2StrZ( $dcz*1+1, 2 );
		else $dcz="01";
	}
	echo "
	<td width='50px'><b>".$ged["total_"]."</b></td>
	<td width='50px'><b>".$ged["mastit"]."</b></td>
	<td width='50px'><b>"."0&nbsp;".$ged["kg"]."</b></td>
</tr>";
}

$sessc=4;//sessions count
if ( $_10_restrict>0 ) $sessc--;
if ( $_20_restrict>0 ) $sessc--;
if ( $_30_restrict>0 ) $sessc--;

if ( $outsele_*1==-1 ) $res1=mysql_query( "SELECT $cows.id, $cows.cow_num, $cows.nick, $groups.nick FROM $cows, $groups WHERE $groups.id=$cows.gr_id ORDER BY cow_num*1", $db );
else $res1=mysql_query( "SELECT id, num, nick FROM $outsele_table ORDER BY nick", $db );
if ( mysql_errno()<1 ) { while ( $row=mysql_fetch_row( $res1 )) {
	$r=$row[0]*1;
	if ( $mrowt[$r]>0 ) {
		$itt++;//identified cows
		if ( $mrowtq[$r][0]<1 ) {
			$mrow1=""; $mrowtq[$r][0]="";
		} else {
			$mrow1d=floor( $mrowt[$r][0]/8*10 )/10;
			$mrow1=floor( $mrowt[$r][0]/$mrowtq[$r][0]*10 )/10;
		}
		if ( $mrowm[$r][0]<1 ) $mrowm[$r][0]="";
		if ( $mrow0q[$r][0]<1 ) $mrow0q[$r][0]="";
		if ( $graph==0 ) {//show text report
			$num=$cownum_div.$row[1].$cownum_div1;
			$nick=$row[2];
			if ( $outsele_*1==-1 ) {
				$nick1=$nick."&nbsp;/&nbsp;".$row[3];
				$nick_=StrCutLen( $nick, 27 )."<br>/&nbsp;".$row[3];
			} else {
				$nick1=$nick;
				$nick_=StrCutLen( $nick, 27 );
			}
			$tsec=$mrow_tsec[$r][0]*1;
			if ( $tsec>0 ) {
				$t_hh=floor( $tsec/3600 );
				$tsec=$tsec-$t_hh*3600; $t_mm=floor( $tsec/60 );
				$tsec=$tsec-$t_mm*60; $t_ss=$tsec;
				$t_His=Int2StrZ( $t_hh, 2 ).":".Int2StrZ( $t_mm, 2 ).":".Int2StrZ( $t_ss, 2 );
			} else $t_His="";
			RepTr( $rownum );
			if ( $noCSS ) echo "
	<td $rjust rowspan='$sessc'>$num</td>
	<td rowspan='$sessc' title='$nick1'>$nick_&nbsp;</td>
	<td $rjust>".$mrowt[$r][0]."&nbsp;</td>"; else echo "
	<td $rjust rowspan='$sessc' onmouseover='style.cursor=\"pointer\"'><a href='../".$hFrm['0520']."?cow_id=$r&ret0=00'><b>$num</b></td>
	<td $ljust rowspan='$sessc' title='$nick1' onmouseover='style.cursor=\"pointer\"'><a href='../".$hFrm['0520']."?cow_id=".$r."&ret0=00'>".$nick_."&nbsp;</td>
	<td $rjust onmouseover='style.cursor=\"pointer\"'><a href='../".$hRep['m']."?restrict_id=".$r."&restrict_field=c.id&restrict_by_field=1&title=".$ged['RR0301-'].":&nbsp;".$nick."'>".$mrowt[$r][0]."&nbsp;</td>";
			echo "
	<td $rjust>".$mrow1d."&nbsp;/&nbsp;".$mrow1."&nbsp;</td>
	<td $rjust>".$mrowm[$r][0]."&nbsp;</td>";
			OutputRes_ByIdAndDate( $r, 0 );
			echo "
	<td $rjust>".$mrowtq[$r][0]."&nbsp;</td>
	<td $rjust>".$mrowmq[$r][0]."&nbsp;</td>
	<td $rjust>".$mrow0q[$r][0]."&nbsp;</td>
	<td $rjust>".$t_His."&nbsp;</td>
</tr>";
			for ( $sessi=1; $sessi<=3; $sessi++ ) {
				$sess=$sessi*10;
				if (( $_10_restrict>0 & $sess==10 ) | ( $_20_restrict>0 & $sess==20 ) | ( $_30_restrict>0 & $sess==30 )); else {
					$tsec=$mrow_tsec[$r][$sess]*1;
					if ( $tsec>0 ) {
						$t_hh=floor( $tsec/3600 );
						$tsec=$tsec-$t_hh*3600; $t_mm=floor( $tsec/60 );
						$tsec=$tsec-$t_mm*60; $t_ss=$tsec;
						$t_His=Int2StrZ( $t_hh, 2 ).":".Int2StrZ( $t_mm, 2 ).":".Int2StrZ( $t_ss, 2 );
					} else $t_His="";
					echo "
<tr style='background:#eeeeee'>
	<td $rjust>".$mrowt[$r][$sess]."&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>";
					OutputRes_ByIdAndDate( $r, $sess );
					echo "
	<td $rjust>".$mrowtq[$r][$sess]."&nbsp;</td>
	<td $rjust>".$mrowmq[$r][$sess]."&nbsp;</td>
	<td $rjust>".$mrow0q[$r][$sess]."&nbsp;</td>
	<td $rjust>".$t_His."&nbsp;</td>
</tr>";
				}
			}
		} else {//prepare diagram
			$dots[$dots_cnt]=$m;
			$dots_cnt++;
		}
	}
}}

if ( $graph<1 ) {
	if ( $mttq>0 ) $mt1=floor( $mtt/$mttq*10 )/10;
	if ( $mtt==0 ) $mtt="";
	if ( $mt1==0 ) $mt1="";
	if ( $mtm==0 ) $mtm="";
	echo "
<tr class='st_title2'>
	<td $cjust class='st_title2'><b>".$ged["TOTAL"].":</td>
	<td $rjust><b>".$itt."&nbsp;</b></td>
	<td $rjust><b>".$mtt."&nbsp;</b></td>
	<td $rjust><b>".$mt1."&nbsp;</b></td>
	<td $rjust><b>".$mtm."&nbsp;</b></td>";
	for ( $i=1; $i<=8; $i++ ) echo "
	<td $rjust><b>&nbsp;</b></td>";
	if ( $mttq<1 ) $mttq="";
	if ( $mtmq<1 ) $mtmq="";
	if ( $mt0q<1 ) $mt0q="";
	echo "
	<td $rjust><b>".$mttq."&nbsp;</b></td>
	<td $rjust><b>".$mtmq."&nbsp;</b></td>
	<td $rjust><b>".$mt0q."&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
</tr>
</table><br>";

} else {
	$dots_set=$dots[0];
	if ( $dots_cnt>300 ) $dots_cnt=300;//no more than 300 dots for JpGraph!
	for ( $i=1; $i<=$dots_cnt; $i++ ) $dots_set=$dots_set.";".$dots[$i];
	if ( $dots_cnt>2 ) {//no chance to build graph from less than two dots
		echo "
<center><input type='image' src='fgraphgd.php?dots_cnt=$dots_cnt&dots_set=$dots_set'></center>";
	}
}

mysql_free_result( $res1 );
ob_end_flush();//unlock output to set cookies properly!
?>
