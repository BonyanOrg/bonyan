<?php

/**
 * Header Title
 * 
 * contact_info_text
 * contact_info_btn_link
 * 
 */
if (!function_exists('contact_info_shortcode')) {
    function contact_info_shortcode($atts, $content)
    {
        extract(shortcode_atts(array(
            'contact_info_icon' => '',
            'contact_info_is_phone' => '',
            'contact_info_is_email' => '',
            'contact_info_phone_number' => '',
            'contact_info_email' => '',
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

        <!-- This is the START of the component -->
        <div class="contact-item">
            <?php if ($contact_info_is_phone) : ?>
                <a href="tel:<?php echo $contact_info_phone_number; ?>" class="phone-numbers-container">
                <?php elseif ($contact_info_is_email) : ?>
                    <a href="mailto:<?php echo $contact_info_email; ?>" class="phone-numbers-container">
                    <?php else : ?>
                        <a href="#" class="phone-numbers-container">
                        <?php endif; ?>
                        <div class="contact-icon">
                            <?php if (!empty($contact_info_icon)) : ?>
                                <img data-src="<?php echo wp_get_attachment_image_url($contact_info_icon); ?>" alt="<?php echo $content; ?>" class="lazyload">
                            <?php endif; ?>
                        </div>

                        <div class="phone-numbers">
                            <span><?php echo $content; ?></span>
                        </div>
                        </a>
        </div>
        <!-- This is the END of the component -->

<?php
        return ob_get_clean();
    }
}

add_shortcode('contact_info', 'contact_info_shortcode');
