<?php
/**
 * CTA Quick Donate Button
 * 
 * cta_quick_donate_btn_text
 * cta_quick_donate_btn_default_amount
 * cta_quick_donate_btn_give_form_id
 * cta_quick_donate_btn_width
 * cta_quick_donate_btn_align
 * 
 */
if (!function_exists('cta_quick_donate_btn_shortcode')) {
    function cta_quick_donate_btn_shortcode($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'cta_quick_donate_btn_text' => 'Donate Now',
                    'cta_quick_donate_btn_default_amount' => '100',
                    'cta_quick_donate_btn_give_form_id' => '',
                    'cta_quick_donate_btn_width' => 'auto',
                ),
                $atts
            )
        );
        
        // Get a working GiveWP form ID for the CTA button
        $give_form_id = $cta_quick_donate_btn_give_form_id;
        
        // If no form ID provided, try to get a default one
        if (empty($give_form_id)) {
            $give_form_id = get_option('give_form_id');
            
            // If no default form ID, try to get the first available GiveWP form
            if (empty($give_form_id)) {
                $give_forms = get_posts(array(
                    'post_type' => 'give_forms',
                    'post_status' => 'publish',
                    'numberposts' => 1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if (!empty($give_forms)) {
                    $give_form_id = $give_forms[0]->ID;
                }
            }
            
            // Ensure we have a valid form ID
            if (empty($give_form_id)) {
                $give_form_id = 1; // Fallback to form ID 1 if nothing else works
            }
        }
        
        $cta_quick_donate_btn_default_amount = !empty($cta_quick_donate_btn_default_amount) ? $cta_quick_donate_btn_default_amount : 100;

        ob_start(); ?>

        <div class="<?php echo $cta_quick_donate_btn_align; ?>">
            <button id="cta_quick_donate_btn" 
                <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?>
                class="cta-quick-donate-btn user-action-btn primary-btn <?php echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; ?> no-border radius-10 py-3 px-5 my-3"
                data-amount="<?php echo $cta_quick_donate_btn_default_amount ?>" 
                data-giveformid="<?php echo $give_form_id ?>"
                data-tagname=""
                style="width: <?php echo $cta_quick_donate_btn_width; ?>;">
                
                <svg width="16" height="16" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="heart-icon">
                    <path d="M27.4197 10.2909C26.5439 17.7201 17.7649 24.2907 15.2034 26.0615C14.919 26.258 14.7769 26.3563 14.5945 26.3791C14.5389 26.3861 14.4705 26.3864 14.4148 26.3799C14.2322 26.3586 14.0894 26.2616 13.8037 26.0677C11.2091 24.306 2.27094 17.7288 1.57897 10.2914C0.645854 1.73296 9.84635 -0.90725 14.5127 4.4274C19.1794 -0.909945 28.3784 1.73006 27.4197 10.2909Z" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
                <span class="btn-text">
                    <?php echo esc_html($cta_quick_donate_btn_text); ?>
                </span>
            </button>
        </div>

        <?php
        return ob_get_clean();
    }
}
add_shortcode('cta_quick_donate_btn', 'cta_quick_donate_btn_shortcode'); 