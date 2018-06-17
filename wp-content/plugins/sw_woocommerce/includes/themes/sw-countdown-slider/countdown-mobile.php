<?php 
/**
	* Layout Countdown 6
	* @version     1.0.0
**/

$category = explode( ',', $category );
foreach( $category as $key => $cat ) {
	$term_name = esc_html__( 'All Categories', 'sw_woocommerce' );
	$viewall = get_permalink( wc_get_page_id( 'shop' ) );
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
		'orderby' => $orderby,
		'order' => $order,
		'post_status' => 'publish',
		'showposts' => $numberposts	
	);
	if( $cat != '' ){
		$term = get_term_by( 'slug', $cat, 'product_cat' );
		if( $term ) :
			$viewall = get_term_link( $term->term_id, 'product_cat' );
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
	<div id="<?php echo esc_attr( $cat.'_'.$id . $key ); ?>" class="style-mobile-countdown clearfix">       
		<div class="resp-slider-container">
			<?php if( $title1 != '' ){?>
				<div class="box-title clearfix">
					<h3><span class="fa <?php echo esc_attr( $icon ); ?>"></span><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h3>
					<a class="view-all" href="<?php echo esc_url( $viewall ); ?>"><i class="fa fa-caret-right"></i><?php echo esc_html__('view all','topdeal'); ?></a>
				</div>
			<?php } ?>
			<div class="slider">
			<div class="items-wrapper">
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
			?>
				<div class="item item-countdown product <?php echo esc_attr( $class )?>" id="<?php echo 'product_'.$id.$post->ID; ?>">
					<div class="item-wrapper">
						<div class="item-detail">										
							<div class="item-img products-thumb">
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
							</div>										
							<div class="item-content">																					
								<div class="product-countdown countdown-style1" data-date="<?php echo esc_attr( $date ); ?>"  data-price="<?php echo esc_attr( $symboy.$forginal_price ); ?>" data-starttime="<?php echo esc_attr( $start_time ); ?>" data-cdtime="<?php echo esc_attr( $countdown_time ); ?>" data-id="<?php echo 'product_'.$id.$post->ID; ?>"></div>					
									<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>													
									<!-- price -->
									<?php if ( $price_html = $product->get_price_html() ){?>
										<div class="item-price">
											<span>
												<?php echo $price_html; ?>
											</span>
										</div>
								<?php } ?>
								<div class="description"><?php echo $post->post_excerpt; ?></div>	
							</div>								
						</div>
					</div>
				 </div>
			<?php $i ++; endwhile; wp_reset_postdata();?>
			</div>
			</div>
		</div>            
	</div>
<?php
	} 
}
?>