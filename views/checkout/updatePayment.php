<fieldset class="bookField">
    
    <legend>Paymen Details</legend>
    
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    <td colspan="2" align="right" class="cart_bob cart_font"><strong>Total :</strong></td>
    <td width="16%" class="cart_bob price" align="right"><strong style="color:#f00;"><?php echo $totalPrice;?> THB</strong></td>
    </tr>
    <tr>
    <td align="right" colspan="2" class="cart_bob"><strong>Service Tax <?php echo $serviceTax;?>&nbsp;% :</strong></td>
    
    <td class="cart_bob price" align="right"><strong style="color:#f00;"><?php echo ($serviceTax*$totalPrice)/100;?> THB</strong></td>
    </tr>
    <?php $totalPrice += (($serviceTax*$totalPrice)/100);
    $this->Query("UPDATE bookings SET grand_total = '".$totalPrice."' WHERE id = '".$bookingId."'");
    $this->Execute();
    ?>
    <tr>
    <td colspan="2" align="right" class="cart_bob cart_font"><strong>Grand Total :</strong></td>
    <td class="cart_bob price" align="right"><strong style="color:#f00;"><?php echo $totalPrice;?> THB</strong></td>
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
        <input type="hidden" name="item_name" value="iDive Trip">
        <input type="hidden" name="item_number" value="<?php echo $bookingId; ?>">
        <input type="hidden" name="amount" value="<?php echo $totalPrice;?>">
        <input type="hidden" name="cpp_header_image" value="http://infranix.net/idive/template/idive_tmp/images/logo.png">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="currency_code" value="THB">
        <input type="hidden" name="handling" value="0">
       <!-- <input type="hidden" name="cancel_return" value="http://infranix.net/idive/mobile.php?control=api&task=paypalCancel&userId=<?php echo $userId ?>&tripId=<?php echo $tripId; ?>">
        <input type="hidden" name="return" value="http://infranix.net/idive/mobile.php?control=api&task=paypalSuccess&userId=<?php echo $userId ?>&tripId=<?php echo $tripId; ?>">
        <input type="hidden" name="notify_url" value="http://infranix.net/idive/mobile.php?control=api&task=ipnNotify">-->
        
    <input type="hidden" name="cancel_return" value="http://infranix.net/idive/index.php?control=checkout&task=paypalAbandon&trip_id=<?php echo $tripId; ?>&scheduleId=<?php echo  $scheduleId; ?>">
        <input type="hidden" name="return" value="http://infranix.net/idive/index.php?control=checkout&task=paypalComplete&trip_id=<?php echo $tripId; ?>&scheduleId=<?php echo  $scheduleId; ?>">
        <input type="hidden" name="notify_url" value="http://infranix.net/idive/index.php?control=checkout&task=paypalNotify">
        
        
        
        <!--<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">-->
    
           <!--PAY PAL CODE END HERE-->
           
         
           
           </td>
    </tr>
    </table>
    </fieldset>