;var SorcWeb = SorcWeb || {}; // Global object

/**
 * Requires throttle script (resize event)
 */
(function(sorcWeb, $){ // Namespace jQuery and Doc Ready
    "use strict";
    sorcWeb.modSortCategory = {};
    var mod = sorcWeb.modSortCategory;
    mod.init = function(){
        mod.setEvents();
    };
    mod.setEvents = function(){
        $('.dropdown-custom select').each(function(){
            var title = $(this).attr('title');

            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="dropdown-custom-select">' + title + '</span>')
                .change(function(){
                    var val = $('option:selected',this).text();
                    $(this).next().text(val);
                })
        });
    };

    return( mod.init() ); // Invoke the constructor.
})(SorcWeb, jQuery);
