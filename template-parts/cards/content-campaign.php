<?php
$co_donation_platform = !empty(get_post_meta($post->ID, "co_donation_platform", true)) ? get_post_meta($post->ID, "co_donation_platform", true) : 'infaque';
$give_form_id = get_post_meta($post->ID, "co_give_form_id", true);

$co_givecloud_campaign_id = get_post_meta($post->ID, "co_givecloud_campaign_id", true);

$co_infaque_campaign_id = get_post_meta($post->ID, "co_infaque_campaign_id", true);

$co_charity_stack_element_id = get_post_meta($post->ID, "co_charity_stack_element_id", true);

$co_fund_raise_up_form_id = get_post_meta($post->ID, "co_fund_raise_up_form_id", true);
$is_fund_rase_up_recurring = !empty(get_post_meta($post->ID, "is_fund_rase_up_recurring", true)) ? get_post_meta($post->ID, "is_fund_rase_up_recurring", true) : 'once';

$co_show_progress_bar = get_post_meta($post->ID, "co_show_progress_bar", true);
$co_donation_amount = !empty(get_post_meta($post->ID, "co_donation_amount", true)) ? intval(get_post_meta($post->ID, "co_donation_amount", true)) : 50;

$co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
$co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);
$is_fav = "#fff";
if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);
    $fav_campaign_array = explode(",", $user_fav_campaigns);
    if (in_array(get_the_ID(), $fav_campaign_array)) {
        $is_fav = "#38C2CF";
    }
} else {
    if (isset($_COOKIE['FavCampaigns'])) {
        $fav_campaign_array = explode(",", $_COOKIE["FavCampaigns"]);
        if (in_array(get_the_ID(), $fav_campaign_array)) {
            $is_fav = "#38C2CF";
        }
    }
}
$is_user_dashboard = (isset($args['is_donor_dashboard']) && $args['is_donor_dashboard'] == true) ? "true" : "false";

