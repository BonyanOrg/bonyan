<?php

/**
 * bonyan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bonyan
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bonyan_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on bonyan, use a find and replace
		* to change 'bonyan' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('bonyan', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main_menu' => esc_html__('Primary', 'bonyan'),
		)
	);
	register_nav_menus(
		array(
			'footer-1' => esc_html__('Footer-1', 'bonyan'),
		)
	);
	register_nav_menus(
		array(
			'footer-2' => esc_html__('Footer-2', 'bonyan'),
		)
	);
	register_nav_menus(
		array(
			'languages' => esc_html__('Languages', 'bonyan'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bonyan_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'bonyan_setup');




add_action('wp_footer', 'wpdd_load_scripts');
function wpdd_load_scripts()
{
	wp_print_script_tag(
		array(
			'id' => 'lazysize',
			'src' => esc_url('https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js'),
			'async' => true
		)
	);
}


/**
 * Enqueue Assets
 */
require get_template_directory() . '/inc/enqueue-assets.php';


/**
 * Register Custom Post Types
 */
require __DIR__ . '/inc/CPT/functions.php';

/**
 * Meta Boxes
 */
require __DIR__ . '/inc/meta-boxes/functions.php';



/**
 * Register Settings Page In Admin Dashboard 
 */
//require __DIR__ . '/inc/settings/functions.php';


//require __DIR__ . '/inc/givewp/givewp-init.php';



// Add Customizer 
//require __DIR__ . '/customizer-repeater/functions.php';
require __DIR__ . '/inc/customizer/customizer.php';


// Ajax Requests
require __DIR__ . '/inc/ajax/functions.php';



/**
 * Load Visual Composer widgets
 * if wp bakery plugin is installed.
 */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	// load vc map file [Back-end dashboard]
	require_once __DIR__ . '/inc/wpbakery/vcmaps.php';

	// load short codes field [Front-end]
	require_once __DIR__ . '/inc/wpbakery/shortcodes.php';
}

/**
 * Helper Functions
 */
require_once __DIR__ . '/inc/helper/functions.php';

/**
 * API Functions
 */
require_once __DIR__ . '/inc/api/functions.php';

/**
 * Settings IN THE Dashboard
 */
require __DIR__ . '/inc/settings/functions.php';


$roles = ['give_donor','subscriber'];
if (check_user_role($roles)) {
	add_filter('show_admin_bar', '__return_false');
}