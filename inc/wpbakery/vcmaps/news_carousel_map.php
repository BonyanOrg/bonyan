<?php
function news_carousel_vc()
{
	$tags_array = get_terms("post_tag", array(
		'hide_empty' => true,
	));
	$categories_array = get_terms("category", array(
		'hide_empty' => true,
	));
	$tags_dropdown_values = array('Nothing' => 'none');
	$categories_dropdown_values = array('Nothing' => 'none');
	foreach ($tags_array as $tag) {
		$tags_dropdown_values[$tag->name] = $tag->slug;
	}
	foreach ($categories_array as $category) {
		$categories_dropdown_values[$category->name] = $category->slug;
	}

	$args = array(
		"name"					=> esc_html__("News Carousel", 'DOMAIN'),
		"description"			=> esc_html__("Add News Carousel", 'DOMAIN'),
		"base"					=> "news_carousel",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('news_carousel'),
		'params'				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Header Text", 'text_DOMAIN'),
				"param_name"	=> "news_carousel_header_text",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "vc_link",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Link", 'ONYX_DOMAIN'),
				"param_name"	=> "news_carousel_btn_link",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'ONYX_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Cards Count", 'text_DOMAIN'),
				"param_name"	=> "news_carousel_cards_count",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get News from a specific tag", 'ONYX_DOMAIN'),
				"param_name"	=> "post_tag",
				"value"			=> $tags_dropdown_values,
			),
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Get News from a specific Category", 'ONYX_DOMAIN'),
				"param_name"	=> "news_categories",
				"value"			=> $categories_dropdown_values,
			),
		)
	);

	vc_map($args);
}
add_action('vc_before_init', 'news_carousel_vc'); 