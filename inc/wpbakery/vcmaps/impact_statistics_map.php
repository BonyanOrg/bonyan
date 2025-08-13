<?php
function impact_statistics_vc()
{
    vc_map(array(
        "name" => esc_html__("Impact Statistics", 'DOMAIN'),
        "description" => esc_html__("Add impact statistics for children with four cards", 'DOMAIN'),
        "base" => "impact_statistics",
        'category' => esc_html__('BONYAN', 'DOMAIN'),
        'icon' => get_wpb_icon_url('statistics'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Section Title", 'text_DOMAIN'),
                "param_name" => "impact_title",
                "value" => "Our impact for children in 2024",
                "description" => esc_html__("Enter the main title for the impact statistics section", 'text_DOMAIN'),
            ),
            array(
                "type" => "param_group",
                "param_name" => "impact_cards",
                "heading" => esc_html__("Impact Cards", 'text_DOMAIN'),
                "admin_label" => false,
                "value" => "",
                "description" => esc_html__("Add up to 4 impact statistics cards", 'text_DOMAIN'),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "admin_label" => true,
                        "heading" => esc_html__("Icon", 'text_DOMAIN'),
                        "param_name" => "card_icon",
                        "value" => array(
                            'Face Kid' => 'face-kid',
                            'Globe' => 'globe',
                            'Heart Red' => 'heart-red',
                            'Star' => 'star',
                        ),
                        "description" => esc_html__("Select the icon for this card", 'text_DOMAIN'),
                    ),
                    array(
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => esc_html__("Number Value", 'text_DOMAIN'),
                        "param_name" => "card_number",
                        "value" => "",
                        "description" => esc_html__("Enter the numerical value (e.g., 113.6, 113)", 'text_DOMAIN'),
                    ),
                    array(
                        "type" => "textfield",
                        "admin_label" => true,
                        "heading" => esc_html__("Description Text", 'text_DOMAIN'),
                        "param_name" => "card_text",
                        "value" => "",
                        "description" => esc_html__("Enter the description text under the number", 'text_DOMAIN'),
                    ),
                ),
            ),
        )
    ));
}
add_action('vc_before_init', 'impact_statistics_vc'); 