<?php

add_action('wp_ajax_cancel_give_sub', 'cancel_give_sub');
add_action('wp_ajax_nopriv_cancel_give_sub', 'cancel_give_sub');
function cancel_give_sub()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    if (!is_user_logged_in()) {
        die('Busted!');
    }
    $current_user = wp_get_current_user();

    $subscription = give_recurring_get_subscription_by('payment', $_POST['id']);
    if (empty($subscription)) {
        wp_send_json([
            'error_massage' => "Error"
        ], 400);
        wp_die();
    }

    if ($subscription->donor->user_id != $current_user->ID) {
        die('Busted!');
    }

    $gateway = give_recurring_get_gateway_from_subscription($subscription);

    if (!$subscription->can_cancel()) {
        wp_send_json([
            'error_massage' => "Subscription Can't Cancel"
        ], 400);
        wp_die();
    }

    // Cancel the subscription with the gateway
    if ($gateway) {
        $gateway->cancel($subscription, true);
    }

    // Cancel the subscription with GiveWP
    $subscription->cancel();



    wp_send_json([
        'message' => "true",
    ], 200);
    wp_die();
}
