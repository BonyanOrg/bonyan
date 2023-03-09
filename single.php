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
<div class="single-<?php echo get_post_type() ?>">
	<div class="container">
		<div class="inner-content">
		<?php
		if ($post_type === "campaign") {
			$give_form_id = get_post_meta(get_the_ID(), "co_give_form_id", true);
			if (!empty($give_form_id)) {
				echo do_shortcode('[give_form id="' . $give_form_id . '"]', true);
				//echo do_shortcode('[give_donor_wall form_id="' . $give_form_id . '"]');
			}
		} ?>
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php
//get_sidebar();
get_footer();
