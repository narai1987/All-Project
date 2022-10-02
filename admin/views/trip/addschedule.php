
<link rel="stylesheet" href="styles/alertmessage.css" />
<script type="text/javascript">
//setTimeout("closeMsg('closeid2')",5000);
function closeMsg(clss) {
		document.getElementById(clss).className = "clspop";
	}
</script> 
  <!--for alert message start-->
  <style type="text/css">
.clspop {
	display:none;	
}
		.darkbase_bg {
			display:block !important;
			
		}
		
</style>
<style type="text/css">
:disabled
{
background:#F7F7F7;
}
.textWidth {
	width:180px !important;	
}
</style>


<?php 
      if (isset($_SESSION['error']))
{  ?>

<script type="text/javascript">
$( document ).ready(function() {
document.getElementById("closeid2").className = "darkbase_bg";
});

</script>

<?php } ?>



  <!--POPUP MESSAGE-->
  
  <div id="flashMessage" class="message">
    <div  class='clspop' id='closeid2'>
      <div class='alert_pink' > <a class='pop_close'> <img src="images/close.png" onclick="closeMsg('closeid2')" title="close" /> </a>
        <div class='pop_text warn_red' style="background: #f7d9d9 no-repeat 10px center !important;"><!--warn_red-->
          <p style='color:#063;' id="popmsg"><?php echo $_SESSION['error']; ?></p>
          <p id="popbutton" align="center"></p>
        </div>
      </div>
    </div>
  </div>
  <?php  
  unset($_SESSION['error']);
  unset($_SESSION['errorclass']);
  ?>
  <!--POPUP MESSAGE CLOSE-->


