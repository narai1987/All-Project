<style type="text/css">
.imgAvatar{
	background-color: #FFFFFF;
  -moz-border-radius: 10px 30px;
  border-radius: 10px 30px / 15px 25px;
  border: 1px solid #E4E4F3;
  padding: 5px;

}
</style>
<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=myaccount"><?php echo $taxonomy['my_account'];?></a> >><b><?php echo $taxonomy['order_history'];?></b></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading"><?php echo $taxonomy['my_trips'];?></div>
        <?php
		if($results){
		 foreach($results as $result) { ?>
              <div class="my_account_cont">
                <div class="account_box">
                <p class="acc_heading"><?php echo $result['trip_title'];?> By  ,<?php echo $result['boat_name'];?><span style="float:right;"><?php echo $taxonomy['checkout_status'];?> : <?php if($result['pay_status']) echo '<b style="color:#090;">Success</b>';else echo '<b style="color:#F00;">Waiting</b>'; ?></span></p>
        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              		<tr>
                <td width="170px"><img class="imgAvatar" src="admin/<?php echo $result['image'];?>" height="120" width="170" /> </td>
                <td>	
                    <table width="100%" border="0" cellspacing="9" cellpadding="0">
                	<tr>
                    <td><?php echo $taxonomy['departure_date'];?> :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['start_trip_datetime']));?></span></td>
                    <td><?php echo $taxonomy['return_date'];?> :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['end_trip_datetime']));?></span></td>
                  	</tr>
                	<tr>
                    <td><?php echo $taxonomy['booking_date'];?> :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['booking_date']));?></span></td>
                    <td><?php echo $taxonomy['trip_price'];?> :  <span style="color:#9f4737;"><?php echo round($result['trip_price']*$_SESSION['value'],2);?> <?php echo $_SESSION['symbol'] ?></span></td>
                  	</tr>
                	<tr>
                    <td><?php echo $taxonomy['origin'];?> :  <span style="color:#9f4737;"><?php echo $this->cityById($result['origin_id']);?></span></td>
                    <td><?php echo $taxonomy['destination'];?> :  <span style="color:#9f4737;"><?php echo $this->cityById($result['destination_id']);?></span></td>
                  	</tr>
                	<tr>
                    <td><?php echo $taxonomy['persons'];?> :  <span style="color:#9f4737;"><?php echo $result['no_of_person'];?></span></td>
                    <td><?php echo $taxonomy['children'];?> : <span style="color:#9f4737;"><?php echo $result['no_of_child'];?></span></td>
                  	</tr>
                	<tr>
                    <td><h3><?php echo $taxonomy['grand_total'];?> : </h3> <span style="color:#9f4737;"><strong><?php echo round($result['grand_total']*$_SESSION['value'],2);?> <?php echo $_SESSION['symbol'] ?></strong></span></td>
                    <td><?php if(!$result['pay_status'] && (strtotime($result['start_trip_datetime']) > strtotime(date("Y:m:d H:i:s")))){ ?>
                    <a href="index.php?control=checkout&trip_id=<?php echo $result['trip_id'];?>&schId=<?php echo $result['tripSchId'];?>" class="q_checkout_btn">Checkout</a><?php } ?>
                    
                    
                    <a href="#" class="button_rating q_checkout_btn" id="<?php echo $result['trip_schedule_id'];?>"><?php echo $taxonomy['rate_it'];?></a>
                    
                    </td>
                  	</tr>
                  </table>
               </td> 
              
              </tr>
        
              </table>
              </div>
              </div>
        <?php
		 }
		 }else{?>
          <div class="my_account_cont">
         <div class="account_box">
         <h2><?php echo $taxonomy['you_have_not_order_any_trip_yet'];?>.</h2>
         </div>
         </div>
         <?php } ?>
        
        </div> 
        
        
        <div class="right_panel">
           <?php include_once("includes/myaccountleftlink.php");?>
        </div>
    	<div class="clr"></div>
    </div>
</div>


<script type="text/javascript">
$(function() {	
	//$("#loaderArea").html('');
	$(".button_rating").click(function(){
					$("#loaderArea").height('250px');
					$("#loaderArea").html('<img style="margin-left: 215px;margin-top:70px;" src="images/rateloader.gif" />');
					
			$.ajax({
				url:"ajax.php?control=myaccount&task=getRateForm&schId="+$(this).attr('id'),
				success:function(data){
					$("#popupContact_rating").html(data);
					$("#popupContactClose_rating").click(function(){
						disablePopup_rating();
					});
				}
			});
	});
});	
	
	  	 
	  
	 					
  </script>
  
  
  
  
  
         <div id="popupContact_rating">
                    <!--AJAX RATING FORM WILL BE LOAD HERE-->
                    <div class="content_area_rating">
                   		<div class="login_f_header"><div class="login_here">Overall Rating</div></div> 
                        <!--stars-->
                            <div class="demo">
                                <div class="default-demo_overall"></div>
                            </div>
                        <!--stars-->
                        <div class="login_area" id="loaderArea">
                        	<table class="rating_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="right">Foods:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Equipment:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Beverages:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Cabin:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Service:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Crew:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                                <td align="right">Divers:</td>
                                <td>
                                    <div class="demo">
                                      <div class="default-demo"></div>
                                    </div>
                                </td>
                                <td>Not rated yet</td>
                              </tr>
                              <tr>
                              	<td colspan="3"><a href="#" class="get_quotes_btn">Rate It</a></td>
                              </tr>
                            </table>

                        </div>
                        <a href="#" id="popupContactClose_rating"><img title="Close" src="<?php echo $tmp;?>images/q_close.png" width="16" height="15" /></a>

                    </div>
                </div>
         <div id="backgroundPopup_rating"></div>