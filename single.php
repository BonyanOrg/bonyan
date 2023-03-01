<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bonyan
 */

get_header();
?>
<?php get_template_part('template-parts/page', 'header'); ?>
<div class="inner-content">
	<?php the_content(); ?>
</div>

<?php
//get_sidebar();
get_footer();
