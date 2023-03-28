<?php

/**
 * Header Title
 * 
 * posts_slider_header_text
 * posts_slider_is_story
 * posts_slider_cards_count
 * posts_categories
 * 
 */
if (!function_exists('posts_slider_shortcode')) {
    function posts_slider_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'posts_slider_header_text'     => '',
            'posts_slider_is_story'     => '',
            'posts_slider_cards_count'     => '',
            'posts_categories'     => '',
        ), $atts));

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('posts_slider_register_style')) {
            function posts_slider_register_style()
            {
                global $load_swiper_style;
                if (!$load_swiper_style) {
                    load_swiper_style('wp_bakery');
                }
        ?>

                <style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/success-story-card.min.css');
                    //require_once(get_template_directory() . '/dist/css/components/wpb/blog-card.min.css');
                    ?>
                </style><?php
                    }
                    posts_slider_register_style();
                } ?>
        <!-- Start Campaign Cards -->
        <section class="success-story-section py-5">
            <div class="custom-widget">
                <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
                    <h2 class="bonyan-title primary-color bold"><?php echo $posts_slider_header_text ?></h2>
                    <div class="custom-swiper-nav ms-auto">
                        <div class="swiper-nav-btn swiper-prev-nav success-story-prev-arrow"></div>
                        <div class="swiper-nav-btn swiper-next-nav success-story-next-arrow"></div>
                    </div>
                </div>
                <div class="swiper success-story-carousel">
                    <div class="swiper-wrapper"><?php
                                                $args = array(
                                                    'post_type' => "post",
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => $posts_slider_cards_count,
                                                    "tax_query" => array(
                                                        array(
                                                            "taxonomy" => "category",
                                                            'field'    => 'slug',
                                                            'terms'    => $posts_categories,
                                                        ),
                                                    ),
                                                );
                                                $Posts = new WP_Query($args);
                                                if ($Posts->have_posts()) {
                                                    while ($Posts->have_posts()) {
                                                        $Posts->the_post();


                                                ?><div class="swiper-slide"><?php if ($posts_slider_is_story == "true") {
                                                                                get_template_part('template-parts/cards/content', 'story');
                                                                            } else {
                                                                                get_template_part('template-parts/cards/content', 'post', array("is_slider" => true));
                                                                            }     ?></div><?php
                                                                                        }
                                                                                    } ?></div>
                </div>
            </div>
        </section>
        <!-- End Campaign Cards -->
        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('posts_slider_register_script')) {
            function posts_slider_register_script()
            {
                global $load_swiper_script;
                if (!$load_swiper_script) {
                    load_swiper_script('wp_bakery');
                }
        ?>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/components/wpb/success-story-carousel.min.js'); ?>
                </script><?php
                        }
                        posts_slider_register_script();
                    } ?><?php
                        return ob_get_clean();
                    }
                }

                add_shortcode('posts_slider', 'posts_slider_shortcode');
