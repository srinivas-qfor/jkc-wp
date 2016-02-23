<?php
/*
 * To display Social Links
 */
?>
<div class="header-jkc-top-right right">
    <div class="u-option u-option-social">
        <div class="u-option u-option-login clearfix">
            <div class="left user-info"></div>
            <div class="left fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" onlogin="checkLoginState();"></div>
        </div>
        <!-- social-links-top -->                 
        <?php echo do_shortcode( '[social_links name="header"]' ) ?>
    </div>
<!--    <div class="search-cont">
        <input class="search" type="text" placeholder="Type your search here..." tabindex="1">
        <div class="search-btn" tabindex="2"><i class="fa fa-search"></i></div>
    </div>-->
</div>
