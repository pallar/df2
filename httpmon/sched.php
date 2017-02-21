<?php
/* DF_2: httpmon/sched.php
c: 17.07.2006
m: 20.05.2015 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "common.php" );

function GetSessions( $globals, $sessions ) {
	$res1 = mysql_query( "SELECT sessions
	 FROM $globals" ) or die( mysql_error());
	$row = mysql_fetch_row( $res1 ); mysql_free_result( $res1 ); 
	$sess_cnt = $row[0];
	$res = mysql_query( "SELECT id, b
	 FROM $sessions ORDER BY id" ) or die( mysql_error());
	echo "$sess_cnt;";
	while ( $row = mysql_fetch_row( $res )) echo "$row[0];$row[1];";
	mysql_free_result( $res );
}

GetSessions( $globals, $sessions );

Dbase_disconnect();
?>
