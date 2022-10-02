<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php">Home</a> >> <a href="index.php?control=myaccount">My account</a> >> <a href="index.php?control=myaccount&task=addressBook">Address Book</a> >> <!--<a class="active" href="#">--><b><?php  if($results[0]['id']) { ?>Edit Address <?php } else { echo "Add Address"; }?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading">Address Book</div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php  if($results[0]['id']) { ?>Edit Address <?php } else { echo "Add Address"; }?></p>
            <form name="addressBook" action="index.php" method="post">
            <table class="account_form" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="130"><label><span>*</span> First Name:</label></td>
                <td><input name="fname" id="fname" type="text" value="<?php echo $results[0]['fname']; ?>"/><em id="msgfname" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span> Last Name:</label></td>
                <td><input name="lname" id="lname" type="text" value="<?php echo $results[0]['lname']; ?>" /><em id="msglname" style="color:#F00;"></em></td>
              </tr>
              
              <tr>
                <td valign="top"><label><span>*</span> Address 1:</label></td>
                <td><textarea name="addressone" id="addressone" cols="" rows=""><?php echo $results[0]['addressone']; ?></textarea><em id="msgaddressone" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td valign="top"><label><span>&nbsp;&nbsp;</span> Address 2:</label></td>
                <td><textarea name="addresstwo" id="addresstwo" cols="" rows=""><?php echo $results[0]['addresstwo']; ?></textarea></td>
              </tr>
              <tr>
                <td><label><span>*</span> City:</label></td>
                <td><input name="city" id="city" type="text" value="<?php echo $results[0]['city']; ?>" /><em id="msgcity" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span> Post Code:</label></td>
                <td><input name="pcode" id="pcode" type="text" value="<?php echo $results[0]['postalcode']; ?>" maxlength="6"/><em id="msgpcode" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span> Region/State:</label></td>
                <td><input name="state" id="state" type="text" value="<?php echo $results[0]['state']; ?>" /><em id="msgstate" style="color:#F00;"></em></td>
              </tr>
              <tr>
                <td><label><span>*</span> Country:</label></td>
                <td><input name="country" id="country" type="text" value="<?php echo $results[0]['country']; ?>" /><em id="msgcountry" style="color:#F00;"></em></td>
              </tr>
              
            </table>
            <div class="bottom_action">
            	<table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><a class="account_btn" href="index.php?control=myaccount&task=addressBook">Back</a></td>
                    <td align="right"><a class="account_btn" onclick="checkVali()" style="cursor:pointer;">Save</a></td>
                  </tr>
                </table>
            </div>
            <input type="hidden" name="control" value="myaccount" />
            <input type="hidden" name="task" value="saveAddress" />
            <input type="hidden" name="id" id="idd" value="<?php echo $results[0]['id']; ?>" />
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

function special(txt)
{
	var iChars = "!@#$^&*()+=-[]\\\';,./{}|\":<>?";
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
	
	
	
  if(document.getElementById('addressone').value == '') { 
	document.getElementById('msgaddressone').innerHTML ="*Required field.";
	chk=0;
	}else {
	document.getElementById('msgaddressone').innerHTML = "";
	}
	
  if(document.getElementById('city').value == '') { 
	document.getElementById('msgcity').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('city').value)) { 
	document.getElementById('msgcity').innerHTML ="*Must be letters only.";
	chk=0;
	}else {
	document.getElementById('msgcity').innerHTML = "";
	}
	
  if(document.getElementById('pcode').value == '') { 
	document.getElementById('msgpcode').innerHTML ="*Required field.";
	chk=0;
	}else if(!special(document.getElementById('pcode').value)){ 
	document.getElementById('msgpcode').innerHTML ="*Must be alpha numeric.";
	chk=0;	
    }else {
	document.getElementById('msgpcode').innerHTML = "";
	}
	
  if(document.getElementById('country').value == '') { 
	document.getElementById('msgcountry').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('country').value)) { 
	document.getElementById('msgcountry').innerHTML ="*Must be letters only.";
	chk=0;
	}else {
	document.getElementById('msgcountry').innerHTML = "";
	}
	
  if(document.getElementById('state').value == '') { 
	document.getElementById('msgstate').innerHTML ="*Required field.";
	chk=0;
	}else if(!isletter(document.getElementById('state').value)) { 
	document.getElementById('msgstate').innerHTML ="*Must be letters only.";
	chk=0;
	}else {
	document.getElementById('msgstate').innerHTML = "";
	}
	
  
	
  if(chk) {	
	document.forms['addressBook'].submit();
	}
  }
  </script>
  
  
  