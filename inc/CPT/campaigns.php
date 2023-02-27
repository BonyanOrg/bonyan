<?php

function register_campaigns_cpt()
{
    $labels = array(
        'name'                  => _x('Campaigns', 'bonyan'),
        'singular_name'         => _x('campaign',  'bonyan'),
        'menu_name'             => _x('Campaigns',  'bonyan'),
        'name_admin_bar'        => _x('campaign',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New campaign', 'bonyan'),
        'new_item'              => __('New campaign', 'bonyan'),
        'edit_item'             => __('Edit campaign', 'bonyan'),
        'view_item'             => __('View campaign', 'bonyan'),
        'all_items'             => __('All Campaigns', 'bonyan'),
        'search_items'          => __('Search Campaigns', 'bonyan'),
        'parent_item_colon'     => __('Parent Campaigns:', 'bonyan'),
        'not_found'             => __('No Campaigns found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Campaigns custom post type.',
        'menu_icon'          => 'dashicons-sos',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'campaigns'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'revisions'),
        'taxonomies'         => array('campaigns-categories'),
        'show_in_rest'       => true
    );

    register_post_type('campaign', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('Campaigns - Categories', 'bonyan'),
        'singular_name'     => __('Campaign - Category',  'bonyan'),
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
        'rewrite'           => array('slug' => 'campaigns-categories', 'with_front' => false),
    );

    register_taxonomy('campaigns-categories', 'campaign', $args);

    // Add new TAG
    $labels = array(
        'name'              => __('Campaigns - Tags', 'bonyan'),
        'singular_name'     => __('Campaign - Category',  'bonyan'),
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
        'rewrite'           => array('slug' => 'tag', 'with_front' => false),
    );

    register_taxonomy('campaigns-tags', 'campaign', $args);
}
add_action('init', 'register_campaigns_cpt');
