<?php

function the_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
	if ( is_array( $item->classes ) ) {
		$classes = preg_grep( '/^(fa)(-\S+)?$/i', $item->classes );
		if ( ! empty( $classes ) ) {
			$item_output = the_replace_item( $item_output, $classes );
		}
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'the_walker_nav_menu_start_el', 10, 4 );

function the_replace_item( $item_output, $classes ) {
	$spacer = '';

	if ( ! in_array( 'fa', $classes ) ) {
		array_unshift( $classes, 'fa' );
	}

	$before = true;
	if ( in_array( 'fa-after', $classes ) ) {
		$classes = array_values( array_diff( $classes, array( 'fa-after' ) ) );
		$before  = false;
	}

	$icon = '<span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class=" fa-stack-1x ' . implode( ' ', $classes ) . '"></i></span>';

	preg_match( '/(<a.+>)(.+)(<\/a>)/i', $item_output, $matches );
	if ( 4 === count( $matches ) ) {
		$item_output = $matches[1];
		if ( $before ) {
			$item_output .= $icon . '<span class="fontawesome-text sr-only">' . $spacer . $matches[2] . '</span>';
		} else {
			$item_output .= '<span class="fontawesome-text">' . $matches[2] . $spacer . '</span>' . $icon;
		}
		$item_output .= $matches[3];
	}

	return $item_output;
}

function the_nav_menu_css_class( $classes ) {
	if ( is_array( $classes ) ) {
		$tmp_classes = preg_grep( '/^(fa)(-\S+)?$/i', $classes );
		if ( ! empty( $tmp_classes ) ) {
			$classes = array_values( array_diff( $classes, $tmp_classes ) );
		}
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'the_nav_menu_css_class' );