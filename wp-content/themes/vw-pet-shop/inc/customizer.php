<?php
/**
 * VW Pet Shop Theme Customizer
 *
 * @package VW Pet Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_pet_shop_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_pet_shop_custom_controls' );

function vw_pet_shop_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'blogname', array( 
        'selector' => '.logo-responsive h1.site-title a, .logo-responsive p.site-title a', 
        'render_callback' => 'vw_pet_shop_customize_partial_blogname', 
    )); 

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
        'selector' => 'p.site-description', 
        'render_callback' => 'vw_pet_shop_customize_partial_blogdescription', 
    ));

	//add home page setting pannel
	$VWPetShopParentPanel = new VW_Pet_Shop_WP_Customize_Panel( $wp_customize, 'vw_pet_shop_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-pet-shop' ),
		'priority' => 10,
	));

	$wp_customize->add_panel( $VWPetShopParentPanel );

	$HomePageParentPanel = new VW_Pet_Shop_WP_Customize_Panel( $wp_customize, 'vw_pet_shop_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-pet-shop' ),
		'panel' => 'vw_pet_shop_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar section
	$wp_customize->add_section('vw_pet_shop_topbar',array(
		'title'	=> __('Topbar Section','vw-pet-shop'),
		'description'	=> __('Add Header Content here','vw-pet-shop'),
		'priority'	=> null,
		'panel' => 'vw_pet_shop_homepage_panel',
	));

   	// Header Background color
	$wp_customize->add_setting('vw_pet_shop_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_header_background_color', array(
		'label'    => __('header Background Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_topbar',
	)));

	$wp_customize->add_setting( 'vw_pet_shop_topbar_hide_show',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_topbar_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-pet-shop' ),
      'section' => 'vw_pet_shop_topbar'
    )));

    $wp_customize->add_setting('vw_pet_shop_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_pet_shop_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-pet-shop' ),
        'section' => 'vw_pet_shop_topbar'
    )));

    $wp_customize->add_setting('vw_pet_shop_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_topbar',
		'type'=> 'text'
	));

    //Search
    $wp_customize->add_setting( 'vw_pet_shop_topbar_search',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_topbar_search',
       array(
		'label' => esc_html__( 'Show / Hide Search','vw-pet-shop' ),
		'section' => 'vw_pet_shop_topbar'
    )));

    $wp_customize->add_setting('vw_pet_shop_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_search_icon',array(
		'label'	=> __('Add Search Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_pet_shop_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_search_font_size',array(
		'label'	=> __('Search Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_shop_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_header_callnumber', array( 
        'selector' => '.contact_details ul li span', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_header_callnumber', 
    ));

    $wp_customize->add_setting('vw_pet_shop_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_call_icon',array(
		'label'	=> __('Add Contact Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_call_icon',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting('vw_pet_shop_header_callnumber',array(
		'default'	=> '',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_pet_shop_header_callnumber',array(
		'label'	=> __('Add Contact Details','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_callnumber',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_email_icon',array(
		'default'	=> 'far fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_email_icon',array(
		'label'	=> __('Add Email Address Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_header_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_pet_shop_header_email_address',array(
		'label'	=> __('Add Email Address','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_timing_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_timing_icon',array(
		'label'	=> __('Add Time Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_timing_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_header_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_header_time',array(
		'label'	=> __('Add Time','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_myaccount_icon',array(
		'default'	=> 'fas fa-download',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_myaccount_icon',array(
		'label'	=> __('Add My Account Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_myaccount_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_header_myaccount_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_pet_shop_header_myaccount_url',array(
		'label'	=> __('Add My Account Page Link','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_myaccount_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('vw_pet_shop_cart_icon',array(
		'default'	=> 'fas fa-cart-arrow-down',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_cart_icon',array(
		'label'	=> __('Add Cart Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_cart_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'vw_pet_shop_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-pet-shop' ),
		'panel' => 'vw_pet_shop_homepage_panel'
	) );

	$wp_customize->add_setting('vw_pet_shop_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-pet-shop'),
        'section' => 'vw_pet_shop_menu_section',
        'choices' => array(
        	'100' => __('100','vw-pet-shop'),
            '200' => __('200','vw-pet-shop'),
            '300' => __('300','vw-pet-shop'),
            '400' => __('400','vw-pet-shop'),
            '500' => __('500','vw-pet-shop'),
            '600' => __('600','vw-pet-shop'),
            '700' => __('700','vw-pet-shop'),
            '800' => __('800','vw-pet-shop'),
            '900' => __('900','vw-pet-shop'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_pet_shop_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','vw-pet-shop'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-pet-shop'),
            'Capitalize' => __('Capitalize','vw-pet-shop'),
            'Lowercase' => __('Lowercase','vw-pet-shop'),
        ),
		'section'=> 'vw_pet_shop_menu_section',
	));

	$wp_customize->add_setting('vw_pet_shop_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_pet_shop_menu_section',
		'label' => __('Menu Item Hover Style','vw-pet-shop'),
		'choices' => array(
            'None' => __('None','vw-pet-shop'),
            'Zoom In' => __('Zoom In','vw-pet-shop'),
        ),
	) );

	$wp_customize->add_setting('vw_pet_shop_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_shop_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_shop_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_menu_section',
	)));

	$wp_customize->add_setting('vw_pet_shop_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_menu_section',
	)));
	
	//home page slider
    $wp_customize->add_section( 'vw_pet_shop_slidersettings' , array(
      'title'      => __( 'Slider Settings', 'vw-pet-shop' ),
      'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-pet-wordpress-theme/">GO PRO</a>','vw-pet-shop'),
      'priority'   => null,
      'panel' => 'vw_pet_shop_homepage_panel'
    ) );

    $wp_customize->add_setting( 'vw_pet_shop_slider_hide_show', array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_slider_hide_show', array(
		'label' => esc_html__( 'Show / Hide Slider','vw-pet-shop' ),
		'section' => 'vw_pet_shop_slidersettings'
    )));

     $wp_customize->add_setting('vw_pet_shop_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	) );
	$wp_customize->add_control('vw_pet_shop_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-pet-shop'),
        'section' => 'vw_pet_shop_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-pet-shop'),
            'Advance slider' => __('Advance slider','vw-pet-shop'),
        ),
	));

	$wp_customize->add_setting('vw_pet_shop_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-pet-shop'),
		'section'=> 'vw_pet_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_slider_hide_show',array(
        'selector'        => '.slider .inner_carousel h1',
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_slider_hide_show',
    ));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_pet_shop_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_pet_shop_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_pet_shop_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-pet-shop' ),
			'description' => __('Slider image size (1500 x 590)','vw-pet-shop'),
			'section'  => 'vw_pet_shop_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_pet_shop_default_slider'
		));
	}

	$wp_customize->add_setting('vw_pet_shop_slider_button_text',array(
		'default'=> 'Shop More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Shop More', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_default_slider'
	));

	$wp_customize->add_setting( 'vw_pet_shop_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-pet-shop' ),
		'section' => 'vw_pet_shop_slidersettings',
		'active_callback' => 'vw_pet_shop_default_slider'
    )));

	//content layout
	$wp_customize->add_setting('vw_pet_shop_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Shop_Image_Radio_Control($wp_customize, 'vw_pet_shop_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-pet-shop'),
        'section' => 'vw_pet_shop_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
    ),
    	'active_callback' => 'vw_pet_shop_default_slider'
	)));

    //Slider content padding
    $wp_customize->add_setting('vw_pet_shop_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in %. Example:20%','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_default_slider'
	));

	$wp_customize->add_setting('vw_pet_shop_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-pet-shop'),
		'description'	=> __('Enter a value in %. Example:20%','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_pet_shop_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_pet_shop_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_pet_shop_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'vw_pet_shop_default_slider'
	));
	
	//Slider height
	$wp_customize->add_setting('vw_pet_shop_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_slider_height',array(
		'label'	=> __('Slider Height','vw-pet-shop'),
		'description'	=> __('Specify the slider height (px).','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_default_slider'
	));

	$wp_customize->add_setting( 'vw_pet_shop_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_pet_shop_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-pet-shop'),
		'section' => 'vw_pet_shop_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_pet_shop_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_pet_shop_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_pet_shop_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_pet_shop_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-pet-shop'),
	      '0.1' =>  esc_attr('0.1','vw-pet-shop'),
	      '0.2' =>  esc_attr('0.2','vw-pet-shop'),
	      '0.3' =>  esc_attr('0.3','vw-pet-shop'),
	      '0.4' =>  esc_attr('0.4','vw-pet-shop'),
	      '0.5' =>  esc_attr('0.5','vw-pet-shop'),
	      '0.6' =>  esc_attr('0.6','vw-pet-shop'),
	      '0.7' =>  esc_attr('0.7','vw-pet-shop'),
	      '0.8' =>  esc_attr('0.8','vw-pet-shop'),
	      '0.9' =>  esc_attr('0.9','vw-pet-shop')
	),
	'active_callback' => 'vw_pet_shop_default_slider'
	));

	//Pet Collection
	$wp_customize->add_section('vw_pet_shop_products',array(
		'title'	=> __('Pets Collection','vw-pet-shop'),
		'description' => __('For more options of the pet collection section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-pet-wordpress-theme/">GO PRO</a>','vw-pet-shop'),
		'panel' => 'vw_pet_shop_homepage_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial( 'vw_pet_shop_maintitle', array( 
        'selector' => '#our-products h2', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_maintitle',
    ));
	
	$wp_customize->add_setting('vw_pet_shop_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_maintitle',array(
		'label'	=> __('Section Title','vw-pet-shop'),
		'section'=> 'vw_pet_shop_products',
		'setting'=> 'vw_pet_shop_maintitle',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 0; $count++ ) {
		$wp_customize->add_setting( 'vw_pet_shop_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_pet_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_pet_shop_page' . $count, array(
			'label'    => __( 'Select Page', 'vw-pet-shop' ),
			'section'  => 'vw_pet_shop_products',
			'type'     => 'dropdown-pages'
		));
	}

	//Services Section
	$wp_customize->add_section('vw_pet_shop_services', array(
		'title'       => __('Services Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_services_text',array(
		'description' => __('<p>1. More options for services section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for services section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_services',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_services',
		'type'=> 'hidden'
	));

	//pet sale Section
	$wp_customize->add_section('vw_pet_shop_pet_sale', array(
		'title'       => __('Pet Sale Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_pet_sale_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_pet_sale_text',array(
		'description' => __('<p>1. More options for pet sale section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pet sale section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_pet_sale',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_pet_sale_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_pet_sale_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_pet_sale',
		'type'=> 'hidden'
	));

	//record Section
	$wp_customize->add_section('vw_pet_shop_record', array(
		'title'       => __('Record Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_record_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_record_text',array(
		'description' => __('<p>1. More options for record section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for record section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_record',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_record_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_record_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_record',
		'type'=> 'hidden'
	));

	// gallery Section
	$wp_customize->add_section('vw_pet_shop_gallery', array(
		'title'       => __('Gallery Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_gallery_text',array(
		'description' => __('<p>1. More options for gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for gallery section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_gallery',
		'type'=> 'hidden'
	));

	// team Section
	$wp_customize->add_section('vw_pet_shop_team', array(
		'title'       => __('Team Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_team',
		'type'=> 'hidden'
	));

	//pet adoption Section
	$wp_customize->add_section('vw_pet_shop_pet_adoption', array(
		'title'       => __('Pet Adoption Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_pet_adoption_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_pet_adoption_text',array(
		'description' => __('<p>1. More options for pet adoption section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pet adoption section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_pet_adoption',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_pet_adoption_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_pet_adoption_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_pet_adoption',
		'type'=> 'hidden'
	));

	//testimonial Section
	$wp_customize->add_section('vw_pet_shop_testimonial', array(
		'title'       => __('Testimonial Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_testimonial',
		'type'=> 'hidden'
	));

	//newsletter Section
	$wp_customize->add_section('vw_pet_shop_newsletter', array(
		'title'       => __('Newsletter Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_newsletter',
		'type'=> 'hidden'
	));

	//blog Section
	$wp_customize->add_section('vw_pet_shop_blog', array(
		'title'       => __('Blog Section', 'vw-pet-shop'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-pet-shop'),
		'priority'    => null,
		'panel'       => 'vw_pet_shop_homepage_panel',
	));

	$wp_customize->add_setting('vw_pet_shop_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','vw-pet-shop'),
		'section'=> 'vw_pet_shop_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_pet_shop_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_pet_shop_guide') ." '>More Info</a>",
		'section'=> 'vw_pet_shop_blog',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_pet_shop_footer',array(
		'title'	=> __('Footer','vw-pet-shop'),
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/premium-pet-wordpress-theme/">GO PRO</a>','vw-pet-shop'),
		'panel' => 'vw_pet_shop_homepage_panel',
	));	

	$wp_customize->add_setting( 'vw_pet_shop_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_pet_shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','vw-pet-shop' ),
      'section' => 'vw_pet_shop_footer'
    )));

	$wp_customize->add_setting('vw_pet_shop_footer_background_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_footer',
	)));

	$wp_customize->add_setting('vw_pet_shop_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_shop_footer_background_image',array(
        'label' => __('Footer Background Image','vw-pet-shop'),
        'section' => 'vw_pet_shop_footer'
	)));

	// Footer
	$wp_customize->add_setting('vw_pet_shop_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-pet-shop'),
		'choices' => array(
            'fixed' => __('fixed','vw-pet-shop'),
            'scroll' => __('scroll','vw-pet-shop'),
        ),
		'section'=> 'vw_pet_shop_footer',
	));

	// footer padding
	$wp_customize->add_setting('vw_pet_shop_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-pet-shop' ),
    ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-pet-shop'),
        'section' => 'vw_pet_shop_footer',
        'choices' => array(
        	'Left' => __('Left','vw-pet-shop'),
            'Center' => __('Center','vw-pet-shop'),
            'Right' => __('Right','vw-pet-shop')
        ),
	) );

	$wp_customize->add_setting('vw_pet_shop_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-pet-shop'),
        'section' => 'vw_pet_shop_footer',
        'choices' => array(
        	'Left' => __('Left','vw-pet-shop'),
            'Center' => __('Center','vw-pet-shop'),
            'Right' => __('Right','vw-pet-shop')
        ),
	) );

	// footer social icon
  	$wp_customize->add_setting( 'vw_pet_shop_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','vw-pet-shop' ),
		'section' => 'vw_pet_shop_footer'
    )));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_footer_text', array( 
        'selector' => '.copyright p', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_footer_text', 
    ));

	$wp_customize->add_setting( 'vw_pet_shop_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_pet_shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-pet-shop' ),
      'section' => 'vw_pet_shop_footer'
    )));

	$wp_customize->add_setting('vw_pet_shop_copyright_background_color', array(
		'default'           => '#932b82',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_footer',
	)));
	
	$wp_customize->add_setting('vw_pet_shop_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_footer_text',array(
		'label'	=> __('Copyright Text','vw-pet-shop'),
		'section'=> 'vw_pet_shop_footer',
		'setting'=> 'vw_pet_shop_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_pet_shop_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Shop_Image_Radio_Control($wp_customize, 'vw_pet_shop_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-pet-shop'),
        'section' => 'vw_pet_shop_footer',
        'settings' => 'vw_pet_shop_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_pet_shop_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_shop_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-pet-shop' ),
      	'section' => 'vw_pet_shop_footer'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_scroll_top_icon', array( 
        'selector' => '.scrollup i', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_scroll_top_icon', 
    ));

    $wp_customize->add_setting('vw_pet_shop_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_footer',
		'setting'	=> 'vw_pet_shop_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_shop_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_pet_shop_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Shop_Image_Radio_Control($wp_customize, 'vw_pet_shop_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-pet-shop'),
        'section' => 'vw_pet_shop_footer',
        'settings' => 'vw_pet_shop_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
    ))));

    //Blog Post

	$BlogPostParentPanel = new VW_Pet_Shop_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-pet-shop' ),
		'panel' => 'vw_pet_shop_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_pet_shop_post_settings', array(
		'title' => __( 'Post Settings', 'vw-pet-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_pet_shop_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Pet_Shop_Image_Radio_Control($wp_customize, 'vw_pet_shop_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-pet-shop'),
        'section' => 'vw_pet_shop_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_pet_shop_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_pet_shop_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-pet-shop'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-pet-shop'),
        'section' => 'vw_pet_shop_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-pet-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-pet-shop'),
            'One Column' => __('One Column','vw-pet-shop'),
            'Three Columns' => __('Three Columns','vw-pet-shop'),
            'Four Columns' => __('Four Columns','vw-pet-shop'),
            'Grid Layout' => __('Grid Layout','vw-pet-shop')
        ),
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_toggle_postdate', array( 
        'selector' => '.post-main-box h2 a', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_toggle_postdate', 
    ));

	$wp_customize->add_setting( 'vw_pet_shop_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-pet-shop' ),
        'section' => 'vw_pet_shop_post_settings'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-pet-shop' ),
		'section' => 'vw_pet_shop_post_settings'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_pet_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_pet_shop_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
	));
  	$wp_customize->add_control('vw_pet_shop_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_post_settings',
		'choices' => array(
		'default' => __('Default','vw-pet-shop'),
		'custom' => __('Custom Image Size','vw-pet-shop'),
      ),
  	));

	$wp_customize->add_setting('vw_pet_shop_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_pet_shop_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-pet-shop' ),),
		'section'=> 'vw_pet_shop_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_pet_shop_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-pet-shop' ),),
		'section'=> 'vw_pet_shop_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_pet_shop_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_pet_shop_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	));
	$wp_customize->add_control( 'vw_pet_shop_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_pet_shop_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('vw_pet_shop_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-pet-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-pet-shop'),
		'section'=> 'vw_pet_shop_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_pet_shop_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Page posts','vw-pet-shop'),
        'section' => 'vw_pet_shop_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-pet-shop'),
            'Without Blocks' => __('Without Blocks','vw-pet-shop')
        ),
	) );

    $wp_customize->add_setting('vw_pet_shop_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
    ));
    $wp_customize->add_control('vw_pet_shop_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-pet-shop'),
        'section' => 'vw_pet_shop_post_settings',
        'choices' => array(
            'Content' => __('Content','vw-pet-shop'),
            'Excerpt' => __('Excerpt','vw-pet-shop'),
            'No Content' => __('No Content','vw-pet-shop')
        ),
    ) );

    $wp_customize->add_setting('vw_pet_shop_excerpt_suffix',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_pet_shop_excerpt_suffix',array(
        'label' => __('Add Excerpt Suffix','vw-pet-shop'),
        'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-pet-shop' ),
        ),
        'section'=> 'vw_pet_shop_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'vw_pet_shop_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-pet-shop' ),
      'section' => 'vw_pet_shop_post_settings'
    )));

	$wp_customize->add_setting( 'vw_pet_shop_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_pet_shop_blog_pagination_type', array(
        'section' => 'vw_pet_shop_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-pet-shop' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-pet-shop' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-pet-shop' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_pet_shop_button_settings', array(
		'title' => __( 'Button Settings', 'vw-pet-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_button_text', array( 
        'selector' => '.post-main-box .content-bttn a', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_button_text', 
    ));

    $wp_customize->add_setting('vw_pet_shop_button_text',array(
		'default'=> esc_html__('Read More','vw-pet-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_button_text',array(
		'label'	=> __('Add Button Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_pet_shop_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_button_font_size',array(
		'label'	=> __('Button Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-pet-shop' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_pet_shop_button_settings',
	));

	$wp_customize->add_setting( 'vw_pet_shop_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_pet_shop_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-pet-shop' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_pet_shop_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_pet_shop_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-pet-shop'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-pet-shop'),
            'Capitalize' => __('Capitalize','vw-pet-shop'),
            'Lowercase' => __('Lowercase','vw-pet-shop'),
        ),
		'section'=> 'vw_pet_shop_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_pet_shop_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-pet-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_pet_shop_related_post_title', array( 
        'selector' => '.related-post h3', 
        'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_related_post_title', 
    ));

    $wp_customize->add_setting( 'vw_pet_shop_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_related_post',array(
		'label' => esc_html__( 'Related Post','vw-pet-shop' ),
		'section' => 'vw_pet_shop_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_pet_shop_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_pet_shop_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_float'
	));
	$wp_customize->add_control('vw_pet_shop_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_pet_shop_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_pet_shop_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_pet_shop_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-pet-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_pet_shop_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_single_blog_settings',
		'setting'	=> 'vw_pet_shop_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_pet_shop_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_postdate',array(
	    'label' => esc_html__( 'Date','vw-pet-shop' ),
	   'section' => 'vw_pet_shop_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_pet_shop_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_single_blog_settings',
		'setting'	=> 'vw_pet_shop_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_pet_shop_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_author',array(
	    'label' => esc_html__( 'Author','vw-pet-shop' ),
	    'section' => 'vw_pet_shop_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_pet_shop_single_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_single_blog_settings',
		'setting'	=> 'vw_pet_shop_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_shop_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_comments',array(
	    'label' => esc_html__( 'Comments','vw-pet-shop' ),
	    'section' => 'vw_pet_shop_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_pet_shop_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_single_blog_settings',
		'setting'	=> 'vw_pet_shop_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_shop_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_time',array(
	    'label' => esc_html__( 'Time','vw-pet-shop' ),
	    'section' => 'vw_pet_shop_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_pet_shop_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-pet-shop' ),
		'section' => 'vw_pet_shop_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-pet-shop' ),
		'section' => 'vw_pet_shop_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_pet_shop_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','vw-pet-shop' ),
		'section' => 'vw_pet_shop_single_blog_settings'
    )));

   	$wp_customize->add_setting( 'vw_pet_shop_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-pet-shop' ),
		'section' => 'vw_pet_shop_single_blog_settings'
    )));

   	$wp_customize->add_setting('vw_pet_shop_single_post_meta_field_separator',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-pet-shop'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-pet-shop'),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('vw_pet_shop_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-pet-shop'),
		'description'	=> __('Enter a value in %. Example:50%','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'vw_pet_shop_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-pet-shop' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_pet_shop_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_grid_layout_settings',
		'setting'	=> 'vw_pet_shop_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_pet_shop_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_grid_postdate',array(
        'label' => esc_html__( 'Post Date','vw-pet-shop' ),
        'section' => 'vw_pet_shop_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_pet_shop_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_grid_layout_settings',
		'setting'	=> 'vw_pet_shop_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_pet_shop_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_grid_author',array(
		'label' => esc_html__( 'Author','vw-pet-shop' ),
		'section' => 'vw_pet_shop_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_pet_shop_grid_comments_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_pet_shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_grid_layout_settings',
		'setting'	=> 'vw_pet_shop_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_pet_shop_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_grid_comments',array(
		'label' => esc_html__( 'Comments','vw-pet-shop' ),
		'section' => 'vw_pet_shop_grid_layout_settings'
    )));

   // other settings
	$OtherParentPanel = new VW_Pet_Shop_WP_Customize_Panel( $wp_customize, 'vw_pet_shop_other_panel_id', array(
		'title' => __( 'Others Settings', 'vw-pet-shop' ),
		'panel' => 'vw_pet_shop_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	$wp_customize->add_section( 'vw_pet_shop_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-pet-shop' ),
		'priority'   => 30,
		'panel' => 'vw_pet_shop_other_panel_id'
	));

	$wp_customize->add_setting('vw_pet_shop_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Pet_Shop_Image_Radio_Control($wp_customize, 'vw_pet_shop_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-pet-shop'),
        'description' => __('Here you can change the width layout of Website.','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_pet_shop_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-pet-shop'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-pet-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-pet-shop'),
            'One Column' => __('One Column','vw-pet-shop')
        ),
	) );

	$wp_customize->add_setting( 'vw_pet_shop_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_pet_shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-pet-shop' ),
		'section' => 'vw_pet_shop_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'vw_pet_shop_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_animation',array(
        'label' => esc_html__( 'Animation ','vw-pet-shop' ),
        'description' => __('Here you can disable overall site animation effect','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right'
    )));

    $wp_customize->add_setting('vw_pet_shop_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Pet_Shop_Reset_Custom_Control($wp_customize, 'vw_pet_shop_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-pet-shop'),
      'description' => 'vw_pet_shop_reset_all_settings',
      'section' => 'vw_pet_shop_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_pet_shop_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-pet-shop' ),
        'section' => 'vw_pet_shop_left_right'
    )));

	$wp_customize->add_setting('vw_pet_shop_preloader_bg_color', array(
		'default'           => '#932b82',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_left_right',
	)));

	$wp_customize->add_setting('vw_pet_shop_preloader_border_color', array(
		'default'           => '#f33e17',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_left_right',
	)));

	$wp_customize->add_setting('vw_pet_shop_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_shop_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right'
	)));

	//Title Background Image
	$wp_customize->add_setting('vw_pet_shop_title_background_image',array(
		'default'	=> esc_url(get_template_directory_uri()).'/images/defaultbanner.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_pet_shop_title_background_image',array(
        'label' => __('Title Background Image','vw-pet-shop'),
        'description'	=> __('Image size (1600 x 335)','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right'
	)));
    
    //404 Page Setting
	$wp_customize->add_section('vw_pet_shop_404_page',array(
		'title'	=> __('404 Page Settings','vw-pet-shop'),
		'panel' => 'vw_pet_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_pet_shop_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_404_page_title',array(
		'label'	=> __('Add Title','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_404_page_content',array(
		'label'	=> __('Add Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_pet_shop_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-pet-shop'),
		'panel' => 'vw_pet_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_pet_shop_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_no_results_page_title',array(
		'label'	=> __('Add Title','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_pet_shop_no_results_page_content',array(
		'label'	=> __('Add Text','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_pet_shop_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-pet-shop'),
		'panel' => 'vw_pet_shop_other_panel_id',
	));	

	$wp_customize->add_setting('vw_pet_shop_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_social_icon_width',array(
		'label'	=> __('Icon Width','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_social_icon_height',array(
		'label'	=> __('Icon Height','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_pet_shop_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_pet_shop_responsive_media',array(
		'title'	=> __('Responsive Media','vw-pet-shop'),
		'panel' => 'vw_pet_shop_other_panel_id',
	));

	$wp_customize->add_setting( 'vw_pet_shop_resp_topbar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-pet-shop' ),
      'section' => 'vw_pet_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-pet-shop' ),
      'section' => 'vw_pet_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-pet-shop' ),
      'section' => 'vw_pet_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-pet-shop' ),
      'section' => 'vw_pet_shop_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_pet_shop_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-pet-shop' ),
      'section' => 'vw_pet_shop_responsive_media'
    )));

    $wp_customize->add_setting('vw_pet_shop_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_pet_shop_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-pet-shop'),
		'section'  => 'vw_pet_shop_responsive_media',
	)));

    $wp_customize->add_setting('vw_pet_shop_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_responsive_media',
		'setting'	=> 'vw_pet_shop_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_pet_shop_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Pet_Shop_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_pet_shop_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-pet-shop'),
		'transport' => 'refresh',
		'section'	=> 'vw_pet_shop_responsive_media',
		'setting'	=> 'vw_pet_shop_res_menu_close_icon',
		'type'		=> 'icon'
	)));

    //Woocommerce settings
	$wp_customize->add_section('vw_pet_shop_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-pet-shop'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_pet_shop_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_pet_shop_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-pet-shop' ),
		'section' => 'vw_pet_shop_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_pet_shop_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-pet-shop'),
        'section' => 'vw_pet_shop_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-pet-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-pet-shop'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_pet_shop_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_pet_shop_customize_partial_vw_pet_shop_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_pet_shop_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-pet-shop' ),
		'section' => 'vw_pet_shop_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_pet_shop_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-pet-shop'),
        'section' => 'vw_pet_shop_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-pet-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-pet-shop'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_pet_shop_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_float'
	));
	$wp_customize->add_control('vw_pet_shop_products_per_page',array(
		'label'	=> __('Products Per Page','vw-pet-shop'),
		'description' => __('Display on shop page','vw-pet-shop'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_pet_shop_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_pet_shop_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_products_per_row',array(
		'label'	=> __('Products Per Row','vw-pet-shop'),
		'description' => __('Display on shop page','vw-pet-shop'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_pet_shop_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_pet_shop_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_pet_shop_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-pet-shop'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-pet-shop'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-pet-shop' ),
        ),
		'section'=> 'vw_pet_shop_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_pet_shop_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_pet_shop_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_pet_shop_products_button_border_radius', array(
		'default'              => '30',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_pet_shop_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_pet_shop_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-pet-shop' ),
		'section'     => 'vw_pet_shop_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_pet_shop_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control('vw_pet_shop_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-pet-shop'),
        'section' => 'vw_pet_shop_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-pet-shop'),
            'right' => __('Right','vw-pet-shop'),
        ),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_pet_shop_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_pet_shop_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Pet_Shop_Toggle_Switch_Custom_Control( $wp_customize, 'vw_pet_shop_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','vw-pet-shop' ),
        'section' => 'vw_pet_shop_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Pet_Shop_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Pet_Shop_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_pet_shop_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Pet_Shop_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_pet_shop_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Pet_Shop_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_pet_shop_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_pet_shop_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_pet_shop_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Pet_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Pet_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Pet_Shop_Customize_Section_Pro($manager,'vw_pet_shop_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Pet Pro', 'vw-pet-shop' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-pet-shop' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-pet-wordpress-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Pet_Shop_Customize_Section_Pro($manager,'vw_pet_shop_get_started_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-pet-shop' ),
			'pro_text' => esc_html__( 'Docs', 'vw-pet-shop' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-pet-shop/')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-pet-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-pet-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

		wp_localize_script(
		'vw-pet-shop-customize-controls',
		'vw_pet_shop_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Pet_Shop_Customize::get_instance();