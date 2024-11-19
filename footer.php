<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indigo
 */

?>

<footer id="colophon" class="site-footer">
    <div class="social-icons container-800">
        <a href="#"><span class="dashicons dashicons-twitter"></span></a>
        <a href="#"><span class="dashicons dashicons-facebook-alt"></span></a>
        <a href="#"><span class="dashicons dashicons-google"></span></a>
        <a href="#"><span class="dashicons dashicons-linkedin"></span></a>
    </div>
    <div class="site-info container-800">
        <?php
			echo esc_html__( 'Proudly powered by ', 'indigo' );
			?>
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'indigo' ) ); ?>">
            <?php
				echo esc_html__( 'WordPress', 'indigo' );
				?>
        </a>
        <span class="sep"> | </span>
        <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s coded by %2$s.', 'indigo' ), 'indigo', '<a href="http://developmentweb.online">Alex-255</a>' );
				?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>