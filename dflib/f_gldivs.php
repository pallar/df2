<?php
/* DF_2: dflib/f_gldivs.php
global dividers (user, period etc.)
c: 13.06.2007
m: 29.03.2017 */

echo "
<script language='JavaScript' src='../dflib/f_date.js'></script>
<script language='JavaScript' src='../dflib/f_per.js'></script>
<script language='JavaScript' src='../dflib/f_input.js'></script>
<script language='JavaScript' src='../dflib/ajax/jshttprq.js'></script>
<script language='JavaScript' type='text/javascript'>
function ok_keyp( i_, ok_ ) {
	var el=$$( String( i_ ));
	if ( null!=typeof( el )) {
		el.onkeypress=function( e ) {
			var keyCode=( window.event ) ?window.event.keyCode:e.which;
			if ( keyCode=='13' ) $$( String( ok_ )).click();//enter pressed
			return true;
		}
	}
}

function Login_Show() {
	Period_Close();
	JsHttpRequest.query( '../".$hFrm['0011']."',
		{ buttn:'1' },
		function( responseJS, responseText ) {
			el=$$( '__shadow__' );
			el.style.visibility='visible';
			el.style.display='block';
			el=$$( 'login_div' );
			el.innerHTML=responseJS.text;
			el.style.left='-5px';
			el.style.top='35px';
			el.style.visibility='visible';
			el.style.display='block';
		},
		false );
}

function Login_OnOk() {
	var user=$$( 'user' ).value;
	var passwd=$$( 'pass' ).value;
	JsHttpRequest.query( '../".$hFrm['0011']."',
		{ event:'login_checkpassw', user:user, passwd:passwd },
		function( responseJS, responseText ) {
			if ( responseJS==null | responseJS=='' ) {
			} else {
				window.document.cookie='userCoo='+responseJS.user+';path=/';
				window.document.cookie='unickCoo='+encodeURI( responseJS.usernick )+';path=/';
				el=document.getElementById( 'login_div' );
				el.style.visibility='hidden';
				el.style.display='none';
				window.location.href='';
			}
		},
		false );
}

function Login_OnCancel() {
	var user='not_changed';
	var passwd='not_required';
	JsHttpRequest.query( '../".$hFrm['0011']."',
		{ event:'login_cancel', user:user, passwd:passwd },
		function( responseJS, responseText ) {
			if ( responseJS==null | responseJS=='' ) {
			} else {
				el=document.getElementById( 'login_div' );
				el.style.visibility='hidden';
				el.style.display='none';
				window.location.href='';
			}
		},
		false );
}

function MilkFilt_Show() {
	el=$$( 'login_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( 'period_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( 'filt_div' );
	el.style.left='25px';
	el.style.top='35px';
	el.style.visibility='visible';
	el.style.display='block';
}

function NoMilkFilt_Show() {
	el=$$( 'login_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( 'period_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( 'filt_div' );
	el.style.left='25px';
	el.style.top='35px';
	el.style.visibility='visible';
	el.style.display='block';
}

function Period_Show() {
	el=$$( 'login_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( 'filt_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( '__shadow__' );
	el.style.visibility='visible';
	el.style.display='block';
	el=$$( 'period_div' );
	el.style.left=( document.body.scrollWidth-287 )+'px';
	el.style.top='35px';
	el.style.visibility='visible';
	el.style.display='block';
}

function Period_Close() {
	el=$$( 'period_div' );
	el.style.visibility='hidden';
	el.style.display='none';
	el=$$( '__shadow__' );
	el.style.visibility='hidden';
	el.style.display='none';
}
</script>

<div class='mk' id='login_div' style='border-color:#66a0a0 #66a0a0 #66a0a0 #66a0a0; border-style:solid; border-width:1px; display:none; font-size:12; height:126px; line-height:16px; position:absolute; text-align:center; visibility:hidden; width:270px; z-index:10;' onmouseover='in_menu=true;'>
</div>
<div class='mk' id='filt_div' style='border-color:#66a0a0 #66a0a0 #66a0a0 #66a0a0; border-style:solid; border-width:1px; display:none; font-size:12; height:460px; line-height:16px; position:absolute; text-align:center; visibility:hidden; width:270px; z-index:10;' onmouseover='in_menu=true;'>";
include( "../forms/f__jfilt.php" );
echo "
</div>
<div class='mk' id='period_div' style='border-color:#66a0a0 #66a0a0 #66a0a0 #66a0a0; border-style:solid; border-width:1px; display:none; font-size:12; height:126px; line-height:16px; position:absolute; text-align:center; visibility:hidden; width:270px; z-index:10;' onmouseover='in_menu=true;'>";
include( "../forms/f__per.php" );
echo "
</div>";
$logindiv_hide=$_GET["logindiv__hide"];
?>
