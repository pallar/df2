<?php
/* DF_2: dflib/f_ttgs_u.php
c: 29.03.2015
m: 31.03.2015 */

$skip_W3C_DOCTYPE=1;

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );

$ttgs_mode=$_GET["ttgs_mode"];
$tag=$_GET["tag"];
$stall_num=$_GET["stall_num"];
$cow_num=$_GET["cow_num"];

if ( $ttgs_mode=="stall_num" ) {
	$query="SELECT `stall_num` FROM `$tags` WHERE `rfid_native`='$tag'";
	$res=mysql_query( $query ); $sqlerr=mysql_errno();
	if ( $sqlerr==0 ) {
		$row=mysql_fetch_row( $res );
		$res=mysql_query( "UPDATE `$tags` SET `stall_num`='$stall_num' WHERE `rfid_native`='$tag'" ); $sqlerr=mysql_errno();
	}
} elseif ( $ttgs_mode=="cow_num" ) {
	$query="SELECT `cow_num` FROM `$tags` WHERE `rfid_native`='$tag'";
	$res=mysql_query( $query ); $sqlerr=mysql_errno();
	if ( $sqlerr==0 ) {
		$row=mysql_fetch_row( $res );
		$res=mysql_query( "UPDATE `$tags` SET `cow_num`='$cow_num' WHERE `rfid_native`='$tag'" ); $sqlerr=mysql_errno();
	}
}

ob_end_flush();
?>
