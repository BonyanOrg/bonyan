<?php
function locations_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Locations Bar", 'DOMAIN'),
		"description"			=> esc_html__("Add Locations Bar", 'DOMAIN'),
		"base"					=> "locations",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('locations'),
		"params"				=> array(

			array(
				"type"			=> "param_group",
				"param_name"	=> "locations_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					// array(
					// 	"type"			=> "attach_image",
					// 	"admin_label"	=> false,
					// 	"heading"		=> esc_html__("Image", 'text_DOMAIN'),
					// 	"param_name"	=> "locations_item_image",
					// 	"value"			=> "",
					// 	"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					// ),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__("Title", 'text_DOMAIN'),
						"param_name"	=> "locations_item_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
				),
			),
		)
	));
}
add_action('vc_before_init', 'locations_vc');
