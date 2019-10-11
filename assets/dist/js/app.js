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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_menu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/menu */ "./assets/js/components/menu.js");
/* harmony import */ var _components_topbar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/topbar */ "./assets/js/components/topbar.js");
//Components



/***/ }),

/***/ "./assets/js/components/banner.js":
/*!****************************************!*\
  !*** ./assets/js/components/banner.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Banner; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Banner = function Banner() {
  _classCallCheck(this, Banner);

  var animateBanner = function animateBanner() {
    var navBar = document.querySelector('#site-navigation'),
        overlay = navBar.querySelector('.overlay'),
        overlay_2 = navBar.querySelector('.overlay_2');
    var layers = [overlay, overlay_2];
    layers.forEach(function (val, i) {
      setTimeout(function () {
        val.classList.add('toggled');
      }, 400 * i);
    });
  };

  return animateBanner();
};



/***/ }),

/***/ "./assets/js/components/menu.js":
/*!**************************************!*\
  !*** ./assets/js/components/menu.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Menu; });
/* harmony import */ var _banner__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./banner */ "./assets/js/components/banner.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }



var Menu = function Menu() {
  _classCallCheck(this, Menu);

  new _banner__WEBPACK_IMPORTED_MODULE_0__["default"]();
  return;
};


new Menu();

/***/ }),

/***/ "./assets/js/components/topbar.js":
/*!****************************************!*\
  !*** ./assets/js/components/topbar.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return TopBar; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var TopBar = function TopBar() {
  _classCallCheck(this, TopBar);

  var toggleTopbar = function toggleTopbar() {
    var topbar = document.querySelector('.topbar');
    setTimeout(function () {
      topbar.classList.add('toggled');
    }, 200);
  };

  return toggleTopbar();
};


new TopBar();

/***/ }),

/***/ "./assets/sass/style.scss":
/*!********************************!*\
  !*** ./assets/sass/style.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/sass/vendor.scss":
/*!*********************************!*\
  !*** ./assets/sass/vendor.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************************!*\
  !*** multi ./assets/js/app.js ./assets/sass/style.scss ./assets/sass/vendor.scss ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\Xampp\htdocs\wp-gamekoopjes\wp-content\themes\gamekoopjes\assets\js\app.js */"./assets/js/app.js");
__webpack_require__(/*! E:\Xampp\htdocs\wp-gamekoopjes\wp-content\themes\gamekoopjes\assets\sass\style.scss */"./assets/sass/style.scss");
module.exports = __webpack_require__(/*! E:\Xampp\htdocs\wp-gamekoopjes\wp-content\themes\gamekoopjes\assets\sass\vendor.scss */"./assets/sass/vendor.scss");


/***/ })

/******/ });
//# sourceMappingURL=app.js.map