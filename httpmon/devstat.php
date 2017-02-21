<?php
/* DF_2: httpmon/devstat.php
update devices status (update [DEV]ices [STAT]us)
c: 17.07.2006
m: 20.05.2015 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "../locales/$lang/f_devs._$lang" );
include( "common.php" );

$now_Ymd = date( "Y-m-d" );
$modif_d = stripslashes( $_GET['modif_date'] ); $modif_t = stripslashes( $_GET['modif_time'] );

$portname = stripslashes( $_GET['portname'] );
$halt_timeout = stripslashes( $_GET['halt_timeout'] );
$portstate = stripslashes( $_GET['portstate'] );
$devnumb = stripslashes( $_GET['devnumb'] );
$devnume = stripslashes( $_GET['devnume'] );
//cows jagg (separator) ctrl
$separated = stripslashes( $_GET['separated'] );
$timesepar = stripslashes( $_GET['timesepar'] );
//--------------------------

for ( $i = $devnumb; $i <= $devnume; $i++ ) {
	$bd_num = trim( $i );
	if ( strlen( $bd_num ) == 1 ) $bd_num = '0'.$bd_num;

	$dev_status = stripslashes( $_GET["bd_num$bd_num"] );
//	echo "$bd_num: $dev_status-";

	if ( $dev_status != '' ) {
		$dev_status_ = '';
		include( "devstats.php" );

		mysql_query( "UPDATE $parlor SET
		 dev_status_ = '$dev_status_',
		 dev_status = '$dev_status',
		 modif_date = '$modif_d', modif_time = '$modif_t'
		 WHERE bd_num = $bd_num" ) or die( mysql_error());
	}
}

$res = mysql_query( "SELECT totaldevs, halt_timeout, transact FROM $globals" ) or die( mysql_error());
$row = mysql_fetch_row( $res ); mysql_free_result( $res );
$trans = $row[2]*1;
if ( $trans < 9 ) $trans++; else $trans = 0;
$glob_upd = "UPDATE $globals SET transact = '$trans'";
if ( trim( $halt_timeout ) != '' ) $glob_upd = $glob_upd.", halt_timeout = '$halt_timeout'";
mysql_query( $glob_upd );
if ( $trans == 0 & $modif_d == $now_Ymd ) {
	$fetch_ok = -1;
	$res = mysql_query( "SELECT bd_num FROM $parlor WHERE bd_num='A1'" ) or die( mysql_error());
	while ( $row = mysql_fetch_row( $res )) $fetch_ok=1;
	mysql_free_result( $res );
	if ( $fetch_ok == -1 ) {
		mysql_query( "INSERT INTO $parlor ( `bd_num` ) VALUES ( 'A1' )" ) or die( mysql_error());
		mysql_query( "INSERT INTO $parlor ( `bd_num` ) VALUES ( 'A2' )" ) or die( mysql_error());
		mysql_query( "INSERT INTO $parlor ( `bd_num` ) VALUES ( 'A3' )" ) or die( mysql_error());
	} else {
		$dbtkeys = split( "-", $modif_d );
		$dbt_ = $dbtkeys[0].$dbtkeys[1]."_m";
		$fetch10 = 0;
		$fetch20 = 0;
		$fetch30 = 0;
		$res = mysql_query( "SELECT milk_kg, milk_sess FROM $dbt_ WHERE day='$dbtkeys[2]'" ) or die( mysql_error());
		while ( $row = mysql_fetch_row( $res )) {
			if ( $row[1] == '10' ) $fetch10=$fetch10+$row[0];
			if ( $row[1] == '20' ) $fetch20=$fetch20+$row[0];
			if ( $row[1] == '30' ) $fetch30=$fetch30+$row[0];
		}
		mysql_free_result( $res );
		mysql_query( "UPDATE $parlor SET milk_kg = '$fetch10' WHERE bd_num = 'A1'" ) or die( mysql_error());
		mysql_query( "UPDATE $parlor SET milk_kg = '$fetch20' WHERE bd_num = 'A2'" ) or die( mysql_error());
		mysql_query( "UPDATE $parlor SET milk_kg = '$fetch30' WHERE bd_num = 'A3'" ) or die( mysql_error());
	}
}

Dbase_disconnect();
echo "OK";
?>
