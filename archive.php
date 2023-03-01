<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bonyan
 */

get_header();

get_template_part('template-parts/page', 'header');


get_template_part('template-parts/archive/content', get_post_type());


//get_sidebar();
get_footer();
