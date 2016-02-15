;var SorcWeb = SorcWeb || {}; // Global object

(function ($) {
    "use strict";
    (function(sorcWeb){
        sorcWeb.modFlipper = {};
        var mod = sorcWeb.modFlipper;

        mod.init = function() {
            $('#flexslider.hasSlider').flexslider({
                animation: "slide",
                controlsContainer: ".flex-container",
                slideshow: true,
                controlNav: false,
                directionNav: false,
                vars: {
                    numSlides: $('.flex-container .slide').length,
                    flipperTitle: null,
                    flipperText: null,
                    flipperPager: null,
                    flipperPagerText: null
                },
                start : function(slider) {
                    var $container = slider.parent('.flex-container'),
                        $nav = $container.find(".flex-control-nav"),
                        $flipperInfoContainer = $container.find(".flipper-info-box"),
                        $flipperInfoTitle = $container.find(".flipper-info-title"),
                        $flipperInfoText = $container.find(".flipper-info-text"),
                        $flipperInfoPager = $container.find(".flipper-info-pager"),
                        $flipperInfoLeft = $container.find(".flipper-info-left"),
                        $flipperInfoRight = $container.find(".flipper-info-right"),
                        $flipperInfoPagerText = $container.find(".flipper-info-pager-text");

//                $flipperInfoContainer.append($flipperInfoTitle).append($flipperInfoText);
//                $flipperInfoPager.append($flipperInfoLeft).append($flipperInfoPagerText).append($flipperInfoRight).appendTo($flipperInfoContainer);
//                $flipperInfoContainer.appendTo($container);

                    this.vars.flipperTitle = $flipperInfoTitle;
                    this.vars.flipperText = $flipperInfoText;
                    this.vars.flipperPager = $flipperInfoPager;
                    this.vars.flipperPagerText = $flipperInfoPagerText;

                    this.getText(slider);

                    $flipperInfoRight.on('click', function() { slider.flexAnimate(slider.getTarget("next")); });
                    $flipperInfoLeft.on('click', function() { slider.flexAnimate(slider.getTarget("prev"));  });

                    $(document).keydown(function (e) {
                        switch (e.keyCode) {
                            case 40:
                                slider.flexAnimate(slider.getTarget("prev"));
                                break;
                            case 38:
                                slider.flexAnimate(slider.getTarget("next"));
                                break;
                        }
                    });

                    $('.flipper-main-left').on('click', function(e) {
                        slider.flexAnimate(slider.getTarget("prev"));
                    });
                    $('.flipper-main-right').on('click', function(e) {
                        slider.flexAnimate(slider.getTarget("next"));
                    });
                },
                before : function(slider) {
                    this.vars.flipperTitle.fadeOut('fast');
                    this.vars.flipperText.fadeOut('fast');
                    this.vars.flipperPager.fadeOut('fast');
                },
                after : function(slider) {
                    this.getText(slider);
                },
                getText : function(slider) {
                    var smalltitle = slider.find('.flex-active-slide .img-wrap').data('smalltitle'),
                        title = slider.find('.flex-active-slide .img-wrap').data('title'),
                        href = slider.find('.flex-active-slide .img-wrap').data('href'),
                        text = slider.find('.flex-active-slide .img-wrap').data('text'),
                        simflink = '{"url": "' + href + '"}',
                        page = slider.find('.slide').index($('.flex-active-slide'));

                    this.vars.flipperTitle.text(smalltitle).attr('title', title).attr('href', href).fadeIn('slow');
                    this.vars.flipperText.text(text).attr('data-simflink', simflink).fadeIn('slow');
                    this.vars.flipperPagerText.text(page + ' of ' + this.vars.numSlides);
                    this.vars.flipperPager.fadeIn('slow');
                }
            });
        };

        return mod.init();
    })(SorcWeb);

})(jQuery);