
<div class="breadcrumbs">
	<div class="bread_heading f_left">Trips</div>
    <div class="bread_links f_right"><a href="index.php?control=trip">Trips</a>/<a class="bread_active">Time shedule</a></div>
</div>
<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  

<div class="detail_right right">
<div class="detail_container">
<div class="head_cont">
<h2 class="main_head">
<table width="99%">
<tr>
<td width="60%" class="main_txt"><?php echo $results[0]['trip_title']." ".$results[0]['boat_name']." ".$results[0]['orign'];?><?php //echo $keyword['trips'];?></td> 
<td width="30%"></td>
<td><a href="index.php?control=trip&task=addschedule&scheduleId=<?php echo $trip['id']; ?>&trip_id=<?php echo $_REQUEST['trip_id']; ?>"  ><img src="images/add_new.png" /></a></td>
</tr>
</table>
</h2>
</div>

<div class="grid_container" id="mmm">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<tr>

<td class="grd_sep tr_haed bord_left" width="8%" align="center"><strong>S.No.</strong></td>
<td class=" grd_sep tr_haed bord_right" width="22%" align="center"><strong>Start</strong></td>
<td class="grd_sep tr_haed bord_right " width="22%" align="center"><strong>End</strong></td>  <!----> 
<td class="grd_sep tr_haed bord_right " width="22%" align="center"><strong>Status</strong></td>   
<td class="grd_sep tr_haed bord_right" align="center"><strong>Action</strong></td>
</tr>
</table>
<div style="max-height:400px; overflow:auto;">
<table width="99%" cellpadding="0" cellspacing="0" class="grid">
<?php 
$i=0; 
//print_r($results);
if(count($results)) {
	foreach($results as $trip){ 
		$i++;
		if($trip['start_trip_datetime']<date("Y-m-d H:i:s") && $trip['end_trip_datetime']>date("Y-m-d H:i:s")) {
			$status = "Running";
		}
		else if($trip['start_trip_datetime']<date("Y-m-d H:i:s") && $trip['end_trip_datetime']<date("Y-m-d H:i:s")) {
			$status = "Closed";
		}
		else {
			$status = "Coming Up";
		}
?>
<tr>
<td class="tr_line1 grd_pad grd_sep" width="8%" align="center"> <?php echo $i; ?> </td>
<td class="tr_line1" width="22%" align="center"><?php echo $trip['start_trip_datetime']; ?></td> 
<td class="tr_line1" width="22%" align="center"><?php echo $trip['end_trip_datetime']; ?></td>

<td class="tr_line1" width="22%" align="center"><?php echo $status; ?></td> 
<td class="tr_line1" align="center">
<!--<a href="#" onclick="addSchedule('<?php echo $_REQUEST['trip_id']; ?>','<?php echo $trip['id']; ?>')" class="button"><img src="images/edit.png" alt="edit" title="Edit" /></a>-->

<?php if($status != "Closed"){ ?>
<a href="index.php?control=trip&task=addschedule&scheduleId=<?php echo $trip['id']; ?>&trip_id=<?php echo $trip['trip_id']; ?>"  class="button"><img src="images/edit.png" alt="edit" title="Edit" /></a>
<?php if($trip['status']){  ?>
<a  onclick="scheduleStatus('<?php echo $_REQUEST['trip_id']; ?>','<?php echo $trip['id']; ?>','Unpublish')" >
<img src="images/backend/check.png" title="Click to Unpublish"/>
</a>
<?php } else{ ?>
<a  onclick="scheduleStatus('<?php echo $_REQUEST['trip_id']; ?>','<?php echo $trip['id']; ?>','Publish')" >
<img src="images/backend/check_de.png" title="Click to Publish" />
</a>
<?php } ?>
<!--<a  onclick="deleteSchedule('<?php echo $_REQUEST['trip_id']; ?>','<?php echo $trip['id']; ?>')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>-->
<a href="index.php?control=trip&task=scheduleDelete&trip_id=<?php echo $trip['trip_id']; ?>&scheduleId=<?php echo $trip['id']; ?>"  onclick="scheduleAction('<?php echo $trip['id']; ?>','scheduleDelete','You are really want to delete')" ><img src="images/backend/del.png" alt="Delete" title="Delete" /></a>
<?php } ?>


<?php if($trip['countItinerary']) { ?>
<a href="index.php?control=trip&task=itinerary&scheduleId=<?php echo $trip['id']; ?>&tripId=<?php echo $trip['trip_id']; ?>" ><img src="images/backend/travel.png" alt="Itineraries" title="Itineraries" /></a>
<?php } else {?>
<a onclick="itinerary('<?php echo $trip['id']; ?>')" class="button" ><img src="images/backend/travel.png" alt="Itineraries" title="Itineraries" /></a>
<?php } //echo $trip['countItinerary']."d"; ?>
<a onclick="copyScheduleOpen('<?php echo $trip['id']; ?>')"  ><img src="images/copy.png" alt="Copy Schedule" title="Copy Schedule" /></a>
</td>
</tr>

<?php } }else{ ?>
<tr>
<td class="tr_line2 grd_pad" colspan="5" align="center"><strong>Data not found.</strong></td>
</tr>

<?php } ?>

