<?php get_header()?>
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
	</div>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/horiscroll.js" type="text/javascript"></script>
</div>
<?php get_footer()?>
