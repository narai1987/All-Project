
<script type="text/javascript">

function changepassword() {
	
	
var chk = 1;
	
	
	if(document.getElementById('password').value == '') {
	document.getElementById('passwordid').innerHTML ="*Required Field.";	
	document.getElementById('passwordid').className="error-message";
	chk = 0;	
	}else {
	document.getElementById('passwordid').innerHTML = "";
	document.getElementById('passwordid').className="";
	}
	
	if(document.getElementById('cpassword').value =="") {
	document.getElementById('cpasswordid').innerHTML ="*Required Field.";	
	document.getElementById('cpasswordid').className="error-message";
	chk = 0;	
	}else if((document.getElementById('password').value!=document.getElementById('cpassword').value) && ((document.getElementById('cpassword').value != '')&& (document.getElementById('password').value != '')  )) {
	document.getElementById('cpasswordid').innerHTML ="*Password did not match.";	
	document.getElementById('cpasswordid').className="error-message";
	chk = 0;	
	}else{
	document.getElementById('cpasswordid').innerHTML = "";
	document.getElementById('cpasswordid').className="";
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
<table width="99%"><tr><td width="75%">Change Password</td> 
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container">
<form action="index.php" method="post" onsubmit="return changepassword();">
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
<tr>
<td align="right" width="15%" valign="top"><strong>New Password :</strong></td>
<td width="20%" align="left"><input type="password" id="password" name="password" class="regis_area" style="width:200px;" /><div id="passwordid" ></div></td>
<td></td>
</tr>
<tr>
<td align="right" valign="top"><strong>Confirm Password :</strong></td>
<td align="left">
<input type="password" name="cpassword" id="cpassword" class="regis_area" style="width:200px;" /><div id="cpasswordid" ></div>
</td>
<td></td>

</tr>

<tr>
<td colspan="2" align="center" style="padding-right:10px;">
<input type="hidden" name="control" value="user"/>
<input type="hidden" name="view" value="changepassword"/>
<input type="hidden" name="task" value="changepassword"/>
<input type="hidden" name="id" value="<?php echo $_SESSION['adminid']; ?>"  />
<button class="submit" type="submit"><strong>Save</strong></button> 
</td>
</tr>
</table>

</form>

</div>
</div>  
</div> 
