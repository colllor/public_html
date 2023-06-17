<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'animal_wildlife_before_slider' ); ?>

  <?php if( get_theme_mod('animal_wildlife_slider_arrows', false) != '' || get_theme_mod( 'animal_wildlife_enable_disable_slider', false) != ''){ ?>
    <div class="<?php if( get_theme_mod('animal_wildlife_slider_width_options', 'Full Width') == 'Container Width'){ ?>container <?php }?>">
      <section id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('animal_wildlife_slider_speed', 3000)); ?>"> 
          <?php $animal_wildlife_slider_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'animal_wildlife_slide_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $animal_wildlife_slider_pages[] = $mod;
              }
            }
            if( !empty($animal_wildlife_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $animal_wildlife_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
                <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('animal_wildlife_slider_title',true) != ''){ ?>
                    <h1 class="text-capitalize"><?php the_title();?></h1>
                  <?php } ?>
                  <?php if( get_theme_mod('animal_wildlife_slider_content',true) != ''){ ?>
                    <p><?php $animal_wildlife_excerpt = get_the_excerpt(); echo esc_html( animal_wildlife_string_limit_words( $animal_wildlife_excerpt, esc_attr(get_theme_mod('animal_wildlife_slider_excerpt_number','20')))); ?></p>
                  <?php } ?>
                  <?php if (get_theme_mod( 'animal_wildlife_slider_button',true) != '' || get_theme_mod( 'animal_wildlife_show_hide_slider_button',true) != ''){ ?>
                    <?php if( get_theme_mod('animal_wildlife_slider_button_text','Make A Donation') != ''){ ?>
                      <div class ="readbutton mt-md-2">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('animal_wildlife_slider_button_text','Make A Donation'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('animal_wildlife_slider_button_text','Make A Donation'));?></span></a>
                      </div>
                    <?php } ?>
                  <?php } ?>
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
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','animal-wildlife' );?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','animal-wildlife' );?></span>
          </a>
        </div> 
        <div class="clearfix"></div>
      </section>
    </div> 
  <?php }?> 

  <?php do_action( 'animal_wildlife_after_slider' ); ?>

  <?php if( get_theme_mod('animal_wildlife_donate_section_title') != ''|| get_theme_mod('animal_wildlife_donate_section_text') != '' || get_theme_mod('animal_wildlife_donate_section_category') != ''){ ?>
    <section id="donate-section" class="py-5">
      <div class="container">
        <?php if( get_theme_mod('animal_wildlife_donate_section_text') != ''){ ?>
          <p class="small-title text-center mx-lg-5 px-md-5"><?php echo esc_html(get_theme_mod('animal_wildlife_donate_section_text')); ?></p>
        <?php }?>
        <?php if( get_theme_mod('animal_wildlife_donate_section_title') != ''){ ?>
          <h2 class="text-center"><?php echo esc_html(get_theme_mod('animal_wildlife_donate_section_title')); ?></h2>
        <?php }?>
        <div class="owl-carousel mt-5">
          <?php 
            $animal_wildlife_catData=  get_theme_mod('animal_wildlife_donate_section_category');
            if($animal_wildlife_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html( $animal_wildlife_catData ,'animal-wildlife')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="donate-box text-center">
                <?php if(has_post_thumbnail()) { ?>
                  <div class="donate-img">
                    <?php the_post_thumbnail(); ?>
                  </div>
                <?php }?>
                <span class="entry-date ps-2 pe-3"> <?php esc_html_e('PUBLISHED', 'animal-wildlife') ?> <?php echo esc_html( get_the_date() ); ?></span>
                <div class="donate-content">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php $animal_wildlife_excerpt = get_the_excerpt(); echo esc_html( animal_wildlife_string_limit_words( $animal_wildlife_excerpt, 15)); ?></p>
                  <?php $raised_value = get_post_meta($post->ID, 'animal_wildlife_raised', true);
                  $goal_value = get_post_meta($post->ID, 'animal_wildlife_goal', true);
                  if ($raised_value != '' && $goal_value != ''){
                    $percent_value = round(($raised_value / $goal_value) * 100); ?>
                    <div class="donate-slider">
                      <div class="slide-inner" style="width: <?php echo esc_attr($percent_value); echo esc_html('%', 'animal-wildlife'); ?>"></div>
                    </div>
                  <?php }?>
                  <div class="prices-box">
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-4 align-self-center">
                        <?php if( get_post_meta($post->ID, 'animal_wildlife_raised', true) ) {?>
                          <span class="first-word"><?php esc_html_e('raised','animal-wildlife'); ?></span>
                          <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?><?php echo esc_html(get_post_meta($post->ID,'animal_wildlife_raised',true)); ?></span>
                        <?php }?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-4 goal-box align-self-center">
                        <?php if( get_post_meta($post->ID, 'animal_wildlife_goal', true) ) {?>
                          <span class="first-word"><?php esc_html_e('goal','animal-wildlife'); ?></span>
                          <span> <?php echo esc_html(get_woocommerce_currency_symbol()); ?><?php echo esc_html(get_post_meta($post->ID,'animal_wildlife_goal',true)); ?></span>
                        <?php }?>
                      </div>
                      <div class="col-lg-4 col-md-4 col-4 align-self-center">
                        <?php if( get_post_meta($post->ID, 'animal_wildlife_raised', true) != '' && get_post_meta($post->ID, 'animal_wildlife_goal', true) != '' ) {
                          $raised_value = get_post_meta($post->ID, 'animal_wildlife_raised', true);
                          $goal_value = get_post_meta($post->ID, 'animal_wildlife_goal', true);
                          $percent_value = round(($raised_value / $goal_value) * 100); ?>
                          <span><?php echo esc_html($percent_value); echo esc_html('%', 'animal-wildlife'); ?></span>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'animal_wildlife_after_services' ); ?>

  <div class="container text">
    <?php while ( have_posts() ) : the_post();?>
      <?php the_content(); ?>
    <?php endwhile; // End of the loop.
    wp_reset_postdata(); ?>
  </div>
</main>

<?php get_footer(); ?>