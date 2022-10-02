<?php if($output == 'already'){ ?>

<p class="content_area"> <span class="normal_txt">You have already added this item to compare</span> 

<?php foreach($results as $result): ?>
<span class="link_span"> 
<a class="link_img" href="#"><img src="admin/<?php echo $result->image;?>" width="51" height="35" /></a>
 <a class="link_img_close" href="#" onclick="removed('<?php echo $result->trip_id;?>','<?php echo $result->trip_schedule_id;?>')"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> 
 </span>
 <?php endforeach; ?>
    
  
  <span class="go_btn"><a href="index.php?control=compare"><img src="template/<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a>
  </span> 
  
  <a href="#" id="popupContactClose_compare"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>

<?php }else if($output == 'max'){ ?>
<p class="content_area"> <span class="normal_txt"> You can add only 3 items to compare</span> 

<?php foreach($results as $result): ?>
<span class="link_span"> 
<a class="link_img" href="#" ><img src="admin/<?php echo $result->image;?>" width="51" height="35" /></a>
 <a class="link_img_close" href="#" onclick="removed('<?php echo $result->trip_id;?>','<?php echo $result->trip_schedule_id;?>')"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> 
 </span>
 <?php endforeach; ?>
 

<span class="go_btn"><a href="index.php?control=compare"><img src="template/<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a></span>
 <a href="#" id="popupContactClose_compare"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
<?php }else{ ?>

<p class="content_area"> <span class="normal_txt"> Success: You have added 1 item to compare</span> 

<?php foreach($results as $result): ?>
<span class="link_span"> 
<a class="link_img" href="#"><img src="admin/<?php echo $result->image;?>" width="51" height="35" /></a>
 <a class="link_img_close" href="#" onclick="removed('<?php echo $result->trip_id;?>','<?php echo $result->trip_schedule_id;?>')"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> 
 </span>
 <?php endforeach; ?>

<span class="go_btn"><a href="index.php?control=compare"><img src="template/<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a></span>
 <a href="#" id="popupContactClose_compare"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>

<?php } ?>
