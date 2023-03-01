<?php

function register_projects_cpt()
{
    $labels = array(
        'name'                  => _x('Projects', 'bonyan'),
        'singular_name'         => _x('Project',  'bonyan'),
        'menu_name'             => _x('Projects',  'bonyan'),
        'name_admin_bar'        => _x('projects',  'bonyan'),
        'add_new'               => __('Add New', 'bonyan'),
        'add_new_item'          => __('Add New projects', 'bonyan'),
        'new_item'              => __('New projects', 'bonyan'),
        'edit_item'             => __('Edit projects', 'bonyan'),
        'view_item'             => __('View projects', 'bonyan'),
        'all_items'             => __('All Projects', 'bonyan'),
        'search_items'          => __('Search projects', 'bonyan'),
        'parent_item_colon'     => __('Parent projects:', 'bonyan'),
        'not_found'             => __('No projects found.', 'bonyan'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'projects custom post type.',
        'menu_icon'          => 'dashicons-megaphone',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'author', 'thumbnail',"editor"),
        'taxonomies'         => array('post_tag', 'projects-categories'),
        'show_in_rest'       => true
    );

    register_post_type('projects', $args);






    // Add new taxonomy
    $labels = array(
        'name'              => __('Projects - Categories', 'bonyan'),
        'singular_name'     => __('Projects - Category',  'bonyan'),
        'search_items'      => __('Search Categories', 'bonyan'),
        'all_items'         => __('All Categories', 'bonyan'),
        'parent_item'       => __('Parent Category', 'bonyan'),
        'parent_item_colon' => __('Parent Category:', 'bonyan'),
        'edit_item'         => __('Edit Category', 'bonyan'),
        'update_item'       => __('Update Category', 'bonyan'),
        'add_new_item'      => __('Add New Category', 'bonyan'),
        'new_item_name'     => __('New Category Name', 'bonyan'),
        'menu_name'         => __('Projects Category', 'bonyan'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'projects-categories', 'with_front' => false),
    );

    register_taxonomy('projects-categories', 'projects', $args);
}
add_action('init', 'register_projects_cpt');
