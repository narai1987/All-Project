<script type="text/javascript">
function btnReset() {
	window.location.reload(true);
}

function isValidURL(url){
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if(RegExp.test(url)){
        return true;
    }else{
        return false;
    }
}


function ads() {	
	
	
	
	
	
var chk = 1;
	if(document.getElementById('link').value == '') {
	document.getElementById('linkid').innerHTML ="*Required Field.";	
	document.getElementById('linkid').className="error-message";
	chk = 0;	
	}else if(!isValidURL(document.getElementById('link').value)) {	
	document.getElementById('linkid').innerHTML = "*Please enter a valid URL..";	
	document.getElementById('linkid').className="error-message";
	chk = 0;
	}else {
	document.getElementById('linkid').innerHTML = "";
	document.getElementById('linkid').className="";
	}
	
	
	
		var fzipPath = document.getElementById("banner").value;
		var fzipLength = fzipPath.length;
		var fzipDot = fzipPath.lastIndexOf(".");
		var fzipType = fzipPath.substring(fzipDot,fzipLength);
		if(document.getElementById("banner").value== "" && document.getElementById("id").value== "") {		
		document.getElementById("imgid").innerHTML = "<p class='error-message'>Please select an image</p>";
		chk=0;
		
		}else if(((fzipType==".jpg") || (fzipType==".png") || (fzipType==".jpeg")) && (document.getElementById("banner").value!= "" ) ){	
		document.getElementById("imgid").innerHTML = "";	
		}else if(fzipType!= ""){
		document.getElementById("imgid").innerHTML = "<p class='error-message'>We supports .jpg,.png,.jpeg  formats.Your file-type is <strong>"+fzipType+"</strong></p>";
		chk=0;
	    }
	
	
	
	
	if(chk==1){
		return true;
	}else
	{
		return false;
	}

		

}




</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="adds_s">
<table width="99%"><tr><td width="85%">Advertise</td> 
<td><a href="#" onclick="add_adverties()" class="button"><img src="images/add_new.png" /></a></td>
<td></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="alads">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="6%" align="center">
<strong>S.No.</strong></td>
<!--<td class="grd_sep tr_haed " width="20%"><strong>Category</strong></td>-->
<td class="grd_sep tr_haed " width="45%"><strong>Banner</strong></td>
<td class=" grd_sep tr_haed" width="20%"><strong>Url</strong></td>
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
<?php echo $i; ?>
</td>
<!--<td class="<?php echo $class; ?>"><?php echo $result['category'] ; ?></td>-->
<td class="<?php echo $class; ?>"><img src="images/banner/<?php echo $result['banner'] ?>" width="120" height="30"  /></td>
<td class="<?php echo $class; ?>" ><a href="<?php echo $result['link'] ; ?>" target="_blank"><img src="images/backend/link.png"  /></a></td>
<td class="<?php echo $class; ?>" align="center">

<?php if($result['defalut']){  ?>
<a   title="Default"><img src="images/backend/icon-16-default.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="#" class="button"  title="Edit" onclick="add_adverties('<?php echo $result['id'] ; ?>);')"><img src="images/edit.png" alt="edit" /></a> 
<?php if($result['status']){  ?>
<a href="index.php?control=advertie&amp;task=status&amp;id=<?php echo $result['id'] ; ?>&amp;status=0"  title="Click to Unpublish"><img src="images/backend/check.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=advertie&amp;task=status&amp;id=<?php echo $result['id'] ; ?>&amp;status=1" title="Click to Publish"><img src="images/backend/check_de.png" alt="check_de" /></a><?php } ?>  
<a  href="index.php?control=advertie&amp;task=delete&amp;id=<?php echo $result['id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a><?php } ?>
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
<div id="advert_div">

</div>
</div>
</div>
    <div class="backgroundPopup"></div>
      
</div> 
