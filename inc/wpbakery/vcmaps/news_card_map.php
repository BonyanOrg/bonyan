<?php
function news_card_vc()
{

	$args = array(
		"name"					=> esc_html__("News Card", 'DOMAIN'),
		"description"			=> esc_html__("Add News Card Component with Real Data", 'DOMAIN'),
		"base"					=> "news_card",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('news_card'),
		'params'				=> array(
			array(
				"type"			=> "dropdown",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Data Source", 'text_DOMAIN'),
				"param_name"	=> "news_card_data_source",
				"value"			=> array(
					"Manual Content" => "manual",
					"Real Post Data" => "real",
				),
				"description"	=> esc_html__("Choose whether to use manual content or real post data.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Specific Post ID", 'text_DOMAIN'),
				"param_name"	=> "news_card_post_id",
				"value"			=> "",
				"description"	=> esc_html__("Enter a specific post ID to display. Leave empty to show latest post.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "real"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Category Slug", 'text_DOMAIN'),
				"param_name"	=> "news_card_category",
				"value"			=> "",
				"description"	=> esc_html__("Enter category slug to filter posts (e.g., 'news', 'updates'). Leave empty for all categories.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "real"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Tag Slug", 'text_DOMAIN'),
				"param_name"	=> "news_card_tag",
				"value"			=> "",
				"description"	=> esc_html__("Enter tag slug to filter posts (e.g., 'urgent', 'featured'). Leave empty for all tags.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "real"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Fallback Title", 'text_DOMAIN'),
				"param_name"	=> "news_card_fallback_title",
				"value"			=> "Latest News",
				"description"	=> esc_html__("Title to show if no post is found.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "real"
				),
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Fallback Description", 'text_DOMAIN'),
				"param_name"	=> "news_card_fallback_description",
				"value"			=> "Stay updated with our latest news and updates.",
				"description"	=> esc_html__("Description to show if no post is found.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "real"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Text", 'text_DOMAIN'),
				"param_name"	=> "news_card_button_text",
				"value"			=> "Read More",
				"description"	=> esc_html__("Enter the text for the call-to-action button.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Custom Image", 'text_DOMAIN'),
				"param_name"	=> "news_card_image",
				"value"			=> "",
				"description"	=> esc_html__("Custom image override. Leave empty to use post featured image.", 'text_DOMAIN'),
			),
			// Manual content fields (for backward compatibility)
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Manual Tag Text", 'text_DOMAIN'),
				"param_name"	=> "news_card_tag_text",
				"value"			=> "News",
				"description"	=> esc_html__("Enter the tag text to display at the top of the card.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "manual"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Manual Title", 'text_DOMAIN'),
				"param_name"	=> "news_card_title",
				"value"			=> "Refugee Camps In Jordan",
				"description"	=> esc_html__("Enter the main title for the news card.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "manual"
				),
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Manual Description", 'text_DOMAIN'),
				"param_name"	=> "news_card_description",
				"value"			=> "Jordan is home to Za'atari, Azraq, and Mrajeeb Al Fhood refugee camps for Syrian refugees. Although a great number of Syrian refugees are living in Jordan, however, only 18 percent of refugees in Jordan live in refugee camps.",
				"description"	=> esc_html__("Enter the description text for the news card.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "manual"
				),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Manual Button Link", 'text_DOMAIN'),
				"param_name"	=> "news_card_button_link",
				"value"			=> "#",
				"description"	=> esc_html__("Enter the URL for the button link.", 'text_DOMAIN'),
				"dependency"	=> array(
					"element"	=> "news_card_data_source",
					"value"		=> "manual"
				),
			),
		)
	);

	vc_map($args);
}
add_action('vc_before_init', 'news_card_vc'); 