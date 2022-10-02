<div class="top_strip"> 
      <!--cart quick view-->
      <!--<div class="q_container" id="qc1"> <a href="index.php?control=cart" class="question"> SHOPPING: &nbsp;Cart Total: <span class="quick_price"> &nbsp;(<span id="tcart"><?php echo count($Shcarts); ?></span>)</span> </a>
        <div class="clr"></div>
        <div class="answer" id="cartList">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" colspan="5"><span class="q_cart_heading">RECENTLY ADDED ITEM(S)</span></td>
            </tr>
            
            <?php if($Shcarts): ?>
           
           <?php foreach($Shcarts AS $cart): ?>
            <tr>
              <td><a href="index.php?control=cart" class="prod_q_cart"><img src="admin/<?php echo $cart->image;?>" width="64" height="36" /></a></td>
              <td class="prod_q_heading"><?php echo $cart->trip_title;?></td>
              <td class="q_qty">1x</td>
              <td class="prod_q_price"><?php echo $cart->trip_price;?> THB</td>
              <td><a href="#" class="q_close" onclick="Cartremoved('<?php echo $cart->trip_id;?>')"><img src="<?php echo $tmp;?>/images/q_close.png" width="16" height="15" /></a></td>
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
        </div>
      </div>-->
      <!--// cart quick view--> 
      
      <!--support-->
      <div class="support" style="margin-left:0px;">SUPPORT: +444 (100) 1234 </div>
      <!--// support--> 
      
      <!--language currency-->
      <div class="curr_lang f_right">
        <div class="lang f_left"><span class="f_right">
          <select name="country_id" id="country_id" tabindex="1" onchange="frmReset(this.value);">
          <?php foreach($getLanguages as $getLanguage) {?>
          <option value="<?php echo $getLanguage['id'];?>" <?php echo $getLanguage['id']==$_SESSION['language_id']?"selected":"";?>><?php echo $getLanguage['content'];?></option>
          <?php } ?>
            <!--<option value="1">English</option>
            <option value="2">Thai</option>
            <option value="3">French</option>-->
          </select>
          </span> </div>
        <div class="curr f_right"><span class="f_right">
          <select name="country_id" id="country_id_currency" tabindex="1" onchange="currReset(this.value)">
          <?php foreach($getCurrency as $currency) { ?>
          	<option value="<?php echo $currency['id'];?>" <?php echo ($_SESSION['currency_id']==$currency['id'])?"selected":"";?>><?php echo $currency['sign_code']." ".$currency['currency'];?></option>
          <?php } ?>
           <!-- <option value="2">$ USD</option>
            <option value="3">&#8364; Euro</option>
            <option value="4">&pound; Pound</option>-->
          </select>
          </span> </div>
      </div>
      <!--// language currency--> 
    </div>
    
    <script type="text/javascript">
	function Cartremoved(val){
				$.ajax({
					url:"ajax.php?control=cart&task=Ajaxremove&trip_id="+val+"&user_id=<?php echo session_id();?>",
					success:function(del){
					
						$.ajax({
							url:"ajax.php?control=cart&task=addToCart",
							 success:function(dd){
								$("#tcart").html(dd);
								/*TO FILL TOP HEADER CART POPUP*/
									$.ajax({
								url:"ajax.php?control=cart&task=addToCart&fillPopup=1",
								 success:function(ddd){
									$("#cartList").html(ddd);
								}});
								/*TO FILL TOP HEADER CART POPUP*/
							
							}});
						 
							
				
				}});
				
			}
			function frmReset(id) {
				$.ajax({
				url:"ajax.php?task=setLanguage&language_id="+id,
				success:function(response){
					window.location.reload();
				}});	
			}
			function currReset(id) {
				$.ajax({
				url:"ajax.php?task=setCurrency&currency_id="+id,
				success:function(response){
					window.location.reload();
					
				}});	
			}
	</script>