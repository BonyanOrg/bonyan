<?php

///////////////////////////////
/* Get Campaigns By Tag ID  */
///////////////////////////////
add_action('wp_ajax_get_campaigns_by_name', 'get_campaigns_by_name');
add_action('wp_ajax_nopriv_get_campaigns_by_name', 'get_campaigns_by_name');
function get_campaigns_by_name()
{
    // Check for nonce security      
    // if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
    //     die('Busted!');
    // }


    $args = array(
        'post_type' => 'give_forms',
        'posts_per_page' => -1,
        's' => $_POST['term'],
    );
    $campaigns_array = [];
    $campaigns = new WP_Query($args);
    if ($campaigns->have_posts()) {
        while ($campaigns->have_posts()) {
            $campaigns->the_post();
            $campaigns_array[] = array('id' => get_the_ID(), 'text' => get_the_title());
            //array_push($campaigns_array, get_the_ID());
        }
    }


    wp_send_json(['campaigns' => $campaigns_array, 200]);
    //wp_send_json_success($campaigns_array);

    wp_die();
}
