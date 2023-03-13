<?php

$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomies[1];
?>

<section class="campaign-section">
<?php get_template_part('template-parts/components/urgent-campaigns', null, array("post" => $post)); ?>
	<div class="container">

		<?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, 'archive' => true)); ?>


		<div class="campaign my-2 my-lg-5">
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
