
<style type="text/css">
@import url("assets/main.css");
</style>

<script type="text/javascript" src="assets/jquery.min.js"></script>
<!--Parallax-->

<style type="text/css">
@import url("assets/flexslider/flexslider.css");
</style>

<script type="text/javascript" language="javascript" src="assets/jquery.carouFredSel-6.2.0-packed.js"></script>
<style type="text/css">
@import url("assets/general.css");
</style>
<style type="text/css">
@import url("assets/tabs.css");
</style>
<script type="text/javascript" src="assets/tabs.js"></script>

<!--gallery +  pirobox-->
<script type="text/javascript" src="assets/pirobox/pirobox.min.js"></script>
<link href="assets/css_pirobox/demo5/style.css" class="piro_style" media="screen" title="white" rel="stylesheet" type="text/css" />

<!--//gallery +  pirobox-->




<script type="text/javascript">
$(document).ready(function() { 

	//pirobox start
	
	
	$().piroBox({
			my_speed: 1000, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
});
	//pirobox end
	</script>

<!--//Parallax-->

<div id="main_box_cont">
    <div class="main_box">
		<ul class="menu2" style="float:right">
			<li id="tab1" class="active">Overview</li>
			<li id="tab2">Floorplans</li>
            <li id="tab3">Gallery</li>
            <li id="tab4">Specification</li>
            <li id="tab5">Featured & Options</li><!--
            <li id="tab6">Schedules & Prices</li>-->
		</ul>
    </div>
    <div class="tab_content_cont">
    
        <div class="tab_content_boat tab1">
			<h2>Overview ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <div class="overview">
            	<!--<div class="b_name"><?php echo $results1[0]['boat_name'] ?></div>-->
                <div class="b_length"><?php echo $results1[0]['boat_length'] ?></div>
                <div class="b_beam"><?php echo $results1[0]['boat_beam'] ?></div>
                <div class="b_fuel"><?php echo $results1[0]['fuel_capacity'] ?>Gallons</div>
                <div class="b_capacity"><?php echo $results1[0]['men_capacity'] ?></div>
            </div>
		</div>
		<div class="tab_content_boat tab2">
			<h2>Floorplans( <?php echo $results1[0]['boat_name'] ?> )</h2><br />
<br />

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><img src="<?php echo $results1[0]['upper_deck'] ?>" width="104" height="356" /></td>
                <td align="center"><img src="<?php echo $results1[0]['main_deck'] ?>" width="106" height="353" /></td>
                <td align="center"><img src="<?php echo $results1[0]['lower_deck'] ?>" width="101" height="351" /></td>
              </tr>
            </table>

		</div>
        <div class="tab_content_boat tab3">
			<h2>Gallery ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <span class="gal_head">Exterior</span>
            <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               <?php $g = 1;if($boatGallerys):  foreach($boatGallerys as $gal): 
			   	if($gal['gallery_type_id'] == 1){
			   ?>
                <td><a href="<?php echo $gal['images']; ?>" class="pirobox_gall" title="<?php echo $results1[0]['boat_name'] ?>"><img src="<?php echo $gal['images'] ?>" width="135" height="90" alt=""/></a></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                <?php else: ?>
                <td>No Gallery.</td>
                <?php endif; ?>
                </tr>
            </table>

            <span class="gal_head">Interior</span>
             <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               <?php $g = 1;if($boatGallerys): foreach($boatGallerys as $gal): 
			   	if($gal['gallery_type_id'] == 2){
			   ?>
                <td><a href="<?php echo $gal['images']; ?>" class="pirobox_gall" title="<?php echo $results1[0]['boat_name'] ?>"><img src="<?php echo $gal['images'] ?>" width="135" height="90" alt=""/></a></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                
                <?php else: ?>
                <td>No Gallery.</td>
                <?php endif; ?>
                </tr>
            </table>
		</div>
		<div class="tab_content_boat tab4">
			<h2>Specifications ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="row_white">
          <td><strong>Length Overall</strong></td>
          <td><?php echo $results1[0]['boat_length'] ?></td>
        </tr>
        <tr class="row_grey">
          <td><strong>Beam</strong></td>
          <td><?php echo $results1[0]['boat_beam'] ?></td>
        </tr>
        <tr class="row_white">
          <td><strong>Men Capacity</strong></td>
          <td><?php echo $results1[0]['men_capacity'] ?></td>
          <!-- <td><strong><?php //echo $taxonomy['draft-drive_up-high_trim'];?></strong></td>
                <td><?php //echo $results1[0]['draft_drive_up_high_trim'] ?></td>--> 
        </tr>
        <tr class="row_grey">
          <td><strong>Hull Type</strong></td>
          <td><?php echo $results1[0]['hull_type'] ?></td>
        </tr>
        <tr class="row_white">
          <td><strong>Hull Material</strong></td>
          <td><?php echo $results1[0]['hull_material'] ?>°</td>
        </tr>
        <tr class="row_grey">
          <td><strong>Boat Width</strong></td>
          <td><?php echo $results1[0]['boat_width'] ?> Lbs</td>
        </tr>
        <tr class="row_white">
          <td><strong>Boat Range</strong></td>
          <td><?php echo $results1[0]['boat_range'] ?></td>
        </tr>
        <tr class="row_grey">
          <td><strong>Fresh Water Capacity</strong></td>
          <td><?php echo $results1[0]['fresh_water_capacity'] ?></td>
        </tr>
        <tr class="row_white">
          <td><strong>Gray Water Capacity</strong></td>
          <td><?php echo $results1[0]['gray_water_capacity'] ?></td>
        </tr>
        <tr class="row_grey">
          <td><strong>Black Water Capacity</strong></td>
          <td><?php echo $results1[0]['black_water_capacity'] ?></td>
        </tr>
        <tr class="row_white">
          <td><strong>Fuel Capacity</strong></td>
          <td><?php echo $results1[0]['fuel_capacity'] ?> Gals</td>
        </tr>
      </table>
		</div>
        <div class="tab_content_boat tab5">
      <div class="feature_cont">
        <h2><?php echo $taxonomy['featured_&_options'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2>
        <p class="feature_heading">Featured & Technical Options</p>
        <p class="feature_s_heading">Boat Safety Option</p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <?php
				 if($boatSafetys){
				  
                   $g = 1; foreach($boatSafetys AS $boatSafety): ?>
            <td><div class="feature_box f_left">
                <div class="s_heading"><?php echo $boatSafety['title'] ?></div>
                <div class="s_content"><?php echo $boatSafety['description'] ?></div>
              </div></td>
            <?php if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php } ?>
            <?php $g++; endforeach; ?>
          </tr>
          <?php }else{ ?>
          <tr><td align="center" style="color:#CCC;">Data not avaleble</td></tr>
          <?php } ?>
        </table>
        <p class="feature_s_heading">Boat Facilities Option</p>
        <!--<p class="feature_s_heading"><?php // echo $taxonomy['engine_options'];?></p>-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <?php if($boatFacilities){
			 $g = 1; foreach($boatFacilities AS $boatFacilitie): ?>
            <td><div class="feature_box f_left">
                <div class="s_heading"><?php echo $boatFacilitie['title'] ?></div>
                <div class="s_content"><?php echo $boatFacilitie['description'] ?></div>
              </div></td>
            <?php if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php } ?>
            <?php $g++; endforeach; ?>
          </tr>
          
          <?php }else{ ?>
          <tr><td align="center" style="color:#CCC;">Data not avaleble</td></tr>
          <?php } ?>
        </table>
        <p class="feature_s_heading">Boat Comunication And Navigation</p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <?php if($boatComunications){
			 $g = 1; foreach($boatComunications AS $boatComunication): ?>
            <td><div class="feature_box f_left">
                <div class="s_heading"><?php echo $boatComunication['title'] ?></div>
                <div class="s_content"><?php echo $boatComunication['description'] ?></div>
              </div></td>
            <?php if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php } ?>
            <?php $g++; endforeach; ?>
          </tr>
          <?php }else{ ?>
          <tr><td align="center" style="color:#CCC;">Data not avaleble</td></tr>
          <?php } ?>
        </table>
        
        <!-- <p class="feature_heading"><?php //echo $taxonomy['interior_features'];?></p>-->
        <p class="feature_s_heading">Boat Diving Option</p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            
            <td><div style="float:left;" class="feature_box f_left">
                <div class="s_content"><strong>Tec Dive Friendly </strong><span style="float:right"><?php if($divingOptions[0]['tec_dive_friendly']==1){ echo"Yes"; }else{ echo "No"; } ?></span></div>
                <div class="s_content"><strong>Ccr Friendly</strong><span style="float:right"><?php if($divingOptions[0]['ccr_friendly']==1){ echo "Yes"; }else{ echo "No"; } ?></span></div>
               <div class="s_content"><strong>Dive Course Friendly</strong><span style="float:right"><?php if($divingOptions[0]['dive_course_friendly']==1){ echo"Yes"; }else{ echo "No"; } ?></span></div> 
                <div class="s_content"><strong>Dive Platform</strong><span style="float:right"><?php if($divingOptions[0]['dive_platform']==1){ echo"Yes"; }else{ echo "No"; } ?></span></div>
              </div></td>
            <td><div class="feature_box f_left">
                <div class="s_content"><strong>Nitrox</strong><span style="float:right"><?php if($divingOptions[0]['nitrox']==1){ echo"Yes"; }else{ echo "No"; } ?></span></div>
                <div class="s_content"><strong>Trimix</strong><span style="float:right"><?php if($divingOptions[0]['trimix']==1){ echo"Yes"; }else{ echo "No"; } ?></span></div>
                <div class="s_content"><strong>Compresor Type1</strong><span style="float:right"> <?php echo $divingOptions[0]['compresor_type1'] ?></span></div>
                <div class="s_content"><strong>No of Compresor1</strong><span style="float:right"> <?php echo $divingOptions[0]['no_of_compresor1'] ?></span></div>
              </div></td>
          </tr>
          </table>
          <p class="feature_s_heading">Boat Power Option</p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="float:left;" class="feature_box f_left">
                <div class="s_content"><strong>Engine Type2</strong><span style="float:right"> <?php echo $divingOptions[0]['engine_type2'] ?></span></div>
                <div class="s_content"><strong>No of Engine2</strong><span style="float:right"> <?php echo $divingOptions[0]['no_of_engine2'] ?></span></div>
                <div class="s_content"><strong>Generator Type1</strong><span style="float:right"> <?php echo $divingOptions[0]['generator_type1'] ?></span></div>
                <div class="s_content"><strong>No of Generator1</strong><span style="float:right"> <?php echo $divingOptions[0]['no_of_generator1'] ?></span></div>
              </div></td>
            <td><div class="feature_box f_left">
                <div class="s_content"><strong>Generator Type2</strong><span style="float:right"> <?php echo $divingOptions[0]['generator_type2'] ?></span></div>
                <div class="s_content"><strong>No of Generator2</strong><span style="float:right"> <?php echo $divingOptions[0]['no_of_generator2'] ?></span></div>
              </div></td>
            <?php // if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php // } ?>
            <?php // $g++; endforeach; ?>
          </tr>
        </table>
         <!--<p class="feature_s_heading"><?php // echo $taxonomy['helm_features'];?></p>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <?php // $g = 1; foreach($boat_helms AS $boat_helm): ?>
            <td><div class="feature_box f_left">
                <div class="s_heading"><?php // echo $boat_helm['title'] ?></div>
                <div class="s_content"><?php // echo $boat_helm['description'] ?></div>
              </div></td>
            <?php // if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php // } ?>
            <?php // $g++; endforeach; ?>
          </tr>
        </table>-->
       <!-- <p class="feature_s_heading"><?php // echo $taxonomy['hull_&_deck_features'];?></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <?php // $g = 1; foreach($boat_hulldecks AS $boat_hulldeck): ?>
            <td><div class="feature_box f_left">
                <div class="s_heading"><?php // echo $boat_hulldeck['title'] ?></div>
                <div class="s_content"><?php // echo $boat_hulldeck['description'] ?></div>
              </div></td>
            <?php //if($g % 2 == 0){  ?>
          </tr>
          <tr>
            <?php //} ?>
            <?php //$g++; endforeach; ?>
          </tr>
        </table>-->
        <div class="clr"></div>
      </div>
		</div>
		<div class="tab_content_boat tab6">
        	<div class="feature_cont">
			<h2>Schedules & Prices ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <p class="desc_text">MV Deep Andaman Queen's Similan-Surin-Richelieu Example Trip Itinerary Similan Island, Koh Bon, Koh Tachai, Richelieu Rock and Surin Island <?php echo $results1[0]['no_of_days'] ?> Days / <?php echo $results1[0]['no_of_nights'] ?> Nights (<?php echo $results1[0]['no_of_dives'] ?> Dives).</p>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0"> 
              <tr class="row_white">
                <td><strong>Trip Name</strong></td>
                <td><?php echo $results1[0]['trip_title'] ?></td>
              </tr>
              <tr class="row_grey">
                <td><strong>Boat Name</strong></td>
                <td><?php echo $results1[0]['boat_name'] ?></td>
              </tr>
              <tr class="row_white">
                <td><strong>Trip Price</strong></td>
                <td><?php echo $results1[0]['trip_price'] ?> THB</td>
              </tr>              
            </table>
            <p class="feature_s_heading">Schedules</p>
            <span class="gal_head">Day 1</span>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="row_white">
                <td width="150">03:00 pm - 06:00 pm</td>
                <td>Pick-up at your Hotel, Phuket Airport, Dive shops & Khao Lak<br />
 					(Pick-up times are according to the location)
				</td>
              </tr>
              <tr class="row_grey">
                <td>06:00 pm - 08:00 pm</td>
                <td>Arrival at MV Deep Andaman Queen's, (Tablamu pier)<br />
Welcome Drinks - Cabin Allocation - Staff Introduction<br />
Boat Briefing - Welcome Dinner</td>
              </tr>
            </table>
            <span class="gal_head">Day 2</span>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="row_white">
                <td width="150">07:00 am - 07:30 am</td>
                <td>General Diving Rules / Safety Briefing</td>
              </tr>
              <tr class="row_grey">
                <td>07:00 am - 07:30 am</td>
                <td>Three day dives around the Similan Island<br />
 Visit Island No. 4 / Enjoy paradise with a beautiful white sandy beach.</td>
              </tr>
            </table>
            
            <span class="gal_head">Important Notice</span>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="row_white" >
                <td>The above intinerary is an example of and average cruise.</td>
              </tr>
              <tr class="row_grey">
                <td>The Captain and Cruise leader will decide the best course of action based on weather condition at the specific time of each trip.</td>
              </tr>
              <tr class="row_white">
                <td>Deep Andaman Co., Ltd retains the right to cancel or alter trips in the interest of the safety of all passengers, crews and the vessel.</td>
              </tr>
            </table>
            </div>
</div>
    </div>
        
	</div>
<div class="clr"></div>