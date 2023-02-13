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
                while ($main_slider_posts->have_posts()) {
                    $main_slider_posts->the_post();
                    $mad_give_form_id = get_post_meta($post->ID, "mad_give_form_id", true);

            ?>
                    <div class="swiper-slide">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Main Slider" loading="lazy">
                        <div class="swiper-lazy-preloader"></div>

                        <div class="container">
                            <div class="slide-content">

                                <div class="main-carousel-sub-container">
                                    <span class="slide-title"><?php the_title() ?></span>

                                    <span class="slide-desc mt-4">
                                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                    </span>

                                    <div class="main-carousel-cta my-4">
                                        <button id="donate_now_btn" data-form_id="<?php echo $mad_give_form_id ?? "" ?>" class="primary-btn primary-btn-white-bg py-2 py-md-3 px-4 px-md-5 border-30 no-border">
                                            <strong><?php _e('Donate', 'bonyan'); ?></strong>
                                        </button>
                                        <!-- <a href="#" class="primary-btn"> More</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>




        </div>

        <div class="swiper-pagination text-center mb-2 mb-xl-5"></div>
    </div>
</div>