/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';

	__webpack_require__(1);

	__webpack_require__(2);
	__webpack_require__(3);
	__webpack_require__(4);
	__webpack_require__(5);
	__webpack_require__(6);

	// Globals
	window.toggleWidget = function toggleWidget(name) {
	    if (document.body.dataset.activeWidget == name) {
	        closeWidgets();
	    } else {
	        document.body.dataset.activeWidget = name;
	    }
	};

	window.closeWidgets = function closeWidgets() {
	    document.body.dataset.activeWidget = '';
	};

	// Init
	//GalleryHelper.bindImages();
	//FormHelper.init();
	FacebookHelper.populateCalendar();
	MenuHelper.bindNavItems();

/***/ },
/* 1 */
/***/ function(module, exports) {

	// removed by extract-text-webpack-plugin

/***/ },
/* 2 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var lastSenderName = '';

	var DebugHelper = function () {
	    function DebugHelper() {
	        _classCallCheck(this, DebugHelper);
	    }

	    _createClass(DebugHelper, null, [{
	        key: 'log',

	        /**
	         * Logs a message
	         *
	         * @param {String} message
	         * @param {Object} sender
	         * @param {Number} verbosity
	         */
	        value: function log(message, sender, verbosity) {
	            if (verbosity == 0) {
	                this.error('Verbosity cannot be set to 0', this);
	            } else if (!verbosity) {
	                verbosity = 1;
	            }

	            if (this.verbosity >= verbosity) {
	                console.log(this.parseSender(sender), this.getDateString(), message);
	            }
	        }

	        /**
	         * Gets the date string
	         *
	         * @returns {String} date
	         */

	    }, {
	        key: 'getDateString',
	        value: function getDateString() {
	            var date = new Date();

	            var output = '(' + date.getFullYear() + '/' + (date.getMonth() + 1) + '/' + date.getDate() + '-' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds() + ')';

	            return output;
	        }

	        /**
	         * Parse sender
	         *
	         * @param {Object} sender
	         *
	         * @returns {String} name
	         */

	    }, {
	        key: 'parseSender',
	        value: function parseSender(sender) {
	            var senderName = '';

	            if (sender) {
	                if (typeof sender === 'function') {
	                    senderName += sender.name;
	                } else if (sender.constructor) {
	                    senderName += sender.constructor.name;
	                } else {
	                    senderName += sender.toString();
	                }

	                senderName;
	            }

	            if (senderName == lastSenderName) {
	                senderName = '';
	            } else {
	                lastSenderName = senderName;
	                senderName = '\n' + senderName + '\n----------\n';
	            }

	            return senderName;
	        }

	        /**
	         * Throws an error
	         *
	         * @param {String} message
	         * @param {Object} sender
	         */

	    }, {
	        key: 'error',
	        value: function error(message, sender) {
	            throw new Error(this.parseSender(sender) + ' ' + this.getDateString() + ' ' + message);
	        }

	        /**
	         * Shows a warning
	         */

	    }, {
	        key: 'warning',
	        value: function warning(message, sender) {
	            console.log(this.parseSender(sender), this.getDateString(), message);
	            console.trace();
	        }
	    }]);

	    return DebugHelper;
	}();

	window.debug = DebugHelper;

