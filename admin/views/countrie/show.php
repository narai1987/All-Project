<?php  $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="50%" class="main_txt">Countries </td>
            <td align="center"><form name="filterForm" id="filterForm"  method="post" action="index.php" >
                <span style="font-size:12px;">Show Entries :</span>
                <select name="filter"  class="reg_txt" id="filter" onchange="paging1(this.value)">
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
                <input type="hidden" name="defftask" id="defftask"   />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
              </form></td>
            <td width="10%" align="right"><a href="index.php?control=countrie&amp;task=addnew" ><img src="images/add_new.png" /></a></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="mmm">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="8%" align="center"><strong>Sr. No.</strong></td>
          <td class="tr_haed bord_right" width="35%"><strong>Country Name</strong></td>
          <td class="tr_haed bord_right" width="35%"><strong>Country Code</strong></td>
          <!--<td class="grd_sep tr_haed " width="35%"><strong>Operator</strong></td>   -->
          <td class="tr_haed bord_right" width="15%" align="center"><strong>Action</strong></td>
        </tr>
        <?php  $countno = ($page-1)*$tpages;
$i=0; 
if(count($results)) {
	foreach($results as $result){ 
	$i++;

($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad";
	 $countno++;
?>
        <tr class="<?php echo $class; ?>">
          <td align="center"><?php echo $countno; ?></td>
          <td ><?php echo $result['country']; ?></td>
          <td ><?php echo $result['country_code']; ?></td>
          <td  align="center"><!--<a href="index.php?control=countrie&task=addnew&id=<?php echo $result['id'] ; ?>"><img src="images/edit.png" alt="edit" title="Edit" /></a>--> 
            <a onclick="edit(<?php echo $result['id']; ?>)" style="cursor:pointer;"><img src="images/edit.png" alt="edit" title="Edit" /></a>
            <?php if($result['status']==0) {?>
            
            <!--<a href="index.php?control=countrie&view=countrie&task=publish&id=<?php echo $result['id']; ?>" >--> 
            
            <a onclick="active(<?php echo $result['id']; ?>,1)" style="cursor:pointer;"> <img src="images/backend/check_de.png" title="Click to Publish"/> </a>
            <?php }?>
            <?php if($result['status']==1) {?>
            
            <!--<a href="index.php?control=countrie&view=countrie&task=unpublish&id=<?php echo $result['id']; ?>" >--> 
            
            <a onclick="active(<?php echo $result['id']; ?>,0)" style="cursor:pointer;"> <img src="images/backend/check.png" title="Click to Unpublish"/> </a>
            <?php } ?>
            <a onclick="detete(<?php echo $result['id']; ?>)" title="Delete" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($results)>0){ ?>
    <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
</div>
