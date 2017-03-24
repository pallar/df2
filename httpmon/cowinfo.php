<?php
/* DF_2: httpmon/cowinfo.php
c: 17.07.2006
m: 18.03.2017 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "../dflib/f_func.php" );
include( "common.php" );

$modif_d = stripslashes( $_GET["modif_date"] ); $modif_t = stripslashes( $_GET["modif_time"] );

$rfid_native = stripslashes( $_GET["rfid_native"] );
$rfid_excessivebytes = stripslashes( $_GET["rfid_excessivebytes"] )*1;
if ( $rfid_excessivebytes < 1 ) $rfid_excessivebytes = 2;//LOCAL READERS PATCH!
$cow_num = stripslashes( $_GET["cow_num"] );
$bd_num = stripslashes( $_GET["bd_num"] );

ClrParlorRow( $parlor, $bd_num );

if ( $cow_num == "illcows" ) GetIllCows( $cows );
else {
//BUDMs *** begin ***
	$budms_initmode = 0;
	$res = mysql_query( "SELECT rfid_mode FROM $globals", $db );
	$r = mysql_fetch_row( $res );
	if ( $r[0] == 3 ) {
		$dev_num = $bd_num*1;
		$res = mysql_query( "SELECT ready, stall_max FROM $budms WHERE $dev_num>=dev_min AND $dev_num<=dev_max", $db );
		$r = mysql_fetch_row( $res );
		if ( $r[0] < $r[1] ) {
			$budms_initmode = 1;
			$stall_num = $r[0]*1+1;
			$res = mysql_query( "SELECT rfid_native FROM $tags WHERE rfid_native=$rfid_native", $db );
			$r = mysql_fetch_row( $res );
			if ( empty( $r )) {
				$res = mysql_query( "INSERT INTO $tags (
				 `rfid_native`, `rfid_num`, `stall_num`,
				 `created_date`, `created_time`, `modif_date`, `modif_time` )
				 VALUES (
				 '$rfid_native', '$rfid_native', '$stall_num',
				 '$modif_d', '$modif_t', '$modif_d', '$modif_t' )", $db );
				$res = mysql_query( "UPDATE $budms SET
				 ready='$stall_num',
				 modif_date='$modif_d', modif_time='$modif_t'
				 WHERE $dev_num>=dev_min AND $dev_num<=dev_max", $db );
			}
		}
	}
//BUDMs *** end ***
//	if ( $budms_initmode == 0 ) {
		if ( $rfid_native != "" ) {
			if ( $r[0] == 2 &
			 preg_match_all( "~LA[\040]{1}[0-9]{3}[\040]{1}[0-9]{12}$~", $rfid_native ) < 1 &
			 preg_match_all( "~LR[\040]{1}[0-9]{4}[\040]{1}[0-9]{16}$~", $rfid_native ) < 1 );
			else GetCowByTag( $parlor, $tags, $groups, $cows, $rfid_native, $bd_num, $rfid_excessivebytes, $modif_d, $modif_t, $safe_rgb, $jagg_attrs );
		}
		if ( $rfid_native == "" & $cow_num == "" ) echo "0;0;;0000;00;";
		if ( $cow_num != "") GetCowByNum( $parlor, $groups, $cows, $cow_num, $bd_num, $modif_d, $modif_t, $safe_rgb );
		if ( $cow_num != "" | $rfid_native != '' ) UpdateParlorRowTime( $parlor, $bd_num, $modif_d, $modif_t );
//	}
}

Dbase_disconnect();
?>
