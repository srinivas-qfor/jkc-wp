;var SorcWeb = SorcWeb || {}; // Global object

(function(sorcWeb, $){
    "use strict";
    sorcWeb.modCarConfessionsForm = {};
    var mod = sorcWeb.modCarConfessionsForm;
    mod.vars = {};

    mod.init = function(){
        this.setVars();
        this.setSelectors();
        this.setEvents();
    };

    mod.setVars = function(){
        mod.vars.charLimit = 250;
    };

    mod.setSelectors = function(){
        mod.form = $('.post-confession-form');
        mod.select = $('.post-confession-form select');
        mod.textArea = $('.post-confession-form textarea');
        mod.remaining = $('.confession-post-remaining');
        mod.button = $('.post-confession-button');
        mod.thanks = $('.post-confession-thanks');
        mod.another = $('.post-another-confession');
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
                    mod.button.removeAttr('disabled').toggleClass('disabled', false);
            }
        });

        mod.select.change(function () {
            var charLength = mod.textArea.val().length;

            if ($(this).val() === null || $(this).val() === "Select a Tag") {
                mod.button.addClass('disabled');
            } else if (charLength > 0 && charLength <= mod.vars.charLimit) {
                mod.button.removeAttr('disabled').removeClass('disabled');
            }
        });

        mod.button.click(function(){
            var text = mod.textArea.val();
            var category = mod.select.val();
            var userInfo = $('.mod-header .user-info');
            mod.select.attr('disabled', true);
            mod.textArea.attr('disabled', true);
            mod.form.find('.ajax-loader').show();
			var fbUserId = $('.mod-header .user-info').attr('data-uid');
			var fbUserName = $('.mod-header .user-info').attr('data-fname');
			var fbConfessionsDetails = fbUserName+' | '+fbUserId; 
			var strQuestion = document.getElementById("confession-textarea").value;
			var strCategory = document.getElementById("tagDropdown").value;
				
			jQuery.post(
			ajaxurl, 
			{
				'action': 'insert_confessions_post',
				'question': strQuestion,
				'category': strCategory,
				'post_typee': 'confessions',
				'confessions_name': fbConfessionsDetails
			},function(response){
				if(response == 0 ){
					mod.form.addClass('hide');
                    mod.thanks.removeClass('hide');
				}else {
					mod.form.replaceWith('<div class="post-confession-error">Post was not successful, please try again or contact an administrator.</div>')
				}  
			});	
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