<form role="search" method="get" class="search-form" action="<?php  esc_url( home_url( '/' ) ) ?>">
    <div class="input-group">
        <span class="screen-reader-text"><?php  echo _x( 'Search for:', 'label' ); ?></span>
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>" value="<?php  echo get_search_query(); ?>" name="s" />
	    <span class="input-group-btn">
		    <button type="button" class="btn search-submit btn-default">
			  <i class="fa fa-search fa-lg" aria-hidden="true"></i>
			  <span class="screen-reader-text"><?php echo esc_attr_x( 'Search', 'submit button' ); ?></span>
			</button>
		</span>
	</div>
</form>