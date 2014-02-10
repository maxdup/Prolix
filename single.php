 <?php get_header()?>

<div id="contentvertical">
	<div id="contentblogpost">
		<?php while (have_posts()): the_post()?>
			<h2><?php the_title()?></h2>
			<?php echo get_the_author_link();?>
			<?php the_content();?>
			
		<?php endwhile;?>

		<?php comments_template('', true);?>
	<div>
</div>

<?php get_footer()?>
