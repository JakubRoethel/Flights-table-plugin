<?php
/*
Plugin Name: Flights Table
Plugin URI: https://github.com/JakubRoethel/Flights-table-plugin
Description: This plugin allows you to display flight tables on your website.
Version: 1.0
Requires at least: 5.2 
Requires PHP: 7.2 
Author: Jakub Roethel
Author URI: https://author.example.com/
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Plugins: Flights Table plugin
*/


require_once(plugin_dir_path(__FILE__) . 'includes/flight-table-admin-menu.php');
require_once(plugin_dir_path(__FILE__) . 'includes/flights-table-settings-page.php');
require_once(plugin_dir_path(__FILE__) . 'includes/flight-table-shortcode.php');


function flights_table_enqueue_admin_styles() {
    wp_enqueue_style('flights-table-admin-css', plugin_dir_url(__FILE__) . 'admin/admin-styles.css', array(), '1.0', 'all');
    
}
add_action('admin_enqueue_scripts', 'flights_table_enqueue_admin_styles');

function flights_table_enqueue_scripts() {
    wp_register_script('flights-table-main-script', plugin_dir_url(__FILE__) . 'dist/main.min.js', array(), '1.0', true);
    wp_enqueue_script('flights-table-main-script');
}
add_action('wp_enqueue_scripts', 'flights_table_enqueue_scripts');








?>