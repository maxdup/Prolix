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
  //$('#isotope').isotope( 'reLayout' );
  if ($selector != '*'){
	$container.isotope({ sortBy : 'sort'});
	$container.isotope({ layoutMode: 'straightAcross' });
  }
});
$('.filter a').click(function(){
	var $container = $('#isotope');
	var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });
	if (selector != '*'){
		$('.item').addClass('big');
		$container.isotope({ sortBy : 'sort' });
		$container.isotope({ layoutMode: 'straightAcross' });
		$container.isotope('reLayout');
  	}else{
		$('.item').removeClass('big');
		$container.isotope({ sortBy : 'random'});
		$container.isotope({ layoutMode: 'masonryHorizontal' });
		$('#isotope').isotope({
    		masonryHorizontal: {
	  			rowHeight: 190
    		}
  		});
		$container.isotope('reLayout');
	}
	
  return false;
});
