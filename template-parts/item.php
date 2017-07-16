<article id="post-<?php the_ID(); ?>" <?php post_class( "col-xs-12 col-sm-6 col-md-4" ); ?>>

		<?php if ( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'medium' ); ?></a>
		<?php endif; ?>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php the_excerpt(); ?>


</article>