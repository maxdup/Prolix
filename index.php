<?php get_header()?>

<div class="contentwrapper">
	<div class="content">
		<?php while (have_posts()): the_post()?>
			<h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
			<?php the_content(__('Continue Reading'));?>
			
		<?php endwhile;?>
	</div>
</div>

<?php get_footer()?>
