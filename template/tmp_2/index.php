<?php
	$db->Query("SELECT * FROM adverties WHERE status =  '1' AND category =  'bottom' and rand() ");
	$bottom_adver = $db->fetchArray();
?>
<?php  //$db->setCTitle('KKKKK');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $db->getTitle();?></title>
<!--<link href="<?php echo $tmp;?>/css/main.css" rel="stylesheet" type="text/css" />-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/main.css");</style>
<!--<link href="<?php echo $tmp;?>/css/font.css" rel="stylesheet" type="text/css" />-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/font.css");</style>
<!--common jquery-->

<script type="text/javascript" src="<?php echo $tmp;?>/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $tmp;?>/js/common.js"></script>
<!--//common jquery-->

<!--quick cart-->
<!--<link href="<?php echo $tmp;?>/css/slideout.css" rel="stylesheet" type="text/css" />-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/slideout.css");</style>
<!--// quick cart-->

<!--stylish select-->
<!--<link href="<?php echo $tmp;?>/css/jquery.selectbox.css" type="text/css" rel="stylesheet" />-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/jquery.selectbox.css");</style>
<!--<script type="text/javascript" src="js/select/jquery-1.7.2.min.js"></script>-->
<script type="text/javascript" src="<?php echo $tmp;?>/js/select/jquery.selectbox-0.2.js"></script>


<!--//stylish select-->

<!--navigation-->
<!--<link href="<?php echo $tmp;?>/css/nav.css" type="text/css" rel="stylesheet" />-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/nav.css");</style>
<!--//navigation-->

<!--plan your trip-->
<link href="<?php echo $tmp;?>/css/slide.css" type="text/css" rel="stylesheet" />
<style type="text/css">@import url("<?php echo $tmp;?>/css/slide.css");</style>
<script type="text/javascript" src="<?php echo $tmp;?>/js/slide.js"></script>
<!--//plan your trip-->

<!--custom select search-->
<!--<link rel="stylesheet" href="<?php echo $tmp;?>/css/search/jquery.jscrollpane.css">
<link rel="stylesheet" href="<?php echo $tmp;?>/css/search/customSelectBox.css">-->

<style type="text/css">@import url("<?php echo $tmp;?>/css/search/jquery.jscrollpane.css");</style>
<style type="text/css">@import url("<?php echo $tmp;?>/css/search/customSelectBox.css");</style>
<script src="<?php echo $tmp;?>/js/search/jScrollPane.js"></script> 
<script src="<?php echo $tmp;?>/js/search/jquery.mousewheel.js"></script> 
<script src="<?php echo $tmp;?>/js/search/SelectBox.js"></script> 
<script>	
	$(function() {
			window.prettyPrint && prettyPrint()

			/*
				This is how initialization normally looks. 
				Typically it's just $("select.custom"), but to make this example more clear 
				I'm breaking from the pattern and excluding interactive
			*/
			$("select.custom").not(".interactive").each(function() {					
				var sb = new SelectBox({
					selectbox: $(this),
					height: 150,
					width: 200
				});
			});
			var country_SB = null, 
				city_SB = null;

		});
		</script>
<!--//custom select search-->        

<!--date picker--> 
<script src="<?php echo $tmp;?>/js/date/jquery-ui.js"></script>
<!--<link rel="stylesheet" href="<?php echo $tmp;?>/css/date/demos.css">
<link rel="stylesheet" href="<?php echo $tmp;?>/css/date/jquery.ui.datepicker.css">
<link rel="stylesheet" href="<?php echo $tmp;?>/css/date/jquery-ui.css">-->
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/demos.css");</style>
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/jquery.ui.datepicker.css");</style>
<style type="text/css">@import url("<?php echo $tmp;?>/css/date/jquery-ui.css");</style>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
	});
</script>  
<!--// date picker--> 
<!--//custom select search-->    

    
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class=""> <!--<![endif]-->

