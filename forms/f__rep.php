<?php
/* DF_2: forms/f__rep.php
form: all reports report ([REP]ort)
c: 23.08.2013
m: 19.06.2015 */

ob_start();

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_librep.php" );

$graph=0;

$f__jfilt__mode=0;

$title=$_GET[title];
$rep_url=$_GET[rep_url];

$btnToPrn=1;

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
include( "../".$hDir['reps']."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

MainMenu( $title, "reps", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

echo "
<div class='b_h'>";
	echo "
	&nbsp;<a href='".$rep_url."?title=".$title."&noCSS=1' target='w1'><b>".$php_mm["_com_ver_for_prn_lnk_"]."</b></a>
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
include( $rep_url );
echo "
	</td>
	<td width='2%'></td>
</tr>
</table>

<form name='df2__rep' method='post'>
	<input id='reload_' style='visibility:hidden' type='submit' value='refresh'>
</form>

</div>";
?>
