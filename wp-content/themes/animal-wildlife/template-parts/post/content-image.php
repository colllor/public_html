<?php
/**
 * Template part for displaying posts
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="blogger p-2 mb-4">
    <?php $animal_wildlife_blog_layout = get_theme_mod( 'animal_wildlife_blog_post_layout','Default');
      if($animal_wildlife_blog_layout == 'Default' || $animal_wildlife_blog_layout == 'Center'){ ?>
      <?php if(has_post_thumbnail() && get_theme_mod( 'animal_wildlife_blog_post_featured_image',true) != '') { ?>
        <div class="post-image">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <h2 class="py-2 mb-0"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>" class="text-capitalize"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'animal_wildlife_date_hide',true) != '' || get_theme_mod( 'animal_wildlife_comment_hide',true) != '' || get_theme_mod( 'animal_wildlife_author_hide',true) != '') { ?>
        <div class="post-info py-1 px-2 mb-2">
          <?php if( get_theme_mod( 'animal_wildlife_date_hide',true) != '') { ?>
            <span class="entry-date ps-2 pe-3"><i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_post_date_icon_changer','fa fa-calendar'));?>"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('animal_wildlife_blog_post_metabox_seperator') ); ?>
          <?php } ?>
          <?php if( get_theme_mod( 'animal_wildlife_author_hide',true) != '') { ?>
            <span class="entry-author ps-2 pe-3"><i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_post_author_icon_changer','fa fa-user'));?>"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('animal_wildlife_blog_post_metabox_seperator') ); ?>
          <?php } ?>
          <?php if( get_theme_mod( 'animal_wildlife_comment_hide',true) != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_post_comment_icon_changer','fas fa-comments'));?> ps-2 pe-2"></i><span class="entry-comments ps-2 pe-3"><?php comments_number( __('0 Comments','animal-wildlife'), __('0 Comments','animal-wildlife'), __('% Comments','animal-wildlife') ); ?></span>
          <?php } ?>
        </div>
      <?php }?>
      <?php if(get_theme_mod('animal_wildlife_blog_description') == 'Post Content'){ ?>
        <div class="text"><?php the_content(); ?></div>
      <?php }
      if(get_theme_mod('animal_wildlife_blog_description', 'Post Excerpt') == 'Post Excerpt'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <div class="text"><p class="m-0"><?php $animal_wildlife_excerpt = get_the_excerpt(); echo esc_html( animal_wildlife_string_limit_words( $animal_wildlife_excerpt, esc_attr(get_theme_mod('animal_wildlife_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('animal_wildlife_post_excerpt_suffix','{...}') ); ?></p></div>
        <?php } ?>
      <?php }?>
        <?php if( get_theme_mod('animal_wildlife_button_text','Read More') != ''){ ?>
          <div class="post-link my-3 text-end">
            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('animal_wildlife_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('animal_wildlife_button_text','Read More'));?></span></a>
          </div>
      <?php } ?>
    <?php }else if($animal_wildlife_blog_layout == 'Image and Content'){ ?>
      <div class="row">
        <?php if(has_post_thumbnail()) { ?>
          <div class="post-image col-lg-5 col-md-12">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <div class="<?php if(has_post_thumbnail()) { ?>col-lg-7 col-md-12" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
          <h2 class="py-2 mb-0"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <?php if( get_theme_mod( 'animal_wildlife_date_hide',true) != '' || get_theme_mod( 'animal_wildlife_comment_hide',true) != '' || get_theme_mod( 'animal_wildlife_author_hide',true) != '') { ?>
            <div class="post-info py-1 px-2 mb-2">
              <?php if( get_theme_mod( 'animal_wildlife_date_hide',true) != '') { ?>
                <i class="fa fa-calendar"></i><span class="entry-date ps-2 pe-3"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('animal_wildlife_blog_post_metabox_seperator') ); ?>
              <?php } ?>
              <?php if( get_theme_mod( 'animal_wildlife_author_hide',true) != '') { ?>
                <i class="fa fa-user"></i><span class="entry-author ps-2 pe-3"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('animal_wildlife_blog_post_metabox_seperator') ); ?>
              <?php } ?>
              <?php if( get_theme_mod( 'animal_wildlife_comment_hide',true) != '') { ?>
                <i class="fas fa-comments"></i><span class="entry-comments ps-2 pe-3"><?php comments_number( __('0 Comments','animal-wildlife'), __('0 Comments','animal-wildlife'), __('% Comments','animal-wildlife') ); ?></span>
              <?php } ?>
            </div>
          <?php } ?>
            <div class="text"><p class="m-0"><?php $animal_wildlife_excerpt = get_the_excerpt(); echo esc_html( animal_wildlife_string_limit_words( $animal_wildlife_excerpt, esc_attr(get_theme_mod('animal_wildlife_excerpt_number','20')))); ?></p></div>
            <?php if( get_theme_mod('animal_wildlife_button_text','Read More') != ''){ ?>
              <div class="post-link my-3 text-end">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('animal_wildlife_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('animal_wildlife_button_text','Read More'));?></span></a>
              </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</article>
