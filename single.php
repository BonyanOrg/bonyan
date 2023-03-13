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
<div class="single-<?php echo get_post_type() ?>" <?php echo get_post_type()=="campaign"?'style="background-color: #EAEAEA"':''; ?>>
	<div class="container">
		<div class="inner-content">
			<?php
			if ($post_type === "campaign") {
				 get_template_part('template-parts/components/top-donor', null, array("post_id" => get_the_ID()));
			} ?>
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php
//get_sidebar();
get_footer();
