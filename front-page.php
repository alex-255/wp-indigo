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
<main class="front-page-in-center container-800">

    <img src="<?php echo esc_url( get_template_directory_uri(  ) . "/images/girl.png" ) ?>" alt="Picture of a girl"
        class="rounded-full" />
    <h1 class="site-name"><?php bloginfo( "name" ) ?></h1>
    <h3 class="site-description"><?php bloginfo( "description" ) ?></h3>
</main><!-- #main -->

<?php
get_footer();