<!-- include jQuery + carouFredSel plugin -->
		<!--<link rel="stylesheet" href="<?php echo $tmp;?>/css/carousel.css">-->
        <style type="text/css">@import url("<?php echo $tmp;?>/css/carousel.css");</style>
		<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.carouFredSel-6.2.0-packed.js"></script>
		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo $tmp;?>/js/carousel/jquery.ba-throttle-debounce.min.js"></script>

		<!-- fire plugin onDocumentReady -->
       
		<script type="text/javascript" language="javascript">
			$(function() {
				
				"use strict";
				// Detecting IE
				var oldIE;
				if ($('html').is('.ie7')) {
					oldIE = true;
				}
			
				if (oldIE) {
					$('#foo2').carouFredSel({
						circular: false,
						auto: false,
						prev: '#prev2',
						next: '#next2',
						pagination: "#pager2",
						scroll: 1,
						mousewheel: true,
						swipe: {
							onMouse: true,
							onTouch: true
						}
				   });
				}
				else {
					$('#foo2').carouFredSel({
						circular: false,
						auto: 3000,
						prev: '#prev2',
						next: '#next2',
						pagination: "#pager2",
						scroll: 1,
						mousewheel: true,
						swipe: {
							onMouse: true,
							onTouch: true
						}
				    });
				}
			});
		</script>
<!----------------------counter------------------------->
<!--<script type="text/javascript" src="js/jquery-1.6.4.js"></script>-->
<script type="text/javascript" src="<?php echo $tmp;?>/js/count/countdown.js"></script>
	<!--<link rel="stylesheet" href="<?php echo $tmp;?>/css/count.css">-->
    <style type="text/css">@import url("<?php echo $tmp;?>/css/count.css");</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".countdown").countdown({
				date: "23 november 2013 1:50:30", // add the countdown's end date (i.e. 3 november 2012 12:00:00)
				format: "on" // on (03:07:52) | off (3:7:52) - two_digits set to ON maintains layout consistency
			},
			function() { 
				// the code here will run when the countdown ends
				alert("done!") 
			});
		});
	</script>
<!----------------------End counter------------------------->  

</head>

<body class="hasJS" data-twttr-rendered="true">
<div id="wrapper">
<!--top_bar-->
    <div id="top_cont">
      <div class="top_strip">
        <!--cart quick view-->
        <div class="q_container" id="qc1">
          <a href="#" class="question">
           SHOPPING: &nbsp;Cart Total: <span class="quick_price"> &nbsp;118.35 THB</span>
          </a>
          <div class="clr"></div>
          <div class="answer" id="a1">
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" colspan="5"><span class="q_cart_heading">RECENTLY ADDED ITEM(S)</span></td>
                  </tr>
                  <tr>
                    <td><a href="#" class="prod_q_cart"><img src="<?php echo $tmp;?>/images/cart_img1.png" width="64" height="36" /></a></td>                    
                    <td class="prod_q_heading">1900 ES</td>
                    <td class="q_qty">1x</td>
                    <td class="prod_q_price">5,000 THB</td>
                    <td><a href="#" class="q_close"><img src="<?php echo $tmp;?>/images/q_close.png" width="16" height="15" /></a></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="bot_border">&nbsp;</td>
                  </tr> 
                  <tr>
                    <td><a href="#" class="prod_q_cart"><img src="<?php echo $tmp;?>/images/cart_img1.png" width="64" height="36" /></a></td>
                    <td class="prod_q_heading">1900 ES</td> 
                    <td class="q_qty">1x</td>
                    <td class="prod_q_price">5,000 THB</td>
                    <td><a href="#" class="q_close"><img src="<?php echo $tmp;?>/images/q_close.png" width="16" height="15" /></a></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="bot_border">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" colspan="5">
                    	<div class="f_left prod_q_heading">Shipping</div><div class="f_right prod_q_price">1,000 THB</div>
                        <div class="clr"></div>
                        <div class="f_left prod_q_heading">Total</div><div class="f_right prod_q_price">11,000 THB</div>
                    </td>   
                  </tr>
                  <tr>
                    <td colspan="5" class="bot_border">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top" colspan="5" height="23">
                    	<div class="f_left"><a href="checkout.html" class="q_checkout_btn">Checkout</a></div><div class="f_right"><a href="cart.html" class="q_viewcart_btn">View Cart</a></div>
                    </td>   
                  </tr>
                </table>
          </div>
        </div>
        <!--// cart quick view-->
        
        <!--support-->
        <div class="support">SUPPORT: +444 (100) 1234 </div>
        <!--// support-->
        
        <!--language currency-->
        <div class="curr_lang f_right">
          <div class="lang f_left"><span class="f_right">
            <select name="country_id" id="country_id" tabindex="1">
            <option value="1">English</option>
            <option value="2">Thai</option>
            <option value="3">French</option>
          </select>
            </span> </div>
          <div class="curr f_right"><span class="f_right">
            <select name="country_id" id="country_id_currency" tabindex="1">
            <option value="2">$ USD</option>
            <option value="3">&#8364; Euro</option>
            <option value="4">&pound; Pound</option>
          </select>
          </span> </div>
        </div>
        <!--// language currency-->
      </div>
    </div>
