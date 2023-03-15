<?php
function report_cards_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Report Cards", 'DOMAIN'),
		"description"			=> esc_html__("Add Report Cards", 'DOMAIN'),
		"base"					=> "report_cards",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('report_cards'),
		"params"				=> array(
			array(
				"type"			=> "param_group",
				"param_name"	=> "report_cards_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__("Card Title", 'text_DOMAIN'),
						"param_name"	=> "report_cards_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "vc_link",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Button Url", 'text_DOMAIN'),
						"param_name"	=> "report_cards_url",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
				),
			),
		)
	));
}
add_action('vc_before_init', 'report_cards_vc');
