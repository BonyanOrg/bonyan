<?php
function projects_section_vc()
{

	$terms_array = get_terms("projects-categories", array(
		'hide_empty' => true,
	));
	$terms_dropdown_values = array('Nothing' => 'none');
	foreach ($terms_array as $term) {
		$terms_dropdown_values[$term->name] = $term->slug;
	}


	$args = array(
		"name"					=> esc_html__("Projects Section", 'DOMAIN'),
		"description"			=> esc_html__("Add Projects Section", 'DOMAIN'),
		"base"					=> "projects_section",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('projects_section'),
		'params'				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Header Text", 'text_DOMAIN'),
				"param_name"	=> "projects_section_header_text",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Cards Count", 'text_DOMAIN'),
				"param_name"	=> "projects_section_cards_count",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get projects from a specific Taxonomy", 'ONYX_DOMAIN'),
				"param_name"	=> "projects_categories",
				"value"			=> $terms_dropdown_values,

			),

		)
	);

	vc_map($args);
}
add_action('vc_before_init', 'projects_section_vc');
