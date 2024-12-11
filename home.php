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

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

    <header class="page-header">
        <h1 class="page-title text-xl text-center my-10 flex flex-col justify-center items-center gap-5">
            <img src="<?php echo esc_url( get_template_directory_uri(  ) . "/images/girl.png" ) ?>"
                alt="Picture of a girl" class="rounded-full" />
            Welcome to my blog!
        </h1>
    </header><!-- .page-header -->
    <div class="button-group filter-button-group container-800 flex justify-center items-center my-5">
        <span class="mr-2"><strong>Filter:</strong></span> <button data-filter="*" class="mr-2">All</button>
        <?php $categories = get_categories(); 
        foreach ($categories as $category) {
            ?><button data-filter=".<?php echo $category->slug; ?>"
            class="mr-2"><?php echo $category->name; ?></button><?php
        }
        ?>


    </div>
    <div class="grid-parent container-800">

        <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

        <?php 
$post_categories = wp_get_post_categories( get_the_ID() );
$cats = array();
	if (is_array($post_categories)) {
        foreach($post_categories as $c){
            $cat = get_category( $c );
            $cats[] = $cat->slug;
        }
        $cats_string = implode(" ", $cats); 
    } else {
        $cats_string = "";
    }



?>

        <article id="post-<?php the_ID(); ?>"
            <?php post_class("grid-item grid grid-cols-2 gap-x-10 mb-10 " . $cats_string); ?>>
            <header class="entry-header col-span-2 lg:col-span-1">
                <?php
						
			the_title( '<h2 class="entry-title text-xl"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) :
				?>
                <div class="entry-meta mb-2">
                    <?php
			indigo_posted_on();
			indigo_posted_by();
			$categories_list = get_the_category_list( esc_html__( ', ', 'indigo' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<p class="cat-links">' . esc_html__( 'Posted in %1$s', 'indigo' ) . '</p>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
								?>

                </div><!-- .entry-meta -->
                <?php endif; ?>
                <div class="thumbnail">
                    <?php indigo_post_thumbnail(); ?>
                </div>

            </header><!-- .entry-header -->



            <div class="entry-content col-span-2 lg:col-span-1 text-justify mx-2 md:mx-1 lg:mx-0">
                <?php
			echo wp_trim_words( get_the_content(), 110, null) ;
			?>
            </div><!-- .entry-content -->

            <footer class="entry-footer col-span-2 my-2 mx-2 lg:mx-0">
                <?php indigo_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->
        <?php
			endwhile;
            ?>
    </div>
    <?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

</main><!-- #main -->

<?php
get_footer();