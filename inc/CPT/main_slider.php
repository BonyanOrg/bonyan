<?php

function register_main_slider_cpt()
{
    $labels = array(
        'name'                  => _x('Main Slider', 'bonyan'),
        'singular_name'         => _x('Main Slider',  'bonyan'),
        'menu_name'             => _x('Main Slider',  'bonyan'),
        'name_admin_bar'        => _x('main_slider',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New main_slider', 'bonyan'),
        'new_item'              => __('New main_slider', 'bonyan'),
        'edit_item'             => __('Edit main_slider', 'bonyan'),
        'view_item'             => __('View main_slider', 'bonyan'),
        'all_items'             => __('All main_slider', 'bonyan'),
        'search_items'          => __('Search main_slider', 'bonyan'),
        'parent_item_colon'     => __('Parent main_slider:', 'bonyan'),
        'not_found'             => __('No main_slider found.', 'bonyan'),
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
    //     'name'              => __('Campaigns - Categories', 'bonyan'),
    //     'singular_name'     => __('Campaign - Category',  'bonyan'),
    //     'search_items'      => __('Search Categories', 'bonyan'),
    //     'all_items'         => __('All Categories', 'bonyan'),
    //     'parent_item'       => __('Parent Category', 'bonyan'),
    //     'parent_item_colon' => __('Parent Category:', 'bonyan'),
    //     'edit_item'         => __('Edit Category', 'bonyan'),
    //     'update_item'       => __('Update Category', 'bonyan'),
    //     'add_new_item'      => __('Add New Category', 'bonyan'),
    //     'new_item_name'     => __('New Category Name', 'bonyan'),
    //     'menu_name'         => __('Category', 'bonyan'),
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
