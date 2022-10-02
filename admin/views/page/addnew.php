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




function pages() {	
	
var chk = 1;
	if(document.getElementById('sname').value == '') {
	document.getElementById('snameid').innerHTML ="*Required Field.";	
	document.getElementById('snameid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('sname').value)) {	
	document.getElementById('snameid').innerHTML = "*Must be letters only.";	
	document.getElementById('snameid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('snameid').innerHTML = "";
	document.getElementById('snameid').className="";
	}
	
	if(document.getElementById('country').value ==0) {
	document.getElementById('countryid').className="error-message";	
	document.getElementById('countryid').innerHTML ="*Required Field.";			
	chk = 0;	
	}else {
	document.getElementById('countryid').innerHTML = "";
	document.getElementById('countryid').className="";	
	}
	
	if((document.getElementById("linkkid").checked==false) && (document.getElementById("contenttid").checked==false)){
	document.getElementById('pagetypeid').className="error-message";	
	document.getElementById('pagetypeid').innerHTML ="*Required Field.";			
	chk = 0;	
	}else {
	document.getElementById('pagetypeid').innerHTML = "";
	document.getElementById('pagetypeid').className="";	
	}
		
		
	/*if(document.getElementById("contenttid").checked==true){
		if(document.getElementById('des').value == '') {
		document.getElementById('contentid').innerHTML ="*Required Field.";	
		document.getElementById('contentid').className="error-message";
		chk = 0;	
		}
	}else {
		document.getElementById('contentid').innerHTML = "";
		document.getElementById('contentid').className="";	
		}
	*/
	
	
	if(document.getElementById("linkkid").checked==true){
		if(document.getElementById('link').value == '') {
		document.getElementById('linkid').innerHTML ="*Required Field.";	
		document.getElementById('linkid').className="error-message";
		chk = 0;	
		}else if(!isValidURL(document.getElementById('link').value)  ) {	
		document.getElementById('linkid').innerHTML = "*Must be URL.";	
		document.getElementById('linkid').className="error-message";
		chk = 0;
		}
	}else {
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

function resett(){
	
	document.getElementById('linkid').innerHTML = "";
	document.getElementById('linkid').className="";	
	document.getElementById('pagetypeid').innerHTML = "";
	document.getElementById('pagetypeid').className="";	
	document.getElementById('countryid').innerHTML = "";
	document.getElementById('countryid').className="";	
	document.getElementById('snameid').innerHTML = "";
	document.getElementById('snameid').className="";
	document.getElementById('descr').innerHTML = "";
}

</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="45%"> <?php if($_REQUEST['id']){ ?>Edit Page<?php }else{ ?>Add New  <?php } ?></td> 
<td></td>
<td></td>
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">

<form method="post" action="index.php" onsubmit="return pages();">

<table width="98%" cellpadding="1" cellspacing="2" class="tab_regis">

<tr>
<td align="right" width="15%" valign="top"><strong> Page Title :</strong></td>
<td><input type="text" class="reg_txt" name="name" id="sname" value="<?php echo $data['page']?$data['page']:$_REQUEST['name']; ?>"/><div id="snameid" ></div>
</td>
</tr>

<tr>
<td align="right" width="18%" valign="top"><strong> Category Type : </strong></td>
<td> 
<select class="reg_txt" name="category_id" id="country" >
<option value="0" >Select categories</option> 
<?php 
foreach($results as $category) {  ?> 
<option value="<?php echo $category['id'];?>" <?php if(($data['category_id']?$data['category_id']:$category_id)==$category['id']){ ?> selected="selected" <?php } ?>   ><?php echo $category['category'];   ?></option> 
<?php } ?>
</select><div id="countryid" ></div>
</td>
</tr>

<tr>
<td align="right" valign="top"><strong> Page Type :</strong></td>
<td><input type="radio" name="chkp" id="linkkid" value="1" <?php if($data['type']){ ?> checked="checked" <?php } ?>  onchange="Hello()" />
Link
<input type="radio" name="chkp" id="contenttid" <?php if(!$data['type']){ ?>checked="checked" <?php } ?> value="0" onchange="Hello1()"  />
Content<div id="pagetypeid" ></div></td>
</tr>

<tr>
<td align="right" valign="top"><strong id="chkk"  style="display:none"> Page Link :</strong></td>
<td id="chk" style="display:none"><input type="text" class="reg_txt" id="link" name="link"  value="<?php echo $data['link'] ; ?>"/><div id="linkid" ></div>
</td>
</tr>

<tr >
<td align="right" valign="top"><strong id="chh" > Page Design : 	</strong></td>
<td id="ch"> <textarea class="ckeditor" name="description" id="des" rows="5" cols="50"><?php echo $data['content'] ; ?> </textarea><div id="contentid" style="color:#F00;" ><?php
echo $errmsg;?></div>
</td><div id="descr" ></div>
</tr>
<tr><td></td><td colspan="2">

<p align="left" style="margin-top:4px;">
<input type="hidden" name="control" value="page"/>
<input type="hidden" name="view" value="page"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" value="<?php echo $data['id'] ; ?>" id="id" />
<input class="submit" type="submit" value="<?php if($_REQUEST['id']){ ?>Update<?php }else{ ?>Save<?php } ?>" />
<!--<input class="submit" type="Reset" value="Reset" onclick="resett()" />-->
</p> 
</td></tr>
</table>   
</form>
</div>
</div>
</div>
<script type="text/javascript">
if(document.getElementById("linkkid").checked==true)	{		

	document.getElementById("chk").style.display="inline-block";
	document.getElementById("chkk").style.display="inline-block";
	document.getElementById("ch").style.display="none";
	document.getElementById("chh").style.display="none";
}else
{
		
	document.getElementById("ch").style.display="inline-block";
	document.getElementById("chh").style.display="inline-block";
	document.getElementById("chk").style.display="none";
	document.getElementById("chkk").style.display="none";
	
}
</script>