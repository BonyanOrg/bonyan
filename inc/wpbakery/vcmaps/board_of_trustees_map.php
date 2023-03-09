<?php
function board_of_trustees_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Board Of Trustees", 'DOMAIN'),
		"description"			=> esc_html__("Add Board Of Trustees", 'DOMAIN'),
		"base"					=> "board_of_trustees",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('board_of_trustees'),
		"params"				=> array(
			array(
				"type"			=> "param_group",
				"param_name"	=> "board_of_trustees_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "attach_image",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Image", 'text_DOMAIN'),
						"param_name"	=> "board_of_trustees_item_image",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__("Full Name", 'text_DOMAIN'),
						"param_name"	=> "board_of_trustees_item_full_name",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textarea",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Description", 'text_DOMAIN'),
						"param_name"	=> "board_of_trustees_item_desc",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "vc_link",
						"admin_label"	=> false,
						"heading"		=> esc_html__("CV Link", 'text_DOMAIN'),
						"param_name"	=> "board_of_trustees_file_link",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),

				),
			),
		)
	));
}
add_action('vc_before_init', 'board_of_trustees_vc');
