<?php

///////////////////////////////
/* Get User Donations  */
///////////////////////////////
add_action('wp_ajax_send_Email', 'send_Email');
add_action('wp_ajax_nopriv_send_Email', 'send_Email');
function send_Email()
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

    // Change email address
    function change_default_sender_email($original_email_address)
    {
        return 'test@gmail.com';
    }

    // Change sender name
    function change_default_sender_name($original_email_from)
    {
        return 'Bonyan-Beta';
    }

    // Hooking up functions to the correct WordPress filters 
    add_filter('wp_mail_from', 'change_default_sender_email');
    add_filter('wp_mail_from_name', 'change_default_sender_name');
    // Set up email headers
    //$headers[] = 'From: John Doe <john.doe@example.com>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    ob_start();
    get_template_part('template-parts/mail-template', '', array("mailMassageBody" => $mailMassageBody));
    $HTML_Output = ob_get_contents();
    ob_end_clean();
    // Set up email subject and message
    $subject = !empty($emailSubject) ? $emailSubject : 'Thank you for your donation';
    $message = $HTML_Output;

    // Send email using wp_mail()
    $is_sent = wp_mail($donor_email, $subject, $message, $headers);

    if ($is_sent) {
        wp_send_json(['Result' => true, 200]);
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