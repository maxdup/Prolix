<?php get_header()?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
<div class="contentwrapper">
	<div id="isotope" class="content">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'entry-index', get_post_format() );
		endwhile;?>
	</div>

	<script type="text/javascript">
		$(window).load(function() {
		  var $container = $('#isotope');

		  $container.isotope({
			itemSelector: '.item'
		  });
		  $('#iso').isotope( 'shuffle' );
		  $container.isotope( 'option', { layoutMode: 'masonry' } );
		  $('#iso').isotope( 'reLayout' );
		});
	</script>
</div>
<?php get_footer()?>
