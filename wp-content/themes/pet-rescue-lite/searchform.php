<?php
/**
 * The template for displaying search forms in Pet Rescue Lite
 * @package Pet Rescue Lite
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'pet-rescue-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod('pet_rescue_lite_search_placeholder', __('Search', 'pet-rescue-lite')) ); ?>" value="<?php echo esc_attr( get_search_query()) ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','pet-rescue-lite' ); ?>">
</form>