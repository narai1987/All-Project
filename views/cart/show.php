<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php">Home</a> >> <b>Shopping Cart</b></div>
    </div>
    <div class="tab_content_trip">
    <div class="page_heading">Shopping Cart</div>
      <div class="trip_box_cont">
        <div class="trip_box trip_box_compare">
            <table class="cart_table" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="380" class="r_bod bot_bod" scope="col">Trip Name</th>
                <th align="center" class="r_bod bot_bod" scope="col">Persons</th>
                <th align="center" class="r_bod bot_bod" scope="col">Children</th>
                <th align="center" class="r_bod bot_bod" scope="col">Trip Price</th>
                <th align="center" class="r_bod bot_bod" scope="col">Sub Total</th>
                <th align="center" class="bot_bod" scope="col">Action</th>
              </tr>
              
               <?php if($Shcarts): ?>
           
           <?php foreach($Shcarts AS $cart): ?>
              
              <tr>
                <td class="r_bod cart_sep">
                	<div class="f_left">
                    	<div class="cart_img">
                   	    	<a href="index.php?control=tripdetail&trip_id=<?php echo $cart->trip_id;?>"><img src="admin/<?php echo $cart->image;?>" width="75" height="65" /></a> 
                        </div>
                    </div>
                    <div class="f_right">
                      <div class="cart_product">
                        <h4><?php echo $cart->origin;?>, <?php echo $cart->destination;?></h4>
                        <ul class="stars">
                          <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                          <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                          <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                          <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                          <li><img src="template/<?php echo $tmp;?>/images/deactive_star.png" width="11" height="12" /></li>
                        </ul>
                        <ul class="give_review">
                          	<li>2 Review (s)</li>
                        </ul>
                      </div>
                    </div>
                </td>
                <form action="index.php?control=cart&task=cartUpdate" name="updateForm<?php echo $cart->trip_id; ?>" method="post">
                <td align="center" class="r_bod"><input class="person_txt" id="person<?php echo $cart->trip_id; ?>" name="person" type="text" value="<?php echo $cart->person;?>" onkeyup="chk(this.value,this.id)" maxlength="2"/></td>
                <td align="center" class="r_bod"><input class="person_txt" id="children<?php echo $cart->trip_id; ?>" name="children" type="text"  value="<?php echo $cart->children;?>" onkeyup="chk(this.value,this.id)" maxlength="2"/></td>
                <td align="center" class="r_bod"><span class="price"><?php echo $cart->trip_price;?> THB</span></td>
                <td align="center" class="r_bod"><span class="price"><?php $person = $cart->person?$cart->person:1;  echo $subTotal = $person * $cart->trip_price;?> THB</span></td>
                <td align="center"><a href="#" onclick="document.forms['updateForm<?php echo $cart->trip_id; ?>'].submit();" title="Update your cart"><img src="template/<?php echo $tmp;?>/images/refresh_ico.png" width="22" height="23" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?control=cart&task=remove&trip_id=<?php echo $cart->trip_id; ?>" title="Remove item"><img src="template/<?php echo $tmp;?>/images/remove_ico.png" width="22" height="23" /></a></td>
                <input type="hidden" name="trip_id" id="trip_id" value="<?php echo $cart->trip_id; ?>" />
                </form>
              </tr>
              
              <?php  $totalPrice += $subTotal; endforeach; ?>
              <?php else: ?>
               <tr>
                <td class="r_bod cart_sep">No items in your cart.</td>
                </tr>
              <?php endif; ?>
              
            </table>
        </div>
      </div> 
      <div class="cart_product_tab"> <!-- tab view-->
        <ul class="menu3">
          <li id="ship" class="active first">ESTIMATE SHIPPING & TAXES</li>
          <li id="gift">USE GIFT VOUCHER</li>
          <li id="coupon">USE COUPON CODE</li>
        </ul>
        <div class="cart_content ship">
          <p>Enter your destination to get a shipping estimate...</p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><label>Country</label></td>
                <td>
                	<select name="Country">
                      <option>------Please Select-------</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td><label>Region / State</label></td>
                <td><select name="Country">
                      <option>------Please Select-------</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select></td>
              </tr>
              <tr>
                <td><label>Post Code</label></td>
                <td><input name="" type="text" /></td>
              </tr> 
              <tr>
                <td></td>
                <td><a href="#" class="get_quotes_btn">Get Quotes</a></td>
              </tr>
          </table>

        </div>
        <div class="cart_content gift">
          gift
        </div>
        <div class="cart_content coupon">coupon</div>
        <!-- tab view--></div>
        
      <div class="grand_total">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><h3>Sub Total:</h3></td>
            <td align="right"><?php echo $totalPrice; ?> THB</td>
          </tr>
          <!--<tr>
             <td><h3>VAT (10.00 %):</h3></td>
            <td align="right">2000.00 THB</td>
          </tr>-->
          <tr>
            <td><h2>TOTAL</h2></td>
            <td><div class="total_price"><?php echo $totalPrice; ?> THB</div></td>
          </tr>
        </table>

      </div>  
    </div>
  </div>
  
  <script type="text/javascript">
  function chk(val,id){
  		for(i=0;i<val.length;i++){
			if(!isNaN(val.substring(1,val.length)) && !isNaN(val)){
			}else{
			document.getElementById(id).value = val.substring(0,val.length-1);
			}
		}
	
  }
  </script>