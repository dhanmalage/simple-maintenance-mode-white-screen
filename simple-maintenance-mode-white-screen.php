<?php
/*
 * Plugin Name: Simple Maintenance Mode White Screen
 * Description: Enable maintenance mode with white screen or custom text displayed on the frontend.
 * Version: 1.6
 * Requires at least: 5.2
 * Requires PHP: 7.0
 * Author: Nuoria
 * Author URI: https://nuoria.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: simple-maintenance-mode-white-screen
 * Domain Path: /languages
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add menu to access plugin settings
add_action('admin_menu', 'smmws_add_admin_menu');
function smmws_add_admin_menu() {
    add_menu_page(
        __('Maintenance Mode Settings', 'simple-maintenance-mode-white-screen'),  // Page title
        __('Maintenance Mode', 'simple-maintenance-mode-white-screen'),           // Menu title
        'manage_options',                                                         // Capability
        'simple-maintenance-mode-white-screen',                                   // Menu slug
        'smmws_settings_page',                                                      // Callback function
        'dashicons-hammer',                                                       // Icon
        80                                                                        // Position
    );
}

// Add a "Settings" link on the plugins page
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'smmws_plugin_action_links');
function smmws_plugin_action_links($links) {
    $settings_link = '<a href="admin.php?page=simple-maintenance-mode-white-screen">' . __('Settings', 'simple-maintenance-mode-white-screen') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}

// Render the settings page
function smmws_settings_page() {
    // Include the backend HTML file
    include plugin_dir_path(__FILE__) . 'includes/settings-page.php';
}

// Hook to intercept frontend requests when maintenance mode is enabled
add_action('template_redirect', 'smmws_enable_maintenance_mode');
function smmws_enable_maintenance_mode() {
    if (!is_user_logged_in() && get_option('smmws_enabled', 0)) {
        $smmws_text = get_option('smmws_text', '');
        $smmws_font_size = get_option('smmws_font_size', '26'); // Default font size: 26px

        // Enqueue the maintenance mode CSS
        wp_enqueue_style('smmws-maintenance-mode', plugin_dir_url(__FILE__) . 'assets/css/maintenance-mode.css', array(), '1.0');

        // Include the template file
        include plugin_dir_path(__FILE__) . 'includes/template.php';
        exit;
    }
}