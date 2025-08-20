<?php
function cta_quick_donate_btn_vc()
{
    vc_map(
        array(
            "name" => esc_html__("CTA Quick Donate Button", 'DOMAIN'),
            "description" => esc_html__("Add CTA Quick Donate Button with heart icon", 'DOMAIN'),
            "base" => "cta_quick_donate_btn",
            'category' => esc_html__('BONYAN', 'DOMAIN'),
            'icon' => get_wpb_icon_url('cta_quick_donate_btn'),
            "params" => array(

                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => esc_html__("Button Text", 'text_DOMAIN'),
                    "param_name" => "cta_quick_donate_btn_text",
                    "value" => "Donate Now",
                    "description" => esc_html__("Text to display on the button.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "heading" => esc_html__("Donation Default Amount", 'text_DOMAIN'),
                    "param_name" => "cta_quick_donate_btn_default_amount",
                    "value" => "100",
                    "description" => esc_html__("Default donation amount for the button.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "heading" => esc_html__("Give Form ID", 'text_DOMAIN'),
                    "param_name" => "cta_quick_donate_btn_give_form_id",
                    "value" => "",
                    "description" => esc_html__("Give WP form ID for donations.", 'text_DOMAIN'),
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => false,
                    "heading" => esc_html__("Button Width", 'text_DOMAIN'),
                    "param_name" => "cta_quick_donate_btn_width",
                    "value" => array(
                        'Auto' => 'auto',
                        'Full Width' => '100%',
                        'Fixed Width (411px)' => '411px',
                        'Small' => '200px',
                        'Medium' => '300px',
                        'Large' => '500px'
                    ),
                    "description" => esc_html__("Select button width.", 'text_DOMAIN'),
                    'group' => __('Design options', 'my-text-domain'),
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => false,
                    "heading" => esc_html__("Alignment", 'text_DOMAIN'),
                    "param_name" => "cta_quick_donate_btn_align",
                    "value" => array(
                        'Left' => 'text-start',
                        'Center' => 'text-center',
                        'Right' => 'text-end'
                    ),
                    "description" => esc_html__("Button alignment.", 'text_DOMAIN'),
                    'group' => __('Design options', 'my-text-domain'),
                ),
            )
        )
    );
}
add_action('vc_before_init', 'cta_quick_donate_btn_vc'); 