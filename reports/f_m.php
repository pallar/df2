<?php
/* DF_2: reports/f_m.php
report: extracting
c: 25.12.2005
m: 29.09.2015 */

$skip_clichk=1;

ob_start();//lock output to set cookies properly!

$title_=$_GET['title'];
if ( strlen( $title_ )<=1 ) $title_=$php_mm["_01_tab1_cap"];
$graph=$_GET['graph']*1;
$noCSS=$_GET['noCSS']*1;

$outsele_=-1; $outsele_table=-1; $outsele_field=-1;
$restrict_by_field=$_GET[restrict_by_field]*1;
$restrict_field=$_GET[restrict_field];
$restrict_id=$_GET[restrict_id]*1;

$_GET[rep_order];
if ( $rep_order=="kg" ) {
	$kg_order="&nabla;";
	$kg_30s_order="";
	$kg_60s_order="";
	$kg_90s_order="";
	$null_order="";
} elseif ( $rep_order=="kg_30s" ) {
	$kg_order="";
	$kg_30s_order="&nabla;";
	$kg_60s_order="";
	$kg_90s_order="";
	$null_order="";
} elseif ( $rep_order=="kg_60s" ) {
	$kg_order="";
	$kg_30s_order="";
	$kg_60s_order="&nabla;";
	$kg_90s_order="";
	$null_order="";
} elseif ( $rep_order=="kg_90s" ) {
	$kg_order="";
	$kg_30s_order="";
	$kg_60s_order="";
	$kg_90s_order="&nabla;";
	$null_order="";
} else {
	$kg_order="";
	$kg_30s_order="";
	$kg_60s_order="";
	$kg_90s_order="";
	$null_order="&nabla;";
}

include( "f_jfilt.php" );
include( "fhead.php" );
include( "../locales/$lang/f_rrm._$lang" );
include( "../dflib/f_filt1.php" );

if ( $restrict_id<1 ) {
	if ( $filts1>-1 ) {
		$restrict_by_field=1;
		$restrict_field="d.gr_id";
		$restrict_id=$filts1;
	}
	if ( $filts2>-1 ) {
		$restrict_by_field=1;
		$restrict_field="d.lot_id";
		$restrict_id=$filts2;
	}
}

$rows_cnt=0; $vl=0;
$cows_cnt=0; $t_sec=0;
$dots_cnt=0;

if ( $graph<1 ) {
	echo "
<table cellspacing='1' class='st2'>
<tr $cjust class='st_title2' style='height:28px'>
	<td width='1%'><b><a href='$PHP_SELF'>".$ged['Date']."</a></b></td>
	<td width='55px'><b>".$ged['Number']."</b></td>
	<td><b>".$ged['Nick']."</b></td>
	<td width='3%'><b>".$ged['Lot']."</b></td>
	<td width='3%'><b>".$ged['Group']."</b></td>
	<td width='7%'><b><a href='$PHP_SELF?rep_order=kg'>".PhraseCarry( $ged['Milk'].",".$ged['kg'], ",", 1 ).$kg_order."</a></b></td>
	<td title='".$ged['00-30s,kg_tip']."' width='30px'><b><a href='$PHP_SELF?rep_order=kg_30s'>".PhraseCarry( $ged['00-30s,kg'], ",", 1 ).$kg_30s_order."</a></b></td>
	<td title='".$ged['31-60s,kg_tip']."' width='30px'><b><a href='$PHP_SELF?rep_order=kg_60s'>".PhraseCarry( $ged['31-60s,kg'], ",", 1 ).$kg_60s_order."</a></b></td>
	<td title='".$ged['61-90s,kg_tip']."' width='30px'><b><a href='$PHP_SELF?rep_order=kg_90s'>".PhraseCarry( $ged['61-90s,kg'], ",", 1 ).$kg_90s_order."</a></b></td>
	<td title='".$ged['kg/min._tip']."' width='30px'><b>".PhraseCarry( $ged['kg/min.'], "/", 1 )."</b></td>
	<td width='30px'><b>".$ged['TAG,0~']."</b></td>
	<td width='30px'><b>".$ged['Starting']."</b></td>
	<td width='30px'><b>".$ged['Dev._cmd_t~']."</b></td>
	<td width='30px'><b>".$ged['Interv.~']."</b></td>
	<td title='".$ged['Start_manual']."' width='17px'><b>".$ged['Start_manual~']."</b></td>
	<td title='".$ged['Start_retr.']."' width='17px'><b>".$ged['Start_retr.~']."</b></td>
	<td title='".$ged['Break_done']."' width='17px'><b>".$ged['Break_done~']."</b></td>
	<td title='".$ged['Exhaust']."' width='17px'><b>".$ged['Exhaust~']."</b></td>
	<td title='".$ged['M.']."' width='3%'><b>".$ged['M.~']."</b></td>";
	if ( $conductiv_vis==1 ) echo "
	<td title='".$ged['Conduct.']."' width='3%'><b>".$ged['Conduct.~']."</b></td>";
	echo "
	<td title='".$ged['T.']."' width='3%'><b>".$ged['T.~']."<b></td>
	<td title='".$ged['O.']."' width='3%'><b>".$ged['O.~']."<b></td>
	<td title='".$ged['Dev.']."' width='17px'><b>".$ged['Dev.~']."</b></td>";
	echo "
</tr>";
}

