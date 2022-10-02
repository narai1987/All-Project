<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  
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
<input type="hidden" name="control" value="user"/>
<input type="hidden" name="view" value="show"/>
<input type="hidden" name="task" value="search"/>
</form>
</fieldset>

<div class="detail_container">
<div class="head_cont">
<h2 class="user_s">
<table width="99%"><tr><td width="75%">Users</td> 
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
</tr>
</table>
</h2>
</div>

<div class="grid_container">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="4%" align="center"><input type="checkbox"  /></td>
<td class=" grd_sep tr_haed" width="20%"><strong>Name</strong></td>
<td class="grd_sep tr_haed " width="20%"><strong>email</strong></td>
<td class="grd_sep tr_haed " width="20%"><strong>Username</strong></td>
<td class="grd_sep tr_haed " width="25%"><strong>Mobile</strong></td>
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
<td class="<?php echo $class; ?>"><?php echo $result['fname']." ".$result['lname'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['email'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['username'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['mobile'] ; ?></td>
<td class="<?php echo $class; ?>" align="center">
<?php if($result['status']){  ?>
<a href="index.php?control=user&task=status&id=<?php echo $result['id'] ; ?>&status=0"><img src="images/backend/check.png" alt="check_de" /></a>  
<?php }else{ ?>
<a href="index.php?control=user&task=status&id=<?php echo $result['id'] ; ?>&status=1"><img src="images/backend/check_de.png" alt="check_de" /></a>  
<?php } ?>
<a  href="index.php?control=user&task=delete&id=<?php echo $result['id']; ?>"  onclick="return confirm('Are you sure you want to delete ?');" ><img src="images/del.png" alt="Delete" /></a></td>
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
</div> 
