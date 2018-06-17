<?php
/**
 * topdeal initial setup and constants
 */
function topdeal_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'topdeal', get_template_directory() . '/lang' );

	// Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
	register_nav_menus(array(
		'primary_menu' => esc_html__('Primary Menu', 'topdeal'),
		'vertical_menu' => esc_html__( 'Vertical Menu', 'topdeal' ),
		'mobile_menu' => esc_html__( 'Mobile Menu', 'topdeal' ),
	));
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	if( topdeal_options()->getCpanelValue( 'product_zoom' ) ) :
		add_theme_support( 'wc-product-gallery-zoom' );
	endif;
	
	add_image_size( 'topdeal_blog-responsive1', 370, 240, true );
	add_image_size( 'topdeal_blog-responsive2', 568, 300, true );
	add_image_size( 'topdeal_shop-image', 600, 800, true );
	add_image_size( 'topdeal_shop-image2', 600, 700, true );
	add_image_size( 'topdeal_detail_thumb', 870, 450, true );
	add_image_size( 'topdeal_thumbnail_mobile', 140, 180, true );
	add_image_size( 'topdeal_blog_mobile', 460, 240, true );
	add_image_size( 'topdeal_blog_home10', 280, 250, true );
	add_image_size( 'topdeal_related_mobile', 115, 60, true );
	add_image_size( 'topdeal_cat_thumb_mobile', 210, 270, true );
	
	add_theme_support( "title-tag" );
	
	add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
	
	// Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
	add_theme_support('post-thumbnails');

	// Add post formats (http://codex.wordpress.org/Post_Formats)
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Custom image header
	$topdeal_header_arr = array(
		'default-image' => get_template_directory_uri().'/assets/img/logo-default.png',
		'uploads'       => true
	);
	add_theme_support( 'custom-header', $topdeal_header_arr );
	
	// Custom Background 
	$topdeal_bgarr = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);
	add_theme_support( 'custom-background', $topdeal_bgarr );
	
	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style( 'css/editor-style.css' );
	
	new Topdeal_Menu();
}
add_action('after_setup_theme', 'topdeal_setup');

