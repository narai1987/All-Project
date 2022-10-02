
<script type="text/javascript">

function s_edit(name,des,id,cate){
var textToFind = cate;	
document.getElementById("sname").value=name;	
document.getElementById("id").value=id;	
document.getElementById("des").value=des;
document.getElementById('snameid').innerHTML = "";
document.getElementById('desid').innerHTML = "";	
var dd = document.getElementById('cat');
for (var i = 0; i < dd.options.length; i++) {
    if (dd.options[i].value == textToFind) {
        dd.selectedIndex = i;
        break;
    }
}


document.getElementById("s_label").innerHTML="Edit"
}



function s_new(){
/*window.location.reload(true);*/
	
document.getElementById("sname").value="";	
document.getElementById("id").value="";	
document.getElementById("des").value="";
document.getElementById("s_label").innerHTML="Add New"
document.getElementById('snameid').innerHTML = "";
document.getElementById('desid').innerHTML = "";		
}
function btnReset() {
	window.location.reload(true);
}

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

function adss() {
	
	
var chk = 1;
	if(document.getElementById('sname').value == '') {
	document.getElementById('snameid').innerHTML ="*Required Field.";	
	document.getElementById('snameid').className="error-message";
	chk = 0;	
	}else if(!isletter(document.getElementById('sname').value)) {	
	document.getElementById('snameid').innerHTML = "*Must be letters only.";	
	document.getElementById('snameid').className="error-message";
	chk = 0;
	}else if((document.getElementById('sname').value.length) < 2 ) {
	document.getElementById('snameid').className="error-message";
	document.getElementById('snameid').innerHTML = "*Must be 2 or more characters.";
	chk = 0;
	}else {
	document.getElementById('snameid').innerHTML = "";
	document.getElementById('snameid').className="";
	}
	

	if(document.getElementById('des').value == '') {
	document.getElementById('desid').innerHTML ="<p class='error-message'>*Required Field.</p>";			
	chk = 0;	
	}else {
	document.getElementById('desid').innerHTML = "";	
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
<h2 class="adds_s">
<table width="99%"><tr><td width="85%">Special Deal</td> 
<td><a href="#" onclick="s_new()" class="button"><img src="images/add_new.png" /></a></td>
<td><a href="#" onclick="delete_ads()"><img src="images/Delete_all.png" /></a></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="alads">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="4%" align="center">
<input type="checkbox" onclick="checkall_ads(this)"  title="Select all" /></td>
<td class=" grd_sep tr_haed" width="20%"><strong>Title</strong></td>
<td class="grd_sep tr_haed " width="20%"><strong>Category</strong></td>
<td class="grd_sep tr_haed " width="45%"><strong>ads</strong></td>
<td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
</tr>
<?php
if($results) {
$i=0;
foreach($results as $result){ 
$i++;

($i%2==0)? $class="tr_line1 grd_pad" : $class="tr_line2 grd_pad"
?>
<tr>
<td class="<?php echo $class; ?>" align="center">
<input type="checkbox" name="sel" id="sel" value="<?php echo $result['id'] ; ?>" />
</td>
<td class="<?php echo $class; ?>"><?php echo $result['title'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['category'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['content'] ?></td>
<td class="<?php echo $class; ?>" align="center">

<?php if($result['defalut']){  ?>
<a   title="Default"><img src="images/backend/icon-16-default.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="#" class="button"  title="Edit" onclick="s_edit('<?php echo $result['title'] ; ?>','<?php echo stripcslashes(mysql_real_escape_string($result['content'])); ?>','<?php echo $result['id'] ; ?>','<?php echo $result['category'] ; ?>')"><img src="images/edit.png" alt="edit" /></a> 
<a href="index.php?control=ads&task=d_active&id=<?php echo $result['id'] ; ?>&catid=<?php echo $result['category'] ; ?>" title="Set Default"><img src="images/backend/icon-16-notdefault.png" alt="check_de" /></a>


<?php if($result['status']){  ?>
<a href="index.php?control=ads&task=status&id=<?php echo $result['id'] ; ?>&status=0"  title="Click to Unpublish"><img src="images/backend/check.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=ads&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Click to Publish"><img src="images/backend/check_de.png" alt="check_de" /></a><?php } ?>  
<a  href="index.php?control=ads&task=delete&id=<?php echo $result['id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a><?php } ?>
</td>
</tr>
<?php }  }else{?>
<tr>
<td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Date not found.</strong></td>
</tr>
<?php } ?>
</table>
</div>
</div>

<div class="popupContent popupContent_service">
<div class="pop_log_bg">
<div class="popupClose"></div>
<fieldset class="service_field" >
<div class="service_head_p"><p><span id="s_label">Add New</span> Deal</p></div>
<form action="index.php" method="post" enctype="multipart/form-data" onsubmit="return adss();" >
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
<tr>
<td align="right" width="30%" valign="top"><strong>Title :</strong></td>
<td colspan="2"><input type="text" id="sname" name="title" class="regis_area" /><div id="snameid"></div>
</td>
</tr>
<tr>
<td align="right" valign="top"><strong>Category :</strong></td>
<td colspan="2">
<select name="category"  class="reg_txt" id="cat" >
<option value="top" >Top</option>
<option value="bottom" >Bottom</option>
<option value="topright" >Top Right</option>
<option value="bottomright" >Bottom Right</option>
<option value="left">Left</option>

</select>
</td>
</tr>
<tr>
<td align="right" valign="top"><strong>Deal :</strong></td>
<td colspan="2">
<textarea class="regis_area" name="content" id="des" rows="2" cols="5"></textarea><div id="desid"></div>
</td>
</tr>
<tr>
<td align="right"></td>
<td colspan="2" align="right" style="padding-right:10px;">
<input type="hidden" name="control" value="ads"/>
<input type="hidden" name="view" value="show"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" value="" id="id"/>
<button class="submit" type="submit"><strong>Save</strong></button> 
<button class="submit" type="reset" onclick="btnReset()" ><strong>Cancel</strong></button>
</td>
</tr>
</table>
</form>
</fieldset>
</div>
</div>
    <div class="backgroundPopup"></div>
      
</div> 
