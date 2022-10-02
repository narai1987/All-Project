<?php
	$db->Query("SELECT * FROM adverties WHERE status =  '1' AND category =  'bottom' and rand() ");
	$bottom_adver = $db->fetchArray();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iDive Trips</title>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/alertmessage.css");
</style>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/main.css");
</style>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/checkout.css");
</style>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/font.css");
</style>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/paging.css");
</style>
<!--common jquery-->

<script type="text/javascript" src="<?php echo $tmp;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/js/common.js"></script>
<!--//common jquery-->

<!--quick cart-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/slideout.css");
</style>
<!--// quick cart-->

<!--stylish select-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/jquery.selectbox.css");
</style>
<script type="text/javascript" src="<?php echo $tmp;?>/js/select/jquery.selectbox-0.2.js"></script>
<!--//stylish select-->

<!--navigation-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/nav.css");
</style>

<!--//navigation-->

<!--custom select search-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/search/customSelectBox.css");
</style>
<script src="<?php echo $tmp;?>/js/search/jquery.custom-select.js"></script>
<script type="text/javascript">
	$(function(){
		$('.select').CustomSelect();
	});
</script>
<!--//custom select search-->

<!--plan your trip-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/slide.css");
</style>
<script type="text/javascript" src="<?php echo $tmp;?>/js/slide.js"></script>
<!--//plan your trip-->

<!--Parallax-->
<script src="<?php echo $tmp;?>/js/flexslider/jquery.flexslider.js"></script>
<style type="text/css">
@import url("<?php echo $tmp;?>/js/flexslider/flexslider.css");
</style>
<!--//Parallax-->

<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="">
<!--<![endif]-->

<!-- last minute booking carousel -->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/carousel.css");
</style>
<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.carouFredSel-6.2.0-packed.js"></script>
<!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.transit.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.ba-throttle-debounce.min.js"></script>
<!-- //last minute booking carousel -->

<!----------------------counter----------------------------->
<!--<script type="text/javascript" src="js/count/jquery-1.6.4.js"></script>-->
<script type="text/javascript" src="<?php echo $tmp;?>/js/count/countdown.js"></script>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/count.css");
</style>
<!----------------------End counter------------------------->

<!------alert popup------->
<link rel="stylesheet" href="<?php echo $tmp;?>/css/alertbox/alertbox.css" type="text/css" media="screen" />
<script src="<?php echo $tmp;?>/js/alertbox/popup.js" type="text/javascript"></script>
<!------// alert popup------->

<!--date picker-->
<script src="<?php echo $tmp;?>/js/date/jquery-ui.js"></script>
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/demos.css");</style>
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/jquery.ui.datepicker.css");</style>
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/jquery-ui.css");</style>
<!--// date picker-->

<!--SEARCH BOX JAVASCRIPT START HERE-->
<script type="text/javascript" src="assets/javascript/search.js"></script>

<!--SEARCH BOX JAVASCRIPT END HERE-->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==for Our Trips page|=|=||=|=||=|=||=|=||=|=||=|=|-->

<!--trip tabs-->
<style type="text/css">
@import url("<?php echo $tmp;?>/css/tabs/general.css");
</style>
<style type="text/css">
@import url("<?php echo $tmp;?>/css/tabs/tabs.css");
</style>
<script type="text/javascript" src="<?php echo $tmp;?>/js/tabs.js"></script>
<!--//trip tabs-->
<!-----------------------------Smooth scroll-------------------------------------->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> -->
<script src="<?php echo $tmp;?>/js/smoothscroll/jquery.smooth-scroll.min.js"></script>
<!-----------------------------// Smooth scroll-------------------------------------->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==////for Our Trips page|=|=||=|=||=|=||=|=||=|=||=|=|-->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==for trip detail page |=|=||=|=||=|=||=|=||=|=||=|=|-->

<!--gallery +  pirobox-->
<script type="text/javascript" src="<?php echo $tmp;?>/js/detail/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/js/detail/pirobox.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/js/detail/pirobox.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/css/detail/jquery.jcarousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/css/detail/skin.css" />
<link href="<?php echo $tmp;?>/css_pirobox/demo5/style.css" class="piro_style" media="screen" title="white" rel="stylesheet" type="text/css" />

<!--//gallery +  pirobox-->

