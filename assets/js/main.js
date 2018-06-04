jQuery(document).ready(function($) {

	$('.woocommerce-review-link').on('click', function(e) {
		e.preventDefault();

		var anchorToScroll = $('.woocommerce-tabs');
		var scrollToPoint = $(anchorToScroll).offset().top;

		$('body').animate({
			scrollTop: (scrollToPoint - 60)
		});
	});


  $(".owl-carousel").owlCarousel({
    items: 4,
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
	
});