<div id="post-<?php the_ID(); ?>" class="item <?php echo get_post_meta(get_the_ID(), 'dimension', True); ?> isotope-item">
	<?php if ( has_post_thumbnail() ) {
		//the_post_thumbnail();
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		?><img src="<?php echo $thumbnail['0']; ?>" /><?php
		
	}?>

	<header class="entry-header-index" style"color:#">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
		<div class="entry-meta">
			<span class="categ"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div>
		<?php 
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title-index"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>
	</header><!-- .entry-header -->
</div><!-- #post-## -->
