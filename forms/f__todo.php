<?php
/* DF_2: forms/f__todo.php
form: today diary
c: 12.06.2006
m: 11.11.2015 */

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../dflib/f_librep.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_php._$lang" );
include( "../locales/$lang/f_sel._$lang" );

$hide_menu=$_GET["hide_menu"]*1;
if ( $hide_menu==0 ) MainMenu( $php_mm["_00_todo_btn_tip"], "todo", "" );

$stop_f_jfilt_include=1;//IMPORTANT!

if ( $hide_menu==0 ) echo "
<a href='$rep_url_?hide_menu=1' target='w1'><b>".$php_mm["_com_ver_for_prn_lnk_cap"]."</b></a>";

include( "../".$hDir["reps"]."f_diary.php" );

echo "
<form name='df2__diary' method='post'>
	<input id='reload_' style='height:0; visibility:hidden; width:0' type='submit' value='refresh'>
</form>";
?>
