<link rel="stylesheet" href="styles/alertmessage.css" />
<script type="text/javascript">
setTimeout("closeMsg('closeid2')",5000);
function closeMsg(clss) {
		document.getElementById(clss).className = "clspop";
	}
</script> 
  <!--for alert message start-->
  <style type="text/css">
.clspop {
	display:none;	
}
		.darkbase_bg {
			display:block !important;
			
		}
		
</style>
  <!--POPUP MESSAGE-->
  <?php 
      if (isset($_SESSION['error']))
{
?>
  <div id="flashMessage" class="message">
    <div  class='darkbase_bg' id='closeid2'>
      <div class='alert_pink' > <a class='pop_close'> <img src="images/close.png" onclick="closeMsg('closeid2')" title="close" /> </a>
        <div class='pop_text <?php echo $_SESSION['errorclass']; ?>'><!--warn_red-->
          <p style='color:#063;'><?php echo $_SESSION['error']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php  
  unset($_SESSION['error']);
  unset($_SESSION['errorclass']);
  }?>
  <!--POPUP MESSAGE CLOSE-->
<script type="text/javascript">

function changepassword() {
	
	
var chk = 1;
	if(document.getElementById('oldpassword').value == '') {
	document.getElementById('msgoldpassword').innerHTML ="*Required Field.";	
	chk = 0;	
	}/*else if(ct==0){ 
	document.getElementById('msgoldpassword').innerHTML ="*Old Password did not match.";
	chk=0;	
    }*/else {
	document.getElementById('msgoldpassword').innerHTML = "";
	}
	
	if(document.getElementById('password').value == '') {
	document.getElementById('passwordid').innerHTML ="*Required Field.";	
	chk = 0;	
	}else {
	document.getElementById('passwordid').innerHTML = "";
	}
	
	if(document.getElementById('cpassword').value =="") {
	document.getElementById('cpasswordid').innerHTML ="*Required Field.";	
	chk = 0;	
	}else if((document.getElementById('password').value!=document.getElementById('cpassword').value) && ((document.getElementById('cpassword').value != '')&& (document.getElementById('password').value != '')  )) {
	document.getElementById('cpasswordid').innerHTML ="*Password did not match.";	
	chk = 0;	
	}else{
	document.getElementById('cpasswordid').innerHTML = "";
	}
	
	
		
	
		
		if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}


/* check email availability 
	for the service provider signup*/
	
	


</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="main_head">
<table width="99%"><tr><td width="75%"  class="main_txt">Change Password</td> 
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container">
<form action="index.php" method="post" onsubmit="return changepassword();">
 <fieldset class="field_profile" >
          <legend>Personal Detail</legend>
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
<tr>
<td align="right" width="30%" valign="top"><strong>Old Password :</strong></td>
<td width="50%" align="left">
<input type="password" id="oldpassword" name="oldpassword" class="regis_area" style="width:200px;" onkeyup="chkPassword(this.value,<?php echo $_SESSION['adminid']; ?>,'user')"/> 
<div id="msgoldpassword" style="color:#F00;"><?php echo $nomatch;?></div></td>
<td></td>
</tr>



<tr>
<td align="right" width="30%" valign="top"><strong>New Password :</strong></td>
<td width="50%" align="left"><input type="password" id="password" name="password" class="regis_area" style="width:200px;" /><div id="passwordid" style="color:red;" class="font"></div></td>
<td></td>
</tr>
<tr>
<td align="right" valign="top"><strong>Confirm Password :</strong></td>
<td align="left">
<input type="password" name="cpassword" id="cpassword" class="regis_area" style="width:200px;" /><div id="cpasswordid" style="color:red;" class="font"></div>
</td>
<td></td>

</tr>
</table><br />

<div align="center">
<input type="hidden" name="control" value="user"/>
<input type="hidden" name="view" value="changepassword"/>
<input type="hidden" name="task" value="changepassword"/>
<input type="hidden" name="id" value="<?php echo $_SESSION['adminid']; ?>"  />
<button class="lang_button" type="submit"><strong>Save</strong></button> 
</div>
<br />

</fieldset>
</form>

</div>
</div>  
</div> 
