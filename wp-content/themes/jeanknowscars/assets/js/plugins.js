// Avoid `console` errors in browsers that lack a console.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

// debounced, smartscroll
(function($,ss){

// debouncing function from John Hann
// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if (!execAsap)
					func.apply(obj, args);
				timeout = null;
			}

			if (timeout)
				clearTimeout(timeout);
			else if (execAsap)
				func.apply(obj, args);

			timeout = setTimeout(delayed, threshold || 100);
		};
	};
	// smartresize @todo allow for threshold changes
	jQuery.fn[ss] = function(fn) {
		return fn ? this.bind('scroll', debounce(fn)) : this.trigger(ss);
	};
})(jQuery,'smartscroll');

/*! jQuery UI - v1.8.23 - 2012-08-15
 * https://github.com/jquery/jquery-ui
 * Includes: jquery.ui.widget.js
 * Copyright (c) 2012 AUTHORS.txt; Licensed MIT, GPL */
(function(a,b){if(a.cleanData){var c=a.cleanData;a.cleanData=function(b){for(var d=0,e;(e=b[d])!=null;d++)try{a(e).triggerHandler("remove")}catch(f){}c(b)}}else{var d=a.fn.remove;a.fn.remove=function(b,c){return this.each(function(){return c||(!b||a.filter(b,[this]).length)&&a("*",this).add([this]).each(function(){try{a(this).triggerHandler("remove")}catch(b){}}),d.call(a(this),b,c)})}}a.widget=function(b,c,d){var e=b.split(".")[0],f;b=b.split(".")[1],f=e+"-"+b,d||(d=c,c=a.Widget),a.expr[":"][f]=function(c){return!!a.data(c,b)},a[e]=a[e]||{},a[e][b]=function(a,b){arguments.length&&this._createWidget(a,b)};var g=new c;g.options=a.extend(!0,{},g.options),a[e][b].prototype=a.extend(!0,g,{namespace:e,widgetName:b,widgetEventPrefix:a[e][b].prototype.widgetEventPrefix||b,widgetBaseClass:f},d),a.widget.bridge(b,a[e][b])},a.widget.bridge=function(c,d){a.fn[c]=function(e){var f=typeof e=="string",g=Array.prototype.slice.call(arguments,1),h=this;return e=!f&&g.length?a.extend.apply(null,[!0,e].concat(g)):e,f&&e.charAt(0)==="_"?h:(f?this.each(function(){var d=a.data(this,c),f=d&&a.isFunction(d[e])?d[e].apply(d,g):d;if(f!==d&&f!==b)return h=f,!1}):this.each(function(){var b=a.data(this,c);b?b.option(e||{})._init():a.data(this,c,new d(e,this))}),h)}},a.Widget=function(a,b){arguments.length&&this._createWidget(a,b)},a.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:!1},_createWidget:function(b,c){a.data(c,this.widgetName,this),this.element=a(c),this.options=a.extend(!0,{},this.options,this._getCreateOptions(),b);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()}),this._create(),this._trigger("create"),this._init()},_getCreateOptions:function(){return a.metadata&&a.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName),this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled "+"ui-state-disabled")},widget:function(){return this.element},option:function(c,d){var e=c;if(arguments.length===0)return a.extend({},this.options);if(typeof c=="string"){if(d===b)return this.options[c];e={},e[c]=d}return this._setOptions(e),this},_setOptions:function(b){var c=this;return a.each(b,function(a,b){c._setOption(a,b)}),this},_setOption:function(a,b){return this.options[a]=b,a==="disabled"&&this.widget()[b?"addClass":"removeClass"](this.widgetBaseClass+"-disabled"+" "+"ui-state-disabled").attr("aria-disabled",b),this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_trigger:function(b,c,d){var e,f,g=this.options[b];d=d||{},c=a.Event(c),c.type=(b===this.widgetEventPrefix?b:this.widgetEventPrefix+b).toLowerCase(),c.target=this.element[0],f=c.originalEvent;if(f)for(e in f)e in c||(c[e]=f[e]);return this.element.trigger(c,d),!(a.isFunction(g)&&g.call(this.element[0],c,d)===!1||c.isDefaultPrevented())}}})(jQuery);;

