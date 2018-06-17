<?php 
	global $wp_query;
	if ($wp_query->max_num_pages > 1) : 
?>
<div class="pagination nav-pag pull-right">
<div class="wrap_content clearfix">
	<?php
		global $wp_query;
		echo paginate_links( array(
			'base' => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
			'format' => '',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size' => 2,
			'mid_size' => 2,
			'prev_text' => esc_html__( 'Prev', 'topdeal' ),
			'next_text' => esc_html__( 'Next', 'topdeal' ),
			'type' => 'list',
			
		) );
	?>
</div>
</div>
<?php endif; ?>
<!--End Pagination-->