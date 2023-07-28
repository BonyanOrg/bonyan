<?php
function quick_donation_vc()
{

	$campaign_terms_dropdown_values = array('Nothing' => 'none');
	$campaign_tags = get_terms(array(
		'taxonomy' => 'campaigns-tags',
	));
	foreach ($campaign_tags as $tag) {
		$tags_dropdown_values[$tag->name] = $tag->term_id;
	}

	$tags_checkbox_values = array();

	foreach ($campaign_tags as $tag) {
		$tags_checkbox_values[$tag->name] = $tag->term_id;
	}

	vc_map(array(
		"name"					=> esc_html__("Quick Donation", 'DOMAIN'),
		"description"			=> esc_html__("Add Quick Donation", 'DOMAIN'),
		"base"					=> "quick_donation",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('quick_donation'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title Text", 'text_DOMAIN'),
				"param_name"	=> "quick_donation_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Give Form ID", 'ONYX_DOMAIN'),
				"param_name"	=> "quick_donation_form_id",
				"value"			=> "",
				"description"	=> esc_html__("Paste Just Give Form ID Not ShortCode", 'ONYX_DOMAIN'),
			),
			// array(
			// 	"type"			=> "dropdown_multi",
			// 	"admin_label"	=> false,
			// 	"heading"		=> esc_html__("Tags List", 'ONYX_DOMAIN'),
			// 	"param_name"	=> "quick_donation_tags_list",
			// 	"value"			=> $tags_dropdown_values,
			// 	"description"	=> esc_html__("Paste Just Give Form ID Not ShortCode", 'ONYX_DOMAIN'),
			// ),

			array(
				"type"          => "checkboxes_sortable",
				"admin_label"   => false,
				"heading"       => esc_html__("Tags List", 'ONYX_DOMAIN'),
				"param_name"    => "quick_donation_tags_list",
				"value"         => $tags_checkbox_values,
				"description"   => esc_html__("Select and sort the tags for quick donation", 'ONYX_DOMAIN'),
			),

			array(
				"type"			=> "checkbox",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Is Fixed?", 'text_DOMAIN'),
				"param_name"	=> "quick_donation_is_fixed",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "param_group",
				"param_name"	=> "quick_donation_prices",
				"heading"		=> esc_html__("Donation Prices", 'text_DOMAIN'),
				"admin_label"	=> false,
				"value"			=> "",
				"description"	=> esc_html__("Donation Prices", 'text_DOMAIN'),
				"params"				=> array(
					array(
						"type"			=> "dropdown",
						"admin_label"	=> false,
						"heading"		=> esc_html__("let User Select", 'text_DOMAIN'),
						"param_name"	=> "donation_price_is_custom",
						"value"			=> array('No'   => 'false', 'Yes Let User Select'   => 'true'),
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
					),
					array(
						"type"			=> "checkbox",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Is Default Price", 'text_DOMAIN'),
						"param_name"	=> "donation_price_is_default_price",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
						'dependency'    => array(
							'element'   => 'donation_price_is_custom',
							'value' => 	"false"
						),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Price Placeholder", 'text_DOMAIN'),
						"param_name"	=> "donation_price_placeholder",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
						'dependency'    => array(
							'element'   => 'donation_price_is_custom',
							'value' 	=> "true",
						),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Price Title", 'text_DOMAIN'),
						"param_name"	=> "donation_price_title",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
						'dependency'    => array(
							'element'   => 'donation_price_is_custom',
							'value' => 	"false"
						),
					),
					array(
						"type"			=> "textfield",
						"admin_label"	=> false,
						"heading"		=> esc_html__("Price Value", 'text_DOMAIN'),
						"param_name"	=> "donation_price_value",
						"value"			=> "",
						"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
						'dependency'    => array(
							'element'   => 'donation_price_is_custom',
							'value' => 	"false"
						),
					),
				),
			),
		)
	));
}
add_action('vc_before_init', 'quick_donation_vc');
