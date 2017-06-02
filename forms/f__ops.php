<?php
/* DF_2: forms/f__ops.php
form: cows operations (cows [OP]eration[S])
c: 09.01.2006
m: 02.06.2017 */

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
	switch ( $opertype ) {
	case 1:
		$url_="mlk";
		break;
	case 2:
		$url_="mlkt";
		break;
	case 4:
		$url_="meas";
		break;
	case 8:
		$url_="care";
		break;
	case 16:
		$url_="cond";
		break;
	case 32:
		$url_="vacc";
		break;
	case 64:
		$url_="mov";
		break;
	case 128:
	case 256:
		$url_="insm";
		break;
	case 512:
		$url_="rect";
		break;
	case 1024:
	case 2048:
	case 4096:
		$url_="abrt";
		break;
	case 8192:
		$url_="jagg";
		break;
	}
	include_once( "../oper/f_o_".$url_.".php" );
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
