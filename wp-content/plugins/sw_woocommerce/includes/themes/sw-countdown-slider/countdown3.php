<?php 
/**
	* Layout Countdown 3
	* @version     1.0.0
**/

$category = explode( ',', $category );
foreach( $category as $key => $cat ) {
	$term_name = esc_html__( 'All Categories', 'sw_woocommerce' );
	$default = array(
		'post_type' => 'product',	
			'meta_query' => array(		
			array(
				'key' => '_sale_price',
				'value' => 0,
				'compare' => '>',
				'type' => 'DECIMAL(10,5)'
			),
			array(
				'key' => '_sale_price_dates_from',
				'value' => time(),
				'compare' => '<',
				'type' => 'NUMERIC'
			),
			array(
				'key' => '_sale_price_dates_to',
				'value' => 0,
				'compare' => '>',
				'type' => 'NUMERIC'
			)
		),
		'meta_key'		=> 'recommend_product',
		'meta_value'	=> 'yes',
		'orderby' => $orderby,
		'order' => $order,
		'post_status' => 'publish',
		'showposts' => $numberposts	
	);
	if( $cat != '' ){
		$term = get_term_by( 'slug', $cat, 'product_cat' );
		if( $term ) :
			$term_name = $term->name;
		endif; 
		
		$default['tax_query'] = array(
			array(
				'taxonomy'  => 'product_cat',
				'field'     => 'slug',
				'terms'     => $cat ));
	}
	$id = 'sw_countdown_'.$this->generateID();
	$list = new WP_Query( $default );
	if ( $list -> have_posts() ){ 
?>
	<div id="<?php echo esc_attr( $cat.'_'.$id . $key ); ?>" class="sw-woo-container-slider responsive-slider countdown-slider3 loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-circle="false">       
		<div class="resp-slider-container">
			<?php if( $title1 != '' ){?>
				<div class="box-title">
					<h3><span class="fa <?php echo esc_attr( $icon ); ?>"></span><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h3>
				</div>
			<?php } ?>
			<div class="slider responsive">	
			<?php 
				$count_items = 0;
				$count_items = ( $numberposts >= $list->found_posts ) ? $list->found_posts : $numberposts;
				$i = 0;
				while($list->have_posts()): $list->the_post();					
				global $product, $post;
				$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
				$start_time = get_post_meta( $post->ID, '_sale_price_dates_from', true );
				$countdown_time = get_post_meta( $post->ID, '_sale_price_dates_to', true );	
				$forginal_price = get_post_meta( $post->ID, '_regular_price', true );	
				$fsale_price = get_post_meta( $post->ID, '_sale_price', true );	
				$symboy = get_woocommerce_currency_symbol( get_woocommerce_currency() );
				$date = sw_timezone_offset( $countdown_time );
				if( $i % $item_row == 0 ){
			?>
				<div class="item item-countdown product <?php echo esc_attr( $class )?>" id="<?php echo 'product_'.$id.$post->ID; ?>">
				<?php } ?>
					<div class="item-wrap2">
						<div class="item-detail">										
							<div class="item-img products-thumb">
							   <span class="onsale"><?php echo esc_html__('Sale','sw_woocommerce') ?></span>
							   <?php sw_label_sales(); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
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
							</div>										
							<div class="item-content">																			
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
													
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
								<!-- price -->
								<?php if ( $price_html = $product->get_price_html() ){?>
									<div class="item-price">
										<span>
											<?php echo $price_html; ?>
										</span>
									</div>
								<?php } ?>
								<div class="product-countdown countdown-style1" data-date="<?php echo esc_attr( $date ); ?>"  data-price="<?php echo esc_attr( $symboy.$forginal_price ); ?>" data-starttime="<?php echo esc_attr( $start_time ); ?>" data-cdtime="<?php echo esc_attr( $countdown_time ); ?>" data-id="<?php echo 'product_'.$id.$post->ID; ?>"></div>					
									<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
							</div>								
						</div>
					</div>
				<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
			<?php $i ++; endwhile; wp_reset_postdata();?>
			</div>
		</div>            
	</div>
<?php
	} 
}
?>