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
// Fundraise Provider
$wp_customize->add_setting('fundraise_provider', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',
    'transport' => 'refresh',

));
$wp_customize->add_control(
    'fundraise_provider_shortcode',
    array(
        'label'    => 'Is The Header Donation Button Is Fundraise_provider Up WP Forum',
        'section' => 'header_section',
        'settings' => 'fundraise_provider',
        'type'     => 'select',
        'choices' => array(
            'fundraise_up' => __('Fundraise Up', 'bonyan'),
            'give_wp' => __('Give Wp', 'bonyan'),
            'charitystack' => __('Charity Stack', 'bonyan'),
        ),
    )
);

//==============
// Fundraise Up Header Button Link
$wp_customize->add_setting('fundraise_up_header_btn_link', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',
    'transport' => 'refresh',

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
    'transport' => 'refresh',

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
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',

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
// Charity Stack Element ID
$wp_customize->add_setting('charity_stack_element_id', array(
    'default' => '',
    'section' => 'header_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'charity_stack_element_id_shortcode',
    array(
        'label'    => 'The Id of the form element',
        'section' => 'header_section',
        'settings' => 'charity_stack_element_id',
        'type'     => 'text',

    )
);
