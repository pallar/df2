<?php
/* DF_2: dflib/f_tmpclr.php
c: 11.09.2009
m: 01.04.2015 */

$query="SELECT var_name, created_date FROM $vars WHERE var_valuetype='varchar' AND var_name LIKE 'tmp_%'";
$res=mysql_query( $query, $db );
$error=mysql_errno();
$modif_date=date( "Y-m-d" );
if ( $error==0 ) { while ( $row=mysql_fetch_row( $res )) {
	if ( $row[1]<$modif_date ) {
		$t1=$row[0];
		$t2=$row[0]."c";
		$t3=$row[0]."o";
		Sql_query( "DROP TABLE IF EXISTS $t1" );
		Sql_query( "DROP TABLE IF EXISTS $t2" );
		Sql_query( "DROP TABLE IF EXISTS $t3" );
		Sql_query( "DELETE FROM $vars WHERE var_name='$row[0]'" );
	} else {
	}
}}
?>
