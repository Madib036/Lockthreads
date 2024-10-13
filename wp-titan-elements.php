<?php
/*
Plugin Name: WP Titan Elements
Plugin URI: http://wpplugindepot.com/wp-titan-elements
Description: Titan is a powerful graphic editor that allows developers to build it once and reuse it to build sites fast.
Author: WP Plugin Depot
Author URI: http://wpplugindepot.com
Version: 1.0.1
Copyright 2016 Kyle Gundersen - Contact me at http://wpplugindepot.com
*/
 /* Quit if path is undefined */
if (!defined('ABSPATH')) {
    die();
}
/* Abort if WordPress is upgrading */
if (defined('WP_INSTALLING') && WP_INSTALLING)
    return;
		
/* Define plugin path */ 
define( 'WP_TITAN_DIR', plugin_dir_path( __FILE__ ));
define( 'WP_TITAN_ROOT', plugins_url( '', __FILE__ ));
define( 'WP_TITAN_DATA_FULL', plugin_dir_path( __FILE__ )."/../wp-titan-elements-DATA/");
define( 'WP_TITAN_DATA_REL', "../wp-titan-elements-DATA/");

/* Define later in the lifecycle */
function titan_elements_get_version() {
    $plugin_titan_version_data = get_plugin_data( __FILE__ );
    define( 'WP_TITAN_VERSION', $plugin_titan_version_data['Version']);
    define( 'WP_TITAN_AUTHOR', $plugin_titan_version_data['Author']);
    define( 'WP_TITAN_AUTHOR_URL', $plugin_titan_version_data['Author URI']);
    define( 'WP_TITAN_DOCS_URL', "http://wpplugindepot.com/wp-titan-elements-documentation");
    define( 'WP_TITAN_MAIN_URL', "http://wpplugindepot.com/wp-titan-elements");
    define( 'WP_TITAN_BLOG_URL', "http://kylegundersen.me/");
}
add_action('admin_init', 'titan_elements_get_version');


	global $titan_data; // Titan admin data
    global $titan_client_data; // Titan client data
    global $tem_data_list; // Titan element list
    
    $tem_data_list = array('singular'=>array());
    // Load ADMIN Data
    if( is_admin()){
    if( file_exists (WP_TITAN_DATA_FULL."system.json")){
	$titan_post_data = file_get_contents(WP_TITAN_DATA_FULL."system.json");
    $titan_data = json_decode($titan_post_data, TRUE);
    } else {
      if(!file_exists(WP_TITAN_DATA_FULL)){
      mkdir(WP_TITAN_DATA_FULL, 0755);
      }
      $titan_data = array("sectionList" => array(), "packageList" => array(), "archive" => array()); 
    }
    }

    // Load DEPLOYED Data
    if( file_exists (WP_TITAN_DATA_FULL."titan.json")){
	$titan_post_data = file_get_contents(WP_TITAN_DATA_FULL."titan.json");
    $titan_client_data = json_decode($titan_post_data, TRUE);
    } else {
      if(!file_exists(WP_TITAN_DATA_FULL)){
      mkdir(WP_TITAN_DATA_FULL, 0755);
      }
      $titan_client_data = array("sectionList" => array(), "packageList" => array(), "archive" => array()); 
    }

// Add admin styles 
function titan_elements_resources_enqueue() {
    // Titan  Animation Library
    wp_enqueue_style( 'titan-elements-animation-library', WP_TITAN_ROOT.'/resources/css/titan-animate.css', '', false );
}
// Include in header 
add_action( 'wp_head', 'titan_elements_resources_enqueue' );
// REQUIRE PLUGIN DEPENDANCIES
// Load Admin Page
require_once( WP_TITAN_DIR . 'admin/editor.php' );
require_once( WP_TITAN_DIR . 'admin/extend-wp-editor.php' );
// Hook in all the elements
require_once( WP_TITAN_DIR . 'elements/element-hooks.php' );
// Get Core Shortcode
require_once( 'functions/section.php' );
// Activate Titan Elements
function wp_titan_elements_activate(){	
	
	// Define globals 
	global $wp_titan;
	
}
// Deactivate Titan Elements 
function wp_titan_elements_deactivate() {
}
register_activation_hook( __FILE__, 'wp_titan_elements_activate' );
register_deactivation_hook( __FILE__, 'wp_titan_elements_deactivate' );
?>