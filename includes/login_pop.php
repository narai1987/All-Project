<style type="text/css">
.inrequired{
border:1px solid #F03 !important;
}
</style>
<div id="popupContact_login"><?php //print_r($termsConditionMenus);?>
                    <div class="content_area_login">
                    	<div class="login_f_header"><div class="login_here f_left">LOGIN HERE</div><div class="sign_here f_right">SIGN UP HERE</div></div> 
                      <div class="login_area">
                        	
                            <div class="login_here f_left">
                            	<a href="#"><img src="<?php echo $tmp;?>/images/lwf.png" width="239" height="30" /></a>
                                <p class="or"><img src="<?php echo $tmp;?>/images/or.png" width="233" height="10" /></p>
                            <form name="frontLogin" action="index.php" method="post" onsubmit="return uservali();">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                
                                  <tr>
                                    <td><input class="login_txt l_username" placeholder="Username" name="username" id="username" type="text"  tabindex="1"/>
                                      <span id="msgusername" style="color:red;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_password" placeholder="Password"  name="password" type="password" id="password" tabindex="2" maxlength="20"/>
                                     <span id="msgpassword" style="color:red;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><div class="agree">
                                     
                                   <label class="label_check" for="checkbox-01" ><input name="sample-checkbox-01" id="checkbox-01" tabindex="3" value="1" type="checkbox"></label>Remember me <span class="blue"><a href="index.php?control=user&task=forgotpass">Forgot password?</a></span>
                                    </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><a href="#" class="login_btn" tabindex="4" onclick="uservali();">Login</a></td>
                                    
                                  </tr>
                                </table>
                                	<input type="submit"  style="visibility:hidden;"/>
                                    <input type="hidden" name="control" value="user" />
                                    
                                    <input type="hidden" name="task" value="login" />
                                    
                                    <input type="hidden" name="redirectUri" value="<?php echo $_SERVER['QUERY_STRING'] ?>" />
                                </form>
                            </div>
                            
                            
                            <div class="login_sep f_left"></div>
                        <div class="signup_here login_here f_right">
                        		<a href="#"><img src="<?php echo $tmp;?>/images/swf.png" width="239" height="30" /></a>
                                <p class="or"><img src="<?php echo $tmp;?>/images/or.png" width="233" height="10" /></p>
                            <form name="frontRegister" action="index.php" method="post"  onsubmit="return userfbValidate();">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><input class="login_txt l_username" placeholder="First Name" tabindex="5" name="fname" id="fname" type="text" />
                                    <span id="msgfname" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_username" placeholder="Last Name" tabindex="6"  name="lname" type="text" id="lname"/>
                                    <span id="msglname" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_username" placeholder="Username" name="username" tabindex="7"  type="text" id="rusername"/>
                                    <span id="msgrusername" style="color:red;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_email" placeholder="Email" name="email" id="email" tabindex="7"  type="text" />
                                     <span id="msgemail" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_password" placeholder="Password" tabindex="8"  name="password" id="rpassword" type="password" maxlength="20"/>
                                     <span id="msgrpassword" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_password" placeholder="Confirm Password" tabindex="8"  name="cpassword" id="cpassword" type="password" maxlength="20"/>
                                     <span id="msgcpassword" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input class="login_txt l_tel" placeholder="Mobile no." tabindex="9"  name="mobile" id="mobile" type="text" maxlength="15"/>
                                     <span id="msgmobile" style="color:red;font-weight:bold;" class="font"></span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><div class="agree">
                                    <?php  foreach($termsConditionMenus as $termsConditionMenu) {?>
                                      <!--<input type="checkbox" name="genre" id="check-2" value="agree" /><label for="check-2"></label>I agree to the <span class="orange"><a href="#">Terms & Conditions</a></span>--><label class="label_check" for="checkbox-02"><input name="sample-checkbox-02" tabindex="10"  id="checkbox-02" value="1" type="checkbox"></label>I agree to the <span class="orange"><a href="<?php echo $termsConditionMenu['link'];?>">Terms & Conditions</a></span>
                                      <?php } ?>
                                    </div></td>
                                  </tr>
                                  <tr>
                                    <td><a href="#" class="login_btn tabindex="11" " onclick="userfbValidate();">Create Account</a></td>
                                  </tr>
                                </table>
                                
                                	<input type="submit"  style="visibility:hidden;"/>
                                    <input type="hidden" name="control" value="user" />
                                    
                                    <input type="hidden" name="task" value="register" />
                                </form>
                        </div>
                            <div class="clr"></div>
                      </div>
                        <a href="#" id="popupContactClose_login"><img title="Close" src="<?php echo $tmp;?>/images/q_close.png" width="16" height="15" /></a>
                    </div>
                </div>
                
        <script type="text/javascript">

