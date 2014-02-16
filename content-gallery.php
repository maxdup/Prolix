<div id="post-<?php the_ID(); ?>" class="item <?php echo get_post_meta(get_the_ID(), 'dimension', True); $category = get_the_category(); echo ' ', $category[0]->cat_name;?> isotope-item">

	<div class="carousel slide" id="carousel-<?php echo get_the_title();?>">
		<div class="carousel-inner">
		<?php 
		$galleries = get_post_galleries_images();
		$first = true;
		$active = 'active';
		foreach ($galleries as $gallery){
			foreach ($gallery as $image){
			
			echo '<div class="slide ',$active,'">';
			echo    '<div class="helper"></div>',
				//<a href="', $image, '" class="lightbox">*
				'<img src="', $image, '" class="slide wp-image-96" />
				',//</a>
			'</div>';
			if ($first){$active = ''; $first=false;}
			}
		}
		?>
		</div>
		<a class="left carousel-control" href="#carousel-<?php echo get_the_title();?>" data-slide="prev">&lt;</a>
		<a class="right carousel-control" href="#carousel-<?php echo get_the_title();?>" data-slide="next">&gt;</a>
	</div>

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


<!--

<div class="slide active"><a href="http://farm8.staticflickr.com/7303/9735056118_ffa22ba050_o.jpg" class="lightbox"><img src="http://www.mdupuis.com/wp-content/uploads/2013/09/vanguard1.jpg" alt="vanguard1" class="alignnone size-medium wp-image-96" /></a></div>
<div class="slide"><a href="http://farm8.staticflickr.com/7372/9731826747_206e862f8e_o.jpg" class="lightbox"><img src="http://www.mdupuis.com/wp-content/uploads/2013/09/vanguard2.jpg" alt="vanguard2" class="alignnone size-medium wp-image-97" /></a></div>
<div class="slide"><a href="http://farm4.staticflickr.com/3737/9731844363_a24e5a26d8_o.jpg" class="lightbox"><img src="http://www.mdupuis.com/wp-content/uploads/2013/09/vanguard3.jpg" alt="vanguard3" class="alignnone size-medium wp-image-98" /></a></div>
<div class="slide"><a href="http://farm8.staticflickr.com/7427/9731824787_cef15a82a6_o.jpg" class="lightbox"><img src="http://www.mdupuis.com/wp-content/uploads/2013/09/vanguard4.jpg" alt="vanguard4" class="alignnone size-medium wp-image-99" /></a></div>
<div class="slide"><a href="http://farm6.staticflickr.com/5537/9731824279_c796b5e2c2_o.jpg" class="lightbox"><img src="http://www.mdupuis.com/wp-content/uploads/2013/09/vanguard5.jpg" alt="vanguard5" class="alignnone size-medium wp-image-100" /></a></div>
</div>
<a class="left carousel-control" href="#carousel-vanguard" data-slide="prev">&lt;</a>
<a class="right carousel-control" href="#carousel-vanguard" data-slide="next">&gt;</a>
</div></div>
-->
