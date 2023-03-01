<?php
function statistics_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Statistics", 'DOMAIN'),
		"description"			=> esc_html__("Add statistics", 'DOMAIN'),
		"base"					=> "statistics",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('statistics'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title", 'text_DOMAIN'),
				"param_name"	=> "statistics_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title Number", 'text_DOMAIN'),
				"param_name"	=> "statistics_title_number",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Image", 'text_DOMAIN'),
				"param_name"	=> "statistics_image",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "statistics_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "attach_image",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Image", 'text_DOMAIN'),
						"param_name"	=> "statistics_item_image",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__(" Title", 'text_DOMAIN'),
						"param_name"	=> "statistics_item_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
                    array(
                        "type"			=> "textfield",
                        "admin_label"	=> true,
                        "heading"		=> esc_html__("Item Title Number", 'text_DOMAIN'),
                        "param_name"	=> "statistics_item_Number",
                        "value"			=> "",
                        "description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
                    ),
				),
			),
		)
	));
}
add_action('vc_before_init', 'statistics_vc');
