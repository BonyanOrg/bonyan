<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('pdf_download_card_shortcode')) {
    function pdf_download_card_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'pdf_download_card_title'     => '',
            'pdf_download_card_file_link'     => '',
        ), $atts));
        $link     = vc_build_link($pdf_download_card_file_link);
        $file_link   = isset($link['url']) ? $link['url'] : '';


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('pdf_download_card_register_style')) {
                function pdf_download_card_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                pdf_download_card_register_style();
            } ?>
        </style>
        <div class="content-with-info-panel">
            <div class="file-card custom-widget">
                <!-- File Icon (No need to be dynamic) -->
                <div class="file-icon">
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/report-icon.png'; ?>" alt="" class="lazyload">
                </div>

                <!-- File Name -->
                <h3 class="file-name"><?php echo $pdf_download_card_title ?></h3>

                <!-- File CTAs -->
                <div class="file-cta">
                    <a href="<?php echo $file_link ?>" class="reversed-primary-btn preview-file">Preview</a>
                    <a href="<?php echo $file_link ?>" target="_blank" download class="primary-btn download-file">Download the file</a>
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

add_shortcode('pdf_download_card', 'pdf_download_card_shortcode');
