<?php

add_action('wp_ajax_adv_categories', 'adv_categories');
add_action('wp_ajax_nopriv_adv_categories', 'adv_categories');
function adv_categories()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    $post_type = $_POST['post_type'] ?? '';
    $output = '';
    $post_types = array_keys(get_CPTs_with_name());
    if (in_array($post_type, $post_types)) {
        $no_categories = '<option value="">' . esc_html__('No Categories', 'bonyan') . '</option>';

        $taxes = get_object_taxonomies($post_type);
        $has_terms = false;
        if (!empty($taxes)) {
            
            foreach ($taxes as $tax) {
                if ($tax == "post_tag" || $tax == "campaigns-tags") continue;
                $terms = get_terms([
                    'taxonomy' => $tax,
                    'hide_empty' => false
                ]);
                if (!empty($terms)) {
                    $has_terms = true;
                    $output .= '<option value="all">' . __('-- Choose Category --', 'bonyan') . '</option>';
                    foreach ($terms as $term) {
                        $output .= '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                    }
                } else if (empty($terms) && $has_terms == false) {
                    $output = $no_categories;
                }
            }
        } else {
            $output = $no_categories;
        }
    }



    wp_send_json([
        'output' => $output,
    ], 200);
    wp_die();
}
