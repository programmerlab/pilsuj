<?php 

/**
	* Layout Theme Default
	* @version     1.0.0
**/
?>
<div class="item-wrap4">
	<div class="item-detail">										
		<div class="item-img products-thumb">
		   <span class="onsale"><?php echo esc_html__('Sale','sw_woocommerce') ?></span>
		   <?php sw_label_sales(); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="product_thumb_hover">
				<?php 
					$id = get_the_ID();
					if ( has_post_thumbnail() ){
							echo get_the_post_thumbnail( $post->ID, 'large' ) ? get_the_post_thumbnail( $post->ID, 'large' ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';		
					}else{
						echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'large'.'.png" alt="No thumb">';
					}
				?>
			</a>
			<?php echo topdeal_quickview(); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>										
		<div class="item-content">																			
			
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>		
			<!-- rating  -->
				<?php 
					$rating_count = $product->get_rating_count();
					$review_count = $product->get_review_count();
					$average      = $product->get_average_rating();
				?>
				<div class="reviews-content">
					<div class="star"><?php echo ( $average > 0 ) ?'<span style="width:'. ( $average*12 ).'px"></span>' : ''; ?></div>
				</div>									
			<!-- end rating  -->						
			<!-- price -->
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