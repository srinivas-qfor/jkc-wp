<?php

add_theme_support('title-tag');

include_once "shortcodes.php";
include_once "functions/instagram.php";

function load_front_end_scripts(){
	## Loading CSS for Common pages
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' );
	wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css' );
	wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css' );
	wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css' );
	wp_enqueue_style( 'font-awsome', "http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css",null,null,"screen");
        
        if(wp_is_mobile()){ }
        

	## Loading JS for common pages        
        //wp_enqueue_script( 'type-kit','http://code.jquery.com/jquery-1.11.0.min.js');   
        wp_enqueue_script( 'type-kit','http://a.postrelease.com/serve/load.js?async=true');         
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');  
        wp_enqueue_script( 'jquery.cookie.min', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js');  
        wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js');          
        wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js');                  
        wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js');
        wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js');

        wp_localize_script( 'plugins', 'jkc', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		));
        
}

add_action( 'wp_enqueue_scripts', 'load_front_end_scripts' );

add_filter('body_class','jkc_template_body_class');

add_theme_support( 'menus' );

function jkc_template_body_class($classes = '') {
	
	if(is_front_page()) $classes[] = 'desktop-page new-cars';
	return $classes;
}
 /* To Enable Freatures Image box in the Post page */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 640, 407 );

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Promo Image',
            'id' => 'promo-image',
            'post_type' => 'post'
        )
    );
}
/* Change number of posts for author listing page */
function jkc_page_list_count($query) {
	if (is_admin() || ! $query->is_main_query())
		return;

	if (is_author()) {
		$query->set('posts_per_page', 10);
		return;
	}
}
add_action('pre_get_posts', 'jkc_page_list_count', 1);

/* Re-write author URL to contributors */
function jkc_change_author_slug() {
	global $wp_rewrite; 
	$wp_rewrite->author_base = 'contributors';
}
add_action('init', 'jkc_change_author_slug');

include_once "admin".DIRECTORY_SEPARATOR."admin-functions.php";