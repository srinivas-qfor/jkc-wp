;var SorcWeb = SorcWeb || {}; // Global object
(function (sorcWeb, window) {
    sorcWeb.modGetSocial = {};
    var mod = sorcWeb.modGetSocial;

    mod.init = function() {
        var $instagramModule = $('#mod-instagram'),
            $instagramThumbs = $instagramModule.find('.instagram-thumbs'),
            $instagramWrapper = $instagramModule.find('.instagram-wrapper'),
            $imageViewer = $instagramModule.find('.mod-cnt-image');

        $instagramThumbs.instagramUserRecent({
            show: 12,
            onComplete: function(photos, data) {
                mod.updateInstagramViewer($('.instagram-placeholder:eq(0)').find('a').data('photo'));
            }
        }).delegate('.instagram-placeholder', 'click', function(e) {
            e.preventDefault();
            if ($('#mod-instagram .mod-cnt-image').length > 0) {
                mod.updateInstagramViewer($(this).find('a').data('photo'));
            } else {
                var win = window.open($(this).find('a').attr('href'), '_tab');
                win.focus();
            }
        });

        $instagramWrapper.on('scroll', function() {
            if (!$instagramThumbs.find('.lazy-load').length) {
                var scrollerHeight = $instagramThumbs.outerHeight(),
                    containerHeight = $(this).innerHeight();

                if (($(this).scrollTop() + containerHeight) >= (scrollerHeight)) {
                    $instagramThumbs.append('<div class="lazy-load">loading...</div>');

                    $instagramThumbs.instagramUserRecent('option', {show: 9, onComplete: function() {
                        $instagramThumbs.find('.lazy-load').remove();
                        if ($instagramThumbs.data('instagramUserRecent').options.maxId === '') {
                            $instagramWrapper.unbind('scroll');
                        }
                    }}).instagramUserRecent('requestImages');
                }
            }
        });
    };

    mod.updateInstagramViewer = function(photo) {
        var $instagramViewer = $('#mod-instagram').find('.mod-cnt-image');

        if (!$instagramViewer.find('.image-link').length) {
            $instagramViewer.prepend($('<a/>').addClass('image-link').attr({'href': photo.link, target:'_tab'}).append($('<img/>').attr('src',photo.images.low_resolution.url)));
        } else {
            $instagramViewer.children('.image-link').attr({href:photo.link}).children('img').attr('src', photo.images.low_resolution.url);
        }

        $instagramViewer.children('.mod-instagram-date').html('Date: ' + photo.created_time);
        $instagramViewer.children('.mod-instagram-caption').html((photo.caption === null) ? '' : 'Caption: ' + photo.caption);
        $instagramViewer.children('.mod-instagram-comments').html('Comments: ' + photo.comments.count);
        $instagramViewer.children('.mod-instagram-likes').html('Likes: ' + photo.likes.count);
        $instagramViewer.children('.mod-instagram-location').html((photo.location === null) ? '' : '<a href="http://maps.googleapis.com/maps/api/staticmap?center=' + photo.location.latitude + ',' + photo.location.longitude + '&zoom=11&size=300x300&markers=color:blue%7Clabel:J%7C' + photo.location.latitude + ',' + photo.location.longitude + '&sensor=false" target="_blank">Location</a>');
        $instagramViewer.children('.mod-instagram-tags').html((photo.tags.count) ? ('Tags: ' + photo.tags.count.join(', ')): '');
    };

    return mod.init();
})(SorcWeb, window);
