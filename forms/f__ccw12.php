<?php
/* DF_2: forms/f__ccw12.php
form: cow card 2-mol ([c]ard of [c]o[w][1]part[2]:Ukraine)
c: 04.08.2009
m: 13.03.2017 */

ob_start();//lock output to set cookies properly!

$tname_s0="HEIGHT:23px";//table name style
$thead_s0="BACKGROUND:#e0f0f0; HEIGHT:23px";//table header style
$tbody_s0="BACKGROUND:#e0e0e0; HEIGHT:23px";//table body style
$tbody_s1="BACKGROUND:#e0e0e0; HEIGHT:43px";//table body style

$view_class="class='cards_title'";
$edit_class="class='cards_title1'";
$edit_sty0="border:0; width:100%; height:19px";
$list_sty0="border:0; cursor:pointer; height:19px; width:100%";
$list_sty_free="border:0; cursor:pointer; height:19px";

echo "
<script language='JavaScript'>
function do_onchange( e, c ) {
	var cname=c.name;
	document.getElementById( \"changed_input_name\").value=cname;
	e.click();
}";
include "../dflib/f_input.js";
echo "
</script>";

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_13._$lang" );
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );
include( "../dflib/f_librep.php" );

$sself="../".$hFrm["0522"];

$min_inse=1; $max_inse=11; $inse_len=2;//insemination
$min_lact=1; $max_lact=11; $lact_len=2;//lactation
$min_lactdays=1; $max_lactdays=400; $lactd_len=3;//lactation days
$min_suhodays=1; $max_suhodays=99; $suhod_len=2;//suhostoy days
$min_servdays=1; $max_servdays=99; $servd_len=2;//service days

$min_wt=1; $max_wt=1500; $wt_len=4;//weight in kg
$min_me1=1; $max_me1=2000; $me1_len=4;
$min_me2=1; $max_me2=2000; $me2_len=4;
$min_me3=1; $max_me3=9999; $me3_len=4;
$min_me4=1; $max_me4=9999; $me4_len=4;
$min_me5=1; $max_me5=9999; $me5_len=4;
$min_me6=1; $max_me6=9999; $me6_len=4;
$min_me7=1; $max_me7=9999; $me7_len=4;
$min_me8=1; $max_me8=9999; $me8_len=4;

$min_mlk=1; $max_mlk=100000;//milk in kg
$min_alb=0; $max_alb=13;//alb in percent
$min_fat=0; $max_fat=13;//fat in percent

function Data__GET() {
	global
	 $changed_input_name,
	 $cow_id,
	 $dates_,
	 $b_date,
	 $i_date,
	 $nick, $b_num, $nat, $nat1, $breed_id, $func_id, $race_id, $clas_id, $cow_id,
	 $m_nick, $m_b_num, $m_nat, $m_nat1, $m_breed_id, $m_func_id, $m_race_id, $m_clas_id, $m_id,
	 $f_nick, $f_b_num, $f_nat, $f_nat1, $f_breed_id, $f_func_id, $f_race_id, $f_clas_id, $f_id,
	 $mm_nick, $mm_b_num, $mm_nat, $mm_nat1, $mm_breed_id, $mm_func_id, $mm_race_id, $mm_clas_id, $mm_id,
	 $fm_nick, $fm_b_num, $fm_nat, $fm_nat1, $fm_breed_id, $fm_func_id, $fm_race_id, $fm_clas_id, $fm_id,
	 $mf_nick, $mf_b_num, $mf_nat, $mf_nat1, $mf_breed_id, $mf_func_id, $mf_race_id, $mf_clas_id, $mf_id,
	 $ff_nick, $ff_b_num, $ff_nat, $ff_nat1, $ff_breed_id, $ff_func_id, $ff_race_id, $ff_clas_id, $ff_id,
	 $mmm_nick, $mmm_b_num, $mmm_nat, $mmm_nat1, $mmm_breed_id, $mmm_func_id, $mmm_race_id, $mmm_clas_id, $mmm_id,
	 $fmm_nick, $fmm_b_num, $fmm_nat, $fmm_nat1, $fmm_breed_id, $fmm_func_id, $fmm_race_id, $fmm_clas_id, $fmm_id,
	 $mfm_nick, $mfm_b_num, $mfm_nat, $mfm_nat1, $mfm_breed_id, $mfm_func_id, $mfm_race_id, $mfm_clas_id, $mfm_id,
	 $ffm_nick, $ffm_b_num, $ffm_nat, $ffm_nat1, $ffm_breed_id, $ffm_func_id, $ffm_race_id, $ffm_clas_id, $ffm_id,
	 $mmf_nick, $mmf_b_num, $mmf_nat, $mmf_nat1, $mmf_breed_id, $mmf_func_id, $mmf_race_id, $mmf_clas_id, $mmf_id,
	 $fmf_nick, $fmf_b_num, $fmf_nat, $fmf_nat1, $fmf_breed_id, $fmf_func_id, $fmf_race_id, $fmf_clas_id, $fmf_id,
	 $mff_nick, $mff_b_num, $mff_nat, $mff_nat1, $mff_breed_id, $mff_func_id, $mff_race_id, $mff_clas_id, $mff_id,
	 $fff_nick, $fff_b_num, $fff_nat, $fff_nat1, $fff_breed_id, $fff_func_id, $fff_race_id, $fff_clas_id, $fff_id;

	$b_date=trim( $dates_[0] ); $b_date_=split( "-", $b_date );
	$b_date=$b_date_[2]."-".$b_date_[1]."-".$b_date_[0];
	$i_date=trim( $dates_[1] ); $i_date_=split( "-", $i_date );
	$i_date=$i_date_[2]."-".$i_date_[1]."-".$i_date_[0];

	$nick=$_GET[nick];
	$b_num=$_GET[b_num];
	$nat=$_GET[nat];
	$nat1=$_GET[nat1];
	$breed_id=$_GET[breed_id];
	$func_id=$_GET[func_id];
	$race_id=$_GET[race_id];
	$clas_id=$_GET[clas_id];

	$m_id=trim( $_GET[m_id] );
	$f_id=trim( $_GET[f_id] );
	$mm_id=trim( $_GET[mm_id] );
	$fm_id=trim( $_GET[fm_id] );
	$mf_id=trim( $_GET[mf_id] );
	$ff_id=trim( $_GET[ff_id] );
	$mmm_id=trim( $_GET[mmm_id] );
	$fmm_id=trim( $_GET[fmm_id] );
	$mfm_id=trim( $_GET[mfm_id] );
	$ffm_id=trim( $_GET[ffm_id] );
	$mmf_id=trim( $_GET[mmf_id] );
	$fmf_id=trim( $_GET[fmf_id] );
	$mff_id=trim( $_GET[mff_id] );
	$fff_id=trim( $_GET[fff_id] );
/*echo "
	changed_input_name <b>$changed_input_name</b><br>
	cow_id <b>$cow_id</b> nick <b>$nick</b><br>
	b_date <b>$b_date</b> b_num <b>$b_num</b> b_place <b>$b_place_id</b><br>
	nat <b>$nat</b><br>
	i_date <b>$i_date</b><br>
	breed_id <b>$breed_id</b><br>
	race_id <b>$race_id</b> func_id <b>$func_id</b><br>
	m_id $m_id<br>
	f_id $f_id<br>
	mm_id $mm_id<br>
	fm_id $fm_id<br>
	mf_id $mf_id<br>
	ff_id $ff_id<br>
	mmm_id $mmm_id<br>
	fmm_id $fmm_id<br>
	mfm_id $mfm_id<br>
	ffm_id $ffm_id<br>
	mmf_id $mmf_id<br>
	fmf_id $fmf_id<br>
	mff_id $mff_id<br>
	fff_id $fff_id<br>";*/
}

function EquIds( $dbt, $field, $id, $val ) {
	global $db;
	$id=$id*1; $val=$val*1;
//echo "Update values: $dbt $field $id new_value:$val<br>";
	$sele="SELECT $dbt.$field FROM $dbt WHERE $dbt.id*1=$id*1";
	$res=mysql_query( "SELECT $dbt.$field FROM $dbt WHERE $dbt.id*1=$id*1", $db );
	$row=mysql_fetch_row( $res ); $oldval=$row[0]*1;
	if ( $oldval!=$val ) {
//echo "Update values: $dbt $field $id old_value:$oldval new_value:$val<br>";
		$update_query="UPDATE $dbt SET $field='$val' WHERE id='$id'";
		$update_err=Sql_query( $update_query );
//echo "$update_query<br>";
		return 0;
	} else {
//echo "Update values: $dbt $field $id old_value:$oldval new_value:$val<br>";
		return 1;
	}
}

function Tr_UPDA( $dbt, $id, $nick, $nat, $b_num, $mth_id, $fth_id, $breed_id, $race_id, $func_id, $clas_id ) {
	global $db;
	$update_query="UPDATE $dbt SET nick='$nick', national_descr='$nat', b_num='$b_num'";
	if ( $mth_id!=-1 ) $update_query=$update_query.", mth_id='$mth_id'";
	if ( $fth_id!=-1 ) $update_query=$update_query.", fth_id='$fth_id'";
	if ( $breed_id!=-1 ) $update_query=$update_query.", breed_id='$breed_id'";
	if ( $race_id!=-1 ) $update_query=$update_query.", _race='$race_id'";
	if ( $func_id!=-1 ) $update_query=$update_query.", _function='$func_id'";
	if ( $clas_id!=-1 ) $update_query=$update_query.", _class='$clas_id'";
	$update_query=$update_query." WHERE id='$id'";
	$update_err=Sql_query( $update_query );
}

