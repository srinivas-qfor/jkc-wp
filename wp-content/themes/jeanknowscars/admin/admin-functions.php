<?php

/*
* Enable featured meta box 
*/
function register_post_assets(){
    add_meta_box('featured-post', __('Featured Post'), 'add_featured_meta_box', 'post', 'side', 'default');
}
add_action('admin_init', 'register_post_assets', 1);

function add_featured_meta_box($post){
	echo "<ul id=\"featuredchecklist\">";
    // category featured flipper
    $featured_cat = get_post_meta($post->ID, '_featured-post', true);
    if($featured_cat == 1) $field_id_checked = 'checked="checked"'; 
    echo "<li><input type='checkbox' name='_featured-post' id='featured-post' value='1' ".$field_id_checked." />";
    echo "<label for='_featured-post'>".__('&nbsp;Feature this post?', '')."</label></li>";

    // home featured flipper
    $featured_home = get_post_meta($post->ID, '_featured-post-home', true);
    if($featured_home == 1) $field_id_checked_home = 'checked="checked"'; 
    echo "<li><input type='checkbox' name='_featured-post-home' id='featured-post-home' value='1' ".$field_id_checked_home." />";
    echo "<label for='_featured-post-home'>".__('&nbsp;Feature this post on home page?', '')."</label></li>";

    echo "</ul>";
}

function save_featured_meta($post_id){

	// check autosave, nounce and other validations here before saving the field    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	    return $post_id;
	}

	update_post_meta(esc_attr($post_id), '_featured-post', esc_attr($_POST['_featured-post']));
	update_post_meta(esc_attr($post_id), '_featured-post-home', esc_attr($_POST['_featured-post-home']));
}
add_action('save_post', 'save_featured_meta');