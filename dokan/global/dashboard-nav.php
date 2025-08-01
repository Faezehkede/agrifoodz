<?php
$home_url     = home_url();
$active_class = ' class="active"'
?>

<!-- Sidebar -->
<aside class="sidebar" aria-label="<?php esc_html_e('Account pages', 'woocommerce'); ?>">
	<div class="logo">Agrifoodz</div>
	<div class="user-info">
		<div class="user-avatar"></div>
		<div class="user-name">Pars Avesta</div>
		<div class="user-country">Iran</div>
	</div>
	<div class="role-switch">

		<button id="supplierBtn" class="role"><a href="./supplier-dashboard.html">Supplier</a></button>
		<button id="buyerBtn" class="role active">Buyer</button>
	</div>

    <?php
    global $allowedposttags;
    do_action( 'dokan_dashboard_sidebar_start' );

    // These are required for the hamburger menu.
    if ( is_array( $allowedposttags ) ) {
        $allowedposttags['input'] = [ // phpcs:ignore
            'id'      => [],
            'type'    => [],
            'checked' => [],
        ];
        $allowedposttags['svg'] = [ // phpcs:ignore
            'fill'        => [],
            'role'        => [],
            'xmlns'       => [],
            'width'       => [],
            'height'      => [],
            'viewbox'     => [],
            'focusable'   => [],
            'aria-hidden' => [],
        ];
        $allowedposttags['path'] = [ // phpcs:ignore
            'd'    => [],
            'fill' => [],
        ];
    }

    echo wp_kses( custom_dokan_dashboard_nav( $active_menu ), $allowedposttags );

    do_action( 'dokan_dashboard_sidebar_end' );
    ?>
</aside>


