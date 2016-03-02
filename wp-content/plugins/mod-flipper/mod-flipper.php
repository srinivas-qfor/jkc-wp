<?php

/**
 * Plugin Name: JKC Flipper
 * Plugin URI:
 * Description: This plugin creates a slider from images or posts
 * Text Domain: flipper
 */

class Flipper {

    public $basename;
    public $directory_path;
    public $directory_url;

    function __construct() {

        // Define plugin constants
        $this->basename       = plugin_basename( __FILE__ );
        $this->directory_path = plugin_dir_path( __FILE__ );
        $this->directory_url = plugin_dir_url( __FILE__ );

        // Run our activation
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        
        // Run our deactivation
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        // Includes function files to generate slides
        add_action( 'plugins_loaded', array( $this, 'flipper_includes' ) );

        // Register scripts and styles
        add_action( 'init', array( $this, 'flipper_register_scripts_and_styles' ) );
    }

    /**
     * Register hook for add scripts and styles.
     */
    public function flipper_register_scripts_and_styles(){
        //Register scripts
        wp_register_script('mod-flipper',plugins_url( 'js/mod-flipper.js' , __FILE__ ),null,null,true);
        wp_enqueue_script( 'jquery.flexslider-min',plugins_url( 'js/jquery.flexslider-min.js' , __FILE__ ),nu                
    }

    /**
     * Files to include for flipper integration.
     */
    public function flipper_includes()
    {            
            require_once( $this->directory_path . 'includes/functions.php' );
    }

    /**
     * Activation hook for the plugin.
     */
    public function activate() {
        // Do some activation things.
    }

    /**
     * Deactivation hook for the plugin.
     */
    public function deactivate() {
        // Do some deactivation things. Note: this plugin may
        // auto-deactivate due to $this->maybe_disable_plugin()

    }
}
$GLOBALS['Flipper'] = new Flipper();
