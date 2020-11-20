/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("jQuery(document).ready(function ($) {\n  /*\n   * Utilities\n   */\n  // Heightmatcher\n  function heightmatcher(elem, breakpoint) {\n    breakpoint = typeof a !== \"undefined\" ? a : 0;\n    var height = 0,\n        windowWidth = $(window).width();\n\n    if (windowWidth > breakpoint) {\n      $(elem).each(function () {\n        var thisHeight = $(this).outerHeight();\n\n        if (thisHeight > height) {\n          height = thisHeight;\n        }\n      });\n    }\n\n    $(elem).outerHeight(height);\n  } // Sticky Menu\n\n\n  function sticky_menu(elem) {\n    var nav = $(elem);\n\n    if (nav.length) {\n      var navTop = nav.offset().top,\n          navContainer = nav.parent(),\n          navContainerHeight = navContainer.outerHeight();\n      $(document).on(\"scroll\", function (e) {\n        var scrollPos = $(document).scrollTop();\n\n        if (scrollPos >= navTop) {\n          nav.addClass(\"sticky\");\n          navContainer.height(navContainerHeight);\n        } else {\n          nav.removeClass(\"sticky\");\n          navContainer.height();\n        }\n      });\n    }\n  }\n\n  $(window).on(\"load, resize\", sticky_menu(\".sticky-nav\"));\n  /*\n   * Woocommerce\n   */\n\n  $(\".woocommerce-review-link\").on(\"click\", function (e) {\n    e.preventDefault();\n    var anchorToScroll = $(\".woocommerce-tabs\"),\n        scrollToPoint = $(anchorToScroll).offset().top;\n    $(\"body\").animate({\n      scrollTop: scrollToPoint - 60\n    });\n  });\n  /*\n   * Carousel\n   */\n\n  var oc = $(\".owl-carousel\");\n  var ocOptions = oc.data(\"carousel-options\");\n  var defaults = {\n    items: 1,\n    loop: true,\n    autoplay: true,\n    autoplayHoverPause: true,\n    checkVisible: false\n  };\n  oc.owlCarousel($.extend(defaults, ocOptions));\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9hc3NldHMvanMvbWFpbi5qcy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9tYWluLmpzPzMyNDEiXSwic291cmNlc0NvbnRlbnQiOlsialF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoJCkge1xuICAvKlxuICAgKiBVdGlsaXRpZXNcbiAgICovXG4gIC8vIEhlaWdodG1hdGNoZXJcbiAgZnVuY3Rpb24gaGVpZ2h0bWF0Y2hlcihlbGVtLCBicmVha3BvaW50KSB7XG4gICAgYnJlYWtwb2ludCA9IHR5cGVvZiBhICE9PSBcInVuZGVmaW5lZFwiID8gYSA6IDA7XG4gICAgdmFyIGhlaWdodCA9IDAsXG4gICAgICAgIHdpbmRvd1dpZHRoID0gJCh3aW5kb3cpLndpZHRoKCk7XG5cbiAgICBpZiAod2luZG93V2lkdGggPiBicmVha3BvaW50KSB7XG4gICAgICAkKGVsZW0pLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICB2YXIgdGhpc0hlaWdodCA9ICQodGhpcykub3V0ZXJIZWlnaHQoKTtcblxuICAgICAgICBpZiAodGhpc0hlaWdodCA+IGhlaWdodCkge1xuICAgICAgICAgIGhlaWdodCA9IHRoaXNIZWlnaHQ7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH1cblxuICAgICQoZWxlbSkub3V0ZXJIZWlnaHQoaGVpZ2h0KTtcbiAgfSAvLyBTdGlja3kgTWVudVxuXG5cbiAgZnVuY3Rpb24gc3RpY2t5X21lbnUoZWxlbSkge1xuICAgIHZhciBuYXYgPSAkKGVsZW0pO1xuXG4gICAgaWYgKG5hdi5sZW5ndGgpIHtcbiAgICAgIHZhciBuYXZUb3AgPSBuYXYub2Zmc2V0KCkudG9wLFxuICAgICAgICAgIG5hdkNvbnRhaW5lciA9IG5hdi5wYXJlbnQoKSxcbiAgICAgICAgICBuYXZDb250YWluZXJIZWlnaHQgPSBuYXZDb250YWluZXIub3V0ZXJIZWlnaHQoKTtcbiAgICAgICQoZG9jdW1lbnQpLm9uKFwic2Nyb2xsXCIsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIHZhciBzY3JvbGxQb3MgPSAkKGRvY3VtZW50KS5zY3JvbGxUb3AoKTtcblxuICAgICAgICBpZiAoc2Nyb2xsUG9zID49IG5hdlRvcCkge1xuICAgICAgICAgIG5hdi5hZGRDbGFzcyhcInN0aWNreVwiKTtcbiAgICAgICAgICBuYXZDb250YWluZXIuaGVpZ2h0KG5hdkNvbnRhaW5lckhlaWdodCk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgbmF2LnJlbW92ZUNsYXNzKFwic3RpY2t5XCIpO1xuICAgICAgICAgIG5hdkNvbnRhaW5lci5oZWlnaHQoKTtcbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxuICB9XG5cbiAgJCh3aW5kb3cpLm9uKFwibG9hZCwgcmVzaXplXCIsIHN0aWNreV9tZW51KFwiLnN0aWNreS1uYXZcIikpO1xuICAvKlxuICAgKiBXb29jb21tZXJjZVxuICAgKi9cblxuICAkKFwiLndvb2NvbW1lcmNlLXJldmlldy1saW5rXCIpLm9uKFwiY2xpY2tcIiwgZnVuY3Rpb24gKGUpIHtcbiAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgdmFyIGFuY2hvclRvU2Nyb2xsID0gJChcIi53b29jb21tZXJjZS10YWJzXCIpLFxuICAgICAgICBzY3JvbGxUb1BvaW50ID0gJChhbmNob3JUb1Njcm9sbCkub2Zmc2V0KCkudG9wO1xuICAgICQoXCJib2R5XCIpLmFuaW1hdGUoe1xuICAgICAgc2Nyb2xsVG9wOiBzY3JvbGxUb1BvaW50IC0gNjBcbiAgICB9KTtcbiAgfSk7XG4gIC8qXG4gICAqIENhcm91c2VsXG4gICAqL1xuXG4gIHZhciBvYyA9ICQoXCIub3dsLWNhcm91c2VsXCIpO1xuICB2YXIgb2NPcHRpb25zID0gb2MuZGF0YShcImNhcm91c2VsLW9wdGlvbnNcIik7XG4gIHZhciBkZWZhdWx0cyA9IHtcbiAgICBpdGVtczogMSxcbiAgICBsb29wOiB0cnVlLFxuICAgIGF1dG9wbGF5OiB0cnVlLFxuICAgIGF1dG9wbGF5SG92ZXJQYXVzZTogdHJ1ZSxcbiAgICBjaGVja1Zpc2libGU6IGZhbHNlXG4gIH07XG4gIG9jLm93bENhcm91c2VsKCQuZXh0ZW5kKGRlZmF1bHRzLCBvY09wdGlvbnMpKTtcbn0pOyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./assets/js/main.js\n");

/***/ }),

/***/ "./assets/sass/main.scss":
/*!*******************************!*\
  !*** ./assets/sass/main.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9hc3NldHMvc2Fzcy9tYWluLnNjc3MuanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvc2Fzcy9tYWluLnNjc3M/NzkwMSJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./assets/sass/main.scss\n");

/***/ }),

/***/ 0:
/*!*********************************************************!*\
  !*** multi ./assets/js/main.js ./assets/sass/main.scss ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./assets/js/main.js */"./assets/js/main.js");
module.exports = __webpack_require__(/*! ./assets/sass/main.scss */"./assets/sass/main.scss");


/***/ })

/******/ });