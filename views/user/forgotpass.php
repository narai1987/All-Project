<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php">Home</a> >> <b>Forgot Password</b></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel" style="width:100% !important;">
        <div class="page_heading">Forgot Password</div>
        <div class="my_account_cont">
          <div class="account_box">
         
         
           
          
             <form name="myforgotPassForm" action="index.php" method="post" onsubmit="return forgotpwd()">
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td width="130"><label><span>*</span>Email-id:</label></td>
                <td><input type="text" name="email" id="forgetemail" class="input_forgot merg_for left" placeholder="Email-id"  /> <em id="msgforgetpass" style="color:#F00;"></em></td>
              </tr>
              
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right">
                    <a class="account_btn" onclick="forgotpwd()" style="cursor:pointer;">Submit</a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="user" />
            <input type="hidden" name="view" value="user"/>
            <input type="hidden" name="task" value="myforgotpassword"/>
             
          
            </form>
            
            </div>
            
          </div>
      </div> 
      
       <div class="clr"></div>
    </div>
  </div>
  
  <script type="text/javascript">
 
function forgotpwd() {
	
	var chk=1;
	
	var forgetemail = document.getElementById('forgetemail').value;
	
	if(document.getElementById('forgetemail').value=='') { 
		document.getElementById("msgforgetpass").innerHTML="Required field";
		chk=0;
	 }
	else if(!isEmail(document.getElementById('forgetemail').value)) { 
		document.getElementById("msgforgetpass").innerHTML="Please enter valid email-id";
		chk=0;
	}  
	else { 
	    document.getElementById('msgforgetpass').innerHTML="";
		
	}
	
  if(chk) {	
	document.forms['myforgotPassForm'].submit();
	}else{
	return false;
	}

}
  </script>