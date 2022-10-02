<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  
<script type="text/javascript">

function s_edit(name,des,id){
	
document.getElementById("sname").value=name;	
document.getElementById("id").value=id;	
document.getElementById("des").value=des;
document.getElementById("s_label").innerHTML="Edit"
document.getElementById('snameid').innerHTML = "";
document.getElementById('desid').innerHTML = "";	
}

function s_new(){

	
document.getElementById("sname").value="";	
document.getElementById("id").value="";	
document.getElementById("des").value="";
document.getElementById("s_label").innerHTML="Add New"
document.getElementById('snameid').innerHTML = "";
document.getElementById('desid').innerHTML = "";	
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

function newss() {
	
	
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
<fieldset class="field_profile" >
<legend>Search</legend>
<form action="index.php" method="post">
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
<tr>
<td align="right" width="14%"><strong>Search : </strong></td>
<td width="18%"><input type="text" class="reg_txt" name="search" /></td>

<td><button class="submit"><strong>Search</strong></button></td>
</tr>
</table>
<input type="hidden" name="control" value="new"/>
<input type="hidden" name="view" value="show"/>
<input type="hidden" name="task" value="search"/>
</form>
</fieldset>

<div class="detail_container">
<div class="head_cont">
<h2 class="news_s">
<table width="99%"><tr><td width="60%">News</td> 
<td><form name="filterForm" method="post" action="index.php" >
Show entries:
<select name="filter" id="filter" onchange="paging1(this.value)">
<option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All</option>
<option value="2"<?php if($_REQUEST['tpages']=="2") {?> selected="selected"<?php }?> >2</option>
<option value="5"<?php if($_REQUEST['tpages']=="5") {?> selected="selected"<?php }?> >5</option>
<option value="10"<?php if($_REQUEST['tpages']=="10") {?> selected="selected"<?php }?>>10</option>
<option value="20"<?php if($_REQUEST['tpages']=="20") {?> selected="selected"<?php }?>>20</option>
<option value="50"<?php if($_REQUEST['tpages']=="50") {?> selected="selected"<?php }?>>50</option>
<option value="100"<?php if($_REQUEST['tpages']=="100") {?> selected="selected"<?php }?>>100</option>
</select>
<input type="hidden" name="control" value="<?php echo $_REQUEST['control'];?>"  />
<input type="hidden" name="view" value="<?php echo $_REQUEST['view'];?>"  />
<input type="hidden" name="task" value="<?php echo $_REQUEST['task'];?>"  />
<input type="hidden" name="tpages" id="tpages" value=""  />
<input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
<input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
<input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
</form></td>
<td><a href="#" onclick="s_new()" class="button"><img src="images/add_new.png" /></a></td>

</tr>
</table>
</h2>
</div>

<div class="grid_container">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="4%" align="center"><input type="checkbox"  /></td>
<td class=" grd_sep tr_haed" width="20%"><strong>Title</strong></td>
<td class="grd_sep tr_haed " width="45%"><strong>Description</strong></td>
<td class="grd_sep tr_haed " width="20%"><strong>Date</strong></td>
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
<td class="<?php echo $class; ?>" align="center"><input type="checkbox"  /></td>
<td class="<?php echo $class; ?>"><?php echo $result['title'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo substr($result['news'],0,50) ; ?><a title="<?php echo $result['news'];?>">...</a></td>
<td class="<?php echo $class; ?>"><?php echo $result['date_time'];  ?></td>
<td class="<?php echo $class; ?>" align="center">
<a href="#" class="button"  title="Edit" onclick="s_edit('<?php echo $result['title'] ; ?>','<?php echo $result['news'] ; ?>','<?php echo $result['id'] ; ?>')"><img src="images/edit.png" alt="edit" /></a> 
<?php if($result['status']){  ?>
<a href="index.php?control=new&task=status&id=<?php echo $result['id'] ; ?>&status=0"  title="Unpulish"><img src="images/backend/check.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=new&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Pulish"><img src="images/backend/check_de.png" alt="check_de" /></a>  
<?php } ?>
<a  href="index.php?control=new&task=delete&id=<?php echo $result['id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a></td>
</tr>
<?php }  }else{?>
<tr>
<td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Date not found.</strong></td>
</tr>
<?php } ?>
</table>
<div style="margin-left:20px;">
<?php
include("pagination.php");

echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
</div>
</div>
</div>

<div class="popupContent popupContent_service">
<div class="pop_log_bg">
<div class="popupClose"></div>
<fieldset class="service_field" >
<div class="service_head_p"><p><em id="s_label">Add New</em> News</p></div>
<form action="index.php" method="post" enctype="multipart/form-data" onsubmit="return newss();" >
<table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
<tr>
<td align="right" width="30%" valign="top"><strong>Title :</strong></td>
<td colspan="2"><input type="text" id="sname" name="title" class="regis_area" /><div id="snameid" ></div><input type="hidden" name="userid" value="<?php echo $_SESSION['adminid']; ?>"/>
</td>
</tr>

<tr>
<td align="right"><strong>Description :</strong></td>
<td colspan="2">
<textarea class="regis_area" name="news" id="des" rows="2" cols="5"></textarea><div id="desid" ></div>
</td>
</tr>
<tr>
<td align="right"></td>
<td colspan="2" align="right" style="padding-right:10px;" valign="top">
<input type="hidden" name="control" value="new"/>
<input type="hidden" name="view" value="show"/>
<input type="hidden" name="task" value="save"/>
<input type="hidden" name="id" value="" id="id"/>
<button class="submit" type="submit"><strong>Save</strong></button> 
<button class="submit" type="reset"><strong>Reset</strong></button>
</td>
</tr>
</table>
</form>
</fieldset>
</div>
</div>
    <div class="backgroundPopup"></div>
      
</div> 
