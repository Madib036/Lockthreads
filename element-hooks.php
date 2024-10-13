<?php
// Assign module elements list to global variable
global $titan_elements_list;
$titan_elements_list[] = "none";
// Get all core plugin files
foreach (glob(WP_TITAN_DIR."elements/core-modules/*/*.php") as $filename)
{
    
    if(strpos($filename, 'te-module-') !== false){
        
    require_once($filename);
    
    $titan_elements_name = explode("te-module-", $filename);
    $titan_elements_name = str_replace(".php", "", $titan_elements_name[1]);
    $titan_elements_list[] = $titan_elements_name; 
    
    }
}
// Get all add-on plugin files
//foreach (glob(WP_TITAN_DIR."resources/elements/modules/*/*.php") as $filename)
/*
{
    require_once($filename);
    $titan_elements_name = explode("te-module-", $filename);
    $titan_elements_name = str_replace(".php", "", $titan_elements_name[1]);
    $titan_elements_list[] = $titan_elements_name; 
} */
// Master Stylesheet
// wp_enqueue_style ( "titan-loaded-css" , WP_TITAN_ROOT."/projects/".WP_TITAN_PROJECT."/custom-style.css");
/* Add the shortcodes for the various elements */
add_shortcode( 'titan-section', 'titan_section' );
?>