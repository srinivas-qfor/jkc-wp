;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
	"use strict";
        
    $(window).smartscroll(function(){
        var scrollY = $(document).scrollTop(),
            widthRightColumn = $('.right-column').width();

        if( scrollY > $('.right-column').offset().top ){
            if(!$('.right-column').hasClass('right-ads')) {
                var rightClone = $('.right-column').clone();
                rightClone.addClass('right-ads');
                rightClone.removeClass('col-18');
                rightClone.removeClass('right');
                $('.right-column').html(rightClone);
            }
            $('.right-ads').css({
                'position': 'fixed',
                'top': 0,
                'width': widthRightColumn
            });
        }
        else{
            if($('.right-column').hasClass('right-ads')) {
                $('.right-ads').css({
                    'position': 'relative',
                    'width': '100%'
                });
            }
        }
    });

})(SorcWeb, jQuery);
