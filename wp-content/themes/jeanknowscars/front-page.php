<?php
/**
 * The main template file
 * @package Jean_Knows_Cars
 */
get_header();

## Loading CSS for front page
wp_enqueue_style('lay-home', get_template_directory_uri() . '/assets/css/lay-home.css', null, null, "screen");
wp_enqueue_style('mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css', null, null, "screen");
wp_enqueue_style('mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css', null, null, "screen");
wp_enqueue_style('mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css', null, null, "screen");
wp_enqueue_style('mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css', null, null, "screen");
wp_enqueue_style('mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css', null, null, "screen");
wp_enqueue_style('mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css', null, null, "screen");
wp_enqueue_style('mod-list-item', get_template_directory_uri() . '/assets/css/mod-list-item.css', null, null, "screen");
wp_enqueue_style('mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css', null, null, "screen");
wp_enqueue_style('mod-title-block', get_template_directory_uri() . '/assets/css/mod-title-block.css', null, null, "screen");

## Loading js for front page
wp_enqueue_script('mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js', null, null, true);
wp_enqueue_script('mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js', null, null, true);
wp_enqueue_script('mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js', null, null, true);
$pageNum = (int)get_query_var('paged', 1);
?>

<!-- -->
<div class="feature-wrap">
    <div class="row">                                    
        <!--Flipper-->
        <?php
        if (class_exists('Flipper') && shortcode_exists('flipper'))
            echo do_shortcode('[flipper name="home-flipper"]')
            ?>                                  
        <!-- life-with-jean -->  
        <div class="feature-right-wrap right col-18">
            <?php echo do_shortcode('[add_block name="life-with-jean"]') ?>
        </div>
    </div>
</div>


<!-- -->
<div class="ad-top-wrap">
    <div class="row row-padding">                
        <!-- GPT-top-add -->                 
        <?php echo do_shortcode('[gpt_add_block name="gpt-top-ad"]') ?>               
        <!-- Car-Confessions -->                 
        <?php echo do_shortcode('[add_block name="car-confessions"]') ?>                 
    </div>
</div>

<!--home1 --> 
<div class="homeA-wrap grey-wrap">
    <div class="row row-padding">
        <div class="homeA-left-wrap left col-17">

            <div class="mod-title-block ">
                <div class="headline">
                    <h2>
                        <a href="/jeans-driveway/" title="Jean's Driveway">
                            Jean's Driveway</a>
                    </h2>
                    <h3>Short, Sweet Car Reviews.</h3>
                </div>
            </div>

            <div class="mod-list-item-wrap">
                <div class="load-more-disabled  clearfix"> 
                    <?php
                    $cat = 4;
                    $posts = query_posts(array(
                        'post_status' => 'publish',
                        'category_name' => 'jeans-driveway',
                        'orderby' => 'menu_order',
                        'order' => 'DESC',
                        'posts_per_page' => '2'
                            ));

                    if (have_posts()) :
                        $i = 1;
                        while (have_posts()) : the_post();
                            ?>

                            <div class="mod-list-item-home left col-22 first-row <?php if ($i == 1) {
                        echo "first-col";
                    } ?>">
                                <div class="row">
                                    <div class="img-wrap">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                            }
                                            else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <a href="<?php get_category_link($intCategoryId); ?>">
                                            <?php
                                            $categories = get_the_category($the_post->ID);
                                            print_r($categories[0]->name);
                                            ?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <h4 class="title-wrap">
                                            <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php echo $i;
                                                the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="desc">
        <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <div class="homeA-right-wrap right col-18">

<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-1" ]'); ?>
        </div>
    </div>
</div>


<!--home2 -->

