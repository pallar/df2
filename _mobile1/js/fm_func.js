function do_req(){
	if(window.XMLHttpRequest){
		req=new XMLHttpRequest();
	}else if(window.ActiveXObject){//IE
		req=new ActiveXObject("Msxml2.XMLHTTP");
		if(!req){req=new ActiveXObject("Microsoft.XMLHTTP");}
	}else{
		alert("XMLHttpRequest Error");
	}
}

function goMilk(milk_sess,form){
	if(document.getElementById("milk_date").value!=""){
		document.getElementById("milk_sess").value=milk_sess;
		document.getElementById("page").value=form;
		document.getElementById("milk_form").submit();
	}else{
		return false;
	}
}

function milkIns(el,ses,stall,cow,Ymd,code){
	var kg=el.value;
	if(typeof(code)==="undefined"){code=0;}
	do_req();
	var url="fm_0611z.php";
	var data="kg="+kg+"&ses="+ses+"&stall="+stall+"&cow="+cow+"&Ymd="+Ymd+"&code="+code;
	req.open("POST",url,true);
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
	req.onreadystatechange=function(){
		if (req.readyState==4){
			if(req.status==200){
				if(req.responseText!=0){
//					console.log(req.responseText);
					el.removeAttribute("onchange");
					el.setAttribute("onchange","milkIns(this,"+ses+","+stall+","+cow+","+Ymd+","+req.responseText+")");
				}
			}
		}
	};
	req.send(data);
}

function budmIns(el,ses,budm,Ymd,code){
	var kg=el.value;
	if(typeof(code)==="undefined"){code=0;}
	do_req();
	var url="fm_0621z.php";
	var data="kg="+kg+"&ses="+ses+"&budm="+budm+"&Ymd="+Ymd+"&code="+code;
	req.open("POST",url,true);
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
	req.onreadystatechange=function(){
		if (req.readyState==4){
			if(req.status==200){
				if(req.responseText!=0){
//					console.log(req.responseText);
					el.removeAttribute("onchange");
					el.setAttribute("onchange","milkIns(this,"+ses+","+budm+","+Ymd+","+req.responseText+")");
				}
			}
		}
	};
	req.send(data);
}

function stallIns(el,cow){
	var stall=el.value;
	do_req();
	var url="fm_0590z.php";
	var data="stall="+stall+"&cow="+cow;
	req.open("POST",url,true);
	req.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
	req.onreadystatechange=function(){
		if (req.readyState==4){
			if(req.status==200){
				if(req.responseText!=0){
//					console.log(req.responseText);
					el.removeAttribute("onchange");
					el.setAttribute("onchange","stallIns(this,"+cow+")");
				}
			}
		}
	};
	req.send(data);
}