/***/ },
/* 3 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var MenuHelper = function () {
	    function MenuHelper() {
	        _classCallCheck(this, MenuHelper);
	    }

	    _createClass(MenuHelper, null, [{
	        key: 'bindNavItem',
	        value: function bindNavItem(navItem) {
	            navItem.addEventListener('click', function () {
	                MenuHelper.focusItem(navItem.dataset.id);

	                closeWidgets();
	            });
	        }
	    }, {
	        key: 'focusItem',
	        value: function focusItem(id) {
	            var galleryItem = document.querySelector('.menu-gallery .menu-item#_' + id);

	            galleryItem.focus();
	        }
	    }, {
	        key: 'bindNavItems',
	        value: function bindNavItems() {
	            var navItems = document.querySelectorAll('.menu-page .menu-nav .menu-item');

	            for (var i = 0; i < navItems.length; i++) {
	                MenuHelper.bindNavItem(navItems[i]);
	            }
	        }
	    }]);

	    return MenuHelper;
	}();

	window.MenuHelper = MenuHelper;

/***/ },
/* 4 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var token = '927807870680835|0b5445c0ab8a3689ed727ab5bed0da1c';

	var FacebookHelper = function () {
	    function FacebookHelper() {
	        _classCallCheck(this, FacebookHelper);
	    }

	    _createClass(FacebookHelper, null, [{
	        key: 'apiCall',
	        value: function apiCall(url, query) {
	            var _this = this;

	            return new Promise(function (resolve, reject) {
	                var xhr = new XMLHttpRequest();
	                xhr.open('GET', 'https://graph.facebook.com/sweetsurrenderdk/' + url + '?access_token=' + token + query);
	                xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

	                xhr.send();

	                xhr.onreadystatechange = function () {
	                    var DONE = 4;
	                    var OK = 200;
	                    var NOT_MODIFIED = 304;

	                    if (xhr.readyState === DONE) {
	                        if (xhr.status == OK || xhr.status == NOT_MODIFIED) {
	                            var response = xhr.responseText;

	                            if (response && response != 'OK') {
	                                try {
	                                    response = JSON.parse(response);
	                                } catch (e) {
	                                    debug.log('Response: ' + response, _this);
	                                    debug.warning(e, _this);
	                                }
	                            }

	                            resolve(response);
	                        } else {
	                            reject(new Error(xhr.responseText));
	                        }
	                    }
	                };
	            });
	        }
	    }, {
	        key: 'populateCalendar',
	        value: function populateCalendar() {
	            var eventsElement = document.querySelector('.calendar-container .calendar-events');
	            var eventElementTemplate = eventsElement.querySelector('.calendar-event');

	            var autoLinker = new Autolinker();

	            FacebookHelper.apiCall('events', '&fields=cover,name,start_time,end_time,description').then(function (response) {
	                var upcoming = 0;
	                var thisDate = new Date();

	                for (var i = 0; i < response.data.length; i++) {
	                    var evt = response.data[i];
	                    var eventElement = eventElementTemplate.cloneNode(true);
	                    var description = evt.description;

	                    var start = new Date(evt.start_time);
	                    var end = new Date(evt.end_time);

	                    if (start > thisDate) {
	                        upcoming++;
	                    }

	                    eventElement.dataset.id = evt.id;

	                    if (evt.cover) {
	                        eventElement.querySelector('.cover').setAttribute('src', evt.cover.source);
	                    }

	                    description = autoLinker.link(description);

	                    eventElement.querySelector('.name').innerHTML = evt.name;
	                    eventElement.querySelector('.date').innerHTML = start.getDate() + '/' + (start.getMonth() + 1) + '/' + start.getFullYear();
	                    eventElement.querySelector('.description').innerHTML = description;

	                    var hours = eventElement.querySelector('.hours');

	                    hours.innerHTML = '';

	                    if (!isNaN(start.getHours())) {
	                        if (start.getHours().toString().length != 2) {
	                            hours.innerHTML += '0' + start.getHours();
	                        } else {
	                            hours.innerHTML += start.getHours();
	                        }

	                        if (start.getMinutes().toString().length != 2) {
	                            hours.innerHTML += ':0' + start.getMinutes();
	                        } else {
	                            hours.innerHTML += ':' + start.getMinutes();
	                        }

	                        if (!isNaN(end.getHours())) {
	                            if (end.getHours().toString().length != 2) {
	                                hours.innerHTML += ' - 0' + end.getHours();
	                            } else {
	                                hours.innerHTML += ' - ' + end.getHours();
	                            }

	                            if (end.getMinutes().toString().length != 2) {
	                                hours.innerHTML += ':0' + end.getMinutes();
	                            } else {
	                                hours.innerHTML += ':' + end.getMinutes();
	                            }
	                        }
	                    }

	                    var link = eventElement.querySelector('.fb-link');

	                    link.setAttribute('href', link.getAttribute('href') + evt.id);

	                    eventsElement.appendChild(eventElement);
	                }

	                eventElementTemplate.parentElement.removeChild(eventElementTemplate);

	                if (upcoming > 0) {
	                    document.querySelector('.icon-calendar-new-events').innerHTML = upcoming.toString();
	                } else {
	                    document.querySelector('.icon-calendar-new-events').style.display = 'none';
	                }
	            }).catch(function (e) {
	                console.log(e);
	            });
	        }
	    }]);

	    return FacebookHelper;
	}();

	window.FacebookHelper = FacebookHelper;

/***/ },
/* 5 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var FormHelper = function () {
	    function FormHelper() {
	        _classCallCheck(this, FormHelper);
	    }

	    _createClass(FormHelper, null, [{
	        key: 'apiCall',
	        value: function apiCall(url, data) {
	            var _this = this;

	            return new Promise(function (resolve, reject) {
	                var xhr = new XMLHttpRequest();
	                xhr.open('POST', url);
	                xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
	                xhr.setRequestHeader('Access-Control-Allow-Origin', location.protocol + '://' + location.hostname);

	                xhr.send();

	                xhr.onreadystatechange = function () {
	                    var DONE = 4;
	                    var OK = 200;
	                    var NOT_MODIFIED = 304;

	                    if (xhr.readyState === DONE) {
	                        if (xhr.status == OK || xhr.status == NOT_MODIFIED) {
	                            var response = xhr.responseText;

	                            if (response && response != 'OK') {
	                                try {
	                                    response = JSON.parse(response);
	                                } catch (e) {
	                                    debug.log('Response: ' + response, _this);
	                                    debug.warning(e, _this);
	                                }
	                            }

	                            resolve(response);
	                        } else {
	                            reject(new Error(xhr.responseText));
	                        }
	                    }
	                };
	            });
	        }
	    }, {
	        key: 'bindForm',
	        value: function bindForm(form) {
	            var _this2 = this;

	            form.addEventListener('submit', function (e) {
	                e.preventDefault();

	                if (form.dataset.disabled) {
	                    return;
	                }

	                var serialized = {};

	                for (var i = 0; i < form.elements.length; i++) {
	                    var element = form.elements[i];

	                    if (element.name) {
	                        serialized[element.name] = element.value;
	                    }
	                }

	                form.querySelector('input[type="submit"').setAttribute('disabled', true);
	                form.dataset.disabled = true;

	                debug.log('Submitting form data...', _this2);

	                FormHelper.apiCall( /*form.getAttribute('action')*/'http://jsonplaceholder.typicode.com/posts', serialized).then(function () {
	                    debug.log('Success!', _this2);
	                    form.querySelector('input[type="submit"').setAttribute('disabled', false);
	                    form.dataset.disabled = false;
	                }).catch(function (e) {
	                    form.dataset.disabled = false;
	                    alert(e);
	                });
	            });
	        }
	    }, {
	        key: 'init',
	        value: function init() {
	            var forms = document.querySelectorAll('form');

	            for (var i = 0; i < forms.length; i++) {
	                this.bindForm(forms[i]);
	            }
	        }
	    }]);

	    return FormHelper;
	}();

	window.FormHelper = FormHelper;

