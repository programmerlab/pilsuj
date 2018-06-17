<?php
	/* 
	** Content Header
	*/
	$topdeal_page_header = get_post_meta( get_the_ID(), 'page_header_style', true );
	$topdeal_colorset = topdeal_options()->getCpanelValue('scheme');
	$topdeal_logo = topdeal_options()->getCpanelValue('sitelogo');
	$sticky_menu 		= topdeal_options()->getCpanelValue( 'sticky_menu' );
	$topdeal_page_header  = ( get_post_meta( get_the_ID(), 'page_header_style', true ) != '' ) ? get_post_meta( get_the_ID(), 'page_header_style', true ) : topdeal_options()->getCpanelValue('header_style');
	$topdeal_menu_item 	= ( topdeal_options()->getCpanelValue( 'menu_number_item' ) )  ? topdeal_options()->getCpanelValue( 'menu_number_item' )  : 11;
	$topdeal_mmenu_item	= ( topdeal_options()->getCpanelValue( 'mmenu_number_item' ) ) ? topdeal_options()->getCpanelValue( 'mmenu_number_item' ) : 6;
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
			<!-- Logo -->
				<div class="top-header col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left">
					<div class="topdeal-logo">
						<?php topdeal_logo(); ?>
					</div>
				</div>
			<!-- Sidebar Top Menu -->
								<!-- Primary navbar -->
				<?php if ( has_nav_menu('primary_menu') ) { ?>
					<div id="main-menu" class="main-menu clearfix col-lg-6 col-md-7 pull-left">
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
				
				<div class="header-block col-lg-3 col-md-2 col-sm-4 col-xs-4 pull-right">
					<?php if (is_active_sidebar('bottom-header')) {?>
						<?php dynamic_sidebar('bottom-header'); ?>
					<?php }?>
				</div>
				
			</div>
		</div>
	</div>
	<div class="header-bottom clearfix">
		<div class="container">
			<div class="row">
			
				<?php if ( has_nav_menu('vertical_menu') ) {?>
						<div class="col-lg-3 col-md-3 col-sm-2 col-xs-2 vertical_megamenu vertical_megamenu-header pull-left">
							<div class="mega-left-title"><strong><!-- <?php echo esc_html( $topdeal_menu_text ) ?> -->  Categories</strong></div>
							<div class="vc_wp_custommenu wpb_content_element">
								<div class="wrapper_vertical_menu vertical_megamenu" data-number="<?php echo esc_attr( $topdeal_menu_item ); ?>" data-mnumber="<?php echo esc_attr( $topdeal_mmenu_item ); ?>" data-moretext="<?php echo esc_attr( $topdeal_more_text ); ?>" data-lesstext="<?php echo esc_attr( $topdeal_less_text ); ?>">
									<?php wp_nav_menu(array('theme_location' => 'vertical_menu', 'menu_class' => 'nav vertical-megamenu')); ?>
								</div>
							</div>
						</div>
				<?php } ?>
				
				<div class="search-cate pull-left">
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
				
				<?php if (is_active_sidebar('header-right')) {?>
					<div  class="header-right pull-right">
							<?php dynamic_sidebar('header-right'); ?>
					</div>
				<?php }?>
				
			</div>
		</div>
	</div>
	<?php if (is_active_sidebar('menu-bar')) {?>
		<div class="header-bar" id="nav">
			<?php dynamic_sidebar('menu-bar'); ?>
		</div>
	<?php }?>
</header>