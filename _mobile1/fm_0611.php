<!--
DF_2: _mobile/fm_0611.php
form: milk
c: 25.12.2013
m: 11.11.2015
-->
<?php
echo "<title>Контрольне доїння / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, смартфон<br/>у вертикальне положення</div>-->
<div class='css_wrapper'>";
$milk_sess=$_POST["milk_sess"];
$milk_date=$_POST["milk_date"];
$Ymd_=explode('-', $milk_date);
$milk_date=$Ymd_[0].$Ymd_[1].$Ymd_[2];
$dbt=$Ymd_[0].$Ymd_[1]."_m"; Tmilk_create( $dbt );
$res=mysql_query( "SELECT ratio FROM $dbt", $db );
$sqlerr=mysql_errno();
if ( $sqlerr>0 ) {
	mysql_query( "ALTER TABLE `$dbt`
	 ADD `ratio` double unsigned NOT NULL default '0' AFTER `year`", $db );
}
$res=mysql_query( "SELECT stall_num FROM $dbt", $db );
$sqlerr=mysql_errno();
if ( $sqlerr>0 ) {
	mysql_query( "ALTER TABLE `$dbt`
	 ADD `stall_num` int(5) unsigned NOT NULL default '0' AFTER `ov`", $db );
}
$ls1=$connect->query("SELECT stall_num, id FROM $cows WHERE stall_num<>0 ORDER BY stall_num ASC");
if($ls1->num_rows>0) {
	echo "
	<table class='css_milk_table'>
	<tr>
		<td align='center'>Стійло</td>
		<td align='center'>Надій, кг</td>
	</tr>";
	while($ls=$ls1->fetch_assoc()) {
		$ml1=$connect->query("SELECT code, ratio FROM $dbt WHERE cow_id='$ls[id]' AND milk_sess='$milk_sess' AND day='$Ymd_[2]' AND month='$Ymd_[1]' AND year='$Ymd_[0]'");
		if($ml1->num_rows==1) {
			$ml=$ml1->fetch_assoc();
			$milkkg=$ml['ratio'];
			$milkaction="milkIns(this,$milk_sess,$ls[stall_num],$ls[id],$milk_date,$ml[code])";
		} else {
			$milkkg="";
			$milkaction="milkIns(this,$milk_sess,$ls[stall_num],$ls[id],$milk_date,0)";
		}
		echo "
	<tr>
		<td>$ls[stall_num]</td>
		<td>
			<input id='real".$ls[stall_num]."' name='real".$ls[stall_num]."' type='number' value='$milkkg' onchange='$milkaction' oninput='real_chg( \"real".$ls[stall_num]."\", 0, 30.9, 4, 1 )'>
		</td>
	</tr>";
	}
	echo "
	</table>";
} else {
	echo "Розташування тварин не проводилось...";
}
echo "
	<a href='index.php?page=fm_0610'><input class='css_input_0g1' type='button' value='Контрольне доїння'></a>
	<a href='index.php?page=fm_0100'><input class='css_input_0g1' type='button' value='Меню'></a>
	<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
</div>";
?>
