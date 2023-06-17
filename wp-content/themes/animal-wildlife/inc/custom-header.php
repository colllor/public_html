<?php
/**
 * Custom header implementation
 */

function animal_wildlife_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'animal_wildlife_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 95,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'animal_wildlife_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'animal_wildlife_custom_header_setup' );

if ( ! function_exists( 'animal_wildlife_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see animal_wildlife_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'animal_wildlife_header_style' );
function animal_wildlife_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$animal_wildlife_custom_css = "
		.main-header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'animal-wildlife-basic-style', $animal_wildlife_custom_css );
	endif;
}
endif; // animal_wildlife_header_style