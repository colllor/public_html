<?php
/**
 * Animal Wildlife: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function animal_wildlife_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_panel( 'animal_wildlife_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'animal-wildlife' ),
		'description' => __( 'Description of what this panel does.', 'animal-wildlife' ),
	) );

	// font array
	$animal_wildlife_font_array = array(
		'' => 'No Fonts',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Architects Daughter' => 'Architects Daughter',
		'Arimo' => 'Arimo',
		'Arsenal' => 'Arsenal',
		'Arvo' => 'Arvo',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bangers' => 'Bangers',
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bitter' => 'Bitter',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine',
		'Cabin' => 'Cabin',
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum',
		'Cookie' => 'Cookie',
		'Chewy' => 'Chewy',
		'Days One' => 'Days One',
		'Dosis' => 'Dosis',
		'Droid Sans' => 'Droid Sans',
		'Economica' => 'Economica',
		'Fredoka One' => 'Fredoka One',
		'Fjalla One' => 'Fjalla One',
		'Francois One' => 'Francois One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Handlee' => 'Handlee',
		'Hammersmith One' => 'Hammersmith One',
		'Inconsolata' => 'Inconsolata',
		'Indie Flower' => 'Indie Flower',
		'IM Fell English SC' => 'IM Fell English SC',
		'Julius Sans One' => 'Julius Sans One',
		'Josefin Slab' => 'Josefin Slab',
		'Josefin Sans' => 'Josefin Sans',
		'Kanit' => 'Kanit',
		'Lobster' => 'Lobster',
		'Lato' => 'Lato',
		'Lora' => 'Lora',
		'Libre Baskerville' =>'Libre Baskerville',
		'Lobster Two' => 'Lobster Two',
		'Merriweather' =>'Merriweather',
		'Monda' => 'Monda',
		'Montserrat' => 'Montserrat',
		'Muli' => 'Muli',
		'Marck Script' => 'Marck Script',
		'Noto Serif' => 'Noto Serif',
		'Open Sans' => 'Open Sans',
		'Overpass' => 'Overpass',
		'Overpass Mono' => 'Overpass Mono',
		'Oxygen' => 'Oxygen',
		'Orbitron' => 'Orbitron',
		'Patua One' => 'Patua One',
		'Pacifico' => 'Pacifico',
		'Padauk' => 'Padauk',
		'Playball' => 'Playball',
		'Playfair Display' => 'Playfair Display',
		'PT Sans' => 'PT Sans',
		'Philosopher' => 'Philosopher',
		'Permanent Marker' => 'Permanent Marker',
		'Poiret One' => 'Poiret One',
		'Quicksand' => 'Quicksand',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Raleway' => 'Raleway',
		'Rubik' => 'Rubik',
		'Rokkitt' => 'Rokkitt',
		'Russo One' => 'Russo One',
		'Righteous' => 'Righteous',
		'Slabo' => 'Slabo',
		'Source Sans Pro' => 'Source Sans Pro',
		'Shadows Into Light Two' =>'Shadows Into Light Two',
		'Shadows Into Light' => 'Shadows Into Light',
		'Sacramento' => 'Sacramento',
		'Shrikhand' => 'Shrikhand',
		'Tangerine' => 'Tangerine',
		'Ubuntu' => 'Ubuntu',
		'VT323' => 'VT323',
		'Varela Round' => 'Varela Round',
		'Vampiro One' => 'Vampiro One',
		'Vollkorn' => 'Vollkorn',
		'Volkhov' => 'Volkhov',
		'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
 	);

	//Typography
	$wp_customize->add_section( 'animal_wildlife_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'animal-wildlife' ),
		'panel' => 'animal_wildlife_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'animal_wildlife_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_body_color', array(
		'label' => __('Body Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('animal_wildlife_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_body_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'Body Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('animal_wildlife_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_body_font_size',array(
		'label'	=> __('Body Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_body_font_size',
		'type'	=> 'text'
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_paragraph_color', array(
		'label' => __('Paragraph Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_paragraph_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'Paragraph Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	$wp_customize->add_setting('animal_wildlife_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_atag_color', array(
		'label' => __('"a" Tag Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_atag_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( '"a" Tag Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_li_color', array(
		'label' => __('"li" Tag Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_li_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( '"li" Tag Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h1_color', array(
		'label' => __('H1 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h1_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'H1 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h1_font_size',array(
		'label'	=> __('H1 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h2_color', array(
		'label' => __('h2 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h2_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'h2 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h2_font_size',array(
		'label'	=> __('h2 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h3_color', array(
		'label' => __('h3 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h3_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'h3 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h3_font_size',array(
		'label'	=> __('h3 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h4_color', array(
		'label' => __('h4 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h4_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'h4 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h4_font_size',array(
		'label'	=> __('h4 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h5_color', array(
		'label' => __('h5 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h5_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'h5 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h5_font_size',array(
		'label'	=> __('h5 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'animal_wildlife_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_h6_color', array(
		'label' => __('h6 Color', 'animal-wildlife'),
		'section' => 'animal_wildlife_typography',
		'settings' => 'animal_wildlife_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('animal_wildlife_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control(
		'animal_wildlife_h6_font_family', array(
		'section'  => 'animal_wildlife_typography',
		'label'    => __( 'h6 Fonts','animal-wildlife'),
		'type'     => 'select',
		'choices'  => $animal_wildlife_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('animal_wildlife_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_h6_font_size',array(
		'label'	=> __('h6 Font Size','animal-wildlife'),
		'section'	=> 'animal_wildlife_typography',
		'setting'	=> 'animal_wildlife_h6_font_size',
		'type'	=> 'text'
	));

	// background skin mode
	$wp_customize->add_setting('animal_wildlife_background_image_type',array(
     	'default' => 'Transparent',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_background_image_type',array(
     	'type' => 'radio',
     	'label' => __('Background Skin Mode','animal-wildlife'),
     	'section' => 'background_image',
     	'choices' => array(
         'Transparent' => __('Transparent','animal-wildlife'),
         'Background' => __('Background','animal-wildlife'),
     	),
	) );

  	// woocommerce Options
	$wp_customize->add_section( 'animal_wildlife_shop_page_options', array(
    	'title'      => __( 'Shop Page Settings', 'animal-wildlife' ),
		'panel' => 'animal_wildlife_panel_id'
	) );

	$wp_customize->add_setting('animal_wildlife_display_related_products',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_display_related_products',array(
		'type' => 'checkbox',
		'label' => __('Related Product','animal-wildlife'),
		'section' => 'animal_wildlife_shop_page_options',
	));

	$wp_customize->add_setting('animal_wildlife_shop_products_border',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_shop_products_border',array(
		'type' => 'checkbox',
		'label' => __('Product Border','animal-wildlife'),
		'section' => 'animal_wildlife_shop_page_options',
	));

  	$wp_customize->add_setting('animal_wildlife_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Shop Page Sidebar','animal-wildlife'),
		'section' => 'animal_wildlife_shop_page_options',
	));

 	$wp_customize->add_setting('animal_wildlife_single_product_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_single_product_sidebar',array(
     	'type' => 'checkbox',
   	'label' => __('Enable / Disable Single Product Sidebar','animal-wildlife'),
   	'section' => 'animal_wildlife_shop_page_options',
	));

	$wp_customize->add_setting( 'animal_wildlife_woocommerce_product_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'animal_wildlife_woocommerce_product_per_columns', array(
		'label'    => __( 'Total Products Per Columns', 'animal-wildlife' ),
		'section'  => 'animal_wildlife_shop_page_options',
		'type'     => 'radio',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('animal_wildlife_woocommerce_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_woocommerce_product_per_page',array(
		'label'	=> __('Total Products Per Page','animal-wildlife'),
		'section'	=> 'animal_wildlife_shop_page_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_page_top_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control( 'animal_wildlife_shop_page_top_padding',	array(
		'label' => esc_html__( 'Product Padding (Top Bottom)','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_page_left_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control( 'animal_wildlife_shop_page_left_padding',	array(
		'label' => esc_html__( 'Product Padding (Right Left)','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_page_border_radius',array(
		'default' => 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_shop_page_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_page_box_shadow',array(
		'default' => 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_shop_page_box_shadow',array(
		'label' => esc_html__( 'Product Shadow','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_button_padding_top',array(
		'default' => 9,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_shop_button_padding_top',	array(
		'label' => esc_html__( 'Button Padding (Top Bottom)','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'animal_wildlife_shop_button_padding_left',array(
		'default' => 16,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_shop_button_padding_left',array(
		'label' => esc_html__( 'Button Padding (Right Left)','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'animal_wildlife_shop_button_border_radius',array(
		'default' => 5,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_shop_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('animal_wildlife_position_product_sale',array(
		'default' => 'Right',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_position_product_sale',array(
		'type' => 'radio',
		'label' => __('Product Sale Position','animal-wildlife'),
		'section' => 'animal_wildlife_shop_page_options',
		'choices' => array(
		   'Right' => __('Right','animal-wildlife'),
		   'Left' => __('Left','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting( 'animal_wildlife_border_radius_product_sale_text',array(
		'default' => 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_border_radius_product_sale_text', array(
		'label'  => __('Product Sale Border Radius','animal-wildlife'),
		'section'  => 'animal_wildlife_shop_page_options',
		'type'        => 'number',
		'input_attrs' => array(
			'step'=> 1,
		   'min' => 0,
		   'max' => 50,
		)
    ) );

	$wp_customize->add_setting('animal_wildlife_product_sale_text_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float'
	));
	$wp_customize->add_control('animal_wildlife_product_sale_text_size',array(
		'label'	=> __('Product Sale Text Size','animal-wildlife'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_shop_page_options',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_top_bottom_product_sale_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_top_bottom_product_sale_padding',	array(
		'label' => esc_html__( 'Top / Bottom Product Sale Padding','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'animal_wildlife_left_right_product_sale_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_left_right_product_sale_padding',array(
		'label' => esc_html__( 'Left / Right Product Sale Padding','animal-wildlife' ),
		'section' => 'animal_wildlife_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('animal_wildlife_shop_products_navigation',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_shop_products_navigation',array(
		'type' => 'radio',
		'label' => __('Woocommerce Products Navigation','animal-wildlife'),
		'choices' => array(
		   'Yes' => __('Yes','animal-wildlife'),
		   'No' => __('No','animal-wildlife'),
		),
		'section' => 'animal_wildlife_shop_page_options',
    ));

  	//Layout Settings
	$wp_customize->add_section( 'animal_wildlife_width_layout', array(
    	'title'      => __( 'Layout Settings', 'animal-wildlife' ),
		'panel' => 'animal_wildlife_panel_id'
	) );

	$wp_customize->add_setting( 'animal_wildlife_single_page_breadcrumb',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
  ) );
  $wp_customize->add_control('animal_wildlife_single_page_breadcrumb',array(
  	'type' => 'checkbox',
    'label' => __( 'Show / Hide Single Page Breadcrumb','animal-wildlife'),
    'section' => 'animal_wildlife_width_layout'
  ));

	//Sticky Header
	$wp_customize->add_setting( 'animal_wildlife_fixed_header',array(
		'default' => false,
   	'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
 	) );
 	$wp_customize->add_control('animal_wildlife_fixed_header',array(
    	'type' => 'checkbox',
		'label' => __( 'Enable / Disable Fixed Header','animal-wildlife' ),
		'section' => 'animal_wildlife_width_layout'
    ));

 	$wp_customize->add_setting( 'animal_wildlife_fixed_header_padding_option', array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_fixed_header_padding_option', array(
		'label'       => esc_html__( 'Fixed Header Padding','animal-wildlife' ),
		'section'     => 'animal_wildlife_width_layout',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('animal_wildlife_loader_setting',array(
		'default' => false,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_loader_setting',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Preloader','animal-wildlife'),
		'section' => 'animal_wildlife_width_layout'
	));

 	$wp_customize->add_setting('animal_wildlife_preloader_types',array(
     'default' => 'Default',
     'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_preloader_types',array(
		'type' => 'radio',
		'label' => __('Preloader Option','animal-wildlife'),
		'section' => 'animal_wildlife_width_layout',
		'choices' => array(
		   'Default' => __('Default','animal-wildlife'),
		   'Circle' => __('Circle','animal-wildlife'),
		   'Two Circle' => __('Two Circle','animal-wildlife')
		),
	) );

 	$wp_customize->add_setting( 'animal_wildlife_loader_color_setting', array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'animal-wildlife'),
		'section' => 'animal_wildlife_width_layout',
		'settings' => 'animal_wildlife_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'animal_wildlife_loader_background_color', array(
		'default' => '#000',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'animal-wildlife'),
		'section' => 'animal_wildlife_width_layout',
		'settings' => 'animal_wildlife_loader_background_color',
  	)));

	$wp_customize->add_setting('animal_wildlife_theme_options',array(
    	'default' => 'Default',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_theme_options',array(
		'type' => 'select',
		'label' => __('Container Box','animal-wildlife'),
		'description' => __('Here you can change the Width layout. ','animal-wildlife'),
		'section' => 'animal_wildlife_width_layout',
		'choices' => array(
		   'Default' => __('Default','animal-wildlife'),
		   'Wide Layout' => __('Wide Layout','animal-wildlife'),
		   'Box Layout' => __('Box Layout','animal-wildlife'),
		),
	) );

	// Button Settings
	$wp_customize->add_section( 'animal_wildlife_button_option', array(
		'title' => __('Button','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','animal-wildlife'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('animal_wildlife_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_left_right_padding',array(
		'label'	=> __('Left and Right Padding','animal-wildlife'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','animal-wildlife' ),
		'section'     => 'animal_wildlife_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// sidebar setting
	$wp_customize->add_section( 'animal_wildlife_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'animal-wildlife' ),
		'panel' => 'animal_wildlife_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('animal_wildlife_layout_settings',array(
     	'default' => 'Right Sidebar',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_layout_settings',array(
		'type' => 'radio',
		'label' => __('Post Sidebar Layout','animal-wildlife'),
		'section' => 'animal_wildlife_general_option',
		'description' => __('This option work for blog page, blog single page, archive page and search page.','animal-wildlife'),
		'choices' => array(
		   	'Left Sidebar' => __('Left Sidebar','animal-wildlife'),
		   	'Right Sidebar' => __('Right Sidebar','animal-wildlife'),
		   	'One Column' => __('Full Column','animal-wildlife'),
		   	'Three Columns' => __('Three Columns','animal-wildlife'),
		   	'Four Columns' => __('Four Columns','animal-wildlife'),
		   	'Grid Layout' => __('Grid Layout','animal-wildlife')
		),
	) );

	$wp_customize->add_setting('animal_wildlife_page_sidebar_option',array(
     	'default' => 'One Column',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_page_sidebar_option',array(
     	'type' => 'radio',
     	'label' => __('Page Sidebar Layout','animal-wildlife'),
     	'section' => 'animal_wildlife_general_option',
     	'choices' => array(
         	'Left Sidebar' => __('Left Sidebar','animal-wildlife'),
         	'Right Sidebar' => __('Right Sidebar','animal-wildlife'),
         	'One Column' => __('Full Column','animal-wildlife')
     	),
	) );

	$wp_customize->add_setting('animal_wildlife_single_post_sidebar_option',array(
     	'default' => 'Right Sidebar',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_single_post_sidebar_option',array(
     	'type' => 'radio',
     	'label' => __('Single Post Sidebar Layout','animal-wildlife'),
     	'section' => 'animal_wildlife_general_option',
     	'choices' => array(
         	'Left Sidebar' => __('Left Sidebar','animal-wildlife'),
         	'Right Sidebar' => __('Right Sidebar','animal-wildlife'),
         	'One Column' => __('Full Column','animal-wildlife')
     	),
	) );

	//Topbar section
	$wp_customize->add_section('animal_wildlife_header_section',array(
		'title'	=> __('Header Section','animal-wildlife'),
		'description'	=> __('Add Header Content here','animal-wildlife'),
		'priority'	=> null,
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_header_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_header_button_text',array(
		'label'	=> __('Add Button Text','animal-wildlife'),
		'section'	=> 'animal_wildlife_header_section',
		'setting'	=> 'animal_wildlife_header_button_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('animal_wildlife_header_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('animal_wildlife_header_button_url',array(
		'label'	=> __('Add Button URL','animal-wildlife'),
		'section'	=> 'animal_wildlife_header_section',
		'setting'	=> 'animal_wildlife_header_button_url',
		'type'		=> 'text'
	));

	// navigation menu
	$wp_customize->add_section( 'animal_wildlife_navigation_menu' , array(
    	'title'      => __( 'Navigation Menus Settings', 'animal-wildlife' ),
		'priority'   => null,
		'panel' => 'animal_wildlife_panel_id'
	) );

	$wp_customize->add_setting('animal_wildlife_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_menu_color', array(
		'label'    => __('Menu Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_navigation_menu',
		'settings' => 'animal_wildlife_menu_color',
	)));

	$wp_customize->add_setting('animal_wildlife_sub_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_sub_menu_color', array(
		'label'    => __('Submenu Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_navigation_menu',
		'settings' => 'animal_wildlife_sub_menu_color',
	)));

	$wp_customize->add_setting('animal_wildlife_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_navigation_menu',
		'settings' => 'animal_wildlife_menu_hover_color',
	)));

	$wp_customize->add_setting('animal_wildlife_sub_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_navigation_menu',
		'settings' => 'animal_wildlife_sub_menu_hover_color',
	)));

	$wp_customize->add_setting('animal_wildlife_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_navigation_menu_font_size',array(
		'label'	=> __('Navigation Menus Font Size ','animal-wildlife'),
		'section'=> 'animal_wildlife_navigation_menu',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->add_setting('animal_wildlife_menu_text_tranform',array(
		'default' => 'Default',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
 	$wp_customize->add_control('animal_wildlife_menu_text_tranform',array(
		'type' => 'radio',
		'label' => __('Navigation Menus Text Transform','animal-wildlife'),
		'section' => 'animal_wildlife_navigation_menu',
		'choices' => array(
		   'Default' => __('Default','animal-wildlife'),
		   'Uppercase' => __('Uppercase','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting('animal_wildlife_menu_font_weight',array(
		'default' => 'Default',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_menu_font_weight',array(
		'type' => 'radio',
		'label' => __('Navigation Menus Font Weight','animal-wildlife'),
		'section' => 'animal_wildlife_navigation_menu',
		'choices' => array(
		   'Default' => __('Default','animal-wildlife'),
		   'Normal' => __('Normal','animal-wildlife'),
		),
	) );

	//home page slider
	$wp_customize->add_section( 'animal_wildlife_slider' , array(
    	'title'      => __( 'Slider Settings', 'animal-wildlife' ),
		'priority'   => null,
		'panel' => 'animal_wildlife_panel_id'
	) );

	$wp_customize->add_setting('animal_wildlife_slider_arrows',array(
        'default' => false,
        'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_slider_arrows',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide slider','animal-wildlife'),
   	'section' => 'animal_wildlife_slider',
	));

	$wp_customize->add_setting('animal_wildlife_slider_title',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
 	));
 	$wp_customize->add_control('animal_wildlife_slider_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Slider Title','animal-wildlife'),
		'section' => 'animal_wildlife_slider'
	));

	$wp_customize->add_setting('animal_wildlife_slider_content',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_slider_content',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Slider Content','animal-wildlife'),
		'section' => 'animal_wildlife_slider'
	));

	$wp_customize->add_setting('animal_wildlife_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_slider_button',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Slider Button','animal-wildlife'),
		'section' => 'animal_wildlife_slider'
	));

	$wp_customize->add_setting('animal_wildlife_slider_width_options',array(
    	'default' => 'Full Width',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_slider_width_options',array(
		'type' => 'select',
		'label' => __('Slider Width Layout','animal-wildlife'),
		'description' => __('Here you can change the Slider Width. ','animal-wildlife'),
		'section' => 'animal_wildlife_slider',
		'choices' => array(
		   'Full Width' => __('Full Width','animal-wildlife'),
		   'Container Width' => __('Container Width','animal-wildlife'),
		),
	) );

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'animal_wildlife_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'animal_wildlife_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'animal_wildlife_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'animal-wildlife' ),
			'section'  => 'animal_wildlife_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'animal_wildlife_slider_speed',array(
		'default' => 3000,
		'sanitize_callback'    => 'animal_wildlife_sanitize_number_range',
	));
	$wp_customize->add_control( 'animal_wildlife_slider_speed',array(
		'label' => esc_html__( 'Slider Speed','animal-wildlife' ),
		'section' => 'animal_wildlife_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('animal_wildlife_slider_height_option',array(
		'default'=> 600,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_slider_height_option',array(
		'label'	=> __('Slider Height Option','animal-wildlife'),
		'section'=> 'animal_wildlife_slider',
		'type'=> 'number'
	));

 	$wp_customize->add_setting('animal_wildlife_slider_content_option',array(
    	'default' => __('Center','animal-wildlife'),
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_slider_content_option',array(
		'type' => 'select',
		'label' => __('Slider Content Layout','animal-wildlife'),
		'section' => 'animal_wildlife_slider',
		'choices' => array(
		   'Center' => __('Center','animal-wildlife'),
		   'Left' => __('Left','animal-wildlife'),
		   'Right' => __('Right','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting('animal_wildlife_slider_button_text',array(
		'default'=> __('Make A Donation','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_slider_button_text',array(
		'label'	=> __('Slider Button Text','animal-wildlife'),
		'section'=> 'animal_wildlife_slider',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'animal_wildlife_slider_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'    => 'animal_wildlife_sanitize_number_range',
	) );
	$wp_customize->add_control( 'animal_wildlife_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','animal-wildlife' ),
		'section'     => 'animal_wildlife_slider',
		'type'        => 'range',
		'settings'    => 'animal_wildlife_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('animal_wildlife_slider_opacity_color',array(
      'default'              => 0.7,
      'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control( 'animal_wildlife_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','animal-wildlife' ),
		'section'     => 'animal_wildlife_slider',
		'type'        => 'select',
		'settings'    => 'animal_wildlife_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','animal-wildlife'),
	      '0.1' =>  esc_attr('0.1','animal-wildlife'),
	      '0.2' =>  esc_attr('0.2','animal-wildlife'),
	      '0.3' =>  esc_attr('0.3','animal-wildlife'),
	      '0.4' =>  esc_attr('0.4','animal-wildlife'),
	      '0.5' =>  esc_attr('0.5','animal-wildlife'),
	      '0.6' =>  esc_attr('0.6','animal-wildlife'),
	      '0.7' =>  esc_attr('0.7','animal-wildlife'),
	      '0.8' =>  esc_attr('0.8','animal-wildlife'),
	      '0.9' =>  esc_attr('0.9','animal-wildlife')
		),
	));

	$wp_customize->add_setting('animal_wildlife_padding_top_bottom_slider_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_padding_top_bottom_slider_content',array(
		'label'	=> __('Top Bottom Slider Content Padding','animal-wildlife'),
		'section'=> 'animal_wildlife_slider',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->add_setting('animal_wildlife_padding_left_right_slider_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_padding_left_right_slider_content',array(
		'label'	=> __('Left Right Slider Content Padding','animal-wildlife'),
		'section'=> 'animal_wildlife_slider',
		'input_attrs' => array(
        	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->add_setting('animal_wildlife_show_slider_image_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_show_slider_image_overlay',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Image Overlay Slider','animal-wildlife'),
		'section' => 'animal_wildlife_slider'
	));

	$wp_customize->add_setting('animal_wildlife_color_slider_image_overlay', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_color_slider_image_overlay', array(
		'label'    => __('Image Overlay Slider Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_slider',
		'settings' => 'animal_wildlife_color_slider_image_overlay',
	)));

	//Facility Section
	$wp_customize->add_section('animal_wildlife_donate_section',array(
		'title'	=> __('Donate Section','animal-wildlife'),
		'description'	=> __('Add Donate Section below.','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_donate_section_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_donate_section_text',array(
		'label'	=> __('Section Small Titile','animal-wildlife'),
		'section' => 'animal_wildlife_donate_section',
		'type'	 => 'text'
	));

	$wp_customize->add_setting('animal_wildlife_donate_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_donate_section_title',array(
		'label'	=> __('Section Heading Title','animal-wildlife'),
		'section' => 'animal_wildlife_donate_section',
		'type'	 => 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('animal_wildlife_donate_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices',
	));
	$wp_customize->add_control('animal_wildlife_donate_section_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','animal-wildlife'),
		'section' => 'animal_wildlife_donate_section',
	));

	//no Result Setting
	$wp_customize->add_section('animal_wildlife_no_result_setting',array(
		'title'	=> __('No Results Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_no_search_result_title',array(
		'default'=> __('Nothing Found','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_no_search_result_title',array(
		'label'	=> __('No Search Results Title','animal-wildlife'),
		'section'=> 'animal_wildlife_no_result_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('animal_wildlife_no_search_result_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_no_search_result_content',array(
		'label'	=> __('No Search Results Content','animal-wildlife'),
		'section'=> 'animal_wildlife_no_result_setting',
		'type'=> 'text'
	));

	//404 Page Setting
	$wp_customize->add_section('animal_wildlife_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','animal-wildlife'),
		'section'=> 'animal_wildlife_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('animal_wildlife_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','animal-wildlife'),
		'section'=> 'animal_wildlife_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('animal_wildlife_mobile_media',array(
		'title'	=> __('Mobile Media Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_enable_disable_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_enable_disable_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','animal-wildlife'),
       'section' => 'animal_wildlife_mobile_media'
    ));

	$wp_customize->add_setting('animal_wildlife_enable_disable_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_enable_disable_sidebar',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Sidebar','animal-wildlife'),
		'section' => 'animal_wildlife_mobile_media'
	));

	$wp_customize->add_setting('animal_wildlife_enable_disable_slider',array(
		'default' => false,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_enable_disable_slider',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider','animal-wildlife'),
		'section' => 'animal_wildlife_mobile_media'
	));

	$wp_customize->add_setting('animal_wildlife_show_hide_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_show_hide_slider_button',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Button','animal-wildlife'),
		'section' => 'animal_wildlife_mobile_media'
	));

	$wp_customize->add_setting('animal_wildlife_enable_disable_scrolltop',array(
		'default' => false,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_enable_disable_scrolltop',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Scroll To Top','animal-wildlife'),
		'section' => 'animal_wildlife_mobile_media'
	));

	//Blog Post
	$wp_customize->add_section('animal_wildlife_blog_post',array(
		'title'	=> __('Post Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_caps_enable',
    	array(
        'default' => false,
        'sanitize_callback' => 'animal_wildlife_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'animal_wildlife_caps_enable', 
		array(
			'label' => esc_html__('Initial Cap (First Big Letter)', 'animal-wildlife'),
			'type' => 'checkbox',
			'section' => 'animal_wildlife_blog_post',
	));

	$wp_customize->add_setting('animal_wildlife_date_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_date_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Date','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post'
	));
 	$wp_customize->add_setting('animal_wildlife_post_date_icon_changer',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Animal_Wildlife_Icon_Changer(
     	$wp_customize,'animal_wildlife_post_date_icon_changer',array(
		'label'	=> __('Post Date Icon','animal-wildlife'),
		'transport' => 'refresh',
		'section'	=> 'animal_wildlife_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('animal_wildlife_author_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_author_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Author','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post'
	));

 	$wp_customize->add_setting('animal_wildlife_post_author_icon_changer',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Animal_Wildlife_Icon_Changer(
        $wp_customize,'animal_wildlife_post_author_icon_changer',array(
		'label'	=> __('Post Author Icon','animal-wildlife'),
		'transport' => 'refresh',
		'section'	=> 'animal_wildlife_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('animal_wildlife_comment_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_comment_hide',array(
		'type' => 'checkbox',
		'label' => __('Post Comments','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post'
	));

 	$wp_customize->add_setting('animal_wildlife_post_comment_icon_changer',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Animal_Wildlife_Icon_Changer(
        $wp_customize,'animal_wildlife_post_comment_icon_changer',array(
		'label'	=> __('Post Comment Icon','animal-wildlife'),
		'transport' => 'refresh',
		'section'	=> 'animal_wildlife_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('animal_wildlife_blog_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_blog_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Post Image','animal-wildlife'),
       'section' => 'animal_wildlife_blog_post'
    ));

    $wp_customize->add_setting( 'animal_wildlife_blog_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_blog_post_img_border_radius', array(
		'label'       => esc_html__( 'Post Image Border Radius','animal-wildlife' ),
		'section'     => 'animal_wildlife_blog_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'animal_wildlife_blog_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_blog_post_img_box_shadow',array(
		'label' => esc_html__( 'Post Image Shadow','animal-wildlife' ),
		'section' => 'animal_wildlife_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

 	$wp_customize->add_setting( 'animal_wildlife_blog_post_metabox_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'animal_wildlife_blog_post_metabox_seperator', array(
		'label'       => esc_html__( 'Blog Post Meta Box Seperator','animal-wildlife' ),
		'section'     => 'animal_wildlife_blog_post',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','animal-wildlife'),
		'type'        => 'text',
		'settings'    => 'animal_wildlife_blog_post_metabox_seperator',
	) );

	$wp_customize->add_setting('animal_wildlife_blog_post_layout',array(
		'default' => 'Default',
		'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_blog_post_layout',array(
		'type' => 'radio',
		'label' => __('Post Layout Option','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post',
		'choices' => array(
		   'Default' => __('Default','animal-wildlife'),
		   'Center' => __('Center','animal-wildlife'),
		   'Image and Content' => __('Image and Content','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting('animal_wildlife_post_break_block_setting',array(
     'default' => 'Into Blocks',
     'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_post_break_block_setting',array(
		'type' => 'radio',
		'label' => __('Display Blog Page posts','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post',
		'choices' => array(
		   'Into Blocks' => __('Into Blocks','animal-wildlife'),
		   'Without Blocks' => __('Without Blocks','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting('animal_wildlife_post_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'animal_wildlife_sanitize_choices'
    ));
    $wp_customize->add_control('animal_wildlife_post_image_dimention',array(
       'type' => 'radio',
       'label'	=> __('Post Featured Image Dimention','animal-wildlife'),
       'choices' => array(
            'Default' => __('Default','animal-wildlife'),
            'Custom Image Size' => __('Custom Image Size','animal-wildlife'),
        ),
      	'section'	=> 'animal_wildlife_blog_post'
    ));

    $wp_customize->add_setting( 'animal_wildlife_post_featured_image_width',array(
		'default' => '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_number_range'
	));
	$wp_customize->add_control('animal_wildlife_post_featured_image_width',	array(
		'label' => esc_html__( 'Blog Post Custom Width','animal-wildlife' ),
		'section' => 'animal_wildlife_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'type' => 'range',
		'active_callback' => 'animal_wildlife_enable_image_dimention'
	));

	$wp_customize->add_setting( 'animal_wildlife_post_featured_image_height',array(
		'default' => '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_number_range'
	));
	$wp_customize->add_control('animal_wildlife_post_featured_image_height',	array(
		'label' => esc_html__( 'Blog Post Custom Height','animal-wildlife' ),
		'section' => 'animal_wildlife_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'type' => 'range',
		'active_callback' => 'animal_wildlife_enable_image_dimention'
	));

	$wp_customize->add_setting('animal_wildlife_blog_description',array(
    	'default'   => 'Post Excerpt',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_blog_description',array(
		'type' => 'select',
		'label' => __('Post Description','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post',
		'choices' => array(
		   'None' => __('None','animal-wildlife'),
		   'Post Excerpt' => __('Post Excerpt','animal-wildlife'),
		   'Post Content' => __('Post Content','animal-wildlife'),
		),
	) );

 	$wp_customize->add_setting( 'animal_wildlife_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','animal-wildlife' ),
		'section'     => 'animal_wildlife_blog_post',
		'type'        => 'number',
		'settings'    => 'animal_wildlife_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'animal_wildlife_post_excerpt_suffix', array(
		'default'   => __('{...}','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'animal_wildlife_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','animal-wildlife' ),
		'section'     => 'animal_wildlife_blog_post',
		'type'        => 'text',
		'settings'    => 'animal_wildlife_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('animal_wildlife_button_text',array(
		'default'=> __('Read More','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_button_text',array(
		'label'	=> __('Add Button Text','animal-wildlife'),
		'section'=> 'animal_wildlife_blog_post',
		'type'=> 'text'
	));

	$wp_customize->add_setting('animal_wildlife_show_post_pagination',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_show_post_pagination',array(
		'type' => 'checkbox',
		'label' => __('Post Pagination','animal-wildlife'),
		'section' => 'animal_wildlife_blog_post'
	));

	$wp_customize->add_setting( 'animal_wildlife_pagination_option', array(
		'default'			=> 'Default',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control( 'animal_wildlife_pagination_option', array(
		'section' => 'animal_wildlife_blog_post',
		'type' => 'radio',
		'label' => __( 'Post Pagination', 'animal-wildlife' ),
		'choices'		=> array(
		   'Default'  => __( 'Default', 'animal-wildlife' ),
		   'next-prev' => __( 'Next / Previous', 'animal-wildlife' ),
	)));

	// Single post setting
 	$wp_customize->add_section('animal_wildlife_single_post_section',array(
		'title'	=> __('Single Post Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_single_post_breadcrumb',array(
		'default' => false,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_single_post_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Breadcrumb','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section',
	));

	$wp_customize->add_setting('animal_wildlife_tags_hide',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_tags_hide',array(
		'type' => 'checkbox',
		'label' => __('Single Post Tags','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section'
	));

	$wp_customize->add_setting('animal_wildlife_single_post_image',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_single_post_image',array(
		'type' => 'checkbox',
		'label' => __('Single Post Featured Image','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section'
	));

	 $wp_customize->add_setting( 'animal_wildlife_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','animal-wildlife' ),
		'section'     => 'animal_wildlife_single_post_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'animal_wildlife_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','animal-wildlife' ),
		'section' => 'animal_wildlife_single_post_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('animal_wildlife_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Single Post Date','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

    $wp_customize->add_setting('animal_wildlife_single_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Single Post Comments','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

    $wp_customize->add_setting('animal_wildlife_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Single Post Author','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

    $wp_customize->add_setting('animal_wildlife_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
 	));
 	$wp_customize->add_control('animal_wildlife_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Single Post Categories','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section'
	));

    $wp_customize->add_setting('animal_wildlife_show_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_show_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Single Post Pagination','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

 	$wp_customize->add_setting( 'animal_wildlife_seperator_metabox', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'animal_wildlife_seperator_metabox', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','animal-wildlife' ),
		'section'     => 'animal_wildlife_single_post_section',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','animal-wildlife'),
		'type'        => 'text',
		'settings'    => 'animal_wildlife_seperator_metabox',
	) );

	$wp_customize->add_setting('animal_wildlife_comment_form_heading',array(
		'default' => __('Leave a Reply','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_comment_form_heading',array(
		'type' => 'text',
		'label' => __('Comment Form Heading','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section'
	));

	$wp_customize->add_setting('animal_wildlife_comment_button_text',array(
		'default' => __('Post Comment','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_comment_button_text',array(
		'type' => 'text',
		'label' => __('Comment Submit Button Text','animal-wildlife'),
		'section' => 'animal_wildlife_single_post_section'
	));

 	$wp_customize->add_setting( 'animal_wildlife_comment_form_size',array(
		'default' => 100,
		'sanitize_callback'    => 'animal_wildlife_sanitize_number_range',
	));
	$wp_customize->add_control('animal_wildlife_comment_form_size',	array(
		'label' => esc_html__( 'Comment Form Size','animal-wildlife' ),
		'section' => 'animal_wildlife_single_post_section',
		'type' => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('animal_wildlife_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
    ));
    $wp_customize->add_control('animal_wildlife_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

		$wp_customize->add_setting('animal_wildlife_post_comment_enable',array(
			'default' => true,
			'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
		));
		$wp_customize->add_control('animal_wildlife_post_comment_enable',array(
			'type' => 'checkbox',
			'label' => __('Enable / Disable Post Comment','animal-wildlife'),
			'section' => 'animal_wildlife_single_post_section',
		));

    $wp_customize->add_setting('animal_wildlife_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('animal_wildlife_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

    $wp_customize->add_setting('animal_wildlife_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('animal_wildlife_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','animal-wildlife'),
       'section' => 'animal_wildlife_single_post_section'
    ));

 	// related post setting
	$wp_customize->add_section('animal_wildlife_related_post_section',array(
		'title'	=> __('Related Post Settings','animal-wildlife'),
		'panel' => 'animal_wildlife_panel_id',
	));

	$wp_customize->add_setting('animal_wildlife_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Related Post','animal-wildlife'),
		'section' => 'animal_wildlife_related_post_section',
	));

	$wp_customize->add_setting( 'animal_wildlife_show_related_post', array(
		'default' => 'By Categories',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control( 'animal_wildlife_show_related_post', array(
		'section' => 'animal_wildlife_related_post_section',
		'type' => 'radio',
		'label' => __( 'Show Related Posts', 'animal-wildlife' ),
		'choices' => array(
		   'categories'  => __(' By Categories', 'animal-wildlife'),
		   'tags' => __( ' By Tags', 'animal-wildlife' ),
	)));

 	$wp_customize->add_setting('animal_wildlife_change_related_post_title',array(
		'default'=> __('Related Posts','animal-wildlife'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_change_related_post_title',array(
		'label'	=> __('Change Related Post Title','animal-wildlife'),
		'section'=> 'animal_wildlife_related_post_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('animal_wildlife_change_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_change_related_posts_number',array(
		'label'	=> __('Change Related Post Number','animal-wildlife'),
		'section'=> 'animal_wildlife_related_post_section',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting( 'animal_wildlife_related_post_excerpt_number',array(
		'default' =>20,
		'sanitize_callback' => 'animal_wildlife_sanitize_number_range'
	));

	$wp_customize->add_control( 'animal_wildlife_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','animal-wildlife' ),
		'section' => 'animal_wildlife_related_post_section',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	//Footer
	$wp_customize->add_section( 'animal_wildlife_footer' , array(
    	'title'      => __( 'Footer Section', 'animal-wildlife' ),
		'priority'   => null,
		'panel' => 'animal_wildlife_panel_id'
	) );

	$wp_customize->add_setting('animal_wildlife_footer_widget',array(
		'default'           => 4,
		'sanitize_callback' => 'animal_wildlife_sanitize_choices',
	));
	$wp_customize->add_control('animal_wildlife_footer_widget',array(
		'type'        => 'radio',
		'label'       => __('No. of Footer widget area', 'animal-wildlife'),
		'section'     => 'animal_wildlife_footer',
		'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'animal-wildlife'),
		'choices' => array(
		   '1'     => __('One', 'animal-wildlife'),
		   '2'     => __('Two', 'animal-wildlife'),
		   '3'     => __('Three', 'animal-wildlife'),
		   '4'     => __('Four', 'animal-wildlife')
		),
	));

 	$wp_customize->add_setting( 'animal_wildlife_footer_widget_background', array(
		'default' => '#121212',
		'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'animal_wildlife_footer_widget_background', array(
  		'label' => __('Footer Widget Background','animal-wildlife'),
    	'section' => 'animal_wildlife_footer',
  	)));

  	$wp_customize->add_setting('animal_wildlife_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'animal_wildlife_footer_widget_image',array(
		'label' => __('Footer Widget Background Image','animal-wildlife'),
		'section' => 'animal_wildlife_footer'
	)));

	$wp_customize->add_setting('animal_wildlife_hide_show_scroll',array(
		'default' => false,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_checkbox'
	));
	$wp_customize->add_control('animal_wildlife_hide_show_scroll',array(
     	'type' => 'checkbox',
   	'label' => __('Show / Hide Scroll To Top','animal-wildlife'),
   	'section' => 'animal_wildlife_footer',
	));

	$wp_customize->add_setting('animal_wildlife_scroll_icon_changer',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Animal_Wildlife_Icon_Changer(
     	$wp_customize,'animal_wildlife_scroll_icon_changer',array(
		'label'	=> __('Scroll To Top Icon','animal-wildlife'),
		'transport' => 'refresh',
		'section'	=> 'animal_wildlife_footer',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('animal_wildlife_footer_options',array(
     	'default' => 'Right align',
     	'sanitize_callback' => 'animal_wildlife_sanitize_choices'
	));
	$wp_customize->add_control('animal_wildlife_footer_options',array(
     	'type' => 'select',
		'label' => __('Scroll To Top','animal-wildlife'),
		'description' => __('Here you can change the Footer layout. ','animal-wildlife'),
		'section' => 'animal_wildlife_footer',
		'choices' => array(
		   'Left align' => __('Left align','animal-wildlife'),
		   'Right align' => __('Right align','animal-wildlife'),
		   'Center align' => __('Center align','animal-wildlife'),
		),
	) );

	$wp_customize->add_setting('animal_wildlife_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','animal-wildlife'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('animal_wildlife_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','animal-wildlife'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('animal_wildlife_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','animal-wildlife'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'animal_wildlife_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	) );
	$wp_customize->add_control( 'animal_wildlife_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','animal-wildlife' ),
		'section'     => 'animal_wildlife_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('animal_wildlife_scroll_background_color', array(
		'default'           => '#e9431b',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_scroll_background_color', array(
		'label'    => __('Scroll To Top Background Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_footer',
	)));

	$wp_customize->add_setting('animal_wildlife_scroll_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_scroll_icon_color', array(
		'label'    => __('Scroll To Top Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_footer',
	)));

	$wp_customize->add_setting('animal_wildlife_scroll_background_hover_color', array(
		'default'           => '#e9431b',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_scroll_background_hover_color', array(
		'label'    => __('Scroll To Top Background Hover Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_footer',
	)));

	$wp_customize->add_setting('animal_wildlife_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('animal_wildlife_footer_text',array(
		'label'	=> __('Add Copyright Text','animal-wildlife'),
		'section'	=> 'animal_wildlife_footer',
		'setting'	=> 'animal_wildlife_footer_text',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('animal_wildlife_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','animal-wildlife'),
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'animal_wildlife_footer',
		'type'=> 'number'
	));

     $wp_customize->add_setting('animal_wildlife_copyright_background_color', array(
		'default'           => '#e9431b',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'animal_wildlife_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'animal-wildlife'),
		'section'  => 'animal_wildlife_footer',
	)));

	$wp_customize->add_setting('animal_wildlife_footer_text_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'animal_wildlife_sanitize_float',
	));
	$wp_customize->add_control('animal_wildlife_footer_text_font_size',array(
		'label'	=> __('Footer Text Font Size','animal-wildlife'),
		'section'=> 'animal_wildlife_footer',
		'input_attrs' => array(
      	'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'type'=> 'number'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'animal_wildlife_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'animal_wildlife_customize_partial_blogdescription',
	) );

}
add_action( 'customize_register', 'animal_wildlife_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Animal Wildlife 1.0
 * @see animal-wildlife_customize_register()
 *
 * @return void
 */
function animal_wildlife_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Animal Wildlife 1.0
 * @see animal-wildlife_customize_register()
 *
 * @return void
 */
function animal_wildlife_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function animal_wildlife_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Animal_Wildlife_Customize {

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
		$manager->register_section_type( 'Animal_Wildlife_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Animal_Wildlife_Customize_Section_Pro(
				$manager,
				'animal_wildlife_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Animal Wildlife Pro', 'animal-wildlife' ),
					'pro_text' => esc_html__( 'Go Pro', 'animal-wildlife' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/wildlife-zoo-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'animal-wildlife-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'animal-wildlife-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Animal_Wildlife_Customize::get_instance();
