<!--
DF_2: _mobile/fm_0100.php
form: menu
created: 25.12.2013
modified: 26.03.2014
-->
<?php
echo "<title>Меню / Інтернет-Ферма: прив'язне утримання</title>
</head>
<body>
<!--<div class='not_support box-vcenterd'>Поверніть, будь-ласка, смартфон<br/>у вертикальне положення</div>-->
<div class='css_wrapper'>
	<div class='css_menu_div'>
		<form method='post' action='index.php' autocomplete='off'>
			<input name='page' type='hidden' value='fm_0520'>
			<input class='css_input' name='cow' placeholder='введіть номер тварини...' type='text'>
		</form>
		<a href='index.php?page=fm_0590'><input class='css_input_0g0' type='button' value='Розташув. тварин (за місцем)'></a>
		<a href='index.php?page=fm_0591'><input class='css_input_0g0' type='button' value='Розташув. тварин (за номером)'></a>
		<a href='index.php?page=fm_0610'><input class='css_input_0g0' type='button' value='Контрольне доїння'></a>
		<a href='index.php?page=fm_0620'><input class='css_input_0g0' type='button' value='Показники дозаторів'></a>
		<a href='index.php?logof=1'><input class='css_input_0g1' type='button' value='Вихід'></a>
	</div>
<!--	<div class='css_logo_div'>
		<img alt='logo' src='img/logo.png'>
	</div>-->
</div>";
?>
