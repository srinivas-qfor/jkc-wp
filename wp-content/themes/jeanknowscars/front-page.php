<?php
/**
 * The main template file
 * @package Jean_Knows_Cars
 */
get_header();

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
                                           if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                                                MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'large', NULL, false);
                                           }else { ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category($the_post->ID);
                                        $intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
                                        $category_name = is_array($categories) ? $categories[0]->name : $categories->name;
                                        ?>
                                        <a href="<?php echo get_category_link( $intCategoryId ); ?>">
                                        <?=$category_name;?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                    <?php 
                                    $strFromatedtitleforReleatedArticle = get_the_title();
                                    $strlen = strlen($strFromatedtitleforReleatedArticle);

                                    if($strlen >= 45){
                                    $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                                    }else{
                                    $formatedC = $strFromatedtitleforReleatedArticle;
                                    }
                                    ?>

                                    <h4 class="title-wrap">
                                    <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php echo $formatedC;?>
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

        <?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]'); ?>
        </div>
    </div>
</div>


<!--car guide -->
<?php
$categories_carguide = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
    'parent' => 119,
    'exclude' => array(138,146,148,152,154,157,192,167,171,175,176,177,181,182)
    ) );

?>
 
<div class="homeA-wrap ">
    <div class="row row-padding">
        <div class="homeA-left-wrap left col-17">
            <div class="mod-title-block border-bottom">
                <div class="headline">
                    <h2>
                        <a href="/new-cars/" title="You Auto Know">
                            Car Guide
                        </a>
                    </h2>
                    <h3>Find Your Best Car Here.</h3>
                </div>
            </div>
            <!--make and model-->
            <div class="mod-filter-make-model">
            <div class="shop-wrapper clearfix">
                    <span class="tease">I already have a vehicle in mind: </span>
                <div class="right">
                    <!-- make -->
                    <div class="dropdown-custom">
                    <select id = "makes" style="z-index: 10; opacity: 0; width: 170px;">
                            <option value="">Choose Make</option>
                        
                                <?php 
                                    foreach( $categories_carguide as $category ) {
                                         $name = $category->cat_name;
                                         $slug_tx = $category->slug;
                                         ?>
                                         <option value="<?php echo $name ;?>" data-slug="<?php echo $slug_tx;?>"><?php echo $name ;?></option>
                                         <?php
                                             }

                                         ?>
                    </select>
                    <span class="dropdown-custom-select mk" style="width: 118px;">
                    <p class="make_top">Choose Make</p>
                    </span>
                    </div>
                    <!-- model-->
                    <div class="dropdown-custom">
                    <select id = "model" style="z-index: 10; opacity: 0; width: 170px;" disabled="disabled">
                    <option value="">Choose model</option>


                    </select>
                    <span class="dropdown-custom-select disabled md" style="width: 118px;">
                    <p class="model_top">Choose model</p>
                    </div>

                    <!-- go button-->

                    <a href="" id= "make_model_go" class="mod-shop-cta btn-main-cta disabled btn-vehicle-dropdown">Go</a>
            
                </div>
            </div>



        <!--car vehiletype-->    
        <div class="mod-browse-by-vehicle-type">
            <h2>Browse by Vehicle Type</h2>
            <ul class="tiles">
                <li class="tile tile-family">
                    <a href="/family/" class="tile-link" title="Family">
                    <span class="tile-name">Family</span>
                    </a>
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
        </div>




        </div>        
    </div>
</div>
<!--car guide end-->

<!--home2 -->

<div class="homec-wrap grey-wrap">
    <div class="row row-padding">
        <div class="homeA-left-wrap left col-17">
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
                                            if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                                                MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'large', NULL, false);
                                           }else {  ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category($the_post->ID);
                                        $intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
                                        $category_name = is_array($categories) ? $categories[0]->name : $categories->name;
                                        ?>
                                        <a href="<?php echo get_category_link( $intCategoryId ); ?>">
                                        <?=$category_name;?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <?php 
                                    $strFromatedtitleforReleatedArticle = get_the_title();
                                    $strlen = strlen($strFromatedtitleforReleatedArticle);

                                    if($strlen >= 45){
                                    $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                                    }else{
                                    $formatedC = $strFromatedtitleforReleatedArticle;
                                    }
                                    ?>

                                    <h4 class="title-wrap">
                                    <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php echo $formatedC;?>
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

        <?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]'); ?>
        </div>
    </div>
</div>

<!--home3 -->

<div class="homeC-wrap ">
    <div class="row row-padding">
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
                        'category_name' => 'you-auto-know',
