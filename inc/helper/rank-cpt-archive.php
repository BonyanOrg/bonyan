<?php 
function custom_rank_math_archive_title($title)
{
	if (is_post_type_archive()) {
		$post_type = get_post_type_object(get_post_type());
		$cpt_archive_title = get_option($post_type->name . '_archive_title');
		if ($cpt_archive_title) {
			$title = $cpt_archive_title;
		}
	}
	return $title;
}
add_filter('rank_math/frontend/title', 'custom_rank_math_archive_title');

function custom_rank_math_archive_description($description)
{
	if (is_post_type_archive()) {
		$post_type = get_post_type_object(get_post_type());
		$cpt_archive_description = get_option($post_type->name . '_archive_description');
		if ($cpt_archive_description) {
			$description = $cpt_archive_description;
		}
	}
	return $description;
}
add_filter('rank_math/frontend/description', 'custom_rank_math_archive_description'); 