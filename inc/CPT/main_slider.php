<?php

function register_main_slider_cpt()
{
    $labels = array(
        'name'                  => _x('Main Slider', 'sema'),
        'singular_name'         => _x('Main Slider',  'sema'),
        'menu_name'             => _x('Main Slider',  'sema'),
        'name_admin_bar'        => _x('main_slider',  'sema'),
        'add_new'               => __('Add New', 'sema'),
        'add_new_item'          => __('Add New main_slider', 'sema'),
        'new_item'              => __('New main_slider', 'sema'),
        'edit_item'             => __('Edit main_slider', 'sema'),
        'view_item'             => __('View main_slider', 'sema'),
        'all_items'             => __('All main_slider', 'sema'),
        'search_items'          => __('Search main_slider', 'sema'),
        'parent_item_colon'     => __('Parent main_slider:', 'sema'),
        'not_found'             => __('No main_slider found.', 'sema'),
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => 'Main Slider custom post type.',
        'menu_icon'          => 'dashicons-format-gallery',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'author','revisions','thumbnail'),
        'taxonomies'         => array(),
        'rewrite'            => array('slug' => 'main_slider'),
        // 'has_archive'        => true,
        // 'show_in_rest'       => true
    );

    register_post_type('main_slider', $args);






    // // Add new taxonomy
    // $labels = array(
    //     'name'              => __('Campaigns - Categories', 'sema'),
    //     'singular_name'     => __('Campaign - Category',  'sema'),
    //     'search_items'      => __('Search Categories', 'sema'),
    //     'all_items'         => __('All Categories', 'sema'),
    //     'parent_item'       => __('Parent Category', 'sema'),
    //     'parent_item_colon' => __('Parent Category:', 'sema'),
    //     'edit_item'         => __('Edit Category', 'sema'),
    //     'update_item'       => __('Update Category', 'sema'),
    //     'add_new_item'      => __('Add New Category', 'sema'),
    //     'new_item_name'     => __('New Category Name', 'sema'),
    //     'menu_name'         => __('Category', 'sema'),
    // );

    // $args = array(
    //     'hierarchical'      => true,
    //     'labels'            => $labels,
    //     'show_ui'           => true,
    //     'show_in_rest'      => true,
    //     'show_admin_column' => true,
    //     'query_var'         => true,
    //     'rewrite'           => array('slug' => 'campaigns-categories', 'with_front' => false),
    // );

    // register_taxonomy('campaigns-categories', 'campaign', $args);
}
add_action('init', 'register_main_slider_cpt');
