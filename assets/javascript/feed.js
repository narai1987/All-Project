// JavaScript Document
/* What you think*/
var checkfor = '';
function myfeed(userid) {
	if(userid) {
		document.location = "#menu";
		centerPopup5();
		loadPopup5();
	}
	else  {
		checkfor = 0;
		document.getElementById("femailtxt").value = "";
		document.getElementById("fpasswordtxt").value = "";
		document.getElementById("loginfeedmsg").innerHTML = "";
		document.location = "#menu";
		centerPopupLogin();
		loadPopupLogin();
	}
}
function openUserSignuPopupForm() {
	core();
	document.getElementById("ttk").click();
	document.getElementById("pop_user").click();
	//alert("ksjdfh");
}
	function myreview(str) {
		checkfor = str;
		document.getElementById("femailtxt").value = "";
		document.getElementById("fpasswordtxt").value = "";
		document.getElementById("loginfeedmsg").innerHTML = "";
		document.location = "#menu";
		centerPopupLogin();
		loadPopupLogin();
		alert(onlylogin);
	}
function feedAdd() {
	var cnn = 0;
	var title = document.getElementById("feedtitle").value;
	var feed = document.getElementById("feedtxt").value;
	if(title) {
		cnn +=1;
		document.getElementById("feedtitlemsg").innerHTML = "";
	}
	else {
		document.getElementById("feedtitlemsg").style.color = "#f00";
		document.getElementById("feedtitlemsg").innerHTML = "*";
	}
	if(feed) {
		cnn +=1;
		document.getElementById("feedmsg").innerHTML = "";
	}
	else {
		document.getElementById("feedmsg").style.color = "#f00";
		document.getElementById("feedmsg").innerHTML = "*";
		
	}
	if(cnn == 2) {
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
		}
		else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				/*document.getElementById("chkid").innerHTML = xmlhttp.responseText;*/
				//alert(xmlhttp.responseText);
				if(xmlhttp.responseText) {
				window.location.reload(true);
				}
			}
		}
		xmlhttp.open("GET","script/feed.php?feed="+feed+"&title="+title,true);
		xmlhttp.send();
	}
	return false;
}

function loginfeed() {	

	var email = document.getElementById("femailtxt").value;
	var password = document.getElementById("fpasswordtxt").value;
	var usertype= 2;
	var errNo = 0;
		if(email=="") {
			document.getElementById("loginfeedmsg").innerHTML = "Invalid email id or password";
			errNo = 1;
		}
		else if(!isEmail(email)) {
			/* document.getElementById("msgemailfeed").innerHTML = "<span style=color:#f00;></span>";*/
			document.getElementById("loginfeedmsg").innerHTML = "Invalid email id or password";
			
			errNo = 1;
		} 
		else {
			document.getElementById("msgemailfeed").innerHTML = "";
			document.getElementById("loginfeedmsg").innerHTML = "";
		}
		
		if(password=="") {
			/*document.getElementById("msgpasswordfeed").innerHTML = "<span style=color:#f00;></span>";*/
			document.getElementById("loginfeedmsg").innerHTML = "Invalid email id or password";
			errNo = 1;
		}
		else {
			if(!errNo) {
				document.getElementById("msgpasswordfeed").innerHTML = "";
				document.getElementById("loginfeedmsg").innerHTML = "";
			}
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
				//document.getElementById("chkid").innerHTML = xmlhttp.responseText;
				
				//window.location.reload(true);
				if(xmlhttp.responseText) {
					if(checkfor) {						
						disablePopupLogin();
						window.location.reload(true);
					}
					else {
						disablePopupLogin();
						myfeed(xmlhttp.responseText);
					}
					checkfor = '';
				}
				else {
					try {
						document.getElementById("loginfeedmsg").innerHTML = "Invalid email id or password";	
						
					}
					catch(e) {}
				}				
			}
			
		}
		xmlhttp.open("GET","script/loginfeed.php?email="+email+"&password="+password+"&control=service&task=loginfeed",true);
		xmlhttp.send();
	return false;
}
/* What you think end*/