<?php
function partners_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Partners", 'DOMAIN'),
		"description"			=> esc_html__("Add Partners", 'DOMAIN'),
		"base"					=> "partners",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('partners'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Main Header Text", 'text_DOMAIN'),
				"param_name"	=> "partners_main_header_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "partners_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
                    array(
                        "type"			=> "textfield",
                        "admin_label"	=> true,
                        "heading"		=> esc_html__(" Title", 'text_DOMAIN'),
                        "param_name"	=> "partners_item_title",
                        "value"			=> "",
                        "description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                    ),
					array(
						"type"			=> "attach_image",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Image", 'text_DOMAIN'),
						"param_name"	=> "partners_item_image",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					// array(
					// 	"type"			=> "vc_link",
					// 	"admin_label"	=> false,
					// 	"heading"		=> esc_html__("Url", 'text_DOMAIN'),
					// 	"param_name"	=> "partners_item_url",
					// 	"value"			=> "",
					// 	"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					// ),
				),
			),
		)
	));
}
add_action('vc_before_init', 'partners_vc');
