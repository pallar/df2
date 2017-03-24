<?php
/* DF_2: dflib/f_tfunc.php
cards mode, common functions
c: 18.07.2007
m: 17.07.2015 */

//load checkboxes from db
function Cbs_FromDb( $group_type ) {
	global $db, $vars, $userCoo;
	if ( trim( $group_type."." )<>"." ) {
		$i=0;
		$query="SELECT var_name
		 FROM $vars
		 WHERE var_valuetype='mediumint' AND
		 var_name LIKE '_".$group_type."%' AND
		 var_value*1>0 AND
		 var_uid='$userCoo'";
//WARNING IN NEXT LINE. FIX THIS!
		$res=mysql_query( $query, $db );
		while ( $row=mysql_fetch_row( $res )) {
			$j=strpos( $row[0], $group_type );
			$k=substr( $row[0], $j+strlen( $group_type ), strlen( $row[0] ));
			$a[$i]=$k;
			$i++;
		}
		mysql_free_result( $res );
		return $a;
	}
}

//save checkbox to db
function Cb_ToDb( $group_type, $group_id, $group_state ) {
	global $db, $vars, $userCoo;
	$value_name=$group_type.$group_id;
	$value_=$group_state;
	$modif_date=date( "Y-m-d" ); $modif_time=date( "H:i:s", time());
	$res=mysql_query( "SELECT var_name
	 FROM $vars
	 WHERE var_name='_$value_name' AND
	 var_valuetype='mediumint' AND
	 var_uid='$userCoo'", $db );
	$row=mysql_fetch_row( $res ); mysql_free_result( $res );
	if ( trim( $row[0] )==trim( "_$value_name" )) {
		$res=mysql_query( "UPDATE $vars
		 SET var_value='$value_',
		 var_uid='$userCoo', modif_uid='$userCoo',
		 modif_date='$modif_date', modif_time='$modif_time'
		 WHERE var_name='_$value_name' AND
		 var_valuetype='mediumint' AND
		 var_uid='$userCoo'", $db );
	} else {
		$res=mysql_query( "INSERT INTO $vars (
		 `var_value`, `var_valuetype`, `var_name`,
		 `var_uid`, `modif_uid`,
		 `created_date`, `created_time`, `modif_date`, `modif_time` )
		 VALUES (
		 '$value_', 'mediumint', '_$value_name',
		 '$userCoo', '$userCoo',
		 '$modif_date', '$modif_time', '$modif_date', '$modif_time' )", $db );
	}
}

//save checkboxes to db
function Cbs_ToDb( $groups_db, $group_type, $group_state ) {
	global $db, $userCoo;
	$res=mysql_query( "SELECT id FROM $groups_db", $db );
	while ( $row=mysql_fetch_row( $res )) {
		$group_id=$row[0];
		Cb_ToDb( $group_type, $group_id, $group_state );
	}
	mysql_free_result( $res );
	return $group_state;
}
?>
