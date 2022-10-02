<?php 
$taxonomy = $this->taxolist();
?>
<style type="text/css">
.imgAvatar{
	background-color: #ECFAF9;
  -moz-border-radius: 10px 30px;
  border-radius: 10px 30px / 15px 25px;
  border: 1px solid #E4E4F3;
  padding: 5px;

}
</style>
<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php"><?php echo $taxonomy['home'];?></a> >> <a href="index.php?control=trip"><?php echo $taxonomy['our_trips'];?></a> >> <!--<a class="active" href="index.php?control=compare">--><b><?php echo $taxonomy['compare'];?></b><!--</a>--></div>
    </div>
    <div class="tab_content_trip">
    <div class="page_heading"><?php echo $taxonomy['compare'];?> <?php echo $taxonomy['trips'];?></div>
      <div class="trip_box_cont">
        <div class="trip_box trip_box_compare">
        	<table class="compare_table" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="235" class="r_bod bot_bod">
                	<div class=""><?php echo $taxonomy['you_can_add_upto_3_trips_to_compare'];?></div>
                </td>
               
               <?php
			    foreach($results as $result): ?>
                <td width="235"  class="r_bod bot_bod">
                	<div class="compare_trip">
                    	 <a href="index.php?control=compare&task=remove&trip_id=<?php echo $result->trip_id;?>&tripScheduleId=<?php echo $result->scheduleId ?>" class="rem_trip"><img src="template/<?php echo $tmp ?>/images/comp_close.png" width="16" height="16" /></a>
                    	 <div class="compare_head">
                    	   <h4><?php echo $result->trip_title ?> By <a href="index.php?control=boat&boat_id=<?php echo $result->boat_id ?>" style="color:#ff2626;"><?php echo $result->boat_name ?></a></h4>
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
                           
                    	     <li><?php echo count($this->getTripReviews($result->trip_id)); ?> <?php echo $taxonomy['review'];?>(s)</li>
                    	   </ul>
                  	   </div>                       
                       	 <div class="comp_img">
                         	<a href="index.php?control=tripdetail&trip_id=<?php echo $result->trip_id ?>&schId=<?php echo $result->scheduleId ?>">
                            <img class="imgAvatar" src="admin/<?php echo $result->image ?>" width="180" height="149" /></a>
                         </div>
                    </div>
                </td>
               
                <?php endforeach; ?>
              
              
              </tr>
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['price'];?></td>
                
               <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><div class="total_price total_price_comp">
                <p class="price_red f_left"> <?php echo $_SESSION['symbol']; ?> <?php echo $result->trip_price * $_SESSION['value'] ?></p>
                </div></td>
              
                <?php endforeach; ?>
              
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['duration'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->no_of_days ?> <?php echo $taxonomy['day'];?> / <?php echo $result->no_of_nights ?> <?php echo $taxonomy['nights'];?></td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['no_of_dives'];?></td>
                
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->no_of_dives ?></td>
             <?php endforeach; ?>
                
              </tr> 
              
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['space_left'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod">16</td>
             <?php endforeach; ?>
              </tr> 
              
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['package_includes'];?></td>
                
                
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod">
                <?php /*################################ *GET TRIP PACKAGE OPTIONS* ################################*/
					$tripPackages = $this->getTripPackages($result->trip_id,$result->scheduleId);
					/*################################ *GET TRIP PACKAGE OPTIONS* ################################*/ ?>
                    <?php  if(!empty($tripPackages['Includes'])){ ?>
					<?php $includes = explode(",",$tripPackages['Includes']); ?>
					<?php  } ?>
                    <ul>
                    	<?php if($includes): ?>
							<?php foreach($includes AS $key => $val): ?>
                                <li><?php echo $val ?></li>
                            <?php endforeach; ?>
                          <?php else: ?>
                          <li>No Packages</li>  
                        <?php endif; ?>
                   </ul>
                </td>
                
             <?php endforeach; ?>
                
              </tr> 
              
              
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['package_excludes'];?></td>
                
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod">
                <?php /*################################ *GET TRIP PACKAGE OPTIONS* ################################*/
					$tripPackages = $this->getTripPackages($result->trip_id,$result->scheduleId);
					/*################################ *GET TRIP PACKAGE OPTIONS* ################################*/ ?>
                    <?php  if(!empty($tripPackages['Excludes'])){ ?>
                    <?php $excludes = explode(",",$tripPackages['Excludes']) ?>
                    <?php  } ?>
                    <ul>
                    	<?php if($excludes): ?>
							<?php foreach($excludes AS $key => $val): ?>
                            <li><?php echo $val ?></li>
                            <?php endforeach; ?>
                          <?php else: ?>
                          <li>No Packages</li>  
                        <?php endif; ?>
                   </ul>
                   
               </td>
               
             <?php endforeach; ?>
              
              </tr> 
              <tr>
                <td colspan="4" class="bot_bod"><p class="comp_heading"><?php echo $taxonomy['boat_specification'];?></p></td>
              </tr>
             
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['length_overall'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->boat_length ?></td>
             <?php endforeach; ?>
              </tr> 
             
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['beam'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->boat_beam ?></td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['draft-drive_up-high_trim'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->draft_drive_up_high_trim ?>"</td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['draft-drive_down'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->draft_drive_down ?>"</td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['deadrise'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->deadrise ?>°</td>
             <?php endforeach; ?>
              </tr> 
             <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['approximate_dry_weight'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->approx_dry_weight ?> Lbs</td>
             <?php endforeach; ?>
              </tr>  
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['estimated_height_on_trailer-top_of_windshield'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->estimated_height_on_trailer_top_windshield ?></td>
             <?php endforeach; ?>
              </tr>  
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['boat_height_-_windshield_to_keel'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->boat_height_windshield_to_keel ?></td>
             <?php endforeach; ?>
              </tr>  
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['bridge_clearance-top_up'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->bridge_clearance_top_up ?></td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['bridge_clearance-top_down'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->bridge_clearance_top_down ?></td>
             <?php endforeach; ?>
              </tr>  
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['cockpit_depth-helm'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->cockpit_depth_helm ?>"</td>
             <?php endforeach; ?>
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['cockpit_storage'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->cockpit_storage ?> CU. FT</td>
             <?php endforeach; ?>
              </tr>  
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['fuel_capacity'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod"><?php echo $result->fuel_capacity ?> Gals</td>
             <?php endforeach; ?>
              </tr>
              <tr>
                <td colspan="4" class="bot_bod"><p class="comp_heading"><?php echo $taxonomy['boat_technical_features'];?></p></td>
              </tr>
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['technical_features'];?></td>
                
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod">
                <?php $technicalFeatures = $this->getBoatTechnicalFeatures($result->boat_engine); ?>
                	<ul>
                    	<?php if($technicalFeatures){ ?>
                        <?php foreach($technicalFeatures AS $technicalFeature){ ?>
                    	<li><?php echo $technicalFeature['title'] ?></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </td>
                
             <?php endforeach; ?>
              </tr> 
              <tr>
                <td colspan="4" class="bot_bod"><p class="comp_heading"><?php echo $taxonomy['boat_engine_&_technical_options'];?></p></td>
              </tr>
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod bot_bod"><?php echo $taxonomy['engine_options'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod bot_bod">
                	<?php $technicalPowers = $this->getBoatPowers($result->boat_enginepower); ?>
                	<ul>
                    	<?php if($technicalPowers){ ?>
                        <?php foreach($technicalPowers AS $technicalPower){ ?>
                        <li><strong>225 <?php echo $technicalPower['power']." ".$technicalPower['name'] ?></strong> <?php echo $technicalPower['title'] ?></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </td>
             <?php endforeach; ?>
                
              </tr> 
              <tr class="comp_tr_color">
                <td class="heading_bg r_bod"><?php echo $taxonomy['technical_options'];?></td>
                <?php foreach($results as $result): ?>
                <td class="r_bod">
                	 <?php $technicalOptions = $this->getBoatTechnicalOptions($result->boat_technical); ?>
                	<ul>
                    	<?php if($technicalOptions){ ?>
                        <?php foreach($technicalOptions AS $technicalOption){ ?>
                    	<li><?php echo $technicalOption['title'] ?></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </td>
             <?php endforeach; ?>
               
              </tr> 
            </table>
        </div>
      </div>
    </div>
    
  </div>