<?php

function register_tenders_cpt()
{
    $labels = array(
        'name'                  => _x('Tender', 'bonyan'),
        'singular_name'         => _x('vacancie',  'bonyan'),
        'menu_name'             => _x('Tender',  'bonyan'),
        'name_admin_bar'        => _x('Tender',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New Tender', 'bonyan'),
        'new_item'              => __('New Tender', 'bonyan'),
        'edit_item'             => __('Edit Tender', 'bonyan'),
        'view_item'             => __('View Tender', 'bonyan'),
        'all_items'             => __('All Tender', 'bonyan'),
        'search_items'          => __('Search Tender', 'bonyan'),
        'parent_item_colon'     => __('Parent Tender:', 'bonyan'),
        'not_found'             => __('No Tender found.', 'bonyan'),
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
add_action('init', 'register_tenders_cpt');
