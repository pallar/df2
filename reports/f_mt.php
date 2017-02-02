<?php
/*
DF_2: reports/f_mt.php
report: extracting by table
created: 25.12.2005
modified: 04.06.2014
*/

$graph=$_GET[graph]*1;
$title_=$_GET[title];

$restrict_field=$_GET[select_field];

$outsele__=$outsele_;//ERROR!!!
$outsele_field__=$outsele_field_;//ERROR!!!

$t_cows=0;

include( "f_jfilt.php" );
include( "fhead.php" );

if ( $title_==$ged['RR2102'] ) $title_next=$ged['RR2102-'];
if ( $title_==$ged['RR2103'] ) $title_next=$ged['RR2103-'];
if ( $title_==$ged['RR2103.A'] ) $title_next=$ged['RR2103.A-'];
if ( $title_==$ged['RR2104'] ) $title_next=$ged['RR2104-'];
if ( $title_==$ged['RR0301'] ) $title_next=$ged['RR0301-'];

$outsele_=$outsele__;//ERROR!!!
$outsele_field_=$outsele_field__;//ERROR!!!

$t_m=0; $t_mmast=0; $idtotal=0; $dots_cnt=0;
$repbeg=$yf.$mf.$df; $repend=$yl.$ml.$dl;

if ( $outsele_*1==-1 ) $db_id=0; else $db_id=21;

if ( $graph<1 ) {
	echo "
<table cellspacing='1' class='st2'>
<tr $cjust class='st_title2' style='height:28px'>
	<td rowspan='2' width='7%'><b>".$ged['Number']."</b></td>";
	if ( $outsele_*1==-1 ) echo "
	<td rowspan='2'><b>".$ged['Nick']."&nbsp;/&nbsp".$ged['Group']."</b></td>";
	else echo "
	<td rowspan='2'><b>".$ged['Name']."</b></td>";
	echo "
	<td colspan='5'><b>".$ged['Milk'].",".$ged['kg']."</b></td>
	<td colspan='2'><b>".$ged['Start/Stop']."</b></td>
	<td rowspan='2' width='50px'><b>".$ged['Animals']."</b></td>
	<td rowspan='2' width='167px'><b>".$ged['Starting']."</b></td>
	<td rowspan='2' width='167px'><b>".$ged['Ending']."</b></td>
	<td rowspan='2' width='7%'><b>".$ged['Duration']."</b></td>
</tr>
<tr $cjust class='st_title2'>
	<td width='7%'><b>".$ged['total_']."</b></td>
	<td width='7%'><b>".$ged['average']."</b></td>
	<td width='7%'><b>".PhraseCarry( $ged['average:animal'], "/", 1)."</b></td>
	<td width='7%'><b>".PhraseCarry( $ged['average:date'], "/", 1)."</b></td>
	<td width='7%'><b>".$ged['mastit']."</b></td>
	<td width='50px'><b>".$ged['total_']."</b></td>
	<td width='50px'><b>"."0&nbsp;".$ged['kg']."</b></td>
</tr>";
}

