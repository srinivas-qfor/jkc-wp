<?php

/**
 * The template for displaying pages
 * @package Jean_Knows_Cars
 */


wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-contributors-mobile', get_template_directory_uri() . '/assets/css/mod-contributors-mobile.css',null,null,"screen" );

get_header(); 

?>

<div class="content-top-wrap" id="post-<?php the_ID(); ?>">
    
            <div class="mod-title">
                <?php the_title( '<div class="pagetitle"><h1 itemprop="name">', '</h1></div>' ); ?>
            </div> 
            <div class="mod-contributors-mobile">
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

</div>


<?php get_footer(); ?>