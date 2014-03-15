<div id="post-<?php the_ID(); ?>" class="item blogpost <?php if (is_category()): echo 'big '; endif;  echo get_post_meta(get_the_ID(), 'dimension', True);$category = get_the_category(); echo ' ', str_replace(' ', '', $category[0]->cat_name); ?> isotope-item">
	<div hidden class="sort"><?php the_date('Ymd') ?></div>
	<a href="<?php echo get_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) {

		//the_post_thumbnail();
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		?><img src="<?php echo $thumbnail['0']; ?>" /><?php
	}else{
		echo'<div style="height:100%; width:100%;"/></div>';
	}?>
	</a>

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
	<a class="linkcontainer" href="<?php echo get_permalink(); ?>">
	<div class="blogpostpreview">
		<div class="blogpostpreviewtextwrapper">
			<div class="blogpostpreviewtextbg">
				<div class="blogpostpreviewtext">
					<p align="right"><?php echo get_the_date(); ?></p>
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="readmore">
		<a href="<?php echo get_permalink(); ?>">read more</a>
	</div>
	</a>
</div><!-- #post-## -->