/*  Make/Model Dropdown Plugin  **/
(function ($) {
    "use strict";
    $.widget('sim.makeModelDropdown', {
        _acceptableTypes: ['make', 'model'],
        _makeDropdown: null,
        _modelDropdown: null,
        _customDropdownPadding: 52,
        options: {
            makeTitle: 'make',
            makeWidth: 150,
            modelTitle: 'model',
            modelWidth: 150,
            addCta: false,
            ctaTitle: '',
            ctaClass: '',
            ctaHref: '',
            ctaDisabled: false
        },
        _create: function () {
            var that = this;

            that._createSelects();
        },
        _createSelects: function () {
            var that = this,
                setSelects = that.element.find('select');

            setSelects.each(function () {
                var $this = $(this);
                if ($.inArray($this.attr('data-type'), that._acceptableTypes) != -1) {
                    $this.wrap('<div class="dropdown-custom" />');

                    switch ($this.attr('data-type')) {
                        case 'make':
                            $this.val('');
                            that._makeDropdown = $this;
                            $.proxy(that, that._styleDropdown($this, that.options.makeTitle, that.options.makeWidth));
                            break;
                        case 'model':
                            that._modelDropdown = $this;
                            $.proxy(that, that._styleDropdown($this, that.options.modelTitle, that.options.modelWidth));
                            break;
                    }
                } else {
                    $this.remove();
                }
            });

            if (that._makeDropdown === null) {
                var newMake = '<div class="dropdown-custom"><select data-type="make"><option>1</option><option>2</option><option>3</option></select></div>';

                that._makeDropdown = that.element.prepend(newMake).find('select[data-type="make"]').prepend($('<option />', { text: that.options.makeTitle }));
                $.proxy(that, that._styleDropdown(that._makeDropdown, that.options.makeTitle, that.options.makeWidth));
            }

            if (that._modelDropdown === null) {
                var newModel = '<div class="dropdown-custom"><select data-type="model" class="disabled" /></div>';

                $(newModel).insertAfter(that._makeDropdown.parent());
                that._modelDropdown = that.element.find('select[data-type="model"]').prepend($('<option />', { text: that.options.modelTitle }));

                $.proxy(that, that._styleDropdown(that._modelDropdown, that.options.modelTitle, that.options.modelWidth));
            }

            if (that.options.addCta) {
                $.proxy(that, that._addButton());
            }
        },
        _styleDropdown: function (el, title, selectwidth) {
            var $this = el,
                that = this;

            $this
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="dropdown-custom-select"><p>' + title + '</p></span>')
                .change(function(){
                    var val = $('option:selected',this).text();
                    $(this).next().find('p').text(val);
                });

            if (selectwidth > 0) {
                $this.css({'width': selectwidth })
                    .parent().find('.dropdown-custom-select').css({'width': selectwidth - that._customDropdownPadding});
            }

            if ($this.hasClass('disabled')) {
                $this.removeClass('disabled').attr('disabled', true);
                $this.parent().find('.dropdown-custom-select').addClass('disabled');
            }
        },
        _addButton: function () {
            var that = this,
                newButton;

            newButton = $('<a />', {
                text: that.options.ctaTitle,
                href: that.options.ctaHref
            }).addClass(that.options.ctaClass);

            if (that.options.ctaDisabled)
                newButton.addClass('disabled').attr('href', 'javascript:void(0)');

            newButton.addClass('btn-vehicle-dropdown');

            newButton.appendTo(that.element);
        }
    });
})(jQuery);

(function ($) {
    $('.mod-get-social .social-links li').on('click', function() {
        $('.mod-get-social .social-links li').removeClass('active');
        $('.social-wrapper > div').hide();
        $('.social-ctr-' + $(this).data('rel')).show();
        $(this).addClass('active');
    });
})(jQuery);
(function ($) {
    "use strict";
    $.widget('sim.instagramUserRecent', {
        options:{
            show: 3,
            maxId: null
        },
        _create:function () {
            this.requestImages();
            this._trigger('onLoad');
        },
        _createPhotoNode: function(photo) {
            $('.mod-instagram').slideDown('fast');
            var comments = photo.comments.count;
            var likes = photo.likes.count;
            var str = ( 0 != comments ? comments + '&nbsp;&nbsp;&nbsp;' : '') + ( 0 != likes ? ' &hearts; ' + likes : '');

            return $('<div>').addClass('instagram-placeholder').attr('id', photo.id).
                append(
                    $('<a/>').attr({target:'_blank', href: photo.link}).data('photo', photo).append($('<img>').addClass('instagram-image').attr('src', photo.images.thumbnail.url))
                ).andSelf().
                append(
                    $('<span/>').addClass('comment-count').html( str )
                );
        },
        _createEmptyNode: function() {
            $('.ctr-instagram').slideUp('fast').remove();
//			return $('<div>').addClass('instagram-placeholder').attr('id', 'empty').append($('<p>').html('No photos for this query'));
        },
        _getRequestUrl: function() {
            var url = '/instagram/',
                params = {show:this.options.show};
            this.options.maxId != null && (params.max_id = this.options.maxId);
            url += "?" + $.param(params);
            return url;
        },
        requestImages: function() {
            var self = this;
            $.ajax({
                type:"GET",
                dataType:"json",
                cache:false,
                url:self._getRequestUrl(),
                success:function (res) {
                    var length = typeof res.images != 'undefined' ? res.images.length : 0,
                        limit = self.options.show != null && self.options.show < length ? self.options.show : length,
                        i = 0;

                    if (limit > 0) {
                        for (i; i < limit; i++) {
                            self.element.append(self._createPhotoNode(res.images[i]));
                        }


                    }else {
                        self.element.append(self._createEmptyNode());
                    }

                    self._setOption('maxId', res.max_id);
                    self._trigger('onComplete');
                }
            });
        },
        _setOption:function (key, value) {
            $.Widget.prototype._setOption.apply(this, arguments);
        }
    });
})(jQuery);


