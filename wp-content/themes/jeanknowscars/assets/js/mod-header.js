;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
	"use strict";

	sorcWeb.modHeader = {};

	var mod = sorcWeb.modHeader;

    mod.init = function() {
		mod.vars = {};
		mod.setSelectors();
		mod.setVars();
		mod.setEvents();

	};

	mod.setSelectors = function() {
		mod.module = $('.mod-header');
        mod.searchBox = mod.module.find('.search-cont');
        mod.searchInput = mod.module.find('.search');
	};

	mod.setVars = function() {
		mod.vars.headerHeight = mod.module.height();
	};

	mod.setEvents = function(){
		/*If scroll below header, add fixed header*/
		$(window).scroll(function() {
			if ($(document).scrollTop() > mod.vars.headerHeight) {
				mod.module.addClass('scroll-header');
			} else {
				mod.module.removeClass('scroll-header');
			}
		});

		/*Remove title Attribute from Navigation*/
		mod.module.find('.nav-link, .sublink, .brand-link').removeAttr('title');

        /*Trigger Search*/
        mod.module.on('click', '.search-btn', function(e){
            var valueStr = mod.searchInput.val().trim(),
                value = valueStr.toLowerCase();

            if( value ){
                e.preventDefault();
                mod.doSearch(value);
            }
        });

        mod.searchBox.keypress(function (e){
            var code=(e.keyCode?e.keyCode:e.which),
                valueStr = mod.searchInput.val().trim(),
                value = valueStr.toLowerCase();

            if(code==13){
                e.preventDefault();
                if( value ){
                    mod.doSearch(value);
                }
            }
        });

	};

    mod.doSearch = function(value) {
        var url = '/search/?q=' + value;
        //if (typeof omnitureTrackInner == 'function') {
        //    omnitureTrackInner('oSearch', {'search':value}, mod.searchInput);
        //}
        window.location.href = url;
    };
    
	return mod.init();

})(SorcWeb, jQuery);
