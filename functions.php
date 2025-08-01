<?php
// ===========================
// تعریف ثابت‌ها برای مسیرها و اطلاعات پایه قالب
// ===========================
define('AGRIFOODZ_VERSION', '1.0.0');
define('AGRIFOODZ_URI', get_template_directory_uri());
define('AGRIFOODZ_DIR', get_template_directory());

define('AGRIFOODZ_ASSETS', AGRIFOODZ_URI . '/assets');
define('AGRIFOODZ_CSS', AGRIFOODZ_ASSETS . '/css');
define('AGRIFOODZ_JS', AGRIFOODZ_ASSETS . '/js');
define('AGRIFOODZ_INC', AGRIFOODZ_DIR . '/inc');

// فایل‌های کمکی
require_once AGRIFOODZ_INC . '/acf.php';
require_once AGRIFOODZ_INC . '/enqueue.php';
require_once AGRIFOODZ_INC . '/theme-setup.php';
require_once AGRIFOODZ_INC . '/form-handler.php';
// require_once AGRIFOODZ_INC . '/widgets.php';
require_once AGRIFOODZ_INC . '/template-tags.php';
require_once AGRIFOODZ_INC . '/email-login-handler.php';
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require AGRIFOODZ_INC. '/woocommerce.php';
}
/**
 * Load Dokan compatibility file.
 */
if ( class_exists( 'WeDevs_Dokan' ) ) {
	require AGRIFOODZ_INC . '/dokan.php';
}

// require_once AGRIFOODZ_INC . '/woo/fun.php'; // شامل فایل توابع ووکامرس

add_action('wp_enqueue_scripts', 'dequeue_unwanted_assets', 20);
function dequeue_unwanted_assets() {
    wp_dequeue_style('elementor-icons');
    wp_dequeue_script('emoji');
    // ...
}

// حذف استایل‌ها و اسکریپت‌های صفحه اصلی
add_action('wp_enqueue_scripts', 'agrifoodz_dequeue_home_assets', 100);
function agrifoodz_dequeue_home_assets() {
    if (is_front_page()) {
        wp_dequeue_style('elementor-frontend');
        wp_dequeue_style('elementor-post-' . get_the_ID());
        wp_dequeue_style('widget-icon-list-css');
        wp_dequeue_style('widget-heading-css');
        wp_dequeue_style('widget-image-css');
        wp_dequeue_style('widget-post-info-css');
        wp_dequeue_style('elementor-wp-admin-bar-css');
        wp_dequeue_style('elementor-gf-local-roboto-css');
        wp_dequeue_style('elementor-gf-local-robotoslab-css');
        wp_dequeue_style('elementor-gf-local-lato-css');

        wp_dequeue_style('elementor-pro');
        wp_dequeue_style('elementor-pro-notes-frontend-css');

        wp_dequeue_script('elementor-frontend');
        wp_dequeue_script('elementor-pro-frontend');

    }
}
