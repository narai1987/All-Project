<div id="container">
<div id="content">
<form name="frmMember" action="webview.php" method="post" onsubmit="return bMember();">
<!--MEMBER BOOKINGS START HERE-->
<div class="my_account" id="divbook_1">
<div class="booktrip">
<h2><span>Trip (Schedule)</span></h2>
<p><select class="date_trip left" name="start_date" id="start_date" onChange="tripDateTime(this.value,'1','<?php echo $_REQUEST['tripId'];?>')">
<option>Start Date</option>
<?php foreach($schedules as $schedule) { ?>
<option value="<?php echo $schedule['id'];?>"><?php echo $schedule['start_date'];?></option>
<?php }?>
</select> <select class="date_trip right" name="end_date" id="end_date" onChange="tripDateTime(this.value,'2','<?php echo $_REQUEST['tripId'];?>')">
<option>Start Date</option>
<?php foreach($schedules as $schedule) { ?>
<option value="<?php echo $schedule['id'];?>"><?php echo $schedule['end_date'];?></option>
<?php }?>
</select></p>
<div class="scedule">
<fieldset class="bookField">
<legend>Member/Person</legend>
<table cellspacing="0" cellpadding="0" class="tabls">
<tr>
<td width="30%">No. of Adults:</td>
<td><select class="person" name="adult" id="adult" onChange="divPerson(this.value,child.value)">
<?php for($i=0;$i<20;$i++){ ?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select></td>
</tr>

<tr>
<td width="30%">No. of Child:</td>
<td><select class="person" name="child" id="child" onChange="divPerson(adult.value,this.value)">
<?php for($i=0;$i<20;$i++){ ?>
<option value="<?php echo $i;?>"><?php echo $i;?></option>
<?php }?>
</select></td>
</tr>

</table>

</fieldset>

<fieldset class="bookField">
<legend>Member Details</legend>

<div class="main_collaps" id="memberCollaps">

</div>

</fieldset>
</div>


</div>

<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
        <td align="right" >
<button type="button" onclick="goBack()" class="lang_button"><strong>Back</strong></button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="nextDiv('2')" class="lang_button"><strong>Next</strong></button>
        </td>
    </tr>
</table>
</div>
<!--MEMBER BOOKINGS END HERE-->  
<!--OPTIONS BOOKINGS START HERE--> 
<div class="my_account" id="divbook_2" style="display:none;">
<div class="booktrip">
<h2><span>Trip (Options)</span></h2>
<fieldset class="bookField">
<legend>Available Cabin</legend>
<?php
$i = 0;
foreach($cabins as $cabin) {?>
				<input type="checkbox" name="cabinbox[]" id="cabinbox_<?php echo $cabin['id'];?>" class="custom" value="<?php echo $cabin['id'];?>" onchange="checkCheckBox('<?php echo $cabin['id'];?>','divcabin','cabinbox_')" />
                <label for="cabinbox_<?php echo $cabin['id'];?>" class="per_bold"><?php echo ucwords($cabin['cabin']);?> :<span class="price"><input type="hidden" value="<?php echo $cabin['cabin_price'];?>" readonly="readonly" name="cabinprice<?php echo $cabin['id'];?>"  /><?php echo $cabin['cabin_price'];?>THB</span></label><br />
                <div class="divcabin" id="divcabin<?php echo $cabin['id'];?>">
                <label for="checkbox2_0" class="per_bold">Available :<span class="price"><?php echo $cabin['no_of_cabin'];?></span></label>
                &nbsp;&nbsp;&nbsp;<label for="checkbox2_0" class="per_bold">Choose :<select name="choose_no_cabin<?php echo $cabin['id'];?>" >
                <?php for($k=1;$k<=$cabin['no_of_cabin'];$k++) {?>
                	<option value="<?php echo $k;?>"><?php echo $k;?></option>
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
				<input type="checkbox" name="equipmentbox[]" id="equipmentbox_<?php echo $equipment['id'];?>" class="custom" value="<?php echo $equipment['id'];?>" onchange="checkCheckBox('<?php echo $equipment['id'];?>','divequipment','equipmentbox_')" />
                <label for="equipmentbox_<?php echo $equipment['id'];?>" class="per_bold"><?php echo ucwords($equipment['equipment']);?> :<span class="price"><input type="hidden" value="<?php echo $equipment['eq_value'];?>" readonly="readonly" name="eq_value<?php echo $equipment['id'];?>"  /><?php echo $equipment['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divequipment<?php echo $equipment['id'];?>">
                <label  class="per_bold">Quantity :<select name="choose_no_eqipment<?php echo $equipment['id'];?>" >
                <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>"><?php echo $k;?></option>
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
				<input type="checkbox" name="beveragebox[]" id="beveragebox_<?php echo $beverage['id'];?>" class="custom" value="<?php echo $beverage['id'];?>" onchange="checkCheckBox('<?php echo $beverage['id'];?>','divbeverage','beveragebox_')" />
                <label for="beveragebox_<?php echo $beverage['id'];?>" class="per_bold"><?php echo ucwords($beverage['beverage']);?> :<span class="price">
				<input type="hidden" value="<?php echo $beverage['eq_value'];?>" readonly="readonly" name="beverage_price<?php echo $beverage['id'];?>"  />
				<?php echo $beverage['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divbeverage<?php echo $beverage['id'];?>">
                <label  class="per_bold">Quantity :<select name="choose_no_beverage<?php echo $beverage['id'];?>" >
               <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>"><?php echo $k;?></option>
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
				<input type="checkbox" name="foodbox[]" id="foodbox_<?php echo $food['id'];?>" class="custom" value="<?php echo $food['id'];?>" onchange="checkCheckBox('<?php echo $food['id'];?>','divfood','foodbox_')" />
                <label for="foodbox_<?php echo $food['id'];?>" class="per_bold"><?php echo ucwords($food['food']);?> :<span class="price">
				<input type="hidden" value="<?php echo $food['eq_value'];?>" readonly="readonly" name="food_eq_value<?php echo $food['id'];?>"  />
				<?php echo $food['eq_value'];?>THB</span></label><br />
                  <div class="divcabin" id="divfood<?php echo $food['id'];?>">
                <label  class="per_bold">Quantity :<select name="choose_no_food<?php echo $food['id'];?>" >
                <?php for($k=($_REQUEST['child']+$_REQUEST['adult']);$k>=1;$k--) {?>
                	<option value="<?php echo $k;?>"><?php echo $k;?></option>
                <?php }?>
                </select></label>
                </div>
                <?php $i++; } ?>
               

</fieldset>


</div>
<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
        <td align="right" >
<button type="button" onclick="goBack()" class="lang_button"><strong>Back</strong></button>&nbsp;&nbsp;&nbsp;<button type="button" onclick="nextDiv('3')" class="lang_button"><strong>Next</strong></button>
        </td>
    </tr>
</table>
</div>
<!--ADD TO CART SHOW START HERE-->
<div class="my_account" id="divbook_3" style="display:none;">
<div class="booktrip">
<h2><span>Cart Detail</span></h2>

<div class="scedule">
<fieldset class="bookField">

<legend>Trip Pricing</legend>

<table width="100%" cellpadding="0" cellspacing="0">
<tr class="cart_font">
<td class="cart_bob" width="45%"><strong>Items</strong></td>
<td class="cart_bob" width="20%"><strong>Qty</strong></td>
<td class="cart_bob" align="center"><strong>Price</strong></td>
</tr>
<?php foreach($equipments as $equipment) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $equipment['equipment'];?></strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$equipment['no_of_equipment'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
<?php $totalPrice += $equipment['eq_prices'];?>
</td>
<td class="cart_bob price" align="right"><?php echo $equipment['eq_prices'];?>THB</td>
</tr>
<?php } ?>
<?php foreach($cabins as $cabin) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $cabin['cabin'];?></strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$cabin['no_of_cabin'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $cabin['cabin_price'];?>THB</td>
</tr>
<?php $totalPrice += $cabin['cabin_price'];?>
<?php } ?>
<?php foreach($foods as $food) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $food['food'];?></strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$food['no_of_qty'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $food['food_price'];?>THB</td>
</tr>
<?php $totalPrice += $food['food_price'];?>
<?php } ?>
<?php foreach($beverages as $beverage) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $beverage['beverage'];?></strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$beverage['no_of_qty'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $beverage['beverage_price'];?>THB</td>
</tr>
<?php $totalPrice += $beverage['beverage_price'];?>
<?php } ?>

<?php foreach($persons as $person) { ?>
<tr>
<td class="cart_bob"><strong>Persons</strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$person['no_of_person'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo ($person['no_of_person']*$tripPrice);?>THB</td>
</tr>
<?php $totalPrice += ($person['no_of_person']*$tripPrice);?>
<?php } ?>
<?php
foreach($childs as $child) { ?>
<tr>
<td class="cart_bob"><strong>Childs</strong></td>
<td class="cart_bob">
<select class="qty">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$child['no_of_child'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo ($child['no_of_child']*($tripPrice*$priceChildPersant)/100);?>THB</td>
</tr>
<?php $totalPrice += ($child['no_of_child']*($tripPrice*$priceChildPersant)/100);?>
<?php } ?>


<tr>
<td colspan="2" align="right" class="cart_bob cart_font"><strong>Total :</strong></td>
<td class="cart_bob price" align="right"><?php echo $totalPrice;?> THB</td>
</tr>
<tr>
<tr>
<td class="cart_bob"><strong>Service Tax</strong></td>
<td class="cart_bob"><b><?php echo $serviceTax;?>&nbsp;%</b></td>
<td class="cart_bob price" align="right"><?php echo ($serviceTax*$totalPrice)/100;?> THB</td>
</tr>
<?php $totalPrice += (($serviceTax*$totalPrice)/100);?>
<td colspan="2" align="right" class="cart_bob cart_font"><strong>Grand Total :</strong></td>
<td class="cart_bob price" align="right"><?php echo $totalPrice;?> THB</td>
</tr>


<tr>
<td colspan="3" align="center" valign="bottom"><button type="button" onclick="goBack()" class="lang_button"><strong>Back</strong></button>&nbsp;&nbsp;&nbsp;<button class="lang_button"><strong>Proceed to Checkout</strong></button></td>
</tr>

</table>





</fieldset>


</div>


</div>
<table width="100%" cellpadding="0" cellspacing="0" class="tab_button">
    <tr>
        <td align="right" >
<button type="button" onclick="goBack()" class="lang_button"><strong>Back</strong></button>&nbsp;&nbsp;&nbsp;<button type="button" class="lang_button"><strong>Next</strong></button>
        </td>
    </tr>
</table>
</div> 
<!--ADD TO CART SHOW END HERE--> 

        <input type="hidden" name="control" value="api"  />
        <input type="hidden" name="task" value="saveMember"  />
        <input type="hidden" name="tripId" value="<?php echo $_REQUEST['tripId'];?>"  />
        <input type="hidden" name="userId" id="userId" value="<?php echo $_REQUEST['userId'];?>"  />
</form>
</div>
</div>
<script type="text/javascript">
	var divid = 1;
	function nextDiv(str) {
		alert(str);
		 var newdiv="divbook_"+str;
		 var olddiv="divbook_"+divid;
		 divid = str;
		document.getElementById(olddiv).style.display = "none";
		document.getElementById(newdiv).style.display = "block";
		
	}
	function backDiv() {
		
	}
</script>