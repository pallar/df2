<?php
/* DF_2: reports/f__jfilt.php
report: set input filter for any report
c: 24.10.2007
m: 02.06.2014 */

$j=1;
for ( $i=1; $i<16; $i++ ) {
	$_onclick[$i] =" onclick='do_setmilkfiltcoo( $j )'";
	$j=$j*2;
}

$boolean[0]="checked class='z_chk' type='checkbox'";
$boolean[1]="class='z_chk' type='checkbox'";

$_10=$boolean[$_10_restrict].$_onclick[1];
$_11=$boolean[$_11_restrict].$_onclick[2];
$_20=$boolean[$_20_restrict].$_onclick[3];
$_21=$boolean[$_21_restrict].$_onclick[4];
$_30=$boolean[$_30_restrict].$_onclick[5];
$_31=$boolean[$_31_restrict].$_onclick[6];

$_knowntag=$boolean[$_knowntag_restrict].$_onclick[7];
$_unknowntag=$boolean[$_unknowntag_restrict].$_onclick[8];
$_notag=$boolean[$_notag_restrict].$_onclick[9];

$_mast=$boolean[$_mast_restrict].$_onclick[10];
$_nomast=$boolean[$_nomast_restrict].$_onclick[11];
$_trau=$boolean[$_trau_restrict].$_onclick[12];
$_notrau=$boolean[$_notrau_restrict].$_onclick[13];
$_ovul=$boolean[$_ovul_restrict].$_onclick[14];
$_noovul=$boolean[$_noovul_restrict].$_onclick[15];

echo "
<table width='100%'>
<tr style='height:25px'>
	<td>&nbsp;".$php_mm["_11_"];
if ( $btnToPrn ) echo "<input class='btn gradient_0f0' id='refresh' style='width:121px' type='submit' value='".$php_mm["_com_accept_btn_"]."' onclick='do_reload()'>";
echo "</td>
</tr>
<tr>";
if ( $f__jfilt__mode==0 ) echo "
	<td>";
else echo "
	<td colspan='2'>";
echo "
		<table width='100%'>
		<tr style='height:25px'>
			<td colspan='3'><font color='#009955'>&nbsp;".$php_mm["_11_gr1_"]."</font></td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_10 id='_10'>&nbsp;".$php_mm["_com_s10_"]."</td>
			<td><input $_11 id='_11'>&nbsp;".$php_mm["_com_s11_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_20 id='_20'>&nbsp;".$php_mm["_com_s20_"]."</td>
			<td><input $_21 id='_21'>&nbsp;".$php_mm["_com_s21_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_30 id='_30'>&nbsp;".$php_mm["_com_s30_"]."</td>
			<td><input $_31 id='_31'>&nbsp;".$php_mm["_com_s31_"]."</td>
		</tr>
		</table>";
if ( $f__jfilt__mode==0 ) echo "
	</td>
	<td width='5px'></td>
	<td>";
echo "
		<table width='100%'>
		<tr style='height:25px'>
			<td colspan='2'><font color='#009955'>&nbsp;".$php_mm["_11_gr2_"]."</font></td>
		</tr>
		<tr style='height:25px'>
			<td width='100%'><input $_knowntag id='_knowntag'>&nbsp;".$php_mm["_com_known_tag_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='100%'><input $_unknowntag id='_unknowntag'>&nbsp;".$php_mm["_com_unknown_tag_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='100%'><input $_notag id='_notag'>&nbsp;".$php_mm["_com_wo_tag_"]."</td>
		</tr>
		</table>";
if ( $f__jfilt__mode==0 ) echo "
	</td>
	<td width='5px'></td>
	<td>";
echo "
		<table width='100%'>
		<tr style='height:25px'>
			<td colspan='2'><font color='#009955'>&nbsp;".$php_mm["_11_gr3_"]."</font></td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_mast id='_mast'>&nbsp;".$php_mm["_com_with_mastitus_"]."</td>
			<td><input $_nomast id='_nomast'>&nbsp;".$php_mm["_com_wo_mastitus_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_trau id='_trau'>&nbsp;".$php_mm["_com_with_trauma_"]."</td>
			<td><input $_notrau id='_notrau'>&nbsp;".$php_mm["_com_wo_trauma_"]."</td>
		</tr>
		<tr style='height:25px'>
			<td width='50%'><input $_ovul id='_ovul'>&nbsp;".$php_mm["_com_wanted_ox_"]."</td>
			<td><input $_noovul id='_noovul'>&nbsp;".$php_mm["_com_not_wanted_ox_"]."</td>
		</tr>
		</table>";
if ( $f__jfilt__mode==0 ) echo "
	</td>
	<td width='5px'></td>
	<td>";
else echo "
	</td>
</tr>
<tr>
	<td width='50%'>";
echo "
		<table width='100%'>
		<tr style='height:25px'>
			<td colspan='2'><font color='#009955'>&nbsp;".$php_mm["_11_gr4_"]."</font></td>
		</tr>
		<tr style='height:25px'>
			<td colspan='2'>";
$_filtsXmode="r";
include( "../dflib/f_filt1a.php" );
echo "
			</td>
		</tr>";
if ( $f__jfilt__mode!=0 ) echo "
		</table>
	</td>
	<td>
		<table width='100%'>";
echo "
		<tr style='height:25px'>
			<td colspan='2'><font color='#009955'>&nbsp;".$php_mm["_11_gr5_"]."</font></td>
		</tr>
		<tr style='height:25px'>
			<td colspan='2'>
				<input class='txt' id='_bd_first' maxlength='2' style='background:#fafafa; margin-left:4px; width:30px' type='text' value='$bd_first' onkeyup='do_setmilkfiltXcoo( \"_filts_devf\", this.value )'>
				<input class='txt' id='_bd_last' maxlength='2' style='background:#fafafa; margin-left:4px; width:30px' type='text' value='$bd_last' onkeyup='do_setmilkfiltXcoo( \"_filts_devl\", this.value )'>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>";
?>

<script language='JavaScript'>
function do_setmilkfiltcoo( ii ) {
	var c=window.document.cookie.split( ";" ); var clen=c.length;
	var ex=0; var i=0; var rep_filt=0;
	while ( i<clen ) {
		var s=c[i].split( "=" );
		if ( Trim( s[0] )=="rep-filt" ) {
			var rep_filt=Number( s[1] );
			var ex=1;
		}
		i++;
	}
	if (( rep_filt&ii )*1==ii ) ii=-ii;
	var rep_filt=rep_filt+ii;
	window.document.cookie="rep-filt="+rep_filt+";path=/";
}

function do_setmilkfiltXcoo( cname, cvalue ) {
	if ( cvalue.length<2 ) cvalue="0"+cvalue;
	window.document.cookie=cname+"="+cvalue+";path=/";
}
</script>
