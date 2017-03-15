<?php
/* DF_2: forms/index1.php
c: 25.12.2005
m: 14.11.2015 */

ob_start();

$admin_blocked=1;//for users other than admin

include( "../f_vars.php" );
include( "../dflib/f_func.php" );

$dev_1st=trim( CookieGet( "dev_1st" ))*1; if ( $dev_1st==0 ) $dev_1st=1;
if ( CookieGet( "devs_prev" )=="1" ) {
	$devs=CookieGet( "devs" );
	if ( $dev_1st<$devs-$devs_onmnem1 ) $dev_1st=$dev_1st+$devs_onmnem1; else $dev_1st=1;
	CookieSet( "devs_prev", "" ); CookieSet( "dev_1st", "$dev_1st" );
}

//conductivity normalization
if ( CookieGet( "normalize" )=="1" ) {
	CookieSet( "normalize", "" );
	for ( $c_dev=1; $c_dev<=96; $c_dev++ ) {
		$res=mysql_query( "SELECT r, r_mult FROM $parlor WHERE bd_num*1=$c_dev" ) or die( mysql_error());
		$row=mysql_fetch_row( $res );
		$r=$row[0]*1; $r_mult=$row[1]*1;
		if ( $r_mult<=0 ) {
			$r_mult=1000/$r;
			mysql_query( "UPDATE $parlor SET
			 r_mult='$r_mult'
			 WHERE bd_num*1=$c_dev" ) or die( mysql_error());
		}
	}
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
} else include( "../dflib/f_perset.php" );

include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_00._$lang" );

$dev_b=$dev_1st; $dev_e=$dev_b+$devs_onmnem1-1;

MainMenu( $php_mm["_com_app_"].":&nbsp;".$_07_, "conf", "" );

include( $hFrm['9910'] );

echo $conduct_msg;

ob_end_flush();
?>
