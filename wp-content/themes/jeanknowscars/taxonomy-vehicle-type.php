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
wp_enqueue_style( 'mod-browse-by-model', get_template_directory_uri() . '/assets/css/mod-browse-by-model.css',null,null,"screen" );

## Loading js for front page
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);

$pageNum = (int)get_query_var('paged', 1);


$cat_nam = get_query_var('vehicle-type');
$parent = term_exists($cat_nam, 'vehicle-type');
$posts = query_posts( array(  
    'post_type' => 'post',
    'paged' => $pageNum, 
    'posts_per_page' => 10, 
    'tax_query' => array( 
        array( 
            'taxonomy' => 'vehicle-type',
            'terms' => $parent['term_id']
        ) 
    ) 
) );

?>

<!-- -->
<div class="row">



        <!--left side-->
        <div class="main-column left col-17">
                <!-- breadcrumb-->
                <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   
                <div class="mod-title">
                    <h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
                    <div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
                </div>
                <!-- -->
        <!-- listing -->
        <div class="mod-list-item-vehicle-wrap">
                        <h3>Browse all <?php echo $cat_nam; ?> Cars</h3>
                    <div class="load-more-well clearfix">

                     <?php   

                        if (have_posts()) :
                            $i = 1;
                            while (have_posts()) : the_post();
                                $sig_post = get_post();
                                $year_str = $sig_post->post_name;
                                $year = explode("-",$year_str);
                            ?>

                        <div class="mod-list-item-vehicle left col-21 first-page <?php 
                         if($i % 2 != 0){  echo "first-col";} ?>">

                            <div class="row">
                                <!-- image wrap-->
                                <div class="img-wrap">
                                <?php
                                if (class_exists('MultiPostThumbnails')){ 
                                MultiPostThumbnails::the_post_thumbnail('post', 'flipper-image', NULL, 'full', NULL, false);
                                }else {  ?>
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-620x387.jpg" alt="<?php the_title(); ?>" draggable="false">
                                <?php }
                                ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="img-hover">
                                    <span>See this model</span>
                                </a>
                                </div>
                                <!--info -->

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
                                <div class="tags-wrap clearfix">
                                        <div class="year">Year: <span>
                                        <?php echo $year['0'];?>
                                        </span></div>
                                </div>
                                <div class="desc">
                                <?php the_excerpt(); ?>
                                </div>
                                </div>

                                <!-- social icon-->
                                <div class="social clearfix">
                                <span class="share-btn left">Share</span>
                                    <div class="mod-addthis-hover">
                                        <div class="addthis_toolbox" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title(); ?>">
                                        <span class="addthis-share left">Share</span>
                                        </div>
                                    </div>
                                </div>





                            </div>
                        </div>

                            <?php 
                             $i++;
                            endwhile;
                                wp_reset_postdata();
                        endif;

        //exit;

        ?>

                    </div>

            <!-- pagination-->
            <div class="mod-load-more-vehicle clearfix">
                <div class="right">
                        <!-- <span class="first"><i class="fa fa-step-backward"></i></span>
                        <span class="prev"><i class="fa fa-caret-left"></i></span> -->
                 
                        <?php 
                        if ( have_posts() ) :
                        the_posts_pagination( array(
                        'mid_size' => 2,
                        //'format'             => 'page-%#%',
                        'prev_text'          => __( '' ),
                        'next_text'          => __( '' ),
                        ) );
                        endif;
                        ?>

                        <!-- <span class="next"><i class="fa fa-caret-right"></i></span>
                        <span class="last"><i class="fa fa-step-forward"></i></span> -->
                        
            
                </div>
            </div>


        </div>
        <!-- listing -->

                      

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
         <!--right side -->







</div>
<!--End -->
<?php get_footer(); ?>  



        