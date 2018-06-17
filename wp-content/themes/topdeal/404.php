<?php get_template_part('header'); ?>
<div class="wrapper_404">
	<div class="container">
		<div class="row">
			<div class="content_404">
				<div class="item-right col-sm-12">
					<div class="block-top">
						<div class="error-top"><?php esc_html_e('Oops','topdeal')?><span><?php esc_html_e(' 404 ','topdeal'); ?></span><?php esc_html_e('page !','topdeal'); ?></div>
						<div class="warning-code"><?php esc_html_e( "It's looking like you may have taken a wrong turn.Don't worry...it happens to the best of us.", 'topdeal' ) ?><br></div>
						<div class="des1"><?php esc_html_e( 'If you want go back to my store. Please in put the ', 'topdeal' ) ?><span class="flag"><?php esc_html_e( 'box below', 'topdeal' ) ?></span></div>
					</div>
					<div class="block-middle clearfix">
						<div class="topdeal_search_404">
							<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
						</div>
					</div>
					<div class="block-bottom">
						<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn-404 back2home" title="<?php esc_attr_e( 'Go Home', 'topdeal' ) ?>"><?php esc_html_e( "Back to home", 'topdeal' )?><i class="fa fa-angle-right"></i></a>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_template_part('footer'); ?>