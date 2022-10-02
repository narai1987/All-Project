<?php 
$taxonomy = $this->taxolist();
?>
<style type="text/css">
.darkbase_bg {
position: fixed;
width: 100%;
height: 100%;
top: 0px;
left: 0px;
display: none;
/*background-color: #f00 !important;*/
background: url(images/bcpng.png) repeat;
text-align:center !important;
z-index: 1000;
}
.clspop {
	display:none;	
}
	
		.darkbase_bg {
			display:block !important;
			
		}

</style>
<div class="" id="closepop"><!--darkbase_bg-->
<div id="ajax_loader" style="width:250px;height:50px;  z-index:5000;  display:none;margin:0 auto; margin-top:25%;" >
<img src="images/fishing_boat_4.gif" /><br />
<h3 style="color:#FFF;">Loading...</h3>
</div>
</div>


<script type="text/javascript">

		var country1 = document.getElementById('country1').value;
		var origin = document.getElementById('origin').value;
		var destination = document.getElementById('destination').value;
		var start_date = document.getElementById('start_date').value;
		var end_date = document.getElementById('end_date').value;
		
	function paging(page) {
		document.getElementById("closepop").className = "darkbase_bg";
		document.getElementById("ajax_loader").style.display="block";
		$.ajax({
			url:"ajax.php?control=trip&task=ajaxShow&country1="+country1+"&origin="+origin+"&destination="+destination+"&start_date="+start_date+"&end_date="+end_date+"&page="+page,
			 success:function(rp){
				 //alert(rp);
				$("#LajaxData").html(rp);
					$("a.login_popup").click(function(){
					centerPopup_login();
					loadPopup_login();
					});	
					//for compare
					$(".button_compare").click(function(){
						//centering with css
						centerPopup_compare();
						//load popup
						loadPopup_compare();
					});			
				setTimeout("closeLoaderBackground('closepop')",3000);
		}});
	}
	function paging2(page) {
		document.getElementById("closepop").className = "darkbase_bg";
		document.getElementById("ajax_loader").style.display="block";
		$.ajax({
			url:"ajax.php?control=trip&task=ajaxDayShow&country1="+country1+"&origin="+origin+"&destination="+destination+"&start_date="+start_date+"&end_date="+end_date+"&page2="+page,
			 success:function(rp2){
				 //alert(rp);
				$("#DayajaxData").html(rp2);
					$("a.login_popup").click(function(){
					centerPopup_login();
					loadPopup_login();
					});
					//for compare
					$(".button_compare").click(function(){
						//centering with css
						centerPopup_compare();
						//load popup
						loadPopup_compare();
					});		
				setTimeout("closeLoaderBackground('closepop')",3000);
		}});
	}
	
	
	function closeLoaderBackground(clss) {
		document.getElementById(clss).className = "clspop";
	}
	</script>

