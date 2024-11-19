<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indigo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'indigo' ); ?></a>

        <header id="masthead" class="site-header container-800">
            <div class="site-branding">
                <?php
			
			if ( has_custom_logo() ) :
				the_custom_logo();
			else :
				?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
					$indigo_description = get_bloginfo( 'description', 'display' );
				if ( $indigo_description || is_customize_preview() ) :
					?>
                <p class="site-description">
                    <?php echo $indigo_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </p>
                <?php endif; ?>

                <?php
			endif; ?>

            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
                <div class="main-navigation__menu">
                    <?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
                    <span class="dashicons dashicons-search"></span>
                </div>

            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->