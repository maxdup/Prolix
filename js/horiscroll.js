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
