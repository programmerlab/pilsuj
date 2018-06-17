<?php ; 
wp_reset_postdata();
$default = array(
	'post_type'		=> 'product',		
	'post_status' 	=> 'publish',
	'no_found_rows' => 1,					
	'showposts' 	=> $numberposts	,
	'orderby' 				=> $orderby,
	'order' 				=> $order,
    'meta_query'     => array(
		array(
			'key'           => '_sale_price',
			'value'         => 0,
			'compare'       => '>',
			'type'          => 'numeric'
		)
	)		
);
if( $category != '' ){	
	$default['tax_query'] = array(
		array(
			'taxonomy'	=> 'product_cat',
			'field'		=> 'slug',
			'terms'		=> $category,
		)
	);
}
$term_name = '';
$term = get_term_by( 'slug', $category, 'product_cat' );
if( $term ) :
	$term_name = $term->name;
	$viewall = get_term_link( $term->term_id, 'product_cat' );
endif;
$id = 'sw_toprated_'.rand().time();
$list = new WP_Query( $default );
$countdown_time = strtotime( $date );
if ( $list -> have_posts() ){
?>
	<div id="<?php echo $id; ?>" class="sw-woo-container-slider  responsive-slider dailydeals-product2 clearfix loading" data-xlg="<?php echo esc_attr( $columns_xlg ); ?>" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-dots="true" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="resp-slider-container">
			<div class="item-left clearfix">
				<div class="item-image">
					<?php 
							$image1 = wp_get_attachment_image( $image, 'large' ); ?>
					<?php	echo $image1; ?>
				</div>
				<div class="child-top">
					<?php 
					if( $term ) :
						$termchild 		= get_terms( 'product_cat', array( 'parent' => $term->term_id, 'hide_empty' => 0) );
						if( count( $termchild ) > 0 ){
					?>			
						<div class="childcat-content clearfix"  id="<?php echo 'child_' . $id; ?>">				
							<h2><?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h2>
						<?php 					
							echo '<div class="wrap-child">';
							foreach ( $termchild as $key => $child ) {
									echo '<div class="item-name"><a href="' . get_term_link( $child->term_id, 'product_cat' ) . '">' . $child->name . '</a></div>';
							}
							echo '</div>';
						?>
						</div>
						<?php } ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="item-right">
				<div class="box-slider-title clearfix">			
					<div class="wrap-link pull-left">
						<div class="wrap-countdown pull-left">
							<div class="banner-countdown2 custom-font pull-left" data-cdtime="<?php echo esc_attr( $countdown_time ); ?>"></div>
						</div>
					</div>	
				</div>
				<div class="slider responsive">			
				<?php
						$i = 1;
						$count_items 	= 0;
						$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
						$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
						$i 				= 0;
						while($list->have_posts()): $list->the_post();global $product, $post;
						if( $i % $item_row == 0 ){
					?>
					<div class="item">
					<?php } ?>
						<div class="item-detail">										
							<div class="item-img products-thumb">
							   <span class="onsale"><?php echo esc_html__('Sale','sw_woocommerce') ?></span>
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
							</div>										
							<div class="item-content">																										
								<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php sw_trim_words( get_the_title(), $title_length ); ?></a></h4>								
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
					<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
					<?php $i++; endwhile; wp_reset_postdata();?>
				</div>
			</div>
		</div>					
	</div>
<?php
}	
?>