<?php get_header();
/* Template Name: Modern-Dashboard */


// ====[USER DATA INIT]==== //
if (!is_user_logged_in()) {

?>
    <h1 align="center"> <?php _e('You Must Login To See Your Dashboard', 'bonyan'); ?></h1>
    <script>
        window.location.href = "<?php echo home_url('/') ?>";
    </script>
<?php
}

$user_FirstName = get_user_meta($userdata->ID, 'first_name', true) ?? "First Name";
$user_LastName = get_user_meta($userdata->ID, 'last_name', true) ?? "Last Name";
$user_company = get_user_meta($userdata->ID, 'company', true) ?? "Company Name";
$user_gender = get_user_meta($userdata->ID, 'gender', true) ?? "";
$user_Email = $user_email ?? "info@2p.com.tr";
$user_profile_photo = ($user_profile_photo = get_user_meta($userdata->ID, 'user_profile_photo', true)) ? $user_profile_photo : 'https://st3.depositphotos.com/9998432/13335/v/600/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg';
// $user_Website = $user_url ?? "www.2p.com.tr";
// $user_birth_date = ($user_birth_date = get_user_meta($userdata->ID, 'birth_date', true)) ? $user_birth_date : '';
// $user_age = ($user_age = get_user_meta($userdata->ID, 'age', true)) ? $user_age : '';
//$user_city = ($user_city = get_user_meta($userdata->ID, 'city', true)) ? $user_city : '';
//$user_country = ($user_country = get_user_meta($userdata->ID, 'country', true)) ? $user_country : '';
//$user_address = ($user_address = get_user_meta($userdata->ID, 'address', true)) ? $user_address : '';
// $user_mobile_number = ($user_mobile_number = get_user_meta($userdata->ID, 'mobile_number', true)) ? $user_mobile_number : '';
// $facebook_url = ($facebook_url = get_user_meta($userdata->ID, 'facebook_url', true)) ? $facebook_url : '';
// $twitter_url = ($twitter_url = get_user_meta($userdata->ID, 'twitter_url', true)) ? $twitter_url : '';
// $instagram_url = ($instagram_url = get_user_meta($userdata->ID, 'instagram_url', true)) ? $instagram_url : '';

// Donor Data
$donor = new Give_Donor($userdata->ID, true);

// Last Donate Days
$last_donate_time = give()->donors->getDonorLatestDonationDate($donor->id);
//Convert to date
$date_str = $last_donate_time; //Your date
$date = strtotime($date_str); //Converted to a PHP date (a second count)

//Calculate difference
$time_left =  time() - $date; //time returns current time in seconds
$last_donate_days = floor($time_left / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)

$donor_registered_by_days = floor((time() - strtotime($donor->date_created)) / (60 * 60 * 24));



