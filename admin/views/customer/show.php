<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <fieldset class="field_profile" >
    <legend>Search</legend>
    <form action="index.php" method="post">
      <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
        <tr>
          <td align="right" width="10%"><strong>Search : </strong></td>
          <td width="18%"><input type="text" class="lang_box" name="search" value="<?php echo $_REQUEST['search'] ;?>"   /></td>
          <td><button class="lang_button"><strong>Search</strong></button></td>
        </tr>
      </table>
      <input type="hidden" name="control" value="customer"/>
      <input type="hidden" name="view" value="show"/>
      <input type="hidden" name="task" value="search"/>
    </form>
  </fieldset>
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="55%" class="main_txt">Customers</td>
            <td align="center"><form action="index.php"  method="post" name="filterForm" id="filterForm" >
                <span style="font-size:12px;">Show entries :</span>
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
            <!--<td><a href="#" onclick="delete_user()"><img src="images/Delete_all.png" /></a></td>
<td><a href="#" onclick="addUser()" class="button"><img src="images/add_new.png" /></a></td>--> 
          </tr>
        </table>
      </h2>
    </div>
    <div class="grid_container" id="us">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="5%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Name</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Email</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Username</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Mobile</strong></td>
          <td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
        </tr>
        <?php
if($results) {
	$countno = ($page-1)*$tpages;
$i=0;
foreach($results as $result){ 
$i++;
$countno++;
($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  align="center"><?php echo $countno; ?></td>
          <td ><?php echo $result['fname'].' '.$result['lname'] ; ?></td>
          <td ><?php echo $result['email'] ; ?></td>
          <td ><?php echo $result['username'] ; ?></td>
          <td ><?php echo $result['mobile'] ; ?></td>
          <td  align="center"><a style="cursor:pointer;" onclick="view_user('<?php echo $result['id']; ?>')" class="button"><img src="images/backend/magni.png" title="View"/></a> 
            <!--<a href="#"  onclick="edit_user('<?php echo $result['id']; ?>')"  class="button"><img src="images/edit.png" alt="edit" /></a>-->
            
            <?php if($result['status']){  ?>
            <a href="index.php?control=customer&amp;task=status&amp;id=<?php echo $result['id'] ; ?>&amp;status=0" title="Click to Unpublish" ><img src="images/backend/check.png" alt="check_de" /></a>
            <?php }else{ ?>
            <a href="index.php?control=customer&amp;task=status&amp;id=<?php echo $result['id'] ; ?>&amp;status=1" title="Click to Publish" ><img src="images/backend/check_de.png" alt="check_de" /></a>
            <?php } ?>
            
            <!--<a  href="index.php?control=customer&task=delete&id=<?php echo $result['id']; ?>"  onclick="return confirm('Are you sure you want to delete ?');" title="Delete" ><img src="images/del.png" alt="Delete" /></a>-->
            
            <?php } ?></td>
        </tr>
        <?php   }else{?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data not found.</strong></td>
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
<script type="text/javascript">
  
function view_user(id)	
{ 

var xmlhttp;

 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari 
 
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  { 
  if (xmlhttp.readyState==4)
    {
	
    document.getElementById("popdivid").innerHTML=xmlhttp.responseText;
		
    }
  }
  //alert(id);
 
xmlhttp.open("GET","script/view_customer.php?id="+id,true);
xmlhttp.send();
}

  
  
  
  </script> 
