<?php
function events_calendar_vc()
{
	$terms_array = get_terms(
		"events-categories",
		array(
			'hide_empty' => true,
		)
	);
	$terms_dropdown_values = array();

	foreach ($terms_array as $term) {
		$terms_dropdown_values[$term->name] = $term->term_id;
	}
	$args = array(
		"name" => esc_html__("Events Calendar", 'DOMAIN'),
		"description" => esc_html__("Add Events Calendar", 'DOMAIN'),
		"base" => "events_calendar",
		'category' => esc_html__('BONYAN', 'DOMAIN'),
		'icon' => get_wpb_icon_url('events_calendar'),
		'params' => array(
			array(
				"type" => "select2",
				"admin_label" => false,
				"heading" => esc_html__("Get Events from a specific Category", 'ONYX_DOMAIN'),
				"param_name" => "events_categories",
				"value" => $terms_dropdown_values,
			),

		)
	);


	vc_map($args);
}
add_action('vc_before_init', 'events_calendar_vc');