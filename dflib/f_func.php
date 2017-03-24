<?php
/* DF_2: dflib/f_func.php
common functions
c: 01.02.2006
m: 24.03.2017 */

include( "f_dbnew3.php" );

function Split_( $x, $y ) {
	$x="/".$x."/";
	return preg_split( $x, $y );
}

function DbRelease( $globals, $db ) {
	$res=mysql_query( "SELECT db_rel FROM $globals" ); $row=mysql_fetch_row( $res );
	$db_rel=Split_( ":", trim( $row[0] ));
	$x=strpos( "=".$db_rel[0], "[" );
	if ( $x>0 ) $db_rela=substr( $db_rel[0], $x, 100 ); else $db_rela=$db_rel[0];
	$x=strpos( "=".$db_rel[1], "]" );
	if ( $x>0 ) $db_relb=substr( $db_rel[1], 0, $x-1 ); else $db_relb=$db_rel[1];
	return $db_rela*10000+$db_relb;
}

//return date from db in screen format
function Date_FromDb2Scr( $from_db, $ch ) {
	$from_db_=split( "-", trim( $from_db ));
	$res=$from_db_[2].$ch.$from_db_[1].$ch.$from_db_[0];
	return $res;
}

//return date from screen in db format
function Date_FromScr2Db( $from_scr ) {
	$from_scr_=split( "-", trim( $from_scr ));
	$res=$from_scr_[2]."-".$from_scr_[1]."-".$from_scr_[0];
	return $res;
}

function Str2Int( $s ) {
	return $s*1;
}

function Str2LenL( $s, $len, $fillchar ) {
	while ( strlen( $s )<$len*1 ) $s=$fillchar.$s;
	return $s;
}

function Str2LenR( $s, $len, $fillchar ) {
	while ( strlen( $s )<$len*1 ) $s=$s.$fillchar;
	return $s;
}

function StrCh2Ch( $s, $c_in, $c_out ) {
	$res="";
	for ( $sp=0; $sp<strlen( $s ); $sp++ ) {
		$c=substr( $s, $sp, 1 );
		if ( $c==$c_in ) $c=$c_out;
		$res=$res.$c;
	}
	return $res;
}

function StrCutLen1( $s, $s_len, $contentCharset ) {
	$s=trim( $s ); if ( strlen( $s )==0 ) $res='&nbsp;';
	else {
		$res=mb_substr( $s, 0, $s_len, $contentCharset );
		if ( $res!=$s ) $res=$res."...";
	}
	return $res;
}

function Conv10_75( $var10, $var75len ) {
	$var75="";
	$var10_=$var10*1;
	if ( $var10==0 ) $var75=="0";
	$i=8;
	while ( $var10_>0 ) {
		$floor75=floor( $var10_/129 );
		$mod75=$var10_-$floor75*129;
		$char75=chr( $mod75+48 );
		$var75=$char75.$var75;
		$var10_=$floor75;
		$i--;
	}
	while ( strlen( $var75 )<$var75len ) $var75="0".$var75;
	return $var75;
}

function Conv74_10( $var74 ) {
}

function Is_BitOn( $var, $bit ) {
	return (( $var & bit ) / bit);
}

//mysql_query with error reporting
function Sql_query( $query ) {
	mysql_query( $query );
	$sqlerr=mysql_errno()*1;
	if ( $sqlerr!=0 ) {
		$sqlerr=$sqlerr.": ".mysql_error();
		echo "<h1>MySQL ERROR $sqlerr.</h1>";
		echo "<h3>$query</h3>";
	}
	return $sqlerr;
}

//create query for any table in current database
function T_create( $query, $dbt_, $dbt_struc ) {
	$query=$query." ".$dbt_." ".$dbt_struc;
	mysql_query( $query );
	$sqlerr=mysql_errno();
	if ( $sqlerr!=0 ) {
		$sqlerr=$sqlerr.": ".mysql_error();
		echo "<h3>TABLE '$dbt_': MySQL ERROR $sqlerr.</h3>";
	}
}

