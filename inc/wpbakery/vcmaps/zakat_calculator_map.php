<?php
function zakat_calc_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Zakat Calculator", 'DOMAIN'),
		"description"			=> esc_html__("Add Zakat Calculator", 'DOMAIN'),
		"base"					=> "zakat_calc",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('zakat_calc'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Under Head Description", 'text_DOMAIN'),
				"param_name"	=> "zakat_calc_under_head_description",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Nisab", 'ONYX_DOMAIN'),
				"param_name"	=> "zakat_calc_nisab_value",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'ONYX_DOMAIN'),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get posts from a specific Taxonomy", 'ONYX_DOMAIN'),
				"param_name"	=> "zakat_calc_platform_type",
				"value"			=> array('Give Wp' => 'give_wp', 'FundRaiseUp' => 'fund_raise_up'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Give Form ID", 'ONYX_DOMAIN'),
				"param_name"	=> "zakat_calc_form_id",
				"value"			=> "",
				"description"	=> esc_html__("Paste Just Give Form ID Not ShortCode", 'ONYX_DOMAIN'),
				'dependency' =>array(
					'element'   => 'zakat_calc_platform_type',
					'value' 	=> "give_wp",
				)
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("FundRaiseUp Form ID", 'ONYX_DOMAIN'),
				"param_name"	=> "zakat_calc_fund_raise_up_form_id",
				"value"			=> "",
				"description"	=> esc_html__("FundRaiseUp Form ID, for ex: Zakat-online", 'ONYX_DOMAIN'),
				'dependency' =>array(
					'element'   => 'zakat_calc_platform_type',
					'value' 	=> "fund_raise_up",
				)
			),
		)
	));
}
add_action('vc_before_init', 'zakat_calc_vc');