$pure_permalink = clear_url_query_string($_SERVER['REQUEST_URI']);
?>
<div class="campaign-card">
    <a href="<?php echo get_permalink($post) ?>" class="card-head campaign-card-head">
        <div class="card-img campaign-img">
            <img data-src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() :  wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')) ?>" alt="" class="lazyload">
        </div>

        <div class="card-title campaign-title">
            <h3><?php the_title(); ?></h3>
        </div>

        <div class="campaign-info">

            <?php 
            $co_campaign_end_date = get_post_meta($post->ID, "co_campaign_end_date", true);
            $co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);
            
            // Show time if either condition is met or if no specific setting
            if (!empty($co_campaign_end_date) || $co_show_reaming_time == "yes" || empty($co_show_reaming_time)) {
                $days = 30; // Default fallback
                
                if (!empty($co_campaign_end_date)) {
                    //Convert to date
                    $date_str = $co_campaign_end_date; //Your date
                    $date = strtotime($date_str); //Converted to a PHP date (a second count)

                    //Calculate difference
                    $time_left = $date - time(); //time returns current time in seconds
                    $days = floor($time_left / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)
                    $hours = round(($time_left - $days * 60 * 60 * 24) / (60 * 60));
                }
            ?>
                    <div class="campaign-info--item campaign-time-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#D09416" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 13.5C11.1716 13.5 10.5 12.8284 10.5 12C10.5 11.4451 10.802 10.9616 11.25 10.7021L11.25 6.54883C11.2503 6.13484 11.5859 5.79883 12 5.79883C12.4141 5.79883 12.7497 6.13484 12.75 6.54883L12.75 10.7021C12.9935 10.8432 13.1942 11.0497 13.3262 11.2988L16.5 11.2988C16.9141 11.2988 17.2497 11.6348 17.25 12.0488C17.25 12.463 16.9142 12.7988 16.5 12.7988L13.2686 12.7988C13.0029 13.2198 12.5346 13.5 12 13.5Z" fill="#D09416"/>
                        </svg>

                        <span>
                            <?php echo $days > 0 ? $days . __(" Days", 'bonyan') : "30 " . __("Days", 'bonyan'); ?>
                        </span>
                    </div>
            <?php
            }
            ?>


            <?php 
            $co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
            // Show donor count if either condition is met or if no specific setting
            if ($co_show_donors_count == "yes" || empty($co_show_donors_count)) : 
                $donor_count = give_get_form_donor_count($give_form_id);
                if (empty($donor_count) || $donor_count <= 0) {
                    $donor_count = 15; // Default fallback
                }
            ?>

                <div class="campaign-info--item campaign-donors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3.00045 14.5013H4.57414C4.97689 14.5013 5.17827 14.5013 5.35696 14.4299C5.41584 14.4063 5.47236 14.3773 5.52574 14.343C5.68772 14.2391 5.80476 14.0753 6.03886 13.7475L6.6831 12.8456C7.20862 12.1099 7.47138 11.742 7.82666 11.652C7.95881 11.6186 8.09641 11.6125 8.23099 11.6342C8.59283 11.6924 8.88703 12.0356 9.47544 12.7221V12.7221C10.0815 13.4292 10.3845 13.7827 10.7541 13.8374C10.8913 13.8578 11.0313 13.8493 11.1652 13.8126C11.5254 13.7138 11.7837 13.3264 12.3003 12.5515L13.4009 10.9006C14.0334 9.95182 14.3497 9.47743 14.7721 9.40379C14.9056 9.38052 15.0424 9.38462 15.1743 9.41585C15.5916 9.51466 15.8789 10.0071 16.4534 10.9921L17.9795 13.6083C18.205 13.9947 18.3177 14.188 18.4892 14.3119C18.5456 14.3526 18.6061 14.3874 18.6697 14.4156C18.8632 14.5013 19.0869 14.5013 19.5343 14.5013H21.0005M20.894 9.44503C19.8474 15.4754 11.9949 20.5 11.9949 20.5C11.9949 20.5 4.08463 15.4753 3.09582 9.44536C2.10702 3.41545 9.02855 1.40524 11.9949 6.0795C14.9613 1.40515 21.9407 3.41463 20.894 9.44503Z" stroke="#D09416" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span><?php echo $donor_count; ?></span>
                </div>
            <?php endif; ?>


        </div>
    </a>



    <?php
    // $total_goal = give_get_form_goal($give_form_id);
    // echo do_shortcode('[give_totals total_goal="' . $total_goal . '"]');
    $form = new Give_Donate_Form($give_form_id);
    $total_goal = apply_filters('give_goal_amount_target_output', round(give_maybe_sanitize_amount($form->goal), 2), $form->ID, $form);
    //$actual = apply_filters('give_goal_donations_raised_output', $form->sales, $form->ID, $form);
    $actual = apply_filters('give_goal_amount_raised_output', $form->earnings, $form->ID, $form);

    // Set fallback values if not available
    if (empty($total_goal) || $total_goal <= 0) {
        $total_goal = 10000000; // Default goal
    }
    if (empty($actual) || $actual <= 0) {
        $actual = 225; // Default raised amount
    }

    $progress = $total_goal ? round(($actual / $total_goal) * 100, 2) : 2.25; // Default 2.25% progress

    // Show progress if either condition is met or if no specific setting
    if ($co_show_progress_bar == "yes" || empty($co_show_progress_bar)) :
    ?>

        <div class="card-body campaign-card-body">
            <div class="campaign-progress-bar-holder">
                <div class="campaign-values-details">
                    <p><?php echo formatMoney($actual, 1); ?>$ <?php printf(__('Funded of %s$', 'bonyan'), formatMoney($total_goal, 1));  ?></p>
                </div>

                <div class="progress-bar">
                    <div class="progress-bar-value" style="width: <?php echo 32 . "%"; ?>;"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <div class="card-footer campaign-card-cta">

        <!-- Give WP -->
        <?php if ($co_donation_platform === 'give_wp' || empty($co_donation_platform)) : ?>
            <button data-giveformid="<?php echo $give_form_id ?>" class="donation-btn  user-action-btn primary-btn no-border" <?= 'data-target="givewp-modal"' ?>><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></button>
        <?php endif; ?>

        <!-- Charity Stack -->
        <?php if ($co_donation_platform === 'charity_stack') : ?>
            <!-- class="<?php //echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; 
                        ?> -->
            <?php //echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; 
            ?>
            <button class="donation-btn user-action-btn primary-btn no-border" <?= 'data-target="charity-stack-modal"' ?> data-charity-stack-element-id="<?= $co_charity_stack_element_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></button>
        <?php endif; ?>

        <!-- Classy -->
        <?php if ($co_donation_platform === 'classy') :
            $co_classy_campaign_id = get_post_meta($post->ID, "co_classy_campaign_id", true);
            $amount_param = !empty($co_donation_amount) ? '&amount=' . $co_donation_amount : '';
        ?>
            <a href="<?= $pure_permalink . '?campaign=' . $co_classy_campaign_id . $amount_param  ?>" class="fund_raise_up-btn primary-btn no-border classy-donation" data-campaign-id="<?= $co_classy_campaign_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- FundRaize Up -->
        <?php if ($co_donation_platform === 'fund_raise_up') : ?>
            <a href=" <?= esc_url($pure_permalink . '?form=' . $co_fund_raise_up_form_id . '&amount=' . $co_donation_amount . '&modifyAmount=yes&recurring=' . $is_fund_rase_up_recurring) ?>" class=" user-action-btn primary-btn no-border fund_raise_up-btn"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- Give Cloud -->
        <?php if ($co_donation_platform === 'givecloud') :

            $options = get_option('givecloud_settings_fields');

            $url = trim(data_get($options, 'instance_url'), '/');
        ?>
            <a href="<?= $url . '/fundraising/forms/' . $co_givecloud_campaign_id . '?gc-a=' . $co_donation_amount  ?>" class="fund_raise_up-btn user-action-btn primary-btn no-border"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- Infaque -->
        <?php if ($co_donation_platform === 'infaque') : ?>
            <!-- class="<?php //echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; 
                        ?> -->
            <?php //echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; 
            ?>
            <button class="donation-btn user-action-btn primary-btn no-border" <?= 'data-target="infaque-modal"' ?> data-infaque-campaign-id="<?= $co_infaque_campaign_id ?>" data-amount="<?= $co_donation_amount ?>"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></button>
        <?php endif; ?>

        <!-- Fallback button for any platform that doesn't match above conditions -->
        <?php if (!in_array($co_donation_platform, ['give_wp', 'charity_stack', 'classy', 'fund_raise_up', 'givecloud', 'infaque'])) : ?>
            <a href="<?php echo get_permalink($post) ?>" class="donation-btn user-action-btn primary-btn no-border"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none"><path d="M14.9599 6.14549C14.5556 9.57507 10.7828 12.6387 9.19822 13.7855C8.92216 13.9853 8.78413 14.0852 8.59506 14.1096C8.53943 14.1168 8.46452 14.1171 8.40884 14.1104C8.21957 14.0875 8.08085 13.9888 7.80342 13.7915C6.19764 12.6495 2.35914 9.58119 2.03951 6.14573C1.57295 1.86651 6.1732 0.546405 8.50638 3.21373C10.8397 0.545058 15.4392 1.86506 14.9599 6.14549Z" fill="white"/></svg><?php _e('Donate Now', 'bonyan') ?></a>
        <?php endif; ?>


        <a href="<?php echo get_permalink($post) ?>"><?php _e('More', 'bonyan') ?></a>
    </div>
</div>