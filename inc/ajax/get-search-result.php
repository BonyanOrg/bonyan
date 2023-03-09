<?php

add_action('wp_ajax_get_search_result', 'get_search_result');
add_action('wp_ajax_nopriv_get_search_result', 'get_search_result');
function get_search_result()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }
    $paged = $_POST['page'];
    $term = $_POST['term'];
    $taxonomy = $_POST['taxonomy'];
    $postType = $_POST['postType'];
    $searchWrod = $_POST['s'];
    if (empty($searchWrod)) {
        wp_die();
    }
    $args = array(
        'post_type' =>  $postType,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        //'paged' => $paged,
        'order' => 'desc',
        'orderby' => 'date',
        's' => $searchWrod,
    );
    if (!empty($taxonomy)) {
        if (!empty($term)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $term,
                )
            );
        }
    }
    ob_start();

    $blog_posts = new WP_Query($args); ?>
    <?php if ($blog_posts->have_posts()) : ?>
        <?php /* Loop Starts */
        while ($blog_posts->have_posts()) :
            $blog_posts->the_post();
        ?>
						<?php get_template_part('template-parts/cards/content', $postType); ?>
            
    <?php
        endwhile;
    endif;
    wp_reset_query();
    $HTML_Output = ob_get_contents();
    ob_end_clean();
    wp_send_json(['HTML_Output' => $HTML_Output, 200]);
    wp_die();
}
