<?php

add_action('give_update_payment_status', 'give_Zoho', 200, 3);

function give_Zoho($donation_id, $new_status, $old_status)
{

    $PaymentObject    = new Give_Payment($donation_id);
    $donor_comment = give_get_donor_donation_comment($donation_id, $PaymentObject->donor_id);
    $is_sub      = give_get_payment_meta($PaymentObject->ID, '_give_subscription_payment');




    $url = "https://hook.integromat.com/mmct6ujbgs38k1sx4o5rul0d52oafre2";
    $args = array(
        "Donation id" => $PaymentObject->ID,
        "Campaign Title" => $PaymentObject->form_title,
        "Campaign ID" => $PaymentObject->form_id,
        "Donation Status" => $PaymentObject->status,
        "Donation Total" => $PaymentObject->total,
        "Donation Currency" => $PaymentObject->currency,
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => $PaymentObject->ip,
        "Donor First Name" => $PaymentObject->first_name,
        "Donor Last Name" => $PaymentObject->last_name,
        "Donor Email" => $PaymentObject->email,
        "Donor Comment" => $donor_comment->comment_content,
    );
    if ($is_sub) :
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
    //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    $Post_Http = wp_remote_post($url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));
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


    $url = "https://hook.integromat.com/mmct6ujbgs38k1sx4o5rul0d52oafre2";
    $args = array(
        "Donation id" => $PaymentObject->ID,
        "Campaign Title" => $PaymentObject->form_title,
        "Campaign ID" => $PaymentObject->form_id,
        "Donation Status" => $PaymentObject->status,
        "Donation Total" => $PaymentObject->total,
        "Donation Currency" => $PaymentObject->currency,
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => $PaymentObject->ip,
        "Donor First Name" => $PaymentObject->first_name,
        "Donor Last Name" => $PaymentObject->last_name,
        "Donor Email" => $PaymentObject->email,
        "Donor Comment" => $donor_comment->comment_content,
    );
    if ($is_sub) :
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
    //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    $Post_Http = wp_remote_post($url, array(
        'body' => $args,
        'timeout' => 45,
        'sslverify' => false
    ));
}
add_action('give_insert_payment', 'give_To_Zoho_On_Save', 200, 2);
