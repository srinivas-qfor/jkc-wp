(function($){
	"use strict";
	/*
	 * Tell our presentation layer that JavaScript is in fact running
	 * */
	$(function(){
		$(document).on('click', '[data-simlink]', function(e){
			var $this = $(this),
				$anchor = $this.find('a'),
				url = $anchor.attr('href'),
				target = $anchor.attr('target');

			e.preventDefault();

			/*IF BLANK OR NOT*/
			target === '_blank' ? window.open(url, '_blank') : window.location.href = url;
		});

		/*Simlink - When there's 2 or more anchors in a container*/
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

		/*
		 * Emulate anchor like functionality
		 * */
		$(document).on('click', '[data-superposition]', function(e){
			var $this = $(this),
				data = $this.data('superposition'),
				url = data.url || null,
				target = data.target || null;
			target === '_blank' ? window.open(url, '_blank') : window.location.href = url;
		});

	});
})(jQuery);