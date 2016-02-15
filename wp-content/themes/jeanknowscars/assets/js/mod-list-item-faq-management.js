;var SorcWeb = SorcWeb || {}; // Global object

(function(sorcWeb, $){
    "use strict";
    sorcWeb.modFaqManagement = {};
    var mod = sorcWeb.modFaqManagement;
    mod.vars = {};

    mod.init = function(){
        this.setVars();
        this.setSelectors();
        this.setEvents();
    };

    mod.setVars = function(){

    };

    mod.setSelectors = function(){
        mod.module = $('.mod-list-item-faq-management');
    };

    mod.setEvents = function(){
        mod.processTextArea();

        mod.module.on('click', '.post-answer-button', function() {
            if (!$(this).hasClass('disabled')) {
                var wrap = $(this).parent().parent();
                var parent = $(this).parent();
                var text = parent.find('textarea').val();
                var pid = $(this).attr('data-pid');
                parent.find('.ajax-loader').show();
                $.ajax({
                    url: '/ask-jean-question/management/post/',
                    data: {text : text, pid : pid},
                    type: "POST",
                    dataType: 'JSON'
                }).done(function(data) {
                        if (data.status == 'success') {
                            wrap.html('<div class="thanks">Answered</div>');
                        }
                        else {
                            wrap.html('<div class="error">'+data.message+'</div>')
                        }
                    }).error(function(){
                        wrap.html('<div class="error">Post was not successful, please try again or contact an administrator.</div>')
                    });
            }
        });

        mod.module.on('click', '.answer-link', function(){
            $(this).hide();
            $(this).parent().find('.answer-wrap').show();
        });

        mod.module.on('click', '.cancel-answer-button', function() {
            $(this).parent().hide();
            $(this).parent().parent().find('.answer-link').show();
        });
    };

    mod.processTextArea = function() {
        mod.module.find('textarea.no-js').each(function(){
            $(this).removeClass('no-js').keyup(function () {
                var charLength = $(this).val().length;
                if (charLength === 0) {
                    $(this).parent().find('.post-answer-button').toggleClass('disabled', true);
                } else {
                    $(this).parent().find('.post-answer-button').toggleClass('disabled', false);
                }
            });
        });
    };

    return(mod.init());
})(SorcWeb, jQuery);