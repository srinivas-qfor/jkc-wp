<?php
/*
 * Manage custom tags for post 
 * data from ADAM to port here
 * Media and Vehicle Tags
 */

// media tag
function create_media_tags() {
	register_taxonomy('vehicle-type', 'post', array(
		'hierarchical'    => false,
		'label'           => 'Vehicle Type',
		'query_var'       => 'vehicle-type',
		'rewrite'         => array('slug' => 'vehicle-type' ),
	));
}
add_action( 'init', 'create_media_tags' );

// vehicle tags
function create_vehicle_model_tags() {
	register_taxonomy('model', 'post', array(
		'hierarchical'    => false,
		'label'           => 'Vehicle Model',
		'query_var'       => 'model',
		'rewrite'         => array('slug' => 'model' ),
	));
}
//add_action( 'init', 'create_vehicle_model_tags' );

// hierarchial make model test
function create_vehicle_make_model_hierarcial_tags() {
	register_taxonomy('make-model', 'post', array(
		'hierarchical'    => true,
		'label'           => 'Vehicle Make Model',
		'query_var'       => 'make-model',
		'rewrite'         => array('slug' => 'make-model' ),
	));
}
add_action( 'init', 'create_vehicle_make_model_hierarcial_tags' );


// display all tags for media tags
function jkc_display_all_tags ( $args ) {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_POST['action'] ) && $_POST['action'] === 'get-tagcloud' )
        unset( $args['number'] );
    $args['hide_empty'] = false;
    return $args;
}
add_filter( 'get_terms_args', 'jkc_display_all_tags' );