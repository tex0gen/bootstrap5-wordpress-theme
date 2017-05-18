jQuery(document).ready(function($) {

	// TODO: Fix this. It only works after second click.
	$('a[href*="#"]').on('click', function(e) {
		e.preventDefault();

		var anchorToScroll = $(this).attr('href');
		var scrollToPoint = $(anchorToScroll).offset().top;

		$('body').animate({
			scrollTop: (scrollToPoint - 60)
		});
	});
});