<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('statistics_shortcode')) {
    function statistics_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'statistics_title'     => '',
            'statistics_title_number'     => '',
            'statistics_image'     => '',
        ), $atts));

        $statistics_items = vc_param_group_parse_atts($atts['statistics_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('statistics_register_style')) {
                function statistics_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                statistics_register_style();
            } ?>
        </style>



        <div class="custom-widget">
            <div class="statistics my-3 my-md-5">
                <div class="statistic-details">

                    <!-- Top title and total value -->
                    <div class="statistic-details--item statistic-title">
                        <h2 class=""><?php echo $statistics_title ?></h2>
                    </div>

                    <div class="statistic-details--item statistic-total">
                        <span><?php echo $statistics_title_number ?></span>
                    </div>

                    <!-- The grid of the stats -->
                    <div class="statistic-details--item statistic-grid">
                        <?php

                        foreach ($statistics_items as $statistic) {
                        ?>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <img data-src="<?php echo wp_get_attachment_image_url($statistic['statistics_item_image'], "full"); ?>" alt="<?php echo $statistic['statistics_item_title'] ?>" class="lazyload">
                                </div>

                                <div class="stat-details">
                                    <div class="stat-value"><span><?php echo $statistic['statistics_item_Number'] ?></span></div>
                                    <div class="stat-name"><span><?php echo $statistic['statistics_item_title'] ?></span></div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="statistic-img">
                    <img data-src="<?php echo wp_get_attachment_image_url($statistics_image, "full"); ?>" alt="" class="lazyload">
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

add_shortcode('statistics', 'statistics_shortcode');
