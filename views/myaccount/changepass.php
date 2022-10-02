<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >> <!--<a class="active" href="index.php?control=myaccount&task=changePass">--><b><?php echo $taxonomy['change_password'];?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['change_password'];?></div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['your_password'];?> <?php if($_GET['msg'] == 'incorrect') { ?><span style="float:right;color:#F00;">Old password is incorrect</span><?php } if($_GET['msg'] == 'correct') {?><span style="float:right;color:#0C3;"><?php echo $taxonomy['password_changed_sucessfully'];?> </span><?php  }?></p>
             <form name="editPass" action="index.php" method="post">
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="130"><label><span>*</span><?php echo $taxonomy['old_password'];?>:</label></td>
                <td><input name="oldpass" id="oldpass" type="password" /><em id="msgoldpass" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td width="130"><label><span>*</span><?php echo $taxonomy['new_password'];?>:</label></td>
                <td><input  name="newpass" id="newpass" type="password" /><em id="msgnewpass" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span><?php echo $taxonomy['confirm_password'];?> :</label></td>
                <td><input  name="cpass" id="cpass" type="password" /><em id="msgcpass" style="color:#F00;"></em></td>
              </tr>
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right"><a class="account_btn" onclick="checkVali()" style="cursor:pointer;"><?php echo $taxonomy['update'];?></a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="myaccount" />
            <input type="hidden" name="task" value="updatePass" />
            </form>
            </div>
            
          </div>
      </div> 
      <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
      </div>
       <div class="clr"></div>
    </div>
  </div>
  
  <script type="text/javascript">
  function checkVali(){
  var chk=1;
	if(document.getElementById('oldpass').value == '') { 
	document.getElementById('msgoldpass').innerHTML ="*Required field.";
	chk=0;
	}else { 
	document.getElementById('msgoldpass').innerHTML ='';
	}
	
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