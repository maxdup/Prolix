<div id="post-<?php the_ID(); ?>" class="item image <?php echo get_post_meta(get_the_ID(), 'dimension', True);$category = get_the_category(); echo ' ', str_replace(' ', '', $category[0]->cat_name); ?> isotope-item">
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		if( empty( $post->post_content) ) :
			echo '<img src="', $thumbnail['0'],'" />';
		else:
			echo '<a href="', get_the_content(), '"><img src="', $thumbnail['0'], '"/></a>';
		endif;
	endif; ?>
</div>