<!--// top_bar-->

<!--Header-->
<div id="header_cont">
	<div class="header">
    	<div class="logo f_left"><a href="#"><img src="<?php echo $tmp;?>/images/logo.png" width="127" height="77" /></a></div>
        <div class="f_right r_nav">
          <ul>
            <li><a href="#">Wishlist</a></li>
            <li><a href="#">My Account</a></li>
            <li class="last">Welcome visitor you can <a href="#">login</a> or <a href="#">create an account</a>.</li>
          </ul>
       </div>
    </div>
    <div id="navigation_cont">
  <div class="navigation">
   <!--navigation-->
    <nav id="primary-nav" class="clearfix-mobile">
      <ul class="clearfix-mobile">
      <li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550"><a href="http://www.regalboats.com/tour-regal/ ">Home</a></li>
      <li>
      <a href="#">Our Boats</a>
      
      <ul class="categories sub-menu">
        <li class="boat-category ">
          <a href="#">Bowrider</a>
          <div class="models">
              <div class="pat">
               <!-- <p class="description">Daytime watersports and leisure meets unmatched performance from a full line of refined bowriders.</p>-->
                
                <ul>
                  <li>
                    <a href="#">
                    
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <div class="title">1900</div>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  
                  </ul>
                  </div>
            </div>
          </li>
        <li class="boat-category ">
          <a href="#">Cuddy</a>
          <div class="models">
              <div class="pat">
               <!-- <p class="description">Daytime watersports and leisure meets unmatched performance from a full line of refined bowriders.</p>-->
                
                <ul>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <div class="title">19001</div>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  
                  </ul>
                  </div>
            </div>
          </li>
        <li class="boat-category ">
          <a href="#">Deck Boat</a>
          
          <div class="models">
              <div class="pat">
               <!-- <p class="description">Daytime watersports and leisure meets unmatched performance from a full line of refined bowriders.</p>-->
                
                <ul>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <div class="title">1900</div>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                
                  
                  </ul>
                  </div>
            </div>
          </li>
        <li class="boat-category ">
          <a href="#">Express Cruiser</a>
          
          <div class="models">
              <div class="pat">
               <!-- <p class="description">Daytime watersports and leisure meets unmatched performance from a full line of refined bowriders.</p>-->
                
                <ul>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <div class="title">1900</div>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                   <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  </ul>
                  </div>
            </div>
          </li>
        <li class="boat-category ">
          <a href="#">Sport Coupe</a>
          
          <div class="models">
              <div class="pat">
               <!-- <p class="description">Daytime watersports and leisure meets unmatched performance from a full line of refined bowriders.</p>-->
                
                <ul>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <div class="title">1900</div>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li>
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  <li class="last">
                    <a href="#">
                      <img class="boat_img" width="160" height="79" src="<?php echo $tmp;?>/images/boat1.png" class="attachment-thumbnail-boat-profile wp-post-image" alt="1900" title="1900" />																			              			  <h5 class="title">1900</h5>
                      <span class="excerpt">The 1900 instills pure simplicity, versatility and thrill into a bantam boat.</span>
                      <span class="discover">Discover More</span>
                      </a>
                    </li>
                  
                  </ul>
                  </div>
            </div>
          </li>
        <li style="float:right;" class="fleet-search">
          <a href="#">Fleet Search</a>
          </li>
        </ul>
      </li>
        
      <li id="menu-item-1709" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1709"><a href="#">Our Trips</a>
      <ul class="sub-menu">
        <li id="menu-item-545" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-545"><a href="#">A Family Company</a></li>
        <li id="menu-item-546" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-546"><a href="#">Regal Innovations</a></li>
        <li id="menu-item-547" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-547"><a href="#">World Class Standards</a></li>
        <li id="menu-item-548" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-548"><a href="#">Ownership Experience</a></li>
        <li id="menu-item-549" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-549"><a href="#">Builder Program</a></li>
        </ul>
      </li>
      <li id="menu-item-538" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-538"><a href="#">Products</a>
      <ul class="sub-menu">
        <li id="menu-item-1643" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1643"><a href="#">Events</a></li>
        <li id="menu-item-540" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-540"><a href="#">Owners</a></li>
        <li id="menu-item-541" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-541"><a href="#">Share Your Story</a></li>
        <li id="menu-item-543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-543"><a href="#">Tips &amp; Safety</a></li>
        <li id="menu-item-15180" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15180"><a href="#">Sportswear</a></li>
        </ul>
      </li>
      <li id="menu-item-550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-550"><a href="#">Why iDiveTrips</a></li>
       
        </ul>
    </nav>
    <div class="pick_trip"><img src="<?php echo $tmp;?>/images/plan_trip.png" width="201" height="22" /></div>
    <div id="toppanel">
	<div id="panel">
      <div class="pat">
        <div class="content clearfix">
        	<table class="search_select" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                    <select name="country1" class="custom">
                      <option>Select a Country</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select>
          		</td>
                <td width="33">&nbsp;</td>
                <td>
                	<select name="Trips" class="custom">
                      <option>Select a Trip</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td><select name="Origin" class="custom">
                      <option>Select Origin</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select></td>
                <td>&nbsp;</td>
                <td><select name="Trips" class="custom">
                      <option>Select Destination</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select></td>
              </tr>
              <tr>
                <td><input class="date" id="datepicker" name="" type="text" placeholder="Departure Date" /></td>
                <td>&nbsp;</td>
                <td><input class="date" id="datepicker1" name="" type="text" placeholder="Return Date" /></td>
              </tr>
              <tr>
                <td><select name="price min" class="custom">
                      <option>Price from: Min</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select></td>
                <td>&nbsp;</td>
                <td><select name="price max" class="custom">
                      <option>Price from: Max</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                    </select></td>
              </tr>
              <tr>
                <td class="last" colspan="3"><a href="#" class="trip_btn"><img src="<?php echo $tmp;?>/images/find_trip_btn.png" width="116" height="33" /></a></td>
              </tr>
            </table>
        </div>
      </div>
    </div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li id="toggle">
				<a id="open" class="open" href="#"></a>
				<a id="close" style="display: none;" class="close" href="#"></a>			
			</li>
			
		</ul> 
	</div> <!-- / top -->
	
