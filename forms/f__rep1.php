<?php
/*
DF_2: forms/f__rep.php
form: all reports report ([REP]ort)
created: 23.08.2013
modified: 07.10.2013
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_librep.php" );

$graph=0;

$f__jfilt__mode=0;

$title_=$_GET[title];
$rep_url_=$_GET[rep_url];

$btnToPrn=1;

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
//include( "../".$hDir['reps']."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

MainMenu( $title, "reps", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

echo "
<div class='b_h'>";
	echo "
	&nbsp;<a href='$rep_url_?title=$title&noCSS=1' target='w1'><b>".$php_mm["_com_ver_for_prn_lnk_cap"]."</b></a>
</div>
<div class='mk' style='border-width:0px; height:50%; margin:0px; overflow-x:hidden; overflow-y:auto'>
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

<form name='df2__rep' method='post'>
	<input id='reload_' style='visibility:hidden' type='submit' value='refresh'>
</form>

</div>";
?>
