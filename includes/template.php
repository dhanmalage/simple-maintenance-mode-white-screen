<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo esc_html(get_bloginfo( 'name' )); ?></title>
    <style>
        body {
            background-color: white;
            color: black;
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .maintenance-text {
            font-size: <?php echo esc_attr($smmws_font_size); ?>px;
        }
    </style>
</head>
<body>
    <?php if (!empty($smmws_text)) : ?>
        <div class="maintenance-text"><?php echo esc_html($smmws_text); ?></div>
    <?php endif; ?>
</body>
</html>