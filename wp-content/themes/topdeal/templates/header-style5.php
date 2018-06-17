<?php
	/* 
	** Content Header
	*/
	$topdeal_page_header = get_post_meta( get_the_ID(), 'page_header_style', true );
	$topdeal_colorset = topdeal_options()->getCpanelValue('scheme');
	$topdeal_logo = topdeal_options()->getCpanelValue('sitelogo');
	$sticky_menu 		= topdeal_options()->getCpanelValue( 'sticky_menu' );
	$topdeal_page_header  = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : topdeal_options()->getCpanelValue('header_style');
	$topdeal_menu_item 	= ( topdeal_options()->getCpanelValue( 'menu_number_item' ) ) ? topdeal_options()->getCpanelValue( 'menu_number_item' ) : 9;
	$topdeal_more_text 	= ( topdeal_options()->getCpanelValue( 'menu_more_text' ) )	 	 ? topdeal_options()->getCpanelValue( 'menu_more_text' )		: esc_html__( 'See More', 'topdeal' );
	$topdeal_less_text 	= ( topdeal_options()->getCpanelValue( 'menu_less_text' )	)		 ? topdeal_options()->getCpanelValue( 'menu_less_text' )		: esc_html__( 'See Less', 'topdeal' );
	$topdeal_menu_text 	= ( topdeal_options()->getCpanelValue( 'menu_title_text' ) )	 ? topdeal_options()->getCpanelValue( 'menu_title_text' )		: esc_html__( 'All Departments', 'topdeal' );
?>
<header id="header" class="header header-<?php echo esc_attr( $topdeal_page_header );?>">
	<div class="header-top">
		<div class="container">
			<!-- Sidebar Top Menu -->
				<?php if (is_active_sidebar('top1')) {?>
					<div class="top-header">
							<?php dynamic_sidebar('top1'); ?>
					</div>
				<?php }?>
		</div>
	</div>
	
	<div class="header-mid clearfix">
		<div class="container">
			<div class="row">
							
				<div class="header-left col-lg-6 col-md-6 col-sm-6 col-xs-4 pull-left">
					<?php if (is_active_sidebar('bottom-header')) {?>
						<?php dynamic_sidebar('bottom-header'); ?>
					<?php }?>
				</div>
				
				<!-- Logo -->
				<div class="top-header pull-left">
					<div class="topdeal-logo">
						<?php topdeal_logo(); ?>
					</div>
				</div>
				
				<div class="header-right col-lg-6 col-md-6 col-xs-6 pull-right">
										
					<?php if (is_active_sidebar('header-right')) {?>
						<div  class="header-right pull-right">
								<?php dynamic_sidebar('header-right'); ?>
						</div>
					<?php }?>
					
					<div class="search-cate pull-right">
						<i class="fa fa-search"></i>
						<?php if( is_active_sidebar( 'search' ) ): ?>
							<?php dynamic_sidebar( 'search' ); ?>
						<?php else : ?>
						<div class="widget topdeal_top-3 topdeal_top non-margin">
							<div class="widget-inner">
								<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="header-bottom clearfix">
		<div class="container">
			<!-- Logo -->
			<div class="top-header pull-left">
				<div class="topdeal-logo">
					<?php topdeal_logo(); ?>
				</div>
			</div>
			
			<div class="row">		
				<!-- Primary navbar -->
				<?php if ( has_nav_menu('primary_menu') ) { ?>
					<div id="main-menu" class="main-menu clearfix">
						<nav id="primary-menu" class="primary-menu">
							<div class="mid-header clearfix">
								<div class="navbar-inner navbar-inverse">
										<?php
											$topdeal_menu_class = 'nav nav-pills';
											if ( 'mega' == topdeal_options()->getCpanelValue('menu_type') ){
												$topdeal_menu_class .= ' nav-mega';
											} else $topdeal_menu_class .= ' nav-css';
										?>
										<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $topdeal_menu_class)); ?>
								</div>
							</div>
						</nav>
					</div>			
				<?php } ?>
				<!-- /Primary navbar -->
			</div>
			
			<div class="header-sticky pull-right">
				<?php if (is_active_sidebar('header-right')) {?>
					<div  class="header-right pull-right">
							<?php dynamic_sidebar('header-right'); ?>
					</div>
				<?php }?>
				
				<div class="search-cate pull-right">
					<i class="fa fa-search"></i>
					<?php if( is_active_sidebar( 'search' ) ): ?>
						<?php dynamic_sidebar( 'search' ); ?>
					<?php else : ?>
					<div class="widget topdeal_top-3 topdeal_top non-margin">
						<div class="widget-inner">
							<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>