<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main role="main" id="skip_content">

  <?php do_action( 'pet_rescue_lite_above_slider' ); ?>

  <?php if( get_theme_mod('pet_rescue_lite_slider_hide', false) != '' || get_theme_mod( 'pet_rescue_lite_display_slider',false) != ''){ ?>
    <section id="slider" class="m-auto p-0 mw-100">
      <?php $pet_rescue_lite_slider_speed = get_theme_mod('pet_rescue_lite_slider_speed', 3000); ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('pet_rescue_lite_slider_speed', 3000)); ?>"> 
        <?php $pet_rescue_lite_slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'pet_rescue_lite_slider_setting' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $pet_rescue_lite_slider_page[] = $mod;
            }
          }
          if( !empty($pet_rescue_lite_slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $pet_rescue_lite_slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <div class="slider-bg">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="" />
                <?php } ?>
              </div>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <div class="carousel-content">
                    <?php if( get_theme_mod('pet_rescue_lite_slider_heading',true) != ''){ ?>
                      <h1 class="mb-0"><?php the_title(); ?></h1>
                    <?php } ?>
                    <?php if( get_theme_mod('pet_rescue_lite_slider_text',true) != ''){ ?>
                      <p><?php $pet_rescue_lite_excerpt = get_the_excerpt(); echo esc_html( pet_rescue_lite_string_limit_words( $pet_rescue_lite_excerpt, esc_attr(get_theme_mod('pet_rescue_lite_slider_excerpt_number','15')))); ?></p>
                    <?php } ?>
                    <?php if (get_theme_mod( 'pet_rescue_lite_show_slider_button',true) != ''){ ?>
                    <div class="more-btn mt-0 mt-lg-3">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Discover More','pet-rescue-lite'); ?><i class="fas fa-long-arrow-alt-right ms-2"></i><span class="screen-reader-text"><?php esc_html_e('Discover More','pet-rescue-lite'); ?></span></a>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('pet_rescue_lite_slider_previous_icon','fas fa-long-arrow-alt-left')); ?>"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','pet-rescue-lite' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('pet_rescue_lite_slider_next_icon','fas fa-long-arrow-alt-right')); ?>"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','pet-rescue-lite' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>
  
  <?php do_action( 'pet_rescue_lite_below_slider' ); ?>

  <?php if( get_theme_mod( 'pet_rescue_lite_product_enable') != '') { ?>
    <section id="product-slide" class="py-5">
      <div class="container">
        <div class="product-head text-center mb-5">
          <?php if(get_theme_mod('pet_rescue_lite_product_section_title') != '') {?>
            <h2><?php echo esc_html(get_theme_mod('pet_rescue_lite_product_section_title')); ?></h2>
          <?php }?>
        </div>
        <div class="owl-carousel">
          <?php if ( class_exists( 'WooCommerce' ) && get_theme_mod('pet_rescue_lite_product_slide') != '' ) {
            $args = array( 
              'post_type' => 'product',
              'product_cat' => get_theme_mod('pet_rescue_lite_product_slide'),
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="product-box">
                <div class="product-image">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
                <div class="product-content py-3">
                  <div class="row mx-0">
                    <div class="col-lg-9 col-md-9 col-9">
                      <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                      <p class="product-text"><?php $pet_rescue_lite_excerpt = get_the_excerpt(); echo esc_html( pet_rescue_lite_string_limit_words( $pet_rescue_lite_excerpt, 8)); ?></p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-3 px-0">
                      <div class="cart-button my-2 text-center">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-7 align-self-center">
                      <p class="price-text"><?php echo esc_html('Price:','pet-rescue-lite') ?></p>
                      <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-5 align-self-end text-end">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?> 

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>