</div>
    <!--//navigation-->
  </div>
</div>
</div>

<div id="home-flexslider" class="clearfix" style="position:relative;">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <!--<div class="desc-wrap">
                    <div class="slide-description">
                        <h3><a href="#">15421 Southwest 39th Terrace</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&hellip;</p>
                        <span>$3,850 Per Month</span>
                        <a href="#" class="know-more">Know More</a>
                    </div>
                </div>-->
                <img src="<?php echo $tmp;?>/images/temp-images/slider-image.jpg" alt="15421 Southwest 39th Terrace">
            </li>
            <li>
                <!--<div class="desc-wrap">
                    <div class="slide-description">
                        <h3><a href="#">1200 Anastasia Avenue, Coral Gables</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&hellip;</p>
                        <span>$625,000 </span>
                        <a href="#" class="know-more">Know More</a>
                    </div>
                </div>-->
                <img src="<?php echo $tmp;?>/images/temp-images/slider-image1.jpg" alt="1200 Anastasia Avenue, Coral Gables">
            </li>
            <li>
                <!--<div class="desc-wrap">
                    <div class="slide-description">
                        <h3><a href="#">1200 Anastasia Avenue, Coral Gables</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&hellip;</p>
                        <span>$625,000 </span>
                        <a href="#" class="know-more">Know More</a>
                    </div>
                </div>-->
               <img src="<?php echo $tmp;?>/images/temp-images/slider-image2.jpg" alt="1200 Anastasia Avenue, Coral Gables">
            </li>
            <li>
                <!--<div class="desc-wrap">
                    <div class="slide-description">
                        <h3><a href="#">1200 Anastasia Avenue, Coral Gables</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&hellip;</p>
                        <span>$625,000 </span>
                        <a href="#" class="know-more">Know More</a>
                    </div>
                </div>-->
                <img src="<?php echo $tmp;?>/images/temp-images/slider-image3.jpg" alt="1200 Anastasia Avenue, Coral Gables">
            </li>
            <li>
                <!--<div class="desc-wrap">
                    <div class="slide-description">
                        <h3><a href="#">1200 Anastasia Avenue, Coral Gables</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut&hellip;</p>
                        <span>$625,000 </span>
                        <a href="#" class="know-more">Know More</a>
                    </div>
                </div>-->
                <img src="<?php echo $tmp;?>/images/temp-images/slider-image4.jpg" alt="1200 Anastasia Avenue, Coral Gables">
            </li>

        </ul>
        
    </div>
    
