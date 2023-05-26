<?php

function redirect_post_url()
{
    $full_url = 'http';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $full_url .= 's';
    }
    $full_url .= '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // Check the current URL
    $requested_url = rtrim($full_url, '/');
    $requested_url_array = explode('/', $requested_url);
    $post_slug = end($requested_url_array);


    // Using get_posts()
    $args = array(
        'name' => $post_slug,
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $posts = get_posts($args);

    if ($posts) {
        $post = $posts[0];
        // Do something with the post
        $post_link = get_permalink($post->ID);
    }

    // Perform actions based on the URL
    if (
        !empty($post_link) &&
        $post->post_type == "post" && // Apply this Role Just on one post type
        $full_url != $post_link //Prevent Infinite Loop
    ) {
        // Custom code to run when the specific URL is entered
        // For example, redirecting or displaying a custom template
        wp_redirect($post_link);
        exit();
    }
}
add_action('template_redirect', 'redirect_post_url');

?>