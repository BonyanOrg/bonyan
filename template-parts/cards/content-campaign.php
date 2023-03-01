<?php $co_show_progress_bar = get_post_meta($post->ID, "co_show_progress_bar", true);
$give_form_id = get_post_meta($post->ID, "co_give_form_id", true);
$co_donation_amount = get_post_meta($post->ID, "co_donation_amount", true);

$co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
$co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);
?>
<div class="campaign-card">
    <a href="<?php echo get_permalink($post) ?>" class="card-head campaign-card-head">
        <div class="card-img campaign-img">
            <img data-src="<?php echo !empty(get_the_post_thumbnail_url()) ? get_the_post_thumbnail_url() : "https://media.istockphoto.com/id/1270939459/vector/fundraising-round-ribbon-isolated-label-fundraising-sign.jpg?s=612x612&w=0&k=20&c=uUGQb0L8AdaHHR7pjk_kYWd587mnGv3gXc5OLHTK3Gk="; ?>" alt="" class="lazyload">
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
                            <?php echo $days != 0 ? $days . __(" Days Left ", 'bonyan') : ""; ?>
                            <?php echo $hours != 0 ?  $days != 0 ? $hours . __(" Hour", 'bonyan') : $hours . __(" Hour left", 'bonyan') : ""; ?>
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

    if ($co_show_progress_bar == "yes") :
    ?>

        <div class="card-body campaign-card-body">
            <div class="campaign-progress-bar-holder">
                <p><?php echo $actual ?>$</p>
                <div class="progress-bar">
                    <div class="progress-bar-value" style="width: <?php echo $progress . "%"; ?>;"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <div class="card-footer campaign-card-cta">
        <button class="primary-btn no-border">Donate</button>
        <a href="<?php echo get_permalink($post) ?>">More</a>
    </div>
</div>