function Data_UPDA( $c, $o, $not_section_I ) {
	global
	 $changed_input_name,
	 $b_date, $b_place_id,
	 $i_date,
	 $nick, $b_num, $nat, $nat1, $breed_id, $func_id, $race_id, $clas_id, $cow_id,
	 $m_nick, $m_b_num, $m_nat, $m_nat1, $m_breed_id, $m_func_id, $m_race_id, $m_clas_id, $m_id,
	 $f_nick, $f_b_num, $f_nat, $f_nat1, $f_breed_id, $f_func_id, $f_race_id, $f_clas_id, $f_id,
	 $mm_nick, $mm_b_num, $mm_nat, $mm_nat1, $mm_breed_id, $mm_func_id, $mm_race_id, $mm_clas_id, $mm_id,
	 $fm_nick, $fm_b_num, $fm_nat, $fm_nat1, $fm_breed_id, $fm_func_id, $fm_race_id, $fm_clas_id, $fm_id,
	 $mf_nick, $mf_b_num, $mf_nat, $mf_nat1, $mf_breed_id, $mf_func_id, $mf_race_id, $mf_clas_id, $mf_id,
	 $ff_nick, $ff_b_num, $ff_nat, $ff_nat1, $ff_breed_id, $ff_func_id, $ff_race_id, $ff_clas_id, $ff_id,
	 $mmm_nick, $mmm_b_num, $mmm_nat, $mmm_nat1, $mmm_breed_id, $mmm_func_id, $mmm_race_id, $mmm_clas_id, $mmm_id,
	 $fmm_nick, $fmm_b_num, $fmm_nat, $fmm_nat1, $fmm_breed_id, $fmm_func_id, $fmm_race_id, $fmm_clas_id, $fmm_id,
	 $mfm_nick, $mfm_b_num, $mfm_nat, $mfm_nat1, $mfm_breed_id, $mfm_func_id, $mfm_race_id, $mfm_clas_id, $mfm_id,
	 $ffm_nick, $ffm_b_num, $ffm_nat, $ffm_nat1, $ffm_breed_id, $ffm_func_id, $ffm_race_id, $ffm_clas_id, $ffm_id,
	 $mmf_nick, $mmf_b_num, $mmf_nat, $mmf_nat1, $mmf_breed_id, $mmf_func_id, $mmf_race_id, $mmf_clas_id, $mmf_id,
	 $fmf_nick, $fmf_b_num, $fmf_nat, $fmf_nat1, $fmf_breed_id, $fmf_func_id, $fmf_race_id, $fmf_clas_id, $fmf_id,
	 $mff_nick, $mff_b_num, $mff_nat, $mff_nat1, $mff_breed_id, $mff_func_id, $mff_race_id, $mff_clas_id, $mff_id,
	 $fff_nick, $fff_b_num, $fff_nat, $fff_nat1, $fff_breed_id, $fff_func_id, $fff_race_id, $fff_clas_id, $fff_id;
	$update_query="UPDATE $c SET b_date='$b_date', i_date='$i_date' WHERE id='$cow_id'";
	$update_err=Sql_query( $update_query );
	if ( $not_section_I*1==1 ) {
		Tr_UPDA( $c, $cow_id, $nick, $nat, $b_num, -1, -1, $breed_id, $race_id, $func_id, -1 );
		$m_l=0; $f_l=0;
		if ( $changed_input_name=="m_id" ) $m_l=1;
		if ( $changed_input_name=="mm_id" ) $m_l=2;
		if ( $changed_input_name=="fm_id"  ) $m_l=3;
		if ( $changed_input_name=="mmm_id" ) $m_l=4;
		if ( $changed_input_name=="fmm_id" ) $m_l=5;
		if ( $changed_input_name=="mfm_id" ) $m_l=6;
		if ( $changed_input_name=="ffm_id" ) $m_l=7;
		if ( $changed_input_name=="f_id" ) $f_l=1;
		if ( $changed_input_name=="mf_id" ) $f_l=2;
		if ( $changed_input_name=="ff_id"  ) $f_l=3;
		if ( $changed_input_name=="mmf_id" ) $f_l=4;
		if ( $changed_input_name=="fmf_id" ) $f_l=5;
		if ( $changed_input_name=="mff_id" ) $f_l=6;
		if ( $changed_input_name=="fff_id" ) $f_l=7;
		if ( $m_l==0 | $m_l>1 ) Tr_UPDA( $c, $m_id, $m_nick, $m_nat, $m_b_num, $mm_id, $fm_id, $m_breed_id, $m_race_id, -1, $m_clas_id );
		if ( $f_l==0 | $f_l>1 ) Tr_UPDA( $o, $f_id, $f_nick, $f_nat, $f_b_num, $mf_id, $ff_id, $f_breed_id, $f_race_id, -1, $f_clas_id );
		if ( $m_l==0 | $m_l>2 ) Tr_UPDA( $c, $mm_id, $mm_nick, $mm_nat, $mm_b_num, $mmm_id, $fmm_id, $mm_breed_id, $mm_race_id, -1, $mm_clas_id );
		if ( $m_l==0 | $m_l==2 | $m_l>3 ) Tr_UPDA( $o, $fm_id, $fm_nick, $fm_nat, $fm_b_num, $mfm_id, $ffm_id, $fm_breed_id, $fm_race_id, -1, $fm_clas_id );
		if ( $f_l==0 | $f_l>2 ) Tr_UPDA( $c, $mf_id, $mf_nick, $mf_nat, $mf_b_num, $mmf_id, $fmf_id, $mf_breed_id, $mf_race_id, -1, $mf_clas_id );
		if ( $f_l==0 | $f_l==2 | $f_l>3 ) Tr_UPDA( $o, $ff_id, $ff_nick, $ff_nat, $ff_b_num, $mff_id, $fff_id, $ff_breed_id, $ff_race_id, -1, $ff_clas_id );
		if ( $m_l==0 | $m_l==3 | $m_l>4 ) Tr_UPDA( $c, $mmm_id, $mmm_nick, $mmm_nat, $mmm_b_num, -1, -1, $mmm_breed_id, $mmm_race_id, -1, $mmm_clas_id );
		if ( $m_l==0 | $m_l==3 | $m_l==4 | $m_l>5 ) Tr_UPDA( $o, $fmm_id, $fmm_nick, $fmm_nat, $fmm_b_num, -1, -1, $fmm_breed_id, $fmm_race_id, -1, $fmm_clas_id );
		if ( $m_l==0 | $m_l==2 | $m_l==4 | $m_l==5 | $m_l==7 ) Tr_UPDA( $c, $mfm_id, $mfm_nick, $mfm_nat, $mfm_b_num, -1, -1, $mfm_breed_id, $mfm_race_id, -1, $mfm_clas_id );
		if ( $m_l==0 | $m_l==2 | $m_l==4 | $m_l==5 | $m_l==6 ) Tr_UPDA( $o, $ffm_id, $ffm_nick, $ffm_nat, $ffm_b_num, -1, -1, $ffm_breed_id, $ffm_race_id, -1, $ffm_clas_id );
		if ( $f_l==0 | $f_l==3 | $f_l>4 ) Tr_UPDA( $c, $mmf_id, $mmf_nick, $mmf_nat, $mmf_b_num, -1, -1, $mmf_breed_id, $mmf_race_id, -1, $mmf_clas_id );
		if ( $f_l==0 | $f_l==3 | $f_l==4 | $f_l>5 ) Tr_UPDA( $o, $fmf_id, $fmf_nick, $fmf_nat, $fmf_b_num, -1, -1, $fmf_breed_id, $fmf_race_id, -1, $fmf_clas_id );
		if ( $f_l==0 | $f_l==2 | $f_l==4 | $f_l==5 | $f_l==7 ) Tr_UPDA( $c, $mff_id, $mff_nick, $mff_nat, $mff_b_num, -1, -1, $mff_breed_id, $mff_race_id, -1, $mff_clas_id );
		if ( $f_l==0 | $f_l==2 | $f_l==4 | $f_l==5 | $f_l==6 ) Tr_UPDA( $o, $fff_id, $fff_nick, $fff_nat, $fff_b_num, -1, -1, $fff_breed_id, $fff_race_id, -1, $fff_clas_id );
	} else {
		Tr_UPDA( $c, $cow_id, $nick, $nat, $b_num, $m_id, $f_id, $breed_id, $race_id, $func_id, -1 );
		Tr_UPDA( $c, $m_id, $m_nick, $m_nat, $m_b_num, $mm_id, $fm_id, $m_breed_id, $m_race_id, -1, $m_clas_id );
		Tr_UPDA( $o, $f_id, $f_nick, $f_nat, $f_b_num, $mf_id, $ff_id, $f_breed_id, $f_race_id, -1, $f_clas_id );
		Tr_UPDA( $c, $mm_id, $mm_nick, $mm_nat, $mm_b_num, $mmm_id, $fmm_id, $mm_breed_id, $mm_race_id, -1, $mm_clas_id );
		Tr_UPDA( $o, $fm_id, $fm_nick, $fm_nat, $fm_b_num, $mfm_id, $ffm_id, $fm_breed_id, $fm_race_id, -1, $fm_clas_id );
		Tr_UPDA( $c, $mf_id, $mf_nick, $mf_nat, $mf_b_num, $mmf_id, $fmf_id, $mf_breed_id, $mf_race_id, -1, $mf_clas_id );
		Tr_UPDA( $o, $ff_id, $ff_nick, $ff_nat, $ff_b_num, $mff_id, $fff_id, $ff_breed_id, $ff_race_id, -1, $ff_clas_id );
		Tr_UPDA( $c, $mmm_id, $mmm_nick, $mmm_nat, $mmm_b_num, -1, -1, $mmm_breed_id, $mmm_race_id, -1, $mmm_clas_id );
		Tr_UPDA( $o, $fmm_id, $fmm_nick, $fmm_nat, $fmm_b_num, -1, -1, $fmm_breed_id, $fmm_race_id, -1, $fmm_clas_id );
		Tr_UPDA( $c, $mfm_id, $mfm_nick, $mfm_nat, $mfm_b_num, -1, -1, $mfm_breed_id, $mfm_race_id, -1, $mfm_clas_id );
		Tr_UPDA( $o, $ffm_id, $ffm_nick, $ffm_nat, $ffm_b_num, -1, -1, $ffm_breed_id, $ffm_race_id, -1, $ffm_clas_id );
		Tr_UPDA( $c, $mmf_id, $mmf_nick, $mmf_nat, $mmf_b_num, -1, -1, $mmf_breed_id, $mmf_race_id, -1, $mmf_clas_id );
		Tr_UPDA( $o, $fmf_id, $fmf_nick, $fmf_nat, $fmf_b_num, -1, -1, $fmf_breed_id, $fmf_race_id, -1, $fmf_clas_id );
		Tr_UPDA( $c, $mff_id, $mff_nick, $mff_nat, $mff_b_num, -1, -1, $mff_breed_id, $mff_race_id, -1, $mff_clas_id );
		Tr_UPDA( $o, $fff_id, $fff_nick, $fff_nat, $fff_b_num, -1, -1, $fff_breed_id, $fff_race_id, -1, $fff_clas_id );
	}
}

function Adata_UPDA( $dbt, $id ) {
	global
	 $db,
	 $cows, $c_f2ml, $oxes, $o_f2ml;
	if ( $dbt==$cows ) $dbtt=$c_f2ml; else $dbtt=$o_f2ml;
	$res1=mysql_query( "SELECT id FROM $dbtt WHERE $dbtt.id=$id", $db );
	$row=mysql_fetch_row( $res1 ); if ( $row[0]=="" ) return 1; else return 0;
}

function Td_Echo1( $dbt, $id_exclude, $id, $select_name ) {
	global
	 $db, $buf_cows, $buf_oxes,
	 $edit_class, $list_sty_free;
	echo "
				<select $edit_class name='$select_name' style='$list_sty_free; width:100%' onchange='do_onchange( cwc_buf, $select_name )'>";
	if ( $dbt==$buf_cows ) $dbt_num="$dbt.cow_num"; else $dbt_num="$dbt.num";
	$res1=mysql_query( "SELECT $dbt.id, $dbt_num, $dbt.nick FROM $dbt ORDER BY binary($dbt.nick)", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		if (( $r[0]*1<>$id_exclude*1 ) || ( $r[0]*1==1 )) {//dont display current cow in mth list
			$sele_val="value='".$r[0]."'"; if ( $r[0]*1==$id*1 ) $sele_val="selected ".$sele_val;
			echo "
					<option $sele_val>$r[2]</option>";
		}
	}
	mysql_free_result( $res1 );
	echo "
				</select>";
}

function Td_Echo2( $dbt, $id, $select_name, $colspan ) {
	global
	 $db, $breeds, $edit_class, $list_sty0;
	echo "
				<td $colspan><select $edit_class name='$select_name' style='$list_sty0'>";
	$res1=mysql_query( "SELECT $dbt.id, $dbt.num, $dbt.nick FROM $dbt ORDER BY binary($dbt.nick)", $db );
	while ( $r=mysql_fetch_row( $res1 )) {
		$sele_val="value='".$r[0]."'"; if ( $r[0]*1==$id*1 ) $sele_val="selected ".$sele_val;
		echo "
					<option $sele_val>$r[2]</option>";
	}
	mysql_free_result( $res1 );
	echo "
				</select></td>";
}

