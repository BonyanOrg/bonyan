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
					<img data-src="<?php echo wp_get_attachment_image_url(get_theme_mod('footer_logo_image_url'), 'full'); ?>" alt="Logo" class="lazyload">
				</div>

				<div class="contact-info hide-from-laptop-up as-flex">
					<div class="contact-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="14.001" height="14" viewBox="0 0 14.001 14">
							<path id="Path_235" data-name="Path 235" d="M17,13.438v2.75a.778.778,0,0,1-.723.776c-.34.023-.618.036-.832.036A12.444,12.444,0,0,1,3,4.556q0-.322.036-.832A.778.778,0,0,1,3.812,3h2.75a.389.389,0,0,1,.387.35c.018.179.034.321.05.429a10.812,10.812,0,0,0,.94,3.112.354.354,0,0,1-.114.441l-1.678,1.2a10.148,10.148,0,0,0,5.323,5.323l1.2-1.675a.359.359,0,0,1,.446-.116A10.812,10.812,0,0,0,16.224,13c.108.016.25.033.428.05a.389.389,0,0,1,.349.387Z" transform="translate(-3 -3)" fill="#fff" />
						</svg>

						<a class="footer-phone-number" href="tel:<?php echo get_option('contact_info_phone_number'); ?>"><?php echo get_option('contact_info_phone_number'); ?></a>
					</div>

					<div class="contact-item">
						<svg xmlns="http://www.w3.org/2000/svg" width="17" height="16.5" viewBox="0 0 17 16.5">
							<path id="Path_237" data-name="Path 237" d="M6.667,15.073h8.287l1.427,1.115V7.829h.81a.807.807,0,0,1,.81.8V19.5l-3.606-2.817H7.476a.807.807,0,0,1-.81-.8Zm-2.06-1.61L1,16.28V3.8A.807.807,0,0,1,1.81,3H13.952a.807.807,0,0,1,.81.8v9.659Z" transform="translate(-1 -3)" fill="#fff" />
						</svg>

						<span class="footer-phone-number"><?php echo get_option('contact_info_text_phone_number'); ?></span>
					</div>

					<div class="contact-item address">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="17.728" viewBox="0 0 14 17.728">
							<path id="Path_239" data-name="Path 239" d="M14.95,14.536,10,19.728,5.05,14.536a7.6,7.6,0,0,1,0-10.385,6.771,6.771,0,0,1,9.9,0,7.6,7.6,0,0,1,0,10.385ZM10,10.975A1.634,1.634,0,1,0,8.444,9.343,1.6,1.6,0,0,0,10,10.975Z" transform="translate(-3 -2)" fill="#fff" />
						</svg>

						<a href="<?php echo get_option('contact_info_address_url'); ?>"><?php echo get_option('contact_info_address'); ?></a>
					</div>
				</div>
			</div>

			<!-- Column 2 -->
			<div class="footer-links">
				<h2><?php _e('Appeals', 'bonyan') ?></h2>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-1',
						'menu_id'        => 'footer-menu-1',
					)
				);
				?>
			</div>

			<!-- Column 3 -->
			<div class="footer-links">
				<h2><?php _e('Useful Links', 'bonyan') ?></h2>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-2',
						'menu_id'        => 'footer-menu-2',
					)
				);
				?>
			</div>

			<!-- Column 4 -->
			<div class="newsletter">
				<h2><?php _e('Join our newsletter', 'bonyan') ?></h2>

				<form>
					<div class="input-holder">
						<input type="text" name="name" placeholder="Your Name" class="mb-3">
					</div>

					<div class="input-holder">
						<input type="email" name="email" placeholder="Your Email" class="mb-4">
					</div>

					<button>Subscribe</button>
				</form>
			</div>


			<!-- Contact for mobile (Duplicated) -->
			<div class="contact-info hide-from-ipad-down as-flex">
				<div class="contact-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="14.001" height="14" viewBox="0 0 14.001 14">
						<path id="Path_235" data-name="Path 235" d="M17,13.438v2.75a.778.778,0,0,1-.723.776c-.34.023-.618.036-.832.036A12.444,12.444,0,0,1,3,4.556q0-.322.036-.832A.778.778,0,0,1,3.812,3h2.75a.389.389,0,0,1,.387.35c.018.179.034.321.05.429a10.812,10.812,0,0,0,.94,3.112.354.354,0,0,1-.114.441l-1.678,1.2a10.148,10.148,0,0,0,5.323,5.323l1.2-1.675a.359.359,0,0,1,.446-.116A10.812,10.812,0,0,0,16.224,13c.108.016.25.033.428.05a.389.389,0,0,1,.349.387Z" transform="translate(-3 -3)" fill="#fff" />
					</svg>

					<a class="footer-phone-number" href="tel:<?php echo get_option('contact_info_phone_number'); ?>"><?php echo get_option('contact_info_phone_number'); ?></a>
				</div>

				<div class="contact-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="17" height="16.5" viewBox="0 0 17 16.5">
						<path id="Path_237" data-name="Path 237" d="M6.667,15.073h8.287l1.427,1.115V7.829h.81a.807.807,0,0,1,.81.8V19.5l-3.606-2.817H7.476a.807.807,0,0,1-.81-.8Zm-2.06-1.61L1,16.28V3.8A.807.807,0,0,1,1.81,3H13.952a.807.807,0,0,1,.81.8v9.659Z" transform="translate(-1 -3)" fill="#fff" />
					</svg>

					<span class="footer-phone-number"><?php echo get_option('contact_info_text_phone_number'); ?></span>
				</div>

				<div class="contact-item address">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="17.728" viewBox="0 0 14 17.728">
						<path id="Path_239" data-name="Path 239" d="M14.95,14.536,10,19.728,5.05,14.536a7.6,7.6,0,0,1,0-10.385,6.771,6.771,0,0,1,9.9,0,7.6,7.6,0,0,1,0,10.385ZM10,10.975A1.634,1.634,0,1,0,8.444,9.343,1.6,1.6,0,0,0,10,10.975Z" transform="translate(-3 -2)" fill="#fff" />
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
				<?php if (is_wpml_rtl()) : ?>
					<div class="copyrights">
						<span>  ©  جميع الحقوق محفوظة </span>
						&nbsp;
						<a href="https://2p.com.tr/" target="_blank">
							 تطوير فريق 
							<svg id="_2p" data-name="2p" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29.842 19.868">
								<path id="Path_46" data-name="Path 46" d="M50.624,5.347v0A5.939,5.939,0,0,0,44.86.5H37.044l1.7,3.93h6.069a1.965,1.965,0,1,1,0,3.93H42.895A5.925,5.925,0,0,0,37,14.255V17.53h0v2.62h3.93V14.255a1.936,1.936,0,0,1,1.354-1.878,2.192,2.192,0,0,1,.524-.087H44.86a5.88,5.88,0,0,0,5.808-5.895A4.219,4.219,0,0,0,50.624,5.347ZM37.218,16.613Zm-.131.611v.087C37.044,17.311,37.044,17.268,37.087,17.224Zm0-.175Z" transform="translate(-20.844 -0.282)" fill="#fff"></path>
								<path id="Path_47" data-name="Path 47" d="M11.877,15.894h-7.9V13.929a1.531,1.531,0,0,1,.306-1,1.974,1.974,0,0,1,1.092-.873,2.192,2.192,0,0,1,.524-.087H7.9A5.964,5.964,0,0,0,13.8,6.026a8.479,8.479,0,0,0-.087-1.048v0A5.938,5.938,0,0,0,7.947,0H0L1.7,3.974H7.9a1.965,1.965,0,1,1,0,3.93H5.982A6.075,6.075,0,0,0,0,13.886V17.2H0v2.664H13.886V15.894H11.877Zm-11.7.393ZM.044,16.9v0Zm.044-.175Z" fill="#fff"></path>
								<rect id="Rectangle_124" data-name="Rectangle 124" width="3.93" height="19.606" transform="translate(16.2 0.218)" fill="#fff"></rect>
								<path id="Path_48" data-name="Path 48" d="M22.6,13.6" transform="translate(-12.732 -7.661)" fill="#fff"></path>
							</svg>
						</a>
					</div>
				<?php else : ?>
					<div class="copyrights">
						<span>© 2023 All Rights Reserved - </span>
						<a href="https://2p.com.tr/" target="_blank">
							Made by
							<svg id="_2p" data-name="2p" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29.842 19.868">
								<path id="Path_46" data-name="Path 46" d="M50.624,5.347v0A5.939,5.939,0,0,0,44.86.5H37.044l1.7,3.93h6.069a1.965,1.965,0,1,1,0,3.93H42.895A5.925,5.925,0,0,0,37,14.255V17.53h0v2.62h3.93V14.255a1.936,1.936,0,0,1,1.354-1.878,2.192,2.192,0,0,1,.524-.087H44.86a5.88,5.88,0,0,0,5.808-5.895A4.219,4.219,0,0,0,50.624,5.347ZM37.218,16.613Zm-.131.611v.087C37.044,17.311,37.044,17.268,37.087,17.224Zm0-.175Z" transform="translate(-20.844 -0.282)" fill="#fff"></path>
								<path id="Path_47" data-name="Path 47" d="M11.877,15.894h-7.9V13.929a1.531,1.531,0,0,1,.306-1,1.974,1.974,0,0,1,1.092-.873,2.192,2.192,0,0,1,.524-.087H7.9A5.964,5.964,0,0,0,13.8,6.026a8.479,8.479,0,0,0-.087-1.048v0A5.938,5.938,0,0,0,7.947,0H0L1.7,3.974H7.9a1.965,1.965,0,1,1,0,3.93H5.982A6.075,6.075,0,0,0,0,13.886V17.2H0v2.664H13.886V15.894H11.877Zm-11.7.393ZM.044,16.9v0Zm.044-.175Z" fill="#fff"></path>
								<rect id="Rectangle_124" data-name="Rectangle 124" width="3.93" height="19.606" transform="translate(16.2 0.218)" fill="#fff"></rect>
								<path id="Path_48" data-name="Path 48" d="M22.6,13.6" transform="translate(-12.732 -7.661)" fill="#fff"></path>
							</svg>
							Team
						</a>
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
<?php wp_footer(); ?>

</body>

</html>