<?php

$queried_object = get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$taxonomy_name = $queried_object->taxonomies[1];
?>

<section class="campaign-section">
	<?php
	if (!empty(get_option('is_urgent_campaigns_enabled')))
		get_template_part('template-parts/components/urgent-campaigns', null, array("post" => $post));
	?>
	<div class="container">

		<?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, 'archive' => true)); ?>


		<div class="campaign my-2 my-lg-5">
			<div class="cards-container">

				<?php
				$args = array(
					'post_type'      => 'campaign',
					'posts_per_page' => get_option('posts_per_page'),
					'post_status'    => 'publish',
					'paged'          => $paged,
					'meta_key'       => 'co_campaign_end_date',
					'orderby'        => 'meta_value',
					'order'          => 'DESC',
					// 'meta_query'     => array(
					// 	array(
					// 		'key'     => 'co_campaign_end_date',    
					// 		'compare' => 'EXISTS',           
					// 	),
					// ),
				);

				$campaigns_posts = new WP_Query($args);

				if ($campaigns_posts->have_posts()) : ?>

					<?php
					/* Start the Loop */
					while ($campaigns_posts->have_posts()) :
						$campaigns_posts->the_post();
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
		<?php custom_pagination($campaigns_posts);
		?>
	</div>
</section>

<?php
