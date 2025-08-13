<?php
function faqs_vc()
{
    vc_map(array(
        "name" => esc_html__("FAQs", 'DOMAIN'),
        "description" => esc_html__("Add frequently asked questions with accordion", 'DOMAIN'),
        "base" => "faqs",
        'category' => esc_html__('BONYAN', 'DOMAIN'),
        'icon' => get_wpb_icon_url('faqs'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Section Title", 'text_DOMAIN'),
                "param_name" => "faqs_title",
                "value" => "Frequently Asked Questions",
                "description" => esc_html__("Main heading for the FAQs section", 'text_DOMAIN'),
            ),
            array(
                "type" => "param_group",
                "param_name" => "faqs_items",
                "heading" => esc_html__("FAQ Items", 'text_DOMAIN'),
                "admin_label" => false,
                "value" => "",
                "description" => esc_html__("Add FAQ questions and answers", 'text_DOMAIN'),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__("Question", 'text_DOMAIN'),
                        "param_name" => "faq_question",
                        "value" => "Why is building schools in war areas important?",
                        "description" => esc_html__("Enter the FAQ question", 'text_DOMAIN'),
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => esc_html__("Answer", 'text_DOMAIN'),
                        "param_name" => "faq_answer",
                        "value" => "Building schools in war areas is crucial because education provides hope, stability, and a path to a better future for children affected by conflict. It helps restore normalcy and empowers communities to rebuild their lives.",
                        "description" => esc_html__("Enter the answer to the question", 'text_DOMAIN'),
                    ),
                ),
            ),
        )
    ));
}
add_action('vc_before_init', 'faqs_vc'); 