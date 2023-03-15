<?php

///////////////////////////////
/* Get User Donations  */
///////////////////////////////
add_action('wp_ajax_get_user_recurring_donations', 'get_user_recurring_donations');
add_action('wp_ajax_nopriv_get_user_recurring_donations', 'get_user_recurring_donations');
function get_user_recurring_donations()
{
    $user_id = get_current_user_id();
    $donor = new Give_Donor($user_id,true);
    $payment_ids = explode(',', $donor->payment_ids);
    $payments    = give_get_payments(
        array(
            'post__in' => $payment_ids,
        )
    );
    if (empty($payments)) { // Return Error if no payments
        wp_send_json(['error_message' => __("No donations found","bonyan")], 400);
        wp_die();
    }
    $is_user_have_recurring_payments = false;
    foreach ($payments as $payment) :
        $is_sub      = give_get_payment_meta($payment->ID, '_give_subscription_payment');

        if ($is_sub) :
            $is_user_have_recurring_payments = true;
            break;
        endif;
    endforeach;
    if($is_user_have_recurring_payments==false){
        wp_send_json(['error_message' => __("No recurring donations found","bonyan")], 400);
        wp_die();
    }
    ob_start();
    get_template_part('template-parts/datatable-recurring-donation', '', array("payments" => $payments));
    $HTML_Output = ob_get_contents();
    ob_end_clean();
    wp_send_json(['HTML_Output' => $HTML_Output, 200]);
    wp_die();
}
