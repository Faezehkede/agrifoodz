<?php

/**
 * Dokan Dashboard Settings Store Form Template
 *
 * @since 2.4
 */

use WeDevs\DokanPro\Modules\Germanized\Helper;
?>
<?php
$gravatar_id    = ! empty($profile_info['gravatar']) ? $profile_info['gravatar'] : 0;
$banner_id      = ! empty($profile_info['banner']) ? $profile_info['banner'] : 0;
$storename      = isset($profile_info['store_name']) ? $profile_info['store_name'] : '';
$phone          = isset($profile_info['phone']) ? $profile_info['phone'] : '';
$show_email     = isset($profile_info['show_email']) ? $profile_info['show_email'] : 'no';

$address         = isset($profile_info['address']) ? $profile_info['address'] : '';
$address_street1 = isset($profile_info['address']['street_1']) ? $profile_info['address']['street_1'] : '';
$address_street2 = isset($profile_info['address']['street_2']) ? $profile_info['address']['street_2'] : '';
$address_city    = isset($profile_info['address']['city']) ? $profile_info['address']['city'] : '';
$address_zip     = isset($profile_info['address']['zip']) ? $profile_info['address']['zip'] : '';
$address_country = isset($profile_info['address']['country']) ? $profile_info['address']['country'] : '';
$address_state   = isset($profile_info['address']['state']) ? $profile_info['address']['state'] : '';

$map_location   = isset($profile_info['location']) ? $profile_info['location'] : '';
$map_address    = isset($profile_info['find_address']) ? $profile_info['find_address'] : '';
$dokan_category = isset($profile_info['dokan_category']) ? $profile_info['dokan_category'] : '';
$enable_tnc     = isset($profile_info['enable_tnc']) ? $profile_info['enable_tnc'] : '';
$store_tnc      = isset($profile_info['store_tnc']) ? $profile_info['store_tnc'] : '';

$dokan_appearance         = dokan_get_option('store_header_template', 'dokan_appearance', 'default');
$show_store_open_close    = dokan_get_option('store_open_close', 'dokan_appearance', 'on');
$dokan_days               = dokan_get_translated_days();
$all_times                = isset($profile_info['dokan_store_time']) ? $profile_info['dokan_store_time'] : '';
$dokan_store_time_enabled = isset($profile_info['dokan_store_time_enabled']) ? $profile_info['dokan_store_time_enabled'] : '';
$dokan_store_open_notice  = isset($profile_info['dokan_store_open_notice']) ? $profile_info['dokan_store_open_notice'] : '';
$dokan_store_close_notice = isset($profile_info['dokan_store_close_notice']) ? $profile_info['dokan_store_close_notice'] : '';

$store_status = [
	'close' => __('Close', 'dokan-lite'),
	'open'  => __('Open', 'dokan-lite'),
];

$args = [
	'dokan_days'   => $dokan_days,
	'store_info'   => $all_times,
	'dokan_status' => $store_status,
];

/**
 * @since 3.3.7
 */
$location = apply_filters('dokan_store_time_template', 'settings/store-time');
$args     = apply_filters('dokan_store_time_arguments', $args, $all_times);
?>
<?php do_action('dokan_settings_before_form', $current_user, $profile_info); ?>

