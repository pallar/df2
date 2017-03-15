<?php
/* DF_2: forms/f__ops.php
form: cows operations (cows [OP]eration[S])
c: 09.01.2006
m: 13.03.2017 */

ob_start();//lock output to set cookies!

$cow_id=$_GET["cow_id"]*1;

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_cows._$lang" );
include( "../locales/$lang/f_06._$lang" );//for jquery operations
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );
include( "../dflib/f_librep.php" );

if ( $cow_id>1 ) {
	$opertype=$_GET["opertype"]*1 & $_POST["opertype"]*1;
	echo "
</head>";
	$varsession=1;//to skip recursion in including
	$cows_arr=array( $cow_id );
	include( "../oper/f_o_.php");
} else {
	$title_=$php_mm["_06_tip"].": ".$php_mm["_06_level1_tip"];
	MainMenu( $php_mm["_06_"].": ".$php_mm["_06_level1_"], "opers", "" );
	//choose cows from ordered list
	$opercows_orderdb=$groups;
	//$opercows_orderdb=$lots;
	//$opercows_orderdb=$breeds;
	include( "../oper/f_chcws.php");
}

ob_end_flush();
?>
