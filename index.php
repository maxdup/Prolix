<?php get_header()?>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
<div class="contentcontainer">
	<div id="contentwrapper">
		<div class="heightVar <?php if(is_category()): echo 'big'; endif; ?>">
			<div id="isotope" class="content">
				<?php while ( have_posts() ) : the_post();
					if ( has_post_format( 'image' )) {
						get_template_part( 'content-image', get_post_format() );
					}
					else if ( has_post_format( 'gallery' )) {
						get_template_part( 'content-gallery', get_post_format() );
					}
					else if ( has_post_format( 'link' )){
						get_template_part( 'content-link', get_post_format() );				
					}
					else{
						get_template_part( 'content-blogpost', get_post_format() );
					}
				endwhile;?> 
			</div>
		</div>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/js/prolix.js" type="text/javascript"></script>
	</div>
</div>
<?php get_footer()?>
