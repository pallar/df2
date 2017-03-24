<?php
/* DF_2: forms/f__cards.php
form: cards (cows and oxes [CARDS])
c: 09.01.2006
m: 23.03.2017 */

ob_start();

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_cows._$lang" );
include( "../locales/$lang/f_05._$lang" );
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );
include( "../dflib/f_librep.php" );

$sself="../".$hFrm["0500"];

$local_id=CookieGet( "_id" );
$tab=$_GET["tab"];
$tab_db=Var_FromDb( $userCoo, $vars, $local_id.".cards-tab", "0" )*1;
if ( trim( $tab."." )!="." ) {
	$tab=$tab*1;
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".cards-tab", $tab );
} else $tab=$tab_db;
$gtab=$_GET["gtab"];
$gtab_db=Var_FromDb( $userCoo, $vars, $local_id.".cards-grs-tab", "ls" );
if ( trim( $gtab."." )!="." );
else $gtab=$gtab_db;

$tabs_t=array( $php_mm["_05_gstab_lnk_"], $php_mm["_05_cstab_lnk_"], $php_mm["_05_tstab_lnk_"], $php_mm["_05_ostab_lnk_"] );
$menuSub=1;
$nav1_top="200px";
$efc_last="class='last'";
$efc_all_active="class='active'";
$efc_last_active="class='active last'";
for ( $i=0; $i<=3; $i++ ) $efc[$i]="";
$efc[3]=$efc_last;
if ( $tab==0 ) $efc[0]=$efc_all_active;
elseif ( $tab==1 ) $efc[1]=$efc_all_active;
elseif ( $tab==2 ) $efc[2]=$efc_all_active;
elseif ( $tab==3 ) $efc[3]=$efc_last_active;

$nav1="
<nav1>
<div id='cssmenu1'>
<ul>
	<li ".$efc[0]."><a href='../".$hFrm["0500"]."?tab=0'><span>".$tabs_t[0]."</span></a></li>
	<li ".$efc[1]."><a href='../".$hFrm["0500"]."?tab=1'><span>".$tabs_t[1]."</span></a></li>
	<li ".$efc[2]."><a href='../".$hFrm["0500"]."?tab=2'><span>".$tabs_t[2]."</span></a></li>
	<li ".$efc[3]."><a href='../".$hFrm["0500"]."?tab=3'><span>".$tabs_t[3]."</span></a></li>
</ul>
</div>
</nav1>";

MainMenu( $php_mm["_05_"], "cards", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

include( "../dflib/f_setcbs.js" );
if ( $gtab=="bs" | $gtab=="breeds" ) {
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".cards-grs-tab", "bs" );
	$onegroup_name="cw_b"; $groups_dbt=$breeds;
	$num_prefix="#";
} else if ( $gtab=="gs" | $gtab=="groups" ) {
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".cards-grs-tab", "gs" );
	$onegroup_name="cw_g"; $groups_dbt=$groups;
	$num_prefix="";
} else if ( $gtab=="ls" | $gtab=="lots" ) {
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".cards-grs-tab", "ls" );
	$onegroup_name="cw_l"; $groups_dbt=$lots;
	$num_prefix="!";
} else if ( $gtab=="ss" | $gtab=="subgrs" ) {
	Var_ToDb( $userCoo, $vars, "varchar", $local_id.".cards-grs-tab", "ss" );
	$onegroup_name="cw_s"; $groups_dbt=$subgrs;
	$num_prefix="~";
}
include( "../dflib/f_tgs.php" );

ob_end_flush();
?>
