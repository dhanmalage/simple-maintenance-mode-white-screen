<?php
/*
 * Plugin Name: Simple Maintenance Mode White Screen
 * Description: Enable maintenance mode with white screen or custom text displayed on the frontend.
 * Version: 1.8
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

// Handle form submission early before any output is sent
add_action('admin_init', 'smmws_handle_settings_save');
function smmws_handle_settings_save() {
    if (!isset($_POST['smmws_settings_nonce']) || !isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    if (!wp_verify_nonce(sanitize_key($_POST['smmws_settings_nonce']), 'smmws_save_settings')) {
        return;
    }

    update_option('smmws_enabled', isset($_POST['smmws_enabled']) ? 1 : 0);
    if (isset($_POST['smmws_text'])) {
        update_option('smmws_text', sanitize_textarea_field(wp_unslash($_POST['smmws_text'])));
    }
    if (isset($_POST['smmws_font_size'])) {
        update_option('smmws_font_size', sanitize_text_field(wp_unslash($_POST['smmws_font_size'])));
    }

    set_transient('smmws_settings_saved', true, 30);
    wp_safe_redirect(admin_url('admin.php?page=simple-maintenance-mode-white-screen'));
    exit;
}

// Render the settings page
function smmws_settings_page() {
    // Include the backend HTML file
    include plugin_dir_path(__FILE__) . 'includes/settings-page.php';
}

// Add admin bar indicator when maintenance mode is active
add_action('admin_bar_menu', 'smmws_admin_bar_indicator', 100);
function smmws_admin_bar_indicator($wp_admin_bar) {
    if (!current_user_can('manage_options') || !get_option('smmws_enabled', 0)) {
        return;
    }

    $wp_admin_bar->add_node(array(
        'id'    => 'smmws-maintenance-indicator',
        'title' => __('Maintenance Mode: ON', 'simple-maintenance-mode-white-screen'),
        'href'  => admin_url('admin.php?page=simple-maintenance-mode-white-screen'),
        'meta'  => array(
            'title' => __('Click to go to Maintenance Mode settings', 'simple-maintenance-mode-white-screen'),
        ),
    ));
}

// Style the admin bar indicator with a red background
add_action('wp_head', 'smmws_admin_bar_styles');
add_action('admin_head', 'smmws_admin_bar_styles');
function smmws_admin_bar_styles() {
    if (!current_user_can('manage_options') || !get_option('smmws_enabled', 0)) {
        return;
    }
    ?>
    <style>
        #wp-admin-bar-smmws-maintenance-indicator > .ab-item {
            background-color: #dc3232 !important;
            color: #fff !important;
        }
        #wp-admin-bar-smmws-maintenance-indicator > .ab-item:hover {
            background-color: #a82222 !important;
            color: #fff !important;
        }
    </style>
    <?php
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