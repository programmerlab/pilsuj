<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$topdeal_sidebar_product 	= topdeal_options()->getCpanelValue( 'sidebar_product' );
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
	global $product;
	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}
?>
<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product_detail clearfix">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">							
			<div class="slider_img_productd <?php echo ( $topdeal_sidebar_product == 'full' ) ? 'single-full' : ''; ?>">
				<!-- woocommerce_show_product_images -->
				<?php
					/**
					 * woocommerce_show_product_images hook
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>							
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
			<div class="content_product_detail">
				<!-- woocommerce_template_single_title - 5 -->
				<!-- woocommerce_template_single_rating - 10 -->
				<!-- woocommerce_template_single_price - 20 -->
				<!-- woocommerce_template_single_excerpt - 30 -->
				<!-- woocommerce_template_single_add_to_cart 40 -->
				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>				
			</div>
		</div>
	</div>
</div>		
<div class="tabs clearfix">
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php if (is_active_sidebar('bottom-detail-product')) { ?>
	<div class="bottom-single-product theme-clearfix">
		<?php dynamic_sidebar('bottom-detail-product'); ?>
	</div>
<?php } ?>
	
<?php do_action( 'woocommerce_after_single_product' ); ?>