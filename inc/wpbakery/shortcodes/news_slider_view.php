<?php

/**
 * Header Title
 * 
 * news_slider_header_text
 * news_slider_cards_count
 * posts_categories
 * 
 */
if (!function_exists('news_slider_shortcode')) {
    function news_slider_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'news_slider_header_text'     => '',
            'news_slider_cards_count'     => '',
            'posts_categories'     => '',
        ), $atts));
        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('news_slider_register_style')) {
            function news_slider_register_style()
            {
                global $load_swiper_style;
                if (!$load_swiper_style) {
                    load_swiper_style('wp_bakery');
                }
        ?>
                <style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/primary-carousel.min.css');
                    ?>
                </style>
        <?php
            }
            news_slider_register_style();
        } ?>

        <div class="news custom-widget">
            <div class="container">
                <h2 class="bonyan-title white"><?php echo $news_slider_header_text ?></h2>
                <div class="swiper primary-carousel">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => $news_slider_cards_count,
                            "tax_query" => array(
                                array(
                                    "taxonomy" => 'category',
                                    'field'    => 'slug',
                                    'terms'    => $posts_categories,
                                ),
                            ),
                        );
                        $Posts = new WP_Query($args);
                        if ($Posts->have_posts()) {
                            while ($Posts->have_posts()) {
                                $Posts->the_post();
                        ?>

                                <div class="swiper-slide">
                                    <div class="primary-carousel-img">
                                        <img data-src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')); ?>" alt="" class="lazyload" loading="lazy">
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-title">
                                        <h2><?php the_title(); ?></h2>
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-desc">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-cta">

                                        <?php $infaque_campaign_id = get_option('infaque_campaign_id');
                                        if (!empty($infaque_campaign_id)) :
                                        ?>
                                            <button data-infaque-campaign-id="<?php echo $infaque_campaign_id ?>" class="donation-btn user-action-btn primary-btn no-border" data-target="infaque-modal"><?php _e('Donate', 'bonyan') ?></button>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(get_the_ID()) ?>"><?php _e('More', 'bonyan') ?></a>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        wp_reset_query();
                        ?>
                    </div>
                    <div class="autoplay-progress-container">
                        <div class="autoplay-progress">
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('news_slider_register_script')) {
            function news_slider_register_script()
            {
                global $load_swiper_script;
                if (!$load_swiper_script) {
                    load_swiper_script('wp_bakery');
                }
        ?>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/components/wpb/primary-carousel.min.js'); ?>
                </script>
        <?php
            }
            news_slider_register_script();
        } ?>



<?php
        return ob_get_clean();
    }
}

add_shortcode('news_slider', 'news_slider_shortcode');
