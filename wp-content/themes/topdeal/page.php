<?php get_header(); ?>
<?php 
	$topdeal_sidebar_template	= get_post_meta( get_the_ID(), 'page_sidebar_layout', true );
	$topdeal_sidebar 					= get_post_meta( get_the_ID(), 'page_sidebar_template', true );
?>

<?php topdeal_breadcrumb_title(); ?>

	<div class="container">
		<div class="row sidebar-row">
		<?php 
			if ( is_active_sidebar( $topdeal_sidebar ) && $topdeal_sidebar_template != 'right' && $topdeal_sidebar_template !='full' ):
			$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
			$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
			$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
			<aside id="left" class="sidebar <?php echo esc_attr( $topdeal_left_span_class ); ?>">
				<?php dynamic_sidebar( $topdeal_sidebar ); ?>
			</aside>
		<?php endif; ?>
		
			<div id="contents" role="main" class="main-page <?php topdeal_content_page(); ?>">
				<?php
				get_template_part('templates/content', 'page')
				?>
			</div>
			<?php 
			if ( is_active_sidebar( $topdeal_sidebar ) && $topdeal_sidebar_template != 'left' && $topdeal_sidebar_template !='full' ):
				$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
				$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
				$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
			?>
				<aside id="right" class="sidebar <?php echo esc_attr($topdeal_left_span_class); ?>">
					<?php dynamic_sidebar( $topdeal_sidebar ); ?>
				</aside>
			<?php endif; ?>
		</div>		
	</div>
<?php get_footer(); ?>

