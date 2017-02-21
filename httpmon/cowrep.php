<?php
/* DF_2: httpmon/cowrep.php
c: 17.07.2006
m: 20.05.2015 */

function His2s( $t_His ) {
	$t_s = substr( $t_His, 0, 2 )*3600+substr( $t_His, 3, 2 )*60+substr( $t_His, 6, 2 )*1;
	return $t_s;
}

function GetSessions24Fix( $globals, $sessions ) {
	$res1 = mysql_query( "SELECT sessions
	 FROM $globals" ) or die( mysql_error());
	$row = mysql_fetch_row( $res1 ); mysql_free_result( $res1 ); 
	$sess_cnt = $row[0];
	$res = mysql_query( "SELECT id, b
	 FROM $sessions ORDER BY id" ) or die( mysql_error());
	$res1="$sess_cnt;";
	while ( $row = mysql_fetch_row( $res )) $res1=$res1."$row[0];$row[1];";
	mysql_free_result( $res );
	return $res1;
}

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "../dflib/f_func.php" );
include( "common.php" );

$cow_bdleds = 0;

$modif_d = $_GET['modif_date']; $modif_t = $_GET['modif_time'];

$bd_num = $_GET['bd_num'];
$cow_num = $_GET['cow_num']*1;
$rfid_num = $_GET['rfid_num'];
$rfid_native = $_GET['rfid_native'];
if ( $rfid_num != $rfid_native ) $rfid_num = '<b>'.$rfid_native.'</b>';
$milk_kg = $_GET['milk_kg']*1;
$milk_time = $_GET['milk_time']*1; $milk_time_s=$milk_time;
$milk_time = date( "i:s", $milk_time );
$milk_sess = $_GET['milk_sess'];
$kg_30s = $_GET['kg_30s'];
$kg_60s = $_GET['kg_60s'];
$kg_90s = $_GET['kg_90s'];
$mas_ = $_GET['mast'];
$ma4_ = $_GET['mast_4'];
$x = split( '{', $ma4_ ); $r = trim( $x[1] ); $ma4_ = trim( $x[0] );
if ( $mas_ == '0' ) $ma4_ = '';
$tra_ = $_GET['tr'];
$ovu_ = $_GET['ov'];
$exh_ = 0;
$ret_ = $_GET['retries'];
$kbdstrt = $_GET['kbdstrt'];
$kbdstop = $_GET['kbdstop'];
$id_date = $_GET['id_date']; $id_time = $_GET['id_time'];
$beg_date = $_GET['beg_date']; $beg_time = $_GET['beg_time'];
$rep_date = $_GET['rep_date']; $rep_time = $_GET['rep_time'];

$id_s = His2s( $id_time );
$beg_s = His2s( $beg_time );
$rep_s = His2s( $rep_time );
//echo "REAL:<br>$id_time $id_s<br>$beg_time $beg_s<br>$rep_time $rep_s<br>";
if ( $rep_s >= 1800 ) {//$rep_time>00:30:00
	if ( $beg_s-$rep_s > $milk_time_s*2 | $rep_s-$beg_s > $milk_time_s*2 ) {
		$beg_s = $rep_s-$milk_time_s;
		$beg_time = gmdate( "H:i:s", $beg_s );
	}
	if ( $milk_time_s <= 9 ) {
		$beg_s = $rep_s;
		$beg_time = $rep_time;
	}
}
//echo "FIXED:<br>$id_time $id_s<br>$beg_time $beg_s<br>$rep_time $rep_s<br>";
//return;

//TEMPORARY! (UNLESS httpbd06 ISN'T CONNECTED TO REMOTE HOST)
$dd = substr( $modif_d, 8, 2 );
$mm = substr( $modif_d, 5, 2 );
$yyyy = substr( $modif_d, 0, 4 );
$now_Ymd = $modif_d;
$prev_Ymd = date( "Y-m-d", mktime( -24, 0, 0, $mm, $dd, $yyyy ));
$prev_dbt = substr( $prev_Ymd, 0, 4 ).substr( $prev_Ymd, 5, 2 )."_m";

if ( $milk_sess == "10" ) {//FIXED WRONG SESSION '10'!
	$sesss = split( ";", GetSessions24Fix( $globals, $sessions ));
	$sess10His = $sesss[2].":00";
	if ( $modif_t < $sess10His ) {
		$milk_sess = "30";
		$dd = substr( $prev_Ymd, 8, 2 );
		$mm = substr( $prev_Ymd, 5, 2 );
		$yyyy = substr( $prev_Ymd, 0, 4 );
		$prev_Ymd = date( "Y-m-d", mktime( -24, 0, 0, $mm, $dd, $yyyy ));
		$prev_dbt = substr( $prev_Ymd, 0, 4 ).substr( $prev_Ymd, 5, 2 )."_m";
	}
}

$dbt = $yyyy.$mm."_m"; Tmilk_create( $dbt );

//03.05.2015: replace zero $cow_num with the previous one: BEGIN
if ( $cow_num <= 0 ) {
//ERROR! $rep_date IS IN "dd.mm.yyyy" FORMAT.
//UNIVERSAL FORMAT IS NEEDED: FOR "yyyy-mm-dd" AND FOR "dd.mm.yyyy"
	$res = mysql_query( "SELECT id_time, id_cow_num FROM $parlor WHERE bd_num = $bd_num" ); $sqlerr = mysql_errno();
	if ( $sqlerr == 0 ) {
		$idr = mysql_fetch_row( $res );
		$prev_id_time = $idr[0]; $prev_id_cow_num = $idr[1];
		$res = mysql_query( "SELECT rfid_mode FROM $globals" ); $sqlerr = mysql_errno();
		if ( $sqlerr == 0 ) {
			$idr1 = mysql_fetch_row( $res );
			$rfid_mode = $idr1[0];
			if ( $rfid_mode == 2 & $id_time == $prev_id_time ) $cow_num = $prev_id_cow_num;
		}
	}
}
//03.05.2015: replace zero $cow_num with the previous one: END

$res = mysql_query( "SELECT
 id, nick, rfid_num, subgr_id, gr_id, lot_id
 FROM $cows WHERE cow_num*1 = '$cow_num'" );
$sqlerr = mysql_errno();
if ( $sqlerr != 0 ) {
	$cow_num = '0';
	$rfid_num = '<b>?SQL</b>';
	$cow_lt = '1'; $cow_gr = '1'; $cow_sg = '1';
	$cow_rfid = ''; $cow_nick = '1'; $cow_id = '1';
} else {
	$a = mysql_fetch_row( $res ); mysql_free_result( $res );
	$cow_lt = $a[5]; $cow_gr = $a[4]; $cow_sg = $a[3];
	$cow_rfid = $a[2]; $cow_nick = $a[1]; $cow_id = $a[0];
}

//10.08.2009
if ( $rfid_native != 'must_be_ignored' )
//05.06.2009
	if ( $cow_rfid != $rfid_native )
	$rfid_num = '<b>?BIN-1 '.$rfid_native.'</b>';
if ( $cow_id*1 == 0 ) {
	$cow_id = '1';
	$cow_lt = '1'; $cow_gr = '1'; $cow_sg = '1';
	$rfid_num = '<b>?BIN-0 '.$rfid_native.'</b>';
}
if ( $rfid_native == 'must_be_ignored' ) $rfid_num = '';

$script_ret = "OK";

$res2 = mysql_query( "SELECT SUM( milk_kg )
 FROM $prev_dbt
 WHERE milk_sess = '$milk_sess' AND
 cow_id = '$cow_id' AND
 modif_date = '$prev_Ymd'" );
$sqlerr = mysql_errno();
if ( $sqlerr == 0 ) {
	$row2 = mysql_fetch_row( $res2 ); mysql_free_result( $res2 );
	$milk_kg2=$row2[0]*1;//yesterday milk during session
	if ( $milk_kg2 > 0 ) {
		$milk_kg3 = $milk_kg;//today milk during session
		$res3 = mysql_query( "SELECT SUM( milk_kg )
		 FROM $dbt
		 WHERE milk_sess = '$milk_sess' AND
		 cow_id = '$cow_id' AND
		 modif_date = '$now_Ymd'" );
		$sqlerr = mysql_errno();
		if ( $sqlerr == 0 ) {
			$row3 = mysql_fetch_row( $res3 ); mysql_free_result( $res3 );
			$milk_kg3 += $row3[0]*1;
		}
		$x = ( $milk_kg3 / $milk_kg2 ) * 100;
//CRITICAL! $x MUST BE USED!
//RESULT FOR "if(2.4/3)<0.8"==TRUE, NOT FALSE!
		if ( $x < 80 ) {
			$script_ret = "exhaust";
			$exh_ = 1;
		}
	}
}

//inserting
$res1 = mysql_query( "SELECT
 r_mult
 FROM $parlor WHERE bd_num = '$bd_num'" );
$row1 = mysql_fetch_row( $res1 ); mysql_free_result( $res1 );
if (( $milk_kg == 0.1 & $milk_time_s > 15 ) | $milk_kg > 0.1 | $milk_kg == 0 )
if ( $milk_kg < 100 & $row1[0] > 0 ) {//if test ($milk_kg>100 ) or wrong calibration ($row1[0]<=0) then skip
	$r = round( $r*$row1[0], 0 );
	mysql_query( "INSERT INTO $dbt (
	 `id_time`, `milk_begin`, `milk_end`, `rep_time`,
	 `day`, `month`, `year`,
	 `milk_kg`, `kg_30s`, `kg_60s`, `kg_90s`, `r`, `milk_time`, `milk_sess`,
	 `manual`, `stopped`, `bd_num`,
	 `retries`, `exhaust`, `mast_4`, `tr`, `ov`, `cow_id`, `lot_id`, `gr_id`, `subgr_id`,
	 `modif_uid`, `modif_date`, `modif_time`, `created_date`, `created_time`,
	 `str_res` )
	 VALUES (
	 '$id_time', '$beg_time', '$rep_time', '$rep_time',
	 '$dd', '$mm', '$yyyy',
	 '$milk_kg', '$kg_30s', '$kg_60s', '$kg_90s', '$r', '$milk_time', '$milk_sess',
	 '$kbdstrt', '$kbdstop', '$bd_num',
	 '$ret_', '$exh_', '$ma4_', '$tra_', '$ovu_', '$cow_id', '$cow_lt', '$cow_gr', '$cow_sg',
	 '1', '$modif_d', '$modif_t', '$modif_d', '$modif_t',
	 '$rfid_num' )" );
}

if ( $kbdstrt*1 == 1 ) $kbdstrt = '+'; else $kbdstrt = '';
if ( $kbdstop*1 == 1 ) $kbdstop = '+'; else $kbdstop = '';
if ( $exh_*1 == 1 ) $exh_ = '+'; else $exh_ = '';
if ( $ovu_*1 == 1 ) { $ovu_ = '+'; $cow_bdleds = $cow_bdleds+2;} else $ovu_ = '';
if ( $tra_*1 == 1 ) { $tra_ = '+'; $cow_bdleds = $cow_bdleds+4;} else $tra_ = '';
if ( $mas_*1 == 1 ) { $mas_ = '+'; $cow_bdleds = $cow_bdleds+8;} else { $mas_ = ''; $ma4_ = '';}

//CRITICAL! THIS MUST BE DONE AFTER INSERT OPER!
$cow_gr = $cow_gr*1;
if ( $cow_gr < 0 ) $cow_gr = 0; if ( $cow_gr <= 9 ) $cow_gr = "0".$cow_gr;

//updating parlor
if (( $milk_kg == 0.1 & $milk_time_s > 15 ) | $milk_kg > 0.1 | $milk_kg == 0 )
	mysql_query( "UPDATE $parlor SET
	 rfid_num = '$cow_rfid',
	 milk_kg = '$milk_kg', r = '$r', milk_time = '$milk_time',
	 manual = '$kbdstrt', stopped = '$kbdstop',
	 retries = '$ret_', exhaust = '$exh_', mast = '$mas_', mast_4 = '$ma4_', tr = '$tra_', ov = '$ovu_',
	 cow_num = '$cow_num', rep_cow_num = '$cow_num', nick = '$cow_nick',
	 modif_date = '$modif_d', modif_time = '$modif_t',
	 id_date = '$id_date', id_time = '$id_time',
	 rep_date = '$rep_date', rep_time = '$rep_time',
	 locked = '$safe_rgb[$cow_gr]'
	 WHERE bd_num = $bd_num" );

//updating cow status
if ( $cow_id != 1 )
if (( $milk_kg == 0.1 & $milk_time_s > 15 ) | $milk_kg > 0.1 | $milk_kg == 0 )
	mysql_query( "UPDATE $cows SET
	 bd_leds = '$cow_bdleds'
	 WHERE id = '$cow_id'" );
if ( $cow_id == 1 )
	mysql_query( "UPDATE $cows SET
	 bd_leds = '0'
	 WHERE id = '$cow_id'" );

Dbase_disconnect();
echo $script_ret;
?>
