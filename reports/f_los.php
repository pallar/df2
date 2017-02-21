<?php
/*
DF_2: reports/f_los.php
report: oxes
created: 05.05.2005
modified: 23.07.2013
*/

ob_start();//lock output to set cookies properly!

$dontuse_period=1;
$outsele_=-1; $outsele_table=-1; $outsele_field=-1;

$title_=$_GET[title];
if ( strlen( $title_ )<=1 ) $title_="";

include( "f_jfilt.php" );
include( "fhead.php" );

//Dbase_connect(); Dbase_select();

$nocardsfilt=1; $nocardsctrls=1;//dont show cards filter, ctrls
include( "../dflib/f_tos.php" );

ob_end_flush();//unlock output to set cookies properly!
?>