<script src="assets/viewJs/ViewValidation.js"></script>
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
    $( "#tod" ).datepicker({
		dateFormat:"yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate: "<?php echo date("Y-m-d") ?>",
      onClose: function( selectedDate ) {
        $( "#fromd" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
  
  
  
  
 
  
  </script>
<?php
	$e = 1;
 foreach($equipments AS $equipment): 
	if($e == 1)
	$equipmentID .= $equipment['id'];
	else
	$equipmentID .= ",".$equipment['id'];
	$e++;
	endforeach;
?>
<?php
	$b = 1;
 foreach($beverages AS $beverage): 
	if($b == 1)
	$validationBeverageArr .= $beverage['id'];
	else
	$validationBeverageArr .= ",".$beverage['id'];
	$b++;
	endforeach;
?>


<?php
	$f = 1;
 foreach($foods AS $food): 
	if($f == 1)
	$validationFoodArr .= $food['id'];
	else
	$validationFoodArr .= ",".$food['id'];
	$f++;
	endforeach;
?>



<div class="detail_container">
<div class="head_cont">
<h2 class="main_head" style="padding-left:5px;">
<?php $tripTpe  = ($trips[0]['trip_type_id'] == "2")?"( Day Trip )":"";
 echo $trips[0]['trip_title']." ".$trips[0]['boat_name']." ".$trips[0]['orign']." ".$tripTpe;?>
</h2>
</div>
<form name="ajax_schedule_form" id="ajax_schedule_form" action="index.php?control=trip&task=scheduleSave&trip_id=<?php echo $_REQUEST['trip_id'];?>&schedule_id=<?php echo $_REQUEST['scheduleId'];?>" method="post" onsubmit="return scheduleSave('<?php echo $_REQUEST['trip_id'];?>','<?php echo $_REQUEST['scheduleId'];?>','<?php echo $equipmentID;?>','<?php echo $validationBeverageArr;?>','<?php echo $validationFoodArr;?>');" >
<div style="width:100%;">
<fieldset>
                  <legend><strong>Add Schedule</strong></legend>
                  <div class="pans">
<table width="97%" cellpadding="0" cellspacing="4">
    <tr>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> Start Date :</strong></td>
        <td width="19%">
        <input readonly="readonly" type="text" id="fromd" name="start_date" class="lang_box" value="<?php echo $schedules[0]['start_trip_datetime']?date("Y-m-d",strtotime($schedules[0]['start_trip_datetime'])):date("Y-m-d"); ?>" >
        </td>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> End Date :</strong></td>
        <td width="23%">
        <input readonly="readonly" class="lang_box" id="tod" value="<?php echo $schedules[0]['end_trip_datetime']?date("Y-m-d",strtotime($schedules[0]['end_trip_datetime'])):date("Y-m-d"); ?>" name="end_date" <?php if($trips[0]['trip_type_id'] == "2"){ ?> disabled="disabled" <?php } ?>/>
        </td>
        <td></td>
        <td></td>
    </tr>
     <tr>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> Trip Price :</strong></td>
        <td width="19%"><input class="lang_box" id="trip_price" value="<?php echo $schedules[0]['trip_price'];?>" name="trip_price" disabled="disabled" /> <br />
        <span id="msgtrip_price" style="color:red;" class="font"></span></td>
        <td align="right" width="12%"></td>
        <td width="23%"></td>
        <td></td>
        <td></td>
    </tr>
    
    
    <tr>
    <td align="justify" colspan="6"><h3 style="color:#286fb6;border-bottom:2px dotted #286fb6; padding-bottom:5px;margin-bottom:5px;">&rsaquo; Add Equipments </h3></td>
    </tr>
	<?php foreach($equipments as $equipment): 
	
				
	?>
    <tr>
        <td align="right" width="12%"><strong><em class="star_red"> * </em><?php echo $equipment['equipment'] ?> :</strong></td>
        <td width="19%"><input type="checkbox"   class="lang_box chk_class" id="chk_eq_<?php echo $equipment['id'] ?>" value="<?php echo $equipment['id'] ?>" name="equipment[<?php echo $equipment['id'] ?>]" <?php echo $arr[$equipment['id']]['id']?"checked=checked":"";?> /></td>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> Price :</strong></td>
        <td width="23%"><select class="lang_box" name="eqtype[<?php echo $equipment['id'] ?>]" id="eqtype<?php echo $equipment['id']; ?>">
        <option value="paid" <?php echo ($arr[$equipment['id']]['eq_type']=="paid")?"selected=selected":"";?>  >Paid</option>
        <option value="free" <?php echo ($arr[$equipment['id']]['eq_type']=="free")?"selected=selected":"";?> >Free</option>
        </select></td>
        <td align="right" width="15%"><strong><em class="star_red"> * </em> If paid(Price) :</strong></td>
        <td width="24%"><input class="lang_box" id="eqprice_<?php echo $equipment['id'] ?>" value="<?php echo $arr[$equipment['id']]['eq_value'] ?>" name="eqprice[<?php echo $equipment['id'] ?>]"  onkeyup="Numericchk(this.value,this.id)"/>
        <br />
        <span id="msgeqprice_<?php echo $equipment['id']; ?>" style="color:red;" class="font"></span></td>
    </tr>
    <?php endforeach; ?>
    
    
    <tr>
    <td align="justify" colspan="6"><h3 style="color:#286fb6;border-bottom:2px dotted #286fb6; padding-bottom:5px;margin-bottom:5px;">&rsaquo; Add Beverages </h3></td>
    </tr>
    
	<?php foreach($beverages as $beverage): ?>
    
    <tr>
        <td align="right" width="12%"><strong><em class="star_red"> * </em><?php echo $beverage['beverage'] ?> :</strong></td>
        <td width="19%"><input type="checkbox"   class="lang_box chk_class" id="chk_bv_<?php echo $beverage['id'] ?>" value="<?php echo $beverage['id'] ?>" name="beverage[<?php echo $beverage['id'] ?>]" <?php echo $arrBV[$beverage['id']]['id']?"checked=checked":"";?> /></td>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> Price :</strong></td>
        <td width="23%"><select class="lang_box" name="bvtype[<?php echo $beverage['id'] ?>]" id="bvtype<?php echo $beverage['id']; ?>">
        <option value="paid" <?php echo ($arrBV[$beverage['id']]['eq_type']=="paid")?"selected=selected":"";?>  >Paid</option>
        <option value="free" <?php echo ($arrBV[$beverage['id']]['eq_type']=="free")?"selected=selected":"";?> >Free</option>
        </select></td>
        <td align="right" width="15%"><strong><em class="star_red"> * </em> If paid(Price) :</strong></td>
        <td width="24%"><input class="lang_box" id="bvprice_<?php echo $beverage['id'] ?>" value="<?php echo $arrBV[$beverage['id']]['eq_value'] ?>" name="bvprice[<?php echo $beverage['id'] ?>]"  />
        <br />
        <span id="msgbvprice_<?php echo $beverage['id']; ?>" style="color:red;" class="font"></span></td>
    </tr>
    
    <?php endforeach; ?>
    
    
    <tr>
    <td align="justify" colspan="6"><h3 style="color:#286fb6;border-bottom:2px dotted #286fb6; padding-bottom:5px;margin-bottom:5px;">&rsaquo; Add Foods </h3></td>
    </tr>
	<?php foreach($foods as $food): 
	
				
	?>
    <tr>
        <td align="right" width="18%"><strong><em class="star_red"> * </em> <?php echo $food['food'] ?> : </strong></td>
        <td width="10%"><input type="checkbox"   class="lang_box chk_class" id="chk_fd_<?php echo $food['id'] ?>" value="<?php echo $food['id'] ?>" name="food[<?php echo $food['id'] ?>]" <?php echo $arrFD[$food['id']]['id']?"checked=checked":"";?> /></td>
        <td align="right" width="12%"><strong><em class="star_red"> * </em> Price :</strong></td>
        <td width="23%"><select class="lang_box" name="fdtype[<?php echo $food['id'] ?>]" id="fdtype<?php echo $food['id']; ?>">
        <option value="paid" <?php echo ($arrFD[$food['id']]['eq_type']=="paid")?"selected=selected":"";?>  >Paid</option>
        <option value="free" <?php echo ($arrFD[$food['id']]['eq_type']=="free")?"selected=selected":"";?> >Free</option>
        </select></td>
        <td align="right" width="15%"><strong><em class="star_red"> * </em> If paid(Price) :</strong></td>
        <td width="24%"><input class="lang_box" id="fdprice_<?php echo $food['id'] ?>" value="<?php echo $arrFD[$food['id']]['eq_value'] ?>" name="fdprice[<?php echo $food['id'] ?>]"  onkeyup="Numericchk(this.value,this.id)"/>
        <br />
        <span id="msgfdprice_<?php echo $food['id']; ?>" style="color:red;" class="font"></span></td>
    </tr>
    <?php endforeach; ?>
    
    </table><br />

<div align="right">
<input type="hidden" name="trip_id" value="<?php echo $_REQUEST['trip_id'];?>"  />
<input type="hidden" name="scheduleId" value="<?php echo $_REQUEST['scheduleId'];?>"  />
<input type="hidden" name="trip_id" value="<?php echo $_REQUEST['trip_id'];?>"  />


<input type="text" id="isBooked" name="isBooked" value="<?php echo count($isBooking); ?>" />
<input type="submit"class="lang_button" value="Submit" name="submit" id="submitt"   />
</div>


</div>
</fieldset>
</div>
</form>

      
</div>


<script type="text/javascript">
 
  function sendscheduleform(str){
	  
	$("#tod").attr("disabled", false);
	$("#ajax_schedule_form :input").attr("disabled", false);
	$('#ajax_schedule_form').removeAttr('onsubmit');
	$('#submitt').click();
}
</script>