</div>
   <div class="link_box">
	  <div class="boxes"><a href="http://favme.me/"><img src="<?php echo $tmp;?>/images/upcoming_trips.png" width="310" height="131" /></a></div>
      <div class="boxes"><a href="#"><img src="<?php echo $tmp;?>/images/popular_boats.png" width="310" height="131" /></a></div>
      <div class="boxes last"><a href="#"><img src="<?php echo $tmp;?>/images/popular_trips.png" width="310" height="131" /></a></div>
    </div> 
    <div class="clr"></div>
     <div id="last_book_cont">
	<div class="last_book">
    <div class="clr"></div>
		<div class="list_carousel">
       		<div class="heading"><span>Last Minute Trips</span></div>
				<ul id="foo2">
					<li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
					<li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                             <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
                    <li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
                    <li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
                    <li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
                    <li>
                    	<img src="<?php echo $tmp;?>/images/deal1.png" width="465" height="197" />
                        <div class="caption">4D/4N Similan Islands, Koh Bon, Koh Tachai, Richelieu Rock</div>
                        <div class="count_container">
                       		<div class="trip_text">THIS TRIP WILL EXPIRE IN</div>
                          <div class="counter">
                            <ul class="countdown">
                              <li>
                                <span class="days1"></span>
                                <span class="days2"></span>
                                <p class="timeRefDays">Days</p>
                               </li> 
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="hours1"></span>
                                 <span class="hours2"></span>
                                <p class="timeRefHours">Hours</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="minutes1"></span>
                               <span class="minutes2"></span>
                                <p class="timeRefMinutes">Minutes</p>
                               </li>
                               <li class="colon"><span><img src="<?php echo $tmp;?>/images/colon.png" width="4" height="12" /></span> </li>
                              <li>
                                <span class="seconds1"></span>
                                <span class="seconds2 last"></span>                                
                                <p class="timeRefSeconds">Seconds</p>
                               </li>
                              </ul>
                            </div>
                            <div class="readmore"><a href="#">Read More</a></div>
                        </div>
                    </li>
					
				</ul>
				<div class="clearfix"></div>
				<a id="prev2" class="prev" href="#"><img src="<?php echo $tmp;?>/images/prev.png" width="25" height="25" /></a>
				<a id="next2" class="next" href="#"><img src="<?php echo $tmp;?>/images/next.png" width="25" height="25" /></a>
		  
			</div>
	</div>
