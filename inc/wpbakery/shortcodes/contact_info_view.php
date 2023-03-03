<?php

/**
 * Header Title
 * 
 * contact_info_text
 * contact_info_btn_link
 * 
 */
if (!function_exists('contact_info_shortcode')) {
    function contact_info_shortcode($atts,$content)
    {
        extract(shortcode_atts(array(
            'contact_info_icon' => '',
        ), $atts));



        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('contact_info_register_style')) {
                function contact_info_register_style()
                {
                    require_once(get_template_directory() . '/dist/css/components/wpb/contact-info.min.css');
                }
                contact_info_register_style();
            } ?>
        </style>


        <div class="contact-item custom-widget">
            <div class="contact-info-item--icon">
                <img data-src="<?php echo wp_get_attachment_image_url($contact_info_icon); ?>" alt="<?php echo $content; ?>" class="lazyload">
            </div>

            <div class="contact-info-item--value">
                <span><?php echo $content; ?></span>
            </div>
        </div>



<?php
        return ob_get_clean();
    }
}

add_shortcode('contact_info', 'contact_info_shortcode');
