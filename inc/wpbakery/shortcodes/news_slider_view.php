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
        ?>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">

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
                                        <img data-src="<?php echo !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : "https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&w=0&k=20&c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk="; ?>" alt="" class="lazyload" loading="lazy">
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-title">
                                        <h2><?php the_title(); ?></h2>
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-desc">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>

                                    <div class="primary-carousel-item primary-carousel-cta">

                                        <?php $give_form_id = get_post_meta(get_the_ID(), "po_give_form_id", true);
                                        if (!empty($give_form_id)) :
                                        ?>
                                            <button data-giveformid="<?php echo $give_form_id ?>" class="<?php echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; ?> user-action-btn primary-btn no-border" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?>><?php _e('Donate','bonyan') ?></button>
                                        <?php endif; ?>
                                        <a href="<?php echo get_permalink(get_the_ID()) ?>"><?php _e('More','bonyan') ?></a>
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
        ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
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
