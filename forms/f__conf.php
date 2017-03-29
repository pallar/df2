<?php
/* DF: forms/f__conf.php
form: config (Dairy Farm [CONF]igurator)
c: 13.06.2006
m: 29.03.2017 */

ob_start();//lock output to set cookies!

function Arr_s_Pack( $arr_s1, $arr_s2, $arr_s3, $arr_s9 ) {
	$arr1=$arr_s1=='on'; $arr2=$arr_s2=='on'; $arr3=$arr_s3=='on';
	$arr9=$arr_s9=='on';
	return Int2StrZ( $arr9, 1 ).Int2StrZ( $arr1*1+$arr2*2+$arr3*4, 5 );
}

function Arr_s_Unpack( $s ) {
	$x=split( ">", $s );
	if ( strlen( $s )<8 ) {
		for ( $i=0; $i<count( $x )-1; $i++ ) $z[$i]="000000";
	} else {
		for ( $i=0; $i<count( $x )-1; $i++ ) {
			$tmp=$x[$i]; $y=split( "<", $tmp );
			$w0=chr( substr( $y[1], 0, 1 )+78 );
			$w=substr( $y[1], 1, 6 )*1;
			$w1=chr(( $w & 1 )+64 );
			$w2=chr(( $w & 2 )+64 );
			$w4=chr(( $w & 4 )+63 );
			$z[$i]=Int2StrZ( $y[0], 2 ).$w1.$w2.$w4.$w0;
		}
	}
	return $z;
}

function CtrlZapusk_Draw( $contentCharset, $just, $userCoo, $php_mm, $_06_every_second_day_, $view_class, $edit_class, $rw_sty_0, $idx, $z ) {
	$idx_=$idx+1;
	for ( $i=1; $i<=3; $i++ ) { $checked[$i]=""; $ch[$i]=chr( $i+64 ); $checked_text[$i]="-"; }
	$days=substr( $z, 0, 2 )*1;
	$ch[4]="O";
	for ( $i=1; $i<=4; $i++ ) if ( strpos( $z, $ch[$i] )) { $checked[$i]="checked"; $checked_text[$i]="+"; }
	$onkeydown="int_keyp( \"s".$idx_."\", 0, 70, 2 )";
	echo "
	<td $just width='30px'>";
	if ( $userCoo>0 & $userCoo!=9 ) echo "<input class='txt' maxlength='2' name='s".$idx_."' style='height:100%; width:30px' type='text' value='$days' onkeydown='$onkeydown'>";
	else echo "<b>$days&nbsp;</b>";
	echo "</td>
	<td>";
	if ( $userCoo>0 & $userCoo!=9 ) echo "
		<input ".$checked[1]." name='arr_s".$idx_."10' title='".$php_mm["_com_s10_"]."' type='checkbox'>".mb_substr( $php_mm["_com_s10_"], 0, 1, $contentCharset )."
		<input ".$checked[2]." name='arr_s".$idx_."20' title='".$php_mm["_com_s20_"]."' type='checkbox'>".mb_substr( $php_mm["_com_s20_"], 0, 1, $contentCharset )."
		<input ".$checked[3]." name='arr_s".$idx_."30' title='".$php_mm["_com_s30_"]."' type='checkbox'>".mb_substr( $php_mm["_com_s30_"], 0, 1, $contentCharset )."
		<input ".$checked[4]." name='arr_s".$idx_."99' title='$_06_every_second_day_' type='checkbox'>";
	else echo "
		&nbsp;".mb_substr( $php_mm["_com_s10_"], 0, 1, $contentCharset ).":&nbsp;<b>".$checked_text[1]."</b>
		&nbsp;".mb_substr( $php_mm["_com_s20_"], 0, 1, $contentCharset ).":&nbsp;<b>".$checked_text[2]."</b>
		&nbsp;".mb_substr( $php_mm["_com_s30_"], 0, 1, $contentCharset ).":&nbsp;<b>".$checked_text[3]."</b>
		&nbsp;".mb_substr( $php_mm["_com_s40_"], 0, 1, $contentCharset ).":&nbsp;<b>".$checked_text[4]."</b>";
	echo "
	</td>";
}

function Is_Checked( $_name ) {
	$res=0;
	if ( isset( $_REQUEST[$_name] )) { if ( $_REQUEST[$_name]=='on' ) $res=1; else $res=0; }
	return $res;
}

function SectE_Chk( $errcode ) {
	global $errnum, $_07_err1;
	if (( $errnum & 1)*1!=1 && ( $errnum & 1 )*2!=2 &&
	 ( $errnum & 1 )*8!=8 && ( $errnum & 1 )*128!=128 &&
	 ( $errnum & 1 )*256!=256 )
		$errnum=+$errcode*1;
}

function ErrInSectOrg() {
	global $errnum, $_07_err1, $err_fnt,
	 $state, $region, $org, $farm, $addr,
	 $_07_fnt_state, $_07_fnt_regions, $_07_fnt_org, $_07_fnt_farm, $_07_fnt_addr;
	if ( $state=='' ) { SectE_Chk( 1 ); $_07_fnt_state=$err_fnt; }
	if ( $region=='' ) { SectE_Chk( 2 ); $_07_fnt_regions=$err_fnt; }
	if ( $org=='' ) { SectE_Chk( 8 ); $_07_fnt_org=$err_fnt; }
	if ( $farm=='' ) { SectE_Chk( 128 ); $_07_fnt_farm=$err_fnt; }
	if ( $addr=='' ) { SectE_Chk( 256 ); $_07_fnt_addr=$err_fnt; }
}

function ErrInSectSched() {
	global $errnum, $_07_err4194304, $err_fnt,
	 $_1b, $_2b, $_3b,
	 $_07_fnt_sched,
	 $db, $sessions, $modif_Ymd, $modif_His;
	if ( $_1b=='' || $_2b=='' || $_3b=='' ) {
		if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
		$_07_fnt_sched=$err_fnt;
	}
	$xx_1b=split( ":", $_1b ); $xx_1b=$xx_1b[0]*60+$xx_1b[1]*1;
	$xx_2b=split( ":", $_2b ); $xx_2b=$xx_2b[0]*60+$xx_2b[1]*1;
	$xx_3b=split( ":", $_3b ); $xx_3b=$xx_3b[0]*60+$xx_3b[1]*1;
	if ( $xx_1b>=$xx_2b-1 || $xx_1b>=$xx_3b-1 ) {
		if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
		$_07_fnt_sched=$err_fnt;
		$_1b="04:00"; $_2b="11:00"; $_3b="17:00";
		Sql_query( "UPDATE $sessions SET b='$_1b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='10'" );
		Sql_query( "UPDATE $sessions SET b='$_2b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='20'" );
		Sql_query( "UPDATE $sessions SET b='$_3b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='30'" );
	}
	if ( $xx_2b>=$xx_3b-1 ) {
		if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
		$_07_fnt_sched=$err_fnt;
		$_1b="04:00"; $_2b="11:00"; $_3b="17:00";
		Sql_query( "UPDATE $sessions SET b='$_1b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='10'" );
		Sql_query( "UPDATE $sessions SET b='$_2b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='20'" );
		Sql_query( "UPDATE $sessions SET b='$_3b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='30'" );
	}
}

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../dflib/f_lib1.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_07._$lang" );

MainMenu( $_07_."&nbsp;-&nbsp;".$php_mm["_com_app_"], "conf", "" );
?>

<script language='JavaScript' src='../dflib/sessvars.js'></script>
<script language='JavaScript' src='../dflib/f_input.js'></script>
<script language='JavaScript'>
function tempvar_ToCoo( element_id, do_hilight ) {
	_el=$$( String( element_id )); if ( _el==null ) return;
	if ( do_hilight==1 ) _el.style.background="#ffff00";
	var element_val=_el.value;
	if ( element_val=='off' | element_val=='on' ) var element_val=_el.checked;
	if ( element_val=='false' ) var element_val='0';
	if ( element_val=='true' ) var element_val='1';
	var prev_confparam=sessvars.confparam;
	if ( String( prev_confparam )=="undefined" ) {
		var new_confparam=';'+element_id+':'+element_val;
	} else {
		var prev__00=String( prev_confparam._00 );
		var element_id_pos=prev__00.indexOf( ";"+element_id+":" );
		if ( element_id_pos>-1 ) {
			var element_id_substr=prev__00.substr( element_id_pos+1, 100 );
			var element_id_endpos=element_id_substr.indexOf( ";" );
			if ( element_id_endpos<1 ) element_id_endpos=element_id_substr.length;
			var element_id_substr=prev__00.substr( element_id_pos, element_id_endpos+1 );
			var new_confparam=prev__00.replace( element_id_substr, ";"+element_id+":"+element_val );
		} else {
			var new_confparam=prev_confparam._00+";"+element_id+":"+element_val;
		}
	}
	sessvars.confparam={_00: new_confparam};
}

