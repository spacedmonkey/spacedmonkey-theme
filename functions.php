<?php
/**
 * spacedmonkey functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spacedmonkey
 */

if ( ! function_exists( 'spacedmonkey_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function spacedmonkey_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on spacedmonkey, use a find and replace
		 * to change 'spacedmonkey' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spacedmonkey', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'   => esc_html__( 'Primary', 'spacedmonkey' ),
			'footer-1' => esc_html__( 'Footer', 'spacedmonkey' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'spacedmonkey_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_image_size( 'spacedmonkey-banner', 1920, 270, true );

	}
endif;
add_action( 'after_setup_theme', 'spacedmonkey_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spacedmonkey_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spacedmonkey_content_width', 720 );
}

add_action( 'after_setup_theme', 'spacedmonkey_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spacedmonkey_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'spacedmonkey' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'spacedmonkey' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar primary', 'spacedmonkey' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'spacedmonkey' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar secondary', 'spacedmonkey' ),
		'id'            => 'sidebar-footer-secondary',
		'description'   => esc_html__( 'Add widgets here.', 'spacedmonkey' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}

add_action( 'widgets_init', 'spacedmonkey_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spacedmonkey_scripts() {
	$asset_file            = get_theme_file_path( 'assets/theme.asset.php' );
	$asset                 = is_readable( $asset_file ) ? require $asset_file : array();
	$asset['dependencies'] = isset( $asset['dependencies'] ) ? $asset['dependencies'] : array();
	$asset['version']      = isset( $asset['version'] ) ? $asset['version'] : null;

	$asset['dependencies'][] = 'jquery';

	wp_enqueue_style( 'spacedmonkey-style', get_theme_file_uri( 'assets/theme.css' ), array(), $asset['version'] );
	wp_enqueue_script( 'spacedmonkey-scripts', get_theme_file_uri( 'assets/theme.js' ), $asset['dependencies'], $asset['version'], true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'spacedmonkey_scripts' );


function testing( $current ) {
	$current = str_replace( "<div", "<li", $current );
	$current = str_replace( "</div", "</li", $current );
	$current = str_replace( "nav-", " ", $current );

	return $current;
}

add_filter( 'previous_post_link', 'testing' );
add_filter( 'next_post_link', 'testing' );

function testing2( $current ) {
	$current = str_replace( "<div", "<ul", $current );
	$current = str_replace( "</div", "</ul", $current );

	return $current;
}

add_filter( 'navigation_markup_template', 'testing2' );

function get_the_archive_title_filter( $title ) {
	$list  = explode( ":", $title );
	$title = array_pop( $list );

	return $title;
}

add_filter( 'get_the_archive_title', 'get_the_archive_title_filter' );

function spacedmonkey_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'spacedmonkey_excerpt_length', 999 );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
	 *
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 *
		 */
		do_action( 'wp_body_open' );
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/nav.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/gallery.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load Echo lazy load compatibility file.
 */
require get_template_directory() . '/inc/echo-lazy-load.php';

/**
 * Add walker for icon nav
 */
require get_template_directory() . '/inc/icons-nav.php';
