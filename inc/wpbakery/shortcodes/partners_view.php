<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('partners_shortcode')) {
    function partners_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'partners_main_header_title'     => '',
        ), $atts));

        $partners_items = vc_param_group_parse_atts($atts['partners_items']);


        ob_start();
?>


        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('partners_register_style')) {
            function partners_register_style()
            {
                global $load_swiper_style;
                if (!$load_swiper_style) {
                    load_swiper_style('wp_bakery');
                }
                //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
            }
            partners_register_style();
        } ?>



        <!-- Start References -->
        <section class="references py-5 custom-widget">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
                    <h2 class="bonyan-title primary-color bold"><?php echo $partners_main_header_title ?></h2>

                    <div class="custom-swiper-nav ms-auto hide-from-laptop-up">
                        <div class="swiper-nav-btn swiper-prev-nav references-prev-arrow"></div>
                        <div class="swiper-nav-btn swiper-next-nav references-next-arrow"></div>
                    </div>
                </div>
                <div class="swiper referencesSwiper mt-3 mt-lg-5">
                    <div class="swiper-wrapper">
                        <?php

                        foreach ($partners_items as $partner) {
                        ?>
                            <div class="swiper-slide">
                                <img data-src="<?php echo wp_get_attachment_image_url($partner['partners_item_image'], "full"); ?>" loading="lazy" alt="test" class="lazyload">
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </section>
        <!-- End References -->
        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('partners_register_script')) {
            function partners_register_script()
            {
                global $load_swiper_script;
                if (!$load_swiper_script) {
                    load_swiper_script('wp_bakery');
                }
        ?>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/components/wpb/partners-carousel.min.js'); ?>
                </script>
        <?php
            }
            partners_register_script();
        } ?>



<?php
        return ob_get_clean();
    }
}

add_shortcode('partners', 'partners_shortcode');
