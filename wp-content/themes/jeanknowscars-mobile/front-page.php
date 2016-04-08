<?php
/**
 * The main template file
 * @package Jean_Knows_Cars
 */

// stylesheets
wp_enqueue_style( 'mod-tab', get_template_directory_uri() . '/assets/css/mod-tab.css',null,null,"screen" );
wp_enqueue_style( 'mod-title-block-mobile', get_template_directory_uri() . '/assets/css/mod-title-block-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-jean-driveway-mobile', get_template_directory_uri() . '/assets/css/mod-jean-driveway-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-kids-in-the-car-mobile', get_template_directory_uri() . '/assets/css/mod-kids-in-the-car-mobile.css',null,null,"screen" );

wp_enqueue_style( 'mod-flipper-mobile', get_template_directory_uri() . '/assets/css/mod-flipper-mobile.css',null,null,"screen" );

// scripts
wp_enqueue_script( 'mod-tab', get_template_directory_uri() . '/assets/js/mod-tab.js',null,null,true); 

include_once 'includes/grid.class.php';
$grid = new Grid;
get_header();

$pageNum = (int)get_query_var('paged', 1);
?>
    <!--Flipper-->
        <?php
        if (class_exists('Flipper') && shortcode_exists('flipper'))
            echo do_shortcode('[flipper name="home-flipper-mobile"]')
         ?>                                  
    <!-- -->

<div class="ctr-home-row ctr-home-mobile-recent">
    <ul>
        <li class="btn-mobile-recent btn-mobile-active active">
            <span class="mobile-icon-calendar"></span>
            <span>Most Recent</span>
        </li>
        <li class="btn-mobile-categories">
            <span class="mobile-icon-list"></span>
            <span>Categories</span>
        </li>
    </ul>
</div>

<div class="mod-ad-mobile mod-ad-top-mobile" itemscope itemtype="http://schema.org/WPAdBlock">
    <!-- Beginning Async AdSlot 1 for Ad unit trb.latimes/jeanknowscars  ### size: [[320,50]] -->
    <!-- Adslot's refresh function: googletag.pubads().refresh([gptadslots[1]]) -->
    <div id='div-gpt-ad-416149396091328938-1'>
        <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-416149396091328938-1'); });
        </script>
    </div>
    <!-- End AdSlot 1 -->
</div>

<div class="mod-title-block-mobile ">
    <div class="headline">
        <h2>Latest Articles</h2>
        <h3>Life with cars. Adventures, memories, visits with Fast Women, and anything else I want to talk about with you.</h3>
        <h1 class="tagline hide" itemprop="headline">
            <span class="no-wrap">less car hassle</span>
            <span class="no-wrap">more car love</span>
        </h1>
    </div>
</div>
<?php
$categoryObj = get_category_by_slug('new-cars'); 
$categoryId = $categoryObj->term_id;
$subCategoriesId = null;
 $subCategories = get_categories( array( 'child_of' => $categoryId )); 
    foreach ( $subCategories as $category ) {
        $subCategoriesId[] =  $category->term_id;
    }

$posts = get_posts(array(
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'category__not_in' => $subCategoriesId,
    'posts_per_page' => '6',
    'paged' => $pageNum
));
?>
<div class="mod-list-item-wrap">
    <div class="load-more-well clearfix">
        <?php $grid->loopItems($posts); ?>
    </div>
</div>

<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2" cont-class=""]'); ?>

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
?>
    <a class="button btn-main-cta btn-loading"
    style = "display:none;" href="/" title="Load more">
    <i class="fa fa-refresh fa-spin"></i>
    </a>
</div>

<!-- Categories -->
<div class="mod-jean-driveway hide">
    <div class="mod-title-block-mobile ">
        <div class="headline">
            <h2>
            <a href="/jeans-driveway/" title="Jean's Driveway">
            Jean's Driveway </a>
            </h2>
            <h3>Short, Sweet Car Reviews.</h3>
        </div>
    </div>
    <?php
    $posts = query_posts(array(
        'post_status' => 'publish',
        'category_name' => 'jeans-driveway',
        'posts_per_page' => '2'
    ));
    $grid->loopItems($posts); 
    ?>
</div>

<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="4" cont-class="hide"]'); ?>

<div class="mod-car-guide-mobile hide">
    <div class="mod-title-block-mobile border-bottom">
        <div class="headline">
            <h2>
            Car Guide </h2>
            <h3>Find Your Best Car Here.</h3>
        </div>
    </div>
</div>
<div class="mod-filter-make-model hide">
    <div class="shop-wrapper clearfix">
        <span class="tease">I already have a vehicle in mind: </span>
        <div class="mod-shop-makemodel ">
            <div class="makeDropdown">
                <select data-type="make" style="z-index: 10; opacity: 0; width: 170px;">
                    <?php 
                    $makes = get_categories(array(
                            'child_of' => 119,
                        ));
                    foreach ($makes as $make) {
                        echo "<option value=\"{$make->slug}\">{$make->name}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="modelDropdown">
                <select data-type="model" class="" style="z-index: 10; opacity: 0; width: 170px;" disabled="disabled">
                    <option value="">Choose Model</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="mod-browse-by-vehicle-type hide">
    <ul class="tiles">
        <li class="tile tile-family">
        <a href="/family/" class="tile-link" title="Family"><span class="tile-name">Family</span></a>
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


<div class="kids-in-the-car-mobile hide">
    <div class="mod-title-block-mobile ">
        <div class="headline">
            <h2>
            <a href="/kids-in-the-car/" title="Kids in the Car">
            Kids in the Car </a>
            </h2>
            <h3>From 0 to 18 in What Feels Like Seconds.</h3>
        </div>
    </div>
    <?php 
    $posts = get_posts(array(
        'post_status' => 'publish',
        'category_name' => 'kids-in-the-car',
        'posts_per_page' => '2'
    ));
    $grid->loopItems($posts); 
    ?>
</div>

<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="5" cont-class="hide"]'); ?>

<div class="you-auto-know-mobile hide">
    <div class="mod-title-block-mobile ">
        <div class="headline">
            <h2>
            <a href="/you-auto-know/" title="You Auto Know">
            You Auto Know </a>
            </h2>
            <h3>Advice about Buying, Servicing, and Living with Your Car.</h3>
        </div>
    </div>
    <?php
    $posts = get_posts(array(
        'post_status' => 'publish',
        'category_name' => 'you-auto-know',
        'posts_per_page' => '3'
    )); ?>
    <div class="mod-list-item-wrap">
        <div class="load-more-disabled clearfix">
            <?php $grid->loopItems($posts); ?>
        </div>
    </div>
</div>
<?php
get_footer();

?>