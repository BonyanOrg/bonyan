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
//require __DIR__ . '/add-recaptcha.php';

//================================
//    Select2 For WpBakery
//================================
require __DIR__ . '/wpbakery-select2.php';

//================================
//  One Signal Push Notification
//================================
require __DIR__ . '/onesignal.php';

//================================
//  Users Tracking
//================================
require __DIR__ . '/user-tracking.php';

//================================
//  Redirect TO Post By Slug
//================================
require __DIR__ . '/redirect_post_by_slug.php';

//================================
//  Give Qurban Details
//================================
require __DIR__ . '/give-qurban-details.php';

//===========================================
//  RankMath CPT Archive Title & Description
//===========================================
require __DIR__ . '/rank-cpt-archive.php';

//===========================================
//  Replace Paypal Billing Information
//===========================================
require __DIR__ . '/paypal-billing-replace.php';


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
		if (in_array($post_type, $exclude))
			continue;
		array_push($custom_post_types, $post_type);
	}
	return $custom_post_types;
}

/**
 * get_CPTs_with_name
 *
 * @param mixed $args exclude[] array, ex ['exclude' => ['main_slider', 'give_forms']]
 * @param bool $for_wpbakery_widgets
 * @return array custom_post_types
 */
function get_CPTs_with_name($args = [], $for_wpbakery_widgets = false)
{
	$post_types = [];
	$CPTs = get_post_types(['public' => true, '_builtin' => false], 'names', 'and');

	$CPTs['post'] = 'post'; // Add Posts To The List
	//$CPTs['page'] = 'page'; // Add Posts To The List


	if (isset($args['exclude']) && is_array($args['exclude'])) {
		foreach ($args['exclude'] as $cpt) {
			unset($CPTs[$cpt]);
		}
	}

	sort($CPTs);

	foreach ($CPTs as $post_type) {
		$pt = get_post_type_object($post_type);
		if ($for_wpbakery_widgets == true) {
			$post_types[$pt->labels->menu_name] = $post_type;
		} else {
			$post_types += [$post_type => __($pt->labels->menu_name)];
		}
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


function custom_admin_cpts_menu()
{
	global $wp_admin_bar;

	// Add the parent menu item
	$wp_admin_bar->add_node(
		array(
			'id' => 'custom-cpts-menu',
			'title' => 'Custom Post Types',
		)
	);
	$post_types = get_CPTs_with_name();
	foreach ($post_types as $key => $post_type) {
		// Add the child menu items as sub-menu of the parent
		$wp_admin_bar->add_node(
			array(
				'id' => $key,
				'title' => $post_type,
				'href' => admin_url('edit.php?post_type=' . $key),
				'parent' => 'custom-cpts-menu',
			)
		);
		$wp_admin_bar->add_node(
			array(
				'id' => $key . 'all',
				'title' => 'All ' . $post_type,
				'href' => admin_url('edit.php?post_type=' . $key),
				'parent' => $key,
			)
		);
		$wp_admin_bar->add_node(
			array(
				'id' => $key . 'add-new',
				'title' => 'Add New ' . $post_type,
				'href' => admin_url('post-new.php?post_type=' . $key),
				'parent' => $key,
			)
		);
		$taxonomies = get_object_taxonomies($key, 'objects');
		foreach ($taxonomies as $taxonomy) {
			$wp_admin_bar->add_node(
				array(
					'id' => $taxonomy->name . 'all' . $post_type,
					'title' => $taxonomy->label,
					'href' => admin_url('edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $key),
					'parent' => $key,
				)
			);
		}
	}

}
add_action('admin_bar_menu', 'custom_admin_cpts_menu', 999);




function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[random_int(0, $charactersLength - 1)];
	}
	return $randomString;
}

add_action('nsl_facebook_register_new_user', 'uwp_RoleFunction', 11);
add_action('nsl_google_register_new_user', 'uwp_RoleFunction', 11);
function uwp_RoleFunction($user_id)
{
	$user = new WP_User($user_id);
	$user->set_role('give_donor');
}



// Disable XML-RPC in WordPress
add_filter('xmlrpc_enabled', '__return_false');