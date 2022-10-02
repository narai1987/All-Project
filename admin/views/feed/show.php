<script type="text/javascript">

	function feedstatus(str,status) {
		document.getElementById("task").value = "status";
		document.getElementById("status").value = status;
		document.getElementById("id").value = str;
		document.getElementById("tpages").value = document.getElementById("filter").value;
		document.forms['filterForm'].submit();
	}
	function feeddelete(str) {
		if(confirm("You are sure you want to delete?")) {
		document.getElementById("task").value = "delete";
		document.getElementById("id").value = str;
		document.getElementById("tpages").value = document.getElementById("filter").value;
		document.forms['filterForm'].submit();
		
		}
	}
</script>
<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="providers_s">
<table width="99%"><tr><td width="75%">People's Testimonials</td> 
<td>
<form name="filterForm"  method="post" action="index.php" >
Show entries:
<?php $tpg = $_REQUEST['tpages']?$_REQUEST['tpages']:PERPAGE;?>
<select class="reg_txt" name="filter" id="filter" onchange="paging1(this.value)">
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
<input type="hidden" name="task" id="task" value="show"  />
<input type="hidden" name="tpages" id="tpages" value=""  />
<input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
<input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
<input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  />
<input type="hidden" name="id" id="id" value=""  />
<input type="hidden" name="status" id="status" value=""  />
</form>
</td>

</tr>
</table>
</h2>
</div>

<div class="grid_container" id="alads">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>
<td class="grd_sep tr_haed bord_left" width="4%" align="center">
<!--<input type="checkbox" onclick="checkall_ads(this)"  title="Select all" />-->#</td>
<td class=" grd_sep tr_haed" width="20%"><strong>Title</strong></td>
<td class="grd_sep tr_haed " width="20%"><strong>Comments</strong></td>
<td class="grd_sep tr_haed " width="45%"><strong>Date Time</strong></td>
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
<td class="<?php echo $class; ?>" align="center"><?php echo $i;?>
<!--<input type="checkbox" name="sel" id="sel" value="<?php echo $result['id'] ; ?>" />-->
</td>
<td class="<?php echo $class; ?>"><?php echo $result['title'] ; ?></td>
<td class="<?php echo $class; ?>"><?php echo substr($result['feed'],0,20) ; ?></td>
<td class="<?php echo $class; ?>"><?php echo $result['date_time'] ?></td>
<td class="<?php echo $class; ?>" align="center">


<a  style="cursor:pointer;" title="View Comment" class="button" onclick="viewFeed('<?php echo $result['id'];?>','<?php echo $result['usertype'];?>')"><img src="images/backend/magni.png" alt="magni"></a>  

    
    <?php
	if($result['status']) {?>
    
   	 <a style="cursor:pointer;" onclick="feedstatus('<?php echo $result['id'];?>',1)" ><img src="images/backend/check.png" alt="check_de" /></a>  
   <?php }
   else {
	   ?>
        <a style="cursor:pointer;" onclick="feedstatus('<?php echo $result['id'];?>',0)" title="Click to Publish"><img src="images/backend/check_de.png" alt="check_de" /></a>
        <?php 
   }
   ?>
        <a  style="cursor:pointer;" onclick="feeddelete('<?php echo $result['id'];?>')" title="Click to Delete"><img src="images/del.png" alt="Delete" /></a>

</td>
</tr>
<?php } 
 }
 else{?>
<tr>
<td class="tr_line2 grd_pad" colspan="6" align="center"><strong>Data not found.</strong></td>
</tr>
<?php } ?>
</table>
</div>
</div>

<div class="popupContent popupContent_service">
<div class="pop_log_bg">
<div class="popupClose"></div>
<fieldset class="service_field" >
<div class="service_head_p"><p><span id="s_label">What People Think</span> </p></div>
<div style="width:99%; margin:o auto;" id="divfeed" >
sdkfj lksdjf lksdj
</div>
</fieldset>
</div>
</div>


<!--<div style="margin-left:20px;">
<?php
//include("pagination.php");

//echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
</div>-->

<?php if(count($result)>0){ ?>
<div class="pageIndex">
<?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
</div>
<?php } ?>
    <div class="backgroundPopup"></div>
      
</div> 
