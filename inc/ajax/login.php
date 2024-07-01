<?php

///////////////////////////////
/* Custom Login  */
///////////////////////////////
add_action('wp_ajax_custom_login', 'custom_login');
add_action('wp_ajax_nopriv_custom_login', 'custom_login');
function custom_login()
{

	if ($_POST) {
		// Check for nonce security      
		if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
			die('Busted!');
		}

		global $wpdb;
		$user_email = isset($_POST['user_email']) ? sanitize_text_field($_POST['user_email']) : '';
		$user_password = isset($_POST['user_password']) ? sanitize_text_field($_POST['user_password']) : '';
		$google_recaptcha_token = isset($_POST['Gtoken']) ? $_POST['Gtoken'] : '';
		if (empty($user_email) || empty($user_password) || empty($google_recaptcha_token)) wp_die();
		$is_valid_token = verifyRecaptcha($google_recaptcha_token);
		if(!$is_valid_token){
			wp_send_json(['error_message' => 'unauthorized'], 400);
			wp_die();
		}
		$verify_user = login_to_website($user_email, $user_password);
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
function verifyRecaptcha($token)
{
	// reCAPTCHA secret key
	$secretKey = get_option('general_recaptcha_secret_key', '');
	if (empty($secretKey)) {
		return false;
	}

	// Send a POST request to Google's reCAPTCHA verification endpoint
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = [
		'secret' => $secretKey,
		'response' => $token,
	];

	$options = [
		'http' => [
			'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query($data),
		],
	];

	$context = stream_context_create($options);
	$response = file_get_contents($url, false, $context);

	if ($response === false) {
		// Error handling (e.g., unable to reach the reCAPTCHA service)
		return false;
	}

	$responseData = json_decode($response);

	if ($responseData->success) {
		// reCAPTCHA verification successful
		return true;
	} else {
		// reCAPTCHA verification failed
		return false;
	}
}
