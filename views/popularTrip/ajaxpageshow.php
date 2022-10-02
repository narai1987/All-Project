<?php
	  
	  if($results1){
	  foreach($results1 as $result1) :?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <div class="trip_image f_left"><img src="admin/<?php echo $result1['image'] ?>" width="180" height="149" alt="trip1" /></div>
          <div class="trip_view_right f_right">
            <p class="trip_heading"><span class="f_left"><?php echo $result1['trip_title'] ?> by <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $result1['boat_id'] ?>"><?php echo $result1['boat_name'] ?></a></span><a class="view_boat" href="index.php?control=boat&boat_id=<?php echo $result1['boat_id'] ?>">View boat specification</a></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200px"><label>Start Date:</label>
                  <?php echo date("j M, Y",strtotime($result1['start_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="225px"><label>End Date:</label>
                  <?php echo date("j M, Y",strtotime($result1['end_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="150px"><label>Country:</label>
                  <?php echo ucfirst($result1['country']) ?></td>
              </tr>
              <tr>
                <td><label>Description:</label></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td><label>Destination:</label><?php echo ucfirst($this->cityById($result1['destination_id'])); ?></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td width="150px"><label>No of Dives:</label>
                  <?php echo $this->getNoOfDive($result1['schedule_id'])?$this->getNoOfDive($result1['schedule_id']):"Not Available"; ?></td>
              </tr>
              <tr>
                <td width="200px" valign="top" rowspan="3"><?php echo $result1['specification'] ?></td>
                <td width="200px" valign="top" rowspan="3"> <label>Origin:</label><?php echo ucfirst($this->cityById($result1['origin_id'])); ?>
               </td>
                </td>
                <td width="150px"><label>Space Left:</label>
                  <?php echo $this->getSpaceLeft($result1['schedule_id'],$result1['boat_id']); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="200px"><div class="f_left view_btn"><a href="index.php?control=tripdetail&trip_id=<?php echo $result1['trip_id'] ?>&schId=<?php echo $result1['schedule_id'] ?>"><img src="template/<?php echo $tmp;?>/images/trip/view_detail_btn.png" width="114" height="25" /></a></div>
                  <div class="f_right wish_compare">
                    <a href="#t_compare" onclick="addToCompare('<?php echo $result1['trip_id'] ?>','<?php echo $result1['schedule_id'] ?>');"  title="Add to Compare" class="f_right button_compare"><img src="template/<?php echo $tmp;?>/images/trip/compare_btn.png" width="29" height="25" /></a>
                    <?php if($_SESSION['login']){ ?> <a href="#t_wishlist" onclick="addToWishlist('<?php echo $result1['trip_id'] ?>','<?php echo $result1['schedule_id'] ?>');" title="Add to Wishlist" class="f_right button_wishlist" style="margin-right:5px;cursor:pointer;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php }else{ ?>
                    <a href="#" title="Add to Wishlist" class="f_right login_popup" style="margin-right:5px;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php  } ?>
                  </div></td>
              </tr>
            </table>
          </div>
          <div class="clr"></div>
        </div>
      </div>
      <?php endforeach;?>
		  <!--################## *PAGING START* #####################-->
          <div id="avs_pagination" class="pagination">
		  <?php echo $this->paginateHTML($reload, $page, $tpages, $adjacents,$tdata); ?>
          </div>
		  <!--################## *PAGING END* #####################-->
	  <?php } ?>
	  
      
      
      
      <?php  if($results2){
	  foreach($results2 as $result2) :?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <div class="trip_image f_left"><img src="admin/<?php echo $result2['image'] ?>" width="180" height="149" alt="trip1" /></div>
          <div class="trip_view_right f_right">
            <p class="trip_heading"><span class="f_left"><?php echo $result2['trip_title'] ?> by <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $result2['boat_id'] ?>"><?php echo $result2['boat_name'] ?></a></span><a class="view_boat" href="index.php?control=boat&boat_id=<?php echo $result2['boat_id'] ?>">View boat specification</a></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200px"><label>Start Date:</label>
                  <?php echo date("j M, Y",strtotime($result2['start_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="225px"><label>End Date:</label>
                  <?php echo date("j M, Y",strtotime($result2['end_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="150px"><label>Country:</label>
                  <?php echo ucfirst($result2['country']) ?></td>
              </tr>
              <tr>
                <td><label>Description:</label></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td><label>Destination:</label><?php echo ucfirst($this->cityById($result2['destination_id'])); ?></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td width="150px"><label>No of Dives:</label>
                  <?php echo $this->getNoOfDive($result2['schedule_id'])?$this->getNoOfDive($result2['schedule_id']):"Not Available"; ?></td>
              </tr>
              <tr>
                <td width="200px" valign="top" rowspan="3"><?php echo $result2['specification'] ?></td>
                <td width="200px" valign="top" rowspan="3"><label>Origin:</label><?php echo ucfirst($this->cityById($result2['origin_id'])); ?></td>
                </td>
                <td width="150px"><label>Space Left:</label>
                  <?php echo $this->getSpaceLeft($result2['schedule_id'],$result2['boat_id']); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="200px"><div class="f_left view_btn"><a href="index.php?control=tripdetail&trip_id=<?php echo $result2['trip_id'] ?>&schId=<?php echo $result2['schedule_id'] ?>"><img src="template/<?php echo $tmp;?>/images/trip/view_detail_btn.png" width="114" height="25" /></a></div>
                  <div class="f_right wish_compare">
                  <a href="#t_compare" onclick="addToCompare('<?php echo $result2['trip_id'] ?>','<?php echo $result2['schedule_id'] ?>');" title="Add to Compare" class="f_right button_compare"><img src="template/<?php echo $tmp;?>/images/trip/compare_btn.png" width="29" height="25" /></a> 
                    <?php if($_SESSION['login']){ ?>
                    <a href="#t_wishlist" onclick="addToWishlist('<?php echo $result2['trip_id'] ?>','<?php echo $result2['schedule_id'] ?>');" title="Add to Wishlist" class="f_right button_wishlist" style="margin-right:5px;cursor:pointer;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php }else{ ?>
                     <a href="#" title="Add to Wishlist" class="f_right login_popup" style="margin-right:5px;"><img src="template/<?php echo $tmp;?>/images/trip/wishlist_btn.png" width="29" height="25" /></a>
                    <?php  } ?>
                  </div></td>
              </tr>
            </table>
          </div>
          <div class="clr"></div>
        </div>
      </div>
      <?php endforeach;?>
      
		  <!--################## *PAGING START* #####################-->
          <div id="avs_pagination" class="pagination">
		  <?php echo $this->paginateHTML2($reload2, $page2, $tpages2, $adjacents2,$tdata2); ?>
          </div>
		  <!--################## *PAGING END* #####################-->
      <?php }?>
     