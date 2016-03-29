<?php
/**
 * The Vehicle Type Mobile template file
 * @package Jean_Knows_Cars
 */

// stylesheets
wp_enqueue_style( 'mod-tab', get_template_directory_uri() . '/assets/css/mod-tab.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-make-mobile', get_template_directory_uri() . '/assets/css/mod-browse-by-make-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-browse-by-model-mobile', get_template_directory_uri() . '/assets/css/mod-browse-by-model-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item-vehicle-mobile', get_template_directory_uri() . '/assets/css/mod-list-item-vehicle-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec-mobile', get_template_directory_uri() . '/assets/css/mod-ad-mrec-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more-vehicle', get_template_directory_uri() . '/assets/css/mod-load-more-vehicle.css',null,null,"screen" );

// scripts
wp_enqueue_script( 'mod-tab', get_template_directory_uri() . '/assets/js/mod-tab.js',null,null,true);
wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);


include_once 'includes/grid.class.php';
include_once  (ABSPATH .'wp-admin/includes/taxonomy.php');
get_header();

$sub_cat = get_query_var('vehicle-type');

?>

                <!--title -->
                 <div class="mod-title">
                    <h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ). " " ."Guide");?></h1>
                    <div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
                </div>
                <!-- -->

<!-- listing -->
    <div class="mod-list-item-vehicle-mobile-wrap">
                         <h3>Browse all <?php echo $sub_cat; ?> Cars</h3>
                    <div class="load-more-well clearfix">

                        <?php               
                        if (have_posts()) :
                            $i = 1;
                            while (have_posts()) : the_post();
                                $sig_post = get_post();
                                $year_str = $sig_post->post_name;
                                $year = explode("-",$year_str);
                            ?>

                        <div class="mod-list-item-vehicle-mobile first-page <?php 
                         if($i % 2 != 0){  echo "first-col";} ?>">

                            <div class="row">
                            <div class="left col-6">
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

                                <!--info -->
                             <div class="info-wrap left col-6 ">
                                
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

            <!--pagination -->
            <div class="mod-load-more-vehicle clearfix">
                <div class="right">
                        <!-- <span class="first"><i class="fa fa-step-backward"></i></span>
                        <span class="prev"><i class="fa fa-caret-left"></i></span> -->
                 
                <?php 
                if ( have_posts() ) :
                the_posts_pagination( array(
                'mid_size' => 2,
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

<?php 

echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2"]'); 
 
 get_footer();


?>