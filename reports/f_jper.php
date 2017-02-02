<?php
/*
DF_2: reports/f_jper.php
report: print period in any report
created: 20.02.2007
modified: 09.08.2013
*/

if ( $dontuse_period==0 ) echo "
	<td $rjust width='50px'><a href='' onclick='Per_FromCoo(); Period_Show(); return false'><u>$beg1</u>&nbsp;..&nbsp;<u>$end1</u>,&nbsp;".$php_mm["_com_rephd2_cap"]."&nbsp;$now_dmY</td>";
else {
	if ( $dontuse_period==1 ) echo "
	<td $rjust width='50px'>".$php_mm["_com_rephd2_cap"]."&nbsp;$now_dmY</td>";
	else echo "
	<td $rjust width='50px'><u>$beg1</u>&nbsp;..&nbsp;<u>$end1</u>,&nbsp;".$php_mm["_com_rephd2_cap"]."&nbsp;$now_dmY</td>";
}
?>
