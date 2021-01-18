/*
Sticky Nav
Description: Makes the navigation sticky once the user has scrolled to it.
Usage: StickyMenu(elementClass);
*/
const StickyMenu = (elem) => {
	const stickyNav = document.getElementsByClassName(elem);

	if (stickyNav.length > 1) {
		console.warn('Multiple Sticky Navs found. Please define 1 only.'); // eslint-disable-line
	} else if (stickyNav.length === 0) {
		console.warn('Sticky Nav element not found'); // eslint-disable-line
	} else {
		const nav = stickyNav[0],
			navContainer = nav.parentElement;

		let navTop = nav.offsetTop,
			navContainerHeight = navContainer.offsetHeight + 'px';

		window.addEventListener(
			'resize',
			() => {
				navTop = nav.offsetTop;
				navContainerHeight = navContainer.offsetHeight + 'px';
			},
			false
		);

		window.addEventListener(
			'scroll',
			() => {
				const top = window.scrollY;

				if (top >= navTop) {
					nav.classList.add('sticky');
					navContainer.style.height = navContainerHeight;
				} else {
					nav.classList.remove('sticky');
					navContainer.style.height = '';
				}
			},
			false
		);
	}
};

export default StickyMenu;
