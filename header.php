<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bonyan
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="https://bonyan.ngo/wp-content/uploads/2023/06/عرضي-مفرغ.webp">
	<meta property="og:image" content="https://bonyan.ngo/wp-content/uploads/2023/06/عرضي-مفرغ.webp" />
	<?php
	if (!empty(get_option('general_recaptcha_secret_key'))) {
	?>
		<script src="https://www.google.com/recaptcha/api.js?render=<?= esc_attr(get_option('general_recaptcha_site_key')) ?>"></script>

	<?php
	}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Start Login Modal -->
	<?php echo get_template_part('template-parts/login'); ?>
	<!-- End Login Modal -->

	<!-- Start Signup Modal -->
	<?php echo get_template_part('template-parts/signup'); ?>
	<!-- End Signup Modal -->

	<!-- Start Donation Modal -->
	<?php echo get_template_part('template-parts/donation-modal'); ?>
	<!-- End Donation Modal -->

	<!-- Start GiveWP Modal -->
	<div id="givewp-modal" class="givewp-modal user-action-modal">
	</div>
	<!-- End GiveWP Modal -->
	<!-- Start Charity Stack Modal -->
	<div id="charity-stack-modal" class="charity-stack-modal givewp-modal user-action-modal">
	</div>
	<!-- End Charity Stack Modal -->
	<!-- Start Infaque Modal -->
	<style>
		div#infaque-modal iframe {
			height: 600px;
		}
	</style>
	<div id="infaque-modal" class="infaque-modal givewp-modal user-action-modal">
	</div>
	<!-- End Infaque Modal -->

	</div>

	<div id="page" class="site">
		<header id="masthead" class="site-header">

			<div class="top-header">
				<div class="container">
					<div class="top-header-helper">

						<div class="logo header-logo me-auto">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo get_template_directory_uri() . '/dist/imgs/smile-logo.png'; ?>" alt="<?php bloginfo('name'); ?>" class="custom-logo">
							</a>
						</div>
						<div class="donation-button-holder as-block ms-2 ms-lg-3 me-1 me-lg-3">
							<!-- Donate button -->
							<?php

							// Check if the fundraise up button is enabled
							$fundraise_provider = !empty(get_option('fundraise_provider')) ? get_option('fundraise_provider') : 'give_wp';

							switch ($fundraise_provider) {
								case 'fundraise_up':
									// $button_classes = ' ' . (is_user_logged_in() ? 'donation-btn' : 'donation-action');
									$button_classes = ' ' .  'donation-btn';
									// $data_target = is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"';
									$data_target = 'data-target="givewp-modal"';

									$button_link = (!empty(get_option('fundraise_up_header_btn_link')) ? esc_url(get_option('fundraise_up_header_btn_link')) : '#')
							?>
									<a href="<?= $button_link ?>" style="display: none" class="primary-btn <?= $button_classes ?>" <?= $data_target ?>>
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								<?php

									break;
								case 'give_wp':
									// Get the GiveWP form ID and default donation amount
									$give_form_id = get_option('give_form_id');
									$default_donation_amount = intval(get_option("default_donation_amount"));

									$button_classes = ' ' .  'donation-btn';
									// $data_target = is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"';
									$data_target =  'data-target="givewp-modal"';


								?>
									<a class="user-action-btn primary-btn<?= $button_classes ?>" <?= $data_target ?> data-giveformid="<?= $give_form_id ?>" data-amount="<?= $default_donation_amount ?>">
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								<?php

									break;
								case 'charitystack':
									// Get the GiveWP form ID and default donation amount
									$charity_stack_element_id = get_option('charity_stack_element_id');

									$button_classes = ' ' .  'donation-btn';
									// $data_target = is_user_logged_in() ? 'data-target="charity-stack-modal"' : 'data-target="donation-modal"';
									$data_target =  'data-target="charity-stack-modal"';


								?>
									<a class="user-action-btn primary-btn <?= $button_classes ?>" <?= $data_target ?> data-charity-stack-element-id="<?= $charity_stack_element_id ?>" style="cursor: pointer;">
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								<?php
									break;
								case 'classy':
									// Get the GiveWP form ID and default donation amount
									$classy_campaign_id = get_option('classy_campaign_id');

									$button_classes = ' ' .  'donation-btn classy-donation';


								?>
									<a href="?campaign=<?= $classy_campaign_id ?>" class=" primary-btn <?= $button_classes ?>" data-campaign-id="<?= $classy_campaign_id ?>" style="cursor: pointer;">
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								<?php
									break;
								case 'givecloud':
									// Get the GiveWP form ID and default donation amount
									$givecloud_campaign_id = get_option('givecloud_campaign_id');

									$options = get_option('givecloud_settings_fields');

									$url = trim(data_get($options, 'instance_url'), '/');
									$default_donation_amount = !empty(intval(get_option("default_donation_amount"))) ? intval(get_option("default_donation_amount")) : 10;


								?>
									<a href="<?= $url . '/fundraising/forms/' . $givecloud_campaign_id . '?gc-a=' . $default_donation_amount  ?>" class=" primary-btn donation-btn" style="cursor: pointer;">
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								<?php
									break;

								case 'infaque':
									// Get the GiveWP form ID and default donation amount
									$infaque_campaign_id = get_option('infaque_campaign_id');

									$button_classes = ' ' .  'donation-btn';
									// $data_target = is_user_logged_in() ? 'data-target="charity-stack-modal"' : 'data-target="donation-modal"';
									$data_target =  'data-target="infaque-modal"';
									$default_donation_amount = !empty(intval(get_option("default_donation_amount"))) ? intval(get_option("default_donation_amount")) : 10;


								?>
									<a class="user-action-btn primary-btn <?= $button_classes ?>" <?= $data_target ?> data-infaque-campaign-id="<?= $infaque_campaign_id ?>" data-amount="<?= $default_donation_amount ?>" style="cursor: pointer;">
										<span><?php _e('Donate Now', 'bonyan') ?></span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
							<?php
									break;
							}




							?>


						</div>

						<!-- Search -->

						<div class="header-search hide-from-laptop-up as-block me-3">
							<form method="get" action="<?= home_url('/')  ?>" class="search-form">
								<div class="input-holder search-input-holder">
									<div class="search-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										  <path d="M21 20.9997L17.5096 17.5095M17.5096 17.5095C19.0471 15.9714 19.998 13.8468 19.998 11.5C19.998 6.80558 16.1929 3 11.499 3C6.80514 3 3 6.80558 3 11.5C3 16.1944 6.80514 20 11.499 20C13.8464 20 15.9715 19.0482 17.5096 17.5095Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</div>
									<?php print_lang_input_if_required_for_search(); ?>
									<input type="search" name="s" id="mobile-header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
								</div>
							</form>
						</div>

						<!-- Login Button -->
						<div class="ms-3 ms-lg-0 me-2 me-lg-3 login hide-from-laptop-up">
							<?php if (!is_user_logged_in()) :  ?>
								<button class="secondary-outlined-btn user-action-btn" data-target="login-modal">
									<svg id="Group_442" data-name="Group 442" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
										<path id="Path_304" data-name="Path 304" d="M0,0H26V26H0Z" fill="none" />
										<path id="Path_305" data-name="Path 305" d="M14.833,15.356V17.62a6.5,6.5,0,0,0-8.667,6.13H4a8.667,8.667,0,0,1,10.833-8.394ZM12.667,14a6.5,6.5,0,1,1,6.5-6.5A6.5,6.5,0,0,1,12.667,14Zm0-2.167A4.333,4.333,0,1,0,8.333,7.5,4.332,4.332,0,0,0,12.667,11.833Zm7.135,6.5-1.981-1.98,1.533-1.533,4.6,4.6-4.6,4.6L17.82,22.48,19.8,20.5H15.917V18.333Z" transform="translate(0.333 0.083)" fill="#5f469a" />
									</svg>
								</button>
							<?php else :
								$user_profile_photo = ($user_profile_photo = get_user_meta(get_current_user_id(), 'user_profile_photo', true)) ? $user_profile_photo : 'https://st3.depositphotos.com/9998432/13335/v/600/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg';
							?>
								<a href="<?php echo home_url('/dashboard'); ?>" class="secondary-outlined-btn logged-user-avatar">
									<img data-src="<?php echo $user_profile_photo ?>" alt="User Avatar" class="lazyload">
								</a>
							<?php endif; ?>
						</div>

						<!-- Burger Button For Tablate/iPad & Mobile -->
						<div class="toggle-mobile-menu hide-from-ipad-down as-flex">
							<div class="burger-btn justify-content-center align-items-center">
								<div class="dashes-container">
									<div class="dash top-dash"></div>
									<div class="dash middle-dash"></div>
									<div class="dash bottom-dash"></div>
								</div>
							</div>
						</div>

						<!-- Language Swicher -->
						<div class="lang-switcher hide-from-laptop-up as-block">
							<button class="secondary-outlined-btn">
								<svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
									<path id="Path_213" data-name="Path 213" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM9.71,19.667A17.9,17.9,0,0,1,8.027,13H4.062A8.008,8.008,0,0,0,9.71,19.667ZM10.03,13A15.915,15.915,0,0,0,12,19.752,15.9,15.9,0,0,0,13.97,13H10.03Zm9.908,0H15.973a17.9,17.9,0,0,1-1.683,6.667A8.008,8.008,0,0,0,19.938,13ZM4.062,11H8.027A17.9,17.9,0,0,1,9.71,4.333,8.008,8.008,0,0,0,4.062,11Zm5.969,0h3.938A15.9,15.9,0,0,0,12,4.248,15.9,15.9,0,0,0,10.03,11ZM14.29,4.333A17.9,17.9,0,0,1,15.973,11h3.965A8.008,8.008,0,0,0,14.29,4.333Z" transform="translate(-2 -2)" fill="#1877F2" />
								</svg>

								<svg xmlns="http://www.w3.org/2000/svg" width="8.486" height="5.657" viewBox="0 0 8.486 5.657">
									<path id="Path_215" data-name="Path 215" d="M12,15,7.757,10.757,9.172,9.343,12,12.172l2.828-2.829,1.415,1.414Z" transform="translate(-7.757 -9.343)" fill="#1877F2" />
								</svg>
							</button>

							<ul class="lang-switcher--dropdown">
								<div class="menu-languages-container">
									<ul id="language-menu" class="menu">
										<?php
										wp_nav_menu(
											array(
												'theme_location' => 'languages',
												'menu_id'        => 'languages-menu',
											)
										);
										?>
									</ul>
								</div>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-helper">
						<!-- Navbar -->
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'main_menu',
									'menu_id'        => 'primary-menu',
									'after'			 =>	'<i class="menu-arrow"></i>'
								)
							);
							?>
						</nav>

						<div class="mobile-nav-items hide-from-ipad-down as-block mt-auto">
							<!-- Search -->
							<div class="header-search hide-from-ipad-down as-block">
								<form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
									<div class="input-holder search-input-holder">
																		<div class="search-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									  <path d="M21 20.9997L17.5096 17.5095M17.5096 17.5095C19.0471 15.9714 19.998 13.8468 19.998 11.5C19.998 6.80558 16.1929 3 11.499 3C6.80514 3 3 6.80558 3 11.5C3 16.1944 6.80514 20 11.499 20C13.8464 20 15.9715 19.0482 17.5096 17.5095Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</div>
										<input type="search" name="s" id="header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
									</div>
								</form>
							</div>

							<div class="mobile-header-cta mt-2 hide-from-ipad-down as-flex align-items-center">
								<!-- Login Button -->
								<div class="me-2 me-lg-0 login">
									<?php if (!is_user_logged_in()) :  ?>
										<button class="secondary-outlined-btn user-action-btn" data-target="login-modal">
											<svg id="Group_442" data-name="Group 442" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
												<path id="Path_304" data-name="Path 304" d="M0,0H26V26H0Z" fill="none" />
												<path id="Path_305" data-name="Path 305" d="M14.833,15.356V17.62a6.5,6.5,0,0,0-8.667,6.13H4a8.667,8.667,0,0,1,10.833-8.394ZM12.667,14a6.5,6.5,0,1,1,6.5-6.5A6.5,6.5,0,0,1,12.667,14Zm0-2.167A4.333,4.333,0,1,0,8.333,7.5,4.332,4.332,0,0,0,12.667,11.833Zm7.135,6.5-1.981-1.98,1.533-1.533,4.6,4.6-4.6,4.6L17.82,22.48,19.8,20.5H15.917V18.333Z" transform="translate(0.333 0.083)" fill="#5f469a" />
											</svg>
											<span><?php _e('Log in', 'bonyan') ?></span>
										</button>
									<?php else :
										$user_profile_photo = ($user_profile_photo = get_user_meta(get_current_user_id(), 'user_profile_photo', true)) ? $user_profile_photo : 'https://st3.depositphotos.com/9998432/13335/v/600/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg';
									?>
										<a href="<?php echo home_url('/dashboard'); ?>" class="secondary-outlined-btn logged-user-avatar">
											<img data-src="<?php echo $user_profile_photo ?>" alt="User Avatar" class="lazyload">
										</a>
									<?php endif; ?>
								</div>

								<!-- Language Swicher -->
								<div class="lang-switcher">
									<button class="secondary-outlined-btn">
										<svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
											<path id="Path_213" data-name="Path 213" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM9.71,19.667A17.9,17.9,0,0,1,8.027,13H4.062A8.008,8.008,0,0,0,9.71,19.667ZM10.03,13A15.915,15.915,0,0,0,12,19.752,15.9,15.9,0,0,0,13.97,13H10.03Zm9.908,0H15.973a17.9,17.9,0,0,1-1.683,6.667A8.008,8.008,0,0,0,19.938,13ZM4.062,11H8.027A17.9,17.9,0,0,1,9.71,4.333,8.008,8.008,0,0,0,4.062,11Zm5.969,0h3.938A15.9,15.9,0,0,0,12,4.248,15.9,15.9,0,0,0,10.03,11ZM14.29,4.333A17.9,17.9,0,0,1,15.973,11h3.965A8.008,8.008,0,0,0,14.29,4.333Z" transform="translate(-2 -2)" fill="#1877F2" />
										</svg>

										<svg xmlns="http://www.w3.org/2000/svg" width="8.486" height="5.657" viewBox="0 0 8.486 5.657">
											<path id="Path_215" data-name="Path 215" d="M12,15,7.757,10.757,9.172,9.343,12,12.172l2.828-2.829,1.415,1.414Z" transform="translate(-7.757 -9.343)" fill="#1877F2" />
										</svg>
									</button>

									<ul class="lang-switcher--dropdown">
										<div class="menu-languages-container">
											<ul id="language-menu" class="menu">
												<?php
												wp_nav_menu(
													array(
														'theme_location' => 'languages',
														'menu_id'        => 'languages-menu',
													)
												);
												?>
											</ul>
										</div>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
				<script>
					window._lang = '<?= current_language() ?>';
				</script>
			</div>
		</header>