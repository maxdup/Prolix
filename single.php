 <?php get_header()?>

<div id="contentvertical">
	<div class="contentblogpost">
        <div class="pagecontent">
		<?php while (have_posts()): the_post()?>
			<h2><?php the_title()?></h2>
			<?php echo '<div class="post-info">Posted by ',get_the_author_link() , ' on ', get_the_date(), '</div>';?> 
			<?php the_content();?>
			
		<?php endwhile;?>
        </div>
		<?php comments_template();?>
	</div>
</div>

<?php get_footer()?>