function vars_ToCoo( element_id, do_hilight ) {
	tempvar_ToCoo( String( element_id ), do_hilight );
	tempvar_ToCoo( "lang", 0 );
	tempvar_ToCoo( "state", 0 ); tempvar_ToCoo( "region", 0 ); tempvar_ToCoo( "subregion", 0 );
	tempvar_ToCoo( "org", 0 ); tempvar_ToCoo( "tel", 0 );
	tempvar_ToCoo( "chief", 0 ); tempvar_ToCoo( "chiefAnimalTech", 0 );
	tempvar_ToCoo( "farm", 0 ); tempvar_ToCoo( "addr", 0 );
	tempvar_ToCoo( "rfidMode", 0 );
	tempvar_ToCoo( "pits", 0 );
	tempvar_ToCoo( "devsByPit", 0 );
	tempvar_ToCoo( "dataWiresByPit", 0 );
	tempvar_ToCoo( "devsQ", 0 );
	tempvar_ToCoo( "prtsTyp", 0 );
	tempvar_ToCoo( "prt1", 0 );
	tempvar_ToCoo( "waitBetwDevs", 0 );
	tempvar_ToCoo( "drmdsByPit", 0 );
	tempvar_ToCoo( "drmdBdsMode", 0 );
	tempvar_ToCoo( "jaggs", 0 );
	tempvar_ToCoo( "jprtsTyp", 0 );
	tempvar_ToCoo( "jprt1", 0 );
	tempvar_ToCoo( "jcmdT", 0 );
	tempvar_ToCoo( "jignSimilar", 0 );
	tempvar_ToCoo( "_1b", 0 );
	tempvar_ToCoo( "_2b", 0 );
	tempvar_ToCoo( "_3b", 0 );
	cowSheds=0;
	for ( i=1; i<=5; i++ ) {
		for ( j=1; j<=3; j++ ) {
			cowSheds++; cowShedNum=cowSheds; if ( cowShedNum<10 ) cowShedNum="0"+cowShedNum;
			x="ws"+cowShedNum; tempvar_ToCoo( x, 0 );
//devsAtCsR - dev(ice)sA(t)C(ow)s(hedNumber)R(ow)
//lstallAtCsR - l(ast)stallAtC(ow)s(hedNumber)R(ow)
			for ( csR=1; csR<=4; csR++ ) {
				k=cowShedNum*10+csR; if ( k<100 ) k="0"+k;
				x="dd"+k; tempvar_ToCoo( x, 0 );
				x="ls"+k; tempvar_ToCoo( x, 0 );
			}
		}
	}
	tempvar_ToCoo( String( element_id ), do_hilight );
}

function devsTotal() {
	var devs=0, err=0;
	var _devsByPit=document.getElementById( 'devsByPit' );
	var _pits=document.getElementById( 'pits' );
	devs=Number( _devsByPit.value )*Number( _pits.value );
	if ( devs>96 ) { devs=0; err=1; }
	var _devs=document.getElementById( 'devsQ' ); _devs.value=devs;
//	if ( err>0 ) _devs.backgroundColor='#ff0000';
}

function devsTotalUdm() {
	var devs=0, err=0;
	for ( cowShed=1; cowShed<=15; cowShed++ ) {
		var csNum=String( cowShed ); if ( csNum<10 ) csNum='0'+csNum;
		for ( csR=1; csR<=4; csR++ ) {
			var _devsAtCsR=String( 'dd'+csNum+String( csR ));
			_devsAtCsR=document.getElementById( _devsAtCsR );
			devs=devs+Number( _devsAtCsR.value );
		}
	}
	if ( devs>96 ) { devs=0; err=1; }
	var _devs=document.getElementById( 'devsQ' ); _devs.value=devs;
	if ( err>0 ) { _devs.style.backgroundColor='ff0000'; _devs.style.color='#ff0000'; }
}
</script>

<?php
$modif_Ymd=date( "Y-m-d" ); $modif_His=date( "H:i:s" );

$err_fnt="style='color:#ff0000'";
$rfidModes=3;//!!!TEMPORARY (HARDWARE PART OF $rfidModes[4] IS NOT COMPLETED)
$langs=count( $_07_langs );
$langs_dis[be]="disabled"; $langs_dis[en]="disabled"; $langs_dis[tr]="disabled";//!!!TEMPORARY

//CONSTANTS
$pits_MIN=1; $pits_MAX=2;
$devsByPit_MIN=0; $devsByPit_MAX=48;
$dataWiresByPit_MIN=1; $dataWiresByPit_MAX=2;
$waitBetwDevs_MIN=1; $waitBetwDevs_MAX=400;
$pits_proc="int_keyp( \"pits\", $pits_MIN, $pits_MAX, 1 ); devsTotal(); vars_ToCoo( \"pits\", 1 )";
$devsByPit_proc="int_keyp( \"devsByPit\", $devsByPit_MIN, $devsByPit_MAX, 2 ); devsTotal(); vars_ToCoo( \"devsByPit\", 1 )";
$dataWiresByPit_proc="int_keyp( \"dataWiresByPit\", $dataWiresByPit_MIN, $dataWiresByPit_MAX, 2 ); devsTotal(); vars_ToCoo( \"dataWiresByPit\", 1 )";
$waitBetwDevs_proc="int_keyp( \"waitBetwDevs\", $waitBetwDevs_MIN, $waitBetwDevs_MAX, 3 )";

$drvDir="/_df2drv"; $drvFname="httpbd06";
$prt_MIN=1; $prt_MAX=6;

$jaggs_MIN=0; $jaggs_MAX=4;
$jaggs_proc="int_keyp( \"jaggs\", $jaggs_MIN, $jaggs_MAX, 1 )";
$jignSimilar=0;
$jignSimilar_proc="vars_ToCoo( \"jignSimilar\", 0 )";
$jcmdT_MIN=3000; $jcmdT_MAX=3600000;
$jcmdT_proc="int_keyp( \"jcmdT\", $jcmdT_MIN, $jcmdT_MAX, 7 )";

$jdrvDir="/_df2drv"; $jdrvFname="httpsep";
$jprt_MIN=2; $jprt_MAX=12;

$errnum=0;
$errnum_524288=0;//special error for jaggs under DF_1
$errnum1048576=0;//special error for budms

