<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('locations_shortcode')) {
    function locations_shortcode($atts)
    {

        $locations_items = vc_param_group_parse_atts($atts['locations_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('locations_register_style')) {
                function locations_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                locations_register_style();
            } ?>
        </style>


        <div class="locations custom-widget" id="locations">
            <div class="locations-helper">

                <?php

                foreach ($locations_items as $card) {
                ?>
                    <div class="location-item">
                        <!-- Icon -->
                        <div class="location-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80.491" height="97.162" viewBox="0 0 80.491 97.162">
                                <path id="Path_10291" data-name="Path 10291" d="M71.7,70.7,43.246,99.162,14.788,70.7a40.246,40.246,0,1,1,56.916,0ZM43.246,60.132A17.887,17.887,0,1,0,25.359,42.245,17.887,17.887,0,0,0,43.246,60.132Zm0-8.943a8.943,8.943,0,1,1,8.943-8.943A8.943,8.943,0,0,1,43.246,51.189Z" transform="translate(-3 -2)" fill="#fff" style="mix-blend-mode: overlay;isolation: isolate" />
                            </svg>
                        </div>

                        <!-- Location Text -->
                        <div class="location-text">
                            <span><?php echo $card['locations_item_title'] ?></span>
                        </div>
                    </div>

                <?php } ?>
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

add_shortcode('locations', 'locations_shortcode');