function T_Copy( $dbt, $dbt_to, $id ) {
	global $db,
	 $buf_cows, $buf_oxes,
	 $cows, $oxes, $breeds, $groups, $lots, $subgrs, $xfuncs, $xraces, $xclasses;
	if ( $dbt==$buf_cows | $dbt==$cows ) $dbt_num="cow_num"; else $dbt_num="num";
	if ( $id*1==-1 ) {
		$res=mysql_query( "SELECT
		 $dbt.id, $dbt.$dbt_num, $dbt.nick,
		 $dbt.national_descr,
		 $dbt.b_num, $dbt.b_date, $dbt.b_place_id,
		 $dbt.defects, $dbt.comments,
		 $dbt.mth_id, $dbt.fth_id,
		 $dbt.breed_id, $breeds.nick,
		 $dbt._function, $xfuncs.nick,
		 $dbt._race, $xraces.nick,
		 $dbt._class, $xclasses.nick,
		 $dbt.i_date, $dbt.owner_id
		 FROM $dbt, $breeds, $xfuncs, $xraces, $xclasses
		 WHERE $dbt.id*1>0 AND $breeds.id=$dbt.breed_id AND
		 $xfuncs.id=$dbt._function AND $xraces.id=$dbt._race AND $xclasses.id=$dbt._class", $db );
		while ( $row=mysql_fetch_row( $res )) {
			$id=$row[0]*1; $xnum=$row[1]; $xnick=$row[2];
			$xnat_d=$row[3];
			$xb_num=$row[4]; $xb_date=$row[5]; $xb_place_id=$row[6]*1;
			$xdefects=$row[7]; $xcomments=$row[8];
			$xm_id=$row[9]*1; $xf_id=$row[10]*1;
			$xbreed_id=$row[11]*1; $xbreed_nick=$row[12];
			$xfunc_id=$row[13]*1; $xfunc_nick=$row[14];
			$xrace_id=$row[15]*1; $xrace_nick=$row[16];
			$xclas_id=$row[17]*1; $xclas_nick=$row[18];
			$xi_date=$row[19]; $xowner=$row[20]*1;
 			Sql_query( "INSERT INTO $dbt_to (
			 `id`, `$dbt_num`, `nick`,
			 `b_date`, `b_num`, `b_place_id`, `i_date`,
			 `national_descr`,
			 `mth_id`, `fth_id`,
			 `owner_id`,
			 `_function`,
			 `_race`,
			 `_class`,
			 `breed_id` )
			 VALUES (
			 '$id', '$xnum', '$xnick',
			 '$xb_date', '$xb_num', '$xb_place_id', '$xi_date',
			 '$xnat_d',
			 '$xm_id', '$xf_id',
			 '$xowner_id',
			 '$xfunc_id',
			 '$xrace_id',
			 '$xclas_id',
			 '$xbreed_id' )" );
		}
		mysql_free_result( $res );
	} else {
	}
}

function Tr_Copy( $dbt, $dbt_to, $id ) {
	global $db,
	 $buf_cows, $buf_oxes,
	 $cows, $oxes, $breeds, $groups, $lots, $subgrs, $xfuncs, $xraces, $xclasses;
	if ( $dbt==$buf_cows | $dbt==$cows ) $dbt_num="cow_num"; else $dbt_num="num";
	if ( $id*1==-1 ) {
	} else {
		$res=mysql_query( "SELECT
		 $dbt.id, $dbt.$dbt_num, $dbt.nick,
		 $dbt.national_descr,
		 $dbt.b_num, $dbt.b_date, $dbt.b_place_id,
		 $dbt.defects, $dbt.comments,
		 $dbt.mth_id, $dbt.fth_id,
		 $dbt.breed_id, $breeds.nick,
		 $dbt._function, $xfuncs.nick,
		 $dbt._race, $xraces.nick,
		 $dbt._class, $xclasses.nick,
		 $dbt.i_date, $dbt.owner_id
		 FROM $dbt, $breeds, $xfuncs, $xraces, $xclasses
		 WHERE $dbt.id*1>0 AND $breeds.id=$dbt.breed_id AND
		 $xfuncs.id=$dbt._function AND $xraces.id=$dbt._race AND $xclasses.id=$dbt._class", $db );
		$row=mysql_fetch_row( $res );
		$id=$row[0]*1; $xnum=$row[1]; $xnick=$row[2];
		$xnat_d=$row[3];
		$xb_num=$row[4]; $xb_date=$row[5]; $xb_place_id=$row[6]*1;
		$xdefects=$row[7]; $xcomments=$row[8];
		$xm_id=$row[9]*1; $xf_id=$row[10]*1;
		$xbreed_id=$row[11]*1; $xbreed_nick=$row[12];
		$xfunc_id=$row[13]*1; $xfunc_nick=$row[14];
		$xrace_id=$row[15]*1; $xrace_nick=$row[16];
		$xclas_id=$row[17]*1; $xclas_nick=$row[18];
		$xi_date=$row[19]; $xowner_id=$row[20]*1;
		mysql_free_result( $res );
		$res=mysql_query( "SELECT
		 $dbt_to.id
		 FROM $dbt_to
		 WHERE $dbt_to.id=$id", $db );
		$row=mysql_fetch_row( $res );
		if ( strlen( $row[0] )==0 ) Sql_query( "INSERT INTO $dbt_to (
		 `id`, `$dbt_num`, `nick`
		 `b_date`, `b_num`, `b_place_id`,
		 `national_descr`,
		 `mth_id`, `fth_id`,
		 `owner_id`,
		 `_function`,
		 `_race`,
		 `_class`,
		 `breed_id`,
		 `nick` )
		 VALUES (
		 '$id', '$xnum', '$xnick',
		 '$xb_date', '$xb_num', '$xb_place_id',
		 '$xnat_d',
		 '$xm_id', '$xf_id',
		 '$xowner_id',
		 '$xfunc_id',
		 '$xrace_id',
		 '$xclas_id',
		 '$xbreed_id' )" );
	}
}

function Data_SELE( $dbt, $id, $ident ) {
	global $db,
	 $c_f2ml, $o_f2ml,
	 $m_, $mm_, $mf_, $f_, $fm_, $ff_,//ARRAYS
	 $mmm_19, $mfm_19, $mmf_19, $mff_19,
	 $buf_cows, $buf_oxes,
	 $cows, $oxes, $breeds, $xfuncs, $xraces, $xclasses,
	 $b_date, $b_place_id,
	 $i_date,
	 $defects,
	 $comments,
	 $cow_num,
	 $nick, $b_num, $nat, $nat1, $breed_id, $func_id, $race_id, $clas_id,
	 $m_nick, $m_b_num, $m_nat, $m_nat1, $m_breed_id, $m_func_id, $m_race_id, $m_clas_id, $m_id,
	 $f_nick, $f_b_num, $f_nat, $f_nat1, $f_breed_id, $f_func_id, $f_race_id, $f_clas_id, $f_id,
	 $mm_nick, $mm_b_num, $mm_nat, $mm_nat1, $mm_breed_id, $mm_func_id, $mm_race_id, $mm_clas_id, $mm_id,
	 $fm_nick, $fm_b_num, $fm_nat, $fm_nat1, $fm_breed_id, $fm_func_id, $fm_race_id, $fm_clas_id, $fm_id,
	 $mf_nick, $mf_b_num, $mf_nat, $mf_nat1, $mf_breed_id, $mf_func_id, $mf_race_id, $mf_clas_id, $mf_id,
	 $ff_nick, $ff_b_num, $ff_nat, $ff_nat1, $ff_breed_id, $ff_func_id, $ff_race_id, $ff_clas_id, $ff_id,
	 $mmm_nick, $mmm_b_num, $mmm_nat, $mmm_nat1, $mmm_breed_id, $mmm_func_id, $mmm_race_id, $mmm_clas_id, $mmm_id,
	 $fmm_nick, $fmm_b_num, $fmm_nat, $fmm_nat1, $fmm_breed_id, $fmm_func_id, $fmm_race_id, $fmm_clas_id, $fmm_id,
	 $mfm_nick, $mfm_b_num, $mfm_nat, $mfm_nat1, $mfm_breed_id, $mfm_func_id, $mfm_race_id, $mfm_clas_id, $mfm_id,
	 $ffm_nick, $ffm_b_num, $ffm_nat, $ffm_nat1, $ffm_breed_id, $ffm_func_id, $ffm_race_id, $ffm_clas_id, $ffm_id,
	 $mmf_nick, $mmf_b_num, $mmf_nat, $mmf_nat1, $mmf_breed_id, $mmf_func_id, $mmf_race_id, $mmf_clas_id, $mmf_id,
	 $fmf_nick, $fmf_b_num, $fmf_nat, $fmf_nat1, $fmf_breed_id, $fmf_func_id, $fmf_race_id, $fmf_clas_id, $fmf_id,
	 $mff_nick, $mff_b_num, $mff_nat, $mff_nat1, $mff_breed_id, $mff_func_id, $mff_race_id, $mff_clas_id, $mff_id,
	 $fff_nick, $fff_b_num, $fff_nat, $fff_nat1, $fff_breed_id, $fff_func_id, $fff_race_id, $fff_clas_id, $fff_id;
	if ( $dbt==$buf_cows | $dbt==$cows ) {
		$dbt_num="cow_num";
		$res=mysql_query( "SELECT
		 `a1_0101`, `a1_0102`, `a1_0103`, `a1_0104`, `a1_0105`, `a1_0107`,
		 `a1_0201`, `a1_0202`, `a1_0203`, `a1_0204`, `a1_0205`, `a1_0207`,
		 `a1_0301`, `a1_0302`, `a1_0303`, `a1_0304`, `a1_0305`, `a1_0307`,
		 `a1_0401`, `a1_0402`, `a1_0403`, `a1_0404`, `a1_0405`, `a1_0407`,
		 `a1_0501`, `a1_0502`, `a1_0503`, `a1_0504`, `a1_0505`, `a1_0507`,
		 `a1_0601`, `a1_0602`, `a1_0603`, `a1_0604`, `a1_0605`, `a1_0607`,
		 `a1_0701`, `a1_0702`, `a1_0703`, `a1_0704`, `a1_0705`, `a1_0707`,
		 `a1_0801`, `a1_0802`, `a1_0803`, `a1_0804`, `a1_0805`, `a1_0807`,
		 `a1_0901`, `a1_0902`, `a1_0903`, `a1_0904`, `a1_0905`, `a1_0907`,
		 `a1_19`
		 FROM $c_f2ml WHERE $c_f2ml.id*1=$id", $db );
		$error=mysql_errno();
		if ( $error==0 ) {
			$row=mysql_fetch_row( $res ); $ri=0;
			for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) $a1[$ai][$aj]=-1;
			$a1[0][19]=-1;
			for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) {
				if ( $row[$ri]=="" ) $row[$ri]=-1;//IMPORTANT!!!
				if ( $row[$ri]*1==-1 ) $row[$ri]="";//IMPORTANT!!!
				if ( $aj!=6 & $aj!=8 ) {
					$a1[$ai][$aj]=$row[$ri]; $ri++;
				}
			}
			if ( $row[$ri]=="" ) $row[$ri]=-1;//IMPORTANT!!!
			if ( $row[$ri]*1==-1 ) $row[$ri]="";//IMPORTANT!!!
			$a1[0][19]=$row[$ri];
		} else {
			for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) $a1[$ai][$aj]=-1;
			$a1[0][19]=-1;
		}
	} else {
		$dbt_num="num";
		$res=mysql_query( "SELECT
		 `a1_0000`,
		 `a1_0101`, `a1_0102`, `a1_0103`,
		 `a1_0201`, `a1_0202`, `a1_0203`,
		 `a1_0301`, `a1_0303`,
		 `a1_0401`, `a1_0402`, `a1_0403`,
		 `a1_0501`, `a1_0503`
		 FROM $o_f2ml WHERE $o_f2ml.id*1=$id", $db );
		$error=mysql_errno();
		if ( $error==0 ) {
			$row=mysql_fetch_row( $res ); $ri=1;
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) $a1[$ai][$aj]=-1;
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) {
				$idxx=$ai.$aj;
				if ( $row[$ri]=="" ) $row[$ri]=-1;//IMPORTANT!!!
				if ( $row[$ri]*1==-1 ) $row[$ri]="";//IMPORTANT!!!
				if ( $idxx!='32' & $idxx!='52' ) {
					$a1[$ai][$aj]=$row[$ri]; $ri++;
				}
			}
			$a1[0][0]=$row[0];
		} else {
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) $a1[$ai][$aj]=-1;
			$a1[0][0]=-1;
		}
	}
	$res=mysql_query( "SELECT
	 $dbt.id, $dbt.$dbt_num, $dbt.nick,
	 $dbt.national_descr,
	 $dbt.b_num, $dbt.b_date, $dbt.b_place_id,
	 $dbt.defects, $dbt.comments,
	 $dbt.mth_id, $dbt.fth_id,
	 $dbt.breed_id, $breeds.nick,
	 $dbt._function, $xfuncs.nick,
	 $dbt._race, $xraces.nick,
	 $dbt._class, $xclasses.nick,
	 $dbt.i_date, $dbt.owner_id
	 FROM $dbt, $breeds, $xfuncs, $xraces, $xclasses
	 WHERE $dbt.id*1=$id AND $breeds.id=$dbt.breed_id AND
	 $xfuncs.id=$dbt._function AND $xraces.id=$dbt._race AND $xclasses.id=$dbt._class", $db );
	$row=mysql_fetch_row( $res );
	$xnum=$row[1]; $xnick=$row[2];
	$xnat_d=$row[3];
	$xb_num=$row[4]; $xb_date=$row[5]; $xb_place_id=$row[6]*1;
	$xdefects=$row[7]; $xcomments=$row[8];
	$xm_id=$row[9]*1; $xf_id=$row[10]*1;
	$xbreed_id=$row[11]*1; $xbreed_nick=$row[12];
	$xfunc_id=$row[13]*1; $xfunc_nick=$row[14];
	$xrace_id=$row[15]*1; $xrace_nick=$row[16];
	$xclas_id=$row[17]*1; $xclas_nick=$row[18];
	$xi_date=$row[19]; $xowner_id=$row[20]*1;
	mysql_free_result( $res );
	$xb_date_=split( "-", $xb_date );
	$xb_date=$xb_date_[2]."-".$xb_date_[1]."-".$xb_date_[0];
	$xi_date_=split( "-", $xi_date );
	$xi_date=$xi_date_[2]."-".$xi_date_[1]."-".$xi_date_[0];
	switch ( $ident ) {
		case 'm-f':
			$cow_num=$xnum;
			$nick=$xnick;
			$nat=$xnat_d;
			$b_num=$xb_num;
			$b_date=$xb_date; $b_place_id=$xb_place_id; $i_date=$xi_date;
			$defects=$xdefects;
			$comments=$xcomments;
			$m_id=$xm_id;
			$f_id=$xf_id;
			$breed_id=$xbreed_id;
			$func_id=$xfunc_id;
			$race_id=$xrace_id;
			$clas_id=$xclas_id;
			$breed_nick=$xbreed_nick;
			$func_nick=$xfunc_nick;
			$race_nick=$xrace_nick;
			$clas_nick=$xclas_nick;
			break;
		case 'm':
			$m_num=$xnum;
			$m_nick=$xnick;
			$m_nat=$xnat_d;
			$m_b_num=$xb_num;
			$m_b_date=$xb_date; $m_i_date=$xi_date;
			$mm_id=$xm_id;
			$fm_id=$xf_id;
			$m_breed_id=$xbreed_id;
			$m_func_id=$xfunc_id;
			$m_race_id=$xrace_id;
			$m_clas_id=$xclas_id;
			for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $m_[$ai][$aj]=$tmp_var;
			}
			break;
		case 'f':
			$f_num=$xnum;
			$f_nick=$xnick;
			$f_nat=$xnat_d;
			$f_b_num=$xb_num;
			$f_b_date=$xb_date; $f_i_date=$xi_date;
			$mf_id=$xm_id;
			$ff_id=$xf_id;
			$f_breed_id=$xbreed_id;
			$f_func_id=$xfunc_id;
			$f_race_id=$xrace_id;
			$f_clas_id=$xclas_id;
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $f_[$ai][$aj]=$tmp_var;
			}
			$f_[0][0]=$a1[0][0];
			break;
		case 'mm':
			$mm_num=$xnum;
			$mm_nick=$xnick;
			$mm_nat=$xnat_d;
			$mm_b_num=$xb_num;
			$mm_b_date=$xb_date; $mm_i_date=$xi_date;
			$mmm_id=$xm_id;
			$fmm_id=$xf_id;
			$mm_breed_id=$xbreed_id;
			$mm_func_id=$xfunc_id;
			$mm_race_id=$xrace_id;
			$mm_clas_id=$xclas_id;
			for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $mm_[$ai][$aj]=$tmp_var;
			}
			break;
		case 'fm':
			$fm_num=$xnum;
			$fm_nick=$xnick;
			$fm_nat=$xnat_d;
			$fm_b_num=$xb_num;
			$fm_b_date=$xb_date; $fm_i_date=$xi_date;
			$mfm_id=$xm_id;
			$ffm_id=$xf_id;
			$fm_breed_id=$xbreed_id;
			$fm_func_id=$xfunc_id;
			$fm_race_id=$xrace_id;
			$fm_clas_id=$xclas_id;
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $fm_[$ai][$aj]=$tmp_var;
			}
			$fm_[0][0]=$a1[0][0];
			break;
		case 'mf':
			$mf_num=$xnum;
			$mf_nick=$xnick;
			$mf_nat=$xnat_d;
			$mf_b_num=$xb_num;
			$mf_b_date=$xb_date; $mf_i_date=$xi_date;
			$mmf_id=$xm_id;
			$fmf_id=$xf_id;
			$mf_breed_id=$xbreed_id;
			$mf_func_id=$xfunc_id;
			$mf_race_id=$xrace_id;
			$mf_clas_id=$xclas_id;
			for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=8; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $mf_[$ai][$aj]=$tmp_var;
			}
			break;
		case 'ff':
			$ff_num=$xnum;
			$ff_nick=$xnick;
			$ff_nat=$xnat_d;
			$ff_b_num=$xb_num;
			$ff_b_date=$xb_date; $ff_i_date=$xi_date;
			$mff_id=$xm_id;
			$fff_id=$xf_id;
			$ff_breed_id=$xbreed_id;
			$ff_func_id=$xfunc_id;
			$ff_race_id=$xrace_id;
			$ff_clas_id=$xclas_id;
			for ( $ai=1; $ai<=5; $ai++ ) for ( $aj=1; $aj<=3; $aj++ ) {
				$tmp_var=$a1[$ai][$aj]; $ff_[$ai][$aj]=$tmp_var;
			}
			$ff_[0][0]=$a1[0][0];
			break;
		case 'mmm':
			$mmm_num=$xnum;
			$mmm_nick=$xnick;
			$mmm_nat=$xnat_d;
			$mmm_b_num=$xb_num;
			$mmm_b_date=$xb_date; $mmm_i_date=$xi_date;
			$mmm_breed_id=$xbreed_id;
			$mmm_func_id=$xfunc_id;
			$mmm_race_id=$xrace_id;
			$mmm_clas_id=$xclas_id;
			$mmm_19=$a1[0][19];
			break;
		case 'fmm':
			$fmm_num=$xnum;
			$fmm_nick=$xnick;
			$fmm_nat=$xnat_d;
			$fmm_b_num=$xb_num;
			$fmm_b_date=$xb_date; $fmm_i_date=$xi_date;
			$fmm_breed_id=$xbreed_id;
			$fmm_func_id=$xfunc_id;
			$fmm_race_id=$xrace_id;
			$fmm_clas_id=$xclas_id;
			break;
		case 'mmf':
			$mmf_num=$xnum;
			$mmf_nick=$xnick;
			$mmf_nat=$xnat_d;
			$mmf_b_num=$xb_num;
			$mmf_b_date=$xb_date; $mmf_i_date=$xi_date;
			$mmf_breed_id=$xbreed_id;
			$mmf_func_id=$xfunc_id;
			$mmf_race_id=$xrace_id;
			$mmf_clas_id=$xclas_id;
			$mmf_19=$a1[0][19];
			break;
		case 'fmf':
			$fmf_num=$xnum;
			$fmf_nick=$xnick;
			$fmf_nat=$xnat_d;
			$fmf_b_num=$xb_num;
			$fmf_b_date=$xb_date; $fmf_i_date=$xi_date;
			$fmf_breed_id=$xbreed_id;
			$fmf_func_id=$xfunc_id;
			$fmf_race_id=$xrace_id;
			$fmf_clas_id=$xclas_id;
			break;
		case 'mfm':
			$mfm_num=$xnum;
			$mfm_nick=$xnick;
			$mfm_nat=$xnat_d;
			$mfm_b_num=$xb_num;
			$mfm_b_date=$xb_date; $mfm_i_date=$xi_date;
			$mfm_breed_id=$xbreed_id;
			$mfm_func_id=$xfunc_id;
			$mfm_race_id=$xrace_id;
			$mfm_clas_id=$xclas_id;
			$mfm_19=$a1[0][19];
			break;
		case 'ffm':
			$ffm_num=$xnum;
			$ffm_nick=$xnick;
			$ffm_nat=$xnat_d;
			$ffm_b_num=$xb_num;
			$ffm_b_date=$xb_date; $ffm_i_date=$xi_date;
			$ffm_breed_id=$xbreed_id;
			$ffm_func_id=$xfunc_id;
			$ffm_race_id=$xrace_id;
			$ffm_clas_id=$xclas_id;
			break;
		case 'mff':
			$mff_num=$xnum;
			$mff_nick=$xnick;
			$mff_nat=$xnat_d;
			$mff_b_num=$xb_num;
			$mff_b_date=$xb_date; $mff_i_date=$xi_date;
			$mff_breed_id=$xbreed_id;
			$mff_func_id=$xfunc_id;
			$mff_race_id=$xrace_id;
			$mff_clas_id=$xclas_id;
			$mff_19=$a1[0][19];
			break;
		case 'fff':
			$fff_num=$xnum;
			$fff_nick=$xnick;
			$fff_nat=$xnat_d;
			$fff_b_num=$xb_num;
			$fff_b_date=$xb_date; $fff_i_date=$xi_date;
			$fff_breed_id=$xbreed_id;
			$fff_func_id=$xfunc_id;
			$fff_race_id=$xrace_id;
			$fff_clas_id=$xclas_id;
			break;
	}
}

