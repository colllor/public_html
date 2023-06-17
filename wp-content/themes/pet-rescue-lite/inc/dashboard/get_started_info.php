<?php

add_action( 'admin_menu', 'pet_rescue_lite_gettingstarted' );
function pet_rescue_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'pet-rescue-lite'), esc_html__('About Theme', 'pet-rescue-lite'), 'edit_theme_options', 'pet-rescue-lite-guide-page', 'pet_rescue_lite_guide');   
}

function pet_rescue_lite_admin_theme_style() {
   wp_enqueue_style('pet-rescue-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'pet_rescue_lite_admin_theme_style');

function pet_rescue_lite_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Pet Rescue Lite, you rock!', 'pet-rescue-lite' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional automobile website. Please Click on the link below to know the theme setup information.', 'pet-rescue-lite' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=pet-rescue-lite-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'pet-rescue-lite' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'pet_rescue_lite_notice');

/**
 * Theme Info Page
 */
function pet_rescue_lite_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'pet-rescue-lite' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Pet Rescue Lite', 'pet-rescue-lite' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'pet-rescue-lite' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'pet-rescue-lite' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( PET_RESCUE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'pet-rescue-lite'); ?></a>
						<a href="<?php echo esc_url( PET_RESCUE_LITE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'pet-rescue-lite'); ?></a>
						<a href="<?php echo esc_url( PET_RESCUE_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'pet-rescue-lite'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Pet Rescue Lite Theme', 'pet-rescue-lite' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Pet Rescue Lite is a fine WordPress theme for pet grooming, pet care shelter, pet resort, pet shops pet caretakers, pet training services, and any kind of pet-related services. It is well designed with a clean and professional layout that best complements any per website. The best part is, there is no need to know about coding since this theme has a user-friendly design that has a lot of personalization options already included. Your website is going to look great on every screen thanks to its responsive layout. Besides that, this free theme has SEO-friendly codes that are also optimized for better performance and deliver you a faster page load time. Your conversions are taken care of by the Call to Action Buttons (CTA) and Social media options are going to make you a lot of options available for better online promotion. This also adds some interactive elements to the website and has secure and clean codes that make your website function seamlessly across all the devices. It is built using the Bootstrap framework and gives a robust design that smoothly works and also includes stunning animations and other useful elements that will give you a complete package for crafting highly professional websites.', 'pet-rescue-lite' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','pet-rescue-lite'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','pet-rescue-lite'); ?></a> <?php esc_html_e( 'your website.','pet-rescue-lite'); ?> </li>
							<li><?php esc_html_e( 'Pet Rescue Lite','pet-rescue-lite'); ?> <a target="_blank" href="<?php echo esc_url( PET_RESCUE_LITE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','pet-rescue-lite'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','pet-rescue-lite'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','pet-rescue-lite'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'For pet owners who want to get their pet services online and want to create a professional website for it, this Pet Rescue WordPress Theme is going to be your ideal match. It gives you the easiest way of creating websites without implementing anything from scratch. As the internet is the easiest way to obtain information, creating a professional website for your pet services will give you the desired popularity by spreading the word about the various pet-related services you are offering. Veterinary doctors, animal care centers, animal and pet rescuers, etc. will love the design this theme brings. It has a professional design that reflects the key info right on top of the homepage followed by an impressive full-width slider giving a seamless display of attractive images. Slider settings are also made available to get you full control so that you can decide how many images you want to put up for the slide show. Its retina-ready design gives a pixel-perfect display of pictures and content made available on your website no matter what the viewing device’s screen resolution is. With Pet resume WordPress Theme, you also find a lot of creative freedom as it comprises plenty of customization options.', 'pet-rescue-lite' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','pet-rescue-lite'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','pet-rescue-lite'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','pet-rescue-lite'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','pet-rescue-lite'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( PET_RESCUE_LITE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','pet-rescue-lite'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( PET_RESCUE_LITE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','pet-rescue-lite'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','pet-rescue-lite'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','pet-rescue-lite'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','pet-rescue-lite'); ?></a> <?php esc_html_e( 'your website.','pet-rescue-lite'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','pet-rescue-lite'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( PET_RESCUE_LITE_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','pet-rescue-lite'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( PET_RESCUE_LITE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','pet-rescue-lite'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','pet-rescue-lite'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( PET_RESCUE_LITE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'pet-rescue-lite'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>