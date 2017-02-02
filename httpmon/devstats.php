<?php
/* DF_2: httpmon/devstats.php
devices status
c: 12.09.2007
m: 23.04.2015 */
		$dev_status_ = $dev_status;
		if ( $dev_status == 'v' ) {//get dev version
			$dev_status = $php_m[772];
		} elseif ( $dev_status == 'a' ) {//put RFID
			$dev_status = $php_m[771];
		} elseif ( $dev_status == 'x' ) {//RFID
			$dev_status = $php_m[770];
		} elseif ( $dev_status == 'i' ) {//get cow num
			$dev_status = $php_m[769];
		} elseif ( $dev_status == 'r' ) {//report is ready
			$dev_status = $php_m[768];
		} elseif ( $dev_status == '-' ) {//-
			$dev_status = $php_m[767];
		} elseif ( $dev_status == 'o' ) {//dev' int_dbase overflow
			$dev_status = $php_m[766];
		} elseif ( $dev_status == 'e' ) {//dev' error
			$dev_status = $php_m[765];
		} elseif ( $dev_status == 't' ) {//get report
			$dev_status = $php_m[764];
		} elseif ( $dev_status == 'm' ) {//dev is busy
			$dev_status = $php_m[763];
		} elseif ( $dev_status == 'w' ) {//dev is waiting
			$dev_status = $php_m[762];
		} elseif ( $dev_status == 's' ) {//in washing
			$dev_status = $php_m[761];
		} else {//?
			$dev_status = $php_m[760];
		}
?>
