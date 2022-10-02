<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php">Home</a> >> <a class="active" href="index.php?control=user&task=changemypass">Change Password</a></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel" style="width:100% !important;">
        <div class="page_heading">Change Password</div>
        <div class="my_account_cont">
          <div class="account_box">
         
         
           
           <?php if($_GET['msg'] == 'success') { ?> 
           <p class="acc_heading">Your Password<span style="float:right;color:#090;">Your Password has been succesfully changed.</span></p>
           <?php } else { if($_GET['success'] == 'success') {?>
            <p class="acc_heading">Dear User<span style="float:right;color:#090;">You Can changed Password Here.</span></p><?php } ?>
              <form name="editPass" action="index.php" method="post">
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
              <!--<tr>
                <td width="130"><label><span>*</span>Old Password:</label></td>
                <td><input name="oldpass" id="oldpass" type="password" /><em id="msgoldpass" style="color:#F00;"></em></td>
              </tr>-->
              <tr>
                <td width="130"><label><span>*</span>New Password:</label></td>
                <td><input name="newpass" id="newpass" type="password" /><em id="msgnewpass" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span> Confirm Password:</label></td>
                <td><input name="cpass" id="cpass" type="password" /><em id="msgcpass" style="color:#F00;"></em></td>
              </tr>
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right"><a class="account_btn" onclick="checkVali()" style="cursor:pointer;">Update</a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="user" />
            <input type="hidden" name="task" value="updatePass" />
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />
            <input type="hidden" name="token" value="<?php echo $_REQUEST['token']; ?>" />
            </form>
            <?php } ?>
            </div>
            
          </div>
      </div> 
      
       <div class="clr"></div>
    </div>
  </div>
  
  <script type="text/javascript">
  function checkVali(){
  var chk=1;
/*	if(document.getElementById('oldpass').value == '') { 
	document.getElementById('msgoldpass').innerHTML ="*Required field.";
	chk=0;
	}else { 
	document.getElementById('msgoldpass').innerHTML ='';
	}*/
	
	if(document.getElementById('newpass').value == '') { 
	document.getElementById('msgnewpass').innerHTML ="*Required field.";
	chk=0;
	}else { 
	document.getElementById('msgnewpass').innerHTML ='';
	}
	
  if(document.getElementById('cpass').value == '') { 
	document.getElementById('msgcpass').innerHTML ="*Required field.";
	chk=0;
	}else if(document.getElementById('cpass').value != document.getElementById('newpass').value) { 
	document.getElementById('msgcpass').innerHTML ="*Password not match.";
	chk=0;
	}else {
	document.getElementById('msgcpass').innerHTML = "";
	}
	
	
	
    
	
  if(chk) {	
	document.forms['editPass'].submit();
	}
  }
  </script>