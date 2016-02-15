<?php
/**
 * The main template file
 * @package Jean_Knows_Cars
 */       
get_header();

## Loading CSS for front page
wp_enqueue_style( 'lay-home', get_template_directory_uri() . '/assets/css/lay-home.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css',null,null,"screen" );
wp_enqueue_style( 'mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item', get_template_directory_uri() . '/assets/css/mod-list-item.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'mod-title-block', get_template_directory_uri() . '/assets/css/mod-title-block.css',null,null,"screen" );

## Loading js for front page
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true);
wp_enqueue_script( 'mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true);  
?>

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

<div class="ad-top-wrap">
    <div class="row row-padding">                
         <!-- GPT-top-add -->                 
         <?php echo do_shortcode( '[gpt_add_block name="gpt-top-ad"]' ) ?>               
        <!-- Car-Confessions -->                 
         <?php echo do_shortcode( '[add_block name="car-confessions"]' ) ?>                 
    </div>
</div>
        
        <div class="homeA-wrap grey-wrap">
            <div class="row row-padding">
                <div class="homeA-left-wrap left col-17">
                        <div class="mod-title-block ">
        <div class="headline">
            <h2>
                                <a href="/jeans-driveway/" title="Jean's Driveway">
                                        Jean's Driveway                                    </a>
                        </h2>
                            <h3>Short, Sweet Car Reviews.</h3>
                    </div>
    </div>
            <div class="mod-list-item-wrap">
        <div class="load-more-disabled clearfix">
                <div class="mod-list-item left col-22 first-col first-row">
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
                    <div class="mod-list-item left col-22  first-row">
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
                        </div>
        </div>
                    </div>
                <div class="homeA-right-wrap right col-18">
                    <div class="mod-ad-mrec ctr-side" itemscope="" itemtype="http://schema.org/WPAdBlock">
    <!-- Beginning Async AdSlot 2 for Ad unit trb.latimes/jeanknowscars  ### size: [[300,600],[300,250]] -->
    <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[2]]) -->
    <div id="div-gpt-ad-110057376862217179-2">
        <script type="text/javascript">
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-2'); });
        </script><iframe src="http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html" style="visibility: hidden; display: none;"></iframe>
    <div id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" width="300" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
    <!-- End AdSlot 2 -->
</div>
                </div>
            </div>
        </div>

        <div class="homeB-wrap">
            <div class="row row-padding">
                <div class="homeB-left-wrap left col-17">
                        <div class="mod-title-block border-bottom">
        <div class="headline">
            <h2>
                                    Car Guide                                </h2>
                            <h3>Find Your Best Car Here.</h3>
                    </div>
    </div>
