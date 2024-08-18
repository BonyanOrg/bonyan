<?php

add_action('wp_ajax_get_charity_stack_form', 'get_charity_stack_form');
add_action('wp_ajax_nopriv_get_charity_stack_form', 'get_charity_stack_form');

function get_charity_stack_form() {
    $elementID = isset($_POST['elementID']) ? sanitize_text_field($_POST['elementID']) : '';

    if (empty($elementID)) {
        wp_send_json([
            'success' => false,
            'error_message' => "No form was found",
        ], 200);
        wp_die();
    }

    // Build the Charity Stack URL
    $charity_url = "https://elements.charitystack.com?elementID={$elementID}&entity=EMBED_FORM";

    // Return iframe HTML to embed the form
    $iframe_html = '<iframe src="' . esc_url($charity_url) . '" width="100%" height="400px" frameborder="0"></iframe>';

    wp_send_json([
        'success' => true,
        'content' => $iframe_html,
    ], 200);
    wp_die();
}
