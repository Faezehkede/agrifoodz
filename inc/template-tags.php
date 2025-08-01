<?php 
// print_r fuction <pre>
function apr($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

// Admin Columns for Better UX for request form
add_filter('manage_request_posts_columns', function($columns) {
    $columns['product_category'] = 'Product Category';
    $columns['quantity'] = 'Quantity';
    return $columns;
});

add_action('manage_request_posts_custom_column', function($column, $post_id) {
    if ($column == 'product_category') {
        echo esc_html(get_field('product_category', $post_id));
    }
    if ($column == 'quantity') {
        echo esc_html(get_field('quantity', $post_id));
    }
}, 10, 2);


if ( ! function_exists( 'agrifoodz_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function agrifoodz_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;