<?php

/**
 * Header Title
 * 
 * campaigns_slider_header_text
 * campaigns_slider_btn_link
 * campaigns_slider_cards_count
 * post_type
 * post_tag
 * campaigns_categories
 * 
 */
if (!function_exists('campaigns_slider_shortcode')) {
    function campaigns_slider_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'campaigns_slider_header_text'     => '',
            'campaigns_slider_btn_link'     => '',
            'campaigns_slider_cards_count'     => '',
            'post_type'     => '',
            'post_tag'     => '',
            'campaigns_categories'     => '',
        ), $atts));
        // Get url of full image size
        $link     = vc_build_link($campaigns_slider_btn_link);
        $a_href   = isset($link['url']) ? $link['url'] : '';

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('campaigns_slider_register_style')) {
            function campaigns_slider_register_style()
            {
        ?>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
        <?php
            }
            campaigns_slider_register_style();
        } ?>

        <!-- Start Campaign Cards -->
        <section class="campaigns-section py-5 custom-widget">
            <div class="container">

                <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
                    <h2 class="bonyan-title primary-color bold"><?php echo $campaigns_slider_header_text ?></h2>

                    <div class="custom-swiper-nav ms-auto hide-from-laptop-up">
                        <div class="swiper-nav-btn swiper-prev-nav campaigns-prev-arrow"></div>
                        <div class="swiper-nav-btn swiper-next-nav campaigns-next-arrow"></div>
                    </div>

                    <a href="<?php echo $a_href ?>" class="more-btn secondary-outlined-btn ms-3 primary-color hide-from-laptop-up">see more</a>
                </div>


                <div class="swiper campaigns-carousel">
                    <div class="swiper-wrapper">
                        <?php
                        $taxonomy = $post_tag != "" ? "campaigns-tags" : "campaigns-categories";
                        $args = array(
                            'post_type' => 'campaign',
                            'post_status' => 'publish',
                            'posts_per_page' => $campaigns_slider_cards_count,
                            "tax_query" => array(
                                array(
                                    "taxonomy" => $taxonomy,
                                    'field'    => 'slug',
                                    'terms'    => $post_tag != "" ? $post_tag : $campaigns_categories,
                                ),
                            ),
                        );
                        $campaign_Posts = new WP_Query($args);
                        if ($campaign_Posts->have_posts()) {
                            while ($campaign_Posts->have_posts()) {
                                $campaign_Posts->the_post();


                        ?>
                                <div class="swiper-slide">
                                    <?php get_template_part('template-parts/cards/campaign', '', array("is_slider" => true)); ?>
                                </div>
                        <?php

                            }
                        }



                        ?>
                    </div>
                </div>

                <a href="<?php echo $a_href ?>" class="more-btn secondary-outlined-btn primary-color hide-from-ipad-down mt-3 py-3 h-auto">see more</a>
        </section>
        <!-- End Campaign Cards -->


        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('campaigns_slider_register_script')) {
            function campaigns_slider_register_script()
            {
        ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/home-sliders.min.js'); ?>
                </script>
        <?php
            }
            campaigns_slider_register_script();
        } ?>



<?php
        return ob_get_clean();
    }
}

add_shortcode('campaigns_slider', 'campaigns_slider_shortcode');