function DateInput( $nnn ) {
	global
	 $edit_class, $edit_sty0,
	 $a2_, $a3_, $a41_, $a42_, $a43_, $a5_, $a6_, $a7_, $a8_;
	$nnn_a=split( "_", $nnn ); $idx=$nnn_a[1];
	$sender="1".$idx; $id="date11".$idx;
	switch( substr( $nnn, 0, 3 )) {
		case 'a2_': $v=$a2_[$idx]; break;
		case 'a3_': $v=$a3_[$idx]; break;
		case 'a41': $v=$a41_[$idx]; break;
		case 'a42': $v=$a42_[$idx]; break;
		case 'a43': $v=$a43_[$idx]; break;
		case 'a5_': $v=$a5_[$idx]; break;
		case 'a6_': $v=$a6_[$idx]; break;
		case 'a7_': $v=$a7_[$idx]; break;
		case 'a8_': $v=$a8_[$idx]; break;
	}
	return "
		<a onclick='cal_u1( event, 0, 0 ); cal_load1( sender_=$sender ); return false' href=''>
		<input $edit_class id='$id' name='$id' size='8' style='$edit_sty0' value='$v' onkeypress='return false' onmouseover='style.cursor=\"pointer\"'>
		</a>";
}

function IntInput( $nnn, $nnn_min, $nnn_max, $nnn_len ) {
	global
	 $edit_class, $edit_sty0,
	 $a2_, $a3_, $a41_, $a42_, $a43_, $a5_, $a6_, $a7_, $a8_;
	$nnn_a=split( "_", $nnn ); $idx=$nnn_a[1];
	switch( substr( $nnn, 0, 3 )) {
		case 'a2_': $v=$a2_[$idx]; break;
		case 'a3_': $v=$a3_[$idx]; break;
		case 'a41': $v=$a41_[$idx]; break;
		case 'a42': $v=$a42_[$idx]; break;
		case 'a43': $v=$a43_[$idx]; break;
		case 'a5_': $v=$a5_[$idx]; break;
		case 'a6_': $v=$a6_[$idx]; break;
		case 'a7_': $v=$a7_[$idx]; break;
		case 'a8_': $v=$a8_[$idx]; break;
	}
	$onkeydown="onkeydown='int_keyp( \"$nnn\", $nnn_min, $nnn_max, $nnn_len )'";
	return "
		<input autocomplete='off' $edit_class id='$nnn' maxlength='$nnn_len' name='$nnn' style='$edit_sty0' type='text' value='$v' $onkeydown>";
}

