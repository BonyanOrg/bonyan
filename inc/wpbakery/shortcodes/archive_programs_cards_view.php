<?php

/**
 * Programs Cards
 * 
 * 
 */
if (!function_exists('archive_programs_cards_shortcode')) {
    function archive_programs_cards_shortcode($atts, $content)
    {

        ob_start();

?>
        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('archive_programs_cards_register_style')) {
                function archive_programs_cards_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/programs.min.css');
                }
                archive_programs_cards_register_style();
            } ?>
        </style>
        <div class="archive-programs-cards-container custom-widget">
            <?php echo do_shortcode($content); ?>
        </div>


    <?php
        return ob_get_clean();
    }
}

add_shortcode('archive_programs_cards', 'archive_programs_cards_shortcode');

/**
 * Program Card
 * archive_programs_cards_image_url
 * archive_programs_cards_icon_url
 * content
 * archive_programs_cards_btn_link
 */
if (!function_exists('archive_program_card_shortcode')) {
    function archive_program_card_shortcode($atts, $content)
    {
        extract(shortcode_atts(array(
            'archive_programs_cards_image_url'     => '',
            'archive_programs_cards_icon_url'     => '',
            'archive_programs_cards_text'     => '',
            'archive_programs_cards_btn_link'     => '',
        ), $atts));

        // Get url of full image size
        $link     = vc_build_link($archive_programs_cards_btn_link);
        $a_href   = isset($link['url']) ? $link['url'] : '';


    ?>




        <a href="<?php echo $a_href  ?>" class="archive-program-card ">

            <div class="program-img-decor">
                <div class="program-img">
                    <img data-src="<?php echo wp_get_attachment_image_url($archive_programs_cards_image_url); ?>" alt="<?php echo $archive_programs_cards_text ?>" class="lazyload">
                </div>

                <div class="program-icon">
                    <img data-src="<?php echo wp_get_attachment_image_url($archive_programs_cards_icon_url); ?>" alt="<?php echo $archive_programs_cards_text ?>" class="lazyload">
                </div>
            </div>

            <div class="program-details">
                <div class="program-title">
                    <h2><?php echo $archive_programs_cards_text ?></h2>
                </div>

                <div class="program-desc">
                    <p><?php echo $content ?></p>
                </div>

                <div class="program-link">
                    <div>
                        <span><?php _e('More','bonyan') ?></span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="9.427" height="9.427" viewBox="0 0 9.427 9.427">
                            <path id="Path_10268" data-name="Path 10268" d="M13.842,8.677l-6.75,6.75L5.983,14.318l6.749-6.75H6.784V6H15.41v8.627H13.842Z" transform="translate(-5.983 -6)" fill="#5b5b5b" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>

        
<?php
    }
}
add_shortcode('archive_program_card', 'archive_program_card_shortcode');
