<?php
/*
DF_2: reports/fl03.php
reports list: tab 03 [COMMON] reports
created: 20.03.2006
modified: 05.09.2014
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_rl._$lang" );

$rtab="03"; $repcl[3]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );
?>
	<tr>
		<td class='pad' valign='top' width='50%'>
		 &nbsp;<b><?php echo $ged['r-th-BY_ANIMALS_STATES'];?></b><br>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2201"] )));?>&sele_byState=A01' target='w1'>* <?php echo $ged["RR2201"];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2202"] )));?>&sele_byState=A02' target='w1'>* <?php echo $ged["RR2202"];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2203"] )));?>&sele_byState=A0' target='w1'>* <?php echo $ged["RR2203"];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2206"] )));?>&sele_byState=A**' target='w1'>* <?php echo $ged["RR2206"];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2207"] )));?>&sele_byState=A0q' target='w1'>* <?php echo $ged["RR2207"];?><br></a>
<!--		 &nbsp;<a href='../reports/f_lcws3.php?title=<?php echo $ged['RR0103.1'];?>&sele_where=64&locate_where=64' target='w1'>* <?php echo $ged['RR0103.1'];?><br></a>-->
		 &nbsp;<a href='../reports/f_los.php?title=<?php echo( htmlentities( urlencode ( $ged["RR2204"] )));?>' target='w1'>* <?php echo $ged["RR2204"];?><br></a>
		</td>
		<td class='pad'>
		 &nbsp;<b><?php echo $ged['r-th-BY_ANIMALS_AGES'];?></b><br>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0116'];?>&sele_byAge=0:6' target='w1'>* <?php echo $ged['RR0116'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0117'];?>&sele_byAge=7:13' target='w1'>* <?php echo $ged['RR0117'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0118'];?>&sele_byAge=14:182' target='w1'>* <?php echo $ged['RR0118'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0119'];?>&sele_byAge=183:364' target='w1'>* <?php echo $ged['RR0119'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0120'];?>&sele_byAge=365:729' target='w1'>* <?php echo $ged['RR0120'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0121'];?>&sele_byAge=730:1459' target='w1'>* <?php echo $ged['RR0121'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0122'];?>&sele_byAge=1460:' target='w1'>* <?php echo $ged['RR0122'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0123'];?>' target='w1'>* <?php echo $ged['RR0123'];?><br></a>
		</td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<b><?php echo $ged['r-th-ALL_ANIMALS'];?></b><br>
		 &nbsp;<a href='../reports/f_lcws1.php?title=<?php echo $ged['RR0127'];?>' target='w1'>* <?php echo $ged['RR0127'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws.php?title=<?php echo $ged['RR0132'];?>' target='w1'>* <?php echo $ged['RR0132'];?><br></a>
		 &nbsp;<a href='../reports/f_lcws9.php?title=<?php echo $ged['RR0139'];?>' target='w1'>* <?php echo $ged['RR0139'];?><br></a>
		 &nbsp;<a href='../reports/f_ltgs.php?title=<?php echo $ged['RR0140'];?>' target='w1'>* <?php echo $ged['RR0140'];?><br></a>
		</td>
		<td class='pad'></td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
		<td class='pad' width='50%'>
		 &nbsp;<a href='../reports/f_debug.php?title=<?php echo "DEBUG";?>' target='w1'>* <?php echo "DEBUG";?><br></a>
		</td>
		<td class='pad'></td>
	</table>
</div>
