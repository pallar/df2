<?php
/*
DF_2: dflib/f_mcw.php
report: extracting by cow
created: 19.11.2007
modified: 17.02.2012
*/

ob_start();//lock output to set cookies properly!

$B[1]="+"; $B[0]="-"; $C[1]="+"; $C[0]=" ";

$i=0; $vl=0; $cows_cnt=0; $t_sec=0; $dots_cnt=0;

$odt_beg=$yf*10000+$mf*100+$df;
$odt_end=$yl*10000+$ml*100+$dl;

while ( $yc<=$yl+1 ) {
	$dbt=Int2StrZ( $yc, 4 ).Int2StrZ( $mc, 2 )."_m";
	if ( $yc*100+$mc<=$yl*100+$ml ) {
		$query="SELECT
		 d.cow_id,
		 d.day, d.month, d.year,
		 d.milk_kg,
		 d.milk_begin, d.milk_end,
		 d.milk_time,
		 d.id_time, d.rep_time,
		 d.manual, d.retries, d.stopped, d.exhaust,
		 d.mast_4,
		 d.tr, d.ov,
		 d.bd_num,
		 c.cow_num, c.nick,
		 c.id, d.kg_30s, d.kg_60s, d.kg_90s
		 FROM $dbt d, $cows c
		 WHERE c.id=$cow_id AND d.cow_id=c.id
		 ORDER BY d.code";
		$res=mysql_query( $query, $db );
		$sqlerr=mysql_errno();
		if ( $sqlerr==0 ) { while ( $row=mysql_fetch_row( $res )) {
			$dc=$row[1]*1;
			$odt=$yc*10000+$mc*100+$dc;
			if ( $odt<$odt_beg | $odt>$odt_end );
			else {
				$bd=$row[17]*1;
				$cowid=$row[0]*1;
				$m=$row[4]*1;
				$mbeg=$row[5]; $mend=$row[6]; $mtime=$row[7];
				$milk_kg[$cowid]=$milk_kg[$cowid]+$m;
				$vl=$vl+$m;
				$tt=split( ":", $mtime ); $t_sec=$tt[0]*60+$tt[1]*1;
				$milk_time[$cowid]=$milk_time[$cowid]+$t_sec;
				if ( $milk_beg[$cowid]==0 ) {
					$milk_beg[$cowid]=$row[1].".".$row[2].".".$row[3].", ".$mbeg;
					$milk_end[$cowid]=$row[1].".".$row[2].".".$row[3].", ".$mend;
				} else $milk_end[$cowid]=$row[1].".".$row[2].".".$row[3].", ".$mend;
				for ( $j=0; $j<=$stat_days; $j++ ) if ( $odt==$minusdt[$j] ) {
					$minus_kg[$j]=$minus_kg[$j]+$m;
					$minus_mtime[$j]=$minus_mtime[$j]+$t_sec;
//ONLY IN THIS REPORT [BEGIN]
//init cow's totals
					if ( $milk_q[$j]==0 ) $milkm_min[$j]=-1;
					$milk_q[$j]=$milk_q[$j]+1;
					$milkm_q[$j]=$milkm_q[$j]+3;
					if ( $t_sec<90 ) { $milkm_q[$j]=$milkm_q[$j]-1; $m3=0;}
					if ( $t_sec<60 ) { $milkm_q[$j]=$milkm_q[$j]-1; $m2=0;}
					if ( $t_sec<30 ) { $milkm_q[$j]=$milkm_q[$j]-1; $m1=0;}
					$milkm_kg[$j]=$milkm_kg[$j]+$m1+$m2+$m3;
//calc intensities [BEGIN]
					$m1=$row[21]*1; $m2=$row[22]*1; $m3=$row[23]*1;
					$milkm_q[$j]=$milkm_q[$j]+3;
					$mmax=$m1; if ( $m2>$mmax ) $mmax=$m2; if ( $m3>$mmax ) $mmax=$m3;
//cut intensity zero values [BEGIN]
					if ( $m1+$m2+$m3>0 ) {
						if ( $m1<$milkm_min[$j] & $m1>0 ) $mmin=$m1;
						if ( $m2<$milkm_min[$j] & $m2>0 ) $mmin=$m2;
						if ( $m3<$milkm_min[$j] & $m3>0 ) $mmin=$m3;
						if ( $milkm_min[$j]<0 ) {
							$mmin=$m1;
							if ( $m2<$m1 & $m2>0 ) $mmin=$m2;
							if ( $m3<$m2 & $m3>0 ) $mmin=$m3;
						}
					}
//cut intensity zero values [END]
					if ( $mmax>$milkm_max[$j] ) $milkm_max[$j]=$mmax;
					if ( $milkm_min[$j]<0 ) $milkm_min[$j]=$mmin;
					if ( $mmin<$milkm_min[$j] ) $milkm_min[$j]=$mmin;
//					echo "$j $dc $mc $yc $odt $m1 $m2 $m3 $milkm_min[$j]<br>";//output control
//calc intensities [END]
				}
			}
		} mysql_free_result( $res );}
	} else {
		$m=$milk_kg[$cowid];
		$mbeg=$milk_beg[$cowid]; $mend=$milk_end[$r];
		$t_sec=$milk_time[$cowid]; $t_hh=floor( $t_sec/3600 );
		$t_sec=$t_sec-$t_hh*3600; $t_mm=floor( $t_sec/60 );
		$t_sec=$t_sec-$t_mm*60; $t_ss=$t_sec;
		if ( $t_hh*1<10 ) $t_hh="0".$t_hh;
		if ( $t_mm*1<10 ) $t_mm="0".$t_mm;
		if ( $t_ss*1<10 ) $t_ss="0".$t_ss;
		$dots[$dots_cnt]=$m;
		$dots_cnt++;
		return;
	}
	if ( $mc<12 ) $mc++; else { $mc=1; $yc++;}
}

ob_end_flush();//unlock output to set cookies properly!
?>
