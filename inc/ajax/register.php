<?php

///////////////////////////////
/* Custom Register  */
///////////////////////////////
add_action('wp_ajax_custom_registration', 'custom_registration');
add_action('wp_ajax_nopriv_custom_registration', 'custom_registration');
function custom_registration()
{

	if ($_POST) {
		// Check for nonce security      
		if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
			die('Busted!');
		}

		global $wpdb;
		$registration_user_first_name = isset($_POST['registration_user_first_name']) ? sanitize_text_field($_POST['registration_user_first_name']) : '';
		$registration_user_last_name = isset($_POST['registration_user_last_name']) ? sanitize_text_field($_POST['registration_user_last_name']) : '';
		$registration_user_email = isset($_POST['registration_user_email']) ? sanitize_text_field($_POST['registration_user_email']) : '';
		$registration_user_gender = isset($_POST['registration_user_gender']) ? sanitize_text_field($_POST['registration_user_gender']) : '';
		$registration_user_age = isset($_POST['registration_user_age']) ? sanitize_text_field($_POST['registration_user_age']) : '';
		$registration_user_birth_date = isset($_POST['registration_user_birth_date']) ? sanitize_text_field($_POST['registration_user_birth_date']) : '';
		$registration_user_password = isset($_POST['registration_user_password']) ? sanitize_text_field($_POST['registration_user_password']) : '';
		$registration_user_password_confirm = isset($_POST['registration_user_password_confirm']) ? sanitize_text_field($_POST['registration_user_password_confirm']) : '';

		if (empty($registration_user_first_name) || empty($registration_user_last_name) || empty($registration_user_email) || empty($registration_user_password) || empty($registration_user_password_confirm)) wp_die();
		$registration_user_name = $registration_user_first_name . '_' . $registration_user_last_name;

		if (strpos($registration_user_name, ' ') !== false) {
			wp_send_json(['error_message' => __('User Name Must Not Contain Spaces', "bonyan")], 400);
			wp_die();
		}
		if (username_exists($registration_user_name)) {
			wp_send_json(['error_message' => __('User Name Is Already Exist', "bonyan")], 400);
			wp_die();
		}
		if (!is_email($registration_user_email)) {
			wp_send_json(['error_message' => __('Email Has No Valid Value', "bonyan")], 400);
			wp_die();
		}
		if (email_exists($registration_user_email)) {
			wp_send_json(['error_message' => __('User Email Is Already Exist', "bonyan")], 400);
			wp_die();
		}
		if (strcmp($registration_user_password, $registration_user_password_confirm) !== 0) {
			wp_send_json(['error_message' => __('Password Didn\'t Match', "bonyan")], 400);
			wp_die();
		}

		$verify_user = wp_create_user($registration_user_name, $registration_user_password, $registration_user_email);
		if (!is_wp_error($verify_user)) {
			if (!is_int($verify_user)) {
				wp_die();
			} // if current variable is not integer 
			$user_details = get_user_by('ID', $verify_user);
			// Remove role
			$user_details->remove_role('subscriber');

			// Add role
			$user_details->add_role('give_donor');

			$verify_user = login_to_website($registration_user_name, $registration_user_password_confirm);

			if (is_wp_error($verify_user)) {
				wp_send_json(['error_message' => __('Error Happened When Tyr To Login', "bonyan")], 400);
				wp_die();
			}
			do_action('wp_login', $verify_user->user_login, $verify_user);
			wp_set_current_user($verify_user->ID);
			wp_set_auth_cookie($verify_user->ID);

			// Set User Meta
			update_user_meta($verify_user->ID, 'first_name', $registration_user_first_name);
			update_user_meta($verify_user->ID, 'last_name', $registration_user_last_name);
			update_user_meta($verify_user->ID, 'gender', $registration_user_gender);
			update_user_meta($verify_user->ID, 'age', $registration_user_age);
			update_user_meta($verify_user->ID, 'birth_date', $registration_user_birth_date);

			wp_send_json(['return_url' => home_url()], 200);
			wp_die();
		} else {
			wp_send_json(['error_message' => $verify_user->get_error_message()], 400);
			wp_die();
		}
	}
}
