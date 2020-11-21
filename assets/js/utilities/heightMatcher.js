const heightMatcher = (elem, breakpoint) => {
  breakpoint = typeof a !== "undefined" ? a : 0;

  let height = 0,
    windowWidth = $(window).width();

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
