<?php

function setTags($postObj=false) {
    if(!empty($postObj)) {
        $postId = $postObj->ID;
    }
    else {
        global $post;
        $postId = get_the_ID();
    }
    
    $postMeta = get_post_meta($postId);
    $postTags = unserialize($postMeta['tags'][0]);
    $mediaTags = $vehicleMakes = $vehicleModels = array();
    foreach($postTags as $tags) {
        switch ( $tags->type) {
            case 'mediaTag':
                //wp_set_post_tags( get_the_ID(), $tags->name, true );
                //print_r(wp_set_post_terms( get_the_ID(), str_replace('_', ' ', $tags->name), 'vehicle-type' ));
                $mediaTags[] = str_replace('_', ' ', $tags->name);
                break;
            
            case 'vehicleTag':
                $parent = term_exists($tags->make, 'make-model');
                if(!empty($parent)) {
                    $model = term_exists( $tags->model, 'make-model', $parent['term_id'] );
                }
                else {
                    $parent = wp_insert_term($tags->make, 'make-model');
                }

                if(!empty($model['term_id'])) {
                    $vehicleModels[] = $model['term_id'];
                }
                else {
                    if(!$parent instanceof WP_Error) {
                        wp_insert_term(
                            $tags->model,
                            'make-model',
                            array(
                                'parent' => $parent['term_id']
                            )
                        );
                    }                    
                }
                //$vehicleModels[] = $tags->model;
                if(!$parent instanceof WP_Error)  {
                    $vehicleMakes[] = $parent['term_id'];
                }                
                break;
        }
    }
    
    $vehicleMakes = array_unique($vehicleMakes);
    wp_set_post_terms( $postId, $mediaTags, 'vehicle-type' );
    wp_set_post_terms( $postId, $vehicleMakes, 'make-model' );
    wp_set_post_terms( $postId, $vehicleModels, 'make-model', true );
}
//setTags();

function importMakeModels() {
    $makes = file_get_contents('makes-models/makes.json', FILE_USE_INCLUDE_PATH);

    // decode to array
    $makes = json_decode($makes);

    // go through each item
    foreach($makes->items as $make) {

        // just a counter
        $i = 1;

        // check if term exist and create parent term
        $parent = term_exists($make, 'make-model');
        if(empty($parent)) {
            $parent = wp_insert_term($make, 'make-model');
        }

        // look up models json
        $modelsFileName = get_stylesheet_directory().'/makes-models/'.$make.'.json';
        if(file_exists($modelsFileName)) {

            // process models
            $models = file_get_contents($modelsFileName);
            $models = json_decode($models, FILE_USE_INCLUDE_PATH);
            if(!empty($models['items'])) {
                foreach ($models['items'] as $model) {
                    wp_insert_term(
                        $model,
                        'make-model',
                        array(
                            'parent' => $parent['term_id']
                        )
                    );
                }
            }
        }
        $i++;
    }
}
//importMakeModels();

// get all posts
function getAllPosts() {
    $count_posts = wp_count_posts();
    //$published_posts = $count_posts->publish;
    //$myposts = get_posts(array('posts_per_page'=>$published_posts)); 

    // prep args 
    $args = array(
        'offset' => 1800,
        'posts_per_page' => 200,     // all posts
        'post_status' => 'any',     // all post status
        //'category' => 119
    );
    $posts = get_posts($args);

    // just a counter
    $i = 1;

    // loop through all posts
    $processed = array();
    foreach ($posts as $post) {
        //setup_postdata($post);
        setTags($post);
        $processed[] = $post->ID;
        $i++;
    }

    print_r('count - '.count($processed)); 
    print_r($processed);
    exit;
}
//getAllPosts();