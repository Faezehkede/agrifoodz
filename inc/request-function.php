<?php 
// Custom Post Type Request User
add_action('init', function() {
    register_post_type('request_customer', [
        'labels' => [
            'name' => __('Customer Requests', 'agrifoodz'),
            'singular_name' => __('Customer Request', 'agrifoodz'),
            'add_new' => __('Add Request', 'agrifoodz'),
            'add_new_item' => __('Add New Request', 'agrifoodz'),
            'edit_item' => __('Edit Request', 'agrifoodz'),
            'new_item' => __('New Request', 'agrifoodz'),
            'view_item' => __('View Request', 'agrifoodz'),
            'search_items' => __('Search Requests', 'agrifoodz'),
            'not_found' => __('No requests found', 'agrifoodz'),
        ],
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'supports' => ['title', 'author'],
        'menu_icon' => 'dashicons-cart',
    ]);
});


// فایل functions.php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('request-form', get_template_directory_uri() . '/assets/js/request-form.js', ['jquery'], null, true);
    wp_localize_script('request-form', 'ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
});

// ذخیره فرم به صورت AJAX
add_action('wp_ajax_handle_request_form_ajax', 'handle_request_form_ajax');
function handle_request_form_ajax() {
    parse_str($_POST['data'], $form);

    if (!is_user_logged_in()) {
        wp_send_json_error('Login required');
    }

    $post_id = wp_insert_post([
        'post_type' => 'request_customer',
        'post_title' => 'Request by ' . wp_get_current_user()->display_name,
        'post_status' => 'draft',
        'post_author' => get_current_user_id(),
    ]);

    if ($post_id) {
        update_post_meta($post_id, 'quantity', sanitize_text_field($form['quantity']));
        update_post_meta($post_id, 'product_type', sanitize_text_field($form['type']));
        update_post_meta($post_id, 'category_id', intval($form['selected_category_id']));
        wp_send_json_success('Saved');
    }

    wp_send_json_error('Error saving');
}

// AJAX دریافت دسته‌بندی‌های ووکامرس
add_action('wp_ajax_get_child_categories', 'get_child_categories');
function get_child_categories() {
    $parent_id = intval($_POST['parent_id'] ?? 0);
    $terms = get_terms([
        'taxonomy' => 'product_cat',
        'parent' => $parent_id,
        'hide_empty' => false,
    ]);

    $categories = [];
    foreach ($terms as $term) {
        $categories[] = [
            'id' => $term->term_id,
            'name' => $term->name,
            'has_children' => count(get_term_children($term->term_id, 'product_cat')) > 0
        ];
    }

    echo json_encode(['categories' => $categories]);
    wp_die();
}




add_shortcode('customer_requests', function($atts) {
    $atts = shortcode_atts(['number' => 5], $atts);
    $query = new WP_Query([
        'post_type' => 'request_customer',
        'post_status' => 'publish',
        'posts_per_page' => intval($atts['number']),
    ]);

    if (!$query->have_posts()) return '<p>No requests found.</p>';

    ob_start();
    echo '<div class="customer-requests">';
    while ($query->have_posts()) {
        $query->the_post();
        $uid = get_the_author_meta('ID');
        $avatar = get_avatar_url($uid);
        $qty = get_post_meta(get_the_ID(), 'quantity', true);
        $cat_id = get_post_meta(get_the_ID(), 'category_id', true);

        $tree = [];
        if ($cat_id) {
            $term = get_term($cat_id, 'product_cat');
            while ($term && $term->parent != 0) {
                $tree[] = $term->name;
                $term = get_term($term->parent, 'product_cat');
            }
            if ($term) $tree[] = $term->name;
            $tree = array_reverse($tree);
        }

        echo '<div class="request-item">';
        echo "<img src='{$avatar}' style='width:40px;border-radius:50%;' />";
        echo '<strong>' . get_the_author_meta('display_name') . '</strong> <small>(' . get_the_date() . ')</small>';
        echo '<p>Quantity: ' . esc_html($qty) . '</p>';
        echo '<p>Category: ' . implode(' > ', $tree) . '</p>';
        echo '</div><hr>';
    }
    echo '</div>';
    wp_reset_postdata();
    return ob_get_clean();
});

add_action('add_meta_boxes', function () {
    add_meta_box('request_customer_meta', 'اطلاعات درخواست', 'render_request_meta_box', 'request_customer');
});

function render_request_meta_box($post) {
    $quantity = get_post_meta($post->ID, 'quantity', true);
    $type = get_post_meta($post->ID, 'product_type', true);
    $cat_id = get_post_meta($post->ID, 'category_id', true);
    $cat = $cat_id ? get_term($cat_id, 'product_cat') : null;
    ?>
    <p><strong>مقدار:</strong> <?= esc_html($quantity); ?></p>
    <p><strong>نوع محصول:</strong> <?= esc_html($type); ?></p>
    <p><strong>دسته‌بندی:</strong> <?= $cat ? esc_html($cat->name) : 'نامشخص'; ?></p>
    <?php
}


add_action('wp_ajax_test_categories', function() {
    $terms = get_terms([
        'taxonomy' => 'product_cat',
        'parent' => 0,
        'hide_empty' => false,
    ]);

    echo json_encode($terms);
    wp_die();
});
