<?php

/**
 * The template for displaying pages
 * @package Jean_Knows_Cars
 */

get_header(); 



## Loading CSS for pages
wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css',null,null,"screen" );
wp_enqueue_style( 'mod-sort-by-category', get_template_directory_uri() . '/assets/css/mod-sort-by-category.css',null,null,"screen" );
#wp_enqueue_style( 'mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css',null,null,"screen" );
#wp_enqueue_style( 'mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css',null,null,"screen" );
#wp_enqueue_style( 'mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css',null,null,"screen" );
#wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-contributors', get_template_directory_uri() . '/assets/css/mod-contributors.css',null,null,"screen" );
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
#wp_enqueue_style( 'mod-title-block', get_template_directory_uri() . '/assets/css/mod-title-block.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );

## Loading js for front page

#wp_enqueue_script( 'mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js',null,null,true);
#wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true);
wp_enqueue_script( 'mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 

?>

<!--Breadcrumb-->
<div class="content-top-wrap" id="post-<?php the_ID(); ?>">
    <div class="row">
        <div class="main-column left col-17">
            <!--Navigation-Links-->
            <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   

            <div class="mod-title">
                <?php the_title( '<div class="pagetitle"><h1 itemprop="name">', '</h1></div>' ); ?>
            </div> 
            <?php if ( have_posts() ) :
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                    global $post;
                    the_content();
                    // End the loop.
                    endwhile;
                  endif; 
            ?>
        </div>

        <div class="right-column right col-18">
            <!-- Car-Confessions -->                 
            <?php echo do_shortcode('[add_block name="car-confessions" ad_col_wrap="off"]') ?>
            <?php get_sidebar('stay-connected'); ?>
        </div>            
    </div>
</div>

<?php get_footer(); ?>
