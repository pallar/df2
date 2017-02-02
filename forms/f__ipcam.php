<?php
include("../f_vars0.php");

$ipc=$_GET["ipc"]*1; if( $ipc==0 ) $ipc=1;
echo "
<meta content='10;url=f__ipcam.php' http-equiv='refresh'>
<a href='../web_cam/index.php?ipc=$ipc' title='".$php_mm["_00_zoom_lnk_tip"]."' target='_top'>
<img id='res' width='100%' src='../web_cam/web_img.php?ipcam_imagefile=$ipcams[$ipc]'></a>";
?>
