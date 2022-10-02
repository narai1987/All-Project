<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>

<div class="detail_right right">
  <fieldset class="field_profile" >
    <legend>Search</legend>
    <form action="index.php" method="post">
      <table width="98%" cellpadding="0" cellspacing="2" class="tab_regis">
        <tr>
          <td align="right" width="14%"><strong>Search : </strong></td>
          <td width="18%"><input type="text" class="lang_box" name="search" value="<?php echo $_REQUEST['search'];  ?>" /></td>
          <td><button class="lang_button"><strong>Search</strong></button></td>
        </tr>
      </table>
      <input type="hidden" name="control" value="tripsale"/>
      <input type="hidden" name="view" value="show"/>
      <input type="hidden" name="task" value="search"/>
    </form>
  </fieldset>
  <div class="detail_container">
    <div class="head_cont">
      <h2 class="main_head">
        <table width="99%">
          <tr>
            <td width="60%" class="main_txt">All trips Sales </td>
            <td align="right"><form name="filterForm" method="post" action="index.php" >
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
    <div class="grid_container" id="mmm">
      <table width="99%" cellpadding="0" cellspacing="0" class="grid">
        <tr>
          <td class="tr_haed bord_left" width="8%" align="center"><strong>S.No.</strong></td>
          <td class="tr_haed bord_right" width="15%"><strong>Name</strong></td>
          <td class="tr_haed bord_right" width="25%"><strong>Trip Name</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Trip Start Date</strong></td>
          <td class="tr_haed bord_right" width="20%"><strong>Trip Booking Date</strong></td>
          <!--
<td class="grd_sep tr_haed " width="35%"><strong>Company</strong></td>  
<td class="grd_sep tr_haed " width="35%"><strong>Operator</strong></td>   -->
          <td class="tr_haed bord_right" align="center"><strong>Action</strong></td>
        </tr>
        <?php  $countno = ($page-1)*$tpages; 
$i=0; 
if(count($trips)) {
	foreach($trips as $trip){ 
	$i++;
	 $countno++;
	 ($i%2==0)? $class="tr_line2 grd_pad" : $class="tr_line1 grd_pad"
?>
        <tr class="<?php echo $class ?>">
          <td  align="center"><?php echo $countno; ?></td>
          <td ><?php echo $trip['fname']." ".$trip['lname']; ?></td>
          <td ><?php echo $trip['trip_title']; ?></td>
          <td ><?php echo $trip['start_trip_datetime']; ?></td>
          <td ><?php echo $trip['booking_date']; ?></td>
          <td  align="center"><a onclick="tripsale('<?php echo $trip['id']; ?>','<?php echo $trip['trip_id']; ?>','<?php echo $trip['trip_schedule_id']; ?>','<?php echo $trip['user_id']; ?>')" class="button" ><img src="images/backend/schedule.png" alt="Schedules" title="Time Schedules" /></a></td>
        </tr>
        <?php } }else{ ?>
        <tr>
          <td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if(count($trips)>0){ ?>
  <?php
include("pagination.php");
echo paginate_three($reload, $page, $tpages, $adjacents,$tdata); ?>
  <?php } ?>
</div>
<script type="text/javascript">

/*function addSch_validation() {
alert("hjhj");
	
}*/


</script>