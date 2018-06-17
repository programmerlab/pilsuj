<?php
/**
 * Enqueue scripts and stylesheets
 *
 */

function topdeal_scripts() {	
	$scheme_meta = get_post_meta( get_the_ID(), 'scheme', true );
	$scheme = ( $scheme_meta != '' && $scheme_meta != 'none' ) ? $scheme_meta : topdeal_options()->getCpanelValue('scheme');
	$topdeal_direction = topdeal_options()->getCpanelValue('direction');
	
	if ( $scheme ){
		$app_css = get_template_directory_uri() . '/css/app-'.$scheme.'.css';
	} else {
		$app_css = get_template_directory_uri() . '/css/app-default.css';
	}
	wp_dequeue_style('fontawesome');
	wp_dequeue_style('slick_slider_css');
	wp_dequeue_style('fontawesome_css');
	wp_dequeue_style('shortcode_css');
	wp_dequeue_style('yith-wcwl-font-awesome');
	wp_dequeue_style('tabcontent_styles');	
	
	/* enqueue script & style */
	if ( !is_admin() ){			
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null);	
		wp_enqueue_style('fancybox_css', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), null);		
		wp_enqueue_style('topdeal_css', $app_css, array(), null);	
		wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), null, true);
		wp_enqueue_script('plugins_js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('slick_slider',get_template_directory_uri().'/js/slick.min.js',array(),null,true);
		wp_enqueue_script('isotope_script', get_template_directory_uri() . '/js/isotope.js', array(), null, true);
		wp_enqueue_script('wc-quantity', get_template_directory_uri() . '/js/wc-quantity-increment.min.js', array('jquery'), null, true);
		wp_enqueue_script('nav-bar', get_template_directory_uri() . '/js/jquery.nav.js', array('jquery'), null, true);
		
		if( is_rtl() || $topdeal_direction == 'rtl' ){
			wp_enqueue_style('rtl_css', get_template_directory_uri() . '/css/rtl.css', array(), null);
		}
		wp_enqueue_style('topdeal_responsive_css', get_template_directory_uri() . '/css/app-responsive.css', array(), null);
		
		/* Load style.css from child theme */
		if (is_child_theme()) {
			wp_enqueue_style('topdeal_child_css', get_stylesheet_uri(), false, null);
		}
		
		if( !wp_script_is( 'jquery-cookie' ) ){
			wp_enqueue_script('plugins_js');
		}
	}
	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}		
	
	if ( !is_admin() ){
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2.min.js', false, null, false);
		
		$translation_text = array(
			'cart_text' 		 => esc_html__( 'Add To Cart', 'topdeal' ),
			'compare_text' 	 => esc_html__( 'Compare', 'topdeal' ),
			'wishlist_text'  => esc_html__( 'WishList', 'topdeal' ),
			'quickview_text' => esc_html__( 'QuickView', 'topdeal' ),
		);
		
		wp_localize_script( 'topdeal_custom_js', 'custom_text', $translation_text );
		wp_enqueue_script( 'topdeal_custom_js', get_template_directory_uri() . '/js/main.js', array(), null, true );
	}
	
	/*
	** Maintaince Mode
	*/
	if( !is_user_logged_in() && topdeal_options()->getCpanelValue('maintaince_enable') ){ 
		$output = '';
		$countdown = topdeal_options()->getCpanelValue('maintaince_date');
		if( $countdown != '' ):
			$output .= 'jQuery(function($){
			"use strict";
			function topdeal_check_height(){
				var W_height = $( window ).height();
				if( W_height > 767) {
					setTimeout(function(){
						var cm_height = $( window ).height();
						var cm_target = $( "body > .body-wrapper" );
						cm_target.css( "height", cm_height );
					}, 1000);
				}
			}
			$(window).on( "load", function(){
				topdeal_check_height();
			});
				$(document).ready(function(){ 
					var end_date = new Date( "'. esc_js( $countdown ) .'" ).getTime()/1000;
					$("#countdown-container").ClassyCountdown({
						theme: "white", 
						end: end_date, 
						now: $.now()/1000,
						labelsOptions: {
							lang: {
							days: "Days",
							hours: "Hours",
							minutes: "Mins",
							seconds: "Secs"
							},
							style: "font-size: 0.5em;"
						},
					});
				});
			});';
		endif;
		
		wp_enqueue_style('countdown_css', get_template_directory_uri() . '/css/jquery.classycountdown.min.css', array(), null);
		wp_enqueue_style('maintaince_css', get_template_directory_uri() . '/css/style-maintaince.css', array(), null);
		wp_register_script('countdown',get_template_directory_uri(). '/js/maintaince/jquery.classycountdown.min.js', array(), null, true);
		wp_enqueue_script( 'knob', get_template_directory_uri(). '/js/maintaince/jquery.knob.js', array(), null, true);	
		wp_enqueue_script( 'throttle',get_template_directory_uri() . '/js/maintaince/jquery.throttle.js', array(), null, true);	
		wp_enqueue_script( 'countdown' );
		wp_add_inline_script( 'countdown', $output );
	}
	
	/*
	** Dequeue and enqueue css, js mobile
	*/
	if( topdeal_mobile_check() ) :
		if( is_front_page() || is_home() ) :
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		endif;
		wp_dequeue_style( 'jquery-colorbox' );
		wp_dequeue_style( 'colorbox' );
		wp_dequeue_script( 'jquery-colorbox' );
		wp_dequeue_script( 'tp-tools' );
		wp_dequeue_script( 'revmin' );
		wp_dequeue_script( 'topdeal_megamenu' );
		wp_dequeue_script( 'moneyjs' );
		wp_dequeue_script( 'topdeal' );
		wp_dequeue_script( 'accountingjs' );
		wp_dequeue_script( 'wc_currency_converter' );
		wp_dequeue_script( 'yith-woocompare-main' );
	endif;
	
	/*
	** Dequeue some css and jquery mobile responsive
	*/
	
	global $sw_detect;
	if( !empty( $sw_detect ) && $sw_detect->isMobile() && !$sw_detect->isTablet() ){
		wp_dequeue_style( 'jquery-colorbox' );
		wp_dequeue_style( 'colorbox' );
		wp_dequeue_script( 'jquery-colorbox' );
		wp_dequeue_script( 'topdeal_megamenu' );
		wp_dequeue_script( 'yith-woocompare-main' );
		wp_enqueue_script( 'topdeal_mobile_js', get_template_directory_uri(). '/js/mobiles.js', array(), null, true);	
	}
}
add_action('wp_enqueue_scripts', 'topdeal_scripts', 100);