function RealInput( $nnn, $nnn_min, $nnn_max, $nnn_len, $nnn_decs ) {
	global
	 $edit_class, $edit_sty0,
	 $a2_, $a3_, $a41_, $a42_, $a43_, $a5_, $a6_, $a7_, $a8_;
	$nnn_a=split( "_", $nnn ); $idx=$nnn_a[1];
	switch( substr( $nnn, 0, 3 )) {
		case 'a2_': $v=$a2_[$idx]; break;
		case 'a3_': $v=$a3_[$idx]; break;
		case 'a41': $v=$a41_[$idx]; break;
		case 'a42': $v=$a42_[$idx]; break;
		case 'a43': $v=$a43_[$idx]; break;
		case 'a5_': $v=$a5_[$idx]; break;
		case 'a6_': $v=$a6_[$idx]; break;
		case 'a7_': $v=$a7_[$idx]; break;
		case 'a8_': $v=$a8_[$idx]; break;
	}
	$onkeydown="onkeydown='real_keyp( \"$nnn\", $nnn_min, $nnn_max, $nnn_len, $nnn_decs )'";
	return "
		<input autocomplete='off' $edit_class id='$nnn' maxlength='$nnn_len' name='$nnn' style='$edit_sty0' type='text' value='$v' $onkeydown>";
}

function StrInput( $nnn, $nnn_len ) {
	global
	 $edit_class, $edit_sty0,
	 $a2_, $a3_, $a41_, $a42_, $a43_, $a5_, $a6_, $a7_, $a8_;
	$nnn_a=split( "_", $nnn ); $idx=$nnn_a[1];
	switch( substr( $nnn, 0, 3 )) {
		case 'a2_': $v=$a2_[$idx]; break;
		case 'a3_': $v=$a3_[$idx]; break;
		case 'a41': $v=$a41_[$idx]; break;
		case 'a42': $v=$a42_[$idx]; break;
		case 'a43': $v=$a43_[$idx]; break;
		case 'a5_': $v=$a5_[$idx]; break;
		case 'a6_': $v=$a6_[$idx]; break;
		case 'a7_': $v=$a7_[$idx]; break;
		case 'a8_': $v=$a8_[$idx]; break;
	}
	return "
		<input autocomplete='off' $edit_class id='$nnn' maxlength='$nnn_len' name='$nnn' style='$edit_sty0' type='text' value='$v'>";
}

$cw_c="Картка племінної тварини";
$title="Інтернет-Ферма: ".$cw_c;

$cwc_prep=$_GET["cwc_prep"];
$cwc_buf=$_GET["cwc_buf"];
$cwc_cancel=$_GET["cwc_cancel"];

//echo "buttons: $cwc_prep $cwc_buf $cwc_cancel<br><br>";

//НЕЗАВЕРШЕНО, НУЖНО АНАЛИЗИРОВАТЬ И, ЕСЛИ КЛЮЧ УЖЕ ЗАНЯТ, ГЕНЕРИРОВАТЬ НОВЫЙ!!!
$local_id=CookieGet( "_ccwid" );
$local_id="111111111111111111";//ЭТУ СТРОКУ НУЖНО УДАЛИТЬ ПОСЛЕ ЗАВЕРШЕНИЯ РАБОТЫ!!!
if ( strlen( $local_id )<8 ) {
	$local_id=md5( uniqid( rand(), true ));
	CookieSet( "_ccwid", "$local_id" );
} else {
	$local_id1=Var_FromDb( "$local_id", "0", $userCoo );
}
Var_ToDb( "varchar", "tmp_".$local_id, $local_id, $userCoo );

$buf_cows="tmp_".$local_id."c";
$buf_oxes="tmp_".$local_id."o";

$modif_date=date( "Y-m-d" ); $modif_time=date( "H:i:s" );
$cow_id=$_GET[cow_id];
$changed_input_name=$_GET[changed_input_name];
$random_key=$_GET[random_key]*1;
$ret0=$_GET[ret0];//link to return to previous page
if ( $ret0=="00" ) $ret_url="../".$hFrm["0500"];

//discard changes & close card
if ( $cwc_cancel!="" ) {
//	$cow_id=CookieGet( "ccwi" )*1;
	mysql_query( "DROP TABLE IF EXISTS $buf_cows" );
	mysql_query( "DROP TABLE IF EXISTS $buf_oxes" );
	Res_Draw( 3, $ret_url, "", $cw_c.":&nbsp;".$_13_card_no_changes_done_, $php_mm_tip[0] );

//save changes to buffer
} else if ( $cwc_buf!="" ) {

//save changes & close card
} else if ( $cwc_prep!="" ) {
	$cow_id_exist=$_GET[cow_id_exist]*1;
	$update_err=0;
//$_GET cycle for part 2 of ccw1
	$aij=Int2StrZ( 0, 2 ).Int2StrZ( 1, 2 ); $nnn="a3_".$aij; $a3_[$aij]=$_GET[$nnn];
	for ( $ai=1; $ai<=12; $ai++ ) for ( $aj=1; $aj<=2; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a2_".$aij; $a2_[$aij]=$_GET[$nnn];
		if ( strlen( trim( $a2_[$aij] ))==0 ) $a2_[$aij]=-1;
	}
	for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=5; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a3_".$aij; $a3_[$aij]=$_GET[$nnn];
		if ( strlen( trim( $a3_[$aij] ))==0 ) $a3_[$aij]="-1";
	}
	for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a41_".$aij; $a41_[$aij]=$_GET[$nnn];
		if ( strlen( trim( $a41_[$aij] ))==0 ) $a41_[$aij]="-1";
	}
	for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a42_".$aij; $a42_[$aij]=$_GET[$nnn];
		if ( strlen( trim( $a42_[$aij] ))==0 ) $a42_[$aij]="-1";
	}
	for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a43_".$aij; $a43_[$aij]=$_GET[$nnn];
		if ( strlen( trim( $a43_[$aij] ))==0 ) $a43_[$aij]="-1";
	}
	for ( $ai=1; $ai<=11; $ai++ ) {
		for ( $aj=1; $aj<=7; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a5_".$aij; $a5_[$aij]=$_GET[$nnn];
			if ( strlen( trim( $a5_[$aij] ))==0 ) $a5_[$aij]="-1";
		}
 		for ( $aj=1; $aj<=9; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a6_".$aij; $a6_[$aij]=$_GET[$nnn];
			if ( strlen( trim( $a6_[$aij] ))==0 ) $a6_[$aij]="-1";
		}
 		for ( $aj=1; $aj<=2; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a7_".$aij; $a7_[$aij]=$_GET[$nnn];
			if ( strlen( trim( $a7_[$aij] ))==0 ) $a7_[$aij]="-1";
		}
 		for ( $aj=1; $aj<=6; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 ); $nnn="a8_".$aij; $a8_[$aij]=$_GET[$nnn];
			if ( strlen( trim( $a8_[$aij] ))==0 ) $a8_[$aij]="-1";
		}
	}
	for ( $ai=1; $ai<=11; $ai++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( 2, 2 ); $nnn="date11".$aij; $a5_[$aij]=$_GET[$nnn];
		if ( strlen( $a5_[$aij] )==10 ) $a5_[$aij]=Date_FromScr2Db( $a5_[$aij] );
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( 4, 2 ); $nnn="date11".$aij; $a5_[$aij]=$_GET[$nnn];
		if ( strlen( $a5_[$aij] )==10 ) $a5_[$aij]=Date_FromScr2Db( $a5_[$aij] );
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( 5, 2 ); $nnn="date11".$aij; $a5_[$aij]=$_GET[$nnn];
		if ( strlen( $a5_[$aij] )==10 ) $a5_[$aij]=Date_FromScr2Db( $a5_[$aij] );
	}
