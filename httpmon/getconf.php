<?php
/* DF_2: httpmon/getconf.php
c: 16.01.2009
m: 13.01.2017 */

$skip_W3C_DOCTYPE=1;//CRITICAL! DONT TOUCH THIS!
include( "../f_vars0.php" );
include( "common.php" );

//EXTENDED HALT_TIMEOUT
$HaltTimeout=0;
$res=mysql_query( "SELECT halt_timeout_def FROM $globals", $db );
$sqlerr=mysql_errno();
if ( $sqlerr==0 ) {
	$r=mysql_fetch_row( $res );
	if ( $r[0]==0 ) mysql_query( "UPDATE $globals SET halt_timeout_def='1200'" );
	if ( $r[0]!=1200 ) $HaltTimeout=$r[0];
}

//ALLFLEX MODE, BUT NO JAGGS
$NoJagg=0;
$res=mysql_query( "SELECT rfid_mode FROM $globals", $db );
$r=mysql_fetch_row( $res );
if ( $r[0]==2 ) $NoJagg=$r[0];
if ( $NoJagg==2 ) {
	$res=mysql_query( "SELECT
	 port_name
	 FROM $hardwports
	 WHERE port_idx=8", $db );
	while ( $r=mysql_fetch_row( $res )) $NoJagg=0;
}

$res=mysql_query( "SELECT
 cmd_timeout,
 ignore_similar
 FROM $hardwj", $db );
$r=mysql_fetch_row( $res );
$jcmdT=$r[0]*1;
$jignSimilar=$r[1]*1;

$res=mysql_query( "SELECT
 port_name,
 dev_first, dev_last, waitstate_between_devs,
 port_idx
 FROM $hardwports
 WHERE port_name='DO_RECONF' AND waitstate_between_devs='9999'", $db );
$r=mysql_fetch_row( $res );
if ( $r[0]=="DO_RECONF" ) {
//TO HALT RECONFIG IN FUTURE
	mysql_free_result( $res );
	mysql_query( "DELETE FROM $hardwports WHERE port_name='DO_RECONF'", $db );
//TO BEGIN
	echo "#!/bin/bash^";
	echo "^";
//TO ZAP
	echo "rm -f /var/_df2drv/?.ini^";//BE CAREFUL! NOT *.ini!
	echo "rm -f /var/_df2drv/*.sh^";
//
	$i=1; $ports_q=0; $jports_q=0;//.ini file name & ports quantity & jaggs quantity
	$res=mysql_query( "SELECT
	 port_name,
	 dev_first, dev_last, waitstate_between_devs, port_idx
	 FROM $hardwports", $db );
//TO CREATE '?.ini'
	while ( $r=mysql_fetch_row( $res )) {
		$portName=trim( $r[0] );
		$devF=$r[1]*1; if ( $devF<=9 ) $devF="0".$devF;
		$devL=$r[2]*1; if ( $devL<=9 ) $devL="0".$devL;
		$waitBetwDevs=$r[3]*1;
		$rfidMode=$r[4]*1;
		if ( $rfidMode<8 ) $sepmode=""; else $sepmode=" (JAGG)";
		echo "^";
		echo "echo \"# ".$i.".ini".$sepmode."\""." > /var/_df2drv/".$i.".ini^";
		echo "echo \"PortName = ".$r[0]."\""." >> /var/_df2drv/".$i.".ini^";
		echo "echo \"OnLine = ON {bd-05 or ib-01 mode, 'on'/'off'}\""." >> /var/_df2drv/".$i.".ini^";
		echo "echo \"pid = 501\""." >> /var/_df2drv/".$i.".ini^";
		echo "echo \"TSR_MODE = ON\""." >> /var/_df2drv/".$i.".ini^";
		if ( $rfidMode<8 ) {
			$ports_q++;
			echo "echo \"DevQAb = ".$devF." {first device number}\""." >> /var/_df2drv/".$i.".ini^";
			echo "echo \"DevQAe = ".$devL." {last device number}\""." >> /var/_df2drv/".$i.".ini^";
			echo "echo \"BaudRate = 2400 {baud rate, '2400' / '4800' / '9600', default: '2400'}\""." >> /var/_df2drv/".$i.".ini^";
			echo "echo \"Between_Units = ".$waitBetwDevs." {delay in package mode}\""." >> /var/_df2drv/".$i.".ini^";
		} else {
			$jports_q++;
			echo "echo \"BaudRate = 9600 {baud rate, '2400' / '4800' / '9600', default: '2400'}\""." >> /var/_df2drv/".$i.".ini^";
			echo "echo \"CmdTimeout = $jcmdT {}\""." >> /var/_df2drv/".$i.".ini^";
			if ( $jignSimilar==1 ) echo "echo \"IgnoreSimilar = ON {}\""." >> /var/_df2drv/".$i.".ini^";
		}
		if ( $i==1 & $HaltTimeout!=0 ) echo "echo \"HaltTimeout = ".$HaltTimeout."\""." >> /var/_df2drv/".$i.".ini^";
		echo "echo \"\""." >> /var/_df2drv/".$i.".ini^";
		if ( $rfidMode>=2 ) {
			echo "echo \"CentralReader = ON\""." >> /var/_df2drv/".$i.".ini^";
//			if ( $NoJagg!=0 ) echo "echo \"NoJagg = ON\""." >> /var/_df2drv/".$i.".ini^";
			echo "echo \"NoJagg = ON\""." >> /var/_df2drv/".$i.".ini^";
		}
		if ( $rfidMode>=2 ) echo "echo \"TagExcessiveBytes = 15\" >> /var/_df2drv/".$i.".ini^";
		echo "echo \"\""." >> /var/_df2drv/".$i.".ini^";
		if ( $i==1 | $jports_q==1 ) $master_mode="ON"; else $master_mode="OFF";
		echo "echo \"Master = ".$master_mode."\""." >> /var/_df2drv/".$i.".ini^";
		if ( $jports_q>=1 ) echo "echo \"Master_Separator = ".$master_mode."\""." >> /var/_df2drv/".$i.".ini^";
		$i++;
	}
	$p=$i-1;//all ports quantity (parlor + jaggs)
	echo "^";
//TO CREATE 'httpmldr.ini'
	echo "echo \"# httpmldr.ini\""." > /var/_df2drv/httpmldr.ini^";
	echo "echo \"httpmonFirst = 1 {first driver}\""." >> /var/_df2drv/httpmldr.ini^";
	echo "echo \"httpmonLast = ".$p." {last driver}\""." >> /var/_df2drv/httpmldr.ini^";
//TO CREATE '!-httpdrv.sh'
	echo "echo \"#!/bin/bash\""." > /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"echo 'kill' > /_df2drv/killmldr.i\""." >> /var/_df2drv/!-httpdrv.sh^";
//TO CREATE '!-killdf.sh'
	echo "echo \"#!/bin/bash\""." > /var/_df2drv/!-killdf.sh^";
	echo "echo \"\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"echo 'kill' > /_df2drv/killmldr.i\""." >> /var/_df2drv/!-killdf.sh^";
//TO KILL DRIVERS
	for ( $j=1; $j<=$p; $j++ )
		echo "echo \"echo 'kill' > /_df2drv/kill".$j.".i\""." >> /var/_df2drv/!-httpdrv.sh^";
//TO KILL DRIVERS
	for ( $j=1; $j<=$p; $j++ )
		echo "echo \"echo 'kill' > /_df2drv/kill".$j.".i\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"#\""." >> /var/_df2drv/!-httpdrv.sh^";
//TO ZAP
	echo "echo \"sleep 11\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"rm -f /var/lock/LCK..*\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"rm -f /_df2drv/*lock\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"rm -f /_df2drv/upti*\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"rm -f /_df2drv/kill*\""." >> /var/_df2drv/!-httpdrv.sh^";
	echo "echo \"#\""." >> /var/_df2drv/!-httpdrv.sh^";
//TO ZAP
	echo "echo \"sleep 11\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"rm -f /var/lock/LCK..*\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"rm -f /_df2drv/*lock\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"rm -f /_df2drv/upti*\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"rm -f /_df2drv/kill*\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"#\""." >> /var/_df2drv/!-killdf.sh^";
//TO DELETE LOG FILES
//TO DELETE TMP FILES
	echo "echo \"rm -f /root/tmp/*\""." >> /var/_df2drv/!-killdf.sh^";
	echo "echo \"rm -f /home/farm/tmp/*\""." >> /var/_df2drv/!-killdf.sh^";
//TO RESTART DRIVERS
	echo "echo \"sleep 3\""." >> /var/_df2drv/!-httpdrv.sh^";
	for ( $j=1; $j<=$p; $j++ ) {
		if ( $j<=$ports_q )
			echo "echo \"/_df2drv/httpbd06 /_df2drv ".$j."\""." >> /var/_df2drv/!-httpdrv.sh^";
		else
			echo "echo \"/_df2drv/httpsep /_df2drv ".$j."\""." >> /var/_df2drv/!-httpdrv.sh^";
		if ( $j==1 ) $ddd="sleep 3"; else $ddd="sleep 1";
		echo "echo \"$ddd\""." >> /var/_df2drv/!-httpdrv.sh^";
	}
//TO RESTART LOADER
	echo "echo \"/_df2drv/httpmldr 501 0 0 NODEBUG\""." >> /var/_df2drv/!-httpdrv.sh^";
//TO SET PERMISSIONS AND REBOOT
	echo "^";
	echo "chown -R root:root /var/_df2drv^";
	echo "chmod -R 000 /var/_df2drv^";
	echo "sleep 5^";
	echo "reboot^";
} else echo "COMPLETE!";

Dbase_disconnect();
?>
