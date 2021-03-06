<?php
@ini_set( 'max_execution_time', '3000' );
include_once "shortcodes.php";
include_once "functions/instagram.php";
include_once "functions/make-model.php";
include_once "custom-posts/askquestion.php";
include_once "custom-posts/confessions.php";

if(!function_exists('load_front_end_scripts')) {
    function load_front_end_scripts(){

        /*
        Register the style and scripts and can use it anywhere as enqueue_script
        */
        ## Loading CSS for Common pages
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' );
        wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
        wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css' );
        wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css' );
        wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css' );
        wp_enqueue_style( 'font-awsome', "http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css",null,null,"screen");
        
        if( is_home() || is_front_page() ){
            wp_enqueue_style('lay-home', get_template_directory_uri() . '/assets/css/lay-home.css', null, null, "screen");
            wp_enqueue_style('mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css', null, null, "screen");
            wp_enqueue_style('mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css', null, null, "screen");
            wp_enqueue_style('mod-filter-make-model', get_template_directory_uri() . '/assets/css/mod-filter-make-model.css', null, null, "screen");
            wp_enqueue_style('mod-browse-by-vehicle-type', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type.css', null, null, "screen");
            wp_enqueue_style('mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css', null, null, "screen");
            wp_enqueue_style('mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css', null, null, "screen");
            wp_enqueue_style('mod-list-item', get_template_directory_uri() . '/assets/css/mod-list-item.css', null, null, "screen");
            wp_enqueue_style('mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css', null, null, "screen");
            wp_enqueue_style('mod-title-block', get_template_directory_uri() . '/assets/css/mod-title-block.css', null, null, "screen");
            wp_enqueue_style( 'mod-flipper', plugins_url().'/mod-flipper/css/mod-flipper.css');    
            wp_enqueue_script('mod-filter-make-model', get_template_directory_uri() . '/assets/js/mod-filter-make-model.js', null, null, true);
            wp_enqueue_script('mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js', null, null, true);
            wp_enqueue_script('mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js', null, null, true);
        }

    if( is_post_type_archive()){
        wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css',[],true,"screen" );
        wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
        wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
        wp_enqueue_style( 'mod-reset', get_template_directory_uri() . '/assets/css/reset.css',null,null,"screen" );
        wp_enqueue_style( 'mod-global', get_template_directory_uri() . '/assets/css/global.css',null,null,"screen" );
        wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css',null,null,"screen" );
        wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css',null,null,"screen" );
        wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
        wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
        wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
        wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
        wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
        wp_enqueue_style( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css',null,null,"screen" );
        wp_enqueue_style( 'mod-faq-title', get_template_directory_uri() . '/assets/css/mod-faq-title.css',null,null,"screen" );
        wp_enqueue_style( 'mod-faq-form', get_template_directory_uri() . '/assets/css/mod-faq-form.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-item-faq-css', get_template_directory_uri() . '/assets/css/mod-list-item-faq.css',null,null,"screen" );
        wp_enqueue_style( 'mod-confessions-title', get_template_directory_uri() . '/assets/css/mod-confessions-title.css',null,null,"screen" );
        wp_enqueue_style( 'mod-confessions-form', get_template_directory_uri() . '/assets/css/mod-confessions-form.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-item-confessions', get_template_directory_uri() . '/assets/css/mod-list-item-confessions.css',null,null,"screen" );

        wp_enqueue_script( 'selectivizr-min.js', get_template_directory_uri() . '/assets/js/selectivizr-min.js',null,null,true); 
        wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
        wp_enqueue_script( 'usetypekitnet', 'https://use.typekit.net/hcl6hob.js',null,null,true);
        wp_enqueue_script( 'jquerycokokie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true); 
        wp_enqueue_script( 'postrelease', 'http://a.postrelease.com/serve/load.js?async=true',null,null,true);
        wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',null,null,true); 
        wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js',null,null,true); 
        wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js',null,null,true); 
        wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true); 
        wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
        wp_enqueue_script( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq.js',null,null,true); 
        wp_enqueue_script( 'mod-faq-form', get_template_directory_uri() . '/assets/js/mod-faq-form.js',null,null,true); 
        wp_enqueue_script( 'mod-list-item-faq', get_template_directory_uri() . '/assets/js/mod-list-item-faq.js',null,null,true); 
        wp_enqueue_script( 'mod-confessions-form-js', get_template_directory_uri() . '/assets/js/mod-confessions-form.js',null,null,true); 
        wp_enqueue_script( 'mod-confessions-title-js', get_template_directory_uri() . '/assets/js/mod-confessions-title.js',null,null,true); 
    }
    if(is_search()){
        wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',[],true,"screen" );
        wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
        wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
        wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
        wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
        wp_enqueue_style( 'mod-search', get_template_directory_uri() . '/assets/css/mod-search.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-search', get_template_directory_uri() . '/assets/css/mod-list-search.css',null,null,"screen" );
        wp_enqueue_script('mod-search-js', get_template_directory_uri() . '/assets/js/mod-search.js', null, null, true);
    }

            // Includes the below files for photo gallery pages.
        $pattern = '/photo-(.*?).html/';
        preg_match($pattern,$_SERVER['REQUEST_URI'],$matches);
        if(is_single() && $matches ){           
            wp_enqueue_style( 'mod-mod-gallery', get_template_directory_uri() . '/assets/css/mod-gallery.css',null,null,"screen" );
            wp_enqueue_style( 'mod-photo-overlay', get_template_directory_uri() . '/assets/css/mod-photo-overlay.css',null,null,"screen" );
        }
        ## Loading JS for common pages        
        wp_enqueue_script( 'jqueryjs','http://code.jquery.com/jquery-1.11.0.min.js');   
        wp_enqueue_script( 'type-kit','http://a.postrelease.com/serve/load.js?async=true');         
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');  
        wp_enqueue_script( 'jquery.cookie.min', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js');  
        wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js');          
        wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js');    
        wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js');
        wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js');              
        wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js');
        wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js');

        wp_localize_script( 'plugins', 'jkc', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }
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
            'label' => 'Home Image',
            'id' => 'home-image',
            'post_type' => 'post'
        )
    );
    
    new MultiPostThumbnails(
        array(
            'label' => 'Flipper Image',
            'id' => 'flipper-image',
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



function delete_post_media( $post_id ) {

    $attachments = get_posts( array(
        'post_type'      => 'attachment',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'post_parent'    => $post_id
    ) );

    foreach ( $attachments as $attachment ) {
        
        $attachmentsChilds = get_posts( array(
        'post_type'      => 'attachment',
        'posts_per_page' => -1,
        'post_status'    => 'any',
        'post_parent'    =>  $attachment->ID
        ) );
        if(!empty($attachmentsChilds)){
            foreach ( $attachmentsChilds as $attachmentsChild ) {
                    if ( false === wp_delete_attachment( $attachmentsChild->ID ) ) {
                        // Log failure to delete attachment.
                    }
           }
         }
         
        if ( false === wp_delete_attachment( $attachment->ID ) ) {
            // Log failure to delete attachment.
        }
    }
}
add_action('before_delete_post', 'delete_post_media');

add_filter('wp_dropdown_users', 'jkc_post_author_override');
function jkc_post_author_override($output)
{
	global $user_ID; global $post;
  // return if this isn't the theme author override dropdown
  if (!preg_match('/post_author_override/', $output)) return $output;

  // return if we've already replaced the list (end recursion)
  if (preg_match ('/post_author_override_replaced/', $output)) return $output;

  // replacement call to wp_dropdown_users 
  // excluding wpengine (userid #47) user from the dropdown list 
	$output = wp_dropdown_users(array(
		'echo' => 0,
		'who' => 'authors',
		'exclude' => 47,
		'name' => 'post_author_override_replaced',
		'selected' => empty($post->ID) ? $user_ID : $post->post_author,
		'include_selected' => true
	));

	// put the original name back
	$output = preg_replace('/post_author_override_replaced/', 'post_author_override', $output);

  return $output;
}

add_action( 'wp_ajax_nopriv_post_make_model', 'post_make_model' );
add_action( 'wp_ajax_post_make_model', 'post_make_model' );

function post_make_model() {
   
    if(!empty($_POST)){
         $name = $_POST['name'];
        $parent = term_exists($name, 'make-model');
         $categories = get_terms( 'make-model', array(
                                'child_of' => $parent['term_id']
                                ) );
         $model_list = array();

         $htmlOutput = '';
         foreach($categories as $category) { 

            $single['name'] = $category->name;
            $single['slug'] = $category->slug;
            $model_list[] = $single;

            $htmlOutput .= "<option value=\"{$category->slug}\">{$category->name}</option>";
        }

        echo (($_POST['response'] == 'html') ? $htmlOutput : json_encode($model_list));
        die();
    }
     
}

function jkc_limit_posts_in_search_page(  $query ) {
        if ( is_search() ) {
             $query->set( 'posts_per_page', 15 );
        }
}
add_filter('pre_get_posts', 'jkc_limit_posts_in_search_page');

/*
function fb_change_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/?q=" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}	
}
add_action( 'template_redirect', 'fb_change_search_url_rewrite' );
*/

add_filter( 'body_class', 'jkc_article_car_guide_classname' );
function jkc_article_car_guide_classname( $classes ) {
        $slugs = explode('/', get_query_var('category_name'));
        $currentCategory = get_category_by_slug('/'.end($slugs));
        if($currentCategory->category_parent == '119'){
        	$classes[] = 'article-car-guide';
        }
	return $classes;
}