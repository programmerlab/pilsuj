<?php 
	/**
		** Theme: Responsive Slider
		** Author: Smartaddons
		** Version: 1.0
	**/
	//var_dump($category);
	$default = array(
			'category' => $category, 
			'orderby' => $orderby,
			'order' => $order, 
			'numberposts' => $numberposts,
	);
	$list = get_posts($default);
	do_action( 'before' ); 
	$id = 'sw_reponsive_post_slider_'.rand().time();
	$i = 0;
	if ( count($list) > 0 ){
?>
<div class="clear"></div>
<div id="<?php echo esc_attr( $id ) ?>" class="responsive-post-slider2 responsive-slider clearfix loading" data-lg="<?php echo esc_attr( $columns ); ?>" data-md="<?php echo esc_attr( $columns1 ); ?>" data-sm="<?php echo esc_attr( $columns2 ); ?>" data-xs="<?php echo esc_attr( $columns3 ); ?>" data-mobile="<?php echo esc_attr( $columns4 ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>" data-scroll="<?php echo esc_attr( $scroll ); ?>" data-interval="<?php echo esc_attr( $interval ); ?>" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
	<div class="resp-slider-container">
		<div class="block-title"><?php echo ( $title2 != '' ) ? '<h3>'. esc_html( $title2 ) .'</h3>' : ''; ?></div>
		<div class="slider responsive">
			<?php foreach ($list as  $post){ ?>
				<?php if($post->post_content != Null) { ?>
				<?php if( $i % $item_row == 0 ){ ?>
				<div class="item widget-pformat-detail">
				<?php } ?>
					<div class="item-inner">								
						<div class="item-detail">
							<div class="img_over">
								<a href="<?php echo get_permalink($post->ID)?>" >
									<?php 
								if ( has_post_thumbnail( $post->ID ) ){									
										echo get_the_post_thumbnail( $post->ID, 'thumbnail' ) ? get_the_post_thumbnail( $post->ID, 'thumbnail' ): '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'thumbnail'.'.png" alt="No thumb">';		
								}else{
									echo '<img src="'.get_template_directory_uri().'/assets/img/placeholder/'.'thumbnail'.'.png" alt="No thumb">';
								}
							?></a>
							</div>
							<div class="item-content">
								<h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title;?></a></h4>
								<div class="item-meta">
									<div class="author"><?php echo esc_html__(' by ','sw_core'); ?><span><?php echo get_the_author(); ?></span></div>
									<div class="time"><i class="fa fa-calendar"></i><?php echo get_the_time('d M Y', $post->ID); ?></div>
								</div>
							</div>
						</div>
					</div>
				<?php if( ( $i +1 ) % $item_row == 0 ){?> </div><?php } $i++;?>
				<?php } ?>
			<?php }?>
		</div>
	</div>
</div>
<?php } ?>