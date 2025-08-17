<?php
function news_card_vc()
{

	$args = array(
		"name"					=> esc_html__("News Card", 'DOMAIN'),
		"description"			=> esc_html__("Add News Card Component", 'DOMAIN'),
		"base"					=> "news_card",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('news_card'),
		'params'				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Tag Text", 'text_DOMAIN'),
				"param_name"	=> "news_card_tag_text",
				"value"			=> "News",
				"description"	=> esc_html__("Enter the tag text to display at the top of the card.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title", 'text_DOMAIN'),
				"param_name"	=> "news_card_title",
				"value"			=> "Refugee Camps In Jordan",
				"description"	=> esc_html__("Enter the main title for the news card.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textarea",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Description", 'text_DOMAIN'),
				"param_name"	=> "news_card_description",
				"value"			=> "Jordan is home to Za'atari, Azraq, and Mrajeeb Al Fhood refugee camps for Syrian refugees. Although a great number of Syrian refugees are living in Jordan, however, only 18 percent of refugees in Jordan live in refugee camps.",
				"description"	=> esc_html__("Enter the description text for the news card.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Text", 'text_DOMAIN'),
				"param_name"	=> "news_card_button_text",
				"value"			=> "See more",
				"description"	=> esc_html__("Enter the text for the call-to-action button.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Button Link", 'text_DOMAIN'),
				"param_name"	=> "news_card_button_link",
				"value"			=> "#",
				"description"	=> esc_html__("Enter the URL for the button link.", 'text_DOMAIN'),
			),
			array(
				"type"			=> "attach_image",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Image", 'text_DOMAIN'),
				"param_name"	=> "news_card_image",
				"value"			=> "",
				"description"	=> esc_html__("Select an image for the right side of the card.", 'text_DOMAIN'),
			),
		)
	);

	vc_map($args);
}
add_action('vc_before_init', 'news_card_vc'); 