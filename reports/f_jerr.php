<?php
/*
CFS_2: reports/f_jerr.php
report: error for any report
created: 13.03.2007
modified: 14.05.2007
*/

if ( $error<>0 ) {
	$error=$error.": ".mysql_error();
	echo "$query<br>";
	echo "$dbt : $error<br>";
}
?>
