<?php

get_header(); ?>

<?php
wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-404', get_template_directory_uri() . '/assets/css/mod-404.css',null,null,"screen" );
wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_script( 'jquery11', 'http://code.jquery.com/jquery-1.11.0.min.js',null,null,true); 
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',null,null,true); 
wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
wp_enqueue_script( 'typekit', 'http://use.typekit.net/hcl6hob.js',null,null,true); 
wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true); 
wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',null,null,true); 
?>
<div class="feature-wrap">
    <div class="row">
        <div class="feature-left-wrap left col-17">
        </div>
        <div class="feature-right-wrap right col-18">
        </div>
    </div>
</div>
<div class="row row-padding">
    <div class="main-column">
        <div class="mod-404">
            <div class="row desktop-page">
                <h1 class="text-404">Oooops - 404! We couldn't find your page.</h1>
                <div class="img-404">
                    <img class="img" src="<?=get_template_directory_uri();?>/assets/img/mod-404-jean.jpg" alt="404" height="340" width="264" alt="404" title="404">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>