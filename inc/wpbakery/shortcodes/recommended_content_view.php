<?php


function print_recommended_content($post_type, $terms_id_array, $CPT_taxonomy_objects)
{
    if (!empty($terms_id_array)) {
        $values_of_term_id = array_count_values($terms_id_array);
        $values_repeat_check_array = array_unique($values_of_term_id);
        $randomKey = array_rand($values_of_term_id); // Get Random Key We Will Use it if all items value is equal
        arsort($values_of_term_id);
        $most_visited_term_id = (count($values_repeat_check_array) === 1) ? $randomKey : array_keys($values_of_term_id)[0]; // Get the most visited term if all equally visited take random
        $most_visited_term = get_term($most_visited_term_id);
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            "tax_query" => array(
                array(
                    "taxonomy" => $most_visited_term->taxonomy,
                    'field' => 'term_id',
                    'terms' => $most_visited_term_id,
                ),
            ),
        );
        //================ Show Most Recommended 3 Posts ================
        $most_recommended_Posts = new WP_Query($args);
        if ($most_recommended_Posts->have_posts()) {
            while ($most_recommended_Posts->have_posts()) {
                $most_recommended_Posts->the_post();

                // ========================
                // We Can Use This Method But We Don't Use it because 
                // it will call part functions just for check file existence
                // ob_start();
                // get_template_part('template-parts/' . $template_part);
                // $template_content = ob_get_clean();
                // if (!empty($template_content){}
                // ========================

                if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $post_type . '.php')) {
                    get_template_part('template-parts/cards/content', 'post');
                } else {
                    get_template_part('template-parts/cards/content', $post_type);
                }
            }
        }
        wp_reset_postdata();
        //================ End Show Most Recommended 3 Posts ================

        $terms_id_array = array_unique($terms_id_array); // Delete Repeated Terms
        if (($key = array_search($most_visited_term_id, $terms_id_array)) !== false) { // Search for the most visited term
            unset($terms_id_array[$key]); // Delete the most visited term
        }
        if (!empty($terms_id_array)) { // If the array still not  empty after delete the most visited term (in case of single term and no more terms are found)
            $args = array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'rand',
            );
            $args['tax_query'] = ['relation' => 'OR'];
            foreach ($CPT_taxonomy_objects as $taxonomy) {
                $temp_term_array = array(
                    'taxonomy' => $taxonomy,
                    'field' => 'term_id',
                    'terms' => $terms_id_array,
                );
                array_push($args['tax_query'], $temp_term_array);
            }
            $recommended_Posts = new WP_Query($args);
            if ($recommended_Posts->have_posts()) {
                while ($recommended_Posts->have_posts()) {
                    $recommended_Posts->the_post();

                    if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $post_type . '.php')) {
                        get_template_part('template-parts/cards/content', 'post');
                    } else {
                        get_template_part('template-parts/cards/content', $post_type);
                    }
                }
            }
            wp_reset_postdata();
        }
    }
}
function get_related_terms_ids_by_posts_ids($posts_ids, $CPT_taxonomy_objects)
{
    $terms_id_array = [];
    foreach ($CPT_taxonomy_objects as $taxonomy) {
        foreach ($posts_ids as $post_id) {
            $specific_post_terms = get_the_terms($post_id, $taxonomy);
            if (empty($specific_post_terms)) {
                continue;
            }
            foreach ($specific_post_terms as $term) {
                array_push($terms_id_array, $term->term_id);
            }
        }
    }
    return $terms_id_array;
}
/**
 * Quick Donation
 * 
 */
