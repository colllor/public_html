<?php
/**
 * The header for our theme 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	  wp_body_open(); 
	} else { 
	  do_action( 'wp_body_open' ); 
	} ?>	
	<?php if(get_theme_mod('animal_wildlife_loader_setting', false) != '' || get_theme_mod('animal_wildlife_enable_disable_preloader',false) != ''){ ?>
	    <div id="pre-loader">
			<div class='demo'>
				<?php $animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_preloader_types','Default');
				if($animal_wildlife_theme_lay == 'Default'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php }elseif($animal_wildlife_theme_lay == 'Circle'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php }elseif($animal_wildlife_theme_lay == 'Two Circle'){ ?>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
					<div class='circle'>
					    <div class='inner'></div>
					</div>
				<?php } ?>
			</div>
	    </div>
	<?php }?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'animal-wildlife' ); ?></a>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="main-header">
				<div class="row mx-0">
					<div class="col-lg-3 col-md-3 logo mb-3 mb-md-0 text-center">
						<?php if ( has_custom_logo() ) : ?>
							<div class="site-logo"><?php the_custom_logo(); ?></div>
						<?php endif; ?>
						<?php $blog_info = get_bloginfo( 'name' ); ?>
						<?php if ( ! empty( $blog_info ) ) : ?>
							<?php if( get_theme_mod('animal_wildlife_show_site_title',true) != ''){ ?>
							    <?php if ( is_front_page() && is_home() ) : ?>
							    	<h1 class="site-title m-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							    <?php else : ?>
							    	<p class="site-title m-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							    <?php endif; ?>
							<?php }?>
						<?php endif; ?>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
						?>
							<?php if( get_theme_mod('animal_wildlife_show_tagline',true) != ''){ ?>
								<p class="site-description m-0">
							    <?php echo esc_html($description); ?>
								</p>
							<?php }?>
						<?php endif; ?>
					</div>
					<div class="<?php if( get_theme_mod( 'animal_wildlife_header_button_text') != '' || get_theme_mod( 'animal_wildlife_header_button_url') != '') { ?>col-lg-6 col-md-5<?php } else {?>col-lg-8 col-md-7 <?php }?>">
						<div class="<?php if( get_theme_mod( 'animal_wildlife_fixed_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
							<?php if ( has_nav_menu( 'top' ) ) : ?>
								<nav role="navigation" class="navigation-top">
									<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
								</nav>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-1 col-md-1 position-relative">
						<div class="search-body text-center align-self-center">
							<button type="button" class="search-show"><i class="fas fa-search"></i></button>
						</div>
						<div class="searchform-inner">
							<?php get_search_form(); ?>
							<button type="button" class="close" aria-label="<?php esc_attr_e('Close','animal-wildlife'); ?>" ><span aria-hidden="true"><?php echo esc_html('X','animal-wildlife'); ?></span></button>
						</div>
					</div>
					<?php if( get_theme_mod( 'animal_wildlife_header_button_text') != '' || get_theme_mod( 'animal_wildlife_header_button_url') != '') { ?>
						<div class="col-lg-2 col-md-3 book-btn text-center">
							<a href="<?php echo esc_url(get_theme_mod( 'animal_wildlife_header_button_url')); ?>"><?php echo esc_html(get_theme_mod( 'animal_wildlife_header_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod( 'animal_wildlife_header_button_text')); ?></span></a>
						</div>
					<?php }?>
				</div>
			</div>
		</header>
		
	<div class="site-content-contain">
		<div id="content" class="py-5">