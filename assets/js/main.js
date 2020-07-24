jQuery(document).ready(function($) {
  /*
  * Utilities
  */
  
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

  /*
  * Woocommerce
  */
  $('.woocommerce-review-link').on('click', function(e) {
    e.preventDefault();

    var anchorToScroll = $('.woocommerce-tabs'),
        scrollToPoint = $(anchorToScroll).offset().top;

    $('body').animate({
      scrollTop: (scrollToPoint - 60)
    });
  });

  /*
  * Carousel
  */
  var oc = $('.owl-carousel');
  var ocOptions = oc.data('carousel-options');
  var defaults = {
    items: 1,
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    checkVisible: false
  }

  oc.owlCarousel( $.extend( defaults, ocOptions) );
});
