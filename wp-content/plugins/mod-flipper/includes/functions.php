<?php

function render_flipper($atts) {
   extract(shortcode_atts(array(
      'name' => null,      
   ), $atts));

   if($atts['name']=="home-flipper"):
	   	wp_enqueue_style( 'mod-flipper');
		?> 
                <div class="feature-left-wrap left col-17">    
		<div class="mod-flipper">
                <div class="flex-container">
                    <div class="flexslider hasSlider" id="flexslider">

                        <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1400%; transition-duration: 0.6s; transform: translate3d(-1950px, 0px, 0px);"><li class="slide clone" aria-hidden="true" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2016 Honda Pilot: 5 Cool Things" data-smalltitle="2016 Honda Pilot: 5 Cool Things" data-text="Intelligent traction management is just one of our favorite options on the all-new Pilot. Video." data-href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/">
                                        <a href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/" title="2016 Honda Pilot: 5 Cool Things">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/98625817+w650+h317+re0+cr1+ar0/pilot-promo.jpg" alt="2016 Honda Pilot: 5 Cool Things" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2017 Volvo S90: Designer Walkaround" data-smalltitle="2017 Volvo S90: Designer Walkaround" data-text="Video: Volvo's Orjan Sterner showed me the pure lines and fabulous tech on the new flagship." data-href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/">
                                        <a href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/" title="2017 Volvo S90: Designer Walkaround">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/95937843+w650+h317+re0+cr1+ar0/volvo-s90-promolarge.jpg" alt="2017 Volvo S90: Designer Walkaround" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2016 Cadillac ATS-V" data-smalltitle="2016 Cadillac ATS-V" data-text="Bored by BMW? Meh about Mercedes? Here's the latest cool thing in performance straight from Detroit." data-href="/you-auto-know/car-buying/2016-cadillac-ats-v/">
                                        <a href="/you-auto-know/car-buying/2016-cadillac-ats-v/" title="2016 Cadillac ATS-V">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/168809750+w650+h317+re0+cr1+ar0/2016-cadillac-ats-v-Promolarge.jpg" alt="2016 Cadillac ATS-V" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide flex-active-slide" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2017 Chevrolet Bolt: Walkaround" data-smalltitle="2017 Chevrolet Bolt: Walkaround" data-text="Video: A look inside the surprisingly spacious new EV from GM with design director Stuart Norris." data-href="/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/">
                                        <a href="/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/" title="2017 Chevrolet Bolt: Walkaround">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/95940858+w650+h317+re0+cr1+ar0/chevrolet-bolt-header.jpg" alt="2017 Chevrolet Bolt: Walkaround" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="Certified Pre-Owned Cars: 7 Steps to Success" data-smalltitle="Certified Pre-Owned Cars: 7 Steps ..." data-text="Interested in a Certified Pre-Owned used car? So are lots of people. How to be a smart CPO shopper." data-href="/you-auto-know/car-buying/certified-pre-owned-cars-7-steps-to-success/">
                                        <a href="/you-auto-know/car-buying/certified-pre-owned-cars-7-steps-to-success/" title="Certified Pre-Owned Cars: 7 Steps to Success">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/137598242+w650+h317+re0+cr1+ar0/certified-promolarge2.jpg" alt="Certified Pre-Owned Cars: 7 Steps to Success" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2016 Honda Pilot: 5 Cool Things" data-smalltitle="2016 Honda Pilot: 5 Cool Things" data-text="Intelligent traction management is just one of our favorite options on the all-new Pilot. Video." data-href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/">
                                        <a href="/jeans-driveway/car-on-the-road/2016-honda-pilot-5-cool-things/" title="2016 Honda Pilot: 5 Cool Things">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/98625817+w650+h317+re0+cr1+ar0/pilot-promo.jpg" alt="2016 Honda Pilot: 5 Cool Things" draggable="false">
                                        </a>
                                    </div>
                                </li>
                                <li class="slide clone" aria-hidden="true" style="float: left; display: block; width: 650px;">
                                    <div class="img-wrap" data-title="2017 Volvo S90: Designer Walkaround" data-smalltitle="2017 Volvo S90: Designer Walkaround" data-text="Video: Volvo's Orjan Sterner showed me the pure lines and fabulous tech on the new flagship." data-href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/">
                                        <a href="/jeans-driveway/designer-walkaround/2017-volvo-s90-designer-walkaround/" title="2017 Volvo S90: Designer Walkaround">
                                            <img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/95937843+w650+h317+re0+cr1+ar0/volvo-s90-promolarge.jpg" alt="2017 Volvo S90: Designer Walkaround" draggable="false">
                                        </a>
                                    </div>
                                </li></ul></div></div>
                    <div class="flipper-info-box">
                        <a class="flipper-info-title" href="/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/" title="2017 Chevrolet Bolt: Walkaround" style="display: inline-block;">2017 Chevrolet Bolt: Walkaround</a>
                        <span class="flipper-info-text" data-simflink="{&quot;url&quot;: &quot;/jeans-driveway/designer-walkaround/2017-chevrolet-bolt-designer-walkaround/&quot;}" style="display: block;">Video: A look inside the surprisingly spacious new EV from GM with design director Stuart Norris.</span>
                        <div class="flipper-info-pager" style="display: block;">
                            <span class="flipper-info-left"></span>
                            <span class="flipper-info-pager-text">3 of 5</span>
                            <span class="flipper-info-right"></span>
                        </div>
                    </div>
                    <ul class="flex-direction-nav">
                        <li>
                            <span class="flipper-main-left"></span>
                        </li>
                        <li>
                            <span class="flipper-main-right"></span>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
	<?php 
        wp_enqueue_script('mod-flipper');
        endif;
}

add_shortcode('flipper', 'render_flipper');

