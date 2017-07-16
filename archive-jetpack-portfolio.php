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
		<?php endif;?>

		<main id="main" class="site-main container">
			<div class="row">
				<div id="primary" class="content-area col-xs-12">
					<?php if ( have_posts() ) :

						$paged          = get_query_var( 'paged' );
						$posts_per_page = get_option( 'posts_per_page' );
						$i              = ( $paged * $posts_per_page ) + 1;
						while ( have_posts() ) : the_post();
							$template = get_post_format() ?: get_post_type();
							get_template_part( 'template-parts/item', $template );
							if ( ( $i % 2 ) == 0 ) {
								echo '<div class="every-2"></div>';
							}
							if ( ( $i % 3 ) == 0 ) {
								echo '<div class="every-3"></div>';
							}
							if ( ( $i % 4 ) == 0 ) {
								echo '<div class="every-4"></div>';
							}
							$i ++;
						endwhile;


				the_posts_pagination( array(
                    'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    'next_text' => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                    'type' => 'list',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                    )
                );


					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
					</div><!-- #primary -->
				</div>
	</main><!-- #main -->
<?php

get_footer();