//to prevent locking when moving from $rfidMode==3 to other
$res=mysql_query( "SELECT
 rfid_mode
 FROM $globals", $db );
$r=mysql_fetch_row( $res ); mysql_free_result( $res );
$rfidModeDb=$r[0]*1;

$btn_ok=$_POST["btn_ok"]; $do_js=$_GET["do_js"]; $send_js_to_php=$_POST["send_js_to_php"];

if ( $send_js_to_php!="" ) echo "
<script>location.href='$PHP_SELF?do_js=1&OnLoad_Temp_Func=sessvars.$.clearMem();&sessvars='+sessvars.confparam._00</script>";
else if ( $do_js!="" ) {
	$sessvars=$_GET["sessvars"]; $updateslist=split( ";", $sessvars );
	for ( $ii=0; $ii<=count( $updateslist ); $ii++ ) {
		if ( strlen( $updateslist[$ii] )>1 ) {
			$updlist=split( ":", $updateslist[$ii] );
			$updlist[0]=trim( $updlist[0] ); $updlist[1]=trim( $updlist[1] );
//echo "$updateslist[$i]: $updlist[0] $updlist[1] $updlist[2]<br>";
			$cowSheds=0;
			for ( $i=1; $i<=5; $i++ ) for ( $j=1; $j<=3; $j++ ) {
				$cowSheds++; $cowShedNum=$cowSheds; if ( $cowShedNum<10 ) $cowShedNum="0".$cowShedNum;
				$x="ws".$cowShedNum; if ( $updlist[0]==$x ) $cow_shed[$x]=$updlist[1];
//devsAtCsR - dev(ice)sA(t)C(ow)s(hedNumber)R(ow)
//lstallAtCsR - l(ast)stallAtC(ow)s(hedNumber)R(ow)
				for ( $csR=1; $csR<=4; $csR++ ) {
					$k=$cowShedNum*10+$csR; if ( $k<100 ) $k="0".$k;
					$x="dd".$k; if ( $updlist[0]==$x ) $cow_shed[$x]=$updlist[1];
					$y="ls".$k; if ( $updlist[0]==$y ) $cow_shed[$y]=$updlist[1];
				}
			}
			if ( $updlist[0]=='lang' ) $lang=$updlist[1];
			if ( $updlist[0]=='state' ) $state=$updlist[1];
			if ( $updlist[0]=='region' ) $region=$updlist[1];
			if ( $updlist[0]=='subregion' ) $subregion=$updlist[1];
			if ( $updlist[0]=='org' ) $org=$updlist[1];
			if ( $updlist[0]=='farm' ) $farm=$updlist[1];
			if ( $updlist[0]=='addr' ) $addr=$updlist[1];
			if ( $updlist[0]=='tel' ) $tel=$updlist[1];
			if ( $updlist[0]=='chief' ) $chief=$updlist[1];
			if ( $updlist[0]=='chiefAnimalTech' ) $chiefAnimalTech=$updlist[1];
			if ( $updlist[0]=='pits' ) $pits=$updlist[1]*1;
			if ( $updlist[0]=='devsByPit' ) $devsByPit=$updlist[1]*1;
			if ( $updlist[0]=='dataWiresByPit' ) $dataWiresByPit=$updlist[1]*1;
			if ( $updlist[0]=='devsQ' ) $devsQ=$updlist[1]*1;
			if ( $updlist[0]=='prtsTyp' ) $prtsTyp=$updlist[1];
			if ( $updlist[0]=='prt1' ) $prt1=$updlist[1]*1;
			if ( $updlist[0]=='waitBetwDevs' ) $waitBetwDevs=$updlist[1]*1;
			if ( $updlist[0]=='rfidMode' ) $rfidMode=$updlist[1]*1;
			if ( $updlist[0]=='drmdsByPit' ) $drmdsByPit=$updlist[1]*1;
			if ( $updlist[0]=='drmdBdsMode' ) $drmdBdsMode=$updlist[1]*1;
			if ( $updlist[0]=='jaggs' ) $jaggs=$updlist[1]*1;
			if ( $updlist[0]=='jprtsTyp' ) $jprtsTyp=$updlist[1];
			if ( $updlist[0]=='jprt1' ) $jprt1=$updlist[1]*1;
			if ( $updlist[0]=='jcmdT' ) $jcmdT=$updlist[1]*1;
			if ( $updlist[0]=='jignSimilar' ) $jignSimilar=$updlist[1]=="true"|0;
			if ( $updlist[0]=='_1b' ) {
				if ( strlen( $updlist[1] )<1 ) {
					if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
					$_07_fnt_sched=$err_fnt;
				}
				while ( strlen( trim( $updlist[1] ))<2 ) $updlist[1]="0".$updlist[1];
				$_1b=trim( $updlist[1].":".$updlist[2] );
				while ( strlen( $_1b )<5 ) $_1b=$_1b."0";
			}
			if ( $updlist[0]=='_2b' ) {
				if ( strlen( $updlist[1] )<1 ) {
					if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
					$_07_fnt_sched=$err_fnt;
				}
				while ( strlen( trim( $updlist[1] ))<2 ) $updlist[1]="0".$updlist[1];
				$_2b=trim( $updlist[1].":".$updlist[2] );
				while ( strlen( $_2b )<5 ) $_2b=$_2b."0";
			}
			if ( $updlist[0]=='_3b' ) {
				if ( strlen( $updlist[1] )<1 ) {
					if (( $errnum & 4194304 )*1!==4194304 ) $errnum=+4194304;
					$_07_fnt_sched=$err_fnt;
				}
				while ( strlen( trim( $updlist[1] ))<2 ) $updlist[1]="0".$updlist[1];
				$_3b=trim( $updlist[1].":".$updlist[2] );
				while ( strlen( $_3b )<5 ) $_3b=$_3b."0";
			}
		}
	}
	ErrInSectOrg();
	ErrInSectSched();
	if ( $rfidMode==3 && $rfidModeDb==3 ) {
		Sql_query( "TRUNCATE $budms" );
		$errnum1048576=1;
		$cowSheds=0; $_budms=0; $devsQ=0; $stallMax=0; 
		for ( $i=1; $i<=5; $i++ ) for ( $j=1; $j<=3; $j++ ) {
			$cowSheds++; $cowShedNum=$cowSheds; if ( $cowShedNum<10 ) $cowShedNum="0".$cowShedNum;
//devsAtCsR - dev(ice)sA(t)C(ow)s(hedNumber)R(ow)
//lstallAtCsR - l(ast)stallAtC(ow)s(hedNumber)R(ow)
			for ( $csR=1; $csR<=4; $csR++ ) {
				$k=$cowShedNum*10+$csR; if ( $k<100 ) $k="0".$k;
				$x="dd".$k;
				$y="ls".$k;
				if ( $cow_shed[$y]>0 && ( $cow_shed[$y]>$stallMax )) {
					$devMin=0;
					$errnum1048576=0;
					$devMax=$cow_shed[$x]; if ( $cow_shed[$x]>0 ) $devMin=1; $devsQ+=$cow_shed[$x];
					if ( $stallMax==0 ) $stallMin=1; else $stallMin=$stallMax+1;
					$stallMax=$cow_shed[$y];
					$_budms++; $budmNum=$_budms; if ( $budmNum<10 ) $budmNum="0".$budmNum;
					$dataWireNum=substr( $k, 2, 1 )*1;
					$cowShedNum=substr( $k, 0, 2 )*1;
//echo "$k $budmNum $cowShedNum $dataWireNum $stallMin $stallMax<br>";
					Sql_query( "INSERT INTO $budms (
					 `num`, `cow_shed`, `data_wire`, `dev_min`, `dev_max` , `stall_min`, `stall_max`,
					 `modif_date`, `modif_time`, `modif_uid` )
					 VALUES (
					 '$budmNum', '$cowShedNum', '$dataWireNum', '$devMin', '$devMax', '$stallMin', '$stallMax',
					 '$modif_Ymd', '$modif_His', 1 )" );
				} else if ( $cow_shed[$x]>0 ) {
					$cow_shed[$x]="";
				}
			}
		}
		if ( $errnum1048576==1 )
			Sql_query( "INSERT INTO $budms (
			 `num`, `cow_shed`, `data_wire`, `stall_min`, `stall_max`,
			 `modif_date`, `modif_time`, `modif_uid` )
			 VALUES (
			 '01', '1', '1', '1', '60',
			 '$modif_Ymd', '$modif_His', 1 )" );
	} elseif ( $rfidModeDb!=3 ) {
		if ( $devsByPit<$devsByPit_MIN || $devsByPit>$devsByPit_MAX ) {
			if (( $errnum & 1024 )*1!=1024 ) $errnum=+1024;
			$_07_fnt_devsByPit=$err_fnt;
		} else {
			if ( round( $devsByPit/2 )*2!=$devsByPit ) {
				if (( $errnum & 1024 )*1!=1024 ) $errnum=+1024;
				$_07_fnt_devsByPit=$err_fnt;
				$devsByPit=16;
			}
		}
		$devsQ=$pits*$devsByPit;
		if ( $dataWiresByPit<$dataWiresByPit_MIN || $dataWiresByPit>$dataWiresByPit_MAX || ( $dataWiresByPit>$devsByPit/2 && $devsByPit!=0 )) {
			$errnum=+2048;
			$_07_fnt_dataWiresByPit=$err_fnt;
			if ( $dataWiresByPit==1 && $devsByPit<=1 ) { $errnum=-2048; $_07_fnt_dataWiresByPit=""; }
		}
//$jaggs and $jprts must be 0 if local rfid readers are used
		if ( $rfidMode==1 || $rfidMode==3 && ( $jaggs>0 || $jprts>0 )) {
			if ( $errnum_524288==0 ) $errnum_524288=524288;
			$jaggs=0; $jprts=0;
			Sql_query( "UPDATE $hardwj SET jaggs='$jaggs', ports='$jprts'" );
		}
//jaggs first port checking
		$jprt1x=$prt1+$pits*$dataWiresByPit;
		if ( $jprtsTyp==$prtsTyp && $jprt1<$jprt1x && $jaggs>0 ) {
			$jaggs=0;
			$jprt1=$jprt1x;
			if (( $errnum & 2097152 )*1!=2097152 ) $errnum=+2097152;
			$_07_fnt_jaggs=$err_fnt;
			$_07_fnt_jprt1=$err_fnt;
		}
	}
	if ( $waitBetwDevs<$waitBetwDevs_MIN || $waitBetwDevs>$waitBetwDevs_MAX ) {
		$errnum=+32768;
		$_07_fnt_waitBetwDevs=$err_fnt;
	}
//BEG: IMPORTANT FIXES
	if ( $pits<1 ) $pits=1;
	if ( $dataWiresByPit<1 ) $dataWiresByPit=1;
	if ( $waitBetwDevs<50 ) $waitBetwDevs=50;
	if ( $jcmdT<$jcmdT_MIN ) $jcmdT=$jcmdT_MIN;
	if ( $jignSimilar==1 ) $jignSimilar_checked="checked"; else $jignSimilar_checked="";
//END: IMPORTANT FIXES
	if ( $errnum==0 ) {
		Sql_query( "UPDATE $globals SET
		 state='$state', region='$region', subregion='$subregion',
		 language='$lang',
		 enterprise='$org', farm='$farm',
		 address='$addr', phone='$tel',
		 chief='$chief', chief_animal_technician='$chiefAnimalTech',
		 totaldevs='$devsQ',
		 rfid_mode='$rfidMode'" );
		Sql_query( "DELETE FROM $hardwports" );
		Sql_query( "INSERT INTO $hardwports (
		 `port_name`, `waitstate_between_devs`, `port_idx` )
		 VALUES (
		 'DO_RECONF', '9999', '0' )" );
//schedule
		Sql_query( "UPDATE $sessions SET b='$_1b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='10'" );
		Sql_query( "UPDATE $sessions SET b='$_2b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='20'" );
		Sql_query( "UPDATE $sessions SET b='$_3b', modif_date='$modif_Ymd', modif_time='$modif_His' WHERE id='30'" );
	}
	if ( $errnum==0 && $rfidMode==3 ) {
//cowsheds
		$prt_idx=$rfidMode;
		$prtnum_n=$prt1; $prt_n=$prtsTyp.$prtnum_n;
		$res=mysql_query( "SELECT
		 num, dev_min, dev_max, stall_min, stall_max
		 FROM $budms", $db );
		while ( $r=mysql_fetch_row( $res )) {
			if ( $r[1]!=0 ) {
				Sql_query( "INSERT INTO $hardwports (
				 `port_name`, `port_bps`,
				 `dev_first`, `dev_last`, `waitstate_between_devs`, `port_idx` )
				 VALUES (
				 '$prt_n', '2400',
				 '$r[1]', '$r[2]', '$waitBetwDevs', '$prt_idx' )" );
				$prtnum_n++; $prt_n=$prtsTyp.$prtnum_n;
			}
		}
	}
	if ( $errnum==0 && $rfidMode!=3 ) {
		Sql_query( "UPDATE $hardw SET
		 pits='$pits',
		 drmds_by_pit='$drmdsByPit',
		 drmd_bds='$drmdBdsMode',
		 data_wires_by_pit='$dataWiresByPit',
		 devs_by_pit='$devsByPit',
		 waitstate_between_devs='$waitBetwDevs',
		 ports_type='$prtsTyp', port_first='$prt1',
		 driver_dir='$drvDir', driver_fname='$drvFname'" );
		Sql_query( "DELETE FROM $dairymds" );
		if ( $devsQ!=0 ) {
			for ( $i=1; $i<=$pits; $i++ ) for ( $j=1; $j<=$devsByPit; $j++ ) {
				$devcur=$j+$devsByPit*($i-1); if ( $devcur<=9 ) $devcur="#0".$devcur; else $devcur="#".$devcur;
				$pit_devs[$i]=$pit_devs[$i].$devcur;
			}
//for ( $i=1; $i<=$pits; $i++ ) echo $pit_devs[$i]."<br>";
			$devsByDrmd=$devsByPit/$drmdsByPit;
			for ( $i=1; $i<=$pits; $i++ ) {
				$f_dev=0;
				for ( $j=1; $j<=$drmdsByPit; $j++ ) {
					$d_i=$i*100+$j;
					$drmd_devs[$d_i]=$drmd_devs[$d_i].substr( $pit_devs[$i], $f_dev, 3*$devsByDrmd );
					$drmd_devs1[$d_i]=$drmd_devs[$d_i];
					$f_dev=$f_dev+3*$devsByDrmd;
				}
			}
			if ( $drmdBdsMode==2 ) {
				if ( $drmdsByPit==2 ) {
					for ( $i=1; $i<=$pits; $i++ ) {
						$d_i1=$i*100+1;
						$d_i2=$i*100+2;
						$d_i3=$i*100+3;
						$d_i4=$i*100+4;
						$drmd_devs[$d_i1]=substr( $drmd_devs1[$d_i1], 0, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i2], 0, $devsByDrmd/2*3 );
						$drmd_devs[$d_i2]=substr( $drmd_devs1[$d_i1], $devsByDrmd/2*3, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i2], $devsByDrmd/2*3, $devsByDrmd/2*3 );
					}
				}
				if ( $drmdsByPit==4 ) {
					for ( $i=1; $i<=$pits; $i++ ) {
						$d_i1=$i*100+1;
						$d_i2=$i*100+2;
						$d_i3=$i*100+3;
						$d_i4=$i*100+4;
						$drmd_devs[$d_i1]=substr( $drmd_devs1[$d_i1], 0, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i3], 0, $devsByDrmd/2*3 );
						$drmd_devs[$d_i2]=substr( $drmd_devs1[$d_i1], $devsByDrmd/2*3, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i3], $devsByDrmd/2*3, $devsByDrmd/2*3 );
						$drmd_devs[$d_i3]=substr( $drmd_devs1[$d_i2], 0, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i4], 0, $devsByDrmd/2*3 );
						$drmd_devs[$d_i4]=substr( $drmd_devs1[$d_i2], $devsByDrmd/2*3, $devsByDrmd/2*3 ).substr( $drmd_devs1[$d_i4], $devsByDrmd/2*3, $devsByDrmd/2*3 );
					}
				}
			}
			for ( $i=1; $i<=$pits; $i++ ) for ( $j=1; $j<=$drmdsByPit; $j++ ) {
				$d_i=$i*100+$j;
//echo "pit".$i." "."drmd".$j." ".$drmd_devs[$d_i]."<br>";
				Sql_query( "INSERT INTO $dairymds (
				 `dairymd_devs`, `dairymd_idx` )
				 VALUES (
				 '$drmd_devs[$d_i]', '$d_i' )" );
			}
		}
		if ( $jcmdT<jcmdT_MIN ) $jcmdT=$jcmdT_MIN;
		Sql_query( "UPDATE $hardwj SET
		 jaggs='$jaggs',
		 ignore_similar='$jignSimilar',
		 cmd_timeout='$jcmdT',
		 ports_type='$jprtsTyp', port_first='$jprt1',
		 driver_dir='$jdrvDir', driver_fname='$jdrvFname'" );
//parlor
		$prt_idx=$rfidMode;
		$prtnum_n=$prt1; $prt_n=$prtsTyp.$prtnum_n;
		$devf_n=1;
		if ( $dataWiresByPit==1 ) $devl_n=$devsByPit; else $devl_n=$devsByPit/2;
		for ( $i=1; $i<=$pits; $i++ ) {
			for ( $j=1; $j<=$dataWiresByPit; $j++ ) {
				Sql_query( "INSERT INTO $hardwports (
				 `port_name`, `port_bps`,
				 `dev_first`, `dev_last`, `waitstate_between_devs`, `port_idx` )
				 VALUES (
				 '$prt_n', '2400',
				 '$devf_n', '$devl_n', '$waitBetwDevs', '$prt_idx' )" );
				$prtnum_n++; $prt_n=$prtsTyp.$prtnum_n;
				if ( $dataWiresByPit==1 ) {
					$devf_n=$devf_n+$devsByPit; $devl_n=$devf_n+$devsByPit-1;
				} else {
					$devf_n=$devf_n+$devsByPit/2; $devl_n=$devf_n+$devsByPit/2-1;
				}
			}
		}
		for ( $i=$prt_MIN; $i<=$prt_MAX; $i++ ) $prt_sel[$i]=""; $prt_sel[$prt1]="selected";
		$prtsTyp_sel[COM]=""; $prtsTyp_sel[USBCOM]=""; $prtsTyp_sel[USB]=""; $prtsTyp_sel[$prtsTyp]="selected";
		for ( $i=1; $i<=6; $i++ ) $drmdsByPit_sel[$i]=""; $drmdsByPit_sel[$drmdsByPit]="selected";
		for ( $i=1; $i<=2; $i++ ) $drmdBdsMode_sel[$i]=""; $drmdBdsMode_sel[$drmdBdsMode]="selected";
//jaggs
		$jprtnum_n=$jprt1; $jprt_n=$jprtsTyp.$jprtnum_n;
		for ( $i=1; $i<=$jaggs; $i++ ) {
			Sql_query( "INSERT INTO $hardwports (
			 `port_name`, `port_bps`,
			 `dev_first`, `dev_last`, `waitstate_between_devs`, `port_idx` )
			 VALUES (
			 '$jprt_n', '9600',
			 '0', '0', '0', '8' )" );
			$jprtnum_n++; $jprt_n=$jprtsTyp.$jprtnum_n;
		}
		for ( $i=$jprt_MIN; $i<=$jprt_MAX; $i++ ) $jprt_sel[$i]=""; $jprt_sel[$jprt1]="selected";
		$jprtsTyp_sel[COM]=""; $jprtsTyp_sel[USB]=""; $jprtsTyp_sel[USBCOM]=""; $jprtsTyp_sel[$jprtsTyp]="selected";
	}
}

