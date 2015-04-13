// horizontal scrolling
function scrollHorizontally(e) {
  e = window.event || e;
  var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
  document.getElementById('contentwrapper').scrollLeft -= (delta*60);
  e.preventDefault();
}
function horizontal(){
  if (document.getElementById('contentwrapper').addEventListener) {
    document.getElementById('contentwrapper')
      .addEventListener("mousewheel", scrollHorizontally, false);
    document.getElementById('contentwrapper')
      .addEventListener("DOMMouseScroll", scrollHorizontally, false);
  } else {
    document.getElementById('contentwrapper')
      .attachEvent("onmousewheel", scrollHorizontally);
  }
}
