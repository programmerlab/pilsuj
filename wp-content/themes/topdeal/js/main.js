(function($) {
	"use strict";
	
	/* 
	** Add Click On Ipad 
	*/
	$(window).resize(function(){
		var $width = $(this).width();
		if( $width < 1199 ){
			$( '.primary-menu .nav .dropdown-toggle'  ).each(function(){
				$(this).attr('data-toggle', 'dropdown');
			});
		}
	});
	
	/*
	** Blog Masonry
	*/
	jQuery(window).load(function() {
		  $('body').find('.blog-content-grid').isotope({ 
		   layoutMode : 'masonry'
		  });
	 });
	
	/*
	** Search on click
	*/
	$('.header .vertical_megamenu .mega-left-title').on('click', function(){
			$('.header .vertical_megamenu .wrapper_vertical_menu').slideToggle("fast");
			$('.header .vertical_megamenu').toggleClass('close-item');
	});
	
	$('.header-style2 .header-bottom .search-cate .fa-search').on('click', function(){
			$('.header-style2 .header-bottom .search-cate').toggleClass("open");
	});
	
	$('.main-menu .header-close').on('click', function(){
			$('.main-menu').removeClass("open");
	});
	$('.header-open').on('click', function(){
			$('.main-menu').toggleClass("open");
	});
	/*
	**  show menu mobile
	*/
	
	$( ".header-mobile-style1 .mobile-search .icon-seach" ).click(function() {
	  $( ".header-mobile-style1 .mobile-search .top-form.top-search" ).slideToggle( "slow", function() {
	  });
	});
	
	$( ".header-mobile-style2 .mobile-search .icon-seach" ).click(function() {
	  $( ".header-mobile-style2 .mobile-search .top-form.top-search" ).slideToggle( "slow", function() {
	  });
	});

	$('.header-menu-categories .open-menu').on('click', function(){
			$('.main-menu').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-search a').on('click', function(){
			$('.top-form.top-search').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-more a').on('click', function(){
			$('.menu-item-hidden').toggleClass("open");
	});
	
	/*
	** js mobile
	*/
	$('.single-product.mobile-layout .social-share .title-share').on('click', function(){
			$('.single-product.mobile-layout .social-share').toggleClass("open");
	});
	$('.single-post.mobile-layout .social-share .title-share').on('click', function(){
			$('.single-post.mobile-layout .social-share').toggleClass("open");
	});

	$('.single-post.mobile-layout .social-share.open .title-share').on('click', function(){
			$('.single-post.mobile-layout .social-share').removeClass("open");
	});
	
	$('.products-nav .filter-product').on('click', function(){
			$('.products-wrapper .filter-mobile').toggleClass("open");
			$('.products-wrapper').toggleClass('show-modal');
	});
	
	$('.products-nav .filter-product').on('click', function(){
		if( $( ".products-wrapper .products-nav .filter-product" ).not( ".filter-mobile" ) ){
			$('.products-wrapper').removeClass('show-modal');
		}	
	});
	
	$('.mobile-layout .vertical_megamenu .resmenu-container .navbar-toggle').on('click', function(){
			$('.mobile-layout .body-wrapper .container').toggleClass('open');
	});
	
	$('.mobile-layout .header-top-mobile .header-menu-categories .show_menu').on('click', function(){
			$('.mobile-layout .body-wrapper .container').toggleClass('open');
	});
	
	$('.header-mobile-style5 .header-top-mobile .header-right .search-mobile').on('click', function(){
			$('.header-mobile-style5 .header-top-mobile .mobile-search').toggleClass('open');
	});
	
	$('.header-mobile-style5 .header-top-mobile .header-menu-categories .show_menu ').on('click', function(){
			$('.header-mobile-style5 .header-top-mobile .header-menu-categories .vertical_megamenu').toggleClass('open');
	});
	
	$('.mobile-layout .back-history').on('click', function(){
			window.history.back();
	});
	
	$('.footer-mstyle2 .footer-container .footer-open').on('click', function(){
		$('.footer-mstyle2').toggleClass('open');
	});
	
	$('.footer-mstyle2 .mobile_menu2')
		.find('li:gt(7)') /*you want :gt(4) since index starts at 0 and H3 is not in LI */
		.hide()
		.end()
		.each(function(){
			if($(this).children('li').length > 8){ //iterates over each UL and if they have 5+ LIs then adds Show More...
				$(this).append(
					$('<li><a><span class="menu-title">See more</span><span class="menu-img"></span></a></li>')
					.addClass('showMore')
					.on('click',function(){
						if($(this).siblings(':hidden').length > 0){
								$(this).html('<a><span class="menu-title">See less</span><span class="menu-img"></span></a>').siblings(':hidden').show(400);
						}else{
								$(this).html('<a><span class="menu-title">See more</span><span class="menu-img"></span></a>').show().siblings('li:gt(7)').hide(400);
						}
					})
				);
			}
	});
	
	$('.header-style1 .header-mid .sticky-search .fa-search').on('click', function(){
			$('.header-style1 .header-mid .sticky-search').toggleClass("open");
	});
	
	
	$('.header-style2 .header-bottom .sticky-search .fa-search').on('click', function(){
			$('.header-style2 .header-bottom .sticky-search').toggleClass("open");
	});
	
	$('.header-style5 .search-cate .fa-search').on('click', function(){
			$('.header-style5 .search-cate .top-form.top-search ').slideToggle();
	});
	
	
	/*add title to button*/
	$("a.compare").attr('title', custom_text.compare_text);
	$(".yith-wcwl-add-button a").attr('title', custom_text.wishlist_text);
	$("a.fancybox").attr('title', custom_text.quickview_text);
	$("a.add_to_cart_button").attr('title', custom_text.cart_text);
	
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
	/*
	** Product listing order hover
	*/
	$('ul.orderby.order-dropdown li ul').hide(); 
	$("ul.order-dropdown > li").each( function(){
		$(this).hover( function() {
			$('.products-wrapper').addClass('show-modal');
			$(this).find( '> ul' ).stop().fadeIn("fast");
		}, function() {
				$('.products-wrapper').removeClass('show-modal');
				$(this).find( '> ul' ).stop().fadeOut("fast");
		});
	});
	
	/*
	** Product listing select box
	*/
	$('.catalog-ordering .orderby .current-li a').html($('.catalog-ordering .orderby ul li.current a').html());
	$('.catalog-ordering .sort-count .current-li a').html($('.catalog-ordering .sort-count ul li.current a').html());
	
	/*
	** Quickview and single product slider
	*/
	$(document).ready(function(){
		if( $.isFunction( $.fancybox ) ){
			$('.fancybox').fancybox({
				'width'     : 850,
				'height'   : '500',
				'autoSize' : false,
				afterShow: function() {
					$( '.quickview-container .product-images' ).each(function(){
						var $id 					= this.id;
						var $rtl 					= $('body').hasClass( 'rtl' );
						var $img_slider 	= $(this).find('.product-responsive');
						var $thumb_slider = $(this).find('.product-responsive-thumbnail' )
						$img_slider.slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							fade: true,
							arrows: false,
							rtl: $rtl,
							asNavFor: $thumb_slider
						});
						$thumb_slider.slick({
							slidesToShow: 4,
							slidesToScroll: 1,
							asNavFor: $img_slider,
							arrows: true,
							focusOnSelect: true,
							rtl: $rtl,
							responsive: [				
								{
									breakpoint: 360,
									settings: {
									slidesToShow: 2    
									}
								}
								]
						});

						var el = $(this);
						setTimeout(function(){
							el.removeClass("loading");
							var height = el.find('.product-responsive').outerHeight();
							var target = el.find( '.item-video' );
							target.css({'height': height,'padding-top': (height - target.outerHeight())/2 });
							
							var thumb_height = el.find('.product-responsive-thumbnail' ).outerHeight();
							if( $vertical ){
								thumb_height = thumb_height/3;
							}
							var thumb_target = el.find( '.item-video-thumb' );
							thumb_target.css( 'height', thumb_height );
						}, 1000);
					});
				}
			});
		}
		/* 
		** Slider single product image
		*/
		$( '.product-images' ).each(function(){
			var $rtl 					= $('body').hasClass( 'rtl' );
			var $vertical			= $(this).data('vertical');
			var $img_slider 	= $(this).find('.product-responsive');
			var $thumb_slider = $(this).find('.product-responsive-thumbnail' );
			
			$img_slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				rtl: $rtl,
				asNavFor: $thumb_slider
			});
			$thumb_slider.slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: $img_slider,
				arrows: true,
				rtl: $rtl,
				vertical: $vertical,
				verticalSwiping: $vertical,
				focusOnSelect: true,
				responsive: [
					{
					  breakpoint: 480,
					  settings: {
						slidesToShow: 3    
					  }
					},
					{
					  breakpoint: 360,
					  settings: {
						slidesToShow: 2    
					  }
					}
				  ]
			});

			var el = $(this);
			setTimeout(function(){
				el.removeClass("loading");
				var height = el.find('.product-responsive').outerHeight();
				var target = el.find( ' .item-video' );
				target.css({'height': height,'padding-top': (height - target.outerHeight())/2 });
							
				var thumb_height = el.find('.product-responsive-thumbnail' ).outerHeight();
				if( $vertical ){
					thumb_height = thumb_height/3;
				}
				var thumb_target = el.find( '.item-video-thumb' );
				thumb_target.css({ height: thumb_height,'padding-top':( thumb_height - thumb_target.outerHeight() )/2 });
			}, 1000);
		});
	});
	
	/*
	** Hover on mobile and tablet
	*/
	var mobileHover = function () {
			$('*').on('touchstart', function () {
					$(this).trigger('hover');
			}).on('touchend', function () {
					$(this).trigger('hover');
			});
	};
	mobileHover();
	
	/*
	** Menu hidden
	*/
	$('.product-categories').each(function(){
		var number	 = $(this).data( 'number' ) - 1;
		var lesstext = $(this).data( 'lesstext' );
		var moretext = $(this).data( 'moretext' );
		if( number > 0 ) {
			$(this).find( 'li:gt('+ number +')' ).hide().end();		
			if( $(this).children('li').length > number ){ 
				$(this).append(
					$('<li><a>'+ moretext +'   +</a></li>')
					.addClass('showMore')
					.on('click',function(){
						if($(this).siblings(':hidden').length > 0){
								$(this).html( '<a>'+ lesstext +'   -</a>' ).siblings(':hidden').show(400);
						}else{
								$(this).html( '<a>'+ moretext +'   +</a>' ).show().siblings( ':gt('+ number +')' ).hide(400);
						}
					})
				);
			}
		}
	});
	

	var w_width = $(window).width(); 
		 if( w_width <= 480){
		  jQuery('.mobile-layout .header-mobile-style5 .topdeal_resmenu')
		  .find(' > li:gt(6) ') 
		  .hide()
		  .end()
		  .each(function(){
		   if($(this).children('li').length > 6){ 
			$(this).append(
			 $('<li><a class="open-more-cat">More Categories</a></li>')
			 .addClass('showMore')
			 .on('click', function(){
			  if($(this).siblings(':hidden').length > 0){
			   $(this).html('<a class="close-more-cat">Close Categories</a>').siblings(':hidden').show(400);
			  }else{
			   $(this).html('<a class="open-more-cat">More Categories</a>').show().siblings('li:gt(6)').hide(400);
			  }
			 })
			 );
		   }
		  });
		 }
	/* 
	** Fix accordion heading state 
	*/
	$('.accordion-heading').each(function(){
		var $this = $(this), $body = $this.siblings('.accordion-body');
		if (!$body.hasClass('in')){
			$this.find('.accordion-toggle').addClass('collapsed');
		}
	});	

	
	/*
	** Cpanel
	*/
	$('#cpanel').collapse();

	$('#cpanel-reset').on('click', function(e) {

		if (document.cookie && document.cookie != '') {
			var split = document.cookie.split(';');
			for (var i = 0; i < split.length; i++) {
				var name_value = split[i].split("=");
				name_value[0] = name_value[0].replace(/^ /, '');

				if (name_value[0].indexOf(cpanel_name)===0) {
					$.cookie(name_value[0], 1, { path: '/', expires: -1 });
				}
			}
		}

		location.reload();
	});

	$('#cpanel-form').on('submit', function(e){
		var $this = $(this), data = $this.data(), values = $this.serializeArray();

		var checkbox = $this.find('input:checkbox');
		$.each(checkbox, function() {

			if( !$(this).is(':checked') ) {
				name = $(this).attr('name');
				name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');
				var date = new Date();
				date.setTime(date.getTime() + (30 * 1000));
				$.cookie( name , 0, { path: '/', expires: date });
			}

		})

		$.each(values, function(){
			var $nvp = this;
			var name = $nvp.name;
			var value = $nvp.value;

			if ( !(name.indexOf(cpanel_name + '[')===0) ) return ;

			name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

			$.cookie( name , value, { path: '/', expires: 7 });

		});

		location.reload();

		return false;

	});

	$('a[href="#cpanel-form"]').on( 'click', function(e) {
		var parent = $('#cpanel-form'), right = parent.css('right'), width = parent.width();

		if ( parseFloat(right) < -10 ) {
			parent.animate({
				right: '0px',
			}, "slow");
		} else {
			parent.animate({
				right: '-' + width ,
			}, "slow");
		}

		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
		} else $(this).addClass('active');

		e.preventDefault();
	});
	

	/*
	** Currency Selectbox
	*/
	$(document).ready(function(){
		$('.currency_switcher li a').on('click', function(){
			$current = $(this).attr('data-currencycode');
			$('.currency_w > li > a').html($current);
		});
		
		var currency_show = $( '.currency_switcher > li > a.active' ).html();
		$('.currency_w > li > a').html(currency_show);	
	});
	
	/*
	** Language
	*/
	var $current ='';
	$('#lang_sel ul > li > ul li a').on('click',function(){
	 //console.log($(this).html());
	 $current = $(this).html();
	 $('#lang_sel ul > li > a.lang_sel_sel').html($current);
	  $a = $.cookie('lang_select_topdeal', $current, { expires: 1, path: '/'}); 
	});
	
	if( $.cookie('lang_select_topdeal') && $.cookie('lang_select_topdeal').length > 0 ) {
	 $('#lang_sel ul > li > a.lang_sel_sel').html($.cookie('lang_select_topdeal'));
	}

	$('#lang_sel ul > li.icl-ar').click(function(){
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'topdeal_lang_en' , 1, { path: '/', expires: 1 });
	});
	
	$('#lang_sel ul > li.icl-en').click(function(){
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'topdeal_lang_en' , 0, { path: '/', expires: -1 });
	});
	
	var Topdeal_Lang = $.cookie( 'topdeal_lang_en' );
	if( Topdeal_Lang == null ){
		$('#lang_sel ul > li.icl-en').addClass( 'active' );
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
	}else{
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$('#lang_sel ul > li.icl-ar').addClass( 'active' );
	}
	
	/*
	** Clear header style 
	*/
	$( '.topdeal-logo' ).on('click', function(){
		$.cookie("topdeal_header_style", null, { path: '/' });
		$.cookie("topdeal_footer_style", null, { path: '/' });
	});
	
	/*
	** Slider accordion
	*/
	if ($(window).width() < 991) {	

		$('.sw-woo-container-slider-theme1 .box-slider-title').append('<span class="icon-down"></span>');

		$(".sw-woo-container-slider-theme1 .box-slider-title").each(function(){
			$(this).on('click', function(){
				$(this).parent().toggleClass('accordion');
			});
		});
		
	}
	function sw_vertical_menu( element, w_width ){
		var cnumber	 = element.parent().data( 'number' ) - 1;
		var mnumber  = element.parent().data( 'mnumber' ) - 1;
		var number = cnumber;
		if( $(window).width() < w_width ){
			number = mnumber;
		}
		var lesstext = element.parent().data( 'lesstext' );
		var moretext = element.parent().data( 'moretext' );
		var moretext = element.parent().data( 'moretext' );
		element.find(	' > li:gt('+ number +')' ).hide().end();		
		if(element.children('li').length > number ){ 
			element.append(
				$('<li><a class="open-more-cat">'+ moretext +'</a></li>')
				.addClass('showMore')
				.on('click', function(){
					if($(this).siblings(':hidden').length > 0){
						$(this).html('<a class="close-more-cat">'+ lesstext +'</a>').siblings(':hidden').show(400);
					}else{						
						$(this).html('<a class="open-more-cat">'+ moretext +'</a>').show().siblings( ':gt('+ number +')' ).hide(400);
					}
				})
			);
		}
	}
	
	sw_vertical_menu( $( '.header-style1 .vertical_megamenu .vertical-megamenu' ), 1401 );
	sw_vertical_menu( $( '.header-style2 .vertical_megamenu .vertical-megamenu' ), 1401 );
	sw_vertical_menu( $( '.header-style3 .vertical_megamenu .vertical-megamenu' ), 1401 );
	sw_vertical_menu( $( '.header-style4 .vertical_megamenu .vertical-megamenu' ), 1190 );
	sw_vertical_menu( $( '.wp_verticle_topdeal .vertical_megamenu .vertical-megamenu' ), 1401 );
		  
	/*
	** Footer accordion
	*/	

	$('.mobile-layout .cusom-menu-mobile .widget_nav_menu h2.widgettitle').append('<span class="icon-footer"></span>');

	$(".mobile-layout .cusom-menu-mobile .widget_nav_menu h2.widgettitle").each(function(){
		$(this).on('click', function(){
			$(this).parent().find("ul.menu").slideToggle();
		});
	});
	
	
	/*
	** Back to top
	**/
	$("#topdeal-totop").hide();
	var wh = $(window).height();
	var whtml = $(document).height();
	$(window).scroll(function () {
		if ($(this).scrollTop() > whtml/10) {
				$('#topdeal-totop').fadeIn();
			} else {
				$('#topdeal-totop').fadeOut();
			}
	});
	
	$('#topdeal-totop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	/* end back to top */
	 
 /*
 ** Fix js 
 */
	$('.wpb_map_wraper').on('click', function () {
    $('.wpb_map_wraper iframe').css("pointer-events", "auto");
	});

	$( ".wpb_map_wraper" ).on('mouseleave', function() {
		$('.wpb_map_wraper iframe').css("pointer-events", "none"); 
	});
	
	$('#nav').onePageNav();
	
	$(".home-style1 .header .header-bar").hide();
		var wh = $(window).height();
		var whtml = $(document).height();
		$(window).scroll(function () {
			if ($(this).scrollTop() > whtml/10) {
				$('.home-style1 .header .header-bar').fadeIn();
			} else {
				$('.home-style1 .header .header-bar').fadeOut();
			}
		});
		
	/*
	** Change Layout 
	*/
	$( window ).load(function() {	
		if( $( 'body' ).hasClass( 'tax-product_cat' ) || $( 'body' ).hasClass( 'post-type-archive-product' ) ) {
			$('.grid-view').on('click',function(){
				$('.list-view').removeClass('active');
				$('.grid-view').addClass('active');
				jQuery("ul.products-loop").fadeOut(300, function() {
					$(this).removeClass("list").fadeIn(300).addClass( 'grid' );			
				});
			});
			
			$('.list-view').on('click',function(){
				$( '.grid-view' ).removeClass('active');
				$( '.list-view' ).addClass('active');
				$("ul.products-loop").fadeOut(300, function() {
					jQuery(this).addClass("list").fadeIn(300).removeClass( 'grid' );
				});
			});
			/* End Change Layout */
		} 
	});
	$(window).scroll(function() {    
	  var whtop = $(window).scrollTop(); 
	   if (whtop > 0) {
		$(".header-style4").addClass("header-ontop");
	   } else {
		$(".header-style4").removeClass("header-ontop");
	   } 
	 });
	
	/*remove loading*/
	$(".sw-woo-tab").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
	$(".responsive-slider").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
}(jQuery));

