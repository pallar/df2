<?php
/* DF_2: forms/index.php
c: 25.12.2005
m: 14.11.2015 */

ob_start();

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
$res=mysql_query( "SELECT usid FROM $globals", $db );
$sqlerr=mysql_errno();
if ( $sqlerr==0 ) {
	$usid=mysql_fetch_row( $res ); $farm_id=$usid[0];
} else $farm_id='UNDEFINED';

$dev_1st=trim( CookieGet( "dev_1st" ))*1; if ( $dev_1st==0 ) $dev_1st=1;
if ( CookieGet( "devs_prev" )=="1" ) {
	$devs=CookieGet( "devs" );
	if ( $dev_1st<$devs-$devs_onmnemo ) $dev_1st=$dev_1st+$devs_onmnemo; else $dev_1st=1;
	CookieSet( "devs_prev", "" ); CookieSet( "dev_1st", "$dev_1st" );
}

if ( $userCoo*1==0 ) {
	$_id=CookieGet( "_id" );
	if ( strlen( $_id )<10 ) $local_id=md5( uniqid( rand(), true ));
	else $local_id=$_id;
	CookieSetSs( "_id", "$local_id", 60*60*24*3650 );
	include( "../dflib/f_zaptmp.php" );
	include( "../dflib/f_zap.php" );
	include( "../dflib/f_perget.php" );
	$res=mysql_query( "SELECT language FROM $globals" ); $sqlerr=mysql_errno();
	if ( $sqlerr==0 ) {
		$lang=mysql_fetch_row( $res ); $lang=$lang[0];
	} else $lang='ru';
	CookieSet( "_lang", $lang );
	include( "../dflib/f_patch1.php" );
	include( "../dflib/f_patch.php" );
//f_lim.php
	$f_limits_php="../f_lim.php";
	include( "../f_limset.php" );
	CookieSet( "_filts0", "59" );
	CookieSet( "_filts9", "63" );
} else include( "../dflib/f_perset.php" );

include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_00._$lang" );

$dev_b=$dev_1st; $dev_e=$dev_b+$devs_onmnemo-1;

MainMenu( $php_mm["_00_"], "mnemo", "" );

include( $hFrm['0010'] );

//echo "<center><a href='../chat/'>".$php_mm["Chat"]."</a></center>";
ini_set( 'user_agent', 'Mozilla/5.0' );// to unlock my .htaccess rules
$c="";
if ( $fp=fopen( "http://pallar.com.ua/fchat/announcements.php?lang=$lang&farm_id=$farm_id&user=$userCoo&app_rel=$app_rel", 'r' )) {
	while ( $l=fread( $fp, 1024 )) $c.=$l;
	fclose( $fp );
}
echo "$c";

include( "../locales/$lang/f_admmsg._$lang" );

ob_end_flush();
?>
