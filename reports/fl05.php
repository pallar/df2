<?php
/*
DF_2: reports/fl05.php
reports list: tab 05 [GRAPH] reports
created: 20.03.2006
modified: 05.09.2014
*/

$dia="graph=1";//to build diagram set this to "graph=1"

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );

$rtab="05"; $repcl[5]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );

echo "
	<tr>
		<td class='pad' width='50%'></td>
		<td class='pad'>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=1&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0340"] ))."' target='w1'>* ".$ged["RR0340"]."<br></a>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=2&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0341"] ))."' target='w1'>* ".$ged["RR0341"]."<br></a>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=3&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0342"] ))."' target='w1'>* ".$ged["RR0342"]."<br></a>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=4&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0343"] ))."' target='w1'>* ".$ged["RR0343"]."<br></a>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=5&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0344"] ))."' target='w1'>* ".$ged["RR0344"]."<br></a>
		 &nbsp;<a href='f_mlact.php?".$dia."&lact_restrict=6&filt_cowid=-1&title=".htmlentities( urlencode ( $ged["RR0345"] ))."' target='w1'>* ".$ged["RR0345"]."<br></a>
		</td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	</table>
</div>";
?>
