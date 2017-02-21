<?php
/*
DF_2: dflib/f_filt1a.php
filter: filter for group (draw + read/write)
created: 27.03.2011
modified: 07.08.2013
*/

include( "f_filt1.php" );

echo "
<select class='sel' style='background:#fafafa; margin-left:4px; width:100px' onclick='CookieSet( \"".$_filtsXmode."_filts1\", this.value )'>
	<option value='-1%-1%-1%-1' ";
if ( $filts1==-1 & $filts2==-1 ) echo "selected ";
echo ">".$ged['All_List']."</option>";
$selectors=mysql_query( "SELECT id, nick FROM $groups", $db );
while ( $selector=mysql_fetch_row( $selectors )) {
	echo "
	<option value='".$selector[0]."%-1%-1%-1' ";
	if ( $filts1!=-1 & $filts2==-1 & $filts1==$selector[0] ) echo "selected ";
	echo ">$selector[1]</option>";
}
echo "
	<option value='' disabled>* * * * * * * *</option>";
$selectors=mysql_query( "SELECT id, nick FROM $lots", $db );
while ( $selector=mysql_fetch_row( $selectors )) {
	echo "
	<option value='-1%".$selector[0]."%-1%-1' ";
	if ( $filts2!=-1 & $filts1==-1 & $filts2==$selector[0] ) echo "selected ";
	echo ">$selector[1]</option>";
}
echo "
</select>";
?>
