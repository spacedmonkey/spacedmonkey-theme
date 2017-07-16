<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spacedmonkey
 */

if ( ! is_active_sidebar( 'sidebar-home' ) ) {
	return;
}
?>

		<?php dynamic_sidebar( 'sidebar-home' ); ?>