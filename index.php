<?php get_header()?>


<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.7.2.min.js" type="text/javascript"></script>
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
		<script type="text/javascript">
			$.urlParam = function(name){
		    	  var results = new RegExp('[\\?&amp;]' + name + '=([^&;#]*)').exec(window.location.href);
			  if (results != null){  	  
				$('.item').addClass('big');
				return '.' + results[1] || 0;
			  }
			    return '*';	
			}

			$(window).load(function() {
			  var $container = $('#isotope');
			  var selector = $.urlParam('filter');
			  $container.isotope({
				itemSelector: '.item',
				filter: selector,
				layoutMode: 'masonryHorizontal'
			  });
			  $('#isotope').isotope({
  			    masonryHorizontal: {
				  rowHeight: 190
			    }
			  });
			  $('#isotope').isotope( 'shuffle' );
			  //$('#isotope').isotope( 'reLayout' );
			});
			$('.filter a').click(function(){
				var $container = $('#isotope');
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector });
				if (selector != '*'){
					$('.item').addClass('big');
					$container.isotope('reLayout');
					$container.isotope({ sortBy : 'sort' });
   			  	}else{
					$('.item').removeClass('big');
					$container.isotope('reLayout');
					$container.isotope({ sortBy : 'random'});
      			}
				
			  return false;
			});
		</script>
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
	</script>
</div>
<?php get_footer()?>
