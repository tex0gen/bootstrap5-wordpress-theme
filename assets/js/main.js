jQuery(document).ready(function($) {
  // Heightmatcher
  function heightmatcher(elem, breakpoint) {
    breakpoint = typeof a !== 'undefined' ? a : 0;

    var height = 0,
        windowWidth = $(window).width();

    if (windowWidth > breakpoint) {
      $(elem).each(function() {
        var thisHeight = $(this).outerHeight();
        
        if (thisHeight > height) {
          height = thisHeight;
        }
      });
    }

    $(elem).outerHeight(height);
  }
});
