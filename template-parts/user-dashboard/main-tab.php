<!-- Start Dashboard Tab Content -->
<div class="dashboard-tab-content" id="donor-dashboard">
    <div class="dashboard-donor-info-box with-padding pt-3">
        <div class="donor-avatar">
            <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">

            <div class="donor-info-item donor-info--name">
                <span><?php echo $user_FirstName . " " . $user_LastName; ?></span>
            </div>
        </div>

        <div class="donor-info">
            <div class="donor-info-item donor-info--name">
                <span><?php echo $user_FirstName . " " . $user_LastName; ?></span>
            </div>

            <div class="donor-info--others">
                <div class="donor-info-item donor-info--company">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.948" height="16.154" viewBox="0 0 17.948 16.154">
                        <path id="Path_10535" data-name="Path 10535" d="M8.282,17.359h2.692V11.922l-3.59-3.13-3.59,3.13v5.437H6.487v-3.59H8.282Zm10.769,1.795H2.9a.9.9,0,0,1-.9-.9V11.514a.9.9,0,0,1,.308-.677L5.59,7.975V3.9a.9.9,0,0,1,.9-.9H19.051a.9.9,0,0,1,.9.9V18.256A.9.9,0,0,1,19.051,19.154Zm-4.487-8.974v1.795h1.795V10.179Zm0,3.59v1.795h1.795V13.769Zm0-7.179V8.385h1.795V6.59Zm-3.59,0V8.385h1.795V6.59Z" transform="translate(-2 -3)" fill="#5b5b5b" />
                    </svg>

                    <span><?php echo $user_company; ?></span>
                </div>

                <div class="donor-info-item donor-info--last-donation">
                    <svg id="Group_3108" data-name="Group 3108" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10536" data-name="Path 10536" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_10537" data-name="Path 10537" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm1-10V7H11v7h6V12Z" fill="#5b5b5b" />
                    </svg>

                    <span><?php
                            echo sprintf(
                                __('Last donated %s day ago', 'bonyan'),
                                $last_donate_days
                            );
                            ?></span>
                </div>

                <div class="donor-info-item donor-info--first-donation-date">
                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                    </svg>


                    <span><?php
                            echo sprintf(
                                __('Donor For %s days', 'bonyan'),
                                $donor_registered_by_days
                            );
                            ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-tab-contents-holder">
        <div class="dashboard-tab-content-section donor-giving-stats">
            <div class="dashboard-content-section-heading mt-3 py-3">
                <div class="dashboard-content-section-heading-title with-padding">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-line" class="svg-inline--fa fa-chart-line fa-w-16 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM464 96H345.94c-21.38 0-32.09 25.85-16.97 40.97l32.4 32.4L288 242.75l-73.37-73.37c-12.5-12.5-32.76-12.5-45.25 0l-68.69 68.69c-6.25 6.25-6.25 16.38 0 22.63l22.62 22.62c6.25 6.25 16.38 6.25 22.63 0L192 237.25l73.37 73.37c12.5 12.5 32.76 12.5 45.25 0l96-96 32.4 32.4c15.12 15.12 40.97 4.41 40.97-16.97V112c.01-8.84-7.15-16-15.99-16z"></path>
                    </svg>

                    <span><?php _e('Your Giving Stats', 'bonyan'); ?></span>
                </div>
            </div>

            <div class="dashboard-content-section-body">
                <div class="donor-giving-stats-values with-padding">
                    <div class="donor-stats-item">
                        <span><?php echo $donor->purchase_count; ?></span>
                        <span><?php _e('Number', 'bonyan'); ?> <br /> <?php _e('of donations', 'bonyan'); ?></span>
                    </div>
                    <div class="donor-stats-item">
                        <span><?php echo $donor_total_donations; ?></span>
                        <span><?php _e('Total', 'bonyan'); ?> <br /> <?php _e('of donations', 'bonyan'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-tab-content-section donations-history">
            <div class="dashboard-content-section-heading py-3">
                <div class="dashboard-content-section-heading-title with-padding">
                    <svg id="Group_3116" data-name="Group 3116" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10546" class="no-fill" data-name="Path 10546" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_10547" data-name="Path 10547" d="M2,11H22v9a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1ZM17,3h4a1,1,0,0,1,1,1V9H2V4A1,1,0,0,1,3,3H7V1H9V3h6V1h2Z" fill="#6d54a7" />
                    </svg>

                    <span><?php _e('Recent Donations', 'bonyan'); ?></span>
                </div>
            </div>

            <div class="dashboard-content-section-body">
                <div class="donations-history-values with-padding">
                    <?php

                    $payment_ids = explode(',', $donor->payment_ids);

                    $payments    = give_get_payments(
                        array(
                            'post__in' => $payment_ids,
                        )
                    );
                    if (!empty($payments)) {
                        echo get_template_part('template-parts/datatable-modern-recent-dashboard', '', array("payments" => $payments));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Dashboard Tab Content -->