?>
<?php //echo get_template_part('template-parts/page-header'); 
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container my-3 my-lg-5">
    <div class="custom-givewp-dashboard">
        <div class="dashboard-box">

            <!-- Start Dashboard sidebar -->
            <div class="dashboard-sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-logo">
                        <!-- <?php the_custom_logo(); ?> -->
                    </div>
                    <div class="collapse-toggler">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </div>
                </div>

                <div class="dashboard-sidebar-item active" title="Dashboard" data-target="donor-dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10524" data-name="Path 10524" d="M21,20a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V9.49a1,1,0,0,1,.386-.79l8-6.222a1,1,0,0,1,1.228,0l8,6.222A1,1,0,0,1,21,9.49V20Z" transform="translate(-3 -2.267)" fill="#5b5b5b" />
                    </svg>

                    <span>Donor Dashboard</span>
                </div>

                <div class="dashboard-sidebar-item" id="donations-history-tab-btn" title="Donation History" data-target="donation-history">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10527" data-name="Path 10527" d="M12,2A10,10,0,1,1,2,12H4A8,8,0,1,0,5.385,7.5H8v2H2v-6H4V6A9.981,9.981,0,0,1,12,2Zm1,5v4.585l3.243,3.243-1.415,1.415L11,12.413V7Z" transform="translate(-2 -2)" fill="#5b5b5b" />
                    </svg>

                    <span>Donation History</span>
                </div>

                <div class="dashboard-sidebar-item" id="recurring-donations-tab-btn" title="Recurring Donations" data-target="recurring-donations">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10558" data-name="Path 10558" d="M18.537,19.567A9.982,9.982,0,1,1,20.19,17.74L17,12h3a8,8,0,1,0-2.46,5.772Z" transform="translate(-2 -2)" fill="#5b5b5b" />
                    </svg>

                    <span>Recurring Donations</span>
                </div>

                <div class="dashboard-sidebar-item" title="Edit Profile" data-target="edit-profile">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_10530" data-name="Path 10530" d="M12,1l9.5,5.5v11L12,23,2.5,17.5V6.5Zm0,14a3,3,0,1,0-3-3A3,3,0,0,0,12,15Z" transform="translate(-2.5 -1)" fill="#5b5b5b" />
                    </svg>

                    <span>Edit Profile</span>
                </div>

                <div class="dashboard-sidebar-item" title="Favorite Campaign" data-target="wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18.881" viewBox="0 0 24 18.881">
                        <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M19.483,3.539a5.763,5.763,0,0,0-7.864.573l-.83.856-.83-.856a5.763,5.763,0,0,0-7.864-.573A6.052,6.052,0,0,0,1.677,12.3l8.155,8.421a1.321,1.321,0,0,0,1.909,0L19.9,12.3a6.048,6.048,0,0,0-.413-8.762Z" transform="translate(0.001 -2.248)" fill="#5b5b5b" />
                    </svg>

                    <span>Wishlist</span>
                </div>

                <div class="dashboard-sidebar-item" title="Invitation to contribute" data-target="contribution-invitation">
                    <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg" id="campaign" class="icon glyph" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M22,4.28V15.72a2,2,0,0,1-.77,1.58,2.05,2.05,0,0,1-1.23.42,2,2,0,0,1-.48-.06L10,15.28,8.88,15H7a5,5,0,0,1-3.5-1.43A5,5,0,0,1,7,5H8.88L19.52,2.34a2,2,0,0,1,1.71.36A2,2,0,0,1,22,4.28Z" style="fill:#5b5b5b"></path>
                            <path d="M10,16.31V20a2,2,0,0,1-2,2H6.82a2,2,0,0,1-2-1.61L3.8,15.08a5.68,5.68,0,0,0,1.74.74A5.9,5.9,0,0,0,7,16H8.76Z" style="fill:#5b5b5b"></path>
                        </g>
                    </svg>

                    <span>Contribution Invitation</span>
                </div>

                <a href="<?php echo wp_logout_url() ?>" class="dashboard-sidebar-item logout">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20">
                        <path id="Path_10533" data-name="Path 10533" d="M4,18H6v2H18V4H6V6H4V3A1,1,0,0,1,5,2H19a1,1,0,0,1,1,1V21a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1Zm2-7h7v2H6v3L1,12,6,8Z" transform="translate(-1 -2)" fill="#5b5b5b" />
                    </svg>

                    <span><?php _e('Logout', 'bonyan'); ?></span>
                </a>
            </div>
            <!-- End Dashboard sidebar -->

            <!-- ===[Start Dashboard View]=== -->
            <div class="dashboard-view position-relative">
                <p class="loader"></p>
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
                                            echo "Last donated " . $last_donate_days . " day ago";
                                            ?></span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span><?php echo "Donor For " . $donor_registered_by_days . " days" ?></span>
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

                                    <span>Your Giving Stats</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donor-giving-stats-values with-padding">
                                    <div class="donor-stats-item">
                                        <span><?php echo $donor->purchase_count; ?></span>
                                        <span>Number <br /> of donations</span>
                                    </div>

                                    <!-- <div class="donor-stats-item">
                                        <span>7</span>
                                        <span>LIFETIME<br /> DONATIONS</span>
                                    </div>

                                    <div class="donor-stats-item">
                                        <span>7</span>
                                        <span>AVERAGE<br /> DONATION</span>
                                    </div> -->
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

                                    <span>Recent Donations</span>
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

                <!-- Start Donation History Tab Content -->
                <div class="d-none dashboard-tab-content" id="donation-history">
                    <div class="dashboard-donor-info-box with-padding pt-3">
                        <div class="donor-avatar">
                            <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
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

                                    <span>
                                        <?php
                                        echo "Last donated " . $last_donate_days . " day ago";
                                        ?>
                                    </span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span><?php echo "Donor For " . $donor_registered_by_days . " days" ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-tab-contents-holder">
                        <div class="dashboard-tab-content-section donations-history">
                            <div class="dashboard-content-section-heading mt-3 py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <span><?php echo $donor->purchase_count; ?> Total Donations</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donations-history-values donation-history-datatable with-padding">
                                    <!-- Data Table Will Be Load Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Donation History Tab Content -->

                <!-- Start Recurring Donations Tab Content -->
                <div class="d-none dashboard-tab-content" id="recurring-donations">
                    <div class="dashboard-donor-info-box with-padding pt-3">
                        <div class="donor-avatar">
                            <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
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
                                            echo "Last donated " . $last_donate_days . " day ago";
                                            ?></span>
                                </div>

                                <div class="donor-info-item donor-info--first-donation-date">
                                    <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                        <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                    </svg>


                                    <span><?php echo "Donor For " . $donor_registered_by_days . " days" ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-tab-contents-holder">
                        <div class="dashboard-tab-content-section donations-history">
                            <div class="dashboard-content-section-heading mt-3 py-3">
                                <div class="dashboard-content-section-heading-title with-padding">
                                    <span>Recurring Donations</span>
                                </div>
                            </div>

                            <div class="dashboard-content-section-body">
                                <div class="donations-history-values recurring-donations-datatable with-padding">
                                    <!-- Data Table Will Be Load Here -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Recurring Donations Tab Content -->

                <!-- Start Edit Profile Tab Content -->
                <div class="d-none dashboard-tab-content" id="edit-profile">
                    <div class="dashboard-tab-content-section donations-history">
                        <div class="dashboard-content-section-heading py-3">
                            <div class="dashboard-content-section-heading-title with-padding">
                                <span>Edit Profile</span>
                            </div>
                        </div>

                        <div class="dashboard-content-section-body">
                            <div class="edit-avatar with-padding">
                                <label class="dashboard-custom-upload-file" for="dashboard-upload-avatar">
                                    <div class="donor-avatar">
                                        <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
                                    </div>

                                    <div class="dashboard-upload-information">
                                        <span>This image here to set avatar of <span>Find Image</span></span>
                                    </div>

                                    <input type="file" name="dashboard-upload-avatar" id="dashboard-upload-avatar" class="dashboard-upload-file-input">
                                </label>
                            </div>

                            <div class="edit-donor-info-container custom-inputs with-padding">
                                <div class="select-holder">
                                    <label>Prefix</label>
                                    <select name="prefix" id="prefix">
                                        <option value="male" <?php if ($user_gender == "male") echo "selected" ?>>Mr.</option>
                                        <option value="female" <?php if ($user_gender == "female") echo "selected" ?>>Mrs.</option>
                                    </select>
                                </div>

                                <div class="input-holder">
                                    <label for="edit_user_info_first_name">First Name</label>
                                    <input type="text" name="edit_user_info_first_name" id="edit_user_info_first_name" value="<?php echo $user_FirstName  ?>">
                                </div>

                                <div class="input-holder">
                                    <label for="edit_user_info_last_name">Last Name</label>
                                    <input type="text" name="edit_user_info_last_name" id="edit_user_info_last_name" value="<?php echo $user_LastName  ?>">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="company">Company</label>
                                    <input type="text" name="edit_user_info_company" id="edit_user_info_company" value="<?php echo $user_company; ?>">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="edit_user_info_email">Email</label>
                                    <input type="email" name="edit_user_info_email" id="edit_user_info_email" value="<?php echo $user_Email; ?>">
                                </div>

                                <button id="edit-save-user-information" class="primary-btn">Save</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Edit Profile Tab Content -->

                <!-- Start Wishlist Tab Conent -->
                <div class="d-none dashboard-tab-content" id="wishlist">
                    <div class="dashboard-content-section-heading py-3">
                        <div class="dashboard-content-section-heading-title with-padding">
                            <span>Wishlist</span>
                        </div>
                    </div>

                    <div class="dashboard-content-section-body">
                        <div class="campaign">
                            <div class="cards-container">
                                <?php

                                $user_id = get_current_user_id();
                                $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);
                                $fav_campaign_array = explode(",", $user_fav_campaigns);

                                $args = array(
                                    'post_type' => 'campaign',
                                    'post_status ' => 'publish',
                                    'posts_per_page' => -1,
                                    'post__in' => $fav_campaign_array,

                                );
                                $favorite_user_campaigns = new WP_Query($args);

                                if ($favorite_user_campaigns->have_posts()) :
                                    while ($favorite_user_campaigns->have_posts()) :
                                        $favorite_user_campaigns->the_post();
                                ?>
                                        <?php get_template_part('template-parts/cards/content', 'campaign', array('is_donor_dashboard' => true)); ?>
                                <?php
                                    endwhile;
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Wishlist Tab Conent -->

                <!-- Start Edit Profile Tab Content -->
                <div class="d-none dashboard-tab-content" id="contribution-invitation">
                    <div class="dashboard-tab-content-section donations-history">
                        <div class="dashboard-content-section-heading py-3">
                            <div class="dashboard-content-section-heading-title with-padding">
                                <span>Contribution Invitation</span>
                            </div>
                        </div>

                        <div class="dashboard-content-section-body">
                            <div class="with-padding">
                                <p><b>Fill the information then choose where you want to send the invitation</b></p>
                                <hr>
                            </div>
                            <div class="contribution-details-form custom-inputs with-padding">


                                <div class="select-holder">
                                    <label>Select Campaign To Contribute*</label>
                                    <select name="select_campaign_to_contribute" id="select_campaign_to_contribute">
                                        <option value="campaign1">campaign1</option>
                                        <option value="campaign2">campaign2</option>
                                        <option value="campaign3">campaign3</option>
                                    </select>
                                </div>

                                <div class="input-holder">
                                    <label for="contribution_value">Contribution Value</label>
                                    <input type="number" name="contribution_value" id="contribution_value" value="<?php echo $user_LastName  ?>">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="invitation_message">Invitation Message</label>
                                    <textarea name="invitation_message" id="invitation_message" cols="30" rows="7"></textarea>
                                </div>

                                <!-- <button id="edit-save-user-information" class="primary-btn">Save</button> -->
                            </div>

                            <div class="invite-container mt-lg-4 mt-3 mb-3 with-padding">
                                <p><b>Invite Via</b></p>
                                <div class="invite-btns">
                                    <a href="#" class="invite-btn by-whatsapp" title="Invite by WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-facebook" title="Invite by Facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-instagram" title="Invite by Instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-twitter" title="Invite by Twitter">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-email" title="Invite by Email">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Edit Profile Tab Content -->

            </div>
            <!-- ===[End Dashboard View]=== -->

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    jQuery(document).ready(function($) {
        $('#select_campaign_to_contribute').select2({
            minimumInputLength: 3,
            language: "ar",
            cache: true,

            // // dir: 'rtl',
            // language: {
            //     noMatches: () => ("لايوجد نتائج"),
            //     noResults: () => ("لم يتم العثور على نتائج"),
            //     inputTooShort: () => ("اكتب 3 أحرف على الأقل")
            // },
        });
    });
</script>

<?php get_footer();
