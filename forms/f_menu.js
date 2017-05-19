//DF_2: forms/f_menu.js
//c: 17.07.2006
//m: 28.04.2017

//Application.HotKeys
function App_HotKeys() {
}

function Menu_HotKeys() {
//IE
	if (navigator.appName!="Netscape") {
		if (window.event.keyCode==49) {
			window.location.href='../reports/f__parl.php';
		} else if (window.event.keyCode==50) {//Ctrl+2
			window.location.href='../reports/f__reps.php';
			return true;
		} else if (window.event.keyCode==51) {//Ctrl+3
			window.location.href='../reports/f__cards.php';
			return true;
		} else if (window.event.keyCode==52) {//Ctrl+4
			window.location.href='../reports/f__ops.php';
			return true;
		}
	} else {
//FF
		if (document.captureEvents) {
			document.onkeypress=function(e) {
				if (e.ctrlKey && e.which==105) {//Ctrl+i
					e.preventDefault();//to cancel standard browser hot keys
				} else if (e.ctrlKey && e.which==117) {//Ctrl+u
					e.preventDefault();//to cancel standard browser hot keys
				} else if (e.which==49) {
					parent.w3.location.href='../reports/f__parl.php';
					return true;
				} else if (e.which==50) {//Ctrl+2
					parent.w3.location.href='../reports/f__reps.php';
					return true;
				} else if (e.which==51) {//Ctrl+3
					parent.w3.location.href='../reports/f__cards.php';
					return true;
				} else if (e.which==52) {//Ctrl+4
					parent.w3.location.href='../reports/f__ops.php';
					return true;
				}
			}
		}
	}
}

function Url_Parl() {
	window.location="forms/f__parl.php";
}

function Url_Reps() {
	window.location="forms/f__reps.php";
}

function Url_Cards() {
	window.location="forms/f__cards.php";
}

function Url_Opers() {
	window.location="forms/f__ops.php";
}

//Context Menu

function Cm_Show(params, event) {
	el=document.getElementById('cm');
	o=event.srcElement;
	x=event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft;
	y=event.clientY+document.documentElement.scrollTop+document.body.scrollTop;
	el.innerHTML='';
	for (var k in params) {
		if (params[k]=='space') {//menu: horizontal line
			el.innerHTML+='<hr size=1>';
		} else if (params[k]['disabled']) {//menu: disabled submenu
			el.innerHTML+='<a class="cm_gray" href="" onclick="return false;" title="'+params[k]['title']+'" onmouseover="window.status=this.title;return true;" onmouseout="window.status=&quot;&quot;; return true;">&nbsp;&nbsp;&nbsp;&nbsp;'+params[k]['value']+'</a><br>';
		} else if (params[k]['frame']=='off') {//menu: no frame
			if (window.frameElement=='[object HTMLFrameElement]') {
				el.innerHTML+='<a class="cm_black" href="" onclick="window.open('+params[k]['href']+",'','statusbar,menubar,location'); return false;"+'" title="'+params[k]['title']+'" onmouseover="window.status=this.title; return true;" onmouseout="window.status=&quot;&quot;; return true;">&nbsp;&nbsp;&nbsp;&nbsp;'+params[k]['value']+'</a><br>';
			} else {
				el.innerHTML+='<a class="cm_black" href="" onclick="window.open('+params[k]['href']+",'','statusbar,menubar,location'); return false;"+'" title="'+params[k]['title']+'" onmouseover="window.status=this.title; return true;" onmouseout="window.status=&quot;&quot;; return true;">&nbsp;&nbsp;&nbsp;&nbsp;'+params[k]['value']+'</a><br>';
			}
		} else if (params[k]['frame']=='on') {//menu: frame
			el.innerHTML+='<a class="cm_black" href="" onclick="'+'parent'+params[k]['taget']+".location.href='"+params[k]['href']+"' return false;"+' title="'+params[k]['title']+'" onmouseover="window.status=this.title; return true;" onmouseout="window.status=&quot;&quot;; return true;">&nbsp;&nbsp;&nbsp;&nbsp;'+params[k]['value']+'</a><br>';
		}
	}
	el.style.visibility='visible';
	el.style.display='block';
	height=el.scrollHeight-20;
	if (window.opera) height+=30;//opera browser
	if (event.clientY+height>document.body.clientHeight) y-=height+14; else y-=2;
	el.style.left=x+'px';
	el.style.top=y+'px';
	el.style.visibility='hidden';
	el.style.display='none';
	el.style.visibility='visible';
	el.style.display='block';
	event.returnValue=false;
}

function Cm(event) {
	var params=new Array();
	params[1]='space';
	params[2]=new Array();
	params[2]['disabled']=false;
	params[2]['href']='../forms/f__parl.php';
	params[2]['title']='Detailed Report';
	params[2]['value']='Detailed Report';
	params[2]['taget']='';
	params[2]['frame']='on';
	params[3]='space';
	params[4]=new Array();
	params[4]['disabled']=false;
	params[4]['href']='../forms/f__reps.php';
	params[4]['title']='Reports';
	params[4]['value']='Reports';
	params[4]['taget']='';
	params[4]['frame']='on';
	params[5]='space';
	params[6]=new Array();
	params[6]['disabled']=false;
	params[6]['href']='../forms/f__cards.php';
	params[6]['title']='Cards';
	params[6]['value']='Cards';
	params[6]['taget']='';
	params[6]['frame']='on';
	params[7]='space';
	params[8]=new Array();
	params[8]['disabled']=false;
	params[8]['href']='../forms/f__ops.php';
	params[8]['title']='Opers';
	params[8]['value']='Opers';
	params[8]['taget']='';
	params[8]['frame']='on';
	params[9]='space';
	params[10]=new Array();
	params[10]['disabled']=false;
	params[10]['href']='';
	params[10]['title']='Printed Version';
	params[10]['value']='Printed Version';
	params[10]['taget']='';
	params[10]['frame']='on';
	params[11]='space';
	Cm_Show(params, event);
}

function Cm_Hide() {
	el=document.getElementById('cm');
	el.style.visibility='hidden';
	el.style.display='none';
}

function Cm_Event(el, event) {
	if (event.button==2 || event.button==3) {
		Cm(event);
		return false;
	}
}
