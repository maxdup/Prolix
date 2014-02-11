<?php get_header()?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
<div class="contentcontainer">
	<div id="contentwrapper">
		<div id="isotope" class="content">
			<?php while ( have_posts() ) : the_post();
				if ( has_post_format( 'image' )) {
					get_template_part( 'content-image', get_post_format() );
				}else{
					get_template_part( 'content-blogpost', get_post_format() );
				}
			endwhile;?> 
	
			</div>
		<script type="text/javascript">
			$(window).load(function() {
			  var $container = $('#isotope');
			  $container.isotope({
				itemSelector: '.item',
				layoutMode:'masonryHorizontal'
			  });
			  $('#isotope').isotope({
  			    masonryHorizontal: {
				  rowHeight: 195
			    }
			  });
			  $('#isotope').isotope( 'shuffle' );
			  $('#isotope').isotope( 'reLayout' );
			});

		</script>
	</div>
	<script>	
		
		(function() {
    			function scrollHorizontally(e) {
        			e = window.event || e;
        			var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
        			document.getElementById('contentwrapper').scrollLeft -= (delta*50); // Multiplied by 40
        			e.preventDefault();
    			}
    			if (document.getElementById('contentwrapper').addEventListener) {
        			// IE9, Chrome, Safari, Opera
        			document.getElementById('contentwrapper').addEventListener("mousewheel", scrollHorizontally, false);
        			// Firefox
        			document.getElementById('contentwrapper').addEventListener("DOMMouseScroll", scrollHorizontally, false);
    			} else {
        			// IE 6/7/8
        			document.getElementById('contentwrapper').attachEvent("onmousewheel", scrollHorizontally);
    			}
		})();		
	</script>
</div>
<?php get_footer()?>
