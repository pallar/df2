<?php
/* DF_2: dflib/f_lib1.php
c: 14.12.2010
m: 01.04.2015 */

function Res_Draw( $ss, $url, $m1_style, $m1, $m2 ) {
	echo "
<meta content='$ss;url=$url' http-equiv='refresh'>
<center>
<table height='70%' width='100%'>
<tr>
	<td><div class='zag1' style='$m1_style'><h3>$m1</h1></div><div class='zag1'><blink>$m2</blink></div>";
}
?>
