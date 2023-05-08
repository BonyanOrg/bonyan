<?php

add_action('wp_ajax_get_events_categories', 'get_events_categories');
add_action('wp_ajax_nopriv_get_events_categories', 'get_events_categories');
function get_events_categories()
{
    // Check for nonce security      
    // if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
    //     die('Busted!');
    // }

    if (!is_user_logged_in()) {
        die('Busted!');
    }


    $args = array(
        'taxonomy' => 'events-categories',
        // taxonomy name
        'orderby' => 'id',
        'order' => 'ASC',
        'hide_empty' => true,
        'fields' => 'all',
        'name__like' => $_POST['term']
    );

    $terms = get_terms($args);

    $terms_will_send = [];

    foreach ($terms as $term) {
        $terms_will_send[] = array('id' => $term->term_id, 'text' => $term->name);
    }

    if (empty($terms_will_send)) {
        wp_send_json_error('Nothing Found', 400);
    }

    wp_send_json(['Result' => $terms_will_send, 200]);


    wp_die();
}