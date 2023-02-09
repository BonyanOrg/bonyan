<?php

//==================
// Header Section
//==================
$wp_customize->add_section('general_section', array(
    'title' => 'Social Media Links',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));



//===============================
// Header Logo Image Url
// $wp_customize->add_setting('header_logo_image_url', array(
//     'default' => '',
//     'section' => 'general_section',

// ));
// $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo_image_url', array(
//     'label' => 'Header Logo Image',
//     'section' => 'general_section',
//     'settings' => 'header_logo_image_url',
//     'mime_type' => 'image',
// )));
//==============
// Facebook Url
$wp_customize->add_setting('facebook_url', array(
    'default' => '',
    'section' => 'general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'facebook_url_shortcode',
    array(
        'label'    => 'Facebook Url',
        'section' => 'general_section',
        'settings' => 'facebook_url',
        'type'     => 'url',
    )
);

//==============
// Youtube Url
$wp_customize->add_setting('youtube_url', array(
    'default' => '',
    'section' => 'general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'youtube_url_shortcode',
    array(
        'label'    => 'Youtube Url',
        'section' => 'general_section',
        'settings' => 'youtube_url',
        'type'     => 'url',
    )
);


//==============
// Twitter Url
$wp_customize->add_setting('twitter_url', array(
    'default' => '',
    'section' => 'general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'twitter_url_shortcode',
    array(
        'label'    => 'Twitter Url',
        'section' => 'general_section',
        'settings' => 'twitter_url',
        'type'     => 'url',
    )
);

//==============
// Twitter Url
$wp_customize->add_setting('twitter_url', array(
    'default' => '',
    'section' => 'general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'twitter_url_shortcode',
    array(
        'label'    => 'Twitter Url',
        'section' => 'general_section',
        'settings' => 'twitter_url',
        'type'     => 'url',
    )
);

//==============
// Instagram Url
$wp_customize->add_setting('instagram_url', array(
    'default' => '',
    'section' => 'general_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'instagram_url_shortcode',
    array(
        'label'    => 'Instagram Url',
        'section' => 'general_section',
        'settings' => 'instagram_url',
        'type'     => 'url',
    )
);
