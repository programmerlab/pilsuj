<?php if ( is_active_sidebar('right') ):
	$topdeal_right_span_class = 'col-lg-'.topdeal_options()->getCpanelValue('sidebar_right_expand');
	$topdeal_right_span_class .= ' col-md-'.topdeal_options()->getCpanelValue('sidebar_right_expand_md');
	$topdeal_right_span_class .= ' col-sm-'.topdeal_options()->getCpanelValue('sidebar_right_expand_sm');
?>
<aside id="right" class="sidebar <?php echo esc_attr($topdeal_right_span_class); ?>">
	<?php dynamic_sidebar('right'); ?>
</aside>
<?php endif; ?>