<div class="homeB-wrap">
    <div class="row row-padding">
        <div class="mod-title-block ">
            <div class="headline">
                <h2>
                    <a href="/kids-in-the-car/" title="Kids in the Car">
                        Kids in the Car </a>
                </h2>
                <h3>From 0 to 18 in What Feels Like Seconds.</h3>
            </div>
        </div>
        <div class="mod-list-item-wrap">
            <div class="load-more-disabled  clearfix"> 
                <?php
                $cat = 11;
                $posts = query_posts(array(
                    'post_status' => 'publish',
                    'category_name' => 'kids-in-the-car',
                    'orderby' => 'menu_order',
                    'order' => 'DESC',
                    'posts_per_page' => '3'
                        ));

                if (have_posts()) :
                    $i = 1;
                    while (have_posts()) : the_post();
                        ?>

                        <div class="mod-list-item-home left col-18 first-row <?php if ($i == 1) {
                            echo "first-col";
                        } ?>">
                            <div class="row">
                                <div class="img-wrap">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('thumbnail');
                                        }
                                        else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                        <?php }
                                        ?>
                                    </a>
                                </div>
                                <div class="category">
                                    <a href="<?php get_category_link($intCategoryId); ?>">
                                        <?php
                                        $categories = get_the_category($the_post->ID);
                                        print_r($categories[0]->name);
                                        ?>
                                    </a>
                                </div>
                                <div class="info-wrap">
                                    <h4 class="title-wrap">
                                        <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php echo $i;
                                            the_title(); ?>
                                        </a>
                                    </h4>
                                    <div class="desc">
        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!--home3 -->

<div class="homeC-wrap grey-wrap">
    <div class="row row-padding">
        <div class="homeA-left-wrap left col-17">
            <div class="mod-title-block ">
                <div class="headline">
                    <h2>
                        <a href="/you-auto-know/" title="You Auto Know">
                            You Auto Know
                        </a>
                    </h2>
                    <h3>Advice about Buying, Servicing, and Living with Your Car.</h3>
                </div>
            </div>

            <div class="mod-list-item-wrap">
                <div class="load-more-disabled  clearfix"> 
                    <?php
                    $cat = 10;
                    $posts = query_posts(array(
                        'post_status' => 'publish',
                        'category_name' => 'You Auto know',
                        'orderby' => 'menu_order',
                        'order' => 'DESC',
                        'posts_per_page' => '2'
                            ));
                    if (have_posts()) :
                        $i = 1;
                        while (have_posts()) : the_post();
                            ?>

                            <div class="mod-list-item-home left col-22 first-row <?php if ($i == 1) {
                        echo "first-col";
                    } ?>">
                                <div class="row">
                                    <div class="img-wrap">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                            }
                                            else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <a href="<?php get_category_link($intCategoryId); ?>">
                                            <?php
                                            $categories = get_the_category($the_post->ID);
                                            print_r($categories[0]->name);
                                            ?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <h4 class="title-wrap">
                                            <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php echo $i;
        the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="desc">
        <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <?php
                            $i++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>


                </div>
            </div>



        </div>

        <div class="homeA-right-wrap right col-18">

<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-1" ]'); ?>
        </div>



    </div>
</div>

