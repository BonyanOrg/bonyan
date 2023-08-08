<?php
function cta_btn_vc()
{
    vc_map(
        array(
            "name" => esc_html__("CTA Button", 'DOMAIN'),
            "description" => esc_html__("Add CTA Button", 'DOMAIN'),
            "base" => "cta_btn",
            'category' => esc_html__('BONYAN', 'DOMAIN'),
            'icon' => get_wpb_icon_url('cta_btn'),
            "params" => array(

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => esc_html__("Button Text", 'text_DOMAIN'),
                    "param_name" => "cta_btn_text",
                    "value" => "",
                    "description" => esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "heading" => esc_html__("Donation Default Amount", 'text_DOMAIN'),
                    "param_name" => "cta_btn_default_amount",
                    "value" => "",
                    "description" => esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "heading" => esc_html__("Give Form ID", 'text_DOMAIN'),
                    "param_name" => "cta_btn_give_from_id",
                    "value" => "",
                    "description" => esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => false,
                    "heading" => esc_html__("Alignments", 'text_DOMAIN'),
                    "param_name" => "cta_btn_text_align",
                    "value" => array('Right' => 'text-start', 'Center' => 'text-center', 'Left' => 'text-end'),
                    "description" => esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                    'group' => __('Design options', 'my-text-domain'),

                ),
            )
        )
    );
}
add_action('vc_before_init', 'cta_btn_vc');