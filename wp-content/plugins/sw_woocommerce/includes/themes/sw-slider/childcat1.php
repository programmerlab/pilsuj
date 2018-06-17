<?php 

/**
	* Layout Child Category 1
	* @version     1.0.0
**/
if( $category == '' ){
	return '<div class="alert alert-warning alert-dismissible" role="alert">
		<a class="close" data-dismiss="alert">&times;</a>
		<p>'. esc_html__( 'Please select a category for SW Woo Slider. Layout ', 'sw_woocommerce' ) . $layout .'</p>
	</div>';
}

$widget_id = isset( $widget_id ) ? $widget_id : $this->generateID();
$viewall = get_permalink( wc_get_page_id( 'shop' ) );
$default = array();
if( $category != '' ){
	$default = array(
		'post_type' => 'product',
		'tax_query' => array(
		array(
			'taxonomy'  => 'product_cat',
			'field'     => 'slug',
			'terms'     => $category )
			),
		'meta_query' => array(			
			array(
				'key' => '_sale_price',
				'value' => 0,
				'compare' => '>',
				'type' => 'NUMERIC'
			),
		),
		'orderby' => $orderby,
		'order' => $order,
		'post_status' => 'publish',
		'showposts' => $numberposts
	);
}

$term_name = '';
$term = get_term_by( 'slug', $category, 'product_cat' );
if( $term ) :
	$term_name = $term->name;
	$viewall = get_term_link( $term->term_id, 'product_cat' );
endif;

$list = new WP_Query( $default );
if ( $list -> have_posts() ){ ?>
	<div id="<?php echo 'slider_' . $widget_id; ?>" class="responsive-slider woo-slider-default sw-child-cat clearfix<?php echo esc_attr( $style );?> loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>"  data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
			<div class="box-title clearfix">
				<?php if( $icon != '' ):
					$ic = wp_get_attachment_image( $icon, 'large' ); 
						endif; ?>		
				<h2><span class="icon"><?php echo $ic; ?></span>
				<?php echo ( $title1 != '' ) ? $title1 : $term_name; ?></h2>
				<button class="button-collapse collapsed pull-right" type="button" data-toggle="collapse" data-target="#<?php echo 'child_' . $widget_id; ?>"  aria-expanded="false">				
					<span class="fa fa-bar"></span>
					<span class="fa fa-bar"></span>
					<span class="fa fa-bar"></span>	
				</button>
			</div>
		<div class="wrap-child clearfix">
			<div class="child-top pull-left">
					<?php 
				if( $term ) :
					$termchild 		= get_terms( 'product_cat', array( 'parent' => $term->term_id, 'hide_empty' => 0) );
					if( count( $termchild ) > 0 ){
				?>			
					<div class="childcat-content clearfix"  id="<?php echo 'child_' . $widget_id; ?>">				
					<?php 					
						echo '<div class="wrap-child">';
						foreach ( $termchild as $key => $child ) {
							$thumbnail_id 	= get_woocommerce_term_meta( $child->term_id, 'thumbnail_id', true );
							$thumb = wp_get_attachment_image( $thumbnail_id,'full' );
							if( $thumb ) :
								echo '<div class="item-wrap"><div class="item-image"><a href="' . get_term_link( $child->term_id, 'product_cat' ) . '">' . $thumb . '</a></div>';
								echo '<div class="item-name"><a href="' . get_term_link( $child->term_id, 'product_cat' ) . '">' . $child->name . '</a></div></div>';
							endif; 
						}
						echo '</div>';
					?>
					</div>
					<?php } ?>
				<?php endif; ?>
			</div>
			<div class="childcat-slider-content clearfix">			
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
							<?php include( WCTHEME . '/default-item3.php' ); ?>
						<?php if( ( $i+1 ) % $item_row == 0 || ( $i+1 ) == $count_items ){?> </div><?php } ?>
						<?php $i++; endwhile; wp_reset_postdata();?>
					</div>
				</div> 
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