//add value to table
function T_addvalue( $uid, $persontable, $table, $varname_column, $varname_value, $varval_column, $varval_value ) {
	$sqlerr=0;
	$res=mysql_query( "SELECT id FROM $persontable WHERE id='$uid'" );
	while ( $row=mysql_fetch_row( $res )) $res1=$row[0];
	mysql_free_result( $res ); $sqlerr=mysql_errno();
	if ( $error!=0 ) {
//$persontable not found
		$error=$error.": ".mysql_error();
		$error1=2;
		return $error1;
	}
	if ( $sqlerr==0 ) { if ( $res1."."=="." ) {
//personnel $uid not found in table $persontable
		$error1=1;
		return $error1;
	}}
	$res=mysql_query( "SELECT $varname_column FROM $table" );
	$sqlerr=mysql_errno();
	if ( $sqlerr!=0 ) {
		if ( $sqlerr==1146 ) {//$table not found
			$error1=3;
		}
		if ( $sqlerr==1054 ) {//column $varname_column is not found in $table
			$error1=4;
		}
		$sqlerr=$sqlerr.": ".mysql_error();
		return $error1;
	}
	$res=mysql_query( "SELECT $varval_column FROM $table" );
	$sqlerr=mysql_errno();
	if ( $sqlerr!=0 ) {
		if ( $sqlerr==1146 ) {//$table not found
			$error1=3;
		}
		if ( $error==1054 ) {//column $varval_column is not found in $table
			$error1=5;
		}
		$sqlerr=$sqlerr.": ".mysql_error();
		return $error1;
	}
	return $error;
}

function Toper_create( $dbt ) {
	global $journ_o_struc;
	mysql_query( "SELECT 0 FROM $dbt" );
	$error=mysql_errno();
	$def_year=1991;
	$def_month=12;
	$s1="0000"; $s2="00";
	$comment="Operations $s1.$s2 *$dbt.MYD*";
	$def_date=$def_year."-".$def_month."-01";
	$def_date2=$def_year."-".$def_month."-02";
	if ( $error!=0 ) T_create( "CREATE TABLE", $dbt, $journ_o_struc );
}

function Tmilk_create( $dbt ) {
	global $journ_m_struc;
	mysql_query( "SELECT 0 FROM $dbt" );
	$error=mysql_errno();
	$def_year=substr( $dbt, 0, 4 );
	$def_month=substr( $dbt, 4, 2 );
	$arr=split( '_', $dbt );
	$s1=substr( $arr[0], 0, 4 ); $s2=substr( $arr[0], 4, 2 );
	$comment="Milking $s1.$s2 *$dbt.MYD*";
	$def_date=$def_year."-".$def_month."-01";
	$def_date2=$def_year."-".$def_month."-02";
	if ( $error!=0 ) T_create( "CREATE TABLE", $dbt, $journ_m_struc );
}

//valid journal date
function Is_YmdValid( $Ymd ) {
	$res=1;
	$$Ymd=trim( $Ymd );
	if ( strlen( $Ymd )==10 ) {
		list( $Y, $m, $d )=split( '[/.-]', $Ymd );
		if ( checkdate( $m, $d, $Y )) {
			if (( $Y>1991 ) and ( $Y<=2037 )) $res=1;
			else {
				if ( $Y<=1991 ) $res="ERROR! YEAR OF DATE '$Ymd' LESS THAN 1992.<br>";
				else $res="ERROR! YEAR OF DATE '$Ymd' MORE THAN 2037.<br>";
			}
		} else $res="ERROR! DATE '$Ymd' IS NOT VALID IN GREGORIAN CALENDAR.<br>";
	} else $res="ERROR! DATE '$Ymd' IS NOT VALID.<br>";
	return $res;
}

