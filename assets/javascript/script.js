// JavaScript Document

	var chkval = new  Array();
var xmlhttp;
function subscribe1(str) {
	 var pattern = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[\\w]$";
 var regex = new RegExp( pattern );
 
    if(regex.test(str)) {
		if (str=="") {
			document.getElementById("subs_msg").innerHTML="Please enter your email id";
			return;
		} 
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML=xmlhttp.responseText;
				/*if(xmlhttp.responseText){*/
					document.getElementById("subs_msg").innerHTML=xmlhttp.responseText;//"<em><a href='#'><strong></strong></a> &nbsp;You have successfully subscribe</em>";
				/*}
				else {
					document.getElementById("subs_msg").innerHTML="<a href='#'><strong>x</strong></a> &nbsp;You are not register user.";
				}*/
			}
		}
		xmlhttp.open("GET","script/subscribe.php?email="+str,true);
		xmlhttp.send();
	}
	else {
		document.getElementById("subs_msg").innerHTML="<a href='#'><strong></strong></a> &nbsp;Please enter a valid E-mail Address";

	}
}	

function fillstate(str) {
	if (str==0) {
			document.getElementById("state").innerHTML="";
			document.getElementById("city").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("state").innerHTML=xmlhttp.responseText;//"<option value=3>opt3</option>";
				
			}
		}
		xmlhttp.open("GET","script/getstate.php?country_id="+str,true);
		xmlhttp.send();
}

function fillcity(str) {
	document.getElementById("dloader").style.display = "block";
	try{
		document.getElementById("location").value="";
		document.getElementById("city").value="<option value=0>Select Suburbs</option>";
	}
	catch(e) {
		document.getElementById("city").value="<option value=0>Select Suburbs</option>";
	}
	try{
		document.getElementById("postalcode").value="";
		document.getElementById("postalcode1").value="";
	}
	catch(e) {
		
	}
	if(str!="0") {
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("city").innerHTML=xmlhttp.responseText;
				document.getElementById("dloader").style.display = "none";
				
			}
		}
		xmlhttp.open("GET","script/getcity.php?state="+str,true);
		xmlhttp.send();
	}
	else {
		document.getElementById("dloader").style.display = "none";
		try{
			document.getElementById("rmcity").innerHTML = "";
			document.getElementById("rmcity").innerHTML = "<select name='city' id='city' class='reg_txt' onchange='fillpcode(this.value)' ><option value='0'>Select Suburbs</option></select><span id='msgcity' style='color:red;' class='font'> </span>";
			/*var bb = document.getElementById("city");
			bb.removeAttribute("option");*/
	alert(str);
		}
		catch(e) {
			document.getElementById("location").value="";
		}
	}
}

