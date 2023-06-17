<?php
/**
 * Pet Rescue Lite functions and definitions
 * @package Pet Rescue Lite
 */
 /* Breadcrumb Begin */
 function pet_rescue_lite_the_breadcrumb() {
 	if (!is_home()) {
 		echo '<a href="';
 			echo esc_url( home_url() );
 		echo '">';
 			bloginfo('name');
 		echo "</a> ";
 		if (is_category() || is_single()) {
 			the_category(',');
 			if (is_single()) {
 				echo "<span> ";
 					the_title();
 				echo "</span> ";
 			}
 		} elseif (is_page()) {
 			echo "<span> ";
 				the_title();
 		}
 	}
 }
/* Theme Setup */
if ( ! function_exists( 'pet_rescue_lite_setup' ) ) :

function pet_rescue_lite_setup() {

	$GLOBALS['content_width'] = apply_filters( 'pet_rescue_lite_content_width', 640 );

	load_theme_textdomain( 'pet-rescue-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('pet-rescue-lite-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pet-rescue-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', pet_rescue_lite_font_url() ) );
}
endif; // pet_rescue_lite_setup
add_action( 'after_setup_theme', 'pet_rescue_lite_setup' );

/* Theme Widgets Setup */
function pet_rescue_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'pet-rescue-lite' ),
		'description'   => __( 'Appears on posts and pages', 'pet-rescue-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'pet-rescue-lite' ),
		'description'   => __( 'Appears on posts and pages', 'pet-rescue-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'pet-rescue-lite' ),
		'description'   => __( 'Appears on posts and pages', 'pet-rescue-lite' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$pet_rescue_lite_widget_areas = get_theme_mod('footer_widget_areas', '4');
	for ($i=1; $i<=$pet_rescue_lite_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'pet-rescue-lite' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'pet_rescue_lite_widgets_init' );

/* Theme Font URL */
function pet_rescue_lite_font_url() {
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril+Fatface',
		'Acme',
		'Allura',
		'Anton',
		'Architects+Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa+Slab+One',
		'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad+Script',
		'Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree+Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat+Brush',
		'Cherry+Swash:wght@400;700',
		'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming+Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days+One',
		'Dosis:wght@200;300;400;500;600;700;800',
		'DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700',
		'EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka+One',
		'Fjalla+One',
		'Francois+One',
		'Frank+Ruhl+Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria+Hallelujah',
		'Great+Vibes',
		'Handlee',
		'Hammersmith+One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie+Flower',
		'IM+Fell+English+SC',
		'Julius+Sans+One',
		'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lobster',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Marck+Script',
		'Marcellus',
		'Merienda+One',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass+Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua+One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT+Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent+Marker',
		'Poiret+One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
	 	'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	 	'Russo+One',
	 	'Righteous',
	 	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Satisfy',
	 	'Sen:wght@400;700;800',
	 	'Slabo+13px',
	 	'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	 	'Shadows+Into+Light+Two',
	 	'Shadows+Into+Light',
	 	'Sacramento',
	 	'Sail',
	 	'Shrikhand',
	 	'League+Spartan:wght@100;200;300;400;500;600;700;800;900',
	 	'Staatliches',
	 	'Stylish',
	 	'Tangerine:wght@400;700',
	 	'Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
	 	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	 	'Unica+One',
	 	'VT323',
	 	'Varela+Round',
	 	'Vampiro+One',
	 	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	 	'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	 	'ZCOOL+XiaoWei',
	 	'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function pet_rescue_lite_scripts() {
	wp_enqueue_style( 'pet-rescue-lite-font', pet_rescue_lite_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'pet-rescue-lite-block-style', get_theme_file_uri('/css/blocks.css') );

	wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'pet-rescue-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome-css',get_template_directory_uri().'/css/fontawesome-all.css' );


	// Body
	$pet_rescue_lite_body_color       = get_theme_mod(
		'pet_rescue_lite_body_color', '');
	$pet_rescue_lite_body_font_family = get_theme_mod('pet_rescue_lite_body_font_family', '');
	$pet_rescue_lite_body_font_size   = get_theme_mod(
		'pet_rescue_lite_body_font_size', '');

	// Paragraph
	$pet_rescue_lite_paragraph_color       = get_theme_mod('pet_rescue_lite_paragraph_color', '');
	$pet_rescue_lite_paragraph_font_family = get_theme_mod('pet_rescue_lite_paragraph_font_family', '');
	$pet_rescue_lite_paragraph_font_size   = get_theme_mod('pet_rescue_lite_paragraph_font_size', '');
	// "a" tag
	$pet_rescue_lite_atag_color       = get_theme_mod('pet_rescue_lite_atag_color', '');
	$pet_rescue_lite_atag_font_family = get_theme_mod('pet_rescue_lite_atag_font_family', '');
	// "li" tag
	$pet_rescue_lite_li_color       = get_theme_mod('pet_rescue_lite_li_color', '');
	$pet_rescue_lite_li_font_family = get_theme_mod('pet_rescue_lite_li_font_family', '');

	// H1
	$pet_rescue_lite_h1_color       = get_theme_mod('pet_rescue_lite_h1_color', '');
	$pet_rescue_lite_h1_font_family = get_theme_mod('pet_rescue_lite_h1_font_family', '');
	$pet_rescue_lite_h1_font_size   = get_theme_mod('pet_rescue_lite_h1_font_size', '');

	// H2
	$pet_rescue_lite_h2_color       = get_theme_mod('pet_rescue_lite_h2_color', '');
	$pet_rescue_lite_h2_font_family = get_theme_mod('pet_rescue_lite_h2_font_family', '');
	$pet_rescue_lite_h2_font_size   = get_theme_mod('pet_rescue_lite_h2_font_size', '');
	// H3
	$pet_rescue_lite_h3_color       = get_theme_mod('pet_rescue_lite_h3_color', '');
	$pet_rescue_lite_h3_font_family = get_theme_mod('pet_rescue_lite_h3_font_family', '');
	$pet_rescue_lite_h3_font_size   = get_theme_mod('pet_rescue_lite_h3_font_size', '');
	// H4
	$pet_rescue_lite_h4_color       = get_theme_mod('pet_rescue_lite_h4_color', '');
	$pet_rescue_lite_h4_font_family = get_theme_mod('pet_rescue_lite_h4_font_family', '');
	$pet_rescue_lite_h4_font_size   = get_theme_mod('pet_rescue_lite_h4_font_size', '');
	// H5
	$pet_rescue_lite_h5_color       = get_theme_mod('pet_rescue_lite_h5_color', '');
	$pet_rescue_lite_h5_font_family = get_theme_mod('pet_rescue_lite_h5_font_family', '');
	$pet_rescue_lite_h5_font_size   = get_theme_mod('pet_rescue_lite_h5_font_size', '');
	// H6
	$pet_rescue_lite_h6_color       = get_theme_mod('pet_rescue_lite_h6_color', '');
	$pet_rescue_lite_h6_font_family = get_theme_mod('pet_rescue_lite_h6_font_family', '');
	$pet_rescue_lite_h6_font_size   = get_theme_mod('pet_rescue_lite_h6_font_size', '');


	$pet_rescue_lite_custom_css = '
	  	body{
		    color:'.esc_html($pet_rescue_lite_body_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_body_font_family).';
		    font-size: '.esc_html($pet_rescue_lite_body_font_size).'px;
		}
		p,span{
		    color:'.esc_html($pet_rescue_lite_paragraph_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_paragraph_font_family).';
		    font-size: '.esc_html($pet_rescue_lite_paragraph_font_size).'px;
		}
		a{
		    color:'.esc_html($pet_rescue_lite_atag_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_atag_font_family).';
		}
		li{
		    color:'.esc_html($pet_rescue_lite_li_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_li_font_family).';
		}
		h1{
		    color:'.esc_html($pet_rescue_lite_h1_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h1_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h1_font_size).'px!important;
		}
		h2{
		    color:'.esc_html($pet_rescue_lite_h2_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h2_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h2_font_size).'px!important;
		}
		h3{
		    color:'.esc_html($pet_rescue_lite_h3_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h3_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h3_font_size).'px!important;
		}
		h4{
		    color:'.esc_html($pet_rescue_lite_h4_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h4_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h4_font_size).'px!important;
		}
		h5{
		    color:'.esc_html($pet_rescue_lite_h5_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h5_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h5_font_size).'px!important;
		}
		h6{
		    color:'.esc_html($pet_rescue_lite_h6_color).'!important;
		    font-family: '.esc_html($pet_rescue_lite_h6_font_family).'!important;
		    font-size: '.esc_html($pet_rescue_lite_h6_font_size).'px!important;
		}
	';
	wp_add_inline_style('pet-rescue-lite-basic-style', $pet_rescue_lite_custom_css);

	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'pet-rescue-lite-basic-style',$pet_rescue_lite_custom_css );
	wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'pet-rescue-lite-custom-scripts-jquery',get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pet_rescue_lite_scripts' );

define('PET_RESCUE_LITE_LIVE_DEMO',__('https://www.buywptemplates.com/pet-rescue-pro/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_BUY_PRO',__('https://www.buywptemplates.com/themes/pet-rescue-wordpress-theme/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_PRO_DOC',__('https://buywptemplates.com/demo/docs/bwt-pet-rescue-pro/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_FREE_DOC',__('https://buywptemplates.com/demo/docs/free-pet-rescue/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_PRO_SUPPORT',__('https://www.buywptemplates.com/support/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_FREE_SUPPORT',__('https://wordpress.org/support/theme/pet-rescue-lite/', 'pet-rescue-lite'));
define('PET_RESCUE_LITE_CREDIT',__('https://www.buywptemplates.com/themes/free-pet-wordpress-theme/', 'pet-rescue-lite'));

if ( ! function_exists( 'pet_rescue_lite_credit' ) ) {
	function pet_rescue_lite_credit(){
		echo "<a href=".esc_url(PET_RESCUE_LITE_CREDIT).">".esc_html__('Pet Rescue WordPress Theme','pet-rescue-lite')."</a>";
	}
}

function pet_rescue_lite_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function pet_rescue_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function pet_rescue_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function pet_rescue_lite_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function pet_rescue_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Integer sanitization */
if ( ! function_exists( 'pet_rescue_lite_sanitize_integer' ) ) {
	function pet_rescue_lite_sanitize_integer( $input ) {
		return (int) $input;
	}
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'pet_rescue_lite_loop_columns');
if (!function_exists('pet_rescue_lite_loop_columns')) {
	function pet_rescue_lite_loop_columns() {
		$columns = get_theme_mod( 'pet_rescue_lite_per_columns', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'pet_rescue_lite_shop_per_page', 20 );
function pet_rescue_lite_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'pet_rescue_lite_product_per_page', 9 );
	return $cols;
}

//Display the related posts
if ( ! function_exists( 'pet_rescue_lite_related_posts' ) ) {
	function pet_rescue_lite_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => absint( get_theme_mod( 'pet_rescue_lite_related_posts_count_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'pet_rescue_lite_related_posts_taxanomies', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'pet_rescue_lite_related_posts_taxanomies', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

function pet_rescue_lite_enable_post_featured_image(){
	if(get_theme_mod('pet_rescue_lite_post_featured_image') == 'Image' ) {
		return true;
	}
	return false;
}

function pet_rescue_lite_post_color_enabled(){
	if(get_theme_mod('pet_rescue_lite_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

function pet_rescue_lite_enable_post_image_custom_dimention(){
	if(get_theme_mod('pet_rescue_lite_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function pet_rescue_lite_show_post_color(){
	if(get_theme_mod('pet_rescue_lite_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Customizer file. */
require get_template_directory() . '/inc/customizer.php';

/* About Widget */
require get_template_directory() . '/inc/about.php';

/* Contact Widget */
require get_template_directory() . '/inc/contact.php';

/* Load welcome message.*/
require get_template_directory() . '/inc/dashboard/get_started_info.php';
/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/* Load Customizer file. */
require get_template_directory() . '/wptt-webfont-loader.php';
