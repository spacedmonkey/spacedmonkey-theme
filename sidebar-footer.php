<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spacedmonkey
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) && ! is_active_sidebar( 'sidebar-footer-secondary' ) ) {
	return;
}
?>
<div id="footer-1">
	<div class="container">
		<?php dynamic_sidebar( 'sidebar-footer' ); ?>
	</div>
</div>

<div class="site-info" id="footer-2">
	<div class="container">
		<?php dynamic_sidebar( 'sidebar-footer-secondary' ); ?>
	</div>
</div>