function fillpcode(str) {
		document.getElementById("postalcode").value="";
	if (str=="") {
		document.getElementById("postalcode").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("postalcode").value=xmlhttp.responseText;
			try{
				document.getElementById("postalcode1").value=xmlhttp.responseText;
			}catch(e){}
			
		}
	}
	xmlhttp.open("GET","script/getpcode.php?city="+str,true);
	xmlhttp.send();
}
function login() {
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var usertype= document.getElementById("usertype").value;
	var errNo = 0;
	if(usertype!=0) {
		document.getElementById("msgusertype").innerHTML = "";
		if(email=="") {
			document.getElementById("msgemail").innerHTML = "Enter email ID";
			errNo = 1;
		}
		else if(!isEmail(email)) {
			document.getElementById("msgemail").innerHTML = "Enter correct email ID";
			errNo = 1;
		} 
		else {
			document.getElementById("msgemail").innerHTML = "";
		}
		
		if(password=="") {
			document.getElementById("msgpassword").innerHTML = "Enter password";
			errNo = 1;
		}
		else {
			document.getElementById("msgpassword").innerHTML = "";
		}
		if(errNo) return false;
		
		
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("divid").innerHTML = xmlhttp.responseText;
				//alert(xmlhttp.responseText);
				window.location.reload(true);
			}
		}
		xmlhttp.open("GET","script/login.php?email="+email+"&password="+password+"&usertype="+usertype,true);
		xmlhttp.send();
	}
	else {
		document.getElementById("msgusertype").innerHTML = "Please select user type";
	}
}
function chekright() {
	if(window.event.keyCode=="13") {
		login();	
	}
}
function setrate(num) {
	var imgid ;	
	for(var i=1;i<=3;i++) {
	imgid = "imgrat"+i;
		if(i<=num) {
			
			document.getElementById(imgid).src = "template/sp_detail/images/yellow_star.png";
		}
		else {
			document.getElementById(imgid).src = "template/sp_detail/images/gray_star.png";
		}
	}
	document.getElementById("rateval").value = num;
}
function userrate() {
	var divid;
	var recomend;
	var user_id = document.getElementById("user_id").value;
	if(document.getElementById("recomend").checked) {
		recomend = 1;
	}
	else {
		recomend = 0;
	}
	var comment= document.getElementById("comment").value;
	var provider_id = document.getElementById("provider_id").value;
	var rate = document.getElementById("rateval").value;
	                          
	if(document.getElementById("is_friendly0").checked){
		var is_friendly = document.getElementById("is_friendly0").value;
	}	
	if(document.getElementById("is_friendly1").checked){
		var is_friendly = document.getElementById("is_friendly1").value;
	}	
	if(document.getElementById("is_friendly2").checked){
		var is_friendly = document.getElementById("is_friendly2").value;
	}
	
	
	if(user_id) {
		if(rate==0) {
			divid = "closeid7";
			
			document.getElementById(divid).style.display = "block";
			document.getElementById(divid).innerHTML = "<p><strong>Worning Message</strong><br />Please select star for set rate.</p>";
			
			closeMsg1(divid);
		}
		if(comment) {
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else {// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					divid = "closeid6";		
					document.getElementById(divid).innerHTML=xmlhttp.responseText;//"<option value=3>opt3</option>";
					
					closeMsg1(divid);
				}
			}
			xmlhttp.open("GET","script/setrate.php?user_id="+user_id+"&provider_id="+provider_id+"&recomend="+recomend+"&comment="+comment+"&rate="+rate+"&is_friendly="+is_friendly,true);
			xmlhttp.send();
		}
		else {
			divid = "closeid7";
			
			document.getElementById(divid).style.display = "block";
			document.getElementById(divid).innerHTML = "<p><strong>Worning Message</strong><br />Please enter some text in comment box.</p>";
			document.getElementById("comment").focus();
			closeMsg1(divid);
		}
	}
	else {
		if(confirm("For post a review,Please login first.")) {
			/*document.getElementById("div").style.display = "block";*/
		}
	}
	//alert(divid);
}
	function closeMsg1(clss) {
		setTimeout("closeMsg2('"+clss+"')",5000);
		
	}
	function closeMsg2(clss) {
		document.getElementById(clss).style.display = 'none';
	}
	/*var lastclickid;*/
	function servicechange(provider_id,service_id) {
		//alert(lastclickid);
		/*if (str=="") {
				document.getElementById("txtHint").innerHTML="";
			return;
		} */
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//window.location.reload(true);
				document.getElementById("chang_service_div_id").innerHTML=xmlhttp.responseText;
				/*document.getElementById(service_id).style.display = "none";
				try {
				document.getElementById(lastclickid).style.display = "block";
				} catch(e){}*/
				
		
				/*lastclickid = service_id;*/
			}
		}
		xmlhttp.open("GET","script/servicechange.php?provider_id="+provider_id+"&service_id="+service_id,true);
		xmlhttp.send();
	}
	
	function setfavourite(user_id,provider_id,service_id) {
		var divid;
		/*if (str=="") {
				document.getElementById("txtHint").innerHTML="";
			return;
		} */
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		try{
				document.getElementById("add_remove_butt_td").style.display = "none";
		}
		catch(e) {}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				//document.getElementById("chkid").innerHTML=xmlhttp.responseText;
				document.getElementById("closeid1").innerHTML=xmlhttp.responseText;
				document.getElementById("closeid1").style.display = "block";
				try{
				document.getElementById("add_remove_butt_td").style.display = "block";
				}
				catch(e) {}
				//alert(provider_id);
				countfavourite(user_id);
				servicechange(provider_id,service_id);
				closeMsg1("closeid1")
			}
		}
		xmlhttp.open("GET","script/setfavourite.php?user_id="+user_id+"&provider_id="+provider_id+"&service_id="+service_id,true);
		xmlhttp.send();
	}
	function countfavourite(user_id) {
		/*if (str=="") {
				document.getElementById("txtHint").innerHTML="";
			return;
		} */
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp1=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp1.onreadystatechange=function() {
			if (xmlhttp1.readyState==4 && xmlhttp1.status==200) {
				//window.location.reload(true);
				document.getElementById("fcount").innerHTML=xmlhttp1.responseText;
				try{
					document.getElementById("wcount").innerHTML=xmlhttp1.responseText;
				}
				catch(e){}
				var att = document.createAttribute("title");
				document.getElementById("fcount").setAttributeNode(att);
				att.value=xmlhttp1.responseText;
				
				try{
				document.getElementById("countp").innerHTML=(xmlhttp1.responseText==1?xmlhttp1.responseText:"s ("+xmlhttp1.responseText+")");}
				catch(e) {}
				try{
				favouiteList(user_id);
				}
				catch(e) {}
			}
		}
		xmlhttp1.open("GET","script/countfavourite.php?str=ty&user_id="+user_id,true);
		xmlhttp1.send();
	}
	
	function favouiteList(user_id) {
		//alert("hr");
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp1=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp1.onreadystatechange=function() {
			if (xmlhttp1.readyState==4 && xmlhttp1.status==200) {
				document.getElementById("bagpopud").innerHTML=xmlhttp1.responseText;
				//document.getElementById("bagpopud").style.display="block";
				//document.getElementById("tptp").innerHTML=xmlhttp1.responseText;
		
		
			}
		}
		xmlhttp1.open("GET","script/favouritelist.php?str=ty&user_id="+user_id,true);
		xmlhttp1.send();
	}
	
	/* Nagesh script for ajax start here */
	

