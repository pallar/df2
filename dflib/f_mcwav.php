<?php
/*
DF_2: dflib/f_mcw1.php
report: extracting by cow (one lact)
created: 08.01.2010
modified: 17.02.2012
*/

ob_start();//lock output to set cookies properly!

//$df=1; $mf=8; $yf=2009;
//$dl=2; $ml=8; $yl=2009;
//$dc=1; $mc=6; $yc=2009;

//echo "$df-$mf-$yf..$dl-$ml-$yl $dc-$mc-$yc<br>";

$cowid=$cow_id;
while ( $yc<=$yl+1 ) {
	$dbt=Int2StrZ( $yc, 4 ).Int2StrZ( $mc, 2 )."_m";
	if ( $yc*100+$mc<=$yl*100+$ml ) {
//SPECIAL SELECT. BE CAREFUL, NO INCLUDE POSSIBLE! [BEGIN]
		$query="SELECT
		 d.day, d.month, d.year,
		 d.milk_kg,
		 d.milk_time,
		 d.bd_num,
		 d.kg_30s, d.kg_60s, d.kg_90s
		 FROM $dbt d
		 WHERE d.cow_id=$cowid AND d.bd_num<>0";
		$query=$query." ORDER BY d.code";
		$res=mysql_query( $query, $db );
		$error=mysql_errno();
//SPECIAL SELECT. BE CAREFUL, NO INCLUDE POSSIBLE! [END]
		if ( $error==0 ) { while ( $row=mysql_fetch_row( $res )) {
			$dc=$row[0]*1;
			$odt=$yc*10000+$mc*100+$dc;
			if ( $odt>$yl*10000+$ml*100+$dl | $odt<$yf*10000+$mf*100+$df );
			else {
				$bd=$row[5]*1;
				if ( $bd>0 ) {//IN THIS REPORT ONE VALID RESTRICTION IS BD>0
					$m=$row[3]*1;
					$mtime=$row[4];
					$milk_kg[$cowid]=$milk_kg[$cowid]+$m;
					$vl=$vl+$m;
					$tt=split( ":", $mtime ); $t_sec=$tt[0]*60+$tt[1]*1;
					$milk_time[$cowid]=$milk_time[$cowid]+$t_sec;
//ONLY IN THIS REPORT [BEGIN]
//init cow's totals
					if ( $milk_q[$cowid]==0 ) { $milk_min[$cowid]=-1; $milkm_min[$cowid]=-1;}
					$milk_q[$cowid]=$milk_q[$cowid]+1;
//calc lactation days
					if ( $la_days[$cowid][$odt]==0 ) {
						$lact_days[$cowid]=$lact_days[$cowid]+1;
						$la_days[$cowid][$odt]=1;
					}
//calc sessions quantity
					if ( $m>$milk_max[$cowid] ) { $milk_max[$cowid]=$m; /*echo "$odt<br>";*/ }
					if ( $milk_min[$cowid]<0 ) $milk_min[$cowid]=$m;
//cut total zero values [BEGIN]
					if ( $m<$milk_min[$cowid] & $m>0 ) $milk_min[$cowid]=$m;
//cut total zero values [END]
//calc intensities [BEGIN]
					$m1=$row[6]*1; $m2=$row[7]*1; $m3=$row[8]*1;
					$milkm_q[$cowid]=$milkm_q[$cowid]+3;
					if ( $t_sec<90 ) { $milkm_q[$cowid]=$milkm_q[$cowid]-1; $m3=0;}
					if ( $t_sec<60 ) { $milkm_q[$cowid]=$milkm_q[$cowid]-1; $m2=0;}
					if ( $t_sec<30 ) { $milkm_q[$cowid]=$milkm_q[$cowid]-1; $m1=0;}
					$milkm_kg[$cowid]=$milkm_kg[$cowid]+$m1+$m2+$m3;
					$mmax=$m1;
					if ( $m2>$mmax ) $mmax=$m2;
					if ( $m3>$mmax ) $mmax=$m3;
//cut intensity zero values [BEGIN]
					if ( $m1+$m2+$m3>0 ) {
						if (( $m1<$milkm_min[$cowid] & $m1>0 ) | ( $m1>0 & $milkm_min[$cowid]<0 ))
							$milkm_min[$cowid]=$m1;
						if (( $m2<$milkm_min[$cowid] & $m2>0 ) | ( $m2>0 & $milkm_min[$cowid]<0 ))
							$milkm_min[$cowid]=$m2;
						if (( $m3<$milkm_min[$cowid] & $m3>0 ) | ( $m3>0 & $milkm_min[$cowid]<0 ))
							$milkm_min[$cowid]=$m3;
					}
//cut intensity zero values [END]
					if ( $mmax>$milkm_max[$cowid] ) $milkm_max[$cowid]=$mmax;
//calc intensities [END]
//					if ( $cowid*1==67 ) echo "$dc $mc $yc $odt $m1 $m2 $m3 $milkm_max[$cowid]<br>";//output control
//ONLY IN THIS REPORT [END]
				}
			}
		} mysql_free_result( $res );}
	} else {
		$cw_lact_days=$lact_days[$cowid];
		$cw_mi_total=$milk_kg[$cowid];
		$cw_mi_q=$milk_q[$cowid];
		$cw_mi_max=$milk_max[$cowid];
		$cw_mi_min=$milk_min[$cowid];
		$cw_mim_total=$milkm_kg[$cowid];
		$cw_mim_q=$milkm_q[$cowid];
		$cw_mim_max=$milkm_max[$cowid];
		$cw_mim_min=$milkm_min[$cowid];
		$m=$milk_kg[$cowid];
//PATCH VALUES LESS THEN 0
		if ( $cw_mi_min<0 ) $cw_mi_min=0;
		if ( $cw_mim_min<0 ) $cw_mim_min=0;
		if ( $m<>0 ) {
//ONLY IN THIS REPORT [BEGIN]
			$res2=mysql_query( "UPDATE $cows SET
			 lact_days='$cw_lact_days',
			 milk_total='$cw_mi_total',
			 milk_q='$cw_mi_q',
			 milk_max='$cw_mi_max',
			 milk_min='$cw_mi_min',
			 milkm_total='$cw_mim_total',
			 milkm_q='$cw_mim_q',
			 milkm_max='$cw_mim_max',
			 milkm_min='$cw_mim_min'
			 WHERE id=$cowid", $db );
			if ( $cw_mi_q>0 ) $cw_mi_aver=floor( $cw_mi_total/$cw_mi_q*10 )/10;
			else $cw_mi_aver="";
			if ( $ca_mim_q>0 ) $cw_mim_aver=floor( $cw_mim_total/$cw_mim_q*10 )/10;
			else $cw_mim_aver="";
//ONLY IN THIS REPORT [END]
		}
		return;
	}
	if ( $mc<12 ) $mc++; else { $mc=1; $yc++;}
}

ob_end_flush();//unlock output to set cookies properly!
?>
