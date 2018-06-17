<?php get_template_part('header'); ?>

<?php topdeal_breadcrumb_title(); ?>

<div class="container">
	<div class="row sidebar-row">		
		<?php if ( is_active_sidebar('left-blog') && topdeal_sidebar_template() == 'left' ):
			$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
			$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
			$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
		<aside id="left" class="sidebar <?php echo esc_attr($topdeal_left_span_class); ?>">
			<?php dynamic_sidebar('left-blog'); ?>
		</aside>
		<?php endif; ?>
		
		<div class="single main <?php topdeal_content_blog(); ?>" >
			<?php while (have_posts()) : the_post(); ?>
			<?php $related_post_column = topdeal_options()->getCpanelValue('sidebar_blog'); ?>
			<div <?php post_class(); ?>>
				<?php $pfm = get_post_format();?>
				<div class="entry-wrap">
					<?php if( $pfm == '' || $pfm == 'image' ){?>
						<?php if( has_post_thumbnail() ){ ?>
							<div class="entry-thumb single-thumb">
								<?php the_post_thumbnail('full'); ?>
							</div>
						<?php }?>
					<?php } ?>
					<?php topdeal_get_time() ?>
					<div class="entry-content clearfix">
						<div class="entry-meta clearfix">
							<span class="entry-author">
								<?php esc_html_e('Post By', 'topdeal'); ?> <?php the_author_posts_link(); ?>
							</span>
							<span class="entry-comment">
								<a href="<?php comments_link(); ?>"><?php echo $post-> comment_count .  ( ($post-> comment_count) > 1 ? esc_html__('  Comments', 'topdeal') : esc_html__('  Comment', 'topdeal')); ?></a>
							</span>
						</div>
						<div class="entry-summary single-content ">
							<?php the_content(); ?>
							
							<div class="clear"></div>
							<!-- link page -->
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'topdeal' ).'</span>', 'after' => '</div>' , 'link_before' => '<span>', 'link_after'  => '</span>' ) ); ?>	
						</div>
						
						<div class="clear"></div>			
						<div class="single-content-bottom clearfix">
							<!-- Tag -->
							
						</div>
					</div>
				</div>
				
				<div class="clearfix"></div> 
				<?php if( get_the_author_meta( 'description',  $post->post_author ) != '' ): ?>
				<div id="authorDetails" class="clearfix">
					<div class="authorDetail">
						<div class="title-author"><?php echo esc_html__('author','topdeal');?></div>
						<div class="avatar">
							<?php echo get_avatar( $post->post_author , 100 ); ?>
						</div>
						<div class="infomation">
							<h4 class="name-author"><span><?php echo esc_html__('About: ','topdeal')?><?php echo get_the_author_meta( 'user_nicename', $post->post_author )?></span></h4>
							<p><?php the_author_meta( 'description',  $post->post_author ) ;?></p>
						</div>
					</div>
				</div> 
				<?php endif; ?>
				<div class="clearfix"></div>
				<!-- Relate Post -->
				<?php 
					global $post;
					global $related_term;
					$class_col= "";
					$categories = get_the_category($post->ID);								
					$category_ids = array();
					foreach($categories as $individual_category) {$category_ids[] = $individual_category->term_id;}
					if ($categories) {
						if($related_post_column =='full'){
							$class_col .= 'col-lg-4 col-md-4 col-sm-4';
							$related = array(
								'category__in' => $category_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>3,
								'orderby'	=> 'name',	
								'ignore_sticky_posts'=>1
								 );
						} else {
							$class_col .= 'col-lg-6 col-md-6 col-sm-6 col-xs-6';
							$related = array(
								'category__in' => $category_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>2,
								'orderby'	=> 'name',	
								'ignore_sticky_posts'=>1
								 );
						} 
				?>
						<div class="single-post-relate">
							<h4><?php esc_html_e('Related News', 'topdeal'); ?></h4>
							<div class="row">
							<?php
								$related_term = new WP_Query($related);
								while($related_term -> have_posts()):$related_term -> the_post();
									$format = get_post_format();
							?>
								<div <?php post_class( $class_col ); ?> >
									<?php if ( get_the_post_thumbnail() ) { ?>
									<div class="item-relate-img">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
									<?php } ?>

									<div class="item-relate-content">
										<?php topdeal_get_time(); ?>
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<div class="description">
										<?php
												$text = strip_shortcodes( $post->post_content );
												$text = apply_filters('the_content', $text);
												$text = str_replace(']]>', ']]&gt;', $text);
												$content = wp_trim_words($text, 15,'...');
												echo esc_html($content);
											?>
										</div>
										<div class="entry-meta">
											<span class="entry-author">
												<?php esc_html_e('Post By', 'topdeal'); ?> <?php the_author_posts_link(); ?>
											</span>
											<span class="entry-comment">
												<a href="<?php comments_link(); ?>"><?php echo $post-> comment_count .  ( ($post-> comment_count) > 1 ? esc_html__('  Comments', 'topdeal') : esc_html__('  Comment', 'topdeal')); ?></a>
											</span>
										</div>
									</div>
								</div>
								<?php
									endwhile;
									wp_reset_postdata();
								?>
							</div>
						</div>
						<?php } ?>
					
					<div class="clearfix"></div>
					<!-- Comment Form -->
					<?php comments_template('/templates/comments.php'); ?>
			</div>
			<?php endwhile; ?>
		</div>

		<?php if ( is_active_sidebar('right-blog') && topdeal_sidebar_template() == 'right' ):
			$topdeal_right_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_right_expand');
			$topdeal_right_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_right_expand_md');
			$topdeal_right_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_right_expand_sm');
		?>
		<aside id="right" class="sidebar <?php echo esc_attr( $topdeal_right_span_class ); ?>">
			<?php dynamic_sidebar('right-blog'); ?>
		</aside>
		<?php endif; ?>
	</div>	
</div>
<?php get_template_part('footer'); ?>
