<?php
/* DF_2: httpmon/cowprg.php
c: 17.07.2006
m: 20.05.2015 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "common.php" );

function UpdateCowTag( $cows, $cow_num, $rfid_native, $rfid_excessivebytes, $modif_d, $modif_t ) {
	$cow_num = $cow_num*1;
	$excess = $rfid_excessivebytes*1;
	$rfid_withoutexcess = trim( substr( $rfid_native, $excess, 45 ));
//1.locate $rfid_native
	$res1 = mysql_query( "SELECT
		 cow_num, rfid_native
		 FROM $cows WHERE rfid_native LIKE '%$rfid_withoutexcess'" ) or die( mysql_error());
	$a1 = mysql_fetch_row( $res1 ); mysql_free_result( $res1 );
//2.locate $cow_num
	$res2 = mysql_query( "SELECT
		 cow_num, rfid_native
		 FROM $cows WHERE cow_num*1 = '$cow_num'" ) or die( mysql_error());
	$a2 = mysql_fetch_row( $res2 ); mysql_free_result( $res2 );
//no such $cow_num
	if ( $a2[0] == "" ) AppendCow( $cows, $cow_num, "", $modif_d, $modif_t );
//no such $cow_rfid
	if ( $a1[1] == "" )
		mysql_query( "UPDATE $cows SET
		 rfid_native = '$rfid_native',
		 rfid_num = '$rfid_native',
		 rfid_date = '$modif_d', rfid_time = '$modif_t',
		 modif_date = '$modif_d', modif_time = '$modif_t'
		 WHERE cow_num*1 = '$cow_num'" ) or die( mysql_error());
	//user press "Yes" on BD-05 without changes to $cow_num & $rfid_native
	else if (( $a1[0]*1 == $cow_num*1 ) & ( substr( $a1[1], $excess, 45 ) == $rfid_withoutexcess ));
	//such $rfid_native exists, but on cow with another $cow_num
	else if (( $a1[0]*1 <> $cow_num*1 ) & ( substr( $a1[1], $excess, 45 ) == $rfid_withoutexcess )) {
		mysql_query( "UPDATE $cows SET
		 rfid_native = '',
		 rfid_num = '',
		 rfid_date = '$modif_d', rfid_time = '$modif_t',
		 modif_date = '$modif_d', modif_time = '$modif_t'
		 WHERE rfid_native LIKE '%$rfid_withoutexcess'" ) or die( mysql_error());
		mysql_query( "UPDATE $cows SET
		 rfid_native = '$rfid_native',
		 rfid_num = '$rfid_native',
		 rfid_date = '$modif_d', rfid_time = '$modif_t',
		 modif_date = '$modif_d', modif_time = '$modif_t'
		 WHERE cow_num*1 = '$cow_num'" ) or die( mysql_error());
	}
}

$modif_d = stripslashes( $_GET['modif_date'] ); $modif_t = stripslashes( $_GET['modif_time'] );

$cow_num = stripslashes( $_GET['cow_num'] );
$rfid_native = stripslashes( $_GET['rfid_native'] );
$rfid_excessivebytes = stripslashes( $_GET['rfid_excessivebytes'] )*1;
if ( $rfid_excessivebytes <= 0 ) $rfid_excessivebytes = 2;//LOCAL READERS PATCH!
$bd_num = stripslashes( $_GET['bd_num'] );

UpdateCowTag( $cows, $cow_num, $rfid_native, $rfid_excessivebytes, $modif_d, $modif_t );
UpdateParlorRowCow( $parlor, $bd_num, $rfid_native, $cow_num, $modif_d, $modif_t );

Dbase_disconnect();
echo "OK";
?>