//$_GET cycle for part 2 of ccw1 [END]
	$update_query="UPDATE $cows SET defects='".$a3_['0001']."' WHERE id='$cow_id'";//ONLY FOR a3_['1201'] ELEMENT!!!
	$update_err=Sql_query( $update_query );
	if ( $cow_id_exist!=1 ) Sql_query( "INSERT INTO $c_f2ml ( `id` ) VALUES ( $cow_id )" );
	$update_query="UPDATE $c_f2ml SET a2_0101='".$a2_['0101']."'";
	for ( $ai=1; $ai<=12; $ai++ ) for ( $aj=1; $aj<=2; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
		if ( $aij!="0101" ) $update_query=$update_query.", a2_".$aij."='".$a2_[$aij]."'";//ONLY FOR 'a2_' ARRAY!!!
	}
	for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=5; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
		$update_query=$update_query.", a3_".$aij."='".$a3_[$aij]."'";
	}
	for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
		$update_query=$update_query.", a41_".$aij."='".$a41_[$aij]."'";
		$update_query=$update_query.", a42_".$aij."='".$a42_[$aij]."'";
		$update_query=$update_query.", a43_".$aij."='".$a43_[$aij]."'";
	}
	for ( $ai=1; $ai<=11; $ai++ ) {
		for ( $aj=1; $aj<=7; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$update_query=$update_query.", a5_".$aij."='".$a5_[$aij]."'";
		}
		for ( $aj=1; $aj<=9; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$update_query=$update_query.", a6_".$aij."='".$a6_[$aij]."'";
		}
		for ( $aj=1; $aj<=2; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$update_query=$update_query.", a7_".$aij."='".$a7_[$aij]."'";
		}
		for ( $aj=1; $aj<=6; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$update_query=$update_query.", a8_".$aij."='".$a8_[$aij]."'";
		}
	}
	$update_query=$update_query." WHERE id='$cow_id'";
	$update_err=Sql_query( $update_query );
//	echo $update_query."<br>";
	if ( $update_err==0 )
		Res_Draw( 3, $PHP_SELF."?cow_id=$cow_id&ret0=$ret0", "", $cw_c.":&nbsp;"."До картки тварини \"$nick\", номер \":$cow_num.\" (код: $cow_id) внесенi змiни.", $php_mm_tip[0] );
	else
		Res_Draw( 3, $PHP_SELF."?cow_id=$cow_id&ret0=$ret0", "", $cw_c.":&nbsp;"."Помилка внесення змiн до картки тварини \"$nick\", номер \":$cow_num.\" (код: $cow_id).", $php_mm_tip[0] );
}

//init script
if (( $cwc_prep=="" | $userdata_invalid==1 ) & $cwc_cancel=="" ) {
	if ( $userdata_invalid==0 ) {
		if ( $cwc_buf=="" ) {
			mysql_query( "DROP TABLE IF EXISTS $buf_cows" );
			mysql_query( "DROP TABLE IF EXISTS $buf_oxes" );
			mysql_query( "CREATE TABLE $buf_cows (
			 `id` int( 10 ) unsigned NOT NULL auto_increment,
			 `cow_num` varchar( 7 ) NOT NULL default '0',
			 `b_date` date NOT NULL default '1991-12-31',
			 `b_num` varchar( 30 ) NOT NULL default '',
			 `b_place_id` int( 10 ) unsigned NOT NULL default '1',
			 `i_date` date NOT NULL default '1991-12-31',
			 `owner_id` int( 10 ) unsigned NOT NULL default '1',
			 `national_descr` varchar( 30 ) NOT NULL default '',
			 `mth_id` int( 10 ) unsigned NOT NULL default '1',
			 `fth_id` int( 10 ) unsigned NOT NULL default '1',
			 `breed_id` smallint( 5 ) unsigned NOT NULL default '1',
			 `_function` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `_race` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `_class` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `nick` varchar( 100 ) NOT NULL default '',
			 `defects` varchar( 100 ) NOT NULL default '',
			 `comments` varchar( 100 ) NOT NULL default '',
			 `a_dates` varchar( 255 ) NOT NULL default '',
			 `b_dates` varchar( 255 ) NOT NULL default '',
			 `c_dates` varchar( 255 ) NOT NULL default '',
			 `modif_date` date NOT NULL default '1991-12-31',
			 `modif_time` time NOT NULL default '00:00:00',
			 `int_res` mediumint( 9 ) NOT NULL default '0',
			 `str_res` varchar( 255 ) NOT NULL default '',
			 PRIMARY KEY ( `id` ))
			 $table_utf8 $mysql_TYPE MIN_ROWS=1 COMMENT='Cows *$buf_cows.MYD*'", $db ) or die( mysql_error());
			mysql_query( "CREATE TABLE $buf_oxes (
			 `id` int( 10 ) unsigned NOT NULL auto_increment,
			 `num` varchar( 4 ) NOT NULL default '0',
			 `b_date` date NOT NULL default '1991-12-31',
			 `b_num` varchar( 30 ) NOT NULL default '',
			 `b_place_id` int( 10 ) unsigned NOT NULL default '1',
			 `i_date` date NOT NULL default '1991-12-31',
			 `owner_id` int( 10 ) unsigned NOT NULL default '1',
			 `national_descr` varchar( 30 ) NOT NULL default '',
			 `mth_id` int( 10 ) unsigned NOT NULL default '1',
			 `fth_id` int( 10 ) unsigned NOT NULL default '1',
			 `breed_id` smallint( 5 ) unsigned NOT NULL default '1',
			 `_function` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `_race` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `_class` tinyint( 3 ) unsigned NOT NULL DEFAULT '1',
			 `nick` varchar( 100 ) NOT NULL default '',
			 `defects` varchar( 100 ) NOT NULL default '',
			 `comments` varchar( 100 ) NOT NULL default '',
			 `modif_date` date NOT NULL default '1991-12-31',
			 `modif_time` time NOT NULL default '00:00:00',
			 `int_res` mediumint( 9 ) NOT NULL default '0',
			 `str_res` varchar( 255 ) NOT NULL default '',
			 PRIMARY KEY ( `id` ))
			 $table_utf8 $mysql_TYPE MIN_ROWS=1 COMMENT='Oxes *$buf_oxes.MYD*'", $db ) or die( mysql_error());

			T_Copy( $cows, $buf_cows, -1 ); // THIS MUST BE DONE MANUALLY!
			T_Copy( $oxes, $buf_oxes, -1 ); // THIS MUST BE DONE MANUALLY!
//			Tr_Copy( $cows, $buf_cows, 1 ); // THIS MUST BE DONE MANUALLY!
//			Tr_Copy( $oxes, $buf_oxes, 1 ); // THIS MUST BE DONE MANUALLY!
//			Tr_Copy( $cows, $buf_cows, $cow_id );
//			Tr_Copy( $cows, $buf_cows, $m_id ); Tr_Copy( $oxes, $buf_oxes, $f_id );
//			Tr_Copy( $cows, $buf_cows, $mm_id ); Tr_Copy( $oxes, $buf_oxes, $fm_id );
//			Tr_Copy( $cows, $buf_cows, $mf_id ); Tr_Copy( $oxes, $buf_oxes, $ff_id );
//			Tr_Copy( $cows, $buf_cows, $mmm_id ); Tr_Copy( $oxes, $buf_oxes, $fmm_id );
//			Tr_Copy( $cows, $buf_cows, $mfm_id ); Tr_Copy( $oxes, $buf_oxes, $ffm_id );
//			Tr_Copy( $cows, $buf_cows, $mmf_id ); Tr_Copy( $oxes, $buf_oxes, $fmf_id );
//			Tr_Copy( $cows, $buf_cows, $mff_id ); Tr_Copy( $oxes, $buf_oxes, $fff_id );
		}
		Data_SELE( $buf_cows, $cow_id, 'm-f' );
		Data_SELE( $buf_cows, $m_id, 'm' );
		Data_SELE( $buf_oxes, $f_id, 'f' );
		Data_SELE( $buf_cows, $mm_id, 'mm' );
		Data_SELE( $buf_oxes, $fm_id, 'fm' );
		Data_SELE( $buf_cows, $mf_id, 'mf' );
		Data_SELE( $buf_oxes, $ff_id, 'ff' );
		Data_SELE( $buf_cows, $mmm_id, 'mmm' );
		Data_SELE( $buf_oxes, $fmm_id, 'fmm' );
		Data_SELE( $buf_cows, $mfm_id, 'mfm' );
		Data_SELE( $buf_oxes, $ffm_id, 'ffm' );
		Data_SELE( $buf_cows, $mmf_id, 'mmf' );
		Data_SELE( $buf_oxes, $fmf_id, 'fmf' );
		Data_SELE( $buf_cows, $mff_id, 'mff' );
		Data_SELE( $buf_oxes, $fff_id, 'fff' );

	} else {
		$b_date_=split( "-", $b_date );//IMPORTANT! DONT ERASE!
		$b_date=$b_date_[2]."-".$b_date_[1]."-".$b_date_[0];
		$i_date_=split( "-", $i_date );//IMPORTANT! DONT ERASE!
		$i_date=$i_date_[2]."-".$i_date_[1]."-".$i_date_[0];
	}
//	CookieSet( "ccwi", $cow_id );

	include( "../oper/f_dtdiv.php" );//date for birth or rfid

	$res1=mysql_query( "SELECT region, subregion, enterprise FROM $globals", $db ); $r=mysql_fetch_row( $res1 );
	$region=$r[0]; $subregion=$r[1]; $enterprise=$r[2]; mysql_free_result( $res1 );

//SELECT cycle for part 2 of ccw1
	$res1=mysql_query( "SELECT a2_0101 FROM $c_f2ml WHERE id=$cow_id", $db ); $r=mysql_fetch_row( $res1 );
	$cow_id_exist=1;//IMPORTANT!!!
	if ( strlen( trim( $r[0] ))==0 ) {
		$cow_id_exist=0;//IMPORTANT!!!
		for ( $ai=1; $ai<=20; $ai++ ) for ( $aj=1; $aj<=20; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a2_[$aij]="";
			$a3_[$aij]="";
			$a41_[$aij]="";
			$a42_[$aij]="";
			$a43_[$aij]="";
			$a5_[$aij]="";
			$a6_[$aij]="";
			$a7_[$aij]="";
			$a8_[$aij]="";
		}
	} else {
		$sele_query="SELECT defects FROM $cows WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		$aij=Int2StrZ( 0, 2 ).Int2StrZ( 1, 2 );
		$a3_[$aij]=$r[0]; if ( $a3_[$aij]*1==-1 ) $a3_[$aij]="";
		$sele_query="SELECT a2_0101";
		for ( $ai=1; $ai<=12; $ai++ ) for ( $aj=1; $aj<=2; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			if ( $aij!="0101" ) $sele_query=$sele_query.", a2_".$aij;//IMPORTANT!!!
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=12; $ai++ ) for ( $aj=1; $aj<=2; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a2_[$aij]=$r[$r_idx]; if ( $a2_[$aij]*1==-1 ) $a2_[$aij]="";
			$r_idx++;
		}
		$sele_query="SELECT a3_0101";
		for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=5; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			if ( $aij!="0101" ) $sele_query=$sele_query.", a3_".$aij;//IMPORTANT!!!
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=8; $ai++ ) for ( $aj=1; $aj<=5; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a3_[$aij]=$r[$r_idx]; if ( $a3_[$aij]*1==-1 ) $a3_[$aij]="";
			$r_idx++;
		}
		$sele_query="SELECT a41_0101";
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			if ( $aij!="0101" ) $sele_query=$sele_query.", a41_".$aij;//IMPORTANT!!!
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a41_[$aij]=$r[$r_idx]; if ( $a41_[$aij]*1==-1 ) $a41_[$aij]="";
			$r_idx++;
		}
		$sele_query="SELECT a42_0101";
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			if ( $aij!="0101" ) $sele_query=$sele_query.", a42_".$aij;//IMPORTANT!!!
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a42_[$aij]=$r[$r_idx]; if ( $a42_[$aij]*1==-1 ) $a42_[$aij]="";
			$r_idx++;
		}
		$sele_query="SELECT a43_0101";
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			if ( $aij!="0101" ) $sele_query=$sele_query.", a43_".$aij;//IMPORTANT!!!
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=9; $ai++ ) for ( $aj=1; $aj<=12; $aj++ ) {
			$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
			$a43_[$aij]=$r[$r_idx]; if ( $a43_[$aij]*1==-1 ) $a43_[$aij]="";
			$r_idx++;
		}
		$sele_query="SELECT a5_0101";
		for ( $ai=1; $ai<=11; $ai++ ) {
			for ( $aj=1; $aj<=7; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				if ( $aij!="0101" ) $sele_query=$sele_query.", a5_".$aij;//IMPORTANT!!!
			}
			for ( $aj=1; $aj<=9; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$sele_query=$sele_query.", a6_".$aij;
			}
			for ( $aj=1; $aj<=2; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$sele_query=$sele_query.", a7_".$aij;
			}
			for ( $aj=1; $aj<=6; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$sele_query=$sele_query.", a8_".$aij;
			}
		}
		$sele_query=$sele_query." FROM $c_f2ml WHERE id='$cow_id'";
		$res1=mysql_query( $sele_query, $db ); $r=mysql_fetch_row( $res1 ); $r_idx=0;
		for ( $ai=1; $ai<=11; $ai++ ) {
			for ( $aj=1; $aj<=7; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$a5_[$aij]=$r[$r_idx]; if ( $a5_[$aij]*1==-1 ) $a5_[$aij]="";
				if ( $aj==2 | $aj==4 | $aj==5 ) {
					if ( strlen( $a5_[$aij] )==10 ) $a5_[$aij]=Date_FromDb2Scr( $a5_[$aij], "-" );
				}
				$r_idx++;
			}
			for ( $aj=1; $aj<=9; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$a6_[$aij]=$r[$r_idx]; if ( $a6_[$aij]*1==-1 ) $a6_[$aij]="";
				$r_idx++;
			}
			for ( $aj=1; $aj<=2; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$a7_[$aij]=$r[$r_idx]; if ( $a7_[$aij]*1==-1 ) $a7_[$aij]="";
				$r_idx++;
			}
			for ( $aj=1; $aj<=6; $aj++ ) {
				$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
				$a8_[$aij]=$r[$r_idx]; if ( $a8_[$aij]*1==-1 ) $a8_[$aij]="";
				$r_idx++;
			}
		}
	}
