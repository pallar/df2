<?php
/* DF_2: httpmon/common.php
c: 17.07.2006
m: 20.05.2015 */

function ClrParlorRow( $parlor, $bd_num ) {
	mysql_query( "UPDATE $parlor SET
	 dev_status = '',
	 cow_num = '', rfid_num = '', nick = '',
	 milk_kg = '', r = '',
	 milk_begin = '', milk_end = '', milk_time = '',
	 manual = '',
	 retries = '',
	 stopped = '',
	 exhaust = '',
	 mast = '', mast_4 = '',
	 tr = '',
	 ov = '',
	 modif_date = '', modif_time = ''
	 WHERE bd_num = '$bd_num'" ) or die( mysql_error());
}

function UpdateParlorRowTime( $parlor, $bd_num, $modif_d, $modif_t ) {
	mysql_query( "UPDATE $parlor SET
	 modif_date = '$modif_d', modif_time = '$modif_t'
	 WHERE bd_num = '$bd_num'" ) or die( mysql_error());
}

function UpdateParlorRowCow( $parlor, $bd_num, $rfid_native, $cow_num, $modif_d, $modif_t ) {
	mysql_query( "UPDATE $parlor SET
	 cow_num = '$cow_num',
	 rfid_num = '$rfid_native',
	 modif_date = '$modif_d', modif_time = '$modif_t'
	 WHERE bd_num = '$bd_num'" ) or die( mysql_error());
}

function DecodeSched( $c_halt, $restrict_sched, $modif_d ) {
	$dontuse = ""; $r_arr = split( ";", $restrict_sched );
	for ( $j = 0; $j < count( $r_arr )-1; $j++ ) {
		$d_arr = split( ":", $r_arr[$j] );
		if ( $d_arr[0] != "1990-01-01" & $modif_d >= $d_arr[0] ) {
			$schedhalt_date = $d_arr[0];
			$schedhalt = $d_arr[1];
		}
	}
	if ( strlen( $schedhalt ) > 1 ) {
		$mybit1 = substr( $schedhalt, 0, 1 );
		$c_halt = substr( $schedhalt, 1, 5 )*1;
		if ( $mybit1 != 0 ) {
			$days = DaysBetween( $modif_d, $schedhalt_date );
			if ( round( $days/2 ) == $days/2 ) $c_halt = 7;
		}
	} else
		$c_halt=$c_halt*1;
	$dontuse = ( $c_halt & 1 ).( $c_halt & 2 ).( $c_halt & 4 ).( $c_halt & 8 );
	return $dontuse;
}

function GetCowByNum( $parlor, $groups, $cows, $cow_num, $bd_num, $modif_d, $modif_t, $safe_rgb ) {
	$cow_num = $cow_num*1;
	$res = mysql_query( "SELECT
	 bd_leds,
	 cow_num,
	 rfid_native,
	 dont_use,
	 gr_id,
	 restrict_sched,
	 $groups.num
	 FROM $cows, $groups
	 WHERE cow_num*1 = '$cow_num' AND $groups.id = $cows.gr_id" ) or die( mysql_error());
	$a = mysql_fetch_row( $res ); mysql_free_result( $res );
	$c_halt = $a[3];
	if ( $a[1] == '' ) {
		$a[0] = '0';
		$a[1] = $cow_num;
		$a[6] = '0';
		$dontuse = '0000';
	} else {
		$restrict_sched = $a[5];
		if ( strlen( $restrict_sched ) > 1 ) {
			$dontuse = DecodeSched( $c_halt, $restrict_sched, $modif_d );
		} else
			$dontuse = ( $a[3] & 1 ).( $a[3] & 2 ).( $a[3] & 4 ).( $a[3] & 8 );
	}
	$grn = $a[6]*1;
	if ( $grn < 0 ) $grn = 0; if ( $grn <= 9 ) $grn = "0".$grn;
	echo "$a[0];$a[1];$a[2];$dontuse;$grn;";
	$gri = $a[4]*1;
	if ( $gri < 0 ) $gri = 0; if ( $gri <= 9 ) $gri = "0".$gri;
	mysql_query( "UPDATE $parlor SET
	 locked = '$safe_rgb[$gri]'
	 WHERE bd_num = '$bd_num'" ) or die( mysql_error());
}

function GetCowByTag( $parlor, $tags, $groups, $cows, $rfid_native, $bd_num, $rfid_excessivebytes, $modif_d, $modif_t, $safe_rgb, $jagg_attrs ) {
	$rfid_native = trim( $rfid_native );
	if ( strlen( $rfid_native ) >= 5 ) {
		$excess = $rfid_excessivebytes*1;
		if ( $excess == 0 ) {
			$res = mysql_query( "SELECT
			 bd_leds,
			 cow_num,
			 rfid_native,
			 dont_use,
			 gr_id,
			 restrict_sched,
			 $groups.num
			 FROM $cows, $groups
			 WHERE rfid_native = '$rfid_native' AND $groups.id = $cows.gr_id" ) or die( mysql_error());
			$a = mysql_fetch_row( $res );
			$c_leds = $a[0];
			$c_num = $a[1];
			$c_tag = $a[2];
			$c_halt = $a[3];
			$c_gri = $a[4];
			$c_dontuse = $a[5];
			$c_grn = $a[6];
		} else {
			$rfid_withoutexcess = trim( substr( $rfid_native, $excess, 45 ));
			$res = mysql_query( "SELECT
			 bd_leds,
			 cow_num,
			 rfid_native,
			 dont_use,
			 gr_id,
			 restrict_sched,
			 $groups.num
			 FROM $cows, $groups WHERE $groups.id = $cows.gr_id" ) or die( mysql_error());
			while ( $a = mysql_fetch_row( $res )) {
				$c0_leds = $a[0];
				$c0_num = $a[1];
				$c0_tag = trim( substr( $a[2], $excess, 45 ));
				$c0_halt = $a[3];
				$c0_gri = $a[4];
				$c0_dontuse = $a[5];
				$c0_grn = $a[6];
				if ( $rfid_withoutexcess == $c0_tag ) {
					$c_leds = $c0_leds;
					$c_num = $c0_num;
					$c_tag = $rfid_native;
					$c_halt = $c0_halt;
					$c_gri = $c0_gri;
					$c_dontuse = $c0_dontuse;
					$c_grn = $c0_grn;
				}
			}
		}
		mysql_free_result( $res );
	} else $c_num = '';
	if ( $c_num == '' ) {
		$c_leds = '0';
		$c_num = '0';
		$c_tag = '';
		$c_gri = 1;
		$dontuse = '0000';
		$c_grn = '0';
	} else {
		$restrict_sched = $c_dontuse;
		if ( strlen( $restrict_sched ) > 1 ) {
			$dontuse = DecodeSched( $c_halt, $restrict_sched, $modif_d );
		} else
			$dontuse = ( $c_halt & 1 ).( $c_halt & 2 ).( $c_halt & 4 ).( $c_halt & 8 );
	}
	if ( $bd_num*1 >= 999 ) {
		$jagg = 0;
		if ( $c_num == '0' ) {
			$res = mysql_query( "SELECT
			 rfid_native
			 FROM $tags
			 WHERE rfid_native = '$rfid_native'" ) or die( mysql_error());
			$res1 = mysql_fetch_row( $res );
			if ( $res1 == '' ) $jagg = -1;
		} else {
			if ( $c_halt*1 >= 32768 ) $jagg = 1;
			if ( $jagg_attrs > 0 ) {
				$ao0_='';
				$at0_='';
				$am0_='';
				if (( $jagg_attrs & 2 )*1 == 2 & ( $c_leds & 2 )*1 == 2 ) $jagg = 1;
				if (( $jagg_attrs & 4 )*1 == 4 & ( $c_leds & 4 )*1 == 4 ) $jagg = 1;
				if (( $jagg_attrs & 8 )*1 == 8 & ( $c_leds & 8 )*1 == 8 ) $jagg = 1;
			}
		}
		echo "$jagg";
		if ( $c_num == '0' ) {
			$res = mysql_query( "SELECT
			 rfid_native
			 FROM $tags
			 WHERE rfid_native = '$rfid_native'" ) or die( mysql_error());
			$res1 = mysql_fetch_row( $res );
			if ( $res1 == '' ) AppendCow( $tags, '-', $rfid_native, $modif_d, $modif_t );
		}
	} else {
		$grn = $c_grn*1;
		if ( $grn < 0 ) $grn = 0; if ( $grn <= 9 ) $grn = "0".$grn;
		echo "$c_leds;$c_num;$c_tag;$dontuse;$grn;";
		$gri = $c_gri*1;
		if ( $gri < 0 ) $gri = 0; if ( $gri <= 9 ) $gri = "0".$gri;
		mysql_query( "UPDATE $parlor SET
		 locked = '$safe_rgb[$gri]'
		 WHERE bd_num = '$bd_num'" ) or die( mysql_error());
	}
}

function GetIllCows( $cows ) {
	$res = mysql_query( "SELECT
	 rfid_native
	 FROM $cows
	 WHERE ( dont_use & 32768 )*1 = '32768'" ) or die( mysql_error());
	$i = 0;
	while ( $a = mysql_fetch_row( $res )) {
		if ( trim( $a[0] ) != "" ) echo "$a[0]".chr( 13 ).chr( 10 );
		$i++;
	}
	mysql_free_result( $res );
	if ( $i == 0 ) echo "nil";
}

function AppendCow( $cows, $cow_num, $rfid_native, $modif_d, $modif_t ) {
	$cow_num = $cow_num*1;
	mysql_query( "INSERT INTO $cows (
	 `cow_num`,
	 `created_date`, `created_time`,
	 `modif_date`, `modif_time`,
	 `rfid_date`, `rfid_time`,
	 `rfid_num`, `rfid_native` )
	 VALUES (
	 '$cow_num',
	 '$modif_d', '$modif_t',
	 '$modif_d', '$modif_t',
	 '$modif_d', '$modif_t',
	 '$rfid_native', '$rfid_native' )" ) or die( mysql_error());
}
?>
