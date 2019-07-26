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

  function rowCounter() {
    var offsets = {},
        count = 0,
        offset = 1;
    
    $('.products .product').each(function(index, el) {
      var itemOffset = $(this).offset().top;
      
      if (itemOffset > offset) {
        offset = itemOffset;
        count = 1;
      }
      
      offsets[itemOffset] = count++;
    });

    count = 0;

    var productsPerRow = offsets[Object.keys(offsets)[0]];

    $.each(offsets, function(index, el) {
      var elemEq = productsPerRow * count,
          productLine = null,
          productLine = $('.product').slice(elemEq, (elemEq + productsPerRow))
          height = 0;

      $.each(productLine, function(ind, elem) {
        var thisIndex = $(elem).index(),
            thisHeight = $(elem).find('h2').outerHeight();

        if (thisHeight > height) {
          height = thisHeight;
        }
      });

      $.each(productLine, function(ind, elem) {
        $(elem).find('h2').outerHeight(height);
      })
      
      count++;
    });
  }

  rowCounter();
  $(window).on('resize', rowCounter);

	$('.woocommerce-review-link').on('click', function(e) {
		e.preventDefault();

		var anchorToScroll = $('.woocommerce-tabs'),
        scrollToPoint = $(anchorToScroll).offset().top;

		$('body').animate({
			scrollTop: (scrollToPoint - 60)
		});
	});

  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true
  });

  var owl = $('.owl-carousel');
  $('.custom-carousel .carousel-control-prev, #accreditations .carousel-control-prev').on('click', function(e) {
    e.preventDefault();
    owl.trigger('prev.owl.carousel');
  });

  $('.custom-carousel .carousel-control-next, #accreditations .carousel-control-next').on('click', function(e) {
    e.preventDefault();
    owl.trigger('next.owl.carousel');
  });

  /*
  * Mobile Header
  */
  function navHeightFn() {

    var nav = $('header.main-header'),
        navHeight = nav.outerHeight(),
        prevScroll = 0;

    if ($(window).width() < 992) {
      $('body').css('padding-top', (navHeight + 30));

      $(window).on('scroll', function(e) {
          var getScroll = $(this).scrollTop();
          $('body').css('padding-top', (navHeight + 30));

          if (getScroll > navHeight) {
            if (prevScroll < getScroll) {
              nav.css('top', -navHeight);
            } else {
              nav.css('top', 0);
            }
          }

          prevScroll = getScroll;
      });
    } else {
      $('body').css('padding-top', 0);
    }
  }

  navHeightFn();
  $(window).on('resize', navHeightFn);

  /*
  * Shortlist
  */

  // Populate selected
  function wishlist_data_refresh() {
    var wishlist = localStorage.getItem('wishlist');

    if (wishlist) {
      var list = JSON.parse(wishlist);

      $.each(list, function(index, el) {
        var lookfor = $('.wishlist[data-wishlist="'+el+'"]');

        if (lookfor.length > 0) {
          lookfor.addClass('active');
        }

        return;
      });
    }

    // Populate list
    var data = {
      action: 'wishlist',
      data: wishlist
    };

    $.post(ajax.url, data, function(data, status) {
      if (data) {
        $('.wishlist-data').html(data);
      }
    });
  }

  wishlist_data_refresh();

  // Handle adding/removing shortlist items
  $('body').on('click', '[data-wishlist]', function(e){
    e.preventDefault();

    var wishlist = localStorage.getItem('wishlist'),
        product = $(this).data('wishlist'),
        newList = [],
        list = JSON.parse(wishlist);

    if (wishlist) {
      if (list.indexOf(product) > -1) {
        var list = list.filter(function(value, index, arr){
          return value !== product;
        });
        localStorage.setItem('wishlist', JSON.stringify(list));
      } else {
        list.push(product);
        localStorage.setItem('wishlist', JSON.stringify(list));
      }
    } else {
      newList.push(product);
      localStorage.setItem('wishlist', JSON.stringify(newList));
    }

    $(this).toggleClass('active');
    wishlist_data_refresh();
  });

  /*
  * Widgets
  */
  $('.rating-widget label').on('click', function() {
    if ($(this).find('input').is(':checked')) {
      $('.rating-widget').removeClass('active');
      $('.rating-widget label').removeClass('selected');
      $(this).find('input').removeAttr('checked');
    } else {
      $('.rating-widget').addClass('active');
      $('.rating-widget label').removeClass('selected');
      $(this).addClass('selected');
      $(this).find('input').attr('checked', 'checked');
    }
    
    $( document.body ).trigger('rating_filter_change', $(this).find('input:checked').val());
  });

  /*
  * Mini Cart
  */

  // Handle add to cart
  $('body').on('click', '.single_add_to_cart_button, .product_type_simple.add_to_cart_button', function(e) {
    e.preventDefault();

    var id = '';
    var qty = 1;
    var button = $(this);
    var variation = null;

    if (button.data('product_id') || button.attr('value')) {
      if (button.data('product_id')) {
        id = button.data('product_id');
      } else {
        id = button.attr('value');
      }
    } else {
      id = $('input[name="add-to-cart"]').val();
    }

    if ($('input.variation_id').length > 0) {
      variation = $('input.variation_id').val();
    }

    if (button.data('quantity')) {
      qty = button.data('quantity');
    } else {
      qty = $('.summary .cart .qty').val();
    }

    var data = {
      action: 'forza_add_to_cart',
      product_id: id,
      quantity: qty,
      variation_id: variation,
    };

    button.addClass('loading');

    $.post(ajax.url, data, function (response) {
      if (!response) {
        return;
      }

      if (response.error) {
        alert("Error adding product to cart.");
        button.removeClass('loading');
        return;
      }

      if (response) {
        var url = woocommerce_params.wc_ajax_url;
        url = url.replace("%%endpoint%%", "get_refreshed_fragments");
        
        $.post(url, function (data, status) {
          $(".cart-fixed .cart-data").html(data.fragments["div.widget_shopping_cart_content"]);
          
          if (data.fragments) {
            $.each(data.fragments, function (key, value) {
              $(key).replaceWith(value);
            });
          }

          $('#cartModal').modal('show');
          // $('.overlay-body').fadeIn(200, function() {
          //   $('.cart-fixed').addClass('active');
          // });

          $("body").trigger("wc_fragments_refreshed");
          
          button.removeClass('loading');
        });
      }
    });
  });

  // Handle cart updates to quantity in mini cart
  $('body').on('click', '[data-cart-update]', function(e) {
    e.preventDefault();

    var products = [];

    $('.cart_list li').each(function(index, el) {
      products.push({
        product: $(this).data('product-id'),
        quantity: $(this).find('.qty').val()
      });
    });

    var button = $('[data-cart-update]'),
        data = {
          action: 'update_cart',
          items: products,
        };

    button.addClass('loading');

    $.post(ajax.url, data, function(response) {
      if (!response) {
        return;
      }


      if (response.error) {
        alert("Custom Message");
        button.removeClass('loading');
        return;
      }

      if (response.data) {
        alert(response.data);
        button.removeClass('loading');
        return;
      }

      if (response) {
        var url = woocommerce_params.wc_ajax_url;
        url = url.replace("%%endpoint%%", "get_refreshed_fragments");
        
        $.post(url, function (data, status) {
          $(".cart-fixed .cart-data").html(data.fragments["div.widget_shopping_cart_content"]);
          
          if (data.fragments) {
            $.each(data.fragments, function (key, value) {
              $(key).replaceWith(value);
            });
          }

          $('.overlay-body').fadeIn(200, function() {
            $('.cart-fixed').addClass('active');
          });

          $("body").trigger("wc_fragments_refreshed");
          
          button.removeClass('loading');
        });
      }
    });
  });

  /*
  * Screens
  */

  // Show screens on related menu click
  $('[data-fixed-screen]').on('click', function(e) {
    e.preventDefault();

    var screen = $(this).data('fixed-screen');

    $('.overlay-body').fadeIn(200, function() {
      $('.' + screen).addClass('active');
    });
  });

  // Remove screens on overlay click
  $('.overlay-body, [data-close]').on('click', function(e) {
    $('.fixed-screen').removeClass('active');
    $('.overlay-body').delay(500).fadeOut(200);
  });

  /*
  * Category Descriptions
  */
  var categoryContainer = $('[data-read-more-container]'),
      categoryContainerHeight = categoryContainer.outerHeight();

  if (categoryContainerHeight > 50) {
    categoryContainer.outerHeight(50);
  }

  $('[data-read-more]').on('click', function(e) {
    e.preventDefault();

    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $(this).parent().find('[data-read-more-container]').outerHeight(categoryContainerHeight);
    } else {
      $(this).parent().find('[data-read-more-container]').outerHeight(50);
    }
  });

  // Clear
  $('[data-clear-filters]').on('click', function(e) {
    e.preventDefault();

    $('.widget input').removeAttr('checked');
  });

  /*
  * Footer Collapsable Menus
  */
  if ($(window).width() < 768) {
    $('[data-mobile-collapse]').on('click', function(e) {
      e.preventDefault();

      $(this).next('.footer-menu-column').slideToggle(200);
    });
  }

  $('.product-tab-title').on('click', function(e) {
    $(this).toggleClass('active').next('.woocommerce-Tabs-panel-mobile').slideToggle(400);
  });
});