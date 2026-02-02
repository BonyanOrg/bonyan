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

//================================================
// Enable urgent slider in Campaigns archive page
$wp_customize->add_setting('is_urgent_campaigns_enabled', array(
    'default' => '',
    'section' => 'campaigns_section',
    'type' => 'option',

));
$wp_customize->add_control(
    'is_urgent_campaigns_enabled_shortcode',
    array(
        'label'    => 'Enable urgent slider in Campaigns archive page',
        'section' => 'campaigns_section',
        'settings' => 'is_urgent_campaigns_enabled',
        'type'     => 'checkbox',
    )
);

//==============
// Campaign Archive SEO Title
$wp_customize->add_setting('campaign_archive_title', array(
    'default' => '',
    'section' => 'campaigns_section',
    'type' => 'option',
));
$wp_customize->add_control(
    'campaign_archive_title_control',
    array(
        'label'    => 'Campaigns Archive SEO Title',
        'section' => 'campaigns_section',
        'settings' => 'campaign_archive_title',
        'type'     => 'text',
    )
);

//==============
// Campaign Archive SEO Description
$wp_customize->add_setting('campaign_archive_description', array(
    'default' => '',
    'section' => 'campaigns_section',
    'type' => 'option',
));
$wp_customize->add_control(
    'campaign_archive_description_control',
    array(
        'label'    => 'Campaigns Archive Meta Description',
        'section' => 'campaigns_section',
        'settings' => 'campaign_archive_description',
        'type'     => 'textarea',
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

