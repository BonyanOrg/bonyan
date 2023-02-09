<?php

///////////////////////////////
/* Custom Login  */
///////////////////////////////
add_action('wp_ajax_custom_login', 'custom_login');
add_action('wp_ajax_nopriv_custom_login', 'custom_login');
function custom_login()
{

	if ($_POST) {

		global $wpdb;
		$user_name = isset($_POST['user_name']) ? sanitize_text_field($_POST['user_name']) : '';
		$user_password = isset($_POST['user_password']) ? sanitize_text_field($_POST['user_password']) : '';
		if (empty($user_name) || empty($user_password)) wp_die();
		$verify_user = login_to_website($user_name, $user_password);
		if (!is_wp_error($verify_user)) {

			do_action('wp_login', $verify_user->user_login, $verify_user);
			wp_set_current_user($verify_user->ID);
			wp_set_auth_cookie($verify_user->ID);
			//wp_safe_redirect(home_url());
			// ob_clean();

			if (isset($_COOKIE["LinkFrom"])) {
				wp_send_json(['return_url' => $_COOKIE["LinkFrom"]], 200);
				wp_die();
			} else {
				wp_send_json(['return_url' => home_url()], 200);
				wp_die();
			}
		} else {
			wp_send_json(['error_message' => $verify_user->get_error_message()], 400);
			wp_die();
		}
	}
}
function login_to_website($user_name, $user_password)
{
	$login_array = array();
	$login_array['user_login'] = $user_name;
	$login_array['user_password'] = $user_password;
	$verify_user = wp_signon($login_array, is_ssl());
	return $verify_user;
}
