<?php
/* DF_2: dflib/f_perset.php
put period to database
c: 01.02.2006
m: 01.04.2015 */

$uid=CookieGet( "userCoo" );
$dt1=CookieGet( "_dt1" ); $dt1_old=PeriodBeg_FromDb();
$dt2=CookieGet( "_dt2" ); $dt2_old=PeriodEnd_FromDb();
$dt1=substr( $dt1, 0, 4 )."-".substr( $dt1, 5, 2 )."-".substr( $dt1, 8, 2 );
$dt2=substr( $dt2, 0, 4 )."-".substr( $dt2, 5, 2 )."-".substr( $dt2, 8, 2 );
if ( $dt1!=$dt1_old | $dt2!=$dt2_old ) {
	$local_id=CookieGet( "_id" );
	Date_ToDb( $local_id.".rep__.fdate", $dt1, $userCoo );
	Date_ToDb( $local_id.".rep__.ldate", $dt2, $userCoo );
}

$PerOnStart_Func="";
?>
