<?php

/**
 * Add Theme Options page.
 */
function topdeal_theme_admin_page(){
	add_theme_page(
		esc_html__('Theme Options', 'topdeal'),
		esc_html__('Theme Options', 'topdeal'),
		'manage_options',
		'topdeal_theme_options',
		'topdeal_theme_admin_page_content'
	);
}
add_action('admin_menu', 'topdeal_theme_admin_page', 49);

function topdeal_theme_admin_page_content(){ ?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Topdeal Advanced Options Page', 'topdeal' ); ?></h2>
		<?php do_action( 'topdeal_theme_admin_content' ); ?>
	</div>
<?php
}