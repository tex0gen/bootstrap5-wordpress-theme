// import heightMatcher from './utilities/heightMatcher';
// import StickyMenu from './components/stickyMenu';
import Swiper, { Autoplay } from 'swiper';

Swiper.use([Autoplay]);

new Swiper('.slider', {
	slidesPerView: 1,
	centeredSlides: true,
	effect: 'slide',
	loop: true,
	autoplay: {
		delay: 5000,
	},
});

// OWL CAROUSEL REMOVED => This has been kept for the options to be translated for Swiper
// const ocOptions = oc.data('carousel-options');
// const defaults = {
//   items: 1,
//   loop: true,
//   autoplay: true,
//   autoplayHoverPause: true,
//   checkVisible: false
// };
