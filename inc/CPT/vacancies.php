<?php

function register_vacancies_cpt()
{
    $labels = array(
        'name'                  => _x('Vacancies', 'sema'),
        'singular_name'         => _x('Vacancy',  'sema'),
        'menu_name'             => _x('Vacancies',  'sema'),
        'name_admin_bar'        => _x('Vacancy',  'sema'),
        'add_new'               => __('Add New', 'sema'),
        'add_new_item'          => __('Add New Vacancy', 'sema'),
        'new_item'              => __('New Vacancy', 'sema'),
        'edit_item'             => __('Edit Vacancy', 'sema'),
        'view_item'             => __('View Vacancy', 'sema'),
        'all_items'             => __('All Vacancies', 'sema'),
        'search_items'          => __('Search Vacancies', 'sema'),
        'parent_item_colon'     => __('Parent Vacancies:', 'sema'),
        'not_found'             => __('No Vacancies found.', 'sema'),
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
        'description'        => 'Vacancies custom post type.',
        'menu_icon'          => 'dashicons-businessman',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author','revisions','thumbnail'),
        'taxonomies'         => array(),
        'rewrite'            => array('slug' => 'vacancies'),
        // 'has_archive'        => true,
        // 'show_in_rest'       => true
    );

    register_post_type('vacancy', $args);






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
add_action('init', 'register_vacancies_cpt');
