<?php
/* DF_2: forms/f__ccw11.php
form: cow card 2-mol ([c]ard of [c]o[w][1]part[1]:Ukraine)
created: 04.08.2009
modified: 11.11.2015 */

ob_start();//lock output to set cookies properly!

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
	 $db, $buf_cows, $buf_oxes, $edit_class, $list_sty_free;
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
			$xi_date=$row[19]; $xowner_id=$row[20]*1;
 			Sql_query( "INSERT INTO $dbt_to (
			 `id`, `$dbt_num`, `nick`,
			 `b_date`, `b_num`, `b_place_id`,
			 `i_date`, `owner_id`,
			 `national_descr`,
			 `mth_id`, `fth_id`,
			 `_function`,
			 `_race`,
			 `_class`,
			 `breed_id` )
			 VALUES (
			 '$id', '$xnum', '$xnick',
			 '$xb_date', '$xb_num', '$xb_place_id',
			 '$xi_date', '$xowner_id',
			 '$xnat_d',
			 '$xm_id', '$xf_id',
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

function CowProd_Echo( $el_subname ) {
	global
	 $edit_class, $edit_sty0, $view_class,
	 $m_, $mm_, $mf_;
	$_rows=8; $_cols=8;
// TEST PURPOSES
//	for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) {
//		$m_[$r][$c]=" m".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//		$mm_[$r][$c]=" mm".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//		$mf_[$r][$c]=" mf".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//	}
// TEST PURPOSES [END]
	if ( $el_subname=="m" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$m_[$r][$c];
	} elseif ( $el_subname=="mm" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$mm_[$r][$c];
	} elseif ( $el_subname=="mf" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$mf_[$r][$c];
	}
	echo "
					<table cellspacing='1' class='cards_'>
					<tr align='center' $view_class style='height:23px'>
						<td rowspan='3' width='3%'>".
							"Рік"."</td>
						<td rowspan='3' width='3%'>".
							"Лакт."."</td>
						<td rowspan='3' width='3%'>".
							"Днів лакт."."</td>
						<td colspan='5' width='17%'>".
							"Прод. за 305 днів:"."</td>
					</tr>
					<tr align='center' $view_class style='height:23px'>
						<td rowspan='2' width='5%'>".
							"надій, кг"."</td>
						<td colspan='2' width='6%'>".
							"жир"."</td>
						<td colspan='2' width='6%'>".
							"білок"."</td>
					</tr>
					<tr align='center' $view_class style='height:23px'>
						<td width='3%'>".
							"%"."</td>
						<td width='3%'>".
							"кг"."</td>
						<td width='3%'>".
							"%"."</td>
						<td width='3%'>".
							"кг"."</td>
					</tr>";
					for ( $r=1; $r<=8; $r++ ) {
						echo "
					<tr $view_class style='height:23px'>";
						for ( $c=1; $c<=8; $c++) {
							$nnn=$el_subname.Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
							if ( $c==1 ) {
								$maxl=4; $onkeydown="onkeydown='int_keyp( \"$nnn\", 1, 2100, 4 )'";
							} elseif ( $c==2 ) {
								$maxl=1; $onkeydown="onkeydown='int_keyp( \"$nnn\", 1, 9, 1 )'";
							} elseif ( $c==3 ) {
								$maxl=3; $onkeydown="onkeydown='int_keyp( \"$nnn\", 1, 999, 3 )'";
							} elseif ( $c==4 ) {
								$maxl=7; $onkeydown="onkeydown='real_keyp( \"$nnn\", 1, 99999.9, 7, 1 )'";
							} elseif ( $c==5 ) {
								$maxl=5; $onkeydown="onkeydown='real_keyp( \"$nnn\", 1, 10.00, 5, 2 )'";
							} elseif ( $c==7 ) {
								$maxl=5; $onkeydown="onkeydown='real_keyp( \"$nnn\", 1, 10.00, 5, 2 )'";
							} else {
								$maxl=10; $onkeydown="";
							}
							if ( $c==6 | $c==8 ) echo "
						<td align='center' width='3%'>x</td>";
							else echo "
						<td width='3%'><input $edit_class maxlength='$maxl' id='$nnn' name='$nnn' style='$edit_sty0' type='text' value='".$v_[$r][$c]."' $onkeydown></td>";
						}
						echo "
					</tr>";
					}
					echo "
					</table>";
}

function OxProd_Echo( $el_subname ) {
	global
	 $edit_class, $edit_sty0, $view_class,
	 $f_, $fm_, $ff_;
	$_rows=5; $_cols=3;
// TEST PURPOSES
//	for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) {
//		$f_[$r][$c]=" f".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//		$fm_[$r][$c]=" fm".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//		$ff_[$r][$c]=" ff".Int2StrZ( $r, 2 ).Int2StrZ( $c, 2 );
//	}
// TEST PURPOSES [END]
	if ( $el_subname=="f" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$f_[$r][$c];
	} elseif ( $el_subname=="fm" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$fm_[$r][$c];
	} elseif ( $el_subname=="ff" ) {
		for ( $r=0; $r<=$_rows; $r++ ) for ( $c=0; $c<=$_cols; $c++) $v_[$r][$c]=$ff_[$r][$c];
	}
	$maxl_11=3; $onkeyd_11="onkeydown='int_keyp( \"".$el_subname."0101\", 1, 999, 3 )' name='".$el_subname."0101'";
	$maxl_12=7; $onkeyd_12="onkeydown='real_keyp( \"".$el_subname."0102\", 1, 99999.9, 7, 1 )' name='".$el_subname."0102'";
	$maxl_13=5; $onkeyd_13="onkeydown='mreal_keyp( \"".$el_subname."0103\", -99, 99.9, 5, 2 )' name='".$el_subname."0103'";
	$maxl_21=3; $onkeyd_21="onkeydown='int_keyp( \"".$el_subname."0201\", 1, 999, 3 )' name='".$el_subname."0201'";
	$maxl_22=5; $onkeyd_22="onkeydown='real_keyp( \"".$el_subname."0202\", 1, 10, 5, 2 )' name='".$el_subname."0202'";
	$maxl_23=5; $onkeyd_23="onkeydown='mreal_keyp( \"".$el_subname."0203\", -99, 99.9, 5, 2 )' name='".$el_subname."0203'";
	$maxl_31=5; $onkeyd_31="onkeydown='real_keyp( \"".$el_subname."0301\", 1, 99.9, 5, 2 )' name='".$el_subname."0301'";
	$maxl_41=3; $onkeyd_41="onkeydown='int_keyp( \"".$el_subname."0401\", 1, 999, 3 )' name='".$el_subname."0401'";
	$maxl_42=7; $onkeyd_42="onkeydown='real_keyp( \"".$el_subname."0402\", 1, 10, 5, 2 )' name='".$el_subname."0402'";
	$maxl_43=5; $onkeyd_43="onkeydown='mreal_keyp( \"".$el_subname."0403\", -99, 99.9, 5, 2 )' name='".$el_subname."0403'";
	echo "
					<table cellspacing='1' class='cards_'>
					<tr align='center' $view_class style='height:23px'>
						<td colspan='6' rowspan='2'>".
							"Оцінка за якістю потомства:"."</td>
					</tr>
					<tr align='center' $view_class style='height:23px'>
					</tr>
					<tr align='center' $view_class style='height:23px'>
						<td width='10%'>".
							"Метод, рік оцінки"."</td>
						<td align='right' width='6%'>
							<input $edit_class maxlength='30' id='".$el_subname."0000' name='".$el_subname."0000' style='$edit_sty0' type='text' value='".$v_[0][0]."'></td>
						<td colspan='3' width='14%'>".
							"Середні:"."</td>
						<td width='5%'>".
							"ПЦ (+/-)"."</td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='10%'>".
							"Дочок"."</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_11' id='".$el_subname."0101' style='$edit_sty0' type='text' value='".$v_[1][1]."' $onkeyd_11></td>
						<td align='center' colspan='2' width='8%'>".
							"надій, кг"."</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_12' id='".$el_subname."0102' style='$edit_sty0' type='text' value='".$v_[1][2]."' $onkeyd_12></td>
						<td width='5%'>
							<input $edit_class maxlength='$maxl_13' id='".$el_subname."0103' style='$edit_sty0' type='text' value='".$v_[1][3]."' $onkeyd_13></td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='10%'>".
							"Стад"."</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_21' id='".$el_subname."0201' style='$edit_sty0' type='text' value='".$v_[2][1]."' $onkeyd_21></td>
						<td align='center' rowspan='2' width='4%'>".
							"жир"."</td>
						<td align='center' width='4%'>".
							"%"."</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_22' id='".$el_subname."0202' style='$edit_sty0' type='text' value='".$v_[2][2]."' $onkeyd_22></td>
						<td width='5%'>
							<input $edit_class maxlength='$maxl_23' id='".$el_subname."0203' style='$edit_sty0' type='text' value='".$v_[2][3]."' $onkeyd_23></td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='10%'>
							Повт., %</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_31' id='".$el_subname."0301' style='$edit_sty0' type='text' value='".$v_[3][1]."' $onkeyd_31></td>
						<td align='center' width='4%'>
							кг</td>
						<td align='center' width='6%'>
							x</td>
						<td align='center' width='5%'>
							x</td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='10%'>
							Лакт. (вік)</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_41' id='".$el_subname."0401' style='$edit_sty0' type='text' value='".$v_[4][1]."' $onkeyd_41></td>
						<td align='center' rowspan='2' width='4%'>
							білок</td>
						<td align='center' width='4%'>
							%</td>
						<td width='6%'>
							<input $edit_class maxlength='$maxl_42' id='".$el_subname."0402' style='$edit_sty0' type='text' value='".$v_[4][2]."' $onkeyd_42></td>
						<td width='5%'>
							<input $edit_class maxlength='$maxl_43' id='".$el_subname."0403' style='$edit_sty0' type='text' value='".$v_[4][3]."' $onkeyd_43></td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' colspan='2' width='16%'>
							ОТ</td>
						<td align='center' width='4%'>
							кг</td>
						<td align='center' width='6%'>
							x</td>
						<td align='center' width='5%'>
							x</td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' colspan='2' width='16%'>
							<input $edit_class maxlength='100' id='".$el_subname."0501' name='".$el_subname."0501' style='$edit_sty0' type='text' value='".$v_[5][1]."'></td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td width='6%'>
							&nbsp;</td>
						<td width='5%'>
							&nbsp;</td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='5%'>
							&nbsp;</td>
						<td align='left'>
							&nbsp;</td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td width='6%'>
							&nbsp;</td>
						<td width='5%'>
							&nbsp;</td>
					</tr>
					<tr align='right' $view_class style='height:23px'>
						<td align='center' width='5%'>
							&nbsp;</td>
						<td align='left'>
							&nbsp;</td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td align='center' width='4%'>
							&nbsp;</td>
						<td width='6%'>
							&nbsp;</td>
						<td width='5%'>
							&nbsp;</td>
					</tr>
					</table>";
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
if ( $ret0=="00" ) $ret_url="../".$hFrm['0500'];

//discard changes & close card
if ( $cwc_cancel!="" ) {
//	$cow_id=CookieGet( "ccwi" )*1;
	mysql_query( "DROP TABLE IF EXISTS $buf_cows" );
	mysql_query( "DROP TABLE IF EXISTS $buf_oxes" );
	Res_Draw( 3, $ret_url, "", $cw_c.":&nbsp;".$_13_card_no_changes_done_cap, $php_mm_tip[0] );

//save changes to buffer
} else if ( $cwc_buf!="" ) {
//	$cow_id=CookieGet( "ccwi" )*1;
	Data__GET();
	Data_UPDA( $buf_cows, $buf_oxes, 1 );

	if ( $changed_input_name=="m_id" ) $res=EquIds( $buf_cows, "mth_id", $cow_id, $m_id );
	if ( $changed_input_name=="f_id" ) $res=EquIds( $buf_cows, "fth_id", $cow_id, $f_id );
	if ( $changed_input_name=="mm_id" ) $res=EquIds( $buf_cows, "mth_id", $m_id, $mm_id );
	if ( $changed_input_name=="fm_id" ) $res=EquIds( $buf_cows, "fth_id", $m_id, $fm_id );
	if ( $changed_input_name=="mf_id" ) $res=EquIds( $buf_oxes, "mth_id", $f_id, $mf_id );
	if ( $changed_input_name=="ff_id" ) $res=EquIds( $buf_oxes, "fth_id", $f_id, $ff_id );
	if ( $changed_input_name=="mmm_id" ) $res=EquIds( $buf_cows, "mth_id", $mm_id, $mmm_id );
	if ( $changed_input_name=="fmm_id" ) $res=EquIds( $buf_cows, "fth_id", $mm_id, $fmm_id );
	if ( $changed_input_name=="mfm_id" ) $res=EquIds( $buf_oxes, "mth_id", $fm_id, $mfm_id );
	if ( $changed_input_name=="ffm_id" ) $res=EquIds( $buf_oxes, "fth_id", $fm_id, $ffm_id );
	if ( $changed_input_name=="mmf_id" ) $res=EquIds( $buf_cows, "mth_id", $mf_id, $mmf_id );
	if ( $changed_input_name=="fmf_id" ) $res=EquIds( $buf_cows, "fth_id", $mf_id, $fmf_id );
	if ( $changed_input_name=="mff_id" ) $res=EquIds( $buf_oxes, "mth_id", $ff_id, $mff_id );
	if ( $changed_input_name=="fff_id" ) $res=EquIds( $buf_oxes, "fth_id", $ff_id, $fff_id );

//save changes & close card
} else if ( $cwc_prep!="" ) {
//	$cow_id=CookieGet( "ccwi" )*1;
//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [BEGIN]
	Data__GET();

//	$prev_id1=0; $userdata_invalid=0; $errmsg1="";
//	Sql_query( "SELECT id FROM $buf_cows WHERE b_num='$b_num'" );
//	$res=mysql_query( "SELECT id FROM $buf_cows WHERE b_num='$b_num'", $db );
//	$row=mysql_fetch_row( $res ); mysql_free_result( $res ); $prev_id1=$row[0]*1;
//	if ( $prev_id1!=0 & $prev_id1!=$cow_id ) $errmsg1="ТВАРИНА З ТАКИМ ІДЕНТИФІКАЦІЙНИМ НОМЕРОМ ВЖЕ ЗАРЕЄСТРОВАНА.";
//	else $prev_id1=0;
//	if ( $prev_id1!=0 ) {
//		$userdata_invalid=1; echo "
//<br>
//<center><div class='zag1' style='background:#ff0000'>$errmsg1<br>"."Будь-ласка, будьте уважнi!"."<br></div></center>";
//	}

//MY_ERROR WITH trim(): CANT ERASE "&nbsp;" [END]
	if ( $userdata_invalid==0 ) {
		$update_query="UPDATE $cows SET
		 modif_uid='$userCoo', modif_date='$modif_date'
		 WHERE id='$cow_id'";
		$update_err=Sql_query( $update_query );
		Data_UPDA( $buf_cows, $buf_oxes, 0 );
		Data_UPDA( $cows, $oxes, 0 );

		$xa='m'; $xb=$m_id; $res11=Adata_UPDA( $cows, $xb ); $res11_r=8; $res11_c=8;
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET id='$xb'";
		else {
			$aq="INSERT INTO $c_f2ml (`id`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $jjj!=6 & $jjj!=8 ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $jjj!=6 & $jjj!=8 ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mm'; $xb=$mm_id; $res11=Adata_UPDA( $cows, $xb ); $res11_r=8; $res11_c=8;
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET id='$xb'";
		else {
			$aq="INSERT INTO $c_f2ml (`id`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $jjj!=6 & $jjj!=8 ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $jjj!=6 & $jjj!=8 ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='fm'; $xb=$fm_id; $res11=Adata_UPDA( $oxes, $xb ); $res11_r=5; $res11_c=3;
		$el=$xa."0000"; $a1[0][0]=$_GET[$el]; if ( trim( $a1[0][0] )=="" ) $a1[0][0]=-1;
		if ( $res11==0 ) $aq="UPDATE $o_f2ml SET id='$xb', a1_0000='".$a1[0][0]."'";
		else {
			$aq="INSERT INTO $o_f2ml (`id`, `a1_0000`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."', '".$a1[0][0]."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='f'; $xb=$f_id; $res11=Adata_UPDA( $oxes, $xb ); $res11_r=5; $res11_c=3;
		$el=$xa."0000"; $a1[0][0]=$_GET[$el]; if ( trim( $a1[0][0] )=="" ) $a1[0][0]=-1;
		if ( $res11==0 ) $aq="UPDATE $o_f2ml SET id='$xb', a1_0000='".$a1[0][0]."'";
		else {
			$aq="INSERT INTO $o_f2ml (`id`, `a1_0000`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."', '".$a1[0][0]."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mf'; $xb=$mf_id; $res11=Adata_UPDA( $cows, $xb ); $res11_r=8; $res11_c=8;
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET id='$xb'";
		else {
			$aq="INSERT INTO $c_f2ml (`id`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $jjj!=6 & $jjj!=8 ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $jjj!=6 & $jjj!=8 ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='ff'; $xb=$ff_id; $res11=Adata_UPDA( $oxes, $xb ); $res11_r=5; $res11_c=3;
		$el=$xa."0000"; $a1[0][0]=$_GET[$el]; if ( trim( $a1[0][0] )=="" ) $a1[0][0]=-1;
		if ( $res11==0 ) $aq="UPDATE $o_f2ml SET id='$xb', a1_0000='".$a1[0][0]."'";
		else {
			$aq="INSERT INTO $o_f2ml (`id`, `a1_0000`";
			for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
				$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
				if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
					$aq=$aq.", `a1_".$idxx."`";
				}
			}
			$aq=$aq.") VALUES ('".$xb."', '".$a1[0][0]."' ";
		}
		for ( $iii=1; $iii<=$res11_r; $iii++ ) for ( $jjj=1; $jjj<=$res11_c; $jjj++ ) {
			$idxx=Int2StrZ( $iii, 2 ).Int2StrZ( $jjj, 2 ); $el=$xa.$idxx;
			$a1[$iii][$jjj]=$_GET[$el];
			if ( trim( $a1[$iii][$jjj])=="" ) $a1[$iii][$jjj]=-1;
			$a1[$iii][$jjj]=Str2Int( $a1[$iii][$jjj] );
			if ( $idxx!='0302' & $idxx!='0502' & $idxx!='0303' & $idxx!='0503' ) {
				if ( $res11==0 ) $aq=$aq.", a1_".$idxx."='".$a1[$iii][$jjj]."' ";
				else $aq=$aq.", '".$a1[$iii][$jjj]."' ";
			}
		}
		if ( $res11==0 ) $aq=$aq." WHERE id='$xb'";
		else $aq=$aq.")";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mmm'; $xb=$mmm_id; $res11=Adata_UPDA( $cows, $xb );
		$el=$xa."_19"; $a1[0][19]=$_GET[$el];
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET a1_19='".$a1[0][19]."' WHERE id='$xb'";
		else $aq="INSERT INTO $c_f2ml (`id`, `a1_19`) VALUES ('".$xb."', '".$a1[0][19]."')";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mfm'; $xb=$mfm_id; $res11=Adata_UPDA( $cows, $xb );
		$el=$xa."_19"; $a1[0][19]=$_GET[$el];
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET a1_19='".$a1[0][19]."' WHERE id='$xb'";
		else $aq="INSERT INTO $c_f2ml (`id`, `a1_19`) VALUES ('".$xb."', '".$a1[0][19]."')";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mmf'; $xb=$mmf_id; $res11=Adata_UPDA( $cows, $xb );
		$el=$xa."_19"; $a1[0][19]=$_GET[$el];
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET a1_19='".$a1[0][19]."' WHERE id='$xb'";
		else $aq="INSERT INTO $c_f2ml (`id`, `a1_19`) VALUES ('".$xb."', '".$a1[0][19]."')";
		if ( $xb!=1 ) Sql_query( $aq );

		$xa='mff'; $xb=$mff_id; $res11=Adata_UPDA( $cows, $xb );
		$el=$xa."_19"; $a1[0][19]=$_GET[$el];
		if ( $res11==0 ) $aq="UPDATE $c_f2ml SET a1_19='".$a1[0][19]."' WHERE id='$xb'";
		else $aq="INSERT INTO $c_f2ml (`id`, `a1_19`) VALUES ('".$xb."', '".$a1[0][19]."')";
		if ( $xb!=1 ) Sql_query( $aq );

	if ( $update_error==0 )
		Res_Draw( 3, $PHP_SELF."?cow_id=$cow_id&ret0=$ret0", "", $cw_c.":&nbsp;"."До картки тварини \"$nick\", номер \":$cow_num.\" (код: $cow_id) внесенi змiни.", $php_mm_tip[0] );
	else
		Res_Draw( 3, $PHP_SELF."?cow_id=$cow_id&ret0=$ret0", "", $cw_c.":&nbsp;"."Помилка внесення змiн до картки тварини \"$nick\", номер \":$cow_num.\" (код: $cow_id).", $php_mm_tip[0] );
	}
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
			 `b_place_id` int( 10 ) unsigned NOT NULL DEFAULT '1',
			 `i_date` date NOT NULL default '1991-12-31',
			 `owner_id` int( 10 ) unsigned NOT NULL DEFAULT '1',
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
			 `b_place_id` int( 10 ) unsigned NOT NULL DEFAULT '1',
			 `i_date` date NOT NULL default '1991-12-31',
			 `owner_id` int( 10 ) unsigned NOT NULL DEFAULT '1',
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

	echo "
<form name='df2__cwc.form2milk' method='get'>
	<input type='hidden' id='ret0' name='ret0' value='$ret0'>
	<input type='hidden' id='changed_input_name' name='changed_input_name' value='$changed_input_name'>
	<input type='hidden' id='cow_id' name='cow_id' value='$cow_id'>
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
	<table cellspacing='1' class='cards_'>
	<tr $edit_class>
		<td width='100%' align='center'>
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
		</td>
	</tr>
	<tr $edit_class valign='top'>
		<td width='70%' colspan='2'>
			<table cellspacing='1' class='cards_'>
			<tr $view_class style='height:23px'>
				<td width='15%'>&#8226;&nbsp;"."Прiзв."."</td>
				<td width='34%'><input $edit_class maxlength='100' name='nick' style='$edit_sty0' type='text' value='$nick'></td>
				<td width='1%'>&nbsp;</td>
				<td width='15%'>&#8226;&nbsp;"."Дата народж."."</td>
				<td $bad_bdate width='35%'>
					<a onclick='cal_u1( event, 0, 0 ); cal_load1( sender_=0 ); return false' href=''>
						<input $edit_class id='date10' name='dates_[0]' size='8' style='$edit_sty0' value='$b_date' onkeypress='return false' onmouseover='style.cursor=\"pointer\"'>
					</a>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td width='10%'>&#8226;&nbsp;"."Ідентифікаційний №"."</td>
				<td width='29%'><input $edit_class maxlength='100' name='b_num' style='$edit_sty0' type='text' value='$b_num'></td>
				<td width='1%'>&nbsp;</td>
				<td>&#8226;&nbsp;"."Місце народж."."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='b_place_id' style='$edit_sty0' type='text' value='$b_place_id'></td>
-->
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."ДКПТ"."</td>
				<td><input $edit_class maxlength='100' name='nat' style='$edit_sty0' type='text' value='$nat'></td>
				<td>&nbsp;</td>
				<td $bad_idate>&#8226;&nbsp;"."Дата надходж."."</td>
				<td $bad_bdate>
					<a onclick='cal_u1( event, 0, 0 ); cal_load1( sender_=1 ); return false' href=''>
						<input $edit_class id='date11' name='dates_[1]' size='8' style='$edit_sty0' value='$i_date' onkeypress='return false' onmouseover='style.cursor=\"pointer\"'>
					</a>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Порода"."</td>";
			Td_Echo2( $breeds, $breed_id, "breed_id", "" );
			echo "
				<td>&nbsp;</td>
				<td>&#8226;&nbsp;"."Масть"."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='c_color' style='$edit_sty0' type='text' value='$c_color'></td>
-->
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Породнiсть"."</td>";
			Td_Echo2( $xraces, $race_id, "race_id", "" );
			echo "
				<td>&nbsp;</td>
				<td>&#8226;&nbsp;"."Призначення"."</td>";
			Td_Echo2( $xfuncs, $func_id, "func_id", "" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Лінія"."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='c_line' style='$edit_sty0' type='text' value='$c_line'></td>
-->
				<td>&nbsp;</td>
				<td>&#8226;&nbsp;"."Генетичні дослідження"."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='c_gen' style='$edit_sty0' type='text' value='$c_gen'></td>
-->
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Родина"."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='c_var0' style='$edit_sty0' type='text' value='$c_var0'></td>
-->
				<td>&nbsp;</td>
				<td>&#8226;&nbsp;"."Власник"."</td>
				<td align='center'>/x/</td>
<!--
				<td><input $edit_class maxlength='100' name='c_owner_id' style='$edit_sty0' type='text' value='$c_owner_id'></td>
-->
			</tr>
			</table><br>
			<center>I. ПОХОДЖЕННЯ</center><br>
			<table cellspacing='1' class='cards_'>
			<tr $view_class style='height:23px'>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='15%'>"."М"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $m_id, 'm_id' );
			echo "</td>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='15%'>"."Б"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $f_id, 'f_id' );
			echo "</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Прiзв. та iнв. №"."</td>
				<td><input $edit_class maxlength='100' name='m_nick' style='$edit_sty0' type='text' value='$m_nick'></td>
				<td><input $edit_class maxlength='100' name='m_b_num' style='$edit_sty0' type='text' value='$m_b_num'></td>
				<td>&nbsp;</td>
				<td><input $edit_class maxlength='100' name='f_nick' style='$edit_sty0' type='text' value='$f_nick'></td>
				<td><input $edit_class maxlength='100' name='f_b_num' style='$edit_sty0' type='text' value='$f_b_num'></td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."ДКПТ"."</td>
				<td width='20%'><input $edit_class maxlength='100' name='m_nat' style='$edit_sty0' type='text' value='$m_nat'></td>
				<td width='20%'><input $edit_class maxlength='100' name='m_nat1' style='$edit_sty0' type='text' value='$m_nat1'></td>
				<td>&nbsp;</td>
				<td width='20%'><input $edit_class maxlength='100' name='f_nat' style='$edit_sty0' type='text' value='$f_nat'></td>
				<td width='20%'><input $edit_class maxlength='100' name='f_nat1' style='$edit_sty0' type='text' value='$f_nat1'></td>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Порода"."</td>";
			Td_Echo2( $breeds, $m_breed_id, "m_breed_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $breeds, $f_breed_id, "f_breed_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Породність"."</td>";
			Td_Echo2( $xraces, $m_race_id, "m_race_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xraces, $f_race_id, "f_race_id", "colspan='2'" );
			echo "
			</tr>
<!--
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Лінія"."</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='m_10' style='$edit_sty0' type='text' value='$ m_10'></td>
				<td>&nbsp;</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='f_10' style='$edit_sty0' type='text' value='$ f_10'></td>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Родина"."</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='m_12' style='$edit_sty0' type='text' value='$ m_12'></td>
				<td>&nbsp;</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='f_12' style='$edit_sty0' type='text' value='$ f_12'></td>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Вік, місяців"."</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='10' name='m_14' style='$edit_sty0' type='text' value='$ m_14'></td>
				<td>&nbsp;</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='10' name='f_14' style='$edit_sty0' type='text' value='$ f_14'></td>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Жива маса, кг"."</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='4' name='m_15' style='$edit_sty0' type='text' value='$ m_15'></td>
				<td>&nbsp;</td>
				<td colspan='2' width='40%'><input $edit_class maxlength='4' name='f_15' style='$edit_sty0' type='text' value='$ f_15'></td>
				</td>
			</tr>
-->
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."К. клас"."</td>";
			Td_Echo2( $xclasses, $m_clas_id, "m_clas_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xclasses, $f_clas_id, "f_clas_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Розряд ПЦ"."</td>
				<td align='center' colspan='2' width='40%'>x</td>
				<td>&nbsp;</td>
				<td align='center' colspan='2' width='40%'>/x/</td>
<!--
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='f_17' style='$edit_sty0' type='text' value='$ f_17'>
-->
				</td>
				</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Генетичні досл."."</td>
				<td align='center' colspan='2' width='40%'>/x/</td>
<!--
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='m_11' style='$edit_sty0' type='text' value='$ m_11'></td>
-->
				<td>&nbsp;</td>
				<td align='center' colspan='2' width='40%'>/x/</td>
<!--
				<td colspan='2' width='40%'><input $edit_class maxlength='100' name='f_11' style='$edit_sty0' type='text' value='$ f_11'></td>
-->
			</tr>
			</table>
			<table cellspacing='1' class='cards_' width='100%'>
			<tr $view_class>
				<td width='50%'>";
				CowProd_Echo( "m" );
				echo "
				</td>
				<td width='50%'>";
				OxProd_Echo( "f" );
				echo "
				</td>
			<tr>
			</table>
			<table><tr height='3'><td></td></tr></table>
			<table cellspacing='1' class='cards_'>
			<tr $view_class>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='5%'>"."ММ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mm_id, 'mm_id' );
			echo "</td>
				<td align='center' width='5%'>"."БМ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $fm_id, 'fm_id' );
			echo "</td>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='5%'>"."МБ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mf_id, 'mf_id' );
			echo "</td>
				<td align='center' width='5%'>"."ББ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $ff_id, 'ff_id' );
			echo "</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Прiзв. та iнв. №"."</td>
				<td><input $edit_class maxlength='100' name='mm_nick' style='$edit_sty0' type='text' value='$mm_nick'></td>
				<td><input $edit_class maxlength='100' name='mm_b_num' style='$edit_sty0' type='text' value='$mm_b_num'></td>
				<td><input $edit_class maxlength='100' name='fm_nick' style='$edit_sty0' type='text' value='$fm_nick'></td>
				<td><input $edit_class maxlength='100' name='fm_b_num' style='$edit_sty0' type='text' value='$fm_b_num'></td>
				<td>&nbsp;</td>
				<td><input $edit_class maxlength='100' name='mf_nick' style='$edit_sty0' type='text' value='$mf_nick'></td>
				<td><input $edit_class maxlength='100' name='mf_b_num' style='$edit_sty0' type='text' value='$mf_b_num'></td>
				<td><input $edit_class maxlength='100' name='ff_nick' style='$edit_sty0' type='text' value='$ff_nick'></td>
				<td><input $edit_class maxlength='100' name='ff_b_num' style='$edit_sty0' type='text' value='$ff_b_num'></td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."ДКПТ"."</td>
				<td><input $edit_class maxlength='100' name='mm_nat' style='$edit_sty0' type='text' value='$mm_nat'></td>
				<td><input $edit_class maxlength='100' name='mm_nat1' style='$edit_sty0' type='text' value='$mm_nat1'></td>
				<td><input $edit_class maxlength='100' name='fm_nat' style='$edit_sty0' type='text' value='$fm_nat'></td>
				<td><input $edit_class maxlength='100' name='fm_nat1' style='$edit_sty0' type='text' value='$fm_nat1'></td>
				<td>&nbsp;</td>
				<td><input $edit_class maxlength='100' name='mf_nat' style='$edit_sty0' type='text' value='$mf_nat'></td>
				<td><input $edit_class maxlength='100' name='mf_nat1' style='$edit_sty0' type='text' value='$mf_nat1'></td>
				<td><input $edit_class maxlength='100' name='ff_nat' style='$edit_sty0' type='text' value='$ff_nat'></td>
				<td><input $edit_class maxlength='100' name='ff_nat1' style='$edit_sty0' type='text' value='$ff_nat1'></td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Порода"."</td>";
			Td_Echo2( $breeds, $mm_breed_id, "mm_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $fm_breed_id, "fm_breed_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $breeds, $mf_breed_id, "mf_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $ff_breed_id, "ff_breed_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Породність"."</td>";
			Td_Echo2( $xraces, $mm_race_id, "mm_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $fm_race_id, "fm_race_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xraces, $mf_race_id, "mf_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $ff_race_id, "ff_race_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."К. клас"."</td>";
			Td_Echo2( $xclasses, $mm_clas_id, "mm_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $fm_clas_id, "fm_clas_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xclasses, $mf_clas_id, "mf_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $ff_clas_id, "ff_clas_id", "colspan='2'" );
			echo "
			</tr>
			</table>
			<table cellspacing='1' class='cards_' width='100%'>
			<tr $view_class>
				<td width='50%'>";
				CowProd_Echo( "mm" );
				echo "
				</td>
				<td width='50%'>";
				CowProd_Echo( "mf" );
				echo "
				</td>
			<tr>
			</table>
			<table cellspacing='1' class='cards_' width='100%'>
			<tr $view_class>
				<td width='50%'>";
				OxProd_Echo( "fm" );
				echo "
				</td>";
				echo "
				<td width='50%'>";
				OxProd_Echo( "ff" );
				echo "
				</td>
			<tr>
			</table>
			<table><tr height='3'><td></td></tr></table>
			<table cellspacing='1' class='cards_'>
			<tr $view_class>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='5%'>"."МММ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mmm_id, 'mmm_id' );
			echo "</td>
				<td align='center' width='5%'>"."БММ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $fmm_id, 'fmm_id' );
			echo "</td>
				<td align='center' width='5%'>"."МБМ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mfm_id, 'mfm_id' );
			echo "</td>
				<td align='center' width='5%'>"."ББМ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $ffm_id, 'ffm_id' );
			echo "</td>
				<td width='10%'>&nbsp;</td>
				<td align='center' width='5%'>"."ММБ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mmf_id, 'mmf_id' );
			echo "</td>
				<td align='center' width='5%'>"."БМБ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $fmf_id, 'fmf_id' );
			echo "</td>
				<td align='center' width='5%'>"."МББ"."</td>
				<td>";
			Td_Echo1( $buf_cows, $cow_id, $mff_id, 'mff_id' );
			echo "</td>
				<td align='center' width='5%'>"."БББ"."</td>
				<td>";
			Td_Echo1( $buf_oxes, $ox_id, $fff_id, 'fff_id' );
			echo "</td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Прiзв. та iнв. №"."</td>
				<td><input $edit_class maxlength='100' name='mmm_nick' style='$edit_sty0' type='text' value='$mmm_nick'></td>
				<td><input $edit_class maxlength='100' name='mmm_b_num' style='$edit_sty0' type='text' value='$mmm_b_num'></td>
				<td><input $edit_class maxlength='100' name='fmm_nick' style='$edit_sty0' type='text' value='$fmm_nick'></td>
				<td><input $edit_class maxlength='100' name='fmm_b_num' style='$edit_sty0' type='text' value='$fmm_b_num'></td>
				<td><input $edit_class maxlength='100' name='mfm_nick' style='$edit_sty0' type='text' value='$mfm_nick'></td>
				<td><input $edit_class maxlength='100' name='mfm_b_num' style='$edit_sty0' type='text' value='$mfm_b_num'></td>
				<td><input $edit_class maxlength='100' name='ffm_nick' style='$edit_sty0' type='text' value='$ffm_nick'></td>
				<td><input $edit_class maxlength='100' name='ffm_b_num' style='$edit_sty0' type='text' value='$ffm_b_num'></td>
				<td>&nbsp;</td>
				<td><input $edit_class maxlength='100' name='mmf_nick' style='$edit_sty0' type='text' value='$mmf_nick'></td>
				<td><input $edit_class maxlength='100' name='mmf_b_num' style='$edit_sty0' type='text' value='$mmf_b_num'></td>
				<td><input $edit_class maxlength='100' name='fmf_nick' style='$edit_sty0' type='text' value='$fmf_nick'></td>
				<td><input $edit_class maxlength='100' name='fmf_b_num' style='$edit_sty0' type='text' value='$fmf_b_num'></td>
				<td><input $edit_class maxlength='100' name='mff_nick' style='$edit_sty0' type='text' value='$mff_nick'></td>
				<td><input $edit_class maxlength='100' name='mff_b_num' style='$edit_sty0' type='text' value='$mff_b_num'></td>
				<td><input $edit_class maxlength='100' name='fff_nick' style='$edit_sty0' type='text' value='$fff_nick'></td>
				<td><input $edit_class maxlength='100' name='fff_b_num' style='$edit_sty0' type='text' value='$fff_b_num'></td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."ДКПТ"."</td>
				<td><input $edit_class maxlength='100' name='mmm_nat' style='$edit_sty0' type='text' value='$mmm_nat'></td>
				<td><input $edit_class maxlength='100' name='mmm_nat1' style='$edit_sty0' type='text' value='$mmm_nat1'></td>
				<td><input $edit_class maxlength='100' name='fmm_nat' style='$edit_sty0' type='text' value='$fmm_nat'></td>
				<td><input $edit_class maxlength='100' name='fmm_nat1' style='$edit_sty0' type='text' value='$fmm_nat1'></td>
				<td><input $edit_class maxlength='100' name='mfm_nat' style='$edit_sty0' type='text' value='$mfm_nat'></td>
				<td><input $edit_class maxlength='100' name='mfm_nat1' style='$edit_sty0' type='text' value='$mfm_nat1'></td>
				<td><input $edit_class maxlength='100' name='ffm_nat' style='$edit_sty0' type='text' value='$ffm_nat'></td>
				<td><input $edit_class maxlength='100' name='ffm_nat1' style='$edit_sty0' type='text' value='$ffm_nat1'></td>
				<td>&nbsp;</td>
				<td><input $edit_class maxlength='100' name='mmf_nat' style='$edit_sty0' type='text' value='$mmf_nat'></td>
				<td><input $edit_class maxlength='100' name='mmf_nat1' style='$edit_sty0' type='text' value='$mmf_nat1'></td>
				<td><input $edit_class maxlength='100' name='fmf_nat' style='$edit_sty0' type='text' value='$fmf_nat'></td>
				<td><input $edit_class maxlength='100' name='fmf_nat1' style='$edit_sty0' type='text' value='$fmf_nat1'></td>
				<td><input $edit_class maxlength='100' name='mff_nat' style='$edit_sty0' type='text' value='$mff_nat'></td>
				<td><input $edit_class maxlength='100' name='mff_nat1' style='$edit_sty0' type='text' value='$mff_nat1'></td>
				<td><input $edit_class maxlength='100' name='fff_nat' style='$edit_sty0' type='text' value='$fff_nat'></td>
				<td><input $edit_class maxlength='100' name='fff_nat1' style='$edit_sty0' type='text' value='$fff_nat1'></td>
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Порода"."</td>";
			Td_Echo2( $breeds, $mmm_breed_id, "mmm_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $fmm_breed_id, "fmm_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $mfm_breed_id, "mfm_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $ffm_breed_id, "ffm_breed_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $breeds, $mmf_breed_id, "mmf_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $fmf_breed_id, "fmf_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $mff_breed_id, "mff_breed_id", "colspan='2'" );
			Td_Echo2( $breeds, $fff_breed_id, "fff_breed_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Породність"."</td>";
			Td_Echo2( $xraces, $mmm_race_id, "mmm_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $fmm_race_id, "fmm_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $mfm_race_id, "mfm_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $ffm_race_id, "ffm_race_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xraces, $mmf_race_id, "mmf_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $fmf_race_id, "fmf_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $mff_race_id, "mff_race_id", "colspan='2'" );
			Td_Echo2( $xraces, $fff_race_id, "fff_race_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."К. клас"."</td>";
			Td_Echo2( $xclasses, $mmm_clas_id, "mmm_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $fmm_clas_id, "fmm_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $mfm_clas_id, "mfm_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $ffm_clas_id, "ffm_clas_id", "colspan='2'" );
			echo "
				<td>&nbsp;</td>";
			Td_Echo2( $xclasses, $mmf_clas_id, "mmf_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $fmf_clas_id, "fmf_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $mff_clas_id, "mff_clas_id", "colspan='2'" );
			Td_Echo2( $xclasses, $fff_clas_id, "fff_clas_id", "colspan='2'" );
			echo "
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Розряд ПЦ"."</td>
				<td align='center' colspan='2'>x</td>
				<td align='center' colspan='2'>/x/</td>
<!--
				<td colspan='2'><input $edit_class maxlength='10' name='fmm_17' style='$edit_sty0' type='text' value='$ fmm_17'></td>
-->
				<td align='center' colspan='2'>x</td>
				<td align='center' colspan='2'>/x/</td>
<!--
				<td colspan='2'><input $edit_class maxlength='10' name='ffm_17' style='$edit_sty0' type='text' value='$ ffm_17'></td>
-->
				<td>&nbsp;</td>
				<td align='center' colspan='2'>x</td>
				<td align='center' colspan='2'>/x/</td>
<!--
				<td colspan='2'><input $edit_class maxlength='10' name='fmf_17' style='$edit_sty0' type='text' value='$ fmf_17'></td>
-->
				<td align='center' colspan='2'>x</td>
				<td align='center' colspan='2'>/x/</td>
<!--
				<td colspan='2'><input $edit_class maxlength='10' name='fff_17' style='$edit_sty0' type='text' value='$ fff_17'></td>
-->
			</tr>
			<tr $view_class style='height:23px'>
				<td>&#8226;&nbsp;"."Продуктивність"."</td>
				<td colspan='2'><input $edit_class maxlength='30' id='mmm_19' name='mmm_19' style='$edit_sty0' type='text' value='$mmm_19'></td>
				<td align='center' colspan='2'>x</td>
				<td colspan='2'><input $edit_class maxlength='30' id='mfm_19' name='mfm_19' style='$edit_sty0' type='text' value='$mfm_19'></td>
				<td align='center' colspan='2'>x</td>
				<td>&nbsp;</td>
				<td colspan='2'><input $edit_class maxlength='30' id='mmf_19' name='mmf_19' style='$edit_sty0' type='text' value='$mmf_19'></td>
				<td align='center' colspan='2'>x</td>
				<td colspan='2'><input $edit_class maxlength='30' id='mff_19' name='mff_19' style='$edit_sty0' type='text' value='$mff_19'></td>
				<td align='center' colspan='2'>x</td>
			</tr>
			</table><br>
		</td>
	</tr>
	</table><br>
</form>";
}

ob_end_flush();//unlock output to set cookies properly!
?>
