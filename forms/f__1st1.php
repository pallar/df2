<!-- .css href IS NEEDED! -->
<link href='../f_0.css' rel='stylesheet' type='text/css'>

<script src='../dflib/ajax/jshttprq.js'></script>
<script language='JavaScript' type='text/javascript'>
var timer_id=0;
var req=new JsHttpRequest();

function Mnemo_Reload( value ) {
	if( timer_id!=0 ) {
		clearTimeout( timer_id );
		timer_id=0;
	}
	req.open( null, 'f__1st1b.php', true );
	req.onreadystatechange=function() {
		if( req.readyState==4 ) {
			document.getElementById( 'f__1st__div' ).innerHTML=req.responseJS;
		}
	}
	req.send( null );
	timer_id=setTimeout( 'Mnemo_Reload()', 2000 );
}

function CookieSet( cname, cvalue ) {
	window.document.cookie=cname+"="+cvalue+";path=/";
}
</script>

<body style='margin-left:0; margin-right:0; padding:0' onload='Mnemo_Reload();'>
	<div id='f__1st__div' style='margin:0'></div>
</body>
