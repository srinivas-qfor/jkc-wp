;var SorcWeb = SorcWeb || {}; // Global object

(function (sorcWeb, $) {
	"use strict";
    sorcWeb.modAddThisClose = {};
    var mod = sorcWeb.modAddThisClose;
    mod.vars = {};
    mod.init = function(){
        mod.setVars();
        mod.setSelectors();
        mod.setEvents();
        mod.touchInit();
    };

    mod.setVars = function(){
        mod.vars.isTouch = false;
    };

    mod.setSelectors = function(){
        mod.vars.$addThisHover = $('.mod-addthis-hover');
        try {
            mod.vars.isTouch = Modernizr.touch;
        } catch (e) {
            console.log('Touch not found.');
        }
    };

    mod.setEvents = function(){

    };

    mod.touchInit = function(){
        if ( true === mod.vars.isTouch ) {
            // Inject a close button for touch devices.
            mod.vars.$addThisHover.append('<span class="hover-close">X</span>');
            // Bind the close btn.
            mod.vars.$addThisHover.find('.hover-close').on('click', $.proxy( this.closeHover, this) );
        }
    };

    mod.closeHover = function(event){
        event.stopPropagation();
        mod.vars.$addThisHover.hide();
    };

    return(mod.init()); // Invoke the constructor.
})(SorcWeb, jQuery);