//common file string writing
function File_StrTo( $fname, $s, $mode, $mode_msg ) {
	global $php_m;
	if ( file_exists( $fname )) {
	} else {
		$handle=fopen( $fname, $mode ); fclose( $handle );
	}
	if ( is_writable( $fname )) {
		if ( !$handle=fopen( $fname, $mode )) {
			echo "ERROR! CANT OPEN FILE '$fname'.<br>"; exit;
		}
		if ( fwrite( $handle, $s )==false ) {
			echo "ERROR! CANT $mode_msg '$s' TO FILE '$fname'<br>";
		} else {
			fwrite( $handle, chr( 13 )); fwrite( $handle, chr( 10 ));
//echo "$mode_msg '$s' to file '$fname'<br>";
			fclose( $handle );
		}
	} else echo "ERROR! FILE '$fname' IS NOT WRITABLE.<br>";
}

function File_StrWriteTo( $fname, $s ) {
	File_StrTo( $fname, $s, "w", "write" );
}

function File_StrAppendTo( $fname, $s ) {
	File_StrTo( $fname, $s, "a", "append" );
}

//read value from file
function File_ValueReadFrom( $fname, $s, $idx, $v_default ) {
	if ( file_exists( $fname )) {
		$row=file( $fname );
		list( $content, $res )=split( "=", trim( $row[$idx] ));
		if ( $content==$s ) {
		} else $res="NO_VALUE";
	} else {
		$res="NO_FILE";
		echo "ERROR! CANT FIND FILE '$fname'.<br>";
	}
	if ( $res=="NO_FILE" || $res=="NO_VALUE" ) $res=$v_default;
	return $res;
}

function File_ValueWriteTo( $filename, $var, $var_value ) {
	File_StrWriteTo( $filename, "$var=$var_value" );
}

function File_ValueAppendTo( $filename, $var, $var_value ) {
	File_StrAppendTo( $filename, "$var=$var_value" );
}

//sort dates in dates string
function DatesStr_Sort( $dates_str ) {
	$dates_arr=split( ";", $dates_str );
	sort( $dates_arr );
	reset( $dates_arr );
	while ( list( $key, $res )=each( $dates_arr )) {
		$newdates_str="$newdates_str;$res";
	}
	$newdates_str=substr( $newdates_str, 2, strlen( $newdates_str ));
	return $newdates_str;
}

//date in words
function DateDdMmmYyyy( $dmY ) {
	list( $d_, $m_, $Y_ )=split( '[/.-]', $dmY );
	$d_=$d_*1; $m_=$m_*1; $Y_=$Y_*1;
	if ( $m_==1 ) $m_="Jan";
	else if ( $m_==2 ) $m_="Feb";
	else if ( $m_==3 ) $m_="Mar";
	else if ( $m_==4 ) $m_="Apr";
	else if ( $m_==5 ) $m_="May";
	else if ( $m_==6 ) $m_="Jun";
	else if ( $m_==7 ) $m_="Jul";
	else if ( $m_==8 ) $m_="Aug";
	else if ( $m_==9 ) $m_="Sep";
	else if ( $m_==10 ) $m_="Oct";
	else if ( $m_==11 ) $m_="Nov";
	else if ( $m_==12 ) $m_="Dec";
//NEXT ONE DOES NOT WORK WHEN FIRST AND SECOND DATE ARE IN ONE MONTH!
	$res=$d_." ".$m_." ".$Y_." 00:00:00 GMT";
	return $res;
}

function DaysBetween( $dmY1, $dmY2 ) {
	$dmY1=trim( $dmY1 ); $dmY2=trim( $dmY2 );
	$dmY1gmt=DateDdMmmYyyy( $dmY1 ); $dmY2gmt=DateDdMmmYyyy( $dmY2 );
	$date1int=strtotime( $dmY1gmt ); $date2int=strtotime( $dmY2gmt );
	$days=( $date2int-$date1int )/86400;
//echo "DaysBetween() | $dmY1=$dmY1gmt=$dateint1 | $dmY2=$dmY2gmt=$dateint2 | $days |<br>
	return $days;
}

