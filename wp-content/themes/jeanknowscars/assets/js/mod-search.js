;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
	"use strict";

    sorcWeb.modSearch = {};

	var mod = sorcWeb.modSearch;

    sorcWeb.modSearch.init = function() {
		mod.vars = {};
		mod.setSelectors();
		mod.setEvents();

	};

	mod.setSelectors = function() {
		mod.module = $('.mod-search');
		mod.searchBox = mod.module.find('.search-wrap');
		mod.searchInput = mod.module.find('.input-text');
	};

	mod.setEvents = function(){
		/*Trigger Search*/
		mod.module.on('click', '.search-btn', function(e){
			var valueStr = mod.searchInput.val().trim(),
				value = encodeURIComponent(valueStr).toLowerCase();

			if( value ){
				e.preventDefault();
				mod.doSearch(value);
			}
		});

		mod.searchBox.keypress(function (e){
			var code=(e.keyCode?e.keyCode:e.which),
				valueStr = mod.searchInput.val().trim(),
				value = encodeURIComponent(valueStr).toLowerCase();

			if(code==13){
				e.preventDefault();
				if( value ){
					mod.doSearch(value);
				}
			}
		});

		/*Trigger Search Results Page Tracking*/
		$(document).on('click', '[data-searcharticlelink]', function(e) {
			e.preventDefault();
			//if (typeof omnitureTrackInner == 'function') {
			//	var searchArticleUrl = $(this).attr('href');
			//	var searchOrderNum = $(this).parents('[data-searchresultsorder]').data('searchresultsorder');
             //   var valueStr = mod.searchInput.val().trim(),
             //       value = encodeURIComponent(valueStr).toLowerCase();
			//	omnitureTrackInner('oSearchClick', { "searchIndex": searchOrderNum }, $(this));
			//}
			window.location.href = searchArticleUrl;
		});
	};

	mod.doSearch = function(value) {
		var url = '/search/?q=' + value;
		//if (typeof omnitureTrackInner == 'function') {
		//	omnitureTrackInner('oSearch',{'search':value});
		//}
		window.location.href = url;
	};

    $(window).smartscroll(function(){
        var scrollY = $(document).scrollTop(),
            widthRightColumn = $('.right-column').width();

        if( scrollY > $('.right-column').offset().top ){
            if(!$('.right-column').hasClass('right-ads')) {
                var rightClone = $('.right-column').clone();
                rightClone.addClass('right-ads');
                rightClone.removeClass('col-18');
                rightClone.removeClass('right');
                $('.right-column').html(rightClone);
            }
            $('.right-ads').css({
                'position': 'fixed',
                'top': 0,
                'width': widthRightColumn
            });
        }
        else{
            if($('.right-column').hasClass('right-ads')) {
                $('.right-ads').css({
                    'position': 'relative',
                    'width': '100%'
                });
            }
        }
    });

	return mod.init();

})(SorcWeb, jQuery);
