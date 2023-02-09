<?php
function tenders_datatable_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Tenders", 'DOMAIN' ),
		"description"			=> esc_html__( "Add Tenders", 'DOMAIN' ),
		"base"					=> "tenders_datatable",
		'category'			    => esc_html__( 'BONYAN', 'DOMAIN' ),
		'icon'					=> get_wpb_icon_url('tenders_datatable'),
	) );
}
add_action( 'vc_before_init', 'tenders_datatable_vc' );
