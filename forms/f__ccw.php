<?php
/* DF_2: forms/f__ccw.php
form: cow's card ([C]ard of [C]o[W])
c: 17.07.2006
m: 11.11.2015 */

ob_start();//lock output to set cookies properly!

include_once( "../f_vars.php" );
include_once( "../locales/$lang/f_prep._$lang" );
include_once( "../locales/$lang/f_php._$lang" );
include_once( "../locales/$lang/f_sel._$lang" );
include_once( "../locales/$lang/f_13._$lang" );
include_once( "../dflib/f_func.php" );
include_once( "../dflib/f_lib1.php" );
include_once( "../dflib/f_librep.php" );

$dbt=$opers; Toper_create( $dbt );

$stat_days=26;//statistics period for $minus_kg array
$rfid_readonly=1;//if $rfid_readonly then 'UPDATE' will change!
if ( $userCoo!=9 & $userCoo!=3 ) $rfid_readonly=0;
if ( $rfid_readonly==1 ) $rfid_locked="onkeypress='return false'"; else $rfid_locked="onkeypress='this.value=\"\"; return false'";

$default_breed_id=49;
$random_key=$_GET["random_key"]*1;
$cow_id=$_GET["cow_id"]*1;
$cw_c=$_13_cwcard_;

$sself="../".$hFrm["0520"];
MainMenu( $cw_c."&nbsp;-&nbsp;". $php_mm['_com_app_'], "cards", "" );

$chart_h=159; include_once( "../".$hDir['reps']."fgraph.php" );

//link to return to [BEGIN]
$ret_url=$_GET["ret0"]*1;
if ( $ret_url==5 ) $ret_url="../".$hFrm["0500"];
//link to return to [END]

$ccwmode=CookieGet( "ccwmd" )*1;
//06.05.2011 [BEGIN]
$ccwmode=$ccwmode+5;
//06.05.2011 [END]
$ccw1_vis=( $ccwmode & 1 )*1;//cow's group data
$ccw4_vis=( $ccwmode & 4 )*1;//cow's state data
$ccw8_vis=( $ccwmode & 8 )*1;//cow's history data
if ( $ccw1_vis==1 ) {
	$ccw1_cb="checked"; $ccw1_disp="";
} else {
	$ccw1_cb=""; $ccw1_disp="display:none;";
}
if ( $ccw4_vis==4 ) {
	$ccw4_cb="checked"; $ccw4_disp="";
} else {
	$ccw4_cb=""; $ccw4_disp="display:none;";
}
if ( $ccw8_vis==8 ) {
	$ccw8_cb="checked"; $ccw8_disp=""; $ccw9_disp="display:none;";
} else {
	$ccw8_cb=""; $ccw8_disp="display:none;"; $ccw9_disp="";
}

