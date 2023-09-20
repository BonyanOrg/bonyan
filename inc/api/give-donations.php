<?php
/**
 * Fire When Payment Process completed whatever payment status
 */
function give_Zoho($donation_id, $new_status, $old_status)
{

    $PaymentObject = new Give_Payment($donation_id);
    $donor = new Give_Donor(!empty($PaymentObject->user_info["id"]) ? intval($PaymentObject->donor_id) : $PaymentObject->email, true); // Get Donor
    $donor_total_donations = give_format_amount($donor->get_total_donation_amount());
    $donor_total_donations = str_replace(',', '.', $donor_total_donations);
    $donor_comment = give_get_donor_donation_comment($donation_id, $PaymentObject->donor_id);
    $is_sub = give_get_payment_meta($PaymentObject->ID, '_give_subscription_payment');

    $qurban_details = give_get_meta($PaymentObject->ID, 'give_qurbani_details', true);

    $qurban_details = json_decode($qurban_details, true);
    if (!empty($qurban_details)) {
        // Table header
        $table = "Group \t | Countries \t | Amount \t | Quantity \t | Total\n";
        $table .= "------------------------------------------------------------\n";

        // Table data
        foreach ($qurban_details as $row) {
            $table .= $row['group'] . "\t | ";
            $table .= $row['countries'] . "\t | ";
            $table .= "$" . $row['amount'] . "\t | ";
            $table .= $row['quantity'] . "\t | ";
            $table .= "$" . $row['total'] . " \n";
        }
    }




    $zoho_scenario_url = get_option('zoho_crm');
    $matic_scenario_url = get_option('mautic_lead');
    $args = array(
        "Donation id" => !empty($PaymentObject->ID) ? $PaymentObject->ID : "_",
        "Campaign Title" => !empty($PaymentObject->form_title) ? $PaymentObject->form_title : "_",
        "Campaign ID" => !empty($PaymentObject->form_id) ? $PaymentObject->form_id : "_",
        "Donation Status" => !empty($PaymentObject->status) ? $PaymentObject->status : "_",
        "Donation Total" => !empty($donor_total_donations) ? $donor_total_donations : $PaymentObject->total,
        "Donation Currency" => !empty($PaymentObject->currency) ? $PaymentObject->currency : "_",
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => !empty($PaymentObject->ip) ? $PaymentObject->ip : "_",
        "Donor First Name" => !empty($PaymentObject->first_name) ? $PaymentObject->first_name : "_",
        "Donor Last Name" => !empty($PaymentObject->last_name) ? $PaymentObject->last_name : "_",
        "Donor Email" => !empty($PaymentObject->email) ? $PaymentObject->email : "_",
        "Donor Comment" => !empty($donor_comment->comment_content) ? $donor_comment->comment_content : "_",
        "Qurbani Detail" => !empty($qurban_details) ? $table : "_",
        "Subscription" => "_",
        "Every" => "_",
    );
    if ($is_sub):
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
        //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    if (!empty($zoho_scenario_url)) {
        wp_remote_post(
            $zoho_scenario_url,
            array(
                'body' => $args,
                'timeout' => 45,
                'sslverify' => false
            )
        );
    }

    if (!empty($matic_scenario_url)) {
        $Post_Http = wp_remote_post(
            $matic_scenario_url,
            array(
                'body' => $args,
                'timeout' => 45,
                'sslverify' => false
            )
        );
    }
    /**
     * I dev Affiliate
     */
    if ($new_status == 'publish') {
        // $ch = curl_init();
        // curl_setopt(
        //     $ch,
        //     CURLOPT_URL,
        //     "https://bonyan.idevaffiliate.com/sale.php?profile=187&idev_saleamt=" . number_format($PaymentObject->total, 2, '.', '') . "&reference=" . $PaymentObject->ID . "&ip_address=" . $PaymentObject->ip . "&idev_option_1=" . $PaymentObject->first_name . " " . $PaymentObject->last_name . "&idev_option_2=" . $PaymentObject->email . "&idev_option_3=" . $PaymentObject->total . " " . $PaymentObject->currency
        // );
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $result_of_exec = curl_exec($ch);
        // curl_close($ch);


        $alert_url = 'https://bonyan.idevaffiliate.com';
        $data = array(
            "profile" => '187',
            "idev_saleamt" => number_format($PaymentObject->total, 2, '.', ''),
            "reference" => $PaymentObject->ID,
            "ip_address" => $PaymentObject->ip,
            //"idev_currency" => $PaymentObject->currency,
            "idev_option_1" => $PaymentObject->first_name . " " . $PaymentObject->last_name,
            "idev_option_2" => $PaymentObject->email,
            "idev_option_3" => $PaymentObject->total . " " . $PaymentObject->currency,
        );

        $alert_url = rtrim($alert_url, "/");

        $response = wp_remote_post(
            $alert_url . "/sale.php",
            array(
                'method' => 'POST',
                'body' => $data
            )
        );
        write_log($response);
    }


}
add_action('give_update_payment_status', 'give_Zoho', 200, 3);

