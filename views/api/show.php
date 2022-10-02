<div id="main_box_cont">
    <div class="main_box">
    	<p class="content_heading">Our Trips</p>
		<ul class="menu" style="float:right">
			<li id="news" class="active">Liveabords</li>
			<li id="tutorials">Day Trips</li>
		</ul>
    </div>
    <div class="tab_content_cont">
      <div class="tab_content news">
      
      <?php
	  /*echo '<pre>';
	  print_r($results1);
	  echo '</pre>';*/
	  foreach($results1 as $result1) :?>
      
        <div class="trip_box_cont">
          <div class="trip_box">
            <div class="trip_image f_left"><img src="admin/<?php echo $result1['upper_deck'] ?>" width="180" height="149" alt="trip1" /></div>
            <div class="trip_view_right f_right">
              <p class="trip_heading"><span class="f_left"><?php echo $result1['origin'] ?>, <?php echo $result1['destination'] ?> by <a class="boat_name" href="#"><?php echo $result1['boat_name'] ?></a></span><a class="view_boat" href="#">View boat specification</a></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="200px"><label>Start Date:</label><?php echo date("j M, Y",strtotime($result1['start_date'])); ?></td>
                  <td width="1">&nbsp;</td>
                  <td width="225px"><label>End Date:</label><?php echo date("j M, Y",strtotime($result1['end_date'])); ?></td>
                  <td width="1">&nbsp;</td>
                  <td width="150px"><label>Country:</label>Thailand</td>
                </tr>
                <tr>
                  <td><label>Description:</label></td>
                  <td rowspan="4" class="table_sep">&nbsp;</td>
                  <td><label>Destination:</label></td>
                  <td rowspan="4" class="table_sep">&nbsp;</td>
                  <td width="150px"><label>No of Dives:</label><?php echo $result1['no_of_dives'] ?></td>
                </tr>
                <tr>
                  <td width="200px" valign="top" rowspan="3"><?php echo $result1['specification'] ?></td>
                  <td width="200px" valign="top" rowspan="3"><?php echo $result1['destination'] ?></td>
                    
                  </td>
                  <td width="150px"><label>Space Left:</label>16</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="200px">
                    <div class="f_left view_btn"><a href="#"><img src="template/<?php echo $tmp;?>/images/trip/view_detail_btn.png" width="114" height="25" /></a></div>
                    <div class="f_right wish_compare"> <a href="#t_compare" title="Add to Compare" class="f_right button_compare"><img src="template/<?php echo $tmp;?>/images/trip/compare_btn.png" width="29" height="25" /></a> <a href="#t_wishlist" title="Add to Wishlist" class="f_right button_wishlist" style="margin-right:5px;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a> </div>
                  </td>
                </tr>
                </table>
              </div>
            <div class="clr"></div>
          </div>
          </div>
          
          <?php endforeach;?>
          
        </div>
        
        
        
        
      <div class="tab_content tutorials">
      <?php
	  foreach($results2 as $result2) :?>
      
       <div class="trip_box_cont">
          <div class="trip_box">
            <div class="trip_image f_left"><img src="admin/<?php echo $result2['upper_deck'] ?>" width="180" height="149" alt="trip1" /></div>
            <div class="trip_view_right f_right">
              <p class="trip_heading"><span class="f_left"><?php echo $result2['origin'] ?>, <?php echo $result2['destination'] ?> by <a class="boat_name" href="#"><?php echo $result2['boat_name'] ?></a></span><a class="view_boat" href="#">View boat specification</a></p>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="200px"><label>Start Date:</label><?php echo date("j M, Y",strtotime($result2['start_date'])); ?></td>
                  <td width="1">&nbsp;</td>
                  <td width="225px"><label>End Date:</label><?php echo date("j M, Y",strtotime($result2['end_date'])); ?></td>
                  <td width="1">&nbsp;</td>
                  <td width="150px"><label>Country:</label>Thailand</td>
                </tr>
                <tr>
                  <td><label>Description:</label></td>
                  <td rowspan="4" class="table_sep">&nbsp;</td>
                  <td><label>Destination:</label></td>
                  <td rowspan="4" class="table_sep">&nbsp;</td>
                  <td width="150px"><label>No of Dives:</label><?php echo $result2['no_of_dives'] ?></td>
                </tr>
                <tr>
                  <td width="200px" valign="top" rowspan="3"><?php echo $result2['specification'] ?></td>
                  <td width="200px" valign="top" rowspan="3"><?php echo $result2['destination'] ?></td>
                    
                  </td>
                  <td width="150px"><label>Space Left:</label>16</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="200px">
                    <div class="f_left view_btn"><a href="#"><img src="template/<?php echo $tmp;?>/images/trip/view_detail_btn.png" width="114" height="25" /></a></div>
                    <div class="f_right wish_compare"> <a href="#t_compare" title="Add to Compare" class="f_right button_compare"><img src="template/<?php echo $tmp;?>/images/trip/compare_btn.png" width="29" height="25" /></a> <a href="#t_wishlist" title="Add to Wishlist" class="f_right button_wishlist" style="margin-right:5px;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a> </div>
                  </td>
                </tr>
                </table>
              </div>
            <div class="clr"></div>
          </div>
          </div>
          
          <?php endforeach;?>
          
          
          
        </div>
    </div>
		
	</div>
<div class="clr"></div>

        <!-------alert---------->
        <div id="popupContact_compare">
                    <p class="content_area">
                   		<span class="normal_txt">Success: You have added 1 item to compare</span>
                        <span class="link_span">
                            <a class="link_img" href="#"><img src="<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a>
                            <a class="link_img_close" href="#"><img title="Remove" src="<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a>
                        </span>                    
                        <span class="link_span">
                            <a class="link_img" href="#"><img src="<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a>
                            <a class="link_img_close" href="#"><img title="Remove" src="<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a>
                        </span> 
                       <span class="go_btn"><a href="compare.html"><img src="<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a></span>
                        <a href="#" id="popupContactClose_compare"><img title="Close" src="<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a>
                    </p>
                </div>
        <div id="popupContact_wishlist">
                    <p class="content_area">
                   		Success: You have added 
                        <a class="link_txt" href="#">Similan Islands, Thailand</a> to your <a class="link_txt" href="#">Wishlist</a>
                        <a href="#" id="popupContactClose_wishlist"><img title="Close" src="<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a>
                    </p>
                </div>
                <div id="backgroundPopup_compare"></div>
                <div id="backgroundPopup_wishlist"></div>
                
        <!-------//alert-------->