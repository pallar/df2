var http=false;

if ( navigator.appName=="Microsoft Internet Explorer" ) {
	http=new ActiveXObject( "Microsoft.XMLHTTP" );
} else {
	http=new XMLHttpRequest();
}

function Tcws__var__Update( id, vars, vars_values  ) {
	http.abort();
	http.open( "GET", "../dflib/f_tcws_u.php?id="+id+"&vars="+vars+"&vars_values="+vars_values, true );
	http.onreadystatechange=function() {
		if ( http.readyState==4 ) {
		}
	}
	http.send( null );
}
