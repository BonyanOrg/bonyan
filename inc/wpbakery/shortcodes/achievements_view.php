<?php

/**
 * Achievements
 * 
 */
if (!function_exists('achievements_shortcode')) {
    function achievements_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'achievements_main_header_title'     => '',
        ), $atts));

        $achievements_items = vc_param_group_parse_atts($atts['achievements_items']);
        $achievements_card_items = vc_param_group_parse_atts($atts['achievements_card_items']);


        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('achievements_register_style')) {
            function achievements_register_style()
            {
        ?><style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/program-stats.min.css');
                    ?>
                </style><?php
                    }
                    achievements_register_style();
                } ?>

        <div class="single-program custom-widget">
            <div class="content-with-info-panel">
                <div class="info-panel">
                    <div class="info-panel--card with-light">
                        <h2 class="info-panel-title"><?php echo $achievements_main_header_title ?></h2>

                        <div class="info-box no-underline">
                            <?php
                            foreach ($achievements_card_items as $achievements_card_item) {
                            ?>
                                <div class="info-item with">
                                    <span><?php echo $achievements_card_item['achievements_card_item_number'] ?></span>
                                    <span><?php echo $achievements_card_item['achievements_card_item_title'] ?></span>
                                </div>
                            <?php } ?>

                        </div>
                    </div>

                    <?php if (!empty($achievements_items)) : ?>
                        <div class="program-stats my-5">
                            <?php
                            foreach ($achievements_items as $achievement) {
                            ?>

                                <div class="program-stats-item">
                                    <div class="program-stats-icon">
                                        <div class="program-icon">
                                            <img src="<?php echo get_template_directory_uri() . '/dist/imgs/build.svg'; ?>" alt="achievement icon" class="placeholder-icon">
                                        </div>
                                    </div>

                                    <div class="program-stats-info">
                                        <span><?php echo $achievement['achievements_item_number'] ?></span>
                                        <span><?php echo $achievement['achievements_item_title'] ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <script>
            <?php //require_once(get_template_directory() . '/dist/js/components/wpb/quick-donation.min.js'); 
            ?>
        </script>

<?php
        return ob_get_clean();
    }
}

add_shortcode('achievements', 'achievements_shortcode');
