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
        <div class="container">

            <h1><?php
				spacedmonkey_post_type_title();
				?></h1>
        </div>
    </header><!-- .page-header -->
<?php endif; ?>
    <main id="main" class="site-main container">
        <div class="row">

			<?php $cols = ( is_active_sidebar( 'sidebar-1' ) ) ? 'col-xs-12 col-md-8' : 'col-xs-12'; ?>
            <div id="primary" class="content-area <?php echo $cols; ?>">


				<?php
				while ( have_posts() ) : the_post();
					$template = get_post_format() ?: get_post_type();
					get_template_part( 'template-parts/content', $template );

					the_post_navigation( [
						'prev_text' => '<span aria-hidden="true">&larr;</span> %title',
						'next_text' => '%title <span aria-hidden="true">&rarr;</span>',
					] );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
            </div><!-- #primary -->
			<?php get_sidebar(); ?>
        </div>
    </main><!-- #main -->


<?php

get_footer();
