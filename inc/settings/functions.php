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
        'dashicons-email' // callback function
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