<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Handle form submission
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['smmws_settings_nonce'])) {
    if (wp_verify_nonce(sanitize_key($_POST['smmws_settings_nonce']), 'smmws_save_settings')) {
        update_option('smmws_enabled', isset($_POST['smmws_enabled']) ? 1 : 0);
        if(isset($_POST['smmws_text'])) {
            update_option('smmws_text', sanitize_textarea_field(wp_unslash($_POST['smmws_text'])));
        }
        if(isset($_POST['smmws_font_size'])) {
            update_option('smmws_font_size', sanitize_text_field(wp_unslash($_POST['smmws_font_size'])));
        }        
        echo '<div class="updated"><p>' . esc_html__('Settings saved.', 'simple-maintenance-mode-white-screen') . '</p></div>';
    }
}

// Get existing settings
$smmws_enabled = get_option('smmws_enabled', 0);
$smmws_text = get_option('smmws_text', '');
$smmws_font_size = get_option('smmws_font_size', '16'); // Default font size: 16px
?>

<div class="wrap">
    <h1><?php echo esc_html(__('Maintenance Mode Settings', 'simple-maintenance-mode-white-screen')); ?></h1>
    <form method="POST">
        <?php wp_nonce_field('smmws_save_settings', 'smmws_settings_nonce'); ?>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="smmws_enabled"><?php echo esc_html(__('Enable Maintenance Mode', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <input type="checkbox" id="smmws_enabled" name="smmws_enabled" value="1" <?php checked($smmws_enabled, 1); ?>>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="smmws_text"><?php echo esc_html(__('Maintenance Mode Text', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <textarea id="smmws_text" name="smmws_text" rows="5" cols="50"><?php echo esc_textarea($smmws_text); ?></textarea>
                    <p class="description"><?php echo esc_html(__('Leaving this text block blank will display a white screen on frontend.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="smmws_font_size"><?php echo esc_html(__('Font Size (px)', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <input type="number" id="smmws_font_size" name="smmws_font_size" value="<?php echo esc_attr($smmws_font_size); ?>" min="10" max="100">
                    <p class="description"><?php echo esc_html(__('Set the font size for the maintenance text on the frontend.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
        </table>
        <p>
            <input type="submit" class="button button-primary" value="<?php echo esc_attr(__('Save Settings', 'simple-maintenance-mode-white-screen')); ?>">
        </p>
    </form>
</div>