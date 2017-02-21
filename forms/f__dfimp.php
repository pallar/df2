<?php
/* DF_2: forms/f__dfimp.php
form: import data files ([D]airy [F]arm data [IMP]ort)
c: 16.05.2006
m: 28.07.2015 */

$passw=$_GET["20095230"]; if ( $passw!="20095230" ) return;

$fcp=$_GET["cp"]; if ( strlen( $fcp )<4 ) $fcp="cp1251";
if ( $fcp=="cp1251" ) {
	$fcp_iconv="CP1251"; $fcp_recode="cp1251";
} elseif ( $fcp=="koi8u" ) {
	$fcp_iconv="KOI8-U"; $fcp_recode="koi8-u";
}

echo "
<h1>JSC Bratslav Dairy_Farm-php (DF-php)</h1>";

include( "../f_myadm.php" );
include( "../f_vars0.php" );

$sself="../".$hFrm["0014"];

//read value from file
function File_ValueReadFrom( $fname, $s, $idx, $v_default ) {
	$idx=$idx*1;
	if ( file_exists( $fname )) {
		$row=file( $fname );
		for ( $x=0; $x<=10; $x++ ) {
			list( $content, $res )=split( '=', trim( $row[$idx+$x] ));
			if ( $content==$s ) return;
			else $res="NO_VALUE";
		}
	} else {
		$res="NO_FILE";
		echo "ERROR! CANT FIND FILE '$fname'.<br>";
	}
	if ( $res=="NO_FILE" || $res=="NO_VALUE" ) $res=$v_default;
	return $res;
}

$test=$_GET["test"]*1;
if ( $test<1 ) {
	$a=$_GET["a"]*1; $z=$_GET["z"]*1; $format_i=$_GET["format_i"];
	$b=2;
	if ( $a>0 & $a<$z ) {
		$a++;
		echo "
<meta content='1;url=".$sself."?20095230=20095230&cp=$fcp&a=$a&z=$z&format_i=$format_i' http-equiv='refresh'>";
	} elseif ( $a==0 ) {
		setcookie( "t_errs", 0, 0, "/" );
		$a++;
		$file___A=File_ValueReadFrom( "../data/import/____df1e.txt", "file___A", 0, 0 );
		$file___Z=File_ValueReadFrom( "../data/import/____df1e.txt", "file___Z", 1, 0 );
		$format_i=File_ValueReadFrom( "../data/import/____df1e.txt", "format__", 2, 0 );
		if ( $a<$file___A ) $a=$file___A;
		echo "
<meta content='1;url=".$sself."?20095230=20095230&cp=$fcp&a=$a&z=$file___Z&format_i=$format_i' http-equiv='refresh'>";
	} else {
		$a=0;
		echo "
<h4>Completed</h4>
<table width='50%' border='1em'>
<tr>
	<td colspan='2'>&nbsp;<b>TOTAL STATS</b>:</td>
</tr>
<tr>
	<td width='50%'>&nbsp;errors:</td><td align='right'><b>$t_errs</b>&nbsp;</td>
</tr>
</table>";
	}
	if ( $a>0 )
		if ( $format_i!="2009.08.01" ) include( "../exp_imp/f_i000.php" );
	else {
		$fname_idx=$a; while ( strlen( $fname_idx )<8 ) $fname_idx="0".$fname_idx;
		$fname=File_ValueReadFrom( "../data/import/____df1e.txt", $fname_idx, $fname_idx, 0 );
		include( "../exp_imp/f_i000.php" );
	}
}
?>
