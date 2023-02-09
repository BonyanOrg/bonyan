<?php 
/**
 * Get SVG Icons Url From Dist Folder.
 * 
 * @param string $icon_name (filename)
 * @return string Icon Url (Path) From Theme Folder
 */
function get_icon_url($icon_name)
{
	$icon_url = is_child_theme() ?
		get_stylesheet_directory_uri() . '/dist/imgs/' . $icon_name . '.svg'
		: get_template_directory_uri() . '/dist/imgs/' . $icon_name . '.svg';
	return $icon_url;
}
/**
 * Get PNG Icons Url From Dist Folder For Wp Bakery Widgets.
 * 
 * @param string $icon_name (filename)
 * @return string Icon Url (Path) From Theme Folder
 */
function get_wpb_icon_url($icon_name)
{
	$icon_url = is_child_theme() ?
		get_stylesheet_directory_uri() . '/dist/imgs/wpb-icons/' . $icon_name . '.png'
		: get_template_directory_uri() . '/dist/imgs/wpb-icons/' . $icon_name . '.png';
	return $icon_url;
}