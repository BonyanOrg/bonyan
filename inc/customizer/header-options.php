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
// Is Fundraise Up Button
$wp_customize->add_setting('is_fundraise_up_btn', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'is_fundraise_up_btn_shortcode',
    array(
        'label'    => 'Is The Header Donation Button Is Fundraise Up WP Forum',
        'section' => 'header_section',
        'settings' => 'is_fundraise_up_btn',
        'type'     => 'checkbox',
    )
);

//==============
// Fundraise Up Header Button Link
$wp_customize->add_setting('fundraise_up_header_btn_link', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'fundraise_up_header_btn_link_shortcode',
    array(
        'label'    => 'The Link That Donar Should Go When Click On The Button',
        'section' => 'header_section',
        'settings' => 'fundraise_up_header_btn_link',
        'type'     => 'text',
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
