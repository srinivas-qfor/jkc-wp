<?php
/**
 * The Make Modele Mobile template file
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


include_once 'includes/grid.class.php';
include_once  (ABSPATH .'wp-admin/includes/taxonomy.php');
get_header();


if (is_category()) {
    $this_category = get_category($cat);
}

$cat_nam = $this_category->name;
$sub_cat = strtoupper(get_query_var('make-model'));
$sub_str = (!empty($sub_cat)) ? '-'.' '.$sub_cat : ' ';

?>

    <!-- tittle -->
    <div class="mod-title">
        <h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ) . " " . $sub_str . " " ."Guide");?></h1>
        <div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
    </div>

    <!-- listing -->
    <div class="mod-list-item-vehicle-mobile-wrap">
                        <h3>Browse all <?php echo $cat_nam .' '. $sub_str; ?> Cars</h3>
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

                                if(MultiPostThumbnails::get_the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false) == ''){?>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-620x387.jpg" alt="<?php the_title(); ?>" draggable="false">
                                    <?php 
                                }else{

                                 MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false);   
                                }
                                
                                }
                                else { ?>

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
            <?php
                global $wp_query;
                if ( have_posts() && $wp_query->max_num_pages > 1) : ?>
                <div class="mod-load-more-vehicle clearfix">
                   
                    <a class="first page-numbers" href="<?=get_pagenum_link(1);?>"><i class="fa fa-step-backward"></i></a>
                    <?php
                    the_posts_pagination( array(
                        'prev_text'          => __( '<i class="fa fa-caret-left"></i>', 'twentysixteen' ),
                        'next_text'          => __( '<i class="fa fa-caret-right"></i>', 'twentysixteen' ),
                        'screen_reader_text' => __('', 'twentysixteen'),
                    ) );
                    ?>
                    <a class="last page-numbers" href="<?=get_pagenum_link($wp_query->max_num_pages);?>"><i class="fa fa-step-forward"></i></a>
                   
                </div>
                <?php endif; ?>

    </div>
    <!-- listing -->

    <!--model list -->
    <div class="mod-browse-by-model-mobile clearfix">
                <h3>Browse by Vehicle Model</h3>

                    <div class="columns col-6"> 
                <?php 
                    $parent = term_exists($cat_nam, 'make-model');
                    $parent_category = get_term_by('id', $parent['term_id'], 'make-model');
                    $categories = get_terms( 'make-model', array(
                                'child_of' => $parent['term_id']
                                ) );
                    $i =0;
                     foreach ($categories as $key => $row) {
                            $mid[$key] = $row->name;
                         }
                        if(!empty($mid)){
                         array_multisort($mid, SORT_ASC, $categories);
                        }
                    foreach($categories as $category) { 
                        $model_link = site_url('/'.$parent_category->slug.'/'.$category->slug.'/');
                        ?>
                            <div>       
                            <a class="filter-item first-row" href="<?php echo $model_link ;?>" title="<?php echo $category->name ;?>"><?php echo $category->name ;?></a>
                            </div>
                            
                    
                    <?php 
                        $i++;

                            if(($i % 5) == 0){
                                ?>
                                </div>
                                <div class="columns col-6">
                            <?php
                                }

                        }


                    ?>
                </div>
    </div>
    <!--model list -->


<?php 

echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2"]'); 
 
 get_footer();


?>

