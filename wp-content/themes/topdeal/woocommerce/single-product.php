<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php get_template_part('header'); ?>

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
	<?php topdeal_breadcrumb_title(); ?>
<?php endif; ?>

<div class="container">
	<div class="row sidebar-row">
		<?php if ( is_active_sidebar('left-product-detail') && topdeal_sidebar_product() == 'left' ):
			$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
			$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
			$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
		<aside id="left" class="sidebar <?php echo esc_attr($topdeal_left_span_class); ?>">
			<?php dynamic_sidebar('left-product-detail'); ?>
		</aside>
		<?php endif; ?>

		<div id="contents-detail" <?php topdeal_content_product_detail(); ?> role="main">
			<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action('woocommerce_before_main_content');
			?>
			<div class="single-product clearfix">

				
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

				<?php endwhile; // end of the loop. ?>
			
			</div>
			
			<?php
				/**
				 * woocommerce_after_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action('woocommerce_after_main_content');
			?>
		</div>		
		
		<?php if ( is_active_sidebar('right-product-detail') && topdeal_sidebar_product() == 'right' ):
			$topdeal_right_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_right_expand');
			$topdeal_right_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_right_expand_md');
			$topdeal_right_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_right_expand_sm');
		?>
		<aside id="right" class="sidebar <?php echo esc_attr($topdeal_right_span_class); ?>">
			<?php dynamic_sidebar('right-product-detail'); ?>
		</aside>
		<?php endif; ?>
		
	</div>
</div>

<?php get_template_part('footer'); ?>
