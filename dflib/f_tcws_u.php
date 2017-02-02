<?php
/* DF_2: dflib/f_tcws_u.php
c: 31.03.2015
m: 31.03.2015 */

$skip_W3C_DOCTYPE=1;

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );

$id=$_GET["id"];
$vars_arr=$_GET["vars"];
$vars_values_arr=$_GET["vars_values"];

$vars=split( ";", $vars_arr );
$vars_values=split( ";", $vars_values_arr );
for ( $i=0; $i<sizeof( $vars ); $i++ ) {
	$var_name=$vars[$i]; $var_value=$vars_values[$i];
	$query="SELECT `$var_name` FROM `$cows` WHERE `id`='$id'";
	$res=mysql_query( $query ); $sqlerr=mysql_errno();
	if ( $sqlerr==0 ) {
		$row=mysql_fetch_row( $res );
		$res=mysql_query( "UPDATE `$cows` SET `$var_name`='$var_value' WHERE `id`='$id'" ); $sqlerr=mysql_errno();
	}
}

ob_end_flush();
?>
