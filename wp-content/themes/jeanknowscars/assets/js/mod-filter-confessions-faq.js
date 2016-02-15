;var SorcWeb = SorcWeb || {}; // Global object

(function (sorcWeb, $) {
    "use strict";
    sorcWeb.modFilterConfessionsFaq = {};
    var mod = sorcWeb.modFilterConfessionsFaq;

    mod.vars = {};
    mod.init = function(){
        mod.setVars();
        mod.setSelectors();
        mod.setEvents();
    };

    mod.setVars = function(){

    };

    mod.setSelectors = function(){
        mod.filterSelect = $('.filter-wrap .dropdown-custom select');
    };

    mod.setEvents = function(){
        mod.filterSelect.each(function(){
            var title = $(this).attr('title');

            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="dropdown-custom-select">' + title + '</span>')
                .change(function(){
                    var selected = $('option:selected',this);
                    $(this).next().text(selected.text());
                    window.location.href = selected.attr('data-alias');
                })
        });
    };

    return(mod.init()); // Invoke the constructor.
})(SorcWeb, jQuery);