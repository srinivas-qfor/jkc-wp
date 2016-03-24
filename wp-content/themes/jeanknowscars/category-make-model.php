<?php
/*
 * Template Name: Make Model
 * Description: Page template with car categories
 */

include_once  (ABSPATH .'wp-admin/includes/taxonomy.php');


get_header(); 



## Loading CSS for front page
wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-make', get_template_directory_uri() . '/assets/css/mod-browse-by-make.css',null,null,"screen" );
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );

wp_enqueue_style( 'mod-list-item-vehicle', get_template_directory_uri() . '/assets/css/mod-list-item-vehicle.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more-vehicle', get_template_directory_uri() . '/assets/css/mod-load-more-vehicle.css',null,null,"screen" );

## Loading js for front page
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
     'parent' => 119
    ) );



?>

<!-- -->
        
<div class="row">
    <div class="main-column left col-17">
        <!-- breadcrumb-->
        <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   
        <div class="mod-title">
            <h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
            <div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
        </div>
        <!-- -->

        <div class="mod-list-item-vehicle-wrap">
                            <h3>Browse all GMC Cars</h3>
                    <div class="load-more-well clearfix">
        <div class="mod-list-item-vehicle left col-21 first-page first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="2015 GMC Canyon" height="387" width="620" >
                    <a href="/new-cars/gmc/2015-gmc-canyon/" title="2015 GMC Canyon" class="img-hover">
                        <span>
                            See this model
                        </span>
                    </a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/new-cars/gmc/2015-gmc-canyon/" title="2015 GMC Canyon">2015 GMC Canyon</a></h4>
                                        <div class="tags-wrap clearfix">
                                                    <div class="year">Year: <span>2015</span></div>
                                            </div>
                                        <div class="desc">Comfy ride with truck DNA.</div>
                </div>
                <div class="social clearfix">
                    <span class="share-btn left">Share</span>
                    <div class="mod-addthis-hover">
                        <div class="addthis_toolbox" addthis:url="http://dev.int.jeanknowscars.com//new-cars/gmc/2015-gmc-canyon/" addthis:title="2015 GMC Canyon">
                            <span class="addthis-share left">Share</span>
                        <a class="addthis_button_facebook_like at300b" fb:like:layout="button_count" fb:like:href="http://dev.int.jeanknowscars.com//new-cars/gmc/2015-gmc-canyon/"><div class="fb-like fb_iframe_widget" data-ref=".VulQZXe4ZXQ.like" data-layout="button_count" data-href="http://dev.int.jeanknowscars.com//new-cars/gmc/2015-gmc-canyon/" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-font="arial" data-send="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=531130537018074&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2Fgmc%2F2015-gmc-canyon%2F&amp;layout=button_count&amp;locale=en_US&amp;ref=.VulQZXe4ZXQ.like&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 78px; height: 20px;"><iframe name="fb3ad363acc634" width="90px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?action=like&amp;app_id=531130537018074&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df6f0b39545a4d4%26domain%3Ddev.int.jeanknowscars.com%26origin%3Dhttp%253A%252F%252Fdev.int.jeanknowscars.com%252Ff3abbf7b5b09728%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2Fgmc%2F2015-gmc-canyon%2F&amp;layout=button_count&amp;locale=en_US&amp;ref=.VulQZXe4ZXQ.like&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" class="" style="border: none; visibility: visible; width: 78px; height: 20px;"></iframe></span></div></a><a class="addthis_button_tweet at300b" tw:via="jeanknowscars"><iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.b9740740e0bcf9b0657c5b11bd4388da.en.html#dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;original_referer=http%3A%2F%2Fdev.int.jeanknowscars.com%2Fgmc%2F&amp;size=m&amp;text=2015%20GMC%20Canyon&amp;time=1458131046269&amp;type=share&amp;url=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2Fgmc%2F2015-gmc-canyon%2F%23.VulQZegMFkU.twitter&amp;via=jeanknowscars" data-url="http://dev.int.jeanknowscars.com//new-cars/gmc/2015-gmc-canyon/#.VulQZegMFkU.twitter" style="position: static; visibility: visible; width: 60px; height: 20px;"></iframe></a><a class="addthis_button_pinterest_pinit at300b"><span class="at_PinItButton"></span></a><a class="addthis_counter addthis_pill_style" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact"><span></span></a><a class="addthis_button_expanded" target="_blank" title="View more services" href="#"></a></a><div class="atclear"></div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mod-list-item-vehicle left col-21 first-page  first-row">
            <div class="row">
                <div class="img-wrap">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="2015 GMC Canyon" height="387" width="620" >
                    <a href="/new-cars/gmc/2015-gmc-canyon/" title="2015 GMC Canyon" class="img-hover">
                        <span>
                            See this model
                        </span>
                    </a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/new-cars/2015-gmc-yukon-xl/" title="2015 GMC Yukon XL">2015 GMC Yukon XL</a></h4>
                                        <div class="tags-wrap clearfix">
                                                    <div class="year">Year: <span>2015</span></div>
                                            </div>
                                        <div class="desc">Better than ever.</div>
                </div>
                <div class="social clearfix">
                    <span class="share-btn left">Share</span>
                    <div class="mod-addthis-hover">
                        <div class="addthis_toolbox" addthis:url="http://dev.int.jeanknowscars.com//new-cars/2015-gmc-yukon-xl/" addthis:title="2015 GMC Yukon XL">
                            <span class="addthis-share left">Share</span>
                        <a class="addthis_button_facebook_like at300b" fb:like:layout="button_count" fb:like:href="http://dev.int.jeanknowscars.com//new-cars/2015-gmc-yukon-xl/"><div class="fb-like fb_iframe_widget" data-ref=".VulQZQYJNNw.like" data-layout="button_count" data-href="http://dev.int.jeanknowscars.com//new-cars/2015-gmc-yukon-xl/" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-font="arial" data-send="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=531130537018074&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2F2015-gmc-yukon-xl%2F&amp;layout=button_count&amp;locale=en_US&amp;ref=.VulQZQYJNNw.like&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 78px; height: 20px;"><iframe name="f1968331443a39c" width="90px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?action=like&amp;app_id=531130537018074&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df3d7d81b06b24f4%26domain%3Ddev.int.jeanknowscars.com%26origin%3Dhttp%253A%252F%252Fdev.int.jeanknowscars.com%252Ff3abbf7b5b09728%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2F2015-gmc-yukon-xl%2F&amp;layout=button_count&amp;locale=en_US&amp;ref=.VulQZQYJNNw.like&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" class="" style="border: none; visibility: visible; width: 78px; height: 20px;"></iframe></span></div></a><a class="addthis_button_tweet at300b" tw:via="jeanknowscars"><iframe id="twitter-widget-2" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="http://platform.twitter.com/widgets/tweet_button.b9740740e0bcf9b0657c5b11bd4388da.en.html#dnt=false&amp;id=twitter-widget-2&amp;lang=en&amp;original_referer=http%3A%2F%2Fdev.int.jeanknowscars.com%2Fgmc%2F&amp;size=m&amp;text=2015%20GMC%20Yukon%20XL&amp;time=1458131046271&amp;type=share&amp;url=http%3A%2F%2Fdev.int.jeanknowscars.com%2F%2Fnew-cars%2F2015-gmc-yukon-xl%2F%23.VulQZdA2qHY.twitter&amp;via=jeanknowscars" data-url="http://dev.int.jeanknowscars.com//new-cars/2015-gmc-yukon-xl/#.VulQZdA2qHY.twitter" style="position: static; visibility: visible; width: 60px; height: 20px;"></iframe></a><a class="addthis_button_pinterest_pinit at300b"><span class="at_PinItButton"></span></a><a class="addthis_counter addthis_pill_style" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact"><span></span></a><a class="addthis_button_expanded" target="_blank" title="View more services" href="#"></a></a><div class="atclear"></div></div>
                    </div>
                </div>
            </div>
        </div>
            
            
            </div>
        </div>

        <div class="mod-load-more-vehicle clearfix">
        <div class="right">
                    <span class="first"><i class="fa fa-step-backward"></i></span>
                    <span class="prev"><i class="fa fa-caret-left"></i></span>
            
            <?php echo paginate_links( array(
                            'format' => 'page-%#%',
                            'next_text'=> __('')));?>

                    <span class="next"><i class="fa fa-caret-right"></i></span>
                    <span class="last"><i class="fa fa-step-forward"></i></span>
                    
        
        </div>
        </div>



        <!-- <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
            ) );
            ?> -->

    </div>
    <!--left side-->


    <!--right side -->            
    <div class="right-column right col-18">
            <div class="mod-car-confession clearfix">
                <div class="wrap">
                <h3>Car Confessions</h3>
                <h4>A Pretty Place for Ugly Secrets</h4>
                <a class="btn-alt-cta" href="/confessions/">Confess Here</a>
                </div>
            </div>
            <!-- AdSlot 2 -->        
            <?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]'); ?>
            <!-- End AdSlot 2 -->

            <?php echo do_shortcode( '[stay_connected]' ) ?>

            <!-- AdSlot 3 -->        
            <?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]'); ?>
            <!-- End AdSlot 3 -->



    </div>
