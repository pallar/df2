<?php
/* DF_2: forms/f__cox.php
form: ox card ([C]ard of [OX])
c: 17.07.2006
m: 15.11.2015 */

ob_start();

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_13._$lang" );
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );

//link to return [BEGIN]
$ret_url=$_GET["ret0"]*1;
if ( $ret_url==0 | $ret_url==5 ) $ret_url="../".$hFrm['0500'];
//link to return [END]
$modif_Ymd=date( "Y-m-d" ); $modif_His=date( "H:i:s" );
$ox_id=$_GET["id"];
$ox_c=$_13_oxcard_;

MainMenu( $ox_c." - ".$php_mm["_com_app_"], "cards", "" );

$cox_cancel=$_GET["cox_cancel"]; $cox_save=$_GET["cox_save"];

//discard changes & close card
if ( $cox_cancel!="" ) {
	Res_Draw( 3, $ret_url, "", $ox_c.":&nbsp;".$_13_card_no_changes_done_, $php_mm_tip[0] );

//save changes & close card
} elseif ( $cox_save!="" ) {
	$ox_id=CookieGet( "coxi" )*1;
	$dates_=$_GET["dates_"];
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [BEGIN]
	$ox_nat=trim( $_GET["ox_nat"] );
	$ox_bdt=trim( $dates_[0] ); $ox_bdt_=split( "-", $ox_bdt );
	$ox_bdt=$ox_bdt_[2]."-".$ox_bdt_[1]."-".$ox_bdt_[0];
	$ox_num=trim( $_GET["ox_num"] );
	$ox_bnu=trim( $_GET["ox_bnu"] );
	$ox_nic=trim( $_GET["ox_nic"] );
	$ox_def=trim( $_GET["ox_def"] );
	$ox_loi=trim( $_GET["ox_loi"] );
	$ox_gri=trim( $_GET["ox_gri"] );
	$ox_sgi=trim( $_GET["ox_sgi"] );
	$ox_bri=trim( $_GET["ox_bri"] );
	$ox_moi=trim( $_GET["ox_moi"] );
	$ox_dai=trim( $_GET["ox_dai"] );
	$ox_co_=trim( $_GET["ox_co_"] );
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [END]
	mysql_query( "UPDATE $oxes SET
	 num='$ox_num',
	 nick='$ox_nic',
	 national_descr='$ox_nat',
	 b_num='$ox_bnu', b_date='$ox_bdt',
	 defects='$ox_def',
	 comments='$ox_co_',
	 mth_id='$ox_moi', fth_id='$ox_dai',
	 breed_id='$ox_bri',
	 gr_id='$ox_gri',
	 subgr_id='$ox_sgi',
	 lot_id='$ox_loi',
	 modif_uid='$userCoo',
	 modif_date='$modif_date'
	 WHERE id='$ox_id'" );
	Res_Draw( 3, $ret_url, "", $ox_c.":&nbsp;".$_13_card_changes_done_, $php_mm_tip[0] );

//init script
} else {
	$ox_nat="-";
	$ox_bdt="1991-01-01";
	$ox_num=$ox_bnu="0"; $ox_nic="-";
	$ox_loi=$ox_gri=$ox_sgi=$ox_bri=1;
	$ox_moi=1; $ox_dai=1;
	$ox_def=$ox_co_="-";
	if ( $cox_reprep!=1 ) {
		CookieSet( "coxi", "$ox_id" );
	}
	if ( $cox_reprep==1 ) {
	} else {
		$res=mysql_query( "SELECT
		 $oxes.num, $oxes.nick,
		 $oxes.national_descr,
		 $oxes.b_num, $oxes.b_date,
		 mother.nick, father.nick,
		 $breeds.nick,
		 $groups.nick,
		 $subgrs.nick,
		 $lots.nick,
		 $oxes.defects, $oxes.comments,
		 $oxes.mth_id, $oxes.fth_id,
		 $oxes.breed_id,
		 $oxes.gr_id,
		 $oxes.subgr_id,
		 $oxes.lot_id
		 FROM $oxes, $cows mother, $oxes father, $breeds, $groups, $lots, $subgrs
		 WHERE $oxes.id=$ox_id AND
		 father.id=$oxes.fth_id AND
		 mother.id=$oxes.mth_id AND
		 $breeds.id=$oxes.breed_id AND
		 $groups.id=$oxes.gr_id AND
		 $lots.id=$oxes.lot_id AND
		 $subgrs.id=$oxes.subgr_id", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res );
		$ox_nat=Str2LenR( $row[2], 1, "-" );
		$ox_num=Str2LenR( $row[0], 1, "-" );
		$ox_nic=Str2LenR( $row[1], 1, "-" );
		$ox_bnu=Str2LenR( $row[3], 1, "-" );
		$ox_bdt=Str2LenR( $row[4], 1, "-" );
		$ox_moi_nic=Str2LenR( $row[5], 1, "-" );
		$ox_dai_nic=Str2LenR( $row[6], 1, "-" );
		$ox_bri_nic=Str2LenR( $row[7], 1, "-" );
		$ox_gri_nic=Str2LenR( $row[8], 1, "-" );
		$ox_sgi_nic=Str2LenR( $row[9], 1, "-" );
		$ox_loi_nic=Str2LenR( $row[10], 1, "-" );
		$ox_def=Str2LenR( $row[11], 1, "-" );
		$ox_co_=Str2LenR( $row[12], 1, "-" );
		$ox_moi=$row[13];
		$ox_dai=$row[14];
		$ox_bri=$row[15];
		$ox_gri=$row[16];
		$ox_sgi=$row[17];
		$ox_loi=$row[18];
		$ox_d1_="-"; $ox_d11="0";
		$ox_d2_="-"; $ox_d21="0";
		$ox_d4_="-"; $ox_d41="0";
		$ox_d5_="-"; $ox_d51="0";
		$ox_d6_="-"; $ox_d61="0";
		$ox_d7_="-"; $ox_d71="0";
		$ox_d8_="-"; $ox_d81="0";
	}
	$ox_bdt_=split( "-", $ox_bdt );
	$ox_bdt=$ox_bdt_[2]."-".$ox_bdt_[1]."-".$ox_bdt_[0];
	include( "../oper/f_dtdiv.php" );//date <div>
	echo "
<form name='df2__oxc'>
<table style='height:80%; width:100%'>
<tr>
	<td>
		<table class='tbl1 tbl_h0'>
		<tr height='7px'>
			<td rowspan='12' width='5px'></td>
			<td colspan='2'></td>
			<td rowspan='12' width='11px'></td>
			<td colspan='2'></td>
			<td rowspan='12' width='5px'></td>
		</tr>
		<tr>
			<td width='20%'>&#8226;&nbsp;".$ged["Nat._Id."]."</td>
			<td width='30%'><input class='txt1 txt_h0' maxlength='50' name='ox_nat' value='$ox_nat'></td>
			<td width='20%'>&#8226;&nbsp;".$_13_card_birthday_date_."</td>
			<td><a onclick='cal_u1( event, 0, 80 ); cal_load1( sender_=0 ); return false;' href=''><input class='txt1 txt_h0' id='date10' name='dates_[0]' size='8' style='cursor:pointer' value='$ox_bdt' onkeypress='return false;'></a></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged['Number']."</td>
			<td><input class='txt1 txt_h0' maxlength='4' name='ox_num' value='$ox_num'></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$_13_card_birthday_num_."</td>
			<td><input class='txt1 txt_h0' maxlength='30' name='ox_bnu' value='$ox_bnu'></td>
			<td>&#8226;&nbsp;".$ged["Nick"]."</td>
			<td><input class='txt1 txt_h0' maxlength='100' name='ox_nic' value='$ox_nic'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Exter._Defects"]."</td>
			<td><input class='txt1 txt_h0' maxlength='100' name='ox_def' value='$ox_def'></td>
			<td>&#8226;&nbsp;".$_13_card_diff_owner_."</td>
			<td><input name='ox_ali' type='checkbox' value='$ox_ali'>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Lot"]."</td>
			<td><select class='sel1 sel_h0' name='ox_loi'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $lots", $db );
	while ( $l_row=mysql_fetch_row( $res1 )) {
		$idx=$l_row[0];
		if ( $idx*1<>$ox_loi*1 ) $selval=""; else $selval="selected";
		echo "
				<option $selval value='$l_row[0]'>$l_row[2] (".$ged['No.']." $l_row[1])</option>";
		}
	mysql_free_result( $res1 );
	echo "
			</select></td>
			<td>&#8226;&nbsp;".$ged["Group"]."</td>
			<td><select class='sel1 sel_h0' name='ox_gri'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $groups", $db );
	while ( $g_row=mysql_fetch_row( $res1 )) {
		$idx=$g_row[0];
		if ( $idx*1<>$ox_gri*1 ) $selval=""; else $selval="selected";
		echo "
				<option $selval value='$g_row[0]'>$g_row[2] (".$ged['No.']." $g_row[1])</option>";
	}
	mysql_free_result( $res1 );
	echo "
			</select></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Breed"]."</td>
			<td><select class='sel1 sel_h0' name='ox_bri'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $breeds", $db );
	while ( $b_row=mysql_fetch_row( $res1 )) {
		$idx=$b_row[0];
		if ( $idx*1<>$ox_bri*1 ) $selval=""; else $selval="selected";
		echo "
				<option $selval value='$b_row[0]'>$b_row[2] (".$ged['No.']." $b_row[1])</option>";
	}
	mysql_free_result( $res1 );
	echo "
			</select></td>
			<td>&#8226;&nbsp;".$ged["Subgroup"]."</td>
			<td><select class='sel1 sel_h0' name='ox_sgi'>";
	$res1=mysql_query( "SELECT id, num, nick FROM $subgrs", $db );
	while ( $s_row=mysql_fetch_row( $res1 )) {
		$idx=$s_row[0];
		if ( $idx*1<>$ox_sgi*1 ) $selval=""; else $selval="selected";
		echo "
				<option $selval value='$s_row[0]'>$s_row[2] (".$ged['No.']." $s_row[1])</option>";
	}
	mysql_free_result( $res1 );
	echo "
			</select></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Mom"]."</td>
			<td><select class='sel1 sel_h0' name='ox_moi'>";
	$res1=mysql_query( "SELECT $cows.id, $cows.cow_num, $cows.nick, $cows.breed_id,
	 $breeds.num, $breeds.nick
	 FROM $cows, $breeds
	 WHERE $breeds.id=$cows.breed_id", $db );
	while ( $m_row=mysql_fetch_row( $res1 )) {
		$idx=$m_row[0];
		if ( $idx*1!=$ox_moi*1 ) $selval=""; else $selval="selected";
		echo "<option $selval value='$m_row[0]'>(".$ged['No.']." $m_row[1]) $m_row[2] (".$ged["Nick"].") $m_row[5] (".$ged["Breed"].")</option>";
	}
	mysql_free_result( $res1 );
	echo "</select></td>
			<td>&#8226;&nbsp;".$ged["Dad"]."</td>
			<td><select class='sel1 sel_h0' name='ox_dai'>";
	$res1=mysql_query( "SELECT $oxes.id, $oxes.num, $oxes.nick, $oxes.breed_id,
	 $breeds.num, $breeds.nick
	 FROM $oxes, $breeds
	 WHERE $breeds.id=$oxes.breed_id", $db );
	while ( $f_row=mysql_fetch_row( $res1 )) {
		$idx=$f_row[0];
		if (( $idx*1!=$ox_id*1 ) || ( $idx*1==1 )) {//dont display current ox
			if ( $idx*1!=$ox_dai*1 ) $selval=""; else $selval="selected";
			echo "
				<option $selval value='$f_row[0]'>(".$ged['No.']." $f_row[1]) $f_row[2] (".$ged["Nick"].") $f_row[5] (".$ged["Breed"].")</option>";
		}
	}
	mysql_free_result( $res1 );
	echo "
			</select></td>
		</tr>
		<tr height='3px'><td colspan='5'></td></tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Comment."]."</td>
			<td colspan='4'><input class='txt1 txt_h0' maxlength='100' name='ox_co_' value='$ox_co_'></td>
		</tr>
		</table>
		<table class='tbl1 tbl_h0'>
		<tr height='5px'><td colspan='5'></td></tr>
		<tr>
			<td width='5px'></td>";
	if ( $ox_id==1 ) echo "
			<td style='color:#ff0000; padding-top:2px'><b>".$ox_c.":&nbsp;".$_13_card_protected_."</b></td>";
	else if ( $userCoo*1==9 ) echo "
			<td style='color:#ff0000; padding-top:2px'><b>".$ox_c.":&nbsp;".$_13_card_anonymous_user_."</b></td>";
	else echo "
			<td><input class='btn btn_h0 gradient_0f0' name='cox_save' style='width:100%' type='submit' value='".$php_mm["_com_accept_btn_"]."'></td>";
	echo "
			<td width='3px'></td>
			<td width='28%'><input class='btn btn_h0 gradient_f00' name='cox_cancel' style='width:100%' type='submit' value='X'></td>
			<td width='5px'></td>
		</tr>
		<tr height='7px'><td colspan='5'></td></tr>
		</table>
	</td>
</tr>
</table><br>

</form>";
}

ob_end_flush();
?>
