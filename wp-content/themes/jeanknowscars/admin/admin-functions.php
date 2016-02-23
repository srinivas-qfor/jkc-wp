<?php

include 'theme-options.php';

/*
* Enable featured meta box 
*/
function register_post_assets(){
    add_meta_box('featured-post', __('Featured Post'), 'add_featured_meta_box', 'post', 'side', 'default');
    add_meta_box('post-subtitle', __('Subtitle'), 'add_post_subtitle', 'post', 'normal', 'default');
    add_meta_box('meta-tags', __('Meta Tags'), 'add_post_meta_tags', 'post', 'normal', 'default');
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

// save post meta
function save_post_meta($post_id) {

    // check autosave, nounce and other validations here before saving the field    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // allowed meta keys to update
    // do all data validation before this
    $meta_pairs = array(
        'subTitle'      => esc_attr($_POST['subTitle']),
        'metaTitle'     => esc_attr($_POST['metaTitle']),
        'metaKeywords'  => esc_attr($_POST['metaKeywords'])
    );

    // update metas
    foreach($meta_pairs as $m_key => $m_value) {
        update_post_meta(esc_attr($post_id), $m_key, $m_value);
    }
}
add_action('save_post', 'save_post_meta');

// sub title
function add_post_subtitle($post) {
    echo "<label for='subTitle'>".__('', '')."</label></li>";
    echo '<input type="text" name="subTitle" id="subTitle" class="regular-text" style="width: 100%;" value="'.get_post_meta($post->ID, 'subTitle', true).'"/>';
}

// meta tags
function add_post_meta_tags($post) {
    echo "<label for='metaTitle'>".__('Title', '')."</label>";
    echo '<input type="text" name="metaTitle" id="metaTitle" class="regular-text" style="width: 100%;" value="'.get_post_meta($post->ID, 'metaTitle', true).'"/> <br /><br />';

    $metaKeywords = get_post_meta($post->ID, 'metaKeywords', true);    
    echo "<label for='metaKeywords'>".__('Keywords', '')."</label>";
    echo '<textarea name="metaKeywords" id="metaKeywords" style="width: 100%;">'.(is_array($metaKeywords) ? implode(',', $metaKeywords) : $metaKeywords).'</textarea>';

    echo "<label for='metaDescription'>".__('Description', '')."</label>";
    echo '<textarea name="metaDescription" id="metaDescription" style="width: 100%;">'.get_post_meta($post->ID, 'metaDescription', true).'</textarea>';
}

include 'admin-category.php';