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
    <div class="button-group filter-button-group container-800 flex justify-center items-center my-10 text-xl">
        <button data-filter="*" class="mr-4">All</button>
        <?php $categories = get_categories(); 
        foreach ($categories as $category) {
            ?><button data-filter=".<?php echo $category->slug; ?>"
            class="mr-4"><?php echo $category->name; ?></button><?php
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

        <article class="<?php echo("grid-item w-full mb-10 " . $cats_string); ?>">
            <main class="flex justify-between">
                <header class="entry-header w-[60%]">
                    <?php
						
			echo '<h2 class="entry-title text-xl"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" >';
            echo get_the_title();
            echo '&nbsp;<span class="text-gray-500">' . wp_trim_words( get_the_content(), 10, null ) . '<span></a></h2>';

			if ( 'post' === get_post_type() ) :
				?>
                    <div class="entry-meta mb-2 text-gray-500 font-semibold">
                        <?php
			
			$categories_list = get_the_category_list( esc_html__( ', ', 'indigo' ) );
			if ( $categories_list ) {
				echo $categories_list;
			}
								?>

                    </div><!-- .entry-meta -->
                    <?php endif; ?>

                </header><!-- .entry-header -->
                <div class="text-right mx-2 md:mx-1 lg:mx-0 flex text-gray-500 font-semibold">
                    <?php echo get_the_modified_date(); ?>
                </div>
            </main>
        </article>
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