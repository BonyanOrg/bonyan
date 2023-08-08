<?php

/**
 * Sema Button
 * 
 * cta_btn_text
 * cta_btn_btn_link
 * 
 */
if (!function_exists('cta_btn_shortcode')) {
    function cta_btn_shortcode($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'cta_btn_text' => '',
                    'cta_btn_default_amount' => '',
                    'cta_btn_give_from_id' => '',
                    'cta_btn_text_align' => '',
                ),
                $atts
            )
        );
        $cta_btn_default_amount = !empty($cta_btn_default_amount) ? $cta_btn_default_amount : 100;


        ob_start(); ?>


        <div class="<?php echo $cta_btn_text_align ?>" style="font-size: 22px; font-weight: bold;">
            <button id="quick_donate_now_btn" data-target="givewp-modal"
                class="cta_btn user-action-btn primary-btn donation-btn no-border radius-15 py-3 px-5 my-3"
                data-amount="<?php echo $cta_btn_default_amount ?>" data-giveformid="<?php echo $cta_btn_give_from_id ?>"
                data-tagname="">
                <span>
                    <?php echo $cta_btn_text ?>
                </span>
            </button>
        </div>

        <?php
        return ob_get_clean();
    }
}

add_shortcode('cta_btn', 'cta_btn_shortcode');