<?php
/**
 * The template for displaying single article for confession  post type
 * @package jkc 
 */

get_header(); 

wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-title', get_template_directory_uri() . '/assets/css/mod-confessions-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-form', get_template_directory_uri() . '/assets/css/mod-confessions-form.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item-confessions', get_template_directory_uri() . '/assets/css/mod-list-item-confessions.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css',null,null,"screen" );

wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true); 
wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
wp_enqueue_script( 'mod-confessions-form', get_template_directory_uri() . '/assets/js/mod-confessions-form.js',null,null,true); 
wp_enqueue_script( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq.js',null,null,true);
wp_enqueue_script( 'mod-confessions-title', get_template_directory_uri() . '/assets/js/mod-confessions-title.js',null,null,true); 

?>
<style>
 .mod-confessions-title{ position: relative; }
 .mod-confessions-title >img { position: absolute; }
.confessions-title-inner{ position: relative; }
.mobile-page .mod-confessions-title h1{ top:-170px !important;}
</style>


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

<?php get_footer(); ?>