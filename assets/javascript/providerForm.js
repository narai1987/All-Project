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
	
	var pattern = "^[\\w-_\.]*[\\w-_\.]\@[\\w]\.+[\\w]+[\\w]$";
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


function provideredit()
{ 

	var cnt = 0;
	var fname         = document.getElementById('fname').value;
	var lname         = document.getElementById('lname').value;
	var emailid         = document.getElementById('emailid').value;
	/*var gender        = document.getElementById('gender').value;*/
	
	
	/*var password1      = document.getElementById('password1').value;
	var conpassword2      = document.getElementById('conpassword2').value;*/
	/*var business_name = document.getElementById('business_name').value;*/
	/*var hr_rate        = document.getElementById('hr_rate').value;*/
	/*var description   = document.getElementById('description').value;*/
	
	
	/*var service        = document.getElementById('service').value;*/
	
	/*var selection     = document.getElementById('selection').value;
	var provider_id   = document.getElementById('provider_id').value;*/
	var country       = document.getElementById('country').value;
	/*var phone         = document.getElementById('phone').value;*/
	var state         = document.getElementById('state').value;
	var mobile        = document.getElementById('mobile').value;
	var city          = document.getElementById('city').value;
	/*var fax           = document.getElementById('fax').value;
	var address       = document.getElementById('address').value;
	var address1      = document.getElementById('address1').value;*/
	
	
  /*alert (service);*/
/* if(document.getElementById('fname').value=='' || document.getElementById('lname').value=='' || document.getElementById('emailid').value=='' || document.getElementById('country').value==0 || document.getElementById('state').value==0 || document.getElementById('city').value==0)  { */
   
   
    if(document.getElementById('fname').value=='')
	{
	 document.getElementById('msgfname').innerHTML="Please enter first name";
	  
	}
	else if(!isletter(fname))
	{
	 document.getElementById('msgfname').innerHTML="Please enter valid first name";
	 ///return false;
	}
	else if(document.getElementById('fname').value!='') {
	document.getElementById('msgfname').innerHTML="";
	cnt++;
	}
	
	 if(document.getElementById('lname').value=='')
	{ 
	  
	  document.getElementById('msglname').innerHTML="Please enter last name";
	  //return false;
	}else if(!isletter(lname))
	{
	 document.getElementById('msglname').innerHTML="Please enter valid last name";
	 //return false;
	}else if(document.getElementById('lname').value!='') {
	document.getElementById('msglname').innerHTML="";
	cnt++;
	}
	
	
	 if(document.getElementById('emailid').value=='')
	{ 
	  
	  document.getElementById('msgemailid').innerHTML="Please enter email-id";
	  //return false;
	}else if(!isEmail(emailid))
	 {
	  document.getElementById('msgemailid').innerHTML="Please enter valid email-id";
	  //return false;
	 }else if(document.getElementById('emailid').value!='') {
	document.getElementById('msgemailid').innerHTML="";
	cnt++;
	}
	
	
	 if(document.getElementById('country').value==0)
	{ 
	  
	  document.getElementById('msgcountry').innerHTML="Please select country";
	  //return false;
	}else if(document.getElementById('country').value!=0) {
	document.getElementById('msgcountry').innerHTML="";
	cnt++;
	}
	
	
	
	
	 if(document.getElementById('state').value==0)
	{
	 
	  document.getElementById('msgstate').innerHTML="Please select state";
	  //return false;
	}else if(document.getElementById('state').value!=0) {
	document.getElementById('msgstate').innerHTML="";
	cnt++;
	}
	
    //mobile validation start here
	if(document.getElementById('mobile').value=='') {
		document.getElementById('msgmobile').innerHTML="Please enter mobile number";
		//cnt++;	  
	}
	else if(!numeric(mobile)) {
		document.getElementById('msgmobile').innerHTML="Please enter valid mobile number";
	}
	else if(document.getElementById('mobile').value!='') {
		if((document.getElementById('mobile').value).replace(/[^0-9]/g, '')) {
			document.getElementById('msgmobile').innerHTML="";
		}
		cnt++;
	}
	 //mobile validation end here
	
	 if(document.getElementById('city').value=="0")
	{
	  //document.getElementById('msgstate').innerHTML="";
	  document.getElementById('msgcity').innerHTML="Please select city";
	 // return false;
	}else if(document.getElementById('city').value!=0) {
	document.getElementById('msgcity').innerHTML="";
	cnt++;
	}

	
if(cnt == 7){
//alert("Now you can submit the form");
return true;
}else {
//alert("not submit");
return false;
}

}