<div class="mod-filter-make-model">
    <div class="shop-wrapper clearfix">
                    <span class="tease">I already have a vehicle in mind: </span>
                <div class="mod-shop-makemodel right">
            <div class="makeDropdown">
                <div class="dropdown-custom"><select data-type="make" style="z-index: 10; opacity: 0; width: 170px;">
                    <option value="">Choose Make</option>
                    <option value="Acura">Acura</option><option value="Alfa Romeo">Alfa Romeo</option><option value="Aston Martin">Aston Martin</option><option value="Audi">Audi</option><option value="Avanti">Avanti</option><option value="BMW">BMW</option><option value="Bentley">Bentley</option><option value="Bugatti">Bugatti</option><option value="Buick">Buick</option><option value="Cadillac">Cadillac</option><option value="Chevrolet">Chevrolet</option><option value="Chrysler">Chrysler</option><option value="Dodge">Dodge</option><option value="Ferrari">Ferrari</option><option value="Fiat">Fiat</option><option value="Fisker">Fisker</option><option value="Ford">Ford</option><option value="GMC">GMC</option><option value="Genesis">Genesis</option><option value="Honda">Honda</option><option value="Hyundai">Hyundai</option><option value="Infiniti">Infiniti</option><option value="Jaguar">Jaguar</option><option value="Jeep">Jeep</option><option value="Kia">Kia</option><option value="Lamborghini">Lamborghini</option><option value="Land Rover">Land Rover</option><option value="Lexus">Lexus</option><option value="Lincoln">Lincoln</option><option value="Lotus">Lotus</option><option value="MINI">MINI</option><option value="Maserati">Maserati</option><option value="Mazda">Mazda</option><option value="McLaren">McLaren</option><option value="Mercedes-Benz">Mercedes-Benz</option><option value="Mitsubishi">Mitsubishi</option><option value="Nissan">Nissan</option><option value="Porsche">Porsche</option><option value="Ram">Ram</option><option value="Rolls Royce">Rolls Royce</option><option value="SRT">SRT</option><option value="Scion">Scion</option><option value="Smart">Smart</option><option value="Subaru">Subaru</option><option value="Suzuki">Suzuki</option><option value="Tesla">Tesla</option><option value="Toyota">Toyota</option><option value="Volkswagen">Volkswagen</option><option value="Volvo">Volvo</option>                </select><span class="dropdown-custom-select" style="width: 118px;"><p>Choose Make</p></span></div>
            </div>
            <div class="modelDropdown">
                <div class="dropdown-custom"><select data-type="model" class="" style="z-index: 10; opacity: 0; width: 170px;" disabled="disabled">
                    <option value="">Choose Model</option>
                </select><span class="dropdown-custom-select disabled" style="width: 118px;"><p>Choose Model</p></span></div>
            </div>
        <a href="javascript:void(0)" class="mod-shop-cta btn-main-cta disabled btn-vehicle-dropdown">Go</a></div>
    </div>
</div><div class="mod-browse-by-vehicle-type">
        <ul class="tiles">
                <li class="tile tile-family">
            <a href="/family/" class="tile-link" title="Family"><span class="tile-name">Family</span></a>
        </li>
                        <li class="tile tile-first-car">
            <a href="/first-car/" class="tile-link" title="First Car"><span class="tile-name">First Car</span></a>
        </li>
                        <li class="tile tile-sporty">
            <a href="/sporty/" class="tile-link" title="Sporty"><span class="tile-name">Sporty</span></a>
        </li>
                        <li class="tile tile-adventure">
            <a href="/adventure/" class="tile-link" title="Adventure"><span class="tile-name">Adventure</span></a>
        </li>
            </ul>
            <div class="view-all-categories">
            <a class="btn-alt-cta" href="/new-cars/" title="View All 12 Categories">View All 12 Categories</a>
        </div>
    </div>                </div>
                <div class="homeB-right-wrap right col-18">
                                    </div>
            </div>
        </div>

        <div class="homeC-wrap grey-wrap">
            <div class="row row-padding">
                <div class="homeC-left-wrap left col-17">
                        <div class="mod-title-block ">
        <div class="headline">
            <h2>
                                <a href="/kids-in-the-car/" title="Kids in the Car">
                                        Kids in the Car                                    </a>
                        </h2>
                            <h3>From 0 to 18 in What Feels Like Seconds.</h3>
                    </div>
    </div>
            <div class="mod-list-item-wrap">
        <div class="load-more-disabled clearfix">
                <div class="mod-list-item left col-22 first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/kids-in-the-car/big-kids/5-ways-to-keep-kids-safe-in-the-car/" title="5 Ways to Keep Kids Safe in the Car">
                        <img src="http://image.jeanknowscars.com/f/129316220+w288+h140+re0+cr1+ar0/yes-nhtsa-promolarge.jpg" alt="5 Ways to Keep Kids Safe in the Car" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/kids-in-the-car/big-kids/">Big Kids</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/kids-in-the-car/big-kids/5-ways-to-keep-kids-safe-in-the-car/" title="5 Ways to Keep Kids Safe in the Car">5 Ways to Keep Kids Safe in the Car</a></h4>
                                        <div class="desc">What you can do today, and every day, that will immediately help.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-22  first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/kids-in-the-car/big-kids/teach-preschooler-to-drive/" title="Teach Your Preschooler How to Drive">
                        <img src="http://image.jeanknowscars.com/f/162268976+w288+h140+re0+cr1+ar0/preschool-homepage.jpg" alt="Teach Your Preschooler How to Drive" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/kids-in-the-car/big-kids/">Big Kids</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/kids-in-the-car/big-kids/teach-preschooler-to-drive/" title="Teach Your Preschooler How to Drive">Teach Your Preschooler How to Drive</a></h4>
                                        <div class="desc">Between toddlerhood and driver ed, you've got more than a decade of teaching time. Don't waste it.</div>
                </div>
            </div>
        </div>
                        </div>
        </div>
                    </div>
                <div class="homeC-right-wrap right col-18">
                    <div class="mod-ad-mrec mod-ad-mrec-bottom ctr-side" itemscope="" itemtype="http://schema.org/WPAdBlock">
    <!-- Beginning Async AdSlot 3 for Ad unit trb.latimes/jeanknowscars  ### size: [[300,600],[300,250]] -->
    <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[3]]) -->
    <div id="div-gpt-ad-110057376862217179-3">
        <script type="text/javascript">
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-3'); });
        </script><div id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2" width="300" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div>
    <iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__hidden__" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__hidden__" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
    <!-- End AdSlot 3 -->
