<?php
/*
DF_2: reports/fl06.php
reports list: tab 06 [EXPORT] reports
created: 20.03.2006
modified: 05.09.2014
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );

$rtab="06"; $repcl[6]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );

echo "
	<tr>
		<td class='pad' width='50%'></td>
		<td class='pad'>
		 &nbsp;<a href='f_e003.php?".$dia."&select_table=".$cows."&select_field=c.id&title=".htmlentities( urlencode ( 'UNIFORM Agri' ))."' target='w1'>* UNIFORM Agri<br></a>
		</td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	</table>
</div>";
?>
