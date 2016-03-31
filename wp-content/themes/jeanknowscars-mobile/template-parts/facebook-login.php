<?php
//$brand = $this->getBrands(6202044);
$brand['fbAppId'] = '531130537018074';
$brand['fbAppModerators'] = '370524939772838,749615665111576,696110150496589,969473583066130';
$fbAppModerators = explode(',', $brand['fbAppModerators']);
?>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo $brand['fbAppId'] ?>&version=v2.1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    };

    var fbAppModerators = {};
    <?php foreach ($fbAppModerators as $fbAdmin) { ?>
    fbAppModerators['<?php echo $fbAdmin ?>'] = '<?php echo $fbAdmin ?>';
    <?php } ?>

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        console.log('Called statusChangeCallback');
        console.log(response);
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            if ($('.mod-confessions-form').length) {
                $('.auto-login-container').addClass('hide');
                $('.post-confession-form').removeClass('hide');
            }
            if ($('.mod-faq-form').length) {
                $('.auto-login-container').addClass('hide');
                $('.post-faq-form').removeClass('hide');
            }

            console.log('Logged into your app and Facebook. Fetching your information.... ');

            // Logged into your app and Facebook.
            FB.api('/me', function(response) {
                $('.mod-header .user-info').attr('data-uid', response.id).attr('data-fname', response.name).attr('data-uname', response.username).html('Welcome <span>' + response.name + '</span>');
                $('.post-faq-form .username').html(response.name);
                if ($('.mod-faq-form').length) {
                    var isMod = false;
                    for (var k in fbAppModerators) {
                        if (k == response.id) {
                            isMod = true;
                            $('.mod-filter-confessions-faq').append('<a class="management-link right btn-alt-cta" rel="nofollow" href="/ask-jean-question/management/">Answer Pending Question</a>');
                            break;
                        }
                    }
                    if (!isMod && $('body').hasClass('faq-management')) {
                        window.location.href = '/ask-jean-question/';
                    }
                }
            });
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            console.log('The person is logged into Facebook, but not your app');
            if ($('.mod-confessions-form').length) {
                $('.post-confession-form').addClass('hide');
                $('.auto-login-container').removeClass('hide');
            }
            if ($('.mod-faq-form').length) {
                $('.post-faq-form').addClass('hide');
                $('.auto-login-container').removeClass('hide');
                $('.management-link').remove();
            }
            $('.mod-header .user-info').removeAttr('data-uid').removeAttr('data-fname').removeAttr('data-uname').html('');
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            console.log('The person is not logged into Facebook');
            if ($('.mod-confessions-form').length) {
                $('.post-confession-form').addClass('hide');
                $('.auto-login-container').removeClass('hide');
            }
            if ($('.mod-faq-form').length) {
                $('.post-faq-form').addClass('hide');
                $('.auto-login-container').removeClass('hide');
                $('.management-link').remove();
            }
            $('.mod-header .user-info').removeAttr('data-uid').removeAttr('data-fname').removeAttr('data-uname').html('');
        }
    }
</script>        
            
           