</div>

<?php get_footer(); ?>	

<script type="text/javascript">

//var acur = ["ILX","MDX","RDX","RL","TL","TSX","ZDX"];


    $(document).ready(function(){ 
              // $("#makes").change(function () {
              //   var mak = $('#makes option:selected').text();

              //     if (mak == "Acura"){

              //       $.each(acur, function( index, value ) {
              //        $("#model").append("<option value=" + value + ">" + value +"</option>");
              //       });
              //     }

              //  });

             // $base = get_site_url();
             // var foo;
             //  $("#makes").change(function () {
             //        $(".make_top").text($('#makes option:selected').text());
             //        foo = $('#makes option:selected').text();
             //        $.ajax({
             //            type: "POST",
             //            data: {'name':foo}, 
             //            success: function(data){
             //            alert("success");
             //        }});

                  
                    
             //    });

              // var currentpage = "<?php echo $base ?>";
              // alert(currentpage +/foo /+ );
              //$(".check").click(function(){
                //var currentpage = "<?php echo $base ?>";
                //alert(currentpage +'/'+foo+'/');


              //});

            //   var arrayFromPHP = <?php echo json_encode($model_list); ?>;
            // $.each(arrayFromPHP, function( index, value ) {
            //           $("#model").append("<option value=" + value + ">" + value +"</option>");
            // });

            



            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

            var maketext = "";

              $("#makes").change(function () {
                    $(".make_top").text($('#makes option:selected').text());
                    maketext = $('#makes option:selected').text();
                    $.ajax({
                        url :ajax_url,
                        type: "POST",
                        data : {
                            action : 'post_love_add_love',
                            name : maketext
                        }, 
                        success: function(data){
                            var models = JSON.parse(data);
                            $.each(models, function( index, value ) {
                              $("#model").append("<option value=" + value + ">" + value +"</option>");
                                });

                            $("#make_model_go").removeClass('disabled');
                            $(".dropdown-custom span").removeClass('disabled');
                            $("select#model").removeAttr('disabled');
                            
                        }});
                }); 
                var modeltext = "";
                $("#model").change(function () {  
                    $(".model_top").text($('#model option:selected').text());
                    modeltext = $('#model option:selected').text();

                }); 


                // $("#make_model_go").click(function(){
                //     maketext = $('#makes option:selected').text();
                //      modeltext = $('#model option:selected').text();
                //     if(maketext != " "){
                      
                //       alert(maketext);  
                //     }

                    
                //     if((modeltext != " ") && (maketext != " ")){
                    
                //     alert(modeltext);
                //     }

                // });

                
                 

                

    });

</script>