</div>
                </div>
            </div>
        </div>

        <div class="homeD-wrap">
            <div class="row row-padding">
                    <div class="mod-title-block ">
        <div class="headline">
            <h2>
                                <a href="/you-auto-know/" title="You Auto Know">
                                        You Auto Know                                    </a>
                        </h2>
                            <h3>Advice about Buying, Servicing, and Living with Your Car.</h3>
                    </div>
    </div>
            <div class="mod-list-item-wrap">
        <div class="load-more-disabled clearfix">
                <div class="mod-list-item left col-18 first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/you-auto-know/car-maintenance/rain-x-latitude-wiper-blades/" title="Rain-X Latitude Wiper Blades">
                        <img src="http://image.jeanknowscars.com/f/99129925+w288+h140+re0+cr1+ar0/wipers-promolarge.jpg" alt="Rain-X Latitude Wiper Blades" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/you-auto-know/car-maintenance/">Maintenance</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/you-auto-know/car-maintenance/rain-x-latitude-wiper-blades/" title="Rain-X Latitude Wiper Blades">Rain-X Latitude Wiper Blades</a></h4>
                                        <div class="desc">New wiper blades are a cheap fix to your quality of life. Bonus: These give you Rain-X on tap.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/you-auto-know/car-buying/2016-cadillac-ats-v/" title="2016 Cadillac ATS-V">
                        <img src="http://image.jeanknowscars.com/f/168809750+w288+h140+re0+cr1+ar0/2016-cadillac-ats-v-Promolarge.jpg" alt="2016 Cadillac ATS-V" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/you-auto-know/car-buying/">Buying</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/you-auto-know/car-buying/2016-cadillac-ats-v/" title="2016 Cadillac ATS-V">2016 Cadillac ATS-V</a></h4>
                                        <div class="desc">Bored by BMW? Meh about Mercedes? Here's the latest cool thing in performance straight from Detroit.</div>
                </div>
            </div>
        </div>
                    <div class="mod-list-item left col-18  first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="/you-auto-know/car-buying/2016-gmc-terrain-denali/" title="2016 GMC Terrain Denali">
                        <img src="http://image.jeanknowscars.com/f/95658072+w288+h140+re0+cr1+ar0/2016-gmc-terrain-denali-promo.jpg" alt="2016 GMC Terrain Denali" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/you-auto-know/car-buying/">Buying</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/you-auto-know/car-buying/2016-gmc-terrain-denali/" title="2016 GMC Terrain Denali">2016 GMC Terrain Denali</a></h4>
                                        <div class="desc">GMC’s smallest ute squeaks out another year. Its seventh.</div>
                </div>
            </div>
        </div>
                        </div>
        </div>
                </div>
        </div>

        <div class="homeE-wrap grey-wrap">
            <div class="row row-padding">
                <div class="homeE-left-wrap left col-17">
                    <div class="mod-ask-jean-question clearfix">
    <h3>Go ahead</h3>
    <h2>Ask Jean a Question</h2>
    <p>Go ahead, ask me anything about buying, servicing, and living with your car. If I don't know the answer (horror!), I know where to get it. Feel free to ask or search questions that have already been answered.</p>
    <a class="btn-main-cta" href="/ask-jean-question/" title="Ask Jean a question about car">Go ahead, ask me!</a>
