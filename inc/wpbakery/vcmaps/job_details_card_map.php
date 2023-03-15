<?php
function job_details_card_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Job Details Card", 'DOMAIN'),
		"description"			=> esc_html__("Add Job Details Card", 'DOMAIN'),
		"base"					=> "job_details_card",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('job_details_card'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Main Header Text", 'text_DOMAIN'),
				"param_name"	=> "job_details_card_main_header_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Main Header Text", 'text_DOMAIN'),
				"param_name"	=> "job_details_card_main_link",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "job_details_card_items",
				"heading"		=> esc_html__("Items", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Different Type of statistics", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__("Text", 'text_DOMAIN'),
						"param_name"	=> "job_details_card_item_text",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html__("Description", 'text_DOMAIN'),
						"param_name"	=> "job_details_card_item_description",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
				),
			),
		)
	));
}
add_action('vc_before_init', 'job_details_card_vc');
