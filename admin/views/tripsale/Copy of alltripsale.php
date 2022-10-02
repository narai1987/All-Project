<?php $_REQUEST['tpages'] = $_REQUEST['tpages']?$_REQUEST['tpages']:5;?>  

<div class="detail_right right" style="float:none !important;">
<div class="detail_container">
<div class="head_cont">
<h2 class="testimonial_s">
<table width="99%">
<tr>
<td width="60%"><?php echo $results[0]['trip_title']." ".$results[0]['boat_name']." ".$results[0]['orign'];?><?php //echo $keyword['trips'];?></td> 

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
