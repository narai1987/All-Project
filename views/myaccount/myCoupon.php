<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
  <div class="main_box">
    <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >> <b><?php echo $taxonomy['my_coupon'];?></b></div>
  </div>
  <div class="tab_content_trip">
    <div class="left_panel">
      <div class="page_heading"><?php echo $taxonomy['my_coupon'];?>s</div>
      <div class="my_account_cont">
        
        <!--tab html start-->
        <div class="product_tab"> <!-- tab view-->
      <ul class="menu1">
        <li id="desc" class="active"><?php echo $taxonomy['new_coupon'];?></li>
        <li id="rev"><?php echo $taxonomy['used_coupon'];?></li>
      </ul>
      <div class="clr"></div>
      <span class="clear"></span>
      <div class="content desc">
      
       <div id="content_0" class="description_content mCustomScrollbar _mCS_1"> 
            
              <table class="cart_table cart_table_inner" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <th width="300" class="r_bod bot_bod" scope="col" colspan="4"></th>
              
            </tr>
            <?php if($results): ?>
            <?php foreach($results['unused'] as $result): ?>
            <tr>
              <td class="r_bod cart_sep" align="center">
                  <img src="admin/<?php echo $result['image'];?>" width="120" height="80"  />
              </td>
              <td align="left" class="r_bod cart_sep">
              <div class="couponDetail">
              <b><span><?php echo $result['title'];?></span></b><br />
              <b><?php echo $taxonomy['discount'];?> : <?php echo $result['discount'];?>%</b><br />
              <b><?php echo $taxonomy['last_date'];?> : <?php echo date("l,jF Y",strtotime($result['end_date']));?></b><br />
              <p><?php echo $result['description'];?></p>
              </div>
              </td>
              <td align="center"  class="r_bod cart_sep">
              <div class="couponBtn">
              <?php if(!$result['redeem_status']) {?>
              <a class="account_btn"><?php echo $taxonomy['redeem'];?></a><br />
              <?php } ?>
              <a class="account_btn"><?php echo $taxonomy['cancel'];?></a><br />
              <a href="#" class="account_btn button_coupon" id="<?php echo $result['id'];?>" ><?php echo $taxonomy['share'];?></a>
              </div>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td class="r_bod cart_sep" colspan="3"><h2><?php echo $taxonomy['no_items_found'];?></h2></td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
        
      </div>
      
      <div class="content rev">
      <div id="content_0" class="description_content mCustomScrollbar _mCS_1">            
            <table class="cart_table cart_table_inner" width="100%" border="0" cellspacing="0" cellpadding="0"> 
            
             <tr>
              <th width="300" class="r_bod bot_bod" scope="col" colspan="4"></th>
              
            </tr>           
            <?php if($results['redeem']): ?>
            <?php foreach($results['redeem'] as $result): ?>
            <tr>
              <td class="r_bod cart_sep" align="center">
                  <img src="admin/<?php echo $result['image'];?>" width="120" height="80"  />
              </td>
              <td align="left" class="r_bod cart_sep">
              <div class="couponDetail">
              <b><span><?php echo $result['title'];?></span></b><br />
              <b>Discount : <?php echo $result['discount'];?>%</b><br />
              <b>Last Date : <?php echo date("l,jF Y",strtotime($result['end_date']));?></b><br />
              <p><?php echo $result['description'];?></p>
              </div>
              </td>
              <td align="center"  class="r_bod cart_sep">
              <div class="couponBtn">
              <?php if(!$result['redeem_status']) {?>
              <a class="account_btn"><?php echo $taxonomy['redeem'];?></a><br />
              <?php } ?>
              <a class="account_btn"><?php echo $taxonomy['cancel'];?></a><br />
              <a href="#" class="account_btn button_coupon" id="<?php echo $result['id'];?>"><?php echo $taxonomy['share'];?></a>
              </div>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td class="r_bod cart_sep" colspan="3" align="center"><?php echo $taxonomy['you_have_not_used_any_coupon_yet'];?>.</td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
      </div>
        <!--tab html end-->
      </div>
    </div>
    <div class="right_panel">
      <?php include_once("includes/myaccountleftlink.php");?>
    </div>
    <div class="clr"></div>
  </div>
</div>
<script type="text/javascript">
$(function() {	
	$(".button_coupon").click(function(){
		$("#loaderArea").height('250px');
		$("#loaderArea").html('<img style="margin-left: 215px;margin-top:70px;" src="images/rateloader.gif" />');
				
		$.ajax({
			url:"ajax.php?control=myaccount&task=share&coupon_id="+$(this).attr('id'),
			success:function(data){
				$("#divContent").html(data);
				$("#loaderArea").height('0px');
				$("#loaderArea").html('');
				$("#popupContactClose_coupon").click(function(){
					//disablePopup_coupon();
				});
			}
		});
	});
});	
	
	  	 
	  
	 					
  </script>
<div id="popupContact_coupon">
    <div class="content_area_coupon">
        <div class="login_f_header">
            <div class="login_here">Share Coupon to Your Friend</div>
        </div> 
    	<a href="#" id="popupContactClose_coupon" onclick="disablePopup_coupon()"><img title="Close" src="images/q_close.png" width="16" height="15"></a>
    </div>
    <div id="loaderArea"></div>
    <div id="divContent">oooo ho</div>
</div>

<div id="backgroundPopup_coupon"></div>