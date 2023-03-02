<?php
function achievements_vc()
{
	vc_map(array(
		"name"					=> esc_html__("achievements", 'DOMAIN'),
		"description"			=> esc_html__("Add achievements", 'DOMAIN'),
		"base"					=> "achievements",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('achievements'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Main Header Text", 'text_DOMAIN'),
				"param_name"	=> "achievements_main_header_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "achievements_card_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Number", 'text_DOMAIN'),
						"param_name"	=> "achievements_card_item_number",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__(" Title", 'text_DOMAIN'),
						"param_name"	=> "achievements_card_item_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
				),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "achievements_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "attach_image",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Image", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_image",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__(" Number", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_number",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__(" Title", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
				),
			),
		)
	));
}
add_action('vc_before_init', 'achievements_vc');
