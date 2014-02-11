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
		
		
<div class="item w1 h2 isotope-item" id="image"><a href="http://farm6.staticflickr.com/5451/8908551329_4cf10de7f5_o.jpg" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/venus.png" /></a></div>
<div class="item w3 h1 isotope-item" id="image"><a href="http://farm4.staticflickr.com/3666/9618665561_9ddfb052af_o.jpg" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/snow.jpg" /></a></div>
<div class="item w2 h1 isotope-item" id="image"><a href="http://farm4.staticflickr.com/3683/8908550883_2666b4a087_o.png" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/anybetter.png" /></a></div>
<div class="item w2 h1 isotope-item" id="image"><a href="http://farm3.staticflickr.com/2885/8909180364_29aa3f690c_o.jpg" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/illusionLP.jpg" /></a></div>
<div class="item w1 h3 isotope-item" id="image"><a href="http://farm4.staticflickr.com/3699/8909005204_960bce3790_o.png" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/propaganda-01.png" /></a></div>
<div class="item w3 h2 isotope-item" id="image"><a href="http://farm4.staticflickr.com/3818/8908378151_393fe69ab5_o.jpg" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/fish-01.jpg" /></a></div>
<div class="item w2 h2 isotope-item" id="image"><a href="http://farm3.staticflickr.com/2893/8908372697_8468358f2c_o.png" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/whale.png" /></a></div>
<div class="item w1 h1 isotope-item" id="image"><a href="http://farm6.staticflickr.com/5323/8909004648_15f7b88156_o.png" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/flower-01.png" /></a></div>
<div class="item w1 h2 isotope-item" id="image"><a href="http://farm4.staticflickr.com/3823/9777835683_78fdc64da9_o.jpg" class="lightbox"><img alt="" src="/wp-content/themes/twentyten/image/silversurfer_final.png" /></a></div>
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
