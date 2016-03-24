<?php

/*
 * Template switcher for make/model listings
 */
function make_model_subcategory_template() {
    $category = get_queried_object();
 
    $parent_id = $category->category_parent;
 
    $templates = array();
     
    if ( $parent_id == 0 ) {
        // Use default values from get_category_template()
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
        $templates[] = 'category.php';      
    } else {
        // Create replacement $templates array
        $parent = get_category( $parent_id );

        // look for custom make model template first
        $vehicleModel = get_query_var('make-model', false);
        if($parent->slug == 'new-cars' && (!empty($vehicleModel) || !empty($category))) {
            $templates[] = "category-make-model.php";
        }
 
        // Current first
        $templates[] = "category-{$category->slug}.php";
        $templates[] = "category-{$category->term_id}.php";
 
        // Parent second
        $templates[] = "category-{$parent->slug}.php";
        $templates[] = "category-{$parent->term_id}.php";
        $templates[] = 'category.php';  
    }
    return locate_template( $templates );
}
add_filter( 'category_template', 'make_model_subcategory_template' );

/*
 * Filter posts for make model listings
 */
function filter_make_model_posts($query) {
    //print_r("<pre>"); print_r($query); print_r("</pre>"); exit;
}
add_action( 'pre_get_posts', 'filter_make_model_posts' );