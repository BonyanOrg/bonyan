<?php
function advanced_search_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Advanced Search", 'DOMAIN' ),
		"description"			=> esc_html__( "Add Advanced Search", 'DOMAIN' ),
		"base"					=> "advanced_search",
		'category'			    => esc_html__( 'BONYAN', 'DOMAIN' ),
		'icon'					=> get_wpb_icon_url('advanced_search'),
		// "params"				=> array(
		// 	array(
		// 		"type"			=> "textfield",
		// 		"admin_label"	=> false,
		// 		"heading"		=> esc_html__("Title", 'text_DOMAIN'),
		// 		"param_name"	=> "advanced_search_title",
		// 		"value"			=> "",
		// 		"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
		// 	),
			

		// )
	) );
}
add_action( 'vc_before_init', 'advanced_search_vc' );
