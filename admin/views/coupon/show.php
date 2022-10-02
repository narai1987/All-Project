<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <fieldset class="field_profile" >
    <legend>Search</legend>
    <form action="index.php" method="post">
      <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
        <tr>
          <td align="left" width="8%"><strong>Search : </strong></td>
          <td width="18%"><input type="text" class="lang_box" name="search" value="<?php echo $_REQUEST['search'] ;?>"   /></td>
          <td><button class="lang_button"><strong>Search</strong></button></td>
          <td style="color:#090;"><?php echo $_SESSION['message']; $_SESSION['message']=''; ?></td>
        </tr>
      </table>
      <input type="hidden" name="control" value="<?php echo $_REQUEST['control'];?>"/>
      <input type="hidden" name="view" value="show"/>
      <input type="hidden" name="task" value="show"/>
    </form>
  </fieldset>
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <form name="filterForm" id="filterForm"  method="post" action="index.php" >
          <table width="99%">
            <tr>
              <td width="50%" class="main_txt">Coupon</td>
              <td> Show entries: </td>
              <td><select name="filter"  class="reg_txt" id="filter" onchange="paging1(this.value)">
                  <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php }?>>All</option>
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
                <input type="hidden" name="defftask" id="defftask"  />
                <input type="hidden" name="del" id="del"  />
                <input type="hidden" name="edit" id="edit"  />
                
                </td>
              <td align="right"><a href="index.php?control=coupon&task=addcoupon"><img src="images/add_new.png" /></a></td>
            </tr>
          </table>
        </form>
      </h2>
    </div>
    <div class="grid_container" id="us">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="4%" align="center"><strong>ID</strong></td>
          <td class="tr_haed bord_right" width="18%"><strong>Titile</strong></td>
          <td class="tr_haed bord_right" width="10%"><strong>Start Date</strong></td>
          <td class="tr_haed bord_right" width="10%"><strong>End Date</strong></td>
          <td class="tr_haed bord_right" width="10%" ><strong>Last Update</strong></td>
          <td class="tr_haed bord_right" width="12%"><strong>Coupon Type</strong></td>
          <td class="tr_haed bord_right" width="10%"><strong>Action</strong></td>
        </tr>
        <?php
if($results) {
$i=0;
foreach($results as $result){ 
$i++;

($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td align="center"><?php echo $result['id'] ; ?></td>
          <td ><a title="<?php echo $result['title']; ?>"><?php echo substr($result['title'],0,20); ?></a></td>
          <td ><a title="<?php echo $result['start_date'];?>"><?php echo date("Y M d",strtotime($result['start_date'])) ; ?></a></td>
          <td ><a title="<?php echo $result['end_date'];?>"><?php echo date("Y M d",strtotime($result['end_date'])) ; ?></a></td>
          <td ><a title="<?php echo $result['last_update'];?>"><?php echo date("Y M d",strtotime($result['last_update'])) ; ?></a></td>
          <td ><a title="<?php echo $result['detail'] ; ?>" ><?php echo ucwords(str_replace("_"," ",$result['coupon_type'])); ?></a></td>
          <td  align="left"><?php
if(!$result['utype']) {?>
            <!--<a href="index.php?control=coupon&task=addcoupon&id=<?php echo $result['id'] ; ?>" title="Edit" >-->
             <a onclick="coupon_edit(<?php echo $result['id']; ?>)" style="cursor:pointer;" title="Edit" >
            <img src="images/backend/edit.png" alt="check_de" /></a>
            <?php if($result['status']){  ?>
           <!-- <a href="index.php?control=coupon&task=status&id=<?php echo $result['id'] ; ?>&status=0" title="Click to Unpublish" >-->
           <a onclick="coupon_status(<?php echo $result['id']; ?>,0)" style="cursor:pointer;" title="Click to Unpublish">
            <img src="images/backend/check.png" alt="check_de" /></a>
            <?php }else{ ?>
            <!--<a href="index.php?control=coupon&task=status&id=<?php echo $result['id'] ; ?>&status=1" title="Click to Publish" >-->
            <a  onclick="coupon_status(<?php echo $result['id']; ?>,1)" style="cursor:pointer;" title="Click to Publish">
            <img src="images/backend/check_de.png" alt="check_de" /></a>
            <?php } ?>
           <!-- <a  href="index.php?control=coupon&task=delete&id=<?php echo $result['id']; ?>"  onclick="return confirm('Are you sure you want to delete ?');" title="Delete" >-->
            <a onclick="coupon_delete(<?php echo $result['id']; ?>)" title="Delete" style="cursor:pointer;" >
            <img src="images/del.png" alt="Delete" /></a>
            <?php } else {?>
            <a  href="#" title="Site Admin" ><img src="images/admin.png" alt="admin" width="24" /></a>
            <?php
	
 }?>
            <?php if($result['coupon_type']!="normal") { ?>
            <!--<a  href="index.php?control=coupon&task=shareCoupon&id=<?php echo $result['id'];?>" title="<?php echo $result['detail'] ; ?>" >-->
            <a onclick="shareCoupon(<?php echo $result['id']; ?>)" title="<?php echo $result['detail'] ; ?>" style="cursor:pointer;" >
            <img src="images/share_coupon.png" alt="admin" width="24" /></a>
            <?php } ?></td>
        </tr>
        <?php }  }else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="7" align="center"><strong>Data not found.</strong></td>
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
