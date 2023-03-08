<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('quick_donation_shortcode')) {
    function quick_donation_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'quick_donation_title'     => '',
            'quick_donation_description'     => '',
            'quick_donation_form_id'     => '',
            'quick_donation_give_loop_default_program_id'     => '',
            'quick_donation_tags_list'     => '',
        ), $atts));

        $quick_donation_prices = vc_param_group_parse_atts($atts['quick_donation_prices']);
        $tags_list_array = explode(',', $quick_donation_tags_list);
        $tags_list_array = get_terms(array(
            'taxonomy' => 'campaigns-tags',
            'include' => $tags_list_array,
            ''
        ));


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('quick_donation_register_style')) {
                function quick_donation_register_style()
                {
                    require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                quick_donation_register_style();
            } ?>
        </style>


        <!-- New -->
        <div class="quick-donation custom-widget">
            <div class="container">
                <div class="quick-donation--title text-center text-lg-start mb-3">
                    <h2><?php echo $quick_donation_title ?></h2>
                </div>
                <div class="quick-donation--content">
                    <div class="quick-donation--amount">




                        <div class="select-holder charity-type-select">
                            <div class="select-icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>

                            <select name="charity_select" id="charity_select">
                                <option value="">Choose Charity</option>
                                <?php foreach ($tags_list_array as $tag) : ?>
                                    <option value="<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="quick-donation--amount-btns">

                            <?php foreach ($quick_donation_prices as $key => $price) { ?>
                                <?php if ($price['donation_price_is_custom'] == 'true') { ?>

                                    <div class="quick-donation-amount--item other-amount">
                                        <input type="text" pattern="\d*" placeholder="<?php echo $price['donation_price_placeholder'] ?>" class="only-number">
                                    </div>

                                <?php } elseif ($price['donation_price_is_custom'] == 'false') { ?>
                                    <div class="quick-donation-amount--item" data-price_value="<?php echo $price['donation_price_value']; ?>">
                                        <span><?php echo $price['donation_price_title']; ?></span>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="select-holder programs-select">
                            <div class="select-icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                            <select name="program_select" id="program_select">
                                <option value="">Choose the program</option>
                            </select>
                        </div>

                        <div class="quick-donation--cta btn-with-animated-icon">
                            <button id="quick_donate_now_btn" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?> class="user-action-btn primary-btn donation-btn no-border radius-15" data-amount="66" data-giveformid="" data-tagName="00">
                                <span><?php _e('Donate', 'bonyan'); ?></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            <?php require_once(get_template_directory() . '/dist/js/components/wpb/quick-donation.min.js'); ?>
        </script>



<?php
        return ob_get_clean();
    }
}

add_shortcode('quick_donation', 'quick_donation_shortcode');
