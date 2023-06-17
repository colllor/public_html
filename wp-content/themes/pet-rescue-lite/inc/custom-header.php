<?php
/**
 * @package Pet Rescue Lite
 * @subpackage pet-rescue-lite
 * @since pet-rescue-lite 1.0
 * Setup the WordPress core custom header feature.
 * @uses pet_rescue_lite_header_style()
*/

function pet_rescue_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'pet_rescue_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 70,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'pet_rescue_lite_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'pet_rescue_lite_custom_header_setup' );

if ( ! function_exists( 'pet_rescue_lite_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'pet_rescue_lite_header_style' );
function pet_rescue_lite_header_style() {
	if ( get_header_image() ) :
	$pet_rescue_lite_custom_css = "
        .menu-section{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'pet-rescue-lite-basic-style', $pet_rescue_lite_custom_css );
	endif;
}
endif;