<?php
add_action('give_update_payment_status', 'give_Zoho', 200, 3);

function give_Zoho($donation_id, $new_status, $old_status)
{

    $PaymentObject    = new Give_Payment($donation_id);
    $donor_comment = give_get_donor_donation_comment($donation_id, $PaymentObject->donor_id);
    $is_sub      = give_get_payment_meta($PaymentObject->ID, '_give_subscription_payment');




    $zoho_scenario_url = "https://hook.integromat.com/mmct6ujbgs38k1sx4o5rul0d52oafre2";
    $matic_scenario_url = "https://hook.integromat.com/16cykmkx2fxzwu5jtfnken8231wzxocy";
    $args = array(
        "Donation id" => !empty($PaymentObject->ID) ? $PaymentObject->ID : "_",
        "Campaign Title" => !empty($PaymentObject->form_title) ? $PaymentObject->form_title : "_",
        "Campaign ID" => !empty($PaymentObject->form_id) ? $PaymentObject->form_id : "_",
        "Donation Status" => !empty($PaymentObject->status) ? $PaymentObject->status : "_",
        "Donation Total" => !empty($PaymentObject->total) ? $PaymentObject->total : "_",
        "Donation Currency" => !empty($PaymentObject->currency) ? $PaymentObject->currency : "_",
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => !empty($PaymentObject->ip) ? $PaymentObject->ip : "_",
        "Donor First Name" => !empty($PaymentObject->first_name) ? $PaymentObject->first_name : "_",
        "Donor Last Name" => !empty($PaymentObject->last_name) ? $PaymentObject->last_name : "_",
        "Donor Email" => !empty($PaymentObject->email) ? $PaymentObject->email : "_",
        "Donor Comment" => !empty($donor_comment->comment_content) ? $donor_comment->comment_content : "_",
        "Subscription" => "_",
        "Every" => "_",
    );
    if ($is_sub) :
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
    //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    $Post_Http = wp_remote_post($zoho_scenario_url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));

    $Post_Http = wp_remote_post($matic_scenario_url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));

    /**
     * I dev Affiliate
     */
    if ($new_status == 'publish') {
        $ch = curl_init();
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "https://bonyan.idevaffiliate.com/sale.php?profile=187&idev_saleamt=" . number_format($PaymentObject->total, 2, '.', '') . "&reference=" . $PaymentObject->ID . "&ip_address=" . $PaymentObject->ip . "&idev_option_1=" . $PaymentObject->first_name . " " . $PaymentObject->last_name . "&idev_option_2=" . $PaymentObject->email . "&idev_option_3=" . $PaymentObject->total . " " . $PaymentObject->currency
        );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }


    if (is_wp_error($Post_Http)) {
        $error_message = $Post_Http->get_error_message();
        // handle the error
    } else {
        // handle the response
    }
}

function give_To_Zoho_On_Save($donation_id, $PaymentObject)
{

    $PaymentObject    = new Give_Payment($donation_id);
    $donor_comment = give_get_donor_donation_comment($donation_id, $PaymentObject->donor_id);
    $is_sub      = give_get_payment_meta($PaymentObject->ID, '_give_subscription_payment');


    $zoho_scenario_url = "https://hook.integromat.com/mmct6ujbgs38k1sx4o5rul0d52oafre2";
    $matic_scenario_url = "https://hook.integromat.com/16cykmkx2fxzwu5jtfnken8231wzxocy";
    $args = array(
        "Donation id" => !empty($PaymentObject->ID) ? $PaymentObject->ID : "_",
        "Campaign Title" => !empty($PaymentObject->form_title) ? $PaymentObject->form_title : "_",
        "Campaign ID" => !empty($PaymentObject->form_id) ? $PaymentObject->form_id : "_",
        "Donation Status" => !empty($PaymentObject->status) ? $PaymentObject->status : "_",
        "Donation Total" => !empty($PaymentObject->total) ? $PaymentObject->total : "_",
        "Donation Currency" => !empty($PaymentObject->currency) ? $PaymentObject->currency : "_",
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => !empty($PaymentObject->ip) ? $PaymentObject->ip : "_",
        "Donor First Name" => !empty($PaymentObject->first_name) ? $PaymentObject->first_name : "_",
        "Donor Last Name" => !empty($PaymentObject->last_name) ? $PaymentObject->last_name : "_",
        "Donor Email" => !empty($PaymentObject->email) ? $PaymentObject->email : "_",
        "Donor Comment" => !empty($donor_comment->comment_content) ? $donor_comment->comment_content : "_",
        "Subscription" => "_",
        "Every" => "_",
    );
    if ($is_sub) :
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
    //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    $Post_Http = wp_remote_post($zoho_scenario_url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));

    $Post_Http = wp_remote_post($matic_scenario_url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));
}
add_action('give_insert_payment', 'give_To_Zoho_On_Save', 200, 2);
