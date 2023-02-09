<?php

function register_tenders_cpt()
{
    $labels = array(
        'name'                  => _x('Tender', 'sema'),
        'singular_name'         => _x('vacancie',  'sema'),
        'menu_name'             => _x('Tender',  'sema'),
        'name_admin_bar'        => _x('Tender',  'sema'),
        'add_new'               => __('Add New', 'sema'),
        'add_new_item'          => __('Add New Tender', 'sema'),
        'new_item'              => __('New Tender', 'sema'),
        'edit_item'             => __('Edit Tender', 'sema'),
        'view_item'             => __('View Tender', 'sema'),
        'all_items'             => __('All Tender', 'sema'),
        'search_items'          => __('Search Tender', 'sema'),
        'parent_item_colon'     => __('Parent Tender:', 'sema'),
        'not_found'             => __('No Tender found.', 'sema'),
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => 'Tender custom post type.',
        'menu_icon'          => 'dashicons-money-alt',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author','revisions','thumbnail'),
        'taxonomies'         => array(),
        'rewrite'            => array('slug' => 'tenders'),
        // 'has_archive'        => true,
        // 'show_in_rest'       => true
    );

    register_post_type('tender', $args);






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
add_action('init', 'register_tenders_cpt');
