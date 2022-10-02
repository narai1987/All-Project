<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:PERPAGE;?>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="user_s">
        <table width="98%">
          <tr>
            <td width="50%">Tickets</td>
            <td><form name="filterForm"  method="post" action="index.php" >
                Show entries:
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
                <input type="hidden" name="task" value="<?php echo $_REQUEST['task'];?>"  />
                <input type="hidden" name="tpages" id="tpages" value=""  />
                <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
              </form></td>
            <td align="right"><a href="#" onclick="delete_user()"><img src="images/Delete_all.png" /></a></td>
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="us">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="grd_sep tr_haed bord_left" width="4%" align="center"><input type="checkbox" onclick="check_users(this)"  /></td>
          <td class=" grd_sep tr_haed" width="25%"><strong>Ticket No.</strong></td>
          <td class="grd_sep tr_haed " width="35%"><strong>Book By </strong></td>
          <td class="grd_sep tr_haed " width="25%"><strong>At Trip</strong></td>
          <td class="grd_sep tr_haed bord_right" align="center"><strong>Action</strong></td>
        </tr>
        <?php
if($results) {
$i=0;
foreach($results as $result){ 
$i++;

($i%2==0)? $class="tr_line1 grd_pad" : $class="tr_line2 grd_pad"
?>
        <tr>
          <td class="<?php echo $class; ?>" align="center"><input type="checkbox" name="select" id="select" value="<?php echo $result['id'] ; ?>"  /></td>
          <td class="<?php echo $class; ?>"><?php echo $result['ticket_no'] ; ?></td>
          <td class="<?php echo $class; ?>"><?php echo $result['ticket_no'] ; ?></td>
          <td class="<?php echo $class; ?>"><?php echo $result['ticket_no'] ; ?></td>
          <td class="<?php echo $class; ?>" align="center"><?php
if(!$result['utype']) {
 if($result['status']){  ?>
            <a href="index.php?control=user&task=status&id=<?php echo $result['id'] ; ?>&status=0" title="Click to Unpublish" ><img src="images/backend/check.png" alt="check_de" /></a>
            <?php }else{ ?>
            <a href="index.php?control=user&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Click to Publish" ><img src="images/backend/check_de.png" alt="check_de" /></a>
            <?php } ?>
            <a  href="index.php?control=user&task=delete&id=<?php echo $result['id']; ?>"  onclick="return confirm('Are you sure you want to delete ?');" title="Delete" ><img src="images/del.png" alt="Delete" /></a>
            <?php } else {?>
            <a  href="#" title="Site Admin" ><img src="images/admin.png" alt="admin" width="24" /></a>
            <?php }?></td>
        </tr>
        <?php }  }else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($results)>0){ ?>
  <div  class="pageIndex">
    <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  </div>
  <?php } ?>
</div>
