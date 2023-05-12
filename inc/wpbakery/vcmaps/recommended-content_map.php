<?php
function recommended_content_vc()
{

	$container_array = array('Nothing' => 'none');
	$post_types = get_CPTs_with_name(['exclude' => ['main_slider', 'give_forms']], true);
	$container_array = array_merge($container_array, $post_types);
	$args = array(
		"name" => esc_html__("Recommended Content", 'DOMAIN'),
		"description" => esc_html__("Add Recommended Content", 'DOMAIN'),
		"base" => "recommended_content",
		'category' => esc_html__('BONYAN', 'DOMAIN'),
		'icon' => get_wpb_icon_url('recommended_content'),
		'params' => array(
			array(
				"type" => "dropdown",
				"admin_label" => false,
				"heading" => esc_html__("Get Events from a specific Category", 'ONYX_DOMAIN'),
				"param_name" => "recommended_content_post_type",
				"value" => $container_array,
			),

		)
	);


	vc_map($args);
}
add_action('vc_before_init', 'recommended_content_vc');