</table>

</div>
</div>
</div>


      
</div>


<link rel="stylesheet" type="text/css" href="assets/popup/css/reveal.css" media="all" />
<script type="text/javascript" src="assets/popup/js/jquery.reveal.js"></script>




<link rel="stylesheet" href="assets/calender/newCal/jquery-ui.css" />
	<script src="assets/calender/newCal/jquery-1.9.1.js"></script>
    <script src="assets/calender/newCal/jquery-ui.js"></script>
<script type="text/javascript">
jQuery.noConflict();
  jQuery(function($) {
    $( "#fromd" ).datepicker({
		dateFormat:"yy-mm-dd",	
      changeMonth: true,
      changeYear: true,
      minDate: "<?php echo date("Y-m-d") ?>",
      onClose: function( selectedDate ) {
        $( "#tod" ).datepicker( "option", "minDate", selectedDate );
		$("#tod").val($("#fromd").val());
      }
    });
   
  });
  
  
  </script>
<script type="text/javascript">
	function copyScheduleOpen(id) {
		if(confirm('Are you sure you want to create copy of this schedule ?')) {
		document.getElementById("popupid").click();
		document.getElementById("scheduleId").value = id;
		}
	}
	
	function copyScheduleValidation() {
		if(document.getElementById("fromd").value)
			return true;
		else 
			return false;		
	}
</script>
<style type="text/css">
	div.copySc {
		left:40%;
		top:30%;
		width:90%;
		height:auto;
		background:#FFF;
		padding:20px 0 0 50px;
	}
	div.copySc input, .copyButton {
		width:80%;
		height:45px;
		font-family:Verdana, Geneva, sans-serif;
		font-size:24px;
		font-weight:100;
		color:#CCC;
	}
	
</style>























<!--popup-->
<a href="#" id="popupid" data-reveal-id="myModal"></a>
<div id="myModal" class="reveal-modal">
<div style="float:right; width:100%;">
<div class="news_title_pop">Copy & Save New Schedule</div>
<br />
<div>
<p id="cartajaxdata">

<div class="copySc">
	<form action="index.php" name="frmCopySchedule" id="frmCopySchedule" method="post" onsubmit="return copyScheduleValidation();" >
	<input type="text" name="scheduleStart" id="fromd"  />
    <input type="hidden" name="control" id="control" value="trip" />
    <input type="hidden" name="scheduleId" id="scheduleId" value="" />
    <input type="hidden" name="task" id="task" value="saveCopySchedule" />
    <br /> <br />
    <button type="submit" name="copySubmit" class="lang_button copyButton" >Save Copy</button>
    </form>
    </div>

</p>
</div>
<a class="close-reveal-modal"><img src="images/close2.png" width="23" height="23" /></a> </div>
</div>