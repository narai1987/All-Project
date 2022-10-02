<link type="text/css" rel="stylesheet" href="assets/rating/css/style.css">
        <link type="text/css" rel="stylesheet" href="assets/rating/css/example.css">
        <!--<script type="text/javascript" src="assets/rating/jquery.min.js"></script>-->

<div id="main_box_cont">
    <div class="main_box">
       <div class="breadcrumb"><a href="index.php">Home</a> >> <b>My Trips</b></div>
    </div>
    <div class="tab_content_trip">
      <div class="left_panel">
        <div class="page_heading">My Trips</div>
        <?php foreach($results as $result) { ?>
              <div class="my_account_cont">
                <div class="account_box">
                <p class="acc_heading"><?php echo $result['trip_title'];?> By  ,<?php echo $result['boat_name'];?><span style="float:right;">Checkout Status : <?php if($result['pay_status']) echo '<b style="color:#090;">Success</b>';else echo '<b style="color:#F00;">Waiting</b>'; ?></span></p>
        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
              		<tr>
                <td width="170px"><img src="admin/<?php echo $result['image'];?>" height="120" width="170" /> </td>
                <td>	
                    <table width="100%" border="0" cellspacing="9" cellpadding="0">
                	<tr>
                    <td>Departure Date :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['start_trip_datetime']));?></span></td>
                    <td>Return Date :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['end_trip_datetime']));?></span></td>
                  	</tr>
                	<tr>
                    <td>Booking Date :  <span style="color:#9f4737;"><?php echo date("D, jS M Y , g:i A",strtotime($result['booking_date']));?></span></td>
                    <td><b>Trip Price : </b> <span style="color:#ff2626;"><?php echo $result['trip_price'];?> THB</span></td>
                  	</tr>
                	<tr>
                    <td>Origin :  <span style="color:#9f4737;"><?php echo $this->cityById($result['origin_id']);?></span></td>
                    <td>Destination :  <span style="color:#9f4737;"><?php echo $this->cityById($result['destination_id']);?></span></td>
                  	</tr>
                	<tr>
                    <td>Persons :  <span style="color:#9f4737;"><?php echo $result['no_of_person'];?></span></td>
                    <td>Children : <span style="color:#9f4737;"><?php echo $result['no_of_child'];?></span></td>
                  	</tr>
                	<tr>
                    <td><h3>Grand Total : </h3> <span style="color:#ff2626;"><?php echo $result['grand_total'];?> THB</span></td>
                    <td><?php if(!$result['pay_status'] && (strtotime($result['start_trip_datetime']) > strtotime(date("Y:m:d H:i:s")))){ ?><a href="#" class="get_quotes_btn">Checkout</a><?php } ?>
                    <a href="#" style="color:#FFF;font-weight:bold;" class="get_quotes_btn">Rate It</a>
                   
                   
                   <div class="rate-ex3-cnt">
                    <div id="1" class="rate-btn-1 rate-btn"></div>
                    <div id="2" class="rate-btn-2 rate-btn"></div>
                    <div id="3" class="rate-btn-3 rate-btn"></div>
                    <div id="4" class="rate-btn-4 rate-btn"></div>
                    <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>
                   
                   
                   
                    </td>
                  	</tr>
                  </table>
               </td> 
              
              </tr>
        
              </table>
              <!-- <script>
       
        $(function(){ 
            $('.rate-btn').hover(function(){
				alert('hov');
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            $('.rate-btn').click(function(){    
				alert('click');
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $.ajax({
                    type : "POST",
                    url : "http://localhost/rateit/rating/ajax.php",
                    data: dataRate,
                    success:function(){}
                });
                
            });
        });
    </script>-->
              </div>
              </div>
        <?php }?>
        
        </div> 
        
        
        <div class="right_panel">
           <?php include_once("includes/myaccountleftlink.php");?>
        </div>
    	<div class="clr"></div>
    </div>
</div>