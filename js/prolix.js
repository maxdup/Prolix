//url parameter parser
$.urlParam = function(name){
	  var results = new RegExp('[\\?&amp;]' + name + '=([^&;#]*)').exec(window.location.href);
  if (results != null){  	  
	$('.item').addClass('big');
	return '.' + results[1] || 0;
  }
    return '*';
}


$(window).load(function() {
  //isotope init
  var $container = $('#isotope');
  var $selector = $.urlParam('filter');
  $container.isotope({
	itemSelector: '.item',
	filter: $selector,
	layoutMode: 'masonryHorizontal'
  }); 
  $('#isotope').isotope({
	masonryHorizontal: {
	  rowHeight: 190
	}
  });
  
  $('#isotope').isotope( 'shuffle' );
  if ($selector != '*'){
	$('.heightVar').addClass('big');
	$container.isotope({ sortBy : 'sort'});
	$container.isotope({ layoutMode: 'straightAcross' });
  }

  $('.thumb').imagefill({runOnce:true});

  // horizontal scrolling
  function scrollHorizontally(e) {
			e = window.event || e;
			var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
			document.getElementById('contentwrapper').scrollLeft -= (delta*60);
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
	
  //navbar filters
  $('.filter a').click(function(){
	var $container = $('#isotope');
	var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });
	if (selector != '*'){
	  $('.item').addClass('big');
	  $('.heightVar').addClass('big');
	  $container.isotope({ sortBy : 'sort' });
	  $container.isotope({ layoutMode: 'straightAcross' });
	  $container.isotope('reLayout');

  	}else{
	  $('.item').removeClass('big');
	  $('.heightVar').removeClass('big');
	  $container.isotope({ sortBy : 'random'});
	  $container.isotope({ layoutMode: 'masonryHorizontal' });
	  $('#isotope').isotope({
		masonryHorizontal: {
		  rowHeight: 190
		}
	  });
	  $container.isotope('reLayout');
	}
	$('.thumb').imagefill({runOnce:true});

	return false;
  });
});

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
