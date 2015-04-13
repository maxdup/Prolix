 <?php get_header()?>

<div id="contentvertical">
	<div class="contentblogpost">
		<?php while (have_posts()): the_post()?>
			<?php if ( has_post_thumbnail() ) {
		
				//$thumbnail = the_post_thumbnail();
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
				?><div style="padding-left: 100px; padding-bottom: 20px"><img style="margin-left:auto; margin-right:auto" height="400" width="400" src="<?php echo $thumbnail['0']; ?>" /></div><?php
			}?>
			<h2><?php the_title()?></h2>
			<?php echo '<div class="post-info">Posted by ',get_the_author_link() , ' on ', get_the_date(), '</div>';?> 
			<?php the_content();?>
			
		<?php endwhile;?>

		<?php comments_template();?>
	<div>
</div>

<?php get_footer()?>
