<!--
DF_2: _mobile/fm_0621.php
form: budm
c: 25.12.2013
m: 11.11.2015
-->
<?php
echo "<title>Показники дозаторів / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, смартфон<br/>у вертикальне положення</div>-->
<div class='css_wrapper'>";
$milk_sess=$_POST["milk_sess"].$_GET["milk_sess"];
$milk_date=$_POST["milk_date"].$_GET["milk_date"];
$milk_date1=$milk_date;
if($milk_date1==$_GET["milk_date"]) include("fm_0691z.php");
if($milk_date1!=$milk_date) $milk_date=$milk_date1;
$Ymd_=explode('-', $milk_date);
$milk_date=$Ymd_[0].$Ymd_[1].$Ymd_[2];
$dbt1=$Ymd_[0].$Ymd_[1]."_n"; Tmilk_create($dbt1);
$res=mysql_query("SELECT ratio FROM $dbt1", $db);
$sqlerr=mysql_errno();
if($sqlerr>0) {
	mysql_query("ALTER TABLE `$dbt1`
	 ADD `ratio` double unsigned NOT NULL default '0' AFTER `year`", $db);
}
$ls1=$connect->query("SELECT num, id FROM $budms ORDER BY num ASC");
if($ls1->num_rows>0) {
	echo "
	<table class='css_milk_table'>
		<tr>
			<td align='center'>Дозатор</td>
			<td align='center'>Надій, кг</td>
		</tr>";
	while($ls=$ls1->fetch_assoc()) {
		$ml1=$connect->query("SELECT code, ratio FROM $dbt1 WHERE bd_num='$ls[num]' AND milk_sess='$milk_sess' AND day='$Ymd_[2]' AND month='$Ymd_[1]' AND year='$Ymd_[0]'");
		if($ml1->num_rows==1) {
			$ml=$ml1->fetch_assoc();
			$milkkg=$ml['ratio'];
			$milkaction="budmIns(this,$milk_sess,$ls[num],$milk_date,$ml[code])";
		} else {
			$milkkg="";
			$milkaction="budmIns(this,$milk_sess,$ls[num],$milk_date)";
		}
		echo "
	<tr>
		<td>$ls[num]</td>
		<td>
			<input id='real".$ls[num]."' name='real".$ls[num]."' type='number' value='$milkkg' onchange='$milkaction' onkeydown='int_keyp( \"real".$ls[num]."\", 0, 9999, 4 )'>
		</td>
	</tr>";
	}
	echo "
	</table>";
} else {
	echo "Визначте діапазони місць для дозаторів...";
}
echo "
	<a href='index.php?page=fm_0621&milk_sess=$milk_sess&milk_date=$milk_date1'><input class='css_input_r00' type='submit' value='ПЕРЕРАХУВАТИ'></a>
	<a href='index.php?page=fm_0620'><input class='css_input_0g1' type='button' value='Показники дозаторів'></a>
	<a href='index.php?page=fm_0100'><input class='css_input_0g1' type='button' value='Меню'></a>
	<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
</div>";
?>
