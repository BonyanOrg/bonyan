<?php
function vacancies_datatable_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Vacancies", 'DOMAIN' ),
		"description"			=> esc_html__( "Add Vacancies", 'DOMAIN' ),
		"base"					=> "vacancies_datatable",
		'category'			    => esc_html__( 'BONYAN', 'DOMAIN' ),
		'icon'					=> get_wpb_icon_url('vacancies_datatable'),
	) );
}
add_action( 'vc_before_init', 'vacancies_datatable_vc' );
