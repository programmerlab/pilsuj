<?php ?>
<?php 
	if( !is_singular( 'product' ) ){
		return ;
	}
	$related = array();
	global $post;
	if( function_exists( 'wc_get_related_products' ) ){
		$related = wc_get_related_products( $post->ID, $numberposts );
	}else{
		$related = $product->get_related($numberposts);
	}
	
	if ( sizeof( $related ) == 0 ) return;
	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $numberposts,
		'post__in'             => $related,
		'post__not_in'         => array( $post->ID )
	) );
	$list = new WP_Query( $args );
	$viewall = get_permalink( wc_get_page_id( 'shop' ) );	

	if ( $list -> have_posts() ){
?>
	<div id="<?php echo 'slider_' . $widget_id; ?>" class=" related-products style-moblie clearfix">
		<div class="block-title">
				<?php echo '<h2><span>'. esc_html( $title1 ) .'</span></h2>'; ?>
			<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><i class="fa fa-caret-right"></i><?php echo esc_html__('view all','topdeal'); ?></a>
		</div>
			<div class="resp-slider-container">
				<div class="items-wrapper clearfix">	
				<?php 
					$count_items = 0;
					$count_items = ( $numberposts >= $list->found_posts ) ? $list->found_posts : $numberposts;
					$i = 0;
					while($list->have_posts()): $list->the_post();					
					global $product, $post;
					$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
					$symboy = get_woocommerce_currency_symbol( get_woocommerce_currency() );
				?>
					<div class="item product <?php echo esc_attr( $class )?>" id="<?php echo 'product_'.$id.$post->ID; ?>">
						<div class="item-wrapper">
							<div class="item-detail">
								<div class="item-image">									
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'shop_catalog' ); ?></a>
									<?php sw_label_sales() ?>
								</div>
								<div class="item-content">
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>
									<!-- Price -->
									<?php if ( $price_html = $product->get_price_html() ){?>
									<div class="item-price">
										<span>
											<?php echo $price_html; ?>
										</span>
									</div>
									<?php } ?>								
								</div>															
							</div>
						</div>
					</div> 
				<?php endwhile; wp_reset_postdata();?>
			</div>  
		</div>					
	</div>
<?php
} 
?>