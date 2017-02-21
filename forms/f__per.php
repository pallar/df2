<?php
/*
DF_2: forms/f__per.php
form: set period
created: 01.02.2006
modified: 29.07.2014
*/

echo "
<form method='post'>
<center><br>
<table width='90%'>
<tr>
	<td>
		<table cellspacing='1' width='100%'>
		<tr>
			<td style='color:#666666; width:30%'>&nbsp;".$php_mm["_04_from_cap"]."&nbsp;</td>
			<td>
				<table style='background:#cccccc; width:100%'>
				<tr class='tdv2'>
					<td>
						<select id='per_d1' style='background-color:#ffffff; border:0; height:21; width:19%' onchange='Per_d1()'></select>";
Date_MonthsList( "<select id='per_m1' style='background-color:#ffffff; border:0; height:21; width:50%' onclick='Per_m1()' onchange='Per_m1(); Per_d1list()'>" );
Date_YearsList( "<select id='per_y1' style='background-color:#ffffff; border:0; height:21; width:28%' onclick='Per_y1()' onchange='Per_y1(); Per_d1list()'>" );
echo "
					</td>
				</tr>
				</table>
			</td>
		</tr>
		<tr height='3px'><td></td></tr>
		<tr>
			<td style='color:#666666; width:30%'>&nbsp;".$php_mm["_04_to_cap"]."&nbsp;</td>
			<td>
				<table style='background:#cccccc; width:100%'>
				<tr class='tdv2'>
					<td>
						<select id='per_d2' style='background-color:#ffffff; border:0px; height:21px; width:19%' onchange='Per_d2()'></select>";
Date_MonthsList( "<select id='per_m2' style='background-color:#ffffff; border:0px; height:21px; width:50%' onclick='Per_m2()' onchange='Per_m2(); Per_d2list()'>" );
Date_YearsList( "<select id='per_y2' style='background-color:#ffffff; border:0px; height:21px; width:28%' onclick='Per_y2()' onchange='Per_y2(); Per_d2list()'>" );
echo "
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table><br>
<input class='btn gradient_0f0 btn_h0' style='width:151px' type='submit' value='".$php_mm["_com_accept_btn_cap"]."' onclick='Per_ToCoo(); Period_Close()'>
<input class='btn gradient_f00 btn_h0' style='width:39px' type='button' value='"."X"."' onclick='Period_Close()'><br>
</center>
</form>";
?>
