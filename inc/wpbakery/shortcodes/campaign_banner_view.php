<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('campaign_banner_shortcode')) {
    function campaign_banner_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'campaign_banner_description'     => '',
            'campaign_banner_image'     => '',
            'campaign_banner_url'     => '',
        ), $atts));

        // Get url of second button 
        $link     = vc_build_link($campaign_banner_url);
        $campaign_banner_btn_link   = isset($link['url']) ? $link['url'] : '';
        $campaign_banner_btn_text   = isset($link['title']) ? $link['title'] : '';

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('campaign_banner_register_style')) {
            function campaign_banner_register_style()
            {
        ?><style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/components/wpb/banner.min.css');
                    ?>
                </style><?php
                    }
                    campaign_banner_register_style();
                } ?>

        <div class="banner custom-widget">
            <!-- Banner Image -->
            <div class="banner-img">
                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/banner.png'; ?>" alt="" class="lazyload">
            </div>

            <!-- Banner Text -->
            <div class="banner-text">
                <span><?php echo $campaign_banner_description ?></span>
            </div>

            <!-- Banner CTA -->
            <div class="banner-cta">
                <a href="<?php echo $campaign_banner_btn_link ?>" class="reversed-primary-btn"><?php echo $campaign_banner_btn_text ?></a>
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

add_shortcode('campaign_banner', 'campaign_banner_shortcode');