function isEmail(text)
{
	
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	//"^[\\w-_\.]*[\\w-_\.]\@[\\w]\.\+[\\w]+[\\w]$";
	var regex = new RegExp( pattern );
	return regex.test(text);
	
}

function isletter(txt)
{
	var iChars = "!@#$^&*+=[]\\\/{}|\":<>?0123456789";
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




function userfbValidate()
{  
	//alert("Hello");
   
	var chk=1;
	/*document.getElementById('fname').value ='';
	document.getElementById('lname').value='';*/
	
	
	if(document.getElementById('fname').value == '') { 
	//document.getElementById('msgfname').innerHTML ="*Required field.";
	document.getElementById('fname').className ="login_txt l_username inrequired";
	chk=0;
	}else if(!isletter(document.getElementById('fname').value)){ 
	document.getElementById('msgfname').innerHTML ="Must be letters only.";
	document.getElementById('fname').className ="login_txt l_username inrequired";
	chk=0;	
    }else { 
	document.getElementById('msgfname').innerHTML ='';
	document.getElementById('fname').className ="login_txt l_username";
	}
	
	if(document.getElementById('lname').value == '') { 
	//document.getElementById('msglname').innerHTML ="*Required field.";
	document.getElementById('lname').className ="login_txt l_username inrequired";
	chk=0;
	}else if(!isletter(document.getElementById('lname').value)){ 
	document.getElementById('msglname').innerHTML ="Must be letters only.";
	document.getElementById('lname').className ="login_txt l_username inrequired";
	chk=0;	
    }else { 
	document.getElementById('msglname').innerHTML ='';
	document.getElementById('lname').className ="login_txt l_username";
	}
	
	if(document.getElementById('rusername').value == '') { 
	//document.getElementById('msgrusername').innerHTML ="*Required field.";
	document.getElementById('rusername').className ="login_txt l_username inrequired";
	chk=0;
	}/*else if(!isletter(document.getElementById('rusername').value)){ 
	document.getElementById('msgrusername').innerHTML ="*Must be letters only.";
	chk=0;	
    }*/else { 
	document.getElementById('msgrusername').innerHTML ='';
	document.getElementById('rusername').className ="login_txt l_username";
	}
	
  if(document.getElementById('email').value == '') { 
	//document.getElementById('msgemail').innerHTML ="*Required field.";
	document.getElementById('email').className ="login_txt l_email inrequired";
	chk=0;
	}else if(!isEmail(document.getElementById('email').value)){ 
	document.getElementById('msgemail').innerHTML ="Must be valid Email-Id.";
	document.getElementById('email').className ="login_txt l_email inrequired";
	chk=0;	
    }else {
	document.getElementById('msgemail').innerHTML = "";
	document.getElementById('email').className ="login_txt l_email";
	}
	
	if(document.getElementById('rpassword').value == '') { 
	//document.getElementById('msgrpassword').innerHTML ="*Required field.";
	document.getElementById('rpassword').className ="login_txt l_password inrequired";
	chk=0;
	}else if((document.getElementById('rpassword').value.length) < 4 ) { 
	document.getElementById('msgcpassword').innerHTML ="*Must be between 4 to 20 characters.";
    chk=0;
	}else {
	document.getElementById('msgrpassword').innerHTML = "";
	document.getElementById('rpassword').className ="login_txt l_password";
	}
  
	if(document.getElementById('cpassword').value == '') { 
	//document.getElementById('msgcpassword').innerHTML ="*Required field.";
	document.getElementById('cpassword').className ="login_txt l_password inrequired";
	chk=0;
	}else if((document.getElementById('rpassword').value.length) < 4 ) { 
	
	document.getElementById('msgcpassword').innerHTML ="*Must be between 4 to 20 characters.";
    chk=0;
	}else if(document.getElementById('cpassword').value != document.getElementById('rpassword').value) { 
	document.getElementById('msgcpassword').innerHTML ="Password did not match.";
	document.getElementById('cpassword').className ="login_txt l_password inrequired";
	chk=0;
	}else {
	document.getElementById('msgcpassword').innerHTML = "";
	document.getElementById('cpassword').className ="login_txt l_password";
	}
	
/*  if(document.getElementById('cpassword').value != document.getElementById('rpassword').value) { 
	document.getElementById('msgcpassword').innerHTML ="Password did not match.";
	document.getElementById('cpassword').className ="login_txt l_password inrequired";
	chk=0;
	}else {
	document.getElementById('msgcpassword').innerHTML = "";
	document.getElementById('cpassword').className ="login_txt l_password";
	}*/
	
  
/*	if(document.getElementById('mobile').value == '') { 
	//document.getElementById('msglname').innerHTML ="*Required field.";
	document.getElementById('mobile').className ="login_txt l_tel inrequired";
	chk=0;
	}else if(isletter(document.getElementById('mobile').value)){ 
	document.getElementById('msgmobile').innerHTML ="Must be numbers only.";
	document.getElementById('mobile').className ="login_txt l_tel inrequired";
	chk=0;	
    }else { 
	document.getElementById('msgmobile').innerHTML ='';
	document.getElementById('mobile').className ="login_txt l_username";
	}*/
	
	if(document.getElementById('mobile').value == '') { 
	//document.getElementById('msgmobile').innerHTML ="*Required field.";
	document.getElementById('mobile').className ="login_txt l_tel inrequired";
	chk=0;
	}else if(!numeric(document.getElementById('mobile').value)){ 
	document.getElementById('msgmobile').innerHTML ="*Must be numeric only.";
	//document.getElementById('mobile').className ="login_txt l_tel inrequired";
	chk=0;	
    }/*else if((document.getElementById('mobile').value.length) < 10 ) {
	document.getElementById('mobile').className ="error-message";
	document.getElementById('msgmobile').innerHTML = "*Must be between 10 to 15 Nos.";
	chk=0;	
	}*/else {
	document.getElementById('msgmobile').innerHTML = "";
	document.getElementById('mobile').className ="login_txt l_tel";
	}
	
	

	if(chk) {	
		document.forms['frontRegister'].submit();
		}else{
		return false;
		}
			

}




function uservali()
{  
	//alert("Hello");
   
	var chk=1;
	if(document.getElementById('username').value == '') { 
	//document.getElementById('msgusername').innerHTML ="*Required field.";
	document.getElementById('username').className ="login_txt l_username inrequired";
	chk=0;
	}else { 
	//document.getElementById('msgusername').innerHTML ='';
	document.getElementById('username').className ="login_txt l_username";
	}
	
	if(document.getElementById('password').value == '') { 
	//document.getElementById('msgpassword').innerHTML ="*Required field.";
	document.getElementById('password').className ="login_txt l_password inrequired";
	chk=0;
	}else { 
	//document.getElementById('msgpassword').innerHTML ='';
	document.getElementById('password').className ="login_txt l_password";
	}

	
  if(chk) {	
		document.forms['frontLogin'].submit();
		}else{
		return false;
		}
			

}

	

</script>        
                