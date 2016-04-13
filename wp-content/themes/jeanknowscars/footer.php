<?php
/**
 * The template for displaying footer
 * @package Jean_Knows_Cars
 */
//import_scripts();

function import_scripts(){
   include_once 'import-scripts/import_attachments_1.php';
   # include_once 'import-scripts/import_article.php';
   # include_once 'import-scripts/import_contributers.php';
}
?>

    <!--Footer-->
    <footer itemscope="" itemtype="http://schema.org/WPFooter">
    <div class="mod-footer">
        <span class="footer-mobile-back-top">Back to Top</span>
        <div class="footer-wrapper clearfix">
            <h4 class="logo-tablet hidden-desktop"><a class="title-link noHighlight" href="<?php esc_url(home_url('/')); ?>" title="Jean Knows Cars"><span class="hidden">Jean Knows Cars</span></a></h4>
            <div class="column column-one">
                <div class="nav-list-wrapper" id="nav-obf"></div>
                <!--Navigation-Links-->
                <?php get_template_part('template-parts/navigation','footer'); ?>
            </div>
            <div class="column column-two-mobile column-two clearfix">
                <div class="site-banner">
                    <a class="logo" href="#" title="Jean Knows Cars">
                        <img height="124" width="172" itemprop="logo" alt="Jean Knows Cars" src="<?php bloginfo('template_url');?>/assets/img/logo.png?v=1" class="logo-img">
                    </a>
                    <!-- social-links-footer -->                 
                    <?php echo do_shortcode( '[social_links name="footer"]' ) ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!--Page End -->
<!--<script type="text/javascript" src="http://a.postrelease.com/serve/load.js?async=true"></script>-->
            
<div class="third-party-scripts">
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-56087607-1', 'auto');
    ga('send', 'pageview');
</script>
</div>
            
<!--Facebook-Login-->
<?php get_template_part('template-parts/facebook','login'); ?>
                        
<div style="position: absolute; left: -9999px; top: -9999px;"><object type="application/x-shockwave-flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="1" height="1" id="moatMessageSender8036232583"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="false"><param name="movie" value="http://z.moatads.com/swf/MessageSenderV4.swf"><param name="FlashVars" value="r=MoatSuperV12.yh.zb&amp;s=MoatSuperV12.yh.zc&amp;e=MoatSuperV12.yh.zd&amp;td=afs.moatads.com"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed type="application/x-shockwave-flash" src="http://z.moatads.com/swf/MessageSenderV4.swf" quality="high" flashvars="r=MoatSuperV12.yh.zb&amp;s=MoatSuperV12.yh.zc&amp;e=MoatSuperV12.yh.zd&amp;td=afs.moatads.com" bgcolor="#ffffff" width="1" height="1" id="moatMessageSenderEmbed8036232583" align="middle" allowscriptaccess="always" allowfullscreen="false"></object></div>
<div style="position: absolute; left: -9999px; top: -9999px;"><object type="application/x-shockwave-flash" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="1" height="1" id="moatCap"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="false"><param name="movie" value="http://z.moatads.com/swf/cap.swf"><param name="quality" value="high"><param name="bgcolor" value="#ffffff"><embed type="application/x-shockwave-flash" src="http://z.moatads.com/swf/cap.swf" quality="high" bgcolor="#ffffff" width="1" height="1" id="moatCapEmbed" align="middle" allowscriptaccess="always" allowfullscreen="false"></object></div>
<iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>
<iframe id="google_osd_static_frame_6502992101013" name="google_osd_static_frame" style="display: none; width: 0px; height: 0px;"></iframe>
<script> 
    function checkmeNotEmpty(){
            var x = document.getElementById("jkc_searchfield").value;
            if( (x.trim()).length == 0  ){
                return false;
            }
    }
</script>
<?php wp_footer(); ?>
</body>
</html>
