<?php
function testimonials_vc()
{
    vc_map(array(
        "name" => esc_html__("Testimonials", 'DOMAIN'),
        "description" => esc_html__("Add volunteer testimonials with ratings", 'DOMAIN'),
        "base" => "testimonials",
        'category' => esc_html__('BONYAN', 'DOMAIN'),
        'icon' => get_wpb_icon_url('testimonials'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Section Title", 'text_DOMAIN'),
                "param_name" => "testimonials_title",
                "value" => "Trusted by volunteers everywhere",
                "description" => esc_html__("Main heading for the testimonials section", 'text_DOMAIN'),
            ),
            array(
                "type" => "param_group",
                "param_name" => "testimonials_items",
                "heading" => esc_html__("Testimonials", 'text_DOMAIN'),
                "admin_label" => false,
                "value" => "",
                "description" => esc_html__("Add testimonial items", 'text_DOMAIN'),
                "params" => array(
                    array(
                        "type" => "dropdown",
                        "heading" => esc_html__("Rating", 'text_DOMAIN'),
                        "param_name" => "testimonial_rating",
                        "value" => array(
                            '5 Stars' => '5',
                            '4 Stars' => '4',
                            '3 Stars' => '3',
                            '2 Stars' => '2',
                            '1 Star' => '1',
                        ),
                        "std" => '5',
                        "description" => esc_html__("Select the rating for this testimonial", 'text_DOMAIN'),
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => esc_html__("Review Text", 'text_DOMAIN'),
                        "param_name" => "testimonial_text",
                        "value" => "When I volunteered, I discovered a new side of myself. For the first time, I felt like I was part of real change.",
                        "description" => esc_html__("Enter the testimonial text", 'text_DOMAIN'),
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => esc_html__("Reviewer Name", 'text_DOMAIN'),
                        "param_name" => "testimonial_author",
                        "value" => "Mohammad",
                        "description" => esc_html__("Enter the name of the person giving the testimonial", 'text_DOMAIN'),
                    ),
                ),
            ),
        )
    ));
}
add_action('vc_before_init', 'testimonials_vc'); 