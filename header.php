<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spacedmonkey
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e( 'Skip to content', 'spacedmonkey' ); ?></a>

	<?php $nav_class = ( is_front_page() ) ? 'navbar-fixed-top' : 'navbar-fixed-top navbar-fixed-background'; ?>
    <nav id="main-nav" class="navbar navbar-default <?php echo $nav_class; ?>">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                   class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'nav navbar-nav nav-menu navbar-right'
				) );
				?>

            </div><!--/.nav-collapse -->
        </div>
    </nav>
	<?php if ( is_front_page() ): ?>
        <div id="background-header" class="intro">
			<?php get_sidebar( 'home' ); ?>
        </div>
	<?php endif; ?>


    <div id="content" class="site-content">
