<?php 	
	$topdeal_page_footer   	 = ( get_post_meta( get_the_ID(), 'page_footer_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_footer_style', true ) : topdeal_options()->getCpanelValue( 'footer_style' );
	$topdeal_copyright_text 	 = topdeal_options()->getCpanelValue( 'footer_copyright' ); 
	$footer_style = topdeal_options()->getCpanelValue( 'footer_style2' );
?>

<footer id="footer" class="footer default theme-clearfix <?php echo esc_attr( $footer_style ); ?>">
	<!-- Content footer -->
	<div class="container">
		<?php 
			if( $topdeal_page_footer != '' ) :
				echo sw_get_the_content_by_id( $topdeal_page_footer ); 
			else: ?>
			<div class="copyright-text">
				<?php if( $topdeal_copyright_text == '' ) : ?>
					<p>&copy;<?php echo date('Y') .' '. esc_html__('All Rights Reserved. Designed by ','topdeal'); ?><a class="mysite" href=" "><?php esc_html_e('WpThemeGo.com','topdeal');?></a>.</p>
				<?php else : ?>
					<?php echo wp_kses( $topdeal_copyright_text, array( 'a' => array( 'href' => array(), 'title' => array(), 'class' => array() ), 'p' => array()  ) ) ; ?>
				<?php endif; ?>
			</div>
		<?php	endif; ?>
	</div>
</footer>