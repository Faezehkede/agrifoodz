<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if (! defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');
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

	<nav class="nav-menu">
		<!-- <ul class="sidebar-nav">
			<li><a href="#" class="" data-tab="myAgrifoodz">My Agrifoodz</a></li>
			<li><a href="#" class="tab-link" data-tab="newRFQ">New RFQ</a></li>
			<li><a href="#" class="tab-link" data-tab="messages">Messages</a></li>
			<li><a href="#" class="tab-link" data-tab="suggestedSuppliers">Suggested Suppliers</a></li>
			<li><a href="#" class="tab-link" data-tab="verification">Verification</a></li>
			<li><a href="#" class="tab-link" data-tab="saved">Saved</a></li>
			<li><a href="#" class="tab-link" data-tab="feedback">Feedback</a></li>
		</ul> -->


		<ul class="sidebar-nav">
			<?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
				<li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
					<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" <?php echo wc_is_current_account_menu_item($endpoint) ? 'aria-current="page"' : ''; ?>>
						<?php echo esc_html($label); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>


	</nav>

</aside>



<?php do_action('woocommerce_after_account_navigation'); ?>