//sessions from db
$res=mysql_query( "SELECT
 id, b
 FROM $sessions ORDER BY id", $db );
while ( $r=mysql_fetch_row( $res )) {
	if ( $r[0]*1==10 ) $_1b=trim( $r[1] );
	if ( $r[0]*1==20 ) $_2b=trim( $r[1] );
	if ( $r[0]*1==30 ) $_3b=trim( $r[1] );
}
mysql_free_result( $res );
//org. from db
$res=mysql_query( "SELECT
 state, region, subregion,
 enterprise, farm, address, phone,
 chief, chief_animal_technician,
 totaldevs,
 sessions,
 language,
 os, suex_dir, suex_ver, suex_passw, rfid_mode
 FROM $globals", $db );
$r=mysql_fetch_row( $res ); mysql_free_result( $res );
$state=trim( $r[0] ); $region=trim( $r[1] ); $subregion=trim( $r[2] );
$org=trim( $r[3] ); $farm=trim( $r[4] );
$addr=trim( $r[5] ); $tel=trim( $r[6] );
$chief=trim( $r[7] ); $chiefAnimalTech=trim( $r[8] );
$devsQ=$r[9]*1;
$sesss=$r[10]*1;
$lang=trim( $r[11] );
if ( strlen( $state )==0 ) $state=$state_ukr; if ( $state=="Ukraine" ) $state=$state_ukr;
$rfidMode=$r[16]*1;
for ( $i=1; $i<=$rfidModes; $i++ ) $rfidModes_sel[$i]=""; $rfidModes_sel[$rfidMode]="selected";
for ( $i=1; $i<=$langs; $i++ ) { $j=$langs_val[$i]; $langs_sel[$j]=$langs_dis[$j]; } $langs_sel[$lang]=$langs_sel[$lang]." selected";
$os=trim( $r[12] );
$suex_dir=trim( $r[13] ); $suex_ver=trim( $r[14] ); $suex_passw=trim( $r[15] );
//parlor from db
$res=mysql_query( "SELECT
 pits,
 drmds_by_pit,
 drmd_bds,
 devs_by_pit,
 data_wires_by_pit,
 waitstate_between_devs,
 ports, ports_type, port_first,
 driver_dir, driver_fname
 FROM $hardw", $db );
$r=mysql_fetch_row( $res ); mysql_free_result( $res );
$pits=$r[0]*1;
if ( $pits<1 ) { $pits=1; Sql_query( "UPDATE $hardw SET pits='$pits'" ); }
$drmdsByPit=$r[1]*1;
for ( $i=1; $i<=6; $i++ ) $drmdsByPit_sel[$i]=""; $drmdsByPit_sel[$drmdsByPit]="selected";
$drmdBdsMode=$r[2]*1;
for ( $i=1; $i<=2; $i++ ) $drmdBdsMode_sel[$i]=""; $drmdBdsMode_sel[$drmdBdsMode]="selected";
$devsByPit=$r[3]*1;
$dataWiresByPit=$r[4]*1;
if ( $dataWiresByPit>$devsByPit/2 || $dataWiresByPit<1 ) { $dataWiresByPit=1; Sql_query( "UPDATE $hardw SET data_wires_by_pit='$dataWiresByPit'" ); }
$waitBetwDevs=$r[5]*1;
if ( $waitBetwDevs<50 ) { $waitBetwDevs=50; Sql_query( "UPDATE $hardw SET waitstate_between_devs='$waitBetwDevs'" ); }
$prts=$r[6]*1;
$prtsTyp=trim( $r[7] );
$prtsTyp_sel[COM]=""; $prtsTyp_sel[USB]=""; $prtsTyp_sel[USBCOM]=""; $prtsTyp_sel[$prtsTyp]="selected";
$prt1=$r[8]*1;
for ( $i=$prt_MIN; $i<=$prt_MAX; $i++ ) $prt_sel[$i]=""; $prt_sel[$prt1]="selected";
$devsQ=$pits*$devsByPit;
//jaggs from db
$res=mysql_query( "SELECT
 jaggs,
 ports, ports_type, port_first,
 driver_dir, driver_fname, cmd_timeout, ignore_similar
 FROM $hardwj", $db );
$r=mysql_fetch_row( $res ); mysql_free_result( $res );
$jaggs=$r[0]*1;
$jprts=$r[1]*1;
$jprtsTyp=$r[2];
$jprtsTyp_sel[COM]=""; $jprtsTyp_sel[USB]=""; $jprtsTyp_sel[USBCOM]=""; $jprtsTyp_sel[$jprtsTyp]="selected";
$jprt1=$r[3]*1;
for ( $i=$jprt_MIN; $i<=$jprt_MAX; $i++ ) $jprt_sel[$i]=""; $jprt_sel[$jprt1]="selected";
$jcmdT=$r[6]*1;
if ( $jcmdT<$jcmdT_MIN ) { $jcmdT=$jcmdT_MIN; Sql_query( "UPDATE $hardwj SET cmd_timeout='$jcmdT'" ); }
$jignSimilar=$r[7]*1;
if ( $jignSimilar==1 ) $jignSimilar_checked="checked";
//$jaggs and $jprts must be 0 if local rfid readers are used
if ( $rfidMode==1 || $rfidMode==3 && ( $jaggs>0 || $jprts>0 )) {
	if ( $errnum_524288==0 ) $errnum_524288=524288;
	$jaggs=0; $jprts=0;
	Sql_query( "UPDATE $hardwj SET jaggs='$jaggs', ports='$jprts'" );
}

//budms
if ( $rfidMode==3 ) {
	$devsQ=0; $cowSheds=0; $dataWires=0;
	$res=mysql_query( "SELECT
	 num, cow_shed, data_wire, dev_min, dev_max, stall_min, stall_max
	 FROM $budms", $db );
	while ( $r=mysql_fetch_row( $res )) {
		$dataWires++;
		if ( $r[1]==0 ) {
			if ( $dataWires==1 ) $cowSheds++;
			Sql_query( "UPDATE $budms SET cow_shed='$cowSheds', data_wire='$dataWires' WHERE num='$r[0]'" );
			$r[1]=$cowSheds; $r[2]=$dataWires;
		}
		$k=$r[1]*10+$r[2]; if ( $k<100 ) $k="0".$k;
		if ( $r[4]*1==0 ) { $r[3]=""; $r[4]=""; }
		$cow_shed["$k"]["dev_min"]=$r[3];
		$cow_shed["$k"]["dev_max"]=$r[4];
		$cow_shed["$k"]["stall_min"]=$r[5];
		$cow_shed["$k"]["stall_max"]=$r[6];
		$devsQ+=$r[4];
	}
}

//reserved to restore
$lang_=$lang;
$os_=$os;
$suex_dir_=$suex_dir; $suex_ver_=$suex_ver; $suex_passw_=$suex_passw;
$state_=$state; $region_=$region; $subregion_=$subregion;
$org_=$org; $farm_=$farm;
$addr_=$addr; $tel_=$tel;
$chief_=$chief; $chiefAnimalTech_=$chiefAnimalTech;
$rfidMode_=$rfidMode;
$pits_=$pits;
$devsByPit_=$devsByPit;
$dataWiresByPit_=$dataWiresByPit;
$waitBetwDevs_=$waitBetwDevs;
$prts_=$prts;
$prtsTyp_=$prtsTyp;
$prt1_=$prt1;
$drmdsByPit_=$drmdsByPit;
$drmdBdsMode_=$drmdBdsMode;
$jaggs_=$jaggs;
$jprts_=$jprts;
$jprtsTyp_=$jprtsTyp;
$jprt1_=$jprt1;
$jignSimilar_=$jignSimilar;

echo "
<form name='df__conf' method='post' action='$PHP_SELF'>";
if ( $userCoo==1 ) {
	echo "
<table class='st3'>
<tr style='height:18px'><td colspan='7'>&nbsp;".$_07_sectOwner.":</td></tr>
<tr class='cards_title'>
	<td><font $_07_fnt_state>&#8226;&nbsp;".$_07_state."</font></td>
	<td colspan='3'><input class='txt' id='state' maxlength='50' style='width:100%' type='text' value='$state' onchange='vars_ToCoo( \"state\", 1 )'></td>
	<td width='29%'><font $_07_fnt_regions>&#8226;&nbsp;".$_07_regions."</font></td>
	<td title='".$_07_region_tip."'><input class='txt' id='region' maxlength='50' style='width:100%' type='text' value='$region' onchange='vars_ToCoo( \"region\", 1 )'></td>
	<td title='".$_07_subregion_tip."'><input class='txt' id='subregion' maxlength='50' style='width:100%' type='text' value='$subregion' onchange='vars_ToCoo( \"subregion\", 1 )'></td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_org>&#8226;&nbsp;".$_07_org."</font></td>
	<td colspan='3'><input class='txt' id='org' maxlength='70' style='width:100%' type='text' value='$org' onchange='vars_ToCoo( \"org\", 1 )'></td>
	<td><font $_07_fnt_tel>&#8226;&nbsp;".$_07_tel."</font></td>
	<td colspan='2'><input class='txt' id='tel' maxlength='50' style='width:100%' type='text' value='$tel' onchange='vars_ToCoo( \"tel\", 1 )'></td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_chief>&#8226;&nbsp;".$_07_chief."</font></td>
	<td colspan='3'><input class='txt' id='chief' maxlength='50' style='width:100%' type='text' value='$chief' onchange='vars_ToCoo( \"chief\", 1 )'></td>
	<td><font $_07_fnt_chiefAnimalTech>&#8226;&nbsp;".$_07_chiefAnimalTech."</font></td>
	<td colspan='2'><input class='txt' id='chiefAnimalTech' maxlength='50' style='width:100%' type='text' value='$chiefAnimalTech' onchange='vars_ToCoo( \"chiefAnimalTech\", 1 )'></td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_farm>&#8226;&nbsp;".$_07_farm."</font></td>
	<td colspan='3'><input class='txt' id='farm' maxlength='70' style='width:100%' type='text' value='$farm' onchange='vars_ToCoo( \"farm\", 1 )'></td>
	<td><font $_07_fnt_addr>&#8226;&nbsp;".$_07_addr."</font></td>
	<td colspan='2'><input class='txt' id='addr' maxlength='70' style='width:100%' type='text' value='$addr' onchange='vars_ToCoo( \"addr\", 1 )'></td>
</tr>
<tr style='height:18px'><td colspan='7'>&nbsp;".$_07_sectUde."&nbsp;/&nbsp;".$_07_sectUdm.":</td></tr>";
	if ( $rfidMode!=3 ) echo "
<tr class='cards_title'>
	<td><font $_07_fnt_pits>&#8226;&nbsp;".$_07_pits."</font></td>
	<td colspan='3'><input class='txt' id='pits' style='width:60px' type='text' value='$pits' onkeyup='$pits_proc'></td>
	<td><font $_07_fnt_devsByPit>&#8226;&nbsp;".$_07_devsByPit."</font></td>
	<td colspan='2'><input class='txt' id='devsByPit' style='width:60px' title='2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 32, 34, 36, 38, 40, 42, 44, 48' type='text' value='$devsByPit' onkeyup='$devsByPit_proc'></td>
</tr>";
	echo "
<tr class='cards_title'>";
	if ( $rfidMode!=3 ) echo "
	<td><font $_07_fnt_dataWiresByPit>&#8226;&nbsp;".$_07_dataWiresByPit."</font></td>
	<td colspan='3'><input class='txt' id='dataWiresByPit' style='width:60px' type='text' value='$dataWiresByPit' onkeyup='$dataWiresByPit_proc'></td>";
	echo "
	<td><font $_07_fnt_devsQ>&#8226;&nbsp;".$_07_devsQ."</font></td>
	<td colspan='3'><input class='txt' id='devsQ' style='background:#eeeeee; width:60px' type='text' value='$devsQ' onfocus='devsTotal()'></td>";
	if ( $rfidMode==3 ) echo "
	<td>&nbsp;</td>
	<td colspan='3'>&nbsp;";
	echo "
</tr>";
	if ( $rfidMode==3 ) {
		$cowSheds=0;
		echo "
<tr class='cards_title'>
	<td colspan='7' style='padding:0; padding-left:2px'><table>";
		for ( $i=1; $i<=5; $i++ ) {
			echo "<tr>";
			for ( $j=1; $j<=3; $j++ ) {
				$cowSheds++; $cowShedNum=$cowSheds; if ( $cowShedNum<10 ) $cowShedNum="0".$cowShedNum;
//devsAtCsR - dev(ice)sA(t)C(ow)s(hedNumber)R(ow)
//lstallAtCsR - l(ast)stallAtC(ow)s(hedNumber)R(ow)
				echo "<td style='padding:0; width:30px'><font $_07_fnt_c0>&#8226;&nbsp;".$cowSheds."&nbsp;</font>&nbsp;<input class='txt' id='ws".$cowShedNum."' name='ws".$cowShedNum."' maxlength='1' style='width:10px' title='wires at cowshed:".$cowSheds."' type='text' value='".$cow_shed["$cowShedNum"]["wires"]."' onchange='vars_ToCoo( \"ws".$cowShedNum."\", 1 )' onkeydown='int_keyp( \"ws".$cowShedNum."\", 1, 1, 1 )'>&nbsp;</td><td width='1000px'>";
				for ( $csR=1; $csR<=4; $csR++ ) {
					$k=$cowShedNum*10+$csR; if ( $k<100 ) $k="0".$k;
					echo "&nbsp;<input class='txt' id='dd".$k."' maxlength='1' style='width:10px' title='devs at cowshed:".$cowSheds." wire:".$csR."' type='text' value='".$cow_shed["$k"]["dev_max"]."' onkeydown='int_keyp( \"dd".$k."\", 0, 9, 1 ); vars_ToCoo( \"dd".$k."\", 1 ); devsTotalUdm()'>&nbsp;<input class='txt' id='ls".$k."' maxlength='4' style='width:30px' title='last stall at cowshed:".$cowSheds." wire:".$csR."' type='text' value='".$cow_shed["$k"]["stall_max"]."' onchange='vars_ToCoo( \"ls".$k."\", 1 )' onkeydown='int_keyp( \"ls".$k."\", 0, 9999, 4 )'>&nbsp;&nbsp;";
				}
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table></td>
</tr>";
	}
	echo "
<tr class='cards_title'>
	<td><font $_07_fnt_prtsTyp>&#8226;&nbsp;".$_07_prtsTyp."</font></td>
	<td colspan='3'><select class='sel' id='prtsTyp' style='width:60px' onchange='vars_ToCoo( \"prtsTyp\", 1 )'><option $prtsTyp_sel[COM] value='COM'>COM</option><option $prtsTyp_sel[USBCOM] value='USBCOM'>USBCOM</option><option $prtsTyp_sel[USB] value='USB'>USB</option></select></td>
	<td><font $_07_fnt_prt1>&#8226;&nbsp;".$_07_prt1."</font></td>
	<td colspan='2'><select class='sel' id='prt1' style='width:60px' onchange='vars_ToCoo( \"prt1\", 1 )'>";
	for ( $i=$prt_MIN; $i<=$prt_MAX; $i++ ) echo "<option $prt_sel[$i] value='$i'>$i</option>";
	echo "</select></td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_waitBetwDevs>&#8226;&nbsp;".$_07_waitBetwDevs."</font></td>
	<td colspan='3'><input class='txt' id='waitBetwDevs' style='width:60px' type='text' value='$waitBetwDevs' onchange='vars_ToCoo( \"waitBetwDevs\", 1 )' onkeydown='$waitBetwDevs_proc'></td>
	<td><font $_07_fnt_rfidMode>&#8226;&nbsp;".$_07_rfidMode."</font></td>
	<td colspan='2'><select class='sel' id='rfidMode' style='width:100%' onchange='vars_ToCoo( \"rfidMode\", 1 )'>";
	for ( $i=1; $i<=$rfidModes; $i++ ) echo "<option $rfidModes_sel[$i] value='$i'>".$_07_rfidModes[$i]."</option>";
	echo "</select></td>
</tr>";
	if ( $rfidMode!=3 ) {
		echo "
<tr class='cards_title'>
	<td><font $_07_fnt_drmdsByPit>&#8226;&nbsp;".$_07_drmdsByPit."</font></td>
	<td colspan='3'><select class='sel' id='drmdsByPit' style='width:60px' onchange='vars_ToCoo( \"drmdsByPit\", 1 )'><option $drmdsByPit_sel[1] value='1'>1</option><option $drmdsByPit_sel[2] value='2'>2</option><option $drmdsByPit_sel[4] value='4'>4</option></select></td>
	<td><font $_07_fnt_drmdBdsMode>&#8226;&nbsp;".$_07_drmdBdsMode."</font></td>
	<td colspan='2'><select class='sel' id='drmdBdsMode' style='width:100%' onchange='vars_ToCoo( \"drmdBdsMode\", 1 )'>";
		for ( $i=1; $i<=2; $i++ ) echo "<option $drmdBdsMode_sel[$i] value='$i'>".$_07_drmdBdss[$i]."</option>";
		echo "</select></td>
</tr>";
	}
	if ( $rfidMode==2 ) {
		echo "
<tr class='cards_title'>
	<td><font $_07_fnt_jaggs>&#8226;&nbsp;".$_07_jaggs."</font></td>
	<td colspan='3'><input class='txt' id='jaggs' style='width:60px' type='text' value='$jaggs' onchange='vars_ToCoo( \"jaggs\", 1 )' onfocus='$jaggs_proc' onkeydown='$jaggs_proc'></td>
	<td>&nbsp;</td>
	<td colspan='2'>&nbsp;</td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_jprtsTyp>&#8226;&nbsp;".$_07_jprtsTyp."</font></td>
	<td colspan='3'><select class='sel' id='jprtsTyp' style='width:60px' onchange='vars_ToCoo( \"jprtsTyp\", 1 )'><option $jprtsTyp_sel[COM] value='COM'>COM</option><option $jprtsTyp_sel[USBCOM] value='USBCOM'>USBCOM</option><option $jprtsTyp_sel[USB] value='USB'>USB</option></select></td>
	<td><font $_07_fnt_jprt1>&#8226;&nbsp;".$_07_jprt1."</font></td>
	<td colspan='2'><select class='sel' id='jprt1' style='width:60px' onchange='vars_ToCoo( \"jprt1\", 1 )'>";
		for ( $i=$jprt_MIN; $i<=$jprt_MAX; $i++ ) echo "<option $jprt_sel[$i] value='$i'>$i</option>";
		echo "</select></td>
</tr>
<tr class='cards_title'>
	<td><font $_07_fnt_jcmdTimeout>&#8226;&nbsp;".$_07_jcmdTimeout."</font></td>
	<td colspan='3'><input class='txt' id='jcmdT' maxlength='5' size='5' style='width:60px' type='text' value='$jcmdT' onchange='$jcmdT_proc; vars_ToCoo( \"jcmdT\", 1 )'></td>
	<td><font $_07_fnt_jignoreSimilar>&#8226;&nbsp;".$_07_jignoreSimilar."</font></td>
	<td colspan='2'><input $jignSimilar_checked id='jignSimilar' type='checkbox' onchange='$jignSimilar_proc'></td>
</tr>";
	}
	echo "
<tr style='height:18px'><td colspan='7'>&nbsp;".$_07_sectSched.":</td></tr>
<tr class='cards_title'>
	<td width='29%'><font $_07_fnt_sched>&#8226;&nbsp;".$_07_sched."</font></td>
	<td width='7%'><input class='txt' id='_1b' maxlength='5' style='width:35px' type='text' value='$_1b' onchange='vars_ToCoo( \"_1b\", 1 )' onkeydown='time_keyp( \"_1b\", \"Hi\" )'></td>
	<td width='7%'><input class='txt' id='_2b' maxlength='5' style='width:35px' type='text' value='$_2b' onchange='vars_ToCoo( \"_2b\", 1 )' onkeydown='time_keyp( \"_2b\", \"Hi\" )'></td>
	<td width='7%'><input class='txt' id='_3b' maxlength='5' style='width:35px' type='text' value='$_3b' onchange='vars_ToCoo( \"_3b\", 1 )' onkeydown='time_keyp( \"_3b\", \"Hi\" )'></td>
	<td colspan='3' width='50%'></td>
</tr>
<tr style='height:18px'><td colspan='7'>&nbsp;".$_07_sectExtra.":</td></tr>
<tr class='cards_title'>
	<td><font $_07_fnt_lang>&#8226;&nbsp;".$_07_lang."</font></td>
	<td colspan='3'><select class='sel' id='lang' style='width:100%' onchange='vars_ToCoo( \"lang\", 1 )'>";
	for ( $i=1; $i<=$langs; $i++ ) {
		$lang=$langs_val[$i]; echo "<option $langs_sel[$lang] value='$langs_val[$i]'>".$_07_langs[$i]."</option>";
	}
	echo "</select></td>
	<td colspan='3'></td>
</tr>";

} else {
	$s0_tr="style='height:22px'";
	$s0_text="style='height:100%; width:30px'";
//discard changes & close
	if ( $btn_cancel!="" ) {
		Res_Draw( 2, $PHP_SELF, "", "", $php_mm_tip[0] );

//save changes & close
	} else if ( $btn_ok!="" & $userCoo*1!=9 ) {
		$arr199=Arr_s_Pack( $arr_s110, $arr_s120, $arr_s130, $arr_s199 );
		$arr299=Arr_s_Pack( $arr_s210, $arr_s220, $arr_s230, $arr_s299 );
		$arr399=Arr_s_Pack( $arr_s310, $arr_s320, $arr_s330, $arr_s399 );
		$arr499=Arr_s_Pack( $arr_s410, $arr_s420, $arr_s430, $arr_s499 );
		$arr599=Arr_s_Pack( $arr_s510, $arr_s520, $arr_s530, $arr_s599 );
		$restrict_sched="$s1<$arr199>";
		if ( $s2!=0 & ( $s2!=$s1 ))
			$restrict_sched=$restrict_sched."$s2<$arr299>";
		if ( $s3!=0 & ( $s3!=$s2 & $s3!=$s1 ))
			$restrict_sched=$restrict_sched."$s3<$arr399>";
		if ( $s4!=0 & ( $s4!=$s3 & $s4!=$s2 & $s4!=$s1 ))
			$restrict_sched=$restrict_sched."$s4<$arr499>";
		if ( $s5!=0 & ( $s5!=$s4 & $s5!=$s3 & $s5!=$s2 & $s5!=$s1 ))
			$restrict_sched=$restrict_sched."$s5<$arr599>";
		$insem1st_days0=$_POST[insem1st_days0];
		$not_abort1st_days0=$_POST[abort1st_days0];
		$rectal_days0=$_POST[rectal_days0];
		$insem_days0_fault_rectal=$_POST[insem_days0_fault_rectal];
		$prep_zapusk_days0=$_POST[prep_zapusk_days0];
		$zapusk_days0=$_POST[zapusk_days0];
		$late_zapusk_days0=$_POST[late_zapusk_days0];
		$not_abort_days0=$_POST[not_abort_days0];
		$insem_days0=$_POST[insem_days0];
		$insem_days0_abort=$_POST[insem_days0_abort];
		$new_limits=
		 $insem1st_varname.":".$insem1st_days0.";".//days before 1st insemination (after birthday)
		 $not_abort1st_varname.":".$not_abort1st_days0.";".//days before 1st abort (after birthday)
		 $rectal_varname.":".$rectal_days0.";".//days before rectal (after insemination)
		 $insem_fault_rectal_varname.":".$insem_days0_fault_rectal.";".//days before insemination (after bad rectal)
		 $prep_zapusk_varname.":".$prep_zapusk_days0.";".//days before zapusk preparing (after insemination)
		 $zapusk_varname.":".$zapusk_days0.";".//days before zapusk (after insemination)
		 $late_zapusk_varname.":".$late_zapusk_days0.";".//days before late zapusk (after insemination)
		 $not_abort_varname.":".$not_abort_days0.";".//days before abort (after insemination)
		 $insem_varname.":".$insem_days0.";".//days before insemination (after not abort)
		 $insem_abort_varname.":".$insem_days0_abort;//days before insemination (after abort)
		if ( Is_Checked( auto_prep_zapusk )==1 ) $new_limits=$new_limits.";".$auto_prep_zapusk_varname.":".$restrict_sched;
		if ( Is_Checked( conductiv )==1 ) $new_limits=$new_limits.";conductivity:1";
		$jagg_attrs=0;
		if ( Is_Checked( jattrO )==1 ) $jagg_attrs=$jagg_attrs+2;
		if ( Is_Checked( jattrT )==1 ) $jagg_attrs=$jagg_attrs+4;
		if ( Is_Checked( jattrM )==1 ) $jagg_attrs=$jagg_attrs+8;
		if ( $jagg_attrs>0 ) $new_limits=$new_limits.";jagg_attrs:".$jagg_attrs;
		Sql_query( "UPDATE $limits SET limits='$new_limits'" );
		Res_Draw( 2, $PHP_SELF, "", "", $php_mm_tip[0] );

//init script
	} else {
		$f_limits_php="../f_lim.php";
		include( "../f_limset.php" );
		$z=Arr_s_Unpack( $auto_prep_zapusk_content );
		echo "
<table class='st3'>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_insem1st_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$insem1st_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='4' name='insem1st_days0' $s0_text type='text' value='".$insem1st_days0."' onkeydown='int_keyp( \"insem1st_days0\", 0, 1000, 4 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_not_abort1st_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$not_abort1st_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='4' name='abort1st_days0' $s0_text type='text' value='".$not_abort1st_days0."' onkeydown='int_keyp( \"abort1st_days0\", 0, 1000, 4 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_rectal_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$rectal_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='rectal_days0' $s0_text type='text' value='".$rectal_days0."' onkeydown='int_keyp( \"rectal_days0\", 0, 200, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_insem_days0_fault_rectal."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$insem_days0_fault_rectal</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='insem_days0_fault_rectal' $s0_text type='text' value='".$insem_days0_fault_rectal."' onkeydown='int_keyp( \"insem_days0_fault_rectal\", 0, 999, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_prep_zapusk_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$prep_zapusk_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='prep_zapusk_days0' $s0_text type='text' value='".$prep_zapusk_days0."' onkeydown='int_keyp( \"prep_zapusk_days0\", 0, 500, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_zapusk_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$zapusk_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='zapusk_days0' $s0_text type='text' value='".$zapusk_days0."' onkeydown='int_keyp( \"zapusk_days0\", 0, 500, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_late_zapusk_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$late_zapusk_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='late_zapusk_days0' $s0_text type='text' value='".$late_zapusk_days0."' onkeydown='int_keyp( \"late_zapusk_days0\", 0, 500, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_not_abort_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$not_abort_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='not_abort_days0' $s0_text type='text' value='".$not_abort_days0."' onkeydown='int_keyp( \"not_abort_days0\", 0, 500, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_insem_days0."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$insem_days0</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='insem_days0' $s0_text type='text' value='".$insem_days0."' onkeydown='int_keyp( \"insem_days0\", 0, 999, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_insem_days0_abort."</td>
	<td $rjust width='30px'>";
		if ( $userCoo==9 ) echo "<b>$insem_days0_abort</b>&nbsp;";
		else echo "<input class='txt' maxlength='3' name='insem_days0_abort' $s0_text type='text' value='".$insem_days0_abort."' onkeydown='int_keyp( \"insem_days0_abort\", 0, 500, 3 )'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_auto_prep_zapusk."</td>
	<td $cjust width='30px'>";
		if ( $auto_prep_zapusk==1 ) {
			$auto_prep_zapusk_text="+"; $auto_prep_zapusk_checked="checked";
		} else {
			$auto_prep_zapusk_text="-"; $auto_prep_zapusk_checked="";
		}
		if ( $userCoo>0 & $userCoo!=9 ) echo "<input $auto_prep_zapusk_checked name='auto_prep_zapusk' type='checkbox'>";
		else echo "<b>$auto_prep_zapusk_text</b>";
		echo "</td>";
		for ( $i=0; $i<=4; $i++ )
			CtrlZapusk_Draw( $contentCharset, $rjust, $userCoo, $php_mm, $_06_every_second_day_, $view_class, $edit_class, $rw_sty_0, $i, $z[$i] );
		$ao1c=''; $ao1_='-';
		$at1c=''; $at1_='-';
		$am1c=''; $am1_='-';
		if ( $jagg_attrs>0 ) {
			$bdleds=$jagg_attrs;
			if (( $bdleds & 2 )*1==2 ) { $ao1c='checked'; $ao1_='+'; }
			if (( $bdleds & 4 )*1==4 ) { $at1c='checked'; $at1_='+'; }
			if (( $bdleds & 8 )*1==8 ) { $am1c='checked'; $am1_='+'; }
		}
		echo "
</tr>
<tr class='cards_title' $s0_tr>
	<td><font $_07_fnt_jattrs>&#8226;&nbsp;".$_07_jattrs."</font></td>";
		if ( $userCoo!=9 ) echo "
	<td $cjust colspan='11'><input $at1c id='jattrT' name='jattrT' type='checkbox'>&nbsp;".$_07_jattr_t."&nbsp;<input $ao1c id='jattrO' name='jattrO' type='checkbox'>&nbsp;".$_07_jattr_o."&nbsp;<input $am1c id='jattrM' name='jattrM' type='checkbox'>&nbsp;".$_07_jattr_m."&nbsp;</td>"; else echo "
	<td $cjust colspan='11'>&nbsp;".$_07_jattr_t.":&nbsp;".$at1_."&nbsp;&nbsp;".$_07_jattr_o.":&nbsp;".$at1_."&nbsp;&nbsp;".$_07_jattr_m.":&nbsp;".$am1_."&nbsp;</td>";
		echo "
</tr>
<tr class='cards_title' $s0_tr>
	<td>&#8226;&nbsp;".$_07_conductiv."</td>
	<td $cjust width='30px'>";
		if ( $conductiv_vis==1 ) {
			$conductiv_text="+"; $conductiv_checked="checked";
		} else {
			$conductiv_text="-"; $conductiv_checked="";
		}
		if ( $userCoo==9 ) echo "<b>$conductiv_text</b>";
		else echo "<input $conductiv_checked name='conductiv' type='checkbox'>";
		echo "</td>
	<td colspan='10' width='63%'></td>
</tr>";
	}
}

$btn_ok_name="btn_ok"; if ( $userCoo==1 ) $btn_ok_name="send_js_to_php";
if (( $userCoo!=1 && $btn_cancel=="" && $btn_ok=="" ) || $userCoo==1 ) {
	echo "
</table>
<table cellspacing='0' width='100%'>
<tr>";
	if ( $userCoo*1==9 || $userCoo*1==0 ) echo "
	<td $cjust style='color:#ff0000' width='90%'><b>".$_07_readonly."</b></td>";
	else echo "
	<td width='90%'><input class='btn gradient_0f0 btn_h0' name='".$btn_ok_name."' style='width:100%' type='submit' value='".$php_mm["_com_accept_btn_"]."'></td>";
	echo "
	<td width='10%'><input class='btn gradient_f00 btn_h0' name='btn_cancel' style='width:100%' type='submit' value='X'></td>
</tr>
</table>";
}

echo "
</form>";

ob_end_flush();//unlock output to set cookies!
?>
