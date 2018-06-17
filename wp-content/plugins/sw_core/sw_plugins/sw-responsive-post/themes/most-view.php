<?php 
	/**
		** Theme: Responsive Slider
		** Author: Smartaddons
		** Version: 1.0
	**/

	$default = array(
			'category' => $category,
			'meta_query' => array(
				'key' => 'count_page_hits',
				'value' => 'meta_value_number'),
			'orderby' => $orderby,
			'order' => $order, 
			'numberposts' => $numberposts,
	);
	$list = get_posts($default);
	do_action( 'before' ); 
	$id = 'sw_reponsive_post_slider_'.rand().time();
	if ( count($list) > 0 ){
?>
	<div id="<?php echo esc_attr( $id ) ?>" class="most-view-blog clearfix">
		<div class="box-slider-title">
				<?php echo ( $title2 !='' ) ? '<h2><span>'. $title2 .'</span></h2>' : ''; ?>
		</div>
		<div class="resp-slider-container">
			<div class="slider">
				<?php foreach ($list as $post){
					if (has_post_format('video', $post)) {
						$icon = 'icon-facetime-video';
					}
					elseif (has_post_format('aside', $post)) {
						$icon = 'icon-edit';
					}
					elseif (has_post_format('audio', $post)) {
						$icon = 'icon-volume-down';
					}
					elseif (has_post_format('quote', $post)) {
						$icon = 'icon-quote-left';
					}
					elseif (has_post_format('status', $post)) {
						$icon = 'icon-comment';
					}
					elseif (has_post_format('chat', $post)) {
						$icon = 'icon-comments';
					}
					elseif (has_post_format(array('image', 'gallery'), $post)) {
						$icon = 'icon-picture';
					
								
					}else $icon = 'icon-pencil';
				?>
					<?php if($post->post_content != Null) { ?>
					<div class="item widget-pformat-detail">
						<div class="item-inner widget-post">								
							<div class="widget-thumb">
								<div class="img_over">
									<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID); ?></a>
								</div>
								<div class="entry-content">
									<div class="widget-title">
										<h4><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title;?></a></h4>
									</div>
									<div class="entry-meta">
										<span class="latest_post_date">
											<i class="fa fa-calendar"></i><?php echo get_the_time('d M Y', $post->ID); ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				<?php }?>
			</div>
		</div>
	</div>
<?php } ?>