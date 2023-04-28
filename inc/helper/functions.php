<?php

//==================
//    Redirect
//==================
require __DIR__ . '/redirect.php';


//==================
//    Role Checker
//==================
require __DIR__ . '/role-checker.php';


//====================
//    Get Icon Url
//====================
require __DIR__ . '/get-icon-url.php';

//====================
//    Mobile Detection
//====================
require __DIR__ . '/mobile-detection.php';

//====================
//    Rank Math Faqs
//====================
require __DIR__ . '/rank-math-faqs.php';

//====================
//    Contact Form 7
//====================
require __DIR__ . '/contact-form-7.php';

//=========================
//    Give WP Custom Css
//=========================
require __DIR__ . '/givewp-custom-css.php';

//=========================
//    Login Page Design
//=========================
require __DIR__ . '/login-page-design.php';

//================================
//    EN To Arabic Date Converter
//================================
require __DIR__ . '/arabic-date.php';

//================================
//    Table of content
//================================
require __DIR__ . '/table-of-content.php';

//================================
//    Custom Pagination
//================================
require __DIR__ . '/custom-pagination.php';

//================================
//    Format Money
//================================
require __DIR__ . '/format-money.php';

//================================
//    Google Recaptcha Give Wp
//================================
require __DIR__ . '/add-recaptcha.php';


// Global 

/**
 * get_custom_post_types
 *
 * @param mixed $exclude
 * @return array custom_post_types
 */
function get_custom_post_types($exclude = [])
{
	//$default_post_types_array = ["post", "page", "attachment", "revision", "nav_menu_item", "custom_css", "customize_changeset", "oembed_cache", "user_request", "wp_block", "wp_template", "wp_template_part", "wp_global_styles", "wp_navigation", "vc4_templates", "vc_grid_item", "give_payment", "give_forms"];
	$post_types_array = get_post_types(['public' => true, '_builtin' => false], 'names', 'and');
	$custom_post_types = array();
	foreach ($post_types_array as $post_type) {
		if (in_array($post_type, $exclude)) continue;
		array_push($custom_post_types, $post_type);
	}
	return $custom_post_types;
}
/**
 * get_CPTs_with_name
 *
 * @param mixed $exclude
 * @return array custom_post_types
 */
function get_CPTs_with_name($exclude = [])
{
	$post_types = [];
	$CPTs = get_post_types(['public' => true, '_builtin' => false], 'names', 'and');

	$CPTs['post'] = 'post'; // Add Posts To The List
	//$CPTs['page'] = 'page'; // Add Posts To The List


	if (isset($exclude['exclude']) && is_array($exclude['exclude'])) {
		foreach ($exclude['exclude'] as $cpt) {
			unset($CPTs[$cpt]);
		}
	}

	sort($CPTs);

	foreach ($CPTs as $post_type) {
		$pt = get_post_type_object($post_type);
		$post_types += [$post_type => __($pt->labels->menu_name)];
	}

	return $post_types;
}



function add_CPTs_to_search($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}


	if ($query->is_search() || is_tag() && $query->is_main_query()) {
		$cpt_array = get_custom_post_types(['main_slider', 'give_forms']);
		array_push($cpt_array, "post", "page");
		$query->set(
			'post_type',
			$cpt_array
		);
	}
}

add_filter('pre_get_posts', 'add_CPTs_to_search');


// Wpml 
function is_wpml_rtl()
{
	return apply_filters('wpml_current_language', null) == "ar" ? true : false;
}

/**
 * Get Current Language
 *
 * @return String Current Language
 */
function current_language()
{
	return apply_filters('wpml_current_language', null);
}
