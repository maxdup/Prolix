<?php get_header()?>

<div id="contentvertical">
	<div id="contentpage">
		<div id="contentpagetext">
			<?php while (have_posts()): the_post()?>
					<h2><?php the_title()?></h2>
					<?php the_content();?>
					
			<?php endwhile;?>
		</div>
	<div>
</div>
<?php get_footer()?>
