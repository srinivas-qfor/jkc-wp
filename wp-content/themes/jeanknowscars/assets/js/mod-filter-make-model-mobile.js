;var SorcWeb = SorcWeb || {};

(function(sorcWeb, $){
    "use strict";

    sorcWeb.modFilterMakeModel = {};
    var mod = sorcWeb.modFilterMakeModel;

    mod.init = function() {
        $('.mod-shop-makemodel').makeModelDropdown({ makeTitle: 'Choose Make', makeWidth: 170, modelTitle: 'Choose Model', modelWidth: 170, addCta: true, ctaTitle: 'Go', ctaClass: 'mod-shop-cta btn-main-cta', ctaDisabled: true });

        $('.makeDropdown').change( function() {
            var make = $('.makeDropdown option:selected').val();
            var modelOptions = '<option value="">Choose Model</option>';
            $('.modelDropdown select').html(modelOptions).attr('disabled', true);
            $('.modelDropdown span').addClass('disabled');
            $('.modelDropdown .dropdown-custom-select p').html('Choose Model');
            $('.mod-shop-cta').addClass('disabled');
            if(make) {
                $.ajax({
                    url: "/vehicle-dropdown/model/",
                    type: "POST",
                    data: {
                        make: make
                    }
                }).done(function(output){
                    $('.modelDropdown .dropdown-custom-select p').html('Choose Model');
                    $('.mod-shop-cta').removeClass('disabled');
                    if (output) {
                        $('.modelDropdown select').html(modelOptions + output).removeAttr('disabled');
                        $('.modelDropdown span').removeClass('disabled');
                    }
                    else {
                        $('.modelDropdown select').html(modelOptions).attr('disabled', true);
                        $('.modelDropdown span').addClass('disabled');
                    }
                });
            }
        });
        $('.btn-vehicle-dropdown').on('click', function() {
            if (!$(this).hasClass('disabled')) {
                var make = $('.makeDropdown option:selected' ).text();
                var model = $('.modelDropdown option:selected' ).text();
                var path = '';
                if(model && (model != 'Choose Model')) {
                    make = make.replace(' & ', '-').replace(/\//g, '-').replace(' ', '-').toLowerCase();
                    model = model.replace(' & ', '-').replace(/\//g, '-').replace(/ /g, '-').toLowerCase();
                    path = '/' + make + '/' + model + '/';
                    window.location = path;
                } else {
                    make = make.replace(' & ', '-').replace(/\//g, '-').replace(/ /g, '-').toLowerCase();
                    path = '/' + make  + '/';
                    window.location = path;
                }
            }
        });
    };

    return mod.init();
})(SorcWeb, jQuery);