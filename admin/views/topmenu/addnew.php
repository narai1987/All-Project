
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

function isValidURL(url){
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if(RegExp.test(url)){
        return true;
    }else{
        return false;
    }
}

function menuValidation() {	
	
var chk = 1; 
   if(document.getElementById('type').value == '') {
	document.getElementById('msgtype').innerHTML ="*Required Field.";	
	document.getElementById('msgtype').className="error-message";
	chk = 0;	
	}else {
	document.getElementById('msgtype').innerHTML = "";
	document.getElementById('msgtype').className="";
	}
	
	
	if(document.getElementById('title').value == '') {
	document.getElementById('titleid').innerHTML ="*Required Field.";	
	document.getElementById('titleid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('title').value)) {	
	document.getElementById('titleid').innerHTML = "*Must be letters only.";	
	document.getElementById('titleid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('titleid').innerHTML = "";
	document.getElementById('titleid').className="";
	}
	
	if(document.getElementById('link').value ==0) { 
	document.getElementById('linkid').className="error-message";	
	document.getElementById('linkid').innerHTML ="*Required Field.";			
	chk = 0;	
	}/*else if(!isValidURL(document.getElementById('link').value)){
	document.getElementById('linkid').innerHTML = "*Must be url only.";	
	document.getElementById('linkid').className="error-message";
	chk = 0;
	}*/
	
	else {
	document.getElementById('linkid').innerHTML = "";
	document.getElementById('linkid').className="";	
	}
	
		if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

function s_new(){

	
document.getElementById("title").value="";	
document.getElementById("link").value="";	
document.getElementById("titleid").innerHTML = "";
document.getElementById("linkid").innerHTML = "";
}
function btnCancel() {
	document.location = "index.php?control=topmenu";
}

</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="t_menus">
<table width="99%">
<tr>
<td width="45%">Add New</td> 
<td></td>
<td></td>
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">
<br />
<form method="post" action="index.php" onsubmit="return menuValidation();" >

<table width="98%" cellpadding="1" cellspacing="2" class="tab_regis">

<tr>
<td align="right" width="15%" valign="top"><strong>Menu Tpye :</strong></td>
<td><select name="type" id="type" >
   <option value="">Select </option>
   <option value="top" <?php if($results['menu']->menutype == 'top') {?> selected="selected" <?php } ?>>Top Menu </option>
   <option value="footer" <?php if($results['menu']->menutype == 'footer') {?> selected="selected" <?php } ?>>Footer Menu</option>

</select>

<span id="msgtype" style="color:red;" class="font"></span>
</td>
</tr>


<tr>
<td align="right" width="15%" valign="top"><strong> Title :</strong></td>
<td><input type="text" name="title" id="title" value="<?php echo $results['menu']->title ?>" class="reg_txt" /><span id="titleid" style="color:red;" class="font"></span>
</td>
</tr>

<tr>
<td align="right" valign="top"><strong>Link :</strong></td>
<td><input type="text" id="link" name="link" value="<?php echo $results['menu']->link ?>" class="reg_txt" /><span id="linkid" style="color:red;" class="font"></span>
</td>
</tr>

<tr>
<td align="right" valign="top"></td>
<td><input class="submit" type="submit" value="Save" />
    <input class="submit" type="button" value="Cancel" onclick="btnCancel()" />
</td>
</tr>

</table>
<br />
<p align="center">
    <input type="hidden" name="control" value="topmenu"/>
    <input type="hidden" name="edit" value="1"/>
    <input type="hidden" name="task" value="savemenu"/>
    <input type="hidden" name="id" id="id" value="<?php echo $results['menu']->id; ?>"/>
    


</p>    
</form>
</div>
</div>





      
</div>