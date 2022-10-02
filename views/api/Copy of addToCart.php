<?php $totalPrice = 0; ?>
<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='gaurav-facilitator@infranix.com'; // Business email ID
?>
<div id="container">
<!--<div id="header"></div>-->

<div id="content">

<div class="my_account">
<div class="booktrip">
<h2><span>Cart Detail</span></h2>


<form action="<?php echo $paypal_url; ?>" method="post" id="itpdonate-form-paypal">
       
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
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$equipment['no_of_equipment'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
<?php $totalPrice += $equipment['eq_prices'];?>
</td>
<td class="cart_bob price" align="right"><?php echo $equipment['eq_prices'];?>$</td>
</tr>
<?php } ?>
<?php foreach($cabins as $cabin) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $cabin['cabin'];?></strong></td>
<td class="cart_bob">
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$cabin['no_of_cabin'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $cabin['cabin_price'];?>$</td>
</tr>
<?php $totalPrice += $cabin['cabin_price'];?>
<?php } ?>
<?php foreach($foods as $food) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $food['food'];?></strong></td>
<td class="cart_bob">
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$food['no_of_qty'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $food['food_price'];?>$</td>
</tr>
<?php $totalPrice += $food['food_price'];?>
<?php } ?>
<?php foreach($beverages as $beverage) { ?>
<tr>
<td class="cart_bob"><strong><?php echo $beverage['beverage'];?></strong></td>
<td class="cart_bob">
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$beverage['no_of_qty'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo $beverage['beverage_price'];?>$</td>
</tr>
<?php $totalPrice += $beverage['beverage_price'];?>
<?php } ?>

<?php foreach($persons as $person) { ?>
<tr>
<td class="cart_bob"><strong>Persons</strong></td>
<td class="cart_bob">
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$person['no_of_person'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo ($person['no_of_person']*$tripPrice);?>$</td>
</tr>
<?php $totalPrice += ($person['no_of_person']*$tripPrice);?>
<?php } ?>
<?php
foreach($childs as $child) { ?>
<tr>
<td class="cart_bob"><strong>Childs</strong></td>
<td class="cart_bob">
<select class="qty" disabled="disabled">
<?php for($i=0;$i<20;$i++) { ?>
<option value="<?php echo $i;?>" <?php echo ($i==$child['no_of_child'])?("selected=selected"):("");?>><?php echo $i;?></option>
<?php } ?>
</select>
</td>
<td class="cart_bob price" align="right"><?php echo ($child['no_of_child']*($tripPrice*$priceChildPersant)/100);?>$</td>
</tr>
<?php $totalPrice += ($child['no_of_child']*($tripPrice*$priceChildPersant)/100);?>
<?php } ?>


<tr>
<td colspan="2" align="right" class="cart_bob cart_font"><strong>Total :</strong></td>
<td class="cart_bob price" align="right"><?php echo $totalPrice;?> $</td>
</tr>






<tr>
<tr>
<td class="cart_bob"><strong>Service Tax</strong></td>
<td class="cart_bob"><b><?php echo $serviceTax;?>&nbsp;%</b></td>
<td class="cart_bob price" align="right"><?php echo ($serviceTax*$totalPrice)/100;?> $</td>
</tr>
<?php $totalPrice += (($serviceTax*$totalPrice)/100);
$this->Query("UPDATE bookings SET grand_total = '".$totalPrice."' WHERE id = '".$bookingId."'");
$this->Execute();
?>
<tr>
<td colspan="2" align="right" class="cart_bob cart_font"><strong>Grand Total :</strong></td>
<td class="cart_bob price" align="right"><?php echo $totalPrice;?> $</td>
</tr>
<tr>
<td align="left" class="cart_font" colspan="3"><strong>Payment Method :</strong></td>
</tr>
<tr>

<td class="cart_bob price"  colspan="3" align="left">


          <input type="radio" name="payment_method" id="payment_method" value="1" checked="checked" />
          <label for="payment_method"><strong>Paypal</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="payment_method" id="payment_method2" value="2" />
          <label for="payment_method2"><strong>Credit Card</strong></label>

</td>
</tr>

<tr>
<td colspan="3" align="center" valign="bottom">

<!--PAY PAL CODE START HERE-->
            <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="iDive Trip Test Name">
    <input type="hidden" name="item_number" value="<?php echo $bookingId; ?>">
    <input type="hidden" name="amount" value="<?php echo $totalPrice;?>">
    <input type="hidden" name="cpp_header_image" value="http://infranix.net/idive/template/idive_tmp/images/logo.png">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
   <!-- <input type="hidden" name="cancel_return" value="http://infranix.net/idive/mobile.php?control=api&task=paypalCancel&userId=<?php echo $userId ?>&tripId=<?php echo $tripId; ?>">
    <input type="hidden" name="return" value="http://infranix.net/idive/mobile.php?control=api&task=paypalSuccess&userId=<?php echo $userId ?>&tripId=<?php echo $tripId; ?>">
    <input type="hidden" name="notify_url" value="http://infranix.net/idive/mobile.php?control=api&task=ipnNotify">-->
    
    
    
    
    <input type="hidden" name="cancel_return" value="http://infranix.net/paypalTest/success.php?action=cancel">
    <input type="hidden" name="return" value="http://infranix.net/paypalTest/success.php?action=success">
    <input type="hidden" name="notify_url" value="http://infranix.net/paypalTest/success.php?action=notifyurl">
    
    
    
    <!--<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">-->

       <!--PAY PAL CODE END HERE-->
       
       <button type="button" onclick="goBack()" class="lang_button"><strong>Back</strong></button>&nbsp;&nbsp;&nbsp;<button class="lang_button"><strong>Proceed to Checkout</strong></button></td>
</tr>

</table>
</fieldset>


</div>

        </form>

</div>
</div>

</div>
</div>

<script>
function goBack()
  {
 // 	  history.goBack();
 window.history.back();
//history.go(-1);
  }
</script>