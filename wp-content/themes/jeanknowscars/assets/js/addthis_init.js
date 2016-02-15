;var SorcWeb = SorcWeb || {}; // Global object

(function (sorcWeb, $) {
	"use strict";
    sorcWeb.modAddthis = {};
    var mod = sorcWeb.modAddthis;

    mod.vars = {};
    mod.init = function(){
        mod.setVars();
        mod.setSelectors();
        mod.setEvents();
    };

    mod.setVars = function(){

    };

    mod.setSelectors = function(){

    };

    mod.setEvents = function(){
        var addthis_config = {
            ui_use_css: false
        };

        $.getScript('http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-5022f8344dae15a0&domready=1', function () {
            mod.initializeAddthis();

            $('body').on('click', '.share-btn, .icon-share', function () {
                $(this).parent().find('.mod-addthis-hover').show();
            });

            $('body').on('mouseleave', '.mod-addthis-hover', function () {
                $(this).hide();
            });

            $('body').on('click', '.mod-addthis-hover .addthis-share', function () {
                $(this).closest('.mod-addthis-hover').hide();
            });
        });
    };

    mod.initializeAddthis = function() {
        $('.addthis_toolbox').each(function(){
            var addThisFacebook = $('<a class="addthis_button_facebook_like" fb:like:layout="button_count" />'),
                addThisTweet = $('<a class="addthis_button_tweet" tw:via="jeanknowscars" />'),
                addThisPinterest = $('<a class="addthis_button_pinterest_pinit" />'),
                addThisCounter = $('<a class="addthis_counter addthis_pill_style" />'),
                addThisUrl = $(this).attr('addthis:url');

            if (addThisUrl != '')
                addThisFacebook.attr('fb:like:href', addThisUrl);

            $(this).append(addThisFacebook).append(addThisTweet).append(addThisPinterest).append(addThisCounter);
        });
        addthis.init();
    };

    return(mod.init()); // Invoke the constructor.
})(SorcWeb, jQuery);