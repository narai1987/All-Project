<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  

<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="60%">Pages</td> 
<td><form name="filterForm" method="post" action="index.php" >
Show entries :
<select name="filter" class="reg_txt" id="filter" onchange="paging1(this.value)">
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
<td><a href="index.php?control=page&task=addnew" ><img src="images/add_new.png" /></a></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="8%" align="center"><strong>S.No.</strong></td>
<td class=" grd_sep tr_haed" width="35%"><strong>Title</strong></td>
<td class="grd_sep tr_haed " width="35%"><strong>Page</strong></td>     
<td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
</tr>

<?php 
$i=0; 
if(count($cates)) {
	foreach($cates as $cate){ 
	$i++;
?>
<tr>
<td class="tr_line1 grd_pad grd_sep" align="center"> <?php echo $i; ?> </td>
<td class="tr_line1">
<?php echo $cate['page']; ?></td>
<td class="tr_line1"><a href="<?php echo $cate['link']; ?>" class="anch" target="_new" onclick="button" >preview</a>
</td>
<td class="tr_line1" align="center">
<a href="index.php?control=page&task=addnew&id=<?php echo $cate['id'] ; ?>" class="button"><img src="images/edit.png" alt="edit" title="Edit" /></a>
<?php if($cate['status']==0) {?>
<a href="index.php?control=page&view=page&task=publish&id=<?php echo $cate['id']; ?>" class="button">
<img src="images/backend/check_de.png" title="Click to Publish"/>
</a>
<?php }?>
<?php if($cate['status']==1) {?>
<a href="index.php?control=page&view=page&task=unpublish&id=<?php echo $cate['id']; ?>" class="button">
<img src="images/backend/check.png" title="Click to Unpublish"/>
</a>
<?php } ?>
<a href="index.php?control=page&task=delete&id=<?php echo $cate['id']; ?>" onclick="javascript:confirm('Are you sure you want to Delete ')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a></td>
</tr>

<?php } }else{ ?>
<tr>
<td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
</tr>

<?php } ?>
</table>
</div>
</div>

<?php if(count($cates)>0){ ?>
<div class="pageIndex">
<?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
</div>
<?php } ?>


      
</div>