$yf1=$yf*10000; $mf1=$mf*100;
$yl1=$yl*10000; $ml1=$ml*100;

if ( $df<10 ) $date1="0"; $date1=$date1.$df."-";
if ( $mf<10 ) $date1=$date1."0"; $date1=$date1.$mf."-";
$date1=$date1.$yf;
if ( $dl<10 ) $date2="0"; $date2=$date2.$dl."-";
if ( $ml<10 ) $date2=$date2."0"; $date2=$date2.$ml."-";
$date2=$date2.$yl;

if ( DaysBetween( $date1, $date2 )>7 )
	echo "
<center><h2><blink>".$ged['Period_restricted_007']."</blink></h2>";
else while ( $yc<=$yl+1 ) {
	$dbt=Int2StrZ( $yc, 4 ).Int2StrZ( $mc, 2 )."_m";
	$yc1=$yc*10000; $mc1=$mc*100;
	if ( $yc1+$mc1<=$yl1+$ml1 ) {
		$query="SELECT
		 d.cow_id,
		 d.day, d.month, d.year,
		 d.milk_kg,
		 d.milk_begin, d.milk_end,
		 d.milk_time,
		 d.id_time, d.rep_time,
		 d.manual, d.retries, d.stopped, d.exhaust,
		 d.mast_4, d.tr, d.ov,
		 d.bd_num,
		 c.cow_num, c.nick,
		 $lots.nick, $groups.nick,
		 d.kg_30s, d.kg_60s, d.kg_90s, d.str_res, d.r, d.comments, d.gr_id";
		$query=$query."
		 FROM $dbt d, $cows c, $lots, $groups
		 WHERE c.id=d.cow_id AND $lots.id=d.lot_id AND $groups.id=d.gr_id";
		if ( $restrict_by_field>0 ) $query=$query." AND $restrict_field=$restrict_id";
		if ( $filt_cowid>0 ) $query=$query." AND d.cow_id=$filt_cowid";
		$query=$query.$WHEREADV;
		if ( $null_order=="&nabla;" )
			$query=$query." "."
			 ORDER BY d.code";
		elseif ( $kg_order=="&nabla;" )
			$query=$query." "."
			 ORDER BY d.year, d.month, d.day, d.milk_kg";
		elseif ( $kg_30s_order=="&nabla;" )
			$query=$query." "."
			 ORDER BY d.year, d.month, d.day, d.kg_30s";
		elseif ( $kg_60s_order=="&nabla;" )
			$query=$query." "."
			 ORDER BY d.year, d.month, d.day, d.kg_60s";
		elseif ( $kg_90s_order=="&nabla;" )
			$query=$query." "."
			 ORDER BY d.year, d.month, d.day, d.kg_90s";
		$res=mysql_query( $query, $db );
		if ( mysql_errno()<1 ) { while ( $row=mysql_fetch_row( $res )) {
			$dc=$row[1]*1; $odt=$yc1+$mc1+$dc;
			if ( $odt>$yl1+$ml1+$dl );
			else if ( $odt<$yf1+$mf1+$df );
			else {
				$dev_num=$row[17]; $dev=$dev_num*1;
				if (( trim( $filt_dev."." )!="." & $dev>=$bd_first & $dev<=$bd_last ) | ( trim( $filt_dev."." )=="." & $dev>0 )) {
					$m=$row[4];
					if ( $graph<1 ) {
						$dd=$row[1]; $mm=$row[2]; $yyyy=$row[3];
						$cownum=$cownum_div.$row[18].$cownum_div1;
						$cownick=$row[19];
						$ltnick=$row[20];
						$grnick=$row[21];
						$mbeg=$row[5]; $mend=$row[6];
						$mtime=$row[7];
						$idtime=$row[8]; $reptime=$row[9];
						$manual=$C[$row[10]*1];
						$retries=$row[11]*1; if ( $retries<1 ) $retries="";
						$stopped=$C[$row[12]*1];
						$exhaust=$C[$row[13]*1];
						$sim=$row[26]; if ( $sim>0 ) $sim=round( 10000/$sim, 1 ); else $sim="";
						$mastit=$C[0]; $mast_4=$row[14]*1;
						if ( $mast_4>=0 & $mast_4<5555 ) $mastit=$row[14];
						if ( $mast_4==5555 ) $mastit=$C[1];
						$tr=$C[$row[15]];
						$ov=$C[$row[16]];
						if ( trim( $stat )=="," ) $stat="";
						$m1=$row[22]; $m2=$row[23]; $m3=$row[24];
//NEXT 'if' IS NOT READY YET (IT MUST BE USED FOR IMPORTED FARM-1 DATA)
						if ( strlen( $row[27] )!=8 ) {
							if ( $m3>0 ) {
								if ( $m2>0 ) $m3=( $m3-$m2 )*2;
								else $m3=( $m3-$m1 )*2;
							}
							if ( $m2>0 & $m1<=$m2 ) $m2=( $m2-$m1 )*2;
							$m1=$m1*2;
						}
						$rfid_res=$row[25];
						$cownick_sh=StrCutLen( $cownick, 8 );
						$ltnick_sh=StrCutLen( $ltnick, 12 ); if ( $ltnick==$ltnick_sh ) $ltnick="";
						$grnick_sh=StrCutLen( $grnick, 12 ); if ( $grnick==$grnick_sh ) $grnick="";
						$tt=split( ":", $mtime ); $tt=$tt[0]*60+$tt[1]; if ( $tt>0 ) $m99=round( $m/$tt*60, 1 ); else $m99=0;
						if ( $filt_cowid<=0 ) $m_url="onmouseover='style.cursor=\"pointer\"'><a href='../".$hRep['m']."?filt_cowid=".$row[0]."&title=".$ged['RR0301-'].":&nbsp;".$cownick."' target='w1'";
						else $m_url="onmouseover='style.cursor=\"pointer\"'><a href='../".$hRep['mcws1']."?filt_cowid=".$row[0]."&title=".$ged['RR0301-'].":&nbsp;".$cownick."'";
						RepTr1( $rownum, $rjust );
						if ( $grnick_sh!=$grnickprv_sh ) {
							if ( $gr_col==0 | $gr_col=="99ff99" ) $gr_col="9999ff"; else $gr_col="99ff99";
							$grnickprv_sh=$grnick_sh;
						}
						echo "
	<td>".$dd.".".$mm.".".$yyyy."</td>";
						if ( $noCSS ) echo "
	<td>".$cownum."</td>"; else echo "
	<td onmouseover='style.cursor=\"pointer\"'><a href='../".$hFrm['0520']."?cow_id=".$row[0]."&ret0=-1' target='w1'>".$cownum."</td>";
						echo "
	<td $ljust title='$cownick'>".$cownick_sh."&nbsp;</td>
	<td $ljust title='$ltnick'>".$ltnick_sh."&nbsp;</td>";
						if ( $noCSS ) echo "
	<td $ljust title='$grnick'>".$grnick_sh."&nbsp;</td>
	<td>".$m."&nbsp;</td>"; else echo "
	<td $ljust style='background:#".$gr_col."' title='$grnick'>".$grnick_sh."&nbsp;</td>
	<td $m_url>".$m."&nbsp;</td>";
						echo "
	<td>".$m1."&nbsp;</td>
	<td>".$m2."&nbsp;</td>
	<td>".$m3."&nbsp;</td>
	<td>".$m99."&nbsp;</td>
	<td>".$idtime."&nbsp;</td>
	<td>".$mbeg."&nbsp;</td>
	<td>".$mend."&nbsp;</td>
	<td>".$mtime."&nbsp;</td>
	<td $cjust>".$manual."&nbsp;</td>
	<td $cjust>".$retries."&nbsp;</td>
	<td $cjust>".$stopped."&nbsp;</td>
	<td $cjust>".$exhaust."&nbsp;</td>
	<td $cjust>".$mastit."&nbsp;</td>";
						if ( $conductiv_vis==1 ) echo "
	<td $cjust>".$sim."&nbsp;</td>";
						echo "
	<td $cjust>".$tr."&nbsp;</td>
	<td $cjust>".$ov."&nbsp;</td>
	<td title='".$rfid_res."'>#".$dev_num."</td>";
						echo "
</tr>";
					}
					$rows_cnt++;
					$vl+=$m;
					$vl30_1+=$m1;
					$vl30_2+=$m2;
					$vl30_3+=$m3;
					$vl60+=$m99;
					$t_sec+=$tt;
					if ( $cow[$row[0]*1]!=1 ) $cows_cnt++;
					$cow[$row[0]*1]=1;
					$dots[$dots_cnt]=$m;
					$dots_cnt++;
				}
			}
		} mysql_free_result( $res );}
	}
	if ( $mc<12 ) $mc++; else { $mc=1; $yc++;}
}