/**
 * Send donation information to third-party services.
 *
 * This function retrieves donation details and sends them to specified third-party services such as Zoho CRM and Mautic.
 *
 * @param int $donation_id The ID of the donation.
 *
 * @return void
 */
function give_To_Zoho_On_Save($donation_id, $PaymentObject)
{

    $PaymentObject = new Give_Payment($donation_id);
    $donor = new Give_Donor(!empty($PaymentObject->user_info["id"]) ? intval($PaymentObject->donor_id) : $PaymentObject->email, true); // Get Donor 
    $donor_total_donations = give_format_amount($donor->get_total_donation_amount());
    $donor_total_donations = str_replace(',', '.', $donor_total_donations);
    $donor_comment = give_get_donor_donation_comment($donation_id, $PaymentObject->donor_id);
    $is_sub = give_get_payment_meta($PaymentObject->ID, '_give_subscription_payment');

    $qurban_details = give_get_meta($PaymentObject->ID, 'give_qurbani_details', true);

    $qurban_details = json_decode($qurban_details, true);
    if (!empty($qurban_details)) {
        // Table header
        $table = "Group \t | Countries \t | Amount \t | Quantity \t | Total\n";
        $table .= "------------------------------------------------------------\n";

        // Table data
        foreach ($qurban_details as $row) {
            $table .= $row['group'] . "\t | ";
            $table .= $row['countries'] . "\t | ";
            $table .= "$" . $row['amount'] . "\t | ";
            $table .= $row['quantity'] . "\t | ";
            $table .= "$" . $row['total'] . " \n";
        }
    }

    $zoho_scenario_url = get_option('zoho_crm');
    $zoho_contacts_scenario_url = get_option('zoho_contacts_crm');
    $matic_scenario_url = get_option('mautic_lead');
    $args = array(
        "Donation id" => !empty($PaymentObject->ID) ? $PaymentObject->ID : "_",
        "Campaign Title" => !empty($PaymentObject->form_title) ? $PaymentObject->form_title : "_",
        "Campaign ID" => !empty($PaymentObject->form_id) ? $PaymentObject->form_id : "_",
        "Donation Status" => !empty($PaymentObject->status) ? $PaymentObject->status : "_",
        "Donation Total" => !empty($donor_total_donations) ? $donor_total_donations : $PaymentObject->total,
        "Donation Currency" => !empty($PaymentObject->currency) ? $PaymentObject->currency : "_",
        "Donor ID" => $PaymentObject->user_id != 0 ? $PaymentObject->user_id : $PaymentObject->donor_id,
        "Donor IP" => !empty($PaymentObject->ip) ? $PaymentObject->ip : "_",
        "Donor First Name" => !empty($PaymentObject->first_name) ? $PaymentObject->first_name : "_",
        "Donor Last Name" => !empty($PaymentObject->last_name) ? $PaymentObject->last_name : "_",
        "Donor Email" => !empty($PaymentObject->email) ? $PaymentObject->email : "_",
        "Donor Comment" => !empty($donor_comment->comment_content) ? $donor_comment->comment_content : "_",
        "Qurbani Detail" => !empty($qurban_details) ? $table : "_",
        "Subscription" => "_",
        "Every" => "_",
    );
    if ($is_sub):
        $subscription = give_recurring_get_subscription_by('payment', $PaymentObject->ID);
        $args["Subscription"] = "Yes";
        $args["Every"] = $subscription->frequency . "/" . $subscription->period;
        //$args["Recurring Amount"] = number_format($subscription->recurring_amount,2);

    endif;
    if (!empty($zoho_scenario_url)) {
        $Post_Http = wp_remote_post(
            $zoho_scenario_url,
            array(
                'body' => $args,
                'timeout' => 45,
                'sslverify' => false
            )
        );
    }

    if (!empty($zoho_contacts_scenario_url)) {
        wp_remote_post(
            $zoho_contacts_scenario_url,
            array(
                'body' => $args,
                'timeout' => 45,
                'sslverify' => false
            )
        );
    }
    $Post_Http = wp_remote_post(
        $matic_scenario_url,
        array(
            'body' => $args,
            'timeout' => 45,
            'sslverify' => false
        )
    );
}
add_action('give_insert_payment', 'give_To_Zoho_On_Save', 200, 2);