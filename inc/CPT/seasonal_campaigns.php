<?php

function register_seasonal_campaigns_cpt()
{
    $labels = array(
        'name'                  => _x('Seasonal Campaigns', 'bonyan'),
        'singular_name'         => _x('Media',  'bonyan'),
        'menu_name'             => _x('Seasonal Campaigns',  'bonyan'),
        'name_admin_bar'        => _x('seasonal_campaigns',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New seasonal_campaigns', 'bonyan'),
        'new_item'              => __('New seasonal_campaigns', 'bonyan'),
        'edit_item'             => __('Edit seasonal_campaigns', 'bonyan'),
        'view_item'             => __('View seasonal_campaigns', 'bonyan'),
        'all_items'             => __('All Media', 'bonyan'),
        'search_items'          => __('Search seasonal_campaigns', 'bonyan'),
        'parent_item_colon'     => __('Parent seasonal_campaigns:', 'bonyan'),
        'not_found'             => __('No seasonal_campaigns found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'seasonal_campaigns custom post type.',
        'menu_icon'          => 'dashicons-backup',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'seasonal_campaigns'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'author', 'thumbnail'),
        'taxonomies'         => array('post_tag', 'seasonal_campaigns-categories'),
        'show_in_rest'       => true
    );

    register_post_type('seasonal_campaigns', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('seasonal_campaigns - Categories', 'bonyan'),
        'singular_name'     => __('seasonal_campaigns - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('seasonal_campaigns Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'seasonal_campaigns-categories', 'with_front' => false),
    );

    register_taxonomy('seasonal_campaigns-categories', 'seasonal_campaigns', $args);
}
add_action('init', 'register_seasonal_campaigns_cpt');
