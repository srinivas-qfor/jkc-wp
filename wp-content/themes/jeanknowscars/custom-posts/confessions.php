<?php

// Our custom post type function for Car Confessions Section
function create_postConfessionType() {

    register_post_type('confessions',
            array(
        'labels' => array(
            'name' => __('Confessions'),
            'singular_name' => __('Confession')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'confessions'),
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'author', 'excerpt','thumbnail'),
        'query_var' => true,
		'taxonomies' => array('category'),
            )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_postConfessionType');
