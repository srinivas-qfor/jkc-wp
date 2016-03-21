<?php
/* Plugin Name: Make Model Custom Route
Description: Custom URL
Version: 0.1.0
Author: BK 
*/
 
define('JKC_ROUTER_PLG_PATH', dirname(__FILE__) .'/');
 
class JkcRouterHelper {
	function __construct() {
		register_activation_hook( __FILE__, array($this, 'activate') );
		register_deactivation_hook( __FILE__, array($this, 'deactivate') );
		add_action( 'generate_rewrite_rules', array($this, 'add_rewrite_rules') );
		add_filter( 'query_vars', array($this, 'query_vars') );
	}

	function activate() {
		add_action( 'generate_rewrite_rules', array($this, 'add_rewrite_rules') );
		global $wp_rewrite; $wp_rewrite->flush_rules(); // force call to generate_rewrite_rules()
	}

	function deactivate() {
		remove_action( 'generate_rewrite_rules', array($this, 'add_rewrite_rules') );
		global $wp_rewrite; $wp_rewrite->flush_rules();
	}

	function add_rewrite_rules(){
		global $wp_rewrite; 
		$parent_term_id = 0; // term id of parent term (new-car)
		$taxonomies = array( 
		    'make-model',
		);
		$args = array(
		    'parent'         => $parent_term_id,	// returns level 1 child
		    // 'child_of'      => $parent_term_id, 	// returns all level
		    'hide_empty' => false
		); 
		$rules = array();
		$makes = get_terms($taxonomies, $args);
		foreach ($makes as $make) {
			$models = get_terms($taxonomies, array(
					'child_of' => $make->term_id,
					'hide_empty' => false
				));

			foreach ($models as $model) {
				$rKey = '('.$make->slug.')/('.$model->slug.')/?$';
				//$rValue = 'index.php?category_name=$matches[1]&make-model=$matches[2]';
				$rules[$rKey] = 'index.php?category_name=$matches[1]&make-model=$matches[2]';
			}
		}

		/*$rules = array(
	      //'category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$'  => 'index.php?except_category_name=$matches[1]&feed=$matches[2]',
	      //'category/(.+?)/(feed|rdf|rss|rss2|atom)/?$'       => 'index.php?except_category_name=$matches[1]&feed=$matches[2]',
	      //'category/(.+?)/page/?([0-9]{1,})/?$'              => 'index.php?except_category_name=$matches[1]&paged=$matches[2]',
	      //'category/(.+?)/?$'                                => 'index.php?except_category_name=$matches[1]',
			//'category/model/?$'                                => 'index.php?category_name=$matches[1]&model=$matches[2]',
			'(acura)/(rlx)/?$'                                => 'index.php?category_name=$matches[1]&make-model=$matches[2]',
	      );*/
		//$category_rewrite[ '(' . $category_nicename . ')/?$' ] = 'index.php?category_name=$matches[1]';
	    $wp_rewrite->rules = $rules + (array)$wp_rewrite->rules;
	}

	function query_vars($public_query_vars){
		array_push($public_query_vars, 'model');
		return $public_query_vars;
	}
}
$routerHelper = new JkcRouterHelper();