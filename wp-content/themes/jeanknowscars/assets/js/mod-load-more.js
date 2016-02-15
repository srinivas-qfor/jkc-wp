;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
	"use strict";

	sorcWeb.modLoadMore = {};

	var mod = sorcWeb.modLoadMore;

	mod.init = function() {
		mod.vars = mod.setVars();
		mod.setSelectors();
		mod.setEvents();
	};

	mod.setVars = function() {
		return {
			loadingMore: false,
			pageNum: 1,
            totalPages: 1,
			ajaxUrl: '',
			queryStr: '',
			loadMoreCount: 0,
			loadMoreNum : 0,
			loadingAds: false,
            showCount: 0,
            replaceState: 1
		};
	};

	mod.setSelectors = function() {
		mod.module = $('.mod-load-more');
		mod.button = mod.module.find('.button');
		mod.loadMoreWell = $('.load-more-well');
		mod.rightColumn = $('.right-column');
		mod.spotlights = $('.mod-ad-spotlights');
	};

	mod.setEvents = function(){
		/*Click load more button*/
		mod.module.on('click', '.button', function(e){
			mod.loadMore(e);
		});

		/*If scroll window hits load more button*/
		if( mod.button.length ){
			$(window).scroll(function(e) {
				var loadMoreOffset = mod.button.offset().top - 1000,
					winHeight = $(window).height(),
					winScrollPos = $(window).scrollTop(),
					winDiff = winScrollPos + winHeight;

				if (winDiff >= loadMoreOffset) {
					if ( mod.vars.loadMoreCount < mod.vars.loadMoreNum ){
						mod.loadMore(e);
					}
				}
			});
		}

        mod.vars.pageNum = parseInt(mod.module.data('current-page-id'));
        mod.vars.totalPages = parseInt(mod.module.data('last-page-id'));
        mod.vars.loadMoreNum = parseInt(mod.module.data('lazy-count'));
        mod.vars.showCount = parseInt(mod.module.data('show-count'));
        mod.vars.replaceState = parseInt(mod.module.data('replace-state'));
        mod.vars.pageClass = mod.module.data('page');
        mod.vars.ajaxUrl = mod.module.data('route');
        if (!mod.vars.ajaxUrl) {
            mod.vars.ajaxUrl = window.location.pathname;
        }
        var pPosStart = mod.vars.ajaxUrl.indexOf('/page-');
        if (pPosStart >= 0) {
            if (pPosStart == 0) mod.vars.ajaxUrl = '/';
            else mod.vars.ajaxUrl = mod.vars.ajaxUrl.substr(0, pPosStart);
        }
        mod.vars.queryStr = window.location.search;

        /*If there's a load more well, show button*/
        if(mod.loadMoreWell.length && mod.vars.pageNum < mod.vars.totalPages){
			mod.module.removeClass('hide');
		}
	};

	mod.loadMore = function(e) {
		e.preventDefault();

		if ( mod.vars.loadMoreCount == 0 ){
			mod.rightColumnClone = mod.rightColumn.clone();
		}

		if ( !mod.vars.loadingMore && mod.vars.pageNum < mod.vars.totalPages ) {
            mod.vars.pageNum++;
			mod.vars.loadingMore = true;
			mod.button.addClass('btn-loading');
            var queryShowCount = '';
            if (mod.vars.showCount) {
                queryShowCount = mod.vars.queryStr ? '&' : '?';
                queryShowCount += 'count=' + (mod.vars.loadMoreCount + 1);
            }
            var ads = $('.mod-list-item.data-ads');
            if (ads.length) {
                var nextAds = parseInt(ads.data('ads'));
                ads.removeClass('data-ads').removeAttr('data-ads');
                queryShowCount += mod.vars.queryStr ? '&' : '?';
                queryShowCount += 'nextAds=' + nextAds;
            }
            $.ajax({
                url: mod.vars.ajaxUrl + 'page-' + mod.vars.pageNum + '/loadmore/' + mod.vars.queryStr + queryShowCount,
                type: "GET",
                dataType: 'HTML',
                error: function() {
                    console.log('load more ajax error');
                    mod.module.remove();
                }
            }).done(function(data) {
                if (data.length) {
                	/*Insert HTML data*/
                    //if(mod.vars.pageClass == 'search') {
                    //    if (mod.rightColumn.length) {
                    //        mod.updateSidebarContent();
                    //    }
                    //}
                    mod.loadMoreWell.append(data);

                    mod.vars.loadingMore = false;
                    mod.module.attr('data-current-page-id', mod.vars.pageNum);
                    mod.button.removeClass('btn-loading');
                    if (mod.vars.pageNum >= mod.vars.totalPages) {
                        mod.module.addClass('hide');
                    }
                    mod.vars.loadMoreCount++;
                    if (mod.vars.replaceState) {
                        history.replaceState(
                            {
                                url: mod.vars.ajaxUrl + 'page-' + mod.vars.pageNum + '/' + mod.vars.queryStr,
                                title: 'Page ' + mod.vars.pageNum,
                                currentPageID: mod.vars.pageNum
                            },
                            'Page ' + mod.vars.pageNum,
                            mod.vars.ajaxUrl + 'page-' + mod.vars.pageNum + '/' + mod.vars.queryStr
                        );
                    }
                }else{
                	console.log('load more output error');
                	mod.module.remove();
                }
                mod.reloadSpotlightAds();
            });
		}
	};

	mod.generateOrdNumber = function(){
		return Math.floor(Math.random()*89999) + 10000;
	};

	mod.updateOrdNumber = function($html){
		var newOrdNumber = mod.generateOrdNumber();
		$html.find('.dart_ad').each(function(k, v){
			var $dartFrame = $(v),
				src = $dartFrame.attr('src'),
				regex = new RegExp(';ord=([0-9]*);'),
				newSrc = src.replace(regex, ';ord=' + newOrdNumber + ';');
			$dartFrame.attr('src', newSrc);
		});
		return $html;
	};

	mod.updateSidebarContent = function(){
		var loadMoreOffset = mod.module.offset().top,
			rightRailOffset = mod.rightColumn.offset().top,
			rightRailHeight = mod.rightColumn.outerHeight(),
			cloneOffset = loadMoreOffset - rightRailHeight -rightRailOffset + 20;

		/*If left col is smaller than right rail*/
		if (cloneOffset < 0) {
			cloneOffset = 0;
		}

		if( mod.rightColumnClone.hasClass('right-clone') ) {
			mod.rightColumnClone.css({marginTop: cloneOffset});
		}else {
			mod.rightColumnClone
				.removeClass('right-column')
                .removeClass('col-18')
                .removeClass('right')
				.addClass('right-clone')
				.css({marginTop: cloneOffset})
				.find('[data-notclonable]').remove();
		}

		var loadedClone = mod.rightColumnClone.clone();

		/*Update Ord Numbers*/
		mod.rightColumn.append(mod.updateOrdNumber(loadedClone));

		/*Reset TSS ads to make them dynamic again*/
		var $tssAdsModule = $('.mod-ad-tss').filter(':last');
		$tssAdsModule.find('.tss-item').removeClass('active');
	};

	mod.reloadSpotlightAds = function(){
        mod.vars.loadingAds = true;

		/*Track ad refresh*/
        //omnitureTrackPageView(document.location.href);
        if (typeof _gaq != "undefined") {
        	_gaq.push(['_trackPageview'], document.location.href);
        }

        //OmnitureLazyLoadTrack();

        var ord_val = Math.floor(Math.random() * 89999) + 10000;
        mod.spotlights.find('.dart_ad').each(function() {
            var iframe = $(this);
            var url = iframe.attr('src');
            if (url.indexOf('#') != -1) {
                url = url.substr(0, url.indexOf('#'));
            }
            url = url.replace(/ord=([a-z1-9_-]*);/gi, "ord=" + ord_val + ";");
            iframe.removeAttr('style');
            setTimeout(function() { iframe.get(0).contentWindow.location.replace(url); }, 100);
        });
        setTimeout(function() { mod.vars.loadingAds = false; }, 2000);
    };

	return mod.init();

})(SorcWeb, jQuery);
