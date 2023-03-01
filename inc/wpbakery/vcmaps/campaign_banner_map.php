<?php
function campaign_banner_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Campaign Banner", 'DOMAIN'),
		"description"			=> esc_html__("Add Campaign Banner", 'DOMAIN'),
		"base"					=> "campaign_banner",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('campaign_banner'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Description", 'text_DOMAIN'),
				"param_name"	=> "campaign_banner_description",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Image", 'text_DOMAIN'),
				"param_name"	=> "campaign_banner_image",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Image", 'text_DOMAIN'),
				"param_name"	=> "campaign_banner_url",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
		)
	));
}
add_action('vc_before_init', 'campaign_banner_vc');
