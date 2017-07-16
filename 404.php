<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package spacedmonkey
 */

get_header(); ?>

	<div id="primary" class="content-area">



		<header class="header-page">
            <div class="header-page-inside">
                <div class="container">
                        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'spacedmonkey' ); ?></h1>
                </div>
            </div><!-- .page-header -->
        </header><!-- .page-header -->
		<main id="main" class="site-main container">
			<section class="error-404 not-found">
				<?php get_template_part( 'template-parts/content', 'none' );?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