<div class="main-container">
	<div class="main-wrapper col-xs-12 text-left" currentuser="[object Object]" verifiedusercontent="&lt;div class='tooltip-wrapper text-rtl'&gt;اطلاعات هویتی این کاربر احراز شده است.&lt;br/&gt;&lt;a href='/verification'&gt;اطلاعات بیشتر&lt;/a&gt; &lt;/div&gt;" user-type="0">
		<div class="row">
			<div class="col-xs-12 col-md-4 mb-xs-16">
				<div class="info-box-wrapper"><a target="_blank" href="https://www.agrifoodz.com/agrifoodz/profile" class="info-text-fix"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M2.00001 10C2.00001 5.58172 5.58173 2 10 2C14.4183 2 18 5.58172 18 10C18 14.4183 14.4183 18 10 18C8.65078 18 7.37829 17.6656 6.26225 17.0748L2.62128 17.9851C2.45089 18.0277 2.27065 17.9777 2.14646 17.8536C2.02227 17.7294 1.97234 17.5491 2.01494 17.3787L2.92518 13.7378C2.33442 12.6217 2.00001 11.3492 2.00001 10ZM9.25027 7.30723C9.40317 7.13358 9.64031 7 10 7C10.3597 7 10.5968 7.13358 10.7497 7.30723C10.9113 7.49072 11 7.74463 11 8C11 8.31707 10.9286 8.52273 10.8337 8.68547C10.7328 8.85858 10.5985 8.99908 10.4106 9.19559L10.3885 9.21878C10.2003 9.41576 9.96787 9.66319 9.79142 10.0002C9.61017 10.3464 9.5 10.7611 9.5 11.2929C9.5 11.5691 9.72386 11.7929 10 11.7929C10.2761 11.7929 10.5 11.5691 10.5 11.2929C10.5 10.9085 10.5773 10.6551 10.6773 10.4641C10.7821 10.2639 10.9247 10.1051 11.1115 9.90956L11.1528 9.86652C11.3225 9.68963 11.5347 9.46855 11.6976 9.18921C11.8839 8.86964 12 8.48947 12 8C12 7.52689 11.8387 7.0308 11.5003 6.64641C11.1532 6.25219 10.6403 6 10 6C9.35969 6 8.84683 6.25219 8.49973 6.64641C8.16129 7.0308 8 7.52689 8 8C8 8.27614 8.22386 8.5 8.5 8.5C8.77614 8.5 9 8.27614 9 8C9 7.74463 9.08871 7.49072 9.25027 7.30723ZM10.6995 13.5126C10.6995 13.1262 10.3863 12.813 9.99989 12.813C9.61352 12.813 9.30029 13.1262 9.30029 13.5126C9.30029 13.899 9.61352 14.2122 9.99989 14.2122C10.3863 14.2122 10.6995 13.899 10.6995 13.5126Z" fill="#1DA1F2"></path>
						</svg>
						Completed profile sample
					</a></div>
			</div>
			<div class="col-xs-12 col-md-8">
				<div class="info-box-wrapper bg-main">
					<p class="pull-right info-text-fix red-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M10 2C14.4183 2 18 5.58172 18 10C18 14.4183 14.4183 18 10 18C8.72679 18 7.49591 17.7018 6.38669 17.1393L6.266 17.075L2.62109 17.9851C2.31127 18.0625 2.02622 17.8369 2.00131 17.5438L2.00114 17.4624L2.01493 17.3787L2.925 13.735L2.86169 13.6153C2.4066 12.7186 2.12433 11.7422 2.03275 10.7283L2.00738 10.3463L2 10C2 5.58172 5.58172 2 10 2ZM10 5.5C9.72386 5.5 9.5 5.72386 9.5 6V11.5C9.5 11.7761 9.72386 12 10 12C10.2761 12 10.5 11.7761 10.5 11.5V6C10.5 5.72386 10.2761 5.5 10 5.5ZM10 14.5C10.4142 14.5 10.75 14.1642 10.75 13.75C10.75 13.3358 10.4142 13 10 13C9.58579 13 9.25 13.3358 9.25 13.75C9.25 14.1642 9.58579 14.5 10 14.5Z" fill="#E41C38"></path>
						</svg>
						Your account is not verified.
					</p>
					<div class="agrifoodz-button button verification-button"><span class="agrifoodz-button-icon"><svg width="15" height="18" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7.77735 0.0995999C7.6094 -0.0123666 7.3906 -0.0123666 7.22265 0.0995999C5.28446 1.39173 3.18833 2.19793 0.929289 2.52065C0.682965 2.55584 0.5 2.7668 0.5 3.01563V7.51563C0.5 11.407 2.80699 14.2463 7.32051 15.9823C7.43605 16.0267 7.56395 16.0267 7.67949 15.9823C12.193 14.2463 14.5 11.407 14.5 7.51563V3.01563C14.5 2.7668 14.317 2.55584 14.0707 2.52065C11.8117 2.19793 9.71554 1.39173 7.77735 0.0995999ZM11.3536 5.86918L7.35355 9.86918C7.15829 10.0644 6.84171 10.0644 6.64645 9.86918L4.64645 7.86918C4.45118 7.67392 4.45118 7.35734 4.64645 7.16207C4.84171 6.96681 5.15829 6.96681 5.35355 7.16207L7 8.80852L10.6464 5.16207C10.8417 4.96681 11.1583 4.96681 11.3536 5.16207C11.5488 5.35733 11.5488 5.67392 11.3536 5.86918Z" fill="#FFF"></path>
							</svg></span> <span class="agrifoodz-button-main-text"> Verify now </span> <!----></div>
				</div>
			</div>
		</div>

		<form method="post" id="store-form" action="" class="dokan-form-horizontal">
			<?php wp_nonce_field('dokan_store_settings_nonce'); ?>
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="box-wrapper user-info-box">
						<div class="header-wrapper">
							<?php $gravatar_url = $gravatar_id ? wp_get_attachment_url($gravatar_id) : ''; ?>

							<div id="dokan-profile-picture-wrapper" class="dokan-gravatar">
								<div class="dokan-left gravatar-wrap<?php echo $gravatar_id ? '' : ' dokan-hide'; ?>">

									<input type="hidden" class="dokan-file-field" value="<?php echo esc_attr($gravatar_id); ?>" name="dokan_gravatar">
									<img alt="gravtar" class="user-img-wrapper" src="<?php echo esc_url($gravatar_url); ?>">
									<a class="dokan-close dokan-remove-gravatar-image">&times;</a>
								</div>
								<div class="gravatar-button-area<?php echo esc_attr($gravatar_id) ? ' dokan-hide' : ''; ?>">
									<a href="#" class="dokan-pro-gravatar-drag">
										<span><i class="fa fa-camera"></i></span>
										<img alt="gravtar" class="user-img-wrapper" src="<?php echo AGRIFOODZ_ASSETS . '/images/user-defult.png'; ?>">
									</a>
								</div>
							</div>
						</div>
						<div class="user-name">
							<p class="blue-aqua-text text-center">
								Profile completion:
								<span>
									33%
								</span>
							</p>
							<p class="user-name"><?php echo esc_attr($storename); ?></p>
							<input disabled id="dokan_store_name" required value="<?php echo esc_attr($storename); ?>" name="dokan_store_name" placeholder="<?php esc_attr_e('store name', 'dokan-lite'); ?>" class="dokan-form-control" type="hidden">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-8">
					<div class="box-wrapper padding-buttom-fixed">
						<div class="box-title">Your information</div>
						<div class="user-phone-number-wrapper row">
							<div class="col-xs-12 col-md-7">
								<p class="title-contents">
									Phone number
									<span class="red-text"> * </span>
								</p>
								<div class="text-input-wrapper">
									<!-- <input id="min-sale-amount" type="tel" placeholder="Enter phone number" pattern="[0-9]*" class="active"> -->
									<input id="setting_phone" value="<?php echo esc_attr($phone); ?>" name="setting_phone" placeholder="<?php esc_attr_e('+123456..', 'dokan-lite'); ?>" class="dokan-form-control input-md" type="text">

								</div>
								<div class="error-input-wrapper">
									<p class="error-message"><!----></p>
								</div>
							</div>
							<div class="col-xs-12 active-number-wrapper col-md-5">
								<p class="title-contents active-number-title">
									Phone number visibility:
									<span class="green-text">Enabled</span>
								</p>
								<p class="active-number-button-title">Suppliers can see your phone number</p>
								<div class="agrifoodz-button deactive-number-button hover-effect"><!----> <span class="agrifoodz-button-main-text"> Disable </span> <!----></div>
							</div>
						</div>
						<div class="address-wrapper row">
							<div class="col-xs-12 col-md-7">
								<!-- <p class="title-contents">Country</p> -->
								<div class="text-input-wrapper">
									<!-- <input id="min-sale-amount" type="text" placeholder="Enter country" class="active"> -->

									<?php
									if (! class_exists('WC_Countries')) {
										require_once WP_PLUGIN_DIR . '/woocommerce/includes/class-wc-countries.php';
									}
									$country_obj = new WC_Countries();
									$countries = $country_obj->get_allowed_countries();
									$states = $country_obj->states;
									?>
									<label class="control-label" for="dokan_address[country]">
										<?php esc_html_e('Country ', 'dokan-lite'); ?>
										<?php
										$required_attr = '';
										if ($seller_address_fields['country']['required']) {
											$required_attr = 'required';
										?>
											<span class="required"> *</span>
										<?php } ?>
									</label>
									<select <?php echo esc_attr($required_attr); ?> <?php echo esc_attr($disabled); ?> name="dokan_address[country]" class="country_to_state dokan-form-control" id="dokan_address_country" disabled>
										<?php dokan_country_dropdown($countries, $address_country, false); ?>
									</select>
								</div>
								<div class="error-input-wrapper">
									<p class="error-message"><!----></p>
								</div>
							</div>
							<div class="col-xs-12 col-md-5"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="box-wrapper">
						<div class="box-title">Company information</div>
						<p class="legal-info-des">
							Strengthen your account reputation by providing legal information.
						</p>
						<div class="agrifoodz-button action-link blue-text" data-toggle="collapse" data-target="#company-box" aria-expanded="false" aria-controls="company-box"><!----> <span class="agrifoodz-button-main-text"> Add legal information </span> <span class="agrifoodz-button-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M17.794 9.73271C18.0797 10.0326 18.0681 10.5074 17.7682 10.7931L12.5178 15.7944C12.2281 16.0703 11.7728 16.0703 11.4832 15.7944L6.23271 10.7931C5.93279 10.5074 5.92125 10.0326 6.20694 9.73271C6.49264 9.43279 6.96737 9.42125 7.26729 9.70694L12.0005 14.2155L16.7336 9.70694C17.0336 9.42125 17.5083 9.43279 17.794 9.73271Z" fill="#1DA1F2"></path>
								</svg></span></div>
						<div id="company-box" class="form-wrapper collapse">
							<div class="margin-top-15">
								<p class="title-contents">
									<?php echo Helper::get_company_name_label(); ?>
									<span class="red-text"> * </span>
								</p>
								<div class="text-input-wrapper">
									<!-- <input id="min-sale-amount" type="text" placeholder="Enter company"> -->
									<?php
									$dokan_company_name      = get_user_meta($current_user, 'dokan_company_name', true);
									$dokan_company_id_number = get_user_meta($current_user, 'dokan_company_id_number', true);
									?>

									<input id="settings_dokan_company_name" value="<?php echo esc_attr($dokan_company_name); ?>" name="settings_dokan_company_name" placeholder="<?php echo Helper::get_company_name_label(); ?>" class="dokan-form-control input-md" type="text">

									<svg xmlns=" http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M13.989 2L12.486 3.5H3.25L3.10647 3.5058C2.20711 3.57881 1.5 4.33183 1.5 5.25V7.49L4.11033 5.85007C5.11458 5.21884 6.42578 5.47881 7.11805 6.41878L7.21264 6.55767C7.60754 7.18595 7.66532 7.96467 7.37644 8.6398L7.29699 8.80628L6.08926 11.0917C5.89573 11.4579 6.03572 11.9117 6.40194 12.1052C6.5952 12.2073 6.82159 12.2193 7.02228 12.1419L7.12021 12.0957L8.8792 11.1027C9.23925 10.8979 9.69714 11.0238 9.90192 11.3838C10.0896 11.7139 9.99953 12.1261 9.70588 12.3503L9.6208 12.4066L7.85592 13.4029C7.18921 13.7781 6.37751 13.7889 5.70109 13.4314C4.65021 12.8761 4.22026 11.6064 4.69297 10.5355L4.76305 10.3908L5.97078 8.10544C6.09599 7.86851 6.08527 7.58278 5.94267 7.3559C5.74228 7.03709 5.34143 6.92083 5.00673 7.06794L4.90856 7.12004L1.5 9.262V14.7546C1.5 15.7211 2.2835 16.5046 3.25 16.5046H16.75C17.7165 16.5046 18.5 15.7211 18.5 14.7546V7.443L20 5.946V14.7546C20 16.5495 18.5449 18.0046 16.75 18.0046H3.25C1.45507 18.0046 0 16.5495 0 14.7546V5.25C0 3.51697 1.35645 2.10075 3.06558 2.00514L3.25 2H13.989ZM19.1755 1.54486L19.3057 1.66549L19.4262 1.79573C20.1894 2.68738 20.1488 4.03053 19.3047 4.87411L15.0238 9.14775C14.7608 9.41029 14.4369 9.6036 14.081 9.71043L11.7535 10.4091C11.2245 10.5679 10.667 10.2678 10.5082 9.7388C10.4499 9.54478 10.452 9.33764 10.5141 9.14481L11.253 6.84996C11.3627 6.50946 11.5519 6.20001 11.8051 5.94728L16.0957 1.66366C16.9405 0.820236 18.2841 0.780815 19.1755 1.54486ZM17.1555 2.72519L12.8648 7.00881C12.7805 7.09305 12.7174 7.1962 12.6808 7.3097L12.2335 8.69887L13.6498 8.27376C13.7684 8.23815 13.8764 8.17371 13.9641 8.0862L18.2441 3.81339L18.3188 3.7269C18.5422 3.42599 18.5176 2.99885 18.2447 2.72582C17.9441 2.42497 17.4565 2.42469 17.1555 2.72519Z" fill="#979797"></path>
									</svg>
								</div>
								<div class="error-input-wrapper">
									<p class="error-message"><!----></p>
								</div>
							</div>
							<div>
								<p class="title-contents">
									<?php echo Helper::get_company_id_label(); ?>
									<span class="red-text"> * </span>
								</p>
								<div class="text-input-wrapper">
									<!-- <input id="min-sale-amount" type="tel" placeholder="Enter company registration code" pattern="[0-9]*" class="error"> -->
									<input id="settings_dokan_company_id_number" value="<?php echo esc_attr($dokan_company_id_number); ?>" name="settings_dokan_company_id_number" placeholder="<?php echo Helper::get_company_id_label(); ?>" class="dokan-form-control input-md" type="text">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_16246_33667)">
											<path d="M10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0ZM13.5303 6.46967L13.4462 6.39705C13.1852 6.2034 12.827 6.20101 12.5636 6.38988L12.4697 6.46967L10 8.939L7.53033 6.46967L7.44621 6.39705C7.18522 6.2034 6.82701 6.20101 6.56362 6.38988L6.46967 6.46967L6.39705 6.55379C6.2034 6.81478 6.20101 7.17299 6.38988 7.43638L6.46967 7.53033L8.939 10L6.46967 12.4697L6.39705 12.5538C6.2034 12.8148 6.20101 13.173 6.38988 13.4364L6.46967 13.5303L6.55379 13.6029C6.81478 13.7966 7.17299 13.799 7.43638 13.6101L7.53033 13.5303L10 11.061L12.4697 13.5303L12.5538 13.6029C12.8148 13.7966 13.173 13.799 13.4364 13.6101L13.5303 13.5303L13.6029 13.4462C13.7966 13.1852 13.799 12.827 13.6101 12.5636L13.5303 12.4697L11.061 10L13.5303 7.53033L13.6029 7.44621C13.7966 7.18522 13.799 6.82701 13.6101 6.56362L13.5303 6.46967L13.4462 6.39705L13.5303 6.46967Z" fill="#F03738"></path>
										</g>
										<defs>
											<clipPath id="clip0_16246_33667">
												<rect width="20" height="20" fill="white"></rect>
											</clipPath>
										</defs>
									</svg>
								</div>
								<!-- <div class="error-input-wrapper">
									<p class="error-message"><span class="red-text">Enter A Number </span></p>
								</div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-8">
					<div class="box-wrapper padding-buttom-fixed">
						<div class="box-title">Business description</div>
						<div class="info-box-wrapper info-description-wrapper margin-15-0">
							<p class="pull-right info-text-fix col-xs-12"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
									<path d="M2.00001 10C2.00001 5.58172 5.58173 2 10 2C14.4183 2 18 5.58172 18 10C18 14.4183 14.4183 18 10 18C8.65078 18 7.37829 17.6656 6.26225 17.0748L2.62128 17.9851C2.45089 18.0277 2.27065 17.9777 2.14646 17.8536C2.02227 17.7294 1.97234 17.5491 2.01494 17.3787L2.92518 13.7378C2.33442 12.6217 2.00001 11.3492 2.00001 10ZM9.25027 7.30723C9.40317 7.13358 9.64031 7 10 7C10.3597 7 10.5968 7.13358 10.7497 7.30723C10.9113 7.49072 11 7.74463 11 8C11 8.31707 10.9286 8.52273 10.8337 8.68547C10.7328 8.85858 10.5985 8.99908 10.4106 9.19559L10.3885 9.21878C10.2003 9.41576 9.96787 9.66319 9.79142 10.0002C9.61017 10.3464 9.5 10.7611 9.5 11.2929C9.5 11.5691 9.72386 11.7929 10 11.7929C10.2761 11.7929 10.5 11.5691 10.5 11.2929C10.5 10.9085 10.5773 10.6551 10.6773 10.4641C10.7821 10.2639 10.9247 10.1051 11.1115 9.90956L11.1528 9.86652C11.3225 9.68963 11.5347 9.46855 11.6976 9.18921C11.8839 8.86964 12 8.48947 12 8C12 7.52689 11.8387 7.0308 11.5003 6.64641C11.1532 6.25219 10.6403 6 10 6C9.35969 6 8.84683 6.25219 8.49973 6.64641C8.16129 7.0308 8 7.52689 8 8C8 8.27614 8.22386 8.5 8.5 8.5C8.77614 8.5 9 8.27614 9 8C9 7.74463 9.08871 7.49072 9.25027 7.30723ZM10.6995 13.5126C10.6995 13.1262 10.3863 12.813 9.99989 12.813C9.61352 12.813 9.30029 13.1262 9.30029 13.5126C9.30029 13.899 9.61352 14.2122 9.99989 14.2122C10.3863 14.2122 10.6995 13.899 10.6995 13.5126Z" fill="#404B55"></path>
								</svg>
								You can answer such questions in this section.
							</p>
							<div class="info-description col-xs-12">
								<ul>
									<li>What is your business domain?</li>
									<li>How many years of experience do you have in this domain?</li>
								</ul>
							</div>
						</div>
						<div class="description row">
							<div class="col-xs-12">
								<div class="text-input-wrapper">


									<?php
									$store_info = dokan_get_store_info($current_user);

									$biography = ! empty($store_info['vendor_biography']) ? $store_info['vendor_biography'] : '';

									wp_editor(
										$biography,
										'vendor_biography',
										apply_filters('dokan_vendor_biography_form', ['quicktags' => false])
									);
									?>
								</div>
								<!-- <div class="error-input-wrapper">
									<p class="error-message"><span class="red-text">The description must be at least 100 characters long.</span></p>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-center">

					<span class="dokan-update-setting-top">
						<button class="dokan-update-setting-top-button agrifoodz-button submit-form-button bg-blue hover-effect">
							<span class="agrifoodz-button-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
									<path d="M9.53212 15.9072L6.06056 12.0017C5.78538 11.6921 5.31132 11.6643 5.00174 11.9394C4.69215 12.2146 4.66426 12.6887 4.93945 12.9983L8.93945 17.4983C9.22614 17.8208 9.7252 17.8355 10.0303 17.5303L20.5303 7.03033C20.8232 6.73744 20.8232 6.26256 20.5303 5.96967C20.2374 5.67678 19.7626 5.67678 19.4697 5.96967L9.53212 15.9072Z" fill="white"></path>
								</svg>
							</span>
							<?php esc_html_e('save changes', 'dokan-lite'); ?>
						</button>
					</span>
				</div>
			</div>

		</form>

		<div class="row">
			<div class="col-xs-12">
				<div class="box-wrapper flex-direction-row">
					<div class="col-xs-12 col-sm-6">
						<div class="row flex-direction-column">
							<div class="box-title">
								Company album
								<p class="small-description">Products/Office or Buldings/Employees</p>
							</div>
							<div class="image-upload-wrapper margin-15-auto" uploaddrop="true" uploadocompress="1048576">
								<div class="drop-active" style="display: none;">
									<h2>Drop the image here</h2>
								</div>
								<div class="col-xs-12">
									<div class="wrapper-articles row"><!---->

										<form id="upload-images-form_company" method="post" enctype="multipart/form-data">
											<div id="image-drop-area_company" class="drop-area">
												<p>Drag and drop images here or click to select images</p>
												<input type="file" id="image-upload_company" name="images[]" accept="image/png, image/jpg, image/jpeg" multiple />
											</div>
											<button class="agrifoodz-button submit-form-button bg-blue hover-effect" type="submit" id="submit-upload_company">
												<span class="agrifoodz-button-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
														<path d="M9.53212 15.9072L6.06056 12.0017C5.78538 11.6921 5.31132 11.6643 5.00174 11.9394C4.69215 12.2146 4.66426 12.6887 4.93945 12.9983L8.93945 17.4983C9.22614 17.8208 9.7252 17.8355 10.0303 17.5303L20.5303 7.03033C20.8232 6.73744 20.8232 6.26256 20.5303 5.96967C20.2374 5.67678 19.7626 5.67678 19.4697 5.96967L9.53212 15.9072Z" fill="white"></path>
													</svg>
												</span>
												<span class="agrifoodz-button-main-text"> save images </span> <!---->
											</button>
										</form>

										<div id="progress_company"></div>
									</div> <!---->
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 submited-images col-sm-6 pull-right">
						<div class="box-title">Posted photo</div>
						<div id="image-preview_company">
							<p id="no-images-message_company">No Licenses & Certifications</p> <!-- Default message for no images -->
						</div>

						<!-- Loading progress -->
						<div id="loading-popup_company" style="display: none;">
							<p>Uploading...</p>
							<div id="loading-bar_company"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box-wrapper flex-direction-row">
				<div class="col-xs-12 col-sm-6">
					<div class="row flex-direction-column">
						<div class="box-title">
							Licenses &amp; Certifications
							<p class="small-description">Registration company licenses/Product Certifications</p>
						</div>
						<div class="image-upload-wrapper margin-15-auto" uploaddrop="true" uploadocompress="1048576">
							<div class="drop-active" style="display: none;">
								<h2>Drop the image here</h2>
							</div>
							<div class="col-xs-12">
								<div class="wrapper-articles row"><!----> <!---->


									<form id="upload-images-form" method="post" enctype="multipart/form-data">
										<div id="image-drop-area" class="drop-area">
											<p>Drag and drop images here or click to select images</p>
											<input type="file" id="image-upload" name="images[]" accept="image/png, image/jpg, image/jpeg" multiple />
										</div>
										<button class="agrifoodz-button submit-form-button bg-blue hover-effect" type="submit" id="submit-upload">
											<span class="agrifoodz-button-icon"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
													<path d="M9.53212 15.9072L6.06056 12.0017C5.78538 11.6921 5.31132 11.6643 5.00174 11.9394C4.69215 12.2146 4.66426 12.6887 4.93945 12.9983L8.93945 17.4983C9.22614 17.8208 9.7252 17.8355 10.0303 17.5303L20.5303 7.03033C20.8232 6.73744 20.8232 6.26256 20.5303 5.96967C20.2374 5.67678 19.7626 5.67678 19.4697 5.96967L9.53212 15.9072Z" fill="white"></path>
												</svg>
											</span>
											<span class="agrifoodz-button-main-text"> save images </span> <!---->
										</button>

									</form>

									<div id="progress"></div>


								</div> <!---->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 submited-images col-sm-6">
					<div class="box-title">Posted Licenses &amp; Certifications</div>
					<div class="row margin-15-auto">

						<div id="image-preview">
							<p id="no-images-message">No Licenses & Certifications</p> <!-- Default message for no images -->
						</div>

						<!-- Loading progress -->
						<div id="loading-popup" style="display: none;">
							<p>Uploading...</p>
							<div id="loading-bar"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



