<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Show success notice after redirect
if (get_transient('smmws_settings_saved')) {
    delete_transient('smmws_settings_saved');
    echo '<div class="updated"><p>' . esc_html__('Settings saved.', 'simple-maintenance-mode-white-screen') . '</p></div>';
}

// Get existing settings
$smmws_enabled = get_option('smmws_enabled', 0);
$smmws_text = get_option('smmws_text', '');
$smmws_font_size = get_option('smmws_font_size', '26'); // Default font size: 26px
$smmws_bg_color = get_option('smmws_bg_color', '');
$smmws_text_color = get_option('smmws_text_color', '');
$smmws_font_family = get_option('smmws_font_family', '');
$smmws_logo = get_option('smmws_logo', '');

// Available font families
$smmws_font_options = array(
    ''                          => __('Default (Theme Font)', 'simple-maintenance-mode-white-screen'),
    'Arial, sans-serif'         => 'Arial',
    'Verdana, sans-serif'       => 'Verdana',
    'Trebuchet MS, sans-serif'  => 'Trebuchet MS',
    'Georgia, serif'            => 'Georgia',
    'Times New Roman, serif'    => 'Times New Roman',
    'Courier New, monospace'    => 'Courier New',
    'system-ui, sans-serif'     => 'System UI',
);
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
                    <p class="description"><?php echo esc_html(__('Leaving this text block blank will display a white screen on frontend. Basic HTML tags are supported (bold, italic, links, etc.).', 'simple-maintenance-mode-white-screen')); ?></p>
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
            <tr>
                <th scope="row">
                    <label for="smmws_font_family"><?php echo esc_html(__('Font Family', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <select id="smmws_font_family" name="smmws_font_family">
                        <?php foreach ($smmws_font_options as $smmws_value => $smmws_label) : ?>
                            <option value="<?php echo esc_attr($smmws_value); ?>" <?php selected($smmws_font_family, $smmws_value); ?>><?php echo esc_html($smmws_label); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="description"><?php echo esc_html(__('Select a font family for the maintenance page text.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="smmws_bg_color"><?php echo esc_html(__('Background Color', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <input type="text" id="smmws_bg_color" name="smmws_bg_color" value="<?php echo esc_attr($smmws_bg_color); ?>" class="smmws-color-picker" data-default-color="#ffffff">
                    <p class="description"><?php echo esc_html(__('Choose a background color for the maintenance page. Default is white.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="smmws_text_color"><?php echo esc_html(__('Text Color', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <input type="text" id="smmws_text_color" name="smmws_text_color" value="<?php echo esc_attr($smmws_text_color); ?>" class="smmws-color-picker" data-default-color="#000000">
                    <p class="description"><?php echo esc_html(__('Choose a text color for the maintenance page. Default is black.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php echo esc_html(__('Logo', 'simple-maintenance-mode-white-screen')); ?></label>
                </th>
                <td>
                    <input type="hidden" id="smmws_logo" name="smmws_logo" value="<?php echo esc_url($smmws_logo); ?>">
                    <div id="smmws-logo-preview" style="margin-bottom: 10px;">
                        <?php if (!empty($smmws_logo)) : ?>
                            <img src="<?php echo esc_url($smmws_logo); ?>" alt="<?php echo esc_attr(__('Logo preview', 'simple-maintenance-mode-white-screen')); ?>" style="max-width: 200px; max-height: 100px; display: block;">
                        <?php endif; ?>
                    </div>
                    <button type="button" class="button" id="smmws-upload-logo"><?php echo esc_html(__('Upload Logo', 'simple-maintenance-mode-white-screen')); ?></button>
                    <button type="button" class="button" id="smmws-remove-logo" <?php echo empty($smmws_logo) ? 'style="display:none;"' : ''; ?>><?php echo esc_html(__('Remove Logo', 'simple-maintenance-mode-white-screen')); ?></button>
                    <p class="description"><?php echo esc_html(__('Upload an optional logo to display above the maintenance text.', 'simple-maintenance-mode-white-screen')); ?></p>
                </td>
            </tr>
        </table>
        <p>
            <input type="submit" class="button button-primary" value="<?php echo esc_attr(__('Save Settings', 'simple-maintenance-mode-white-screen')); ?>">
        </p>
    </form>
</div>

<script>
jQuery(document).ready(function($) {
    // Initialize color pickers
    $('.smmws-color-picker').wpColorPicker();

    // Media uploader for logo
    var mediaUploader;
    $('#smmws-upload-logo').on('click', function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: '<?php echo esc_js(__('Select Logo', 'simple-maintenance-mode-white-screen')); ?>',
            button: {
                text: '<?php echo esc_js(__('Use as Logo', 'simple-maintenance-mode-white-screen')); ?>'
            },
            multiple: false,
            library: {
                type: 'image'
            }
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#smmws_logo').val(attachment.url);
            $('#smmws-logo-preview').html('<img src="' + attachment.url + '" alt="Logo preview" style="max-width: 200px; max-height: 100px; display: block;">');
            $('#smmws-remove-logo').show();
        });

        mediaUploader.open();
    });

    $('#smmws-remove-logo').on('click', function(e) {
        e.preventDefault();
        $('#smmws_logo').val('');
        $('#smmws-logo-preview').html('');
        $(this).hide();
    });
});
</script>
