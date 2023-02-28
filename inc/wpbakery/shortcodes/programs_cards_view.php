<?php

/**
 * Programs Cards
 * programs_cards_programs_page_link
 * 
 */
if (!function_exists('programs_cards_shortcode')) {
    function programs_cards_shortcode($atts, $content)
    {
        extract(shortcode_atts(array(
            'programs_cards_programs_page_link'     => '',
        ), $atts));
        // Get url of full image size
        $link     = vc_build_link($programs_cards_programs_page_link);
        $a_href   = isset($link['url']) ? $link['url'] : '';
        ob_start();

?>
        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('programs_cards_register_style')) {
                function programs_cards_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/programs.min.css');
                }
                programs_cards_register_style();
            } ?>
        </style>
        <h2 class="bonyan-title">Programs</h2>
        <div class="program-cards-container custom-widget">
            <?php echo do_shortcode($content); ?>
            <div class="program-card">
                <div class="more-program-decor left-decor">
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/left-decor.png' ?>" alt="left decor" class="lazyload">
                </div>

                <div class="more-program-decor right-decor">
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/right-decor.png' ?>" alt="right decor" class="lazyload">
                </div>

                <div class="program-title">
                    <h3>More about the programs</h3>
                </div>

                <div class="program-btn">
                    <a href="<?php echo  $a_href ?>" class="primary-btn">More</a>
                </div>
            </div>
        </div>


    <?php
        return ob_get_clean();
    }
}

add_shortcode('programs_cards', 'programs_cards_shortcode');

/**
 * Program Card
 * programs_cards_image_url
 * programs_cards_icon_url
 * content
 * programs_cards_btn_link
 */
if (!function_exists('program_card_shortcode')) {
    function program_card_shortcode($atts, $content)
    {
        extract(shortcode_atts(array(
            'programs_cards_image_url'     => '',
            'programs_cards_icon_url'     => '',
            'programs_cards_text'     => '',
            'programs_cards_btn_link'     => '',
        ), $atts));

        // Get url of full image size
        $link     = vc_build_link($programs_cards_btn_link);
        $a_href   = isset($link['url']) ? $link['url'] : '';


    ?>
        <a href="<?php echo $a_href  ?>" class="program-card">
            <div class="program-img">
                <img data-src="<?php echo wp_get_attachment_image_url($programs_cards_image_url); ?>" alt="program 1" class="lazyload">
            </div>

            <div class="program-icon">
                <img data-src="<?php echo wp_get_attachment_image_url($programs_cards_icon_url); ?>" alt="program 1" class="lazyload">
            </div>

            <div class="program-title">
                <h3><?php echo $programs_cards_text ?></h3>
            </div>
        </a>

<?php
    }
}
add_shortcode('program_card', 'program_card_shortcode');
