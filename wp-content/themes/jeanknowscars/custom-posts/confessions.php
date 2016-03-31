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

// adding metabox to show fb user
add_action( 'add_meta_boxes', 'add_confessions_author_metaboxs' );

function add_confessions_author_metaboxs(){
	add_meta_box('_jkc_confessions_author', 'FB Username', 'jkc_confessions_author_input', 'confessions', 'side', 'high');
}

function jkc_confessions_author_input(){
	global $post;
	echo '<input type="hidden" name="jkc_confessions_meta_noncename" id="jkc_confessions_meta_noncename" value="' . 
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	$authorName = get_post_meta($post->ID, '_jkc_confessions_author', true);
	echo '<input type="text" name="_jkc_confessions_author" value="' . $authorName  . '" class="widefat" />';
}

function jkc_confessions_save_post(){
	
	global $post;
	$events_meta['_jkc_confessions_author'] = $_POST['_jkc_confessions_author'];
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

add_action( 'save_post', 'jkc_confessions_save_post' );
add_action( 'new_to_publish', 'jkc_confessions_save_post' );

//inserting confessions records to database
function insert_confessions_post() {
	$intUserId = '';
	$strCategory = '';
	$strQuestion = '';
	$strCategoryName = '';
	$strQuestionar = '';
	$intUserId = get_current_user_id();
        if(empty($intUserId)){
            $intUserId = '1';
        }
	$strQuestion = $_POST['question'];
	$intCategoryId = get_cat_ID( esc_attr($_REQUEST['category']));
	$strPostType = $_POST['post_typee'];
	$strQuestionar = $_POST['confessions_name'];
	$strFBId = explode('|',$strQuestionar);
	$strGuidURL =  current_time('Y-m-d').'-'.$_REQUEST['category'].'-fb'.trim($strFBId[1]).'-'.current_time( 'timestamp', true );
	$defaults = '';
	$defaults = array(
        'post_author' => $intUserId,
        'post_content' => '',
        'post_title' => $strQuestion,
		'post_status' => 'publish',
		'post_category' => array($intCategoryId),
        'post_type' => $strPostType
    );
	$id = '';
	$id = wp_insert_post( $defaults );
	add_post_meta( $id, '_jkc_confessions_author', $strQuestionar );
	return 'success';
}
add_action( 'wp_ajax_nopriv_insert_confessions_post', 'insert_confessions_post' );
add_action( 'wp_ajax_insert_confessions_post', 'insert_confessions_post' );