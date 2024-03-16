<?php

function campaign_top_donor_vc()
{
	vc_map(array(
		"name"					=> esc_html__("Campaign Top Donor Section", 'DOMAIN'),
		"description"			=> esc_html__("Add Campaign Top Donor Section", 'DOMAIN'),
		"base"					=> "campaign_top_donor",
		'category'			    => esc_html__('BONYAN', 'DOMAIN'),
		'icon'					=> get_wpb_icon_url('campaign_top_donor'),
	));
}
add_action('vc_before_init', 'campaign_top_donor_vc');


add_action('current_screen', 'specify_top_donor_to_campaign_cpt');
function specify_top_donor_to_campaign_cpt($current_screen)
{
	if ($current_screen->post_type !== 'campaign') {
		vc_remove_element('campaign_top_donor');
	}
}