/*
** Check comment form
*/
function submitform(){
	if(document.commentform.comment.value=='' || document.commentform.author.value=='' || document.commentform.email.value==''){
		alert('Please fill the required field.');
		return false;
	} else return true;
}
(function($){		
	$(".widget_nav_menu li.menu-compare a").hover(function() {
		$(this).css('cursor','pointer').attr('title', custom_text.compare_text);
	}, function() {
		$(this).css('cursor','auto');
	});
	$(".widget_nav_menu li.menu-wishlist a").hover(function() {
		$(this).css('cursor','pointer').attr('title', custom_text.wishlist_text);
	}, function() {
		$(this).css('cursor','auto');
	});
})(jQuery);

jQuery(document).ready(function ($) {
   	$('.header-style1 .header-top-sale .close-header-top').on('click', function(){
			$('.header-style1 .header-top-sale').slideToggle();
	});
});
jQuery(document).ready(function($) {
	$('#myTabs a').hover(function (e) {
		 e.preventDefault();
		$(this).tab('show');
		 $("li.topdeal-mega-menu").removeClass("active");
		 //removing active class from other selected/default tab
		$("#myTabs .active").removeClass("active");

		//adding active class to current clicked tab
		$(this).parent().addClass("active");
	});
	var h_tab = $( "#myTabs" ).height();
	var h_content = $( ".listing-tab-shortcode .tab-content").height();
	if( h_tab < h_content ){
		 $("#myTabs").css( "height", h_content );
	}
});

/*
** Sroll to menu bar
*/
