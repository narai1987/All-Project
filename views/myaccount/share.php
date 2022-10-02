<div class="main_box_cont">
    <div class="shareCoupon">
    	<form name="frmShare" action="index.php" method="post" >
        	<div class="shareForm">
            	<label>Friend Email :</label><span><input type="text" name="email" class="textbox"  /></span>
                
                <input type="hidden" name="control" value="myaccount"  />
                <input type="hidden" name="task" value="shareCoupon"  />
                <input type="hidden" name="coupon_id" value="<?php echo $_REQUEST['coupon_id'];?>"   />
                
                <button type="button" class="account_btn">Share</button>
            </div>
        </form>
    </div>
</div>