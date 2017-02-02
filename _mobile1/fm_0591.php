<!--
DF_2: _mobile/fm_0591.php
form: cows->stalls
created: 25.12.2013
modified: 26.03.2014
-->
<?php
echo "	<title>Розташування тварин / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, смартфон<br/>у вертикальне положення</div>-->
<div class='css_wrapper'>";
$ls1=$connect->query("SELECT id, stall_num, cow_num FROM $cows WHERE cow_num>0 ORDER BY 1000000-cow_num DESC");
echo "
	<table class='css_milk_table'>
	<tr>
		<td align='center'>Тварина</td>
		<td align='center'>Стійло</td>
	</tr>";
while($ls=$ls1->fetch_assoc()) {
	$stall=$ls['stall_num'];
	$stallaction="stallIns(this,$ls[id])";
	echo "
	<tr>
		<td>$ls[cow_num]</td>
		<td>
			<input id='int".$ls[id]."' name='int".$ls[id]."' type='number' value='$stall' onchange='$stallaction' onkeydown='int_keyp(\"int".$ls[id]."\", 0, 99999, 5)'>
		</td>
	</tr>";
}
echo "
	</table>
	<a href='index.php?page=fm_0100'><input class='css_input_0g1' type='button' value='Меню'></a>
	<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
</div>";
?>
