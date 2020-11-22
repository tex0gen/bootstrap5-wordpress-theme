const heightMatcher = (elem, breakpoint) => {
	breakpoint = typeof a !== 'undefined' ? a : 0;

  const windowWidth = document.body.clientWidth;
	let height = 0;

	if (windowWidth > breakpoint) {
		$(elem).each(function () {
			const thisHeight = $(this).outerHeight();

			if (thisHeight > height) {
				height = thisHeight;
			}
		});
	}

	$(elem).outerHeight(height);
};

export default heightMatcher;
