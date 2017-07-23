<?php

if ( ! class_exists( 'Echo_Js_Lazy_Load' ) ) {
	return;
}

add_filter( 'echo_js_lazy_load_ajax_image', '__return_false' );

/**
 * @param $attr
 *
 * @return mixed
 */
function echo_image_attributes( $attr ) {
	$attr['data-echo'] = $attr['src'];
	$attr['src']       = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';

	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', 'echo_image_attributes', 15, 1 );