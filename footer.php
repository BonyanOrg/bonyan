<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bonyan
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-decor footer-left-decor">
		<img src="<?php echo get_template_directory_uri() . '/dist/imgs/footer-left-decor.svg' ?>" alt="footer decor">
	</div>

	<div class="footer-decor footer-right-decor">
		<img src="<?php echo get_template_directory_uri() . '/dist/imgs/footer-right-decor.svg' ?>" alt="footer decor">
	</div>
	<div class="container">
		<div class="footer-content">
			<!-- Column 1 -->
			<div class="logo-and-contact-info">
				<div class="logo">
					<img data-src="<?php echo wp_get_attachment_image_url(get_theme_mod('footer_logo_image_url'), 'full'); ?>"
						alt="Logo" class="lazyload">
				</div>

				<div class="contact-info hide-from-laptop-up as-flex">
					<div class="contact-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="14.001" height="14" viewBox="0 0 14.001 14">
							<path id="Path_235" data-name="Path 235"
								d="M17,13.438v2.75a.778.778,0,0,1-.723.776c-.34.023-.618.036-.832.036A12.444,12.444,0,0,1,3,4.556q0-.322.036-.832A.778.778,0,0,1,3.812,3h2.75a.389.389,0,0,1,.387.35c.018.179.034.321.05.429a10.812,10.812,0,0,0,.94,3.112.354.354,0,0,1-.114.441l-1.678,1.2a10.148,10.148,0,0,0,5.323,5.323l1.2-1.675a.359.359,0,0,1,.446-.116A10.812,10.812,0,0,0,16.224,13c.108.016.25.033.428.05a.389.389,0,0,1,.349.387Z"
								transform="translate(-3 -3)" fill="#fff" />
						</svg>

						<a class="footer-phone-number"
							href="tel:<?php echo get_option('contact_info_phone_number'); ?>"><?php echo get_option('contact_info_phone_number'); ?></a>
					</div>

					<div class="contact-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="17" height="16.5" viewBox="0 0 17 16.5">
							<path id="Path_237" data-name="Path 237"
								d="M6.667,15.073h8.287l1.427,1.115V7.829h.81a.807.807,0,0,1,.81.8V19.5l-3.606-2.817H7.476a.807.807,0,0,1-.81-.8Zm-2.06-1.61L1,16.28V3.8A.807.807,0,0,1,1.81,3H13.952a.807.807,0,0,1,.81.8v9.659Z"
								transform="translate(-1 -3)" fill="#fff" />
						</svg>

						<span class="footer-phone-number">
							<?php echo get_option('contact_info_text_phone_number'); ?>
						</span>
					</div>

					<div class="contact-item address">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="17.728" viewBox="0 0 14 17.728">
							<path id="Path_239" data-name="Path 239"
								d="M14.95,14.536,10,19.728,5.05,14.536a7.6,7.6,0,0,1,0-10.385,6.771,6.771,0,0,1,9.9,0,7.6,7.6,0,0,1,0,10.385ZM10,10.975A1.634,1.634,0,1,0,8.444,9.343,1.6,1.6,0,0,0,10,10.975Z"
								transform="translate(-3 -2)" fill="#fff" />
						</svg>

						<a href="<?php echo get_option('contact_info_address_url'); ?>"><?php echo get_option('contact_info_address'); ?></a>
					</div>
					<!-- <div class="contact-item currency-switcher">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="17.728" viewBox="0 0 14 17.728">
							<path id="Path_239" data-name="Path 239"
								d="M14.95,14.536,10,19.728,5.05,14.536a7.6,7.6,0,0,1,0-10.385,6.771,6.771,0,0,1,9.9,0,7.6,7.6,0,0,1,0,10.385ZM10,10.975A1.634,1.634,0,1,0,8.444,9.343,1.6,1.6,0,0,0,10,10.975Z"
								transform="translate(-3 -2)" fill="#fff" />
						</svg>

						<select name="currency-switcher" id="currency-switcher">
							<option value="USD">USD</option>
							<option value="EUR">EUR</option>
							<option value="KWD">KWD</option>
						</select>
						<p class="done-text" style="display: none;">Done</p>
						<script>
							function setCookie(name, value, days) {
								var expires = "";
								if (days) {
									var date = new Date();
									date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
									expires = "; expires=" + date.toUTCString();
								}
								document.cookie = name + "=" + value + expires + "; path=/";
							}

							// Function to get the value of a cookie by its name
							function getCookie(name) {
								var nameEQ = name + "=";
								var cookies = document.cookie.split(';');
								for (var i = 0; i < cookies.length; i++) {
									var cookie = cookies[i];
									while (cookie.charAt(0) == ' ')
										cookie = cookie.substring(1, cookie.length);
									if (cookie.indexOf(nameEQ) == 0)
										return cookie.substring(nameEQ.length, cookie.length);
								}
								return null;
							}
							var selectElement = document.getElementById("currency-switcher");
							var doneText = document.querySelector(".done-text");
							var existingCookie = getCookie("CustomCurrency");
							if (existingCookie) {
								selectElement.value = existingCookie;
							}
							console.log(existingCookie);
							selectElement.addEventListener("change", onSelectChange);
							function onSelectChange(event) {
								var selectedValue = event.target.value;
								var existingCookie = getCookie("CustomCurrency");
								//if (existingCookie) {
								setCookie("CustomCurrency", selectedValue, 7); // Set or update the cookie for 7 days,
								doneText.style.display = "block";
								setTimeout(function () {
									doneText.style.display = "none";

								}, 2000);
								// console.log("Cookie updated:", selectedValue);
								//} else {
								//setCookie("myCookie", "", -1); // Remove the cookie by setting an expiration date in the past
								//console.log("Cookie removed.");
								//}
							}
						</script>
					</div> -->
				</div>
			</div>

			<!-- Column 2 -->
			<div class="footer-links">
				<span>
					<?php _e('Appeals', 'bonyan') ?>
				</span>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-1',
						'menu_id' => 'footer-menu-1',
					)
				);
				?>
			</div>

			<!-- Column 3 -->
			<div class="footer-links">
				<span>
					<?php _e('Useful Links', 'bonyan') ?>
				</span>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-2',
						'menu_id' => 'footer-menu-2',
					)
				);
				?>
			</div>

			<!-- Column 4 -->
			<div class="newsletter">
				<span>
					<?php _e('Join our newsletter', 'bonyan') ?>
				</span>
				<?php echo do_shortcode(get_option('mautic_form'), true); ?>
			</div>


			<!-- Contact for mobile (Duplicated) -->
			<div class="contact-info hide-from-ipad-down as-flex">
				<div class="contact-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.001" height="14" viewBox="0 0 14.001 14">
						<path id="Path_235" data-name="Path 235"
							d="M17,13.438v2.75a.778.778,0,0,1-.723.776c-.34.023-.618.036-.832.036A12.444,12.444,0,0,1,3,4.556q0-.322.036-.832A.778.778,0,0,1,3.812,3h2.75a.389.389,0,0,1,.387.35c.018.179.034.321.05.429a10.812,10.812,0,0,0,.94,3.112.354.354,0,0,1-.114.441l-1.678,1.2a10.148,10.148,0,0,0,5.323,5.323l1.2-1.675a.359.359,0,0,1,.446-.116A10.812,10.812,0,0,0,16.224,13c.108.016.25.033.428.05a.389.389,0,0,1,.349.387Z"
							transform="translate(-3 -3)" fill="#fff" />
					</svg>

					<a class="footer-phone-number"
						href="tel:<?php echo get_option('contact_info_phone_number'); ?>"><?php echo get_option('contact_info_phone_number'); ?></a>
				</div>

				<div class="contact-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="17" height="16.5" viewBox="0 0 17 16.5">
						<path id="Path_237" data-name="Path 237"
							d="M6.667,15.073h8.287l1.427,1.115V7.829h.81a.807.807,0,0,1,.81.8V19.5l-3.606-2.817H7.476a.807.807,0,0,1-.81-.8Zm-2.06-1.61L1,16.28V3.8A.807.807,0,0,1,1.81,3H13.952a.807.807,0,0,1,.81.8v9.659Z"
							transform="translate(-1 -3)" fill="#fff" />
					</svg>

					<span class="footer-phone-number">
						<?php echo get_option('contact_info_text_phone_number'); ?>
					</span>
				</div>

				<div class="contact-item address">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="17.728" viewBox="0 0 14 17.728">
						<path id="Path_239" data-name="Path 239"
							d="M14.95,14.536,10,19.728,5.05,14.536a7.6,7.6,0,0,1,0-10.385,6.771,6.771,0,0,1,9.9,0,7.6,7.6,0,0,1,0,10.385ZM10,10.975A1.634,1.634,0,1,0,8.444,9.343,1.6,1.6,0,0,0,10,10.975Z"
							transform="translate(-3 -2)" fill="#fff" />
					</svg>

					<a href="<?php echo get_option('contact_info_address_url'); ?>"><?php echo get_option('contact_info_address'); ?></a>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-helper">
				<div class="socialmedia">
					<a href="<?php echo get_option("facebook_url") ?>"><i class="fa-brands fa-facebook"></i></a>
					<a href="<?php echo get_option("twitter_url") ?>"><i class="fa-brands fa-twitter"></i></a>
					<a href="<?php echo get_option("youtube_url") ?>"><i class="fa-brands fa-youtube"></i></a>
				</div>
				<?php if (is_wpml_rtl()): ?>
					<div class="copyrights">
						<span> © جميع الحقوق محفوظة </span>
						&nbsp;
					</div>
				<?php else: ?>
					<div class="copyrights">
						<span>© 2023 All Rights Reserved</span>
					</div>
				<?php endif; ?>


			</div>
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->


<!-- Start GiveWP Modal -->

<?php
if (isset($_COOKIE["DonCampaign"]) && isset($_GET["giveDonationAction"]) && is_singular('campaign') != true) {
	?>
	<div id="givewp-modal-confirmation" class="givewp-modal-confirmation user-action-modal">
		<div id="give_form_container">
			<?php echo do_shortcode('[give_form id="' . $_COOKIE["DonCampaign"] . '"]');
			?>
		</div>
	</div>
<?php } ?>

<!-- End GiveWP Modal -->

<!-- Start Zoho Desk -->
<div class="zoho-desk-support-container">
	<div class="zoho-desk-support-btn">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			<path
				d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
		</svg>

		<svg class="d-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
			<path
				d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
		</svg>
	</div>

	<div class="zoho-desk-support-form d-none">
		<?php echo do_shortcode(get_option('zoho_desk'), true) ?>
	</div>
</div>
<!-- End Zoho Desk -->
<?php wp_footer(); ?>

</body>

</html>