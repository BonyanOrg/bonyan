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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">

			<div class="top-header">
				<div class="container">
					<div class="top-header-helper">

						<div class="logo header-logo me-auto">
							<a href="">
								<?php the_custom_logo(); ?>
							</a>
						</div>

						<!-- Donate button -->
						<div class="donation-button-holder from-laptop-up as-block mx-3">
							<a href="#" class="primary-btn donation-btn">
								<span>Donate Now</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
									<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
								</svg>
							</a>
						</div>

						<!-- Search -->
						<div class="header-search from-laptop-up as-block me-3">
							<form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
								<div class="input-holder search-input-holder">
									<div class="search-icon">
										<svg id="Group_262" data-name="Group 262" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
											<path id="Path_153" data-name="Path 153" d="M0,0H24V24H0Z" fill="none" />
											<path id="Path_154" data-name="Path 154" d="M18.031,16.617,22.314,20.9,20.9,22.314l-4.282-4.283a9,9,0,1,1,1.414-1.414Zm-2.006-.742a7,7,0,1,0-.15.15l.15-.15Z" fill="#6d54a7" />
										</svg>
									</div>
									<input type="search" name="s" id="header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
								</div>
							</form>
						</div>

						<!-- Login Button -->
						<div class="ms-3 ms-lg-0 me-2 me-lg-3 login">
							<button class="secondary-outlined-btn login-btn">
								<svg id="Group_442" data-name="Group 442" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
									<path id="Path_304" data-name="Path 304" d="M0,0H26V26H0Z" fill="none" />
									<path id="Path_305" data-name="Path 305" d="M14.833,15.356V17.62a6.5,6.5,0,0,0-8.667,6.13H4a8.667,8.667,0,0,1,10.833-8.394ZM12.667,14a6.5,6.5,0,1,1,6.5-6.5A6.5,6.5,0,0,1,12.667,14Zm0-2.167A4.333,4.333,0,1,0,8.333,7.5,4.332,4.332,0,0,0,12.667,11.833Zm7.135,6.5-1.981-1.98,1.533-1.533,4.6,4.6-4.6,4.6L17.82,22.48,19.8,20.5H15.917V18.333Z" transform="translate(0.333 0.083)" fill="#5f469a" />
								</svg>
							</button>
						</div>

						<!-- Burger Button For Tablate/iPad & Mobile -->
						<div class="toggle-mobile-menu from-ipad-down as-flex">
							<div class="burger-btn justify-content-center align-items-center">
								<div class="dashes-container">
									<div class="dash top-dash"></div>
									<div class="dash middle-dash"></div>
									<div class="dash bottom-dash"></div>
								</div>
							</div>
						</div>

						<!-- Language Swicher -->
						<div class="lang-switcher from-laptop-up as-block">
							<button class="secondary-outlined-btn">
								<span class="me-2 current-lang">En</span>

								<svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
									<path id="Path_213" data-name="Path 213" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM9.71,19.667A17.9,17.9,0,0,1,8.027,13H4.062A8.008,8.008,0,0,0,9.71,19.667ZM10.03,13A15.915,15.915,0,0,0,12,19.752,15.9,15.9,0,0,0,13.97,13H10.03Zm9.908,0H15.973a17.9,17.9,0,0,1-1.683,6.667A8.008,8.008,0,0,0,19.938,13ZM4.062,11H8.027A17.9,17.9,0,0,1,9.71,4.333,8.008,8.008,0,0,0,4.062,11Zm5.969,0h3.938A15.9,15.9,0,0,0,12,4.248,15.9,15.9,0,0,0,10.03,11ZM14.29,4.333A17.9,17.9,0,0,1,15.973,11h3.965A8.008,8.008,0,0,0,14.29,4.333Z" transform="translate(-2 -2)" fill="#5b4795" />
								</svg>

								<svg xmlns="http://www.w3.org/2000/svg" width="8.486" height="5.657" viewBox="0 0 8.486 5.657">
									<path id="Path_215" data-name="Path 215" d="M12,15,7.757,10.757,9.172,9.343,12,12.172l2.828-2.829,1.415,1.414Z" transform="translate(-7.757 -9.343)" fill="#5b4795" />
								</svg>
							</button>

							<ul class="lang-switcher--dropdown">
								<div class="menu-languages-container">
									<ul id="language-menu" class="menu">
										<li id="menu-item-wpml-ls-43-en" class="menu-item wpml-ls-slot-43 wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-43-en"><a title="English" href="https://bonyan-sy.org/beta/"><span class="wpml-ls-native" lang="en">Arabic</span></a><i class="menu-arrow"></i></li>
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

						<div class="mobile-nav-items from-ipad-down as-block mt-auto">
							<!-- Search -->
							<div class="header-search from-ipad-down as-block">
								<form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
									<div class="input-holder search-input-holder">
										<div class="search-icon">
											<svg id="Group_262" data-name="Group 262" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path id="Path_153" data-name="Path 153" d="M0,0H24V24H0Z" fill="none" />
												<path id="Path_154" data-name="Path 154" d="M18.031,16.617,22.314,20.9,20.9,22.314l-4.282-4.283a9,9,0,1,1,1.414-1.414Zm-2.006-.742a7,7,0,1,0-.15.15l.15-.15Z" fill="#6d54a7" />
											</svg>
										</div>
										<input type="search" name="s" id="header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
									</div>
								</form>
							</div>

							<div class="mobile-header-cta from-ipad-down as-flex align-items-center">
								<!-- Donate button -->
								<div class="donation-button-holder me-3 my-2">
									<a href="#" class="primary-btn donation-btn">
										<span>Donate Now</span>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
											<path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
										</svg>
									</a>
								</div>

								<!-- Language Swicher -->
								<div class="lang-switcher">
									<button class="secondary-outlined-btn">
										<span class="me-2 current-lang">En</span>

										<svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
											<path id="Path_213" data-name="Path 213" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22ZM9.71,19.667A17.9,17.9,0,0,1,8.027,13H4.062A8.008,8.008,0,0,0,9.71,19.667ZM10.03,13A15.915,15.915,0,0,0,12,19.752,15.9,15.9,0,0,0,13.97,13H10.03Zm9.908,0H15.973a17.9,17.9,0,0,1-1.683,6.667A8.008,8.008,0,0,0,19.938,13ZM4.062,11H8.027A17.9,17.9,0,0,1,9.71,4.333,8.008,8.008,0,0,0,4.062,11Zm5.969,0h3.938A15.9,15.9,0,0,0,12,4.248,15.9,15.9,0,0,0,10.03,11ZM14.29,4.333A17.9,17.9,0,0,1,15.973,11h3.965A8.008,8.008,0,0,0,14.29,4.333Z" transform="translate(-2 -2)" fill="#5b4795" />
										</svg>

										<svg xmlns="http://www.w3.org/2000/svg" width="8.486" height="5.657" viewBox="0 0 8.486 5.657">
											<path id="Path_215" data-name="Path 215" d="M12,15,7.757,10.757,9.172,9.343,12,12.172l2.828-2.829,1.415,1.414Z" transform="translate(-7.757 -9.343)" fill="#5b4795" />
										</svg>
									</button>

									<ul class="lang-switcher--dropdown">
										<div class="menu-languages-container">
											<ul id="language-menu" class="menu">
												<li id="menu-item-wpml-ls-43-en" class="menu-item wpml-ls-slot-43 wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-43-en"><a title="English" href="https://bonyan-sy.org/beta/"><span class="wpml-ls-native" lang="en">Arabic</span></a><i class="menu-arrow"></i></li>
											</ul>
										</div>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</header>