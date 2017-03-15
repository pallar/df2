<?php
/* DF_2: forms/f__parl.php
form: parlor report ([PARL]or report)
c: 25.12.2005
m: 26.09.2013 */

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_librep.php" );

$parlrep_tab_=$_GET[parlrep_tab];
$parlrep_tab_db=Var_FromDb( "parlrep-tab", "0", $userCoo )*1;
if ( trim( $parlrep_tab_."." )!="." ) {
	$parlrep_tab_=$parlrep_tab_*1;
	Var_ToDb( "varchar", "parlrep-tab", $parlrep_tab_, $userCoo );
} else $parlrep_tab_=$parlrep_tab_db;

$graph=0;

$f__jfilt__mode=0;

$tabs_t=array( $php_mm["_01_tab1_"], $php_mm["_01_tab3_"] );
$tabs=array( "RCG", "RCG", "RCG" );

if ( $parlrep_tab_==2 ) {
	$title=$tabs_t[2]; $tabs[2]="RC";
	$rep_url_="../".$hRep['mcw_gs'];
} else if ( $parlrep_tab_==1 ) {
	$dontuse_period=3;//start from 01.01 of the $yl
	$title=$tabs_t[1]; $tabs[1]="RC";
	$rep_url_="../".$hRep['mcws0'];
} else if ( $parlrep_tab_==0 ) {
	$title=$tabs_t[0]; $tabs[0]="RC";
	$rep_url_="../".$hRep['m'];
}

$btnToPrn=1;

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
include( "../".$hDir['reps']."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

MainMenu( $php_mm["_01_"].": ".$title, "parl", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

echo "
<div class='b_h'>";
	for ( $j=count( $tabs_t )-1; $j>=0; $j-- ) echo "
	<a href='../".$hFrm['0100']."?parlrep_tab=$j' class='$tabs[$j]'><div class='p_100'></div>&nbsp;&nbsp;$tabs_t[$j]&nbsp;&nbsp;</a>";
	echo "
	&nbsp;<a href='$rep_url_?title=$title&noCSS=1' target='w1'><b>".$php_mm["_com_ver_for_prn_lnk_"]."</b></a>
</div>
<table><tr><td height='5px'></td></tr></table>";
include( "f__jfilt.php" );
echo "
<table><tr><td height='5px'></td></tr></table>
<div class='mk' style='border-width:0; height:50%; margin:0; overflow-x:hidden; overflow-y:auto'>
<table height='100%' width='100%'>
<tr>
	<td width='2%'></td>
	<td>";
include( $rep_url_ );
echo "
	</td>
	<td width='2%'></td>
</tr>
</table>

<form name='df2__parl' method='post'>
	<input id='reload_' style='visibility:hidden' type='submit' value='refresh'>
</form>

</div>";
?>
