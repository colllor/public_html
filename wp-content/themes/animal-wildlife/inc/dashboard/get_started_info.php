<?php

add_action( 'admin_menu', 'animal_wildlife_gettingstarted' );
function animal_wildlife_gettingstarted() {
	add_theme_page( esc_html__('About Theme', 'animal-wildlife'), esc_html__('About Theme', 'animal-wildlife'), 'edit_theme_options', 'animal-wildlife-guide-page', 'animal_wildlife_guide');   
}

function animal_wildlife_admin_theme_style() {
   wp_enqueue_style('animal-wildlife-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'animal_wildlife_admin_theme_style');

function animal_wildlife_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Animal Wildlife Theme', 'animal-wildlife' ) ?> </h2>
			<p><?php esc_html_e( "Please Click on the link below to know the theme setup information", 'animal-wildlife' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=animal-wildlife-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Get Started ', 'animal-wildlife' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'animal_wildlife_notice');


/**
 * Theme Info Page
 */
function animal_wildlife_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'animal-wildlife' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
				<div class="intro">
					<div class="pad-box">
						<h2 align="center"><?php esc_html_e( 'Welcome to Animal Wildlife Theme', 'animal-wildlife' ); ?>
						<span class="version" align="center">Version: <?php echo esc_html($theme['Version']);?></span></h2>	
						</span>
						<div class="powered-by">
							<p align="center"><strong><?php esc_html_e( 'Theme created by ThemesEye', 'animal-wildlife' ); ?></strong></p>
							<p align="center">
								<img role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>

			<div class="tab">
			  <button role="tab" class="tablinks" onclick="animal_wildlife_open(event, 'lite_theme')">Getting Started</button>		  
			  <button role="tab" class="tablinks" onclick="animal_wildlife_open(event, 'pro_theme')">Get Premium</button>
			</div>

			<!-- Tab content -->
			<div id="lite_theme" class="tabcontent open">
				<h2 class="tg-docs-section intruction-title" id="section-4" align="center"><?php esc_html_e( '1) Animal Wildlife Theme', 'animal-wildlife' ); ?></h2>
				<div class="row">
					<div class="col-md-5">
						<div class="pad-box">
	              			<img role="img" role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
	              		 </div> 
					</div>
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
		                    <div class="table-image">
								<table class="tablebox">
									<thead>
										<tr>
											<th><?php esc_html_e('Setup', 'animal-wildlife'); ?></th>
											<th><?php esc_html_e('Click Here', 'animal-wildlife'); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php esc_html_e('Logo', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Menus', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Top Header', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=animal_wildlife_header_section') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Slider', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=animal_wildlife_slider') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Post Settings', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=animal_wildlife_blog_post') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Footer', 'animal-wildlife'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=animal_wildlife_footer') ); ?>" target="_blank"><?php esc_html_e('Click', 'animal-wildlife'); ?></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<ol>
								<li><?php esc_html_e( 'Start','animal-wildlife'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','animal-wildlife'); ?></a> <?php esc_html_e( 'your website.','animal-wildlife'); ?> </li>
								<li><?php esc_html_e( 'Animal Wildlife','animal-wildlife'); ?> <a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','animal-wildlife'); ?></a> </li>
							</ol>
	                    </div>
	                </div>
				</div><br><br>
				
	        </div>
	        <div id="pro_theme" class="tabcontent">
				<h2 class="dashboard-install-title" align="center"><?php esc_html_e( '2) Premium Theme Information','animal-wildlife'); ?></h2>
            	<div class="row">
					<div class="col-md-7">
						<img role="img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pro-links" >
					    	<a href="<?php echo esc_url( ANIMAL_WILDLIFE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'animal-wildlife'); ?></a>
							<a href="<?php echo esc_url( ANIMAL_WILDLIFE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'animal-wildlife'); ?></a>
							<a href="<?php echo esc_url( ANIMAL_WILDLIFE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'animal-wildlife'); ?></a>
						</div>
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','animal-wildlife'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'Wildlife Zoo WordPress Theme is an amazing theme bringing an ideal layout for wildlife, nature, and animal-related websites. With an attractive design that catches the audience’s attention at first glance, spreading the word about your services becomes considerably easier. It captures attention quickly with its lovely full-width slider, which displays excellent wildlife pictures in a most mesmerizing way. Moreover, there are different sections on your website that display information according to their categories. Wildlife Zoo WordPress Theme comes with well-designed templates that make it a real treasure for developers and especially for those who want to create a website on their own. With the theme, users have access to extremely simple controls. You can completely rely upon the coding practices that have been implemented by the developers while creating this WP theme.

                           It also caters to the needs of animals and pet lovers also. With little modifications using the customization options present with the theme, you can easily transform the design into something that can completely match your purpose. To go a step further, you can find the drag and drop page builder tool for building customized pages. You will also find the available Google fonts, colors, and typography options preloaded on the page. You do get proper documentation with this Wildlife Zoo WordPress Theme that can explain every single thing to the user. In addition, you will have access to 24/7 support and theme updates.', 'animal-wildlife' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">								
							<h3><?php esc_html_e( 'Pro Theme Features','animal-wildlife'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Easy install 10 minute setup Themes','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Multiplue Domain Usage','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Premium Technical Support','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'FREE Shortcodes','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Multiple page templates','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Google Font Integration','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Customizable Colors','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Theme customizer ','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Documention','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Option','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Plugin Compatible','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Social Media Integration','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Incredible Support','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Eye Appealing Design','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Simple To Install','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Fully Responsive ','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Translation Ready','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'Custom Page Templates ','animal-wildlife'); ?></li>
									<li><?php esc_html_e( 'WooCommerce Integration','animal-wildlife'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
          	<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','animal-wildlife'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','animal-wildlife'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','animal-wildlife'); ?></a></li>
						</ol>
					</div>

					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','animal-wildlife'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','animal-wildlife'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','animal-wildlife'); ?></a> <?php esc_html_e( 'your website.','animal-wildlife'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Help Docs','animal-wildlife'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','animal-wildlife'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','animal-wildlife'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','animal-wildlife'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( ANIMAL_WILDLIFE_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'animal-wildlife'); ?></a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php
}?>