function getservice(str) { 
      
 
		if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	
				document.getElementById("search_service").innerHTML=xmlhttp.responseText;
				
			}
		}
		xmlhttp.open("GET","script/getservice.php?str="+str,true);
		//xmlhttp.open("GET","index.php?control=service&task=getservice&str="+str,true);
		xmlhttp.send();
	
}


function editservice(id,userid)	
{ 
var xmlhttp;

 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari 
 
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  { 
  if (xmlhttp.readyState==4)
    {
	
    document.getElementById("dividpop").innerHTML=xmlhttp.responseText;
	
	var chkvalp = (document.getElementById("hdncity").value).split(",");
	for(j in chkvalp) {
		
		chkval[chkvalp[j]] = chkvalp[j];
	}
	
	//attrval = document.getElementById("hdncity").value;
    }
  }
 // alert(id);
 
xmlhttp.open("GET","script/edit_service.php?tmpid=3&main_id="+id+"&userid="+userid,true); 
xmlhttp.send();
}




	
function addservice()	
{  
chkval = [];
var xmlhttp;

 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari 
 
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  { 
  if (xmlhttp.readyState==4)
    {
	
    document.getElementById("dividpop").innerHTML=xmlhttp.responseText;
		
    }
  }
 // alert(id);
xmlhttp.open("GET","script/add_service.php",true); 
xmlhttp.send();
}
	/* Nagesh script for ajax end here */
	
	/* SERVICE FILTER SCRIPT START HERE */
	
	function serviceFilter(str) {
		var filter = document.getElementById("filter").value;
		var xmlhttp;
		
		if(str) {
			document.getElementById("servid").style.display = "none";			
		}
		else {
			//document.getElementById("servid").style.display = "block";	
		}
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari 		
			xmlhttp=new XMLHttpRequest();
		}
		else {
			// code for IE6, IE5		
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() { 
			if (xmlhttp.readyState==4) {
				document.getElementById("filter").value = 1000;
				document.getElementById("pagingid").innerHTML = "";			
				document.getElementById("filterid").innerHTML=xmlhttp.responseText;			
			}
		}
		xmlhttp.open("GET","script/servicefilter.php?service="+str+"&tpages="+filter,true); 
		xmlhttp.send();
		
	}
	/* SERVICE FILTER SCRIPT END HERE */
	
	
	 function favorite_check(source) { /*alert("hello");*/
   
/*mainboxes = document.getElementsByName('select_all');*/
checkboxes = document.getElementsByName('select');
for(var i in checkboxes) 
 checkboxes[i].checked = source.checked;
 

 
}


function delete_fav() {
	//alert("opop");
var t=0; 
var p = document.getElementById("favo");
var value_list = p.getElementsByTagName("input");
var values = 0;
  for (var i=0; i<value_list.length; i++){
		if  (value_list[i].checked) {
			//if(value_list!=0){
			values +=((value_list[i].value)!="on")?(","+value_list[i].value):(value_list[i].value=="on"?"":value_list[i].value);
		//} 
		}
  }

//alert('You selected ' + values + ' boxes.'); 
if(values!=0) { 
var con =confirm('Are you sure want to delete');
if(con) {
window.location="index.php?control=usersaccount&task=deleteservice&fid="+values;
}
else {
	
	}
  }
  else {
	  alert('Select the check box');
	  }
	  
	  
}
	  
	  
function review_check(source) { 

	
	checkboxes = document.getElementsByName('select');
	for(var i in checkboxes) 
	checkboxes[i].checked = source.checked;
}

