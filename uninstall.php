<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package Simple_Maintenance_Mode_White_Screen
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

/**
 * Uninstall Cleanup Logic
 *
 * Remove all plugin options from the database.
 * These options are only deleted when the plugin is fully removed,
 * NOT when it is simply deactivated.
 */

// 1. Delete plugin settings
delete_option('smmws_enabled');
delete_option('smmws_text');
delete_option('smmws_font_size');
