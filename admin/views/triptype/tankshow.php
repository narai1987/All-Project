<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="60%" class="main_txt">Trip Tanks
              <?php //echo $keyword['trips'];?></td>
            <td align="center"><form name="filterForm" id="filterForm" method="post" action="index.php" >
                <span style="font-size:12px;">Show entries :</span>
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
                <input type="hidden" name="task" id="task" value="<?php echo $_REQUEST['task'];?>"  />
                <input type="hidden" name="tpages" id="tpages" value=""  />
                <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
                
                 <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="status" id="status"  />
                <input type="hidden" name="defftask" id="defftask" value="showtank" />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
              </form></td>
            <td><a href="index.php?control=triptype&task=addnewtank" ><img src="images/add_new.png" /></a></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="mmm">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="8%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed" width="35%"><strong>Scuba cylinder </strong></td>
          <!--
<td class="grd_sep tr_haed " width="35%"><strong>Company</strong></td>  
<td class="grd_sep tr_haed " width="35%"><strong>Operator</strong></td>   -->
          <td class="tr_haed" width="15%"align="center"><strong>Action</strong></td>
        </tr>
        <?php  $countno = ($page-1)*$tpages;
$i=0; 
if(count($tanks)) {
	foreach($tanks as $tank){ 
	$i++;
	 $countno++;
($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class ?>">
          <td  align="center"><?php echo $countno; ?></td>
          <td ><?php echo $tank['fuel_tank']; ?></td>
          <td  align="center"><!--<a href="index.php?control=triptype&task=addnewtank&id=<?php echo $tank['id'] ; ?>" ><img src="images/edit.png" alt="edit" title="Edit" /></a> --><a onclick="triptank_edit(<?php echo $tank['id']; ?>)" style="cursor:pointer;"><img src="images/edit.png" alt="edit" title="Edit" /></a> 
            <!--<?php if($tank['status']==0) {?>
<a href="index.php?control=trip&view=trip&task=publish&id=<?php echo $ttankrip['id']; ?>" class="button">
<img src="images/backend/check_de.png" title="Click to Publish"/>
</a>
<?php }?>
<?php if($tank['status']==1) {?>
<a href="index.php?control=trip&view=trip&task=unpublish&id=<?php echo $tank['id']; ?>" class="button">
<img src="images/backend/check.png" title="Click to Unpublish"/>
</a>
<?php } ?>--> 
            <!--<a href="index.php?control=triptype&task=deletetank&id=<?php echo $tank['id']; ?>" onclick="return confirm('Are you sure you want to Delete ')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a></td>-->
            <a onclick="triptank_delete(<?php echo $tank['id']; ?>)" style="cursor:pointer;"><img src="images/backend/del.png" alt="Delete" title="Delete" /></a></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($tanks)>0){ ?>
  <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
</div>
