<?php
function classy_form_vc()
{



	vc_map(array(
		"name"					=> esc_html__("Classy Form", 'DOMAIN'),
		"description"			=> esc_html__("Add Classy Form", 'DOMAIN'),
		"base"					=> "classy_form",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('classy_form'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Campaign ID", 'text_DOMAIN'),
				"param_name"	=> "classy_form_campaign_id",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
		)
	));
}
add_action('vc_before_init', 'classy_form_vc');