<?php do_action('dokan_settings_after_form', $current_user, $profile_info); ?>

<style>
	.dokan-settings-content .dokan-settings-area .dokan-banner {
		max-width: <?php echo esc_attr($banner_width) . 'px'; ?>;
		max-height: <?php echo esc_attr($banner_height) . 'px'; ?>;
	}

	.dokan-settings-content .dokan-settings-area .dokan-banner .dokan-remove-banner-image {
		height: <?php echo esc_attr($banner_height) . 'px'; ?>;
	}
</style>
<script type="text/javascript">
	(function($) {
		// dokan store open close scripts starts //
		var store_opencolse = $('.store-open-close');
		store_opencolse.hide();

		$('#dokan-store-time-enable').on('change', function() {
			var self = $(this);

			if (self.prop('checked')) {
				store_opencolse.hide().fadeIn();
			} else {
				store_opencolse.fadeOut();
			}
		});

		$('#dokan-store-time-enable').trigger('change');

		// Show & hide our opening, closing time fields by using this change event.
		$('.dokan-on-off').on('change', function() {
			const self = $(this);

			if (self.val() === 'open') {
				self.closest('.dokan-form-group').find('.time').css({
					'visibility': 'visible'
				});
			} else {
				self.closest('.dokan-form-group').find('.time').css({
					'visibility': 'hidden'
				});
				self.closest('.store-open-close').find('.dokan-w6').removeClass('dokan-text-left');
				self.closest('.store-open-close').find('.dokan-w6').css({
					'width': 'auto'
				});
			}

		});

		<?php if (! dokan()->is_pro_exists()) : ?>
			// Set timepicker jquery here.
			$('.dokan-store-times .time .dokan-form-control').timepicker({
				step: 30,
				lang: dokan_helper.timepicker_locale,
				minTime: '12:00 am',
				maxTime: '11:30 pm',
				timeFormat: '<?php echo esc_js(wc_time_format()); ?>',
				scrollDefault: 'now',
			});

			// Add validation for store time when changed.
			$('.dokan-store-times').on('change', '.dokan-form-group', function() {
				const self = $(this),
					openValue = self.find('.opening-time').val(),
					closeValue = self.find('.closing-time').val(),
					formattedOpenValue = moment(openValue, 'hh:mm a').format('HH:mm'),
					formattedCloseValue = moment(closeValue, 'hh:mm a').format('HH:mm');

				if (formattedOpenValue > formattedCloseValue) {
					self.find('input.dokan-form-control').css({
						'border-color': '#F87171',
						'color': '#F87171'
					});
				} else {
					self.find('input.dokan-form-control').css({
						'border-color': '#bbb',
						'color': '#4e4e4e'
					});
				}
			});

			$('input[name="dokan_update_store_settings"]').on('click', function(e) {
				$('.dokan-store-times').each(function() {
					const self = $(this),
						open_or_close = self.find('.dokan-on-off').val();

					// check if today is open
					if ('close' === open_or_close) {
						return;
					}

					const openValue = self.find('.opening-time').val(),
						closeValue = self.find('.closing-time').val();

					if (!openValue || !closeValue) {
						self.find('input.dokan-form-control').css({
							'border-color': '#F87171',
							'color': '#F87171'
						});
						if (!openValue) {
							self.find('.opening-time').focus();
						} else {
							self.find('.closing-time').focus();
						}
						e.preventDefault();
						return false;
					}

					const formattedOpenValue = moment(openValue, 'hh:mm a').format('HH:mm'),
						formattedCloseValue = moment(closeValue, 'hh:mm a').format('HH:mm');

					if (formattedOpenValue >= formattedCloseValue) {
						self.find('input.dokan-form-control').css({
							'border-color': '#F87171',
							'color': '#F87171'
						});
						self.find('.opening-time').focus();
						e.preventDefault();
						return false;
					}

					self.find('input.dokan-form-control').css({
						'border-color': '#bbb',
						'color': '#4e4e4e'
					});
				});
			});
		<?php endif; ?>


		$(function() {

			const savedState = '<?php echo esc_html($address_state); ?>';

			if (!savedState || 'N/A' === savedState) {
				$('#dokan-states-box').hide();
			}

			// Sanitize phone number field.
			$('#setting_phone').on('keydown', dokan_sanitize_phone_number);
		});
	})(jQuery);
</script>