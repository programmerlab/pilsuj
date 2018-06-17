<?php 
/*
	* Name: Dokan Vendor Hook
	* Develop: SmartAddons
*/

add_action( 'wp', 'topdeal_dokan_hook' );
function topdeal_dokan_hook(){
	 if ( dokan_is_store_page () ) {
		remove_action( 'woocommerce_before_main_content', 'topdeal_banner_listing', 10 );
	}
}
