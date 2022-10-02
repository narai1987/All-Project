<div id="container">
<!--<div id="header"></div>-->

<div id="content">

<div class="my_account">
<div class="booktrip">
<form action="webview.php" name="bookingFrm" method="post" onsubmit="return bookingValidate();" >
<fieldset class="bookField" id="availCabin">
<legend>Available Cabin</legend>
<?php
$i = 0;
foreach($cabins as $cabin) {
	
	/* GET AVAILABLE CABINS */
$noOfAvailableCabin = $cabin['no_of_cabin'] - $this->getAvailableCabin($scheduleId, $userId, $cabin['id']);
	/* GET AVAILABLE CABINS */
?>


				<input type="checkbox" name="cabinbox[]" id="cabinbox_<?php echo $cabin['id'];?>" class="custom" value="<?php echo $cabin['id'];?>" onchange="checkCheckBox('<?php echo $cabin['id'];?>','divcabin','cabinbox_')" <?php echo count($bookCabin[$cabin['id']])?"checked=checked":"";?>   <?php if($noOfAvailableCabin <=0){ ?> disabled="disabled" <?php } ?> />
                <label for="cabinbox_<?php echo $cabin['id'];?>" class="per_bold"><?php echo ucwords($cabin['cabin']);?> :<span class="price"><input type="hidden" value="<?php echo $cabin['cabin_price'];?>" readonly="readonly" name="cabinprice<?php echo $cabin['id'];?>"  /><?php echo $cabin['cabin_price'];?>THB</span></label><br />
                <div class="divcabin" id="divcabin<?php echo $cabin['id'];?>" <?php echo count($bookCabin[$cabin['id']])?"style=display:block !important;":"";?>>
                <label for="checkbox2_0" class="per_bold">Available :<span class="price"><?php echo $cabin['no_of_cabin'];?></span></label>
                &nbsp;&nbsp;&nbsp;<label for="checkbox2_0" class="per_bold">Choose :<?php echo $bookCabin[$cabin['id']]['no_of_cabin'];?>
                <select name="choose_no_cabin<?php echo $cabin['id'];?>"  <?php if($noOfAvailableCabin <=0){ ?> disabled="disabled" <?php } ?> >
                <?php for($k=1;$k<=$cabin['no_of_cabin'];$k++) {?>
                	<option value="<?php echo $k;?>" <?php echo $k==$bookCabin[$cabin['id']]['no_of_cabin']?"selected=selected":"";?> ><?php echo $k;?></option>
                <?php }?>
                </select>
                </label>
                <label for="checkbox2_0" class="per_bold">Men Capacity :<span class="price"><?php echo $cabin['no_of_person'];?></span></label>
                </div>
 <?php $i++; } ?>

</fieldset>

<fieldset class="bookField">
<legend>Available Option</legend>
<?php
$i = 0;
foreach($equipments as $equipment) {?>
				<input type="checkbox" name="equipmentbox[]" id="equipmentbox_<?php echo $equipment['id'];?>" class="custom" value="<?php echo $equipment['id'];?>" onchange="checkCheckBox('<?php echo $equipment['id'];?>','divequipment','equipmentbox_')" <?php echo count($bookEquipment[$equipment['id']])?"checked=checked":"";?> />
                <label for="equipmentbox_<?php echo $equipment['id'];?>" class="per_bold"><?php echo ucwords($equipment['equipment']);?> :<span class="price"><input type="hidden" value="<?php echo $equipment['eq_value'];?>" readonly="readonly" name="eq_value<?php echo $equipment['id'];?>"  /><?php echo $equipment['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divequipment<?php echo $equipment['id'];?>" <?php echo count($bookEquipment[$equipment['id']])?"style=display:block !important;":"";?>>
                <label  class="per_bold">Quantity :<select name="choose_no_eqipment<?php echo $equipment['id'];?>" >
                <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>" <?php echo $k==$bookEquipment[$equipment['id']]['no_of_equipment']?"selected=selected":"";?> ><?php echo $k;?></option>
                <?php }?>
                
                </select></label>
                </div>
                <?php $i++; } ?>
               

</fieldset>



<fieldset class="bookField">
<legend>Beverages</legend>
<?php
$i = 0;
foreach($beverages as $beverage) {?>
				<input type="checkbox" name="beveragebox[]" id="beveragebox_<?php echo $beverage['id'];?>" class="custom" value="<?php echo $beverage['id'];?>" onchange="checkCheckBox('<?php echo $beverage['id'];?>','divbeverage','beveragebox_')" <?php echo count($bookBeverage[$beverage['id']])?"checked=checked":"";?>  />
                <label for="beveragebox_<?php echo $beverage['id'];?>" class="per_bold"><?php echo ucwords($beverage['beverage']);?> :<span class="price">
				<input type="hidden" value="<?php echo $beverage['eq_value'];?>" readonly="readonly" name="beverage_price<?php echo $beverage['id'];?>"  />
				<?php echo $beverage['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divbeverage<?php echo $beverage['id'];?>" <?php echo count($bookBeverage[$beverage['id']])?"style=display:block !important;":"";?>>
                <label  class="per_bold">Quantity :<select name="choose_no_beverage<?php echo $beverage['id'];?>" >
               <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>" <?php echo $k==$bookBeverage[$beverage['id']]['no_of_qty']?"selected=selected":"";?> ><?php echo $k;?></option>
                <?php }?>
                </select></label>
                </div>
                <?php $i++; } ?>
               

</fieldset>

<fieldset class="bookField">
<legend>Foods</legend>
<?php
$i = 0;
foreach($foods as $food) {?>
				<input type="checkbox" name="foodbox[]" id="foodbox_<?php echo $food['id'];?>" class="custom" value="<?php echo $food['id'];?>" onchange="checkCheckBox('<?php echo $food['id'];?>','divfood','foodbox_')" <?php echo count($bookFood[$food['id']])?"checked=checked":"";?>  />
                <label for="foodbox_<?php echo $food['id'];?>" class="per_bold"><?php echo ucwords($food['food']);?> :<span class="price">
				<input type="hidden" value="<?php echo $food['eq_value'];?>" readonly="readonly" name="food_eq_value<?php echo $food['id'];?>"  />
				<?php echo $food['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divfood<?php echo $food['id'];?>" <?php echo count($bookFood[$food['id']])?"style=display:block !important;":"";?>>
                <label  class="per_bold">Quantity :<select name="choose_no_food<?php echo $food['id'];?>" >
                <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>" <?php echo $k==$bookFood[$food['id']]['no_of_qty']?"selected=selected":"";?> ><?php echo $k;?></option>
                <?php }?>
                </select></label>
                </div>
                <?php $i++; } ?>
               

</fieldset>

<input type="hidden" name="control" value="api"  />
<input type="hidden" name="task" value="addToCart"  />
<input type="hidden" name="userId" value="<?php echo $userId;?>"  />
<input type="hidden" name="tripId" value="<?php echo $tripId;?>"  />
<input type="hidden" name="scheduleId" value="<?php echo $scheduleId;?>"  />
<input type="hidden" name="bookingId" value="<?php echo $booking_id;?>"  />
<a href="webview.php?control=api&task=scheduleTrip&bookingId=<?php echo $booking_id;?>&scheduleId=<?php echo $scheduleId;?>&tripId=<?php echo $tripId;?>&userId=<?php echo $userId;?>" class="lang_button"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;<button class="lang_button"><strong>Next</strong></button>
</form> 
</div>
</div>
</div>
</div>
<script>
function goBack()
  {
  window.history.back()
  }
</script>