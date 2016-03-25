<?php
/* Plugin Name: JKC Custom Routes
Description: Route builder for custom URL patterns such as make model listings, post gallery etc.,
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

				// make/model pagination
				$rPageKey = '('.$make->slug.')/('.$model->slug.')/page/?([0-9]{1,})/?$';
				$rules[$rPageKey] = 'index.php?category_name=$matches[1]&make-model=$matches[2]&paged=$matches[3]'; 

				// make pagination - using vehicle-make-model taxonomy to generate the routes
				$rPageTKey = '('.$make->slug.')/page/?([0-9]{1,})/?$';
				$rules[$rPageTKey] = 'index.php?category_name=$matches[1]&paged=$matches[2]'; 
			}
		}

	    // post gallery routes
	    // adding in this plugin to minimize number of plugins
	    $rules['([^)]+)/([^)]+)/(photo-\d+)?$'] = 'index.php?category_name=$matches[1]&name=$matches[2]&photo=$matches[3]';
		$rules['([^)]+)/([^)]+)/(photo-\d+)?.html$'] = 'index.php?category_name=$matches[1]&name=$matches[2]&photo=$matches[3]'; 

		// vehicle type rewrites
		$vehicle_types = get_terms('vehicle-type', array('hide_empty' => false));
		foreach ($vehicle_types as $vehicle_type) {
			$rules['(' . $vehicle_type->slug . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?vehicle-type=$matches[1]&feed=$matches[2]';
			$rules['(' . $vehicle_type->slug . ')/page/?([0-9]{1,})/?$' ] = 'index.php?vehicle-type=$matches[1]&paged=$matches[2]';
			$rules[ '(' . $vehicle_type->slug . ')/?$' ] = 'index.php?vehicle-type=$matches[1]';
		}

	    $wp_rewrite->rules = $rules + (array)$wp_rewrite->rules;
	}

	function query_vars($public_query_vars){
		array_push($public_query_vars, 'make-model');
		return $public_query_vars;
	}
}
$routerHelper = new JkcRouterHelper();