</div>
<div id="footer_cont">
	<div class="footer">
    	<div class="f_navigation f_left">
        	<ul>
            	<li><a href="#">CURRENT iDIVE PROMOTION</a></li>
                <li><a href="#">FEATURED BOAT</a></li>
                <li><a href="#">A FAMILY COMPANY</a></li>
                <li><a href="#">iDIVE COMMUNITY</a></li>
                <li><a href="#">iDIVE TOUR</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="#">MEDIA</a></li>
            </ul>
        </div>
      <div class="f_trips f_left">
      		<h2>Liveabords</h2>
            <div class="liveabords">
            	<ul>
                	<li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                    <li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                    <li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                </ul>
            </div><br />

            <h2>Day Trips</h2>
            <div class="liveabords">
            	<ul>
                	<li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                    <li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                    <li><a href="#"><img src="<?php echo $tmp;?>/images/f_live1.png" width="90" height="47" /></a></li>
                </ul>
            </div>
      </div>
        <div class="f_news f_right last">
        	<h2>Monthly E-News Letter</h2>
            <p>Subscribe to our newsletter and get exclusive deals you won't find anywhere.</p>
            <input class="txt_box" name="" placeholder="E-mail ID here" type="text" />
            <div class="clr"></div>
            <a href="#" class="sub_btn">Submit</a>
            <div class="clr"></div>
            <div class="alert_red">Please enter a valid E-mail Address</div>
            <div class="alert_green">Thanks, your address has been added</div>
        </div>
    </div>
</div>
<div id="copy_cont">
	<div class="copy">
    	<p class="copyright f_left">©2013 iDiveTrips. All right reserved.</p>
        <p class="copy_nav f_left">
         <a href="#">About iDiveTrips</a>   |   <a href="#">Contact a Dealer</a>   |   <a href="#">Terms of Use</a>   |   <a href="#">Privacy Policy</a>   |   <a href="#">Sitemap</a>
		</p>
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
<!--Parallax-->
<script src="<?php echo $tmp;?>/js/flexslider/jquery.flexslider.js"></script>
<link href="<?php echo $tmp;?>/js/flexslider/flexslider.css" rel="stylesheet" media="all">
<script>
jQuery(document).ready(function(){
    if(jQuery().flexslider)
    {
        // Flex Slider for Homepage
        $('#home-flexslider .flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 7000,
            animationSpeed:	1500,
            directionNav: true,
            controlNav: false,
            keyboardNav: true
        });

        // Remove Flex Slider Navigation for Smaller Screens Like IPhone Portrait
    $('.slider-wrapper , .listing-slider').hover(function(){
        var mobile = $('body').hasClass('probably-mobile');
        if(!mobile)
        {
            $('.flex-direction-nav').stop(true,true).fadeIn('slow');
        }
    },function(){
        $('.flex-direction-nav').stop(true,true).fadeOut('slow');
    });

    // Flex Slider for Detail Page
    $('#property-detail-flexslider .flexslider').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav: "thumbnails"
    });

    // Flex Slider Gallery Post
    $('.listing-slider ').flexslider({
        animation: "slide"
    });

}
});
</script>
<!--//Parallax-->
</body>
</html>