function Var_ToDb( $uid, $vars, $v_type, $v_name, $v_value ) {
	$modif_date=date( "Y-m-d" ); $modif_time=date( "H:i:s", time());
	$query="SELECT var_uid FROM $vars WHERE var_name='$v_name'";
	if ( $uid>0 ) $query=$query." AND var_uid='$uid'";
	$res=mysql_query( $query );
	$row=mysql_fetch_row( $res ); mysql_free_result( $res );
	if ( $row[0]*1>0 ) {
		if ( $uid>0 ) mysql_query( "UPDATE $vars
		 SET var_value='$v_value',
		 var_uid='$uid', modif_uid='$uid',
		 modif_date='$modif_date', modif_time='$modif_time'
		 WHERE var_name='$v_name' AND
		 var_valuetype='$v_type' AND
		 var_uid='$uid'" );
		else mysql_query( "UPDATE $vars
		 SET var_value='$v_value',
		 modif_date='$modif_date', modif_time='$modif_time'
		 WHERE var_name='$v_name' AND
		 var_valuetype='$v_type'" );
	} else {
		mysql_query( "INSERT INTO $vars (
		 `var_value`, `var_valuetype`, `var_name`,
		 `var_uid`, `modif_uid`,
		 `created_date`, `created_time`, `modif_date`, `modif_time` )
		 VALUES (
		 '$v_value', '$v_type', '$v_name',
		 '$uid', '$uid',
		 '$modif_date', '$modif_time', '$modif_date', '$modif_time' )" );
	}
}

function Date_ToDb( $uid, $vars, $v_name, $v_value ) {
//echo "Date_ToDb() | $uid | $vars | $v_name | $v_value |<br>";
	Var_ToDb( $uid, $vars, "date", $v_name, $v_value );
}

function Var_FromDb( $uid, $vars, $v_name, $v_default ) {
//echo "Var_FromDb() | $uid | $vars | $v_name | $v_default |<br>";
	$sqlerr=0;
	$query="SELECT var_name, var_value, var_uid FROM $vars WHERE var_name='$v_name' AND var_uid='$uid'";
	$res=mysql_query( $query ); $sqlerr=mysql_errno();
	if ( $sqlerr!=0 ) {
		$sqlerr=$sqlerr.": ".mysql_error();
		echo "<h3>$query<br>MySQL ERROR $sqlerr.</h3>";
		mysql_free_result( $res );
		$res1=$v_default;
	} else {
		$row=mysql_fetch_row( $res ); $res1=$row[1];
		mysql_free_result( $res );
//echo "Var_FromDb() | $query | $res1 |<br>";
		if ( strlen( $res1 )<strlen( $v_default )) $res1=$v_default;
	}
	return $res1;
}

function Date_FromDb( $uid, $vars, $v_name ) {
	$v_default=date( "Y-m-d" );
//echo "Date_FromDb() | $uid | $vars | $v_name | $v_default |<br>";
	$res1=Var_FromDb( $uid, $vars, $v_name, $v_default );
	$res2=Is_YmdValid( $res1 );
	if ( $res2!=1 ) {
		$res1=$v_default;
		Date_ToDb( $uid, $vars, $v_name, $res1 );
	}
	return $res1;
}

function PeriodBeg_FromDb( $uid, $vars ) {
//echo "PeriodBeg_FromDb() | $uid | $vars |<br>";
	$local_id=CookieGet( "_id" );
	$res1=Date_FromDb( $uid, $vars, $local_id.".rep__.fdate" );
	return $res1;
}

function PeriodEnd_FromDb( $uid, $vars ) {
//echo "PeriodEnd_FromDb() | $uid | $vars |<br>";
	$local_id=CookieGet( "_id" );
	$res1=Date_FromDb( $uid, $vars, $local_id.".rep__.ldate" );
	return $res1;
}

function Period_FromDb( $uid, $vars ) {
//echo "Period_FromDb() | $uid | $vars |<br>";
	$local_id=CookieGet( "_id" );
	$dt1_db=PeriodBeg_FromDb( $uid, $vars ); $dt2_db=PeriodEnd_FromDb( $uid, $vars );
	if ( $dt1_db>$dt2_db ) {
		$dt1_db=$dt2_db;
		Date_ToDb( $uid, $vars, $local_id.".rep__.fdate", $dt2_db );
	}
	CookieSet( "_dt1", "$dt1_db" ); CookieSet( "_dt2", "$dt2_db" );
}

function Int2StrZ( $s, $length ) {
	$res=strval( $s );
	while ( strlen( $res )<$length ) $res="0".$res;
	return $res;
}

function PhraseCarry1( $s, $ch, $len, $charset ) {
	$s=trim( $s ); $s_res="";
	if ( strlen( $s )>$len ) {
		while ( strlen( $s )>0 ) {
			$s1=mb_substr( $s, 0, $len, $charset );
			if ( strlen( $s_res )>0 ) $s_res=$s_res.$ch.$s1; else $s_res=$s1;
			$s=mb_substr( $s, $len, strlen( $s )-$len, $charset );
		}
	} else $s_res=$s;
	$s_arr[0]=$s; $s_arr[1]=$s_res;
	return $s_arr;
}

function PhraseCarry( $s, $ch, $pos ) {
	$arr=split( "[$ch]", $s );
	$s1=""; $s2="";
	for ( $i=0; $i<count( $arr); $i++ ) {
		$s1=$s1.$arr[$i]; $s2=$s1.$ch;
		if ( $i<count( $arr )-1 ) $s1=$s1.$ch;
		if ( $pos==$i+1 ) $s1=$s1."<br>";
	}
	if ( $s==$s2 ) $s1=$s1.$ch;
	return $s1;
}

function CookieSetSs( $cname, $cvalue, $ss ) {
	setcookie( $cname, $cvalue, time()+$ss, "/" );
}

function ArrMenu( $arr_menu ) {
	$s="<font style='color:#666666; font:10pt Tahoma,sans-serif; font-weight:bold; line-height:28px'>";
	for ( $i=0; $i<count( $arr_menu ); $i++ ) {
		if ( $arr_menu[$i]["url"]=="" ) {
			$s=$s.$arr_menu[$i]['name']."<font style='color:#000000; font:10pt Tahoma,sans-serif'>&nbsp;&lt;&#8226;&#8226;&nbsp;</font>";
		} else {
			$s=$s."<a href=".$arr_menu[$i]['url'].">".$arr_menu[$i]['name']."</a><font style='color:#000000; font:10pt sans-serif'>&nbsp;&lt;&#8226;&#8226;&nbsp;</font>";
		}
	}
	$s=$s."</font>";
	echo $s;
}

function MainMenu( $pg_title_, $menu_tab_, $body_tag_ ) {
	global $userCoo, $php_mm, $app_rel, $hDir, $hFrm, $lang, $menuSub, $nav1, $nav2, $nav1_top, $vars;
	$userCoo=$userCoo*1;
	$onload_func="Is_CookiesOn(); App_Login(); App_OnStart();";
	$efc_0=" class='user_login'";
	$efc_0_active=" class='active user_login'";
	$efc_last=" class='last'";
	$efc_all_active=" class='active'";
	$efc_last_active=" class='active last'";
	for ( $i=0; $i<=9; $i++ ) $efc[$i]="";
	$efc[0]=$efc_0;
	$efc[9]=$efc_last;
	if ( $menu_tab_=="login" ) $efc[0]=$efc_0_active;//...__login.php
	else if ( $menu_tab_=="mnemo" ) $efc[1]=$efc_all_active;//...index.php
	else if ( $menu_tab_=="parl" ) $efc[2]=$efc_all_active;//...__parl.php
	else if ( $menu_tab_=="todo" ) $efc[3]=$efc_all_active;//...__todo.php
	else if ( $menu_tab_=="reps" ) $efc[4]=$efc_all_active;//...__reps.php
	else if ( $menu_tab_=="cards" ) $efc[5]=$efc_all_active;//...__cards.php
	else if ( $menu_tab_=="opers" ) $efc[6]=$efc_all_active;//...__ops.php
	else if ( $menu_tab_=="conf" ) $efc[7]=$efc_all_active;//...__conf.php
	else if ( $menu_tab_=="help" ) $efc[8]=$efc_all_active;//../man/
	else if ( $menu_tab_=="period" ) $efc[9]=$efc_last_active;//...__per.php
	if ( strlen( $pg_title_ )>1 ) echo "<title>$app_rel&nbsp;$pg_title_</title>";
	echo "
</head>

<script language='JavaScript' src='../".$hDir["forms"]."f__first.js'></script>
<script language='JavaScript' type='text/javascript'>
function Is_CookiesOn() {
	if ( navigator.cookieEnabled==false ) alert( 'SWITCH ON COOKIES!' );";
	$x="_".$_SERVER["HTTP_USER_AGENT"];
	if ( strpos( $x, "Firefox" )+strpos( $x, "Chrome" )+strpos( $x, "Safari" )==0 ) {
?>
		alert( 'YOU SHOULD USE FIREFOX OR GOOGLE CHROME!' );
<?php
	}
	echo "
}

function do_reload() {
	document.getElementById( 'reload_' ).click();
}
</script>";
	if ( strlen( $body_tag_ )>1 ) echo "

$body_tag_"; else echo "

<body onload='".$onload_func."' onkeypress='App_HotKeys();' oncontextmenu='return false'>";
	include( "f_gldivs.php" );
	if ( $userCoo!=0 ) {
		echo "
<div class='shadow' id='__shadow__' name='__shadow__'></div>
<nav>
<div id='cssmenu'>
<ul>
	<li class='client_rtc'><span id='rtc_div'></span></li>
	<li style='min-width:120px;'><a style='color:#33ffff;' onclick='Login_Show(); return false;'><span id='uname_div'>&nbsp;</span></a></li>
	<li".$efc[1]."><a href='../index.php'><span>".
		$php_mm["_00_mnemo_btn_"]."</span></a></li>
	<li".$efc[2]."><a href='../".$hFrm['0100']."'><span>".
		$php_mm["_00_detrep_btn_"]."</span></a></li>
	<li".$efc[4]."><a href='../".$hFrm['0300']."'><span>".
		$php_mm["_00_reps_btn_"]."</span></a></li>
	<li".$efc[5]."><a href='../".$hFrm['0500']."'><span>".
		$php_mm["_00_cards_btn_"]."</span></a></li>";
		if ( $userCoo>0 ) echo "
	<li".$efc[6]."><a href='../".$hFrm['0600']."'><span>".
		$php_mm["_00_opers_btn_"]."</span></a></li>";
		if ( $userCoo==2 ) echo "
	<li".$efc[7]."><a href='../".$hFrm['9900']."'><span>".
		$php_mm["_00_conf_btn_"]."</span></a></li>";
		else if ( $userCoo>0 ) echo "
	<li".$efc[7]."><a href='../".$hFrm['0700']."'><span>".
		$php_mm["_00_conf_btn_"]."</span></a></li>";
		echo "
	<li".$efc[8]."><a href='../man/?lang=".$lang."' target='w1'><span>".
		$php_mm["_00_man_btn_"]."</span></a></li>
	<li".$efc[9]."><a onclick='Per_FromCoo(); Period_Show(); return false'><span>".
		$php_mm["_00_per_btn_"]."</span></a></li>";
	echo "
</ul>
</div>
</nav>";
	if ( $menuSub>0 ) echo "
$nav1";
	if ( $menuSub>1 ) echo "
$nav2";
	echo "
<script>
var nav=document.getElementsByTagName( 'nav' );";
	if ( $menuSub>0 ) echo "
var nav1=document.getElementsByTagName( 'nav1' );";
	if ( $menuSub>1 ) echo "
var nav2=document.getElementsByTagName( 'nav2' );";
	echo "
do_nav();

function do_nav() {
	var width=window.innerWidth || document.documentElement.clientWidth;
	var height=window.innerHeight;
	window.document.cookie='_width='+width+';path=/';
	window.document.cookie='_height='+height+';path=/';
	if ( width<=800 ) {
		childs=nav[0].children[0].children[0].childElementCount;";
	if ( $menuSub>0 ) echo "
		childs1=nav1[0].children[0].children[0].childElementCount;";
	if ( $menuSub>1 ) echo "
		childs2=nav2[0].children[0].children[0].childElementCount;";
	echo "
		nav[0].onclick=function( event ) {
			event=event || window.event;
			var t=event.target || event.srcElement;
//			if (t!=this) return true;
			for ( var i=0; i<childs; i++ ) nav[0].children[0].children[0].children[i].style.display=nav[0].children[0].children[0].children[i].style.display==='none'?'block':'none';";
	if ( $menuSub>0 ) {
		if ( !empty( $nav1_top )) echo "
			nav1.style.top='".$nav1_top."';";
		echo "
			for ( var i=0; i<childs1; i++ ) nav1[0].children[0].children[0].children[i].style.display=nav1[0].children[0].children[0].children[i].style.display==='none'?'block':'none';";
	} elseif ( $menuSub>1 ) {
		echo "
			for ( var i=0; i<childs2; i++ ) nav2[0].children[0].children[0].children[i].style.display=nav2[0].children[0].children[0].children[i].style.display==='none'?'block':'none';";
	}
	echo "
		}
	}
}

window.onresize=function() {
	do_nav();
	var width=window.innerWidth || document.documentElement.clientWidth;
	childs=nav[0].children[0].children[0].childElementCount;";
	if ( $menuSub>0 ) echo "
	childs1=nav1[0].children[0].children[0].childElementCount;";
	if ( $menuSub>1 ) echo "
	childs2=nav2[0].children[0].children[0].childElementCount;";
	echo "
	if ( width>800 ) menu_li_style='inline-block'; else menu_li_style='none';
	for ( var i=0; i<childs; i++ ) nav[0].children[0].children[0].children[i].style.display=menu_li_style;";
	if ( $menuSub>0 ) echo "
	for ( var i=0; i<childs1; i++ ) nav1[0].children[0].children[0].children[i].style.display=menu_li_style;";
	if ( $menuSub>1 ) echo "
	for ( var i=0; i<childs2; i++ ) nav2[0].children[0].children[0].children[i].style.display=menu_li_style;";
	echo "
}
</script>";
	}
}

function Date_MonthsList( $select_ ) {
	global $php_mm;
	echo $select_;
	for ( $i=1; $i<=12; $i++ ) {
		$mm_idx=100+$i; $p="_mm_".$mm_idx;
		$p=substr( $php_mm[$p], strpos( $php_mm[$p], "," )+1, strlen( $php_mm[$p] ));
		echo "<option value='$i'>$p</option>";
	}
	echo "</select>";
    }

function Date_YearsList( $select_ ) {
	$i=Date( "Y" )*1-10;
	$yl=Date( "Y" )*1+1;
	echo $select_;
	while ( $i<=$yl ) {
		echo "<option value='$i'>$i</option>"; $i++;
	}
	echo "</select>";
}

$now_Ymd=date( "Y-m-d" ); $now_His=date( "H:i:s" );//GLOBAL!!!
$now_dmY=date( "d.m.Y" );

$uuid=$_POST["user"]*1; $uupass=$_POST["pass"];
if ( $uuid>0 ) {
	$res=mysql_query( "SELECT id, passw, comments FROM $person WHERE id=$uuid" );
	$row=mysql_fetch_row( $res ); mysql_free_result( $res );
	$uid=$row[0]*1; $upassw=trim( $row[1] ); $unick=trim( $row[2] );
	if ( $uid==9 | ( $upassw==trim( $uupass ) & $uid==$uuid )) {
		$userCoo=$uid; Period_FromDb( $uid, $vars );//TO SET PERIOD
		CookieSet( "userCoo", $uid );
		CookieSet( "unickCoo", $unick );
		$logindiv__onload_show=0;
	} else {
		$logindiv__onload_show=1;
	}
} else {
	$logindiv__onload_show=0;
}
$_width=CookieGet( "_width" )*1;
$_height=CookieGet( "_height" )*1;
$userCoo=CookieGet( "userCoo" );
$guest_from_wan=( CookieGet( "_intranet" )!="1" ) & $deny_from_wan;
?>
