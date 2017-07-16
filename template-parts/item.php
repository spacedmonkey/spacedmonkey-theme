<article id="post-<?php the_ID(); ?>" <?php post_class( "col-xs-12 col-sm-6 col-md-4" ); ?>>
    <div class="row">
		<?php if ( has_post_thumbnail() ): ?>
            <div class="col-xs-4 col-xs-12">
                <a href="<?php the_permalink();?>" rel="bookmark"><?php the_post_thumbnail( 'full' ); ?></a>
            </div>
		<?php endif;

		$col = ( has_post_thumbnail() ) ? 8 : 12;
		?>
        <div class="col-xs-<?php echo $col;?> col-xs-12">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
        </div>
    </div>
</article>