while ( $yc<=$yl+1 ) {
	$dbt=Int2StrZ( $yc, 4 ).Int2StrZ( $mc, 2 )."_m";
	if ( $yc*100+$mc<=$yl*100+$ml ) {
		include( "f_jselm.php" );//DONT TOUCH THIS INCLUDE
		if ( $error<1 ) { while ( $row=mysql_fetch_row( $res )) {//cut errors
			$dc=$row[1]*1;//operation's day
			$odt=$yc.$mc.$dc;//operation's date
			if ( $odt>$repend | $odt<$repbeg );
			else {//operation's in period, thats calc
				$bd=$row[17]*1;
				if ((( trim( $filt_dev."." )!="." ) & ( $bd>=$bd_first ) & ( $bd<=$bd_last )) | (( trim( $filt_dev."." )=="." ) & ( $bd>0 ))) {
					$r=$row[$db_id]*1;//id
					$cowid=$row[0]*1;
					if ( $cowuniq[$cowid]==0 ) $t_cows++;
					if ( $cowuniq[$cowid]==0 ) $r_cows[$r]++;
					if ( $cowdtuniq[$cowid][$odt]==0 ) $r_dt[$r]++;
					$cowuniq[$cowid]=1;
					$cowdtuniq[$cowid][$odt]=1;
					$mdt=$row[1].".".$row[2].".".$row[3];//operation's date
					$m=$row[4]*1;//operations's milk
					$r_mq[$r]++; $t_mq++;//quantity of opers by id, total quantity of opers
					if ( $m==0 ) {//with milk==0: quantity of opers by id, total quantity of opers
						$r_m0q[$r]++; $t_m0q++;
					}
					$mbeg=$row[5]; $mend=$row[6]; $mtime=$row[7];//operation's begin, end & time
					$mast_4=$row[14]*1;//mastitus
					$r_m[$r]=$r_m[$r]+$m;//milk by id
					$t_m=$t_m+$m;//total milk
					if ( $mast_4>0 & $mast_4<5555 ) {//with mastitus: milk by id & total milk
						$r_mmast[$r]=$r_mmast[$r]+$m;
						$t_mmast=$t_mmast+$m;
					}
					$tt=split( ":", $mtime ); $tsec=$tt[0]*60+$tt[1]*1;//total time
					$r_tsec[$r]=$r_tsec[$r]+$tsec;
					if ( $r_beg[$r]*1==0 ) {
						$r_beg[$r]=$mdt.", ".$mbeg."..".$mend;
						$r_end[$r]=$r_beg[$r];
					} else $r_end[$r]=$mdt.", ".$mbeg."..".$mend;
				}
			}
		} mysql_free_result( $res );}
	} else {
		if ( $outsele_*1==-1 ) $res1=mysql_query( "SELECT $cows.id, $cows.cow_num, $cows.nick, $groups.nick FROM $cows, $groups WHERE $cows.gr_id=$groups.id ORDER BY cow_num*1", $db );
		else $res1=mysql_query( "SELECT id, num, nick FROM $outsele_table ORDER BY nick", $db );
		if ( mysql_errno()<1 ) { while ( $row=mysql_fetch_row( $res1 )) {
			$r=$row[0]*1;
			if ( $r_mq[$r]>0 ) {
				$idtotal++;
				if ( $r_mq[$r]==0 ) {
					$r_m1=""; $r_mq[$r]="";
				} else {
					$r_m1=floor( $r_m[$r]/$r_mq[$r]*10 )/10;
				}
				if ( $r_cows[$r]==0 ) {
					$r_m2=""; $r_cows[$r]="";
				} else {
					$r_m2=floor( $r_m[$r]/$r_cows[$r]*10 )/10;
				}
				if ( $r_dt[$r]==0 ) {
					$r_m3=""; $r_dt[$r]="";
				} else {
					$r_m3=floor( $r_m[$r]/$r_dt[$r]*10 )/10;
				}
				if ( $r_mmast[$r]==0 ) $r_mmast[$r]="";
				if ( $r_m0q[$r]==0 ) $r_m0q[$r]="";
				if ( $graph<1 ) {//show text report, not diagram
					$num=$cownum_div.$row[1].$cownum_div1;
					$nick=$row[2];
					$tsec=$r_tsec[$r]; $t_hh=floor( $tsec/3600 );
					$tsec=$tsec-$t_hh*3600; $t_mm=floor( $tsec/60 );
					$tsec=$tsec-$t_mm*60; $t_ss=$tsec;
					if ( $t_hh*1<10 ) $t_hh="0".$t_hh;
					if ( $t_mm*1<10 ) $t_mm="0".$t_mm;
					if ( $t_ss*1<10 ) $t_ss="0".$t_ss;
					RepTr( $rownum );
					if ( $outsele_*1==-1 ) {
						$nick1=$nick."&nbsp;/&nbsp;".$row[3];
						$nick_=StrCutLen( $nick, 27 )."<br>/&nbsp;".$row[3];
					} else {
						$nick1=$nick;
						$nick_=StrCutLen( $nick, 27 );
					}
					$title_next_=$title_next.":&nbsp;".$nick;
					if ( $db_id+$noCSS<1 ) echo "
	<td $rjust onmouseover='style.cursor=\"pointer\"'><a href='../".$hFrm['0520']."?cow_id=$r&ret0=-1'><b>$num</b></td>
	<td title='$nick1' onmouseover='style.cursor=\"pointer\"'><a href='../".$hFrm['0520']."?cow_id=".$row[0]."&ret0=-1'>$nick_&nbsp;</td>";
					else echo "
	<td $rjust>$num</td>
	<td title='$nick'>$nick_&nbsp;</td>";
					if ( $noCSS ) echo "
	<td $rjust>$r_m[$r]&nbsp;</td>"; else echo "
	<td $rjust onmouseover='style.cursor=\"pointer\"'><a href='../".$hRep['m']."?restrict_id=$r&restrict_field=$restrict_field&restrict_by_field=1&title=$title_next_'>$r_m[$r]&nbsp;</td>";
					echo "
	<td $rjust>$r_m1&nbsp;</td>
	<td $rjust>$r_m2&nbsp;</td>
	<td $rjust>$r_m3&nbsp;</td>
	<td $rjust>$r_mmast[$r]&nbsp;</td>
	<td $rjust>$r_mq[$r]&nbsp;</td>
	<td $rjust>$r_m0q[$r]&nbsp;</td>
	<td $rjust>$r_cows[$r]&nbsp;</td>
	<td>$r_beg[$r]&nbsp;</td>
	<td>$r_end[$r]&nbsp;</td>
	<td $rjust>$t_hh:$t_mm:$t_ss&nbsp;</td>
</tr>";
				} else {//show diagram
					$dots[$dots_cnt]=$mrow[$r];
					$dots_cnt++;
				}
			}
		} mysql_free_result( $res1 );}
		break;
	}
	if ( $mc<12 ) $mc++; else { $mc=1; $yc++;}
}

