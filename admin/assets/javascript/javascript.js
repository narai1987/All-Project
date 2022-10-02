// JavaScript Document
function addservice(uid) {
	var xmlhttp;
	document.getElementById("addservice").innerHTML = "";
	loadPopupHome();
	centerPopupHome();	
	
	document.getElementById("loaderajax").style.display = "block";
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
		
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {	
			document.getElementById("addservice").innerHTML = xmlhttp.responseText;
			
			document.getElementById("loaderajax").style.display = "none";
			document.getElementById("statediv").style.border = "1px solid #CCC;";
			//document.getElementById("uid").value = uid;
			/*loadPopupHome();
			centerPopupHome();*/			
		}
	}
	xmlhttp.open("GET","script/addnewservice.php?uid="+uid,true); 
	xmlhttp.send();
}
function getsuburbs(state_id) {
	document.getElementById("error_city").style.display = "none";
	//alert(Object.keys(chkval).length+" now lenth");
	document.getElementById("loaderajax").style.display = "block";
	if(!state_id) {		
			document.getElementById("statediv").style.border = "0";
	}
	var citid;	
	citid = document.getElementById("hdncity").value;
	
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
		
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {	
			document.getElementById("statediv").innerHTML = xmlhttp.responseText;
			document.getElementById("loaderajax").style.display = "none";
			document.getElementById("statediv").style.border = "1px solid #CCC;";
					
		}
	}
	xmlhttp.open("GET","script/getsuburbs.php?state_id="+state_id+"&citid="+citid,true); 
	xmlhttp.send();
}
function editproviderservice(uid,sid) {
	document.getElementById("loaderajax").style.display = "block";

	for(k in chkval) {
		delete chkval[k];
		if(chkval[k]) {
			delete chkval[k];
		}
	}
	//alert(Object.keys(chkval).length+" now lenth");
	var xmlhttp;	
	document.getElementById("addservice").innerHTML = "";
	loadPopupHome();
	centerPopupHome();	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
		
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {	
			document.getElementById("addservice").innerHTML = xmlhttp.responseText;
						
			fillcityhidden(uid,sid);
			
			document.getElementById("loaderajax").style.display = "none";
		}
	}
	xmlhttp.open("GET","script/editproviderservice.php?uid="+uid+"&sid="+sid,true); 
	xmlhttp.send();
}
function fillcityhidden(uid,sid) {
	var xmlhttp;	
	var arr;	
	var ids ='';
	var arrdt;
	var lis='';
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
		
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {	
			arr = xmlhttp.responseText;
			if(arr!=0) {
				var arrdata = arr.split(",");
				for(var j=0;j<arrdata.length;j++) {
					arrdt = arrdata[j].split("##");
					chkval[arrdt[0]] = arrdt[1];
					lis += "<li id=li"+ltrim(arrdt[0])+">"+arrdt[1]+"<a title='Remove "+arrdt[1]+"'  style=cursor:pointer; onclick=deleteelement('"+ltrim(arrdt[0])+"')><img src=images/cross_small.png ></a></li>";
					if(ids) {
						ids += ','+arrdt[0];
					}
					else {
						ids += arrdt[0];
					}
				}
			}
			else {
				ids = '';
				lis = '';	
			}
			
			document.getElementById("hdncity").value = ltrim(ids);	
			document.getElementById("showcity").innerHTML = ltrim(lis);	
		}
	}
	xmlhttp.open("GET","script/fillcityhidden.php?uid="+uid+"&sid="+sid,true); 
	xmlhttp.send();
}
function ltrim(stringToTrim) {
	return stringToTrim.replace(/^\s+/,"");
}

/* Validate form service*/

function validateformnewservice() {
	var chk = 1;
	var service = document.getElementById("service_name");
	var state = document.getElementById("state_name");
	var city = document.getElementById("hdncity");
	var logo = document.getElementById("logo");
	
	
	if(service.value=="0") {
		chk = 0;
		document.getElementById("error_service").style.display = "block";
		//return false;
	}
	else {
		document.getElementById("error_service").style.display = "none";
	}
	/*if(state.value=="0") {
		chk = 0;
		document.getElementById("error_state").style.display = "block";
		return false;
	}
	else {
		document.getElementById("error_state").style.display = "none";
	}*/
	if(!city.value) {
		chk = 0;
		if(state.value=="0") {
			chk = 0;
			document.getElementById("error_state").style.display = "block";
			return false;
		}
		else {
			document.getElementById("error_state").style.display = "none";
			document.getElementById("error_city").style.display = "block";
		}
	}
	else {
		document.getElementById("error_city").style.display = "none";
	}
	return chk?true:false;	
	
}
/* Validate form service*/
/* TAXONOMY EDIT ADD JAVASCRIPT START */
/*function addTaxonomy() {
	alert("sdjkhf");
document.getElementById("addTaxonomy").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				
					document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
				 editor();
                
			}
		}	
		//alert("gjh kh kjh");
		xmlhttp.open("GET","script/ajax.php?control=taxonomy&task=add_taxonomy",true);
		xmlhttp.send();
	
}

function editTaxonomy(id) {
	alert("pppp"); 
document.getElementById("addTaxonomy").innerHTML ='<p align="center" style="margin:50px 50px 50px 50px;" ><img src="images/ajax-loader.gif" /></p>';

		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				
					document.getElementById("addTaxonomy").innerHTML=xmlhttp.responseText;
				 editor();
			}
		}
		//alert(id);
		xmlhttp.open("GET","script/ajax.php?control=taxonomy&task=add&id="+id,true);
		xmlhttp.send();
}
*/
 
 function changeLanguage_taxonomy(str) {
	alert(str);
	//var chlan = str.split("-");
	var id = '';
	id = document.getElementById("idd").value;
	
	//alert(id);
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			//window.location.reload(true);
		document.getElementById("chlangTaxo").innerHTML = xmlhttp.responseText;	
		}
	} 
	/*alert(str);
	 alert(chlan[0]); 
	alert(chlan[1]);*/ 
	xmlhttp.open("GET","script/taxonomy/ajax.php?control=taxonomy&task=changeLang&did="+id+"&lang_id="+str,true);
	xmlhttp.send();
	
}
/* TAXONOMY EDIT ADD JAVASCRIPT END */