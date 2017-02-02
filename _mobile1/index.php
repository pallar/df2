<?php
$skip_W3C_DOCTYPE=1;
session_start();
include("../f_vars0.php");
include("../dflib/f_func.php");
include("header.php");
if($_POST["login"]!="" & $_POST["pass"]!="") {
	$pass=$_POST["pass"];
	$in=$connect->query("SELECT id, nick FROM $person WHERE id='3' AND passw='$pass'");
	if($in->num_rows==1) {
		$in=$in->fetch_assoc();
		$_SESSION["fuser"]=$in["id"];
		$_SESSION["fname"]=$in["nick"];
	} else {
		unset($_SESSION["fuser"]);
		unset($_SESSION["fname"]);
	}
}
if($_GET["logof"]==1) {
	unset($_SESSION["fuser"]);
	unset($_SESSION["fname"]);
}
if($_SESSION["fuser"]=="") include("fm_0000.php");
else {
	$page=$_REQUEST["page"];
	if($page!="") include($page.".php"); else include("fm_0100.php");
}
echo "
</body>
</html>";
?>
