<?php
/**
 * The template for displaying all pages.
 * @package Pet Rescue Lite
 */

get_header(); ?>

<?php do_action( 'pet_rescue_lite_page_top' ); ?>

<main role="main" id="skip_content" class="content_box">
    <div class="container background-img-skin">
        <div class="main-wrapper py-4 px-0">
          <?php if (get_theme_mod('pet_rescue_lite_single_page_breadcrumb',true) != ''){ ?>
                <div class="bradcrumbs">
                    <?php pet_rescue_lite_the_breadcrumb(); ?>
                </div>
            <?php }?>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php if(has_post_thumbnail()) { ?>
                    <div class="feature-box">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php } ?>
                <div class="new-text"><?php the_content(); ?></div>
                <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pet-rescue-lite' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'pet-rescue-lite' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || '0' != get_comments_number() ) {
                        comments_template();
                    }
                ?>
            <?php endwhile; // end of the loop. ?>
            <div class="clear"></div>
        </div>
    </div>
</main>

<?php do_action( 'pet_rescue_lite_page_bottom' ); ?>

<?php get_footer(); ?>
