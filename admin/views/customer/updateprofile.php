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



function updateprofile() {
	
	
var chk = 1;
	
	
	if(document.getElementById('fname').value == '') {
	document.getElementById('fnameid').innerHTML ="*Required Field.";	
	document.getElementById('fnameid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('fname').value)) {	
	document.getElementById('fnameid').innerHTML = "*Must be letters only.";	
	document.getElementById('fnameid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('fnameid').innerHTML = "";
	document.getElementById('fnameid').className="";
	}
	
	if(document.getElementById('lname').value == '') {
	document.getElementById('lnameid').innerHTML ="*Required Field.";	
	document.getElementById('lnameid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('lname').value)) {	
	document.getElementById('lnameid').innerHTML = "*Must be letters only.";	
	document.getElementById('lnameid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('lnameid').innerHTML = "";
	document.getElementById('lnameid').className="";
	}
	
	if(document.getElementById('email').value=='') {
	document.getElementById('emailid').className="error-message";	
	document.getElementById('emailid').innerHTML = "*Required Field.";
	chk = 0;
	}
	else if(!isEmail(document.getElementById('email').value)) {
	document.getElementById('emailid').className="error-message";	
	document.getElementById('emailid').innerHTML = "*Enter a valid Email address.";
	chk = 0;
	}
	else{
	document.getElementById('emailid').className="";	
	document.getElementById('emailid').innerHTML = "";
	}
	
		
	if(document.getElementById('mobile').value == '') {
	document.getElementById('mobileid').className="error-message";
	document.getElementById('mobileid').innerHTML = "*Required Field.";
	chk = 0;
	}else if((document.getElementById('mobile').value.length) > 15 ) {
	document.getElementById('mobileid').className="error-message";	
	document.getElementById('mobileid').innerHTML = "*Must be less than 15 digits.";
	chk = 0;
	}else if(!numeric(document.getElementById('mobile').value)) {
	document.getElementById('mobileid').className="error-message";	
	document.getElementById('mobileid').innerHTML = "*Must be Numbers only.";
	chk = 0;	
	}else {
	document.getElementById('mobileid').innerHTML = "";
	document.getElementById('mobileid').className="";

	}	
	
		
		if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

</script>


<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="user_s">
<table width="99%"><tr><td width="75%">Update Profile</td> 
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container">
<form action="index.php" method="post" onsubmit="return updateprofile();" >
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">

<tr>
<td align="right" width="10%" valign="top"><strong>First Name :</strong></td>
<td width="20%" align="left"><input type="text" id="fname" name="fname" value="<?php echo $result['fname']; ?>" class="regis_area" style="width:200px;" /><div id="fnameid" ></div></td>
<td></td>
</tr>
<tr>
<td align="right" width="10%" valign="top"><strong>Last Name :</strong></td>
<td width="20%" align="left"><input type="text" id="lname" name="lname" value="<?php echo $result['lname']; ?>" class="regis_area" style="width:200px;" /><div id="lnameid" ></div></td>
<td></td>
</tr>
<tr>
<td align="right" width="10%" valign="top"><strong>Email ID :</strong></td>
<td width="20%" align="left"><input type="text" id="email" name="email" value="<?php echo $result['email']; ?>" class="regis_area" style="width:200px;" /><div id="emailid" ></div></td>
<td></td>
</tr>
<tr>
<td align="right" width="10%" valign="top"><strong>Mobile No :</strong></td>
<td width="20%" align="left"><input type="text" id="mobile" name="mobile" value="<?php echo $result['mobile']; ?>" class="regis_area" style="width:200px;" maxlength="10" /><div id="mobileid" ></div></td>
<td></td>
</tr>
<tr>
<td align="right" width="10%" valign="top"><strong>Gender :</strong></td>
<td width="20%" align="left"><input type="radio" value="1" name="gender" <?php if($result['gender']=="1"){ ?> checked="checked" <?php } ?>  />&nbsp;Male <input type="radio"  value="0" name="gender" <?php  if($result['gender']=="0"){  ?> checked="checked" <?php } ?>   />&nbsp;Female</td>
<td></td>
</tr>
<tr>
<td colspan="2" align="center" style="padding-right:10px;">
<input type="hidden" name="control" value="user"/>
<input type="hidden" name="view" value="updateprofile"/>
<input type="hidden" name="task" value="updateprofile"/>
<input type="hidden" name="id" value="<?php echo $_SESSION['adminid']; ?>"  />
<button class="submit" type="submit"><strong>Save</strong></button> 
</td>
</tr>
</table>

</form>

</div>
</div>  
</div> 
