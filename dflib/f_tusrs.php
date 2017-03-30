<?php
/* DF_2: dflib/f_tusrs.php
report: personnel list
c: 03.05.2006
m: 30.03.2017 */

echo "
<div class='zag1'><b>Personnel List</b></div>";

$pers_find=$_GET[pers_find];
$pers_edit=$_GET[pers_edit];
$pers_del=$_GET[pers_del];
$pers_add=$_GET[pers_add];
$i=0;
$res=mysql_query( "SELECT id FROM $person" );
while ( $row=mysql_fetch_row( $res )) $i=$i+1;
mysql_free_result( $res );

if ( $pers_add==$i ) {
	$num=$i*1;
	$nick=$num;
	$comments="*".$num;
	mysql_query( "INSERT INTO $person
	 ( `num`,
	 `created_date`,
	 `created_time`,
	 `nick`, `comments` )
	 VALUES (
	 '$num',
	 '$now_Ymd',
	 '$now_His',
	 '$nick', '$comments' )" );
	$i++;
}

echo "

<div $ljust>
	&nbsp;&nbsp;
	<a href='".$sself."?pers_find=$i'><u>"."Find"."</u></a>
	<a href='".$sself."?pers_edit=$i'><u>"."Edit"."</u></a>
	<a href='".$sself."?pers_del=$i'><u>"."Delete"."</u></a>
	<a href='".$sself."?pers_add=$i'><u>"."Add"."</u></a>
</div><br>";

echo "

<table cellspacing='1' class='st2'>
<tr class='st_title2' style='height:28px'>
	<td>Number</td>
	<td>Description</td>
	<td>Name, first name, etc.</td>
	<td>Password</td>
	<td>Valid From</td>
	<td>Valid To</td>
</tr>";

$res=mysql_query( "SELECT
 num, nick,
 comments,
 passw, valid_from, valid_to
 FROM $person
 ORDER BY $person.num DESC", $db );
while ($row=mysql_fetch_row( $res )) {
	echo "
<tr ".RepTrCol().">
	<td onclick='' onmouseover='style.cursor=\"pointer\"' title=''><img src='' height='0' width='0'><b><a href='../".$hFrm['0540']."?pers_id=".$row[12]."'>$row[0]&nbsp;</b></td>
	<td onclick='' onmouseover='style.cursor=\"pointer\"' title=''><img src='' height='0' width='0'><b><a href='../".$hFrm['0540']."?pers_id=".$row[12]."'>$row[1]&nbsp;</b></td>
	<td onclick='' onmouseover='style.cursor=\"pointer\"' title=''><img src='' height='0' width='0'><a href='..".$hFrm['0540']."?pers_id=".$row[12]."'>$row[2]&nbsp;</td>
	<td>$row[3]&nbsp;</td>
	<td>$row[4]&nbsp;</td>
	<td>$row[5]&nbsp;</td>
</tr>";
}

mysql_free_result( $res );

echo "
</table>";
?>
