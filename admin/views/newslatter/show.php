<script type="text/javascript">	
/*function latter_view(lid,lsubject){
alert(lid);
	
document.getElementById("id").value=lid;		
document.getElementById("sub").innerHTML=lsubject;	*/

//document.getElementById("msgs").innerHTML=lmsg;
document.getElementById("s_label").innerHTML="Show"
/*document.getElementById('sub').innerHTML = "";*/
//document.getElementById('msgs').innerHTML = "";	
//}




</script>
<style type="text/css">
	.clspad a {
		padding-left:5px;	
	}
</style>
<div class="detail_right right">
<div class="detail_container">

<div class="head_cont">

<h2 class="n_letter">
<table width="99%"><tr><td width="85%">News Letters<span style="color:#C60; margin-left:100px;"><?php echo $mailsucess; ?> </span></td>
<td><a href="index.php?control=newslatter&task=addnew"  ><img src="images/add_new.png" /></a></td> 
<!--<td><a href="#" onclick="s_new()" class="button"><img src="images/add_new.png" /></a></td>
<td>
</td>-->
</tr>
</table>
</h2>
</div>


<div class="grid_container" id="alads">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="8%" align="center"> <strong>Sr.no.</strong>
<!--<input type="checkbox" onclick="checkall_ads(this)"  title="Select all" />--></td>
<td class=" grd_sep tr_haed" width="15%"><strong>Subject</strong></td><!--
<td class="grd_sep tr_haed " width="15%"><strong>Message </strong></td>-->
<td class="grd_sep tr_haed " width="15%"><strong>Create</strong></td>
<td class="grd_sep tr_haed " width="15%"><strong>Last Update </strong></td>
<td class="grd_sep tr_haed " width="15%"><strong>Last Mail Send </strong></td>
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
<!--<input type="checkbox" name="sel" id="sel" value="<?php echo $result['id'] ; ?>" />-->
</td>
<td class="<?php echo $class; ?>"><?php echo substr($result['subject'],0,20) ; ?></td>
<!--<td class="<?php echo $class; ?>"><?php echo $result['message'] ; ?></td>-->
<!--<td class="<?php echo $class; ?>">
</td>-->
<td class="<?php echo $class; ?>"><?php echo $result['create_date'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['last_update_date'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['last_send_date'] ; ?></td>
<td class="<?php echo $class; ?> clspad" align="center">
<a href="#" onclick="latter_view('<?php echo $result['id'];?>')" class="button"><img src="images/backend/magni.png" alt="magni"></a> 
<?php if($result['defalut']){  ?>
<a   title="Default"><img src="images/backend/icon-16-default.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=newslatter&task=editLatter&id=<?php echo $result['id']; ?>"  title="Edit"><img src="images/edit.png" alt="edit" /></a> 
<!--<a href="index.php?control=ads&task=d_active&id=<?php echo $result['id'] ; ?>&catid=<?php echo $result['category'] ; ?>" title="Set Default"><img src="images/backend/icon-16-notdefault.png" alt="check_de" /></a>-->


<?php if($result['status']){  ?>
<a href="index.php?control=newslatter&task=status&id=<?php echo $result['id'] ; ?>&status=0"  title="Click to Unpublish"><img src="images/backend/check.png" alt="check_de" /></a><a href="index.php?control=newslatter&task=lattermail&id=<?php echo $result['id'] ; ?>" onclick="return confirm('Are you sure you want to send e-mail ?');" title="Send e-mail"><img src="images/send_mail.png"  /></a>  
<?php }else{ ?>
<a href="index.php?control=newslatter&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Click to Publish"><img src="images/backend/check_de.png" alt="check_de" /></a><a href="#" onclick="return alert('Mail can not be send due to unpublish newsletter');" title="Send e-mail"><img src="images/send_mail.png"  /></a><?php } ?>  

<a  href="index.php?control=newslatter&task=delete&id=<?php echo $result['id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a><?php } ?>
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
   


   
<!----------------------------popup start---------------------->
    
   <div class="popupContent popupContent_service">
    <div class="pop_log_bg">
        <div class="popupClose"></div>
        
        <div id="latterpopup">
                
    
     
     
            </div>    
      
      </div>
  </div>
  
  <!----------------------------popup end---------------------->
