<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spacedmonkey
 */

?>



	<footer id="colophon" class="site-footer">
		<?php get_sidebar( 'footer' ); ?>
		<div class="site-info" id="footer-2">
			<div class="container">
				<div class="row">
						<div class="col-sm-6 col-sx-12 box widget_text">
                            <?php
                            $my_theme = wp_get_theme();
                            printf( '<p>Copyright %d &copy; <a href="%s">%s</a></p>', date( "Y" ), esc_html( $my_theme->get( 'AuthorURI' ) ), esc_html( $my_theme->get( 'Author' ) ) ); ?>
                        </div>
						<div class="col-sm-6 col-sx-12">

                            <?php
                                wp_nav_menu( array(
                                    'menu'              => 'secondary',
                                    'theme_location' 	=> 'footer-1',
                                    'depth'             => 1,
                                    'container'         => 'div',
                                    'container_class'   => 'footer-nav footer-nav-1',
                                    'menu_class'        => ' list-inline social-links'
                                ));
                            ?>
                        </div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</div><!-- #content -->
</body>
</html>
