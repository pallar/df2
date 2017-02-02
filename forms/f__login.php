<?php
/*
DF_2: forms/f__login.php
form: login ([LOGIN])
created: 15.05.2006
modified: 09.08.2013
*/

$skip_W3C_DOCTYPE=1;

include( "../f_vars.php" );
include( "../locales/$lang/f_prep._$lang" );
include( "../locales/$lang/f_sel._$lang" );
include( "../dflib/f_func.php" );

require_once "../dflib/ajax/jshttprq.php";
$JsHttpRequest=& new JsHttpRequest( $content_charset );
$event=$_REQUEST['event'];

ob_start();//lock output to set cookies properly!

switch ( $event ) {
	case '':
		$buttn=$_REQUEST['buttn']*1;
		if ( $buttn==1 ) {
			ob_end_flush();//unlock output to set cookies properly!
			echo "
<center><br>
<table width='90%'>
<tr>
	<td>
		<table cellspacing='1' width='100%'>
		<tr>
			<td style='color:#666666; width:35%'>&nbsp;".$php_mm["_09_user_cap"]."&nbsp;</td>
			<td>
				<select class='sel sel_h0' id='user' name='user' size='1'>";
			$res=mysql_query( "SELECT id, nick, comments FROM $person ORDER BY id DESC", $db ) or die( mysql_error());
			while ( $row=mysql_fetch_row( $res )) {
				$id=$row[0];
				$nick=$row[1];
				$comments=$row[2];
				echo "
				<option value='$row[0]'>$comments&nbsp;</option>";
			}
			mysql_free_result( $res );
			echo "
				</select>
			</td>
		</tr>
		<tr height='3px'><td></td></tr>
		<tr>
			<td style='color:#666666; width:35%'>&nbsp;".$php_mm["_09_passw_cap"]."&nbsp;</td>
			<td>
				<input class='txt txt_h0' id='pass' maxlength='100' name='pass' type='password' onkeydown='ok_keyp( \"pass\", \"login_button\" )'>
			</td>
		</tr>
		</table>
</tr>
	</td>
</tr>
</table><br>
<input class='btn gradient_0f0 btn_h0' id='login_button' style='width:151px' type='button' value='".$php_mm["_com_reg_btn_cap"]."' onclick='Login_OnOk()'>
<input class='btn gradient_f00 btn_h0' id='cancel_button' style='width:39px' type='button' value='"."X"."' onclick='Login_OnCancel()'><br>
</center>";
			$row=ob_get_contents();
		} else {
			$row="!!!";
		}
		$_RESULT=array( "text"=>$row );
		break;
	case 'login_checkpassw':
		$uuid=$_REQUEST['user']*1; $uupass=trim( $_REQUEST['passwd'] );
		$res=mysql_query( "SELECT id, passw, comments FROM $person WHERE id=$uuid", $db );
		$row=mysql_fetch_row( $res ); mysql_free_result( $res );
		$uid=$row[0]*1; $upassw=trim( $row[1] ); $unick=trim( $row[2] );
		if ( $uid==9 | ( $upassw==$uupass & $uid==$uuid*1 )) {
			$uunick=$unick; $userCoo=$uid; Period_FromDb( $userCoo );//TO SET PERIOD
			$_RESULT=array( "user"=>$uuid, "usernick"=>$uunick );
		}
		if ( $uuid==9 ) {
			if ( $upassw==$uupass ) CookieSet( "_intranet", "1" );
			else CookieSet( "_intranet", "0" );
		}
		break;
	case 'login_cancel':
		$uunick=$unickCoo; $uuid=$userCoo;
		$_RESULT=array( "user"=>$uuid, "usernick"=>$uunick);
		break;
	}
?>
