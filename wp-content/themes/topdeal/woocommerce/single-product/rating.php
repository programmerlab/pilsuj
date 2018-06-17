<?php
/*
 * Single Product Rating
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.1.0
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


global $product, $post;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	return;
}
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();
if(  $rating_count > 0 ) :
?>

<div class="reviews-content" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
	<div class="star">
		<?php echo '<span style="width:'. ( $average*12 ) .'px"></span>'; ?>
		<div class="rating-hidden">
			<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'topdeal' ), '<span itemprop="bestRating">', '</span>' ); ?>
			<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'topdeal' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
		</div>
	</div>
		<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s Review', '%s Review(s)', $rating_count, 'topdeal' ), '<span itemprop="ratingCount" class="count">' . $rating_count . '</span>' ); ?></a>
</div>

<?php else : ?>

<div class="reviews-content">
	<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*16 ).'px"></span>' : ''; ?></div>
		<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s Review', '%s Review(s)', $rating_count, 'topdeal' ), '<span class="count">' . $rating_count . '</span>' ); ?></a>
</div>
<?php endif; ?>

<?php if( !topdeal_mobile_check() ) :?>
	<div class="categories-product clearfix">
	<span><?php echo esc_html__('categories','topdeal');?>:</span>
	<?php
        $size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
        echo wc_get_product_category_list( $post->ID, ', ', '<span class="posted_in">', '</span>' );
    ?>
	</div>
<?php endif; ?>

<?php if( !topdeal_mobile_check() ) :?>
<div class="product-info">
	<?php $stock = ( $product->is_in_stock() )? 'in-stock' : 'out-stock' ; ?>
	<div class="product-stock <?php echo esc_attr( $stock ); ?>">
		<span class="title-sock"><?php echo esc_html__('Availablity: ','topdeal')?></span><span><?php echo ( $product->is_in_stock() )? esc_html__( 'in stock', 'topdeal' ) : esc_html__( 'Out stock', 'topdeal' ); ?></span>
	</div>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'topdeal' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'topdeal' ); ?></span></span>

	<?php endif; ?>
</div>
<?php endif; ?>
