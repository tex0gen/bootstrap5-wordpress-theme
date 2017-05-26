jQuery(document).ready(function($) {

	$('.woocommerce-review-link').on('click', function(e) {
		e.preventDefault();

		var anchorToScroll = $('.woocommerce-tabs');
		var scrollToPoint = $(anchorToScroll).offset().top;

		$('body').animate({
			scrollTop: (scrollToPoint - 60)
		});
	});
	
});