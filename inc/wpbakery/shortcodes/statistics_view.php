<?php

/**
 * Statistics Component
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
                        if (!empty($statistics_items)) {
                            foreach ($statistics_items as $statistic) {
                        ?>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/build.svg" alt="<?php echo $statistic['statistics_item_title'] ?>" class="build-icon">
                                </div>

                                <div class="stat-details">
                                    <div class="stat-value"><span><?php echo $statistic['statistics_item_Number'] ?></span></div>
                                    <div class="stat-name"><span><?php echo $statistic['statistics_item_title'] ?></span></div>
                                </div>
                            </div>
                        <?php 
                            }
                        } else {
                            // Show sample data if no items configured
                            $sample_items = array(
                                array('title' => 'Projects Completed', 'number' => '150+'),
                                array('title' => 'Communities Served', 'number' => '45'),
                                array('title' => 'Lives Impacted', 'number' => '2.1M'),
                                array('title' => 'Volunteers Active', 'number' => '500+'),
                                array('title' => 'Countries Reached', 'number' => '25'),
                                array('title' => 'Success Rate', 'number' => '98%')
                            );
                            
                            foreach ($sample_items as $item) {
                        ?>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/build.svg" alt="<?php echo $item['title'] ?>" class="build-icon">
                                </div>

                                <div class="stat-details">
                                    <div class="stat-value"><span><?php echo $item['number'] ?></span></div>
                                    <div class="stat-name"><span><?php echo $item['title'] ?></span></div>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="statistic-img">
                    <img src="<?php echo wp_get_attachment_image_url($statistics_image, "full"); ?>" alt="" class="statistics-image">
                </div>
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}

add_shortcode('statistics', 'statistics_shortcode');
