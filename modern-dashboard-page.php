<?php get_header();
/* Template Name: Modern-Dashboard */


if (!is_user_logged_in()) {

?>
    <h1 align="center"> <?php _e('You Must Login To See Your Dashboard', 'bonyan'); ?></h1>
    <script>
        window.location.href = "<?php echo home_url('/') ?>";
    </script>
<?php
}

// ====[USER DATA INIT]==== //
$user_FirstName = get_user_meta($userdata->ID, 'first_name', true) ?? "First Name";
$user_LastName = get_user_meta($userdata->ID, 'last_name', true) ?? "Last Name";
$user_company = get_user_meta($userdata->ID, 'company', true) ?? "Company Name";
$user_gender = get_user_meta($userdata->ID, 'gender', true) ?? "";
$user_Email = $user_email ?? "info@2p.com.tr";
$user_profile_photo = ($user_profile_photo = get_user_meta($userdata->ID, 'user_profile_photo', true)) ? $user_profile_photo : 'https://st3.depositphotos.com/9998432/13335/v/600/depositphotos_133352010-stock-illustration-default-placeholder-man-and-woman.jpg';


// ====[USER DATA From Give]==== //


$donor = new Give_Donor($userdata->ID, true); // Get Donor By User ID
// == Get Last Donation Date
$last_donate_time = give()->donors->getDonorLatestDonationDate($donor->id); // Last Donate Days
$date = strtotime($last_donate_time); // Converted to a PHP date (a second count)
$time_left =  time() - $date; //time returns current time in seconds
$last_donate_days = floor($time_left / (60 * 60 * 24)); //seconds/minute*minutes/hour*hours/day)

$donor_registered_by_days = floor((time() - strtotime($donor->date_created)) / (60 * 60 * 24));

?>
<?php //echo get_template_part('template-parts/page-header'); 
?>
<div class="container my-3 my-lg-5">
    <div class="custom-givewp-dashboard">
        <div class="dashboard-box">

            <!-- Start Dashboard sidebar -->
            <?php // LINK ./template-parts/user-dashboard/sidebar.php
            require_once(get_template_directory() . '/template-parts/user-dashboard/sidebar.php'); ?>
            <!-- End Dashboard sidebar -->

            <!-- ===[Start Dashboard View]=== -->
            <div class="dashboard-view position-relative">
                <p class="loader"></p>


                <!-- Start Dashboard Tab Content -->
                <?php // LINK ./template-parts/user-dashboard/main-tab.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/main-tab.php'); ?>
                <!-- End Dashboard Tab Content -->


                <!-- Start Donation History Tab Content -->
                <?php // LINK ./template-parts/user-dashboard/donations-history.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/donations-history.php'); ?>
                <!-- End Donation History Tab Content -->


                <!-- Start Recurring Donations Tab Content -->
                <?php // LINK ./template-parts/user-dashboard/recurring-donations.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/recurring-donations.php'); ?>
                <!-- End Recurring Donations Tab Content -->


                <!-- Start Edit Profile Tab Content -->
                <?php // LINK ./template-parts/user-dashboard/edit-profile.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/edit-profile.php'); ?>
                <!-- End Edit Profile Tab Content -->



                <!-- Start Wishlist Tab Content -->
                <?php // LINK ./template-parts/user-dashboard/wishlist-tab.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/wishlist-tab.php'); ?>
                <!-- End Wishlist Tab Content -->


                <!-- Start Contribution Invitation Tab Content -->

                <?php // LINK ./template-parts/user-dashboard/contribution-invitation.php
                require_once(get_template_directory() . '/template-parts/user-dashboard/contribution-invitation.php'); ?>
                <!-- End Contribution Invitation Tab Content -->


            </div>
            <!-- ===[End Dashboard View]=== -->

        </div>
    </div>
</div>
<?php get_footer();
