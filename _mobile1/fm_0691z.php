<!--
DF_2: _mobile/fm_0691z.php
form: budm
c: 25.12.2013
m: 11.11.2015
-->
<?php
//include('../f_vars0.php');
//include('../dflib/f_func.php');

$milk_sess=$_POST["milk_sess"].$_GET["milk_sess"];
$milk_date=$_POST["milk_date"].$_GET["milk_date"];
$milk_date1=$milk_date; $mod_Ymd=$milk_date;
$Ymd_=explode('-', $milk_date);
$Y0=$Ymd_[0]; $m0=$Ymd_[1]; $d0=$Ymd_[2];
$tmp=$Ymd_[0]*1; $prevYmd_[0]=$tmp;
$tmp=$Ymd_[1]*1; if($tmp<10) $tmp="0".$tmp; $prevYmd_[1]=$tmp;
$tmp=$Ymd_[2]*1-1; if($tmp<10) $tmp="0".$tmp; $prevYmd_[2]=$tmp;
$milk_date=$Ymd_[0].$Ymd_[1].$Ymd_[2];
$dbt=$Ymd_[0].$Ymd_[1]."_m"; Tmilk_create($dbt);
$dbt1=$Ymd_[0].$Ymd_[1]."_n"; Tmilk_create($dbt1);
$res=mysql_query("SELECT ratio FROM $dbt", $db);
$sqlerr=mysql_errno();
if($sqlerr>0) {
	mysql_query("ALTER TABLE `$dbt`
	 ADD `ratio` double unsigned NOT NULL default '0' AFTER `year`", $db);
}
$budms1=$connect->query("SELECT num, stall_min, stall_max, id FROM $budms ORDER BY num ASC");
if($budms1->num_rows>0) {
	while($budms_d=$budms1->fetch_assoc()) {
//echo $budms_d[num]."&nbsp;";
		$q1=mysql_query("SELECT SUM(ratio) FROM $dbt, $cows, $budms WHERE year='$Ymd_[0]' AND month='$Ymd_[1]' AND day='$Ymd_[2]' AND milk_sess='$milk_sess' AND $dbt.cow_id=$cows.id AND $cows.stall_num>=$budms.stall_min AND $cows.stall_num<=$budms.stall_max AND $budms.num='$budms_d[num]'", $db);
		$q1=mysql_fetch_row($q1);
		if($q1[0]>0) {
//echo $q1[0]."&nbsp;";
			$q2=mysql_query("SELECT ratio FROM $dbt1 WHERE year='$Ymd_[0]' AND month='$Ymd_[1]' AND day='$Ymd_[2]' AND milk_sess='$milk_sess' AND $dbt1.bd_num='$budms_d[num]'", $db);
			$q2=mysql_fetch_row($q2);
//echo $q2[0];
			$budms_[$budms_d[num]]['div']=$q1[0];
			$budms_[$budms_d[num]]['total']=$q2[0];
		} else {
			$q1=mysql_query("SELECT ratio, milk_sess, cow_id, $cows.breed_id, $cows.gr_id, $cows.subgr_id, $cows.lot_id, $cows.stall_num FROM $dbt, $cows, $budms WHERE year='$prevYmd_[0]' AND month='$prevYmd_[1]' AND day='$prevYmd_[2]' AND milk_sess='$milk_sess' AND $dbt.cow_id=$cows.id AND $cows.stall_num>=$budms.stall_min AND $cows.stall_num<=$budms.stall_max AND $budms.num='$budms_d[num]'", $db);
			while($row=mysql_fetch_row($q1)) {
				$kg=$row[0]; $ses=$row[1]; $cow=$row[2]; $breed_id=$row[3]; $gr_id=$row[4]; $subgr_id=$row[5]; $lot_id=$row[6]; $stall_num=$row[7];
				$q2=mysql_query("INSERT INTO $dbt (
				 `created_date`, `day`, `month`, `year`,
				 `ratio`, `milk_sess`, `retries`, `stall_num`, `cow_id`, `subgr_id`, `gr_id`, `lot_id`,
				 `modif_uid`, `modif_date`, `bd_num`) VALUES (
				 '$mod_Ymd', '$d0', '$m0', '$Y0',
				 '$kg', '$ses', '1', '$stall_num', '$cow', '$subgr_id', '$gr_id', '$lot_id',
				 '1', '$mod_Ymd', '96')");
			}
			$q1=mysql_query("SELECT SUM(ratio) FROM $dbt, $cows, $budms WHERE year='$Ymd_[0]' AND month='$Ymd_[1]' AND day='$Ymd_[2]' AND milk_sess='$milk_sess' AND $dbt.cow_id=$cows.id AND $cows.stall_num>=$budms.stall_min AND $cows.stall_num<=$budms.stall_max AND $budms.num='$budms_d[num]'", $db);
			$q1=mysql_fetch_row($q1);
			if($q1[0]>0) {
//echo $q1[0]."&nbsp;";
				$q2=mysql_query("SELECT ratio FROM $dbt1 WHERE year='$Ymd_[0]' AND month='$Ymd_[1]' AND day='$Ymd_[2]' AND milk_sess='$milk_sess' AND $dbt1.bd_num='$budms_d[num]'", $db);
				$q2=mysql_fetch_row($q2);
//echo $q2[0];
				$budms_[$budms_d[num]]['div']=$q1[0];
				$budms_[$budms_d[num]]['total']=$q2[0];
			}
		}
//echo "<br>";
	}
	$q3=mysql_query("SELECT code, $budms.num FROM $dbt, $cows, $budms WHERE year='$Ymd_[0]' AND month='$Ymd_[1]' AND day='$Ymd_[2]' AND milk_sess='$milk_sess' AND $dbt.cow_id=$cows.id AND $cows.stall_num>=$budms.stall_min AND $cows.stall_num<=$budms.stall_max", $db);
	while($row=mysql_fetch_row($q3)) {
//echo $row[0].",".$row[1]."<br>";
		$q4="UPDATE $dbt SET bd_num='".$row[1]."', milk_kg=round(ratio*".$budms_[$row[1]]['total']."/".$budms_[$row[1]]['div'].", 1) WHERE code='$row[0]'";
//echo $q4."<br>";
		$q4=mysql_query($q4, $db);
	}
} else {
	echo "Визначте діапазон місць для дозаторів";
}
?>
