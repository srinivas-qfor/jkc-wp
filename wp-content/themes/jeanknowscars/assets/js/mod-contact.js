/*-----------------------------------------------------------*/
/* File     : mod-contact.js
 /* Project  : fw
 /* Agency   : Source Interlink
 /* Author   : Geoffrey Roberts // geoffrey.roberts@sorc.com
 /* Created  : 2013-06-14
 /*-----------------------------------------------------------*/
;var SorcWeb = SorcWeb || {};

$(function() {
    (function(sorcWeb) {
        "use strict";

        sorcWeb.contact = {};
        var mod = sorcWeb.contact;

        /* hold on to your butts */
        mod.init = function() {
            mod.vars = {};
            mod.setVars();
            mod.setSelectors();
            mod.setEvents();
        };

        /* setup our vars */
        mod.setVars = function() {
            mod.vars.topOffset = $('.subtitle').eq(0).offset().top;
        };

        /* assign our selectors */
        mod.setSelectors = function() {
            mod.module = $('.mod-contact');
            mod.rows = mod.module.find('.row');
            mod.recipientSelect = mod.module.find('select[name=recipient]');
            mod.nameInput = mod.module.find('input[name=name]');
            mod.emailInput = mod.module.find('input[name=email]');
            mod.fwg = mod.module.find('textarea');
            mod.csrf = mod.module.find('input[name=csrf]');
            mod.btn = mod.module.find('.cta-button');
            mod.error = mod.module.find('.msg-error');
            mod.success = mod.module.find('.msg-success');
            mod.body = mod.module.find('body');
        };

        /* setup the events */
        mod.setEvents = function() {
            mod.recipientSelect.each(function(){
                var title = $(this).attr('title');

                $(this)
                    .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                    .after('<span class="dropdown-custom-select">' + 'Select Department' + '</span>')
                    .change(function(){
                        var val = $('option:selected',this).text();
                        $(this).next().text(val);
                    })
            });

            mod.btn.on({
                click : function(e) {
                    e.preventDefault();
                    mod.btn.prop('disabled', true);
                    if (mod.validateForm()) {
                        var postData = {
                            name: mod.vars.name,
                            email: mod.vars.email,
                            message: mod.vars.message,
                            recipient: mod.vars.recipient,
                            csrf: mod.csrf.val(),
                        };

                        $.ajax({
                            url: "/contact-us/contact/",
                            type: "POST",
                            data: postData
                        }).done(function(output){
                            if (output && output.success) {
                                mod.showSuccess();
                            } else if (output && output.errors) {
                                mod.processErrors(output.errors);
                            } else {
                                mod.showErrorMessage();
                            }
                        })
                            .error(function(jqXHR, textStatus, errorThrown) {
                                console.log('Error Submitting Contact Us Form!  Status: ' + textStatus + '     Error: ' + errorThrown);
                                mod.showErrorMessage();
                            });
                    } else {
                        mod.showErrorMessage('Please correct the errors below');
                    }

                    mod.btn.prop('disabled', false);
                }
            });

            if (typeof Modernizr !== "undefined") {
                if (!Modernizr.placeholder) {
                    mod.vars.placeHolder = mod.fwg.attr('placeholder');
                    mod.fwg.val(mod.fwg.attr('placeholder'));
                    mod.fwg.on({
                        focus : function() {
                            mod.fwg.val(mod.fwg.val() === mod.vars.placeHolder ? '' : mod.fwg.val());
                        },
                        blur: function() {
                            mod.fwg.val(($.trim(mod.fwg.val()) === '') ? mod.vars.placeHolder : mod.fwg.val());
                        }
                    });
                }
            }
        };

        /*---------------------------------------------------------*/
        /* function         : validateForm
         /* description  : validate the Form before POSTing
         /*---------------------------------------------------------*/
        mod.validateForm = function() {
            var isValid = true;

            mod.vars.recipient = mod.recipientSelect.val();
            mod.rows.eq(0).toggleClass('error', !mod.vars.recipient);
            isValid = isValid && mod.vars.recipient;

            mod.vars.name = mod.nameInput.val();
            mod.rows.eq(1).toggleClass('error', !mod.vars.name);
            isValid = isValid && mod.vars.name;

            mod.vars.email = mod.emailInput.val();
            var emailIsValid = mod.vars.email && mod.vars.email.match(/[a-zA-Z0-9.!#$%&'*+\/=?\^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/);

            if (mod.vars.email && !emailIsValid) {
                mod.rows.eq(2).find('.error-message').html('Email address does not appear to be valid');
            } else if (!mod.vars.email) {
                mod.rows.eq(2).find('.error-message').html('Required');
            }

            mod.rows.eq(2).toggleClass('error', !emailIsValid);
            isValid = isValid && emailIsValid;

            mod.vars.message = mod.fwg.val();
            mod.rows.eq(3).toggleClass('error', !mod.vars.message || mod.vars.message == 'Message');
            isValid = isValid && mod.vars.message && mod.vars.message != 'Message';

            return isValid;
        };

        /*---------------------------------------------------------*/
        /* function         : processErrors
         /* description  : process any server-side error messages
         /*---------------------------------------------------------*/
        mod.processErrors = function(errors) {

            var errorfwg = errors.csrf
                ? 'CSRF Token Expired.  <a href="/contact/" style="color:red">Click to Reload Page</a>'
                : 'Please correct the errors below';

            mod.rows.eq(0).toggleClass('error', errors.hasOwnProperty('recipient'));
            mod.rows.eq(1).toggleClass('error', errors.hasOwnProperty('name'));

            var emailRow = mod.rows.eq(7);
            emailRow.toggleClass('error', errors.hasOwnProperty('email'));

            if (errors.email) {
                emailRow.find('.error-message').html(errors.email[0]);
            }

            mod.rows.eq(8).toggleClass('error', errors.hasOwnProperty('comment'));

            mod.showErrorMessage(errorfwg);
        };

        /*---------------------------------------------------------*/
        /* function         : showErrorMessage
         /* description  : display top error message and scroll up
         /*---------------------------------------------------------*/
        mod.showErrorMessage = function (errorfwg) {
            errorfwg = errorfwg || 'Error processing your submission.  Please try again later.';
            mod.success.css('display', 'none');
            mod.error.html(errorfwg).css('display', 'block');
            mod.body.animate({scrollTop: mod.vars.topOffset }, 1000);
        };

        /*---------------------------------------------------------*/
        /* function         : showSuccess
         /* description  : show successful form submission
         /*---------------------------------------------------------*/
        mod.showSuccess = function() {
            mod.rows.removeClass('error');
            $('.column').removeClass('error');
            mod.error.css('display', 'none');
            mod.success.css('display', 'block');
            mod.body.animate({scrollTop: mod.vars.topOffset }, 1000);
            var contactForm = $('#contact-us-form');
            contactForm[0].reset();
            contactForm.hide();
        };

        /* full power */
        return(mod.init());
    }) (SorcWeb);
});
/*-----------------------------------------------------------*/

