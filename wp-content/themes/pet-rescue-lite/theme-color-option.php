<?php

	$pet_rescue_lite_custom_css ='';

	/*----------- Global First Color -----------*/
	$pet_rescue_lite_first_color = get_theme_mod('pet_rescue_lite_first_color');

	$pet_rescue_lite_custom_css .='a, a:hover, #header .socialbox i:hover, .metabox a:hover, .nav-previous a, .nav-next a, p.logged-in-as a, nav.navigation.post-navigation a:hover, .footer-wp li a:hover, h2.entry-title, h2.page-title, #project i, .woocommerce-message::before, .woocommerce-info a, td.product-name a, a.shipping-calculator-button, span.posted_in a, code, .primary-navigation a:hover, #comments p a:hover, .entry-content a, .footer-wp h3, h1, h2, h3, h4, h5, h6, .new-text p a, .woocommerce .quantity .qty, #sidebar .textwidget p a, .tags, a:hover, #comments a time,  #sidebar .textwidget a:hover, #product-slide .owl-nav button, input[type="search"], #sidebar ul li a:hover,  #sidebar h3.widget-title a.rsswidget{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_first_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_custom_css .='input[type="submit"]:hover, #sidebar button, .slide-button i, .appointbtn, .primary-navigation ul ul a, .primary-navigation ul ul a, .postbtn i, .blog-section .section-title a:after, .page-content .read-moresec a.button:hover, #comments input[type="submit"].submit:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, .widget_calendar tbody a, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"], .footer-wp .tagcloud a:hover , .pagination a:hover, .pagination .current, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #navbar-header .socialbox, #navbar-header .socialbox, #scrollbutton i, #sidebar button, .footer-wp button, .tags a:hover, .topbar, #product-slide .cart-button a.button, #slider .more-btn a, .postbtn a, #slider .more-btn a, .postbtn a, #slider .carousel-control-next-icon:hover, .frame, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce a.added_to_cart, #comments input[type="submit"].submit, #sidebar input[type="submit"], .nav-previous a, .nav-next a, #sidebar .tagcloud a:hover, nav.navigation.post-navigation a:hover,.nav-previous a:hover, input[type="submit"], #product-slide .owl-nav button:hover, #slider .carousel-control-prev-icon:hover, #sidebar ul li:before, #sidebar button:hover, .metabox .fa-calendar-alt:before, .metabox .fa-user:before, .metabox .fa-comments:before, .metabox .fa-clock:before, #slider .more-btn a i:after, .postbtn a i:after{';
			$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_first_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_custom_css .='#blog_sec .sticky, .page-content .read-moresec a.button:hover, #scrollbutton i, .woocommerce .quantity .qty, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .related-inner-box, #product-slide .owl-nav button, input[type="search"]{';
			$pet_rescue_lite_custom_css .='border-color: '.esc_attr($pet_rescue_lite_first_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_custom_css .='.woocommerce-message{';
		$pet_rescue_lite_custom_css .='border-top-color: '.esc_attr($pet_rescue_lite_first_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='box-shadow: inset 0px 0px 0px '.esc_attr($pet_rescue_lite_first_color).', 0px 5px 0px 0px #871c1c, 0px 5px 4px #000;';
	$pet_rescue_lite_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_width_layout_options','Default');
    if($pet_rescue_lite_theme_lay == 'Default'){
		$pet_rescue_lite_custom_css .='body{';
			$pet_rescue_lite_custom_css .='max-width: 100%;';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Container Layout'){
		$pet_rescue_lite_custom_css .='body{';
			$pet_rescue_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Box Layout'){
		$pet_rescue_lite_custom_css .='body{';
			$pet_rescue_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$pet_rescue_lite_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_slider_content_layout','Left');
    if($pet_rescue_lite_theme_lay == 'Left'){
		$pet_rescue_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$pet_rescue_lite_custom_css .='text-align:left; left:10%; right:50%;';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Center'){
		$pet_rescue_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$pet_rescue_lite_custom_css .='text-align:center; left:30%; right:30%;';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Right'){
		$pet_rescue_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$pet_rescue_lite_custom_css .='text-align:right; right:10%; left:50%;';
		$pet_rescue_lite_custom_css .='}';
	}

	/*------------ Slider Opacity -------------------*/
	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_slider_opacity','0.7');
	if($pet_rescue_lite_theme_lay == '0'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.1'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.1';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.2'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.2';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.3'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.3';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.4'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.4';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.5'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.5';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.6'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.6';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.7'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.7';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.8'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.8';
	$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == '0.9'){
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='opacity:0.9';
	$pet_rescue_lite_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$pet_rescue_lite_footer_text_align = get_theme_mod('pet_rescue_lite_footer_text_align');
	$pet_rescue_lite_custom_css .='.copyright-wrapper{';
		$pet_rescue_lite_custom_css .='text-align: '.esc_attr($pet_rescue_lite_footer_text_align).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_footer_text_padding = get_theme_mod('pet_rescue_lite_footer_text_padding');
	$pet_rescue_lite_custom_css .='.copyright-wrapper{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_footer_text_padding).'px !important; padding-bottom: '.esc_attr($pet_rescue_lite_footer_text_padding).'px !important;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_footer_bg_color = get_theme_mod('pet_rescue_lite_footer_bg_color');
	$pet_rescue_lite_custom_css .='.footer-wp{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_footer_bg_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_footer_bg_image = get_theme_mod('pet_rescue_lite_footer_bg_image');
	if($pet_rescue_lite_footer_bg_image != false){
		$pet_rescue_lite_custom_css .='.footer-wp{';
			$pet_rescue_lite_custom_css .='background: url('.esc_attr($pet_rescue_lite_footer_bg_image).');';
		$pet_rescue_lite_custom_css .='}';
	}

	// footer padding
	$pet_rescue_lite_footer_padding = get_theme_mod('pet_rescue_lite_footer_padding');
	$pet_rescue_lite_custom_css .='.footer-wp{';
		$pet_rescue_lite_custom_css .='padding: '.esc_attr($pet_rescue_lite_footer_padding).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_copyright_text_font_size = get_theme_mod('pet_rescue_lite_copyright_text_font_size', 15);
	$pet_rescue_lite_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_copyright_text_font_size).'px;';
	$pet_rescue_lite_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$pet_rescue_lite_back_to_top_border_radius = get_theme_mod('pet_rescue_lite_back_to_top_border_radius', 50);
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_back_to_top_border_radius).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_scroll_icon_font_size = get_theme_mod('pet_rescue_lite_scroll_icon_font_size', 22);
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_scroll_icon_font_size).'px;';
	$pet_rescue_lite_custom_css .='}';

	// back to top icon color
	$pet_rescue_lite_scroll_icon_color = get_theme_mod('pet_rescue_lite_scroll_icon_color');
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_scroll_icon_color).';';
	$pet_rescue_lite_custom_css .='}';

	// back to top icon hover color
	$pet_rescue_lite_scroll_icon_hover_color = get_theme_mod('pet_rescue_lite_scroll_icon_hover_color');
	$pet_rescue_lite_custom_css .='#scrollbutton i:hover{';
		$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_scroll_icon_hover_color).';';
	$pet_rescue_lite_custom_css .='}';

	// back to top bg color
	$pet_rescue_lite_scroll_icon_background = get_theme_mod('pet_rescue_lite_scroll_icon_background');
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_scroll_icon_background).';';
		$pet_rescue_lite_custom_css .='border-color: '.esc_attr($pet_rescue_lite_scroll_icon_background).';';
	$pet_rescue_lite_custom_css .='}';

	// back to top bg hover color
	$pet_rescue_lite_scroll_icon_background_hover = get_theme_mod('pet_rescue_lite_scroll_icon_background_hover');
	$pet_rescue_lite_custom_css .='#scrollbutton i:hover{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_scroll_icon_background_hover).';';
		$pet_rescue_lite_custom_css .='border-color: '.esc_attr($pet_rescue_lite_scroll_icon_background_hover).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_top_bottom_scroll_padding = get_theme_mod('pet_rescue_lite_top_bottom_scroll_padding', 12);
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($pet_rescue_lite_top_bottom_scroll_padding).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_left_right_scroll_padding = get_theme_mod('pet_rescue_lite_left_right_scroll_padding', 17);
	$pet_rescue_lite_custom_css .='#scrollbutton i{';
		$pet_rescue_lite_custom_css .='padding-left: '.esc_attr($pet_rescue_lite_left_right_scroll_padding).'px; padding-right: '.esc_attr($pet_rescue_lite_left_right_scroll_padding).'px;';
	$pet_rescue_lite_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$pet_rescue_lite_post_button_padding_top = get_theme_mod('pet_rescue_lite_post_button_padding_top');
	$pet_rescue_lite_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_post_button_padding_top).'px; padding-bottom: '.esc_attr($pet_rescue_lite_post_button_padding_top).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_post_button_padding_right = get_theme_mod('pet_rescue_lite_post_button_padding_right');
	$pet_rescue_lite_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$pet_rescue_lite_custom_css .='padding-left: '.esc_attr($pet_rescue_lite_post_button_padding_right).'px; padding-right: '.esc_attr($pet_rescue_lite_post_button_padding_right).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_post_button_border_radius = get_theme_mod('pet_rescue_lite_post_button_border_radius');
	$pet_rescue_lite_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_post_button_border_radius).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_post_comment_enable = get_theme_mod('pet_rescue_lite_post_comment_enable',true);
	if($pet_rescue_lite_post_comment_enable == false){
		$pet_rescue_lite_custom_css .='#comments{';
			$pet_rescue_lite_custom_css .='display: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$pet_rescue_lite_preloader_bg_color_option = get_theme_mod('pet_rescue_lite_preloader_bg_color_option');
	$pet_rescue_lite_preloader_icon_color_option = get_theme_mod('pet_rescue_lite_preloader_icon_color_option');
	$pet_rescue_lite_custom_css .='.frame{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_preloader_bg_color_option).';';
	$pet_rescue_lite_custom_css .='}';
	$pet_rescue_lite_custom_css .='.dot-1,.dot-2,.dot-3{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_preloader_icon_color_option).';';
	$pet_rescue_lite_custom_css .='}';

	// preloader type
	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_preloader_type','First Preloader Type');
    if($pet_rescue_lite_theme_lay == 'First Preloader Type'){
		$pet_rescue_lite_custom_css .='.dot-1, .dot-2, .dot-3{';
			$pet_rescue_lite_custom_css .='';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Second Preloader Type'){
		$pet_rescue_lite_custom_css .='.dot-1, .dot-2, .dot-3{';
			$pet_rescue_lite_custom_css .='border-radius:0;';
		$pet_rescue_lite_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_background_skin','Without Background');
    if($pet_rescue_lite_theme_lay == 'With Background'){
		$pet_rescue_lite_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$pet_rescue_lite_custom_css .='background-color: #fff; padding:20px;';
		$pet_rescue_lite_custom_css .='}';
		$pet_rescue_lite_custom_css .='.login-box a{';
			$pet_rescue_lite_custom_css .='background-color: #fff;';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Without Background'){
		$pet_rescue_lite_custom_css .='{';
			$pet_rescue_lite_custom_css .='background-color: transparent;';
		$pet_rescue_lite_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$pet_rescue_lite_woocommerce_button_padding_top = get_theme_mod('pet_rescue_lite_woocommerce_button_padding_top',12);
	$pet_rescue_lite_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($pet_rescue_lite_woocommerce_button_padding_top).'px;';
	$pet_rescue_lite_custom_css .='}';
	

	$pet_rescue_lite_woocommerce_button_padding_right = get_theme_mod('pet_rescue_lite_woocommerce_button_padding_right',15);
	$pet_rescue_lite_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$pet_rescue_lite_custom_css .='padding-left: '.esc_attr($pet_rescue_lite_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($pet_rescue_lite_woocommerce_button_padding_right).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woocommerce_button_border_radius = get_theme_mod('pet_rescue_lite_woocommerce_button_border_radius',5);
	$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_woocommerce_button_border_radius).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_related_product_enable = get_theme_mod('pet_rescue_lite_related_product_enable',true);
	if($pet_rescue_lite_related_product_enable == false){
		$pet_rescue_lite_custom_css .='.related.products{';
			$pet_rescue_lite_custom_css .='display: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	$pet_rescue_lite_woocommerce_product_border_enable = get_theme_mod('pet_rescue_lite_woocommerce_product_border_enable',true);
	if($pet_rescue_lite_woocommerce_product_border_enable == false){
		$pet_rescue_lite_custom_css .='.products li{';
			$pet_rescue_lite_custom_css .='border: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	$pet_rescue_lite_woocommerce_product_padding_top = get_theme_mod('pet_rescue_lite_woocommerce_product_padding_top',0);
	$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($pet_rescue_lite_woocommerce_product_padding_top).'px !important;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woocommerce_product_padding_right = get_theme_mod('pet_rescue_lite_woocommerce_product_padding_right',0);
	$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$pet_rescue_lite_custom_css .='padding-left: '.esc_attr($pet_rescue_lite_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($pet_rescue_lite_woocommerce_product_padding_right).'px !important;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woocommerce_product_border_radius = get_theme_mod('pet_rescue_lite_woocommerce_product_border_radius',20);
	$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_woocommerce_product_border_radius).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woocommerce_product_box_shadow = get_theme_mod('pet_rescue_lite_woocommerce_product_box_shadow', 5);
	$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$pet_rescue_lite_custom_css .='box-shadow: '.esc_attr($pet_rescue_lite_woocommerce_product_box_shadow).'px '.esc_attr($pet_rescue_lite_woocommerce_product_box_shadow).'px '.esc_attr($pet_rescue_lite_woocommerce_product_box_shadow).'px #eee;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woo_product_sale_top_bottom_padding = get_theme_mod('pet_rescue_lite_woo_product_sale_top_bottom_padding', 0);
	$pet_rescue_lite_woo_product_sale_left_right_padding = get_theme_mod('pet_rescue_lite_woo_product_sale_left_right_padding', 0);
	$pet_rescue_lite_custom_css .='.woocommerce span.onsale{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($pet_rescue_lite_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($pet_rescue_lite_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($pet_rescue_lite_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woo_product_sale_border_radius = get_theme_mod('pet_rescue_lite_woo_product_sale_border_radius',50);
	$pet_rescue_lite_custom_css .='.woocommerce span.onsale {';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_woo_product_sale_border_radius).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_woo_product_sale_position = get_theme_mod('pet_rescue_lite_woo_product_sale_position', 'Right');
	if($pet_rescue_lite_woo_product_sale_position == 'Right' ){
		$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$pet_rescue_lite_custom_css .=' left:auto; right:0;';
		$pet_rescue_lite_custom_css .='}';
	}elseif($pet_rescue_lite_woo_product_sale_position == 'Left' ){
		$pet_rescue_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$pet_rescue_lite_custom_css .=' left:0; right:auto;';
		$pet_rescue_lite_custom_css .='}';
	}

	$pet_rescue_lite_wooproduct_sale_font_size = get_theme_mod('pet_rescue_lite_wooproduct_sale_font_size',14);
	$pet_rescue_lite_custom_css .='.woocommerce span.onsale{';
		$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_wooproduct_sale_font_size).'px;';
	$pet_rescue_lite_custom_css .='}';

	// Responsive Media
	$pet_rescue_lite_post_date = get_theme_mod( 'pet_rescue_lite_display_post_date',true);
	if($pet_rescue_lite_post_date == true && get_theme_mod( 'pet_rescue_lite_metafields_date',true) != true){
    	$pet_rescue_lite_custom_css .='.metabox .entry-date{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_post_date == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.metabox .entry-date{';
			$pet_rescue_lite_custom_css .='display:inline-block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_post_date == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.metabox .entry-date{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_post_author = get_theme_mod( 'pet_rescue_lite_display_post_author',true);
	if($pet_rescue_lite_post_author == true && get_theme_mod( 'pet_rescue_lite_metafields_author',true) != true){
    	$pet_rescue_lite_custom_css .='.metabox .entry-author{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_post_author == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.metabox .entry-author{';
			$pet_rescue_lite_custom_css .='display:inline-block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_post_author == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.metabox .entry-author{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_post_comment = get_theme_mod( 'pet_rescue_lite_display_post_comment',true);
	if($pet_rescue_lite_post_comment == true && get_theme_mod( 'pet_rescue_lite_metafields_comment',true) != true){
    	$pet_rescue_lite_custom_css .='.metabox .entry-comments{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_post_comment == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.metabox .entry-comments{';
			$pet_rescue_lite_custom_css .='display:inline-block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_post_comment == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.metabox .entry-comments{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_post_time = get_theme_mod( 'pet_rescue_lite_display_post_time',false);
	if($pet_rescue_lite_post_time == true && get_theme_mod( 'pet_rescue_lite_metafields_time',false) != true){
    	$pet_rescue_lite_custom_css .='.metabox .entry-time{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_post_time == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.metabox .entry-time{';
			$pet_rescue_lite_custom_css .='display:inline-block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_post_time == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.metabox .entry-time{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	if($pet_rescue_lite_post_date == false && $pet_rescue_lite_post_author == false && $pet_rescue_lite_post_comment == false && $pet_rescue_lite_post_time == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
    	$pet_rescue_lite_custom_css .='.metabox {';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_metafields_date = get_theme_mod( 'pet_rescue_lite_metafields_date',true);
	$pet_rescue_lite_metafields_author = get_theme_mod( 'pet_rescue_lite_metafields_author',true);
	$pet_rescue_lite_metafields_comment = get_theme_mod( 'pet_rescue_lite_metafields_comment',true);
	$pet_rescue_lite_metafields_time = get_theme_mod( 'pet_rescue_lite_metafields_time',true);
	if($pet_rescue_lite_metafields_date == false && $pet_rescue_lite_metafields_author == false && $pet_rescue_lite_metafields_comment == false && $pet_rescue_lite_metafields_time == false){
		$pet_rescue_lite_custom_css .='@media screen and (min-width:576px) {';
    	$pet_rescue_lite_custom_css .='.metabox {';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_slider = get_theme_mod( 'pet_rescue_lite_display_slider',false);
	if($pet_rescue_lite_slider == true && get_theme_mod( 'pet_rescue_lite_slider_hide', false) == false){
    	$pet_rescue_lite_custom_css .='#slider{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_slider == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='#slider{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_slider == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='#slider{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_sidebar = get_theme_mod( 'pet_rescue_lite_display_sidebar',true);
    if($pet_rescue_lite_sidebar == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='#sidebar{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_sidebar == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='#sidebar{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_scroll = get_theme_mod( 'pet_rescue_lite_display_scrolltop',true);
	if($pet_rescue_lite_scroll == true && get_theme_mod( 'pet_rescue_lite_hide_show_scroll',true) != true){
    	$pet_rescue_lite_custom_css .='#scrollbutton i{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_scroll == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='#scrollbutton i{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_scroll == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='#scrollbutton i{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_preloader = get_theme_mod( 'pet_rescue_lite_display_preloader',false);
	if($pet_rescue_lite_preloader == true && get_theme_mod( 'pet_rescue_lite_preloader',false) == false){
		$pet_rescue_lite_custom_css .='@media screen and (min-width:575px) {';
    	$pet_rescue_lite_custom_css .='.frame{';
			$pet_rescue_lite_custom_css .=' display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}
    if($pet_rescue_lite_preloader == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.frame{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_preloader == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.frame{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_search = get_theme_mod( 'pet_rescue_lite_display_search_category',true);
	if($pet_rescue_lite_search == true && get_theme_mod( 'pet_rescue_lite_search_enable_disable',true) != true){
    	$pet_rescue_lite_custom_css .='.search-cat-box{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_search == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.search-cat-box{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_search == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.search-cat-box{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	$pet_rescue_lite_myaccount = get_theme_mod( 'pet_rescue_lite_display_myaccount',true);
	if($pet_rescue_lite_myaccount == true && get_theme_mod( 'pet_rescue_lite_myaccount_enable_disable',true) != true){
    	$pet_rescue_lite_custom_css .='.login-box{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} ';
	}
    if($pet_rescue_lite_myaccount == true){
    	$pet_rescue_lite_custom_css .='@media screen and (max-width:575px) {';
		$pet_rescue_lite_custom_css .='.login-box{';
			$pet_rescue_lite_custom_css .='display:block;';
		$pet_rescue_lite_custom_css .='} }';
	}else if($pet_rescue_lite_myaccount == false){
		$pet_rescue_lite_custom_css .='@media screen and (max-width:575px){';
		$pet_rescue_lite_custom_css .='.login-box{';
			$pet_rescue_lite_custom_css .='display:none;';
		$pet_rescue_lite_custom_css .='} }';
	}

	// menu settings
	$pet_rescue_lite_menu_font_size_option = get_theme_mod('pet_rescue_lite_menu_font_size_option');
	$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
		$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_menu_font_size_option).'px;';
	$pet_rescue_lite_custom_css .='}';

	// menu top-bottom padding
	$pet_rescue_lite_menu_top_bottom_padding = get_theme_mod('pet_rescue_lite_menu_top_bottom_padding');
	$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
		$pet_rescue_lite_custom_css .='padding-top: '.esc_attr($pet_rescue_lite_menu_top_bottom_padding).'px;';
		$pet_rescue_lite_custom_css .='padding-bottom: '.esc_attr($pet_rescue_lite_menu_top_bottom_padding).'px;';
	$pet_rescue_lite_custom_css .='}';

	// menu left-right padding
	$pet_rescue_lite_menu_left_right_padding = get_theme_mod('pet_rescue_lite_menu_left_right_padding');
	$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
		$pet_rescue_lite_custom_css .='padding-left: '.esc_attr($pet_rescue_lite_menu_left_right_padding).'px;';
		$pet_rescue_lite_custom_css .='padding-right: '.esc_attr($pet_rescue_lite_menu_left_right_padding).'px;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_text_tranform_menu','Capitalize');
    if($pet_rescue_lite_theme_lay == 'Capitalize'){
		$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
			$pet_rescue_lite_custom_css .='';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Lowercase'){
		$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
			$pet_rescue_lite_custom_css .='text-transform: lowercase;';
		$pet_rescue_lite_custom_css .='}';
	}
	else if($pet_rescue_lite_theme_lay == 'Uppercase'){
		$pet_rescue_lite_custom_css .='.primary-navigation ul li a{';
			$pet_rescue_lite_custom_css .='text-transform: Uppercase;';
		$pet_rescue_lite_custom_css .='}';
	}

	// menu font weight
	$pet_rescue_lite_font_weight_option_menu = get_theme_mod( 'pet_rescue_lite_font_weight_option_menu','500');
	if($pet_rescue_lite_font_weight_option_menu != ''){
		$pet_rescue_lite_custom_css .='.primary-navigation a, .primary-navigation ul li a{';
			$pet_rescue_lite_custom_css .='font-weight: '.esc_attr($pet_rescue_lite_font_weight_option_menu).';';
		$pet_rescue_lite_custom_css .='}';
	}

	// slider height
	$pet_rescue_lite_option_slider_height = get_theme_mod('pet_rescue_lite_option_slider_height');
	$pet_rescue_lite_custom_css .='#slider .slider-bg img{';
		$pet_rescue_lite_custom_css .='height: '.esc_attr($pet_rescue_lite_option_slider_height).'px;';
	$pet_rescue_lite_custom_css .='}';

	// slider content spacing
	$pet_rescue_lite_slider_content_top_padding = get_theme_mod('pet_rescue_lite_slider_content_top_padding');
	$pet_rescue_lite_slider_content_left_padding = get_theme_mod('pet_rescue_lite_slider_content_left_padding');
	$pet_rescue_lite_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$pet_rescue_lite_custom_css .='top: '.esc_attr($pet_rescue_lite_slider_content_top_padding).'%; bottom: '.esc_attr($pet_rescue_lite_slider_content_top_padding).'%;left: '.esc_attr($pet_rescue_lite_slider_content_left_padding).'%;right: '.esc_attr($pet_rescue_lite_slider_content_left_padding).'%;';
	$pet_rescue_lite_custom_css .='}';

	// slider overlay
	$pet_rescue_lite_enable_slider_overlay = get_theme_mod('pet_rescue_lite_enable_slider_overlay', true);
	if($pet_rescue_lite_enable_slider_overlay == false){
		$pet_rescue_lite_custom_css .='#slider image{';
			$pet_rescue_lite_custom_css .='opacity:1;';
		$pet_rescue_lite_custom_css .='}';
	} 
	$pet_rescue_lite_slider_overlay_color = get_theme_mod('pet_rescue_lite_slider_overlay_color', true);
	if($pet_rescue_lite_enable_slider_overlay != false){
		$pet_rescue_lite_custom_css .='#slider{';
			$pet_rescue_lite_custom_css .='background: '.esc_attr($pet_rescue_lite_slider_overlay_color).';';
		$pet_rescue_lite_custom_css .='}';
	}

	//  comment form width
	$pet_rescue_lite_comment_form_width = get_theme_mod( 'pet_rescue_lite_comment_form_width');
	$pet_rescue_lite_custom_css .='#comments textarea{';
		$pet_rescue_lite_custom_css .='width: '.esc_attr($pet_rescue_lite_comment_form_width).'%;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_title_comment_form = get_theme_mod('pet_rescue_lite_title_comment_form', 'Leave a Reply');
	if($pet_rescue_lite_title_comment_form == ''){
		$pet_rescue_lite_custom_css .='#comments h2#reply-title {';
			$pet_rescue_lite_custom_css .='display: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	$pet_rescue_lite_comment_form_button_content = get_theme_mod('pet_rescue_lite_comment_form_button_content', 'Post Comment');
	if($pet_rescue_lite_comment_form_button_content == ''){
		$pet_rescue_lite_custom_css .='#comments p.form-submit {';
			$pet_rescue_lite_custom_css .='display: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	// featured image setting
	$pet_rescue_lite_image_border_radius = get_theme_mod('pet_rescue_lite_image_border_radius', 0);
	$pet_rescue_lite_custom_css .='.box-image img, .content_box img{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_image_border_radius).'%;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_image_box_shadow = get_theme_mod('pet_rescue_lite_image_box_shadow',0);
	$pet_rescue_lite_custom_css .='.box-image img, .content_box img{';
		$pet_rescue_lite_custom_css .='box-shadow: '.esc_attr($pet_rescue_lite_image_box_shadow).'px '.esc_attr($pet_rescue_lite_image_box_shadow).'px '.esc_attr($pet_rescue_lite_image_box_shadow).'px #b5b5b5;';
	$pet_rescue_lite_custom_css .='}';

	// single featured image setting
	$pet_rescue_lite_single_image_border_radius = get_theme_mod('pet_rescue_lite_single_image_border_radius', 0);
	$pet_rescue_lite_custom_css .='.feature-box img{';
		$pet_rescue_lite_custom_css .='border-radius: '.esc_attr($pet_rescue_lite_single_image_border_radius).'%;';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_single_image_box_shadow = get_theme_mod('pet_rescue_lite_single_image_box_shadow',0);
	$pet_rescue_lite_custom_css .='.feature-box img{';
		$pet_rescue_lite_custom_css .='box-shadow: '.esc_attr($pet_rescue_lite_single_image_box_shadow).'px '.esc_attr($pet_rescue_lite_single_image_box_shadow).'px '.esc_attr($pet_rescue_lite_single_image_box_shadow).'px #b5b5b5;';
	$pet_rescue_lite_custom_css .='}';

	// category color
	$pet_rescue_lite_category_color = get_theme_mod('pet_rescue_lite_category_color');
	$pet_rescue_lite_custom_css .='.type-post .category ul li a{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_category_color).';';
	$pet_rescue_lite_custom_css .='}';

	$pet_rescue_lite_theme_lay = get_theme_mod( 'pet_rescue_lite_text_button_text_tranform','Capitalize');
    if($pet_rescue_lite_theme_lay == 'Capitalize'){
		$pet_rescue_lite_custom_css .='.postbtn a{';
			$pet_rescue_lite_custom_css .='';
		$pet_rescue_lite_custom_css .='}';
	}else if($pet_rescue_lite_theme_lay == 'Lowercase'){
		$pet_rescue_lite_custom_css .='.postbtn a{';
			$pet_rescue_lite_custom_css .='text-transform: lowercase;';
		$pet_rescue_lite_custom_css .='}';
	}
	else if($pet_rescue_lite_theme_lay == 'Uppercase'){
		$pet_rescue_lite_custom_css .='.postbtn a{';
			$pet_rescue_lite_custom_css .='text-transform: Uppercase;';
		$pet_rescue_lite_custom_css .='}';
	}

	// button font weight
	$pet_rescue_lite_button_font_weight = get_theme_mod( 'pet_rescue_lite_button_font_weight','600');
	if($pet_rescue_lite_button_font_weight != ''){
		$pet_rescue_lite_custom_css .='.postbtn a{';
			$pet_rescue_lite_custom_css .='font-weight: '.esc_attr($pet_rescue_lite_button_font_weight).';';
		$pet_rescue_lite_custom_css .='}';
	}

	// Post Block
	$pet_rescue_lite_post_block_option = get_theme_mod( 'pet_rescue_lite_post_block_option','By Block');
    if($pet_rescue_lite_post_block_option == 'By Without Block'){
		$pet_rescue_lite_custom_css .='.gridbox .inner-service, .related-inner-box, .mainbox-post, .layout2, .layout1, .post_format-post-format-video,.post_format-post-format-image,.post_format-post-format-audio, .post_format-post-format-gallery, .mainbox, #blog_sec .sticky{';
			$pet_rescue_lite_custom_css .='border:none; margin:30px 0;';
		$pet_rescue_lite_custom_css .='}';
	}

	// post image 
	$pet_rescue_lite_post_featured_color = get_theme_mod('pet_rescue_lite_post_featured_color', '#5c727d');
	$pet_rescue_lite_post_featured_image = get_theme_mod('pet_rescue_lite_post_featured_image','Image');
	if($pet_rescue_lite_post_featured_image == 'Color'){
		$pet_rescue_lite_custom_css .='.post-color{';
			$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_post_featured_color).';';
		$pet_rescue_lite_custom_css .='}';
	}

	// featured image dimention
	$pet_rescue_lite_post_featured_image_dimention = get_theme_mod('pet_rescue_lite_post_featured_image_dimention', 'Default');
	$pet_rescue_lite_post_featured_image_custom_width = get_theme_mod('pet_rescue_lite_post_featured_image_custom_width');
	$pet_rescue_lite_post_featured_image_custom_height = get_theme_mod('pet_rescue_lite_post_featured_image_custom_height');
	if($pet_rescue_lite_post_featured_image_dimention == 'Custom'){
		$pet_rescue_lite_custom_css .='.box-image img{';
			$pet_rescue_lite_custom_css .='width: '.esc_attr($pet_rescue_lite_post_featured_image_custom_width).'px; height: '.esc_attr($pet_rescue_lite_post_featured_image_custom_height).'px;';
		$pet_rescue_lite_custom_css .='}';
	}

	// featured image dimention
	$pet_rescue_lite_custom_post_color_width = get_theme_mod('pet_rescue_lite_custom_post_color_width');
	$pet_rescue_lite_custom_post_color_height = get_theme_mod('pet_rescue_lite_custom_post_color_height');
	if($pet_rescue_lite_post_featured_image == 'Color'){
		$pet_rescue_lite_custom_css .='.post-color{';
			$pet_rescue_lite_custom_css .='width: '.esc_attr($pet_rescue_lite_custom_post_color_width).'px; height: '.esc_attr($pet_rescue_lite_custom_post_color_height).'px;';
		$pet_rescue_lite_custom_css .='}';
	}

	// site title font size
	$pet_rescue_lite_site_title_font_size = get_theme_mod('pet_rescue_lite_site_title_font_size', 20);
	$pet_rescue_lite_custom_css .='.logo .site-title{';
	$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_site_title_font_size).'px;';
	$pet_rescue_lite_custom_css .='}';

	// site tagline font size
	$pet_rescue_lite_site_tagline_font_size = get_theme_mod('pet_rescue_lite_site_tagline_font_size', 13);
	$pet_rescue_lite_custom_css .='p.site-description{';
	$pet_rescue_lite_custom_css .='font-size: '.esc_attr($pet_rescue_lite_site_tagline_font_size).'px;';
	$pet_rescue_lite_custom_css .='}';

	// site logo padding 
	$pet_rescue_lite_logo_padding = get_theme_mod('pet_rescue_lite_logo_padding', '');
	$pet_rescue_lite_custom_css .='.logo{';
	$pet_rescue_lite_custom_css .='padding: '.esc_attr($pet_rescue_lite_logo_padding).'px ;';
	$pet_rescue_lite_custom_css .='}';

	// woocommerce Product Navigation
	$pet_rescue_lite_wooproducts_nav = get_theme_mod('pet_rescue_lite_wooproducts_nav', 'Yes');
	if($pet_rescue_lite_wooproducts_nav == 'No'){
		$pet_rescue_lite_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$pet_rescue_lite_custom_css .='display: none;';
		$pet_rescue_lite_custom_css .='}';
	}

	// site title color
	$pet_rescue_lite_site_title_color = get_theme_mod('pet_rescue_lite_site_title_color');
	$pet_rescue_lite_custom_css .='.site-title a{';
		$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_site_title_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// site tagline color
	$pet_rescue_lite_site_tagline_color = get_theme_mod('pet_rescue_lite_site_tagline_color');
	$pet_rescue_lite_custom_css .='.site-description{';
		$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_site_tagline_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// site toggle button color
	$pet_rescue_lite_toggle_button_color = get_theme_mod('pet_rescue_lite_toggle_button_color');
	$pet_rescue_lite_custom_css .='.toggle-menu i{';
		$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_toggle_button_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	//Copyright background css
	$pet_rescue_lite_copyright_text_background = get_theme_mod('pet_rescue_lite_copyright_text_background');
	$pet_rescue_lite_custom_css .='.copyright-wrapper{';
		$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_copyright_text_background).';';
	$pet_rescue_lite_custom_css .='}';

	// menu color
	$pet_rescue_lite_menu_color = get_theme_mod('pet_rescue_lite_menu_color');
	$pet_rescue_lite_custom_css .='.primary-navigation a, .primary-navigation ul li a, #site-navigation li a{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_menu_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// Sub menu color
	$pet_rescue_lite_sub_menu_color = get_theme_mod('pet_rescue_lite_sub_menu_color');
	$pet_rescue_lite_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a, #site-navigation ul.sub-menu li a{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_sub_menu_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// menu hover color
	$pet_rescue_lite_menu_hover_color = get_theme_mod('pet_rescue_lite_menu_hover_color');
	$pet_rescue_lite_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, #site-navigation li a:hover, #site-navigation ul.sub-menu li a:hover{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_menu_hover_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// Sub menu hover color
	$pet_rescue_lite_sub_menu_hover_color = get_theme_mod('pet_rescue_lite_sub_menu_hover_color');
	$pet_rescue_lite_custom_css .='.primary-navigation a:hover, .primary-navigation ul.sub-menu li a:hover, #site-navigation ul.sub-menu li a:hover{';
			$pet_rescue_lite_custom_css .='color: '.esc_attr($pet_rescue_lite_sub_menu_hover_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// Sub menu bg color
	$pet_rescue_lite_sub_menu_bg_color = get_theme_mod('pet_rescue_lite_sub_menu_bg_color');
	$pet_rescue_lite_custom_css .='#site-navigation ul.sub-menu li a{';
			$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_sub_menu_bg_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// Sub menu bg color
	$pet_rescue_lite_sub_menu_bg_hover_color = get_theme_mod('pet_rescue_lite_sub_menu_bg_hover_color');
	$pet_rescue_lite_custom_css .='#site-navigation ul.sub-menu li a:hover{';
			$pet_rescue_lite_custom_css .='background-color: '.esc_attr($pet_rescue_lite_sub_menu_bg_hover_color).' !important;';
	$pet_rescue_lite_custom_css .='}';

	// topbar padding option
	$pet_rescue_lite_topbar_padding_settings = get_theme_mod('pet_rescue_lite_topbar_padding_settings', 8);
		$pet_rescue_lite_custom_css .='.topbar{';
			$pet_rescue_lite_custom_css .='padding: '.esc_attr($pet_rescue_lite_topbar_padding_settings).'px !important;';
		$pet_rescue_lite_custom_css .='}';

	// site logo margin 
	$pet_rescue_lite_logo_margin = get_theme_mod('pet_rescue_lite_logo_margin', '');
	$pet_rescue_lite_custom_css .='.logo{';
	$pet_rescue_lite_custom_css .='margin: '.esc_attr($pet_rescue_lite_logo_margin).'px ;';
	$pet_rescue_lite_custom_css .='}';


