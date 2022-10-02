(function($) {
	if(navigator.userAgent.match(/iPad/i)) {
		$('meta[name=viewport]').attr('content','user-scalable=yes, width=1000');
	}
	// else
	// 	$('meta[name=viewport]').attr('content','initial-scale=1.0, maximum-scale=1.0, user-scalable=no');

	$(document).ready(function() {
		$.cookie.json=true;
		$('.no-js').removeClass('no-js');
		$("a[rel=external]").attr('target','_blank');
		var url=encodeURIComponent(window.location.href);
		var fullimg=encodeURIComponent($('.gallery a').attr('href'));
		var pinterest_subject=encodeURIComponent($('.boat-title').text()+' Gallery: See bold styling, innovation and competitive spirit.');
		var twitter_subject=encodeURIComponent('Regal Boats: See what bold styling, innovation and competitive spirit of the '+$('.boat-title').text()+' looks like for yourself. Experience the gallery. ')+url;
		var email_subject=encodeURIComponent('Regal Boats - '+$('.boat-title').text()+' Gallery');
		var email_body=encodeURIComponent('Regal is for every exhilarating thrill above water. See what bold styling, innovation and competitive spirit of a true boat looks like for yourself. Experience the gallery. ')+url

		$('select').selectmenu({style:'popup'});
		$('#datepicker').datepicker();
		$('input[type=checkbox],input[type=radio]').tzCheckbox();

		$(window).bind('hashchange',function() {
			url=encodeURIComponent(window.location.href);
			if($('#fullResImage').length>0)
				fullimg=encodeURIComponent($('#fullResImage').attr('src'));
			var target=$('.pp_pic_holder .social');
			$('.pinterest',target).attr('href','http://pinterest.com/pin/create/button/?url='+url+'&media='+fullimg+'&description='+pinterest_subject);
			$('.facebook',target).attr('href','http://www.facebook.com/sharer/sharer.php?u='+url);
			$('.twitter',target).attr(	'href','https://twitter.com/intent/tweet?&text='+twitter_subject);
			$('.email',target).attr('href','mailto:?body='+email_body+'&subject='+email_subject);
		});

		// =======================
		// = Mobile / Navigation =
		// =======================
		$('<div/>').attr('id','show-nav').appendTo('#header').click(function(event) {
			$('#primary-nav').toggleClass('show');
			$(this).toggleClass('active');
		});

		if($('#product-nav').length>0) {
			$('#page .header').css({position:'relative',paddingBottom:20});
			$('<div/>').addClass('nav-tab').appendTo('#page .header').click(function(event) {
				$('#product-nav').toggleClass('show');
				$(this).toggleClass('active');
			}).css({position:'absolute',top:'auto',bottom:0,right:'5%'});
		}

		mobile_resize=function() {
			if($(window).width()<640) {
				$('body').addClass('mobile').removeClass('not-mobile');
				// $.supersized.vars.options.min_width=400;
				$('#supersized').css('top',$('#header').height());
			}
			else {
				$('body').removeClass('mobile').addClass('not-mobile');
				// $.supersized.vars.options.min_width=1800;
			}
		};
		mobile_resize();
		$(window).on('resize',mobile_resize);

		$('#primary-nav > ul > li > ul > li > a,#primary-nav > ul > li > a').hover(function(event) {
			var t=$(this).offset().top;
			if($('body').hasClass('mobile') && $(window).scrollTop()>t)
				$('html,body').stop().animate({scrollTop:t});
		});

		// Carousel stuff
		var style=$('<style/>').attr({type:'text/css',media:'screen'}).appendTo('head');
		$('#content .boats-overhead').each(function(i,item) {
			$(item).addClass('c-'+i);
			style.html(style.html()+'body.mobile #content .boats-overhead.c-'+i+' {width:'+134*$('li',item).length+'px}\n');
		});

		$('#content .boats-featured').each(function(i,item) {
			$(item).addClass('c-'+i);
			style.html(style.html()+'body.mobile #content .boats-featured.c-'+i+' {width:'+198*$('li',item).length+'px}\n');
		});

		// $('#color-select .mobile-carousel').each(function(i,item) {
		// 	var w=48*$('ul li',item).length;
		// 	$('ul',item).addClass('c-'+i);
		// 	style.html(style.html()+'body.mobile #color-select .mobile-carousel ul.c-'+i+' {width:'+w+'px}\n');
		// });

		// ============
		// = Homepage =
		// ============
		if($('body').hasClass('home')) {
			$.supersized({
				slide_interval:5000,
				transition:1,
				transition_speed:800,
				pause_hover:false,
				autoplay:true,

				slides:homepage_slides,

				min_width:1800,
				horizontal_center:true,
				vertical_center:false,
				fit_portrait:false,
				fit_landscape:true,
				fit_always:false
			});

			theme={
				beforeAnimation:function(direction) {
					next_caption();
				}
			};

			$('#splash-content li.active').fadeIn(0);
			var skip=true;
			next_caption=function() {
				if(!skip) {
					var curr=$('#splash-content li.active');
					var next=curr.next();
					if(next.length==0)
						next=$('#splash-content li:first');

					$(curr).stop().fadeOut(400,function() {
						$(this).removeClass('active');
						$(next).stop().fadeIn(400,function() {$(this).addClass('active');});
					});
				}
				else
					skip=false;
			};
		}

		// ===============
		// = Prettyphoto =
		// ===============
		var social='<ul class="social"> \
			<li> \
				<a href="http://pinterest.com/pin/create/button/?url='+url+'&media='+fullimg+'&description='+pinterest_subject+'" target="_blank" class="pinterest">Share on Pinterest</a> \
			</li> \
			<li> \
				<a href="http://www.facebook.com/sharer/sharer.php?u='+url+'" target="_blank" class="facebook">Share on Facebook</a> \
			</li> \
			<li> \
				<a href="https://twitter.com/intent/tweet?&text='+twitter_subject+'" target="_blank" class="twitter">Share on Facebook</a> \
			</li> \
			<li> \
				<a href="mailto:?body='+email_body+'&subject='+email_subject+'" class="email">Share via Email</a> \
			</li> \
		</ul>';
		$("a[rel^='prettyPhoto']").prettyPhoto({
			overlay_gallery:false,
			theme:'dark_square',
			show_title:false,
			markup:
		 		'<div class="pp_pic_holder"> \
				<div class="ppt">&nbsp;</div> \
				<div class="pp_top"> \
					<div class="pp_left"></div> \
					<div class="pp_middle"></div> \
					<div class="pp_right"></div> \
				</div> \
				<div class="pp_content_container"> \
					<div class="pp_left"> \
					<div class="pp_right"> \
						<div class="pp_content"> \
							<div class="pp_loaderIcon"></div> \
							<div class="pp_fade"> \
								<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
								<div class="pp_hoverContainer"> \
									<a class="pp_next" href="#">next</a> \
									<a class="pp_previous" href="#">previous</a> \
								</div> \
								<div id="pp_full_res"></div> \
								<a class="pp_close" href="#">Close</a> \
								<div class="pp_details"> \
									'+social+' \
									<p class="pp_description"></p> \
									<div class="pp_nav"> \
										<a href="#" class="pp_arrow_previous">Previous</a> \
										<span class="sep">/</span> \
										<a href="#" class="pp_arrow_next">Next</a> \
									</div> \
								</div> \
							</div> \
						</div> \
					</div> \
					</div> \
				</div> \
				<div class="pp_bottom"> \
					<div class="pp_left"></div> \
					<div class="pp_middle"></div> \
					<div class="pp_right"></div> \
				</div> \
				</div> \
				<div class="pp_overlay"></div>',
			gallery_markup: '<div class="pp_gallery"> \
								<a href="#" class="pp_arrow_previous">Previous</a> \
								<div> \
									<ul> \
										{gallery} \
									</ul> \
								</div> \
								<a href="#" class="pp_arrow_next">Next</a> \
							</div>',
			changepicturecallback:function() {
				setupSwipe();
			}
		});

		function setupSwipe() {
			$('#pp_full_res').swipe({
				swipeLeft:function() {
					$.prettyPhoto.changePage('next');
				},
				swipeRight:function() {
					$.prettyPhoto.changePage('previous');
				},
				threshold:30
			});
		}

		// ==============
		// = Sticky Nav =
		// ==============
		var bg=$('html').css('background-image');
		var nav_y=$('.sticky-nav.image-bg').offset();
		if(nav_y) {
			nav_y=nav_y.top-parseInt($('html').css('margin-top').split('px')[0]);
			$('.sticky-nav.image-bg').css({
				backgroundImage:bg,
				backgroundPosition:'center -'+nav_y+'px'
			});
		}

		if($('.sticky-nav.sticky,#compare-scroll thead tr').length>0) {
			// Creates a placeholder for when the menu is positioned fixed
			var wrap=$('<div/>').addClass('sticky-nav-wrapper');
			$('.sticky-nav.sticky').wrap(wrap);

			// Setup anchor locations
			$('.sticky-nav.sticky,#compare-scroll thead tr').each(function(n,nav) {
				var targets=[];

				$('ul li a',nav).each(function(i,item) {
					var a=$(item).attr('href').split('#');
					if(a[1] && $('#'+a[1]).length>0) {
						targets.push(a[1]);

						$(item).click(function(event) {
							event.preventDefault();
							var id='#'+$(item).attr('href').split('#')[1];
							var h=$(nav).outerHeight();
							if($('body').hasClass('single-model'))
								h+=16;
							$('html,body').stop().animate({scrollTop:$(id).offset().top-h});
						});
					}
				});

				$(nav).data({
					'targets':targets,
					'formerPadding':$(nav).css('padding'),
					'formerY':0,
					'initY':$(nav).offset().top
				});
			});

			// make all compare columns fixed widths
			$('#compare-scroll table td,#compare-scroll table th').each(function(i,item) {
				$(item).width($(item).width());
			});

			// Scrolling magic
			$(window).scroll(function(event) {
				if(!$('body').hasClass('mobile')) {
					var y=$(window).scrollTop();

					$('.sticky-nav.sticky,#compare-scroll thead tr').each(function(i,item) {
						var itemY=Math.round($(item).offset().top)-10;

						if($(item).data('formerY')<=0 && y>$(item).data('initY')) {
							var w=$(item).width();
							var h=$(item).height();

							// if compare table...
							if($(item).is('tr')) {
								w=0;
								$(item).css('width',$('#content').innerWidth()-64);
							}

							$(item).parent().css({
								width:w,
								height:h,
								marginBottom:$(item).css('margin-bottom'),
								padding:$(item).css('padding'),
								display:'block'
							});

							$(item).data('formerY',y).css({
								position:'fixed',
								top:0
							}).addClass('floating');
						}
						else if(y<$(item).data('formerY')) {
							$(item).css({
								position:'relative',
								padding:$(item).data('formerPadding')
							}).data('formerY',0);

							$(item).parent().removeAttr('style').removeClass('floating');
						}

						var found_highlight=false;
						if($(item).data('formerY')!=0) {
							$('a',item).removeClass('active');
							$.each($(item).data('targets'),function(t,target) {
								if(!found_highlight) {
									var targetY=Math.round($('#'+target).offset().top)-90;
									var h=$('#'+target).height()+$(item).height();
									if(y>targetY && y<targetY+h) {
										$('a[href$="#'+target+'"]',item).addClass('active');
										found_highlight=true;
									}
								}
							});
						}
					});
				}
			});
		}

		// =======================================
		// = Find a Dealer hide/show postal code =
		// =======================================
		hide_show_postalCode=function() {
			if($('#dealer-country').val()=='US' || $('#dealer-country').val()=='CA')
				$('#dealer-locator .postalCode').show();
			else
				$('#dealer-locator .postalCode').hide();
		}
		hide_show_postalCode();

		$('#dealer-country').on('change',hide_show_postalCode);

		// ==========================
		// = Request a Quote Scroll =
		// ==========================
		$('.summary .request-a-quote').click(function(event) {
			event.preventDefault();
			var id='#'+$(this).attr('href').split('#')[1];
			$('html,body').stop().animate({scrollTop:$(id).offset().top-80});
		});

		// ==========
		// = Events =
		// ==========
		$('.events li').click(function(event) {
			event.preventDefault();
			window.location=$('.eventLearnMore a',this).attr('href');
		});
	});
})(jQuery);

function formatNumber(nStr) {
	nStr+='';
	x=nStr.split('.');
	x1=x[0];
	x2=x.length>1?'.'+x[1]:'';
	var rgx=/(\d+)(\d{3})/;
	while(rgx.test(x1))
		x1=x1.replace(rgx,'$1'+','+'$2');
	return x1 + x2;
}

function isset(v) {return (typeof(v)!="undefined" && v!==null)}

String.prototype.trim=function(){return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');};

String.prototype.ltrim=function(){return this.replace(/^\s+/,'');};

String.prototype.rtrim=function(){return this.replace(/\s+$/,'');};

String.prototype.fulltrim=function(){return this.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');};