if ( $rows_cnt!=0 ) {
	$vl30_1=round( $vl30_1/$rows_cnt, 1 );
	$vl30_2=round( $vl30_2/$rows_cnt, 1 );
	$vl30_3=round( $vl30_3/$rows_cnt, 1 );
	$vl60=round( $vl60/$rows_cnt, 1 );
} else {
	$vl30_1=""; $vl30_2=""; $vl30_3=""; $vl60="";
}
$t_hh=floor( $t_sec/3600 ); $t_sec=$t_sec-$t_hh*3600;
$t_mm=floor( $t_sec/60 ); $t_sec=$t_sec-$t_mm*60;
$t_ss=$t_sec;
if ( $t_hh<10 ) $t_hh="0".$t_hh;
if ( $t_mm<10 ) $t_mm="0".$t_mm;
if ( $t_ss<10 ) $t_ss="0".$t_ss;

if ( $graph<1 ) {
	echo "
<tr class='st_title2' style='height:28px'>
	<td $cjust><b>".$ged['TOTAL'].":</b></td>
	<td $rjust><center>".$ged['dairy_cycles'].":</center><b>$rows_cnt&nbsp;</b></td>
	<td $rjust><center>".$ged['animals'].":</center><b>$cows_cnt&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td $rjust><b>$vl&nbsp;</b></td>
	<td $rjust><b>$vl30_1&nbsp;</b></td>
	<td $rjust><b>$vl30_2&nbsp;</b></td>
	<td $rjust><b>$vl30_3&nbsp;</b></td>
	<td $rjust><b>$vl60&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td $rjust></b>$t_hh:<br>$t_mm:$t_ss&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>";
	if ( $conductiv_vis==1 ) echo "
	<td><b>&nbsp;</b></td>";
	echo "
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>
	<td><b>&nbsp;</b></td>";
	echo "
</tr>
</table><br>";

} else {
	$dots_set=$dots[0];
	if ( $dots_cnt>300 ) $dots_cnt=300;//no more than 300 dots for JpGraph!
	for ( $i=1; $i<=$dots_cnt; $i++ ) $dots_set=$dots_set.";".$dots[$i];
	if ( $dots_cnt>2 ) {//no chance to build graph from less than two dots
		echo "
<br>
<font size='5'><b>&#8661;</b></font>&nbsp;".$ged['Milk,kg']."
<center><input type='image' src='fgraphgd.php?dots_cnt=$dots_cnt&dots_set=$dots_set'></center>
<center><font size='5'><b>&hArr;</b></font>&nbsp;".$ged["Dairy_cycle"]."</center>";
	} else;
}

ob_end_flush();//unlock output to set cookies properly!
?>
