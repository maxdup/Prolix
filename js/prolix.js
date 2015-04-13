//url parameter parser
$.urlParam = function(name){
	  var results = new RegExp('[\\?&amp;]' + name + '=([^&;#]*)').exec(window.location.href);
  if (results != null){  	  
	$('.item').addClass('big');
	return '.' + results[1] || 0;
  }
    return '*';
}

function isoinit(){
  //isotope init
  horizontal()
  var $container = $('#isotope');
  var $selector = $.urlParam('filter');
  var $biggies = [];
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
  
  if ($selector != '*'){
	$('.heightVar').addClass('big');
	$container.isotope({ sortBy : 'sort'});
	$container.isotope({ layoutMode: 'straightAcross' });
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

  $('.thumb').click(function(){
    if ($(this).parent().hasClass('big')){
      var wasbig = true
    }

    for (i=0; i < $biggies.length; i++){
      $biggies[i].removeClass('big');
    }
    $biggies = [];
    if (!wasbig){
      console.log('ading')
      $(this).parent().addClass('big');
      $biggies.push($(this).parent());
    }
    $container.isotope('reLayout');
	$('.thumb').imagefill({runOnce:true});
  });
}

$(window).load(function(){
  $('.thumb').imagefill({runOnce:true});
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
