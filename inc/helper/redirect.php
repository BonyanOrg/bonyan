<?php


//allow redirection, even if the theme starts to send output to the browser
add_action('init', 'do_output_buffer');
function do_output_buffer()
{
	ob_start();
}

// Redirect user to custom login page when logout 
function redirect_to_custom_login_page()
{
	//$page = get_page_by_path('login', OBJECT);
	//if (isset($page)) {
	wp_redirect(home_url('/'));
	exit;
	//}
}
add_action("wp_logout", "redirect_to_custom_login_page");

// // Redirect User From wp-admin To custom login page
// function redirect_wpadmin()
// {
// 	global $pagenow;
// 	$page = get_page_by_path('login', OBJECT);
// 	if (isset($page)) {
// 		if ($pagenow == "wp-login.php" && $_GET['action'] != "logout") {
// 			wp_redirect(site_url() . '/login');
// 			exit;
// 		}
// 	}
// }
// add_action("init", "redirect_wpadmin");

// // Filter & Function to rename the WordPress login URL
// add_filter( 'login_url', 'my_login_page', 10, 3 );
// function my_login_page( $login_url, $redirect, $force_reauth ) {
//     $login_page = home_url( '/login' );   // The name of your new login file
//     $login_url = add_query_arg( 'redirect_to', $redirect, $login_page );
//     return $login_url;
// }








// get the referer url and save it to the session
function redirect_url()
{
	if (!is_user_logged_in()) {
		set_referer_url();
	} elseif (is_user_logged_in()) {
		setcookie("LinkFrom", "", time() - 3600, "/"); //Unset Cookie
	}
}
add_action('template_redirect', 'redirect_url');


function set_referer_url()
{
	$the_Url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	$requests = explode('/', $the_Url);
	$is_Login = false;
	$is_Script = false;
	$is_image = false;
	$is_Home = false;
	if ($the_Url == home_url('/')) $is_Home = true;
	foreach ($requests as $request) {
		if ($request == "login" || $request == "wp-login.php") { // if Login Page don't save at session
			$is_Login = true;
		}
		if (str_contains($request, '.min') || str_contains($request, '.js') || str_contains($request, '.css') || str_contains($request, '.map')) {
			$is_Script = true; // Script Or Style
		}
		if (str_contains($request, '.png') || str_contains($request, '.jpg')) {
			$is_image = true;
		}
	}
	if (!$is_Login && !$is_Script && !$is_Home && !$is_image) {
		setcookie("LinkFrom", $the_Url, time() + 3600, "/");
	}
}

/** end here */
