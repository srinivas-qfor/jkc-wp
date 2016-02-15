<?php 

/*
* To display blocks
*/
function render_blocks($atts) {
   extract(shortcode_atts(array(
      'name' => null,      
   ), $atts));

   if($atts['name']=="life-with-jean"):
	   	wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css' );
		?> 		
		<div class="feature-right-wrap right col-18">
		  <div class="mod-life-with-jean ctr-side" data-simflink="{&quot;url&quot;: &quot;/life-with-jean/&quot;}">
		    <h2>Life with <strong>Jean</strong></h2>
		    <p>I’ve written about<br>cars for 30 years,<br>so I know the secret<br>car-guy handshake.</p>
		    <p>But this is a place<br>where you won’t<br>have to.<br><span class="join">Join the party.</span></p>
		    <a class="btn-main-cta" href="/life-with-jean/">Meet Jean</a>
		  </div>
		</div>
   <?php endif;

   if($atts['name']=="car-confessions"):
            wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css' );
            ?> 	
            <div class="ad-top-right-wrap right col-20">
              <div class="mod-car-confession clearfix">
                <div class="wrap">
                  <h3>Car Confessions</h3>
                  <h4>A Pretty Place for Ugly Secrets</h4>
                  <a class="btn-alt-cta" href="/confessions/">Confess Here</a>
                </div>
              </div>
            </div>
   <?php endif;
}

add_shortcode('add_block', 'render_blocks');



function render_gpt_add($atts) {
   extract(shortcode_atts(array(
      'name' => null,      
   ), $atts));

    if($atts['name']=="gpt-top-ad"):
        ?>
        <div class="ad-top-left-wrap left col-19">
         <div class="mod-ad-top" itemscope itemtype="http://schema.org/WPAdBlock">
             <!-- Beginning Async AdSlot 8 for Ad unit trb.latimes/jeanknowscars  ### size: [[728,90]] -->
             <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[8]]) -->
             <div id='div-gpt-ad-110057376862217179-8'>
                 <script type='text/javascript'>
                     googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-8'); });
                 </script>
             </div>
             <!-- End AdSlot 8 -->
         </div>     
        </div>
    <?php endif;
}

add_shortcode('gpt_add_block', 'render_gpt_add');


function render_social_links($atts) {
   extract(shortcode_atts(array(
      'name' => null,      
), $atts));
   
   if($atts['name']=="header"):
     ?>
        <div class="u-option-wrapper">
            <ul class="social header-social-list clearfix">
                <li>Follow us</li>
                <li><a class="header-social-facebook" href="http://www.facebook.com/JeanKnowsCars" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a class="header-social-twitter" href="https://twitter.com/#!/jeanknowscars" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a class="header-social-instagram" href="http://instagram.com/jeanknowscars" target="_blank"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        
   <?php endif;
   
   if($atts['name']=="footer"):
     ?>
        <ul class="social-List footer-social-list clearfix">
             <li><a class="pinterest" href="http://www.pinterest.com/jeanknowscars" target="_blank"><i class="fa fa-pinterest-square"></i></a></li>
             <li><a class="google" href="https://plus.google.com/112100834357947783048/" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
             <li><a class="facebook" href="https://www.facebook.com/JeanKnowsCars" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
             <li><a class="twitter" href="https://twitter.com/jeanknowscars" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
        </ul>
        
   <?php endif;
}
 add_shortcode('social_links', 'render_social_links');