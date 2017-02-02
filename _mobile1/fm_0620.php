<!--
DF_2: _mobile/fm_0620.php
form: budm_period
created: 25.12.2013
modified: 26.03.2014
-->
<?php
echo "<title>Вибір показників дозаторів / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, смартфон<br/>у вертикальне положення</div>-->
<div class='css_wrapper'>
	<div class='css_menu_div'>
		<form method='post' id='milk_form' action='index.php' autocomplete='off'>
			<input id='page' name='page' type='hidden'>
			<input id='milk_sess' name='milk_sess' type='hidden'>
			<input class='css_menu_seld' id='milk_date' name='milk_date' type='date' value='".date('Y-m-d',time())."'>";
$cn1=$connect->query("SELECT id, name FROM $sessions ORDER BY id ASC");
while($cn=$cn1->fetch_assoc()) {
	if(substr($cn[id],-1)==0) {
		echo "
			<input class='css_input_0g0' type='button' value='$cn[name]' onclick='goMilk($cn[id], \"fm_0621\");'>";
	}
}
echo "
		</form>
		<a href='index.php?page=fm_0100'><input class='css_input_0g1' type='button' value='Меню'></a>
		<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
	</div>
</div>";
?>
