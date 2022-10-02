<ul class="account_link">
        	<li><a class="<?php echo ($_REQUEST['control']=="myaccount")?($_REQUEST['task']==""?"active":""):"";?>"  href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="editAccount"?"active":"";?>"  href="index.php?control=myaccount&task=editAccount"><?php echo $taxonomy['edit_account'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="changePass"?"active":"";?>"  href="index.php?control=myaccount&task=changePass"><?php echo $taxonomy['password'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="addressBook"?"active":"";?>"  href="index.php?control=myaccount&task=addressBook"><?php echo $taxonomy['address_books'];?></a></li>
            <li><a class="<?php echo $_REQUEST['control']=="wishlist"?"active":"";?>"  href="index.php?control=wishlist"><?php echo $taxonomy['wishlist'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="myTrip"?"active":"";?>"  href="index.php?control=myaccount&task=myTrip"><?php echo $taxonomy['order_history'];?></a></li>
            <!--<li><a href="#">Returns</a></li>-->
            <li><a class="<?php echo $_REQUEST['task']=="myReward"?"active":"";?>"  href="index.php?control=myaccount&task=myReward"><?php echo $taxonomy['rewards'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="myCoupon"?"active":"";?>"  href="index.php?control=myaccount&task=myCoupon"><?php echo $taxonomy['my_coupon'];?></a></li>
            <li><a href="#"><?php echo $taxonomy['transactions'];?></a></li>
            <li><a class="<?php echo $_REQUEST['task']=="newssubscribe"?"active":"";?>" href="index.php?control=myaccount&task=newssubscribe"><?php echo $taxonomy['newsletter'];?></a></li>
            <li><a href="index.php?control=user&task=logout"><?php echo $taxonomy['logout'];?></a></li>
        </ul>