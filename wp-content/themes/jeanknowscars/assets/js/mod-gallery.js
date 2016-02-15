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
            mod.vars.maxThumbs 	= 0;
            mod.vars.flow_width = 610;
            mod.vars.thumb_width 	= 122;
        };

        /* assign our selectors */
        mod.setSelectors = function() {
            mod.module              = $('.pg-wrapper');
            mod.slider              = $('.pg-overlay');
            mod.control             = $('.pg-control');
            mod.contentwrap         = $('.mod-photo-overlay .content-wrap');
            mod.img                 = $('.mod-photo-overlay img');
            mod.content             = $('.mod-photo-overlay .content');
            mod.module          = $('.full-gallery .pg-wrapper');
            mod.thumbList       = mod.module.find('.thumbnail-list');
            mod.photoOverlayModule  = $('.mod-photo-overlay');
            mod.vars.maxThumbs  = mod.module.find('.thumbnail-item').length;
            mod.vars.currImage 	= parseInt(mod.module.find('.large-slide.current').attr('data-count'));
            mod.vars.currThumb  = mod.vars.currImage;
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
                current_thumb -= 4;
                if (current_thumb < 1) {
                    current_thumb = 1;
                }
                mod.moveThumb(current_thumb);
            });

            /* a user clicks a next image */
            mod.module.on('click', '.pg-control-arrow.next', function(e){
                e.preventDefault();
                var current_thumb = mod.vars.currThumb;
                current_thumb += 4;
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
            mod.module.find('.large-slide.current').hide().removeClass('current');
            mod.module.find('.large-slide-'+current_slide).fadeIn().addClass('current');
            mod.module.find('.thumbnail-item').removeClass('current');
            mod.module.find('.thumbnail-' + current_slide).addClass('current');
        };

        mod.moveThumb = function(current_thumb){
            mod.vars.currThumb = current_thumb;
            var left_thumb = mod.vars.currThumb - 3;
            if (mod.vars.currThumb > mod.vars.maxThumbs - 3) {
                left_thumb = mod.vars.maxThumbs - 5;
            }
            if (mod.vars.currThumb < 3) {
                left_thumb = 0;
            }
            var new_left = 0 - left_thumb * mod.vars.thumb_width;
            mod.thumbList.animate({'left' : new_left}, 300);
            mod.module.find('.pg-control-arrow.disabled').removeClass('disabled');
            if(mod.vars.currThumb <= 3) mod.module.find('.pg-control-arrow.prev').addClass('disabled');
            if(mod.vars.currThumb >= mod.vars.maxThumbs - 2) mod.module.find('.pg-control-arrow.next').addClass('disabled');
        };

        mod.showGallery = function(img) {
//            $('html').addClass('noscroll'); /*Remove scroll from html, because overlay has scroll*/
            mod.photoOverlayModule.removeClass('hide');
            $("<img />")
                .bind("load", function() {
                    var $img = mod.img;
                    var $content = $('.mod-photo-overlay .content');
                    var $cap = $('.mod-photo-overlay .caption');
                    var $download = $('.mod-photo-overlay .download');
                    var $content_wrap = mod.contentwrap;
                    $img.attr("src", img.attr('data-overlay'));
                    $cap.text(img.attr('data-caption'));
                    $download.attr("href", img.attr('data-href'));
                    var $height_wrap = mod.photoOverlayModule.height();
                    var $width_img = mod.img.width();
                    var $height = $img.height();
                    var $height_content = mod.content.height();
//                    $cap.css('top', ($height_wrap + $height) / 2)
                    $content_wrap.css('height', ($height + $height_content));
                    $content_wrap.css('width', ($width_img));
                })
                .attr("src", img.attr('data-overlay'));
        };

        mod.hideOverlay = function(){
//            $('html').removeClass('noscroll');
            mod.photoOverlayModule.addClass('hide');
            $('.mod-photo-overlay img').attr("src", '/img/loading.gif');
            $('.mod-photo-overlay .caption').text('');
            $('.mod-photo-overlay .download').data('href', '#');
        };

        /*---------------------------------------------------------*/

        /* full power */
        return(mod.init());
    }) (SorcWeb, jQuery);
});
/*-----------------------------------------------------------*/

