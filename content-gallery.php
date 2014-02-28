<div id="post-<?php the_ID(); ?>" class="item gallery <?php echo get_post_meta(get_the_ID(), 'dimension', True);$category = get_the_category(); echo ' ', str_replace(' ', '', $category[0]->cat_name); ?> isotope-item">
	
	<div class="carousel slide" id="carousel-<?php echo get_the_title();?>">
		<a href="<?php echo get_permalink(); ?>">
		<div class="carousel-inner">
		<?php 
		$galleries = get_post_galleries_images();
		$first = true;
		$active = 'active';
		foreach ($galleries as $gallery){
			foreach ($gallery as $image){
			
			echo '<div class="slide ',$active,'">';
			echo    '<span class="helper"></span>',
				//<a href="', $image, '" class="lightbox">*
				'<img src="', $image, '" class="slideimg" />
				',//</a>
			'</div>';
			if ($first){$active = ''; $first=false;}
			}
		}
		?>
		</div>
		<a class="left carousel-control" href="#carousel-<?php echo get_the_title();?>" 
				data-slide="prev"><span class="helper-left">&lt;</span></a>
		<a class="right carousel-control" href="#carousel-<?php echo get_the_title();?>" 
				data-slide="next"><span class="helper-right">&gt;</span></a>
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
	</header>
	</div></a>
	<div class="gallerytextwrapper">
		<div class="blogpostpreviewtext">
			<p align="right"><?php echo get_post_meta(get_the_ID(), 'subtitle', True); ?></p>
			<p><?php echo strip_shortcodes(get_the_content()); ?></p>
		</div>
	</div>
	<div class="readmore">
				<a href="<?php echo get_permalink(); ?>">read more</a>
			</div>
</div><!-- #post-## -->
