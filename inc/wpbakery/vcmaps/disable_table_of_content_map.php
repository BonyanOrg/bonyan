<?php
function disable_table_of_content_vc() {
	vc_map( array(
		"name"					=> esc_html__( "Disable Table Of Content", 'DOMAIN' ),
		"description"			=> esc_html__( "Disable Table Of Content", 'DOMAIN' ),
		"base"					=> "disable_table_of_content",
		'category'			    => esc_html__( 'BONYAN', 'DOMAIN' ),
		'icon'					=> get_wpb_icon_url('disable_table_of_content'),
	) );
}
add_action( 'vc_before_init', 'disable_table_of_content_vc' );