function userpopup()
{
	var cnt = 0;
	var ufname = document.getElementById('ufname').value;
	var ulname = document.getElementById('ulname').value;
	var uemail = document.getElementById('uemail').value;
	var umobile = document.getElementById('umobile').value;
	/*var gender        = document.getElementById('gender').value;*/
	
	
if(document.getElementById("ufname").value=='')
	{
	  document.getElementById("msgfname").innerHTML="Please enter first name";
	  //return false;
	} else if(!isletter(ufname))
	{
	 document.getElementById("msgfname").innerHTML="Please enter valid first name";
	 //return false;
	} else if(document.getElementById('ufname').value!='') {
	document.getElementById('msgfname').innerHTML="";
	cnt++;
	}
	
  if(document.getElementById('ulname').value=='')
	{
	 document.getElementById("msglname").innerHTML="Please enter last name";
	  //return false;
	}
	else if(!isletter(ulname))
	{
	  document.getElementById("msglname").innerHTML="Please enter valid last name";
	// return false;
	} else if(document.getElementById('ulname').value!='') {
	document.getElementById('msglname').innerHTML="";
	cnt++;
	}
	
	
  if(document.getElementById('uemail').value=='')
	{
	  document.getElementById("msguemail").innerHTML="Please enter email-id";
	  //return false;
	}
	else if(!isEmail(uemail))
	 {
	  document.getElementById("msguemail").innerHTML="Please enter valid email-id";
	  //return false;
	 }  else if(document.getElementById('uemail').value!='') {
	document.getElementById('msguemail').innerHTML="";
	cnt++;
	}
	 
   if(document.getElementById('umobile').value=='')
	{
	  document.getElementById('msgumobile').innerHTML="Please enter mobile";
	  //return false;
	}
	else if(!numeric(umobile))
	{
	   document.getElementById('msgumobile').innerHTML="Please enter valid mobile number";
	  //return false;
	} else if(document.getElementById('umobile').value!='') {
	document.getElementById('msgumobile').innerHTML="";
	cnt++;
	}
	 

	
if(cnt == 4){
//alert("Now you can submit the form");
return true;
}else {
//alert("not submit");
return false;
}

}


	
function addnew_validation() {  
    var cnt = 0;
	var service_name   = document.getElementById('service_name').value;
	var state_name       = document.getElementById('state_name').value;
	var city_name       = document.getElementById('hdncity').value;
	/*var description         = document.getElementById('description').value;*/


	if(document.getElementById('service_name').value==0) {
	   document.getElementById("msgservice_name").innerHTML="Please select service";
	  //return false;
	} 
	else if(document.getElementById('service_name').value!=0) {
		document.getElementById('msgservice_name').innerHTML="";
		cnt++;
	} 
		
	

	/*if(document.getElementById('state_name').value==0) {
	   document.getElementById("msgstate_name").innerHTML="Please select any state";
	  //return false;
	} 
	else if(document.getElementById('state_name').value!=0) {
		document.getElementById('msgstate_name').innerHTML="";
		cnt++;
	} 
	
if(document.getElementById('hdncity').value==0)
	{
	alert("ok");
	  document.getElementById("msgcity_name").innerHTML="Please select any city";
	 
	} else if(document.getElementById('hdncity').value!=0) {
	document.getElementById("msgcity_name").innerHTML="";
	cnt++;
	}*/
	
	if(document.getElementById('hdncity').value==0)	{
		if(document.getElementById('state_name').value==0) {
		   document.getElementById("msgstate_name").innerHTML="Please select state";
		  //return false;
		} 
		else if(document.getElementById('state_name').value!=0) {
			document.getElementById('msgstate_name').innerHTML="";
			document.getElementById("msgcity_name").innerHTML="Please select suburb";
			//cnt++;
		} 
	  
	 
	} 
	else if(document.getElementById('hdncity').value!=0) {
		document.getElementById("msgcity_name").innerHTML="";
		cnt++;
	}
	
if(cnt == 2){
//alert("Now you can submit the form");
return true;
}else {
//alert("not submit");
return false;
}

}

	
function editservices()

{   
    var cnt = 0;
	/*var service_name   = document.getElementById('service_name').value;
	var price         = document.getElementById('price').value;*/
	var city_name       = document.getElementById('hdncity').value;
		
	
	if(document.getElementById('hdncity').value==0)	{
		if(document.getElementById('state_name').value==0) {
		   document.getElementById("msgstate_name").innerHTML="Please select state";
		  //return false;
		} 
		else if(document.getElementById('state_name').value!=0) {
			document.getElementById('msgstate_name').innerHTML="";
			document.getElementById("msgcity_name").innerHTML="Please select suburb";
			//cnt++;
		} 
	  
	 
	} 
	else if(document.getElementById('hdncity').value!=0) {
		document.getElementById("msgcity_name").innerHTML="";
		cnt++;
	}
	
if(cnt == 1){

return true;
}else {

return false;
}

}




function passwordch1()
{
	var cnt = 0;
	var password       = document.getElementById('apassword').value;
	var newpassword         = document.getElementById('newpassword').value;
	var conpassword          = document.getElementById('conpassword').value;
	
//alert(document.getElementById('password').value);
if(document.getElementById('apassword').value=='')
	{ 
      document.getElementById("msgpwd").innerHTML="Please enter old password";
	  // return false;
	} else if(document.getElementById('apassword').value!='') {
	document.getElementById('msgpwd').innerHTML="";
	cnt++;
	}
		
	
 if(document.getElementById('newpassword').value=='')
	{
	  document.getElementById("msgnewpassword").innerHTML="Please enter new password";
	  //return false;
	} else if(document.getElementById('newpassword').value!='') {
	document.getElementById('msgnewpassword').innerHTML="";
	cnt++;
	}
	
	
if(document.getElementById('conpassword').value=='')
	{
	  document.getElementById("msgconpassword").innerHTML="Please enter confirm password";
	  //alert("Please enter conform password");
	  //return false;
	} /* else if(document.getElementById('conpassword').value!='') {
	document.getElementById('msgconpassword').innerHTML="";
	cnt++;
	}*/
	
    else if(document.chpassword.newpassword.value !=document.chpassword.conpassword.value)
	{
	  document.getElementById("msgconpassword").innerHTML="Password did not match";
	  //alert("Password did not match");
	  //return false;
	} else if(document.chpassword.newpassword.value ==document.chpassword.conpassword.value) {
	document.getElementById('msgconpassword').innerHTML="";
	cnt++;
	}
	

	
if(cnt == 3){
//alert("Now you can submit the form");
return true;
}else {
//alert("not submit");
return false;
}

}

/*Abhishek validation*/
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
function priceFor(sText,id)
{
 var ValidChars = "0123456789";
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