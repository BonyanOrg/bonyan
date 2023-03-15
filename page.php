<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bonyan
 */

get_header();
?>
<?php get_template_part('template-parts/page', 'header'); ?>


<div class="entry-content inner-content container">
	<?php
	the_content();
	?>
</div>

<?php
//get_sidebar();
get_footer();
