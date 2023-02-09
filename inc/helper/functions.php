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
//require __DIR__ . '/rank-math-faqs.php';

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


// Global 

/**
 * get_custom_post_types
 *
 * @return array custom_post_types
 */
function get_custom_post_types()
{
	$default_post_types_array = ["post", "page", "attachment", "revision", "nav_menu_item", "custom_css", "customize_changeset", "oembed_cache", "user_request", "wp_block", "wp_template", "wp_template_part", "wp_global_styles", "wp_navigation", "vc4_templates", "vc_grid_item", "give_payment", "give_forms"];
	$post_types_array = get_post_types();
	$custom_post_types = array();
	foreach ($post_types_array as $post_type) {
		if (in_array($post_type, $default_post_types_array)) continue;
		array_push($custom_post_types, $post_type);
	}
	return $custom_post_types;
}



function add_CPTs_to_search($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}


	if ($query->is_search() || is_tag() && $query->is_main_query()) {
		$cpt_array = get_custom_post_types();
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
