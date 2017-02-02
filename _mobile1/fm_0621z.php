<!--
DF_2: _mobile/fm_0621z.php
c: 25.12.2013
m: 11.11.2015
-->
<?php
if($_POST["ses"]!="" & $_POST["budm"]!="" & $_POST["Ymd"]!="" & $_POST["code"]!="") {
	$skip_W3C_DOCTYPE=1;
	include("../f_vars0.php");
	$ses=$_POST["ses"];
	$budm=$_POST["budm"]; if($budm*1<10) $budm="0".$budm;
	$kg=$_POST["kg"];
	$Ymd_=$_POST["Ymd"];
	$Y0=substr($Ymd_,0,4);
	$m0=substr($Ymd_,4,2);
	$d0=substr($Ymd_,6,2);
	$dbt=$Y0.$m0."_n";
	$code=$_POST["code"];
	$mod_Ymd=date('Y-m-d',time());
	$mod_His=date('H:i:s',time());
}
$cw1=$connect->query("SELECT num, id FROM $budms WHERE num='$budm'");
$cw=$cw1->fetch_assoc();
if($code==0) {
	$connect->query("INSERT INTO $dbt
	 (`created_date`,`created_time`,`day`,`month`,`year`,`ratio`,`milk_sess`,`cow_id`,`subgr_id`,`gr_id`,`lot_id`,`modif_uid`,`modif_date`,`modif_time`,`bd_num`)
	 VALUES ('$mod_Ymd','$mod_His','$d0','$m0','$Y0','$kg','$ses','1','1','1','1','1','$mod_Ymd','$mod_His','$budm')");
	echo $connect->error;
	echo $connect->insert_id;
} else {
	$connect->query("UPDATE $dbt SET
	 `day`='$d0', `month`='$m0', `year`='$Y0',
	 `ratio`='$kg',
	 `subgr_id`='1', `gr_id`='1', `lot_id`='1',
	 `modif_date`='$mod_Ymd', `modif_time`='$mod_His'
	 WHERE `code`='$code' LIMIT 1");
	echo $code;
}
?>
