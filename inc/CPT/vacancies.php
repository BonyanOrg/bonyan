<?php

function register_vacancies_cpt()
{
    $labels = array(
        'name'                  => _x('Vacancies', 'bonyan'),
        'singular_name'         => _x('Vacancy',  'bonyan'),
        'menu_name'             => _x('Vacancies',  'bonyan'),
        'name_admin_bar'        => _x('Vacancy',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New Vacancy', 'bonyan'),
        'new_item'              => __('New Vacancy', 'bonyan'),
        'edit_item'             => __('Edit Vacancy', 'bonyan'),
        'view_item'             => __('View Vacancy', 'bonyan'),
        'all_items'             => __('All Vacancies', 'bonyan'),
        'search_items'          => __('Search Vacancies', 'bonyan'),
        'parent_item_colon'     => __('Parent Vacancies:', 'bonyan'),
        'not_found'             => __('No Vacancies found.', 'bonyan'),
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
add_action('init', 'register_vacancies_cpt');
