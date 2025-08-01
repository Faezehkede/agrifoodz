<?php
/**
 * Dokan Compatibility File
 *
 * @link https://dokan.co/
 *
 * @package agrifoodz
 */

function custom_dokan_dashboard_nav( $active_menu = '' ) {
    $nav_menu          = dokan_get_dashboard_nav();
    $active_menu_parts = explode( '/', $active_menu );
    $active_submenu    = '';

    if ( $active_menu && false !== strpos( $active_menu, '/' ) ) {
        $active_menu    = $active_menu_parts[0];
        $active_submenu = $active_menu_parts[1];
    }

    $menu           = '';
    $hamburger_menu = apply_filters( 'dokan_load_hamburger_menu', true );

    if ( $hamburger_menu ) {
        $menu      .= '<div id="dokan-navigation" aria-label="Menu">';
        $hamburger = apply_filters(
            'dokan_vendor_dashboard_menu_hamburger',
            '<label id="mobile-menu-icon" for="toggle-mobile-menu" aria-label="Menu">&#9776;</label><input id="toggle-mobile-menu" type="checkbox" />'
        );

        $menu .= $hamburger;
    }

    $menu .= '<nav class="nav-menu"><ul class="sidebar-nav">';

    foreach ( $nav_menu as $key => $item ) {
        // If switched off from menu manager
        if ( isset( $item['is_switched_on'] ) && ! $item['is_switched_on'] ) {
            continue;
        }
        /**
         * Filters a menu key according to slug if needed.
         *
         * @since 3.10.0
         *
         * @param string $menu_key
         */
        $filtered_key = rawurlencode_deep( apply_filters( 'dokan_dashboard_nav_menu_key', $key ) );

        $class = $active_menu === $filtered_key || 0 === stripos( $active_menu, $filtered_key ) ? 'active ' . $key : $key;  // checking starts with the key
        $title = __( 'No Title', 'dokan-lite' );

        if ( ! empty( $item['menu_manager_title'] ) ) {
            $title = $item['menu_manager_title'];
        } elseif ( ! empty( $item['title'] ) ) {
            $title = $item['title'];
        }

        $title     = apply_filters( 'dokan_vendor_dashboard_menu_title', $title, $item );
        $menu_slug = $filtered_key;
        $submenu   = '';

        if ( ! empty( $item['submenu'] ) ) {
            $class        .= ' has-submenu';
            $title        .= ' <i class="fas fa-caret-right menu-dropdown"></i>';
            $submenu      = sprintf( '<ul class="navigation-submenu %s">', $key );
            $subkey_slugs = [];

            foreach ( $item['submenu'] as $sub_key => $sub ) {
                // If switched off from menu manager
                if ( isset( $sub['is_switched_on'] ) && ! $sub['is_switched_on'] ) {
                    continue;
                }
                /**
                 * Filters a menu key according to slug if needed.
                 *
                 * @since 3.10.3
                 *
                 * @param string $submenu_key
                 * @param string $menu_key
                 */
                $filtered_subkey = rawurlencode_deep( apply_filters( 'dokan_dashboard_nav_submenu_key', $sub_key, $key ) );

                $submenu_class = $active_submenu === $filtered_subkey || 0 === stripos( $active_submenu, $filtered_subkey ) ? "current $sub_key" : $sub_key;
                $submenu_title = __( 'No Title', 'dokan-lite' );

                if ( ! empty( $sub['menu_manager_title'] ) ) {
                    $submenu_title = $sub['menu_manager_title'];
                } elseif ( ! empty( $sub['title'] ) ) {
                    $submenu_title = $sub['title'];
                }

                $submenu .= sprintf(
                    /* translators: 1) submenu class, 2) submenu route, 3) submenu icon, 4) submenu title */
                    '<li class="submenu-item %1$s" data-react-route="%2$s"><a href="%3$s" class="submenu-link">%4$s %5$s</a></li>',
                    $submenu_class,
                    $sub['react_route'] ?? '',
                    $sub['url'] ?? dokan_get_navigation_url( "{$key}/{$sub_key}" ),
                    $sub['icon'] ?? '<i class="fab fa-staylinked"></i>',
                    apply_filters( 'dokan_vendor_dashboard_menu_title', $submenu_title, $sub )
                );

                $subkey_slugs[] = $filtered_subkey;
            }

            $submenu .= '</ul>';

            // Building parent menu slug pointing to the first submenu item
            if ( isset( $subkey_slugs[0] ) ) {
                $menu_slug = trailingslashit( $menu_slug ) . $subkey_slugs[0];
            }
        }

        $menu .= sprintf(
            /* translators: 1) menu class, 2) menu route, 3) menu url, 4) menu target, 5) menu icon, 6) menu title, 7) submenu */
            '<li class="%1$s" data-react-route="%2$s"><a href="%3$s" target="%4$s">%5$s %6$s</a>%7$s</li>',
            $class,
            $item['react_route'] ?? '',
            $item['url'] ?? dokan_get_navigation_url( $menu_slug ),
            $item['target'] ?? '_self',
            $item['icon'] ?? '<i class="fab fa-staylinked"></i>',
            $title,
            $submenu
        );
    }

    $common_links = '<li class="dokan-common-links dokan-clearfix">
            <a title="' . __( 'Visit Store', 'dokan-lite' ) . '" class="tips" data-placement="top" href="' . dokan_get_store_url( dokan_get_current_user_id() ) . '" target="_blank"><i class="fas fa-external-link-alt"></i></a>
            <a title="' . __( 'Edit Account', 'dokan-lite' ) . '" class="tips" data-placement="top" href="' . dokan_get_navigation_url( 'edit-account' ) . '"><i class="fas fa-user"></i></a>
            <a title="' . __( 'Log out', 'dokan-lite' ) . '" class="tips" data-placement="top" href="' . wp_logout_url( home_url() ) . '"><i class="fas fa-power-off"></i></a>
        </li>';

    $menu .= apply_filters( 'dokan_dashboard_nav_common_link', $common_links );

    $menu .= '</ul></nav>';

    if ( $hamburger_menu ) {
        $menu .= '</div>';
    }

    return $menu;
}

