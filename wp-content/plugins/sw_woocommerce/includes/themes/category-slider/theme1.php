<?php 
	
	$widget_id = isset( $widget_id ) ? $widget_id : 'category_slide_'.$this->generateID();
	if( $category == '' ){
		return '<div class="alert alert-warning alert-dismissible" role="alert">
			<a class="close" data-dismiss="alert">&times;</a>
			<p>'. esc_html__( 'Please select a category for SW Woocommerce Category Slider. Layout ', 'sw_woocommerce' ) . $layout .'</p>
		</div>';
	}
?>
<div id="<?php echo 'slider_' . $widget_id; ?>" class="sw-category-child-theme clearfix">
	<div class="resp-slider-container">
		<div class="slider">
		<?php
			if( !is_array( $category ) ){
				$category = explode( ',', $category );
			}
			foreach( $category as $cat ){
				$term = get_term_by('slug', $cat, 'product_cat');	
				if( $term ) :
				
				$termchild 		= get_terms( 'product_cat', array( 'parent' => $term->term_id, 'hide_empty' => 0, 'number' => 13 ) );?>
				<div class="item item-product-cat">					
					<div class="item-name">
						<h3><a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>"><?php sw_trim_words( $term->name, $title_length ); ?></a></h3>
					</div>
					<?php if( count( $termchild ) > 0 ){ ?>			
					<div class="item-childcat">				
						<?php 					
							echo '<ul>';
							foreach ( $termchild as $key => $child ) {
								echo '<li><a href="' . get_term_link( $child->term_id, 'product_cat' ) . '">' . $child->name . '</a></li>';
							}
							echo '</ul>';
						?>
					</div>
					<?php } ?>
				</div>
			<?php endif; ?>
		<?php } ?>
		</div>
	</div>
</div>		