<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <b><?php echo $taxonomy['my_account'];?></b></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['my_account'];?></div>
        <div class="my_account_cont">
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['my_account'];?></p>
            <ul class="my_acc_ul">
              <li><a href="index.php?control=myaccount&task=editAccount"><?php echo $taxonomy['edit_your_account_information'];?></a></li>
              <li><a href="index.php?control=myaccount&task=changePass"><?php echo $taxonomy['change_your_password'];?></a></li>
              <li><a href="index.php?control=myaccount&task=addressBook"><?php echo $taxonomy['modify_your_address_book_entries'];?></a></li>
              <li><a href="index.php?control=wishlist"><?php echo $taxonomy['modify_your_wishlist'];?></a></li>
              </ul>
            </div>
          
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['my_orders'];?></p>
             <ul class="my_acc_ul">
              <li><a href="index.php?control=myaccount&task=myTrip"><?php echo $taxonomy['view_your_order_history'];?></a></li>
              <li><a href="index.php?control=myaccount&task=myReward"><?php echo $taxonomy['your_rewards_points'];?></a></li>
              <li><a href="index.php?control=myaccount&task=myCoupon"><?php echo $taxonomy['view_your_coupons'];?></a></li>
              <li><a href="#"><?php echo $taxonomy['your_transactions'];?></a></li>
              </ul>
            </div>
          
          <div class="account_box">
            <p class="acc_heading"><?php echo $taxonomy['newsletter'];?></p>
             <ul class="my_acc_ul">
              <li><a href="index.php?control=myaccount&task=newssubscribe"><?php echo $taxonomy['subscribe_to_our_newsletter'];?></a></li>
              </ul>
            </div>
          </div>
      </div> 
      <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
      </div>
       <div class="clr"></div>
    </div>
  </div>