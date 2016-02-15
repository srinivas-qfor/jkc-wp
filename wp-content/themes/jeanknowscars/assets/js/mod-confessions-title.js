;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
    "use strict";

    sorcWeb.modConfessions = {};

    var mod = sorcWeb.modConfessions;

    mod.init = function() {
        mod.vars = {};
        mod.setSelectors();
        mod.setEvents();

    };

    mod.setSelectors = function() {
        mod.module = $('.mod-confessions-title');
    };

    mod.setEvents = function(){
        mod.module.on('click', '.confessions-rules-link', function(e){
            if($('.confessions-rules').hasClass('hide')){
                $('.confessions-rules').removeClass('hide');
            }
        });

        mod.module.on('click', '.tooltip-close', function(e){
            if(!$('.confessions-rules').hasClass('hide')){
                $('.confessions-rules').addClass('hide');
            }
        });

    };

    return mod.init();

})(SorcWeb, jQuery);
