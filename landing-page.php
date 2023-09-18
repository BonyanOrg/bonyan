<?php

/* Template Name: Landing-page */


?>
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

	<!-- End GiveWP Modal -->

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
					</div>

				</div>
			</div>
		</header>

<div class="entry-content inner-content container">
    <?php
    the_content();
    ?>
</div>

<?php
get_footer();
