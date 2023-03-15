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

