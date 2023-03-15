<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('job_details_card_shortcode')) {
    function job_details_card_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'job_details_card_main_header_title'     => '',
            'job_details_card_main_link'     => '',
        ), $atts));

        $link     = vc_build_link($job_details_card_main_link);
        $job_link   = isset($link['url']) ? $link['url'] : '';
        $job_details_card_items = vc_param_group_parse_atts($atts['job_details_card_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('job_details_card_register_style')) {
                function job_details_card_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                job_details_card_register_style();
            } ?>
        </style>

        <div class="content-with-info-panel custom-widget">
            <div class="info-panel">
                <div class="info-panel--card with-light">
                    <h2 class="info-panel-title"><?php _e('Job Details','bonyan') ?></h2>

                    <div class="info-box">

                        <?php foreach ($job_details_card_items as $job_details_card_item) { ?>
                            <div class="info-item">
                                <span><?php echo $job_details_card_item['job_details_card_item_text']  ?>: <?php echo $job_details_card_item['job_details_card_item_description']  ?></span>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="info-cta">
                        <a href="<?php $job_link ?>" class="primary-btn"><?php _e('Apply for this job','bonyan') ?></a>
                    </div>
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

add_shortcode('job_details_card', 'job_details_card_shortcode');
