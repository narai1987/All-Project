<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>
<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
<script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#startDate" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true, 
	  onClose: function( selectedDate ) {
       document.getElementById('filter1').value="";
      }
    });
  });
  
  jQuery(function($) {
    $( "#endDate" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true, 
	  onClose: function( selectedDate ) {
        document.getElementById('filter1').value="";
      }
    });
  });
  </script>

<div class="detail_right right">
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="75%" class="main_txt">Report</td>
            <td align="right"><p style="font-size:12px;">Download Report</p></td>
            <td align="right" ><a href="ajax.php?control=report&task=export&filter1=<?php echo $_REQUEST['filter1']; ?>&end_date=<?php echo $_REQUEST['end_date']; ?>&start_date=<?php echo $_REQUEST['start_date']; ?>"> <img src="images/excel.jpg" height="20" title="Download" /></a></td>
          </tr>
        </table>
        <div class="printed_pro">
          <form name="filterForm" id="filterForm" method="post" action="index.php"  >
            <table width="99%" cellspacing="0" cellpadding="0" >
              <tr>
                <td align="right" ><strong>Report Order</strong></td>
                <td width="15%" class="grd_pad"><select name="filter1" id="filter1" class="reg_txt" onchange="start()">
                    <option value=""<?php if($_REQUEST['filter1']=="") {?> selected="selected"<?php }?>>Report Order</option>
                    <option value="day"<?php if($_REQUEST['filter1']=="day") {?> selected="selected"<?php }?>>Daily</option>
                    <option value="week"<?php if($_REQUEST['filter1']=="week") {?> selected="selected"<?php }?>>Weekly</option>
                    <option value="month"<?php if($_REQUEST['filter1']=="month") {?> selected="selected"<?php }?>>Monthly</option>
                    <option value="half_year"<?php if($_REQUEST['filter1']=="half_year") {?> selected="selected"<?php }?>>Half Yearly</option>
                    <option value="year"<?php if($_REQUEST['filter1']=="year") {?> selected="selected"<?php }?>>Yearly</option>
                  </select></td>
                <td><input type="text"  readonly="readonly" name="start_date" id="startDate" value="<?php echo $_REQUEST['start_date']; ?>" style="width:100px; margin-left:30px;" class="reg_txt"  placeholder="Start-Date" /></td>
                <td><input type="text"  readonly="readonly" name="end_date" id="endDate"  value="<?php echo $_REQUEST['end_date'];?>" style="width:100px;" class="reg_txt"  placeholder="End-Date" /></td>
                <td><img onclick="javascript:document.forms['filterForm'].submit();" src="images/go_search.gif" style="cursor:pointer;" /></td>
                <td width="15%" align="right">Show entries :</td>
                <td class="grd_pad"><select name="filter" id="filter" class="reg_txt" onchange="paging1(this.value)">
                    <option value="1000"<?php if($_REQUEST['tpages']=="1000") {?> selected="selected"<?php } ?>><?php echo $content['all'];?></option>
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
                  <input type="hidden" name="subs" id="subs" value=""  />
                  <input type="hidden" name="adjacents" value="<?php echo $_REQUEST['adjacents'];?>"  />
                  <input type="hidden" name="page" id="page" value="<?php echo $_REQUEST['page'];?>"  />
                  <input type="hidden" name="tmpid" value="<?php echo $_REQUEST['tmpid'];?>"  /></td>
                  
                  <input type="hidden" name="id" id="id"  />
                  <input type="hidden" name="status" id="status"  />
                  <input type="hidden" name="defftask" id="defftask" />
                  <input type="hidden" name="del" id="del"  />
                  <input type="hidden" name="edit" id="edit"  />
              </tr>
            </table>
          </form>
        </div>
      </h2>
    </div>
    <div class="grid_container">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed" width="6%" align="center"><strong>Sr.no.</strong></td>
          <td class="tr_haed bord_left" ><strong>User Name</strong></td>
          <td class="tr_haed bord_left" ><strong>Email</strong></td>
           <td class="tr_haed bord_left" width="18%" ><strong>Trip Title</strong></td>
          <td class="tr_haed bord_left" ><strong>Trip Status</strong></td>
          <td class="tr_haed bord_left" ><strong>Booking Date</strong></td>
          <td class="tr_haed bord_left" ><strong>Payed Total</strong></td>
          <td class="tr_haed bord_left" ><strong>Adult/Child</strong></td>
         
          
          <!--<td class="tr_haed bord_left"><strong>Contact</strong></td>
    <td class="tr_haed bord_left"><strong>Trip Name</strong></td>
    <td class="tr_haed bord_left"><strong>End Date</strong></td>
     <td class="tr_haed bord_left"><strong>Trip Type</strong></td>--> 
        </tr>
        <?php $countno = ($page-1)*$tpages;
	if($results) {
	$i = 0;
	foreach($results as $data) {
		$i++;
		$countno++;
	 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class; ?>">
          <td  align="center"><?php echo $countno;?></td>
          <td ><?php echo $data['fname']; ?><?php echo $data['lname']; ?></td>
          <td ><?php echo $data['email']; ?></td>
          <td ><?php echo strlen($data['trip_title']) > 22 ? substr($data['trip_title'],0,22)."..." : $data['trip_title']; ?></td>
          
          <td ><?php if($data['trip_status']==0){ echo "Pending"; }else{ echo "Confirm";  } ?></td>
          <td ><?php echo $data['booking_date']; ?></td>
          <td ><?php echo $data['grand_total']; ?></td>
          <td ><?php echo $data['no_of_person']; ?>,<?php echo $data['no_of_child']; ?></td>
         
          
          <!-- <td ><?php //echo $data['mobile']; ?></td>
      <td ><?php //echo $data['trip_title']; ?></td>
      <td ><?php //echo $data['end_date']; ?></td>
      <td ><?php //echo $data['trip_type_id']; ?></td>--> 
        </tr>
        <?php }
			}else{ ?>
        <tr>
          <td colspan="8" align="center" style="padding-top:5px;"><span style="color:#666;"><strong>No Report Found</strong></span></td>
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
	var strThai= new String(224,"TIS-620");
</script> 
<script>
function start(){
document.getElementById('startDate').value="";
document.getElementById('endDate').value="";
}
</script> 
