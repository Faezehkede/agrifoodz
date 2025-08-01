<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);

// گرفتن شناسه فروشنده
$seller_id = get_current_user_id();

// گرفتن URL فروشگاه فروشنده با استفاده از شناسه فروشنده
$seller_shop_url = dokan_get_store_url($seller_id);

?>


<div class="tab-panel active" id="myAgrifoodz">
	<div id="buyerContent" class="role-content">
		<div class="main-profile-detail">
			<section class="profile-card">
				<a href="<?php echo esc_url($seller_shop_url) ?>" class="profile-info">
					<div class="avatar">
						<img src="<?php echo AGRIFOODZ_ASSETS; ?>/images/user-img1.webp">
					</div>
					<div>
						<div class="name">
							<?php echo esc_html($current_user->display_name) ?>
						</div>
						<div class="role">Buyer</div>
					</div>
					</href=>
			</section>

			<section class="profile-verfying">
				<div class="profile-strength">
					<span>Profile strength: <strong>Weak</strong></span>
					<div class="strength-bar">
						<div class="progress" style="width: 20%;"></div>
					</div>
				</div>
				<div class="verification-box">
					<div class="Verify-text">
						<p>Verify your account</p>
						<p>Be the most reliable buyer for sellers by verifying your identity.</p>
					</div>
					<button class="btn-verify">Get Verified</button>
				</div>
			</section>

			<section class="quick-links">
				<a href="#" class="quick-link-suppliers">Suppliers</a>
				<a href="#" class="quick-link-rfqs">My RFQs</a>
				<a href="#" class="quick-link-saved">Saved</a>
			</section>

			<section class="important-links">
				<a href="#" class="edit-profile">
					<span>
						<svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<path d="M11 15C10.1183 15 9.28093 14.8098 8.52682 14.4682C8.00429 14.2315 7.74302 14.1131 7.59797 14.0722C7.4472 14.0297 7.35983 14.0143 7.20361 
                                14.0026C7.05331 13.9914 6.94079 14 6.71575 14.0172C6.6237 14.0242 6.5425 14.0341 6.46558 14.048C5.23442 14.2709 4.27087 15.2344 4.04798 16.4656C4 
                                16.7306 4 17.0485 4 17.6841V19.4C4 19.9601 4 20.2401 4.10899 20.454C4.20487 20.6422 4.35785 20.7951 4.54601 20.891C4.75992 21 5.03995 21 5.6 21H8.4M15 
                                7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 
                                14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 
                                15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 
                                18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z" stroke="#000000" stroke-width="0.72"
									stroke-linecap="round" stroke-linejoin="round"></path>
							</g>
						</svg>
					</span>
					<p>Edit profile</p>
				</a>
				<a href="#" class="verification-link">
					<span>
						<svg width="25px" height="25px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="1.44">
								<path d="M4.39254 16.2614C2.64803 13.1941 1.66074 9.71783 1.51646 6.15051C1.50127 5.77507 1.70918 5.42812 2.04153 5.25282L11.5335 0.246091C11.8254 
                                0.0920859 12.1746 0.0920859 12.4665 0.246091L21.9585 5.25282C22.2908 5.42812 22.4987 5.77507 22.4835 6.15051C22.3393 9.71783 21.352 13.1941 19.6075 
                                16.2614C17.8618 19.3307 15.4169 21.8869 12.4986 23.7001C12.1931 23.8899 11.8069 23.8899 11.5014 23.7001C8.58313 21.8869 6.13817 19.3307 4.39254 16.2614Z"
									fill="#ffffff"></path>
								<path d="M8.25 12.75L11.25 15L17.25 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							</g>
							<g id="SVGRepo_iconCarrier">
								<path d="M4.39254 16.2614C2.64803 13.1941 1.66074 9.71783 1.51646 6.15051C1.50127 5.77507 1.70918 5.42812 2.04153 5.25282L11.5335 
                                0.246091C11.8254 0.0920859 12.1746 0.0920859 12.4665 0.246091L21.9585 5.25282C22.2908 5.42812 22.4987 5.77507 22.4835 6.15051C22.3393 9.71783 21.352 13.1941 
                                19.6075 16.2614C17.8618 19.3307 15.4169 21.8869 12.4986 23.7001C12.1931 23.8899 11.8069 23.8899 11.5014 23.7001C8.58313 21.8869 6.13817 19.3307 4.39254 
                                16.2614Z" fill="#ffffff"></path>
								<path d="M8.25 12.75L11.25 15L17.25 9" stroke="#000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
							</g>
						</svg>
					</span>
					<p>Verification</p>
				</a>
				<a href="#" class="support-link">
					<span>
						<svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#000000" stroke-width="0.7" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000">
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<title id="supportIconTitle">Support</title>
								<path d="M18,9 L16,9 C14.8954305,9 14,9.8954305 14,11 L14,13 C14,14.1045695 
                                14.8954305,15 16,15 L16,15 C17.1045695,15 18,14.1045695 18,13 L18,9 C18,4.02943725 13.9705627,0 9,0 C4.02943725,0 0,4.02943725 0,9 L0,13 
                                C1.3527075e-16,14.1045695 0.8954305,15 2,15 L2,15 C3.1045695,15 4,14.1045695 4,13 L4,11 C4,9.8954305 3.1045695,9 2,9 L0,9" transform="translate(3 3)"></path>
								<path d="M21,14 L21,18 C21,20 20.3333333,21 19,21 C17.6666667,21 16,21 14,21"></path>
							</g>
						</svg>
					</span>
					<p>Support</p>
				</a>
			</section>

		</div>
	</div>
</div>





<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__('Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce'), $allowed_html),
		'<strong>' . esc_html($current_user->display_name) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	if (wc_shipping_enabled()) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
	}
	printf(
		wp_kses($dashboard_desc, $allowed_html),
		esc_url(wc_get_endpoint_url('orders')),
		esc_url(wc_get_endpoint_url('edit-address')),
		esc_url(wc_get_endpoint_url('edit-account'))
	);
	?>
</p>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
