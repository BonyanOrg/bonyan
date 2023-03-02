<?php
function pdf_download_card_vc()
{
	vc_map(array(
		"name"					=> esc_html__("PDF Download Card", 'DOMAIN'),
		"description"			=> esc_html__("Add PDF Download Card", 'DOMAIN'),
		"base"					=> "pdf_download_card",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('pdf_download_card'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title", 'text_DOMAIN'),
				"param_name"	=> "pdf_download_card_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("File Link", 'text_DOMAIN'),
				"param_name"	=> "pdf_download_card_file_link",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
		)
	));
}
add_action('vc_before_init', 'pdf_download_card_vc');
