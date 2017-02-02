<!--
DF_2: _mobile/fm_0520.php
form: cow_card
created: 25.12.2013
modified: 28.03.2014
-->
<?php
echo "<title>Картка тварини / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, ваш телефон<br/> у вертикальне положення</div>-->
<div class='css_wrapper'>";
if($_POST["cow"]!="") {
	$cow=(int)$_POST["cow"];
	$res1=$connect->query("SELECT
	 $cows.id,
	 $cows.cow_num,
	 $cows.nick,
	 $cows.national_descr,
	 $cows.b_num,
	 $cows.b_date,
	 mother.nick AS mom,
	 father.nick AS dad,
	 $subgrs.nick AS sgr,
	 $groups.nick AS gr,
	 $lots.nick AS lot,
	 $breeds.nick AS breed,
	 $cows.defects,
	 $cows.comments,
	 $cows.mth_id,
	 $cows.fth_id,
	 $cows.gr_id,
	 $cows.subgr_id,
	 $cows.lot_id,
	 $cows.breed_id,
	 $cows.rfid_num,
	 $cows.rfid_native,
	 $cows.rfid_date,
	 $cows.milk_total,
	 $cows.milk_q,
	 $cows.milk_max,
	 $cows.milk_min,
	 $cows.milkm_total,
	 $cows.milkm_q,
	 $cows.milkm_max,
	 $cows.milkm_min,
	 $cows.lact_days,
	 $cows.stall_num
	 FROM $cows, $cows mother, $oxes father, $breeds, $groups, $lots, $subgrs
	 WHERE $cows.cow_num=$cow AND
	 father.id=$cows.fth_id AND
	 mother.id=$cows.mth_id AND
	 $breeds.id=$cows.breed_id AND
	 $groups.id=$cows.gr_id AND
	 $lots.id=$cows.lot_id AND
	 $subgrs.id=$cows.subgr_id");
	if($res1->num_rows==0) {
		header("Location:./index.php");
	}
	$res=$res1->fetch_assoc();
}
echo "
<div class='css_wrapper'>
	<div class='css_card_div'>
		<div class='css_card_header'>№ $res[cow_num]&nbsp;&ndash;&nbsp;".mb_substr( $res[nick], 0, 14 )."</div>
		<div>
			<table class='css_card_table'>
			<tr>
				<td class='css_card_td_label'>Місце</td>
				<td>$res[stall_num]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Нац. код</td>
				<td>".mb_substr( $res[national_descr], 0, 18)."</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Ферма</td>
				<td>$res[lot]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Секція</td>
				<td>$res[gr]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Підгрупа</td>
				<td>$res[sgr]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Порода</td>
				<td>$res[breed]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Дата народж.</td>
				<td>$res[b_date]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Мати</td>
				<td>$res[mom]</td>
			</tr>
			<tr>
				<td class='css_card_td_label'>Батько</td>
				<td>$res[dad]</td>
			</tr>
			</table>
		</div>
	</div>";
$op1=$connect->query("SELECT o.day, o.month, o.year, o.comments, t.descr FROM $opers o, $operstyp t WHERE o.cow_id='$res[id]' AND o.oper_id=t.id ORDER BY o.year DESC, o.month DESC, o.day DESC");
if($op1->num_rows>0) {
	while($op=$op1->fetch_assoc()) {
		$dt="$op[day].$op[month].$op[year]";
		echo "
	<div class='css_card_oper_div'>
		<div class='css_card_oper_dmY_div'>$dt</div>
		<div class='css_card_oper_description_div'>$op[descr]</div>
		<div class='css_div_clear'></div>
		<div class='css_card_oper_comments_div'>$op[comments]</div>
	</div>";
	}
}
echo "
	<a href='index.php?page=fm_0100'><input class='css_input_0g1' type='button' value='Меню'></a>
	<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
</div>";
?>
