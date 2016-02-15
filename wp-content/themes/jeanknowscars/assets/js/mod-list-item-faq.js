;var SorcWeb = SorcWeb || {}; // Global object

(function(sorcWeb, $){
    "use strict";
    sorcWeb.modFaq = {};
    var mod = sorcWeb.modFaq;
    mod.vars = {};

    mod.init = function(){
        this.setVars();
        this.setSelectors();
        this.setEvents();
    };

    mod.setVars = function(){

    };

    mod.setSelectors = function(){
        mod.module = $('.mod-list-item-faq-wrap');
    };

    mod.setEvents = function(){
        mod.module.on('click', '.answer-label', function() {
            $(this).parent().find('.answer-container').toggle('normal');
            if ($(this).hasClass('active')) {
                $(this).removeClass('active').next().slideUp('fast');
            } else {
                $('.active').removeClass('active').next().slideUp('fast');
                $(this).addClass('active').next().slideDown('slow');
            }
        });
    };

    return(mod.init());
})(SorcWeb, jQuery);