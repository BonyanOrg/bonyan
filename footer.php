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
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footer-1',
			'menu_id'        => 'footer-menu-1',
		)
	);
	wp_nav_menu(
		array(
			'theme_location' => 'footer-2',
			'menu_id'        => 'footer-menu-2',
		)
	);
	?>
	<h4>Footer</h4>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>