<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('report_cards_shortcode')) {
    function report_cards_shortcode($atts)
    {



        $report_cards_items = vc_param_group_parse_atts($atts['report_cards_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('report_cards_register_style')) {
                function report_cards_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                report_cards_register_style();
            } ?>
        </style>
        <div class="cards-container grid-4">
            <?php

            foreach ($report_cards_items as $report_card) {
                // Get url of second button 
                $link     = vc_build_link($report_card['report_cards_url']);
                $report_cards_btn_link   = isset($link['url']) ? $link['url'] : '';
                $report_cards_btn_text   = isset($link['title']) ? $link['title'] : '';
            ?>
                <div class="file-card custom-widget">
                    <!-- File Icon (No need to be dynamic) -->
                    <div class="file-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/report_cat_icon.png'; ?>" alt="" class="lazyload">
                    </div>

                    <!-- File Name -->
                    <h3 class="file-name"><?php echo $report_card['report_cards_title']; ?></h3>

                    <!-- File CTAs -->
                    <div class="file-cta">
                        <a href="<?php echo $report_cards_btn_link  ?>" class="primary-btn download-file"><?php _e('More','bonyan') ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>






        <script>
            <?php //require_once(get_template_directory() . '/dist/js/components/wpb/quick-donation.min.js'); 
            ?>
        </script>



<?php
        return ob_get_clean();
    }
}

add_shortcode('report_cards', 'report_cards_shortcode');
