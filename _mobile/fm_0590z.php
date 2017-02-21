<!--
DF_2: _mobile/fm_0590z.php
created: 25.12.2013
modified: 31.01.2014
-->
<?php
if($_POST[cow]!="") {
	$skip_W3C_DOCTYPE=1;
	include('../f_vars0.php');
	$cow=$_POST[cow];
	$stall=$_POST[stall];
	$mod_Ymd=date('Y-m-d',time());
	$mod_His=date('H:i:s',time());
}
$connect->query("UPDATE $cows SET
 `stall_num`='$stall',
 `modif_date`='$mod_Ymd', `modif_time`='$mod_His'
 WHERE `id`='$cow' LIMIT 1");
echo $cow;
?>
