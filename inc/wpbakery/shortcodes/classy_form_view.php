<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('classy_form_shortcode')) {
    function classy_form_shortcode($atts)
    {

        extract(shortcode_atts(array(
            'classy_form_campaign_id' => '',

        ), $atts));




        ob_start();
?>
        <div class="classy-form" data-campaign-id="<?= intval($classy_form_campaign_id) ?>"></div>




<?php
        return ob_get_clean();
    }
}

add_shortcode('classy_form', 'classy_form_shortcode');
