<?php

	/*---------------------------Width Layout -------------------*/
	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_theme_options','Default');
    if($animal_wildlife_theme_lay == 'Default'){
		$animal_wildlife_custom_css .='body{';
			$animal_wildlife_custom_css .='max-width: 100%;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='.page-template-custom-home-page .middle-header{';
			$animal_wildlife_custom_css .='width: 97.3%';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_theme_lay == 'Wide Layout'){
		$animal_wildlife_custom_css .='body{';
			$animal_wildlife_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='.page-template-custom-home-page .middle-header{';
			$animal_wildlife_custom_css .='width: 97.7%';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_theme_lay == 'Box Layout'){
		$animal_wildlife_custom_css .='body{';
			$animal_wildlife_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$animal_wildlife_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$animal_wildlife_slider_layout = get_theme_mod( 'animal_wildlife_slider_opacity_color','0.7');
	if($animal_wildlife_slider_layout == '0'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.1'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.1';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.2'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.2';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.3'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.3';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.4'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.4';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.5'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.5';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.6'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.6';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.7'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.7';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.8'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.8';
		$animal_wildlife_custom_css .='}';
		}else if($animal_wildlife_slider_layout == '0.9'){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:0.9';
		$animal_wildlife_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/
	$animal_wildlife_slider_layout = get_theme_mod( 'animal_wildlife_slider_content_option','Center');
    if($animal_wildlife_slider_layout == 'Left'){
		$animal_wildlife_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$animal_wildlife_custom_css .='text-align:left; left:10%; right:50%; bottom: auto;';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_slider_layout == 'Center'){
		$animal_wildlife_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$animal_wildlife_custom_css .='text-align:center; left:28%; right:28%; bottom: auto;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='@media screen and (max-width: 768px){
		#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$animal_wildlife_custom_css .='left:15%; right:15%; bottom: auto;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_slider_layout == 'Right'){
		$animal_wildlife_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$animal_wildlife_custom_css .='text-align:right; left:50%; right:10%; bottom: auto;';
		$animal_wildlife_custom_css .='}';
	}

	/*----------------------------- Button Settings option-----------------------*/
	$animal_wildlife_top_bottom_padding = get_theme_mod('animal_wildlife_top_bottom_padding');
	$animal_wildlife_left_right_padding = get_theme_mod('animal_wildlife_left_right_padding');
	$animal_wildlife_custom_css .='.post-link a, #slider .readbutton, .form-submit input[type="submit"]{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_top_bottom_padding).'px; padding-bottom: '.esc_attr($animal_wildlife_top_bottom_padding).'px; padding-left: '.esc_attr($animal_wildlife_left_right_padding).'px; padding-right: '.esc_attr($animal_wildlife_left_right_padding).'px; display:inline-block;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_border_radius = get_theme_mod('animal_wildlife_border_radius');
	$animal_wildlife_custom_css .='.post-link a,#slider .readbutton, .form-submit input[type="submit"]{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

	/*---------------------------Blog Layout -------------------*/
	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_blog_post_layout','Default');
    if($animal_wildlife_theme_lay == 'Default'){
		$animal_wildlife_custom_css .='.blogger{';
			$animal_wildlife_custom_css .='';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_theme_lay == 'Center'){
		$animal_wildlife_custom_css .='.blogger, .blogger h2, .post-info, .text p, .blogger .post-link{';
			$animal_wildlife_custom_css .='text-align:center;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='.post-info{';
			$animal_wildlife_custom_css .='margin-top:10px;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='.blogger .post-link{';
			$animal_wildlife_custom_css .='margin-top:25px;';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_theme_lay == 'Image and Content'){
		$animal_wildlife_custom_css .='.blogger, .blogger h2, .post-info, .text p, #our-services p{';
			$animal_wildlife_custom_css .='text-align:Left;';
		$animal_wildlife_custom_css .='}';
		$animal_wildlife_custom_css .='.blogger .post-link{';
			$animal_wildlife_custom_css .='text-align:right;';
		$animal_wildlife_custom_css .='}';
	}

	/*--------- Preloader Color Option -------*/
	$animal_wildlife_loader_color_setting = get_theme_mod('animal_wildlife_loader_color_setting');
	$animal_wildlife_custom_css .=' .circle .inner{';
		$animal_wildlife_custom_css .='border-color: '.esc_attr($animal_wildlife_loader_color_setting).';';
	$animal_wildlife_custom_css .='} ';

	$animal_wildlife_loader_background_color = get_theme_mod('animal_wildlife_loader_background_color');
	$animal_wildlife_custom_css .=' #pre-loader{';
		$animal_wildlife_custom_css .='background-color: '.esc_attr($animal_wildlife_loader_background_color).';';
	$animal_wildlife_custom_css .='} ';

	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_preloader_types','Default');
    if($animal_wildlife_theme_lay == 'Default'){
		$animal_wildlife_custom_css .='{';
			$animal_wildlife_custom_css .='';
		$animal_wildlife_custom_css .='}';
	}elseif($animal_wildlife_theme_lay == 'Circle'){
		$animal_wildlife_custom_css .='.circle .inner{';
			$animal_wildlife_custom_css .='width:unset;';
		$animal_wildlife_custom_css .='}';
	}elseif($animal_wildlife_theme_lay == 'Two Circle'){
		$animal_wildlife_custom_css .='.circle .inner{';
			$animal_wildlife_custom_css .='width:80%;
    border-right: 5px;';
		$animal_wildlife_custom_css .='}';
	}

	// Responsive Media
    $animal_wildlife_preloader = get_theme_mod( 'animal_wildlife_enable_disable_preloader', false);
	if($animal_wildlife_preloader == true && get_theme_mod( 'animal_wildlife_loader_setting', false) == false){
    	$animal_wildlife_custom_css .='#pre-loader{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} ';
	}
    if($animal_wildlife_preloader == true){
    	$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#pre-loader{';
			$animal_wildlife_custom_css .='display:block;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_preloader == false){
		$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#pre-loader{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} }';
	}

	$animal_wildlife_sidebar = get_theme_mod( 'animal_wildlife_enable_disable_sidebar',true);
    if($animal_wildlife_sidebar == true){
    	$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#sidebox{';
			$animal_wildlife_custom_css .='display:block;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_sidebar == false){
		$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#sidebox{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} }';
	}

	$animal_wildlife_slider = get_theme_mod( 'animal_wildlife_enable_disable_slider', false);
	if($animal_wildlife_slider == true && get_theme_mod( 'animal_wildlife_slider_arrows', false) == false){
    	$animal_wildlife_custom_css .='#slider{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} ';
	}
    if($animal_wildlife_slider == true){
    	$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#slider{';
			$animal_wildlife_custom_css .='display:block;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_slider == false){
		$animal_wildlife_custom_css .='@media screen and (max-width:575px){';
		$animal_wildlife_custom_css .='#slider{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} }';
	}

	$animal_wildlife_sliderbutton = get_theme_mod( 'animal_wildlife_show_hide_slider_button', true);
	if($animal_wildlife_sliderbutton == true && get_theme_mod( 'animal_wildlife_slider_button', true) != true){
    	$animal_wildlife_custom_css .='#slider .readbutton{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} ';
	}
    if($animal_wildlife_sliderbutton == true){
    	$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='#slider .readbutton{';
			$animal_wildlife_custom_css .='display:inline-block;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_sliderbutton != true){
		$animal_wildlife_custom_css .='@media screen and (max-width:575px){';
		$animal_wildlife_custom_css .='#slider .readbutton{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} }';
	}

	$animal_wildlife_scroll = get_theme_mod( 'animal_wildlife_enable_disable_scrolltop', false);
	if($animal_wildlife_scroll == true && get_theme_mod( 'animal_wildlife_hide_show_scroll', false) == false){
    	$animal_wildlife_custom_css .='.scrollup i{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} ';
	}
    if($animal_wildlife_scroll == true){
    	$animal_wildlife_custom_css .='@media screen and (max-width:575px) {';
		$animal_wildlife_custom_css .='.scrollup i{';
			$animal_wildlife_custom_css .='display:block;';
		$animal_wildlife_custom_css .='} }';
	}else if($animal_wildlife_scroll == false){
		$animal_wildlife_custom_css .='@media screen and (max-width:575px){';
		$animal_wildlife_custom_css .='.scrollup i{';
			$animal_wildlife_custom_css .='display:none;';
		$animal_wildlife_custom_css .='} }';
	}

	// Copyright top-bottom padding setting
	$animal_wildlife_copyright_top_bottom_padding = get_theme_mod('animal_wildlife_copyright_top_bottom_padding');
	$animal_wildlife_custom_css .='.site-info{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($animal_wildlife_copyright_top_bottom_padding).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_footer_text_font_size = get_theme_mod('animal_wildlife_footer_text_font_size', 16);
	$animal_wildlife_custom_css .='.site-info{';
		$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_footer_text_font_size).'px;';
	$animal_wildlife_custom_css .='}';

	// Slider Height
	$animal_wildlife_slider_height_option = get_theme_mod('animal_wildlife_slider_height_option');
	$animal_wildlife_custom_css .='#slider img{';
		$animal_wildlife_custom_css .='height: '.esc_attr($animal_wildlife_slider_height_option).'px;';
	$animal_wildlife_custom_css .='}';

	// scroll to top setting
	$animal_wildlife_scroll_border_radius = get_theme_mod('animal_wildlife_scroll_border_radius');
	$animal_wildlife_custom_css .='.scrollup i{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_scroll_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_scroll_top_fontsize = get_theme_mod('animal_wildlife_scroll_top_fontsize');
	$animal_wildlife_custom_css .='.scrollup i{';
		$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_scroll_top_fontsize).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_scroll_top_bottom_padding = get_theme_mod('animal_wildlife_scroll_top_bottom_padding');
	$animal_wildlife_scroll_left_right_padding = get_theme_mod('animal_wildlife_scroll_left_right_padding');
	$animal_wildlife_custom_css .='.scrollup i{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_scroll_top_bottom_padding).'px; padding-bottom: '.esc_attr($animal_wildlife_scroll_top_bottom_padding).'px; padding-left: '.esc_attr($animal_wildlife_scroll_left_right_padding).'px; padding-right: '.esc_attr($animal_wildlife_scroll_left_right_padding).'px;';
	$animal_wildlife_custom_css .='}';

	// comment settings
	$animal_wildlife_comment_button_text = get_theme_mod('animal_wildlife_comment_button_text', 'Post Comment');
	if($animal_wildlife_comment_button_text == ''){
		$animal_wildlife_custom_css .='#comments p.form-submit {';
			$animal_wildlife_custom_css .='display: none;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_comment_form_heading = get_theme_mod('animal_wildlife_comment_form_heading', 'Leave a Reply');
	if($animal_wildlife_comment_form_heading == ''){
		$animal_wildlife_custom_css .='#comments h2#reply-title {';
			$animal_wildlife_custom_css .='display: none;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_comment_form_size = get_theme_mod( 'animal_wildlife_comment_form_size',100);
	$animal_wildlife_custom_css .='#comments textarea{';
		$animal_wildlife_custom_css .='width: '.esc_attr($animal_wildlife_comment_form_size).'%;';
	$animal_wildlife_custom_css .='}';

	/*------------ Woocommerce Settings  --------------*/
	$animal_wildlife_shop_button_padding_top = get_theme_mod('animal_wildlife_shop_button_padding_top', 9);
	$animal_wildlife_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce a.added_to_cart.wc-forward{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_shop_button_padding_top).'px; padding-bottom: '.esc_attr($animal_wildlife_shop_button_padding_top).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_shop_button_padding_left = get_theme_mod('animal_wildlife_shop_button_padding_left', 16);
	$animal_wildlife_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce a.added_to_cart.wc-forward{';
		$animal_wildlife_custom_css .='padding-left: '.esc_attr($animal_wildlife_shop_button_padding_left).'px; padding-right: '.esc_attr($animal_wildlife_shop_button_padding_left).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_shop_button_border_radius = get_theme_mod('animal_wildlife_shop_button_border_radius',5);
	$animal_wildlife_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart.wc-forward{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_shop_button_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_display_related_products = get_theme_mod('animal_wildlife_display_related_products',true);
	if($animal_wildlife_display_related_products == false){
		$animal_wildlife_custom_css .='.related.products{';
			$animal_wildlife_custom_css .='display: none;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_shop_products_border = get_theme_mod('animal_wildlife_shop_products_border', true);
	if($animal_wildlife_shop_products_border == false){
		$animal_wildlife_custom_css .='.woocommerce .products li{';
			$animal_wildlife_custom_css .='border: none;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_shop_page_top_padding = get_theme_mod('animal_wildlife_shop_page_top_padding',10);
	$animal_wildlife_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_shop_page_top_padding).'px !important; padding-bottom: '.esc_attr($animal_wildlife_shop_page_top_padding).'px !important;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_shop_page_left_padding = get_theme_mod('animal_wildlife_shop_page_left_padding',10);
	$animal_wildlife_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$animal_wildlife_custom_css .='padding-left: '.esc_attr($animal_wildlife_shop_page_left_padding).'px !important; padding-right: '.esc_attr($animal_wildlife_shop_page_left_padding).'px !important;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_shop_page_border_radius = get_theme_mod('animal_wildlife_shop_page_border_radius',0);
	$animal_wildlife_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_shop_page_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_shop_page_box_shadow = get_theme_mod('animal_wildlife_shop_page_box_shadow',0);
	$animal_wildlife_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$animal_wildlife_custom_css .='box-shadow: '.esc_attr($animal_wildlife_shop_page_box_shadow).'px '.esc_attr($animal_wildlife_shop_page_box_shadow).'px '.esc_attr($animal_wildlife_shop_page_box_shadow).'px #e4e4e4;';
	$animal_wildlife_custom_css .='}';

	// footer widget background
	$animal_wildlife_footer_widget_background = get_theme_mod('animal_wildlife_footer_widget_background', '#121212');
	$animal_wildlife_custom_css .='.site-footer{';
		$animal_wildlife_custom_css .='background-color: '.esc_attr($animal_wildlife_footer_widget_background).';';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_footer_widget_image = get_theme_mod('animal_wildlife_footer_widget_image');
	if($animal_wildlife_footer_widget_image != false){
		$animal_wildlife_custom_css .='.site-footer{';
			$animal_wildlife_custom_css .='background: url('.esc_attr($animal_wildlife_footer_widget_image).');';
		$animal_wildlife_custom_css .='}';
	}

	/*------------- Navigation Menu Font Size ------------------*/
	$animal_wildlife_navigation_menu_font_size = get_theme_mod('animal_wildlife_navigation_menu_font_size');{
		$animal_wildlife_custom_css .='.main-navigation a, .navigation-top a{';
			$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_navigation_menu_font_size).'px !important;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_menu_text_tranform','Default');
	if($animal_wildlife_theme_lay == 'Uppercase'){
		$animal_wildlife_custom_css .='.main-navigation a, .navigation-top a,.main-navigation ul ul a{';
			$animal_wildlife_custom_css .='text-transform:Uppercase;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_menu_font_weight','Default');
	if($animal_wildlife_theme_lay == 'Normal'){
		$animal_wildlife_custom_css .='.main-navigation a, .navigation-top a{';
			$animal_wildlife_custom_css .='font-weight: normal;';
		$animal_wildlife_custom_css .='}';
	}
	 // menu color
	$animal_wildlife_menu_color = get_theme_mod('animal_wildlife_menu_color');
	$animal_wildlife_custom_css .='.main-navigation a, .main-navigation ul li a, #site-navigation li a{';
			$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_menu_color).' !important;';
	$animal_wildlife_custom_css .='}';

	 // Sub menu color
	$animal_wildlife_sub_menu_color = get_theme_mod('animal_wildlife_sub_menu_color');
	$animal_wildlife_custom_css .='.main-navigation ul.sub-menu a, .main-navigation ul.sub-menu li a, #site-navigation ul.sub-menu li a{';
			$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_sub_menu_color).' !important;';
	$animal_wildlife_custom_css .='}';

	 // menu hover color
	$animal_wildlife_menu_hover_color = get_theme_mod('animal_wildlife_menu_hover_color');
	$animal_wildlife_custom_css .='.main-navigation a:hover, .main-navigation ul li a:hover, .main-navigation .current_page_item > a:hover, .main-navigation .current-menu-item > a:hover, .main-navigation .current_page_ancestor > a:hover, #site-navigation li a:hover{';
			$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_menu_hover_color).' !important;';
	$animal_wildlife_custom_css .='}';

	 // Sub menu hover color
	$animal_wildlife_sub_menu_hover_color = get_theme_mod('animal_wildlife_sub_menu_hover_color');
	$animal_wildlife_custom_css .='.main-navigation ul.sub-menu a:hover, .main-navigation ul.sub-menu li a:hover, .main-navigation .current_page_item > a:hover, .main-navigation .current-menu-item > a:hover, .main-navigation .current_page_ancestor > a:hover, #site-navigation ul.sub-menu li a:hover{';
			$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_sub_menu_hover_color).' !important;';
	$animal_wildlife_custom_css .='}';

    // site title color option
	$animal_wildlife_site_title_color_setting = get_theme_mod('animal_wildlife_site_title_color_setting');
	$animal_wildlife_custom_css .=' .site-title a{';
		$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_site_title_color_setting).';';
	$animal_wildlife_custom_css .='} ';

	$animal_wildlife_tagline_color_setting = get_theme_mod('animal_wildlife_tagline_color_setting');
	$animal_wildlife_custom_css .=' .site-description{';
		$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_tagline_color_setting).';';
	$animal_wildlife_custom_css .='} ';

    // site title font size option
	$animal_wildlife_site_title_font_size = get_theme_mod('animal_wildlife_site_title_font_size', 30);{
	$animal_wildlife_custom_css .='.logo h1, .site-title a{';
	$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_site_title_font_size).'px;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_site_tagline_font_size_settings = get_theme_mod('animal_wildlife_site_tagline_font_size_settings', 13);{
	$animal_wildlife_custom_css .='.logo p.site-description{';
	$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_site_tagline_font_size_settings).'px;';
		$animal_wildlife_custom_css .='}';
	}

    // -------------- site logo margin ------------
    $animal_wildlife_logo_margin = get_theme_mod('animal_wildlife_logo_margin', '');{
	$animal_wildlife_custom_css .='.logo{';
	$animal_wildlife_custom_css .='margin: '.esc_attr($animal_wildlife_logo_margin).'px ;';
	$animal_wildlife_custom_css .='}';
	}
   //  ------------------logo padding-----------
   $animal_wildlife_logo_padding = get_theme_mod('animal_wildlife_logo_padding');
   $animal_wildlife_custom_css .='.logo{';
   $animal_wildlife_custom_css .='padding: '.esc_attr($animal_wildlife_logo_padding).'px;';
   $animal_wildlife_custom_css .='}';

	/*------------------ Background Skin Option  -------------------*/
	$animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_background_image_type','Transparent');
    if($animal_wildlife_theme_lay == 'Background'){
		$animal_wildlife_custom_css .='.blogger, #sidebox .widget, .about-text, .related-posts .page-box, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .background-img-skin, .pages-te, .woocommerce .woocommerce-ordering{';
			$animal_wildlife_custom_css .='background-color: #fff;';
		$animal_wildlife_custom_css .='}';
	}else if($animal_wildlife_theme_lay == 'Transparent'){
		$animal_wildlife_custom_css .='#services h3{';
			$animal_wildlife_custom_css .='background-color: transparent;';
		$animal_wildlife_custom_css .='}';
	}

	// slider overlay
	$animal_wildlife_show_slider_image_overlay = get_theme_mod('animal_wildlife_show_slider_image_overlay', true);
	if($animal_wildlife_show_slider_image_overlay == false){
		$animal_wildlife_custom_css .='#slider img{';
			$animal_wildlife_custom_css .='opacity:1;';
		$animal_wildlife_custom_css .='}';
	}
	$animal_wildlife_color_slider_image_overlay = get_theme_mod('animal_wildlife_color_slider_image_overlay', true);
	if($animal_wildlife_show_slider_image_overlay != false){
		$animal_wildlife_custom_css .='#slider{';
			$animal_wildlife_custom_css .='background-color: '.esc_attr($animal_wildlife_color_slider_image_overlay).';';
		$animal_wildlife_custom_css .='}';
	}

	// woocommerce product sale settings
	$animal_wildlife_border_radius_product_sale_text = get_theme_mod('animal_wildlife_border_radius_product_sale_text',0);
	$animal_wildlife_custom_css .='.woocommerce span.onsale {';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_border_radius_product_sale_text).'%;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_position_product_sale = get_theme_mod('animal_wildlife_position_product_sale', 'Right');
	if($animal_wildlife_position_product_sale == 'Right' ){
		$animal_wildlife_custom_css .='.woocommerce ul.products li.product .onsale{';
			$animal_wildlife_custom_css .=' left:auto; right:0;';
		$animal_wildlife_custom_css .='}';
	}elseif($animal_wildlife_position_product_sale == 'Left' ){
		$animal_wildlife_custom_css .='.woocommerce ul.products li.product .onsale{';
			$animal_wildlife_custom_css .=' left:0; right:auto;';
		$animal_wildlife_custom_css .='}';
	}

	$animal_wildlife_product_sale_text_size = get_theme_mod('animal_wildlife_product_sale_text_size',14);
	$animal_wildlife_custom_css .='.woocommerce span.onsale{';
		$animal_wildlife_custom_css .='font-size: '.esc_attr($animal_wildlife_product_sale_text_size).'px;';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_top_bottom_product_sale_padding = get_theme_mod('animal_wildlife_top_bottom_product_sale_padding');
	$animal_wildlife_left_right_product_sale_padding = get_theme_mod('animal_wildlife_left_right_product_sale_padding');
	$animal_wildlife_custom_css .='.woocommerce span.onsale{';
		$animal_wildlife_custom_css .='padding-top: '.esc_attr($animal_wildlife_top_bottom_product_sale_padding).'px; padding-bottom: '.esc_attr($animal_wildlife_top_bottom_product_sale_padding).'px; padding-left: '.esc_attr($animal_wildlife_left_right_product_sale_padding).'px; padding-right: '.esc_attr($animal_wildlife_left_right_product_sale_padding).'px; display:inline-block;';
	$animal_wildlife_custom_css .='}';

	// woocommerce Product Navigation
	$animal_wildlife_shop_products_navigation = get_theme_mod('animal_wildlife_shop_products_navigation', 'Yes');
	if($animal_wildlife_shop_products_navigation == 'No'){
		$animal_wildlife_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$animal_wildlife_custom_css .='display: none;';
		$animal_wildlife_custom_css .='}';
	}

	// Post Block
	$animal_wildlife_post_break_block_setting = get_theme_mod( 'animal_wildlife_post_break_block_setting','Into Blocks');
    if($animal_wildlife_post_break_block_setting == 'Without Blocks'){
		$animal_wildlife_custom_css .='.blogger{';
			$animal_wildlife_custom_css .='border: none; margin:30px 0;';
		$animal_wildlife_custom_css .='}';
	}

	// fixed header padding option
	$animal_wildlife_fixed_header_padding_option = get_theme_mod('animal_wildlife_fixed_header_padding_option');
	$animal_wildlife_custom_css .='.fixed-header{';
		$animal_wildlife_custom_css .='padding: '.esc_attr($animal_wildlife_fixed_header_padding_option).'px;';
	$animal_wildlife_custom_css .='}';

	// slider top and bottom padding
	$animal_wildlife_padding_top_bottom_slider_content = get_theme_mod('animal_wildlife_padding_top_bottom_slider_content');
	$animal_wildlife_padding_left_right_slider_content = get_theme_mod('animal_wildlife_padding_left_right_slider_content');
	$animal_wildlife_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$animal_wildlife_custom_css .='top: '.esc_attr($animal_wildlife_padding_top_bottom_slider_content).'%; bottom: '.esc_attr($animal_wildlife_padding_top_bottom_slider_content).'%;left: '.esc_attr($animal_wildlife_padding_left_right_slider_content).'%;right: '.esc_attr($animal_wildlife_padding_left_right_slider_content).'%;';

	$animal_wildlife_custom_css .='}';

	// Slider
	$animal_wildlife_slider_arrows = get_theme_mod('animal_wildlife_slider_arrows',false);
	if ($animal_wildlife_slider_arrows == false) {
		$animal_wildlife_custom_css .='.page-template-home-custom #masthead{';
			$animal_wildlife_custom_css .=' position:static; border-bottom: 2px solid #e2e2e2;';

		$animal_wildlife_custom_css .='}';
	}

	 //Copyright background css
	$animal_wildlife_copyright_background_color = get_theme_mod('animal_wildlife_copyright_background_color');
	$animal_wildlife_custom_css .='.site-info{';
		$animal_wildlife_custom_css .='background-color: '.esc_attr($animal_wildlife_copyright_background_color).';';
	$animal_wildlife_custom_css .='}';

     // featured image dimention
	$animal_wildlife_post_image_dimention = get_theme_mod('animal_wildlife_post_image_dimention', 'Default');
	$animal_wildlife_post_featured_image_width = get_theme_mod('animal_wildlife_post_featured_image_width');
	$animal_wildlife_post_featured_image_height = get_theme_mod('animal_wildlife_post_featured_image_height');
	if($animal_wildlife_post_image_dimention == 'Custom Image Size'){
		$animal_wildlife_custom_css .='.post-image img{';
			$animal_wildlife_custom_css .='width: '.esc_attr($animal_wildlife_post_featured_image_width).'px; height: '.esc_attr($animal_wildlife_post_featured_image_height).'px;';
		$animal_wildlife_custom_css .='}';
	}

	// Single Post Categories
	$animal_wildlife_show_hide_single_post_categories = get_theme_mod('animal_wildlife_show_hide_single_post_categories',false);
	if ($animal_wildlife_show_hide_single_post_categories == false) {
		$animal_wildlife_custom_css .='.post-info{';
			$animal_wildlife_custom_css .=' margin-top:20px;';
		$animal_wildlife_custom_css .='}';
	}

	// Blog post image border radious
    $animal_wildlife_blog_post_img_border_radius = get_theme_mod('animal_wildlife_blog_post_img_border_radius', 0);
	$animal_wildlife_custom_css .='.blogger .post-image img{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_blog_post_img_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

     // Blog post image box shadow
	$animal_wildlife_blog_post_img_box_shadow = get_theme_mod('animal_wildlife_blog_post_img_box_shadow',0);
	$animal_wildlife_custom_css .='.blogger .post-image img{';
		$animal_wildlife_custom_css .='box-shadow: '.esc_attr($animal_wildlife_blog_post_img_box_shadow).'px '.esc_attr($animal_wildlife_blog_post_img_box_shadow).'px '.esc_attr($animal_wildlife_blog_post_img_box_shadow).'px #ccc;';
	$animal_wildlife_custom_css .='}';

    // Single post image border radious
	$animal_wildlife_single_post_img_border_radius = get_theme_mod('animal_wildlife_single_post_img_border_radius', 0);
	$animal_wildlife_custom_css .='.blogger.singlebox img{';
		$animal_wildlife_custom_css .='border-radius: '.esc_attr($animal_wildlife_single_post_img_border_radius).'px;';
	$animal_wildlife_custom_css .='}';

	 // Single post image box shadow
	$animal_wildlife_single_post_img_box_shadow = get_theme_mod('animal_wildlife_single_post_img_box_shadow',0);
	$animal_wildlife_custom_css .='.blogger.singlebox img{';
		$animal_wildlife_custom_css .='box-shadow: '.esc_attr($animal_wildlife_single_post_img_box_shadow).'px '.esc_attr($animal_wildlife_single_post_img_box_shadow).'px '.esc_attr($animal_wildlife_single_post_img_box_shadow).'px #ccc;';
	$animal_wildlife_custom_css .='}';

	// Single post comments
	$animal_wildlife_post_comment_enable = get_theme_mod('animal_wildlife_post_comment_enable',true);
	if($animal_wildlife_post_comment_enable == false){
		$animal_wildlife_custom_css .='#comments{';
			$animal_wildlife_custom_css .='display: none;';
		$animal_wildlife_custom_css .='}';
	}

	//scroll to top css
	$animal_wildlife_scroll_background_color = get_theme_mod('animal_wildlife_scroll_background_color');
	$animal_wildlife_custom_css .='.scrollup i{';
	$animal_wildlife_custom_css .='background: '.esc_attr($animal_wildlife_scroll_background_color).';';
	$animal_wildlife_custom_css .='border-color: '.esc_attr($animal_wildlife_scroll_background_color).';';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_scroll_icon_color = get_theme_mod('animal_wildlife_scroll_icon_color');
	$animal_wildlife_custom_css .='.scrollup i{';
	$animal_wildlife_custom_css .='color: '.esc_attr($animal_wildlife_scroll_icon_color).';';
	$animal_wildlife_custom_css .='}';

	$animal_wildlife_scroll_background_hover_color = get_theme_mod('animal_wildlife_scroll_background_hover_color');
	$animal_wildlife_custom_css .='.scrollup i:hover{';
	$animal_wildlife_custom_css .='background: '.esc_attr($animal_wildlife_scroll_background_hover_color).';';
	$animal_wildlife_custom_css .='border-color: '.esc_attr($animal_wildlife_scroll_background_hover_color).';';
	$animal_wildlife_custom_css .='}';

	//Initial Cap
	$animal_wildlife_caps_enable = get_theme_mod('animal_wildlife_caps_enable', 'false');
	if($animal_wildlife_caps_enable == 'true' ){
	$animal_wildlife_custom_css .='.blogger .text p:nth-of-type(1)::first-letter{';
	$animal_wildlife_custom_css .=' font-size: 60px; font-weight: 800;';
	$animal_wildlife_custom_css .=' margin-right: 10px;';
	$animal_wildlife_custom_css .=' font-family: "Vollkorn", serif;';
	$animal_wildlife_custom_css .=' line-height: 1; float: left;';
	$animal_wildlife_custom_css .='}';
	}elseif($animal_wildlife_caps_enable == 'false' ){
	$animal_wildlife_custom_css .='.blogger .text p:nth-of-type(1)::first-letter {';
	$animal_wildlife_custom_css .='display: none;';
	$animal_wildlife_custom_css .='}';
	}