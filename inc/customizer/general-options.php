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
