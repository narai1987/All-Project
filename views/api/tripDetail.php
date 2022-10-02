<?php if($_REQUEST['payment']=='success'){?>
<script type="text/javascript">
alert("Transaction completed.");
</script>
<?php
}else if($_REQUEST['payment']=='failed'){?>
<script type="text/javascript">
alert("Transaction failed.");
</script>
<?php 
}?>

<div id="container">

<div id="content">
<div class="promotion_list">

<div class="promo_box">
<div class="img_container">
<?php if($userID) {
	$img = $wishlist?"images/rm_wish.png":"images/add_wish.png";
	$title = $wishlist?"Remove to wishlist":"Add to wishlist";
	?>
	<div style="width:36px; height:36px; position:absolute; z-index:100; margin:7px 0 0 88%;">
    	<a style="cursor:pointer;" onclick="addWishlist('<?php echo $_REQUEST['tripID'];?>','<?php echo $userID;?>')">
        	<img src="<?php echo $img;?>" width="36" height="36" id="imgwishlist" title="<?php echo $title;?>"  />
        </a>
    </div>
    <?php }?>
	<img src="admin/<?php echo $results[0]['image'] ?>" alt="thumb" style="width:100%;" />	
</div>
<div class="promo_cont airline_next"><span><?php echo $results[0]['boat_name'] ?><br />
<em><?php echo substr($results[0]['trip_title'],0,23); ?></em></span> 

<!--<em><a href="webview.php?control=api&task=bookingMember&tripId=<?php echo $_REQUEST['tripID'];?><?php if($userID){ ?>&userId=<?php echo $userID;?> <?php } ?>" ><img src="assets/webview/images/bookbtn.png" width="104" alt="" /></a></em>-->
<?php 
	if($_GET['andruserID']=='nouser'){
	
  ?>
  <em><a href="#" onclick="javascript:alert('Please login first.');"><img src="assets/webview/images/bookbtn.png" width="104" alt="" /></a></em>
  
 <?php } elseif($_GET['andruserID']){ 
 $addpath = "&userId=".$_GET['andruserID'];
 ?> 
  
<em><a href="webview.php?control=api&task=bookingMember&tripId=<?php echo $_REQUEST['tripID'].$addpath;?>" ><img src="assets/webview/images/bookbtn.png" width="104" alt="" /></a></em>
<?php }else{ ?>

<em><a href="webview.php?control=api&task=bookingMember&tripId=<?php echo $_REQUEST['tripID'];?>" ><img src="assets/webview/images/bookbtn.png" width="104" alt="" /></a></em>

<?php }?>
</div>
</div>

</div>
<div class="my_account">

<div class="white_base">


<div id="example-two">
<div class="black_base">
<div class="black_title"><p class="pointer"><em class="left"><?php echo $results[0]['origin']; ?></em> <span class="right"><?php echo $results[0]['trip_price']; ?>THB</span></p>
<p class="star">
<a class="yellow_star">&nbsp;</a>
<a class="grey_star">&nbsp;</a>
<a class="grey_star">&nbsp;</a>
<a class="grey_star">&nbsp;</a>
<a class="grey_star">&nbsp;</a></p>
</div>


            <ul class="nav">
                
                <li class="nav-three"><a href="#jquerytuts2">Review</a></li>
                <li class="nav-two"><a href="#core2">Specification</a></li>
                <li class="nav-one"><a href="#featured2" class="current">Description</a></li>
            </ul>
            </div>
    		
    		<div class="list-wrap">            
            
            <div id="featured2" class="desc_para">
            <p><?php  echo $results[0]['specification']?></p>
           
            </div>          
            
            <div id="core2" class="desc_para hide">
            <div id="content_1"  class="specification">
            <p class="spec_txt"> MV Deep Andaman Queen's Similan-Surin-Richelieu Example Trip Itinerary Similan Island, Koh Bon, Koh Tachai, Richelieu Rock and Surin Island <?php echo $results[0]['no_of_days'] ?> Days / <?php echo $results[0]['no_of_nights'] ?> Nights (<?php echo $results[0]['no_of_dives'] ?> Dives).</p>
            <p class="spec_head">Package Includes</p>
            <p class="spec_txt_other">Accommodation on board, All meals, Snacks + Fruits, Towel, Tanks + Weight, Dive guide, Land transfer</p>
             <p class="spec_head">Package Excludes</p>
            <p class="spec_txt_other">Hotel Stay, Equipment rental, Soft drinks + Alcohol, Airfare, Marine park tax (1600 baht),  insurance, Nitrox refills</p>
            <p class="spec_head">Day 1</p>
            <table class="day_table" width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150">03:00 pm - 06:00 pm</td>
                <td>Pick-up at your Hotel, Phuket Airport, Dive shops & Khao Lak<br />
 					(Pick-up times are according to the location)
				</td>
              </tr>
              <tr class="row_color">
                <td>06:00 pm - 08:00 pm</td>
                <td>Arrival at MV Deep Andaman Queen's, (Tablamu pier)<br />
Welcome Drinks - Cabin Allocation - Staff Introduction<br />
Boat Briefing - Welcome Dinner</td>
              </tr>
            </table>
            
            <p class="spec_head">Day 2</p>
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
            </table>
            
            <p class="spec_head">Important Notice</p>
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
            
            <div id="jquerytuts2" class="desc_para hide">
            <h2>Customer reviews:</h2>
            
            <div class="review">
                  <div class="review1">
                    <div class="lable">SARVAJEET SINGH</div>
                   <div class="date"><span>09/Oct/2013</span></div>
                    <div class="clr"></div>
                    <div class="cust_comment">"Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin" "Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin" "Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin" "Lorem ipsum doler sit amet,</div>
                  </div>
                  <div class="review1">
                    <div class="lable">VINOD SHARMA</div>
                   <div class="date"><span>09/Jan/2014</span></div>
                    <div class="clr"></div>
                    <div class="cust_comment">"Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin"</div>
                  </div>
                  <div class="review1">
                    <div class="lable">AJAHAR MAHMOOD</div>
                   <div class="date"><span>10/Jan/2013</span></div>
                    <div class="clr"></div>
                    <div class="cust_comment">"Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin"</div>
                  </div>
                  <div class="review1">
                    <div class="lable">SALMAAN KHAN</div>
                   <div class="date"><span>25/Dec/2014</span></div>
                    <div class="clr"></div>
                    <div class="cust_comment">"Lorem ipsum doler sit amet, consectetur adipis cing elit. Aliquam suscipit nisl in adipiscin"</div>
                  </div>
           
            </div>
            
            
            
            </div>
        		 
    		 </div> <!-- END List Wrap -->
		 
		 </div> <!-- END Organic Tabs (Example One) -->
</div>



</div>

</div>
        <p id="triptpe"></p>
</div>