add_action('wp_ajax_upload_user_images', 'handle_user_image_upload');
add_action('wp_ajax_nopriv_upload_user_images', 'handle_user_image_upload');
function handle_user_image_upload() {
    if ( isset($_FILES['images']) && !empty($_FILES['images']['name'][0]) ) {

        $user_id = intval($_POST['user_id']);
        $upload_base = wp_upload_dir();
        $upload_dir  = $upload_base['basedir'] . '/user-image/' . $user_id . '/licenses-certifications/';

        if (!file_exists($upload_dir)) {
            wp_mkdir_p($upload_dir);
        }

        $image_urls = array();
        $errors = array();

        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $image_tmp  = $_FILES['images']['tmp_name'][$key];
            $image_size = $_FILES['images']['size'][$key];
            $image_type = $_FILES['images']['type'][$key];

            if (!in_array($image_type, ['image/png', 'image/jpg', 'image/jpeg'])) {
                $errors[] = 'Invalid image format. Only PNG and JPG are allowed.';
                continue;
            }

            if ($image_size > 5 * 1024 * 1024) {
                $errors[] = 'Image size must be less than 5 MB.';
                continue;
            }

            // Generate random file name
            $random_name = substr(str_shuffle(str_repeat('0123456789', 20)), 0, 20);
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_filename = $random_name . '.' . strtolower($extension);
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($image_tmp, $target_file)) {
                $image_urls[] = $upload_base['baseurl'] . '/user-image/' . $user_id . '/licenses-certifications/' . $new_filename;
            } else {
                $errors[] = 'Error uploading image ' . $image_name . '.';
            }
        }

        if (empty($errors)) {
            update_user_meta($user_id, '_company_album', $image_urls);
            wp_send_json_success(array('images' => $image_urls));
        } else {
            wp_send_json_error(array('message' => implode(', ', $errors)));
        }
    } else {
        wp_send_json_error(array('message' => 'No image selected for upload.'));
    }

    wp_die();
}

add_action('wp_ajax_get_saved_images', 'get_saved_images');
add_action('wp_ajax_nopriv_get_saved_images', 'get_saved_images');
// دریافت تصاویر ذخیره‌شده از دیتابیس و نمایش آن‌ها
function get_saved_images() {
    $user_id = $_POST['user_id']; // گرفتن شناسه کاربر از درخواست
    $saved_images = get_user_meta($user_id, '_company_album', true);

    if (is_array($saved_images) && !empty($saved_images)) {
        // ارسال داده‌ها به صورت موفق
        wp_send_json_success(array('images' => $saved_images));
    } else {
        // ارسال خطا در صورت نبود تصاویر
        wp_send_json_error(array('message' => 'هیچ تصویری یافت نشد.'));
    }
}

// حذف تصویر از سرور و دیتابیس
function delete_image_from_server($image_url, $user_id) {
    // حذف از دیتابیس
    $saved_images = get_user_meta($user_id, '_company_album', true);
    
    // بررسی اینکه تصویر در آرایه موجود باشد
    if (($key = array_search($image_url, $saved_images)) !== false) {
        unset($saved_images[$key]);
        update_user_meta($user_id, '_company_album', $saved_images);
    }

    // حذف از سرور
    $image_path = str_replace(wp_upload_dir()['baseurl'], wp_upload_dir()['basedir'], $image_url);
    if (file_exists($image_path)) {
        unlink($image_path);
    }
}