<!-------------------------------scrollbar-------------------------------------->
<link href="<?php echo $tmp;?>/css/scrollbar.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $tmp;?>/js/scrollbar/jquery.mousewheel.min.js"></script>
<script src="<?php echo $tmp;?>/js/scrollbar/jquery.mCustomScrollbar.js"></script>
<!-----------------------------end scrollbar-------------------------------------->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==/////for trip detail page |=|=||=|=||=|=||=|=||=|=||=|=|-->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==for checkout page |=|=||=|=||=|=||=|=||=|=||=|=|-->

<!--accordion-->
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/css/accordion.css" />
<script type="text/javascript" src="<?php echo $tmp;?>/js/accordion/jquery.accordion.js"></script>
<script type="text/javascript" src="<?php echo $tmp;?>/js/accordion/jquery.easing.1.3.js"></script>
<script type="text/javascript">
	
</script>
<!--// accordion-->

<!--=|=|=|=|=|=|=|=|=||=|=||=|==//////////for checkout page |=|=||=|=||=|=||=|=||=|=||=|=|-->
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo $tmp;?>/css/myanimate.css">
</head>

<body class="hasJS has-js" >
<!--<div id="loader">-->
    	<!--<div class="circle">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>-->
       <!-- <div class="ba">
        	<div class="ball"></div>
			<div class="ball1"></div>
         </div>-->
        <!-- <div class="bar">
   	 <i class="sphere"></i>
		</div>
         
         
</div>-->
<div id="wrapper"> 
  <!--top_bar-->
  <div id="top_cont">
    <?php include_once("includes/topheader.php"); ?>
  </div>
  <!--// top_bar--> 
  
  <!--Header--> 
  
  <script type="text/javascript">
//setTimeout("closeMsg('closeid2')",5000);
function closeMsg(clss) {
		document.getElementById(clss).className = "clspop";
	}
</script> 
  <!--for alert message start-->
  <style type="text/css">
.clspop {
	display:none;	
}
		.darkbase_bg {
			display:block !important;
			
		}
		
</style>
  <!--POPUP MESSAGE-->
  <?php
      if (isset($_SESSION['error']))
{
?>
  <div id="flashMessage" class="message">
    <div  class='darkbase_bg' id='closeid2'>
      <div class='alert_green' > <a class='pop_close'> <img src="<?php echo $tmp;?>/css/msgimage/close.png" onclick="closeMsg('closeid2')" title="close" /> </a>
        <div class='pop_text <?php echo $_SESSION['errorclass']; ?>'><!--warn_red-->
          <p style='color:#063;'><?php echo $_SESSION['error']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php  
  unset($_SESSION['error']);
  unset($_SESSION['errorclass']);
  }?>
  <!--POPUP MESSAGE CLOSE-->
 
  <div id="header_cont">
    <div class="header">
    <!--ONLY DUMMY FILE-->
	<?php //include_once("includes/spider.php"); ?>
    <!--ONLY DUMMY FILE-->
    
    
     <div class="logo f_left"><a href="index.php"><img src="<?php echo $tmp;?>/images/logo.png" width="127" height="77" /></a> 


</div>
      <div class="f_right r_nav">
        <?php include_once("includes/topmenu.php");?>
      </div>
    </div>
    <div id="navigation_cont">
      <div class="navigation"> 
        <!--navigation-->
        <?php include_once("includes/menu.php");?>
        <div class="pick_trip"><img src="<?php echo $tmp;?>/images/plan_trip.png" width="201" height="22" /></div>
        <?php include_once("includes/search.php");?>
        <!--//navigation--> 
      </div>
    </div>
  </div>
  <?php if(!$_REQUEST['control'])
include_once("includes/slider.php");?>
  <!--controller start here-->
  <?php if($_REQUEST['control'])
//include_once("includes/testcont.php");?>
  <?php include_once('controller.php'); ?>
  <!--controller end here-->
  <?php 
if($_REQUEST['control']) {
	?>
  <style type="text/css">
		/*.link_box {
			top:180px !important;
			height:300px;
			position:relative;
		}*/
	</style>
  <?php
}
include_once("includes/lastminut.php");
?>
  <div class="clr"></div>
  <?php 
	 if(!$_REQUEST['control'])
	 include_once('includes/lastMinutTrip.php');?>
  <div id="footer_cont">
    <div class="footer" data-animated="bounceIn">
      <div class="f_navigation f_left">
        <ul>
          <?php //print_r($menus);
