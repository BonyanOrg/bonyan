<?php 

//==================
// Contact Information
//==================

$wp_customize->add_section('contact_info_section', array(
    'title' => 'Contact Information',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));



//===================================
// Contact Information Address
$wp_customize->add_setting('contact_info_address', array(
    'default' => '',
    'section' => 'contact_info_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'contact_info_address_shortcode',
    array(
        'label'    => 'Contact Information Address',
        'section' => 'contact_info_section',
        'settings' => 'contact_info_address',
        'type'     => 'text',
    )
);

//===================================
// Contact Information Address Url
$wp_customize->add_setting('contact_info_address_url', array(
    'default' => '',
    'section' => 'contact_info_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'contact_info_address_url_shortcode',
    array(
        'label'    => 'Contact Information Address Url',
        'section' => 'contact_info_section',
        'settings' => 'contact_info_address_url',
        'type'     => 'url',
    )
);

//===================================
// Contact Information Phone Number
$wp_customize->add_setting('contact_info_phone_number', array(
    'default' => '',
    'section' => 'contact_info_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'contact_info_phone_number_shortcode',
    array(
        'label'    => 'Contact Information Phone Number',
        'section' => 'contact_info_section',
        'settings' => 'contact_info_phone_number',
        'type'     => 'text',
    )
);

//===================================
// Contact Information Text Phone Number
$wp_customize->add_setting('contact_info_text_phone_number', array(
    'default' => '',
    'section' => 'contact_info_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'contact_info_text_phone_number_shortcode',
    array(
        'label'    => 'Contact Information Text Phone Number',
        'section' => 'contact_info_section',
        'settings' => 'contact_info_text_phone_number',
        'type'     => 'text',
    )
);