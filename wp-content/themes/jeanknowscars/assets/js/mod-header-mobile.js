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
		mod.module = $('.mod-header-mobile');
        mod.search = $('.search-content');
        mod.searchInput = mod.search.find('.search');
	};

	mod.setVars = function() {

	};

	mod.setEvents = function(){
		mod.module.on('click', '.menu-icon .fa-bars', function(e) {
            e.preventDefault();
			if( !$('.main-menu').hasClass('expanded') ) {
                if($('.search-content').hasClass('expanded')){
                    $('.search-content').removeClass('expanded');
                    $('.search-content').addClass('hide');
                }
                $('.main-menu').addClass('expanded');
                $('.main-menu').removeClass('hide');
                $('.mobile-page').css({'overflow' : 'hidden'}).animate({'margin-right' : -240}, 300);
                $('.mod-header-mobile').animate({'right' : -240}, 300);
                $('.mobile-column').animate({'right' : -240}, 300);
			}
            else {
                $('.main-menu').removeClass('expanded');
                $('.main-menu').addClass('hide');
                $('.mobile-page').css({'overflow' : 'auto'}).animate({'margin-right' : 0}, 300);
                $('.mod-header-mobile').animate({'right' : 0}, 300);
                $('.mobile-column').animate({'right' : 0}, 300);
			}
		});

        mod.module.on('click', '.menu-icon .fa-search', function(e){
            e.preventDefault();
            if(!mod.search.hasClass('expanded')){
                if($('.main-menu').hasClass('expanded')){
                    $('.main-menu').removeClass('expanded');
                    $('.main-menu').addClass('hide');
                    $('.mobile-page').css({'overflow' : 'auto'}).animate({'margin-right' : 0}, 300);
                    $('.mod-header-mobile').animate({'right' : 0}, 300);
                    $('.mobile-column').animate({'right' : 0}, 300);
                }
                mod.search.addClass('expanded');
                mod.search.removeClass('hide');
                $('.mobile-column').css({'padding-top' : 0}).animate({'bottom' : -50}, 100);
            }
            else{
                mod.search.removeClass('expanded');
                mod.search.addClass('hide');
                $('.mobile-column').css({'padding-top' : 60}).animate({'bottom' : 0}, 100);
            }
        });

        mod.search.on('click', '.search-button', function(e){
            var valueStr = mod.searchInput.val().trim(),
                value = valueStr.toLowerCase();

            if( value ){
                e.preventDefault();
                mod.doSearch(value);
            }
        });

        mod.search.keypress(function (e){
            var code=(e.keyCode?e.keyCode:e.which),
                valueStr = mod.searchInput.val().trim(),
                value = valueStr.toLowerCase();

            if(code==13){
                e.preventDefault();
                if( value !== "" ){
                    mod.doSearch(value);
                }
            }
        });

        mod.doSearch = function(value) {
            var url = '/search/?q=' + value;
            window.location.href = url;
        };
	};

	return mod.init();

})(SorcWeb, jQuery);
