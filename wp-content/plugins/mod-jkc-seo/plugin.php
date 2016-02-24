<?php
/*
Plugin Name: JKC Seo Meta
Description: Generate meta tags
Plugin URI: 
Text Domain: jkc-seo
*/

// define plugin base
if(!defined('JKC_SEO_PLUGIN_DIR')) {
	define('JKC_SEO_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// inclide classes
require_once 'src/Entity.php';
require_once 'src/Meta.php';

use JKC\Meta;

// hook
function jkc_seo_meta_show_meta_tags() {
    $meta = new Meta\Meta();
}
add_action('wp_head', 'jkc_seo_meta_show_meta_tags', 0);