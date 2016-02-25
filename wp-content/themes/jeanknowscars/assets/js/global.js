(function($){
	"use strict";

	$(function(){

		/*If coming from mobile set cookie*/
		var queryString = window.location.search;
		if (queryString.toLowerCase().indexOf("?fullsite=true") >= 0){
			$.cookie("fullsite", true);
		}

		/*Simlink - When there's one link inside a container and you want the entire container to be clickable*/
		$(document).on('click', '[data-simlink]', function(e){
			var $this = $(this),
				$anchor = $this.find('a'),
				url = $anchor.attr('href'),
				target = $anchor.attr('target');

			e.preventDefault();

			/*IF BLANK OR NOT*/
			target === '_blank' ? window.open(url, '_blank') : window.location.href = url;
		});

		/*Simlink - When there's 2 or more anchors in a container and you want to trigger click on certain elements with js*/
		$(document).on('click', '[data-simelink]', function(){
			/***
			 data-simolink = original link, has to be anchor tag
			 data-simelink = emulates the anchor tag behavior
			 data-simparent = container that has olink and elink inside
			 ***/
			var $this = $(this),
				$parent = $this.closest('[data-simparent]'),
				$anchor = $parent.find('[data-simolink]'),
				url = $anchor.attr('href'),
				target = $anchor.attr('target');

			/*IF BLANK OR NOT*/
			if (0 < $parent.length) {
				target === '_blank' ? window.open(url, '_blank') : window.location.href = url;
			}
		});

		/*Emulate anchor like functionality*/
		$(document).on('click', '[data-simflink]', function(e){
			var $this = $(this),
				data = $this.data('simflink'),
				url = data.url || null,
				target = data.target || null;
			target === '_blank' ? window.open(url, '_blank') : window.location.href = url;
		});

		/*Trigger fa-angle-down of select element*/
		$(document).on('click', '.fa-angle-down.fa-select', function(){
            var element = $(this).parent().find('select')[0],
                worked = false;
            if(document.createEvent) { // all browsers
                var e = document.createEvent("MouseEvents");
                e.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                worked = element.dispatchEvent(e);
            } else if (element.fireEvent) { // ie
                worked = element.fireEvent("onmousedown");
            }
            if (!worked) { // unknown browser / error
                console.log("It didn't worked in your browser.");
            }
		});

		/*Load BG Images*/
		$('[data-simbgimg]').each(function(){
			var $this = $(this),
				src = $this.data('simbgimg');

			$this.css('background-image', 'url(' + src + ')');
		});

		/*Go to top*/
		$(document).on('click', '.mod-go-top', function() {
			$('html, body').animate({
				scrollTop: 0
			}, 500);
		});

		/* enable ajax loader..*/
		$( document ).ajaxStart(function() {
		$( ".btn-loading" ).css("display","");
		});

		$( document ).ajaxComplete(function() {
		$( ".btn-loading" ).css("display","none");
		});

		 /* remove breadcrumd href..*/
		 $(".crumb-wrap:last-child a").removeAttr("href");
		 $(".crumb-wrap:last-child a").css("cursor","auto");

		/*Show-Hide go to top with smartscroll*/
		$(window).smartscroll(function(){
			var scrollY = $(document).scrollTop();

			if( scrollY > $(window).height() ){
				$('.mod-go-top').removeClass('hide');
			}else{
				$('.mod-go-top').addClass('hide');
			}

            var contiguous = $('.mod-article-contiguous');
            if (contiguous.length) {
                if (scrollY > $('body > .page').height() - $(window).height() - 1000) {
                    contiguous.removeClass('hide');
                }
                else {
                    contiguous.addClass('hide');
                }
            }
		});

	});
})(jQuery);