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
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Icon Type", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_icon_type",
						"value"			=> array(
							'Image' => 'image',
							'Icon' => 'icon'
						),
						"description"	=> esc_html__("Choose between image or icon", 'text_DOMAIN'),
					),
					array(
						"type"			=> "attach_image",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Image", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_image",
						"value"			=> "",
						"description"	=> esc_html__("Upload an image for this achievement", 'text_DOMAIN'),
						"dependency"	=> array(
							"element"	=> "achievements_item_icon_type",
							"value"		=> array("image")
						),
					),
					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Icon", 'text_DOMAIN'),
						"param_name"	=> "achievements_item_icon",
						"value"			=> array(
							'Heart' => 'heart',
							'Star' => 'star',
							'Check' => 'check',
							'Users' => 'users',
							'Home' => 'home',
							'Globe' => 'globe',
							'Book' => 'book',
							'Graduation Cap' => 'graduation-cap',
							'Handshake' => 'handshake',
							'Lightbulb' => 'lightbulb',
							'Medal' => 'medal',
							'Trophy' => 'trophy'
						),
						"description"	=> esc_html__("Choose an icon for this achievement", 'text_DOMAIN'),
						"dependency"	=> array(
							"element"	=> "achievements_item_icon_type",
							"value"		=> array("icon")
						),
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
