<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bonyan
 */





get_header();
?>


<div class="page-head" style="background: url(' <?php
												?>') ">
	<div class="container">
		<h1>
			<?php _e('Search', 'bonyan') ?>
		</h1>
		<nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
		</nav>
	</div>
</div>

<?php

$search = get_search_query();
$post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
$search_cats = isset($_GET['cats']) ? $_GET['cats'] : '';
$search_from = $_GET['from'] ?? '';
$args = [
	's'	=> $search,
	'post_status' => 'publish',
	'posts_per_page' => get_option('posts_per_page'),
];
if (!empty($post_type)) {
	$args['post_type'] = $post_type;
}
$taxonomy_index = ($post_type == 'post') ? 0 : 1; // for CPT the first taxonomy is tag
$taxonomy = !empty($post_type) ? get_object_taxonomies($post_type)[$taxonomy_index] : '';

if (isset($search_cats)) {
	if (!empty($search_cats)) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => $taxonomy,
				'terms'    => $search_cats,
			),
		);
	}
}

if (isset($search_from)) {
	if (!empty($search_from)) {
		$from_date = explode('-', $search_from);
		$args['date_query'] = array(
			array(
				'after' => $search_from,
				//'year'  => $from_date[0],
				//'month' => $from_date[1],
				//'day'   => $from_date[2],
				//'compare'   => '>=',
				'inclusive' => true,
			),
		);
	}
}

$search_posts = new WP_Query($args);
?>


<section class="blogs-section">
	<div class="container">

		<div class="categories-and-search">
			<div class="input-holder search ms-auto">
				<?php get_search_form() ?>
			</div>
		</div>

		<div class="cards-container">

			<?php if ($search_posts->have_posts()) : ?>

				<?php
				/* Start the Loop */
				while ($search_posts->have_posts()) :
					$search_posts->the_post();

				?>
					<?php get_template_part('template-parts/cards/content-post'); ?>

			<?php


				endwhile;

			//the_posts_navigation();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>

		</div>
		<?php custom_pagination($search_posts);
		?>
</section>

<?php
get_footer();