</div>                </div>
                <div class="homeE-right-wrap right col-18">
                    <div class="mod-get-social ctr-side">
    <h2><strong>Get</strong> Social</h2>
    <ul class="social-links">
        <li data-rel="facebook" class="social-link-facebook active"><span></span></li>
        <li data-rel="twitter" class="social-link-twitter"><span></span></li>
        <li data-rel="instagram" class="social-link-instagram"><span></span></li>
    </ul>
    <div class="social-wrapper">
        <div class="social-ctr-facebook">
            <h3>Facebook Recent Activity</h3>
            <div class="fb-activity" data-site="jeanknowscars.com" data-width="292" data-height="240" data-header="true" data-recommendations="false"></div>
        </div>

        <div class="social-ctr-twitter">
            <h3>Twitter Recent Activity</h3>
            <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="twitter-timeline twitter-timeline-rendered" data-widget-id="343096813714300928" data-user-id="14314767" title="Twitter Timeline" style="position: static; visibility: visible; display: inline-block; width: 520px; height: 260px; padding: 0px; border: none; max-width: 100%; min-width: 180px; margin-top: 0px; margin-bottom: 0px; min-height: 200px;"></iframe>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

        <div class="social-ctr-instagram">
            <div id="mod-instagram" class="mod-instagram" style="display: block;">
                <h3 class="title">Instagram Instant Activity</h3>
                <div id="instagram-wrapper" class="instagram-wrapper">
                    <div class="dummy"></div>
                    <div class="instagram-thumbs"><div class="instagram-placeholder" id="1170742990617116773_21375191"><a target="_blank" href="https://www.instagram.com/p/BA_UIwPAwBl/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12519210_1239559786060443_1627321641_n.jpg"></a><span class="comment-count">5&nbsp;&nbsp;&nbsp; ♥ 34</span></div><div class="instagram-placeholder" id="1169028407846174748_21375191"><a target="_blank" href="https://www.instagram.com/p/BA5OSSmAwAc/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12568288_901778636609329_358139718_n.jpg"></a><span class="comment-count">5&nbsp;&nbsp;&nbsp; ♥ 72</span></div><div class="instagram-placeholder" id="1159902775849714665_21375191"><a target="_blank" href="https://www.instagram.com/p/BAYzW3ggwPp/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/12383314_1555942238064304_1032455380_n.jpg"></a><span class="comment-count">4&nbsp;&nbsp;&nbsp; ♥ 35</span></div><div class="instagram-placeholder" id="1157668950130230128_21375191"><a target="_blank" href="https://www.instagram.com/p/BAQ3cbMAwNw/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/10520343_171410896551592_571934352_n.jpg"></a><span class="comment-count">16&nbsp;&nbsp;&nbsp; ♥ 38</span></div><div class="instagram-placeholder" id="1154789865058141158_21375191"><a target="_blank" href="https://www.instagram.com/p/BAGo0ORAwPm/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/1173186_236712253326634_259654429_n.jpg"></a><span class="comment-count"> ♥ 39</span></div><div class="instagram-placeholder" id="1153641510072418987_21375191"><a target="_blank" href="https://www.instagram.com/p/BACjtdWAwKr/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c0.81.1080.1080/10817610_219789885027139_1477555896_n.jpg"></a><span class="comment-count">1&nbsp;&nbsp;&nbsp; ♥ 29</span></div><div class="instagram-placeholder" id="1153170144013517111_21375191"><a target="_blank" href="https://www.instagram.com/p/BAA4iLfgwE3/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/1516213_1661911647417365_1560010320_n.jpg"></a><span class="comment-count">8&nbsp;&nbsp;&nbsp; ♥ 76</span></div><div class="instagram-placeholder" id="1152261552238428914_21375191"><a target="_blank" href="https://www.instagram.com/p/_9p8bdgwLy/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12393995_212575475752605_70960933_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ♥ 36</span></div><div class="instagram-placeholder" id="1149736744757952524_21375191"><a target="_blank" href="https://www.instagram.com/p/_0r3pQgwAM/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/10576238_1042902705754259_694993547_n.jpg"></a><span class="comment-count">3&nbsp;&nbsp;&nbsp; ♥ 25</span></div><div class="instagram-placeholder" id="1149335460317954196_21375191"><a target="_blank" href="https://www.instagram.com/p/_zQoMAAwCU/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c38.0.1003.1003/12394036_1670844019853753_700030898_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ♥ 27</span></div><div class="instagram-placeholder" id="1149327471217410972_21375191"><a target="_blank" href="https://www.instagram.com/p/_zOz7kgwOc/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12393656_910997052312011_2135296403_n.jpg"></a><span class="comment-count">3&nbsp;&nbsp;&nbsp; ♥ 23</span></div><div class="instagram-placeholder" id="1149311162236731744_21375191"><a target="_blank" href="https://www.instagram.com/p/_zLGmpgwFg/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/10724088_1655328294728371_741312536_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ♥ 31</span></div></div>
