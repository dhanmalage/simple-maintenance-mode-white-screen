<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html(get_bloginfo( 'name' )); ?></title>
    <style>
        body {
            background-color: <?php echo !empty($smmws_bg_color) ? esc_attr($smmws_bg_color) : 'white'; ?>;
            color: <?php echo !empty($smmws_text_color) ? esc_attr($smmws_text_color) : 'black'; ?>;
            font-family: <?php echo !empty($smmws_font_family) ? esc_attr($smmws_font_family) : 'Arial, sans-serif'; ?>;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .maintenance-container {
            max-width: 800px;
            padding: 20px;
        }
        .maintenance-logo {
            max-width: 300px;
            max-height: 150px;
            margin-bottom: 30px;
        }
        .maintenance-text {
            font-size: <?php echo esc_attr($smmws_font_size); ?>px;
        }
        .maintenance-text a {
            color: <?php echo !empty($smmws_text_color) ? esc_attr($smmws_text_color) : 'black'; ?>;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <?php if (!empty($smmws_logo)) : ?>
            <img src="<?php echo esc_url($smmws_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="maintenance-logo">
        <?php endif; ?>
        <?php if (!empty($smmws_text)) : ?>
            <div class="maintenance-text"><?php echo wp_kses_post($smmws_text); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
