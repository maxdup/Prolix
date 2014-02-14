<div id="post-<?php the_ID(); ?>" class="item <?php echo get_post_meta(get_the_ID(), 'dimension', True);
	$category = get_the_category(); 
	echo ' ', str_replace(' ', '', $category[0]->cat_name); 
	?> isotope-item">
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		if( empty( $post->post_content) ) : ?>
			<img src="<?php echo $thumbnail['0']; ?>" />
		<?php 
		else:
			echo get_the_content() ?><img src="<?php echo $thumbnail['0']; ?>" /></a>
			
		<?php endif; ?>
	<?php endif; ?>
</div><!-- #post-## -->
