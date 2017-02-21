<?php
/*
DF_2: reports/fl02.php
reports list: tab 02 reports
created: 20.03.2006
modified: 05.09.2014
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_rl._$lang" );

$rtab="02"; $repcl[2]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );

echo "
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<a href='../reports/f_ofore.php?title=".htmlentities( urlencode ( $ged['r-td-Fore'] ))."' target='w1'>* ".$ged['r-td-Fore']."<br></a>
		 &nbsp;<a href='../reports/f_oratio.php?title=".htmlentities( urlencode ( $ged['r-td-Insem_Analysis'] ))."' target='w1'>* ".$ged['r-td-Insem_Analysis']."<br></a>
		 &nbsp;<a href='../reports/f_ofore1.php?title=".htmlentities( urlencode ( $ged['r-td-Insem_Plan'] ))."' target='w1'>* ".$ged['r-td-Insem_Plan']."<br></a>
		 &nbsp;<a href='../reports/f_ofore2.php?dontuse_period=1&title=".htmlentities( urlencode ( $ged['r-td-Prep_Zapusk_Plan'] ))."' target='w1'>* ".$ged['r-td-Prep_Zapusk_Plan']."<br></a>
		 &nbsp;<a href='../reports/f_ofore2.php?dontuse_period=4&title=".htmlentities( urlencode ( $ged['r-td-Zapusk_Plan'] ))."' target='w1'>* ".$ged['r-td-Zapusk_Plan']."<br></a>
		 &nbsp;<a href='../reports/f_ofore2.php?title=".htmlentities( urlencode ( $ged['r-td-Zapusk_Plan_From_To'] ))."' target='w1'>* ".$ged['r-td-Zapusk_Plan_From_To']."<br></a>
		 &nbsp;<a href='../reports/f_ofore3.php?dontuse_period=4&title=".htmlentities( urlencode ( $ged['r-td-Abort_Plan'] ))."' target='w1'>* ".$ged['r-td-Abort_Plan']."<br></a>
		 &nbsp;<a href='../reports/f_ofore3.php?title=".htmlentities( urlencode ( $ged['r-td-Abort_Plan_From_To'] ))."' target='w1'>* ".$ged['r-td-Abort_Plan_From_To']."<br></a>
		 &nbsp;<a href='../reports/f_ofore4.php?title=".htmlentities( urlencode ( $ged['r-td-Plan_20110516'] ))."' target='w1'>* ".$ged['r-td-Plan_20110516']."<br></a>
		</td>
		<td class='pad'></td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	</table>
</div>";
?>
