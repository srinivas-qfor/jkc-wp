<?php

/*
* Enable featured meta box 
*/
function register_post_assets(){
    add_meta_box('featured-post', __('Featured Post'), 'add_featured_meta_box', 'post', 'side', 'default');
}
add_action('admin_init', 'register_post_assets', 1);

function add_featured_meta_box($post){
    $featured = get_post_meta($post->ID, '_featured-post', true);
    //print_r("<pre>"); print_r($featured); print_r("</pre>"); exit;
    if($featured == 1) $field_id_checked = 'checked="checked"'; 
    echo "<input type='checkbox' name='_featured-post' id='featured-post' value='1' ".$field_id_checked." />";
    echo "<label for='_featured-post'>".__('&nbsp;Feature this post?', 'foobar')."</label>";
}

function save_featured_meta($post_id){

	// check autosave, nounce and other validations here before saving the field    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	    return $post_id;
	}

	update_post_meta(esc_attr($post_id), '_featured-post', esc_attr($_REQUEST['_featured-post']));
}
add_action('save_post', 'save_featured_meta');