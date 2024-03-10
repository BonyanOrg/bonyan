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
			<?php if (function_exists('rank_math_the_breadcrumbs'))
				rank_math_the_breadcrumbs(); ?>
		</nav>
	</div>
</div>

<?php

$search = get_search_query();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
$search_cats = isset($_GET['cats']) ? $_GET['cats'] : '';
$search_from = $_GET['from'] ?? '';
$args = [
	's' => $search,
	'post_status'    => 'publish',
	'paged'          => $paged,
	'posts_per_page' => get_option('posts_per_page'),
];
if (!empty($post_type)) {
	$args['post_type'] = $post_type;
}
$taxonomy_index = ($post_type == 'post') ? 0 : 1; // for CPT the first taxonomy is tag
$taxonomy = !empty($post_type) ? get_object_taxonomies($post_type)[$taxonomy_index] : '';


if (isset($search_cats) && !empty($taxonomy)) {
	$taxonomy_terms = get_terms(array('taxonomy' => $taxonomy,));
	$selected_term_data = get_term_by('id', $search_cats, $taxonomy);
	if (!empty($search_cats)) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => $taxonomy,
				'terms' => $search_cats,
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
		<?php
		$posts_types = get_CPTs_with_name(['exclude' => ['main_slider', 'give_forms']]); ?>
		<div class="advanced-search-container custom-widget">
			<form action="<?php echo home_url('/'); ?>" method="GET" class="advanced-search-form">
				<div class="input-holder">
					<input type="text" id="search_keyword" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search Keyword', 'bonyan'); ?>">
				</div>

				<div class="select-holder">
					<div class="select-icon">
						<i class="fa-solid fa-angle-down"></i>
					</div>

					<select name="post_type" id="adv-post-type" class="">
						<option value="">
							<?php _e('-- Search all items --', 'bonyan'); ?>
						</option>
						<?php

						foreach ($posts_types as $key => $value) {
							echo '<option value="' . $key . '" ' . selected($post_type, $key) . '>' . $value . '</option>';
						}

						?>
					</select>
				</div>

				<div class="select-holder">
					<div class="select-icon">
						<i class="fa-solid fa-angle-down"></i>
					</div>

					<select name="cats" id="adv-cats" class="">

						<?php if (!empty($selected_term_data) && !empty($taxonomy_terms)) : ?>
							<?php foreach ($taxonomy_terms as $term) : ?>
								<option value="<?php echo $term->term_id; ?>" <?php echo $selected_term_data->term_id == $term->term_id ? 'selected' : ''; ?>>
									<?php echo $term->name; ?>
								</option>
							<?php
							endforeach;
						else : ?>
							<option value="">
								<?php _e('-- Search all items --', 'bonyan'); ?>
							</option>
						<?php endif; ?>

					</select>
				</div>

				<div class="input-holder">
					<input type="date" name="from" placeholder="<?php _e('Without specifying a specific time', 'bonyan'); ?>" id="datepicker-input" value="<?php echo $search_from ?>" class="" autocomplete="off">
				</div>

				<?php print_lang_input_if_required_for_search(); ?>

				<button type="submit" class="secondary-btn">
					<?php _e('Search', 'bonyan'); ?>
				</button>


			</form>

		</div>

		<!-- <div class="categories-and-search">
			<div class="input-holder search ms-auto">
				<?php //get_search_form() 
				?>
			</div>
		</div> -->

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
				?>
				<p>
					<?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bonyan'); ?>
				</p>
			<?php

			endif;
			?>

		</div>
		<?php custom_pagination($search_posts);
		?>
</section>

<?php
get_footer();