<div id="main_box_cont">
  <div class="main_box">
    <p class="content_heading"><?php echo $taxonomy['our_trips'];?></p>
    <ul class="menu" style="float:right">
      <li id="news" class="active"><?php echo $taxonomy['liveabords'];?></li>
      <li id="tutorials"><?php echo $taxonomy['day_trips'];?></li>
    </ul>
  </div>
  <div class="tab_content_cont">
    
    
    <div class="tab_content news" id="LajaxData">
      <?php
	  
	  if($results1){
	  foreach($results1 as $result1) :?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <div class="trip_image f_left"><img src="admin/<?php echo $result1['image'] ?>" width="180" height="149" alt="trip1" /></div>
          <div class="trip_view_right f_right">
            <p class="trip_heading"><span class="f_left"><?php echo $result1['trip_title'] ?> by <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $result1['boat_id'] ?>"><?php echo $result1['boat_name'] ?></a></span><a class="view_boat" href="index.php?control=boat&boat_id=<?php echo $result1['boat_id'] ?>"><?php echo $taxonomy['view_boat_specification'];?></a></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200px"><label><?php echo $taxonomy['start_date'];?>:</label>
                  <?php echo date("j M, Y",strtotime($result1['start_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="225px"><label><?php echo $taxonomy['end_date'];?>:</label>
                  <?php echo date("j M, Y",strtotime($result1['end_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="150px"><label><?php echo $taxonomy['country'];?>:</label>
                  <?php echo ucfirst($result1['country']) ?></td>
              </tr>
              <tr>
                <td><label><?php echo $taxonomy['description'];?>:</label></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td><label><?php echo $taxonomy['description'];?>:</label><?php echo ucfirst($this->cityById($result1['destination_id'])); ?></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td width="150px"><label><?php echo $taxonomy['no_of_dives'];?>:</label>
                  <?php echo $this->getNoOfDive($result1['schedule_id'])?$this->getNoOfDive($result1['schedule_id']):"Not Available"; ?></td>
              </tr>
              <tr>
                <td width="200px" valign="top" rowspan="3"><?php echo $result1['specification'] ?></td>
                <td width="200px" valign="top" rowspan="3"> <label><?php echo $taxonomy['origin'];?>:</label><?php echo ucfirst($this->cityById($result1['origin_id'])); ?>
               </td>
                </td>
                <td width="150px"><label><?php echo $taxonomy['space_left'];?>:</label>
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
	  <?php }else{
		  ?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <h2><?php echo $taxonomy['no_trips_found'];?></h2>
          <div class="clr"></div>
        </div>
      </div>
      <?php } ?>
    </div>
    
    
    
    <div class="tab_content tutorials" id="DayajaxData">
      <?php  if($results2){
	  foreach($results2 as $result2) :?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <div class="trip_image f_left"><img src="admin/<?php echo $result2['image'] ?>" width="180" height="149" alt="trip1" /></div>
          <div class="trip_view_right f_right">
            <p class="trip_heading"><span class="f_left"><?php echo $result2['trip_title'] ?> by <a class="boat_name" href="index.php?control=boat&boat_id=<?php echo $result2['boat_id'] ?>"><?php echo $result2['boat_name'] ?></a></span><a class="view_boat" href="index.php?control=boat&boat_id=<?php echo $result2['boat_id'] ?>"><?php echo $taxonomy['view_boat_specification'];?></a></p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200px"><label><?php echo $taxonomy['start_date'];?>:</label>
                  <?php echo date("j M, Y",strtotime($result2['start_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="225px"><label><?php echo $taxonomy['end_date'];?>:</label>
                  <?php echo date("j M, Y",strtotime($result2['end_trip_datetime'])); ?></td>
                <td width="1">&nbsp;</td>
                <td width="150px"><label><?php echo $taxonomy['country'];?>:</label>
                  <?php echo ucfirst($result2['country']) ?></td>
              </tr>
              <tr>
                <td><label><?php echo $taxonomy['description'];?>:</label></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td><label><?php echo $taxonomy['description'];?>:</label><?php echo ucfirst($this->cityById($result2['destination_id'])); ?></td>
                <td rowspan="4" class="table_sep">&nbsp;</td>
                <td width="150px"><label><?php echo $taxonomy['no_of_dives'];?>:</label>
                  <?php echo $this->getNoOfDive($result2['schedule_id'])?$this->getNoOfDive($result2['schedule_id']):"Not Available"; ?></td>
              </tr>
              <tr>
                <td width="200px" valign="top" rowspan="3"><?php echo $result2['specification'] ?></td>
                <td width="200px" valign="top" rowspan="3"><label><?php echo $taxonomy['origin'];?>:</label><?php echo ucfirst($this->cityById($result2['origin_id'])); ?></td>
                </td>
                <td width="150px"><label><?php echo $taxonomy['space_left'];?>:</label>
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
      <?php }else{
		  ?>
      <div class="trip_box_cont">
        <div class="trip_box">
          <h2><?php echo $taxonomy['no_trips_found'];?></h2>
          <div class="clr"></div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>
<div class="clr"></div>

<!-------alert---------->
<div id="popupContact_compare">
  <p class="content_area"> <span class="normal_txt">Success: You have added 1 item to compare</span> <span class="link_span"> <a class="link_img" href="#"><img src="<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a> <a class="link_img_close" href="#"><img title="Remove" src="<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> </span> <span class="link_span"> <a class="link_img" href="#"><img src="<?php echo $tmp;?>/images/small/1.jpg" width="51" height="35" /></a> <a class="link_img_close" href="#"><img title="Remove" src="<?php echo $tmp;?>/images/q_close.png" width="11" height="10" /></a> </span> <span class="go_btn"><a href="compare.html"><img src="<?php echo $tmp;?>/images/go_btn.png" width="50" height="23" /></a></span> <a href="#" id="popupContactClose_compare"><img title="Close" src="<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
</div>

<div id="popupContact_wishlist">
  <p class="content_area"> Success: You have added <a class="link_txt" href="#">Similan Islands, Thailand</a> to your <a class="link_txt" href="#">Wishlist</a> <a href="#" id="popupContactClose_wishlist"><img title="Close" src="template/<?php echo $tmp;?>/images/close.png" width="7" height="7" /></a> </p>
</div>
<div id="backgroundPopup_compare"></div>
<div id="backgroundPopup_wishlist"></div>

<!-------//alert--------> 

<script type="text/javascript">
			function addToWishlist(val,trip_schedule_id){
				$("#popupContact_wishlist").html('<p align="center"> <img src="images/fishing_boat_4.gif" /> </p>');
				loadPopup_wishlist();
				$.ajax({
				 url:"ajax.php?control=wishlist&task=addWishList&trip_id="+val+"&tripScheduleId="+trip_schedule_id,
				 success:function(result){
					 
						 $.ajax({
							url:"ajax.php?control=wishlist&task=addWishList",
							 success:function(result7){
								$("#cwish").html(result7);
								loadPopup_wishlist();
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
				loadPopup_compare();
				$.ajax({
				 url:"ajax.php?control=compare&task=addToCompare&trip_id="+val+"&tripScheduleId="+trip_schedule_id,
				 success:function(result8){
					 
				 $.ajax({
					url:"ajax.php?control=compare&task=addToCompare",
					success:function(result9){
						$("#tcomp").html(result9);
						loadPopup_compare();
					}
				});
				
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
						 
					//disablePopup_compare();
					$.ajax({
						url:"ajax.php?control=compare&task=addToCompare",
						success:function(result9){
							$("#tcomp").html(result9);
							addToCompare('rm');
						}
					});					
				
				}});
				
			}
		</script>