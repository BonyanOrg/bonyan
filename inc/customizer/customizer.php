<?php
function my_customize_register($wp_customize)
{
    $wp_customize->add_panel('site_settings', array(
        'title' => 'أعدادات الموقع',
        'description' => '',
        'priority' => 10,
    ));

    $wp_customize->add_panel('home_panel', array(
        'title' => 'أعدادت الصفحة الرئيسية',
        'description' => '',
        'priority' => 10,
    ));

    $wp_customize->add_panel('global_our_impact', array(
        'title' => 'Our Impact Panel',
        'description' => '',
        'priority' => 10,
    ));

    $wp_customize->add_panel('ar_global_our_impact', array(
        'title' => 'Arabic Our Impact Panel',
        'description' => '',
        'priority' => 10,
    ));

    //================
    // General Options
    require_once(__DIR__ . '/social-media-options.php');

    //===============
    // Header Options
    require_once(__DIR__ . '/header-options.php');
    
    //===============
    // Footer Options
    require_once(__DIR__ . '/footer-options.php');


}
add_action('customize_register', 'my_customize_register');
