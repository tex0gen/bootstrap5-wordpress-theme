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
  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 12000,
    autoplayHoverPause: true
  });
});