if (!function_exists('recommended_content_shortcode')) {
    function recommended_content_shortcode($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'recommended_content_post_type' => '',
                ),
                $atts
            )
        );


        // NOTE Nothing == ""
        if ($recommended_content_post_type == "") {
            echo "Please select a post type";
            return;
        }
        ob_start();
        ?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('recommended_content_register_style')) {
                function recommended_content_register_style()
                {
                    require_once(get_template_directory() . "/dist/css/components/wpb/project-card.min.css");
                }
                recommended_content_register_style();
            } ?>
        </style>
        <div class="container custom-widget">
            <h2 class="bonyan-title primary-color mb-4 mb-md-5">
                <?php _e('Recommended For You', 'bonyan') ?>
                <?php //echo $recommended_content_header_text 
                        ?>
            </h2>
            <div class="cards-container">

                <?php
                //=============================
                // If User Logged In
                //=============================
                if (is_user_logged_in()) {
                    global $wpdb;
                    $prefix = $wpdb->prefix;
                    $table_name = $prefix . 'users_log';

                    // Check if the table exists
                    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;

                    if (!$table_exists) {
                        echo "table not found";
                        return;
                    }
                    $sql_query = $wpdb->prepare("SELECT * FROM " . $table_name . " WHERE  user_id = %d LIMIT 30 ", get_current_user_id());
                    $results = $wpdb->get_results($sql_query);
                    $visited_posts_ids = [];
                    $visited_categories_ids = [];
                    $CPT_taxonomy_objects = get_object_taxonomies($recommended_content_post_type);

                    $user_id = get_current_user_id();
                    $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);
                    $fav_campaigns_ids_array = explode(",", $user_fav_campaigns);
                    $recommended_content_printed = false;

                    //=========================================
                    // If User Has Campaigns In The Wishlist
                    //=========================================
                    if ($recommended_content_post_type == "campaign" && $fav_campaigns_ids_array[0] != "") {

                        $terms_id_array = get_related_terms_ids_by_posts_ids($fav_campaigns_ids_array, $CPT_taxonomy_objects);

                        print_recommended_content($recommended_content_post_type, $terms_id_array, $CPT_taxonomy_objects);
                        $recommended_content_printed = true;
                    }

                    // Get Visited Posts IDs
                    foreach ($results as $result) {
                        if ($result->event_type == 'visit_post') {
                            if ($result->post_type == $recommended_content_post_type) {
                                if (!in_array($result->post_id, $visited_posts_ids)) { // Prevent Repeated Post ID
                                    array_push($visited_posts_ids, $result->post_id);
                                }
                            }
                        }
                    }
                    // Get Visited Terms IDs
                    if (empty($visited_posts_ids)) {
                        foreach ($results as $result) {
                            if ($result->event_type == 'visit_category') {
                                if (!in_array($result->term_id, $visited_categories_ids)) {
                                    array_push($visited_categories_ids, $result->term_id);
                                }
                            }
                        }
                    }

                    //=============================
                    // If User Visits POSTS
                    //=============================
                    if (!empty($visited_posts_ids) && $fav_campaigns_ids_array[0] == "") {

                        $terms_id_array = get_related_terms_ids_by_posts_ids($visited_posts_ids, $CPT_taxonomy_objects);

                        print_recommended_content($recommended_content_post_type, $terms_id_array, $CPT_taxonomy_objects);
                        $recommended_content_printed = true;
                    }

                    //=============================
                    // If User Visits CATEGORIES
                    //=============================
                    if (!empty($visited_categories_ids)) {

                        $args = array(
                            'post_type' => $recommended_content_post_type,
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'orderby' => 'rand',
                            "tax_query" => array(
                                'relation' => 'OR',

                            ),
                        );
                        foreach ($CPT_taxonomy_objects as $taxonomy) {
                            array_push(
                                $args['tax_query'],
                                array(
                                    "taxonomy" => $taxonomy,
                                    'field' => 'id',
                                    'terms' => $visited_categories_ids,
                                )
                            );
                        }

                        $recommended_posts_by_terms = new WP_Query($args);
                        if ($recommended_posts_by_terms->have_posts()) {
                            while ($recommended_posts_by_terms->have_posts()) {
                                $recommended_posts_by_terms->the_post();

                                if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $recommended_content_post_type . '.php')) {
                                    get_template_part('template-parts/cards/content', 'post');
                                } else {
                                    get_template_part('template-parts/cards/content', $recommended_content_post_type);
                                }
                            }
                        }
                        wp_reset_postdata();
                        if ($recommended_posts_by_terms->post_count > 0) {

                            $recommended_content_printed = true;
                        }

                    }

                    //==========================================================
                    // If No Visited Categories | Posts | Favorite Campaigns 
                    //==========================================================
                    if ($recommended_content_printed == false) {

                        $post_info = get_post(get_the_ID());
                        if ($post_info->post_type == "page") { // if the widget was placed on the page
                            $args = array(
                                'post_type' => $recommended_content_post_type,
                                'post_status' => 'publish',
                                'posts_per_page' => 6,
                                'orderby' => 'rand',
                            );
                            $random_posts = new WP_Query($args);
                            if ($random_posts->have_posts()) {
                                while ($random_posts->have_posts()) {
                                    $random_posts->the_post();

                                    if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $recommended_content_post_type . '.php')) {
                                        get_template_part('template-parts/cards/content', 'post');
                                    } else {
                                        get_template_part('template-parts/cards/content', $recommended_content_post_type);
                                    }
                                }
                            }
                            wp_reset_postdata();

                        }
                    }
                }
                //=============================
                // If User Not Logged In
                //=============================
                if (!is_user_logged_in()) {
                    $CPT_taxonomy_objects = get_object_taxonomies($recommended_content_post_type);
                    $post_info = get_post(get_the_ID());
                    if ($post_info->post_type == "page") { // if the widget was placed on the page
                        $args = array(
                            'post_type' => $recommended_content_post_type,
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'orderby' => 'rand',
                        );
                        $random_posts = new WP_Query($args);
                        if ($random_posts->have_posts()) {
                            while ($random_posts->have_posts()) {
                                $random_posts->the_post();

                                if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $recommended_content_post_type . '.php')) {
                                    get_template_part('template-parts/cards/content', 'post');
                                } else {
                                    get_template_part('template-parts/cards/content', $recommended_content_post_type);
                                }
                            }
                        }
                        wp_reset_postdata();

                    } else { // if the widget was placed in post page
                        $post_info = get_post(get_the_ID());
                        if ($post_info->post_type != $recommended_content_post_type) {
                            echo "Post Type Is Not Supported";
                            return;
                        }
                        $posts_ids = [get_the_ID()];
                        $terms_id_array = get_related_terms_ids_by_posts_ids($posts_ids, $CPT_taxonomy_objects);
                        $args = array(
                            'post_type' => $recommended_content_post_type,
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'orderby' => 'rand',
                        );
                        $args['tax_query'] = ['relation' => 'OR'];
                        foreach ($CPT_taxonomy_objects as $taxonomy) {
                            $temp_term_array = array(
                                'taxonomy' => $taxonomy,
                                'field' => 'term_id',
                                'terms' => $terms_id_array,
                            );
                            array_push($args['tax_query'], $temp_term_array);
                        }
                        $random_posts = new WP_Query($args);
                        if ($random_posts->have_posts()) {
                            while ($random_posts->have_posts()) {
                                $random_posts->the_post();

                                if (!file_exists(get_template_directory() . '/template-parts/cards/content-' . $recommended_content_post_type . '.php')) {
                                    get_template_part('template-parts/cards/content', 'post');
                                } else {
                                    get_template_part('template-parts/cards/content', $recommended_content_post_type);
                                }
                            }
                        }
                        wp_reset_postdata();
                    }

                }
                //echo $recommended_Posts->request;
        




                ?>
            </div>
        </div>
        <?php



        ?>



        <?php
        return ob_get_clean();
    }
}

add_shortcode('recommended_content', 'recommended_content_shortcode');