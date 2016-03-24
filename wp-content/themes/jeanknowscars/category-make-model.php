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
//$currentCategory = get_query_var('category');
if (is_category()) {
    $this_category = get_category($cat);
}
$cat_nam = $this_category->name;
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
            <!-- <div class="mod-load-more-vehicle clearfix">
                <div class="right"> -->
                        <!-- <span class="first"><i class="fa fa-step-backward"></i></span>
                        <span class="prev"><i class="fa fa-caret-left"></i></span> -->
                 
                <?php 
                if ( have_posts() ) :
                the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
                ) );
                endif;
                ?>

                        <!-- <span class="next"><i class="fa fa-caret-right"></i></span>
                        <span class="last"><i class="fa fa-step-forward"></i></span> -->
                        
            
                <!-- </div>
            </div> -->


        </div>
        <!-- listing -->

            <div class="mod-browse-by-model clearfix">
                <h3>Browse by Vehicle Model</h3>

                    <div class="columns col-4"> 
                <?php 
                    $parent = term_exists($cat_nam, 'make-model');
                    $parent_category = get_term_by('id', $parent['term_id'], 'make-model');
                    $categories = get_terms( 'make-model', array(
                                'child_of' => $parent['term_id']
                                ) );
                    $i =0;
                    foreach($categories as $category) { 
                        $model_link = site_url('/'.$parent_category->slug.'/'.$category->slug.'/');
                        ?>
                            <div>       
                            <a class="filter-item first-row" href="<?php echo $model_link ;?>" title="<?php echo $category->name ;?>"><?php echo $category->name ;?></a>
                            </div>
                            
                    
                    <?php 
                        $i++;
                            if(($i % 4) == 0){
                                ?>
                                </div>
                                <div class="columns col-4">
                            <?php
                                }
                        }
                    ?>
                </div>
            </div>
        
          

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

<script type="text/javascript">
    $(document).ready(function(){ 
              
                            
                 
                
    });
</script>


<!-- -->
        <!--new -->

        <!-- <div class="mod-list-item-vehicle left col-21 first-page first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <img src="http://image.staging1.int.jeanknowscars.com/f/142426688+w620+h387+re0+cr1+ar0/acura-rlx-sport-hybrid-2016-header.jpg" alt="2016 Acura RLX" height="387" width="620" onerror="this.src='/img/jkc-no-image-620x387.jpg'" />
                    <a href="/new-cars/acura/2016-acura-rlx/" title="2016 Acura RLX" class="img-hover">
                        <span>
                            See this model
                        </span>
                    </a>
                </div>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="/new-cars/acura/2016-acura-rlx/" title="2016 Acura RLX">2016 Acura RLX</a></h4>
                                        <div class="tags-wrap clearfix">
                                                    <div class="year">Year: <span>2016</span></div>
                                            </div>
                                        <div class="desc">On technology alone, don't overlook this luxury sedan.</div>
                </div>
                <div class="social clearfix">
                    <span class="share-btn left">Share</span>
                    <div class="mod-addthis-hover">
                        <div class="addthis_toolbox" addthis:url="http://local.jeanknowscars.com//new-cars/acura/2016-acura-rlx/" addthis:title="2016 Acura RLX">
                            <span class="addthis-share left">Share</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
         <!-- end new -->