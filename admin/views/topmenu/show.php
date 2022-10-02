<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="t_menus">
<table width="99%"><tr><td width="85%">Top Menu</td>
<td><a href="index.php?control=topmenu&task=addnew"  class="button"><img src="images/add_new.png" /></a></td> 
<!--<td><a href="#" onclick="s_new()" class="button"><img src="images/add_new.png" /></a></td>
<td><a href="#" onclick="delete_ads()"><img src="images/Delete_all.png" /></a></td>-->
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="alads">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="8%" align="center"> <strong>S.No.</strong>
<!--<input type="checkbox" onclick="checkall_ads(this)"  title="Select all" />--></td>
<td class=" grd_sep tr_haed" width="15%" align="center"><strong>Menu type</strong></td>
<td class="grd_sep tr_haed " width="18%" align="center"><strong>Title</strong></td>
<td class="grd_sep tr_haed " width="45%" align="center"><strong>Link</strong></td>
<td class="tr_haed bord_right" align="center" width="10%"><strong>Action</strong></td>
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
<td class="<?php echo $class; ?>"  align="center"><?php echo $result['menutype'] ; ?></td>
<td class="<?php echo $class; ?>"  align="center"><?php echo $result['title'] ; ?></td>
<td class="<?php echo $class; ?>"  align="center"><?php echo $result['link'] ?></td>
<td class="<?php echo $class; ?>" align="center">

<?php if($result['defalut']){  ?>
<a   title="Default"><img src="images/backend/icon-16-default.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=topmenu&task=editmenu&id=<?php echo $result['id']; ?>" class="button"  title="Edit"><img src="images/edit.png" alt="edit" /></a> 
<!--<a href="index.php?control=ads&task=d_active&id=<?php echo $result['id'] ; ?>&catid=<?php echo $result['category'] ; ?>" title="Set Default"><img src="images/backend/icon-16-notdefault.png" alt="check_de" /></a>-->


<?php if($result['status']){  ?>
<a href="index.php?control=topmenu&task=status&id=<?php echo $result['id'] ; ?>&status=0"  title="Click to Unpublish"><img src="images/backend/check.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=topmenu&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Click to Publish"><img src="images/backend/check_de.png" alt="check_de" /></a><?php } ?>  
<a  href="index.php?control=topmenu&task=delete&id=<?php echo $result['id']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a><?php } ?>
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
   
</div> 
