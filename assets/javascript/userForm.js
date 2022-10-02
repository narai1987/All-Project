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


function useredit()
{ 
	var cnt = 0;
	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	//var uemail = document.getElementById('email').value;
	var mobile = document.getElementById('mobile').value;
	/*var gender        = document.getElementById('gender').value;*/
	
	
	if(document.getElementById("fname").value=='')
	{
	  document.getElementById("msgfname").innerHTML="Please enter first name";
	  //return false;
	} else if(!isletter(fname))
	{
	 document.getElementById("msgfname").innerHTML="Please enter valid first name";
	 //return false;
	} else if(document.getElementById('fname').value!='') {
	document.getElementById('msgfname').innerHTML="";
	cnt++;
	}
	
  if(document.getElementById('lname').value=='')
	{
	 document.getElementById("msglname").innerHTML="Please enter last name";
	  //return false;
	}
	else if(!isletter(lname))
	{
	  document.getElementById("msglname").innerHTML="Please enter valid last name";
	// return false;
	} else if(document.getElementById('lname').value!='') {
	document.getElementById('msglname').innerHTML="";
	cnt++;
	}
	
	
 /* if(document.getElementById('email').value=='')
	{
	  document.getElementById("msguemail").innerHTML="Please enter email";
	  //return false;
	}
	else if(!isEmail(uemail))
	 {
	  document.getElementById("msguemail").innerHTML="Please enter valid email-id";
	  //return false;
	 }  else if(document.getElementById('email').value!='') {
	document.getElementById('msguemail').innerHTML="";
	cnt++;
	}
	 */
  /* if(document.getElementById('mobile').value=='')
	{
	  document.getElementById('msgmobile').innerHTML="Please enter mobile no.";
	  //return false;
	}
	else if(!numeric(mobile))
	{
	   document.getElementById('msgmobile').innerHTML="Please enter valid mobile no.";
	  //return false;
	} else if(document.getElementById('mobile').value!='') {
	document.getElementById('msgmobile').innerHTML="";
	cnt++;
	}
	 alert("hello");*/

	
	if(cnt == 2){
		//alert("Now you can submit the form");
		return true;
	}else {
		//alert("not submit");
		return false;
	}

}

function passwordch()
{
	var cnt = 0;
	var password       = document.getElementById('apassword').value;
	var newpassword         = document.getElementById('newpassword').value;
	var conpassword          = document.getElementById('conpassword').value;
	
if(document.getElementById('apassword').value=='')
	{ 
      document.getElementById("msgpsd").innerHTML="Please enter old password";
	
	  // return false;
	} else if(document.getElementById('apassword').value!='') {
	document.getElementById('msgpsd').innerHTML="";
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
	  
	} 
	
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
		return true;
	}
	else {
		return false;
	}

}
