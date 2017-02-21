<?php
/* DF_2: web_cam/index.php
created: 04.06.2008
modified: 11.11.2015 */

include( "../f_vars0.php" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_12._$lang" );

$refr_per=$_GET["refr_per"]*1; if( $refr_per==0 ) $refr_per=10;
for( $i=1; $i<=20; $i++ ) $rad_sel[$i]="onclick='do_click( reload_ );"; $rad_sel[$refr_per]="checked='checked'";
$ipc=$_GET["ipc"]*1; if( $ipc==0 ) $ipc=1;
$ipcam_imagefile=$ipcams[$ipc];
$image_only=$_GET["image_only"]*1;
if( $image_only==1 ) $refresh_func="refreshImg"; else $refresh_func="refreshForm";
?>

<meta content='max-age=5' http-equiv='cache-control'>
</head>

<script language="JavaScript">
var counter=0;
var timer_id=0;

function do_click( el ) {
	el.click();
}

function refreshForm( t ) {
	if( timer_id!=0 ) {
		clearTimeout( timer_id );
		timer_id=0;
	}
	counter++;
	time_ms=t*1000;
	document.getElementById( 'res' ).src="web_img.php?ipcam_imagefile=<?echo $ipcam_imagefile;?>&counter="+escape( counter );
//	document.getElementById( 'refr' ).innerHTML=escape( t );
	var tmp=new Date();
	var d=tmp.getDate(); if( d<10 ) d="0"+d;
	var m=tmp.getMonth()+1; if( m<10 ) m="0"+m;
	var Y=tmp.getFullYear();
	var h=tmp.getHours(); if( h<10 ) h="0"+h;
	var i=tmp.getMinutes(); if( i<10 ) i="0"+i;
	var s=tmp.getSeconds(); if( s<10 ) s="0"+s;
	document.getElementById( 'dmY_his' ).innerHTML=d+"/"+m+"/"+Y+"  "+h+":"+i+":"+s;
	timer_id=setTimeout( "refreshForm( "+escape( t )+" )", time_ms );
}

function refreshImg( t ) {
	if( timer_id!=0 ) {
		clearTimeout( timer_id );
		timer_id=0;
	}
	counter++;
	time_ms=t*1000;
	document.getElementById( 'res' ).src="web_img.php?ipcam_imagefile=<?echo $ipcam_imagefile;?>&counter="+escape( counter );
	timer_id=setTimeout( "refreshImg( "+escape( t )+" )", time_ms );
}
</script>

<?php
mt_srand(( double ) microtime()*1000000 );
$rcolor=mt_rand( 1, 4 );
if( $rcolor==1 ) $tcolor="003e63";
elseif( $rcolor==2 ) $tcolor="941c31";
elseif( $rcolor==3 ) $tcolor="009983";
elseif( $rcolor==4 ) $tcolor="003e63";
echo "
<body bgcolor='#ffc53a' onload='$refresh_func( $refr_per )'>
<form id='_f12'>";
if( $image_only==0 ) {
	echo "
<table border='0' width='100%'>
<tr>
	<td width='180px'><a href='../index.php'><b>".$php_mm["_00_mnemo_btn_cap"]."</b></a></td>
	<td><center><h2 style='color:$tcolor'>$_12_ipcam_head&nbsp;$ipc</h2></center></td>
</tr>
<tr>
	<td valign='top'>
		<table width='100%'>
		<tr>
			<td align='center' bgcolor='$tcolor' height='21px'><b><font color='#ffffff'>$_12_per</font></b></td>
		</tr>
		<tr>
			<td align='center' bgcolor='#ffffe6' valign='top'>
				<table width='50%'>
				<tr>
					<td width='30%'></td>
					<td>
						<br>
						<input name='refr_per' type='radio' value='20' $rad_sel[20]'>20<br>
						<input name='refr_per' type='radio' value='15' $rad_sel[15]'>15<br>
						<input name='refr_per' type='radio' value='10' $rad_sel[10]'>10<br>
						<input name='refr_per' type='radio' value='5' $rad_sel[5]'>5<br>
						<input name='refr_per' type='radio' value='3' $rad_sel[3]'>3<br>
						<input name='refr_per' type='radio' value='1' $rad_sel[1]'>1<br>
						<br>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<br>
		<table width='100%'>
		<tr>
			<td align='center' bgcolor='#ffffe6' height='21px'><font color=$tcolor><b><div id='dmY_his'></div></b></font></td>
		</tr>
		</table>
	</td>
	<td valign='center'>";
}
if( @fopen( $ipcam_imagefile, 'r' )==false ) echo "
		<center><h2>$_12_ipcam_err</h2></center>";
else {
	if( $image_only==0 ) echo "
		<div><img id='res' style='border-style:solid; border-color:$tcolor; border-width:0px; height:580px' src='web_img.php?ipcam_imagefile=$ipcam_imagefile'></div>";
	else echo "
		<a href='../web_cam/index.php?ipc=$ipc' title='".$php_mm["_00_zoom_lnk_tip"]."' target='_top'>
		<div><img id='res' style='border-style:solid; border-color:$tcolor; border-width:0px; width:100%' src='web_img.php?ipcam_imagefile=$ipcam_imagefile'></div>
		</a>";
}
if( $image_only==0 ) {
	echo "
	</td>
</tr>
</table>
<input id='ipc' name='ipc' type='text' style='height:1px; visibility:hidden; width:1px' value='$ipc'>
<input id='reload_' style='height:1px; visibility:hidden; width:1px' type='submit'>";
}
echo "
</form>
</body>";
?>
