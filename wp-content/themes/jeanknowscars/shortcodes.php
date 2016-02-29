<?php 

/*
* To display blocks
*/
function render_blocks($atts) {
   extract(shortcode_atts(array(
      'name' => null,
      'ad_col_wrap' => true
   ), $atts));

   if($atts['name']=="life-with-jean"):
	   	wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css' );
		?> 		
		<div class="feature-right-wrap">
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
            <?php if($ad_col_wrap !== 'off') : ?><div class="ad-top-right-wrap right col-20"><?php endif; ?>
              <div class="mod-car-confession ctr-side clearfix">
                <div class="wrap">
                  <h3>Car Confessions</h3>
                  <h4>A Pretty Place for Ugly Secrets</h4>
                  <a class="btn-alt-cta">Confess Here</a>
                   <!--<a class="btn-alt-cta" href="/confessions/">Confess Here</a>-->
                </div>
              </div>
            <?php if($ad_col_wrap !== 'off') : ?></div><?php endif; ?>
   <?php endif;
}

add_shortcode('add_block', 'render_blocks');



function render_gpt_add($atts) {
   extract(shortcode_atts(array(
      'name' => null,
      'data-ads' => null
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
	
	if($atts['name']=="gpt-mrec-ad"):
        ?>
         <div class="mod-ad-mrec ctr-side " itemscope itemtype="http://schema.org/WPAdBlock">          
             <div id='div-gpt-ad-110057376862217179-2'>
                 <script type='text/javascript'>
                     googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-2'); });
				</script>
             </div>
         </div> 
    <?php endif;

  if($atts['name']=="gpt-mrec-ad-dyn"):
        $adNum = !empty($atts['data-ads']) ? $atts['data-ads'] : 2;
        ?>
         <div class="mod-ad-mrec ctr-side " itemscope itemtype="http://schema.org/WPAdBlock">          
             <div id='div-gpt-ad-110057376862217179-<?php echo $adNum; ?>'>
                 <script type='text/javascript'>
                     googletag.cmd.push(function() { googletag.display('div-gpt-ad-110057376862217179-<?php echo $adNum; ?>'); });
        </script>
             </div>
         </div> 
    <?php endif;
	
	if($atts['name']=="gpt-mrec-ad-1"):
        ?>
         <div class="mod-ad-mrec ctr-side " itemscope itemtype="http://schema.org/WPAdBlock">          
             <div id='div-gpt-ad-110057376862217179-1'>
                 <script type='text/javascript'>
                     googletag.cmd.push(function() { 
                      googletag.display('div-gpt-ad-110057376862217179-1'); 
                    });
				</script>
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

 
function render_social_widget(){
	?>
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
            <a class="twitter-timeline" href="https://twitter.com/JeanKnowsCars" data-widget-id="343096813714300928">Tweets by @JeanKnowsCars</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>

        <div class="social-ctr-instagram">
            <div id="mod-instagram" class="mod-instagram">
                <h3 class="title">Instagram Instant Activity</h3>
                <div id="instagram-wrapper" class="instagram-wrapper">
                    <div class="dummy"></div>
                    <div class="instagram-thumbs"></div>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php 
}
add_shortcode('social_widget','render_social_widget');

/*
* Helper functoin: Generate posts for widgets
*/
function render_jkc_posts_widget($atts) {
    extract(shortcode_atts(array(
        'title'        => 'Latest Articles',
        'tagline'      => 'Read latest articles',
        'cat'          => 0,
        'num_posts'    => 3,
        'per_row'      => 3,
    ), $atts));

    // get category object
    if(isset($cat) && $cat > 0) {
       $category = get_category($cat);
    }

    $args = array( 
        'posts_per_page' => $num_posts,
        'category' => $cat
    );
    $posts = get_posts($args);
    //print_r("<pre>"); print_r($category); exit;
    ?>
    <div class="mod-title-block ">
      <div class="headline">
        <h2>
        <?php if(!empty($category)) { ?>
          <a href="<?=get_category_link($cat);?>" title="<?=$title;?>"><?=$title;?></a>
        <?php }
        else { 
          echo $title;
        } ?>
        </h2>
        <h3><?php echo $tagline; ?></h3>
      </div>
    </div>

    <div class="mod-list-item-wrap">
      <div class="load-more-disabled clearfix">
        <?php 
        if(!empty($posts)) :
        $i = 0;
        foreach($posts as $post) { ?>
        <div class="mod-list-item left col-18<?php echo ($i<$per_row) ? ' first-row' : ''; echo ($i%$per_row == 0) ? ' first-col' : ''; ?>">
          <div class="row">
            <div class="img-wrap">
              <a href="<?=get_permalink($post->ID);?>" title="<?=$post->post_title;?>">
              <img src="http://image.jeanknowscars.com/f/99347533+w288+h140+re0+cr1+ar0/2017-hyundai-elantra-homepage.jpg" alt="<?=$post->post_title;?>" height="140" width="288" onerror="this.src='/img/jkc-no-image-288x140.jpg'">
              </a>
            </div>
            <div class="category">
              <?php $categories = get_the_category($post->ID); ?>
              <a href="<?=get_category_link($categories[0]->cat_ID);?>"><?=$categories[0]->name;?></a>
            </div>
            <div class="info-wrap">
              <h4 class="title-wrap"><a class="list-title" href="<?=get_permalink($post->ID);?>" title="<?=$post->post_title;?>"><?=$post->post_title;?></a></h4>
              <div class="desc">
                <?=$post->post_excerpt;?>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; } 
        else : ?>
        <p>No content found</p>
        <?php endif; ?>
      </div>
    </div>
    <?php 
}
add_shortcode('jkc_posts_widget','render_jkc_posts_widget');

include_once 'shortcodes/contributors.php';