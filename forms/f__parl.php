<?php
/* DF_2: forms/f__parl.php
form: parlor report ([PARL]or report)
c: 25.12.2005
m: 30.03.2017 */

ob_start();

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_func.php" );
include( "../dflib/f_librep.php" );

$_list_height=$_height-300;

$local_id=CookieGet( "_id" );
$tab=$_GET["tab"];
$tab_db=Var_FromDb( $userCoo, $vars, $local_id.".parlrep-tab", "0" )*1;
if ( trim( $tab."." )!="." ) {
	$tab=$tab*1;
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".parlrep-tab", $tab );
} else $tab=$tab_db;
$graph=0;
$f__jfilt__mode=0;
$btnToPrn=1;

$tabs_t=array( $php_mm["_01_tab1_"], $php_mm["_01_tab3_"] );
$menuSub=1;
$efc_last="class='last'";
$efc_all_active="class='active'";
$efc_last_active="class='active last'";
for ( $i=0; $i<=1; $i++ ) $efc[$i]="";
$efc[1]=$efc_last;
if ( $tab==0 ) $efc[0]=$efc_all_active;
else if ( $tab==1 ) $efc[1]=$efc_last_active;

if ( $tab==0 ) {
	$title=$tabs_t[0];
	$rep_url_="../".$hRep["m"];
} elseif ( $tab==1 ) {
	$dontuse_period=3;//start from 01.01 of the $yl
	$title=$tabs_t[1];
	$rep_url_="../".$hRep["mcws0"];
}
$nav1="
<nav1>
<div id='cssmenu'>
<ul>
	<li ".$efc[0]."><a href='../".$hFrm["0100"]."?tab=0'><span>".$tabs_t[0]."</span></a></li>
	<li ".$efc[1]."><a href='../".$hFrm["0100"]."?tab=1'><span>".$tabs_t[1]."</span></a></li>
</ul>
</div>
</nav1>";

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
include( "../".$hDir["reps"]."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

MainMenu( $php_mm["_01_"].": ".$title, "parl", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

include( "f__jfilt.php" );
echo "
<div style='border-width:0; height:".$_list_height."px; margin:0 0 0 0; overflow-x:hidden; overflow-y:auto;'>";
include( $rep_url_ );
echo "
<form name='df2__parl' method='post'>
<input id='reload_' style='visibility:hidden;' type='submit' value='refresh'>
</form>
</div>";
?>
