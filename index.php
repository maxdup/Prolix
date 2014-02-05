<?php get_header()?>

<div class="contentwrapper">
	<div class="content">
		<?php while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'entry-index', get_post_format() );

		endwhile;?>
	</div>
</div>

<?php get_footer()?>