// حذف تصویر از دیتابیس و سرور با استفاده از AJAX
add_action('wp_ajax_delete_user_image', 'delete_user_image');
add_action('wp_ajax_nopriv_delete_user_image', 'delete_user_image');
function delete_user_image() {
    if (isset($_POST['image_url']) && isset($_POST['user_id'])) {
        $image_url = $_POST['image_url'];
        $user_id = $_POST['user_id'];

        // حذف تصویر
        delete_image_from_server($image_url, $user_id);

        wp_send_json_success(array('message' => 'تصویر با موفقیت حذف شد.'));
    } else {
        wp_send_json_error(array('message' => 'مشکلی در حذف تصویر پیش آمد.'));
    }

    wp_die();
}

// 
// 
// 
add_action('wp_ajax_upload_user_images_company', 'handle_user_image_upload_company');
add_action('wp_ajax_nopriv_upload_user_images_company', 'handle_user_image_upload_company');
function handle_user_image_upload_company() {
    if ( isset($_FILES['images']) && !empty($_FILES['images']['name'][0]) ) {

        $user_id = intval($_POST['user_id']);
        $upload_base = wp_upload_dir();
        $upload_dir  = $upload_base['basedir'] . '/user-image/' . $user_id . '/company-album/';

        if (!file_exists($upload_dir)) {
            wp_mkdir_p($upload_dir);
        }

        $image_urls = array();
        $errors = array();

        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $image_tmp  = $_FILES['images']['tmp_name'][$key];
            $image_size = $_FILES['images']['size'][$key];
            $image_type = $_FILES['images']['type'][$key];

            if (!in_array($image_type, ['image/png', 'image/jpg', 'image/jpeg'])) {
                $errors[] = 'Invalid image format. Only PNG and JPG are allowed.';
                continue;
            }

            if ($image_size > 5 * 1024 * 1024) {
                $errors[] = 'Image size must be less than 5 MB.';
                continue;
            }

            // Generate random file name
            $random_name = substr(str_shuffle(str_repeat('0123456789', 20)), 0, 20);
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $new_filename = $random_name . '.' . strtolower($extension);
            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($image_tmp, $target_file)) {
                $image_urls[] = $upload_base['baseurl'] . '/user-image/' . $user_id . '/company-album/' . $new_filename;
            } else {
                $errors[] = 'Error uploading image ' . $image_name . '.';
            }
        }

        if (empty($errors)) {
            update_user_meta($user_id, '_licenses_certifications', $image_urls);
            wp_send_json_success(array('images' => $image_urls));
        } else {
            wp_send_json_error(array('message' => implode(', ', $errors)));
        }
    } else {
        wp_send_json_error(array('message' => 'No image selected for upload.'));
    }

    wp_die();
}

add_action('wp_ajax_get_saved_images_company', 'get_saved_images_company');
add_action('wp_ajax_nopriv_get_saved_images_company', 'get_saved_images_company');
// دریافت تصاویر ذخیره‌شده از دیتابیس و نمایش آن‌ها
function get_saved_images_company() {
    $user_id = $_POST['user_id']; // گرفتن شناسه کاربر از درخواست
    $saved_images = get_user_meta($user_id, '_licenses_certifications', true);

    if (is_array($saved_images) && !empty($saved_images)) {
        // ارسال داده‌ها به صورت موفق
        wp_send_json_success(array('images' => $saved_images));
    } else {
        // ارسال خطا در صورت نبود تصاویر
        wp_send_json_error(array('message' => 'هیچ تصویری یافت نشد.'));
    }
}

// حذف تصویر از سرور و دیتابیس
// function delete_image_from_server($image_url, $user_id) {
//     // حذف از دیتابیس
//     $saved_images = get_user_meta($user_id, '_licenses_certifications', true);
    
//     // بررسی اینکه تصویر در آرایه موجود باشد
//     if (($key = array_search($image_url, $saved_images)) !== false) {
//         unset($saved_images[$key]);
//         update_user_meta($user_id, '_licenses_certifications', $saved_images);
//     }

//     // حذف از سرور
//     $image_path = str_replace(wp_upload_dir()['baseurl'], wp_upload_dir()['basedir'], $image_url);
//     if (file_exists($image_path)) {
//         unlink($image_path);
//     }
// }

// حذف تصویر از دیتابیس و سرور با استفاده از AJAX
add_action('wp_ajax_delete_user_image_company', 'delete_user_image_company');
add_action('wp_ajax_nopriv_delete_user_image_company', 'delete_user_image_company');
function delete_user_image_company() {
    if (isset($_POST['image_url']) && isset($_POST['user_id'])) {
        $image_url = $_POST['image_url'];
        $user_id = $_POST['user_id'];

        // حذف تصویر
        delete_image_from_server($image_url, $user_id);

        wp_send_json_success(array('message' => 'تصویر با موفقیت حذف شد.'));
    } else {
        wp_send_json_error(array('message' => 'مشکلی در حذف تصویر پیش آمد.'));
    }

    wp_die();
}