if ( $graph<1 ) {
	if ( $t_mq>0 ) $t_m1=round( $t_m/$t_mq, 1 ); else $t_m1="";
	if ( $t_cows>0 ) $t_m2=round( $t_m/$t_cows, 1 ); else $t_m2="";
	echo "
<tr class='st_title2'>
	<td $cjust><b>".$ged['TOTAL'].":</b></td>
	<td $rjust><b>$idtotal&nbsp;</b></td>
	<td $rjust><b>$t_m&nbsp;</b></td>
	<td $rjust><b>$t_m1&nbsp;</b></td>
	<td $rjust><b>$t_m2&nbsp;</b></td>
	<td $rjust><b>&nbsp;</b></td>
	<td $rjust><b>$t_mmast&nbsp;</b></td>
	<td $rjust><b>$t_mq&nbsp;</b></td>
	<td $rjust><b>$t_m0q&nbsp;</b></td>
	<td $rjust><b>$t_cows&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
</tr>
</table><br>";

} else {
	$dots_set=$dots[0];
	if ( $dots_cnt>300 ) $dots_cnt=300;//no more than 300 dots for JpGraph!
	for ( $i=1; $i<=$dots_cnt; $i++ )
		$dots_set=$dots_set.";".$dots[$i];
	if ( $dots_cnt>2 ) {//no chance to build graph from less than two dots
		echo "
<br>
<font size='5'><b>&#8661;</b></font>&nbsp;".$ged['Milk'].",".$ged['kg']."
<center><input type='image' src='fgraphgd.php?dots_cnt=$dots_cnt&dots_set=$dots_set'></center>";
	} else;
}

ob_end_flush();//unlock output to set cookies properly!
?>
