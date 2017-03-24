<?php
/* DF_2: forms/f__per.php
form: set period
c: 01.02.2006
m: 16.03.2017 */

echo "
<form method='post'>
<center>
<table width='90%'>
<tr>
	<td>
		<table width='100%'>
		<tr height='13px'><td></td></tr>
		<tr>
			<td style='color:#666666'>
				<select class='sel sel_h0' id='per_d1' style='width:43px' onchange='Per_d1()'></select>";
Date_MonthsList( "<select class='sel sel_h0' id='per_m1' style='width:140px' onclick='Per_m1()' onchange='Per_m1(); Per_d1list()'>" );
Date_YearsList( "<select class='sel sel_h0' id='per_y1' style='width:60px' onclick='Per_y1()' onchange='Per_y1(); Per_d1list()'>" );
echo "
			</td>
		</tr>
		<tr height='3px'><td></td></tr>
		<tr>
			<td style='color:#666666'>
				<select class='sel sel_h0' id='per_d2' style='width:43px;' onchange='Per_d2()'></select>";
Date_MonthsList( "<select class='sel sel_h0' id='per_m2' style='width:140px' onclick='Per_m2()' onchange='Per_m2(); Per_d2list()'>" );
Date_YearsList( "<select class='sel sel_h0' id='per_y2' style='width:60px' onclick='Per_y2()' onchange='Per_y2(); Per_d2list()'>" );
echo "
			</td>
		</tr>
		<tr height='13px'><td></td></tr>
		<tr>
			<td>
				<input class='btn gradient_0f0 btn_h0' style='width:159px' type='button' value='".$php_mm["_com_accept_btn_"]."' onclick='Per_ToCoo(); Period_Close()'>
				<input class='btn gradient_f00 btn_h0' style='width:80px' type='button' value='"."X"."' onclick='Period_Close()'><br>
			</td>
		</tr>
		</table>
	</td>
</table>
</center>
</form>";
?>
