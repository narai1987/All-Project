<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
  <div class="main_box">
    <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >><a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >>  <b><?php echo $taxonomy['wishlist'];?></b></div>
  </div>
  <div class="tab_content_trip">
    <div class="left_panel">
      <div class="page_heading"><?php echo $taxonomy['my_wishlist'];?></div>
      <div class="my_account_cont">
        <div class="account_box">
          <table class="cart_table cart_table_inner" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th width="300" class="r_bod bot_bod" scope="col"><?php echo $taxonomy['trip_name'];?></th>
              <!--
                <th align="center" class="r_bod bot_bod" scope="col">Boat Price</th>-->
              <th align="center" class="r_bod bot_bod" scope="col"><?php echo $taxonomy['trip_price'];?></th>
              <!--
                <th align="center" class="r_bod bot_bod" scope="col">Sub Total</th>-->
              <th align="center" class="bot_bod" scope="col"><?php echo $taxonomy['action'];?></th>
            </tr>
            <?php if($results): ?>
            <?php foreach($results as $result): ?>
            <tr>
              <td class="r_bod cart_sep"><div class="f_left">
                  <div class="cart_img"> <a href="index.php?control=tripdetail&trip_id=<?php echo $result->trip_id ?>&schId=<?php echo $result->scheduleId ?>">
                  <img src="admin/<?php echo $result->image ?>" width="75" height="65" /></a> </div>
                </div>
                <div class="f_right">
                  <div class="cart_product cart_product_inner">
                    <h4><?php echo $result->trip_title ?></h4>
                    <ul class="stars">
                       <?php  $rates = $this->getTripRating($result->trip_id);
				  for($i=1;$i<=5;$i++){  
				  if($i<=$rates[0]['rate']) {?>
                  <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                  <?php }
				  else { 
				  ?><li><img src="template/<?php echo $tmp;?>/images/deactive_star.png" width="11" height="12" /></li>
					  
					<?php   
					} 
				} ?>
                    </ul>
                    <ul class="give_review">
                      <li><?php echo count($this->getTripReviews($result->trip_id)); ?> <?php echo $taxonomy['review'];?> (s)</li>
                    </ul>
                  </div>
                </div></td>
              <td align="center" class="r_bod"><span class="price"><?php echo $result->trip_price * $_SESSION['value']; ?> <?php echo $_SESSION['symbol']; ?></span></td>
              <!--<td align="center" class="r_bod"><span class="price"><?php echo 2 * $result->trip_price ?> THB</span></td>  -->
              <td align="center"><!--<a href="#" title="Add to cart"><img src="template/<?php echo $tmp ?>/images/cart_ico.png" width="22" height="23" /></a>&nbsp;&nbsp;&nbsp;--> <a href="index.php?control=wishlist&task=remove&trip_id=<?php echo $result->trip_id ?>&tripScheduleId=<?php echo $result->scheduleId ?>" title="Remove item" onclick="return confirm('Are you sure remove <?php echo $result->trip_title ?> from your wishlist?');"><img src="template/<?php echo $tmp ?>/images/remove_ico.png" width="22" height="23" /></a></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td class="r_bod cart_sep" colspan="5"><h2><?php echo $taxonomy['no_items_found'];?></h2></td>
            </tr>
            <?php endif; ?>
          </table>
          <div class="bottom_action">
            <table class="action_table" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td></td>
                <td align="right"><a class="account_btn" href="index.php?control=trip"><?php echo $taxonomy['continue'];?></a></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
    </div>
    <div class="clr"></div>
  </div>
</div>