function delete_review() {
var t=0; 
var p = document.getElementById("rev");
var value_list = p.getElementsByTagName("input");
var values = 0;
  for (var i=0; i<value_list.length; i++){
		if  (value_list[i].checked) {
			
			values +=((value_list[i].value)!="on")?(","+value_list[i].value):(value_list[i].value=="on"?"":value_list[i].value);
		
		}
  }
if(values!=0) { 
    var con =confirm('Are you sure want to delete');
	if(con) {
		
	window.location="index.php?control=usersaccount&task=deletereview&rid="+values;
			}
	else {
		
		}
  }
  else {
	  alert('Select the check box');
	  }
}


///////////////////////


	  
function service_check(source) { 

	
	checkboxes = document.getElementsByName('select');
	for(var i in checkboxes) 
	checkboxes[i].checked = source.checked;
}

function delete_service() {
var t=0; 
var p = document.getElementById("serv");
var value_list = p.getElementsByTagName("input");
var values = 0;
  for (var i=0; i<value_list.length; i++){
		if  (value_list[i].checked) {
			
			values +=((value_list[i].value)!="on")?(","+value_list[i].value):(value_list[i].value=="on"?"":value_list[i].value);
		
		}
  }
if(values!=0) { 
    var con =confirm('Are you sure want to delete');
	if(con) {
		
	window.location="index.php?control=providersaccount&task=deleteservice&id="+values;
			}
	else {
		
		}
  }
  else {
	  alert('Select the check box');
	  }
}


	  
function visit_check(source) { 

	checkboxes = document.getElementsByName('select');
	for(var i in checkboxes) 
	checkboxes[i].checked = source.checked;
}

function delete_visit() {
var t=0; 
var p = document.getElementById("vijit");
var value_list = p.getElementsByTagName("input");
var values = 0;
  for (var i=0; i<value_list.length; i++){
		if  (value_list[i].checked) {
			
			values +=((value_list[i].value)!="on")?(","+value_list[i].value):(value_list[i].value=="on"?"":value_list[i].value);
		
		}
  }
if(values!=0) { 
    var con =confirm('Are you sure want to delete');
	if(con) {
		
	window.location="index.php?control=providersaccount&task=deletevisit&id="+values;
			}
	else {
		
		}
  }
  else {
	  alert('Select the check box');
	  }
}

/* validation for delete in my account */
	function deletedata(str) {
		if(confirm('Are you sure want to delete')) {
			try {
			document.getElementById("tpages").value=document.getElementById("filter").value;
			}
			catch(e) {
				
			}
			window.location = str;
		}		
	}
/* end validation for delete in my account */
function menuselect(str) {
	switch(str) {
		case "myprofile":
		case "editmyprofile":
		try{
			document.getElementById("lit1").className = "active";
			document.getElementById("lit6").className = "active";
		}catch(e) {
			document.getElementById("lit6").className = "active";
			document.getElementById("lit1").className = "active";
		}
		break;	
		default:
		try{
			document.getElementById("lit2").className = "active";
			document.getElementById("lit7").className = "active";
		}catch(e) {
			document.getElementById("lit7").className = "active";
			document.getElementById("lit2").className = "active";
		}
		break;
		case "changepassword":
		case "updatepassword":
		try{
			document.getElementById("lit3").className = "active";
			document.getElementById("lit9").className = "active";
		}catch(e) {
			document.getElementById("lit9").className = "active";
			document.getElementById("lit3").className = "active";
		}
		break;
		case "visit":
			document.getElementById("lit4").className = "active";
		break;
		case "myreview":
		try{
			document.getElementById("lit8").className = "active";
			document.getElementById("lit11").className = "active";
		}catch(e) {
			document.getElementById("lit11").className = "active";
			document.getElementById("lit8").className = "active";
		}
		break;
	}
}


function resetUserFormMyaccount() {
	
	  document.getElementById("msgfname").innerHTML="";
	  document.getElementById('msgmobile').innerHTML="";
	  document.getElementById('msglname').innerHTML="";
}


//////////////////////////////////////////

function getcitybystate(str) {
	//alert(str);
	chkval = [];
	var xmlhttp;
	
	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
	
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {		
			document.getElementById("uldrop").innerHTML=xmlhttp.responseText;
			
		}
	}
	// alert(id);
	xmlhttp.open("GET","script/getcitybystate.php?state="+str,true); 
	xmlhttp.send();
}
/////////////////////////////////////////////////////////////////

function skipfunc() {
	var xmlhttp;	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari 
		
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
	
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() { 
		if (xmlhttp.readyState==4) {		
			if(xmlhttp.responseText) {
				disablePopupHome();
			}			
		}
	}
	// alert(id);
	xmlhttp.open("GET","script/skipfunc.php",true); 
	xmlhttp.send();
}
