<?php
/*
DF_2: reports/fhead.php
report head
created: 08.08.2007
modified: 26.09.2013
*/

$_filtsXmode="r";
include( "ffilt1.php" );
echo "
<title>".$title."</title>
<!--
<script language='JavaScript' src='fmcontxt.js'></script>
-->
</head>

<style>
html,body {background:#ffffff; font:8pt Tahoma,sans-serif; height:100%; margin:0px; padding:0px;}
body {margin-bottom:0px; margin-left:5px; margin-right:5px; margin-top:0px; padding:0px;}
table {border:0px; border-collapse:collapse; font:8pt Tahoma,sans-serif;}
table td {padding:0px;}
.zag3 {color:#666666; font:10pt Tahoma,Geneva,sans-serif; font-weight:bold; text-align:center;}
.st2 {background:#cccccc; border-collapse:separate; width:100%;}
.st2 tr {height:12px;}
.st2 td {line-height:12px; padding:2px;}
.st_title2 {background:#e4efdb; color:#003366;}
a {color:#003366; text-decoration:none;}
a:hover {text-decoration:none;}
</style><br>";

$logindiv__hide=1;//ONLY IN THIS SCRIPT!
echo "

<table width='100%'>
<tr>";
if ( $btnToPrn+$noCSS<1 ) echo "
	<td $ljust width='200px'>
		<a href='../index.php' id='href_mnemo'><b>".$php_mm["_00_mnemo_btn_cap"]."</b></a>
		<a href='print' onclick='window.document.getElementById(\"print_me\").style.visibility=\"hidden\"; window.document.getElementById(\"href_mnemo\").style.visibility=\"hidden\"; print(); return false' id='print_me'><b>".$php_mm["_com_output_to_print_lnk_cap"]."</b></a>
	</td>
	<td $cjust class='zag3'>$title__</td>";
else echo "
	<td $cjust class='zag3' colspan='2'>$title__</td>";
include( "f_jper.php" );
echo "
</tr>";
if ( $repfilt__hide<1 )
	if ( $dontuse_filt<1 & $WHEREADV_txt!=":<br>" )
		echo "
<tr>
	<td $ljust colspan='3'>".$php_mm["_com_rephd1_cap"].$WHEREADV_txt."</td>
</tr>";
echo "
</table><br>";
?>
