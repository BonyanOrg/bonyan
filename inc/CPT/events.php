<?php

function register_events_cpt()
{
    $labels = array(
        'name' => __('Events', 'bonyan'),
        'singular_name' => __('Event', 'bonyan'),
        'menu_name' => __('Events', 'bonyan'),
        'name_admin_bar' => __('Events', 'bonyan'),
        'add_new' => __('Add New', 'bonyan'),
        'add_new_item' => __('Add New events', 'bonyan'),
        'new_item' => __('New events', 'bonyan'),
        'edit_item' => __('Edit events', 'bonyan'),
        'view_item' => __('View events', 'bonyan'),
        'all_items' => __('All events', 'bonyan'),
        'search_items' => __('Search events', 'bonyan'),
        'parent_item_colon' => __('Parent events:', 'bonyan'),
        'not_found' => __('No events found.', 'bonyan'),
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Events custom post type.',
        'menu_icon' => 'dashicons-groups',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'author', 'thumbnail', "editor", "excerpt"),
        'taxonomies' => array('', 'events-categories'),
        'show_in_rest' => true
    );

    register_post_type('events', $args);




    // Add new taxonomy
    $labels = array(
        'name' => __('Events - Categories', 'bonyan'),
        'singular_name' => __('Event - Category', 'bonyan'),
        'search_items' => __('Search Categories', 'bonyan'),
        'all_items' => __('All Categories', 'bonyan'),
        'parent_item' => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item' => __('Edit Category', 'bonyan'),
        'update_item' => __('Update Category', 'bonyan'),
        'add_new_item' => __('Add New Category', 'bonyan'),
        'new_item_name' => __('New Category Name', 'bonyan'),
        'menu_name' => __('events Category', 'bonyan'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'events-categories', 'with_front' => false),
    );

    register_taxonomy('events-categories', 'events', $args);
}
add_action('init', 'register_events_cpt');