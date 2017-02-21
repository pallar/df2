<?php
/*
DF_2: forms/f__reps.php
form: reports ([rep]orts[s])
created: 29.12.2005
modified: 08.08.2013
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_librep.php" );

MainMenu( $php_mm["_03_cap"], "reps", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
include( "../".$hDir['reps']."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

$reps_tab=CookieGet( $userCoo."_reps-tab" );
if ( trim( $reps_tab."." )=="." ) {
	CookieSet( $userCoo."_reps-tab", "01" );
	$reps_tab="01";
}
$reps_href="../".$hDir['reps']."fl".$reps_tab.".php";

ob_end_flush();//unlock output to set cookies properly!

$f__jfilt__mode=2;

echo "
<table>
<tr valign='top'>
	<td height='441px' width='583px' valign='top'>
		<iframe border='0' frameborder='0' height='100%' name='w3' src='".$reps_href."' scrolling='auto' width='100%'></iframe>
	</td>
	<td $ljust height='335px' width='1%' $vtjust></td>
	<td width='303px'>";

include( "f__jfilt.php" );

echo "
	</td>
</tr>
</table>
<!-- REPORT WILL BE OPEN IN FRAME, IF UNCOMMENT NEXT
<table width='100%'>
<tr>
	<td><iframe border='0' frameborder='0' height='100%' name='w1' src='<?php echo $reps_rep;?>' scrolling='auto' width='100%'></iframe></td>
</tr>
</table>
-->
<form name='df2__reps' method='post'>
</form>";
?>
