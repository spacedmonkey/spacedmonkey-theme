<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package spacedmonkey
 */

get_header(); ?>

    <section id="primary" class="content-area">


        <header class="header-page">
            <div class="header-page-inside">
                <div class="container">
                    <h1 class="page-title"><?php
                        /* translators: %s: search query. */
                        printf( esc_html__( 'Search Results for: %s', 'spacedmonkey' ), '<span>' . get_search_query() . '</span>' );
                        ?></h1>
                </div>
            </div><!-- .page-header -->
        </header><!-- .page-header -->
        <main id="main" class="site-main container">
            <div class="row">
				<?php
				if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/item', 'search' );

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

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
