<?php
/* DF_2: forms/f__mnem1.php
c: 11.07.2007
m: 14.11.2015 */

echo "

<form name='df2__mnem1'>
<div class='section group'>
	<div class='col span_180px'>
		<input class='btn gradient_0f0' name='devs_prev' style='height:30px; width:180px' type='submit' value='$dev_b..$dev_e' onclick='CookieSet( \"devs_prev\", \"1\" )'><br>";
if( $userCoo==2 ) echo "
		<input class='btn gradient_f00' name='normalize' style='height:30px; width:180px' type='submit' value='$_00_Normalize' onclick='CookieSet( \"normalize\", \"1\" )'><br><br>";
else echo "<br>";
if( $ipcams[0]==0 ) echo "
		<img border='0' src='dfimg/img/menu/cow01.gif' width='180px'>";
else for( $ipc=1; $ipc<=$ipcams[0]; $ipc++ ) echo "
		<iframe frameborder='0' scrolling='no' src='../web_cam/index.php?ipc=$ipc&image_only=1' style='height:135px; margin-left:-5px; margin-right:-5px; width:180px'></iframe>";
echo "
	</div>
	<div class='col span_180px_right'>
		<iframe class='mnem_frame' frameborder='0' scrolling='no' src='f__1st1.php' width='100%'></iframe>
	</div>
</div>
</form>";
?>
