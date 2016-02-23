<?php

// Our custom post type function for Ask Jean A question Section
function create_postQuestionType() {

    register_post_type('askquestion',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Questions'),
            'singular_name' => __('Question')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'ask-jean-question'),
            )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_postQuestionType');
