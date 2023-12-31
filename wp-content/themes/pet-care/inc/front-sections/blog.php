<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Care 1.0.0
 */
if ( ! function_exists( 'pet_care_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Pet Care 1.0.0
    */
    function pet_care_add_blog_section() {
    	$options = pet_business_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'pet_business_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'pet_care_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        pet_care_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_care_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Pet Care 1.0.0
    * @param array $input blog section details.
    */
    function pet_care_get_blog_section_details( $input ) {
        $options = pet_business_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        
        $content = array();
        switch ( $blog_content_type ) {

            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['author_id'] = get_the_author_meta( 'ID' );
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = pet_business_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'pet_care_filter_blog_section_details', 'pet_care_get_blog_section_details' );


if ( ! function_exists( 'pet_care_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Pet Care 1.0.0
   *
   */
   function pet_care_render_blog_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();
        $blog_content_type  = $options['blog_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="pet_business_blog_section">

        <div id="latest-posts" class="relative page-section">
                <div class="wrapper">
                        <div class="section-header">
                            <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                                <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                            <?php endif; ?>

                            <?php if ( ! empty( get_theme_mod( 'blog_sub_title' ) ) ) : ?>

                             <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'blog_sub_title' ) ); ?></p>
                         <?php endif; ?>
                        </div><!-- .section-header -->
                    <!-- supports col-1, col-2 and col-3 -->
                    <div class="section-content posts-wrapper col-3">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>
                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <?php pet_business_posted_on( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->
                                
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div>

                                    <?php $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : ''; ?>

                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #latest-posts -->

            </div>

    <?php }
endif;