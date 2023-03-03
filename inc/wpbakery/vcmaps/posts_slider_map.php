<?php
function posts_slider_vc()
{


	$terms_array = get_terms("category", array(
		'hide_empty' => true,
	));

	$terms_dropdown_values = array('Nothing' => 'none');

	foreach ($terms_array as $term) {
		$terms_dropdown_values[$term->name] = $term->slug;
	}


	$args = array(
		"name"					=> esc_html__("Posts Slider", 'DOMAIN'),
		"description"			=> esc_html__("Add Posts Slider", 'DOMAIN'),
		"base"					=> "posts_slider",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('posts_slider'),
		'params'				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Header Text", 'text_DOMAIN'),
				"param_name"	=> "posts_slider_header_text",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "checkbox",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Is First Button Is Donation Button", 'text_DOMAIN'),
				"param_name"	=> "posts_slider_is_story",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Cards Count", 'text_DOMAIN'),
				"param_name"	=> "posts_slider_cards_count",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get posts from a specific Taxonomy", 'ONYX_DOMAIN'),
				"param_name"	=> "posts_categories",
				"value"			=> $terms_dropdown_values,
			),

		)
	);


	vc_map($args);
}
add_action('vc_before_init', 'posts_slider_vc');
