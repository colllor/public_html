<?php
/**
 * The template part for displaying content
 * @package Pet Rescue Lite
 * @subpackage pet_rescue_lite
 * @since 1.0
 */
?>

<?php $pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_post_layouts','Layout 2');
if($pet_rescue_lite_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($pet_rescue_lite_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($pet_rescue_lite_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}