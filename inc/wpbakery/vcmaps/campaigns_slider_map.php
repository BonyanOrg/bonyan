<?php
function campaigns_slider_vc()
{


	//$custom_post_types=['none'=>'Nothing','post'=>'Post'];
	//$custom_post_types=array_merge($custom_post_types, get_custom_post_types());
	//$custom_post_types = array_combine($custom_post_types, $custom_post_types); // Make key like value in the array

	$tags_array = get_terms("campaigns-tags", array(
		'hide_empty' => true,
	));
	$terms_array = get_terms("campaigns-categories", array(
		'hide_empty' => true,
	));
	$tags_dropdown_values = array('Nothing' => 'none');
	$terms_dropdown_values = array('Nothing' => 'none');
	foreach ($tags_array as $tag) {
		$tags_dropdown_values[$tag->name] = $tag->slug;
	}
	foreach ($terms_array as $term) {
		$terms_dropdown_values[$term->name] = $term->slug;
	}


	$args = array(
		"name"					=> esc_html__("Campaigns Slider", 'DOMAIN'),
		"description"			=> esc_html__("Add Campaigns Slider", 'DOMAIN'),
		"base"					=> "campaigns_slider",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('campaigns_slider'),
		'params'				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Header Text", 'text_DOMAIN'),
				"param_name"	=> "campaigns_slider_header_text",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Link", 'ONYX_DOMAIN'),
				"param_name"	=> "campaigns_slider_btn_link",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'ONYX_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Cards Count", 'text_DOMAIN'),
				"param_name"	=> "campaigns_slider_cards_count",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "dropdown_multi",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get Campaigns from a specific tag", 'ONYX_DOMAIN'),
				"param_name"	=> "post_tag",
				"value"			=> $tags_dropdown_values,

			),
			array(
				"type"			=> "dropdown_multi",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get Campaigns from a specific Taxonomy", 'ONYX_DOMAIN'),
				"param_name"	=> "campaigns_categories",
				"value"			=> $terms_dropdown_values,

			),

		)
	);



	//array_push($args['params'], $post_types);


	vc_map($args);
}
add_action('vc_before_init', 'campaigns_slider_vc');
