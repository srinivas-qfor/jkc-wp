<?php

/**
 * The template for displaying pages
 * @package Jean_Knows_Cars
 */

get_header(); 



## Loading CSS for pages
wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css',null,null,"screen" );
wp_enqueue_style( 'mod-sort-by-category', get_template_directory_uri() . '/assets/css/mod-sort-by-category.css',null,null,"screen" );
#wp_enqueue_style( 'mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css',null,null,"screen" );
#wp_enqueue_style( 'mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css',null,null,"screen" );
#wp_enqueue_style( 'mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css',null,null,"screen" );
#wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item', get_template_directory_uri() . '/assets/css/mod-list-item.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
#wp_enqueue_style( 'mod-title-block', get_template_directory_uri() . '/assets/css/mod-title-block.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );

## Loading js for front page

#wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);
#wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true);
wp_enqueue_script( 'mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 

?>

<!--Breadcrumb-->
<div class="content-top-wrap">
    <div class="row">
            <!--Navigation-Links-->
            <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   

            <div class="mod-title">
                <?php if ( have_posts() ) :
                        // Start the loop.
                        while ( have_posts() ) : the_post();
                        global $post;
                        // echo "<pre>";
                        // print_r($post);
                        // echo "</pre>";
                        // echo '<h1 class="pagetitle" itemprop="name">'.$post->post_title.'</h1>';
                        // echo '<div class="desc">'.the_content().'</div>';
                        // End the loop.
                        the_content();
                        endwhile;
                      endif; 
                ?>
            </div> 
    </div>
</div>


<!--feature-wrap-->
<div class="feature-wrap">
            <div class="row">
                 <!--Flipper-->
                <?php
                    if (class_exists( 'Flipper' ) && shortcode_exists( 'flipper' ))                    
                    echo do_shortcode( '[flipper name="home-flipper"]' ) 
                ?> 
                <!-- life-with-jean -->                 
                <?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
        </div>
</div>


<!--ad-top-wrap-->
   <div class="ad-top-wrap">
                <div class="row row-padding">                    
                    <!-- GPT-top-add -->                 
                     <?php echo do_shortcode( '[gpt_add_block name="gpt-top-ad"]' ) ?>               
                    <!-- Car-Confessions -->                 
                     <?php echo do_shortcode( '[add_block name="car-confessions"]' ) ?>  
                </div>
    </div>    



<!--category-->
            <div class="row row-padding">
            <div class="main-column">
                <div class="mod-sort-by-category">
    <h3>Sort by Category</h3>
    <ul class="clearfix">
        <li>
            <span>                View All
            </span>        </li>
                <li>
            <a href="/jeans-driveway/at-home/">                At Home            </a>        </li>
                <li>
            <a href="/jeans-driveway/designer-walkaround/">                Designer Walkaround            </a>        </li>
                <li>
            <a href="/jeans-driveway/car-on-the-road/">                On the Road            </a>        </li>
            </ul>
</div>            <div class="mod-list-item-wrap">
        <div class="load-more-well clearfix">
                <div class="mod-list-item left col-18 first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/" title="2017 Volvo S90: Designer Walkaround">
                        <img src="http://image.jeanknowscars.com/f/95937843+w288+h140+re0+cr1+ar0/volvo-s90-promolarge.jpg" alt="2017 Volvo S90: Designer Walkaround" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/designer-walkaround/">Designer Walkaround</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/" title="2017 Volvo S90: Designer Walkaround">2017 Volvo S90: Designer Walkaround</a></h4>
                                        <div class="desc">Video: Volvo's Orjan Sterner showed me the pure lines and fabulous tech on the new flagship.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/" title="2017 Chevrolet Bolt: Walkaround">
                        <img src="http://image.jeanknowscars.com/f/95940858+w288+h140+re0+cr1+ar0/chevrolet-bolt-header.jpg" alt="2017 Chevrolet Bolt: Walkaround" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/designer-walkaround/">Designer Walkaround</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/" title="2017 Chevrolet Bolt: Walkaround">2017 Chevrolet Bolt: Walkaround</a></h4>
                                        <div class="desc">Video: A look inside the surprisingly spacious new EV from GM with design director Stuart Norris.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/car-on-the-road/2016-honda-odyssey-5-more-cool-things/" title="2016 Honda Odyssey: 5 More Cool Things">
                        <img src="http://image.jeanknowscars.com/f/98625733+w288+h140+re0+cr1+ar0/odyssey-promo.jpg" alt="2016 Honda Odyssey: 5 More Cool Things" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/car-on-the-road/">On the Road</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/car-on-the-road/2016-honda-odyssey-5-more-cool-things/" title="2016 Honda Odyssey: 5 More Cool Things">2016 Honda Odyssey: 5 More Cool Things</a></h4>
                                        <div class="desc">Five great features that make the Odyssey so desirable. Video.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18 first-col ">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/car-on-the-road/2016-honda-odyssey-5-cool-things/" title="2016 Honda Odyssey: 5 Cool Things">
                        <img src="http://image.jeanknowscars.com/f/98625805+w288+h140+re0+cr1+ar0/odyssey-promo.jpg" alt="2016 Honda Odyssey: 5 Cool Things" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/car-on-the-road/">On the Road</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/car-on-the-road/2016-honda-odyssey-5-cool-things/" title="2016 Honda Odyssey: 5 Cool Things">2016 Honda Odyssey: 5 Cool Things</a></h4>
                                        <div class="desc">Five features that make the Odyssey the perfect minivan for a hip family. Video.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  ">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/car-on-the-road/2016-honda-accord-5-cool-things/" title="2016 Honda Accord: 5 Cool Things">
                        <img src="http://image.jeanknowscars.com/f/95838924+w288+h140+re0+cr1+ar0/accord-promolarge.jpg" alt="2016 Honda Accord: 5 Cool Things" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/car-on-the-road/">On the Road</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/car-on-the-road/2016-honda-accord-5-cool-things/" title="2016 Honda Accord: 5 Cool Things">2016 Honda Accord: 5 Cool Things</a></h4>
                                        <div class="desc">One of America's favorite sedans now offers a suite of safety and driver assist technologies. Video.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18 item-ads data-ads" data-ads="2">
            <div id="div-gpt-ad-110057376862217179-2">
                <script type="text/javascript">
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-2'); });
                </script>
            <div id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" width="300" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
        </div>
                    <div class="mod-list-item left col-18 first-col ">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/car-on-the-road/2016-honda-civic-5-cool-things/" title="2016 Honda Civic: 5 Cool Things">
                        <img src="http://image.jeanknowscars.com/f/98625811+w288+h140+re0+cr1+ar0/civic-promo.jpg" alt="2016 Honda Civic: 5 Cool Things" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/car-on-the-road/">On the Road</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/car-on-the-road/2016-honda-civic-5-cool-things/" title="2016 Honda Civic: 5 Cool Things">2016 Honda Civic: 5 Cool Things</a></h4>
                                        <div class="desc">The Civic is back, better than ever, with the first turbo engine available on a U.S. Honda. Video.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  ">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/" title="2016 Honda Pilot: 5 Cool Things">
                        <img src="http://image.jeanknowscars.com/f/98625817+w288+h140+re0+cr1+ar0/pilot-promo.jpg" alt="2016 Honda Pilot: 5 Cool Things" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/car-on-the-road/">On the Road</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/" title="2016 Honda Pilot: 5 Cool Things">2016 Honda Pilot: 5 Cool Things</a></h4>
                                        <div class="desc">Intelligent traction management is just one of our favorite options on the all-new Pilot. Video.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  ">
            <div class="row">
                <div class="img-wrap">
                    <a href="/jeans-driveway/designer-walkaround/buick-avista-concept-walkaround/" title="Buick Avista Concept: Walkaround">
                        <img src="http://image.jeanknowscars.com/f/168884387+w288+h140+re0+cr1+ar0/buick-avista-promolarge.jpg" alt="Buick Avista Concept: Walkaround" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/jeans-driveway/designer-walkaround/">Designer Walkaround</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/jeans-driveway/designer-walkaround/buick-avista-concept-walkaround/" title="Buick Avista Concept: Walkaround">Buick Avista Concept: Walkaround</a></h4>
                                        <div class="desc">Star of the Detroit show: In this video, exterior design manager Chip Thole gave me the full story.</div>
                </div>
            </div>
        </div>
                        </div>
        </div>
        <div class="mod-load-more" data-current-page-id="1" data-last-page-id="17" data-route="http://www.jeanknowscars.com/jeans-driveway/" data-lazy-count="0" data-show-count="0" data-replace-state="0" data-page="jeans-driveway">
            <a class="button btn-main-cta" href="http://www.jeanknowscars.com/jeans-driveway/page-2/" title="Load more">
            <span class="btn-text">Load more</span>
            <i class="fa fa-refresh fa-spin"></i>
        </a>
        </div>
            </div>
        </div> 

<?php get_footer(); ?>
