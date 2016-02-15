;var SorcWeb = SorcWeb || {}; // Global object

/**
 * Requires throttle script (resize event)
 */
(function(sorcWeb, $){ // Namespace jQuery and Doc Ready
	"use strict";
    sorcWeb.modTab = {};
    var mod = sorcWeb.modTab;
    mod.init = function(){
        mod.setEvents();
    };
    mod.setEvents = function(){
        $('.ctr-home-mobile-recent li').on('click', function() {
            if (!$(this).hasClass('btn-mobile-active')) {
                $('.btn-mobile-active').removeClass('btn-mobile-active');
                $(this).addClass('btn-mobile-active');
                $('.mobile-column > div').each(function(){
                    if (!$(this).hasClass('mod-flipper-mobile') && !$(this).hasClass('mod-ad-top-mobile') && !$(this).hasClass('ctr-home-mobile-recent')) {
                        if (!$(this).hasClass('hide')) {
                            $(this).addClass('hide');
                        }
                        else {
                            $(this).removeClass('hide');
                        }
                    }
                });
            }
        });
    };

    return( mod.init() ); // Invoke the constructor.
})(SorcWeb, jQuery);
