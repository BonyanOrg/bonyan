<?php

$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomies[1];
?>

<section class="campaign-section">
	<div class="urgent-campaigns">
		<div class="container">
			<div class="swiper primary-carousel">
				<div class="swiper-wrapper">
					<?php
					$args = array(
						'post_type' =>  $post->post_type,
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy_name,
								'field' => 'slug',
								'terms' => "urgent-campaigns",
							)
						),
					);
					$urgent_campaigns = new WP_Query($args);
					if ($urgent_campaigns->have_posts()) :
						while ($urgent_campaigns->have_posts()) :
							$urgent_campaigns->the_post();
							$give_form_id = get_post_meta($post->ID, "co_give_form_id", true);
							$co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
							$co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);
					?>
							<div class="swiper-slide">
								<div class="primary-carousel-img">
									<img data-src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="lazyload" loading="lazy">
								</div>

								<div class="primary-carousel-item primary-carousel-label">
									<span>Urgent Campaigns</span>
								</div>

								<div class="primary-carousel-item primary-carousel-title">
									<h2><?php the_title() ?></h2>
								</div>

								<div class="primary-carousel-item primary-carousel-desc">
									<p><?php the_excerpt() ?></p>
								</div>


								<div class="primary-carousel-item primary-carousel-info">
									<?php $co_campaign_end_date = get_post_meta($post->ID, "co_campaign_end_date", true);
									if (!empty($co_campaign_end_date)) {
										//Convert to date
										$date_str = $co_campaign_end_date; //Your date
										$date = strtotime($date_str); //Converted to a PHP date (a second count)

										//Calculate difference
										$time_left = $date - time(); //time returns current time in seconds
										$days = floor($time_left / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)
										$hours = round(($time_left - $days * 60 * 60 * 24) / (60 * 60));
										if ($co_show_reaming_time == "yes") :
									?>
											<div class="carousel-info--item carousel-time-left">
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
													<path id="Path_209" data-name="Path 209" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm0-2a8,8,0,1,0-8-8A8,8,0,0,0,12,20Zm1-8h4v2H11V7h2Z" transform="translate(-2 -2)" fill="#fff" />
												</svg>


												<span>
													<?php echo $days > 0 ? $days % 2 != 0 ? $days . __(" Day Left ", 'bonyan') : $days . __(" Days Left ", 'bonyan') : ""; ?>
													<?php echo $hours != 0 ?  $days > 0 ? $hours . __(" Hour", 'bonyan') : $hours . __(" Hour left", 'bonyan') : ""; ?>
												</span>


											</div>
										<?php
										endif;
									}
									if ($co_show_donors_count == "yes") :
										?>

										<div class="carousel-info--item carousel-donors">
											<svg id="Group_269" data-name="Group 269" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
												<path id="Path_210" data-name="Path 210" d="M0,0H24V24H0Z" fill="none" />
												<path id="Path_211" data-name="Path 211" d="M3.161,4.469A6.5,6.5,0,0,1,12,4.141,6.5,6.5,0,0,1,21.179,13.3l-7.765,7.79a2,2,0,0,1-2.719.1l-.11-.1L2.821,13.295a6.5,6.5,0,0,1,.34-8.826ZM4.575,5.883a4.5,4.5,0,0,0-.146,6.21l.146.154L12,19.672l5.3-5.3-3.535-3.535-1.06,1.06A3,3,0,1,1,8.464,7.651l2.1-2.1a4.5,4.5,0,0,0-5.837.189l-.154.146Zm8.486,2.828a1,1,0,0,1,1.414,0l4.242,4.242.708-.706a4.5,4.5,0,0,0-6.211-6.51l-.153.146L9.879,9.065A1,1,0,0,0,9.8,10.392l.078.087a1,1,0,0,0,1.327.078l.087-.078Z" fill="#fff" />
											</svg>

											<span><?php echo give_get_form_donor_count($give_form_id); ?></span>
										</div>
									<?php endif; ?>
								</div>

								<div class="primary-carousel-item primary-carousel-cta">
									<button data-giveformid="<?php echo $give_form_id ?>" class="<?php echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; ?> user-action-btn" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?>>Donate</button>
									<a href="<?php echo get_permalink($post) ?>">More</a>
								</div>
							</div>

					<?php endwhile;
					endif; ?>
				</div>

				<div class="autoplay-progress-container">
					<div class="autoplay-progress">
						<span></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">

		<?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, 'archive' => true)); ?>


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
