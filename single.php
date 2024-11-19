<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package indigo
 */

get_header();
?>

<main id="primary" class="site-main container-800 grid grid-cols-3 gap-10">
    <div class="main-content col-span-3 lg:col-span-2">
        <?php
		while ( have_posts() ) :
			the_post();

				

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'indigo' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'indigo' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
    </div>
    <div class="sidebar col-span-3 lg:col-span-1 my-10">
        <?php get_sidebar(); ?>
    </div>


</main><!-- #main -->

<?php

get_footer();