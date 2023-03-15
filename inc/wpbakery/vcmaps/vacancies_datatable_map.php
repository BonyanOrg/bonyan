<?php
function vacancies_datatable_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Vacancies", 'DOMAIN' ),
		"description"			=> esc_html__( "Add Vacancies", 'DOMAIN' ),
		"base"					=> "vacancies_datatable",
		'category'			    => esc_html__( 'BONYAN', 'DOMAIN' ),
		'icon'					=> get_wpb_icon_url('vacancies_datatable'),
		"params"				=> array(
			array(
				"type"			=> "textfield",
				"admin_label"	=> false,
				"heading"		=> esc_html__("Title", 'text_DOMAIN'),
				"param_name"	=> "vacancies_datatable_title",
				"value"			=> "",
				"description"	=> esc_html__("Type a description to show under the section title.", 'text_DOMAIN'),
			),
			

		)
	) );
}
add_action( 'vc_before_init', 'vacancies_datatable_vc' );
