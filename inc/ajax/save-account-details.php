<?php

////////////////////////////////////
/* Save Account Details  */
////////////////////////////////////

add_action('wp_ajax_save_user_account_details', 'save_user_account_details');
//add_action('wp_ajax_nopriv_save_user_account_details', 'save_user_account_details');
function save_user_account_details()
{
    // If the user does not logged in show the error message
    if (!is_user_logged_in()) {
        wp_send_json([
            'Error' => 'just Error',
        ], 400);
        wp_die();
    }

    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    $user_id = get_current_user_id();
    $user_data = get_userdata($user_id);



    $user_FirstName = isset($_POST['user_FirstName']) ? sanitize_text_field($_POST['user_FirstName']) : '';
    $user_LastName = isset($_POST['user_LastName']) ? sanitize_text_field($_POST['user_LastName']) : '';
    $user_gender = isset($_POST['user_gender']) ? sanitize_text_field($_POST['user_gender']) : '';
    $user_company = isset($_POST['user_company']) ? sanitize_text_field($_POST['user_company']) : '';
    $user_mobile_number = isset($_POST['user_mobile_number']) ? sanitize_text_field($_POST['user_mobile_number']) : '';
    $user_Email = isset($_POST['user_Email']) ? sanitize_text_field($_POST['user_Email']) : '';
    $user_Website = isset($_POST['user_Website']) ? sanitize_text_field($_POST['user_Website']) : '';
    $user_birth_date = isset($_POST['user_birth_date']) ? sanitize_text_field($_POST['user_birth_date']) : '';
    $user_age = isset($_POST['user_age']) ? sanitize_text_field($_POST['user_age']) : '';
    // $user_country = isset($_POST['user_country']) ? sanitize_text_field($_POST['user_country']) : '';
    // $user_city = isset($_POST['user_city']) ? sanitize_text_field($_POST['user_city']) : '';
    // $user_address = isset($_POST['user_address']) ? sanitize_text_field($_POST['user_address']) : '';
    $user_facebook_url = isset($_POST['user_facebook_url']) ? sanitize_text_field($_POST['user_facebook_url']) : '';
    $user_twitter_url = isset($_POST['user_twitter_url']) ? sanitize_text_field($_POST['user_twitter_url']) : '';
    $user_instagram_url = isset($_POST['user_instagram_url']) ? sanitize_text_field($_POST['user_instagram_url']) : '';


    if (!is_email($user_Email)) {
        wp_send_json(['error_message' => __('Email Has No Valid Value', 'bonyan')], 400);
        wp_die();
    }
    if ($user_Email !== $user_data->user_email) {
        if (email_exists($user_Email)) {
            wp_send_json(['error_message' => __('User Email Is Already In Use', 'bonyan')], 400);
            wp_die();
        } elseif (!email_exists($user_Email)) {
            wp_update_user(array('ID' => $user_id, 'user_email' => $user_Email));
        }
    }


    if (isset($_FILES['user_image'])) {

        // Delete The Old One
        $user_profile_photo_url = get_user_meta($user_id, 'user_profile_photo', true);
        if (!empty($user_profile_photo_url)) {
            $attachment_id = attachment_url_to_postid($user_profile_photo_url);
            $attachment_path = get_attached_file($attachment_id);
            wp_delete_attachment($attachment_id, true); // Delete Form Database
            unlink($attachment_path); // Delete from upload directory
        }

        // Save The New One 
        $file_name = $_FILES['user_image']['name'];
        $file_temp = $_FILES['user_image']['tmp_name'];


        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($file_temp);
        $filename = basename($file_name);
        $filetype = wp_check_filetype($file_name);
        $filename = time() . '.' . $filetype['ext'];

        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        file_put_contents($file, $image_data);
        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file);
        // require_once(ABSPATH . 'wp-admin/includes/image.php');
        // $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        // wp_update_attachment_metadata($attach_id, $attach_data);

        // Update User Meta
        $user_image_url = wp_get_attachment_url($attach_id);
        update_user_meta($user_id, 'user_profile_photo', $user_image_url);


        // $image = wp_get_image_editor($file);
        // if (!is_wp_error($image)) {
        //     $image->resize(180, 180, true);
        //     $image->set_quality( 10 );
        //     $image->save();
        // }
    }

    wp_update_user(array('ID' => $user_id, 'user_url' => $user_Website));
    update_user_meta($user_id, 'first_name', $user_FirstName);
    update_user_meta($user_id, 'last_name', $user_LastName);
    update_user_meta($user_id, 'gender', $user_gender);
    update_user_meta($user_id, 'company', $user_company);
    // update_user_meta($user_id, 'city', $user_city);
    // update_user_meta($user_id, 'country', $user_country);
    // update_user_meta($user_id, 'address', $user_address);
    update_user_meta($user_id, 'mobile_number', $user_mobile_number);
    update_user_meta($user_id, 'birth_date', $user_birth_date);
    update_user_meta($user_id, 'age', $user_age);
    update_user_meta($user_id, 'facebook_url', $user_facebook_url);
    update_user_meta($user_id, 'twitter_url', $user_twitter_url);
    update_user_meta($user_id, 'instagram_url', $user_instagram_url);


    wp_send_json([
        'user_image' => $user_image_url,
        "user_FirstName" => $user_FirstName,
        "user_company" => $user_company,
        "user_LastName" => $user_LastName,
        "user_mobile_number" => $user_mobile_number,
        "user_Email" => $user_Email,
        "user_Website" => $user_Website,
        "user_birth_date" => $user_birth_date,
        "user_age" => $user_age,
        // "user_country" => $user_country,
        // "user_city" => $user_city,
        // "user_address" => $user_address,
        "user_facebook_url" => $user_facebook_url,
        "user_twitter_url" => $user_twitter_url,
        "user_instagram_url" => $user_instagram_url
    ], 200);
    wp_die();
}
