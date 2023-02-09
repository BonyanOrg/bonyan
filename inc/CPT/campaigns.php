<?php

function register_campaigns_cpt()
{
    $labels = array(
        'name'                  => _x('Campaigns', 'sema'),
        'singular_name'         => _x('campaign',  'sema'),
        'menu_name'             => _x('Campaigns',  'sema'),
        'name_admin_bar'        => _x('campaign',  'sema'),
        'add_new'               => __('Add New', 'sema'),
        'add_new_item'          => __('Add New campaign', 'sema'),
        'new_item'              => __('New campaign', 'sema'),
        'edit_item'             => __('Edit campaign', 'sema'),
        'view_item'             => __('View campaign', 'sema'),
        'all_items'             => __('All Campaigns', 'sema'),
        'search_items'          => __('Search Campaigns', 'sema'),
        'parent_item_colon'     => __('Parent Campaigns:', 'sema'),
        'not_found'             => __('No Campaigns found.', 'sema'),
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
        'taxonomies'         => array('post_tag', 'campaigns-categories'),
        'show_in_rest'       => true
    );

    register_post_type('campaign', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('Campaigns - Categories', 'sema'),
        'singular_name'     => __('Campaign - Category',  'sema'),
        'search_items'      => __('Search Categories', 'sema'),
        'all_items'         => __('All Categories', 'sema'),
        'parent_item'       => __('Parent Category', 'sema'),
        'parent_item_colon' => __('Parent Category:', 'sema'),
        'edit_item'         => __('Edit Category', 'sema'),
        'update_item'       => __('Update Category', 'sema'),
        'add_new_item'      => __('Add New Category', 'sema'),
        'new_item_name'     => __('New Category Name', 'sema'),
        'menu_name'         => __('Category', 'sema'),
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
}
add_action('init', 'register_campaigns_cpt');
