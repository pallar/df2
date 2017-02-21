<?php
/*
DF_2: reports/f_mcws.php
report: dairy by cows
created: 25.12.2005
modified: 09.12.2010
*/

ob_start();//lock output to set cookies properly!

$outsele_=-1;
$outsele_table="f_cows";
$outsele_field="c.cow_id";
$outsele_table=$_GET[select_table];
$outsele_field=$_GET[select_field];

include( "f_mt.php" );
?>
