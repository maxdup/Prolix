<div id="post-<?php the_ID(); ?>" class="item blogpost <?php if (is_category()): echo 'big '; endif;  echo get_post_meta(get_the_ID(), 'dimension', True);$category = get_the_category(); echo ' ', str_replace(' ', '', $category[0]->cat_name); ?> isotope-item">
	<div class="sort"><?php the_date('Ymd') ?></div>
	<a href="<?php echo get_permalink(); ?>">
	<div class="thumb">
	<?php if ( has_post_thumbnail() ) {

		//the_post_thumbnail();
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'your_thumb_handle' );
		?><img src="<?php echo $thumbnail['0']; ?>" /><?php
	}?>
	</div>
	</a>
	<header class="entry-header-index">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
		<div class="entry-meta">
			<span class="categ">
				<div class="filter">
					<?php $cats = get_the_category(); ?>
					<a href="<?php echo get_category_link($cats[0]->cat_ID)?>" data-filter=".<?php echo str_replace(' ', '',$cats[0]->cat_name); ?>"><?php echo $cats[0]->cat_name; ?></a>
				</div>
			</span>
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
