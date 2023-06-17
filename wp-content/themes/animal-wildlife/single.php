<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>

<main id="main" role="main">
	<div class="container">
		<div class="row">
			<?php
		    $animal_wildlife_single_post_sidebar_option = get_theme_mod( 'animal_wildlife_single_post_sidebar_option', 'Right Sidebar' );
			if($animal_wildlife_single_post_sidebar_option == 'Left Sidebar'){ ?>
			    <div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<?php if (get_theme_mod('animal_wildlife_single_post_breadcrumb',false) != ''){ ?>
						<div class="breadcrumb">
							<?php animal_wildlife_the_breadcrumb(); ?>
						</div>
					<?php }?>
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/single-post' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();

							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'animal-wildlife' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'animal-wildlife' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'animal_wildlife_show_single_post_pagination',true) != '') {

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Previous', 'animal-wildlife' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Next', 'animal-wildlife' ) . '</span>',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
			<?php }else if($animal_wildlife_single_post_sidebar_option == 'Right Sidebar'){ ?>
				<div class="col-lg-8 col-md-8">
					<?php if (get_theme_mod('animal_wildlife_single_post_breadcrumb',false) != ''){ ?>
						<div class="breadcrumb">
							<?php animal_wildlife_the_breadcrumb(); ?>
						</div>
					<?php }?>
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/single-post' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'animal-wildlife' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'animal-wildlife' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'animal_wildlife_show_single_post_pagination',true) != '') {

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Previous', 'animal-wildlife' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Next', 'animal-wildlife' ) . '</span>',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			<?php }else if($animal_wildlife_single_post_sidebar_option == 'One Column'){ ?>
				<div class="col-lg-12 col-md-12">
					<?php if (get_theme_mod('animal_wildlife_single_post_breadcrumb',false) != ''){ ?>
						<div class="breadcrumb">
							<?php animal_wildlife_the_breadcrumb(); ?>
						</div>
					<?php }?>
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/single-post' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'animal-wildlife' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'animal-wildlife' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

							<?php if( get_theme_mod( 'animal_wildlife_show_single_post_pagination',true) != '') {

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Previous', 'animal-wildlife' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Next', 'animal-wildlife' ) . '</span>',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
			<?php }else {?>
				<div class="col-lg-8 col-md-8">
					<?php if (get_theme_mod('animal_wildlife_single_post_breadcrumb',false) != ''){ ?>
						<div class="breadcrumb">
							<?php animal_wildlife_the_breadcrumb(); ?>
						</div>
					<?php }?>
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/post/single-post' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'animal-wildlife' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'animal-wildlife' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );?>

              <?php if( get_theme_mod( 'animal_wildlife_show_single_post_pagination',true) != '') {

							the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Previous', 'animal-wildlife' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'animal-wildlife' ) . '</span><span aria-hidden="true" class="nav-subtitle text-uppercase">' . __( 'Next', 'animal-wildlife' ) . '</span>',
							) );
						}

						endwhile; // End of the loop.

					?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			<?php }?>
		</div>
	</div>
</main>

<?php get_footer();
