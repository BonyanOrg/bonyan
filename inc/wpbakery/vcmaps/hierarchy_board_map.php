<?php
function hierarchy_board_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Hierarchy Board", 'DOMAIN'),
		"description"			=> esc_html__("Add Hierarchy Board", 'DOMAIN'),
		"base"					=> "hierarchy_board",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('hierarchy_board'),
		"params"				=> array(
			array(
				"type"			=> "textarea",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Map", 'text_DOMAIN'),
				"param_name"	=> "hierarchy_board_map",
				"value"			=> "{'id':'1','name':'Jack Hill','title':'Chairman and CEO','email':'amber@domain.com','img':'https://people.math.ethz.ch/~afigalli/avatar.jpg'}|",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			// default value {'id':'1','name':'Jack Hill','title':'Chairman and CEO','email':'amber@domain.com','img':'https://people.math.ethz.ch/~afigalli/avatar.jpg'}
		)
	));
}
add_action('vc_before_init', 'hierarchy_board_vc');
