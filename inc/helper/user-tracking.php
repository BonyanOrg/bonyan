<?php

function user_tracker()
{
    if (!is_user_logged_in()) {
        return;
    }
    // ================ Get IP Address =================
    $ip_address = '127.0.0.1';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //check ip from share internet
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //to check ip is pass from proxy
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    
    global $wpdb;
    $prefix = $wpdb->prefix;
    $table_name = $prefix . 'users_log';
    // Check if the table exists
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
    if (!$table_exists) {
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table_name (
        `ID` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) DEFAULT NULL,
        `post_id` int(11) DEFAULT NULL,
        `post_type` varchar(50) DEFAULT NULL,
        `term_id` int(11) DEFAULT NULL,
        `event_type` varchar(255) DEFAULT NULL,
        `ip` varchar(15) DEFAULT NULL,
        `date` date NOT NULL,
        PRIMARY KEY (ID)
    ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    // On Visit Post Or Page
    if (is_singular()) {
        global $wpdb;
        // Insert To Log
        $queried_object = get_queried_object();
        if ($queried_object->post_type == 'page') { // Don't Save Pages
            return;
        }
        $insert = $wpdb->insert(
            'bn_users_log',
            array(
                'user_id' => get_current_user_id(),
                'post_id' => $queried_object->ID,
                'post_type' => $queried_object->post_type,
                'term_id' => 0,
                'event_type' => 'visit_post',
                'ip' => $ip_address,
                'date' => current_time('mysql'),
            )
        );
    }

    // On visit Category
    if (is_tax() || is_category()) {
        global $wpdb;
        // Insert To Log
        $queried_object = get_queried_object();
        $insert = $wpdb->insert(
            'bn_users_log',
            array(
                'user_id' => get_current_user_id(),
                'post_id' => 0,
                'post_type' => $queried_object->taxonomy,
                'term_id' => $queried_object->term_id,
                'event_type' => 'visit_category',
                'ip' => $ip_address,
                'date' => current_time('mysql'),
            )
        );
    }


    // if (is_post_type_archive()) {
    //     global $wpdb;
    //     // Insert To Log
    //     $queried_object = get_queried_object();
    //     // $insert = $wpdb->insert(
    //         'bn_users_log',
    //         array(
    //             'user_id' => get_current_user_id(),
    //             'post_id' => $queried_object->ID,
    //             'post_type' => $queried_object->post_type,
    //             'term_id' => 0,
    //             'event_type' => 'visit_post',
    //             'ip' => $ip_address,
    //             'date' => current_time('mysql'),
    //         )
    //     );
    // }

}
add_action('wp_head', 'user_tracker');
?>