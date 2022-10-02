<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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

	if(document.getElementById('sub').value == '') {
	document.getElementById('titleid').innerHTML ="*Required Field.";	
	document.getElementById('titleid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('sub').value)) {	
	document.getElementById('titleid').innerHTML = "*Must be letters only.";	
	document.getElementById('titleid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('titleid').innerHTML = "";
	document.getElementById('titleid').className="";
	}
	
/*	if(document.getElementById('link').value ==0) { 
	document.getElementById('linkid').className="error-message";	
	document.getElementById('linkid').innerHTML ="*Required Field.";			
	chk = 0;	
	}else {
	document.getElementById('linkid').innerHTML = "";
	document.getElementById('linkid').className="";	
	}*/
	
		if(chk) {	
		return true;
		}
		else {
		return false;		
		}	

}

function s_new(){

	
document.getElementById("sub").value="";	
document.getElementById("titleid").innerHTML = "";
}
function btnCancel() {
	document.location = "index.php?control=newslatter";
}
</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="n_letter">
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

<form method="post" action="index.php" onsubmit="return menuValidation();" >

<table width="98%" cellpadding="1" cellspacing="2" class="tab_regis">

<tr>
<td align="right" width="15%" valign="top"></td>
<td style="color:#C00;"><?php echo $msg; ?>
</td>
</tr>

<tr>
<td align="right" width="15%" valign="top"><strong> Subject :</strong></td>
<td><input type="text" name="sub" id="sub" value="<?php echo $_REQUEST['sub']; ?>" style="width:300px;"/><div id="titleid" ></div>
</td>
</tr>

<tr>
<td align="right" valign="top"><strong>Message :</strong></td>
<td><textarea class="ckeditor" name="message" id="message" rows="5" cols="50"></textarea>
</td>
</tr>

</table>
<br />
<p align="center">
    <input type="hidden" name="control" value="newslatter"/>
    <input type="hidden" name="view" value="newslatter"/>
    <input type="hidden" name="task" value="savelatter"/>
    <input type="hidden" name="id" value="" id="id"/>
    <input class="submit" type="submit" value="Save" />
   <input class="submit" type="button" value="Cancel" onclick="btnCancel()" />


</p>    
</form>
</div>
</div>





      
</div>