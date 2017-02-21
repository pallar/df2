<?php
/*
DF_2: reports/fl01.php
reports list: tab 01 [MILK] reports
created: 20.03.2006
modified: 05.09.2014
*/

ob_start();//lock output to set cookies properly!

include( "../f_vars.php" );
include( "../dflib/f_func.php" );
include( "../locales/$lang/f_sel._$lang" );
include( "../locales/$lang/f_rl._$lang" );

$rtab="01"; $repcl[1]="rC"; include( "frtab.php" );

ob_end_flush();//unlock output to set cookies properly!

$reps_rep=CookieGet( $userCoo."_reps-rep" );

echo "
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<a href='../reports/f_mcws.php?title=".htmlentities( urlencode ( $ged["RR0301"] ))."&select_table=".$cows."&select_field=c.id' target='w1'>* ".$ged["RR0301"]."<br></a>
		 &nbsp;<a href='../reports/f_mcws1.php?title=".htmlentities( urlencode ( $ged["RR0301.02"] ))."' target='w1'>* ".$ged["RR0301.02"]."<br></a>
		 &nbsp;<a href='../reports/f_mcws2.php?title=".htmlentities( urlencode ( $ged["RR0301.02"] ))." [".$ged["r-td-conductivity"]."]' target='w1'>* ".$ged["RR0301.02"]." [".$ged["r-td-conductivity"]."]<br></a>
		 &nbsp;<a href='../reports/f_mcws3.php?filt_percent=0&title=".htmlentities( urlencode ( $ged["RR0301.03"] ))."' target='w1'>* ".$ged["RR0301.03"]."<br></a>
		 &nbsp;<a href='../reports/f_mcws3.php?filt_percent=1&min_percent=-10&title=".htmlentities( urlencode ( $ged["RR0301.04"] ))."' target='w1'>* ".$ged["RR0301.04"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0306"] ))."&select_table=".$breeds."&select_field=c.breed_id' target='w1'>* ".$ged["RR0306"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0307"] ))."&select_table=".$lots."&select_field=d.lot_id' target='w1'>* ".$ged["RR0307"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0308"] ))."&select_table=".$groups."&select_field=d.gr_id' target='w1'>* ".$ged["RR0308"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0309"] ))."&select_table=".$subgrs."&select_field=d.subgr_id' target='w1'>* ".$ged["RR0309"]."<br></a>
		 &nbsp;<a href='../reports/f_m.php?title=".htmlentities( urlencode ( $ged["RR0310"] ))."' target='w1'>* ".$ged["RR0310"]."<br></a>
		</td>
		<td class='pad'>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0340"] ))."&lact_restrict=1&filt_cowid=-1' target='w1'>* ".$ged["RR0340"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0341"] ))."&lact_restrict=2&filt_cowid=-1' target='w1'>* ".$ged["RR0341"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0342"] ))."&lact_restrict=3&filt_cowid=-1' target='w1'>* ".$ged["RR0342"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0343"] ))."&lact_restrict=4&filt_cowid=-1' target='w1'>* ".$ged["RR0343"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0344"] ))."&lact_restrict=5&filt_cowid=-1' target='w1'>* ".$ged["RR0344"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0345"] ))."&lact_restrict=6&filt_cowid=-1' target='w1'>* ".$ged["RR0345"]."<br></a>
		 &nbsp;<a href='f_mlact.php?title=".htmlentities( urlencode ( $ged["RR0346"] ))."&lact_restrict=7&filt_cowid=-1' target='w1'>* ".$ged["RR0346"]."<br></a>
		</td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	<tr>
		<td class='pad' width='50%'>
		 &nbsp;<b>".$ged['RR0349']."</b><br>
		 &nbsp;<a href='../reports/f_mcws.php?title=".htmlentities( urlencode ( $ged["RR0350"] ))."&select_table=".$cows."&select_field=c.id&filt_dev=00-00' target='w1'>* ".$ged["RR0350"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0351"] ))."&select_table=".$breeds."&select_field=c.breed_id&filt_dev=00-00' target='w1'>* ".$ged["RR0351"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0352"] ))."&select_table=".$lots."&select_field=d.lot_id&filt_dev=00-00' target='w1'>* ".$ged["RR0352"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0353"] ))."&select_table=".$groups."&select_field=d.gr_id&filt_dev=00-00' target='w1'>* ".$ged["RR0353"]."<br></a>
		 &nbsp;<a href='../reports/f_mcw_gs.php?title=".htmlentities( urlencode ( $ged["RR0354"] ))."&select_table=".$subgrs."&select_field=d.subgr_id&filt_dev=00-00' target='w1'>* ".$ged["RR0354"]."<br></a>
		 &nbsp;<a href='../reports/f_m.php?title=".htmlentities( urlencode ( $ged["RR0355"] ))."&filt_dev=00-00' target='w1'>* ".$ged["RR0355"]."<br></a>
		</td>
		<td class='pad' valign='top'></td>
	</tr>
	<tr>
		<td class='v3' colspan='2' height='1px'><div class='dot'></div></td>
	</tr>
	</table>
</div>";
?>