$ctrl_Ymd="1901-01-01"; $nctrl_Ymd="1901-01-01";
$res=mysql_query( "SELECT day, month, year
 FROM $opers
 WHERE cow_id=$cow_id AND oper_id IN ( 1024, 2048 )", $db );
$sqlerr=mysql_errno();
if ( $sqlerr==0 ) {
	while ( $row=mysql_fetch_row( $res )) {
		$nctrl_Ymd=$row[2]."-".$row[1]."-".$row[0];
		if ( $nctrl_Ymd>$ctrl_Ymd ) $ctrl_Ymd=$nctrl_Ymd;
	}
	mysql_free_result( $res );
}
$nctrl_dmY=substr( $nctrl_Ymd, 8, 2 ).".".substr( $nctrl_Ymd, 5, 2 ).".".substr( $nctrl_Ymd, 0, 4 );

//cow's statistics update [BEGIN]
$from_dmY=$nctrl_dmY;
$df=substr( $from_dmY, 0, 2 ); $mf=substr( $from_dmY, 3, 2 ); $yf=substr( $from_dmY, 6, 4 );
$dl=substr( $now_dmY, 0, 2 ); $ml=substr( $now_dmY, 3, 2 ); $yl=substr( $now_dmY, 6, 4 );
$dc=$df; $mc=$mf; $yc=$yf;
if ( $nctrl_dmY!="01.01.1901" && $cow_id!=-2 ) {
	include_once( "../dflib/f_mcwav.php" );
	$today2scr=Date_FromDb2Scr( $now_Ymd, "-" );
	$full_lact_days__=DaysBetween( $nctrl_dmY, $today2scr );
} else $full_lact_days__=-1;
//cow's statistics update [END]

//cow's statistics calc [BEGIN]
$from_dmY=date( "d-m-Y", mktime( -24*$stat_days ));
$df=substr( $from_dmY, 0, 2 ); $mf=substr( $from_dmY, 3, 2 ); $yf=substr( $from_dmY, 6, 4 );
$dl=substr( $now_dmY, 0, 2 ); $ml=substr( $now_dmY, 3, 2 ); $yl=substr( $now_dmY, 6, 4 );
$dc=$df; $mc=$mf; $yc=$yf;
$yf=1991;//start year for date-divider. DONT ERASE THIS!
for ( $i=0; $i<=$stat_days; $i++) {
	$minusdate=date( "d-m-Y", mktime( -24*$i ));
	$minusdt[$i]=substr( $minusdate, 6, 4 )*10000+substr( $minusdate, 3, 2 )*100+substr( $minusdate, 0, 2 );
}
if ( $cow_id!=-2 ) include_once( "../dflib/f_mcw.php" );
for ( $i=0; $i<=$stat_days; $i++) {
	if ( $minus_kg[$i]*1==0 ) $minus_kg[$i]=0;
	$t_sec=$minus_mtime[$i]; $t_hh=floor( $t_sec/3600 );
	$t_sec=$t_sec-$t_hh*3600; $t_mm=floor( $t_sec/60 );
	$t_sec=$t_sec-$t_mm*60; $t_ss=$t_sec;
	if ( $t_hh*1<10 ) $t_hh="0".$t_hh;
	if ( $t_mm*1<10 ) $t_mm="0".$t_mm;
	if ( $t_ss*1<10 ) $t_ss="0".$t_ss;
	$minus_mtime[$i]=$t_mm.":".$t_ss;
	if ( $milkm_q[$i]>0 ) $milkm_aver[$i]=floor( $milkm_kg[$i]/$milkm_q[$i]*10 )/10;
	else $milkm_aver[i]=0;
	if ( $milkm_min[$i]*1==0 ) $milkm_min[$i]=0;
	if ( $milkm_aver[$i]*1==0 ) $milkm_aver[$i]=0;
	if ( $milkm_max[$i]*1==0 ) $milkm_max[$i]=0;
	$minus_kg[$stat_days+1]=$minus_kg[$stat_days+1]+$minus_kg[$i];
}
//cow's statistics calc [END]

$cwc_cancel=$_GET["cwc_cancel"]; $cwc_prep=$_GET["cwc_prep"];

//discard changes & close card
if ( $cwc_cancel!="" ) {
	Res_Draw( 3, $ret_url, "", $cw_c.":&nbsp;".$_13_card_no_changes_done_, $php_mm_tip[0] );

//save changes & close card
} else if ( $cwc_prep!="" & $userCoo!=9 ) {
	$bad_num="";
	$bad_bdate="";
	$bad_rfid="";
	$bad_rfiddate="";
	$dates_=$_GET["dates_"];
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [BEGIN]
	$national_descr=trim( $_GET["national_descr"] );
	$b_dmY=trim( $dates_[0] ); $b_dmY_=split( "-", $b_dmY );
	$b_Ymd=$b_dmY_[2]."-".$b_dmY_[1]."-".$b_dmY_[0];
	$rfid_num=trim( $_GET["rfid_num"] ); $rfid_num1=trim( $_GET["rfid_num"] );
	$cow_num=trim( $_GET["cow_num"] )*1;
	$b_num=trim( $_GET["b_num"] );
	$nick=trim( $_GET["nick"] );
	$defects=trim( $_GET["defects"] );
	$lot_id=trim( $_GET["lot_id"] );
	$gr_id=trim( $_GET["gr_id"] );
	$subgr_id=trim( $_GET["subgr_id"] );
	$breed_id=trim( $_GET["breed_id"] );
	$mth_id=trim( $_GET["mth_id"] );
	$fth_id=trim( $_GET["fth_id"] );
	$comments=trim( $_GET["comments"] );
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [END]
	if ( trim( $cow_num."." )=="." | $cow_num*1==0 ) {//$cow_num invalid
		$bad_num="style='background:#ff0000'"; $userdata_invalid=1;
	}
	if ( $b_Ymd=="0000-00-00" ) {//$b_Ymd invalid
		$bad_bdate="style='background:#ff0000'"; $userdata_invalid=1;
	}
	if ( $cow_id==-2 ) {
		$errmsg1=""; $prev_id1="";
		$res=mysql_query( "SELECT $cows.id FROM $cows WHERE $cows.cow_num='$cow_num'", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res ); $prev_id1=$row[0];
		if ( trim( $prev_id1 )!="" ) $errmsg1=$_13_cw_such_num_busy_;
		$errmsg2=""; $prev_id2="";
		if ( strlen( $rfid_num )!=0 ) {
			$res=mysql_query( "SELECT $cows.id FROM $cows WHERE $cows.rfid_num='$rfid_num'", $db );
			$row=mysql_fetch_row( $res ); mysql_free_result( $res ); $prev_id2=$row[0];
		}
		if ( trim( $prev_id2 )!="" ) $errmsg2=$_13_cw_such_rfid_busy_;
		if ( trim( $prev_id1 )!="" ) {
			$userdata_invalid=1;
			Res_Draw( 5, $sself."?cow_id=$prev_id1&ret0=05", "background:#ff0000", $errmsg1, $_13_pay_attention_ );
			return;
		} else if ( trim( $prev_id2 )!="" ) {
			$userdata_invalid=1;
			Res_Draw( 5, $sself."?cow_id=$prev_id2&ret0=05", "background:#ff0000", $errmsg2, $_13_pay_attention_ );
			return;
		}
	}
	if ( $cow_id==-2 & $userdata_invalid==0 ) {
		mysql_query( "INSERT INTO $cows (
		 `created_date`, `created_time`,
		 `str_res` )
		 VALUES (
		 '$now_Ymd', '$now_His',
		 '$random_key' )" ) or die( mysql_error());
		$res=mysql_query( "SELECT $cows.id FROM $cows WHERE str_res='$random_key'", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res );
		$cow_id=$row[0];
	}
	if ( $userdata_invalid==0 ) {
		$update_query="UPDATE $cows SET
		 cow_num='$cow_num',
		 nick='$nick',
		 national_descr='$national_descr',
		 b_num='$b_num', b_date='$b_Ymd',
		 defects='$defects',
		 comments='$comments',
		 mth_id='$mth_id', fth_id='$fth_id',
		 breed_id='$breed_id',
		 gr_id='$gr_id',
		 subgr_id='$subgr_id',
		 lot_id='$lot_id',
		 str_res='',
		 modif_uid='$userCoo',
		 modif_date='$now_Ymd', modif_time='$now_His'";
		if ( $rfid_readonly==0 ) $update_query=$update_query.",
		 rfid_date='$now_Ymd', rfid_time='$now_His',
		 rfid_num='$rfid_num', rfid_native='$rfid_num'";
		$update_query=$update_query."
		 WHERE id='$cow_id'";
		$upderr=Sql_query( $update_query );
		if ( $upderr==0 )
			Res_Draw( 3, $sself."?cow_id=$cow_id&ret0=05", "", $cw_c.":&nbsp;".$_13_card_changes_done_, $php_mm_tip[0] );
		else
			Res_Draw( 5, $sself."?cow_id=$cow_id&ret0=05", "", $cw_c.":&nbsp;".$_13_card_update_error_, $php_mm_tip[0] );
	}
//for current mom [BEGIN]
	$last_abrt="0000-00-00";
	if ( $mth_id>1 ) {
		$res=mysql_query( "SELECT b_date
		 FROM $cows WHERE mth_id=$mth_id", $db ) or die( mysql_error());
		while ( $row=mysql_fetch_row( $res )) {
			$opdate_for_db=$row[0];
			if ( $opdate_for_db>$last_abrt ) $last_abrt=$opdate_for_db;
		}
		$res=mysql_query( "SELECT day, month, year
		 FROM 000000_o WHERE ( oper_id=1024 OR oper_id=2048 ) AND cow_id=$mth_id", $db ) or die( mysql_error());
		while ( $row=mysql_fetch_row( $res )) {
			$opdate_for_db=$row[2]."-".$row[1]."-".$row[0];
			if ( $opdate_for_db>$last_abrt ) $last_abrt=$opdate_for_db;
		}
		if ( $last_abrt=="0000-00-00" ) {
			mysql_query( "UPDATE $cows SET
			 c_dates='', c_dates_res='',
			 modif_uid='$userCoo',
			 modif_date='$now_Ymd', modif_time='$now_His'
			 WHERE id=$mth_id" );
		} else {
			mysql_query( "UPDATE $cows SET
			 c_dates='$last_abrt', c_dates_res='4',
			 modif_uid='$userCoo',
			 modif_date='$now_Ymd', modif_time='$now_His'
			 WHERE id=$mth_id" );
		}
	}
//for current mom [END]
//for previous mom [BEGIN]
	$last_abrt="0000-00-00";
	if ( $prvmth_id>1 ) {
		$res=mysql_query( "SELECT b_date
		 FROM $cows WHERE mth_id=$prvmth_id", $db ) or die( mysql_error());
		while ( $row=mysql_fetch_row( $res )) {
			$opdate_for_db=$row[0];
			if ( $opdate_for_db>$last_abrt ) $last_abrt=$opdate_for_db;
		}
		$res=mysql_query( "SELECT day, month, year
		 FROM 000000_o WHERE ( oper_id=1024 OR oper_id=2048 ) AND cow_id=$prvmth_id", $db ) or die( mysql_error());
		while ( $row=mysql_fetch_row( $res )) {
			$opdate_for_db=$row[2]."-".$row[1]."-".$row[0];
			if ( $opdate_for_db>$last_abrt ) $last_abrt=$opdate_for_db;
		}
		if ( $last_abrt=="0000-00-00" ) {
			mysql_query( "UPDATE $cows SET
			 c_dates='', c_dates_res='',
			 modif_uid='$userCoo',
			 modif_date='$now_Ymd', modif_time='$now_His'
			 WHERE id=$prvmth_id" );
		} else {
			mysql_query( "UPDATE $cows SET
			 c_dates='$last_abrt', c_dates_res='4',
			 modif_uid='$userCoo',
			 modif_date='$now_Ymd', modif_time='$now_His'
			 WHERE id=$prvmth_id" );
		}
	}
//for previous mom [END]
//update milking for current date [BEGIN]
	$now_Ymd=date( "Y-m-d" );
	$now_m=substr( $now_Ymd, 5, 2 ); $now_d=substr( $now_Ymd, 8, 2 );
	$dbt_m=substr( $now_Ymd, 0, 4 ).substr( $now_Ymd, 5, 2 )."_m";
	mysql_query( "UPDATE $dbt_m SET
	 subgr_id='$subgr_id',
	 gr_id='$gr_id',
	 lot_id='$lot_id'
	 WHERE cow_id=$cow_id AND month=$now_m AND day=$now_d" );
	$sqlerr=mysql_errno();
//update milking for current date [END]
}

//init script
if (( $cwc_prep=="" | $userdata_invalid==1 ) & $cwc_cancel=="" ) {
	if ( $userdata_invalid==0 ) {
		$cow_num="0"; $nick="-";
		$b_num="0"; $b_Ymd="0000-00-00";
		$rfid_num="0"; $rfid_num1=$rfid_num;
		$defects="-"; $comments="-";
		$subgr_id=1;
		$gr_id=1;
		$lot_id=1;
		$breed_id=$default_breed_id;
		$mth_id=1; $fth_id=1;
		$res=mysql_query( "SELECT
		 $cows.cow_num, $cows.nick,
		 $cows.national_descr,
		 $cows.b_num, $cows.b_date,
		 mother.nick, father.nick,
		 $subgrs.nick,
		 $groups.nick,
		 $lots.nick,
		 $breeds.nick,
		 $cows.defects, $cows.comments,
		 $cows.mth_id, $cows.fth_id,
		 $cows.gr_id,
		 $cows.subgr_id,
		 $cows.lot_id,
		 $cows.breed_id,
		 $cows.rfid_num, $cows.rfid_native, $cows.rfid_date,
		 $cows.milk_total, $cows.milk_q, $cows.milk_max, $cows.milk_min,
		 $cows.milkm_total, $cows.milkm_q, $cows.milkm_max, $cows.milkm_min,
		 $cows.lact_days
		 FROM $cows, $cows mother, $oxes father, $breeds, $groups, $lots, $subgrs
		 WHERE $cows.id=$cow_id AND
		 father.id=$cows.fth_id AND
		 mother.id=$cows.mth_id AND
		 $breeds.id=$cows.breed_id AND
		 $groups.id=$cows.gr_id AND
		 $lots.id=$cows.lot_id AND
		 $subgrs.id=$cows.subgr_id", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res );
		$cow_num=Str2LenR( $row[0], 1, " " );
		$nick=Str2LenR( $row[1], 1, " " );
		$national_descr=Str2LenR( $row[2], 1, " " );
		$b_num=Str2LenR( $row[3], 1, " " );
		if ( $cow_id!=-2 ) $b_Ymd=Str2LenR( $row[4], 1, " " );//new cow
		$mother_nick=Str2LenR( $row[5], 1, " " );
		$father_nick=Str2LenR( $row[6], 1, " " );
		$subgr_nick=Str2LenR( $row[7], 1, " " );
		$group_nick=Str2LenR( $row[8], 1, " " );
		$lot_nick=Str2LenR( $row[9], 1, " " );
		$defects=Str2LenR( $row[11], 1, " " );
		$comments=Str2LenR( $row[12], 1, " " );
		$mth_id=$row[13]; $prvmth_id=$mth_id;
		$fth_id=$row[14];
		$gr_id=$row[15];
		$subgr_id=$row[16];
		$lot_id=$row[17];
		$breed_id=$row[18];
		if ( $cow_id==-2 ) $breed_id=$default_breed_id;
		$rfid_num=Str2LenR( $row[19], 1, " " ); $rfid_num1=$rfid_num;
		$data1=" "; $data1_1="0";
		$data2=" "; $data2_1="0";
		$data4=" "; $data4_1="0";
		$data5=" "; $data5_1="0";//reserved
		$data6=" "; $data6_1="0";//reserved
		$data7=" "; $data7_1="0";
		$data8=" "; $data8_1="0";
		$b_Ymd_=split( "-", $b_Ymd );
		$b_dmY=$b_Ymd_[2]."-".$b_Ymd_[1]."-".$b_Ymd_[0];
		$m_index=22;
	} else {
		$res=mysql_query( "SELECT
		 $cows.milk_total, $cows.milk_q, $cows.milk_max, $cows.milk_min,
		 $cows.milkm_total, $cows.milkm_q, $cows.milkm_max, $cows.milkm_min,
		 $cows.lact_days
		 FROM $cows
		 WHERE id=$cow_id", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res );
		$b_Ymd_=split( "-", $b_Ymd );//IMPORTANT! DONT ERASE!
		$b_dmY=$b_Ymd_[2]."-".$b_Ymd_[1]."-".$b_Ymd_[0];
		$m_index=0;
	}
//cow's statistics [BEGIN]
	$milk_tot=$row[$m_index]*1;
	$milk_q=$row[$m_index+1]*1;
	if ( $milk_q>0 ) $milk_aver=floor( $milk_tot/$milk_q*100 )/100; else $milk_aver=0;
	$milk_max=$row[$m_index+2]*1;
	$milk_min=$row[$m_index+3]*1;
	$milkm_tota=$row[$m_index+4]*1;
	$milkm_qa=$row[$m_index+5]*1;
	if ( $milkm_qa>0 ) $milkm_avera=floor( $milkm_tota/$milkm_qa*100 )/100; else $milkm_avera=0;
	$milkm_maxa=$row[$m_index+6]*1;
	$milkm_mina=$row[$m_index+7]*1;
	$lact_days=$row[$m_index+8]*1;
	$lact_days__=$lact_days;
	if ( $lact_days__<0 ) $lact_days__="-";
	if ( $full_lact_days__<0 ) $full_lact_days__="-";
//cow's statistics [END]
	include_once( "../oper/f_dtdiv.php" );//date for birth or rfid
	echo "
<script src='../dflib/ajax/jquery.js' type='text/javascript'></script>
<script src='../dflib/ajax/jsql.js' type='text/javascript'></script>
<script src='../oper/f_op.js' type='text/javascript'></script>
<script type='text/javascript'>
function Ccwcbs_set( url_ ) {
	var el_st_=0;
	var el_state=Boolean( document.getElementById( 'ccw8d' ).checked );
	if ( el_state==true ) var el_st_=el_st_+8;
	window.document.cookie='ccwmd='+el_st_+';path=/';
//	window.location.href=String( url_ );
}

function Ccwsect_draw( text, i, j ) {
	for ( var k=i; k<=j; k++ ) {
		var el=document.getElementById( String( text )+String( k ));
		if ( el!=null ) {
			var el_style_display=el.style.display;
			if ( el_style_display=='none' ) var el_style_display='';
			else var el_style_display='none';
			el.style.display=el_style_display;
		}
	}
}
</script>

<div class='oper_frm'>
	<div class='head'><div class='left'></div><div class='right'>&nbsp;X&nbsp;</div></div>
	<div class='border'></div>
</div>

<form name='df__cwc'>
	<input name='random_key' type='text' style='display:none;' type='hidden' value='$random_key'>
	<input id='ret0' name='ret0' style='display:none;' type='hidden' value='$ret0'>
	<input id='cow_id' name='cow_id' style='display:none;' type='hidden' value='$cow_id'>
	<table cellspacing='0' class='st3'>
	<tr $view_class>
		<td width='35%'>
			<label><input $ccw8_cb class='z_chk' id='ccw8d' type='checkbox' onclick='Ccwcbs_set( \"$sself?cow_id=$cow_id&ret0=05\" ); Ccwsect_draw( \"ccw_table\", 80, 81 ); Ccwsect_draw( \"ccw_table\", 90, 90 )'>".$ged['RHM000hist.']."</label>
			<div style='padding-right:1px; float:right; height:19px; margin-right:1px; text-align:left; width:192px'>";
	if ( $cow_id>1 ) echo "
				<div class='oper_cont' id='ccw_table81' style='$ccw8_disp'>
					<input class='btn gradient_0f0' id='oper_button' name='oper_button' type='button' value='".$php_mm['_06_tip']."'>
					<div class='oper_list'></div>
				</div>";
	echo "
			</div>
		</td>
		<td $cjust width='35%'>
			<table>
			<tr align='center'>
				<td style='color:#ff0000' width='90%'>";
	if ( $cow_id==1 ) echo "<b>".$cw_c.":&nbsp;".$_13_card_protected_."</b>";
	else {
		if ( $userCoo==9 ) echo "<b>".$cw_c.":&nbsp;".$_13_card_anonymous_user_."</b>";
		else echo "<input class='btn gradient_0f0' name='cwc_prep' style='width:100%' type='submit' value='".$php_mm['_com_accept_btn_']."'>";
	}
	echo "</td>
				<td width='10%'><input class='btn gradient_f00' name='cwc_cancel' style='width:100%' type='submit' value='X'></td>";
	if ( $userCoo!=9 ) {
		srand(( double ) microtime()*1000000 );
		$rand_key=rand( 1000000, 2000000 );
		$rand_key="<a href='../".$hFrm['0520']."?cow_id=-2&ret0=05&random_key=$rand_key'><u>".$php_mm["_com_INSE_lnk_"]."</u></a>";
	} else {
		$rand_key="";
	}
	echo "
			</tr>
			</table>
		</td>
		<td $cjust width='30%'>
			<b>".StrCutLen1( $nick, 15, $contentCharset )."</b>&nbsp;(".$ged['No.']."&nbsp;<b>".$cow_num."</b>)&nbsp;&nbsp;&nbsp;&nbsp;".$rand_key."
		</td>
	</tr>
	</table>
	<table cellspacing='0' class='st3' id='ccw_table90' style='$ccw9_disp'>
	<tr $view_class>
		<td width='70%' colspan='2'>
			<table cellspacing='0' class='st3'>
			<tr $view_class>
				<td width='25%'>&#8226;&nbsp;".$ged["Nat._Id."]."</td>
				<td width='25%'><input class='txt txt1z' maxlength='30' name='national_descr' type='text' value='$national_descr'></td>
				<td width='25%'>&#8226;&nbsp;".$_13_card_birthday_date_."</td>
				<td width='25%' $bad_bdate><a onclick='cal_u1( event, 0, 27 ); cal_load1( sender_=0 ); return false;' href=''><input class='txt txt1z' id='date10' name='dates_[0]' value='$b_dmY' onkeypress='return false' onmouseover='style.cursor=\"pointer\"'></a></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged['Number']."</td>
				<td $bad_num><input class='txt txt1z' maxlength='6' name='cow_num' type='text' value='$cow_num'></td>
				<td>&#8226;&nbsp;".$ged["Nick"]."</td>
				<td><input class='txt txt1z' maxlength='100' name='nick' type='text' value='$nick'></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$_13_card_birthday_num_."</td>
				<td><input class='txt txt1z' maxlength='30' name='b_num' type='text' value='$b_num'></td>
				<td>&#8226;&nbsp;RFID</td>
				<td><input class='txt txt1z' maxlength='30' name='rfid_num' type='text' value='$rfid_num' $rfid_locked></td>
			</tr>
			</table>
			<table cellspacing='0' class='st3' id='ccw_table11' style='$ccw1_disp'>
			<tr $view_class>
				<td width='25%'>&#8226;&nbsp;".$ged["Lot"]."</td>
				<td width='25%'><select class='sel sel1y' name='lot_id'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $lots", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		$selval="value='$r[0]'"; if ( $r[0]==$lot_id ) $selval.=" selected";
		echo "<option $selval>$r[2]</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>";
	$filt_cowid=$cow_id;
	if ( $cow_id>0 ) {
		$skip_echo=1;
		include_once( "../".$hDir['reps']."f_mlactc.php" );//lactations
//		include_once( "../".$hDir['reps']."f_mlactz.php" );//lactations milk
		$skip_echo=0;
	}
	echo "
				<td rowspan='8' width='50%'>
					<table cellspacing='0' class='st2'>
					<tr $cjust class='st_title2'>
						<td width='25%'><b>".$ged['Abort_Date~']."</b></td>
						<td style='height:23px' width='25%'><b>".$ged['Insem_Date~']."</b></td>
						<td width='25%'><b>".$ged['Zapusk_Date~']."</b></td>
						<td width='10%'><b>".$ged['Lact._days']."</b></td>
						<td title='".$ged['Predict~_tip']."'><b>".$ged['Predict~']."</b></td>
					</tr>";
	for ( $ll=1; $ll<=6; $ll++ ) {
		RepTr1( $rownum, $cjust );
		$lact_abort_=$lact_abort[$ll][$cow_id];
		$lact_insem_=$lact_insem[$ll][$cow_id];
		$lact_zapus_=$lact_zapus[$ll][$cow_id];
		$died__="height='18px'";
		if ( $died[$ll][$cow_id]==1 ) $died.=" style='color:red'>";
		if ( $ended[$ll][$cow_id]==0 )
			$lact_days_=DaysBetween( $lact_beg[$ll][$cow_id], $now_dmY );
		else
			$lact_days_=DaysBetween( $lact_beg[$ll][$cow_id], $lact_end[$ll][$cow_id] );
		if ( $lact_abort[$ll][$cow_id]=="" & $lact_insem[$ll][$cow_id]=="" & $lact_zapus[$ll][$cow_id]=="" ) $lact_days_=0;
		if ( $lact_days_==0 ) $lact_days_="";
		echo "
						<td>".$lact_abort_."&nbsp;</td>
						<td $died__>".$lact_insem_."&nbsp;</td>
						<td>".$lact_zapus_."&nbsp;</td>
						<td>".$lact_days_."&nbsp;</td>";
		if ( $ll==$lact_restr & $predict>0 ) echo "
						<td><font color='#778899'>".$predict."&nbsp;</font></td>";
		else echo "
						<td><font color='#778899'>&nbsp;</font></td>";
		echo "
					</tr>";
	}
	echo "
					</table>
				</td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Group"]."</td>
				<td><select class='sel sel1y' name='gr_id'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $groups", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		$selval="value='$r[0]'"; if ( $r[0]==$gr_id ) $selval.=" selected";
		echo "<option $selval>$r[2]&nbsp;(".$ged['No.']."&nbsp;$r[1])</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Subgroup"]."</td>
				<td><select class='sel sel1y' name='subgr_id'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $subgrs", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		if ( $r[0]!=$subgr_id ) $selval=""; else $selval="selected";
		echo "<option $selval value='$r[0]'>$r[2]</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Breed"]."</td>
				<td><select class='sel sel1y' name='breed_id'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $breeds", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		if ( $r[0]!=$breed_id ) $selval=""; else $selval="selected";
		echo "<option $selval value='$r[0]'>$r[2]</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Mom"]."</td>
				<td><select class='sel sel1y' name='mth_id'>";
	$res1=mysql_query( "SELECT $cows.id, $cows.cow_num, $cows.nick, $cows.breed_id, $breeds.num, $breeds.nick
	 FROM $cows, $breeds
	 WHERE $breeds.id=$cows.breed_id ORDER BY cow_num*1", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		if (( $r[0]!=$cow_id ) || ( $r[0]==1 )) {//dont display current cow in mth list
			if ( $r[0]!=$mth_id ) $selval=""; else $selval="selected";
			$r_val=$r[2]."&nbsp;(".$ged['No.']."&nbsp;".$r[1].")";
			if ( $r[5]>1 ) $r_val=$r_val.",&nbsp;";$r[5]."&nbsp;".$ged['breed'];
			echo "<option $selval value='$r[0]'>$r_val</option>";
		}
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Dad"]."</td>
				<td><select class='sel sel1y' name='fth_id'>";
	$res1=mysql_query( "SELECT $oxes.id, $oxes.num, $oxes.nick, $oxes.breed_id, $breeds.num, $breeds.nick
	 FROM $oxes, $breeds
	 WHERE $breeds.id=$oxes.breed_id", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		if ( $r[0]!=$fth_id ) $selval=""; else $selval="selected";
		$r_val=$r[2]."&nbsp;(".$ged['No.']."&nbsp;".$r[1].")";
		if ( $r[5]>1 ) $r_val=$r_val.",&nbsp;";$r[5]."&nbsp;".$ged['breed'];
		echo "<option $selval value='$r[0]'>$r_val</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$_13_card_diff_owner_."</td>
				<td><label><input class='z_chk' type='checkbox'></label>
			</tr>
			<tr $view_class>
				<td>&#8226;&nbsp;".$ged["Exter._Defects"]."</td>
				<td><input class='txt txt1z' maxlength='100' name='defects' type='text' value='$defects'></td>
			</tr>
			</table>";
	echo "
			<table cellspacing='0' class='st3'>
			<tr $view_class>
				<td width='25%'>&#8226;&nbsp;".$ged["Comment."]."</td>
				<td width='75%'><input class='txt txt1z' maxlength='100' name='comments' type='text' value='$comments'></td>
			</tr>
			</table>
		</td>
		<td valign='top'>
			<div id='cows_div' style='background:none; height:255px; margin:0 0 0 0; overflow-x:hidden; overflow-y:auto'>";
	include_once( "../dflib/f_tcws1.php" );
	echo "
			</div>
		</td>
	</tr>
	<tr $view_class valign='top'>
		<td colspan='3'>";
	if ( $cow_id>0 ) Chart_Show( $minus_kg, $chart_h, 3 );
	echo "
		</td>
	</tr>
	</table>";
//22.06.2011 disabled
/*	echo "
	<table border='0' id='ccw_table40' style='$ccw4_disp' width='100%'>
	<tr>
		<td width='49%'>
			<table cellspacing='1' class='st3'>
			<tr $edit_class>
				<td width='5%' style='color:#000000; background:#cccccc;'><b>".$_13_cw_today_."&nbsp;".$_13_cw_kg_.":</b></td>
				<td width='5%'>".$_13_cw_milk_.":&nbsp;<b>$minus_kg[0]</b></td>
				<td width='6%'>".$_13_cw_milk_interval_.":&nbsp;<b>$minus_mtime[0]</b></td>
				<td width='13%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_min[0]</b></td>
				<td width='13%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_aver[0]</b></td>
				<td width='13%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_max[0]</b></td>
			</tr>
			</table>
		</td>
		<td width='1%'>
		</td>
		<td width='49%'>
			<table cellspacing='1' class='st3'>
			<tr $edit_class>
				<td width='5%' style='color:#000000; background:#cccccc;'><b>".$_13_cw_yesterday_."&nbsp;".$_13_cw_kg_.":</b></td>
				<td width='5%'>".$_13_cw_milk_.":&nbsp;<b>$minus_kg[1]</b></td>
				<td width='6%'>".$_13_cw_milk_interval_.":&nbsp;<b>$minus_mtime[1]</b></td>
				<td width='13%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_min[1]</b></td>
				<td width='13%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_aver[1]</b></td>
				<td width='13%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_max[1]</b></td>
			</tr>
			</table>
		</td>
	</tr>
	</table>
	<table id='ccw_table41' style='$ccw4_disp'><tr height='3'><td></td></tr></table>
	<table cellspacing='1' class='st3' id='ccw_table42' style='$ccw4_disp'>
	<tr>
		<td colspan='8'><b>".$_13_cw_week_."&nbsp;".$_13_cw_kg_.":</b></td>
	</tr>
	<tr $edit_class>
		<td width='10%'>".$_13_cw_today_.":&nbsp;<b>$minus_kg[0]</b></td>
		<td width='10%'>".$_13_cw_yesterday_.":&nbsp;<b>$minus_kg[1]</b></td>
		<td width='10%'>".$_13_cw_week_3_days_ago_.":&nbsp;<b>$minus_kg[2]</b></td>
		<td width='10%'>".$_13_cw_week_4_days_ago_.":&nbsp;<b>$minus_kg[3]</b></td>
		<td width='10%'>".$_13_cw_week_5_days_ago_.":&nbsp;<b>$minus_kg[4]</b></td>
		<td width='10%'>".$_13_cw_week_6_days_ago_.":&nbsp;<b>$minus_kg[5]</b></td>
		<td width='10%'>".$_13_cw_week_7_days_ago_.":&nbsp;<b>$minus_kg[6]</b></td>
		<td width='10%'>".$_13_cw_week_tot_.":&nbsp;<b>$minus_kg[7]</b></td>
	</tr>
	</table>
	<table id='ccw_table43' style='$ccw4_disp'><tr height='3'><td></td></tr></table>
	<table cellspacing='1' class='st3'>
	<tr class='cards_title1'>
		<td width='10%' title='".$_13_cw_lact_."&nbsp;/&nbsp;".$ged['Lact_Days']."'>".$_13_cw_lact_."&nbsp;".$_13_cw_days_.":&nbsp;<b>$lact_days__</b>&nbsp;/&nbsp;<b>$full_lact_days__</b></td>
		<td width='10%'>".$_13_cw_lact_tot_milk_.":&nbsp;<b>$milk_tot</b></td>
		<td width='10%'>".$_13_cw_lact_min_milk_.":&nbsp;<b>$milk_min</b></td>
		<td width='10%'>".$_13_cw_lact_avg_milk_.":&nbsp;<b>$milk_aver</b></td>
		<td width='10%'>".$_13_cw_lact_max_milk_.":&nbsp;<b>$milk_max</b></td>
		<td width='10%'>".$_13_cw_min_intens_.":&nbsp;<b>$milkm_mina</b></td>
		<td width='10%'>".$_13_cw_avg_intens_.":&nbsp;<b>$milkm_avera</b></td>
		<td width='10%'>".$_13_cw_max_intens_.":&nbsp;<b>$milkm_maxa</b></td>
	</tr>
	</table>";
*/
	echo "
	<div class='mk' id='ccw_table80' style='border-color:#66a000 #66a000 #66a000 #66a000; border-style:solid; border-width:0; $ccw8_disp font-size:12; height:430px; line-height:16px; margin:0 0 0 0; overflow-x:hidden; overflow-y:auto; text-align:center;' onmouseover='in_menu=true'><br>";
	$outsele_cowid=$cow_id;
	$dbt_ext="_o";
	$outsele_=-1; $outsele_table=-1; $outsele_field=-1;
	$outsele_=-1; $outsele_table=-1; $outsele_field=-1;
	$hiddenopt=$_GET["hiddenopt"]; $outsele_=$hiddenopt; if ( $outsele_==0 ) $outsele_=-1;
	if ( $opertype*1<=0 ) $opertype=-1;
//TEMPORARY!!!
	if ( $userCoo!=9 ) $operkeys=1;
	echo "
<table class='st2'>
<tr class='st_title2' style='height:28px'>
	<td $cjust width='5%'><b>".$ged['Date']."</b></td>
	<td $cjust width='5%'><b>".$ged['Modif._Time']."</b></td>
	<td $cjust width='15%'>";
	if ( $userCoo!=9 ) {
		include_once( "../oper/f_opname.php" );
		$oper=mysql_query( "SELECT id, descr FROM $operstyp WHERE id>0 ORDER BY id", $db );
		$j=0;
		while ( $operrow=mysql_fetch_row( $oper )) {
			$opermyid[$j]=$operrow[0]*1; $opermydescr[$j]=$operrow[1];
			$j++;
		}
		echo "
		<select $edit_class name='opertype' id='opt' style='$list_sty0; width:100%'>
			<option onclick='location.href=$sself?cow_id=$cow_id&ret0=05&hiddenopt=-1'>$ged[RR0131]</option>";
		for ( $i=0; $i<count( $operspriv ); $i++ ) for ( $j=0; $j<count( $opermyid ); $j++ )
			if ( $opermyid[$j]==$operspriv[$i] ) {
				if (( $userCoo*1==9 ) | (( $userCoo*1==3 ) & ( $opermyid[$j]*1<2 )));//oper #2 only for root
				else {
					if ( $hiddenopt==$opermyid[$j]*1 ) $cb_checked="selected";
					else $cb_checked="";
				$expl=explode( " ", $opermydescr[$j] ); $expl1=$expl[0];
				if ( strlen( $expl[1] )!=0 ) $expl1=$expl1."&nbsp;".substr( $expl[1], 0, 1).".";
				echo "
			<option onclick='location.href=$sself?cow_id=$cow_id&ret0=05&hiddenopt=$opermyid[$j]' $cb_checked>$opermydescr[$j]</option>";
				}
		}
		echo "
		</select>";
	} else {
		echo "<b>".$ged['What_Was_Done']."</b>";
		$outsele_=-1;
	}
	echo "
	</td>
	<td $cjust width='45%'><b>".$ged['Detailed_Content']."</b></td>
	<td $cjust><b>".$ged['Comment.']."</b></td>";
	echo "
</tr>";
	if ( $cow_id>0 ) {
		$stop_f_jfilt_include=1;
		$dontuse_period=5;
		$cow_hist=1;
		$desc=1;
		$opertype=-1;
		$yf=1991; $mf=1; $df=01;
		$yl=2037; $ml=12; $dl=31;
		include_once( "../".$hRep['o'] );
	}
	echo "
	</div>
</form>";
}

ob_end_flush();
?>
