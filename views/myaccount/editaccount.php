<?php $taxonomy = $this->taxolist();

?>
<style type="text/css">
.imgAvatar {
	background-color: #ECFAF9;
	-moz-border-radius: 10px 30px;
	border-radius: 33px 27px / 135px 10px;
	border: 1px solid #E4E4F3;
	padding: 5px;
	width:90px;
	height:90px;
}
</style>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >><!-- <a class="active" href="index.php?control=myaccount&task=editAccount">--><b><?php echo $taxonomy['edit_account'];?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['my_account_information'];?></div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['your_personal_details'];?> </p>
            <form name="editAccount" action="index.php" method="post" enctype="multipart/form-data">
            
            <div style="float:right;">
           <img src="images/user/<?php echo $results[0]['image'] ?>" class="imgAvatar" alt="infranix.com"/>
            </div>
            <table class="account_form" width="70%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><label><span>&nbsp;&nbsp;</span><?php //echo $taxonomy['username'];?>Username  :</label></td>
                <td><input name="username" id="username" type="text" readonly="readonly" value="<?php echo $results[0]['username'] ?>"/></td>
              </tr>
              <tr>
                <td width="130"><label><span>*</span>First Name<?php //echo $taxonomy['first_name'];?> :</label></td>
                <td><input name="fname" id="fname" type="text" value="<?php echo $results[0]['fname'] ?>"/>
                <em id="msgfname" style="color:#F00;"></em>
                </td>
              </tr>
              <tr>
                <td><label><span>*</span>Last Name<?php //echo $taxonomy['last_name'];?> :</label></td>
                <td><input name="lname" id="lname" type="text"  value="<?php echo $results[0]['lname'] ?>"/><em id="msglname" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span>E-Mail<?php //echo $taxonomy['e-mail'];?> :</label></td>
                <td><input name="email" id="email" type="text"  value="<?php echo $results[0]['email'] ?>"/><em id="msgemail" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span>Mobile<?php //echo $taxonomy['Mobile'];?> :</label></td>
                <td><input name="mobile" id="mobile" type="text"  value="<?php echo $results[0]['mobile'] ?>" maxlength="15"/><em id="msgmobile" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label>Profile Image :</label></td>
                <td><input name="avatar" id="avatar" type="file"  /></td>
              </tr>
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><!--<a class="account_btn" href="my_account.html">Back</a>--></td>
                    <td align="right"><a class="account_btn" onclick="checkVali()" style="cursor:pointer;">Update<?php //echo $taxonomy['update'];?></a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="myaccount" />
            <input type="hidden" name="task" value="updateAccount" />
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



  
  function checkVali(){
  var chk=1;
	if(document.getElementById('fname').value == '') { 
	document.getElementById('msgfname').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('fname').value)){ 
	document.getElementById('msgfname').innerHTML ="*Must be letters only.";
	chk=0;	
    }else if((document.getElementById('fname').value.length) < 2 ) {
	document.getElementById('msgfname').innerHTML = "*Must be 2 or more characters.";
	chk=0;	
	}else { 
	document.getElementById('msgfname').innerHTML ='';
    }
	
	
	if(document.getElementById('lname').value == '') { 
	document.getElementById('msglname').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('lname').value)){ 
	document.getElementById('msglname').innerHTML ="*Must be letters only.";
	chk=0;	
    }else if((document.getElementById('lname').value.length) < 2 ) {
	document.getElementById('msglname').innerHTML = "*Must be 2 or more characters.";
	chk=0;	
	}else { 
	document.getElementById('msglname').innerHTML ='';
    }
	
	
	
  if(document.getElementById('email').value == '') { 
	document.getElementById('msgemail').innerHTML ="*Required field.";
	chk=0;
	}else if(!isEmail(document.getElementById('email').value)){ 
	document.getElementById('msgemail').innerHTML ="*Should be valid Email Id.";
	chk=0;	
    }else {
	document.getElementById('msgemail').innerHTML = "";
	document.getElementById('msgemail').className ="";
	}
	
 if(document.getElementById('mobile').value == '') { 
	document.getElementById('msgmobile').innerHTML ="*Required field.";
	chk=0;
	}else if(!numeric(document.getElementById('mobile').value)){ 
	document.getElementById('msgmobile').innerHTML ="*Must be numeric only.";
	chk=0;	
    }/*else if((document.getElementById('mobile').value.length) < 10 ) {
	document.getElementById('msgmobile').innerHTML = "*Must be 10 no.";
	chk=0;	
	}*/else {
	document.getElementById('msgmobile').innerHTML = "";
	}
	
  
	
  if(chk) {	
	document.forms['editAccount'].submit();
	}
  }
  </script>