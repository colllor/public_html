<?php
/**
 * The Header for our theme.
 * @package Pet Rescue Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('pet_rescue_lite_preloader',false) != '' || get_theme_mod( 'pet_rescue_lite_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'pet-rescue-lite' ); ?></a>
    <div id="header">
      <?php if( get_theme_mod('pet_rescue_lite_show_topbar',false) != ''){ ?>
        <div class="topbar text-md-start text-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 col-md-6 align-self-center">
                <?php if( get_theme_mod('pet_rescue_lite_topbar_text') != '' ) {?>
                  <p class="topbar-text"><?php echo esc_html(get_theme_mod('pet_rescue_lite_topbar_text')); ?></p>
                <?php }?>
              </div>
              <div class="col-lg-5 col-md-6 align-self-center phone text-md-end text-center">
                <?php if (get_theme_mod('pet_rescue_lite_phone_number') != '') { ?>
                  <a href="tel:<?php echo esc_attr(get_theme_mod('pet_rescue_lite_phone_number')); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html('Phone:', 'pet-rescue-lite'); ?> <?php echo esc_html(get_theme_mod('pet_rescue_lite_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('pet_rescue_lite_phone_number')); ?></span></a>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="menu-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 align-self-center">
              <div class="logo align-self-center text-md-start text-center">
                <div class="row">
                  <div class="<?php if( get_theme_mod( 'pet_rescue_lite_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php if ( has_custom_logo() ) : ?>
                      <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="<?php if( get_theme_mod( 'pet_rescue_lite_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                    <?php if ( ! empty( $blog_info ) ) : ?>
                      <?php if( get_theme_mod('pet_rescue_lite_site_title_enable',true) != ''){ ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                          <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                      <?php }?>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                      <?php if( get_theme_mod('pet_rescue_lite_site_tagline_enable',true) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                      <?php }?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="<?php if( get_theme_mod( 'pet_rescue_lite_display_search', true) == true ) { ?> col-lg-7 col-md-6 <?php } else { ?> col-lg-8 col-md-7 <?php } ?>  col-3 p-0 align-self-center <?php if( get_theme_mod( 'pet_rescue_lite_sticky_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
              <?php
              if(has_nav_menu('primary')){ ?>
                <div class="toggle-menu responsive-menu">
                  <button role="tab" onclick="pet_rescue_lite_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('pet_rescue_lite_responsive_menu_open_icon','fas fa-bars')); ?>"></i><?php echo esc_html( get_theme_mod('pet_rescue_lite_open_menu_label', __('Open Menu','pet-rescue-lite'))); ?><span class="screen-reader-text"><?php esc_html_e('Open Menu','pet-rescue-lite'); ?></span>
                  </button>
                </div>
              <?php }?>
              <div id="navbar-header text-center" class="menu-brand primary-nav">
                <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'pet-rescue-lite' ); ?>">
                  <?php
                    if(has_nav_menu('primary')){
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-start">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) );
                    } 
                  ?>
                </nav>
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="pet_rescue_lite_menu_close()"><?php echo esc_html( get_theme_mod('pet_rescue_lite_close_menu_label', __('Close Menu','pet-rescue-lite'))); ?>
                <i class="<?php echo esc_attr(get_theme_mod('pet_rescue_lite_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','pet-rescue-lite'); ?></span></a>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-4 align-self-center">
              <?php if(class_exists('woocommerce')){ ?>
                <div class="cart_no">              
                  <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'Cart item','pet-rescue-lite' );?></span></a>
                </div>
              <?php } ?>
            </div>
            <?php if( get_theme_mod( 'pet_rescue_lite_display_search', true) == true ) { ?>
              <div class="col-lg-1 col-md-1 col-4 align-self-center text-center">
                <div class="main-search">
                  <span><a href="#"><i class="fas fa-search"></i></a></span>
                </div>
              </div>
            <?php }?>
            <div class="searchform_page w-100 h-100">
              <div class="close w-100 text-end me-4"><a href="#maincontent"><i class="fa fa-times"></i></a></div>
              <div class="search_input">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>