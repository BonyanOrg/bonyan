<?php
function contact_info_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Contact Info", 'DOMAIN'),
		"description"			=> esc_html__("Add Contact Info", 'DOMAIN'),
		"base"					=> "contact_info",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('contact_info'),
		"params"				=> array(
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Icon", 'ONYX_DOMAIN'),
				"param_name"	=> "contact_info_icon",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'ONYX_DOMAIN'),
			),
			array(
				"type"			=> "textarea_html",
				"admin_label"	=> true,
				"heading"		=> esc_html__(" Text", 'text_DOMAIN'),
				"param_name"	=> "content",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
		)
	));
}
add_action('vc_before_init', 'contact_info_vc');
