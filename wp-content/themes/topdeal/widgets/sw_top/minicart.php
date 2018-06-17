<?php 
	do_action( 'before' ); 
?>
<?php if ( class_exists( 'WooCommerce' ) && !topdeal_options()->getCpanelValue( 'disable_cart' ) ) { ?>
<?php
	$topdeal_page_header = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : topdeal_options()->getCpanelValue('header_style');

		get_template_part( 'woocommerce/minicart-ajax' ); 
	
?>
<?php } ?>