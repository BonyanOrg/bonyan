<?php
// function myprefix_give_per_form_currency($currency, $donation_or_form_id, $args)
// {

//     if (isset($_COOKIE['FormAndCurrency']) && !empty($_COOKIE['FormAndCurrency'])) {
//         $Currency_Cookies_Array = explode('|', $_COOKIE['FormAndCurrency']);
//     }
//     if (
//         !empty($Currency_Cookies_Array) &&
//         $Currency_Cookies_Array[0] == $donation_or_form_id &&
//         !empty($Currency_Cookies_Array[1])
//     ) {
//         return $Currency_Cookies_Array[1];
//     }
//     return $currency;
// }
// add_filter('give_currency', 'myprefix_give_per_form_currency', 999, 3);
// function myprefix_give_per_form_currency($currency, $donation_or_form_id)
// {

//     if (isset($_COOKIE['CustomCurrency']) && !empty($_COOKIE['CustomCurrency'])) {
//         return $_COOKIE['CustomCurrency'];
//     }
//     return $currency;
// }
// add_filter('give_currency', 'myprefix_give_per_form_currency', 10, 2);

add_action('wp_ajax_show_donate_form', 'show_donate_form');
add_action('wp_ajax_nopriv_show_donate_form', 'show_donate_form');
function show_donate_form()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    // Initialize an empty array to store qurbani groups and set the initial total to 0
    $qurbani_groups_array = [];
    $qurbani_total = 0;

    // Get the form ID from the POST data
    $form_id = isset($_POST['form_id']) ? $_POST['form_id'] : '';

    // Get the qurbani groups details from JSON data
    $qurbani_groups_details = json_encode($_POST['groups_details']);
    $qurbani_groups_details = isset($_POST['groups_details']) ? json_decode($qurbani_groups_details) : '';
    // Check If The Donation Comes From The Qurbani Calculator Then Prepare The Details
    if (!empty($qurbani_groups_details)) {
        // Loop through each qurbani group detail
        foreach ($qurbani_groups_details as $qurbani_group_detail) {
            // Add the total of the group to the qurbani total
            $qurbani_total += intval($qurbani_group_detail->total);

            // Push the group detail to the qurbani groups array
            array_push($qurbani_groups_array, $qurbani_group_detail);
        }

        // Set the qurbani total to 1 if it's zero (default value)
        $qurbani_total = $qurbani_total == 0 ? 1 : $qurbani_total;
    }

    // Generate the give form shortcode using the form ID
    $give_form = do_shortcode('[give_form id="' . $form_id . '"]', true);

    // Check if the give form is empty or undefined
    if ($give_form == "" || $give_form == "undefined") {
        wp_send_json([
            'error_message' => "No form was found",
        ], 400);
        wp_die();
    }

    // Set the "DonCampaign" cookie for showing the thank you page
    setcookie("DonCampaign", $form_id, time() + 3600, "/");

    // If The Donation Comes From Normal Donation 
    if (isset($_POST['amount']) && empty($_POST['type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'], $give_form);
    }
    // If The Donation Comes from Quick Donation
    if (isset($_POST['type']) && $_POST['type'] === "quick_donation" && isset($_POST['charity_type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'] . '&comment=' . $_POST['charity_type'], $give_form);
    }
    // If The Donation Comes From The Qurbani Calculator
    if (!empty($qurbani_groups_array)) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $qurbani_total . '&qurbani_details=' . urlencode(json_encode($qurbani_groups_array)) . '', $give_form);
    }


    wp_send_json([
        'give_form' => $give_form,
    ], 200);
    wp_die();
}


add_action('give_post_form_output', 'give_form_js', 10, 2);

function give_form_js($form_id, $args)
{
    // This JavaScript code processes URL query parameters to populate a donation form and dynamically generates an HTML table to display data,
    // and disables form elements and stores the data for later retrieval.
    echo '<script>';
    include_once(get_template_directory() . '/dist/js/givewp-donation-script.js');
    echo '</script>';
}


?>