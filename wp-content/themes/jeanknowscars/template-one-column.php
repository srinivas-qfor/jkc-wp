<?php
/*
 * Template Name: One Column
 * Description: One Column template with plain design
 */

wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css');
wp_enqueue_style( 'mod-company-terms-conditions', get_template_directory_uri() . '/assets/css/mod-company-terms-conditions.css');
get_header(); ?>
<div class="content-top-wrap">
    <div class="row">
        <!--Navigation-Links-->
        <?php get_template_part('template-parts/navigation','breadcrumb'); ?>       
    </div>
</div>
<div class="feature-wrap">
<div class="row">
    <div class="feature-left-wrap left col-17"></div>
    <div class="feature-right-wrap right col-18"></div>
</div>
</div>

<div class="row row-padding">
    <div class="main-column">
        <div class="mod-company-terms-conditions">
        <?php if ( have_posts() ) :
            // Start the loop.
            while ( have_posts() ) : the_post();
                    the_content();
            // End the loop.
            endwhile;
        endif; 
        ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>	