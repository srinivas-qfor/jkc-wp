<?php
/*
 * Template Name: Car Guide
 * Description: Page template with car categories
 */

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



## Loading js for front page
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);

?>

                    <div class="content-top-wrap">
                <div class="row">
                        <div class="mod-breadcrumbs clearfix">
                                    <div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumb" href="/" title="Home" itemprop="url"><span itemprop="title">Home</span></a></div>
                                				<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><span class="crumb" itemprop="title">Ultimate Car Guide</span></div>
                        </div>
                </div>
            </div>
        
        
        <div class="row">
            <div class="main-column left col-17">
                <div class="mod-title">
        <h1 class="pagetitle" itemprop="name">Car Guide</h1>
            <div class="desc">Somewhere in here, you will find your dream car.</div>
    </div><div class="mod-browse-by-vehicle-type">
            <h2>
            Browse by Vehicle Type
        </h2>
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
                        <li class="tile tile-green">
            <a href="/green/" class="tile-link" title="Green"><span class="tile-name">Green</span></a>
        </li>
                        <li class="tile tile-indulgence">
            <a href="/indulgence/" class="tile-link" title="Indulgence"><span class="tile-name">Indulgence</span></a>
        </li>
                        <li class="tile tile-sedan">
            <a href="/sedan/" class="tile-link" title="Sedans"><span class="tile-name">Sedans</span></a>
        </li>
                        <li class="tile tile-trucks">
            <a href="/trucks/" class="tile-link" title="Trucks"><span class="tile-name">Trucks</span></a>
        </li>
                        <li class="tile tile-convertible">
            <a href="/convertible/" class="tile-link" title="Convertibles"><span class="tile-name">Convertibles</span></a>
        </li>
                        <li class="tile tile-crossover">
            <a href="/crossover/" class="tile-link" title="Crossover"><span class="tile-name">Crossover</span></a>
        </li>
                        <li class="tile tile-hatchback">
            <a href="/hatchback/" class="tile-link" title="Hatchbacks"><span class="tile-name">Hatchbacks</span></a>
        </li>
                        <li class="tile tile-luxury">
            <a href="/luxury/" class="tile-link" title="Luxury"><span class="tile-name">Luxury</span></a>
        </li>
                    </ul>
    </div><div class="mod-filter-make-model">
    <div class="shop-wrapper clearfix">
                    <h2>Already Know What You’re Looking For?</h2>
                <div class="mod-shop-makemodel border-bottom">
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
</div><div class="mod-browse-by-make clearfix">
    <h3>Browse by Vehicle Brand</h3>
        <div class="columns col-4">        <div>
            <a class="filter-item first-row" href="/acura/" title="Acura">Acura</a>
        </div>
                        <div>
            <a class="filter-item " href="/alfa-romeo/" title="Alfa Romeo">Alfa Romeo</a>
        </div>
                        <div>
            <a class="filter-item " href="/aston-martin/" title="Aston Martin">Aston Martin</a>
        </div>
                        <div>
            <a class="filter-item " href="/audi/" title="Audi">Audi</a>
        </div>
                        <div>
            <a class="filter-item " href="/avanti/" title="Avanti">Avanti</a>
        </div>
                        <div>
            <a class="filter-item " href="/bmw/" title="BMW">BMW</a>
        </div>
                        <div>
            <a class="filter-item " href="/bentley/" title="Bentley">Bentley</a>
        </div>
                        <div>
            <a class="filter-item " href="/bugatti/" title="Bugatti">Bugatti</a>
        </div>
                        <div>
            <a class="filter-item " href="/buick/" title="Buick">Buick</a>
        </div>
                        <div>
            <a class="filter-item " href="/cadillac/" title="Cadillac">Cadillac</a>
        </div>
                        <div>
            <a class="filter-item " href="/chevrolet/" title="Chevrolet">Chevrolet</a>
        </div>
                        <div>
            <a class="filter-item " href="/chrysler/" title="Chrysler">Chrysler</a>
        </div>
                        <div>
            <a class="filter-item " href="/dodge/" title="Dodge">Dodge</a>
        </div>
                        <div>
            <a class="filter-item " href="/ferrari/" title="Ferrari">Ferrari</a>
        </div>
                        <div>
            <a class="filter-item " href="/fiat/" title="Fiat">Fiat</a>
        </div>
                        <div>
            <a class="filter-item " href="/fisker/" title="Fisker">Fisker</a>
        </div>
                        <div>
            <a class="filter-item " href="/ford/" title="Ford">Ford</a>
        </div>
        </div>        <div class="columns col-4">        <div>
            <a class="filter-item first-row" href="/gmc/" title="GMC">GMC</a>
        </div>
                        <div>
            <a class="filter-item " href="/genesis/" title="Genesis">Genesis</a>
        </div>
                        <div>
            <a class="filter-item " href="/honda/" title="Honda">Honda</a>
        </div>
                        <div>
            <a class="filter-item " href="/hyundai/" title="Hyundai">Hyundai</a>
        </div>
                        <div>
            <a class="filter-item " href="/infiniti/" title="Infiniti">Infiniti</a>
        </div>
                        <div>
            <a class="filter-item " href="/jaguar/" title="Jaguar">Jaguar</a>
        </div>
                        <div>
            <a class="filter-item " href="/jeep/" title="Jeep">Jeep</a>
        </div>
                        <div>
            <a class="filter-item " href="/kia/" title="Kia">Kia</a>
        </div>
                        <div>
            <a class="filter-item " href="/lamborghini/" title="Lamborghini">Lamborghini</a>
        </div>
                        <div>
            <a class="filter-item " href="/land-rover/" title="Land Rover">Land Rover</a>
        </div>
                        <div>
            <a class="filter-item " href="/lexus/" title="Lexus">Lexus</a>
        </div>
                        <div>
            <a class="filter-item " href="/lincoln/" title="Lincoln">Lincoln</a>
        </div>
                        <div>
            <a class="filter-item " href="/lotus/" title="Lotus">Lotus</a>
        </div>
                        <div>
            <a class="filter-item " href="/mini/" title="MINI">MINI</a>
        </div>
                        <div>
            <a class="filter-item " href="/maserati/" title="Maserati">Maserati</a>
        </div>
                        <div>
            <a class="filter-item " href="/mazda/" title="Mazda">Mazda</a>
        </div>
                        <div>
            <a class="filter-item " href="/mclaren/" title="McLaren">McLaren</a>
        </div>
        </div>        <div class="columns col-4">        <div>
            <a class="filter-item first-row" href="/mercedes-benz/" title="Mercedes-Benz">Mercedes-Benz</a>
        </div>
                        <div>
            <a class="filter-item " href="/mitsubishi/" title="Mitsubishi">Mitsubishi</a>
        </div>
                        <div>
            <a class="filter-item " href="/nissan/" title="Nissan">Nissan</a>
        </div>
                        <div>
            <a class="filter-item " href="/porsche/" title="Porsche">Porsche</a>
        </div>
                        <div>
            <a class="filter-item " href="/ram/" title="Ram">Ram</a>
        </div>
                        <div>
            <a class="filter-item " href="/rolls-royce/" title="Rolls Royce">Rolls Royce</a>
        </div>
                        <div>
            <a class="filter-item " href="/srt/" title="SRT">SRT</a>
        </div>
                        <div>
            <a class="filter-item " href="/scion/" title="Scion">Scion</a>
        </div>
                        <div>
            <a class="filter-item " href="/smart/" title="Smart">Smart</a>
        </div>
                        <div>
            <a class="filter-item " href="/subaru/" title="Subaru">Subaru</a>
        </div>
                        <div>
            <a class="filter-item " href="/suzuki/" title="Suzuki">Suzuki</a>
        </div>
                        <div>
            <a class="filter-item " href="/tesla/" title="Tesla">Tesla</a>
        </div>
                        <div>
            <a class="filter-item " href="/toyota/" title="Toyota">Toyota</a>
        </div>
                        <div>
            <a class="filter-item " href="/volkswagen/" title="Volkswagen">Volkswagen</a>
        </div>
                        <div>
            <a class="filter-item " href="/volvo/" title="Volvo">Volvo</a>
        </div>
        </div>    </div>
            </div>
            <div class="right-column right col-18">
                <div class="mod-car-confession clearfix">
    <div class="wrap">
        <h3>Car Confessions</h3>
        <h4>A Pretty Place for Ugly Secrets</h4>
        <a class="btn-alt-cta" href="/confessions/">Confess Here</a>
    </div>
