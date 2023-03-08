<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('bonyan_values_card_shortcode')) {
    function bonyan_values_card_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'bonyan_values_card_title'     => '',
        ), $atts));

        $bonyan_values_card_items = vc_param_group_parse_atts($atts['bonyan_values_card_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('bonyan_values_card_register_style')) {
                function bonyan_values_card_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                bonyan_values_card_register_style();
            } ?>
        </style>


        <div class="bg-title-desc-container py-4 py-lg-5">
            <?php if (!empty($bonyan_values_card_title)) : ?>
                <!-- Background Title Description Widget for (values) -->
                <div class="container">
                    <h2 class="bonyan-title primary-color mb-3 mb-lg-5 text-center text-xl-start"><?php echo $bonyan_values_card_title; ?></h2>
                </div>

            <?php endif; ?>
            <div class="container">
                <div class="bg-title-desc-helper">

                    <?php

                    foreach ($bonyan_values_card_items as $card) {
                    ?>


                        <div class="bg-title-desc">
                            <!-- Image as Background -->
                            <div class="icon-title-desc-item bg-item">
                                <img data-src="<?php echo wp_get_attachment_image_url($card['bonyan_values_card_item_image'], "full"); ?>" alt="" class="lazyload" style="mask-image: url('<?php echo wp_get_attachment_image_url($card['bonyan_values_card_item_image'], "full"); ?>'); -webkit-mask-image: url('<?php echo wp_get_attachment_image_url($card['bonyan_values_card_item_image'], "full"); ?>');">
                            </div>

                            <!-- Title -->
                            <div class="bg-title-desc-item title-item">
                                <span><?php echo $card['bonyan_values_card_item_title']; ?></span>
                            </div>

                            <!-- Description -->
                            <div class="bg-title-desc-item desc-item">
                                <span><?php echo $card['bonyan_values_card_item_desc']; ?></span>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- End References -->
        <script>
            <?php //require_once(get_template_directory() . '/dist/js/components/wpb/quick-donation.min.js'); 
            ?>
        </script>



<?php
        return ob_get_clean();
    }
}

add_shortcode('bonyan_values_card', 'bonyan_values_card_shortcode');
