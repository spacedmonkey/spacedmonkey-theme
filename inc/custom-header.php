<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package spacedmonkey
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses spacedmonkey_header_style()
 */
function spacedmonkey_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'spacedmonkey_custom_header_args', array(
		'default-image'      => '',
		'default-text-color' => '000000',
		'flex-height'        => true,
		'wp-head-callback'   => 'spacedmonkey_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'spacedmonkey_custom_header_setup' );

if ( ! function_exists( 'spacedmonkey_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see spacedmonkey_custom_header_setup().
	 */
	function spacedmonkey_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			//return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
        <style type="text/css">
    <?php
	$header_image = get_header_image();
	if ( $header_image ):     ?>
    #background-header {
        background-image: url(<?php echo $header_image;?>) !important;
    }
        </style>
	<?php endif; ?>
            </

            style

            >
		<?php
	}
endif;

function add_image_header() {
	$page = false;
	if ( is_404() ) {
		$page = get_page_by_path( '404' );
	} else if ( is_search() ) {
		$page = get_page_by_path( 'search' );
	} else if ( is_singular() ) {
		$page = get_post();

		if ( ! has_post_thumbnail( $page ) && in_array( get_post_type( $page ), [
				'post',
				'attachment'
			] ) && get_option( 'page_for_posts' )
		) {
			$page = get_post( get_option( 'page_for_posts' ) );
		}
	}

	if ( is_post_type_archive() && ! $page ) {
		$post_type_data = get_post_type_object( get_post_type() );
		$post_type_slug = $post_type_data->rewrite['slug'];
		$page           = get_page_by_path( $post_type_slug );
	}

	if ( ( is_archive() || is_search() || is_home() ) && ! $page && get_option( 'page_for_posts' ) ) {
		$page = get_post( get_option( 'page_for_posts' ) );
	}


	if ( $page && has_post_thumbnail( $page ) ) {
		?>
            <style type="text/css">
                .header-page{
                    background-image: url("<?php  echo get_the_post_thumbnail_url( $page, 'spacedmonkey-banner' );?>");
                }
            </style>
        <?php
	}
}

add_action( 'wp_head', 'add_image_header' );