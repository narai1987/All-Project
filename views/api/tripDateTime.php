<?php $dateTime;
$type = $_REQUEST['controlId'];//=="start_date"?"end_date":"start_date";
?>
<option value="0">Start Date</option>
<?php foreach($schedules as $schedule) { ?>
<option value="<?php echo $schedule['id'];?>" <?php echo ($schedule[$type]==$dateTime[0][$type])?"selected=selected":"";?>><?php echo $schedule[$type];?></option>
<?php }?>