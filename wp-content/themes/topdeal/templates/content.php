<?php get_template_part('header'); ?>
<?php 
	$topdeal_sidebar_template = topdeal_options()->getCpanelValue('sidebar_blog') ;
	$topdeal_blog_styles = topdeal_options()->getCpanelValue('blog_layout');
?>

<?php topdeal_breadcrumb_title(); ?>

<div class="container">
	<div class="row sidebar-row">
		<?php if ( is_active_sidebar('left-blog') && $topdeal_sidebar_template == 'left' ):
			$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
			$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
			$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
		<aside id="left" class="sidebar <?php echo esc_attr($topdeal_left_span_class); ?>">
			<?php dynamic_sidebar('left-blog'); ?>
		</aside>

		<?php endif; ?>
		
		<div class="category-contents <?php topdeal_content_blog(); ?>">
			<!-- No Result -->
			<?php if (!have_posts()) : ?>
			<?php get_template_part('templates/no-results'); ?>
			<?php endif; ?>			
			
			<?php 
				$topdeal_blogclass = 'blog-content blog-content-'. $topdeal_blog_styles;
				if( $topdeal_blog_styles == 'grid' ){
					$topdeal_blogclass .= ' row';
				}
			?>
			<div class="<?php echo esc_attr( $topdeal_blogclass ); ?>">
			<?php 			
				while( have_posts() ) : the_post();
					get_template_part( 'templates/content', $topdeal_blog_styles );
				endwhile;
			?>
			<?php get_template_part('templates/pagination'); ?>
			</div>
			<div class="clearfix"></div>
		</div>		
		
		<?php if ( is_active_sidebar('right-blog') && $topdeal_sidebar_template =='right' ):
			$topdeal_right_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_right_expand');
			$topdeal_right_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_right_expand_md');
			$topdeal_right_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_right_expand_sm');
		?>
		<aside id="right" class="sidebar <?php echo esc_attr($topdeal_right_span_class); ?>">
			<?php dynamic_sidebar('right-blog'); ?>
		</aside>
		<?php endif; ?>
	</div>
</div>
<?php get_template_part('footer'); ?>
