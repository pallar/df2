<?php
/*
DF_2: reports/frtab.php
created: 20.03.2006
modified: 09.08.2013
*/

for ( $i=1; $i<=9; $i++ ) if ( $repcl[$i]!='rC' ) $repcl[$i]='rCG';

echo "

<body style='padding:0px; margin-left:0px'>
	<div style='overflow:hidden; width:470px'>
		<table width='470px'>
		<tr>
			<td>
				<div class='b_h'>
					<a href='../".$hDir['reps']."fl06.php' title='".$php_mm["_03_tab6_cap"]."' target='w3' class='$repcl[6]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab6_cap"]."&nbsp;&nbsp;</a>
					<a href='../".$hDir['reps']."fl05.php' title='".$php_mm["_03_tab5_cap"]."' target='w3' class='$repcl[5]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab5_cap"]."&nbsp;&nbsp;</a>
					<a href='../".$hDir['reps']."fl04.php' title='".$php_mm["_03_tab4_cap"]."' target='w3' class='$repcl[4]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab4_cap"]."&nbsp;&nbsp;</a>
					<a href='../".$hDir['reps']."fl03.php' title='".$php_mm["_03_tab3_cap"]."' target='w3' class='$repcl[3]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab3_cap"]."&nbsp;&nbsp;</a>
					<a href='../".$hDir['reps']."fl02.php' title='".$php_mm["_03_tab2_cap"]."' target='w3' class='$repcl[2]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab2_cap"]."&nbsp;&nbsp;</a>
					<a href='../".$hDir['reps']."fl01.php' title='".$php_mm["_03_tab1_cap"]."' target='w3' class='$repcl[1]' style='height:19px; line-height:19px'>&nbsp;&nbsp;".$php_mm["_03_tab1_cap"]."&nbsp;&nbsp;</a>
				</div>
			</td>
		</tr>
		</table>
	</div>
</body>";

if ( $reps_tab!=$rtab ) {
	CookieSet( $userCoo."_reps-tab", $rtab );
	CookieSet( $userCoo."_reps-rep", "" );
}

echo "

<div style='height:390px; overflow-x:hidden; overflow-y:scroll'>
	<table width='470px'>";
?>
