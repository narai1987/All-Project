<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" colspan="5"><span class="q_cart_heading">RECENTLY ADDED ITEM(S)</span></td>
            </tr>
            
            <?php if($Shcarts): ?>
           
           <?php foreach($Shcarts AS $cart): ?>
            <tr id="rw">
              <td><a href="index.php?control=cart" class="prod_q_cart"><img src="admin/<?php echo $cart->image;?>" width="64" height="36" /></a></td>
              <td class="prod_q_heading"><?php echo $cart->trip_title;?></td>
              <td class="q_qty">1x</td>
              <td class="prod_q_price"><?php echo $cart->trip_price;?> THB</td>
              <td><a href="#" class="q_close" onclick="Cartremoved('<?php echo $cart->trip_id;?>')"><img src="template/<?php echo $tmp;?>/images/q_close.png" width="16" height="15" /></a></td>
            </tr>
            <tr>
              <td colspan="5" class="bot_border">&nbsp;</td>
            </tr>
            <?php 
			
			$totalPrice += $cart->trip_price;
			endforeach; ?>
            
            
            
            
            <tr>
              <td valign="top" colspan="5"><div class="f_left prod_q_heading">Shipping</div>
                <div class="f_right prod_q_price"></div>
                <div class="clr"></div>
                <div class="f_left prod_q_heading">Total</div>
                <div class="f_right prod_q_price"><?php echo $totalPrice; ?> THB</div></td>
            </tr>
           
           
            <tr>
              <td colspan="5" class="bot_border">&nbsp;</td>
            </tr>
            
            <tr>
              <td valign="top" colspan="5" height="23"><div class="f_left"><a href="#" class="q_checkout_btn">Checkout</a></div>
                <div class="f_right"><a href="index.php?control=cart" class="q_viewcart_btn">View Cart</a></div></td>
            </tr>
            <?php else: ?>
             <tr>
              <td>No items in your shopping cart</td>
              
            </tr>
           
            <?php endif; ?>
          </table>