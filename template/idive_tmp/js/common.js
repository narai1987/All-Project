// JavaScript Document

<!--quick cart-->
$(document).ready(function() {
		$('.answer').css('z-index','100000');
		$('#qc1').hover(
			function (){
				$(this).find('.answer').slideDown(300);
				$('.question').css('color','#fbc012');
			}, 
			function () {
				$(this).find('.answer').slideUp(300);
				$('.question').css('color','#ffffff');
			}
		);
	});
	
<!--// quick cart-->

<!--stylish select-->
	$(function () {
		$("#country_id").selectbox();
		$("#country_id_currency").selectbox();
		
		
	});
<!--//stylish select-->

/*----------last minute carousel-------------*/
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
});
/*----------//last minute carousel-------------*/

			
/*-----------parallex slider----------------*/			
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
/*-----------//parallex slider----------------*/
<!--date picker--> 
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
	});
<!--// date picker--> 

<!--smooth scroll--> 
jQuery(document).ready(function(cash) {
      $('a.button_wishlist, .button_compare, .button').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();  
<!--//smooth scroll--> 


<!--trip detail carousel + pirobox--> 

$(document).ready(function () {
		
		//jCarousel Plugin
	    $('#carousel').jcarousel({
			vertical: false,
			scroll: 1,
			auto: false,
			wrap: 'last',
			initCallback: mycarousel_initCallback
	   	});
	//Front page Carousel - Initial Setup
   	$('div#slideshow-carousel a img').css({'opacity': '0.5'});
   	$('div#slideshow-carousel a img:first').css({'opacity': '1.0'});
   	$('div#slideshow-carousel li a:first').append('<span class="arrow"></span>')

  
  	//Combine jCarousel with Image Display
    $('div#slideshow-carousel li a').hover(
       	function () {
        		
       		if (!$(this).has('span').length) {
        		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
   	    		$(this).stop(true, true).children('img').css({'opacity': '1.0'});
       		}		
       	},
       	function () {
        		
       		$('div#slideshow-carousel li a img').stop(true, true).css({'opacity': '0.5'});
       		$('div#slideshow-carousel li a').each(function () {

       			if ($(this).has('span').length) $(this).children('img').css({'opacity': '1.0'});

       		});
        		
       	}
	).click(function () {

	      	$('span.arrow').remove();        
		$(this).append('<span class="arrow"></span>');
       	$('div#slideshow-main li').removeClass('active');        
       	$('div#slideshow-main li.' + $(this).attr('rel')).addClass('active');	
        	
       	return false;
	});
	
	//pirobox start
	
	
	$().piroBox({
			my_speed: 1000, //animation speed
			bg_alpha: 0.3, //background opacity
			slideShow : true, // true == slideshow on, false == slideshow off
			slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
			close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox

	});
	//pirobox end
});
//Carousel Tweaking

function mycarousel_initCallback(carousel) {
	
	// Pause autoscrolling if the user moves with the cursor over the clip.
	carousel.clip.hover(function() {
		carousel.stopAuto();
	}, function() {
		carousel.startAuto();
	});
}
<!--//trip detail carousel + pirobox--> 


<!--scrollbar--> 
(function($){
			$(window).load(function(){
				$("#content_0").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
				$("#content_1").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
				$("#content_2").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);
		
<!--//scrollbar--> 