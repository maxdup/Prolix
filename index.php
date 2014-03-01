<?php get_header()?>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
<div class="contentcontainer">
	<div id="contentwrapper">
		<div id="isotope" class="content">
			<?php while ( have_posts() ) : the_post();
				if ( has_post_format( 'image' )) {
					get_template_part( 'content-image', get_post_format() );
				}
				else if ( has_post_format( 'gallery' )) {
					get_template_part( 'content-gallery', get_post_format() );
				}
				else{
					get_template_part( 'content-blogpost', get_post_format() );
				}
			endwhile;?> 
		</div>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/js/prolix.js" type="text/javascript"></script>
	</div>
	<script>	
		(function() {
    			function scrollHorizontally(e) {
        			e = window.event || e;
        			var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
        			document.getElementById('contentwrapper').scrollLeft -= (delta*50);
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

		$(document).ready(function() {

			$('.lightbox').magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				mainClass: 'mfp-img-mobile',
				image: {
					verticalFit: true
				}
		
			});
		});
	</script>
</div>
<?php get_footer()?>
