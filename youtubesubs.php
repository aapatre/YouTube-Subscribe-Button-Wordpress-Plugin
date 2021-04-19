<?php
/*
Plugin Name: YouTube Subs
Plugin URI: https://utopiancorps.com
Description: Display YT Channel Info
Version: 1.0.0
Author: Antariksh Patre
Author URI: https://linkedin.com/in/aapatre
*/

//exit if plugin path is accessed directly
if(!defined('ABSPATH')) {
    echo("Direct access to plugin is disabled for security reasons!");
    exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__)."/includes/youtubesubs-scripts.php");

//Load Class
require_once(plugin_dir_path(__FILE__)."/includes/youtubesubs-class.php");

// Register Widget
function register_youtubesubs(){
    register_widget('YouTube_Subs_Widget');
}

// Hook into WordPress
add_action('widgets_init', 'register_youtubesubs');

?>