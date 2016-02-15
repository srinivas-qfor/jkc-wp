;var SorcWeb = SorcWeb || {};

$(function() {

    (function(sorcWeb, $) {
        "use strict";

        SorcWeb.pg = {};

        var mod = SorcWeb.pg;

        /* hold on to your butts */
        mod.init = function() {
            mod.vars = {};
            mod.setVars();
            mod.setSelectors();
            mod.resetGallerySize();
            mod.setEvents();
        };

        /* setup our vars */
        mod.setVars = function() {
            mod.vars.currImage 	= 1;
            mod.vars.currThumb 	= 1;
            mod.vars.maxThumbs 	= $('.thumbnail-item').length;
        };

        /* assign our selectors */
        mod.setSelectors = function() {
            mod.module              = $('.pg-wrapper');
            mod.slider              = $('.pg-overlay');
            mod.control             = $('.pg-control');
            mod.thumbList           = $('.pg-control .thumbnail-list');
            mod.photoOverlayModule  = $('.mod-photo-overlay-mobile');
            mod.vars.currImage 	    = parseInt(mod.slider.find('.large-slide.current').attr('data-count'));
            mod.vars.currThumb      = mod.vars.currImage;
        };

        /* resize */
        mod.resetGallerySize = function() {
            var $width = mod.module.width();
            var $h_slide = Math.floor($width / 3 * 2);
            mod.slider.find('.large-slide').css('height', $h_slide);
            if ($width % 3 == 1) {
                $width--;
            }
            if ($width % 3 == 2) {
                $width -= 2;
            }
            var $w_item = $width / 3;
            var $h_item = Math.floor($w_item / 3 * 2);
            mod.thumbList.css({'width' : $w_item * mod.vars.maxThumbs});
            mod.moveThumb(mod.vars.currThumb);
            mod.slider.find('.large-slide-arrow').css('top', Math.floor(($h_slide - 40) / 2));
            mod.control.find('.pg-control-arrow').css('top', Math.floor(($h_item - 15) / 2));
        };

        /* setup the events */
        mod.setEvents = function() {
            /*Trigger Arrow*/
            mod.module.on('click', '.large-slide-arrow.next', function(e){
                e.preventDefault();
                var index = mod.vars.currImage;
                index++;
                if (index > mod.vars.maxThumbs) {
                    index = 1;
                }
                mod.moveSlide(index);
                mod.moveThumb(mod.vars.currImage);
            });
            mod.module.on('click', '.large-slide-arrow.prev', function(e){
                e.preventDefault();
                var index = mod.vars.currImage;
                index--;
                if (index < 1) {
                    index = mod.vars.maxThumbs;
                }
                mod.moveSlide(index);
                mod.moveThumb(mod.vars.currImage);
            });

            /* a user clicks a thumbnail */
            mod.module.on('click', '.thumbnail-link', function(e){
                e.preventDefault();
                var index = parseInt($(this).attr('data-count'));
                if (index >= 1 && index <= mod.vars.maxThumbs) {
                    mod.moveSlide(index);
                }
            });

            /* a user clicks a prev image */
            mod.module.on('click', '.pg-control-arrow.prev', function(e){
                e.preventDefault();
                var current_thumb = mod.vars.currThumb;
                current_thumb -= 2;
                if (current_thumb < 1) {
                    current_thumb = 1;
                }
                mod.moveThumb(current_thumb);
            });

            /* a user clicks a next image */
            mod.module.on('click', '.pg-control-arrow.next', function(e){
                e.preventDefault();
                var current_thumb = mod.vars.currThumb;
                current_thumb += 2;
                if (current_thumb > mod.vars.maxThumbs) {
                    current_thumb = mod.vars.maxThumbs;
                }
                mod.moveThumb(current_thumb);
            });

            /*Triggers to open Gallery*/
            mod.slider.on('click', '.zoom-gallery', function(e){
                e.preventDefault();
                console.log('open gallery');
                mod.showGallery($(this));
            });

            /*Trigger close gallery*/
            mod.photoOverlayModule.on('click', function(){
                mod.hideOverlay();
            });

            $(window).on('resize', function(){
                mod.resetGallerySize();
            });
        };

        mod.moveSlide = function(current_slide) {
            mod.vars.currImage = current_slide;
            $('.pg-overlay .large-slide.current').hide().removeClass('current');
            $('.pg-overlay #large-slide-'+current_slide).fadeIn().addClass('current');
            $('.pg-control .thumbnail-item').removeClass('current');
            $('.pg-control #thumbnail-' + current_slide).addClass('current');
            $('.pg-wrapper .record-num span').text(current_slide);
        };

        mod.moveThumb = function(current_thumb){
            mod.vars.currThumb = current_thumb;
            var left_thumb = mod.vars.currThumb - 2;
            if (mod.vars.currThumb > mod.vars.maxThumbs - 2) {
                left_thumb = mod.vars.maxThumbs - 3;
            }
            if (mod.vars.currThumb < 2) {
                left_thumb = 0;
            }
            var $w_item = mod.control.find('.thumbnail-item').width() + 2;
            var new_left = 0 - left_thumb * $w_item;
            mod.thumbList.animate({'left' : new_left}, 300);
            mod.module.find('.pg-control-arrow.disabled').removeClass('disabled');
            if(mod.vars.currThumb <= 2) mod.module.find('.pg-control-arrow.prev').addClass('disabled');
            if(mod.vars.currThumb >= mod.vars.maxThumbs - 1) mod.module.find('.pg-control-arrow.next').addClass('disabled');
        };

        mod.showGallery = function(img) {
            $('html').addClass('noscroll'); /*Remove scroll from html, because overlay has scroll*/
            mod.photoOverlayModule.removeClass('hide');
            $("<img />")
                .bind("load", function() {
                    var $img = $('.mod-photo-overlay-mobile img');
                    var $cap = $('.mod-photo-overlay-mobile .caption');
                    $img.attr("src", img.attr('data-overlay'));
                    $cap.text(img.attr('data-caption'));
                    var $height_wrap = mod.photoOverlayModule.height();
                    var $height = $img.height();
                    $cap.css('top', ($height_wrap + $height) / 2)

                })
                .attr("src", img.attr('data-overlay'));
        };

        mod.hideOverlay = function(){
            $('html').removeClass('noscroll');
            mod.photoOverlayModule.addClass('hide');
            $('.mod-photo-overlay-mobile img').attr("src", '/img/loading.gif');
            $('.mod-photo-overlay-mobile .caption').text('');
        };

        /*---------------------------------------------------------*/

        /* full power */
        return(mod.init());
    }) (SorcWeb, jQuery);
});
/*-----------------------------------------------------------*/

