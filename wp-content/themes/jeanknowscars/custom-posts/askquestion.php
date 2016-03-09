<?php

// Our custom post type function for Ask Jean A question Section
function create_postQuestionType() {

    register_post_type('ask-jean-question',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('Questions'),
            'singular_name' => __('Question')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'ask-jean-question'),
        'taxonomies' => array('category'),
        'supports' => array('title', 'editor', 'author', 'excerpt','thumbnail'),
        'query_var' => true,
		'taxonomies' => array('category'),
		'register_meta_box_cb' => 'add_author_metaboxs' )
    );
}

// Hooking up our function to theme setup
add_action('init', 'create_postQuestionType');

add_action( 'add_meta_boxes', 'add_author_metaboxs' );

function add_author_metaboxs(){
	add_meta_box('jkc_ajq_author', 'Questionar Name', 'jkc_ajq_author_input', 'ask-jean-question', 'side', 'high');
}

function jkc_ajq_author_input(){
	global $post;
	echo '<input type="hidden" name="jkc_jaq_meta_noncename" id="jkc_jaq_meta_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	$authorName = get_post_meta($post->ID, '_jkc_jaq_author', true);
	echo '<input type="text" name="_jkc_jaq_author" value="' . $authorName  . '" class="widefat" />';
}

function jkc_ajq_save_post(){
	
	global $post;
	$events_meta['_jkc_jaq_author'] = $_POST['_jkc_jaq_author'];
	foreach ($events_meta as $key => $value) { 
		if( $post->post_type == 'revision' ) return; 
		$value = implode(',', (array)$value); 
		
		if(get_post_meta($post->ID, $key, FALSE)) { 
			update_post_meta($post->ID, $key, $value);
		} else { 
			add_post_meta($post->ID, $key, $value);
		}	
	}
}	

add_action( 'save_post', 'jkc_ajq_save_post' );
add_action( 'new_to_publish', 'jkc_ajq_save_post' );

function insert_faq_post() {
	
	$intUserId = '';
	$strCategory = '';
	$strQuestion = '';
	$intUserId = get_current_user_id();
	$strQuestion = $_POST['question'];
	$intCategoryId = get_cat_ID( esc_attr($_POST['category'] ));
	$strPostType = $_POST['post_typee'];
	$strQuestionar = $_POST['questionar_name'];
	$defaults = '';
	
	$defaults = array(
        'post_author' => 1,
        'post_content' => '',
        'post_title' => $strQuestion,
        'post_status' => 'pending',
		'post_category' => array($intCategoryId),
        'post_type' => $strPostType,
    );

	$id = wp_insert_post( $defaults );
	add_post_meta( $id, '_jkc_jaq_author', $strQuestionar );
	return 'success';	
}
add_action( 'wp_ajax_insert_faq_post', 'insert_faq_post' );