<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('board_of_trustees_shortcode')) {
    function board_of_trustees_shortcode($atts)
    {
        $board_of_trustees_items = vc_param_group_parse_atts($atts['board_of_trustees_items']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('board_of_trustees_register_style')) {
                function board_of_trustees_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                board_of_trustees_register_style();
            } ?>
        </style>


        <div class="container my-5">
            <div class="cards-container trustees-container custom-widget">

                <?php

                foreach ($board_of_trustees_items as $card) {
                    $link     = vc_build_link($card['board_of_trustees_file_link']);
                    $file_link   = isset($link['url']) ? $link['url'] : '';
                ?>
                    <!-- Repeater starts here  -->
                    <div class="trustee">
                        <!-- Trustee photo -->
                        <div class="trustee-item trustee-avatar">
                            <img data-src="<?php echo wp_get_attachment_image_url($card['board_of_trustees_item_image'], "full"); ?>" alt="" class="lazyload">
                        </div>

                        <!-- Trustee first name and last name -->
                        <div class="trustee-item trustee-fullname mt-2">
                            <span><?php echo $card['board_of_trustees_item_full_name'] ?></span>
                        </div>

                        <!-- Trustee overview -->
                        <div class="trustee-item trustee-desc my-3">
                            <span><?php echo $card['board_of_trustees_item_desc'] ?></span>
                        </div>

                        <!-- Trustee cv download button -->
                        <div class="trustee-item trustee-cta">
                            <a href="<?php echo $file_link ?>" download>
                                <span> <?php _e('Download CV','bonyan') ?> </span>
                                <div class="download-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.887" height="12.226" viewBox="0 0 11.887 12.226">
                                        <path id="Path_10542" data-name="Path 10542" d="M9.3,5.179,5.2,1.08,6.283,0l5.943,5.943L6.283,11.887,5.2,10.806l4.1-4.1H0V5.179Z" transform="translate(11.887) rotate(90)" fill="#6d54a7" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Repeater Ends here  -->

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

add_shortcode('board_of_trustees', 'board_of_trustees_shortcode');
