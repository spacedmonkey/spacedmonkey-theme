<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package spacedmonkey
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

    <header class="header-page">
        <div class="header-page-inside">
            <div class="container">

                <?php
                the_title( '<h1 class="page-title">', '</h1>' );
                ?>
            </div>
        </div><!-- .page-header -->
    </header><!-- .page-header -->
<?php endif; ?>

    <main id="main" class="site-main container">
        <div class="row">
            <div class="col-xs-12 col-md-10  col-md-offset-1">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
            </div><!-- #primary -->
        </div><!-- #primary -->
    </main><!-- #main -->

    </div><!-- #primary -->


<?php
get_footer();
