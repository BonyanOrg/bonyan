<?php

function register_stories_of_success_cpt()
{
    $labels = array(
        'name'                  => _x('Stories of Success', 'bonyan'),
        'singular_name'         => _x('stories_of_success',  'bonyan'),
        'menu_name'             => _x('Stories',  'bonyan'),
        'name_admin_bar'        => _x('stories_of_success',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New stories_of_success', 'bonyan'),
        'new_item'              => __('New stories_of_success', 'bonyan'),
        'edit_item'             => __('Edit stories_of_success', 'bonyan'),
        'view_item'             => __('View stories_of_success', 'bonyan'),
        'all_items'             => __('All Stories', 'bonyan'),
        'search_items'          => __('Search Stories', 'bonyan'),
        'parent_item_colon'     => __('Parent Stories:', 'bonyan'),
        'not_found'             => __('No Stories found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'stories_of_success custom post type.',
        'menu_icon'          => 'dashicons-camera-alt',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'stories_of_success'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'revisions'),
        'taxonomies'         => array('post_tag', 'stories_of_success-categories'),
        'show_in_rest'       => true
    );

    register_post_type('stories_of_success', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('Stories of Success - Categories', 'bonyan'),
        'singular_name'     => __('stories_of_success - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('Stories Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'stories_of_success-categories', 'with_front' => false),
    );

    register_taxonomy('stories_of_success-categories', 'stories_of_success', $args);
}
add_action('init', 'register_stories_of_success_cpt');
