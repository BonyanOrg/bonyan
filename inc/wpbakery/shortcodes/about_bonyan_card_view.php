<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('about_bonyan_card_shortcode')) {
    function about_bonyan_card_shortcode($atts)
    {

        $about_bonyan_card_items = vc_param_group_parse_atts($atts['about_bonyan_card_items']);


        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('about_bonyan_card_register_style')) {
            function about_bonyan_card_register_style()
            {
        ?><style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/icon-title-desc.min.css');
                    ?>
                </style><?php
                    }
                    about_bonyan_card_register_style();
                } ?>


        <div class="icon-title-desc-container custom-widget">



            <?php

            foreach ($about_bonyan_card_items as $card) {
            ?>
                <div class="icon-title-desc">
                    <!-- Icon -->
                    <div class="icon-title-desc-item icon-item">
                        <img data-src="<?php echo wp_get_attachment_image_url($card['about_bonyan_card_item_image'], "full"); ?>" loading="lazy" alt="test" class="lazyload">

                    </div>

                    <!-- Title -->
                    <div class="icon-title-desc-item title-item">
                        <span><?php echo $card['about_bonyan_card_item_title']; ?></span>
                    </div>

                    <!-- Description -->
                    <div class="icon-title-desc-item desc-item">
                        <span><?php echo $card['about_bonyan_card_item_desc']; ?></span>
                    </div>
                </div>

            <?php } ?>

        </div>




<?php
        return ob_get_clean();
    }
}

add_shortcode('about_bonyan_card', 'about_bonyan_card_shortcode');
