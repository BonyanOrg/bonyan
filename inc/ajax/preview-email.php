<?php

///////////////////////////////
/* Get User Donations  */
///////////////////////////////
add_action('wp_ajax_preview_email', 'preview_email');
add_action('wp_ajax_nopriv_preview_email', 'preview_email');
function preview_email()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    if (!is_user_logged_in()) {
        die('Busted!');
    }

    if (!check_user_role(["administrator"])) {
        die('Busted!');
    }

    $donor_email = isset($_POST['donor_email']) ? $_POST['donor_email'] : '';
    $mailMassageBody = isset($_POST['mailMassageBody']) ? $_POST['mailMassageBody'] : '';
    $emailSubject = isset($_POST['emailSubject']) ? $_POST['emailSubject'] : '';

    if (empty($donor_email) || empty($mailMassageBody)) {
        wp_send_json_error('Email Or Massage Is Empty', 400);
    }



    ob_start();
    get_template_part('template-parts/mail-template', '', array("mailMassageBody" => $mailMassageBody));
    $HTML_Output = ob_get_contents();
    ob_end_clean();



    if (!empty($HTML_Output)) {
        wp_send_json(['Result' => $HTML_Output, 200]);
    } else {
        wp_send_json_error('Error', 400);
    }
    wp_die();
}
//========================
//  Send Via Mailchmip
//========================

// $path = get_template_directory() . '/vendor/autoload.php';
// require_once($path);

// try {
//     $mailchimp = new \MailchimpTransactional\ApiClient();
//     $mailchimp->setApiKey('md-9sbhbt74RDuL_AHtDvpIMw');
//     $message = [
//         "from_email" => "test",
//         "subject" => $subject,
//         "text" => "test",//$message,
//         "to" => [
//             [
//                 "email" => $donor_email,
//                 "type" => "to"
//             ]
//         ]
//     ];
//     $response = $mailchimp->messages->send(["message" => $message]);
//     //$response = $mailchimp->users->ping();
//     wp_send_json(['Result' => true, 200]);
// } catch (Error $e) {
//     $var = $e->getMessage();
//     wp_send_json_error('Error', 400);
// }