<!--home4-->
<div class="homeD-wrap">
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
                        <script>!function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");</script>
                    </div>

                    <div class="social-ctr-instagram">
                        <div id="mod-instagram" class="mod-instagram" style="display: block;">
                            <h3 class="title">Instagram Instant Activity</h3>
                            <div id="instagram-wrapper" class="instagram-wrapper">
                                <div class="dummy"></div>
                                <div class="instagram-thumbs"><div class="instagram-placeholder" id="1170742990617116773_21375191"><a target="_blank" href="https://www.instagram.com/p/BA_UIwPAwBl/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12519210_1239559786060443_1627321641_n.jpg"></a><span class="comment-count">5&nbsp;&nbsp;&nbsp; ? 34</span></div><div class="instagram-placeholder" id="1169028407846174748_21375191"><a target="_blank" href="https://www.instagram.com/p/BA5OSSmAwAc/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12568288_901778636609329_358139718_n.jpg"></a><span class="comment-count">5&nbsp;&nbsp;&nbsp; ? 72</span></div><div class="instagram-placeholder" id="1159902775849714665_21375191"><a target="_blank" href="https://www.instagram.com/p/BAYzW3ggwPp/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/12383314_1555942238064304_1032455380_n.jpg"></a><span class="comment-count">4&nbsp;&nbsp;&nbsp; ? 35</span></div><div class="instagram-placeholder" id="1157668950130230128_21375191"><a target="_blank" href="https://www.instagram.com/p/BAQ3cbMAwNw/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/10520343_171410896551592_571934352_n.jpg"></a><span class="comment-count">16&nbsp;&nbsp;&nbsp; ? 38</span></div><div class="instagram-placeholder" id="1154789865058141158_21375191"><a target="_blank" href="https://www.instagram.com/p/BAGo0ORAwPm/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/1173186_236712253326634_259654429_n.jpg"></a><span class="comment-count"> ? 39</span></div><div class="instagram-placeholder" id="1153641510072418987_21375191"><a target="_blank" href="https://www.instagram.com/p/BACjtdWAwKr/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c0.81.1080.1080/10817610_219789885027139_1477555896_n.jpg"></a><span class="comment-count">1&nbsp;&nbsp;&nbsp; ? 29</span></div><div class="instagram-placeholder" id="1153170144013517111_21375191"><a target="_blank" href="https://www.instagram.com/p/BAA4iLfgwE3/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/1516213_1661911647417365_1560010320_n.jpg"></a><span class="comment-count">8&nbsp;&nbsp;&nbsp; ? 76</span></div><div class="instagram-placeholder" id="1152261552238428914_21375191"><a target="_blank" href="https://www.instagram.com/p/_9p8bdgwLy/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12393995_212575475752605_70960933_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ? 36</span></div><div class="instagram-placeholder" id="1149736744757952524_21375191"><a target="_blank" href="https://www.instagram.com/p/_0r3pQgwAM/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e15/10576238_1042902705754259_694993547_n.jpg"></a><span class="comment-count">3&nbsp;&nbsp;&nbsp; ? 25</span></div><div class="instagram-placeholder" id="1149335460317954196_21375191"><a target="_blank" href="https://www.instagram.com/p/_zQoMAAwCU/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c38.0.1003.1003/12394036_1670844019853753_700030898_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ? 27</span></div><div class="instagram-placeholder" id="1149327471217410972_21375191"><a target="_blank" href="https://www.instagram.com/p/_zOz7kgwOc/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12393656_910997052312011_2135296403_n.jpg"></a><span class="comment-count">3&nbsp;&nbsp;&nbsp; ? 23</span></div><div class="instagram-placeholder" id="1149311162236731744_21375191"><a target="_blank" href="https://www.instagram.com/p/_zLGmpgwFg/"><img class="instagram-image" src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/10724088_1655328294728371_741312536_n.jpg"></a><span class="comment-count">2&nbsp;&nbsp;&nbsp; ? 31</span></div></div>
                                <!--                    <iframe src="http://widget.websta.me/in/jeanknowscars/?s=93&w=3&h=10&b=0&p=-5" allowtransparency="true" frameborder="0" scrolling style="width:296px; height: 250px" ></iframe>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>

<!--home4-->
<div class="homeE-wrap">
    <div class="row row-padding">

        <div class="mod-title-block ">
            <div class="headline">
                <h2>Latest Articles</h2>
                <h3>Life with cars. Adventures, memories, visits with Fast Women, and anything else I want to talk about with you.</h3>
            </div>
        </div>

        <div class="mod-list-item-wrap">
            <div class="load-more-well clearfix"> 

                <?php
                $posts = query_posts(array(
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => '9',
                    'paged' => $pageNum
                ));

                if (have_posts()) :
                    ?>

                    <?php
                    $i = 0;
                    // Start the Loop.
                    while (have_posts()) : the_post();
                        ?>
                        <div class="mod-list-item left col-18 <?php if ($i % 3 == 0) {
                            echo "first-col";
                        } ?>">
                                <div class="row">
                                    <div class="img-wrap">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('thumbnail');
                                            }
                                            else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <a href="<?php get_category_link($intCategoryId); ?>">
                                            <?php
                                            $categories = get_the_category($the_post->ID);
                                            print_r($categories[0]->name);
                                            ?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <h4 class="title-wrap">
                                            <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <?php echo $i;
                                                the_title(); ?>
                                            </a>
                                        </h4>
                                        <div class="desc">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
        <?php
        // End the loop.
        $i++;
    endwhile;

// If no content, include the "No posts found" template.
else :
    get_template_part('template-parts/content', 'none');

endif;
?>

            </div>
            <div class="mod-load-more">
            <?php
            // Previous/next page navigation.
            if ( have_posts() ) : 
                the_posts_pagination(array(
                    'prev_text' => __('Previous page', 'twentysixteen'),
                    'next_text' => __('Next page', 'twentysixteen'),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
                ));
            endif;
            wp_reset_postdata();
            ?>
            </div>
        </div>

    </div>
</div>


<?php get_footer(); ?>	
