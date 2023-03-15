<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bonyan
 */

get_header();
//get_template_part('template-parts/page', 'header');

?>
<div class="page-head" style="background: url(' <?php
												?>') ">
	<div class="container">
		<h1>
			<?php _e('Blog', 'bonyan') ?>
		</h1>

		<nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
		</nav>
	</div>
</div>
<?php

$queried_object = get_queried_object();
//$taxonomy_name = $queried_object->taxonomies[1];
?>

<section class="campaign-section">
	<div class="container">

		<?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => "category", 'archive' => true)); ?>


		<div class="campaign my-5">
			<div class="cards-container">

				<?php if (have_posts()) : ?>

					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();
					?>
						<?php get_template_part('template-parts/cards/content', $post->post_type); ?>


				<?php


					endwhile;

				//the_posts_navigation();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>
		</div>
		<?php custom_pagination();
		?>
	</div>
</section>

<?php
get_footer();
