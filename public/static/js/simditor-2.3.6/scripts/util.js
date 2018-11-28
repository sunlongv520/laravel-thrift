(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define('simple-util', ["jquery"], function ($) {
      return (root.returnExportsGlobal = factory($));
    });
  } else if (typeof exports === 'object') {
    // Node. Does not work with strict CommonJS, but
    // only CommonJS-like enviroments that support module.exports,
    // like Node.
    module.exports = factory(require("jquery"));
  } else {
    root.simple = root.simple || {};
    root.simple['util'] = factory(jQuery);
  }
}(this, function ($) {

var util;

util = {
  os: (function() {
    if (typeof navigator === "undefined" || navigator === null) {
      return {};
    }
    if (/Mac/.test(navigator.appVersion)) {
      return {
        mac: true
      };
    } else if (/Linux/.test(navigator.appVersion)) {
      return {
        linux: true
      };
    } else if (/Win/.test(navigator.appVersion)) {
      return {
        win: true
      };
    } else if (/X11/.test(navigator.appVersion)) {
      return {
        unix: true
      };
    } else {
      return {};
    }
  })(),
  browser: (function() {
    var chrome, firefox, ie, safari, ua, _ref, _ref1, _ref2, _ref3;
    ua = navigator.userAgent;
    ie = /(msie|trident)/i.test(ua);
    chrome = /chrome|crios/i.test(ua);
    safari = /safari/i.test(ua) && !chrome;
    firefox = /firefox/i.test(ua);
    if (ie) {
      return {
        msie: true,
        version: (_ref = ua.match(/(msie |rv:)(\d+(\.\d+)?)/i)) != null ? _ref[2] : void 0
      };
    } else if (chrome) {
      return {
        webkit: true,
        chrome: true,
        version: (_ref1 = ua.match(/(?:chrome|crios)\/(\d+(\.\d+)?)/i)) != null ? _ref1[1] : void 0
      };
    } else if (safari) {
      return {
        webkit: true,
        safari: true,
        version: (_ref2 = ua.match(/version\/(\d+(\.\d+)?)/i)) != null ? _ref2[1] : void 0
      };
    } else if (firefox) {
      return {
        mozilla: true,
        firefox: true,
        version: (_ref3 = ua.match(/firefox\/(\d+(\.\d+)?)/i)) != null ? _ref3[1] : void 0
      };
    } else {
      return {};
    }
  })(),
  preloadImages: function(images, callback) {
    var imgObj, loadedImages, url, _base, _i, _len, _results;
    (_base = arguments.callee).loadedImages || (_base.loadedImages = {});
    loadedImages = arguments.callee.loadedImages;
    if (Object.prototype.toString.call(images) === "[object String]") {
      images = [images];
    } else if (Object.prototype.toString.call(images) !== "[object Array]") {
      return false;
    }
    _results = [];
    for (_i = 0, _len = images.length; _i < _len; _i++) {
      url = images[_i];
      if (!loadedImages[url] || callback) {
        imgObj = new Image();
        if (callback && Object.prototype.toString.call(callback) === "[object Function]") {
          imgObj.onload = function() {
            loadedImages[url] = true;
            return callback(imgObj);
          };
          imgObj.onerror = function() {
            return callback();
          };
        }
        _results.push(imgObj.src = url);
      } else {
        _results.push(void 0);
      }
    }
    return _results;
  },
  transitionEnd: function() {
    var el, t, transitions;
    el = document.createElement('fakeelement');
    transitions = {
      'transition': 'transitionend',
      'MozTransition': 'transitionend',
      'WebkitTransition': 'webkitTransitionEnd'
    };
    for (t in transitions) {
      if (el.style[t] !== void 0) {
        return transitions[t];
      }
    }
  },
  storage: {
    supported: function() {
      var e;
      try {
        localStorage.setItem('_storageSupported', 'yes');
        localStorage.removeItem('_storageSupported');
        return true;
      } catch (_error) {
        e = _error;
        return false;
      }
    },
    set: function(key, val, session) {
      var storage;
      if (session == null) {
        session = false;
      }
      if (!this.supported()) {
        return;
      }
      storage = session ? sessionStorage : localStorage;
      return storage.setItem(key, val);
    },
    get: function(key, session) {
      var storage;
      if (session == null) {
        session = false;
      }
      if (!this.supported()) {
        return;
      }
      storage = session ? sessionStorage : localStorage;
      return storage[key];
    },
    remove: function(key, session) {
      var storage;
      if (session == null) {
        session = false;
      }
      if (!this.supported()) {
        return;
      }
      storage = session ? sessionStorage : localStorage;
      return storage.removeItem(key);
    }
  }
};


return util;


}));


