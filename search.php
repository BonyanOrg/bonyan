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



<section class="blogs-section">
	<div class="container">

		<div class="categories-and-search">
			<div class="input-holder search ms-auto">
				<?php get_search_form() ?>
			</div>
		</div>

		<div class="cards-container">

			<?php if (have_posts()) : ?>

				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

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
		<?php custom_pagination();
		?>
</section>

<?php
get_footer();
