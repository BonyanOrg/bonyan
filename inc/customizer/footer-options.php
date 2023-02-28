<?php 

//==================
// Footer Section
//==================

$wp_customize->add_section('footer_section', array(
    'title' => 'Footer Options  ',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));


//===============================
// Footer Logo Image Url
$wp_customize->add_setting('footer_logo_image_url', array(
    'default' => '',
    'section' => 'footer_section',

));
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_image_url', array(
    'label' => 'Footer Logo Image',
    'section' => 'footer_section',
    'settings' => 'footer_logo_image_url',
    'mime_type' => 'image',
)));
