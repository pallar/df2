<?php
/* DF_2: forms/f__reps.php
form: reports ([rep]orts[s])
c: 29.12.2005
m: 13.03.2017 */

ob_start();

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_rl._$lang" );
include( "../dflib/f_librep.php" );

include( "../reports/frtab.php" );

MainMenu( $php_mm["_03_"], "reps", "" );
if( $guest_from_wan==1 & ( $userCoo<=0 | $userCoo==9 )) {
	echo $php_mm["ACCESS_DENIED"]; return;
}

$stop_f_jfilt_include=1;//IMPORTANT! BEFORE "...f_jfilt.php"
include( "../".$hDir["reps"]."f_jfilt.php" );
$stop_f_jfilt=1;//IMPORTANT! AFTER "...f_jfilt.php"

$reps_href="../".$hDir["reps"]."fl".Str2LenL( $tab+1, 2, "0" ).".php";

$f__jfilt__mode=2;

echo "
<div class='section group'>
	<div class='col span_1_of_2'>";
include( $reps_href );
echo "
	</div>
	<div class='col span_2_of_2'>
	<div id='list'>
	<ul>";
include( "f__jfilt.php" );
echo "
	</ul>
	</div>
	</div>
</div>
<!-- REPORT WILL BE OPEN IN FRAME, IF UNCOMMENT NEXT
<table width='100%'>
<tr>
	<td><iframe border='0' frameborder='0' height='100%' name='w1' src='<?php echo $reps_rep;?>' scrolling='auto' width='100%'></iframe></td>
</tr>
</table>
-->
<form name='df2__reps' method='post'>
</form>
</body>
</html>";

ob_end_flush();
?>
