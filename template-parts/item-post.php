<div class="col-xs-12">
	<?php
	    $template = get_post_format() ?: get_post_type();
	    get_template_part( 'template-parts/content', $template );
	?>
</div>