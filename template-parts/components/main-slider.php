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

            // Debug: Check if we have slider posts
            if ($main_slider_posts->found_posts == 0) {
                echo '<!-- No Main Slider posts found. Please create some in WordPress Admin > Main Slider -->';
            }

            if ($main_slider_posts->have_posts()) {
                foreach ($main_slider_posts->posts as $slider_post) {
                    
                    $mad_give_form_id = esc_attr(get_post_meta($slider_post->ID, "mad_give_form_id", true));
                    $mad_choice = esc_attr(get_post_meta($slider_post->ID, "mad_choice", true));
                    $mad_url = esc_url(get_post_meta($slider_post->ID, "mad_url", true));
                    $mad_url_button_text = esc_attr(get_post_meta($slider_post->ID, "mad_url_button_text", true));
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
 
    <!-- Hero Donation Form - Positioned outside slider -->
    <div class="hero-donation-form-overlay">
        <div class="container">
            <div class="hero-donation-form">
                <div class="donation-form-card">
                    <div class="donation-form-header">
                        <h3><?php _e('Donate to help children in crisis', 'bonyan'); ?></h3>
                    </div>

                                                            <div class="donation-type-selector">
                                            <button class="donation-type-btn active" data-type="one-time">
                                                <?php _e('one-time', 'bonyan'); ?>
                                            </button>
                                            <button class="donation-type-btn" data-type="monthly">
                                                <?php _e('Monthly', 'bonyan'); ?>
                                            </button>
                                        </div>

                    <div class="donation-amounts">
                        <button class="amount-btn" data-amount="60">$60</button>
                        <button class="amount-btn active" data-amount="87">$87</button>
                        <button class="amount-btn" data-amount="120">$120</button>
                        <button class="amount-btn" data-amount="290">$290</button>
                    </div>

                    <div class="impact-description">
                        <p><?php _e('$87 gift could provide a family with a food parcel containing canned beans, hummus, olive oil, bottles of water and other essentials.', 'bonyan'); ?></p>
                    </div>

                    <div class="custom-amount-input">
                        <div class="input-wrapper">
                            <span class="currency-symbol">$</span>
                            <input type="text" placeholder="<?php _e('Enter other amount', 'bonyan'); ?>" class="custom-amount-field">
                        </div>
                    </div>

                    <?php
                    // Get a working GiveWP form ID for the hero donation form
                    $hero_give_form_id = get_option('give_form_id');
                    
                    // If no default form ID, try to get the first available GiveWP form
                    if (empty($hero_give_form_id)) {
                        $give_forms = get_posts(array(
                            'post_type' => 'give_forms',
                            'post_status' => 'publish',
                            'numberposts' => 1,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ));
                        
                        if (!empty($give_forms)) {
                            $hero_give_form_id = $give_forms[0]->ID;
                        }
                    }
                    ?>
                    <button class="donate-now-btn" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?> data-giveformid="<?php echo $hero_give_form_id ?>">
                        <i class="fa-solid fa-heart"></i>
                        <?php _e('Donate Now', 'bonyan'); ?>
                    </button>

                    <div class="payment-methods">
                        <span class="payment-icon visa">VISA</span>
                        <span class="payment-icon paypal">PayPal</span>
                        <span class="payment-icon mastercard">Mastercard</span>
                    </div>

                                                            <div class="security-message">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M17 8V8C17 5.23858 14.7614 3 12 3V3C9.23858 3 7 5.23858 7 8V8M12 15.5V15.5C13.1046 15.5 14 14.6046 14 13.5V13.5C14 12.3954 13.1046 11.5 12 11.5V11.5C10.8954 11.5 10 12.3954 10 13.5V13.5C10 14.6046 10.8954 15.5 12 15.5V11.5ZM12 15.5V18M9.5 21H14.5C16.8346 21 18.0019 21 18.8856 20.5277C19.5833 20.1548 20.1548 19.5833 20.5277 18.8856C21 18.0019 21 16.8346 21 14.5V14.5C21 12.1654 21 10.9981 20.5277 10.1144C20.1548 9.4167 19.5833 8.84525 18.8856 8.47231C18.0019 8 16.8346 8 14.5 8H9.5C7.16537 8 5.99805 8 5.11441 8.47231C4.4167 8.84525 3.84525 9.4167 3.47231 10.1144C3 10.9981 3 12.1654 3 14.5V14.5C3 16.8346 3 18.0019 3.47231 18.8856C3.84525 19.5833 4.4167 20.1548 5.11441 20.5277C5.99805 21 7.16537 21 9.5 21Z" stroke="#455973" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span><?php _e('Your donation is processed securely', 'bonyan'); ?></span>
                                        </div>
                </div>
            </div>
        </div>
    </div>
</div>