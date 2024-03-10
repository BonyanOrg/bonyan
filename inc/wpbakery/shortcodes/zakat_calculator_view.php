<?php

/**
 * Zakat Calculator  
 * 
 * zakat_calc_under_head_description
 * zakat_calc_nisab_value
 * 
 */
if (!function_exists('zakat_calc_shortcode')) {
    function zakat_calc_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'zakat_calc_under_head_description'     => '',
            'zakat_calc_nisab_value'     => '',
            'zakat_calc_platform_type'     => 'give_wp',
            'zakat_calc_form_id'     => '',
            'zakat_calc_fund_raise_up_form_id'     => '',
        ), $atts));

        ob_start();
?>


        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('zakat_calc_register_style')) {
                function zakat_calc_register_style()
                {
                    require_once(get_template_directory() . '/dist/css/components/wpb/zakat.min.css');
                }
                zakat_calc_register_style();
            } ?>
        </style>

        <form class="zakat-calculator-container custom-widget" onsubmit="isLowerThanNisab(event, this);">
            <div class="calc-decor">
                <img src="<?php echo get_template_directory_uri() . '/dist/imgs/dollar-watermark.png'; ?>" alt="dollar watermark (Zakat calcualtor)">
            </div>

            <p><strong><?php _e('Zakat Calculator', 'bonyan'); ?></strong></p>
            <p class="mb-4"><?php echo $zakat_calc_under_head_description ?></p>

            <div class="zakat-calculator-inputs">
                <div class="zakat-calculator-item">
                    <label class="mb-2" for="value-of-gold"><?php _e('Value of Gold', 'bonyan'); ?></label>
                    <input onkeyup="goldHandler(this)" type="number" min="0" step="0.01" id="value-of-gold" class="zakat-input-item only-number" placeholder="<?php _e('Write the gold, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="value-of-silver"><?php _e('Value of Silver', 'bonyan'); ?></label>
                    <input onkeyup="silverHandler(this)" type="number" min="0" step="0.01" id="value-of-silver" class="zakat-input-item only-number" placeholder="<?php _e('Write the silver, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="cash-in-hand"><?php _e('Cash in hand', 'bonyan'); ?></label>
                    <input onkeyup="cashInHandHandler(this)" type="number" min="0" step="0.01" id="cash-in-hand" class="zakat-input-item only-number" placeholder="<?php _e('Write the cash in hand, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="cash-in-bank-accounts"><?php _e('Cash in Bank accounts', 'bonyan'); ?></label>
                    <input onkeyup="cashInBankHandler(this)" type="number" min="0" step="0.01" id="cash-in-bank-accounts" class="zakat-input-item only-number" placeholder="<?php _e('Write cash in bank, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="business-investments"><?php _e('Business investments', 'bonyan'); ?></label>
                    <input onkeyup="businessInvestmentsHandler(this)" type="number" min="0" step="0.01" id="business-investments" class="zakat-input-item only-number" placeholder="<?php _e('Write the value, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="investment-certificates"><?php _e('Investment Certificates', 'bonyan'); ?></label>
                    <input onkeyup="investmentCertificatesHandler(this)" type="number" min="0" step="0.01" id="investment-certificates" class="zakat-input-item only-number" placeholder="<?php _e('Write the value, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="bank-deposit"><?php _e('Bank Deposit', 'bonyan'); ?></label>
                    <input onkeyup="bankDepositHandler(this)" type="number" min="0" step="0.01" id="bank-deposit" class="zakat-input-item only-number" placeholder="<?php _e('Write the value, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-item">
                    <label class="mb-2" for="Shares"><?php _e('Shares', 'bonyan'); ?></label>
                    <input onkeyup="sharesHandler(this)" type="number" min="0" step="0.01" id="Shares" class="zakat-input-item only-number" placeholder="<?php _e('Write the value, ex: 100$', 'bonyan'); ?>">
                </div>

                <div class="zakat-calculator-result">
                    <p class="mb-2"><strong><?php _e('Calculate Zakat', 'bonyan'); ?></strong></p>
                    <p class="calculated-zakat-amount mb-2"><strong><span>0.00</span>$</strong></p>
                    <p class="mb-3"><?php _e('Ensure that Zakat-Eligible Total', 'bonyan'); ?> <br /><?php _e('Exceeds Nisab', 'bonyan'); ?> - <?php echo $zakat_calc_nisab_value ?>$*</p>

                    <?php if ($zakat_calc_platform_type === 'give_wp') : ?>
                        <button class="user-action-btn primary-btn 
                        <?php echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; ?>" id="zakat-donation-btn" data-user-nisab="0" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?> data-nisab="<?php echo intval($zakat_calc_nisab_value) ?>" data-amount="50" data-giveformid="<?php echo $zakat_calc_form_id ?>">
                            <?php _e('Donate Now', 'bonyan'); ?>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
                                <path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
                            </svg>
                        </button>
                    <?php endif; ?>

                    <?php if ($zakat_calc_platform_type === 'fund_raise_up') : ?>
                        <a href="<?= esc_url(get_permalink() . '?form=Zakat-online&amount=50&modifyAmount=yes&recurring=once&lang=' . current_language()) ?>" class="primary-btn fund_raise_up-btn" id="zakat-donation-btn" data-user-nisab="0" data-nisab="<?php echo intval($zakat_calc_nisab_value) ?>" data-amount="50">
                            <?php _e('Donate Now', 'bonyan'); ?>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.485" viewBox="0 0 20 18.485">
                                <path id="Path_150" data-name="Path 150" d="M12,4.529a6,6,0,0,1,8.478,8.464L12,21.485,3.521,12.993A6,6,0,0,1,12,4.529Z" transform="translate(-2 -3)" fill="#fff" />
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <script>
            <?php require_once(get_template_directory() . '/dist/js/components/wpb/zakat.min.js'); ?>
        </script>


<?php
        return ob_get_clean();
    }
}

add_shortcode('zakat_calc', 'zakat_calc_shortcode');
