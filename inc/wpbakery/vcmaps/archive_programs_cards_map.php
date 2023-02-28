<?php
function archive_programs_cards_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Archive Programs Cards", 'DOMAIN'),
		"description"			=> esc_html__("Add Archive Programs Cards", 'DOMAIN'),
		"base"					=> "archive_programs_cards",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('archive_programs_cards'),
		'as_parent'               => array('only' => 'archive_program_card'),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'is_container'            => true,
		'js_view'                 => 'VcColumnView',

	));
}
add_action('vc_before_init', 'archive_programs_cards_vc');



function archive_program_card_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Program Card", 'DOMAIN'),
		"description"			=> esc_html__("Add Program Card", 'DOMAIN'),
		"base"					=> "archive_program_card",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('archive_program_card'),
		'as_child'               => array('only' => 'archive_programs_cards'),
		"params"				=> array(
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Icon Link", 'text_DOMAIN'),
				"param_name"	=> "archive_programs_cards_icon_url",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Image Link", 'text_DOMAIN'),
				"param_name"	=> "archive_programs_cards_image_url",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> true,
				"heading"		=> esc_html__("Header Title", 'text_DOMAIN'),
				"param_name"	=> "archive_programs_cards_text",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textarea_html",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Description", 'text_DOMAIN'),
				"param_name"	=> "content",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Link", 'ONYX_DOMAIN'),
				"param_name"	=> "archive_programs_cards_btn_link",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'ONYX_DOMAIN'),
			),
		)

	));
}
add_action('vc_before_init', 'archive_program_card_vc');



if (class_exists('WPBakeryShortCodesContainer')) {
	class WPBakeryShortCode_archive_programs_cards extends WPBakeryShortCodesContainer
	{
	}
}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_archive_program_card extends WPBakeryShortCode
	{
	}
}