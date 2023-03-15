<?php
function tenders_datatable_vc()
{


	$terms_array = get_terms("reports-categories", array(
		'hide_empty' => true,
	));
	$terms_dropdown_values = array('Nothing' => 'none');
	foreach ($terms_array as $term) {
		$terms_dropdown_values[$term->name] = $term->slug;
	}
	vc_map(array(
		"name"					=> esc_html__("Tenders", 'DOMAIN'),
		"description"			=> esc_html__("Add Tenders", 'DOMAIN'),
		"base"					=> "tenders_datatable",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('tenders_datatable'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title", 'text_DOMAIN'),
				"param_name"	=> "tenders_datatable_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			// array(
			// 	"type"			=> "dropdown",
			// 	"admin_label"	=> false,
			// 	"heading"		=> esc_html__("Get Tender from a specific Taxonomy", 'ONYX_DOMAIN'),
			// 	"param_name"	=> "reports_categories",
			// 	"value"			=> $terms_dropdown_values,
			// ),

		)
	));
}
add_action('vc_before_init', 'tenders_datatable_vc');
