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
<div id="ajax_loader" style="width:250px;height:50px;  z-index:5000;  display:none;margin:0 auto; margin-top:20%;" >
<img src="images/newsload.gif" /><br /><!--
<h3 style="color:#FFF;">Loading...</h3>-->
</div>
</div>
<script type="text/javascript">

$(function() {
		$('#st-accordion').accordion({
			oneOpenedItem	: true
			
		});
	});
	
</script>
<div id="main_box_cont">
    <div class="main_box">
      <div class="breadcrumb"><a href="index.php">Home</a> >> <a href="index.php?control=trip">Our Trips</a> >> <a class="active" style="cursor:default;" href="#">Checkout</a></div>
    </div>
    <div class="tab_content_trip">
      <div class="page_heading">Checkout Info</div>
      <div class="trip_box_cont">
        <div class="trip_box trip_box_compare">
          <div id="st-accordion" class="st-accordion">
            <ul>
              <li id="stponeli"> <a id="stpone"><strong>step1:</strong> &nbsp;&nbsp;&nbsp;Schedule options<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'schedulestep.php'; ?>
              </li>
              <li id="stptwoli"> <a id="stptwo" ><strong>step2:</strong> &nbsp;&nbsp;&nbsp;Member Details<span class="st-arrow">Open or Close</span></a>
                 <?php require_once 'member.php'; ?>
              </li>
              <li id="stpthreeli"> <a id="stpthree" ><strong>step3:</strong> &nbsp;&nbsp;&nbsp;Booking<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'probooking.php'; ?>
              </li>
              <li id="stpfourli"> <a id="stpfour" ><strong>step4:</strong> &nbsp;&nbsp;&nbsp;Cart<span class="st-arrow">Open or Close</span></a>
                <?php require_once 'tripCart.php'; ?>
              </li>
             
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>