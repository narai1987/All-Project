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
	
	/*Check image type*/
	var logo = document.getElementById("logo").value;
	var fzipLength = logo.length;
	var fzipDot = logo.lastIndexOf(".");
	var fzipType = logo.substring(fzipDot,fzipLength);
	if(logo) {
		if((fzipType==".jpeg")||(fzipType==".jpg")||(fzipType==".gif")||(fzipType==".png")) {
			document.getElementById('logomsg').innerHTML = "";			
		}
		else {		
			document.getElementById('logomsg').innerHTML = "Invalid file format";
			chk = 0;
		}
	}
	else {
		document.getElementById('logomsg').innerHTML = "";
	}
	/*Check image type*/	
	
		
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
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td class="main_txt" width="75%">Update Profile</td>
            <td></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container">
      <table width="98%" cellpadding="0" cellspacing="2" class="tab_field">
        <tr valign="top"> 
          <!--<td width="15%" align="right"><strong>Use Avatar:</strong></td>-->
          <?php $image = $result['image']?"images/admin/".$result['image']:"images/admin/avtar.png";
	?>
          <td width="15%"><img src="<?php echo $image;?>" alt="" class="img_avatar" /></td>
          
          <!-- <td align="left" valign="bottom"><button type="submit" class="profile_button">Select Image</button></td>--> 
        </tr>
      </table>
      <form action="index.php" method="post" onsubmit="return updateprofile();" enctype="multipart/form-data" >
        <?php ///$image = $result['image']?"images/admin/".$result['image']:"images/admin/avtar.png";
	?>
        <fieldset class="field_profile" >
          <legend>Personal Detail</legend>
          <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
            <tr> 
              <!--<td align="right"><img src="<?php echo $image;?>" alt="" class="img_avatar" /></td>--> 
              
            </tr>
            <tr>
              <td align="right" width="15%" valign="top"><strong>First Name : </strong></td>
              <td width="20%" align="left"><input type="text" id="fname" name="fname" value="<?php echo $result['fname']; ?>" />
                <div id="fnameid" style="color:red;" class="font"></div></td>
              <td align="right" width="15%" valign="top"><strong>Last Name : </strong></td>
              <td width="20%" align="left"><input type="text" id="lname" name="lname" value="<?php echo $result['lname']; ?>" />
                <div id="lnameid" style="color:red;" class="font"></div></td>
            </tr>
          
            <tr>
              <td align="right" width="15%" valign="top"><strong>Email ID  : </strong></td>
              <td width="20%" align="left"><input type="text" id="email" name="email" value="<?php echo $result['email']; ?>" />
                <div id="emailid" style="color:red;" class="font"></div></td>
              <td align="right" width="15%" valign="top"><strong>Mobile No : </strong></td>
              <td width="20%" align="left"><input type="text" id="mobile" name="mobile" value="<?php echo $result['mobile']; ?>"  maxlength="10" />
                <div id="mobileid" style="color:red;" class="font"></div></td>
              <td></td>
            </tr>
            <tr>
              <td align="right" width="15%" valign="top"><strong>Gender : </strong></td>
              <td width="20%" align="left"><input type="radio" value="1" name="gender" <?php if($result['gender']=="1"){ ?> checked="checked" <?php } ?>  />
                &nbsp;Male
                <input type="radio"  value="0" name="gender" <?php  if($result['gender']=="0"){  ?> checked="checked" <?php } ?>   />
                &nbsp;Female</td>
              <td align="right" width="15%" valign="top"><strong>Profile Image : </strong></td>
              <td colspan="3"><input type="file"  name="logo" id="logo" class="submit" />
                <p id="logomsg" style="color:#F00;"></p></td>
            </tr>
             </table>
             <div align="center" style="margin-top:15px;">
          <input type="hidden" name="control" value="user"/>
                <input type="hidden" name="view" value="updateprofile"/>
                <input type="hidden" name="task" value="updateprofile"/>
                <input type="hidden" name="id" value="<?php echo $_SESSION['adminid']; ?>"  />
                <button class="lang_button" type="submit"><strong>Save</strong></button></td>
          
         </div>
        </fieldset>
        <br />
      </form>
    </div>
  </div>
</div>
