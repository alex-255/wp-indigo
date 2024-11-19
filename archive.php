<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigo
 */

get_header();
?>
Archive
<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

    <header class="page-header">
        <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
    </header><!-- .page-header -->

    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class("container-800"); ?>>
        <header class="entry-header">
            <?php
						
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

						if ( 'post' === get_post_type() ) :
							?>
            <div class="entry-meta">
                <?php
								indigo_posted_on();
								indigo_posted_by();
								?>
            </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <?php indigo_post_thumbnail(); ?>

        <div class="entry-content">
            <?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'indigo' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'indigo' ),
								'after'  => '</div>',
							)
						);
						?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php indigo_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
    <?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();