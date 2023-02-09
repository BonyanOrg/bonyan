<?php

//==================
// Header Section
//==================

$wp_customize->add_section('header_section', array(
    'title' => 'Header Options  ',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));


//==============
// Header Style
$wp_customize->add_setting('header_style', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'header_style_shortcode',
    array(
        'label'    => 'Header Style',
        'section' => 'header_section',
        'settings' => 'header_style',
        'type'     => 'select',
        'choices' => array(
            'full' => 'Full',
            'boxed' => 'Boxed',
        ),
    )
);

//==============
// Give Form ID
$wp_customize->add_setting('give_form_id', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'give_form_id_shortcode',
    array(
        'label'    => 'Give Form ID',
        'section' => 'header_section',
        'settings' => 'give_form_id',
        'type'     => 'number',
    )
);

//==============
// GiveLoop Default Program ID
$wp_customize->add_setting('giveLoop_default_program_id', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'giveLoop_default_program_id_shortcode',
    array(
        'label'    => 'GiveLoop Default Program ID',
        'section' => 'header_section',
        'settings' => 'giveLoop_default_program_id',
        'type'     => 'number',
    )
);

//==============
// Default Donation Amount
$wp_customize->add_setting('default_donation_amount', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'default_donation_amount_shortcode',
    array(
        'label'    => 'Default Donation Amount',
        'section' => 'header_section',
        'settings' => 'default_donation_amount',
        'type'     => 'number',
    )
);

//==============
// Zakat Calculator Page Url
$wp_customize->add_setting('zakat_calc_url', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'zakat_calc_url_shortcode',
    array(
        'label'    => 'Zakat Calculator Page Url',
        'section' => 'header_section',
        'settings' => 'zakat_calc_url',
        'type'     => 'url',
    )
);

//==============
// Arabic Zakat Calculator Page Url
$wp_customize->add_setting('ar_zakat_calc_url', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'ar_zakat_calc_url_shortcode',
    array(
        'label'    => 'Arabic Zakat Calculator Page Url',
        'section' => 'header_section',
        'settings' => 'ar_zakat_calc_url',
        'type'     => 'url',
    )
);
