// JavaScript Document
function isletter(txt)
{
	var iChars = "!@#$^&*()+=-[]\\\';,./{}|\":<>?0123456789";
	var chk	=1;
	for (var i = 0; i < txt.length; i++) {
    if (iChars.indexOf(txt.charAt(i)) != -1) {
   		chk=0;
        }
    }
	if(chk){
	return true;
	}else{
	return false;
	}
}





function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}

function numeric(sText)
{
 var ValidChars = "0123456789,.";
 var IsNumber=true;	
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {			 
		 IsNumber = false;
         }
      }
  	 return IsNumber;
}

var cp = 0;
	var ct = 0;
	function emailAvailabilty(email,control) {
		
		if(isEmail(email)) {
			if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			else {// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					if(xmlhttp.responseText=="YES"){
						cp = 1;ct = 1;
						if(control=="provider"){
							document.getElementById("msgemailid").innerHTML = "<span style='color:green';>Available</span>";
						}
						else {
							document.getElementById("msguemail").innerHTML = "<span style='color:green';>Available</span>";
						}
					}
					else {
						cp = 0;ct = 0;
						if(control=="provider"){
							document.getElementById("msgemailid").innerHTML = "Already exist.";
						}
						else {
							document.getElementById("msguemail").innerHTML = "Already exist.";
						}
					}
				}
			}
			xmlhttp.open("GET","script/checkemailavailable.php?email="+email+"&control="+control,true);
			xmlhttp.send();			
		}
		else {
			cp = 0;ct = 0;
			if(control=="provider"){
				document.getElementById("msgemailid").innerHTML = "Please enter valid email id";
			}
			else {
				document.getElementById("msguemail").innerHTML = "Please enter valid email id";
			}
		}
	}
	/* check email availability 
	
	*/
function add_adverties(id){
/*window.location.reload(true);*/
	

var xmlhttp1;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp1=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp1.onreadystatechange=function() {
		if (xmlhttp1.readyState==4) {
			document.getElementById("advert_div").innerHTML=xmlhttp1.responseText;//"<option value=3>opt3</option>";
			
		}
	}
	setTimeout("",3000);
	if(id){
	xmlhttp1.open("GET","script/ajaxadvertie.php?id="+id,true);
	}else{
	xmlhttp1.open("GET","script/ajaxadvertie.php",true);
	}
	xmlhttp1.send();
	
}
	/*for the service provider signup*/

function numeric1(sText,id)
{
 var ValidChars = "0123456789- ";
 var IsNumber=true; 
 for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {    
  document.getElementById(id).value="";
  document.getElementById(id).focus();
         }
      }
}


function addProvider_validation()
{ 
	var cnt = 0;
	var fname         = document.getElementById('fname').value;
	var lname         = document.getElementById('lname').value;
	try {
	var emailid         = document.getElementById('emailid').value;
	}
	catch(e) {}
	var state         = document.getElementById('state').value;
	var city          = document.getElementById('city').value;
	var mobile         = document.getElementById('mobile').value;
	var address          = document.getElementById('address').value;   

	if(document.getElementById('fname').value=='') {
		document.getElementById('msgfname').innerHTML="Please enter first name";
	}
	else if(!isletter(fname)) {
		document.getElementById('msgfname').innerHTML="Please enter valid first name";
	}
	else if(document.getElementById('fname').value!='') {
		document.getElementById('msgfname').innerHTML="";
		cnt++;
	}
	
	if(document.getElementById('lname').value=='')
	{ 
		document.getElementById('msglname').innerHTML="Please enter last name";
	}else if(!isletter(lname))
	{
		document.getElementById('msglname').innerHTML="Please enter valid last name";
	}else if(document.getElementById('lname').value!='') {
		document.getElementById('msglname').innerHTML="";
		cnt++;
	;
	}
	
	try {
	if(document.getElementById('emailid').value=='') { 
		document.getElementById('msgemailid').innerHTML="Please enter email-id";
	}
	else if(!isEmail(emailid)) {
		document.getElementById('msgemailid').innerHTML="Please enter valid email-id";
	}
	else if(cp==0) {
		document.getElementById('msgemailid').innerHTML="Alredy taken";
		cnt = Number(cnt+cp);
	}
	else {
		document.getElementById('msgemailid').innerHTML="";
		cnt = Number(cnt+cp);
	}
	}
	catch(e) {}
	

	if(document.getElementById('state').value==0) {
		document.getElementById('msgstate').innerHTML="Please select state";
	}
	else if(document.getElementById('state').value!=0) {
		document.getElementById('msgstate').innerHTML="";
		cnt++;
	}
	
	
	if(document.getElementById('city').value=="0") {
		//document.getElementById('msgstate').innerHTML="";
		document.getElementById('msgcity').innerHTML="Please select suburb";
		// return false;
	}
	else if(document.getElementById('city').value!=0) {
		document.getElementById('msgcity').innerHTML="";
		cnt++;
	}
	////////////////////mobile
	if(!document.getElementById('mobile').value) {
		//document.getElementById('msgstate').innerHTML="";
		document.getElementById('msgmobile').innerHTML="Please enter mobile no.";
		// return false;
	}
	else if(document.getElementById('mobile').value) {
		if(numeric(document.getElementById('mobile').value)) {
			document.getElementById('msgmobile').innerHTML="";
			cnt++;			
		}
		else {
			document.getElementById('msgmobile').innerHTML="Please enter mobile no.";
			document.getElementById('mobile').value = "";
		}
	}
	///////////////////address
	
	if(!document.getElementById('address').value) {
		//document.getElementById('msgstate').innerHTML="";
		document.getElementById('msgaddress').innerHTML="    Please enter address";
		// return false;
	}
	else if(document.getElementById('address').value) {
		document.getElementById('msgaddress').innerHTML="";
		cnt++;
	}
	
	////url validation
	if(document.getElementById('weburl').value) {
		if(testUrl(document.getElementById('weburl').value)) {
		
			document.getElementById('msgurl').innerHTML="";
			cnt++;
		}
		else {
			document.getElementById('msgurl').innerHTML="Please enter valid web address";
		}
		
		
	}
	else {
		document.getElementById('msgurl').innerHTML="";
		cnt++;
	}
	/*alert("yes");*/
	
	  /*Check image type*/
	  var cntmin = 7;
	  var cntmax = 8;
	var logo = document.getElementById("logo").value;
	var fzipLength = logo.length;
	var fzipDot = logo.lastIndexOf(".");
	var fzipType = logo.substring(fzipDot,fzipLength);
	if(logo) {
	  	cntmin = 8;
	    cntmax = 9;
		
		if((fzipType==".jpg")||(fzipType==".jpg")||(fzipType==".gif")||(fzipType==".png")) {
			document.getElementById('logomsg').innerHTML = "";
			cnt++;
			
		}
		else {		
			document.getElementById('logomsg').innerHTML = "Invalid file format";
		}
	}
	else {
		document.getElementById('logomsg').innerHTML = "";
	}
	/*Check image type*/
	try{
		document.getElementById('emailid').value;
		document.getElementById('msgemailid').innerHTML;
		
		if(cnt == cntmax){	
			return true;
		}else {	
			return false;
		}
	}
	catch(e) { 
		if(cnt == cntmin){	
		return true;
		}else {	
			return false;
		}
	}

}
function testUrl(url) {
	return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
}