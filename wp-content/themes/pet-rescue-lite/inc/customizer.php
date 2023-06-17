<?php
/**
 * Pet Rescue Lite Theme Customizer
 * @package Pet Rescue Lite
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pet_rescue_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'pet_rescue_lite_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','pet-rescue-lite' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_logo_padding',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_logo_padding',array(
		'label' => esc_html__( 'Logo Padding (px)','pet-rescue-lite' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_logo_margin',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_logo_margin',array(
		'label' => esc_html__( 'Logo Margin (px)','pet-rescue-lite' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_site_title_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_site_title_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Site Title','pet-rescue-lite'),
		'section' => 'title_tagline'
	));

 	$wp_customize->add_setting('pet_rescue_lite_site_title_font_size',array(
		'default'=> 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','pet-rescue-lite' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	// site title color
   $wp_customize->add_setting('pet_rescue_lite_site_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_site_title_color', array(
		'label'    => __('Site Title Color', 'pet-rescue-lite'),
		'section'  => 'title_tagline',
		'settings' => 'pet_rescue_lite_site_title_color',
	)));

   $wp_customize->add_setting('pet_rescue_lite_site_tagline_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
   ));
   $wp_customize->add_control('pet_rescue_lite_site_tagline_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable Site Tagline','pet-rescue-lite'),
      'section' => 'title_tagline'
   ));

   $wp_customize->add_setting('pet_rescue_lite_site_tagline_font_size',array(
		'default'=> 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','pet-rescue-lite' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site tagline color
	$wp_customize->add_setting('pet_rescue_lite_site_tagline_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_site_tagline_color', array(
		'label'    => __('Site Tagline Color', 'pet-rescue-lite'),
		'section'  => 'title_tagline',
		'settings' => 'pet_rescue_lite_site_tagline_color',
	)));

   $wp_customize->add_setting('pet_rescue_lite_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
   $wp_customize->add_control('pet_rescue_lite_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','pet-rescue-lite'),
       'section' => 'title_tagline',
    ));

   $wp_customize->add_setting('pet_rescue_lite_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','pet-rescue-lite'),
        'description' => __('Here you can add the background skin along with the background image.','pet-rescue-lite'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','pet-rescue-lite'),
            'Without Background' => __('Without Background Skin','pet-rescue-lite'),
        ),
	) );

	//Important Links
	$wp_customize->add_section( 'pet_rescue_lite_important_links' , array(
    	'title' => esc_html__( 'Important Links', 'pet-rescue-lite' ),
    	'priority' => 10,
	) );

	$wp_customize->add_setting('pet_rescue_lite_doc_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_doc_link',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url('https://buywptemplates.com/demo/docs/free-pet-rescue/') ." '>Documentation</a>",
		'section'=> 'pet_rescue_lite_important_links'
	));

	$wp_customize->add_setting('pet_rescue_lite_demo_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_demo_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url('https://www.buywptemplates.com/pet-rescue-pro/') ." '>Demo</a>",
		'section'=> 'pet_rescue_lite_important_links'
	));

	$wp_customize->add_setting('pet_rescue_lite_forum_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_forum_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url('https://wordpress.org/support/theme/pet-rescue-lite/') ." '>Support Forum</a>",
		'section'=> 'pet_rescue_lite_important_links'
	));

	//add home page setting pannel
	$wp_customize->add_panel( 'pet_rescue_lite_panel_id', array(
	    'priority' => 11,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'pet-rescue-lite' ),
	    'description' => __( 'Description of what this panel does.', 'pet-rescue-lite' ),
	) );

	$pet_rescue_lite_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('pet_rescue_lite_typography', array(
		'title'    => __('Typography', 'pet-rescue-lite'),
		'panel'    => 'pet_rescue_lite_panel_id',
	));

	//This is body FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_body_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_body_color', array(
		'label'    => __('Body Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_body_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'pet_rescue_lite_body_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('Body Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	$wp_customize->add_setting('pet_rescue_lite_body_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_body_font_size', array(
		'label'   => __('Body Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_body_font_size',
		'type'    => 'text',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_paragraph_color', array(
		'label'    => __('Paragraph Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'pet_rescue_lite_paragraph_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('Paragraph Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	$wp_customize->add_setting('pet_rescue_lite_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_atag_color', array(
		'label'    => __('"a" Tag Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'pet_rescue_lite_atag_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('"a" Tag Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_li_color', array(
		'label'    => __('"li" Tag Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(	'pet_rescue_lite_li_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('"li" Tag Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h1_color', array(
		'label'    => __('H1 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_h1_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('H1 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h1_font_size', array(
		'label'   => __('H1 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h2_color', array(
		'label'    => __('h2 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(
	'pet_rescue_lite_h2_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('h2 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h2_font_size', array(
		'label'   => __('H2 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h3_color', array(
		'label'    => __('H3 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control(
	'pet_rescue_lite_h3_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('H3 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h3_font_size', array(
		'label'   => __('H3 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h4_color', array(
		'label'    => __('H4 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_h4_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('H4 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h4_font_size', array(
		'label'   => __('H4 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h5_color', array(
		'label'    => __('H5 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_h5_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('H5 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h5_font_size', array(
		'label'   => __('H5 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('pet_rescue_lite_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_h6_color', array(
		'label'    => __('H6 Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_typography',
		'settings' => 'pet_rescue_lite_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('pet_rescue_lite_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_h6_font_family', array(
		'section' => 'pet_rescue_lite_typography',
		'label'   => __('H6 Fonts', 'pet-rescue-lite'),
		'type'    => 'select',
		'choices' => $pet_rescue_lite_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('pet_rescue_lite_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('pet_rescue_lite_h6_font_size', array(
		'label'   => __('H6 Font Size', 'pet-rescue-lite'),
		'section' => 'pet_rescue_lite_typography',
		'setting' => 'pet_rescue_lite_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'pet_rescue_lite_option', array(
    	'title'      => __( 'Layout Settings', 'pet-rescue-lite' ),
    	'panel'    => 'pet_rescue_lite_panel_id',
	) );

	 $wp_customize->add_setting( 'pet_rescue_lite_single_page_breadcrumb',array(
		     	'default' => true,
	      	'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	   ) );
	 $wp_customize->add_control('pet_rescue_lite_single_page_breadcrumb',array(
	    	  'type' => 'checkbox',
	        'label' => __( 'Show / Hide Single Page Breadcrumb','pet-rescue-lite' ),
	        'section' => 'pet_rescue_lite_option'
	  ));

	$wp_customize->add_setting('pet_rescue_lite_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_option'
    ));

   $wp_customize->add_setting('pet_rescue_lite_preloader_type',array(
     	'default' => 'First Preloader Type',
     	'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_preloader_type',array(
      'type' => 'radio',
      'label' => __('Preloader Types','pet-rescue-lite'),
      'section' => 'pet_rescue_lite_option',
      'choices' => array(
         'First Preloader Type' => __('First Preloader Type','pet-rescue-lite'),
         'Second Preloader Type' => __('Second Preloader Type','pet-rescue-lite'),
      ),
	) );

	$wp_customize->add_setting('pet_rescue_lite_preloader_bg_color_option', array(
		'default'           => '#f33a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_option',
	)));

	$wp_customize->add_setting('pet_rescue_lite_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_option',
	)));

	$wp_customize->add_setting('pet_rescue_lite_width_layout_options',array(
		'default' => 'Default',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_width_layout_options',array(
		'type' => 'radio',
		'label' => __('Container Box','pet-rescue-lite'),
		'description' => __('Here you can change the Width layout. ','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_option',
		'choices' => array(
		   'Default' => __('Default','pet-rescue-lite'),
		   'Container Layout' => __('Container Layout','pet-rescue-lite'),
		   'Box Layout' => __('Box Layout','pet-rescue-lite'),
		),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('pet_rescue_lite_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	) );
	$wp_customize->add_control('pet_rescue_lite_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_option',
        'choices' => array(
            'One Column' => __('One Column','pet-rescue-lite'),
            'Grid Layout' => __('Grid Layout','pet-rescue-lite'),
            'Left Sidebar' => __('Left Sidebar','pet-rescue-lite'),
            'Right Sidebar' => __('Right Sidebar','pet-rescue-lite')
        ),
	)   );

	$wp_customize->add_setting('pet_rescue_lite_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','pet-rescue-lite'),
            'Sidebar 1/4' => __('Sidebar 1/4','pet-rescue-lite'),
        ),
	) );

	//Global Color
	$wp_customize->add_section('pet_rescue_lite_global_color', array(
		'title'    => __('Theme Color Option', 'pet-rescue-lite'),
		'panel'    => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_first_color', array(
		'default'           => '#f33a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_first_color', array(
		'label'    => __('Highlight Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_global_color',
		'settings' => 'pet_rescue_lite_first_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('pet_rescue_lite_post_settings', array(
		'title'    => __('Post General Settings', 'pet-rescue-lite'),
		'panel'    => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Image_Radio_Control($wp_customize, 'pet_rescue_lite_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','pet-rescue-lite'),
        'description' => __('Here you can change the 3 different layouts of post','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/post-layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/post-layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/post-layout3.png',
    ))));

	$wp_customize->add_setting('pet_rescue_lite_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_post_settings'
    ));

	$wp_customize->add_setting('pet_rescue_lite_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_post_date_icon',array(
		'label'	=> __('Post Date Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('pet_rescue_lite_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_post_author_icon',array(
		'label'	=> __('Post Author Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('pet_rescue_lite_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('pet_rescue_lite_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_post_time_icon',array(
		'label'	=> __('Post Time Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_post_settings',
        'choices' => array(
            'By Block' => __('By Block','pet-rescue-lite'),
            'By Without Block' => __('By Without Block','pet-rescue-lite'),
        ),
	) );

	$wp_customize->add_setting('pet_rescue_lite_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_choices'
    ));
    $wp_customize->add_control('pet_rescue_lite_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','pet-rescue-lite'),
       'choices' => array(
            'Image' => __('Image','pet-rescue-lite'),
            'Color' => __('Color','pet-rescue-lite'),
            'None' => __('None','pet-rescue-lite'),
        ),
      	'section'	=> 'pet_rescue_lite_post_settings',
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'pet_rescue_lite_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

    $wp_customize->add_setting('pet_rescue_lite_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_post_featured_color', array(
		'label'    => __('Post Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_post_settings',
		'settings' => 'pet_rescue_lite_post_featured_color',
		'active_callback' => 'pet_rescue_lite_post_color_enabled'
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'pet_rescue_lite_show_post_color'
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'pet_rescue_lite_show_post_color'
	)));

	$wp_customize->add_setting('pet_rescue_lite_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_choices'
    ));
    $wp_customize->add_control('pet_rescue_lite_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','pet-rescue-lite'),
       'choices' => array(
            'Default' => __('Default','pet-rescue-lite'),
            'Custom' => __('Custom','pet-rescue-lite'),
        ),
      	'section'	=> 'pet_rescue_lite_post_settings',
      	'active_callback' => 'pet_rescue_lite_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'pet_rescue_lite_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'pet_rescue_lite_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'pet_rescue_lite_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'pet_rescue_lite_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_post_settings',
		'type'        => 'number',
		'settings'    => 'pet_rescue_lite_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','pet-rescue-lite'),
            'Content' => __('Content','pet-rescue-lite'),
        ),
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_post_discription_suffix', array(
		'default'   => __('[...]','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'pet_rescue_lite_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_post_settings',
		'type'        => 'text',
		'settings'    => 'pet_rescue_lite_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'pet_rescue_lite_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','pet-rescue-lite'),
		'type'        => 'text',
		'settings'    => 'pet_rescue_lite_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('pet_rescue_lite_button_text',array(
		'default'=> __('View More','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_button_text',array(
		'label'	=> __('Add Button Text','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_text_button_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
 	));
 	$wp_customize->add_control('pet_rescue_lite_text_button_text_tranform',array(
		'type' => 'select',
		'label' => __('Button Text Transform','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_post_settings',
		'choices' => array(
		   'Uppercase' => __('Uppercase','pet-rescue-lite'),
		   'Lowercase' => __('Lowercase','pet-rescue-lite'),
		   'Capitalize' => __('Capitalize','pet-rescue-lite'),
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_button_font_weight',array(
		'default' => '600',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
 	));
 	$wp_customize->add_control('pet_rescue_lite_button_font_weight',array(
		'type' => 'select',
		'label' => __('Button Font Weight','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_post_settings',
		'choices' => array(
			'100' => __('100','pet-rescue-lite'),
			'200' => __('200','pet-rescue-lite'),
			'300' => __('300','pet-rescue-lite'),
			'400' => __('400','pet-rescue-lite'),
			'500' => __('500','pet-rescue-lite'),
			'600' => __('600','pet-rescue-lite'),
			'700' => __('700','pet-rescue-lite'),
			'800' => __('800','pet-rescue-lite'),
			'900' => __('900','pet-rescue-lite'),
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_button_icon',array(
		'label'	=> __('Button Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_post_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_post_settings'
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_post_pagination_position', array(
        'default'			=>  'Bottom',
        'sanitize_callback'	=> 'pet_rescue_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'pet_rescue_lite_post_pagination_position', array(
        'section' => 'pet_rescue_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'pet-rescue-lite' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'pet-rescue-lite' ),
            'Bottom' => __( 'Bottom', 'pet-rescue-lite' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'pet-rescue-lite' ),
    )));

	$wp_customize->add_setting( 'pet_rescue_lite_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'pet_rescue_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'pet_rescue_lite_pagination_settings', array(
        'section' => 'pet_rescue_lite_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'pet-rescue-lite' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'pet-rescue-lite' ),
            'next-prev' => __( 'Next / Previous', 'pet-rescue-lite' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('pet_rescue_lite_single_post_settings', array(
		'title'    => __('Single Post Settings', 'pet-rescue-lite'),
		'panel'    => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_single_post_bradcrumb',array(
			'default' => false,
			'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
		));
	$wp_customize->add_control('pet_rescue_lite_single_post_bradcrumb',array(
			'type' => 'checkbox',
			'label' => __('Enable / Disable Breadcrumb','pet-rescue-lite'),
			'section' => 'pet_rescue_lite_single_post_settings',
		));

	$wp_customize->add_setting('pet_rescue_lite_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

   $wp_customize->add_setting('pet_rescue_lite_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
      $wp_customize,'pet_rescue_lite_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_single_post_settings'
	));

 	$wp_customize->add_setting('pet_rescue_lite_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer( $wp_customize, 'pet_rescue_lite_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings',
    ));

    $wp_customize->add_setting('pet_rescue_lite_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings',
    ));

	$wp_customize->add_setting('pet_rescue_lite_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings',
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_single_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_single_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'pet_rescue_lite_single_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_single_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	$wp_customize->add_setting('pet_rescue_lite_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Single Post Categories','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_single_post_settings'
	));

	$wp_customize->add_setting('pet_rescue_lite_category_color', array(
		'default'           => '#2d2d2d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_category_color', array(
		'label'    => __('Category Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_single_post_settings',
		'settings' => 'pet_rescue_lite_category_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	) );
	$wp_customize->add_control('pet_rescue_lite_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','pet-rescue-lite'),
            'Left Sidebar' => __('Left Sidebar','pet-rescue-lite'),
            'Right Sidebar' => __('Right Sidebar','pet-rescue-lite')
        ),
	)   );

	$wp_customize->add_setting( 'pet_rescue_lite_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'pet_rescue_lite_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','pet-rescue-lite'),
		'type'        => 'text',
		'settings'    => 'pet_rescue_lite_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_title_comment_form',array(
       'default' => __('Leave a Reply','pet-rescue-lite'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_comment_form_button_content',array(
       'default' => __('Post Comment','pet-rescue-lite'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

	$wp_customize->add_setting('pet_rescue_lite_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

	$wp_customize->add_setting('pet_rescue_lite_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('pet_rescue_lite_related_settings', array(
		'title'    => __('Related Post Settings', 'pet-rescue-lite'),
		'panel'    => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting( 'pet_rescue_lite_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ) );
    $wp_customize->add_control('pet_rescue_lite_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','pet-rescue-lite' ),
        'section' => 'pet_rescue_lite_related_settings'
    ));

    $wp_customize->add_setting('pet_rescue_lite_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_related_title',array(
		'label'	=> __('Add Section Title','pet-rescue-lite'),
		'section'	=> 'pet_rescue_lite_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'pet_rescue_lite_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'pet_rescue_lite_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_related_settings',
        'choices' => array(
            'categories' => __('Categories','pet-rescue-lite'),
            'tags' => __('Tags','pet-rescue-lite'),
        ),
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Header Section
	$wp_customize->add_section('pet_rescue_lite_topbar',array(
		'title'	=> __('Header','pet-rescue-lite'),
		'description'	=> __('Add contact us here','pet-rescue-lite'),
		'priority'	=> null,
		'panel' => 'pet_rescue_lite_panel_id',
	));

 	$wp_customize->add_setting('pet_rescue_lite_display_search',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_search',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Search','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_topbar'
    ));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'pet_rescue_lite_show_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ) );
    $wp_customize->add_control('pet_rescue_lite_show_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Top Header','pet-rescue-lite' ),
        'section' => 'pet_rescue_lite_topbar'
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_topbar_padding_settings', array(
		'default'=> 8,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'pet_rescue_lite_topbar_padding_settings', array(
		'label'       => esc_html__( 'Top Header Padding','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
 	) );
 	$wp_customize->add_control('pet_rescue_lite_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','pet-rescue-lite' ),
        'section' => 'pet_rescue_lite_topbar'
 	));

	$wp_customize->add_setting('pet_rescue_lite_topbar_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('pet_rescue_lite_topbar_text',array(
		'type' => 'text',
		'label' => __('Add Topbar Text','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_topbar',
	) );

	$wp_customize->add_setting('pet_rescue_lite_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_phone_number'
 	));
 	$wp_customize->add_control('pet_rescue_lite_phone_number',array(
		'type' => 'text',
		'label' => __('Add Phone Number','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_topbar',
	) );

	//Menu Settings
	$wp_customize->add_section('pet_rescue_lite_menu_setting',array(
		'title'	=> __('Menu Settings','pet-rescue-lite'),
		'priority'	=> null,
		'panel' => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,'pet_rescue_lite_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('pet_rescue_lite_menu_top_bottom_padding',array(
		'default'=> 15,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,'pet_rescue_lite_menu_top_bottom_padding',array(
		'label'	=> __('Menu Top-Bottom Padding','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_menu_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,'pet_rescue_lite_menu_left_right_padding',array(
		'label'	=> __('Menu Left-Right Padding','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_menu_setting',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_text_tranform_menu',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
 	));
 	$wp_customize->add_control('pet_rescue_lite_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_menu_setting',
		'choices' => array(
		   'Uppercase' => __('Uppercase','pet-rescue-lite'),
		   'Lowercase' => __('Lowercase','pet-rescue-lite'),
		   'Capitalize' => __('Capitalize','pet-rescue-lite'),
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_font_weight_option_menu',array(
		'default' => '500',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
 	));
 	$wp_customize->add_control('pet_rescue_lite_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_menu_setting',
		'choices' => array(
			'100' => __('100','pet-rescue-lite'),
			'200' => __('200','pet-rescue-lite'),
			'300' => __('300','pet-rescue-lite'),
			'400' => __('400','pet-rescue-lite'),
			'500' => __('500','pet-rescue-lite'),
			'600' => __('600','pet-rescue-lite'),
			'700' => __('700','pet-rescue-lite'),
			'800' => __('800','pet-rescue-lite'),
			'900' => __('900','pet-rescue-lite'),
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_menu_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_menu_color', array(
		'label'    => __('Menu Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_menu_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_sub_menu_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_sub_menu_color', array(
		'label'    => __('Submenu Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_sub_menu_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_menu_hover_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_menu_hover_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_sub_menu_hover_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_sub_menu_hover_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_sub_menu_bg_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_sub_menu_bg_color', array(
		'label'    => __('Submenu Background Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_sub_menu_bg_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_sub_menu_bg_hover_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_sub_menu_bg_hover_color', array(
		'label'    => __('Submenu Background Hover Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_menu_setting',
		'settings' => 'pet_rescue_lite_sub_menu_bg_hover_color',
	)));

	//Slider Section
	$wp_customize->add_section( 'pet_rescue_lite_slider_section' , array(
    	'title'      => __( 'Slider Section', 'pet-rescue-lite' ),
		'priority'   => null,
		'panel' => 'pet_rescue_lite_panel_id'
	) );

	$wp_customize->add_setting('pet_rescue_lite_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'pet_rescue_lite_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'pet_rescue_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'pet_rescue_lite_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'pet-rescue-lite' ),
			'description' => __('Slider image size (1400 x 600)','pet-rescue-lite'),
			'section'  => 'pet_rescue_lite_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('pet_rescue_lite_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_slider_section'
	));

	$wp_customize->add_setting('pet_rescue_lite_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_slider_section'
	));

	$wp_customize->add_setting('pet_rescue_lite_show_slider_button',array(
	    'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_show_slider_button',array(
	    'type' => 'checkbox',
	    'label' => __('Show / Hide Slider Button','pet-rescue-lite'),
	    'section' => 'pet_rescue_lite_slider_section'
	));

	$wp_customize->add_setting('pet_rescue_lite_enable_slider_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_enable_slider_overlay',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Image Overlay','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_slider_section'
	));

   $wp_customize->add_setting('pet_rescue_lite_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_slider_section',
		'settings' => 'pet_rescue_lite_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('pet_rescue_lite_slider_opacity',array(
		'default'           => 0.7,
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control( 'pet_rescue_lite_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_slider_section',
		'type'        => 'select',
		'settings'    => 'pet_rescue_lite_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','pet-rescue-lite'),
			'0.1' =>  esc_attr('0.1','pet-rescue-lite'),
			'0.2' =>  esc_attr('0.2','pet-rescue-lite'),
			'0.3' =>  esc_attr('0.3','pet-rescue-lite'),
			'0.4' =>  esc_attr('0.4','pet-rescue-lite'),
			'0.5' =>  esc_attr('0.5','pet-rescue-lite'),
			'0.6' =>  esc_attr('0.6','pet-rescue-lite'),
			'0.7' =>  esc_attr('0.7','pet-rescue-lite'),
			'0.8' =>  esc_attr('0.8','pet-rescue-lite'),
			'0.9' =>  esc_attr('0.9','pet-rescue-lite')
		),
	));

	$wp_customize->add_setting('pet_rescue_lite_slider_previous_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new pet_rescue_lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_slider_previous_icon',array(
		'label'	=> __('Slider Previous Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_slider_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_slider_next_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new pet_rescue_lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_slider_next_icon',array(
		'label'	=> __('Slider Next Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_slider_section',
		'type'		=> 'icon'
	)));

	//content layout
    $wp_customize->add_setting('pet_rescue_lite_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_slider_section',
		'choices' => array(
		   'Center' => __('Center','pet-rescue-lite'),
		   'Left' => __('Left','pet-rescue-lite'),
		   'Right' => __('Right','pet-rescue-lite'),
		),
	) );

	$wp_customize->add_setting('pet_rescue_lite_option_slider_height',array(
		'default'=> '380',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_option_slider_height',array(
		'label'	=> __('Slider Height','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_slider_content_top_padding',array(
		'label' => __('Top Bottom Slider Content Spacing','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
	)));

	$wp_customize->add_setting('pet_rescue_lite_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize,  'pet_rescue_lite_slider_content_left_padding',array(
		'label' => __('Left Right Slider Content Spacing','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
  		),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'pet_rescue_lite_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'pet_rescue_lite_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','pet-rescue-lite' ),
		'section'     => 'pet_rescue_lite_slider_section',
		'type'        => 'number',
		'settings'    => 'pet_rescue_lite_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('pet_rescue_lite_product_section',array(
		'title' => __('Featured Products','pet-rescue-lite'),
		'description' => '',
		'priority'  => null,
		'panel' => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_product_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Featured Products','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_product_section'
	));

	$wp_customize->add_setting('pet_rescue_lite_product_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_product_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_product_section'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
 	$cats = array();
 	$i = 0;
 	foreach($categories as $category){
     	if($i==0){
         $default = $category->slug;
         $i++;
     	}
     $cats[$category->slug] = $category->name;
 	}
 	$wp_customize->add_setting('pet_rescue_lite_product_slide',array(
     	'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
 	));
	$wp_customize->add_control('pet_rescue_lite_product_slide',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Category','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_product_section',
 	));

	//footer text
	$wp_customize->add_section('pet_rescue_lite_footer_section',array(
		'title'	=> __('Footer Text','pet-rescue-lite'),
		'panel' => 'pet_rescue_lite_panel_id'
	));

	$wp_customize->add_setting('pet_rescue_lite_show_hide_footer',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_show_hide_footer',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Footer','pet-rescue-lite'),
      	'section' => 'pet_rescue_lite_footer_section',
	));

	$wp_customize->add_setting('pet_rescue_lite_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	$wp_customize->add_setting('pet_rescue_lite_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'pet_rescue_lite_footer_bg_image',array(
		'label' => __('Footer Background Image','pet-rescue-lite'),
		'section' => 'pet_rescue_lite_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'pet-rescue-lite'),
		'section'     => 'pet_rescue_lite_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'pet-rescue-lite'),
		'choices' => array(
		   '1'     => __('One', 'pet-rescue-lite'),
		   '2'     => __('Two', 'pet-rescue-lite'),
		   '3'     => __('Three', 'pet-rescue-lite'),
		   '4'     => __('Four', 'pet-rescue-lite')
		),
	));

	$wp_customize->add_setting('pet_rescue_lite_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new pet_rescue_lite_Custom_Control( $wp_customize,'pet_rescue_lite_footer_padding',array(
		'label'	=> __('Footer Widget Padding','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 100,
      ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','pet-rescue-lite'),
      	'section' => 'pet_rescue_lite_footer_section',
	));

	$wp_customize->add_setting('pet_rescue_lite_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('pet_rescue_lite_scroll_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_scroll_icon_color', array(
		'label'    => __('Back to Top Icon Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	$wp_customize->add_setting('pet_rescue_lite_scroll_icon_hover_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_scroll_icon_hover_color', array(
		'label'    => __('Back to Top Icon Hover Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	$wp_customize->add_setting('pet_rescue_lite_scroll_icon_background', array(
		'default'           => '#f33a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_scroll_icon_background', array(
		'label'    => __('Back to Top Background Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	$wp_customize->add_setting('pet_rescue_lite_scroll_icon_background_hover', array(
		'default'           => '#f33a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_scroll_icon_background_hover', array(
		'label'    => __('Back to Top Background Hover Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	$wp_customize->add_setting('pet_rescue_lite_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','pet-rescue-lite'),
            'Right align' => __('Right Align','pet-rescue-lite'),
            'Center align' => __('Center Align','pet-rescue-lite'),
        ),
	) );

	$wp_customize->add_setting( 'pet_rescue_lite_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_show_hide_copyright',array(
		'default' => true,
		'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
	));
	$wp_customize->add_control('pet_rescue_lite_show_hide_copyright',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Copyright','pet-rescue-lite'),
      	'section' => 'pet_rescue_lite_footer_section',
	));

	$wp_customize->add_setting('pet_rescue_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_footer_copy',array(
		'label'	=> __('Copyright Text','pet-rescue-lite'),
		'section'	=> 'pet_rescue_lite_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','pet-rescue-lite'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_footer_section',
        'choices' => array(
            'left' => __('Left Align','pet-rescue-lite'),
            'right' => __('Right Align','pet-rescue-lite'),
            'center' => __('Center Align','pet-rescue-lite'),
        ),
	) );

	$wp_customize->add_setting('pet_rescue_lite_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','pet-rescue-lite' ),
		'section'=> 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_copyright_text_background', array(
		'default'           => '#f33a3a',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_copyright_text_background', array(
		'label'    => __('Copyright Background Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_footer_section',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('pet_rescue_lite_responsive_media',array(
		'title'	=> __('Responsive Media','pet-rescue-lite'),
		'panel' => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_open_menu_label',array(
       'default' => __('Menu','pet-rescue-lite'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

	$wp_customize->add_setting('pet_rescue_lite_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Icon_Changer(
        $wp_customize,'pet_rescue_lite_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','pet-rescue-lite'),
		'transport' => 'refresh',
		'section'	=> 'pet_rescue_lite_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('pet_rescue_lite_close_menu_label',array(
       'default' => __('Close Menu','pet-rescue-lite'),
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('pet_rescue_lite_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

	// site toggle button color
	$wp_customize->add_setting('pet_rescue_lite_toggle_button_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'pet_rescue_lite_toggle_button_color', array(
		'label'    => __('Toggle Button Color', 'pet-rescue-lite'),
		'section'  => 'pet_rescue_lite_responsive_media',
		'settings' => 'pet_rescue_lite_toggle_button_color',
	)));

	$wp_customize->add_setting('pet_rescue_lite_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    $wp_customize->add_setting('pet_rescue_lite_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    $wp_customize->add_setting('pet_rescue_lite_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    $wp_customize->add_setting('pet_rescue_lite_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

	$wp_customize->add_setting('pet_rescue_lite_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    $wp_customize->add_setting('pet_rescue_lite_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    $wp_customize->add_setting('pet_rescue_lite_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('pet_rescue_lite_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','pet-rescue-lite'),
		'panel' => 'pet_rescue_lite_panel_id',
	));

	$wp_customize->add_setting('pet_rescue_lite_page_not_found_heading',array(
		'default'=> __('404 Not Found','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_page_not_found_heading',array(
		'label'	=> __('404 Heading','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_page_not_found_text',array(
		'label'	=> __('404 Content','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_page_not_found_button',array(
		'default'=>  __('Back to Home Page','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_page_not_found_button',array(
		'label'	=> __('404 Button','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_no_search_result_heading',array(
		'default'=> __('Nothing Found','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','pet-rescue-lite'),
		'description'=>__('The search page heading display when no results are found.','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('pet_rescue_lite_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','pet-rescue-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_no_search_result_text',array(
		'label'	=> __('No Search Results Text','pet-rescue-lite'),
		'description'=>__('The search page text display when no results are found.','pet-rescue-lite'),
		'section'=> 'pet_rescue_lite_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'pet_rescue_lite_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'pet-rescue-lite' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','pet-rescue-lite'),
		'priority'   => null,
		'panel' => 'pet_rescue_lite_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'pet_rescue_lite_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pet_rescue_lite_per_columns', array(
		'label'    => __( 'Product per columns', 'pet-rescue-lite' ),
		'section'  => 'pet_rescue_lite_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('pet_rescue_lite_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('pet_rescue_lite_product_per_page',array(
		'label'	=> __('Product per page','pet-rescue-lite'),
		'section'	=> 'pet_rescue_lite_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('pet_rescue_lite_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_woocommerce_section',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('pet_rescue_lite_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'pet-rescue-lite'),
		'section'        => 'pet_rescue_lite_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'pet-rescue-lite'),
			'Right Sidebar' => __('Right Sidebar', 'pet-rescue-lite'),
		),
	));

    $wp_customize->add_setting('pet_rescue_lite_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_woocommerce_section',
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('pet_rescue_lite_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_choices',
	));
	$wp_customize->add_control('pet_rescue_lite_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'pet-rescue-lite'),
		'section'        => 'pet_rescue_lite_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'pet-rescue-lite'),
			'Right Sidebar' => __('Right Sidebar', 'pet-rescue-lite'),
		),
	));

    $wp_customize->add_setting('pet_rescue_lite_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
    ));
    $wp_customize->add_control('pet_rescue_lite_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','pet-rescue-lite'),
       'section' => 'pet_rescue_lite_woocommerce_section',
    ));

    $wp_customize->add_setting( 'pet_rescue_lite_woo_product_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','pet-rescue-lite'),
        'section'  => 'pet_rescue_lite_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('pet_rescue_lite_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','pet-rescue-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'pet_rescue_lite_woocommerce_section',
	)));

    $wp_customize->add_setting('pet_rescue_lite_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','pet-rescue-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'pet_rescue_lite_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('pet_rescue_lite_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','pet-rescue-lite'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'pet_rescue_lite_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('pet_rescue_lite_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'pet_rescue_lite_sanitize_choices'
	));
	$wp_customize->add_control('pet_rescue_lite_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','pet-rescue-lite'),
        'section' => 'pet_rescue_lite_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','pet-rescue-lite'),
            'Left' => __('Left','pet-rescue-lite'),
        ),
	));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('pet_rescue_lite_woocommerce_product_border_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'pet_rescue_lite_sanitize_checkbox'
   ));
   $wp_customize->add_control('pet_rescue_lite_woocommerce_product_border_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable product border','pet-rescue-lite'),
      'section' => 'pet_rescue_lite_woocommerce_section',
   ));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_product_padding_top',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_product_padding_right',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_product_border_radius',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'pet_rescue_lite_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'pet_rescue_lite_sanitize_integer'
	));
	$wp_customize->add_control( new Pet_Rescue_Lite_Custom_Control( $wp_customize, 'pet_rescue_lite_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','pet-rescue-lite' ),
		'section' => 'pet_rescue_lite_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('pet_rescue_lite_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'pet_rescue_lite_sanitize_choices'
    ));
    $wp_customize->add_control('pet_rescue_lite_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','pet-rescue-lite'),
       'choices' => array(
            'Yes' => __('Yes','pet-rescue-lite'),
            'No' => __('No','pet-rescue-lite'),
        ),
       'section' => 'pet_rescue_lite_woocommerce_section',
    ));

}
add_action( 'customize_register', 'pet_rescue_lite_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Pet_Rescue_Lite_Customize {

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
		$manager->register_section_type( 'Pet_Rescue_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Pet_Rescue_Lite_Customize_Section_Pro(
				$manager,
				'pet_rescue_lite_example_1',
				array(
					'title'   =>  esc_html__( 'Pet Rescue Pro', 'pet-rescue-lite' ),
					'pro_text' => esc_html__( 'Go Pro', 'pet-rescue-lite' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/pet-rescue-wordpress-theme/' ),
					'priority'   => 9
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

		wp_enqueue_script( 'pet-rescue-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'pet-rescue-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function pet_rescue_lite_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'pet-rescue-lite'),
	        '2'     => __('Two', 'pet-rescue-lite'),
	        '3'     => __('Three', 'pet-rescue-lite'),
	        '4'     => __('Four', 'pet-rescue-lite')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Pet_Rescue_Lite_Customize::get_instance();