//SELECT cycle for part 2 of ccw1 [END]

	echo "
<form name='df2__cwc.form2milk' method='get'>

<input type='hidden' id='ret0' name='ret0' value='$ret0'>
<input type='hidden' id='changed_input_name' name='changed_input_name' value='$changed_input_name'>
<input type='hidden' id='cow_id' name='cow_id' value='$cow_id'>
<input type='hidden' id='cow_id_exist' name='cow_id_exist' value='$cow_id_exist'>
<input name='cwc_buf' style='height:1px; visibility:hidden; width:1px' type='submit' value='+'>

<table cellspacing='1' class='cards_' style='width:100%'>
<tr $edit_class>
	<td $cjust rowspan='2'>"."КАРТКА ПЛЕМІННОЇ КОРОВИ"."</td>
	<td $cjust>"."Форма"."</td>
	<td $cjust>"."Республіка"."</td>
	<td $cjust>"."Область"."</td>
	<td $cjust>"."Район"."</td>
</tr>
<tr $edit_class>
	<td $cjust><b>"."2-мол."."</b></td>
	<td $cjust><b>&nbsp;</b></td>
	<td $cjust><b>".$region."&nbsp;</b></td>
	<td $cjust><b>".$subregion."&nbsp;</b></td>
</tr>
</table>
<table><tr height='3'><td></td></tr></table>
<table style='width:100%'>
<tr align='center'>";
	if ( $cow_id==1 ) echo "
	<td style='color:#ff0000' width='90%'><b>".$cw_c.": СЛУЖБОВА КАРТКА НЕ РЕДАГУЄТЬСЯ..."."</b></td>";
	else if ( $userCoo*1==9 ) echo "
	<td style='color:#ff0000' width='90%'><b>".$cw_c.": У ВАС НЕМАЄ ПРАВА РЕДАГУВАННЯ КАРТКИ..."."</b></td>";
	else echo "
	<td width='90%'><input class='btn gradient_0f0 btn_h0' name='cwc_prep' style='width:200px' type='submit' value='"."Застосувати"."'></td>";
	echo "
	<td width='10%'><input class='btn gradient_f00 btn_h0' name='cwc_cancel' style='width:100%' type='submit' value='X'></td>";
	echo "
	</tr>
</table>
<table><tr height='3px'><td></td></tr></table>

