<?php $taxonomy = $this->taxolist();

?>
<div id="main_box_cont">
    <div class="main_box">
    	<div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=trip"><?php echo $taxonomy['our_trips'];?></a> >><b><?php echo $results1[0]['boat_name'] ?></b></div>
    </div>
</div>


<!--<div id="home-flexslider" class="clearfix">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="template/<?php echo $tmp;?>/images/boat/ban1.jpg" alt="15421 Southwest 39th Terrace">
               
            </li>
            <li>
                <img src="template/<?php echo $tmp;?>/images/boat/ban2.jpg" alt="15421 Southwest 39th Terrace">
               
            </li>
            <li>
                <img src="template/<?php echo $tmp;?>/images/boat/ban3.jpg" alt="15421 Southwest 39th Terrace">
               
            </li>
        </ul>
    </div>
</div>--> 
<!--<div class="boat_banner"></div>-->

<div id="main_box_cont">
    <div class="main_box">
    	<p class="content_heading"><?php echo substr($results1[0]['boat_name'],0,31) ?></p>
		<ul class="menu2" style="float:right">
			<li id="tab1" class="active"><?php echo $taxonomy['overview'];?></li>
			<li id="tab2"><?php echo $taxonomy['floorplans'];?></li>
            <li id="tab3"><?php echo $taxonomy['gallery'];?></li>
            <li id="tab4"><?php echo $taxonomy['specs'];?></li>
            <li id="tab5"><?php echo $taxonomy['featured_&_options'];?></li><!--
            <li id="tab6">Schedules & Prices</li>-->
		</ul>
    </div>
    <div class="tab_content_cont">
    	<div class="boat_sidebar">
        	<ul>
            <?php foreach($allBoats AS $allBoat): ?>
            	<li><a href="index.php?control=boat&boat_id=<?php echo $allBoat->boat_id ?>" <?php if($allBoat->boat_id == $results1[0]['boat_id']) { ?> class="active" <?php } ?>><?php echo $allBoat->boat_name ?></a></li>
                <?php endforeach; ?>
               <!-- <li><a href="#">540 Sundancer</a></li>
                <li><a href="#">Past Models</a></li>
                <li><a href="#">Digital 2013 Yachts Catalog</a></li>
                <li><a href="#">Digital 2013 International Boat Catalogs</a></li>
                <li><a href="#">Virtual Tours</a></li>-->
            </ul>
        </div>
    
        <div class="tab_content_boat tab1">
			<h2><?php echo $taxonomy['overview'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <div class="overview">
            	<!--<div class="b_name"><?php echo $results1[0]['boat_name'] ?></div>-->
                <div class="b_length"><?php echo $results1[0]['boat_length'] ?></div>
                <div class="b_beam"><?php echo $results1[0]['boat_beam'] ?></div>
                <div class="b_fuel"><?php echo $results1[0]['fuel_capacity'] ?>Gallons</div>
                <div class="b_capacity"><?php echo $results1[0]['men_capacity'] ?></div>
            </div>
		</div>
		<div class="tab_content_boat tab2">
			<h2><?php echo $taxonomy['floorplans'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2><br />
<br />

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><img src="admin/<?php echo $results1[0]['upper_deck'] ?>" width="104" height="356" /></td>
                <td align="center"><img src="admin/<?php echo $results1[0]['main_deck'] ?>" width="106" height="353" /></td>
                <td align="center"><img src="admin/<?php echo $results1[0]['lower_deck'] ?>" width="101" height="351" /></td>
              </tr>
            </table>

		</div>
        <div class="tab_content_boat tab3">
			<h2><?php echo $taxonomy['gallery'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <span class="gal_head"><?php echo $taxonomy['exterior'];?></span>
            <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               <?php $g = 1;if($boatGallerys):  foreach($boatGallerys as $gal): 
			   	if($gal['gallery_type_id'] == 1){
			   ?>
                <td><a href="admin/<?php echo $gal['images'] ?>" class="pirobox_gall" title="Similan Island"><img src="admin/<?php echo $gal['images'] ?>" width="135" height="90" alt=""/></a></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                <?php else: ?>
                <td><?php echo $taxonomy['no_gallery_found'];?>.</td>
                <?php endif; ?>
                </tr>
            </table>

            <span class="gal_head"><?php echo $taxonomy['interior'];?></span>
             <table class="boat_gal" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
               <?php $g = 1;if($boatGallerys): foreach($boatGallerys as $gal): 
			   	if($gal['gallery_type_id'] == 2){
			   ?>
                <td><a href="admin/<?php echo $gal['images'] ?>" class="pirobox_gall" title="Similan Island"><img src="admin/<?php echo $gal['images'] ?>" width="135" height="90" alt=""/></a></td>
                <?php if($g % 5 == 0){  ?>
              </tr><tr>
             <?php } ?>
                <?php $g++; } endforeach; ?>
                
                <?php else: ?>
                <td><?php echo $taxonomy['no_gallery_found'];?>.</td>
                <?php endif; ?>
                </tr>
            </table>
		</div>
		<div class="tab_content_boat tab4">
			<h2><?php echo $taxonomy['specifications'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2>
            <table class="table_specs" width="100%" border="0" cellspacing="0" cellpadding="0"> 
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['length_overall'];?></strong></td>
                <td><?php echo $results1[0]['boat_length'] ?></td>
              </tr>
              <tr class="row_grey">
                <td><strong><?php echo $taxonomy['beam'];?></strong></td>
                <td><?php echo $results1[0]['boat_beam'] ?></td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['draft-drive_up-high_trim'];?></strong></td>
                <td><?php echo $results1[0]['draft_drive_up_high_trim'] ?></td>
              </tr>
               <tr class="row_grey">
                <td><strong><?php echo $taxonomy['draft-drive_down'];?></strong></td>
                <td><?php echo $results1[0]['draft_drive_down'] ?></td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['deadrise'];?></strong></td>
                <td><?php echo $results1[0]['deadrise'] ?>°</td>
              </tr>
               <tr class="row_grey">
                <td><strong><?php echo $taxonomy['approximate_dry_weight'];?></strong></td>
                <td><?php echo $results1[0]['approx_dry_weight'] ?> Lbs</td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['estimated_height_on_trailer-top_of_windshield'];?></strong></td>
                <td><?php echo $results1[0]['estimated_height_on_trailer_top_windshield'] ?></td>
              </tr>
               <tr class="row_grey">
                <td><strong><?php echo $taxonomy['boat_height_-_windshield_to_keel'];?></strong></td>
                <td><?php echo $results1[0]['boat_height_windshield_to_keel'] ?></td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['bridge_clearance-top_up'];?></strong> </td>
                <td><?php echo $results1[0]['bridge_clearance_top_up'] ?></td>
              </tr>
               <tr class="row_grey">
                <td><strong><?php echo $taxonomy['bridge_clearance-top_down'];?></strong></td>
                <td><?php echo $results1[0]['bridge_clearance_top_down'] ?></td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['cockpit_depth-helm'];?></strong></td>
                <td><?php echo $results1[0]['cockpit_depth_helm'] ?></td>
              </tr>
               <tr class="row_grey">
                <td><strong><?php echo $taxonomy['cockpit_storage'];?></strong> </td>
                <td><?php echo $results1[0]['cockpit_storage'] ?> CU. FT</td>
              </tr>
              <tr class="row_white">
                <td><strong><?php echo $taxonomy['fuel_capacity'];?></strong></td>
                <td><?php echo $results1[0]['fuel_capacity'] ?> Gals</td>
              </tr>
            </table>
		</div>
        <div class="tab_content_boat tab5">
        	<div class="feature_cont">
                <h2><?php echo $taxonomy['featured_&_options'];?> ( <?php echo $results1[0]['boat_name'] ?> )</h2>
                <p class="feature_heading"><?php echo $taxonomy['boat_engine_&_technical_options'];?></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                  <tr>
                  <?php $g = 1; foreach($enginFeatures AS $enginFeature): ?>
                  	<td>
                        <div class="feature_box f_left">
                            <div class="s_heading"><?php echo $enginFeature['title'] ?></div>
                            <div class="s_content"><?php echo $enginFeature['description'] ?></div>
                        </div>
                	</td>
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                </table>
                
                 <p class="feature_heading"><?php echo $taxonomy['boat_engine_&_technical_options'];?></p>
                 <p class="feature_s_heading"><?php echo $taxonomy['engine_options'];?></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <?php $g = 1; foreach($enginPowers AS $enginPower): ?>
                  	<td>
                        <div class="feature_box f_left">
                        	<div class="bhp_no f_left">
                            	<div class="bhp"><?php echo $enginPower['power'] ?></div>
                                <div class="bhp_txt"><?php echo $enginPower['name'] ?></div>
                            </div>
                            <div class="s_heading"><?php echo $enginPower['title'] ?></div>
                            <div class="s_content"><?php echo $enginPower['description'] ?></div>
                        </div>
                	</td>
                       
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                 
                </table>
				 <p class="feature_s_heading"><?php echo $taxonomy['technical_options'];?></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <?php $g = 1; foreach($boat_technicals AS $boat_technical): ?>
                  	<td>
                        <div class="feature_box f_left">
                            <div class="s_heading"><?php echo $boat_technical['title'] ?></div>
                            <div class="s_content"><?php echo $boat_technical['description'] ?></div>
                        </div>
                	</td>
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                             
                </table>
                
                 <p class="feature_heading"><?php echo $taxonomy['interior_features'];?></p>
                 <p class="feature_s_heading"><?php echo $taxonomy['cockpit_features'];?></p>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <?php $g = 1; foreach($boat_cockpits AS $boat_cockpit): ?>
                  	<td>
                        <div class="feature_box f_left">
                            <div class="s_heading"><?php echo $boat_cockpit['title'] ?></div>
                            <div class="s_content"><?php echo $boat_cockpit['description'] ?></div>
                        </div>
                	</td>
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                 
                </table>
                <p class="feature_s_heading"><?php echo $taxonomy['helm_features'];?></p>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <?php $g = 1; foreach($boat_helms AS $boat_helm): ?>
                  	<td>
                        <div class="feature_box f_left">
                            <div class="s_heading"><?php echo $boat_helm['title'] ?></div>
                            <div class="s_content"><?php echo $boat_helm['description'] ?></div>
                        </div>
                	</td>
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                </table>
                 <p class="feature_s_heading"><?php echo $taxonomy['hull_&_deck_features'];?></p>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <?php $g = 1; foreach($boat_hulldecks AS $boat_hulldeck): ?>
                  	<td>
                        <div class="feature_box f_left">
                            <div class="s_heading"><?php echo $boat_hulldeck['title'] ?></div>
                            <div class="s_content"><?php echo $boat_hulldeck['description'] ?></div>
                        </div>
                	</td>
                    <?php if($g % 2 == 0){  ?>
              </tr><tr>
             <?php } ?>
                  <?php $g++; endforeach; ?>
                    
                  </tr>
                </table>
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