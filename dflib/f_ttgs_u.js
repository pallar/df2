var http=false;

if ( navigator.appName=="Microsoft Internet Explorer" ) {
	http=new ActiveXObject( "Microsoft.XMLHTTP" );
} else {
	http=new XMLHttpRequest();
}

function Ttgs__stall_num__Update( tag, stall_num ) {
	http.abort();
	http.open( "GET", "../dflib/f_ttgs_u.php?ttgs_mode=stall_num&tag="+tag+"&stall_num="+stall_num, true );
	http.onreadystatechange=function() {
		if ( http.readyState==4 ) {
		}
	}
	http.send( null );
}

function Ttgs__cow_num__Update( tag, cow_num ) {
	http.abort();
	http.open( "GET", "../dflib/f_ttgs_u.php?ttgs_mode=cow_num&tag="+tag+"&cow_num="+cow_num, true );
	http.onreadystatechange=function() {
		if ( http.readyState==4 ) {
		}
	}
	http.send( null );
}
