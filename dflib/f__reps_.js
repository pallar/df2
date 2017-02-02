function Reps_TabHotKeys() { 
//IE
	if ( navigator.appName!="Netscape" ) {
		if ( window.event.keyCode==49 ) {
			window.location.href='../reports/flmilk.php';
		} else if ( window.event.keyCode==50 ) {//Ctrl+2
			window.location.href='../reports/flsele.php';
			return true;
		} else if ( window.event.keyCode==51 ) {//Ctrl+3
			window.location.href='../reports/flcommon.php';
			return true;
		} else if ( window.event.keyCode==52 ) {//Ctrl+4
			window.location.href='../reports/flhealth.php';
			return true;
		} else if ( window.event.keyCode==53 ) {//Ctrl+5
			window.location.href='../reports/flgraph.php';
			return true;
		}
	} else {
//FF
		if ( document.captureEvents ) {
			document.onkeypress=function( e ) {
				if ( e.ctrlKey && e.which==105 ) {//Ctrl+i
					e.preventDefault();//to cancel standard browser hot keys
				} else if ( e.ctrlKey && e.which==117 ) {//Ctrl+u
					e.preventDefault();//to cancel standard browser hot keys
				} else if ( e.which==49 ) {//Ctrl+1
					parent.w3.location.href='../reports/flmilk.php';
					return true;
				} else if ( e.which==50 ) {//Ctrl+2
					parent.w3.location.href='../reports/flsele.php';
					return true;
				} else if ( e.which==51 ) {//Ctrl+3
					parent.w3.location.href='../reports/flcommon.php';
					return true;
				} else if ( e.which==52 ) {//Ctrl+4
					parent.w3.location.href='../reports/flhealth.php';
					return true;
				} else if ( e.which==53 ) {//Ctrl+5
					parent.w3.location.href='../reports/flgraph.php';
					return true;
				}
			}
		}
	}
}
