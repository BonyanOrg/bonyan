<?php

add_action('admin_menu', 'theme_settings_page_register');

function theme_settings_page_register()
{
    add_menu_page(
        'Theme Settings Page',
        // page title
        'Theme Settings Page',
        // menu title
        'administrator',
        // capability
        'theme_settings',
        // menu slug
        'theme_settings_render',
        // callback function
        'dashicons-admin-generic', // page icon
    );

    add_submenu_page(
        'theme_settings',
        "CPT Header Image",
        "CPT Header Image",
        'administrator',
        'theme_settings'
    );
    add_submenu_page(
        'theme_settings',
        "User tracker",
        "User Tracker",
        'administrator',
        'user_tracker',
        'user_tracker_function',
    );

    add_menu_page(
        'Mail Maker',
        // page title
        'Mail Maker',
        // menu title
        'manage_options',
        // capability
        'mail-maker-page',
        // menu slug
        'mail_maker_page_callback',
        // callback function
        'dashicons-email' // Icon
    );
    add_submenu_page(
        'theme_settings',
        'CPT Archive Title & Description',
        'CPT Archive Title & Description',
        // menu title
        'manage_options',
        // capability
        'cpt-archive-title-desc',
        // menu slug
        'cpt_archive_title_desc_page_callback',
        // callback function
    );
}
//==================
//    CPT Category Cover Image
//==================
require __DIR__ . '/CPT-cat-cover-image.php';

//==================
//    Mail Maker
//==================
require __DIR__ . '/mail-maker.php';

//==================
//    User tracker
//==================
require __DIR__ . '/user-tracker.php';

//============================================
//    CPT Archive Page Title & Description
//============================================
require __DIR__ . '/CPT-archive-title-desc.php';