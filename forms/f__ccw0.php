<?php
/* DF_2: forms/f__ccw.php
form: cow's card ([C]ard of [C]o[W]) DISABLED PART!
c: 17.07.2006
m: 30.03.2017 */

//22.06.2011 DISABLED!
	echo "
	<table border='0' id='ccw_table40' style='$ccw4_disp width:100%;'>
	<tr>
		<td width='49%'>
			<table cellspacing='1' class='st3'>
			<tr $edit_class>
				<td width='5%' style='color:#000000; background:#cccccc;'><b>".$_13_cw_today_."&nbsp;".$_13_cw_kg_.":</b></td>
				<td width='5%'>".$_13_cw_milk_.":&nbsp;<b>$minus_kg[0]</b></td>
				<td width='6%'>".$_13_cw_milk_interval_.":&nbsp;<b>$minus_mtime[0]</b></td>
				<td width='13%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_min[0]</b></td>
				<td width='13%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_aver[0]</b></td>
				<td width='13%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_max[0]</b></td>
			</tr>
			</table>
		</td>
		<td width='1%'>
		</td>
		<td width='49%'>
			<table cellspacing='1' class='st3'>
			<tr $edit_class>
				<td width='5%' style='color:#000000; background:#cccccc;'><b>".$_13_cw_yesterday_."&nbsp;".$_13_cw_kg_.":</b></td>
				<td width='5%'>".$_13_cw_milk_.":&nbsp;<b>$minus_kg[1]</b></td>
				<td width='6%'>".$_13_cw_milk_interval_.":&nbsp;<b>$minus_mtime[1]</b></td>
				<td width='13%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_min[1]</b></td>
				<td width='13%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_aver[1]</b></td>
				<td width='13%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_max[1]</b></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<table id='ccw_table41' style='$ccw4_disp'><tr height='3'><td></td></tr></table>
	<table cellspacing='1' class='st3' id='ccw_table42' style='$ccw4_disp'>
	<tr>
		<td colspan='8'><b>".$_13_cw_week_."&nbsp;".$_13_cw_kg_.":</b></td>
	</tr>
	<tr $edit_class>
		<td width='10%'>".$_13_cw_today_.":&nbsp;<b>$minus_kg[0]</b></td>
		<td width='10%'>".$_13_cw_yesterday_.":&nbsp;<b>$minus_kg[1]</b></td>
		<td width='10%'>".$_13_cw_week_3_days_ago_.":&nbsp;<b>$minus_kg[2]</b></td>
		<td width='10%'>".$_13_cw_week_4_days_ago_.":&nbsp;<b>$minus_kg[3]</b></td>
		<td width='10%'>".$_13_cw_week_5_days_ago_.":&nbsp;<b>$minus_kg[4]</b></td>
		<td width='10%'>".$_13_cw_week_6_days_ago_.":&nbsp;<b>$minus_kg[5]</b></td>
		<td width='10%'>".$_13_cw_week_7_days_ago_.":&nbsp;<b>$minus_kg[6]</b></td>
		<td width='10%'>".$_13_cw_week_tot_.":&nbsp;<b>$minus_kg[7]</b></td>
	</tr>
	</table>
	<table id='ccw_table43' style='$ccw4_disp'><tr height='3'><td></td></tr></table>
	<table cellspacing='1' class='st3'>
	<tr class='cards_title1'>
		<td width='10%' title='".$_13_cw_lact_."&nbsp;/&nbsp;".$ged["Lact_Days"]."'>".$_13_cw_lact_."&nbsp;".$_13_cw_days_.":&nbsp;<b>$lact_days__</b>&nbsp;/&nbsp;<b>$full_lact_days__</b></td>
		<td width='10%'>".$_13_cw_lact_tot_milk_.":&nbsp;<b>$milk_tot</b></td>
		<td width='10%'>".$_13_cw_lact_min_milk_.":&nbsp;<b>$milk_min</b></td>
		<td width='10%'>".$_13_cw_lact_avg_milk_.":&nbsp;<b>$milk_aver</b></td>
		<td width='10%'>".$_13_cw_lact_max_milk_.":&nbsp;<b>$milk_max</b></td>
		<td width='10%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_mina</b></td>
		<td width='10%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_avera</b></td>
		<td width='10%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_maxa</b></td>
	</tr>
	</table>";
?>
