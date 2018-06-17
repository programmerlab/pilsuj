<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$product_cat = isset( $_GET['category'] ) ? $_GET['category'] : '';
	$product_sku 	= isset( $_GET['search_sku'] ) ? $_GET['search_sku'] : 0;
	$s = isset( $_GET['s'] ) ? $_GET['s'] : '';	
	
	$args_product = array();
	$check 				= false;
	if( $product_sku ) {
		global $wpdb;
		$post_ids = $wpdb->get_col( $wpdb->prepare( 
		"SELECT SQL_CALC_FOUND_ROWS {$wpdb->posts}.ID FROM {$wpdb->posts} INNER JOIN {$wpdb->postmeta} ON ( {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id ) 
		WHERE ((({$wpdb->posts}.post_title LIKE %s) OR ({$wpdb->posts}.post_excerpt LIKE %s) OR ({$wpdb->posts}.post_content LIKE %s)) OR ( ( {$wpdb->postmeta}.meta_key = '_sku' AND {$wpdb->postmeta}.meta_value LIKE %s ) ) ) 
		AND ({$wpdb->posts}.post_password = '') AND {$wpdb->posts}.post_type = 'product' AND ({$wpdb->posts}.post_status = 'publish') 
		GROUP BY {$wpdb->posts}.ID 
		ORDER BY {$wpdb->posts}.post_title LIKE %s DESC, {$wpdb->posts}.post_date DESC", '%' .$s . '%', '%' .$s . '%', '%' .$s . '%', '%' .$s . '%', '%' .$s . '%' ) );
		if( sizeof( $post_ids ) > 0 ){
			$check = true;
			$args_product = array(
				'post_type' => 'product',
				'post__in'  => $post_ids,
				'posts_per_page' => 12,
				'paged' => $paged
			);
		}
	}else{		
		$check = true;
		$args_product = array(
			'post_type'	=> 'product',
			'posts_per_page' => 12,
			'paged' => $paged,
			's' => $s
		);
	}
	
if( $product_sku ) {
		$args_product['meta_query'] = array(
      array(
        'key' 		=> '_sku',
        'value'		=> $s,
				'compare' => 'LIKE'
      )
    );
}
?>
<div class="content-list-category container">
	<div class="content_list_product">
		<div class="products-wrapper">		
		<?php
			$product_query = new wp_query( $args_product );
			if( $product_query -> have_posts() ){
		?>
			<ul id="loop-products" class="products-loop row clearfix grid-view grid">
			<?php 
				while( $product_query -> have_posts() ) : $product_query -> the_post(); 
				global $product, $post;
				$product_id = $post->ID;
			?>
				<li class="item col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<div class="item-wrap">
						<div class="item-detail">										
							<div class="item-img products-thumb">											
								<!-- quickview & thumbnail  -->
								<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
							</div>										
							<div class="item-content">
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>								
																			
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
								<?php if ( $price_html = $product->get_price_html() ){?>
								<div class="item-price">
									<span>
										<?php echo $price_html; ?>
									</span>
								</div>
								<?php } ?>
								<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
								<?php sw_label_sales(); ?>
							</div>
						</div>
					</div>
				</li>
				<?php	endwhile;
				
			?>
			</ul>
			<!--Pagination-->
			<?php if ($product_query->max_num_pages > 1) : ?>
			<div class="pag-search ">
					<div class="pagination nav-pag pull-right">
						<div class="wrap_content clearfix">
						<?php 
							echo paginate_links( array(
								'base' => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $product_query->max_num_pages,
								'end_size' => 1,
								'mid_size' => 1,
								'prev_text' => '<i class="fa fa-angle-left"></i>',
								'next_text' => '<i class="fa fa-angle-right"></i>',
								'type' => 'list',
								
							) );
						?>
					</div>
				</div>
			</div>
	<?php endif;wp_reset_postdata(); ?>
	<!--End Pagination-->
	<?php 
		}else{
			get_template_part( 'templates/no-results' );
		}
	?>
		</div>
	</div>
</div>