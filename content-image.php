<div id="post-<?php the_ID(); ?>" class="item <?php echo get_post_meta(get_the_ID(), 'dimension', True); ?> isotope-item">
	<?php if ( has_post_thumbnail() ) {
		//the_post_thumbnail();
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		?>
		
		<img src="<?php echo $thumbnail['0']; ?>" /><?php
	}?>
</div><!-- #post-## -->
