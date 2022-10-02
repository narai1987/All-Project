// JavaScript Document

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


function providerepopup()
{ 
	var cnt = 0;
	var fname         = document.getElementById('fname').value;
	var lname         = document.getElementById('lname').value;
	var emailid         = document.getElementById('emailid').value;
	
	var country       = document.getElementById('country').value;
	var state         = document.getElementById('states').value;
	var city          = document.getElementById('city').value;
	var mobile         = document.getElementById('mobile').value;
	var address          = document.getElementById('address').value;   
   
	if(document.getElementById('fname').value=='') {
		document.getElementById('msgpfname').innerHTML="Please enter first name";
	}
	else if(!isletter(fname)) {
		document.getElementById('msgpfname').innerHTML="Please enter valid first name";
	}
	else if(document.getElementById('fname').value!='') {
		document.getElementById('msgpfname').innerHTML="";
		cnt++;
	}
	
	if(document.getElementById('lname').value=='')
	{ 
		document.getElementById('msgplname').innerHTML="Please enter last name";
	}else if(!isletter(lname))
	{
		document.getElementById('msgplname').innerHTML="Please enter valid last name";
	}else if(document.getElementById('lname').value!='') {
		document.getElementById('msgplname').innerHTML="";
		cnt++;
	}
	
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
	
	
	if(document.getElementById('country').value==0)
	{ 
		document.getElementById('msgcountry').innerHTML="Please select country";
	}
	else if(document.getElementById('country').value!=0) {
		document.getElementById('msgcountry').innerHTML="";
		cnt++;
	}
	
	
	if(document.getElementById('states').value==0) {
		document.getElementById('msgstate').innerHTML="Please select state";
	}
	else if(document.getElementById('states').value!=0) {
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
	else if(!numeric(document.getElementById('mobile').value)) {
		document.getElementById('msgmobile').innerHTML="Please enter valid mobile no.";
		document.getElementById('mobile').value=""
	}
	else if(document.getElementById('mobile').value) {
		document.getElementById('msgmobile').innerHTML="";
		cnt++;
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
	//////url validation
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
	document.getElementById("list_wrap").style.height = "auto";
	if(cnt == 9){	
		return true;
	}else {	
		return false;
	}

}

function testUrl(url) {
	return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
}
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
/*start function for rest values of the provider signup form. 
remove validation messages at the click reset button*/
function resetprovioder() {
	document.getElementById('msgpfname').innerHTML="";
	document.getElementById('msgplname').innerHTML="";
	document.getElementById('msgemailid').innerHTML="";
	document.getElementById('msgcountry').innerHTML="";
	document.getElementById('msgstate').innerHTML="";
	document.getElementById('msgmobile').innerHTML="";
	document.getElementById('msgcity').innerHTML="";
	document.getElementById('msgaddress').innerHTML="";
	document.getElementById("provioderForm").reset();
	resetuser();
}
function resetuser() {
	document.getElementById('msgfname').innerHTML="";
	document.getElementById('msglname').innerHTML="";
	document.getElementById('msguemail').innerHTML="";
	document.getElementById('msgumobile').innerHTML="";
	document.getElementById("userForm").reset();
	
}
/*end function for rest values of the provider signup  form. 
remove validation messages at the click reset button*/


function userpopup()
{
	var cnt = 0;
	var ufname = document.getElementById('ufname').value;
	var ulname = document.getElementById('ulname').value;
	var uemail = document.getElementById('uemail').value;
	var umobile = document.getElementById('umobile').value;
		
	if(document.getElementById("ufname").value=='') {
		document.getElementById("msgfname").innerHTML="Please enter first name";
		//return false;
	} 
	else if(!isletter(ufname)) {
		document.getElementById("msgfname").innerHTML="Please enter valid first name";
		//return false;
	} 
	else if(document.getElementById('ufname').value!='') {
		document.getElementById('msgfname').innerHTML="";
		cnt++;
	}
	
	if(document.getElementById('ulname').value=='') {
		document.getElementById("msglname").innerHTML="Please enter last name";
		//return false;
	}
	else if(!isletter(ulname)) {
		document.getElementById("msglname").innerHTML="Please enter valid last name";
		// return false;
	} 
	else if(document.getElementById('ulname').value!='') {
		document.getElementById('msglname').innerHTML="";
		cnt++;
	}
	
	
	if(document.getElementById('uemail').value=='') {
		document.getElementById("msguemail").innerHTML="Please enter email-id";
		//return false;
	}
	else if(!isEmail(uemail)) {
		document.getElementById("msguemail").innerHTML="Please enter valid email-id";
		//return false;
	}  
	else if(ct==0) {	 
		document.getElementById('msguemail').innerHTML="Alredy taken";
		 cnt = Number(cnt+ct);
	}
	else {
		document.getElementById('msguemail').innerHTML="";
		cnt = Number(cnt+ct);
	}
	
	
	document.getElementById("list_wrap").style.height = "auto";
	/*if(document.getElementById('umobile').value=='') {
		document.getElementById('msgumobile').innerHTML="Please enter mobile no.";
		//return false;
	}
	else if(!numeric(umobile)) {
		document.getElementById('msgumobile').innerHTML="Please enter valid mobile no.";
		//return false;
	} 
	else if(document.getElementById('umobile').value!='') {
		document.getElementById('msgumobile').innerHTML="";
		cnt++;
	}*/
	
	
	
	if(cnt == 3){
	return true;
	}else {
	return false;
	}

}
	/* check email availability 
	for the service provider signup*/
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
	for the service provider signup*/