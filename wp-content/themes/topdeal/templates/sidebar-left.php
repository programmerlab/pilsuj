<?php if ( is_active_sidebar('left') ):
	$topdeal_left_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_left_expand');
	$topdeal_left_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_left_expand_md');
	$topdeal_left_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_left_expand_sm');
?>
<aside id="left" class="sidebar <?php echo esc_attr($topdeal_left_span_class); ?>">
	<?php dynamic_sidebar('left'); ?>
</aside>
<?php endif; ?>