/***/ },
/* 6 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var GalleryHelper = function () {
	    function GalleryHelper() {
	        _classCallCheck(this, GalleryHelper);
	    }

	    _createClass(GalleryHelper, null, [{
	        key: 'bindImages',
	        value: function bindImages() {
	            var images = document.querySelectorAll('section img, section .image');

	            function onClick(e) {
	                e.stopPropagation();

	                var src = this.getAttribute('src');

	                if (!src) {
	                    src = this.style.backgroundImage;

	                    src = src.replace('url(', '').replace(')', '').replace(/\"/gi, "");
	                }

	                GalleryHelper.openModal(src);
	            }

	            if (images) {
	                for (var i = 0; i < images.length; i++) {
	                    var image = images[i];

	                    image.removeEventListener('click', onClick, false);
	                    image.addEventListener('click', onClick, false);
	                }
	            }
	        }
	    }, {
	        key: 'openModal',
	        value: function openModal(src) {
	            // Render elements
	            var modalBackdrop = document.createElement('div');
	            modalBackdrop.className = 'modal-backdrop';

	            var modal = document.createElement('div');
	            modal.className = 'modal';

	            var modalContent = document.createElement('div');
	            modalContent.className = 'modal-content';

	            var modalBody = document.createElement('img');
	            modalBody.className = 'modal-body';
	            modalBody.setAttribute('src', src);

	            // Set up event listeners
	            modalBackdrop.addEventListener('click', function () {
	                modalBackdrop.classList.toggle('active', false);

	                setTimeout(function () {
	                    if (modalBackdrop && modalBackdrop.parentElement) {
	                        modalBackdrop.parentElement.removeChild(modalBackdrop);
	                    }
	                }, 500);
	            });

	            // Parent elements
	            modalBackdrop.appendChild(modal);
	            modal.appendChild(modalContent);
	            modalContent.appendChild(modalBody);
	            document.body.appendChild(modalBackdrop);

	            // Wait a while and set active class
	            setTimeout(function () {
	                modalBackdrop.classList.toggle('active', true);
	            }, 50);

	            return modal;
	        }
	    }]);

	    return GalleryHelper;
	}();

	window.GalleryHelper = GalleryHelper;

/***/ }
/******/ ]);