<div class="main-slider">
    <!-- Swiper -->
    <div class="swiper main-carousel">
        <div class="swiper-wrapper">

            <?php

            $args = array(
                'post_type' => 'main_slider',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $main_slider_posts = new WP_Query($args);

            if ($main_slider_posts->have_posts()) {
                foreach ($main_slider_posts->posts as $slider_post) {
                    $mad_give_form_id = get_post_meta($slider_post->ID, "mad_give_form_id", true);
                    $mad_choice = get_post_meta($slider_post->ID, "mad_choice", true);
                    $mad_url = get_post_meta($slider_post->ID, "mad_url", true);
                    $mad_url_button_text = get_post_meta($slider_post->ID, "mad_url_button_text", true);

            ?>
                    <div class="swiper-slide">
                        <img src="<?php echo get_the_post_thumbnail_url($slider_post->ID) ?>" alt="Main Slider">
                        <!-- <div class="swiper-lazy-preloader"></div> -->

                        <div class="container">
                            <div class="slide-content">

                                <div class="main-carousel-sub-container">
                                    <span class="slide-title"><?php echo get_the_title($slider_post->ID) ?></span>

                                    <span class="slide-desc mt-4">
                                        <p><?php echo esc_html(get_the_excerpt($slider_post->ID)); ?></p>
                                    </span>

                                    <div class="main-carousel-cta my-4">
                                        <?php if ($mad_choice === 'give_id') : ?>
                                            <button data-giveformid="<?php echo $mad_give_form_id ?? "" ?>" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?> class="user-action-btn primary-btn <?php echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; ?> primary-btn-white-bg py-2 py-md-3 px-4 px-md-5 border-30 no-border">
                                                <strong><?php _e('Donate', 'bonyan'); ?></strong>
                                            </button>
                                            <!-- <a href="#" class="primary-btn"> More</a> -->
                                        <?php else : ?>
                                            <a href="<?php echo $mad_url ?>" class="user-action-btn primary-btn primary-btn-white-bg py-2 py-md-3 px-4 px-md-5 border-30 no-border">
                                                <strong><?php echo $mad_url_button_text ?></strong>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            wp_reset_query();
            ?>
        </div>

        <div class="swiper-pagination text-center mb-2 mb-xl-5"></div>
    </div>
</div>