</div><div class="mod-ad-mrec ctr-side" itemscope="" itemtype="http://schema.org/WPAdBlock">
    <!-- Beginning Async AdSlot 2 for Ad unit trb.latimes/jeanknowscars  ### size: [[300,600],[300,250]] -->
    <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[2]]) -->
    <div id="div-gpt-ad-110057376862217179-2">
        <script type="text/javascript">
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-2'); });
        </script>
    <div id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1" width="300" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_1__hidden__" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
    <!-- End AdSlot 2 -->
</div>
<div class="mod-stay-connect">
    <h3>Stay Connected</h3>
        <ul>
        <li class="social-link follow-facebook">
            <div class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/JeanKnowsCars" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=531130537018074&amp;container_width=302&amp;href=https%3A%2F%2Fwww.facebook.com%2FJeanKnowsCars&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450"><span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="fdcd7860c" width="450px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=531130537018074&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df3bf8200b%26domain%3Dwww.jeanknowscars.com%26origin%3Dhttp%253A%252F%252Fwww.jeanknowscars.com%252Ff379451cec%26relation%3Dparent.parent&amp;container_width=302&amp;href=https%3A%2F%2Fwww.facebook.com%2FJeanKnowsCars&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=450" style="border: none; visibility: visible; width: 84px; height: 20px;" class=""></iframe></span></div>
        </li>
        <li class="social-link follow-twitter">
            <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-follow-button twitter-follow-button-rendered" title="Twitter Follow Button" src="http://platform.twitter.com/widgets/follow_button.baa54ded21a982344c4ced326592f3de.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=jeanknowscars&amp;show_count=true&amp;show_screen_name=true&amp;size=m&amp;time=1454587970040" style="position: static; visibility: visible; width: 240px; height: 20px;" data-screen-name="jeanknowscars"></iframe>
        </li>
        <li class="social-link follow-google">
            <a href="https://plus.google.com/112100834357947783048/" class="social-google" target="_blank">
                <i class="fa fa-google-plus-square"></i>Follow us on Google+
            </a>
        </li>
        <li class="social-link follow-instagram">
            <a href="http://instagram.com/jeanknowscars" class="social-instagram" target="_blank">
                <i class="fa fa-instagram"></i>Follow us on Instagram
            </a>
        </li>
    </ul>
    <script>
        // Twitter Follow
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
    </script>
</div><div class="mod-ad-mrec mod-ad-mrec-bottom ctr-side" itemscope="" itemtype="http://schema.org/WPAdBlock">
    <!-- Beginning Async AdSlot 3 for Ad unit trb.latimes/jeanknowscars  ### size: [[300,600],[300,250]] -->
    <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[3]]) -->
    <div id="div-gpt-ad-110057376862217179-3">
        <script type="text/javascript">
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-3'); });
        </script><iframe src="http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html" style="visibility: hidden; display: none;"></iframe>
    <div id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2" width="300" height="600" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div><iframe id="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__hidden__" name="google_ads_iframe_/4011/trb.latimes/jeanknowscars_2__hidden__" width="0" height="0" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom; visibility: hidden; display: none;"></iframe></div>
    <!-- End AdSlot 3 -->
</div>
            </div>
        </div>

        <?php get_footer(); ?>	