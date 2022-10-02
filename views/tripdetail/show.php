<?php 
$taxonomy = $this->taxolist();
?>
<div id="main_box_cont">
  <div class="main_box">
    <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=trip"><?php echo $taxonomy['our_trips'];?></a> >> <!--<a class="active" href="#">--><b><?php echo $results1[0]['trip_title'] ?></b><!--</a>--></div>
  </div>
  <div class="tab_content_trip">
    <div class="trip_box_cont">
      <div class="trip_box">
        <div class="trip_image trip_image_detail f_left">
          <div id="welcomeHero">
            <div id="slideshow-main">
              <ul>
                <li class="p1 active"> <a href="admin/<?php echo $results1[0]['image'] ?>" class="pirobox_gall" title="Similan Island"><img src="admin/<?php echo $results1[0]['image'] ?>" width="339" height="234" alt=""/></a></li>
                <?php $mth = 2;  foreach($tripGallerys as $tripG): ?>
                <li class="p<?php echo $mth ?>"><a href="admin/<?php echo $tripG['image'] ?>" class="pirobox_gall" title="Similan Island"><img src="admin/<?php echo $tripG['image'] ?>" width="339" height="234" alt=""/></a></li>
                <?php $mth++; endforeach; ?>
              </ul>
            </div>
            <div style="clear:both;"></div>
            <div id="slideshow-carousel">
              <ul id="carousel" class="jcarousel jcarousel-skin-tango">
                <li><a href="#" rel="p1"><img src="admin/<?php echo $results1[0]['image'] ?>" width="51" height="35" alt="#"/></a></li>
                <?php $th = 2; foreach($tripGallerys as $tripG): ?>
                <li><a href="#" rel="p<?php echo $th ?>"><img src="admin/<?php echo $tripG['image'] ?>" width="51" height="35" alt="#"/></a></li>
                <?php $th++; endforeach; ?>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="trip_view_right trip_detail_right f_right">
          <p class="trip_heading"><?php echo $results1[0]['trip_title']." , ".ucfirst($this->getCountry($results1[0]['country_id'])) ?> by <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $results1[0]['boat_id'] ?>"><?php echo $results1[0]['boat_name'] ?></a></p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><label><?php echo $taxonomy['start_date'];?>:</label>
              <form name="schStartDate" action="index.php?control=tripdetail&trip_id=<?php echo $_REQUEST['trip_id'] ?>&schId=<?php echo $schId ?>" method="post">
                <select style="font-size:11px; font-family:ptsans;" name="schId" onchange="document.forms['schStartDate'].submit();">
                <?php foreach($tripSchedules AS $tripSchedule): ?>
                  <option <?php if($results1[0]['start_trip_datetime'] == $tripSchedule['start_trip_datetime']){ ?> selected="selected" <?php } ?> value="<?php echo $tripSchedule['id']; ?>"><?php echo date("j M, Y",strtotime($tripSchedule['start_trip_datetime'])) ?></option>
                  <?php endforeach; ?>
                </select>
                </form>
                </td>
              <td width="225px"><label><?php echo $taxonomy['end_date'];?>:</label>
                <select style="font-size:11px; font-family:ptsans;" name="">
                  <option><?php echo date("j M, Y",strtotime($results1[0]['end_trip_datetime'])) ?></option>
                </select></td>
              <td><label><?php echo $taxonomy['country'];?>:</label>
                <?php echo ucfirst($this->getCountry($results1[0]['country_id'])); ?></td>
            </tr>
            <tr>
              <td><label><?php echo $taxonomy['boat_name'];?>:</label>
                <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $results1[0]['boat_id'] ?>"><?php echo substr($results1[0]['boat_name'],0,16) ?></a></td>
              <td width="225px"><label><?php echo $taxonomy['no_of_dives'];?>:</label>
                <?php echo $this->getNoOfDive($results1[0]['schedule_id'])?$this->getNoOfDive($results1[0]['schedule_id']):"Not Available"; ?> <?php //echo $taxonomy['dives'];?></td>
              <td><label><?php echo $taxonomy['space_left'];?>:</label>
                <?php echo $this->getSpaceLeft($results1[0]['schedule_id'],$results1[0]['boat_id']); ?></td>
            </tr>
            <tr>
              <td><label><?php echo $taxonomy['origin'];?>:</label><?php echo ucfirst($this->cityById($results1[0]['origin_id'])) ?></td>
              <td width="225px"><label><?php echo $taxonomy['destination'];?>:</label>
                <?php echo ucfirst($this->cityById($results1[0]['destination_id'])) ?></td>
            </tr>
            <tr>
              <td colspan="4">
               <!-- <p><?php echo $results1[0]['no_of_days'] ?> <?php echo $taxonomy['days'];?> / <?php echo $results1[0]['no_of_nights'] ?> <?php echo $taxonomy['nights'];?> (<?php echo $this->getNoOfDive($results1[0]['schedule_id']); ?> <?php echo $taxonomy['dives'];?> ).</p>-->
                <div class="detail_sep"></div></td>
                
              
            </tr>
            <tr>
              <td colspan="3"><div class="cabin_pricing">
                  <label><?php echo $taxonomy['cabin_pricing_(per_pax)'];?>:</label>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <?php $cb = 1; foreach($boatCabins AS $boatCabin): ?>
                      
                      <td width="124"><?php echo $boatCabin->cabin ?> </td>
                      <td>:</td>
                      <td><p class="price_red"><?php echo $_SESSION['symbol']." ".(($boatCabin->cabin_price)*$_SESSION['value']); ?></p></td>
                      <td width="58">&nbsp;</td>
                    <?php if($cb % 2 == 0 ) echo '</tr><tr>'; ?>
                    <?php $cb++; endforeach; ?>
                    </tr>
                    
                  </table>
                </div>
                <br />
                <div class="cabin_pricing">
                  <label><?php echo $taxonomy['available_options'];?>:</label>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <?php $eq = 1; foreach($tripEquipments AS $tripEquipment): ?>
                      
                      <td width="124"><?php echo $tripEquipment->equipment ?> </td>
                      <td>:</td>
                      <td><p class="price_red"><?php echo $_SESSION['symbol']." ".($tripEquipment->eq_value*$_SESSION['value']); ?> </p></td>
                      <td width="58">&nbsp;</td>
                    <?php if($eq % 2 == 0 ) echo '</tr><tr>'; ?>
                    <?php $eq++; endforeach; ?>
                    </tr>
                   
                  </table>
                </div>
                <div class="detail_sep"></div>
                <div class="review">
                  <ul class="stars">
                  <?php  
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
                    <li style="cursor:pointer;" onclick="javascript:$('#rev').click()"><?php echo count($reviews) ?> <?php echo $taxonomy['review'];?> (s)</li>
                    <!--<li>|</li>
                    <li><a href="#">Add your reviews</a></li>-->
                  </ul>
                  <div class="clr"></div>
                </div>
                <div class="detail_sep"></div></td>
            </tr>
            <tr>
              <td colspan="3"><div class="total_price"><span class="f_left"><?php echo $taxonomy['total'];?>: </span>
                  <p class="price_red f_left"><?php echo $_SESSION['symbol'].($results1[0]['tripSchedule_price']*$_SESSION['value']); ?></p>
                </div>
                
                
                <div style="width:182px; float:right;">
                  <div class="f_left view_btn">
                  
                 
                  
                  <!--<a href="#t_cart" onclick="addToCart('<?php echo $results1[0]['trip_id'] ?>');" class="button"><img src="template/<?php echo $tmp;?>/images/add_to_cart.png" width="114" height="25" /></a>-->
                  <?php if($_SESSION['login']){ ?>
                <a href="index.php?control=checkout&trip_id=<?php echo $_GET['trip_id'] ?>&schId=<?php echo $_GET['schId'] ?>" class="q_checkout_btn"><?php echo $taxonomy['book_now'];?></a>
                <?php }else{ ?>
                     <a href="#" title="Checkout" class="q_checkout_btn login_popup" ><?php echo $taxonomy['book_now'];?></a>
                    <?php  } ?>
                  </div>
                  <div class="f_right wish_compare">
                  
                    <a href="#t_compare" onclick="addToCompare('<?php echo $results1[0]['trip_id'] ?>','<?php echo $results1[0]['schedule_id'] ?>');"  title="Add to Compare" class="f_right button_compare"><img src="template/<?php echo $tmp;?>/images/trip/compare_btn.png" width="29" height="25" /></a>
                    <?php if($_SESSION['login']){ ?> 
                    <a href="#t_wishlist" onclick="addToWishlist('<?php echo $results1[0]['trip_id'] ?>','<?php echo $results1[0]['schedule_id'] ?>');" title="Add to Wishlist" class="f_right button_wishlist" style="margin-right:5px;cursor:pointer;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php }else{ ?>
                     <a href="#" title="Add to Wishlist" class="f_right login_popup" style="margin-right:5px;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php  } ?>
                    
                     
                  </div>
                </div>
                <br />
                <br />
                <div id="popupContact">
                  <p class="content_area"> Success: You have added <a class="link_txt" href="#">gg Islands, Thailand</a> to your <a class="link_txt" href="cart.html">Shopping Cart !</a> <a href="#" id="popupContactClose"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
                </div>
                
                <div id="popupContact_compare">
                  <p class="content_area"> <span class="normal_txt">Success: You have added 1 item to compare</span> <span class="link_span"> <a class="link_img" href="#"><img src="template/<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a> <a class="link_img_close" href="#"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> </span> <span class="link_span"> <a class="link_img" href="#"><img src="template/<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a> <a class="link_img_close" href="#"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> </span> <span class="link_span"> <a class="link_img" href="#"><img src="template/<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a> <a class="link_img_close" href="#"><img title="Remove" src="template/<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> </span> <span class="go_btn"><a href="compare.html"><img src="template/<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a></span> <a href="#" id="popupContactClose_compare"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
                </div>
                <div id="popupContact_wishlist">
                  <p class="content_area"> Success: You have added <a class="link_txt" href="#">Similan Islands, Thailand</a> to your <a class="link_txt" href="#">Wishlist</a> <a href="#" id="popupContactClose_wishlist"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
                </div>
                <div id="backgroundPopup"></div>
                <div id="backgroundPopup_compare"></div>
                <div id="backgroundPopup_wishlist"></div></td>
            </tr>
          </table>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="product_tab"> <!-- tab view-->
      <ul class="menu1">
        <li id="desc" class="active"><?php echo $taxonomy['description'];?></li>
        <li id="spec"><?php echo $taxonomy['specification'];?></li>
        <li id="rev"><?php echo $taxonomy['review'];?>s</li>
      </ul>
      <div class="clr"></div>
      <span class="clear"></span>
      <div class="content desc">
        <div id="content_0" class="description_content">
          <p><?php echo $results1[0]['specification'] ?></p>
        </div>
      </div>
      <div class="content spec">
        <div id="content_1"  class="specification">
          <p class="spec_txt"> <?php echo $results1[0]['specification'] ?> <?php echo $this->getNoOfDive($results1[0]['schedule_id'])?$this->getNoOfDive($results1[0]['schedule_id'])." ".$taxonomy['dives']:$taxonomy['dives']." Not Available"; ?> <?php //echo $taxonomy['dives'];?>.</p>
          <p class="spec_head"><?php echo $taxonomy['package_includes'];?></p>
          <p class="spec_txt_other"><?php echo $tripPackages['Includes'] ?>
          <!--Accommodation on board, All meals, Snacks + Fruits, Towel, Tanks + Weight, Dive guide, Land transfer--></p>
          <p class="spec_head"><?php echo $taxonomy['package_excludes'];?></p>
          <p class="spec_txt_other"><?php echo $tripPackages['Excludes'] ?>
          <!--Hotel Stay, Equipment rental, Soft drinks + Alcohol, Airfare, Marine park tax (1600 baht),  insurance, Nitrox refills--></p>
          <!--<p class="spec_head"><?php echo $taxonomy['day'];?> 1</p>
          <table class="day_table" width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150">03:00 pm - 06:00 pm</td>
              <td>Pick-up at your Hotel, Phuket Airport, Dive shops & Khao Lak<br />
                (Pick-up times are according to the location) </td>
            </tr>
            <tr class="row_color">
              <td>06:00 pm - 08:00 pm</td>
              <td>Arrival at MV Deep Andaman Queen's, (Tablamu pier)<br />
                Welcome Drinks - Cabin Allocation - Staff Introduction<br />
                Boat Briefing - Welcome Dinner</td>
            </tr>
          </table>
          <p class="spec_head"><?php echo $taxonomy['day'];?> 2</p>
          <table class="day_table" width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150">07:00 am - 07:30 am</td>
              <td>General Diving Rules / Safety Briefing</td>
            </tr>
            <tr class="row_color">
              <td>07:00 am - 07:30 am</td>
              <td>Three day dives around the Similan Island<br />
                Visit Island No. 4 / Enjoy paradise with a beautiful white sandy beach.</td>
            </tr>
          </table>-->
          <!--TRIPS ITINERARY START HERE-->
          <p class="spec_head">Trip Itinerary</p>
          
          <div style=" border:1px solid #CCC; width:99%; min-height:500px;"><table>
          
          <?php 
		  $i = 0;
		  foreach($tripItinerarys as $tripItinerary) {
			  if($travelDate != $tripItinerary['itinerary_date']) { $i++; ?>
				</table>  <p class="spec_head">Day <?php echo $i;?></p>
              <table class="day_table" width="100%" border="1" cellspacing="0" cellpadding="0">
             
			 <?php } ?>
               <tr>
              	<td>Travel-Time</td>
              	<td>Place</td>
              	<td>Stay Time</td>
              	<td>No.of Dives</td>
              </tr>
                <tr>
                  <td width="150"><?php echo $tripItinerary['departure_time']." - ".$tripItinerary['arrival_time'];?></td>
                  <td><?php echo $tripItinerary['city'];?></td>
                    <td><?php echo $tripItinerary['stay_hour'];?></td>
                    <td><?php echo $tripItinerary['no_of_dive'];?></td>
                </tr>
                <tr class="row_color">
                  <td colspan="4"><?php echo $tripItinerary['detail'];?></td>
                  </tr><tr>
                  <td colspan="4"><?php echo $tripItinerary['night_schedule'];?></td>
                </tr>
              
          <?php
			 
			  $travelDate = $tripItinerary['itinerary_date'];
		  	  
		  }
		  ?>
          </table>
          </div>
          <!--TRIPS ITINERARY END HERE-->
          <p class="spec_head"><?php echo $taxonomy['important_notice'];?></p>
          <table class="day_table" width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td>The above intinerary is an example of and average cruise.</td>
            </tr>
            <tr class="row_color">
              <td>The Captain and Cruise leader will decide the best course of action based on weather condition at the specific time of each trip.</td>
            </tr>
            <tr>
              <td>Deep Andaman Co., Ltd retains the right to cancel or alter trips in the interest of the safety of all passengers, crews and the vessel.</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="content rev">
        <table class="comm_rev" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="cust_review">
            <div class="review_right">
              <div class="review_headings"><strong><?php echo $taxonomy['customer_review'];?></strong></div>
              <div id="content_2" class="reviews">
                <?php if($reviews){ ?>
                <?php foreach($reviews AS $review){ ?>
                <div class="review1">
                  <div class="lable"><?php echo $review['fname']?$review['fname']." ".$review['lname']:$review['username'] ?></div>
                  <ul class="stars">
                    
					<?php for($i=1;$i<=5;$i++){  
                    if($i<=$this->getUserAvgRate($review['userID'],$_REQUEST['trip_id'])) {?>
                    <li><img src="template/<?php echo $tmp;?>/images/active_star.png" width="11" height="12" /></li>
                    <?php }
                    else { 
                    ?><li><img src="template/<?php echo $tmp;?>/images/deactive_star.png" width="11" height="12" /></li>
                    <?php } } ?>
                    
                  </ul>
                  <div class="review_date"><?php echo date("d / M / Y",strtotime($review['date_time'])) ?></div>
                  <div class="clr"></div>
                  <div class="cust_comment">"<?php echo $review['review'] ?></div>
                </div>
                <?php } ?>
                <?php }else { ?>
               <?php echo $taxonomy['no_reviews_found'];?> 
                <?php } ?>
                
              </div>
              </td>
          </tr>
        </table>
      </div>
      <!-- tab view--></div>
    
    
   <?php /**********************************RELATED TRIPS START*********************************************/ ?>
    						<div class="related_trip">
      <div class="related">
        <p class="related_heading"><?php echo $taxonomy['related_trips'];?></p>
        <div class="related_content">
          
          <?php if($results): ?>
          <?php foreach($results AS $result): ?>
          		<div class="r_trips">
                    <div class="f_left">
                      <div class="trip_img"><a href="index.php?control=tripdetail&trip_id=<?php echo $result->tripId ?>&schId=<?php echo $result->scheduleId ?>"><img src="admin/<?php echo $result->tripImage ?>" width="51" height="34" /></a></div>
                    </div>
                    <div class="f_right r_trip_right">
                      <p class="trip_name"><?php echo $result->origin ?></p>
                      <ul class="stars">
                       <?php  $rates = $this->getTripRating($result->tripId);
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
                    </div>
            	<div class="clr"></div>
         		 </div>
          <?php endforeach; ?>
          <?php else: ?>
          <div class="r_trips">
          <?php echo $taxonomy['no_items'];?>
          </div>
          <?php endif; ?>
          
          
          
          <a class="view_all" href="index.php?control=trip"> <?php echo $taxonomy['view_all_trips'];?>...</a>
          <div class="clr"></div>
        </div>
      </div>
    </div>
   <?php /**********************************RELATED TRIPS END**********************************************/ ?>
   
   
   
   
   
   
    <div class="clr"></div>
  </div>
</div>
<script type="text/javascript">
			function addToWishlist(val,trip_schedule_id){
				$("#popupContact_wishlist").html('<p align="center"> <img src="images/fishing_boat_4.gif" /> </p>');
				$.ajax({
				 url:"ajax.php?control=wishlist&task=addWishList&trip_id="+val+"&tripScheduleId="+trip_schedule_id,
				 success:function(result){
					 
						 $.ajax({
							url:"ajax.php?control=wishlist&task=addWishList",
							 success:function(result7){
								$("#cwish").html(result7);
							}});
				
				
				
				 $("#popupContact_wishlist").html(result);
				  $("#popupContactClose_wishlist").click(function(){
					disablePopup_wishlist();
					});
				  setTimeout("disablePopup_wishlist()",3000);
				
				}});
			}
			
			
			
			
			function addToCompare(val,trip_schedule_id){
				$("#popupContact_compare").html('<p align="center"> <img src="images/fishing_boat_4.gif" /> </p>');
				$.ajax({
				 url:"ajax.php?control=compare&task=addToCompare&trip_id="+val+"&tripScheduleId="+trip_schedule_id,
				 success:function(result8){
					 
						 $.ajax({
							url:"ajax.php?control=compare&task=addToCompare",
							 success:function(result9){
								$("#tcomp").html(result9);
							}});
				
				
				
				 $("#popupContact_compare").html(result8);
				  $("#popupContactClose_compare").click(function(){
					disablePopup_compare();
					});
				  //setTimeout("disablePopup_compare()",3000);
				
				}});
			}
			
			
			
			
			
			function removed(val,trip_schedule_id){
				$("#popupContact_compare").html('<p align="center"> <img src="images/fishing_boat_4.gif" /> </p>');
				$.ajax({
					url:"ajax.php?control=compare&task=removed&trip_id="+val+"&user_id=<?php echo session_id();?>&tripScheduleId="+trip_schedule_id,
					success:function(result8){
						 
					
					$.ajax({
						url:"ajax.php?control=compare&task=addToCompare",
						success:function(result9){
							$("#tcomp").html(result9);
							addToCompare('rm');
						}
					});					
				
				}});
				
			}
			
			
			
			function addToCart(val){
				$("#popupContact").html('<p align="center"> <img src="images/fishing_boat_4.gif" /> </p>');
				$.ajax({
				 url:"ajax.php?control=cart&task=addToCart&trip_id="+val,
				 success:function(res){
							$.ajax({
							url:"ajax.php?control=cart&task=addToCart",
							 success:function(result4){
								$("#tcart").html(result4);
								/*TO FILL TOP HEADER CART POPUP*/
									$.ajax({
								url:"ajax.php?control=cart&task=addToCart&fillPopup=1",
								 success:function(rspop){
									$("#cartList").html(rspop);
								}});
								/*TO FILL TOP HEADER CART POPUP*/
							
							}});
							
							
				 $("#popupContact").html(res);
				  $("#popupContactClose").click(function(){
					disablePopup();
					});
				  
				
				}});
				
			}
			
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
			
		</script>