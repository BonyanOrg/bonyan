<?php

function register_reports_cpt()
{
    $labels = array(
        'name'                  => _x('Reports', 'bonyan'),
        'singular_name'         => _x('Report',  'bonyan'),
        'menu_name'             => _x('reports',  'bonyan'),
        'name_admin_bar'        => _x('reports',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New reports', 'bonyan'),
        'new_item'              => __('New reports', 'bonyan'),
        'edit_item'             => __('Edit reports', 'bonyan'),
        'view_item'             => __('View reports', 'bonyan'),
        'all_items'             => __('All Reports', 'bonyan'),
        'search_items'          => __('Search reports', 'bonyan'),
        'parent_item_colon'     => __('Parent reports:', 'bonyan'),
        'not_found'             => __('No reports found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'reports custom post type.',
        'menu_icon'          => 'dashicons-welcome-widgets-menus',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'reports'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'author', 'thumbnail',"editor"),
        'taxonomies'         => array('post_tag', 'reports-categories'),
        'show_in_rest'       => true
    );

    register_post_type('reports', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('Reports - Categories', 'bonyan'),
        'singular_name'     => __('Reports - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('Reports Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'reports-categories', 'with_front' => false),
    );

    register_taxonomy('reports-categories', 'reports', $args);
}
add_action('init', 'register_reports_cpt');
