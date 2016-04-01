;var SorcWeb = SorcWeb || {}; // Global object

(function(sorcWeb, $){
    "use strict";
    sorcWeb.modFaqForm = {};
    var mod = sorcWeb.modFaqForm;
    mod.vars = {};

    mod.init = function(){
        this.setVars();
        this.setSelectors();
        this.setEvents();
    };

    mod.setVars = function(){
        mod.vars.charLimit = 150;
    };

    mod.setSelectors = function(){
        mod.module = $('.mod-faq-form');
        mod.form = $('.post-faq-form');
        mod.select = $('.post-faq-form select');
        mod.textArea = $('.post-faq-form textarea');
        mod.remaining = $('.faq-post-remaining');
        mod.button = $('.post-faq-button');
        mod.thanks = $('.post-faq-thanks');
        mod.another = $('.post-another-faq');
    };

    mod.setEvents = function(){
        mod.textArea.keyup(function () {
            var charLength = $(this).val().length;

            mod.remaining.html('(' + (mod.vars.charLimit - charLength) + ' characters remain)');

            if (charLength === 0) {
                mod.button.toggleClass('disabled', true);
            } else if (charLength > mod.vars.charLimit) {
                mod.remaining.addClass('error');
                mod.button.toggleClass('disabled', true);
            } else if (charLength <= mod.vars.charLimit) {
                mod.remaining.removeClass('error');

                if (mod.select.val() !== null && mod.select.val() != "Select a Tag")
                    mod.button.toggleClass('disabled', false);
            }
        });

        mod.select.change(function () {
            var charLength = mod.textArea.val().length;

            if ($(this).val() === null || $(this).val() === "Select a Tag") {
                mod.button.addClass('disabled');
            } else if (charLength > 0 && charLength <= mod.vars.charLimit) {
                mod.button.removeClass('disabled');
            }
        });

        mod.button.click(function(){
             if (!$(this).hasClass('disabled')) {
                var text = mod.textArea.val();
                var category = mod.select.val();
                var fbUserId = $('.mod-header .user-info').attr('data-uid');
                var fbUserName = $('.mod-header .user-info').attr('data-fname');
				var fbQuestionDetails = fbUserName+' | '+fbUserId;
                mod.select.attr('disabled', true);
                mod.textArea.attr('disabled', true);
                mod.form.find('.ajax-loader').show(); 
				var strQuestion = document.getElementById("faq-textarea").value;
				var strCategory = document.getElementById("tagDropdown").value;
			
				jQuery.post(
					ajaxurl, 
					{
						'action': 'insert_faq_post',
						'question': strQuestion,
						'category': strCategory,
						'post_typee': 'ask-jean-question',
						'questionar_name': fbQuestionDetails
					},function(response){
						if(response == 0 ){
							mod.form.addClass('hide');
                            mod.thanks.removeClass('hide');
						}else {
                            mod.form.replaceWith('<div class="post-faq-error">Post was not successful, please try again or contact an administrator.</div>')
                        }  
					});	
            }
        });

        mod.another.click(function(){
            mod.form.find('.ajax-loader').hide();
            mod.textArea.removeAttr('disabled');
            mod.select.removeAttr('disabled');
            mod.textArea.val('');
            mod.remaining.html('(250 characters remain)');
            mod.select.val('Select a Tag');
            mod.form.find('.dropdown-custom-select').text('Select a Tag');
            mod.thanks.addClass('hide');
            mod.form.removeClass('hide');
            return false;
        });

        $('.askAQuestion').on('click', function() {
            mod.module.show();
        });

        mod.form.on('click', '.auto-login-cancel', function() {
            mod.module.hide();
        });

        mod.select.each(function(){
            var title = $(this).attr('title');

            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="dropdown-custom-select">' + title + '</span>')
                .change(function(){
                    var val = $('option:selected',this).text();
                    $(this).next().text(val);
                })
        });
    };

    return(mod.init());
})(SorcWeb, jQuery);