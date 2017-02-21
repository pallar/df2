<?php
/* DF_2: httpmon/id2parl.php
c: 17.07.2006
m: 23.07.2015 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "common.php" );

$modif_d = stripslashes( $_GET['modif_date'] ); $modif_t = stripslashes( $_GET['modif_time'] );
$bd_num = stripslashes( $_GET['bd_num'] );
$dev_status_ = stripslashes( $_GET['dev_status_'] );
$cow_num = stripslashes( $_GET['cow_num'] );
$rfid_native = stripslashes( $_GET['rfid_native'] );
$id_date = stripslashes( $_GET['id_date'] );
$id_time = stripslashes( $_GET['id_time'] );
//getting cow name
$res = mysql_query( "SELECT nick
 FROM $cows WHERE cow_num*1 = '$cow_num'" ) or die( mysql_error());
$a = mysql_fetch_row( $res ); mysql_free_result( $res );
//updating parlor table
mysql_query( "UPDATE $parlor SET
 manual = '', stopped = '', dev_status_ = '$dev_status_',
 retries = '', exhaust = '', mast = '', mast_4 = '', tr = '', ov = '',
 cow_num = '$cow_num', nick = '$a[0]',
 milk_kg = '', r = '', milk_begin = '', milk_end = '', milk_time = '',
 rfid_num = '$rfid_native',
 id_date = '$id_date', id_time = '$id_time', id_cow_num = '$cow_num',
 modif_date = '$modif_d', modif_time = '$modif_t'
 WHERE bd_num = $bd_num" ) or die( mysql_error());
if ( $log_me==1 ) {
	if ( $dev_status_=='x' )
		mysql_query( "INSERT INTO $debug_log (
		 `dev_num`, `cmd`, `data`,
		 `modif_Ymd`, `modif_His` )
		 VALUES (
		 '$bd_num', 'x', '$rfid_native : $id_date : $id_time',
		 '$modif_d', '$modif_t' )" ) or die( mysql_error());
}

Dbase_disconnect();
echo "OK";
?>
