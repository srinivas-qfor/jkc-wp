<?php

function render_flipper($atts) {
   extract(shortcode_atts(array(
      'name' => null,      
   ), $atts));

   if($atts['name']=="home-flipper"):
	   	wp_enqueue_style( 'mod-flipper');

        $args = array(
            'posts_per_page' => 10,
            'meta_key' => '_featured-post'.(is_home() ? '-home' : ''),
            'meta_value' => 1,
            'cat' => !empty($atts['cat']) ? $atts['cat'] : 0
        );

        $featured = new WP_Query($args);
        
        if ($featured->have_posts()):
		?> 
        <div class="feature-left-wrap left col-17">    
		    <div class="mod-flipper">
                <div class="flex-container">
                    <div class="flexslider <?php echo ($featured->post_count > 1) ? 'hasSlider' : 'noSlider' ?>" id="flexslider">

                        <ul class="slides">
                            <?php while($featured->have_posts()): $featured->the_post(); ?>
                            <li class="slide">
                                <div class="img-wrap" data-title="<?=the_title();?>" data-smalltitle="<?=substr(the_title(), 0, 35);?>" data-text="<?=get_the_excerpt();?>" data-href="<?=the_permalink();?>">
                                    <a href="<?=the_permalink();?>" title="<?=the_title();?>">
                                        <?php 
                                        if ( has_post_thumbnail( ) ) :
                                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                                        $featured_alt = get_post_meta(
                                            get_post_thumbnail_id( $post->ID ),
                                            '_wp_attachment_image_alt', true ) ? : get_the_title();
                                        $image = $image[0];

                                        else : ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-650x317.jpg" alt="'.the_title().'" draggable="false">';
                                        <?php endif; 
                                        ?>
                                        <!--img onerror="this.src='/img/jkc-no-image-650x317.jpg'" src="http://image.jeanknowscars.com/f/95937843+w650+h317+re0+cr1+ar0/volvo-s90-promolarge.jpg" alt="<?=the_title();?>" draggable="false"-->
                                    </a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php $c = 0; while($featured->have_posts()): $featured->the_post(); if($c == 0): ?>
                    <div class="flipper-info-box">
                        <a class="flipper-info-title" href="<?=the_permalink();?>" title="<?=the_title();?>" style="display: inline-block;"><?=the_title();?></a>
                        <span class="flipper-info-text" data-simflink="{&quot;url&quot;: &quot;<?=the_permalink();?>&quot;}" style="display: block;"><?=the_excerpt();?></span>
                        <?php if($featured->post_count > 1): ?>
                        <div class="flipper-info-pager" style="display: block;">
                            <span class="flipper-info-left"></span>
                            <span class="flipper-info-pager-text">3 of 5</span>
                            <span class="flipper-info-right"></span>
                        </div>
                        <?php endif; $c++; ?>
                    </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php if($featured->post_count > 1): ?>
                    <ul class="flex-direction-nav">
                        <li>
                            <span class="flipper-main-left"></span>
                        </li>
                        <li>
                            <span class="flipper-main-right"></span>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
	<?php 
        wp_enqueue_script('mod-flipper');
        endif;
}

add_shortcode('flipper', 'render_flipper');

