<?php

function register_special_cases_cpt()
{
    $labels = array(
        'name'                  => _x('Special Cases', 'bonyan'),
        'singular_name'         => _x('Media',  'bonyan'),
        'menu_name'             => _x('Special Cases',  'bonyan'),
        'name_admin_bar'        => _x('special_cases',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New special_cases', 'bonyan'),
        'new_item'              => __('New special_cases', 'bonyan'),
        'edit_item'             => __('Edit special_cases', 'bonyan'),
        'view_item'             => __('View special_cases', 'bonyan'),
        'all_items'             => __('All Media', 'bonyan'),
        'search_items'          => __('Search special_cases', 'bonyan'),
        'parent_item_colon'     => __('Parent special_cases:', 'bonyan'),
        'not_found'             => __('No special_cases found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'special_cases custom post type.',
        'menu_icon'          => 'dashicons-star-filled',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'special_cases'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'author', 'thumbnail'),
        'taxonomies'         => array('post_tag', 'special_cases-categories'),
        'show_in_rest'       => true
    );

    register_post_type('special_cases', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('special_cases - Categories', 'bonyan'),
        'singular_name'     => __('special_cases - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('special_cases Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'special_cases-categories', 'with_front' => false),
    );

    register_taxonomy('special_cases-categories', 'special_cases', $args);
}
add_action('init', 'register_special_cases_cpt');
