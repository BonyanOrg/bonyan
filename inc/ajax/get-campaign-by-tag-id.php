<?php

///////////////////////////////
/* Get Campaigns By Tag ID  */
///////////////////////////////
add_action('wp_ajax_get_campaigns_by_tag_is', 'get_campaigns_by_tag_is');
add_action('wp_ajax_nopriv_get_campaigns_by_tag_is', 'get_campaigns_by_tag_is');
function get_campaigns_by_tag_is()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    if (!isset($_POST['tag_id'])) {
        wp_send_json(['error_message' => __("No Tag ID", "bonyan")], 400);
        wp_die();
    }

    $args = array(
        'post_type' => 'campaign',
        'tax_query' => array(
            array(
                'taxonomy' => 'campaigns-tags',
                'field'    => 'term_id',
                'terms'    => $_POST['tag_id'],
            ),
        ),
    );
    $campaigns_array = array();
    $campaigns = new WP_Query($args);
    if ($campaigns->have_posts()) {
        while ($campaigns->have_posts()) {
            $campaigns->the_post();
            $current_campaign_give_form_id = get_post_meta(get_the_ID(), 'co_give_form_id', true);
            if (!empty($current_campaign_give_form_id)) {
                $campaign_object = new stdClass;
                $campaign_object->give_form_id = $current_campaign_give_form_id;
                $campaign_object->campaign_title = get_the_title();
                array_push($campaigns_array, $campaign_object);
            }
        }
    }


    wp_send_json(['campaigns' => $campaigns_array, 200]);
    wp_die();
}
