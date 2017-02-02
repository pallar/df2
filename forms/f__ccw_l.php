<?php
/* DF_2: forms/f__ccw_l.php
form: breed/group/lot/subgroup card ([C]ard of [C]o[W] [L]ot)
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

echo "
<script language='JavaScript'>";
include "../dflib/f_input.js";
echo "
</script>";

//link to return [BEGIN]
$ret_url=$_GET["ret0"]*1;
if ( $ret_url==0 | $ret_url==5 ) $ret_url="../".$hFrm['0500'];
//link to return [END]
$modif_Ymd=date( "Y-m-d" ); $modif_His=date( "H:i:s" );
$cwl_locked=$_GET["locked"];
$cwl_coo=$_GET["url_mode"];
$cwl_id=$_GET["url_id"];
switch( $cwl_coo ) {
	case 'cw_b':
		$cwl_c=$_13_brcard_cap; $cwl_t=$breeds;
		break;
	case 'cw_g':
		$cwl_c=$_13_grcard_cap; $cwl_t=$groups;
		break;
	case 'cw_l':
		$cwl_c=$_13_ltcard_cap; $cwl_t=$lots;
		break;
	case 'cw_s':
		$cwl_c=$_13_sgcard_cap; $cwl_t=$subgrs;
		break;
}

MainMenu( $cwl_c."&nbsp;-&nbsp;".$php_mm["_com_app_cap"], "cards", "" );

function OldData() {
	global $ret_url, $cwl_c, $cwl_t, $cwl_id, $prev_nat, $prev_num, $prev_nic, $prev_co_, $prev_cv1, $prev_cv2;
	$ret_url=$_GET["pr_url"];
	$cwl_c=$_GET["pr_title"];
	$cwl_t=$_GET["pr_dbt"];
	$cwl_id=$_GET["pr_id"];
	$prev_nat=$_GET["pr_nat"];
	$prev_num=$_GET["pr_num"];
	$prev_nic=$_GET["pr_nic"];
	$prev_co_=$_GET["pr_co_"];
	$prev_cv1=$_GET["pr_c_cv1"];
	$prev_cv2=$_GET["pr_c_cv2"];
}

$cgr_cancel=$_GET["cgr_cancel"]; $cgr_save=$_GET["cgr_save"];

//discard changes & close
if ( $cgr_cancel!="" ) {
	OldData();
	Res_Draw( 3, $ret_url, "", $cwl_c.":&nbsp;".$_13_card_no_changes_done_cap, $php_mm_tip[0] );

//save changes & close
} else if ( $cgr_save!="" & $userCoo*1!=9 ) {
	OldData();
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [BEGIN]
	$cgr_nat=StrCh2Ch( trim( $_GET["nat"] ), "`", "'" ); $cgr_nat=StrCh2Ch( trim( $_GET["nat"] ), '"', "'" );
	$cgr_num=StrCh2Ch( trim( $_GET["num"] ), "`", "'" ); $cgr_num=StrCh2Ch( trim( $_GET["num"] ), '"', "'" );
	$cgr_nic=StrCh2Ch( trim( $_GET["nic"] ), "`", "'" ); $cgr_nic=StrCh2Ch( trim( $_GET["nic"] ), '"', "'" );
	$cgr_co_=StrCh2Ch( trim( $_GET["co_"] ), "`", "'" ); $cgr_co_=StrCh2Ch( trim( $_GET["co_"] ), '"', "'" );
	$cgr_cv1=$_GET["c_cv1"]; $cgr_cv2=$_GET["c_cv2"];
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [END]
	echo "
<meta content='3;url=$ret_url' http-equiv='refresh'>
<table height='70%' width='100%'>
<tr>
	<td>";
	if ( $cwl_id!=1 & ( $prev_nat!=$cgr_nat | $prev_num!=$cgr_num | $prev_nic!=$cgr_nic | $prev_co_!=$cgr_co_ | $prev_cv1!=$cgr_cv1 | $prev_cv2!=$cgr_cv2 )) {
		if ( $cgr_cv1=="-" ) $cgr_cv1=-1;
		if ( $cgr_cv2=="-" ) $cgr_cv2=-1;
		if ( $cgr_cv1=="" ) $cgr_cv1=-1;
		if ( $cgr_cv2=="" ) $cgr_cv2=-1;
		$query="UPDATE $cwl_t SET
		 national_descr='$cgr_nat',
		 num='$cgr_num', nick='$cgr_nic',
		 comments='$cgr_co_',";
		if ( $cwl_t==$lots | $cwl_t==$groups | $cwl_t==$subgrs ) $query=$query."
		 ctrl_value_01='$cgr_cv1',
		 ctrl_value_02='$cgr_cv2',";
		$query=$query."
		 modif_uid='$userCoo',
		 modif_date='$modif_Ymd', modif_time='$modif_His'
		 WHERE id='$cwl_id'";
 		mysql_query( $query, $db );
		$exit_msg1=$cwl_c.":&nbsp;".$_13_card_changes_done_cap;
	} else
		$exit_msg1=$cwl_c.":&nbsp;".$_13_card_no_changes_by_user_cap;
	Res_Draw( 3, $ret_url, "", $exit_msg1, $php_mm_tip[0] );

//init script
} else {
	$cgr_num="0"; $cgr_nic="-";
	$cgr_co_="-";
	$cgr_cv1="-"; $cgr_cv2="-";
	$query="SELECT
	 national_descr,
	 num, nick,
	 comments";
	if ( $cwl_t==$lots | $cwl_t==$groups | $cwl_t==$subgrs ) $query=$query.",
	 ctrl_value_01, ctrl_value_02";
	$query=$query." FROM $cwl_t
	 WHERE id=$cwl_id";
	$res=mysql_query( $query, $db );
	$row=mysql_fetch_row( $res ); mysql_free_result( $res );
	$cgr_nat=Str2LenR( $row[0], 1, "-" );
	$cgr_num=Str2LenR( $row[1], 1, "-" ); $cgr_nic=Str2LenR( $row[2], 1, "-" );
	$cgr_co_=Str2LenR( $row[3], 1, "-" );
	if ( $cwl_t==$lots | $cwl_t==$groups | $cwl_t==$subgrs ) {
		$cgr_cv1=trim( $row[4] ); if ( $cgr_cv1*1==-1 ) $cgr_cv1="-";
		$cgr_cv2=trim( $row[5] ); if ( $cgr_cv2*1==-1 ) $cgr_cv2="-";
	}
	$cgr_nat=StrCh2Ch( $cgr_nat, "'", "`" ); $cgr_nat=StrCh2Ch( $cgr_nat, '"', "`" );
	$cgr_num=StrCh2Ch( $cgr_num, "'", "`" ); $cgr_num=StrCh2Ch( $cgr_num, '"', "`" );
	$cgr_nic=StrCh2Ch( $cgr_nic, "'", "`" ); $cgr_nic=StrCh2Ch( $cgr_nic, '"', "`" );
	$cgr_co_=StrCh2Ch( $cgr_co_, "'", "`" ); $cgr_co_=StrCh2Ch( $cgr_co_, '"', "`" );
	echo "
<form name='df2__$cwl_mode' method='get' action=".$cwl_phpself.">";
	if ( $cwl_id==1 | ( $cwl_locked*1==5230 & $userCoo*1>2 )) echo "
<meta content='3;url=$ret_url' http-equiv='refresh'>
<div class='zag1' style='color:#ff0000'><h3>".$cwl_c.":&nbsp;".$_13_card_protected_cap."</h3></div><div class='zag1'>".$php_mm_tip[0]."</div>";
	echo "
<table style='height:70%; width:100%'>
<tr>
	<td>
		<table class='tbl1 tbl1_h0' style='visibility:hidden'>
		<tr height='5px'>
			<td rowspan='9' width='5px'></td>
			<td colspan='3'></td>
			<td rowspan='9' width='11px'></td>
			<td colspan='3'></td>
			<td rowspan='9' width='5px'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;Parent URL</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='pr_url' type='text' value='".$ret_url."'></td>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;Title</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='pr_title' type='text' value='".$cwl_c."'></td>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;Table</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='9' name='pr_dbt' type='text' value='".$cwl_t."'></td>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;Id.</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='9' name='pr_id' type='text' value='".$cwl_id."'></td>
			<td colspan='3'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Nat._Id."]."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='30' name='pr_nat' type='text' value='".$cgr_nat."'></td>
			<td>&#8226;&nbsp;".$ged['Number']."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='4' name='pr_num' type='text' value='".$cgr_num."'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Name"]."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='pr_nic' type='text' value='".$cgr_nic."'></td>
			<td>&#8226;&nbsp;".$ged["Comment."]."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='pr_co_' type='text' value='".$cgr_co_."'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value1_cap."</td>
			<td colspan='2' width='25%'><input class='txt1 txt1_h0' maxlength='4' name='pr_c_cv1' type='text' value='".$cgr_cv1."'></td>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value2_cap."</td>
			<td colspan='2' width='25%'><input class='txt1 txt1_h0' maxlength='5' name='pr_c_cv2' type='text' value='".$cgr_cv2."'></td>
		</tr>
		<tr height='5px'>
			<td></td>
			<td colspan='2'></td>
			<td></td>
			<td colspan='2'></td>
		</tr>
		</table>
		<table class='tbl1 tbl1_h0'>
		<tr>
			<td rowspan='17' width='5px'></td>
			<td height='5px'></td>
			<td colspan='2'></td>
			<td rowspan='17' width='11px'></td>
			<td height='5px'></td>
			<td colspan='2'></td>
			<td rowspan='17' width='5px'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Nat._Id."]."</td>
			<td colspan='2' width='25%'><input class='txt1 txt1_h0' maxlength='30' name='nat' type='text' value='".$cgr_nat."'></td>
			<td>&#8226;&nbsp;".$ged['Number']."</td>
			<td colspan='2' width='25%'><input class='txt1 txt1_h0' maxlength='4' name='num' type='text' value='".$cgr_num."'></td>
		</tr>
		<tr>
			<td>&#8226;&nbsp;".$ged["Name"]."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='nic' type='text' value='".$cgr_nic."'></td>
			<td>&#8226;&nbsp;".$ged["Comment."]."</td>
			<td colspan='2'><input class='txt1 txt1_h0' maxlength='100' name='co_' type='text' value='".$cgr_co_."'></td>
		</tr>
		<tr><td colspan='9' height='3px'></td></tr>";
	if ( $cwl_id==1 | ( $cwl_locked*1==5230 & $userCoo*1>2 )) {
		if ( $cwl_coo=="cw_l" | $cwl_coo=="cw_g" | $cwl_coo=="cw_s" ) echo "
		<tr>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value1_cap."</td>
			<td width='10%'>-</td>
			<td width='15%'></td>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value2_cap."</td>
			<td width='10%'>-</td>
			<td width='15%'></td>
		</tr>
		</table>";
	} else {
		if ( $cwl_coo=="cw_l" | $cwl_coo=="cw_g" | $cwl_coo=="cw_s" ) echo "
		<tr>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value1_cap."</td>
			<td width='10%'><input id='c_cv1' class='txt1 txt1_h0' maxlength='4' name='c_cv1' type='text' value='".$cgr_cv1."' onkeydown='int_keyp( \"c_cv1\", 0, 999, 3 )'></td>
			<td width='15%'></td>
			<td>&#8226;&nbsp;".$_13_card_ctrl_value2_cap."</td>
			<td width='10%'><input id='c_cv2' class='txt1 txt1_h0' maxlength='5' name='c_cv2' type='text' value='".$cgr_cv2."' onkeydown='int_keyp( \"c_cv2\", 0, 100, 3 )'></td>
			<td width='15%'></td>
		</tr>
		</table>";
	}
	echo "
		<table class='tbl1 tbl1_h0'>
		<tr height='5px'><td colspan='5'></td></tr>
		<tr>
			<td width='5px'></td>";
	if ( $cwl_id<=1 ) echo "
			<td style='color:#ff0000; padding-top:2px'><b>".$cwl_c.":&nbsp;".$_13_card_protected_cap."</b></td>";
	else if ( $userCoo*1==9 | ( $cwl_locked*1==5230 & $userCoo*1>2 )) echo "
			<td style='color:#ff0000; padding-top:2px'><b>".$cwl_c.":&nbsp;".$_13_card_anonymous_user_cap."</b></td>";
	else echo "
			<td><input class='btn gradient_0f0 btn_h0' name='cgr_save' style='width:100%' type='submit' value='".$php_mm["_com_accept_btn_cap"]."'></td>";
	echo "
			<td width='3px'></td>
			<td width='25%'><input class='btn gradient_f00 btn_h0' name='cgr_cancel' style='width:100%' type='submit' value='X'></td>";
	echo "
			<td width='5px'></td>
		</tr>
		<tr height='5px'><td colspan='5'></td></tr>
		</table>
	</td>
</tr>
</table><br>

</form>";
}

ob_end_flush();
?>
