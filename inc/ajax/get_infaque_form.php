<?php

add_action('wp_ajax_get_infaque_form', 'get_infaque_form');
add_action('wp_ajax_nopriv_get_infaque_form', 'get_infaque_form');

function get_infaque_form()
{
    $campaignID = isset($_POST['campaignID']) ? sanitize_text_field($_POST['campaignID']) : '';
    $amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    $donationType = isset($_POST['donationType']) ? sanitize_text_field($_POST['donationType']) : 'one-time';
    if (empty($campaignID)) {
        wp_send_json([
            'success' => false,
            'error_message' => "No form was found",
        ], 200);
        wp_die();
    }
    $amount_parameter = !empty($amount) ? "&amount={$amount}" : '';
    $donation_type_parameter = !empty($donationType) ? "&donationType={$donationType}" : '';


    // Build the Charity Stack URL
    $infaque_url = "https://bonyan-ngo.web.app/donate-directly/contribution?cause=false&value={$campaignID}{$amount_parameter}{$donation_type_parameter}&hideOtherCausesCampaigns=yes&header=no-header";

    // Return iframe HTML to embed the form
    $iframe_html = '<iframe id="iframe1" scrolling="no" title="iframe" frameborder="0" src="' . esc_url($infaque_url) . '" width="100%" height="400px" frameborder="0"></iframe>';

    wp_send_json([
        'success' => true,
        'content' => $iframe_html,
    ], 200);
    wp_die();
}
