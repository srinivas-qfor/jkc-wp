<?php
/**
 * The template for displaying single article for confession  post type
 * @package jkc
 */

get_header(); 

wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_style( 'mod-reset', get_template_directory_uri() . '/assets/css/reset.css',null,null,"screen" );
wp_enqueue_style( 'mod-global', get_template_directory_uri() . '/assets/css/global.css',null,null,"screen" );
wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css',null,null,"screen" );
wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-title', get_template_directory_uri() . '/assets/css/mod-confessions-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-form', get_template_directory_uri() . '/assets/css/mod-confessions-form.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item-confessions', get_template_directory_uri() . '/assets/css/mod-list-item-confessions.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css',null,null,"screen" );

wp_enqueue_script( 'load', 'http://a.postrelease.com/serve/load.js?async=true',null,null,true); 
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',null,null,true); 
wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
wp_enqueue_script( 'typekit', 'http://use.typekit.net/hcl6hob.js',null,null,true); 
wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true);
wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js',null,null,true);
wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js',null,null,true); 
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true); 
wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
wp_enqueue_script( 'mod-confessions-form', get_template_directory_uri() . '/assets/js/mod-confessions-form.js',null,null,true); 
wp_enqueue_script( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq.js',null,null,true); 
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true); 
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js',null,null,true); 
wp_enqueue_script( 'mod-confessions-title', get_template_directory_uri() . '/assets/js/mod-confessions-title.js',null,null,true); 

?>
<style>
.mod-confessions-title{ position: relative; }
.confessions-title-inner{ position: relative; }
.mod-confessions-title h1 { margin-top: -222px; float: left; position: relative; margin-bottom: 0; }
.confessions-title-inner > div{ position: relative; float: left; margin-top: -194px !important; }
.confessions-rules { top:170px !important; }
.confessions-title-inner >img { border-radius: 6px; height: 236px;}
.mod-confessions-title { height: 252px; }
.mod-confessions-title h1 {     margin-top: -222px !important; margin-left: 20px !important; }
</style>
<div class="content-top-wrap">
	<div class="row">
		<div class="row">
			<div class="mod-breadcrumbs clearfix">
				<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumb" href="/" title="Home" itemprop="url"><span itemprop="title">Home</span></a></div>
				<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumb" href="/confessions/" title="Car Confessions" itemprop="url"><span itemprop="title">Car Confessions</span></a></div>
				<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><span class="crumb" itemprop="title"><?php echo get_the_date(); ?></span></div>
			</div>
		</div>
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
			<div class="desc"><?php $term_description = term_description(); printf($term_description); ?></div>
		</div> 
	</div>
</div>
<div class="row">
	<div class="main-column left col-17">
	<?php
	$theAJQPage = '';
	$theAJQPage = get_page_by_title( 'Car Confessions', 'ARRAY_A', 'page' );
	?>
	<?php
	if(!empty($theAJQPage['post_content'])){
		echo $theAJQPage['post_content'] ;
	}
        $arrCurrentCategoryDetails = '';
        $arrCurrentCategoryDetails = get_the_category($post->ID);
        $strCategoryName = '';
        $strCategoryName = $arrCurrentCategoryDetails[0]->name;
	?>

            <div class="mod-list-item-confessions-wrap">
                <div class="load-more-well clearfix">
                    <div class="mod-list-item-confessions mod-list-item">
                        <div class="info clearfix"> 
                            <h4 class="title-wrap left">#<?php echo $strCategoryName; ?></h4>
                                <a href="<?php the_permalink(); ?>" class="left date">September 10, 2015</a>
                                <div class="confession-share right">
                                    <span class="icon-share"></span>
                                    <span class="share-btn">Share</span>
                                    <div class="mod-addthis-hover">
                                        <div class="addthis_toolbox" addthis:url="<?php the_permalink(); ?>">
                                            <span class="addthis-share">Share</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-wrap">
                                     "<?php the_title(); ?>"
                                </div>
                        </div>
                    </div> 	
                </div>
            </div>
       </div>
	<div class="right-column right col-18">
		<?php //echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		<?php echo do_shortcode( '[social_widget]' ) ?>
	</div>
</div>

<?php get_footer(); ?>