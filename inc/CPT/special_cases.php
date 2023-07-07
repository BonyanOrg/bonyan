<?php

function register_special_cases_cpt()
{
    $labels = array(
        'name'                  => __('Special Cases', 'bonyan'),
        'singular_name'         => __('Special Case',  'bonyan'),
        'menu_name'             => __('Special Cases',  'bonyan'),
        'name_admin_bar'        => __('Special Cases',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New Special Cases', 'bonyan'),
        'new_item'              => __('New Special Cases', 'bonyan'),
        'edit_item'             => __('Edit Special Cases', 'bonyan'),
        'view_item'             => __('View Special Cases', 'bonyan'),
        'all_items'             => __('All Special Cases', 'bonyan'),
        'search_items'          => __('Search Special Cases', 'bonyan'),
        'parent_item_colon'     => __('Parent Special Cases:', 'bonyan'),
        'not_found'             => __('No Special Cases found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Special Cases custom post type.',
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
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'revisions'),
        'taxonomies'         => array('special_cases-tags', 'special_cases-categories'),
        'show_in_rest'       => true
    );

    register_post_type('special_case', $args);



    // Add new TAG
    $labels = array(
        'name'              => __('Special Cases - Tags', 'bonyan'),
        'singular_name'     => __('Special Cases - Tag',  'bonyan'),
        'search_items'      => __('Search Tags', 'bonyan'),
        'all_items'         => __('All Tags', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('Tags', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'sc_tag', 'with_front' => false),
    );

    register_taxonomy('special_cases-tags', 'special_case', $args);



    // Add new taxonomy
    $labels = array(
        'name'              => __('Special Cases - Categories', 'bonyan'),
        'singular_name'     => __('Special Cases - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'sc-categories', 'with_front' => false),
    );

    register_taxonomy('special_cases-categories', 'special_case', $args);
}
add_action('init', 'register_special_cases_cpt');
