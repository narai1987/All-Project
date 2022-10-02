sunil<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<?php
 echo $trips[0]['trip_title']." ".$trips[0]['boat_name']." ".$trips[0]['orign'];?>
</h2>
</div>
<form name="ajax_schedule_form" id="ajax_schedule_form" action="ajax.php?control=trip&task=scheduleSave&tripId=<?php echo $_REQUEST['trip_id'];?>" method="post">
<div style="width:100%;">
<fieldset>
                  <legend><strong>Add Schedule</strong></legend>
                  <div class="pans">
<table width="97%" cellpadding="0" cellspacing="4">
    <tr>
        <td align="right" width="12%"><strong><em class="star_red">*</em> Start Date :</strong></td>
        <td width="19%"><input class="lang_box" id="inputDate" value="<?php echo $schedules[0]['start_trip_datetime']?$schedules[0]['start_trip_datetime']:date("Y-m-d H:i:s"); ?>" name="start_date"/></td>
        <td align="right" width="12%"><strong><em class="star_red">*</em> End Date :</strong></td>
        <td width="23%"><input class="lang_box" id="inputDate2" value="<?php echo $schedules[0]['end_trip_datetime']?$schedules[0]['end_trip_datetime']:date("Y-m-d H:i:s"); ?>" name="end_date"/></td>
        <td></td>
        <td></td>
    </tr>
     <tr>
        <td align="right" width="12%"><strong><em class="star_red">*</em> Trip Price :</strong></td>
        <td width="19%"><input class="lang_box" id="trip_price" value="<?php echo $schedules[0]['trip_price'];?>" name="trip_price"/></td>
        <td align="right" width="12%"></td>
        <td width="23%"></td>
        <td></td>
        <td></td>
    </tr>
	
</table>
<div><input type="button" value="Submit" name="submit" onclick="scheduleSave('<?php echo $_REQUEST['trip_id'];?>','<?php echo $_REQUEST['scheduleId'];?>')"  /></div>
</div>
                </fieldset>
</div>
</form>

    <script type="text/javascript" src="assets/datePicker/js/layout.js?ver=1.0.2"></script>
<script type="text/javascript">
//initLayout();
</script>
      
</div>