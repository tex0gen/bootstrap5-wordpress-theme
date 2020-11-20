jQuery(document).ready(function($) {
  /*
   * Utilities
   */

  // Heightmatcher
  function heightmatcher(elem, breakpoint) {
    breakpoint = typeof a !== "undefined" ? a : 0;

    let height = 0,
      windowWidth = $(window).width();

    if (windowWidth > breakpoint) {
      $(elem).each(function() {
        const thisHeight = $(this).outerHeight();

        if (thisHeight > height) {
          height = thisHeight;
        }
      });
    }

    $(elem).outerHeight(height);
  }

  // Sticky Menu
  function sticky_menu(elem) {
    const nav = $(elem);

    if (nav.length) {
      const navTop = nav.offset().top,
        navContainer = nav.parent(),
        navContainerHeight = navContainer.outerHeight();

      $(document).on("scroll", function(e) {
        const scrollPos = $(document).scrollTop();

        if (scrollPos >= navTop) {
          nav.addClass("sticky");
          navContainer.height(navContainerHeight);
        } else {
          nav.removeClass("sticky");
          navContainer.height();
        }
      });
    }
  }

  $(window).on("load, resize", sticky_menu(".sticky-nav"));

  /*
   * Woocommerce
   */
  $(".woocommerce-review-link").on("click", function(e) {
    e.preventDefault();

    const anchorToScroll = $(".woocommerce-tabs"),
      scrollToPoint = $(anchorToScroll).offset().top;

    $("body").animate({
      scrollTop: scrollToPoint - 60
    });
  });

  /*
   * Carousel
   */
  const oc = $(".owl-carousel");
  const ocOptions = oc.data("carousel-options");
  const defaults = {
    items: 1,
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    checkVisible: false
  };

  oc.owlCarousel($.extend(defaults, ocOptions));
});
