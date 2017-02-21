<?php
/* DF_2: dflib/f_perget.php
get period, language etc. from database
c: 30.03.2007
m: 01.04.2015 */

ob_start();//lock output to set cookies properly!

$userCoo=9;//IMPORTANT!
Period_FromDb();
$PerOnStart_Func="; Per_FromCoo()";

ob_end_flush();//unlock output to set cookies properly!
?>
