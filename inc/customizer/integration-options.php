<?php

//==================
// Header Section
//==================

$wp_customize->add_section('integration_section', array(
    'title' => 'Integration Options',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));



//==============
// Zoho CRM 
$wp_customize->add_setting('zoho_crm', array(
    'default' => '',
    'section' => 'integration_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'zoho_crm_shortcode',
    array(
        'label'    => 'Zoho CRM Scenario Url',
        'section' => 'integration_section',
        'settings' => 'zoho_crm',
        'type'     => 'text',
    )
);

//==============
// Mautic 
$wp_customize->add_setting('mautic_lead', array(
    'default' => '',
    'section' => 'integration_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'mautic_lead_shortcode',
    array(
        'label'    => 'Mautic Scenario Url',
        'section' => 'integration_section',
        'settings' => 'mautic_lead',
        'type'     => 'text',
    )
);

