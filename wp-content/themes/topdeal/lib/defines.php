<?php
$lib_dir = trailingslashit( str_replace( '\\', '/', get_template_directory() . '/lib/' ) );

if( !defined('TOPDEAL_DIR') ){
	define( 'TOPDEAL_DIR', $lib_dir );
}

if( !defined('TOPDEAL_URL') ){
	define( 'TOPDEAL_URL', trailingslashit( get_template_directory_uri() ) . 'lib' );
}

if( !defined('TOPDEAL_OPTIONS_URL') ){
	define( 'TOPDEAL_OPTIONS_URL', trailingslashit( get_template_directory_uri() ) . 'lib/options/' ); 
}

if ( !defined('SW_THEME') ){
 define( 'SW_THEME', 'topdeal_theme' );
}

defined('TOPDEAL_THEME') or die;

if (!isset($content_width)) { $content_width = 940; }

define("TOPDEAL_PRODUCT_TYPE","product");
define("TOPDEAL_PRODUCT_DETAIL_TYPE","product_detail");

require_once( get_template_directory().'/lib/options.php' );
function topdeal_Options_Setup(){
	global $topdeal_options, $options, $options_args;

	$options = array();
	$options[] = array(
			'title' => esc_html__('General', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">The theme allows to build your own styles right out of the backend without any coding knowledge. Upload new logo and favicon or get their URL.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_019_cogwheel.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(	
					
					array(
						'id' => 'sitelogo',
						'type' => 'upload',
						'title' => esc_html__('Logo Image', 'topdeal'),
						'sub_desc' => esc_html__( 'Use the Upload button to upload the new logo and get URL of the logo', 'topdeal' ),
						'std' => get_template_directory_uri().'/assets/img/logo-default.png'
					),
					
					array(
							'id' => 'bg_breadcrumb',
							'type' => 'upload',
							'title' => esc_html__('Breadcrumb Background', 'topdeal'),
							'sub_desc' => esc_html__( 'Use upload button to upload custom background for breadcrumb.', 'topdeal' ),
							'std' => ''
						),
	
					array(
						'id' => 'favicon',
						'type' => 'upload',
						'title' => esc_html__('Favicon', 'topdeal'),
						'sub_desc' => esc_html__( 'Use the Upload button to upload the custom favicon', 'topdeal' ),
						'std' => get_template_directory_uri().'/assets/img/favicon.ico'
					),
					
					array(
						'id' => 'tax_select',
						'type' => 'multi_select_taxonomy',
						'title' => esc_html__('Select Taxonomy', 'topdeal'),
						'sub_desc' => esc_html__( 'Select taxonomy to show custom term metabox', 'topdeal' ),
					),
					
					array(
						'id' => 'title_length',
						'type' => 'text',
						'title' => esc_html__('Title Length Of Item Listing Page', 'topdeal'),
						'sub_desc' => esc_html__( 'Choose title length if you want to trim word, leave 0 to not trim word', 'topdeal' ),
						'std' => 0
					)					
			)	
		);
	
	$options[] = array(
			'title' => esc_html__('Schemes', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">Custom color scheme for theme. Unlimited color that you can choose.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_163_iphone.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(		
				array(
					'id' => 'scheme',
					'type' => 'radio_img',
					'title' => esc_html__('Color Scheme', 'topdeal'),
					'sub_desc' => esc_html__( 'Select one of 3 predefined schemes', 'topdeal' ),
					'desc' => '',
					'options' => array(
									'default' => array('title' => 'Default', 'img' => get_template_directory_uri().'/assets/img/default.png'),
									'pink' => array('title' => 'Pink', 'img' => get_template_directory_uri().'/assets/img/pink.png'),
									'red' => array('title' => 'Red', 'img' => get_template_directory_uri().'/assets/img/red.png'),
									'blue' => array('title' => 'Blue', 'img' => get_template_directory_uri().'/assets/img/blue.png'),
									), //Must provide key => value(array:title|img) pairs for radio options
					'std' => 'default'
				),
					
				array(
					'id' => 'developer_mode',
					'title' => esc_html__( 'Developer Mode', 'topdeal' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( 'Turn on/off compile less to css and custom color', 'topdeal' ),
					'desc' => '',
					'std' => '0'
				),
				
				array(
					'id' => 'scheme_color',
					'type' => 'color',
					'title' => esc_html__('Color', 'topdeal'),
					'sub_desc' => esc_html__('Select main custom color.', 'topdeal'),
					'std' => ''
				),
						
			)
	);
	
	$options[] = array(
			'title' => esc_html__('Layout', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">SmartAddons Framework comes with a layout setting that allows you to build any number of stunning layouts and apply theme to your entries.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_319_sort.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
					array(
						'id' => 'layout',
						'type' => 'select',
						'title' => esc_html__('Box Layout', 'topdeal'),
						'sub_desc' => esc_html__( 'Select Layout Box or Wide', 'topdeal' ),
						'options' => array(
							'full' => esc_html__( 'Wide', 'topdeal' ),
							'boxed' => esc_html__( 'Boxed', 'topdeal' )
						),
						'std' => 'wide'
					),
				
					array(
						'id' => 'bg_box_img',
						'type' => 'upload',
						'title' => esc_html__('Background Box Image', 'topdeal'),
						'sub_desc' => '',
						'std' => ''
					),
					array(
							'id' => 'sidebar_left_expand',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12', 
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '3',
							'sub_desc' => esc_html__( 'Select width of left sidebar.', 'topdeal' ),
						),
					
					array(
							'id' => 'sidebar_right_expand',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '3',
							'sub_desc' => esc_html__( 'Select width of right sidebar medium desktop.', 'topdeal' ),
						),
						array(
							'id' => 'sidebar_left_expand_md',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Medium Desktop Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of left sidebar medium desktop.', 'topdeal' ),
						),
					array(
							'id' => 'sidebar_right_expand_md',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Medium Desktop Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of right sidebar.', 'topdeal' ),
						),
						array(
							'id' => 'sidebar_left_expand_sm',
							'type' => 'select',
							'title' => esc_html__('Left Sidebar Tablet Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of left sidebar tablet.', 'topdeal' ),
						),
					array(
							'id' => 'sidebar_right_expand_sm',
							'type' => 'select',
							'title' => esc_html__('Right Sidebar Tablet Expand', 'topdeal'),
							'options' => array(
									'2' => '2/12',
									'3' => '3/12',
									'4' => '4/12',
									'5' => '5/12',
									'6' => '6/12',
									'7' => '7/12',
									'8' => '8/12',
									'9' => '9/12',
									'10' => '10/12',
									'11' => '11/12',
									'12' => '12/12'
								),
							'std' => '4',
							'sub_desc' => esc_html__( 'Select width of right sidebar tablet.', 'topdeal' ),
						),				
				)
		);
	
	$options[] = array(
		'title' => esc_html__('Header & Footer', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">SmartAddons Framework comes with a header and footer setting that allows you to build style header.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_336_read_it_later.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
				 array(
					'id' => 'header_style',
					'type' => 'select',
					'title' => esc_html__('Header Style', 'topdeal'),
					'sub_desc' => esc_html__('Select Header style', 'topdeal'),
					'options' => array(
							'style1'  => esc_html__( 'Style 1', 'topdeal' ),
							'style2'  => esc_html__( 'Style 2', 'topdeal' ),
							'style3'  => esc_html__( 'Style 3', 'topdeal' ),
							'style4'  => esc_html__( 'Style 4', 'topdeal' ),
							'style5'  => esc_html__( 'Style 5', 'topdeal' ),
							),
					'std' => 'style1'
				),
				
				array(
					'id' => 'header_mid',
					'title' => esc_html__( 'Enable Background Header Mid', 'topdeal' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( ' enable background hedaer mid on header', 'topdeal' ),
					'desc' => '',
					'std' => '0'
				),
				
				array(
						'id' => 'bg_header_mid',
						'title' => esc_html__( 'Background header mid', 'topdeal' ),
						'type' => 'upload',
						'sub_desc' => esc_html__( 'Choose header mid background image', 'topdeal' ),
						'desc' => '',
						'std' => get_template_directory_uri().'/assets/img/popup/bg-main.jpg'
					),
					
				array(
					'id' => 'disable_search',
					'title' => esc_html__( 'Disable Search', 'topdeal' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( 'Check this to disable search on header', 'topdeal' ),
					'desc' => '',
					'std' => '0'
				),
				
				array(
					'id' => 'disable_cart',
					'title' => esc_html__( 'Disable Cart', 'topdeal' ),
					'type' => 'checkbox',
					'sub_desc' => esc_html__( 'Check this to disable cart on header', 'topdeal' ),
					'desc' => '',
					'std' => '0'
				),				
				
				array(
				   'id' => 'footer_style',
				   'type' => 'pages_select',
				   'title' => esc_html__('Footer Style', 'topdeal'),
				   'sub_desc' => esc_html__('Select Footer style', 'topdeal'),
				   'std' => ''
				),
				
			)
	);
	
	$options[] = array(
			'title' => esc_html__('Mobile Layout', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">SmartAddons Framework comes with a mobile setting home page layout.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it revo for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_163_iphone.png',
			//Lets leave this as a revo section, no options just some intro text set above.
			'fields' => array(				
				array(
					'id' => 'mobile_enable',
					'type' => 'checkbox',
					'title' => esc_html__('Enable Mobile Layout', 'topdeal'),
					'sub_desc' => '',
					'desc' => '',
					'std' => '1'// 1 = on | 0 = off
				),
				
				array(
					'id' => 'mobile_logo',
					'type' => 'upload',
					'title' => esc_html__('Logo Mobile Image', 'topdeal'),
					'sub_desc' => esc_html__( 'Use the Upload button to upload the new mobile logo', 'topdeal' ),
					'std' => get_template_directory_uri().'/assets/img/logo-default.png'
				),
				
				array(
					'id' => 'sticky_mobile',
					'type' => 'checkbox',
					'title' => esc_html__('Sticky Mobile', 'topdeal'),
					'sub_desc' => '',
					'desc' => '',
					'std' => '0'// 1 = on | 0 = off
				),
				
				array(
					'id' => 'mobile_content',
					'type' => 'pages_select',
					'title' => esc_html__('Mobile Layout Content', 'topdeal'),
					'sub_desc' => esc_html__('Select content index for this mobile layout', 'topdeal'),
					'std' => ''
				),
				
				array(
					'id' => 'mobile_header_style',
					'type' => 'select',
					'title' => esc_html__('Header Mobile Style', 'topdeal'),
					'sub_desc' => esc_html__('Select header mobile style', 'topdeal'),
					'options' => array(
							'mstyle1'  => esc_html__( 'Style 1', 'topdeal' ),
							'mstyle2'  => esc_html__( 'Style 2', 'topdeal' ),
					),
					'std' => 'style1'
				),
				
				array(
					'id' => 'mobile_footer_style',
					'type' => 'select',
					'title' => esc_html__('Footer Mobile Style', 'topdeal'),
					'sub_desc' => esc_html__('Select footer mobile style', 'topdeal'),
					'options' => array(
							'mstyle1'  => esc_html__( 'Style 1', 'topdeal' ),
					),
					'std' => 'style1'
				)				
			)
	);
			
			
	$options[] = array(
			'title' => esc_html__('Navbar Options', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">If you got a big site with a lot of sub menus we recommend using a mega menu. Just select the dropbox to display a menu as mega menu or dropdown menu.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_157_show_lines.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
				array(
						'id' => 'menu_type',
						'type' => 'select',
						'title' => esc_html__('Menu Type', 'topdeal'),
						'options' => array( 'dropdown' => 'Dropdown Menu', 'mega' => 'Mega Menu' ),
						'std' => 'mega'
					),

				array(
						'id' => 'menu_location',
						'type' => 'menu_location_multi_select',
						'title' => esc_html__('Theme Location', 'topdeal'),
						'sub_desc' => esc_html__( 'Select theme location to active mega menu and menu responsive.', 'topdeal' ),
						'std' => 'primary_menu'
					),		
					
				array(
						'id' => 'sticky_menu',
						'type' => 'checkbox',
						'title' => esc_html__('Active sticky menu', 'topdeal'),
						'sub_desc' => '',
						'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),
					
				array(
						'id' => 'menu_event',
						'type' => 'select',
						'title' => esc_html__('Menu Event', 'topdeal'),
						'options' => array( '' => esc_html__( 'Hover Event', 'topdeal' ), 'click' => esc_html__( 'Click Event', 'topdeal' ) ),
						'std' => ''
					),
				
				array(
					'id' => 'menu_number_item',
					'type' => 'text',
					'title' => esc_html__( 'Number Item Vertical', 'topdeal' ),
					'sub_desc' => esc_html__( 'Number item vertical to show', 'topdeal' ),
					'std' => 8
				),
				
				array(
					'id' => 'menu_title_text',
					'type' => 'text',
					'title' => esc_html__('Vertical Title Text', 'topdeal'),
					'sub_desc' => esc_html__( 'Change title text on vertical menu', 'topdeal' ),
					'std' => ''
				),
				
				array(
					'id' => 'mmenu_number_item',
					'type' => 'text',
					'title' => esc_html__( 'Number Item Vertical Medium Desktop', 'topdeal' ),
					'sub_desc' => esc_html__( 'Number item vertical to show on medium desktop', 'topdeal' ),
					'std' => 6
				),	
				
				array(
					'id' => 'menu_more_text',
					'type' => 'text',
					'title' => esc_html__('Vertical More Text', 'topdeal'),
					'sub_desc' => esc_html__( 'Change more text on vertical menu', 'topdeal' ),
					'std' => ''
				),
					
				array(
					'id' => 'menu_less_text',
					'type' => 'text',
					'title' => esc_html__('Vertical Less Text', 'topdeal'),
					'sub_desc' => esc_html__( 'Change less text on vertical menu', 'topdeal' ),
					'std' => ''
				)	
			)
		);
	$options[] = array(
		'title' => esc_html__('Blog Options', 'topdeal'),
		'desc' => wp_kses( __('<p class="description">Select layout in blog listing page.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it topdeal for default.
		'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_071_book.png',
		//Lets leave this as a topdeal section, no options just some intro text set above.
		'fields' => array(
				array(
						'id' => 'sidebar_blog',
						'type' => 'select',
						'title' => esc_html__('Sidebar Blog Layout', 'topdeal'),
						'options' => array(
								'full' => esc_html__( 'Full Layout', 'topdeal' ),		
								'left'	=>  esc_html__( 'Left Sidebar', 'topdeal' ),
								'right' => esc_html__( 'Right Sidebar', 'topdeal' ),
						),
						'std' => 'left',
						'sub_desc' => esc_html__( 'Select style sidebar blog', 'topdeal' ),
					),
					array(
						'id' => 'blog_layout',
						'type' => 'select',
						'title' => esc_html__('Layout blog', 'topdeal'),
						'options' => array(
								'default'	=>  esc_html__( 'Default Layout', 'topdeal' ),
								'list'	=>  esc_html__( 'List Layout', 'topdeal' ),
								'grid' =>  esc_html__( 'Grid Layout', 'topdeal' )								
						),
						'std' => 'default',
						'sub_desc' => esc_html__( 'Select style layout blog', 'topdeal' ),
					),
					array(
						'id' => 'blog_column',
						'type' => 'select',
						'title' => esc_html__('Blog column', 'topdeal'),
						'options' => array(								
								'2' => '2 columns',
								'3' => '3 columns',
								'4' => '4 columns'								
							),
						'std' => '2',
						'sub_desc' => esc_html__( 'Select style number column blog', 'topdeal' ),
					),
			)
	);	
	$options[] = array(
		'title' => esc_html__('Product Options', 'topdeal'),
		'desc' => wp_kses( __('<p class="description">Select layout in product listing page.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it topdeal for default.
		'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_202_shopping_cart.png',
		//Lets leave this as a topdeal section, no options just some intro text set above.
		'fields' => array(
			array(
				'id' => 'product_banner',
				'title' => esc_html__( 'Select Banner', 'topdeal' ),
				'type' => 'select',
				'sub_desc' => '',
				'options' => array(
						'' => esc_html__( 'Use Banner', 'topdeal' ),
						'listing' => esc_html__( 'Use Category Product Image', 'topdeal' ),
					),
				'std' => '',
			),
			
			array(
				'id' => 'product_listing_banner',
				'type' => 'upload',
				'title' => esc_html__('Listing Banner Product', 'topdeal'),
				'sub_desc' => esc_html__( 'Use the Upload button to upload banner product listing', 'topdeal' ),
				'std' => get_template_directory_uri().'/assets/img/logo-default.png'
			),
			
			array(
				'id' => 'product_col_large',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Desktop', 'topdeal'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '3',
				'sub_desc' => esc_html__( 'Select number of column on Desktop Screen', 'topdeal' ),
			),
			
			array(
				'id' => 'product_col_medium',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Medium Desktop', 'topdeal'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '2',
				'sub_desc' => esc_html__( 'Select number of column on Medium Desktop Screen', 'topdeal' ),
			),
			
			array(
				'id' => 'product_col_sm',
				'type' => 'select',
				'title' => esc_html__('Product Listing column Tablet', 'topdeal'),
				'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',							
					),
				'std' => '2',
				'sub_desc' => esc_html__( 'Select number of column on Tablet Screen', 'topdeal' ),
			),
			
			array(
					'id' => 'sidebar_product',
					'type' => 'select',
					'title' => esc_html__('Sidebar Product Layout', 'topdeal'),
					'options' => array(
							'left'	=> esc_html__( 'Left Sidebar', 'topdeal' ),
							'full' => esc_html__( 'Full Layout', 'topdeal' ),		
							'right' => esc_html__( 'Right Sidebar', 'topdeal' )
					),
					'std' => 'left',
					'sub_desc' => esc_html__( 'Select style sidebar product', 'topdeal' ),
			),
			
			array(
				'id' => 'product_quickview',
				'title' => esc_html__( 'Quickview', 'topdeal' ),
				'type' => 'checkbox',
				'sub_desc' => '',
				'desc' => esc_html__( 'Turn On/Off Product Quickview', 'topdeal' ),
				'std' => '1'
			),
			
			array(
				'id' => 'product_zoom',
				'title' => esc_html__( 'Product Zoom', 'topdeal' ),
				'type' => 'checkbox',
				'sub_desc' => '',
				'desc' => esc_html__( 'Turn On/Off image zoom when hover on single product', 'topdeal' ),
				'std' => '1'
			),
			
			array(
				'id' => 'product_number',
				'type' => 'text',
				'title' => esc_html__('Product Listing Number', 'topdeal'),
				'sub_desc' => esc_html__( 'Show number of product in listing product page.', 'topdeal' ),
				'std' => 12
			),

			array(
				'id' => 'info_typo1',
				'type' => 'info',
				'title' => esc_html( 'Config For Product Categories Widget', 'topdeal' ),
				'desc' => '',
				'class' => 'topdeal-opt-info'
			),

			array(
				'id' => 'product_number_item',
				'type' => 'text',
				'title' => esc_html__( 'Category Number Item Show', 'topdeal' ),
				'sub_desc' => esc_html__( 'Choose to number of item category that you want to show, leave 0 to show all category', 'topdeal' ),
				'std' => 8
			),	
			
			array(
				'id' => 'product_more_text',
				'type' => 'text',
				'title' => esc_html__( 'Category More Text', 'topdeal' ),
				'sub_desc' => esc_html__( 'Change more text on category product', 'topdeal' ),
				'std' => ''
			),
				
			array(
				'id' => 'product_less_text',
				'type' => 'text',
				'title' => esc_html__( 'Category Less Text', 'topdeal' ),
				'sub_desc' => esc_html__( 'Change less text on category product', 'topdeal' ),
				'std' => ''
			)	
		)
);		
	$options[] = array(
			'title' => esc_html__('Typography', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">Change the font style of your blog, custom with Google Font.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_151_edit.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
				array(
					'id' => 'info_typo1',
					'type' => 'info',
					'title' => esc_html( 'Global Typography', 'topdeal' ),
					'desc' => '',
					'class' => 'topdeal-opt-info'
				),
				
				array(
					'id' => 'google_webfonts',
					'type' => 'google_webfonts',
					'title' => esc_html__('Use Google Webfont', 'topdeal'),
					'sub_desc' => esc_html__( 'Insert font style that you actually need on your webpage.', 'topdeal' ), 
					'std' => ''
				),
				
				array(
					'id' => 'webfonts_weight',
					'type' => 'multi_select',
					'sub_desc' => esc_html__( 'For weight, see Google Fonts to custom for each font style.', 'topdeal' ),
					'title' => esc_html__('Webfont Weight', 'topdeal'),
					'options' => array(
							'100' => '100',
							'200' => '200',
							'300' => '300',
							'400' => '400',
							'500' => '500',
							'600' => '600',
							'700' => '700',
							'800' => '800',
							'900' => '900'
						),
					'std' => ''
				),

				array(
					'id' => 'info_typo2',
					'type' => 'info',
					'title' => esc_html( 'Header Tag Typography', 'topdeal' ),
					'desc' => '',
					'class' => 'topdeal-opt-info'
				),
				
				array(
					'id' => 'header_tag_font',
					'type' => 'google_webfonts',
					'title' => esc_html__('Header Tag Font', 'topdeal'),
					'sub_desc' => esc_html__( 'Select custom font for header tag ( h1...h6 )', 'topdeal' ), 
					'std' => ''
				),
				
				array(
					'id' => 'info_typo2',
					'type' => 'info',
					'title' => esc_html( 'Main Menu Typography', 'topdeal' ),
					'desc' => '',
					'class' => 'topdeal-opt-info'
				),
				
				array(
					'id' => 'menu_font',
					'type' => 'google_webfonts',
					'title' => esc_html__('Main Menu Font', 'topdeal'),
					'sub_desc' => esc_html__( 'Select custom font for main menu', 'topdeal' ), 
					'std' => ''
				),
				
			)
		);
	
	$options[] = array(
		'title' => __('Social', 'topdeal'),
		'desc' => wp_kses( __('<p class="description">This feature allow to you link to your social.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
		//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
		//You dont have to though, leave it blank for default.
		'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_222_share.png',
		//Lets leave this as a blank section, no options just some intro text set above.
		'fields' => array(
				array(
						'id' => 'social-share-fb',
						'title' => esc_html__( 'Facebook', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
				array(
						'id' => 'social-share-tw',
						'title' => esc_html__( 'Twitter', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
				array(
						'id' => 'social-share-tumblr',
						'title' => esc_html__( 'Tumblr', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
				array(
						'id' => 'social-share-in',
						'title' => esc_html__( 'Linkedin', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
					array(
						'id' => 'social-share-instagram',
						'title' => esc_html__( 'Instagram', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
				array(
						'id' => 'social-share-go',
						'title' => esc_html__( 'Google+', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => '',
						'desc' => '',
						'std' => '',
					),
				array(
					'id' => 'social-share-pi',
					'title' => esc_html__( 'Pinterest', 'topdeal' ),
					'type' => 'text',
					'sub_desc' => '',
					'desc' => '',
					'std' => '',
				)
					
			)
	);
	
	$options[] = array(
			'title' => esc_html__('Maintaincece Mode', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">Enable and config for Maintaincece mode.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
					array(
						'id' => 'maintaince_enable',
						'title' => esc_html__( 'Enable Maintaincece Mode', 'topdeal' ),
						'type' => 'checkbox',
						'sub_desc' => esc_html__( 'Turn on/off Maintaince mode on this website', 'topdeal' ),
						'desc' => '',
						'std' => '0'
					),
					
					array(
						'id' => 'maintaince_background',
						'title' => esc_html__( 'Maintaince Background', 'topdeal' ),
						'type' => 'upload',
						'sub_desc' => esc_html__( 'Choose maintance background image', 'topdeal' ),
						'desc' => '',
						'std' => get_template_directory_uri().'/assets/img/maintaince/bg-main.jpg'
					),
					
					array(
						'id' => 'maintaince_content',
						'title' => esc_html__( 'Maintaince Content', 'topdeal' ),
						'type' => 'editor',
						'sub_desc' => esc_html__( 'Change text of maintaince mode', 'topdeal' ),
						'desc' => '',
						'std' => ''
					),
					
					array(
						'id' => 'maintaince_date',
						'title' => esc_html__( 'Maintaince Date', 'topdeal' ),
						'type' => 'date',
						'sub_desc' => esc_html__( 'Put date to this field to show countdown date on maintaince mode.', 'topdeal' ),
						'desc' => '',
						'placeholder' => 'mm/dd/yy',
						'std' => ''
					),
					
					array(
						'id' => 'maintaince_form',
						'title' => esc_html__( 'Maintaince Form', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => esc_html__( 'Put shortcode form to this field and it will be shown on maintaince mode frontend.', 'topdeal' ),
						'desc' => '',
						'std' => ''
					),
					
				)
		);
	
	$options[] = array(
			'title' => esc_html__('Popup Config', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">Enable popup and more config for Popup.</p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
					array(
						'id' => 'popup_active',
						'type' => 'checkbox',
						'title' => esc_html__( 'Active Popup Subscribe', 'topdeal' ),
						'sub_desc' => esc_html__( 'Check to active popup subscribe', 'topdeal' ),
						'desc' => '',
						'std' => '0'// 1 = on | 0 = off
					),	
					
					array(
						'id' => 'popup_background',
						'title' => esc_html__( 'Popup Background', 'topdeal' ),
						'type' => 'upload',
						'sub_desc' => esc_html__( 'Choose popup background image', 'topdeal' ),
						'desc' => '',
						'std' => get_template_directory_uri().'/assets/img/popup/bg-main.jpg'
					),
					
					array(
						'id' => 'popup_content',
						'title' => esc_html__( 'Popup Content', 'topdeal' ),
						'type' => 'editor',
						'sub_desc' => esc_html__( 'Change text of popup mode', 'topdeal' ),
						'desc' => '',
						'std' => ''
					),	
					
					array(
						'id' => 'popup_form',
						'title' => esc_html__( 'Popup Form', 'topdeal' ),
						'type' => 'text',
						'sub_desc' => esc_html__( 'Put shortcode form to this field and it will be shown on popup mode frontend.', 'topdeal' ),
						'desc' => '',
						'std' => ''
					),
					
				)
		);
	
	$options[] = array(
			'title' => esc_html__('Advanced', 'topdeal'),
			'desc' => wp_kses( __('<p class="description">Custom advanced with Cpanel, Widget advanced, Developer mode </p>', 'topdeal'), array( 'p' => array( 'class' => array() ) ) ),
			//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
			//You dont have to though, leave it topdeal for default.
			'icon' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_083_random.png',
			//Lets leave this as a topdeal section, no options just some intro text set above.
			'fields' => array(
					array(
						'id' => 'show_cpanel',
						'title' => esc_html__( 'Show cPanel', 'topdeal' ),
						'type' => 'checkbox',
						'sub_desc' => esc_html__( 'Turn on/off Cpanel', 'topdeal' ),
						'desc' => '',
						'std' => ''
					),
					
					array(
						'id' => 'widget-advanced',
						'title' => esc_html__('Widget Advanced', 'topdeal'),
						'type' => 'checkbox',
						'sub_desc' => esc_html__( 'Turn on/off Widget Advanced', 'topdeal' ),
						'desc' => '',
						'std' => '1'
					),					
					
					array(
						'id' => 'social_share',
						'title' => esc_html__( 'Social Share', 'topdeal' ),
						'type' => 'checkbox',
						'sub_desc' => esc_html__( 'Turn on/off social share', 'topdeal' ),
						'desc' => '',
						'std' => '1'
					),
					
					array(
						'id' => 'breadcrumb_active',
						'title' => esc_html__( 'Turn Off Breadcrumb', 'topdeal' ),
						'type' => 'checkbox',
						'sub_desc' => esc_html__( 'Turn off breadcumb on all page', 'topdeal' ),
						'desc' => '',
						'std' => '0'
					),
					
					array(
						'id' => 'back_active',
						'type' => 'checkbox',
						'title' => esc_html__('Back to top', 'topdeal'),
						'sub_desc' => '',
						'desc' => '',
						'std' => '1'// 1 = on | 0 = off
					),	
					
					array(
						'id' => 'direction',
						'type' => 'select',
						'title' => esc_html__('Direction', 'topdeal'),
						'options' => array( 'ltr' => 'Left to Right', 'rtl' => 'Right to Left' ),
						'std' => 'ltr'
					),
					
					array(
						'id' => 'advanced_css',
						'type' => 'textarea',
						'sub_desc' => esc_html__( 'Insert your own CSS into this block. This overrides all default styles located throughout the theme', 'topdeal' ),
						'title' => esc_html__( 'Custom CSS', 'topdeal' )
					),
					
					array(
						'id' => 'advanced_js',
						'type' => 'textarea',
						'placeholder' => esc_html__( 'Example: $("p").hide()', 'topdeal' ),
						'sub_desc' => esc_html__( 'Insert your own JS into this block. This customizes js throughout the theme', 'topdeal' ),
						'title' => esc_html__( 'Custom JS', 'topdeal' )
					)
				)
		);

	$options_args = array();

	//Setup custom links in the footer for share icons
	$options_args['share_icons']['facebook'] = array(
			'link' => 'http://www.facebook.com/wpthemego',
			'title' => 'Facebook',
			'img' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_320_facebook.png'
	);
	$options_args['share_icons']['twitter'] = array(
			'link' => 'https://twitter.com/wpthemego',
			'title' => 'Folow me on Twitter',
			'img' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_322_twitter.png'
	);
	$options_args['share_icons']['linked_in'] = array(
			'link' => '#',
			'title' => 'Find me on LinkedIn',
			'img' => TOPDEAL_URL.'/options/img/glyphicons/glyphicons_337_linked_in.png'
	);


	//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
	$options_args['opt_name'] = TOPDEAL_THEME;

	$options_args['google_api_key'] = 'AIzaSyAL_XMT9t2KuBe2MIcofGl6YF1IFzfB4L4'; //must be defined for use with google webfonts field type

	//Custom menu title for options page - default is "Options"
	$options_args['menu_title'] = esc_html__('Theme Options', 'topdeal');

	//Custom Page Title for options page - default is "Options"
	$options_args['page_title'] = esc_html__('Topdeal Options ', 'topdeal') . wp_get_theme()->get('Name');

	//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "topdeal_theme_options"
	$options_args['page_slug'] = 'topdeal_theme_options';

	//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
	$options_args['page_type'] = 'submenu';

	//custom page location - default 100 - must be unique or will override other items
	$options_args['page_position'] = 27;
	$topdeal_options = new Topdeal_Options( $options, $options_args );
}
add_action( 'admin_init', 'topdeal_Options_Setup', 0 );
topdeal_Options_Setup();

function topdeal_widget_setup_args(){
	$topdeal_widget_areas = array(
		
		array(
				'name' => esc_html__('Sidebar Left Blog', 'topdeal'),
				'id'   => 'left-blog',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		array(
				'name' => esc_html__('Sidebar Right Blog', 'topdeal'),
				'id'   => 'right-blog',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Top Sale Header', 'topdeal'),
				'id'   => 'top',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
		array(
				'name' => esc_html__('Top Header', 'topdeal'),
				'id'   => 'top1',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		array(
				'name' => esc_html__('Header Block', 'topdeal'),
				'id'   => 'bottom-header',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		array(
				'name' => esc_html__('Header Right', 'topdeal'),
				'id'   => 'header-right',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		array(
				'name' => esc_html__('Header Left', 'topdeal'),
				'id'   => 'header-left',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		array(
				'name' => esc_html__('Header Bar', 'topdeal'),
				'id'   => 'menu-bar',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
		array(
				'name' => esc_html__('Sidebar Left Product', 'topdeal'),
				'id'   => 'left-product',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Sidebar Right Product', 'topdeal'),
				'id'   => 'right-product',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Sidebar Left Detail Product', 'topdeal'),
				'id'   => 'left-product-detail',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Sidebar Right Detail Product', 'topdeal'),
				'id'   => 'right-product-detail',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget' => '</div></div>',
				'before_title' => '<div class="block-title-widget"><h2><span>',
				'after_title' => '</span></h2></div>'
		),
		
		array(
				'name' => esc_html__('Sidebar Bottom Detail Product', 'topdeal'),
				'id'   => 'bottom-detail-product',
				'before_widget' => '<div class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
			array(
				'name' => esc_html__('Bottom Detail Product Mobile', 'topdeal'),
				'id'   => 'bottom-detail-product-mobile',
				'before_widget' => '<div class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
		array(
				'name' => esc_html__('Filter Mobile', 'topdeal'),
				'id'   => 'filter-mobile',
				'before_widget' => '<div class="widget %1$s %2$s" data-scroll-reveal="enter bottom move 20px wait 0.2s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
		
		array(
				'name' => esc_html__('Footer Copyright', 'topdeal'),
				'id'   => 'footer-copyright',
				'before_widget' => '<div class="widget %1$s %2$s"><div class="widget-inner">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
		),
	);
	return apply_filters( 'topdeal_widget_register', $topdeal_widget_areas );
}