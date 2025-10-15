/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/custom-swiper-init.js":
/*!*****************************************!*\
  !*** ./assets/js/custom-swiper-init.js ***!
  \*****************************************/
/***/ (() => {

eval("{document.addEventListener('DOMContentLoaded', function () {\n  var swiperHero = new Swiper('.hero-slider-inner', {\n    loop: true,\n    autoplay: {\n      delay: 5000,\n      disableOnInteraction: false\n    },\n    pagination: {\n      el: '.hero-slider-pagination',\n      clickable: true\n    }\n  });\n  // ---- Bestsellers sliders (one Swiper per pane)\n  document.querySelectorAll('.bestsellers-slider').forEach(function (el) {\n    var next = el.querySelector('.swiper-button-next');\n    var prev = el.querySelector('.swiper-button-prev');\n    var pagination = el.querySelector('.swiper-pagination');\n    new Swiper(el, {\n      slidesPerView: 4,\n      spaceBetween: 20,\n      navigation: {\n        nextEl: next,\n        prevEl: prev\n      },\n      pagination: {\n        el: pagination,\n        clickable: true\n      },\n      watchOverflow: true,\n      // hide nav if <= slidesPerView\n      observer: true,\n      observeParents: true,\n      // re-init when tab becomes visible\n      breakpoints: {\n        1024: {\n          slidesPerView: 4,\n          spaceBetween: 20\n        },\n        768: {\n          slidesPerView: 3,\n          spaceBetween: 20\n        },\n        480: {\n          slidesPerView: 2,\n          spaceBetween: 15\n        },\n        320: {\n          slidesPerView: 1,\n          spaceBetween: 10\n        }\n      }\n    });\n  });\n});\n\n//# sourceURL=webpack://equinavia/./assets/js/custom-swiper-init.js?\n}");

/***/ }),

/***/ "./assets/js/custom.js":
/*!*****************************!*\
  !*** ./assets/js/custom.js ***!
  \*****************************/
/***/ (() => {

eval("{document.addEventListener('DOMContentLoaded', function () {\n  // mobile menu toggle\n  var menuToggle = document.querySelector('.menu-toggle');\n  var navMenu = document.querySelector('.nav-menu');\n  if (menuToggle && navMenu) {\n    menuToggle.addEventListener('click', function () {\n      var expanded = this.getAttribute('aria-expanded') === 'true' || false;\n      this.setAttribute('aria-expanded', !expanded);\n      navMenu.classList.toggle('open');\n    });\n  }\n\n  // search overlay toggle\n  var searchToggle = document.querySelectorAll('.search-toggle');\n  var searchOverlay = document.getElementById('search-overlay');\n  var searchClose = document.querySelector('.search-close');\n  if (searchToggle && searchOverlay) {\n    searchToggle.forEach(function (btn) {\n      btn.addEventListener('click', function (e) {\n        e.preventDefault();\n        searchOverlay.classList.remove('hidden');\n        searchOverlay.setAttribute('aria-hidden', 'false');\n      });\n    });\n  }\n  if (searchClose) {\n    searchClose.addEventListener('click', function () {\n      searchOverlay.classList.add('hidden');\n      searchOverlay.setAttribute('aria-hidden', 'true');\n    });\n  }\n\n  // close search on outside click\n  if (searchOverlay) {\n    searchOverlay.addEventListener('click', function (e) {\n      if (e.target === this) {\n        searchOverlay.classList.add('hidden');\n        searchOverlay.setAttribute('aria-hidden', 'true');\n      }\n    });\n  }\n});\n\n//# sourceURL=webpack://equinavia/./assets/js/custom.js?\n}");

/***/ }),

/***/ "./assets/js/faq-accordion.js":
/*!************************************!*\
  !*** ./assets/js/faq-accordion.js ***!
  \************************************/
/***/ (() => {

eval("{document.addEventListener('DOMContentLoaded', function () {\n  var faqQuestions = document.querySelectorAll('.faq-question');\n  faqQuestions.forEach(function (question) {\n    question.addEventListener('click', function () {\n      var faqAnswer = question.nextElementSibling;\n\n      // Toggle the 'active' class on the question to rotate the icon\n      question.classList.toggle('active');\n\n      // Toggle the height of the answer div\n      if (faqAnswer.style.maxHeight) {\n        faqAnswer.style.maxHeight = null;\n        faqAnswer.style.padding = '0 20px';\n      } else {\n        faqAnswer.style.maxHeight = faqAnswer.scrollHeight + 'px';\n        faqAnswer.style.padding = '20px';\n      }\n    });\n  });\n});\n\n//# sourceURL=webpack://equinavia/./assets/js/faq-accordion.js?\n}");

/***/ }),

/***/ "./assets/js/fix-admin-bar.js":
/*!************************************!*\
  !*** ./assets/js/fix-admin-bar.js ***!
  \************************************/
/***/ (() => {

eval("{document.addEventListener('DOMContentLoaded', function () {\n  // Fixes the 'role=\"group\"' error on <li> elements\n  var adminBarListItems = document.querySelectorAll('li[role=\"group\"]');\n  adminBarListItems.forEach(function (item) {\n    item.removeAttribute('role');\n  });\n\n  // Fixes the 'aria-required-children' error on <ul> elements\n  var adminBarMenus = document.querySelectorAll('ul[role=\"menu\"]');\n  adminBarMenus.forEach(function (menu) {\n    menu.removeAttribute('role');\n  });\n\n  // Fixes the 'Required ARIA parents role not present' error on <a> elements\n  var menuItems = document.querySelectorAll('a[role=\"menuitem\"]');\n  menuItems.forEach(function (item) {\n    item.removeAttribute('role');\n  });\n\n  // Fixes the 'Required ARIA parents role not present' error on <div> elements\n  var emptyItems = document.querySelectorAll('div[role=\"menuitem\"]');\n  emptyItems.forEach(function (item) {\n    item.removeAttribute('role');\n  });\n});\n\n//# sourceURL=webpack://equinavia/./assets/js/fix-admin-bar.js?\n}");

/***/ }),

/***/ "./assets/js/index.js":
/*!****************************!*\
  !*** ./assets/js/index.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _custom_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./custom.js */ \"./assets/js/custom.js\");\n/* harmony import */ var _custom_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_custom_js__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _custom_swiper_init_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./custom-swiper-init.js */ \"./assets/js/custom-swiper-init.js\");\n/* harmony import */ var _custom_swiper_init_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_custom_swiper_init_js__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _faq_accordion_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./faq-accordion.js */ \"./assets/js/faq-accordion.js\");\n/* harmony import */ var _faq_accordion_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_faq_accordion_js__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _fix_admin_bar_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./fix-admin-bar.js */ \"./assets/js/fix-admin-bar.js\");\n/* harmony import */ var _fix_admin_bar_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_fix_admin_bar_js__WEBPACK_IMPORTED_MODULE_3__);\n\n\n\n\n\n//# sourceURL=webpack://equinavia/./assets/js/index.js?\n}");

/***/ }),

/***/ "./assets/scss/main.scss":
/*!*******************************!*\
  !*** ./assets/scss/main.scss ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://equinavia/./assets/scss/main.scss?\n}");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_require__("./assets/js/index.js");
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/scss/main.scss");
/******/ 	
/******/ })()
;