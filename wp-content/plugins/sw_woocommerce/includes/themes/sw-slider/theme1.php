<?php 

/**
	* Layout Default
	* @version     1.0.0
**/


$widget_id = isset( $widget_id ) ? $widget_id : $this->generateID();
$term_name = esc_html__( 'All Categories', 'sw_woocommerce' );
$default = array(
	'post_type' => 'product',		
	'orderby' => $orderby,
	'order' => $order,
	'post_status' => 'publish',
	'showposts' => $numberposts
);
if( $category != '' ){
	$term = get_term_by( 'slug', $category, 'product_cat' );	
	if( $term ) :
		$term_name = $term->name;
	endif;
	
	$default['tax_query'] = array(
		array(
			'taxonomy'  => 'product_cat',
			'field'     => 'slug',
			'terms'     => $category )
	);	
}
$list = new WP_Query( $default );

if ( $list -> have_posts() ){ ?>
	<div id="<?php echo 'slider_' . $widget_id; ?>" class="sw-woo-container-slider-theme1 responsive-slider woo-slider-default loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
		<div class="box-slider-title <?php echo $style; ?>">
			<?php if( $icon != '' ):
				$ic = wp_get_attachment_image( $icon, 'full' ); 
					endif; ?>		
			<h2><span class="icon"><?php echo $ic; ?></span>
		<?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h2>
		</div>          
		<div class="resp-slider-container">
			<div class="slider responsive">	
			<?php 
				$count_items 	= 0;
				$numb 			= ( $list->found_posts > 0 ) ? $list->found_posts : count( $list->posts );
				$count_items 	= ( $numberposts >= $numb ) ? $numb : $numberposts;
				$i 				= 0;
				while($list->have_posts()): $list->the_post();global $product, $post;
				$class = ( $product->get_price_html() ) ? '' : 'item-nonprice';
				if( $i % $item_row == 0 ){
			?>
				<div class="item <?php echo esc_attr( $class )?> product">
			<?php } ?>
					<div class="item-wrap">
							<div class="item-detail">										
								<div class="item-img products-thumb">			
									<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
									<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
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
									<?php sw_label_sales(); ?>
								</div>								
							</div>
						</div>
				<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
			<?php $i++; endwhile; wp_reset_postdata();?>
			</div>
		</div>            
	</div>
	<?php
	}else{
		echo '<div class="alert alert-warning alert-dismissible" role="alert">
		<a class="close" data-dismiss="alert">&times;</a>
		<p>'. esc_html__( 'Has no product in this category', 'sw_woocommerce' ) .'</p>
	</div>';
	}
?>
