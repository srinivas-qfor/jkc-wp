var XD = function() {
	var interval_id,
		last_hash,
		cache_bust = 1,
		attached_callback,
		window = this;

	return {
		receiveMessage: function(callback, source_origin) {
			if (window['postMessage']) {

				if (callback) {
					attached_callback = function(e) {
						if ((typeof source_origin === 'string' && e.origin !== source_origin)
							|| (Object.prototype.toString.call(source_origin) === "[object Function]" && source_origin(e.origin) === !1)) {
							return !1;
						}
						callback(e);
					};
				}
				if (window['addEventListener']) {
					window[callback ? 'addEventListener' : 'removeEventListener']('message', attached_callback, !1);
				} else {
					window[callback ? 'attachEvent' : 'detachEvent']('onmessage', attached_callback);
				}
			} else {
				interval_id && clearInterval(interval_id);
				interval_id = null;

				if (callback) {
					interval_id = setInterval(function() {
						var hash = document.location.hash,
							re = /^#?\d+&/;
						if (hash !== last_hash && re.test(hash)) {
							last_hash = hash;
							callback({ data: hash.replace(re, '') });
						}
					}, 100);
				}
			}
		}
	};
} ();