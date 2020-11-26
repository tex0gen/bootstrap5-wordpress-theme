const heightMatcher = (elem, breakpoint) => {
	breakpoint = typeof breakpoint === 'undefined' ? 0 : breakpoint;

	const elements = document.querySelectorAll(elem);
	const windowWidth = document.body.clientWidth;
	let height = 0;

	if (windowWidth > breakpoint) {
		elements.forEach((el) => {
			const thisHeight = el.clientHeight;

			if (thisHeight > height) {
				height = thisHeight;
			}
		});
	}

	let i;
	for (i = 0; i < elements.length; i++) {
		elements[i].style.height = height + 'px';
	}
};

export default heightMatcher;