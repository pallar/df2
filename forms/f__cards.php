<?php
/* DF_2: forms/f__cards.php
form: cards (cows and oxes [CARDS])
c: 09.01.2006
m: 01.04.2015 */

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_cows._$lang" );
include( "../locales/$lang/f_05._$lang" );
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );
include( "../dflib/f_librep.php" );

$cards_tab_=$_GET[cards_tab];
$cards_tab_db=Var_FromDb( "cards-tab", "0", $userCoo )*1;
if ( trim( $cards_tab_."." )!="." ) {
	$cards_tab_=$cards_tab_*1;
	Var_ToDb( "varchar", "cards-tab", $cards_tab_, $userCoo );
} else $cards_tab_=$cards_tab_db;
$cards_groups_tab_=$_GET[cards_groups_tab];
$cards_groups_tab_db=Var_FromDb( "cards-groups-tab", "ls", $userCoo );
if ( trim( $cards_groups_tab_."." )!="." ) {
} else $cards_groups_tab_=$cards_groups_tab_db;

MainMenu( $php_mm["_05_cap"], "cards", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

$gcl="rCG"; $c_gdiv_vis="hidden"; $c_gdiv_disp="none";
$ccl="rCG";
$tcl="rCG";
$ocl="rCG";

if ( $cards_tab_==0 ) {
	$gcl="rC"; $c_gdiv_vis="visible"; $c_gdiv_disp="";
} elseif ( $cards_tab_==1 ) {
	$ccl="rC";
} elseif ( $cards_tab_==3 ) {
	$tcl="rC";
} elseif ( $cards_tab_==2 ) {
	$ocl="rC";
}

echo "
	<table width='100%'>
	<tr>
		<td>
			<div class='b_h'>
				<a href='../".$hFrm['0500']."?cards_tab=2' class='$ocl'><div class='p_100'></div>&nbsp;&nbsp;".$php_mm["_05_ostab_lnk_cap"]."&nbsp;&nbsp;</a>
				<a href='../".$hFrm['0500']."?cards_tab=3' class='$tcl'><div class='p_100'></div>&nbsp;&nbsp;".$php_mm["_05_tstab_lnk_cap"]."&nbsp;&nbsp;</a>
				<a href='../".$hFrm['0500']."?cards_tab=1' class='$ccl'><div class='p_100'></div>&nbsp;&nbsp;".$php_mm["_05_cstab_lnk_cap"]."&nbsp;&nbsp;</a>
				<a href='../".$hFrm['0500']."?cards_tab=0' class='$gcl'><div class='p_100'></div>&nbsp;&nbsp;".$php_mm["_05_gstab_lnk_cap"]."&nbsp;&nbsp;</a>
			</div>
		</td>
	</tr>
	</table>";
include( "../dflib/f_setcbs.js" );
if ( $cards_groups_tab_=="bs" | $cards_groups_tab_=="breeds" ) {
	Var_ToDb( "varchar", "cards-groups-tab", "bs", $userCoo );
	$onegroup_name="cw_b"; $groups_dbt=$breeds;
	$num_prefix="#";
} else if ( $cards_groups_tab_=="gs" | $cards_groups_tab_=="groups" ) {
	Var_ToDb( "varchar", "cards-groups-tab", "gs", $userCoo );
	$onegroup_name="cw_g"; $groups_dbt=$groups;
	$num_prefix="";
} else if ( $cards_groups_tab_=="ls" | $cards_groups_tab_=="lots" ) {
	Var_ToDb( "varchar", "cards-groups-tab", "ls", $userCoo );
	$onegroup_name="cw_l"; $groups_dbt=$lots;
	$num_prefix="!";
} else if ( $cards_groups_tab_=="ss" | $cards_groups_tab_=="subgrs" ) {
	Var_ToDb( "varchar", "cards-groups-tab", "ss", $userCoo );
	$onegroup_name="cw_s"; $groups_dbt=$subgrs;
	$num_prefix="~";
}
include( "../dflib/f_tgs.php" );

ob_end_flush();
?>
