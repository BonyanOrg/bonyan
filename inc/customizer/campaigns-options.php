<?php

//==================
// Header Section
//==================

$wp_customize->add_section('campaigns_section', array(
    'title' => 'Campaigns Options',
    'description' => '',
    'panel' => 'site_settings',
    'priority' => 10,
));



//==============
// Urgent Campaigns Tag Slug
$wp_customize->add_setting('urgent_campaigns_tag_slug', array(
    'default' => '',
    'section' => 'campaigns_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'urgent_campaigns_tag_slug_shortcode',
    array(
        'label'    => 'Urgent Campaigns Tag Slug',
        'section' => 'campaigns_section',
        'settings' => 'urgent_campaigns_tag_slug',
        'type'     => 'text',
    )
);



// //==============
// // Default Donation Amount
// $wp_customize->add_setting('default_donation_amount', array(
//     'default' => '',
//     'section' => 'campaigns_section',
//     'type' => 'option',

// ));
// $wp_customize->add_control(
//     'default_donation_amount_shortcode',
//     array(
//         'label'    => 'Default Donation Amount',
//         'section' => 'campaigns_section',
//         'settings' => 'default_donation_amount',
//         'type'     => 'number',
//     )
// );