//                        'orderby' => 'menu_order',
//                        'order' => 'DESC',
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
                                            if (class_exists('MultiPostThumbnails')&& MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                                                MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'large', NULL, false);
                                           }else {  ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category($the_post->ID);
                                        $intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
                                        $category_name = is_array($categories) ? $categories[0]->name : $categories->name;
                                        ?>
                                        <a href="<?php echo get_category_link( $intCategoryId ); ?>">
                                        <?=$category_name;?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <?php 
                                    $strFromatedtitleforReleatedArticle = get_the_title();
                                    $strlen = strlen($strFromatedtitleforReleatedArticle);

                                    if($strlen >= 45){
                                    $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                                    }else{
                                    $formatedC = $strFromatedtitleforReleatedArticle;
                                    }
                                    ?>

                                    <h4 class="title-wrap">
                                    <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php echo $formatedC;?>
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

<!--home4-->
<div class="homeD-wrap grey-wrap">
    <div class="row row-padding">
        <div class="homeE-left-wrap left col-17">
            <div class="mod-ask-jean-question clearfix">
                <h3>Go ahead</h3>
                <h2>Ask Jean a Question</h2>
                <p>Go ahead, ask me anything about buying, servicing, and living with your car. If I don't know the answer (horror!), I know where to get it. Feel free to ask or search questions that have already been answered.</p>
                <a class="btn-main-cta" href="/ask-jean-question/" title="Ask Jean a question about car">Go ahead, ask me!</a>
            </div>                </div>
        <div class="homeE-right-wrap right col-18">
            <?php do_shortcode('[social_widget]'); ?>
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
                $categoryObj = get_category_by_slug('new-cars'); 
                $categoryId = $categoryObj->term_id;
                $subCategoriesId = null;
                 $subCategories = get_categories( array( 'child_of' => $categoryId )); 
                    foreach ( $subCategories as $category ) {
                        $subCategoriesId[] =  $category->term_id;
                    }
                
                $posts = query_posts(array(
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'category__not_in' => $subCategoriesId,
                    'posts_per_page' => '6',
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
                                           if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                                                MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false);
                                           }else {  ?>
                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                            <?php }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category($the_post->ID);
                                        $intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
                                        $category_name = is_array($categories) ? $categories[0]->name : $categories->name;
                                        ?>
                                        <a href="<?php echo get_category_link( $intCategoryId ); ?>">
                                        <?=$category_name;?>
                                        </a>
                                    </div>
                                    <div class="info-wrap">
                                        <?php 
                                    $strFromatedtitleforReleatedArticle = get_the_title();
                                    $strlen = strlen($strFromatedtitleforReleatedArticle);

                                    if($strlen >= 45){
                                    $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                                    }else{
                                    $formatedC = $strFromatedtitleforReleatedArticle;
                                    }
                                    ?>

                                    <h4 class="title-wrap">
                                    <a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php echo $formatedC;?>
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
                <a class="button btn-main-cta btn-loading"
                style = "display:none;" href="/" title="Load more">
                <i class="fa fa-refresh fa-spin"></i>
                </a>
            </div>
        </div>

    </div>
</div>


<?php get_footer(); ?> 
<script type="text/javascript">
    $(document).ready(function(){ 
         
            var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

            var maketext = "";

              $("#makes").change(function () {
                    $("select#model").html('');
                    $(".model_top").text('Choose model');
                     $("#model").append('<option value="">Choose model</option>');
                    
                    $(".make_top").text($('#makes option:selected').text());
                    maketext = $('#makes option:selected').text();
                    makelink = $('#makes option:selected').data('slug');
                    
                    $.ajax({
                        url :ajax_url,
                        type: "POST",
                        data : {
                            action : 'post_make_model',
                            name : maketext
                        }, 
                        success: function(data){
                            var models = JSON.parse(data);
                            $.each(models, function( index, value ) {
                              $("#model").append("<option value=" + value.name + " data-slug = "+'"'+ value.slug +'"' + ">" + value.name +"</option>");
                                });

                            $("#make_model_go").removeClass('disabled');
                            $(".dropdown-custom span").removeClass('disabled');
                            $("select#model").removeAttr('disabled');
                             $("a#make_model_go").attr('href',
                                "<?php echo site_url();?>" +'/'+makelink); 
                            
                        }});


                        

                });

                var modeltext = "";
                $("#model").change(function () {  
                    $(".model_top").text($('#model option:selected').text());
                    modeltext = $('#model option:selected').text();
                    modellink = $('#model option:selected').data('slug');

                    $("a#make_model_go").attr('href',"<?php echo site_url();?>" +'/'+makelink +'/'+ modellink); 

                }); 


                               

    });

</script> 
