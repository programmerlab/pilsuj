<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
	<div class="body-wrapper theme-clearfix">
		<div class="body-wrapper-inner">
			<header id="header" class="header-page">
				<div class="header-shop clearfix">
					<div class="container">
						<div class="back-history"></div>
						<h4 class="title"><?php the_title(); ?></h4>
						<?php if ( has_nav_menu('vertical_menu') ) {?>
								<div class="vertical_megamenu vertical_megamenu_shop pull-right">
									<?php wp_nav_menu(array('theme_location' => 'vertical_menu', 'menu_class' => 'nav vertical-megamenu')); ?>
								</div>
						<?php } ?>
					</div>
				</div>
			</header>
			<div class="container">
					<div class="single main" >
						<?php get_template_part('mlayouts/content', 'single');	?>
					</div>
			</div>
<?php get_template_part('footer'); ?>
