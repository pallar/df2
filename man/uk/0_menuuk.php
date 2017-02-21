<!-- Modified: 15.01.2014 -->
<?php
echo "
<script type='text/javascript'>
function menudiv_show() {
	document.getElementById( 'menudiv' ).style.visibility='visible';
}

function menudiv_hide() {
	document.getElementById( 'menudiv' ).style.visibility='hidden';
}
</script>

<style type='text/css'>
html,body {
	height:100%;
	margin:0px;
	padding:0px;
}

#page {
	background:#eee;
	margin:0px;
	min-height:100%; /* full screen on */
}

*html #page {
	height:100%; /* for ie6 and lower */
}

#header {
	background:#ccc;
	height:100px; /* header's height */
}

#page-clear {
	clear:both;
	height:100px; /* >= footer's height */
}

#footer {
	background:#999;
	height:100px; /* footer's height */
	margin-top:-100px; /* = footer's height */
}

#b {
	background-image:url( 'files/b002.jpg' );
	background-position:center;
	background-repeat:no-repeat;
	font-family:Arial,Helvetica,sans-serif;
	font-size:12px;
	text-align:center;
	vertical-align:middle;
}

#b:hover {
	background-image:url( 'files/b001.jpg' );
	background-position:center;
	background-repeat:no-repeat;
	font-family:Arial,Helvetica,sans-serif;
	font-size:12px;
	text-align:center;
	vertical-align:middle;
}

#b a {
	color:#228b22;
	cursor:default;
	font-weight:bold;
	text-decoration:none;
}

#pagecontentdiv {
	z-index:1;
}

#menudiv {
	background:lightgray;
	height:60px;
	visibility:hidden;
}

#menuctrldiv {
	height:60px;
	left:0px;
	position:absolute;
	top:0px;
	width:100%;
	z-index:2;
}
</style>

<body style='margin:0'>
	<div id='page' style='background:#f0ffff'><!-- you must put here _ALL_, except footer, then this content will be resized to 100% -->
		<div id='header' style='overflow-y:hidden'><div style='margin-left:0; margin-right:0'>
			<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'>
			<tr align='left' valign='top' background='files/menu.jpg' height='60px'>
				<td id='b' width='25%'><a href='index.php' style='cursor:pointer'>Змiст iнструкцiї</a></td>
				<td id='b' width='15%'><a href='1_manuk.php' style='cursor:pointer'>З чого почати</a></td>
				<td id='b' width='15%'><a href='2_manuk.php' style='cursor:pointer'>Склад системи</a></td>
				<td id='b' width='15%'><a href='3_manuk.php' style='cursor:pointer'>Доїльний зал</a></td>
				<td id='b' width='15%'><a href='4_manuk.php' style='cursor:pointer'>Селекцiйнi ворота</a></td>
				<td id='b' width='15%'><a href='5_manuk.php' style='cursor:pointer'>Робота програми</a></td>
			</tr>
			</table>
			<table align='center' border='0' cellpadding='0' cellspacing='0' width='100%'>";
?>
