<?php
$co_donation_platform = !empty(get_post_meta($post->ID, "co_donation_platform", true)) ? get_post_meta($post->ID, "co_donation_platform", true) : 'give_wp';
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
    <div class="add-to-fav" data-isDonorDashboard="<?php echo $is_user_dashboard; ?>" data-id="<?php echo get_the_ID(); ?>">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="<?php echo $is_fav ?>" xmlns="http://www.w3.org/2000/svg">
            <path d="M24.3134 6.37833C23.7175 5.78217 23.01 5.30925 22.2313 4.98659C21.4526 4.66394 20.618 4.49786 19.7751 4.49786C18.9322 4.49786 18.0975 4.66394 17.3188 4.98659C16.5401 5.30925 15.8326 5.78217 15.2367 6.37833L14.0001 7.61499L12.7634 6.37833C11.5598 5.17469 9.92726 4.49849 8.22506 4.49849C6.52285 4.49849 4.89037 5.17469 3.68672 6.37833C2.48308 7.58197 1.80688 9.21445 1.80688 10.9167C1.80688 12.6189 2.48308 14.2514 3.68672 15.455L4.92339 16.6917L14.0001 25.7683L23.0767 16.6917L24.3134 15.455C24.9096 14.8591 25.3825 14.1516 25.7051 13.3729C26.0278 12.5942 26.1939 11.7596 26.1939 10.9167C26.1939 10.0738 26.0278 9.23911 25.7051 8.46041C25.3825 7.68171 24.9096 6.97421 24.3134 6.37833V6.37833Z" stroke="#38C2CF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>
    <a href="<?php echo get_permalink($post) ?>" class="card-head campaign-card-head">
        <div class="card-img campaign-img">
            <img data-src="<?= esc_url(!empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() :  wp_get_attachment_image_url(get_option('general_placeholder_img_url'), 'full')) ?>" alt="" class="lazyload">
        </div>

        <div class="card-title campaign-title">
            <h3><?php the_title(); ?></h3>
        </div>

        <div class="campaign-info">

            <?php $co_campaign_end_date = get_post_meta($post->ID, "co_campaign_end_date", true);
            if (!empty($co_campaign_end_date)) {
                //Convert to date
                $date_str = $co_campaign_end_date; //Your date
                $date = strtotime($date_str); //Converted to a PHP date (a second count)

                //Calculate difference
                $time_left = $date - time(); //time returns current time in seconds
                $days = floor($time_left / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)
                $hours = round(($time_left - $days * 60 * 60 * 24) / (60 * 60));
                if ($co_show_reaming_time == "yes") :
            ?>
                    <div class="campaign-info--item campaign-time-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path id="Path_209" data-name="Path 209" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm0-2a8,8,0,1,0-8-8A8,8,0,0,0,12,20Zm1-8h4v2H11V7h2Z" transform="translate(-2 -2)" fill="#38c2cf" />
                        </svg>

                        <span>
                            <?php echo $days > 0 ? $days % 2 != 0 ? $days . __(" Day Left ", 'bonyan') : $days . __(" Days Left ", 'bonyan') : ""; ?>
                            <?php echo $hours != 0 ?  $days > 0 ? $hours . __(" Hour", 'bonyan') : $hours . __(" Hour left", 'bonyan') : ""; ?>
                        </span>
                    </div>
            <?php
                endif;
            }
            ?>


            <?php if ($co_show_donors_count == "yes") : ?>


                <div class="campaign-info--item campaign-donors">
                    <svg id="Group_269" data-name="Group 269" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_210" data-name="Path 210" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_211" data-name="Path 211" d="M3.161,4.469A6.5,6.5,0,0,1,12,4.141,6.5,6.5,0,0,1,21.179,13.3l-7.765,7.79a2,2,0,0,1-2.719.1l-.11-.1L2.821,13.295a6.5,6.5,0,0,1,.34-8.826ZM4.575,5.883a4.5,4.5,0,0,0-.146,6.21l.146.154L12,19.672l5.3-5.3-3.535-3.535-1.06,1.06A3,3,0,1,1,8.464,7.651l2.1-2.1a4.5,4.5,0,0,0-5.837.189l-.154.146Zm8.486,2.828a1,1,0,0,1,1.414,0l4.242,4.242.708-.706a4.5,4.5,0,0,0-6.211-6.51l-.153.146L9.879,9.065A1,1,0,0,0,9.8,10.392l.078.087a1,1,0,0,0,1.327.078l.087-.078Z" fill="#38c2cf" />
                    </svg>

                    <span><?php echo give_get_form_donor_count($give_form_id); ?></span>
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

    $progress = $total_goal ? round(($actual / $total_goal) * 100, 2) : 0;

    if ($co_show_progress_bar == "yes" && $total_goal > 0) :
    ?>

        <div class="card-body campaign-card-body">
            <div class="campaign-progress-bar-holder">
                <div class="campaign-values-details">
                    <p>$<?php echo formatMoney($actual, 1); ?></p>
                    <p><?php printf(__('Funded of $%s', 'bonyan'), formatMoney($total_goal, 1));  ?></p>
                </div>

                <div class="progress-bar">
                    <div class="progress-bar-value" style="width: <?php echo $progress . "%"; ?>;"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <div class="card-footer campaign-card-cta">

        <!-- Give WP -->
        <?php if ($co_donation_platform === 'give_wp') : ?>
            <button data-giveformid="<?php echo $give_form_id ?>" class="donation-btn  user-action-btn primary-btn no-border" <?= 'data-target="givewp-modal"' ?>><?php _e('Donate', 'bonyan') ?></button>
        <?php endif; ?>

        <!-- Charity Stack -->
        <?php if ($co_donation_platform === 'charity_stack') : ?>
            <!-- class="<?php //echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; 
                        ?> -->
            <?php //echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; 
            ?>
            <button class="donation-btn user-action-btn primary-btn no-border" <?= 'data-target="charity-stack-modal"' ?> data-charity-stack-element-id="<?= $co_charity_stack_element_id ?>"><?php _e('Donate', 'bonyan') ?></button>
        <?php endif; ?>

        <!-- Classy -->
        <?php if ($co_donation_platform === 'classy') :
            $co_classy_campaign_id = get_post_meta($post->ID, "co_classy_campaign_id", true);
            $amount_param = !empty($co_donation_amount) ? '&amount=' . $co_donation_amount : '';
        ?>
            <a href="<?= $pure_permalink . '?campaign=' . $co_classy_campaign_id . $amount_param  ?>" class="fund_raise_up-btn primary-btn no-border classy-donation" data-campaign-id="<?= $co_classy_campaign_id ?>"><?php _e('Donate', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- FundRaize Up -->
        <?php if ($co_donation_platform === 'fund_raise_up') : ?>
            <a href=" <?= esc_url($pure_permalink . '?form=' . $co_fund_raise_up_form_id . '&amount=' . $co_donation_amount . '&modifyAmount=yes&recurring=' . $is_fund_rase_up_recurring) ?>" class=" user-action-btn primary-btn no-border fund_raise_up-btn"><?php _e('Donate', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- Give Cloud -->
        <?php if ($co_donation_platform === 'givecloud') :

            $options = get_option('givecloud_settings_fields');

            $url = trim(data_get($options, 'instance_url'), '/');
        ?>
            <a href="<?= $url . '/fundraising/forms/' . $co_givecloud_campaign_id . '?gc-a=' . $co_donation_amount  ?>" class="fund_raise_up-btn user-action-btn primary-btn no-border"><?php _e('Donate', 'bonyan') ?></a>
        <?php endif; ?>

        <!-- Infaque -->
        <?php if ($co_donation_platform === 'infaque') : ?>
            <!-- class="<?php //echo is_user_logged_in() ? 'donation-btn' : 'donation-action'; 
                        ?> -->
            <?php //echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; 
            ?>
            <button class="donation-btn user-action-btn primary-btn no-border" <?= 'data-target="infaque-modal"' ?> data-infaque-campaign-id="<?= $co_infaque_campaign_id ?>" data-amount="<?= $co_donation_amount ?>"><?php _e('Donate', 'bonyan') ?></button>
        <?php endif; ?>


        <a href="<?php echo get_permalink($post) ?>"><?php _e('More', 'bonyan') ?></a>
    </div>
</div>