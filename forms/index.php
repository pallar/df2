<?php
/* DF_2: forms/index.php
c: 25.12.2005
m: 23.03.2017 */

ob_start();

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
$res=mysql_query( "SELECT usid FROM $globals", $db ); $sqlerr=mysql_errno()*1;
if ( $sqlerr==0 ) {
	$usid=mysql_fetch_row( $res ); $farm_id=$usid[0];
} else $farm_id="UNDEFINED";

include( "index0.php" );

include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_00._$lang" );

$dev_b=$dev_1st; $dev_e=$dev_b+$devs_onmnemo-1;

MainMenu( $php_mm["_00_"], "mnemo", "" );

include( $hFrm["0010"] );

if ( $LOCAL_CHAT ) echo "<center><a href='../chat/'>".$php_mm["Chat"]."</a></center>";
else {
	ini_set( "user_agent", "Mozilla/5.0" );// to unlock .htaccess rules
	$c="";
	if ( $fp=fopen( "http://pallar.com.ua/fchat/announcements.php?lang=$lang&farm_id=$farm_id&user=$userCoo&app_rel=$app_rel", "r" )) {
		while ( $l=fread( $fp, 1024 )) $c.=$l;
		fclose( $fp );
	}
	echo "$c";
}

include( "../locales/$lang/f_admmsg._$lang" );

echo "
</body>
</html>";

ob_end_flush();
?>
