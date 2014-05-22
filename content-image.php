<div id="post-<?php the_ID(); ?>" class="item picture <?php if (is_category()): echo 'big '; endif; echo get_post_meta(get_the_ID(), 'dimension', True);$category = get_the_category(); echo ' ', str_replace(' ', '', $category[0]->cat_name); ?> isotope-item">
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID, 'thumbnail'));
		if( empty( $post->post_content) ) :
			echo '<div class="lightbox" href="', $url,'"><img src="', $thumbnail['0'], '"/></div>';
		else:
			echo '<div class="lightbox" href="', $url,'" title="', get_the_content(), '"><img src="', $thumbnail['0'], '"/></div>';
		endif;
	endif; ?>
</div><!-- #post-## -->