<!-- II. III. -->
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=0>
<TR ALIGN=CENTER STYLE='$tname_s0' VALIGN=CENTER>
	<TD COLSPAN=2 WIDTH=19%>
		<FONT SIZE=1>II. РОЗВИТОК</FONT></TD>
	<TD COLSPAN=7 WIDTH=81%>
		<FONT SIZE=1>III. ПРОМІРИ</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$tbody_s0' VALIGN=CENTER>
	<TD WIDTH=11% STYLE='$thead_s0'>
		<FONT SIZE=1>Вік</FONT></TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>Жива маса, кг</FONT></TD>
	<TD ROWSPAN=3 WIDTH=11% STYLE='$thead_s0'>
		<FONT SIZE=1>Характеристика</FONT></TD>
	<TD COLSPAN=5 STYLE='$thead_s0'>
		<FONT SIZE=1>Проміри (см) у віці:</FONT></TD>
	<TD ROWSPAN=13 WIDTH=21%>
		<FONT SIZE=1>Фото</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$tbody_s0' VALIGN=CENTER>
	<TD WIDTH=11%>
		<FONT SIZE=1>новонародж.</FONT></TD>
	<TD ALIGN=RIGHT WIDTH=8%>".
		IntInput( 'a2_0102', $min_wt, $max_wt, $wt_len )."</TD>
	<TD COLSPAN=2 STYLE='$thead_s0'>
		<FONT SIZE=1>місяців</FONT></TD>
	<TD COLSPAN=3 STYLE='$thead_s0'>
		<FONT SIZE=1>отелень</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$tbody_s0' VALIGN=CENTER>
	<TD WIDTH=11%>
		<FONT SIZE=1>3 міс.</FONT></TD>
	<TD ALIGN=RIGHT WIDTH=8%>".
		IntInput( 'a2_0202', $min_wt, $max_wt, $wt_len )."</TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>12</FONT></TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>18</FONT></TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>1</FONT></TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>2</FONT></TD>
	<TD WIDTH=8% STYLE='$thead_s0'>
		<FONT SIZE=1>3...</FONT></TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>6 міс.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0302', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Висота у холці</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0101', $min_me1, $max_me1, $me1_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0102', $min_me1, $max_me1, $me1_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0103', $min_me1, $max_me1, $me1_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0104', $min_me1, $max_me1, $me1_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0105', $min_me1, $max_me1, $me1_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>9 міс.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0402', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Висота у крижах</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0201', $min_me2, $max_me2, $me2_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0202', $min_me2, $max_me2, $me2_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0203', $min_me2, $max_me2, $me2_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0204', $min_me2, $max_me2, $me2_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0205', $min_me2, $max_me2, $me2_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>12 міс.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0502', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Глибина грудей</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0301', $min_me3, $max_me3, $me3_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0302', $min_me3, $max_me3, $me3_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0303', $min_me3, $max_me3, $me3_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0304', $min_me3, $max_me3, $me3_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0305', $min_me3, $max_me3, $me3_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>15 міс.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0602', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Ширина грудей</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0401', $min_me4, $max_me4, $me4_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0402', $min_me4, $max_me4, $me4_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0403', $min_me4, $max_me4, $me4_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0404', $min_me4, $max_me4, $me4_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0405', $min_me4, $max_me4, $me4_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>18 міс.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0702', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Ширина у сіднічних горбах</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0501', $min_me5, $max_me5, $me5_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0502', $min_me5, $max_me5, $me5_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0503', $min_me5, $max_me5, $me5_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0504', $min_me5, $max_me5, $me5_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0505', $min_me5, $max_me5, $me5_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>
		<FONT SIZE=1>перше осім.</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0802', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Коса довжина тулуба</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0601', $min_me6, $max_me6, $me6_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0602', $min_me6, $max_me6, $me6_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0603', $min_me6, $max_me6, $me6_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0604', $min_me6, $max_me6, $me6_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0605', $min_me6, $max_me6, $me6_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>".
		StrInput( 'a2_0901', 30 )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_0902', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Обхват за лопатками</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0701', $min_me7, $max_me7, $me7_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0702', $min_me7, $max_me7, $me7_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0703', $min_me7, $max_me7, $me7_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0704', $min_me7, $max_me7, $me7_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0705', $min_me7, $max_me7, $me7_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>".
		StrInput( 'a2_1001', 30 )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_1002', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Обхват п`ясті</FONT></TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0801', $min_me8, $max_me8, $me8_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0802', $min_me8, $max_me8, $me8_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0803', $min_me8, $max_me8, $me8_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0804', $min_me8, $max_me8, $me8_len )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a3_0805', $min_me8, $max_me8, $me8_len )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>".
		StrInput( 'a2_1101', 30 )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_1102', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>-</FONT></TD>
	<TD WIDTH=8%>
		<FONT SIZE=1>-</FONT></TD>
	<TD WIDTH=8%>
		<FONT SIZE=1>-</FONT></TD>
	<TD WIDTH=8%>
		<FONT SIZE=1>-</FONT></TD>
	<TD WIDTH=8%>
		<FONT SIZE=1>-</FONT></TD>
	<TD WIDTH=8%>
		<FONT SIZE=1>-</FONT></TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=11%>".
		StrInput( 'a2_1201', 30 )."</TD>
	<TD WIDTH=8%>".
		IntInput( 'a2_1202', $min_wt, $max_wt, $wt_len )."</TD>
	<TD ALIGN=LEFT WIDTH=11%>
		<FONT SIZE=1>Вади екстер`єру</FONT></TD>
	<TD ALIGN=LEFT COLSPAN=5>".
		StrInput( 'a3_0001', 100 )."</TD>
</TR>
</TABLE>
<table><tr height='3px'><td></td></tr></table>

<!-- IV. -->
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=0>
<TBODY>
<TR ALIGN=CENTER STYLE='$tname_s0' VALIGN=CENTER>
	<TD COLSPAN=28>
		<FONT SIZE=1>IV. КОНТРОЛЬ МОЛОЧНОЇ ПРОДУКТИВНОСТІ ЗА МІСЯЦЯМИ</FONT></TD>
</TR>
</TBODY>
<TR ALIGN=CENTER STYLE='$thead_s0' VALIGN=CENTER>
	<TD ROWSPAN=2 WIDTH=10%>
		<FONT SIZE=1>Мiсяць</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_01 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_02 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_03 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_04 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_05 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_06 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_07 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_08 р.</FONT></TD>
	<TD COLSPAN=3 WIDTH=10%>
		<FONT SIZE=1>$a4_09 р.</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$thead_s0' VALIGN=CENTER>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>надiй, кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>жир</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>бiлок</FONT></TD>
</TR>";
for ( $aj=1; $aj<=12; $aj++ ) {
	$aij=Int2StrZ( $aj, 2 );
	echo "
<TR ALIGN=RIGHT STYLE='$tbody_s0' VALIGN=CENTER>
	<TD ALIGN=CENTER WIDTH=10%>
		<FONT SIZE=1>$mon $aij</FONT></TD>";
	for ( $ai=1; $ai<=9; $ai++ ) {
		$aij=Int2StrZ( $ai, 2 ).Int2StrZ( $aj, 2 );
		$mlk_=RealInput( "a41_".$aij, $min_mlk, $max_mlk, 7, 1 );
		$fat_=RealInput( "a42_".$aij, $min_fat, $max_fat, 5, 2 );
		$alb_=RealInput( "a43_".$aij, $min_alb, $max_alb, 5, 2 );
		echo "
	<TD WIDTH=4%>
		$mlk_</TD>
	<TD WIDTH=3%>
		$fat_</TD>
	<TD WIDTH=3%>
		$alb_</TD>";
	}
	echo "
</TR>";
}
echo "
</TABLE>
<table><tr height='3px'><td></td></tr></table>

<!-- V. VI. VII. VIII. -->
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=0>
<TBODY>
<TR ALIGN=CENTER STYLE='$tname_s0' VALIGN=CENTER>
	<TD COLSPAN=7>
		<FONT SIZE=1>V. ВІДТВОРЮВАЛЬНА ЗДАТНІСТЬ</FONT></TD>
	<TD COLSPAN=9>
		<FONT SIZE=1>VI. ПРОДУКТИВНІСТЬ І ЖИВА МАСА</FONT></TD>
	<TD COLSPAN=2>
		<FONT SIZE=1>VII. ПРИПЛІД</FONT></TD>
	<TD COLSPAN=7 WIDTH=30%>
		<FONT SIZE=1>VIII. ОЦІНКА ЗА ТИП БУДОВИ ТІЛА</FONT></TD>
</TR>
</TBODY>
<TR ALIGN=CENTER STYLE='$thead_s0' VALIGN=CENTER>
	<TD COLSPAN=3 ROWSPAN=2 WIDTH=15%>
		<FONT SIZE=1>Плідне осіменіння</FONT></TD>
	<TD ROWSPAN=3 WIDTH=4%>
		<FONT SIZE=1>Запуск</FONT></TD>
	<TD ROWSPAN=3 WIDTH=4%>
		<FONT SIZE=1>Отелення</FONT></TD>
	<TD ROWSPAN=3 WIDTH=3%>
		<FONT SIZE=1>Сух.</FONT></TD>
	<TD ROWSPAN=3 WIDTH=3%>
		<FONT SIZE=1>Серв.</FONT></TD>
	<TD COLSPAN=2 ROWSPAN=2>
		<FONT SIZE=1>Лакт.</FONT></TD>
	<TD WIDTH=3% ROWSPAN=3>
		<FONT SIZE=1>Надій, кг</FONT></TD>
	<TD COLSPAN=5>
		<FONT SIZE=1>Прод. за 305 днів:</FONT></TD>
	<TD ROWSPAN=3 WIDTH=3%>
		<FONT SIZE=1>Жива маса, кг</FONT></TD>
	<TD ROWSPAN=3 WIDTH=3%>
		<FONT SIZE=1>Стать</FONT></TD>
	<TD ROWSPAN=3 WIDTH=10%>
		<FONT SIZE=1>Ідент. №</FONT></TD>
	<TD ROWSPAN=3 WIDTH=10%>
		<FONT SIZE=1>Група ознак</FONT></TD>
	<TD COLSPAN=3>
		<FONT SIZE=1>Телиця (нетель)</FONT></TD>
	<TD COLSPAN=3>
		<FONT SIZE=1>Корова</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$thead_s0' VALIGN=CENTER>
	<TD ROWSPAN=2 WIDTH=3%>
		<FONT SIZE=1>надій, кг</FONT></TD>
	<TD COLSPAN=2>
		<FONT SIZE=1>жир</FONT></TD>
	<TD COLSPAN=2>
		<FONT SIZE=1>білок</FONT></TD>
	<TD COLSPAN=3>
		<FONT SIZE=1>Балів у віці, міс.</FONT></TD>
	<TD COLSPAN=3>
		<FONT SIZE=1>Балів у віці, отел.</FONT></TD>
</TR>
<TR ALIGN=CENTER STYLE='$thead_s0' VALIGN=CENTER>
	<TD WIDTH=2%>
		<FONT SIZE=1>№</FONT></TD>
	<TD WIDTH=4%>
		<FONT SIZE=1>Дата</FONT></TD>
	<TD WIDTH=9%>
		<FONT SIZE=1>Бугай</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>№</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>днів</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>%</FONT></TD>
	<TD WIDTH=1%>
		<FONT SIZE=1>кг</FONT></TD>
	<TD WIDTH=3%>
		<FONT SIZE=1>%</FONT></TD>
	<TD WIDTH=1%>
		<FONT SIZE=1>кг</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>6</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>12</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>18</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>1</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>2</FONT></TD>
	<TD WIDTH=2%>
		<FONT SIZE=1>3</FONT></TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0101', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0102' )."</TD>
	<TD>".
		StrInput( 'a5_0103', 30 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		DateInput( 'a5_0105' )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a5_0107', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0101', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0102', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0103', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0104', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0105', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0107', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0109', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0101', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0102', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Загальний вигляд</FONT></TD>
	<TD>".
		IntInput( 'a8_0101', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0102', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0103', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0104', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0105', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0106', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0201', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0202' )."</TD>
	<TD>".
		StrInput( 'a5_0203', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0204' )."</TD>
	<TD>".
		DateInput( 'a5_0205' )."</TD>
	<TD>".
		IntInput( 'a5_0206', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0207', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0201', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0202', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0203', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0204', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0205', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0207', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0209', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0201', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0202', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Холка, спина, поперек, середня частина (формат тулуба для молодняку)</FONT></TD>
	<TD>".
		IntInput( 'a8_0201', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0202', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0203', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0204', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0205', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0206', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0301', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0302' )."</TD>
	<TD>".
		StrInput( 'a5_0303', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0304' )."</TD>
	<TD>".
		DateInput( 'a5_0305' )."</TD>
	<TD>".
		IntInput( 'a5_0306', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0307', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0301', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0302', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0303', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0304', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0305', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0307', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0309', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0301', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0302', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Груди</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0304', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0305', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0306', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0401', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0402' )."</TD>
	<TD>".
		StrInput( 'a5_0403', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0404' )."</TD>
	<TD>".
		DateInput( 'a5_0405' )."</TD>
	<TD>".
		IntInput( 'a5_0406', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0407', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0401', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0402', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0403', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0404', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0405', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0407', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0409', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0401', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0402', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Крижі</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0404', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0405', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0406', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0501', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0502' )."</TD>
	<TD>".
		StrInput( 'a5_0503', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0504' )."</TD>
	<TD>".
		DateInput( 'a5_0505' )."</TD>
	<TD>".
		IntInput( 'a5_0506', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0507', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0501', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0502', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0503', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0504', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0505', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0507', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0509', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0501', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0502', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Кінцівки (кінцівки і ратиці для молодняку)</FONT></TD>
	<TD>".
		IntInput( 'a8_0501', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0502', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0503', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0504', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0505', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0506', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0601', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0602' )."</TD>
	<TD>".
		StrInput( 'a5_0603', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0604' )."</TD>
	<TD>".
		DateInput( 'a5_0605' )."</TD>
	<TD>".
		IntInput( 'a5_0606', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0607', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0601', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0602', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0603', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0604', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0605', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0607', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0609', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0601', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0602', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Ратиці</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0604', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0605', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0606', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0701', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0702' )."</TD>
	<TD>".
		StrInput( 'a5_0703', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0704' )."</TD>
	<TD>".
		DateInput( 'a5_0705' )."</TD>
	<TD>".
		IntInput( 'a5_0706', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0707', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0701', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0702', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0703', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0704', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0705', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0707', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0709', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0701', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0702', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Вим`я</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0704', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0705', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0706', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0801', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0802' )."</TD>
	<TD>".
		StrInput( 'a5_0803', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0804' )."</TD>
	<TD>".
		DateInput( 'a5_0805' )."</TD>
	<TD>".
		IntInput( 'a5_0806', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0807', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0801', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0802', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0803', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0804', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0805', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0807', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0809', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0801', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0802', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Передня частина вимені</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0804', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0805', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0806', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_0901', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_0902' )."</TD>
	<TD>".
		StrInput( 'a5_0903', 30 )."</TD>
	<TD>".
		DateInput( 'a5_0904' )."</TD>
	<TD>".
		DateInput( 'a5_0905' )."</TD>
	<TD>".
		IntInput( 'a5_0906', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_0907', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_0901', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_0902', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_0903', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0904', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_0905', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_0907', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_0909', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_0901', 3 )."</TD>
	<TD>".
		StrInput( 'a7_0902', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Задня частина вимені</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_0904', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0905', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_0906', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_1001', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_1002' )."</TD>
	<TD>".
		StrInput( 'a5_1003', 30 )."</TD>
	<TD>".
		DateInput( 'a5_1004' )."</TD>
	<TD>".
		DateInput( 'a5_1005' )."</TD>
	<TD>".
		IntInput( 'a5_1006', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_1007', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_1001', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_1002', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_1003', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_1004', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_1005', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_1007', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_1009', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_1001', 3 )."</TD>
	<TD>".
		StrInput( 'a7_1002', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Дійки</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD>".
		IntInput( 'a8_1004', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_1005', 1, 99, 2 )."</TD>
	<TD>".
		IntInput( 'a8_1006', 1, 99, 2 )."</TD>
</TR>
<TR ALIGN=RIGHT STYLE='$tbody_s1' VALIGN=CENTER>
	<TD>".
		IntInput( 'a5_1101', $min_inse, $max_inse, $inse_len )."</TD>
	<TD>".
		DateInput( 'a5_1102' )."</TD>
	<TD>".
		StrInput( 'a5_1103', 30 )."</TD>
	<TD>".
		DateInput( 'a5_1104' )."</TD>
	<TD>".
		DateInput( 'a5_1105' )."</TD>
	<TD>".
		IntInput( 'a5_1106', $min_suhodays, $max_suhodays, $suhod_len )."</TD>
	<TD>".
		IntInput( 'a5_1107', $min_servdays, $max_servdays, $servd_len )."</TD>
	<TD>".
		IntInput( 'a6_1101', $min_lact, $max_lact, $lact_len )."</TD>
	<TD>".
		IntInput( 'a6_1102', $min_lactdays, $max_lactdays, $lactd_len )."</TD>
	<TD>".
		RealInput( 'a6_1103', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_1104', $min_mlk, $max_mlk, 7, 1 )."</TD>
	<TD>".
		RealInput( 'a6_1105', $min_fat, $max_fat, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		RealInput( 'a6_1107', $min_alb, $max_alb, 5, 2 )."</TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</B></FONT></TD>
	<TD>".
		IntInput( 'a6_1109', $min_wt, $max_wt, $wt_len )."</TD>
	<TD>".
		StrInput( 'a7_1101', 3 )."</TD>
	<TD>".
		StrInput( 'a7_1102', 30 )."</TD>
	<TD ALIGN=LEFT>
		<FONT SIZE=1>Сума</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
	<TD ALIGN=CENTER>
		<FONT SIZE=1>x</FONT></TD>
</TR>
</TABLE>
<table><tr height='3px'><td></td></tr></table>

</form>";
}

ob_end_flush();
?>