foreach($footermenus as $footermenu) {?>
          <li><a href="<?php echo $footermenu['link'];?>"><?php echo $footermenu['title'];?></a></li>
          <?php } ?>
         <!-- <li><a href="#">FEATURED BOAT</a></li>
          <li><a href="#">A FAMILY COMPANY</a></li>
          <li><a href="#">iDIVE COMMUNITY</a></li>
          <li><a href="#">iDIVE TOUR</a></li>
          <li><a href="#">CONTACT</a></li>
          <li><a href="#">NEWS</a></li>
          <li><a href="#">MEDIA</a></li>-->
        </ul>
      </div>
      <div class="f_trips f_left">
        <h2><?php echo $taxonomy['liveabords'];?></h2>
        <div class="liveabords">
          <ul>
          <?php foreach($LiveAboards AS $LiveAboard): ?>
            <li><a href="index.php?control=tripdetail&trip_id=<?php echo $LiveAboard->trip_id; ?>&schId=<?php echo $LiveAboard->schedule_id; ?>"><img src="admin/<?php echo $LiveAboard->tripImage; ?>" width="90" height="47" /></a></li>
          <?php endforeach; ?>
          </ul>
        </div>
        <br />
        <h2><?php echo $taxonomy['day_trips'];?></h2>
        <div class="liveabords">
          <ul>
          <?php foreach($DayTrips AS $DayTrip): ?>
            <li><a href="index.php?control=tripdetail&trip_id=<?php echo $DayTrip->trip_id; ?>&schId=<?php echo $DayTrip->schedule_id; ?>"><img src="admin/<?php echo $DayTrip->tripImage; ?>" width="90" height="47" /></a></li>
          <?php endforeach; ?>
          </ul>
        </div>
      </div>
    
	  
    <!--<script type="text/javascript" src="<?php echo $tmp;?>/js/jquery-1.6.1.min.js"></script>-->
    <!--<script type="text/javascript" src="<?php echo $tmp;?>/js/jquery.easyui.min.js"></script>-->
    <script src="<?php echo $tmp;?>/js/jquery_ajax_data.js"></script>
      <div class="f_news f_right last">
        <h2><?php echo $taxonomy['monthly_e-news_letter'];?></h2>
        <p><?php echo $taxonomy['subscribe_to_our_newsletter_and_get_exclusive_deals_you_wont_find_anywhere'];?></p>
        <form name="ajax_newsletter_form" id="ajax_newsletter_form" action="ajax.php?control=myaccount&task=newsletter" method="POST" onsubmit="return newsLetterClick()">
        <input class="txt_box" name="email" placeholder="<?php echo $taxonomy['e-mail_id_here'];?>" type="text" />       
        <div class="clr"></div>
        <input type="submit" value="<?php echo $taxonomy['submit'];?>" class="sub_btnsubmit"></input>
        </form>
        <div class="clr"></div>
      
      </div>
    </div>
  </div>
  <div id="copy_cont">
    <div class="copy">
      <p class="copyright f_left">©2013 iDiveTrips. <?php echo $taxonomy['all_right_reserved'];?>.</p>
      <p class="copy_nav f_left"> 
      
       <?php //print_r($bottomfootermenus);
foreach($bottomfootermenus as $bottomfootermenu) {?>
          <a href="<?php echo $bottomfootermenu['link'];?>"><?php echo $bottomfootermenu['title'];?></a> |
          <?php } ?>
      
     <!-- <a href="#">About iDiveTrips</a> | <a href="#">Contact a Dealer</a> | <a href="#">Terms of Use</a> | <a href="#">Privacy Policy</a> | <a href="#">Sitemap</a>--> </p>
      <div class="social f_right">
        <ul class="f-icons">
          <li class="fb"><a href="#">Facebook</a> </li>
          <li class="tw"><a href="#">Twitter</a> </li>
          <li class="plus"><a href="#">Google Plus</a> </li>
          <li class="in"><a href="#">Linked In</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--// Header-->
<?php include_once("includes/login_pop.php"); ?>
<div id="backgroundPopup_login"></div>
<div id="divid"></div>
<!--stars-->
 
 <!--RATING JS-->
 <script type="text/javascript" src="<?php echo $tmp;?>/js/rate/jquery.raty.js"></script>
 <!--RATING JS-->
 
<!--// stars-->





<!--<script src="<?php echo $tmp;?>/scripts/jquery.min.js"></script>-->
<script src="<?php echo $tmp;?>/script/appear.js"></script>
<script src="<?php echo $tmp;?>/script/jquery.superfish.js"></script>
<script src="<?php echo $tmp;?>/script/custom.js"></script>
</body>
</html>
