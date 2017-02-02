<?php
/*
DF_2: reports/fl04.php
reports list: tab 04 [HEALTH] reports
created: 20.03.2006
modified: 05.09.2014
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );

$rtab="04"; $repcl[4]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );

echo "
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<a href='../reports/f_o.php?title=".$ged["RR0131"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0131"]."<br></a>
		</td>
		<td class='pad'></td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<a href='../reports/f_o.php?opertype=2&title=".$ged["RR0207"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0207"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=4&title=".$ged["RR0127"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0127"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=24&title=".$ged["RR0201"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0201"]."<br>
		 &nbsp;<a href='../reports/f_o.php?opertype=32&title=".$ged["RR0202.01"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0202.01"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=64&title=".$ged["RR0217"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0217"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=256&title=".$ged["RR0218.01"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0218.01"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=128&title=".$ged["RR0218.02"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0218.02"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=512&title=".$ged["RR0203"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0203"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=1024&title=".$ged["RR0213"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0213"]."<br></a>
		 &nbsp;<a href='../reports/f_o.php?opertype=2048&title=".$ged["RR0214"]."' target='w1'>&nbsp;*&nbsp;".$ged["RR0214"]."<br></a>
		</td>
		<td class='pad'></td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	</table>
</div>";
?>
