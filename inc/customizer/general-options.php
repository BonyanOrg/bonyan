<?php

//==================
// general Section
//==================

use function PHPSTORM_META\type;

$wp_customize->add_section('bonyan_general_section', array(
    'title' => 'General Options ',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));


//===============================
// Card Placeholder Image URL
$wp_customize->add_setting('general_placeholder_img_url', array(
    'default' => '',
    'section' => 'bonyan_general_section',
    'type' => 'option',

));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'general_placeholder_img_url', array(
    'label' => 'Card Placeholder Image URL',
    'section' => 'bonyan_general_section',
    'settings' => 'general_placeholder_img_url',
    'mime_type' => 'image',
)));

//===============================
// Google recaptcha site key
$wp_customize->add_setting('general_recaptcha_site_key', array(
    'default' => '',
    'section' => 'bonyan_general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'general_recaptcha_site_key',
    array(
        'label' => 'Recaptcha V3 Site Key',
        'section' => 'bonyan_general_section',
        'settings' => 'general_recaptcha_site_key',
        'mime_type' => 'text',
    )
);

//===============================
// Google recaptcha Secret key
$wp_customize->add_setting('general_recaptcha_secret_key', array(
    'default' => '',
    'section' => 'bonyan_general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'general_recaptcha_secret_key',
    array(
        'label' => 'Recaptcha V3 Secret Key',
        'section' => 'bonyan_general_section',
        'settings' => 'general_recaptcha_secret_key',
        'mime_type' => 'text',
    )
);

//===============================
// Google recaptcha Secret key
$wp_customize->add_setting('reports_archive_page_template', array(
    'default' => '',
    'section' => 'bonyan_general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'reports_archive_page_template_control',
    array(
        'label' => 'Reports Archive Page Template',
        'section' => 'bonyan_general_section',
        'settings' => 'reports_archive_page_template',
        'mime_type' => 'text',
    )
);
