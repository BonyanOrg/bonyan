<?php
function qurbani_calculator_vc()
{
	vc_map(
		array(
			"name" => esc_html__("Qurbani Calculator", 'DOMAIN'),
			"description" => esc_html__("Add Qurbani Calculator", 'DOMAIN'),
			"base" => "qurbani_calculator",
			'category' => esc_html__('BONYAN', 'DOMAIN'),
			'icon' => get_wpb_icon_url('qurbani_calculator'),
			"params" => array(
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Title", 'text_DOMAIN'),
					"param_name" => "qurbani_calculator_title",
					"value" => "",
					"description" => esc_html__("The Name Of the Calculator", 'text_DOMAIN'),
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
					"type" => "dropdown",
					"admin_label" => false,
					"heading" => esc_html__("Donation Platform", 'text_DOMAIN'),
					"param_name" => "qurbani_calculator_platform",
					"value" => array('None' => 'none', 'Give WP' => 'give_wp', 'Fundraise Up' => 'fundraiseup'),
					"description" => esc_html__("The type of the donation platform", 'text_DOMAIN'),

				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Give Form ID", 'text_DOMAIN'),
					"param_name" => "qurbani_calculator_give_form_id",
					"value" => "",
					"description" => esc_html__("Give WP Form ID", 'text_DOMAIN'),
					'dependency'    => array(
						'element'   => 'qurbani_calculator_platform',
						'value' 	=> "give_wp",
					),
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("fundraiseup Form ID", 'text_DOMAIN'),
					"param_name" => "qurbani_calculator_fundraiseup_form_id",
					"value" => "",
					"description" => esc_html__("Fundraiseup Form ID Ex:qurbani", 'text_DOMAIN'),
					'dependency'    => array(
						'element'   => 'qurbani_calculator_platform',
						'value' 	=> "fundraiseup",
					),
				),
				array(
					"type" => "textfield",
					"admin_label" => true,
					"heading" => esc_html__("Custom Field Name", 'text_DOMAIN'),
					"param_name" => "qurbani_calculator_fundraiseup_custom_field_name",
					"value" => "",
					"description" => esc_html__("Fundraiseup Custom Field Ex:qurbani", 'text_DOMAIN'),
					'dependency'    => array(
						'element'   => 'qurbani_calculator_platform',
						'value' 	=> "fundraiseup",
					),
				),
				array(
					"type" => "param_group",
					"param_name" => "qurbani_calculator_groups",
					"heading" => esc_html__("Groups", 'text_DOMAIN'),
					"admin_label" => false,
					"value" => "",
					"description" => esc_html__("Donation Groups", 'text_DOMAIN'),
					"params" => array(
						array(
							"type" => "textfield",
							"admin_label" => true,
							"heading" => esc_html__("Group Name", 'text_DOMAIN'),
							"param_name" => "qurbani_calculator_group_name",
							"value" => "",
							"description" => esc_html__("'Group A - $70' For Example", 'text_DOMAIN'),
						),
						array(
							"type" => "textfield",
							"admin_label" => false,
							"heading" => esc_html__("Countries", 'text_DOMAIN'),
							"param_name" => "qurbani_calculator_group_countries",
							"value" => "",
							"description" => esc_html__("'Kenya, Malawi, Mali and Niger' For Example", 'text_DOMAIN'),
						),
						array(
							"type" => "textfield",
							"admin_label" => false,
							"heading" => esc_html__("Amount", 'text_DOMAIN'),
							"param_name" => "qurbani_calculator_group_amount",
							"value" => "",
							"description" => esc_html__("'70' For Example ", 'text_DOMAIN'),
						),
					),
				),
			)
		)
	);
}
add_action('vc_before_init', 'qurbani_calculator_vc');
