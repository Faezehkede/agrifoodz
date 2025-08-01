<?php

/**
 * Template Name: noheaderfooter
 * Template Post Type: page
 */

defined('ABSPATH') || exit;

// اگر از المنتور استفاده می‌کنی، این شرط کمک می‌کنه المنتور با این تمپلیت کار کنه
if (! defined('ELEMENTOR_VERSION')) {
    the_content(); // فقط محتوای صفحه رو نمایش بده
    return;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // This pulls in all necessary head content 
    ?>
</head>

<body <?php body_class(); ?>>

    <?php
    // نمایش محتوا فقط (بدون هدر یا فوتر)
    while (have_posts()) : the_post();
        the_content();
    endwhile;
    ?>

    <?php wp_footer(); ?>
</body>

</html>