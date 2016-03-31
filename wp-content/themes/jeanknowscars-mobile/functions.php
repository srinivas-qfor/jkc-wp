<?php
function load_front_end_scripts(){

    /*
    Register the style and scripts and can use it anywhere as enqueue_script
    */
	## Loading CSS for Common pages
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css' );
	wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css' );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css' );
	wp_enqueue_style( 'mod-footer-mobile', get_template_directory_uri() . '/assets/css/mod-footer-mobile.css' );
	wp_enqueue_style( 'mod-header-mobile', get_template_directory_uri() . '/assets/css/mod-header-mobile.css' );
	wp_enqueue_style( 'font-awsome', "http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css",null,null,"screen");
	wp_enqueue_style('mod-ad-bottom-mobile', get_template_directory_uri() . '/assets/css/mod-ad-bottom-mobile.css', null, null, "screen");
        wp_enqueue_style('mod-ad-mrec-bottom-mobile', get_template_directory_uri() . '/assets/css/mod-ad-mrec-bottom-mobile.css', null, null, "screen");
        wp_enqueue_style('mod-ad-mrec-mobile', get_template_directory_uri() . '/assets/css/mod-ad-mrec-mobile.css', null, null, "screen");
    
    if( is_home() || is_front_page() ){
        wp_enqueue_style('lay-mobile', get_template_directory_uri() . '/assets/css/lay-mobile.css', null, null, "screen");
        wp_enqueue_style('mod-filter-make-model-mobile', get_template_directory_uri() . '/assets/css/mod-filter-make-model-mobile.css', null, null, "screen");
        wp_enqueue_style('mod-browse-by-vehicle-type-mobile', get_template_directory_uri() . '/assets/css/mod-browse-by-vehicle-type-mobile.css', null, null, "screen");
        //wp_enqueue_style('mod-ask-jean-question', get_template_directory_uri() . '/assets/css/mod-ask-jean-question.css', null, null, "screen");
        //wp_enqueue_style('mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css', null, null, "screen");
        wp_enqueue_style('mod-list-item-mobile', get_template_directory_uri() . '/assets/css/mod-list-item-mobile.css', null, null, "screen");
        wp_enqueue_style('mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css', null, null, "screen");
        wp_enqueue_style('mod-title-mobile', get_template_directory_uri() . '/assets/css/mod-title-mobile.css', null, null, "screen");
        wp_enqueue_style( 'mod-flipper-mobile', plugins_url().'/mod-flipper/css/mod-flipper-mobile.css');    
        wp_enqueue_script('mod-filter-make-model-mobile', get_template_directory_uri() . '/assets/js/mod-filter-make-model-mobile.js', null, null, true);
        //wp_enqueue_script('mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js', null, null, true);
        wp_enqueue_script('mod-load-more.js', get_template_directory_uri() . '/assets/js/mod-load-more.js', null, null, true);
    }

    if( is_post_type_archive()){
        wp_enqueue_style( 'lay-mobile', get_template_directory_uri() . '/assets/css/lay-mobile.css',[],true,"screen" );
        wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
        wp_enqueue_style( 'mod-filter-confessions-faq-mobile', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq-mobile.css',null,null,"screen" );
        wp_enqueue_style( 'mod-faq-title-mobile', get_template_directory_uri() . '/assets/css/mod-faq-title-mobile.css',null,null,"screen" );
        wp_enqueue_style( 'mod-faq-form-mobile', get_template_directory_uri() . '/assets/css/mod-faq-form-mobile.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-item-faq-mobile', get_template_directory_uri() . '/assets/css/mod-list-item-faq-mobile.css',null,null,"screen" );
        wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
        wp_enqueue_style('mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css', null, null, "screen");
        wp_enqueue_style('mod-confessions-title', get_template_directory_uri() . '/assets/css/mod-confessions-title.css', null, null, "screen");
        wp_enqueue_style('mod-confessions-form', get_template_directory_uri() . '/assets/css/mod-confessions-form.css', null, null, "screen");
        wp_enqueue_style('mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css', null, null, "screen");
        wp_enqueue_style('mod-list-item-confessions-mobile', get_template_directory_uri() . '/assets/css/mod-list-item-confessions-mobile.css', null, null, "screen");
        
        wp_enqueue_script( 'mod-ad-header-mobile', get_template_directory_uri() . '/assets/js/mod-ad-header-mobile.js',null,null,true); 
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');  
        wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',null,null,true); 
        wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js',null,null,true); 
        wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
	wp_enqueue_script( 'mod-header-mobile', get_template_directory_uri() . '/assets/js/mod-header-mobile.js', null, null, true);
	wp_enqueue_script( 'mod-list-item-faq-mobile-js', get_template_directory_uri() . '/assets/js/mod-list-item-faq-mobile.js', null, null, true);
        wp_enqueue_script( 'mod-filter-confessions-faq-mobile-js', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq-mobile.js', null, null, true);
        wp_enqueue_script( 'mod-faq-form-mobile-js', get_template_directory_uri() . '/assets/js/mod-faq-form-mobile.js', null, null, true);
        wp_enqueue_script('mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js', null, null, true);
        wp_enqueue_script('mod-confessions-form', get_template_directory_uri() . '/assets/js/mod-confessions-form.js', null, null, true);
    }
    
    if(is_search()){
        wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',[],true,"screen" );
        wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
        wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
        wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
        wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
        wp_enqueue_style( 'mod-search', get_template_directory_uri() . '/assets/css/mod-search.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-search', get_template_directory_uri() . '/assets/css/mod-list-search.css',null,null,"screen" );
        wp_enqueue_style( 'mod-list-search-mobile', get_template_directory_uri() . '/assets/css/mod-list-search-mobile.css',null,null,"screen" );
      //  wp_enqueue_script('mod-search-js', get_template_directory_uri() . '/assets/js/mod-search.js', null, null, true);
    }

        // Includes the below files for photo gallery pages.
	$pattern = '/photo-(.*?).html/';
	preg_match($pattern,$_SERVER['REQUEST_URI'],$matches);
	if(is_single() && $matches ){	
            wp_enqueue_script( 'jqueryjs','http://code.jquery.com/jquery-1.11.0.min.js'); 
            wp_enqueue_style('lay-mobile', get_template_directory_uri() . '/assets/css/lay-mobile.css', null, null, "screen");
            wp_enqueue_style('mod-gallery-mobile', get_template_directory_uri() . '/assets/css/mod-gallery-mobile.css', null, null, "screen");
            wp_enqueue_style( 'mod-photo-overlay-mobile', get_template_directory_uri() . '/assets/css/mod-photo-overlay-mobile.css',null,null,"screen" );
            
            wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');  
            wp_enqueue_script( 'mod-gallery-mobile-gallery-js', get_template_directory_uri() . '/assets/js/mod-gallery-mobile.js');  
            
	}
	## Loading JS for common pages        
	wp_enqueue_script( 'jqueryjs','http://code.jquery.com/jquery-1.11.0.min.js');   
	wp_enqueue_script( 'type-kit','http://a.postrelease.com/serve/load.js?async=true');         
	wp_enqueue_script( 'jquery.cookie.min', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js');  
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js');          
	wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js');    
        wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js');
        wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js');              
	wp_enqueue_script( 'mod-ad-header-mobile', get_template_directory_uri() . '/assets/js/mod-ad-header-mobile.js');
	wp_enqueue_script( 'mod-header-mobile', get_template_directory_uri() . '/assets/js/mod-header-mobile.js', null, null, true);

	wp_localize_script( 'plugins', 'jkc', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}


function jkc_custom_dropdown_categories( $output, $args ){
    if( isset( $args['required'] ) && $args['data-attr'] ) {
       $output = preg_replace( 
            '^' . preg_quote( '<select ' ) . '^', 
            '<select '.$args['data-attr'], 
            $output 
       );
    }
    return $output;
}
//add_filter( 'wp_dropdown_cats', 'jkc_custom_dropdown_categories', 10, 2 );