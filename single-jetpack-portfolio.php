<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spacedmonkey
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>

	<header class="header-page">
        <div class="header-page-inside">
            <div class="container">

                <h1><?php
                    spacedmonkey_post_type_title();
                ?></h1>
            </div>
        </div><!-- .page-header -->
	</header><!-- .page-header -->
<?php endif;?>
<main id="main" class="site-main container">
	<div class="row">


	<div id="primary" class="content-area col-xs-12">


		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation([
				'prev_text'          => '<span aria-hidden="true">&larr;</span> %title',
				'next_text'          => '%title <span aria-hidden="true">&rarr;</span>',
            ]);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div><!-- #primary -->

			</div>
		</main><!-- #main -->


<?php

get_footer();
