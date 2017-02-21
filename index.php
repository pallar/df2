<?php
ob_start();

$get_lang=$_GET["lang"];
if ( strlen( $get_lang )>=2 ) {
	$lang=$get_lang;
	$skip_PASSW=1;
	include_once( "f_vars.php" );
	include_once( "dflib/f_func.php" );
	include_once( "setup/f_upd".$lang.".php");
	CookieSet( "_lang", $lang );
}

ob_end_flush();
?>
<html>
<head>
<meta content='0;url=forms/index.php' http-equiv='refresh'>
<meta content='text/html;charset=utf-8' http-equiv='content-type'>
</head>
</html>
