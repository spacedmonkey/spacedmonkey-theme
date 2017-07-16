<?php
/**
 * The template for displaying archive pages
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
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </div>
        </div><!-- .page-header -->
    </header><!-- .page-header -->
<?php endif; ?>

    <main id="main" class="site-main container">
        <div class="row">
			<?php $cols = ( is_active_sidebar( 'sidebar-1' ) ) ? 'col-xs-12 col-md-8' : 'col-xs-12'; ?>
            <div id="primary" class="content-area <?php echo $cols; ?>">
                <div class="row">
					<?php if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						$template = get_post_format() ?: get_post_type();
						get_template_part( 'template-parts/item', $template );

					endwhile;
					?>
                </div>
				<?php

				the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
						'next_text'          => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
						'type'               => 'list',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
					)
				);


				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
            </div><!-- #primary -->
			<?php get_sidebar(); ?>
        </div>
    </main><!-- #main -->
<?php

get_footer();