<!--                    <iframe src="http://widget.websta.me/in/jeanknowscars/?s=93&w=3&h=10&b=0&p=-5" allowtransparency="true" frameborder="0" scrolling style="width:296px; height: 250px" ></iframe>-->
                </div>
            </div>
        </div>
    </div>
</div>                </div>
            </div>
        </div>

        <div class="homeF-wrap">
            <div class="row row-padding">
                    <div class="mod-title-block ">
        <div class="headline">
            <h2>
                                    Latest Articles                                </h2>
                            <h3>Life with cars. Adventures, memories, visits with Fast Women, and anything else I want to talk about with you.</h3>
                    </div>
    </div>
            <div class="mod-list-item-wrap">
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
                    <a href="/new-cars/2016-kia-forte-and-forte5/" title="2016 Kia Forte and Forte5">
                        <img src="http://image.jeanknowscars.com/f/99134317+w288+h140+re0+cr1+ar0/2016-kia-forte-promolarge.jpg" alt="2016 Kia Forte and Forte5" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
                    </a>
                </div>
                <div class="category">
                    <a href="/new-cars/">Car Guide</a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/new-cars/2016-kia-forte-and-forte5/" title="2016 Kia Forte and Forte5">2016 Kia Forte and Forte5</a></h4>
                                        <div class="desc">As a hatchback or a sedan, this is a lot of little car for a little money.</div>
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
                    <div class="mod-list-item left col-18 first-col ">
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
                    <div class="mod-list-item left col-18  ">
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
                        </div>
        </div>
        <div class="mod-load-more" data-current-page-id="1" data-last-page-id="307" data-route="http://www.jeanknowscars.com/" data-lazy-count="0" data-show-count="0" data-replace-state="0" data-page="home">
            <a class="button btn-main-cta" href="/" title="Load more">
            <span class="btn-text">Load more</span>
            <i class="fa fa-refresh fa-spin"></i>
        </a>
        </div>
            </div>
        </div>
<?php get_footer(); ?>	
